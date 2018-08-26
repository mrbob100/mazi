<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Models\Category;
use DB;

class CategoryController extends Controller
{
    public function index()
    {
      if(view()->exists(env('THEME').'.admin.categories.index11'))
      {
        //  $categories=Category::simplePaginate(10);

          $categories=Category::with('getCategory')->simplePaginate(20);

          $data=[
            'title'=>'Категории',
              'categories'=>$categories

          ];
       //   return view('admin.index',$data);

          return view(env('THEME').'.admin.categories.index11',$data);
      }
      abort(404);
    }
}
