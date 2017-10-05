<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Menu;
use Corp\Repositories\MenusRepositories;
class SiteController extends Controller
{
    // protected $p_rep; // объект класса portfolio
    protected $s_rep; // объект класса slider
    protected $a_rep; // объект класса articles
    protected $m_rep; // объект класса menu
    protected $c_rep; // коментарии
    protected $template;  // имя конкретного шаблона
    protected $vars; // массив передаваемых объектов в шаблон
    protected $bar='no'; // есть ли side бар
    protected $keywords;
    protected $meta_desc;
    protected $title;
    protected $p_rep; // объект класса products
    protected $p_cart=false; // вывод корзины
    protected $contentRightBar=false;
    protected $contentLeftBar=false;

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


           $footer = view(env('THEME') . '.footer')->render();
           $this->vars = array_add($this->vars, 'footer', $footer);
       }
        return view($this->template)->with($this->vars); // template станавливается в дочернем классе
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
}
