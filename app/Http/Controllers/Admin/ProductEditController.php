<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Validator;
use DB;

class ProductEditController extends Controller
{
    public function index( Request $request,Product $product)
    {
        $id=$request->id;

        if($request->isMethod('delete'))
        {
            Product::where('id',$id)->delete();
            return redirect('admin')->with('status','Продукт удален');
        }

        if($request->isMethod('post'))
        {
            $input=$request->except('_token');

            $validator=Validator::make($input,[
                // уникальное поле в таблице categories, поле - которое игнорируется, по какому полю поиск
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

            if( $validator->fails())
            {
                return redirect()->route('productEdit',['id'=>$input['id']])->withErrors( $validator)->withInput();
            }

            // если есть изображение
               if($request->hasFile('img'))
               {
                 $file=$request->file('img');
                   $input['img']=$file->getClientOriginalName();
                 $file->move(public_path().'/images/',$input['img']);

               }
               else
                   {
                       $input['img']=$input['old_images'];
                   }
                   unset($input['old_images']);  // удаление ячейки

            $product->fill($input);
            $prod=DB::table('products')->where('id',$id)->update($product->toArray());
            if($prod)
            {
                return redirect('admin')->with('status','Продукция обновлена');
            }
            else abort(404);
        }

        $old=Product::find($id);
        //$old=$sold->toArray();
       // dd($old);
       // $category= $old->getCategory->name;
        if(view()->exists('admin.products.product_edit'))
        {
            $data=[
                'title'=>'Редактирование продукции -'.$old['name'],
                'data'=>$old,
                'model'=>$old,
               // 'value'=>function($value){ return $value->categories->name; }
              //  'value'=> $category,
            ];
            return view('admin.products.product_edit',$data,['old'=>$old, 'model'=>$old]);
        }
        abort(404);
    }
}
