<?php

namespace Corp\Http\Controllers;
use Corp\Models\Product;
use Corp\Widgets\MainWidget;
use Cache;
use Config;
use Illuminate\Http\Request;
use Symfony\Component\Routing\RequestContext;
use Corp\Repositories\ProductsRepository;
use Route;
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
        //   $context= new RequestContext();
        //  $context->fromRequest($request);

        //  $akkord = new MainWidget();
        //  $akkord->init();
        //  $akkordeon= $akkord->run();
        $rout=Route::currentRouteName();
        $products = $this->getProduct($id);
        //dd( $productItem);
     /*   $products->transform(function ($item, $key){
            if(is_string($item->exactlyType1) && is_object(json_decode($item->exactlyType1))&& json_last_error()==JSON_ERROR_NONE)
            {   $item->exactlyType1=json_decode($item->exactlyType1); }
            return $item;
        }); */

      /*  $sas=$products[0]['exactlyType1'];
       // $sa1=$sas->power;
        $adding= collect($sas)->all();
        $sa=count($adding);
        $qw=[]; $i=0;
        foreach ($adding as $key=>$item){
            $qw[$i]=$item;
            $i++;
    } */
        $content = view(env('THEME') . '.product_content')->with(['products'=> $products,'adopt'=>$this->adopt])->render();
        $this->vars = array_add($this->vars, 'content', $content);
        

     /*   $products=$this->getProducts($id);
        //dd($productItems);
        $content=view(env('THEME').'.products_content')->with('products',$products)->render();
        $this->vars=array_add($this->vars,  'content', $content); */
// добавление имен файлов в карусель flexslider
        /*    $lab1= explode('.',$product->mini);
            $test1=strval($lab1[0]);
            $test2=strlen($test1);
            $alfa=substr($test1,2,10);
            $alfa2=$alfa+1;
            $alfa3=$alfa+2;
            if($test2>3){
                $base=substr($test1,0,$test2-2);
            } else { $base=substr($test1,0,$test2-1); }

            $common1=$base.$alfa2.'.'.$lab1[1];
            $common2=$base.$alfa3.'.'.$lab1[1];
           // dump($product);
    */
    //    $this->keywords =  $products->keywords;
    //    $this->meta_desc = $products->meta_desc;
    //    $this->title = $products->name;

        return $this->renderOutput();
    }

    protected function getProduct($alias=false)
    {
        $id=false;
        $were=false;
        if($alias) {

            //  $id=Category::select('id')->where('id',$alias)->first()->id;
            //  $id=DB::table('categories')->select('id')->where('alias',$alias)->get();

            $were=['id',$alias];
        }
        $product= $this->p_rep->get(['id','name','code','description','img','price','type','country','class','groupTools','new','weightbrutto','weightnetto', 'length','height','exactlyType1','category_id','keywords','meta_desc'], false,true,$were);
        // if($products) $articles->load('user','category','comments');
        //
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

}
