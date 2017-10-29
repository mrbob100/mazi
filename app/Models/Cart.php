<?php

namespace Corp\Models;

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
                        'cart.code'=>$product->code,
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
                       'cart.code'=>$product->code,
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

    }

    public function recalc($id)
    {
        if(!session('cart'))return false;
        $rez =Session::get('cart');
        $rez1=count( $rez);
        Session::pull('cart');
        Session::pull('cardCommon.qty');
        Session::pull('cardCommon.sum');
        $i=0; $qty=0; $price=0;
        $sumQty=0;
        $total=0;
        do{
            $q1=$rez[$i]['cart.id'];
            if ($q1 == $id){
               unset( $rez[$i]);

                 break;
            }
            $i++;
        } while($i<$rez1);

        $rez1=count( $rez);
        $rez=$this->recoveryArray($rez1, $rez);


        $rez1=count( $rez);

        if( $rez)
        {
            $i=0;
            do{
                $sumQty+=  $rez[$i]['cart.qty'];
                $total+=$rez[$i]['cart.qty']*$rez[$i]['cart.price'];
                $i++;
            } while($i<$rez1);

            Session::put(['cart'=>$rez]);
            session(['cardCommon.qty'=>$sumQty]);
            session(['cardCommon.sum'=>$total]);
        }


    }


    public function recoveryArray($rez1, $rez)
    {
        $rez2=[];
        while($rez)
        {
            $k=0;
            for($j=0;$j<$rez1; $j++)
            {
                if(isset($rez[$j]))
                {
                    $rez2[$k]=$rez[$j]; unset($rez[$j]);
                    $k++;
                }
                else
                    {
                        for($i=$j+1; $i<=$rez1; $i++)
                        {
                            if(isset($rez[$i]))
                            {
                                $rez2[$k]=$rez[$i];  unset($rez[$i]);
                                $k++;
                                break;
                            }
                        }

                    }
            }
            $k++;
        }
        return $rez2;
    }


}
