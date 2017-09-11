<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Models\Product;
use Validator;
class ProductAddController extends Controller
{
    public function index(Request $request)
    {
     if($request->isMethod('post'))
     {
         $input=$request->except('_token');
         $validator=Validator::make($input,
             [
             'name'=>'required | max:255 '.$input['id'],
             'category_id'=>'required | min:0',
             'content'=>'required',
             'price'=>'required|numeric | min:0',
             'keywords'=>'nullable',
             'description'=>'nullable',
             'img'=>'image|nullable',
             'mini'=>'image|nullable',
             'hit'=>'boolean',
             'new'=>'boolean',
             'sale'=>'boolean'
            ]);
               if($validator->fails())
                 {
                     return redirect()->route('productAdd')->withErrors( $validator)->withInput();
                 }
         // загрузка изображений
          if($request->hasFile('img'))
          {
           $file=$request->file('img');
           $input['img']= $file->getClientOriginalName(); // вставка реального имени
         // move - команда перемещения файла из временного хранилища в постоянное
            $file->move(public_path().'/images',$input['img']);  // записывает в библиотеку public содержимое файла $input['images']
          }


                 $product=new Product();
               $product->fill($input);
               if($product->save())
               {
                   return redirect('admin')->with('status','Продукция добавлена');
               }
     }

        if(view()->exists('admin.products.product_add'))
        {
            $data=[
                'title' =>'Новая продукция'
            ];
            return view('admin.products.product_add', $data);
        }
        abort(404);

    }
}
