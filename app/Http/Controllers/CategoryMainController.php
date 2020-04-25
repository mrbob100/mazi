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

       $categories=Category::where('parent_id',8)->get();
       $j=0; $sigma='';
foreach ($categories as $category)
{
    If($category->id==9999 || $category->id==315 )
    {
        if(!isset($category->text))
        {
            $sigma = "Привет ! Все хорошо, это проверка";
        } else $sigma=$category->text;

         unset($categories[$j]);
    }
    $j++;
}

     //  $content=view(env('THEME').'.categories_main_choise')->with(['categories'=>$categories])->render();
       $content=view(env('THEME').'.categories_sub_choise')->with(['categories'=>$categories])->render();
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
