<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Repositories\SlidersRepository;
use Corp\Models\Slider;
class SliderController extends adminSiteController
{


    public function index()
    {

        if(view()->exists(env('THEME').'.admin.handbooks.index'))
        {


            $sumUser=array();
            $sliders= Slider::all();
            $data=[
                'title'=>'Таблица слайдера'
                ];


            //    $users=$this->getUsers();

            //   $sas=$users->roles()->where('id',3);


            $content = view(env('THEME').'.admin.sliders.content_slider')->with(['sliders'=> $sliders,'data'=>$data])->render();
            $this->vars = array_add($this->vars, 'content', $content);  // вывод навигации меню
            return $this->renderOutput();

        }
        abort(404);





    }

}
