<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session;
class Cart extends Model
{

    public function addToCart($product, $qty = 1)
    {
        $sesAdd =0;
            $a=false;
            $ses=[];
       /*  if((session('cart.id'))== $product->id) { */
        if(session('cart')){
    /*   foreach(session('cart') as $ses) {

               $q1 = $ses['cart.id'];

               // if ($q1 == $product->id) {
               if ($ses['cart.id'] == $product->id) {
                   $sesAdd = $ses['cart.qty'] + $qty;
                   $rez =Session::get('cart');
                   Session::pull('cart',$ses);
                   $ses['cart.qty'] = $sesAdd;
                   echo('вывод после удаления элемента');
                   dump($ses);
                   // session(['qty' => $addqty]);
                   $a = true;
                   break;
               }
           } */
            $rez =Session::get('cart');
            $rez1=count( $rez);
            $i=0;

            do{
                $q1=$rez[$i]['cart.id'];
                if ($q1 == $product->id){
                   $rez[$i]['cart.qty']+=$qty;
                    $a=true;
                   break;
                }
                $i++;

            } while($i<$rez1);

            Session::pull('cart');

            Session::put(['cart'=>$rez]);

            if(!$a){
                Session::push('cart',
                    [  'cart.id'=>$product->id,
                        'cart.qty'=>$qty,
                        'cart.name'=>$product->name,
                        'cart.price'=> $product->price,
                        'cart.img'=>$product->img,

                    ]);
            }

  }
       else {

            Session::push('cart',
                   [  'cart.id'=>$product->id,
                    'cart.qty'=>$qty,
                    'cart.name'=>$product->name,
                    'cart.price'=> $product->price,
                    'cart.img'=>$product->img,

                    ]);
       }


       if(session('cardCommon.qty')){
            $addqty=session('cardCommon.qty')+$qty; session(['cardCommon.qty'=>$addqty]);
        } else{
            session(['cardCommon.qty'=>$qty]);
              }
        if(session('cardCommon.sum'))
        {
            $addsum=session('cardCommon.sum')+ $qty * $product->price;
            session(['cardCommon.sum'=>$addsum]);
        } else{
            session(['cardCommon.sum'=>$qty * $product->price ]);
        }

       // dump(session()->all());

    }

    public function recalc($id)
    {
        if(!session('cart'))return false;
        $rez =Session::get('cart');
        $rez1=count( $rez);
        Session::pull('cart');
        $i=0; $qty=0; $price=0;
        do{
            $q1=$rez[$i]['cart.id'];
            if ($q1 == $id){
                $qty=$rez[$i]['cart.qty'];
                $price=$rez[$i]['cart.price'];
               unset( $rez[$i]);
                $a=true;
                break;
            }
            $i++;

        } while($i<$rez1);
        if(session('cardCommon.qty')){
            $addqty=session('cardCommon.qty')-$qty; session(['cardCommon.qty'=>$addqty]);
        }
        if(session('cardCommon.sum'))
        {
            $addsum=session('cardCommon.sum')- $qty * $price;
            session(['cardCommon.sum'=>$addsum]);
        }
        if(!$rez) return false;
        Session::put(['cart'=>$rez]);
    }
}
