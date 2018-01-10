<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    public function discounts($user, $orders,$start=0)
    {
        $discounts=Discount::all();  // загрузка таблицы скидок
        $art=[]; $j=0; $cnt=count($discounts);
        $summa=0;
        if($orders)
        {
            foreach ($orders as $order)
            {
                $summa += $order->sum;
            }
        }
        $summa+=$start;
        foreach($discounts as $discount)
        {
            $art[$discount->rang]=$discount->volume;
            if($summa>=$art[$discount->rang])
            {
                $j++;
            }
        }
        if($j>0)  { $user->status=$discounts[$j-1]->discount; }
        $data=[
           'summa' =>$summa,
            'status'=>$user->status
        ];
        return $data;
    }
}
