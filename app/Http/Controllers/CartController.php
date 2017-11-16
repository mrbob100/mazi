<?php

namespace Corp\Http\Controllers;

use Corp\Models\Product;
use Illuminate\Http\Request;
use Corp\Models\Cart;
use Corp\Models\Order;
use Corp\Models\Order_item;
use Corp\Widgets\MainWidget;
use Corp\User;
use Corp\Models\Role;
use Response;
use Session;
use Cache;
use DB;
use Illuminate\Support\Facades\Hash;
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
       // $qty =(int) $request->qty;

       // $qty=!$qty ? 1 : $qty;
        $qty=1;
        $product = Product::where('id',$id)->select('id','name','code','description','img','price','category_id','keywords','meta_desc')->first();
       // $product=DB::table('products')->where('id',$id)->select('id','name','code','description','img','price','category_id','keywords','meta_desc')->get();
        if(empty($product)) return false;
        $products=json_decode($product->img);
        $product->img=$products->mini;
      /*  $products= $product->transform(function ($item, $key){
            if(is_string($item->img) && is_object(json_decode($item->img))&& json_last_error()==JSON_ERROR_NONE)
            {   $item->img=json_decode($item->img); }

            return $item;
        }); */
       //   dd($product);
     //   $cart = new Cart();
    //    $cart->addToCart($product, $qty);
        $this->layout = false;
        $cart = new Cart();
        $cart->addToCart($product, $qty);
      //  session(['cart'=>$cartObject]);

        // debug($product);


        //$session=session();
     //   $len=count($request->session());
        //for($i=0; $i<$len; $i++)
       // foreach(session('cart') as $ses){
       //     $q1=$ses['name'];
        //    $q2=$ses['qty'];

       // }
      // $this->clear();
       //  dump(session());


        $content=view('cart.cartModal')->with('product',$product)->render();
        return $content;

    }





    public function clear()
    {
        if(session('cart'))
        {
            Session::forget("cart");
          //  Session::forget('cart.qty');
          //  Session::forget('cart.sum');
            Session::forget('cardCommon.qty');
            Session::forget('cardCommon.sum');
            Session::flush();

        }

        $this->layout = false;
        return  view('cart.cartModal');
        sleep(3);
        return redirect('/');
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

    public function cartRedirect()
    {
        return redirect('/');
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
            $user= new User();
            $user->login=$request->name;
            $user->name=$request->name;
            $user->secondname=$request->secondname;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->address=$request->address;
            $user->password = Hash::make($user->phone);

           // $user->save();
          // $role=new Role(['name'=>'Buyer']);

         //   $user->roles()->save($role);
          //  $role->users()->user_id->save( $user);

            $role = Role::find(3);
            $role->users()->save($user);
            $order->user_id=$user->id;
            $order->qty = session('cardCommon.qty');
            $order->sum = session('cardCommon.sum');
            if($order->save()){
                $this->saveOrderItems(session('cart'), $order->id);
                Session::flash('status', 'Ваш заказ принят. Менеджер вскоре свяжется с Вами.');
                Session::forget('cart');
                Session::remove('cardCommon.qty');
                Session::remove('cardCommon.sum');
                Session::flash('status', 'Ваш заказ принят');
            }else{
                Session::flash('errors', 'Ошибка оформления заказа');
            }
        }

        return view('cart.view', ['order'=>$order ] );
    }

    protected function saveOrderItems($items, $order_id){
        foreach($items as $id => $item){
            $order_items = new Order_item();
            $order_items->order_id = $order_id;
            $order_items->product_id = $item['cart.id'];
            $order_items->name = $item['cart.name'];
            $order_items->code=$item['cart.code'];
            $order_items->price = $item['cart.price'];
            $order_items->qty_item = $item['cart.qty'];
            $order_items->sum_item = $item['cart.qty'] * $item['cart.price'];
            $order_items->save();
        }
    }
}
