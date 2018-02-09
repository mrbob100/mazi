<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Repositories\DirectoriesRepository;
use Corp\Repositories\UsersRepository;
use Menu;

class adminSiteController extends Controller
{
    protected $sp_rep;
    protected $template;  // имя конкретного шаблона
    protected $vars; // массив передаваемых объектов в шаблон
    protected $user_rep;
    protected $c_rep; // категории

    public function __construct(DirectoriesRepository $sp_rep)
    {
        $this->sp_rep=$sp_rep;

        $this->template=env('THEME').'.admin.handbooks.index';
    }
    protected function renderOutput()
    {



            // dd($menu);
        $data=['title'=>'Панель администратора'];
        $title='Панель администратора';
        $this->vars = array_add($this->vars, 'title', $title);

           // $footer = view(env('THEME') . '.footer')->render();
           // $this->vars = array_add($this->vars, 'footer', $footer);


        return view($this->template)->with($this->vars); // template устанавливается в дочернем классе
    }



}
