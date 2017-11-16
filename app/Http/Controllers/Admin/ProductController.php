<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
//use DB;
use Corp\Models\Product;
use Corp\Models\Category;
class ProductController extends Controller
{
    public function index()
    {
        if(view()->exists(env('THEME').'.admin.categories.index'))
        {

            $parent_name=[];
           // $products=DB::table('products')->simplePaginate(10);
            $products=Product::with('categories')->paginate(20);
            $products->transform(function ($item, $key){
                if(is_string($item->img) && is_object(json_decode($item->img))&& json_last_error()==JSON_ERROR_NONE)
                {   $item->img=json_decode($item->img); }

                return $item;
            });
           // $products->img=json_decode( $products->img);
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
            return view(env('THEME').'.admin.products.index',$data);
        }
    }
}
