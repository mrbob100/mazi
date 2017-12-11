<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Models\Csvload;
use Validator;
use Image;
class OrderItemsController extends Controller
{
    public function index(Request $request)
    {
       if($request->isMethod('post'))
       {
           $input=$request->except('_token');

           $validator=Validator::make($input,[
               'img'=>'image|nullable',
               'mini_side'=>'image|nullable'
       ]);
           if( $validator->fails())
           {
               return redirect()->route('orderItems')->withErrors( $validator)->withInput();
           }
           $file=false;
           if($request->hasFile('img'))
           {
               $file=$request->file('img');
               if($file->isValid())
               {
                   $qw= $file->getClientOriginalName(); // вставка реального имени
                   $qw1=explode('.',$qw);

                  // $img = Image::make($file1)->resize(120,75);

                   // move - команда перемещения файла из временного хранилища в постоянное
                   //   $file->move(public_path().'/images',$input['img']);  // записывает в библиотеку public содержимое файла $input['images']
               }
           }

           if($request->hasFile('mini_side'))
           {
               $file1=$request->file('mini_side');
               if($file1->isValid())
               {

                   if (!isset($doblo))
                   {
                       $doblo= new Csvload();
                   }


                 //  $qw1=$input['old_images'];
                  // $input['img']='{"mini":"'.$qw2.'","max":"'.$qw1.'","path":"'.$qw3.'"}';
                   $obj = $doblo->mergeUpImages($qw1[0], $file,  $file1);
                   // $obj= $this->workUpImages( $str2->EAN_code,$workImage);
                   $input['img']=json_encode($obj);

                   // move - команда перемещения файла из временного хранилища в постоянное
                   //   $file->move(public_path().'/images',$input['img']);  // записывает в библиотеку public содержимое файла $input['images']
               }
           }


       }
        if(view()->exists(env('THEME').'.admin.orders.orderItems'))
        {
            //  $categories=Category::simplePaginate(10);



            $data=[
                'title'=>'Корректировка изображений'


            ];
            //   return view('admin.index',$data);

            return view(env('THEME').'.admin.orders.orderItems',$data);
        }
        abort(404);
    }

}
