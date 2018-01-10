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
use Corp\Models\Discount;
use Response;
use Session;
use Cache;
use DB;
use Validator;
use Auth;
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
        $newprice=Session::get('Price');
        if($newprice)  // установка новой цены
        {
            $product->price=$newprice[0]['newprice'];
        }

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




   //__________________________________________________________________________________________________________________
    public function cartView(Request $request)
    {

        $session =session('cart');
        $order = new Order();
        if($request->isMethod('post') ) {
            if(!Auth::check())
            {
                $rules = [
                    'name' => 'required|max:255',
                    'secondname' => 'required|max:255',
                    'password' => 'required|min:6',
                    'email' => 'required|email',
                    'phone' => 'required||min:10',
                    'address' => 'required|max:255',

                ];

                $this->validate($request, $rules);
            }
            $qw=false;

            $user=Auth::user();
            if(!Auth::check())
            {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->secondname = $request->secondname;
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->password = bcrypt($request->password);
              //  $user_id = 0;
// блок подсчета и определения рейтинга
//_________________________________________________

// блок расчета ранга пользователя

                $saa=new Discount();
                $status=$saa->discounts($user,0,session('cardCommon.sum'));

                $user->status=$status['status'];
 //_______________________________________________
                $role = Role::find(3);

                if ($role->users()->save($user)) {
                   $order->user_id = $user->id;
                  //  Auth::login($user, true);
                }

            } else  // user зарегестрирован
                {

                    //if(!$role->users()->role_id)



                  foreach($user->roles as $ror) {
                      // user не первый раз покупает у него определена роль
                      $role = $ror->id;

                      $qw = true;
                      $xhor = 0;
                  }


                    if(!$qw)  // user зарегестрирован но покупает 1-й раз
                    {
                        $role = Role::find(3);

                    }
                     $newprice=Session::pull('Price');
                  if($newprice)
                  {   $summa=$newprice[0]['summa']; }
                  else $summa=0;
                    $saa=new Discount();
                    $status=$saa->discounts($user,0,session('cardCommon.sum')+$summa);

                    // $user->status=session('cardCommon.sum');
                    $user->status=$status['status'];
                            User::find($user->id)->update( $user->toArray());


               // $user->where('id',$user->id)->update( $user->toArray());
                    $order->user_id = $user->id;
                }

//  заполнение заказа
            $order->qty = session('cardCommon.qty');
            $order->sum = session('cardCommon.sum');
            if($order->save()){
                $this->saveOrderItems(session('cart'), $order->id);
                Session::flash('status', 'Ваш заказ принят. Менеджер вскоре свяжется с Вами.');
                Session::forget('cart');
                Session::remove('cardCommon.qty');
                Session::remove('cardCommon.sum');

            }else{
                Session::flash('errors', 'Ошибка оформления заказа');
            }
            Auth::login($user);
            return redirect('cabinet');

        }
        $data=[];
        $user=Auth::user();
        if(Auth::check()) {
            $data=[
               'name' =>$user->name,
                'secondname'=>$user->secondname,
                'phone'=>$user->phone,
                'address'=>$user->address,
                'email'=>$user->email,
            ];

        }

        return view('cart.view', ['order'=>$order,'data'=>$data  ] );
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
