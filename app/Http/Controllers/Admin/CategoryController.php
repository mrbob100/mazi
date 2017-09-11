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
      if(view()->exists('admin.categories.index'))
      {
        //  $categories=Category::simplePaginate(10);

          $categories=Category::with('getCategory')->simplePaginate(10);

          $data=[
            'title'=>'Категории',
              'categories'=>$categories

          ];
       //   return view('admin.index',$data);

          return view('admin.categories.index11',$data);
      }
      abort(404);
    }
}
