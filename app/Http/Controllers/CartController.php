<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_item;
use App\Widgets\MainWidget;
use Session;
use Cache;
/*Array
(
    [1] => Array
    (
        [qty] => QTY
        [name] => NAME
        [price] => PRICE
        [img] => IMG
    )
    [10] => Array
    (
        [qty] => QTY
        [name] => NAME
        [price] => PRICE
        [img] => IMG
    )
)
    [qty] => QTY,
    [sum] => SUM
);*/
class CartController extends Controller
{



    public function index(Request $request)
    {
        $id=$request->id;
        $qty =(int) $request->qty;

        $qty=!$qty ? 1 : $qty;
        $product = Product::where('id',$id)->first();
        if(empty($product)) return false;
        $qw=$product->id;
       //   dd($product);
     //   $cart = new Cart();
    //    $cart->addToCart($product, $qty);
        $this->layout = false;
        $cart = new Cart();
        $cart->addToCart($product, $qty);
      //  session(['cart'=>$cartObject]);

        // debug($product);


        //$session=session();
        $len=count($request->session());
        //for($i=0; $i<$len; $i++)
       // foreach(session('cart') as $ses){
       //     $q1=$ses['name'];
        //    $q2=$ses['qty'];

       // }
      // $this->clear();
       //  dump(session());
       return view('cart.cartModal')->with(['product'=>$product]);
       // echo ('Давайте работать !');


    }

    public function clear()
    {
        if(session('cart'))
        {
            Session::forget("cart");
            Session::forget('cart.qty');
            Session::forget('cart.sum');
            Session::forget('cardCommon.qty');
            Session::forget('cardCommon.sum');
            Session::flush();

        }

        $this->layout = false;
        return view('cart.cartModal');
    }

    public function DelItem(Request $request)
    {
        $id = $request->id;
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return view('cart.cartModal');
    }

    public function cartShow()
    {

        $this->layout = false;
        return view('cart.cartModal');
    }

    public function cartView(Request $request)
    {
        /*$akkord = new MainWidget();
        $akkord->init();
        $akkordeon= $akkord->run();
*/


        $session =session('cart');
        $order = new Order();
        if($request->isMethod('post')) {
            $rules = [
                'name'=>'required|max:255',
                'email'=>'required|email',
                'phone'=>'required||min:10',
                'address'=>'required|max:255'
            ];
            $this->validate($request,$rules);

            $order->firstname=$request->name;
            $order->secondname=$request->secondname;
            $order->email=$request->email;
            $order->phone=$request->phone;
            $order->address=$request->address;
            $order->qty = session('cardCommon.qty');
            $order->sum = session('cardCommon.sum');
            if($order->save()){
                $this->saveOrderItems(session('cart'), $order->id);
                Session::flash('success', 'Ваш заказ принят. Менеджер вскоре свяжется с Вами.');
                Session::forget('cart');
                Session::remove('cardCommon.qty');
                Session::remove('cardCommon.sum');
                Session::flash('success', 'Ваш заказ принят');
            }else{
                Session::flash('error', 'Ошибка оформления заказа');
            }
        }

        return view('cart.view', ['order'=>$order ] );
    }

    protected function saveOrderItems($items, $order_id){
        foreach($items as $id => $item){
            $order_items = new Order_item();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['cart.name'];
            $order_items->price = $item['cart.price'];
            $order_items->qty_item = $item['cart.qty'];
            $order_items->sum_item = $item['cart.qty'] * $item['cart.price'];
            $order_items->save();
        }
    }
}
