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



    public function index($id=12)
    {
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
        $nams='products';
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
