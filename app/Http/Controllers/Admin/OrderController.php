<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Models\Order;
use Corp\User;
class OrderController extends Controller
{
    public function index()
    {
        if(view()->exists(env('THEME').'.admin.orders.order'))
        {


            // $products=DB::table('products')->simplePaginate(10);
            $orders=Order::with('users')->paginate(20);

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
                'title'=>'Заказы',
                'orders'=>$orders

            ];
            return view(env('THEME').'.admin.orders.order',$data);
        }
    }
}
