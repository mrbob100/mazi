<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Models\QuickInformation;

class QuickinformController extends Controller
{
    public function index()
    {
        if(view()->exists(env('THEME').'.admin.quickinform.index'))
        {
            //  $categories=Category::simplePaginate(10);

            $informs=QuickInformation::orderBy('created_at','desc')->simplePaginate(20);
            $j=0; $prod=[];
            foreach($informs as $inform)
            {
               $idi=explode('?',$inform->url);
               $id= $idi[1];
                $prod[$j]=$id;
                $j++;
            }
            $data=[
                'title'=>'Сообщения от пользователей',
               'informs'=>$informs,
                'prod'=>$prod,

         ];
            //   return view('admin.index',$data);

            return view(env('THEME').'.admin.quickinform.index',$data);
        }
        abort(404);
    }

}
