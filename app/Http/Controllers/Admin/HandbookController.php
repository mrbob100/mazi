<?php

namespace Corp\Http\Controllers\Admin;

use Corp\Http\Controllers\SiteController;
use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Models\Airflow;
use Corp\Models\Company;
use Corp\Models\Cutdepth;
use Corp\Models\Cutedgewidth;
use Corp\Models\Defence;
use Corp\Models\Frequency;
use Corp\Models\Grouptool;
use Corp\Models\Packing;
use Corp\Models\TypeTool;
use Corp\Models\Product;
use Corp\Models\Category;
use Corp\Models\Anglecutdepth;
use Corp\Models\Capacity;
use Corp\Models\Diametrdsk;
use Corp\Models\Idle;
use Corp\Models\Impact;
use Corp\Models\MaxHole;
use Corp\Models\Performance;
use Corp\Models\Power;
use Corp\Models\Qntimpact;
use Corp\Models\Rotationspeed;
use Corp\Models\Spindle;
use Corp\Models\Voltage;
use Corp\Models\Cartridge;
use Corp\Models\Grindingplate;
use Corp\Models\Holestand;
use Corp\Models\Maxcapacity;
use Corp\Models\Scaffold;
use Corp\Models\Shankrange;
use Corp\Models\Steel;
use Corp\Models\Strokelength;
use Corp\Models\Vibration;
use Corp\Models\Workingwidth;
use Corp\Models\Country;
use Corp\Models\Classprofy;
use Corp\Models\Cutmatdepth;
use Corp\Models\Incline;
use Corp\Models\Detection;
use Corp\Models\Orderoption;
use Illuminate\Support\Facades\Storage;
use Config;
use Session;

class HandbookController extends AdminSiteController
{

   public function index()
   {

       $request=Request::createFromGlobals();
       $input = $request->except('_token');
      $id= $input['id'];
      $item=Config::get('settings.handbook')[ $id]['name'];
       $name1=new $item();
       $books=$name1::all();
       Session::pull('books');
       if(!session('books')) Session::push('books',['name1'=>$name1]);
       $content = view(env('THEME').'.admin.handbooks.content_handbook')->with(['books'=> $books])->render();
       $this->vars = array_add($this->vars, 'content', $content);  // вывод навигации меню
       return $this->renderOutput();

   }

    public function show()
    {
        // dd($menu);

    }
}
