<?php

namespace Corp\Http\Controllers;
use Corp\Models\Order;

use Corp\Models\Orderoption;
use Corp\Repositories\OrdersRepository;
use Illuminate\Http\Request;
use Corp\User;
use Corp\Models\Role;
use Auth;
use Carbon\Carbon;
use Session;
use Response;
class CabinetController extends SiteController
{
    public function __construct( OrdersRepository $o_rep)
    {
        parent::__construct(new \Corp\Repositories\MenusRepositories(new \Corp\Models\Menu));

        $this->o_rep=$o_rep;  // portfolio
        // $this->a_rep=$a_rep;  // articles

        $this->template=env('THEME').'.left_barCab';
        $this->barCabinet=true;  // устанавливает сайт бар значения: left, right, no
        $this->bar=true;
    }

    public function index()
    {

        $user=Auth::user();
        if(!Auth::check()) {
            return redirect()->home();
        }
        // если данные переданы методом POST
       $request=Request::createFromGlobals();
        if($request->isMethod('post'))
        {
            $input = $request->except('_token');
            $this->template=env('THEME').'.both_barsCab';
            $id=$input['id'];
            $alias=$user->id;
            $role_id=3;
            $orders=$this->getOrders($role_id,$alias);
            $orders->load('users','order_items');
            $points=$orders[0]->order_items;


            $content = view(env("THEME") . ".orders_cabinet")->with(["orders"=> $orders,'id'=>$id,'points'=>$points])->render();

            return Response::json(["success"=>true, "content"=>$content]);

        }

        // если данные переданы методом GET
        $priznak=0;
        $role_id=0;
        $alias="";
        $options=OrderOption::all();
        $optionTool=array();
        foreach(  $options as $tool)
        {
            $optionTool[$tool->id]=$tool->name;
        }

        $roleIds=$user->roles;
        foreach( $roleIds as $role)
        {
            $item=$role->id;

           if( $item==2)
           {
               $role_id=2;
               $alias=$user->secondname;
               break;
           }
            if($item==3)
            {
                $role_id=3;
                $alias=$user->id;
                break;
            }

        }

// $role_id=$user->roles()->where('roles.id',2)->first();


       if($role_id==2){
           $orders=Order::where("status",NULL)->orWhere('manager',$alias)->simplePaginate();
           $priznak=1;
       }
      else {

          $orders=$this->getOrders($role_id,$alias);
      }

      $orders->load('users','order_items');
       $zikname= $user->name.' '.$user->secondname;

     //   Session::pull('ozuhenvey');
      //  if(!session('ozuhenvey')) Session::push('ozuhenvey', $zikname);
        $points=[]; $j=0;


        $timeDay=Carbon::now();
      // $timeDay= $timeDay->toDateString();
        $timeDay= $timeDay->timestamp/86400; // количество дней
        $timeDay=explode('.',$timeDay);
         $qntDay=[0,0,0,0,0]; $worked=[0,0,0,0];
        $turnOver=0;
       foreach($orders as $order)
       {
           $dt = Carbon::parse($order->created_at);
           $dst =$dt->timestamp/86400; // количество дней
           $dst=explode('.',$dst);

           // за текущий день
           if($timeDay[0]== $dst[0])
           {
               $qntDay[0]++;
               $turnOver+=$order->sum;
           }
           // за неделю

           if ($dst[0]<=$timeDay[0]-1 && $dst[0]>=$timeDay[0]-7)
           {
               $qntDay[1]++;
               $turnOver+=$order->sum;
           }
           //за текущий месяц
           elseif ($dst[0]<=$timeDay[0]-8 && $dst[0]>=$timeDay[0]-30)
           {
               $qntDay[2]++;
               $turnOver+=$order->sum;
           }
           // за три месяца
           elseif ($dst[0]<=$timeDay[0] && $dst[0]>=$timeDay[0]-90 )
           {
               $qntDay[3]++;
           }
           // за год
           elseif($dst[0]<=$timeDay[0] && $dst[0]>=$timeDay[0]-360)
           {
               $qntDay[4]++;
           }
           if($order->status==NULL)
           {
               $worked[0]++;
           }
           if($order->status==1)
           {
               $worked[1]++;
           }
           if($order->status==2)
           {
               $worked[2]++;
           }
           if($order->status==3)
           {
               $worked[3]++;
           }

       }

           $data=[
               'orders'=> $orders,
               'qntDay'=> $qntDay,
               'worked'=>$worked,
                'priznak' =>$priznak,
           ];
/*$data1=[
    'zikname'=>$zikname,
    'email'=>$user->email,
    'address'=>$user->address,
    'phone'=>$user->phone
]; */
// загрузка страницы
        $content = view(env('THEME') . '.orders_cabinet')->with(['orders'=> $orders,'priznak' =>$priznak,'optionTool'=>$optionTool])->render();
        $this->vars = array_add($this->vars, 'content', $content);
 // загрузка leftbar
            $bar=$this->barCabinet;
            $leftBar=view(env('THEME').'.left_bar_cabinet')->with('data',$data)->render();
            $this->vars=array_add($this->vars,'leftBar', $leftBar);
            $this->vars=array_add($this->vars,'bar', $bar);
        $footer = view(env('THEME') . '.footer')->render();
        // заголовок
        $headers = view(env('THEME') . '.header')->render();
        $this->vars = array_add($this->vars, 'headers', $headers);
        // фоотер
       session()->flash('status',$zikname);
        Session::pull('Author');
        if(!session('Author')) Session::flash('Author',$user);
      // session()->keep(['zikname'=>$zikname,'email'=>$user->email,'address'=>$user->address,'phone'=>$user->phone]);
      //  Session::pull('Author');
       // if(!session('Author')) Session::push('Author',['user'=>$user]);
        $this->vars = array_add($this->vars, 'footer', $footer);
        return view($this->template)->with($this->vars); // template устанавливается в дочернем классе
    }



    protected function getOrders($role_id=false, $alias=false)
    {
        $id=false;
        $were=false;
        if($role_id==2) {

            //  $id=Category::select('id')->where('id',$alias)->first()->id;
            //  $id=DB::table('categories')->select('id')->where('alias',$alias)->get();

            $were=['manager',$alias];
        }
        else{
            $were=['user_id',$alias];
        }
        $orders= $this->o_rep->get(['id','user_id','qty','sum','status','manager','created_at','comment'], false,true,$were);
        // if($products) $articles->load('user','category','comments');
        // dd($id);

        return $orders;
    }


    // функция перенаправляет по jax запросу в личный кабинет при выборе менеджером заказов по дате размещения
    // и стадии выполнения из CabinetController
    public function caboption()
    {
        $user=Auth::user();
        $request=Request::createFromGlobals();
        if($request->isMethod('post'))
        {
            $input = $request->except('_token');
        }
    }



}
