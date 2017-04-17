<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models;
class IndexController extends Controller
{

    protected $message;
    protected $header;


    public function __construct()
    {
        $this->header = 'Привет, это я!';
        $this->message = 'This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.';
    }

    public function index()
    {
        $categories=DB::table('categories')->get();
        dump($categories);
        $articles = DB::table('products')->simplePaginate(4);
        dump($articles);
        return view('page')->with(['message' => $this->message, 'header' => $this->header, 'articles' => $articles]);
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
