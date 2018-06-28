<?php

namespace Corp\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Corp\Models\Category;
use Corp\Models\Product;
use Corp\Widgets\MainWidget;
use Cache;
use Corp\Models\Newproduct;
use Corp\Repositories\ProductsRepository;
//use Corp\Repositories\PortfoliosRepository;
use Illuminate\Http\Request;
use Corp\Repositories\SlidersRepository;
use Corp\Repositories\NewproductRepository;
use Corp\Models\Menu;
use Config;
use Auth;
use Corp\User;
class IndexController extends SiteController
{


    public function __construct(SlidersRepository $s_rep,  ProductsRepository $p_rep,  NewproductRepository $new_rep)
    {
        parent::__construct(new \Corp\Repositories\MenusRepositories(new \Corp\Models\Menu));
        $this->s_rep=$s_rep; // slider
        // $this->p_rep=$p_rep;  // portfolio
          $this->p_rep=$p_rep;  // products
        $this->new_rep=$new_rep; // новые продукты
        //   $this->bar='left'; // устанавливает сайт бар значения: left, right, no
        $this->template=env('THEME').'.index';
    }



    public function index($id=12)
    {
     $new=[]; $hit=[];
        $products = Product::where('hit',1)->orWhere('new',1)->get(); // пункты кадров слайдера

      /*  $sliderItems->$this->check($sliderItems); */
        if( $products ->isEmpty()) return false;
        $products ->transform(function ($item, $key){
            if(is_string($item->img) && is_object(json_decode($item->img))&& json_last_error()==JSON_ERROR_NONE)
            {   $item->img=json_decode($item->img); }

            if(is_string($item->exactlyType1) && is_object(json_decode($item->exactlyType1))&& json_last_error()==JSON_ERROR_NONE)
            {   $item->exactlyType1=json_decode($item->exactlyType1); }
            return $item;
        });


        //  $articles=$this->getArticles(); // правый сайд бар
        // dd($sliderItems);
        //   $this->contentRightBar=view(env('THEME').'.indexBar')->with('articles',$articles)->render();
        // заголовок сайта

        $categoryName="Лидеры продаж";

        $sliders = view(env('THEME') . '.slider')->with(['products'=>  $products,'categoryName'=>$categoryName])->render();
        $this->vars = array_add($this->vars, 'sliders', $sliders);
        $categoryName="Новинки";
        $newProducts= $products;
        $newProducts=view(env('THEME') . '.newsell')->with(['newProducts'=>  $newProducts,'categoryName'=>$categoryName])->render();
        $this->vars = array_add($this->vars, 'newProducts', $newProducts);  // новые продажи

        $this->keywords = 'Home Page';
        $this->meta_desc = 'Home Page';
        $this->title = 'Home Page';
        // return view('welcome');
        return $this->renderOutput();
    }
     //   $categories=DB::table('categories')->toArray()->get();
       // $akkord = new MainWidget();
     //   $a='menu.php';
     //   $akkord->init($a);
     //   $akkordeon= $akkord->run();
     //  $articles = DB::table('products')->simplePaginate(4);



      //  $qweb=Category::where('id',$id)->first();
     //   $articles=Category::with('products')->where('id',$id)->simplePaginate(6);
     /*   $articles=Category::with(['products'=>function($query){
            $query->where('category_id','id')->where('sale','like',false);
        }])->simplePaginate(6);
        $articles->load('products');  */
    //   $nan=$qweb->name;
   /*     $nams='products';
        $articles=DB::table( $nams)->where('category_id',$id)->where('sale','like',false)->simplePaginate(6);
        $gnow='Product';
        $sells=Cache::get('sells');
        if(!$sells) {
       // $sells=Product::where('category_id',$id)->where('sale',true)->limit(8)->get();
            $sells=DB::table( $nams)->where('category_id',$id)->where('sale',true)->limit(8)->get();
            Cache::put('sells',$sells, 60);
        }
       // $articles=Category::with('products')->where('id',$id)->simplePaginate(6)->get('category_id');

      //  dump($articles);
     //   dump($sells);
        return view('page')->with([ 'articles' => $articles ,'sells'=>$sells ] );

    }*/



    protected function getArticles()
    {
        $articles= $this->a_rep->get(['title','created_at','img','alias'],Config::get('settings.home_articles_count'));
        return $articles;
    }


    public function show($id) {

        //$article = Article::find($id);

        //WHERE id = $id
        $article = Product::select(['id','name','content'])->where('id',$id)->first();

        //dump($article);

        return view('article-content')->with(['message'=>$this->message,
            'header' => $this->header,
            'article' => $article

        ]);

    }



    public function getNew()
    {
        $newproduct=$this->new_rep->get();
        if($newproduct->isEmpty()) return false;
        $newproduct->transform( function ($item, $key){
            $item->path =Config::get('settings.newproduct') .'/'.$item->path;

            return $item;
        });
        // dd($sliders);
        return $newproduct;
    }







    public function identityUser()
    {
        $user=Auth::user();
        if(!Auth::check()) {
            return redirect()->home();
        }
        $request=Request::createFromGlobals();
        //Session::flush();
        if($request->isMethod('post'))
        {
            $input = $request->except('_token');
            $rules = [
                'name' => 'required|max:255',
                'secondname' => 'required|max:255',
             //   'password' => 'required|min:6|confirmed',
                'email' => 'required|email|max:255|unique:users,email,'. $input['id'],
                'phone' => 'required||min:10',
                'address' => 'required|max:255',

            ];

            $this->validate($request, $rules);



            $userx = new User();
            $userx->id=$user->id;
            $userx->name =$input['name'];
            $userx->email =$input['email'];
            $userx->secondname = $input['secondname'];
            $userx->phone = $input['phone'];
            $userx->address = $input['address'];

           // $userx->password =  bcrypt($input['password']);
            $userx->status=$user->status;
            $user->where('id',$user->id)->update( $userx->toArray());

                // $prod=DB::table('products')->where('id',$id)->update($product->toArray());
            return redirect('cabinet');
        }








        $old=$user;
        $this->template=env('THEME').'.change';
        $headers = view(env('THEME') . '.header')->render();
        $this->vars = array_add($this->vars, 'headers', $headers);
        $footer = view(env('THEME') . '.footer')->render();
        $this->vars = array_add($this->vars, 'footer', $footer);
        $content = view(env("THEME") . ".changeIdentity")->with('old',$old)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return view($this->template)->with($this->vars); // template устанавливается в дочернем классе
    }
}
