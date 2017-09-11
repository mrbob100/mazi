<?php

namespace Corp\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Models\Product;
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
                'name'=>'required | max:255|unique:products,name, '.$input['id'],
                'Production.category_id'=>'required | min:0',
                'content'=>'required',
                'price'=>'required|numeric | min:0',
                'keywords'=>'nullable',
                'description'=>'nullable',
                'label'=>'nullable',
                'img'=>'image|nullable',
                'mini_side'=>'image|nullable',
                'mini_back'=>'image|nullable',
                'hit'=>'boolean',
               'new'=>'boolean',
               'sale'=>'boolean'
            ]);

            if( $validator->fails())
            {
                return redirect()->route('productEdit',['id'=>$input['id']])->withErrors( $validator)->withInput();
            }
//_________________________________________________________________________________________________________________
            // если есть основное изображение

               if($request->hasFile('img'))
               {
                 $file=$request->file('img');
                   $input['img']=$file->getClientOriginalName();
                 $file->move(public_path().'/images/cat01/',$input['img']);

               }
               else
                   {
                       $input['img']=$input['old_images'];
                   }
                   unset($input['old_images']);  // удаление ячейки
 //_______________________________________________________________________________________________________________

            // если есть мини изображения вид сбоку
            if($request->hasFile('mini_side'))
            {
                $file=$request->file('mini_side');
                $input['mini_side']=$file->getClientOriginalName();
                $file->move(public_path().'/images/miniatures/cat01/',$input['mini_side']);
            }
              else
                  {
                      $input['mini_side']=$input['old_mini_side'];
                      unset($input['old_mini_side']);  // удаление ячейки
                  }
 //_______________________________________________________________________________________________________________
            //  если есть мини изображения вид сзади
            if($request->hasFile('mini_back'))
            {
                $file=$request->file('mini_back');
                $input['mini_back']=$file->getClientOriginalName();
                $file->move(public_path().'/images/miniatures/cat01/',$input['mini_back']);
            }
            else
            {
                $input['mini_back']=$input['old_mini_back'];
                unset($input['old_mini_back']);  // удаление ячейки
            }
//______________________________________________________________________________________________________________
         //   dump($input);



            $product->fill($input);
            $product['category_id'] = $input['Production']['category_id'];
            array_key_exists('hit',$input) ?  $product['hit']=1 : $product['hit']=0;
            array_key_exists('new',$input) ?  $product['new']=1: $product['new']=0;
            array_key_exists('sale',$input) ?  $product['sale']=1 : $product['sale']=0;

           $prod=DB::table('products')->where('id',$id)->update($product->toArray());

          // $prod=Product::where('id',$id)->update($product->toArray());
            if($prod)
            {
                return redirect('admin')->with('status','Продукция обновлена');
            }
           // else abort(404);
          else  return redirect('admin')->with('status','Продукция не обновлена, нет изменений');
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
