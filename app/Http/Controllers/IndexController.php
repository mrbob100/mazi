<?php

namespace Corp\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Corp\Models\Category;
use Corp\Models\Product;
use Corp\Widgets\MainWidget;
use Cache;

use Corp\Repositories\ProductsRepository;
//use Corp\Repositories\PortfoliosRepository;
use Illuminate\Http\Request;
use Corp\Repositories\SlidersRepository;
use Corp\Models\Menu;
use Config;
class IndexController extends SiteController
{


    public function __construct(SlidersRepository $s_rep,  ProductsRepository $p_rep)
    {
        parent::__construct(new \Corp\Repositories\MenusRepositories(new \Corp\Models\Menu));
        $this->s_rep=$s_rep; // slider
        // $this->p_rep=$p_rep;  // portfolio
          $this->p_rep=$p_rep;  // products
        //   $this->bar='left'; // устанавливает сайт бар значения: left, right, no
        $this->template=env('THEME').'.index';
    }



    public function index($id=12)
    {

        $sliderItems = $this->getSliders(); // пункты кадров слайдера
        $sliderItems->load('products');

        //  $articles=$this->getArticles(); // правый сайд бар
        // dd($sliderItems);
        //   $this->contentRightBar=view(env('THEME').'.indexBar')->with('articles',$articles)->render();
        // заголовок сайта


        $sliders = view(env('THEME') . '.slider')->with('sliders', $sliderItems)->render();
        $this->vars = array_add($this->vars, 'sliders', $sliders);

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

    public function getSliders()
    {
        $sliders =$this->s_rep->get();
        // dd($sliders);
        if($sliders->isEmpty()) return false;
        $sliders->transform( function ($item, $key){
            $item->path =Config::get('settings.slider_path') .'/'.$item->path;

           return $item;
        });
        // dd($sliders);
        return $sliders;
    }

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
}
