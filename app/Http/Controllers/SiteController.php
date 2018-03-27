<?php

namespace Corp\Http\Controllers;

use Corp\User;
use Corp\Models\Order;
use Corp\Models\Order_item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Menu;
use Corp\Repositories\MenusRepositories;
use Cache;
use Response;

class SiteController extends Controller
{
    // protected $p_rep; // объект класса portfolio
    protected $s_rep; // объект класса slider
    protected $a_rep; // объект класса articles
    protected $m_rep; // объект класса menu
    protected $c_rep; // коментарии
    protected $o_rep; // заказы
    protected $template;  // имя конкретного шаблона
    protected $vars; // массив передаваемых объектов в шаблон
    protected $bar=false; // есть ли side бар
    protected $keywords;
    protected $meta_desc;
    protected $title;
    protected $p_rep; // объект класса products
    protected $p_cart=false; // вывод корзины
    protected $contentRightBar=false;
    protected $contentLeftBar=false;
    protected $category_id;
     protected  $adopt=true;
     protected $data;
     protected $barCabinet=false; // если работа с кабинетом
    protected $sp_rep;
    protected $new_rep;

    public function __construct(MenusRepositories $m_rep)
    {
        $this->m_rep=$m_rep;
    }
    protected function renderOutput()
    {
       if(!$this->p_cart) {

           $menu = $this->getMenu();
           // dd($menu);
           $navigation = view(env('THEME') . '.navigation')->with('menu', $menu)->render();
           $this->vars = array_add($this->vars, 'navigation', $navigation);  // вывод навигации меню

           $headers = view(env('THEME') . '.header')->render();
           $this->vars = array_add($this->vars, 'headers', $headers);
           // мета  тэги
           $this->vars = array_add($this->vars, 'keywords', $this->keywords);
           $this->vars = array_add($this->vars, 'meta_desc', $this->meta_desc);
           $this->vars = array_add($this->vars, 'title', $this->title);

      if($this->bar==true)
           {  // если есть райт бар
               $bar=$this->bar;
               $cat=$this->category_id;
               $leftBar=view(env('THEME').'.left_bar_content')->with(['bar'=>$bar,'cat'=>$cat,'data'=>$this->data])->render();
               $this->vars=array_add($this->vars,'leftBar', $leftBar);
               $this->vars=array_add($this->vars,'bar', $bar);
           }


           $footer = view(env('THEME') . '.footer')->render();
           $this->vars = array_add($this->vars, 'footer', $footer);
       }

        return view($this->template)->with($this->vars); // template устанавливается в дочернем классе
    }



    public function getMenu()
    {
        $menu=$this->m_rep->get();
        $mBuilder=Menu::make('MyNav', function ($m) use ($menu) {
            foreach($menu as $item)
            {
                if($item->parent==0)
                {
                    $m->add($item->title,$item->path)->id($item->id); // в пункт меню присваиваеется title , путь и id
                }
                else {
                    if($m->find($item->parent))  // поиск родительского элемента и он существует
                    {
                        $m->find($item->parent)->add($item->title,$item->path)->id($item->id);
                    }

                }
            }
        });
        return $mBuilder;
    }



    public function viborOrders($input, $user )
    {

        $timeDay=Carbon::now();
        $timeDay2=Carbon::now();
        $wq=$timeDay2->format('m-d');
        //  $timeDay2->toDateTimeString();
        $timeDay= $timeDay->timestamp/86400; // количество дней
        $timeDay=explode('.',$timeDay);
        // $timeDay= $timeDay->toDateString();
        // $timeDay= $timeDay->timestamp/86400; // количество дней
        //  $timeDay=explode('.',$timeDay);
        $qntDay=[0,0,0,0,0]; $worked=[0,0,0,0];
        $turnOver=0;

        $query=Order::where('manager',$user->secondname)->orWhere('user_id',$user->id)->select('*');
        if(isset($input['dzen']))
        {

            $optChoise=explode('=',$input['dzen']);
            $sas=$optChoise;
            if($optChoise[0]=='день')
            {
                $query->addSelect('created_at')->whereDate('created_at','=',Carbon::today()->toDateTimeString());
            }
            if($optChoise[0]=='неделя')
            {
                $query->addSelect('created_at')->whereDate('created_at','>=',Carbon::yesterday()->subDays(7));
            }
            if($optChoise[0]=='месяц')
            {

                $query->addSelect('created_at')->whereDate('created_at','>=',Carbon::yesterday()->subDays(30))->whereDate('created_at','<',Carbon::yesterday()->subDays(7));
                $ew1=Carbon::today()->subDays(30);

            }

            if($optChoise[0]=='квартал')
            {

                $query->addSelect('created_at')->whereDate('created_at','>=',Carbon::yesterday()->subDays(90))->whereDate('created_at','<',Carbon::yesterday()->subDays(30));


            }

            if($optChoise[0]=='год')
            {
                $query->addSelect('created_at')->whereDate('created_at','>=',Carbon::yesterday()->subDays(365))->whereDate('created_at','<',Carbon::yesterday()->subDays(90));
            }

        }
        if(isset($input['sent']))
        {
            $query->addSelect('status')->where('status',2);
        }
        if(isset($input['notchoise']))
        {
            $query->addSelect('status')->where('status',0);
        }
        if(isset($input['finished']))
        {
            $query->addSelect('status')->where('status',3);
        }
        if(isset($input['inworks']))
        {
            $query->addSelect('status')->where('status',1);
        }

        $orders=$query->orderBy('status','ASC')->paginate(20);
        $orders->load('users','order_items');
        //    $orders->load('users','order_items');
        // конец загрузки таблицы orders
        //
        //
        return $orders;
    }



}
