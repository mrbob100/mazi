<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Corp\Models\Category;
use Corp\Models\Product;


class CategoryMainController extends SiteController
{
   public function index()
   {

       $categories=Category::where('parent_id',0)->get();
       $j=0; $sigma='';
foreach ($categories as $category)
{
    If($category->id==9999)
    {
        $sigma=$category->text;
         unset($categories[$j]);
    }
    $j++;
}
       if(!$sigma) {
           $sigma="Привет ! Все хорошо, это проверка";
       }
       $content=view(env('THEME').'.categories_main_choise')->with(['categories'=>$categories])->render();
     //  $this->vars=array_add($this->vars,  'content', $content);

       /* $articles=$this->getArticles($cat_alias);
        $content=view(env('THEME').'.articles_content')->with('articles',$articles)->render();
        $this->vars=array_add($this->vars,'content', $content);*/

     //  $this->template=env('THEME').'.product';

    //   return $this->renderOutput();
       // return view($this->template)->with($this->vars);
       return Response::json(['success'=>true, 'content'=>$content,'sigma'=>$sigma]);
   }
}
