<?php

namespace App\Http\Controllers;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Widgets\MainWidget;
use Cache;
class IndexController extends Controller
{

    protected $message;
    protected $header;
    protected $sells;

    public function __construct()
    {
        $this->header = 'Привет, это я!';
        $this->message = 'This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.';
    }

    public function index($id=12)
    {
     //   $categories=DB::table('categories')->toArray()->get();
        $akkord = new MainWidget();
        $akkord->init();
        $akkordeon= $akkord->run();
     //  $articles = DB::table('products')->simplePaginate(4);



        $qweb=Category::where('id',$id)->first();

       $nan=$qweb->name;
        $articles=DB::table('products')->where('category_id',$id)->where('sale','like',false)->simplePaginate(6);
        $sells=Cache::get('sells');
        if(!$sells) {
        $sells=Product::where('category_id',$id)->where('sale',true)->limit(8)->get();
            Cache::put('sells',$sells, 60);
        }
       // $articles=Category::with('products')->where('id',$id)->simplePaginate(6)->get('category_id');

      //  dump($articles);
     //   dump($sells);
        return view('page')->with(['message' => $this->message, 'header' => $this->header, 'articles' => $articles ,'sells'=>$sells, 'akkordeon'=>$akkordeon  ] );

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
