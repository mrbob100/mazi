<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use DB;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    public function index()
    {
        if(view()->exists('admin.categories.index'))
        {

            $parent_name=[];
           // $products=DB::table('products')->simplePaginate(10);
            $products=Product::with('getCategory')->paginate(10);
          //  $products=Product::paginate(10);
         //   $category= $products->load('getCategory');
        /*     $j=0;
       foreach ($products as $prod)
       {
           $parent=$prod->getCategory->parent_id;

          $parent_number=Category::where('id',$parent)->first();
         if($parent)  { $parent_name[$j]=$parent_number->name; }
         else $parent_name[$j]='Самостоятельная категория';
            $j++;
       } */

            $data=[
                'title'=>'Продукты',
                'products'=>$products,
                'parent_name'=>$parent_name,

            ];
            return view('admin.products.index',$data);
        }
    }
}
