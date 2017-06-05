<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
      if(view()->exists('admin.index'))
      {
         // $categories=Category::simplePaginate(10);
          $categories=Category::simplePaginate(10);
          $data=[
            'title'=>'Категории',
              'categories'=>$categories
          ];
       //   return view('admin.index',$data);
          return view('admin.index11',$data);
      }
      abort(404);
    }
}
