<?php

namespace Corp\Http\Controllers\Admin;

use Corp\Models\RoleUser;
use Illuminate\Http\Request;
use Corp\Http\Controllers\Admin\adminSiteController;
use Corp\Repositories\UsersRepository;
use Corp\Models\Directory;
use Corp\Models\Role;
use Corp\Models\Order;
use Corp\Models\Order_item;
use Corp\User;
use Config;
use DB;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\Node\Stmt\Foreach_;

class UsersOnController extends adminSiteController
{

    public function __construct(UsersRepository $s_rep)
    {
        parent::__construct(new \Corp\Repositories\DirectoriesRepository(new \Corp\Models\Directory));
        $this->user_rep=$s_rep; // slider
        // $this->p_rep=$p_rep;  // portfolio
        //   $this->bar='left'; // устанавливает сайт бар значения: left, right, no
        $this->template=env('THEME').'.admin.handbooks.index';
    }


    public function index($sp=0)
    {
        $request=Request::createFromGlobals();
        $input = $request->except('_token');
        $priznak= isset($input['priznak']);
        $id= $sp;


        if(view()->exists(env('THEME').'.admin.handbooks.index'))
        {
            $data=[];
            $sumUser=array();

            if(($id==2 && ! $priznak)|| ( $priznak)) {
                $role=Role::find(2);
                $data=[
                    'title' =>'Таблица Менеджеров'
                ];
            $summa=0;
                $users=$role->users()->paginate(Config::get('settings.paginate'));
                foreach($users as $user)
                {
                   $name=$user->secondname;
                    $orders=Order::where('manager',$user->secondname)->orWhere('user_id',$user->id)->first();
                    if(!$orders)
                    {
                        $summa=0;
                    }
                    else
                    {
                        $orders=Order::where('manager',$user->secondname)->orWhere('user_id',$user->id)->get();
                        foreach($orders as $item)
                        {
                            $sas=$item->sum;
                            $summa+= $item->sum;
                        }
                    }
                    array_push($sumUser,$summa);
                    $summa=0;
                }

            }

            elseif ($id==3)
            {
                $role = Role::find(4);
                $data=[
                    'title' =>'Таблица диллеров'
                ];

                $users=$role->users()->get();
                $role = Role::find(5);
                $users1=$role->users()->get();


                $collection=new Collection();
                $users=$collection->merge($users)->merge($users1);
                $users->load('orders');



                $i=0;
                foreach($users as $user)
                {

                    $summits=isset($user->orders);
                    if($summits){
                        $summit=$user->orders;
                        $sum=0;
                        foreach($summit as $item)
                        {
                            $sum+=$item->sum;
                        }
                        array_push($sumUser,$sum);
                    } else  array_push($sumUser,0);


                }
                $content = view(env('THEME').'.admin.usersups.content_users_not')->with(['data'=> $data,'users'=>$users,'sumUser'=>$sumUser,'priznak'=> $priznak])->render();
                $this->vars = array_add($this->vars, 'content', $content);  // вывод навигации меню
                return $this->renderOutput();
            }

        else
            {
                $role = Role::find(3);
                $data=[
                    'title' =>'Таблица пользователей'
                ];
// загрузка пользователей с ролью 3
                $users=$role->users()->paginate(Config::get('settings.paginate'));
                $users->load('orders');

                 $i=0;
                foreach($users as $user)
                {

                    $summits=isset($user->orders);
                    if($summits){
                        $summit=$user->orders;
                        $sum=0;
                        foreach($summit as $item)
                        {
                           $sum+=$item->sum;
                        }
                        array_push($sumUser,$sum);
                    } else  array_push($sumUser,0);


                }
            }
        //    $users=$this->getUsers();

         //   $sas=$users->roles()->where('id',3);


            $content = view(env('THEME').'.admin.usersups.content_users')->with(['data'=> $data,'users'=>$users,'sumUser'=>$sumUser,'priznak'=> $priznak])->render();
            $this->vars = array_add($this->vars, 'content', $content);  // вывод навигации меню
            return $this->renderOutput();

        }
        abort(404);
    }
    public function workUp()
    {
      //  $id=$pr;
        $data=[];
        $sumUser=array();
    }




}
