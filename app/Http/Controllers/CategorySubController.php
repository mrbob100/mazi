<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Corp\Models\Category;
use Response;

class CategorySubController extends SiteController
{
   public function index(Request $request)
   {
    $id=$request->id;
     $categories=Category::where('parent_id',$id)->get();
       $content=view(env('THEME').'.categories_sub_choise')->with(['categories'=>$categories])->render();
       //  $this->vars=array_add($this->vars,  'content', $content);
       $sigma=$categories->text;
       if(!$sigma) {
       $sigma="Привет ! Все хорошо, это проверка";
       }
       /* $articles=$this->getArticles($cat_alias);
        $content=view(env('THEME').'.articles_content')->with('articles',$articles)->render();
        $this->vars=array_add($this->vars,'content', $content);*/

       //  $this->template=env('THEME').'.product';

       //   return $this->renderOutput();
       // return view($this->template)->with($this->vars);
       return Response::json(['success'=>true, 'content'=>$content, 'sigma'=>$sigma]);

   }
}
