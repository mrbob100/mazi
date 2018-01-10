<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Models\Role;
use Corp\Models\RoleUser;
use Corp\Models\Order;
use Corp\Models\Order_item;
use Corp\User;
use Config;
use Validator;
use DB;

class UsersShowController extends adminSiteController
{
    public function index($sp=0)
    {
        $request=Request::createFromGlobals();
        $input = $request->except('_token');

        $id= $sp;
        if($request->isMethod('delete'))
        {

            $this->deleteUsers($id);
            return redirect('admin')->with('status','Пользователь удален');
        }



        if($request->isMethod('post'))
        {
            $id=$input['id'];
            $validator=Validator::make($input,[
                // уникальное поле в таблице categories, поле - которое игнорируется, по какому полю поиск
                'name'=>'required | max:255|unique:products,name, '.$input['id'],
                'email' => 'required|email|max:255',
                'phone'=>'required|max:12',
                'text'=>'nullable',
                'status'=>'nullable'


            ]);

            if( $validator->fails())
            {
                return redirect()->route('showup',['id'=>$input['id']])->withErrors( $validator)->withInput();
            }
            $users= User::where('id',$id)->first();
            $users->name=$input['name'];
            $users->secondname=$input['secondname'];
            $users->email=$input['email'];
            $users->status=$input['status'];



            $prod=DB::table('users')->where('id',$id)->update($users->toArray());

            // $prod=Product::where('id',$id)->update($product->toArray());
            if($prod)
            {
                return redirect('admin')->with('status','Информация обновлена');
            }
            // else abort(404);
            else  return redirect('admin')->with('status','Информация не обновлена, нет изменений');

        }





        if(view()->exists(env('THEME').'.admin.handbooks.index'))
        {

            $data=[];
            $sumUser=array();
            $users= User::where('id',$id)->first();
            $roles=$users->roles;
            foreach($roles as $rol)
            {
              $role=$rol->id;
            }
            $orders='';
            if($role==2) {
                $priznak=2;
                $summa=0;
                $orders=Order::where('manager',$users->secondname)->orWhere('user_id',$users->id)->get();
                $dat=$users->countData($orders, $priznak);
                $data=[
                    'title' =>'Таблица Менеджеров',
                    'data'=>$dat,
                    'name'=>$users->name,
                    'secondname'=>$users->secondname,
                    'email'=>$users->email,
                    'phone'=>$users->phone,
                    'status'=>$users->status
                ];


            }

            if($role==3) // обычный пользователь
            {
                $priznak=0;
                $pr=0; // признак запроса get
                $orders=Order::where('user_id',$users->id)->get();
                $dat=$users->countData($orders,  $pr);
                $data=[
                    'title' =>'Таблица пользователей',
                    'data'=>$dat,
                    'name'=>$users->name,
                    'secondname'=>$users->secondname,
                    'email'=>$users->email,
                   'phone'=>$users->phone,
                    'status'=>$users->status,

                ];
                $i=0;

            }

            //    $users=$this->getUsers();

            //   $sas=$users->roles()->where('id',3);


            $content = view(env('THEME').'.admin.usersups.content_userWork')->with(['data'=> $data,'users'=>$users,'sumUser'=>$sumUser,'priznak'=> $priznak, 'orders'=>$orders])->render();
            $this->vars = array_add($this->vars, 'content', $content);  // вывод навигации меню
            return $this->renderOutput();

        }
        abort(404);





    }


    public function deleteUsers($id)
    {
        $user=User::where('id',$id)->get();
        $user->load('orders');
        foreach ($user as $us)
        {
            $eqs=$us->orders;
            foreach($eqs as $eq) // перебор заказов
            {
                $items=$eq->order_items; // загрузка продуктов, относящихся к заказу

                foreach($items as $item) // перебор продукции
                {
                    $id_product= $item->id;
                    $name=$item->name;
                    Order_item::where('id',$id_product)->delete();
                }
                $id_order=$eq->id;
                Order::where('id',$id_order)->delete();
            }
        }

        /*foreach ($user as $us)
        {
            $us->load('roles');
              $qw= $us->roles();
             $wew=$us->roles()->where('user_id',$us->id)->get();
        }*/
        $roles=RoleUser::where('user_id',$id)->get();
        foreach($roles as $role)
        {
            $role->delete();
        }

        User::where('id',$id)->Delete();


    }

}
