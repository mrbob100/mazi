<?php

namespace Corp\Http\Controllers;
use Corp\Models\Product;
use Corp\Widgets\MainWidget;
use Cache;
use Config;
use Corp\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use Symfony\Component\Routing\RequestContext;
use Corp\Repositories\ProductsRepository;
use Corp\Models\Discount;
use Route;
use Auth;
use Session;
class ProductController extends SiteController
{

    public function __construct(  ProductsRepository $p_rep)
    {
        parent::__construct(new \Corp\Repositories\MenusRepositories(new \Corp\Models\Menu));
       // $this->s_rep=$s_rep; // slider
        // $this->p_rep=$p_rep;  // portfolio
        $this->p_rep=$p_rep;  // products
        //   $this->bar='left'; // устанавливает сайт бар значения: left, right, no
        $this->template=env('THEME').'.product';

    }

    // public function index($id)
    public function index(Request $request)
    {
        // print_r($request->all());
        $id = $request->id;

        $rout=Route::currentRouteName();
        $products = $this->getProduct($id);
        $discount=0;
        // Блок расчета скидок
        $user=Auth::user();
        if(Auth::check())
        {
           $orders=$user->orders;

           if($orders) // заказы есть их выбираем
           {
             $saa=new Discount();
               $data=$saa->discounts($user, $orders);

           }
            $discount=$data['status'];
           $summa=$data['summa'];
            $newprice=$products[0]->price * $discount/100;
            $newprice=$products[0]->price - $newprice;
            $pric=explode('.',$newprice);
            $newprice=$pric[0].'.00';
            Session::pull('Price');
            if(!session('Price')) Session::push('Price',['newprice'=>$newprice,'summa'=>$summa]);
        }
        else { $newprice=0; $discount=0;  $summa=0;}


        $content = view(env('THEME') . '.product_content')->with(['products'=> $products,'adopt'=>$this->adopt,'discount'=>$discount,'newprice'=>$newprice,'summa'=>$summa])->render();
        $this->vars = array_add($this->vars, 'content', $content);
        


        return $this->renderOutput();
    }

    protected function getProduct($alias=false)
    {
        $id=false;
        $were=false;
        if($alias) {


            $were=['id',$alias];
        }
        $product= $this->p_rep->get(['id','name','code','description','img','price','type','country','class','groupTools','new','weightbrutto','weightnetto', 'length','height','exactlyType1','category_id','keywords','meta_desc'], false,true,$were);

        // dd( $product);
     $product->load('typeTools');
        return $product;
    }



    public function actionSearch(Request $request)
    {
        $this->template=env('THEME').'.left_bar';
        $this->bar=true;
        $q=$request->q;
        $p='%'.$q.'%';
        $query=Product::select(['id','name','price','img','category_id'])->where('name','like',$p);

       // $products=$query->paginate(Config::get('settings.paginate'));
        $products=$query->get();
        $this->adopt=false;
        $products->transform(function ($item, $key){
            if(is_string($item->img) && is_object(json_decode($item->img))&& json_last_error()==JSON_ERROR_NONE)
            {   $item->img=json_decode($item->img); }
            return $item;
        });
        $content = view(env('THEME') . '.products_content')->with(['products'=> $products,'adopt'=>$this->adopt])->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }



    public function adminSearch(Request $request)
    {
       // $this->template=env('THEME').'.admin_search';
     //   $this->bar=true;
        $q=$request->q;
        $p='%'.$q.'%';
        $query=Product::select(['id','code','name','price','img','category_id'])->where('code','like',$p);
        $parent_name=[];
        // $products=$query->paginate(Config::get('settings.paginate'));
        $products=$query->get();
        $products->load('categories');
        $this->adopt=false;
        $products->transform(function ($item, $key){
            if(is_string($item->img) && is_object(json_decode($item->img))&& json_last_error()==JSON_ERROR_NONE)
            {   $item->img=json_decode($item->img); }
            return $item;
        });
     //   $content = view(env('THEME') . '.products_content')->with(['products'=> $products,'adopt'=>$this->adopt])->render();
    //    $this->vars = array_add($this->vars, 'content', $content);
     //   return $this->renderOutput();
        $data=[
            'title'=>'Продукты',
            'products'=>$products,
            'parent_name'=>$parent_name,

        ];
        return view(env('THEME').'.admin.products.search',$data);
    }

}
