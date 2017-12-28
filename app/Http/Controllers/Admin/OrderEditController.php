<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Models\Order;
use Validator;
use DB;
class OrderEditController extends Controller
{
    public function index(Request $request,Order $order)
    {
        $id=$request->id;



        if($request->isMethod('post'))
        {
            $input=$request->except('_token');

            $validator=Validator::make($input,[
                // уникальное поле в таблице categories, поле - которое игнорируется, по какому полю поиск
                'name'=>'required | max:255, '.$input['id'],
               // 'Production.category_id'=>'required | min:0',
                'order'=>'required',
                'price'=>'required|numeric | min:0',
                'qty'=>'integer',
                'sum'=>'required|numeric | min:0',
                'status'=>'required | max:9'
            ]);

            if( $validator->fails())
            {
                return redirect()->route('productEdit',['id'=>$input['id']])->withErrors( $validator)->withInput();
            }
//_________________________________________________________________________________________________________________
            // если есть основное изображение


//______________________________________________________________________________________________________________
            //   dump($input);



            $order->fill($input);

           /* array_key_exists('hit',$input) ?  $product['hit']=1 : $product['hit']=0;
            array_key_exists('new',$input) ?  $product['new']=1: $product['new']=0;
            array_key_exists('sale',$input) ?  $product['sale']=1 : $product['sale']=0; */

            $prod=DB::table('orders')->where('id',$id)->update($order->toArray());

            // $prod=Product::where('id',$id)->update($product->toArray());
            if($prod)
            {
                return redirect('admin')->with('status','Продукция обновлена');
            }
            // else abort(404);
            else  return redirect('admin')->with('status','Продукция не обновлена, нет изменений');
        }
        $status=array();
        $status[0]='не выбран';
        $status[1]='в работе';
        $status[2]='обработан';
        $status[3]='отправлен';

        $old=Order::find($id);
        $old->load('users','order_items');

        //$old=$sold->toArray();
        // dd($old);
        // $category= $old->getCategory->name;
        if(view()->exists(env('THEME').'.admin.orders.order_edit'))
        {
            $data=[
                'title'=>'Редактирование продукции -'.$old['name'],
                'data'=>$old,
                'status'=>$status


                // 'value'=>function($value){ return $value->categories->name; }
                //  'value'=> $category,
            ];

//dd($data);
            return view(env('THEME').'.admin.orders.order_edit',$data);
        }
        abort(404);
    }

}
