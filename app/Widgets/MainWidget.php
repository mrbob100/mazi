<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Cache;
use App\Models\Category;


class MainWidget extends AbstractWidget
{
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menuHtml;

    protected $config=[];

    public function init(){

        if( $this->tpl === null ){
            $this->tpl = 'menu';
            $this->config=['tpl'=>'menu.php'];
        }
        $this->tpl .= '.php';
    }

    public function run()
    {
        if(!$this->config)  $this->config=['tpl'=>'menu.php'];
        // get cache

  /*      if($this->tpl == 'menu.php'){
            $menu = Cache::get('menu');
           if($menu) return $menu;
        }
*/
        $categories=Category::all();
        $keyd=$categories->keyBy('id');
        $this->data=$keyd->toArray();
       // dump($this->data);


        $this->tree = $this->getTree();
      //  echo '<pre>'.print_r($this->tree, true).'</pre>';
        $this->menuHtml = $this->getMenuHtml($this->tree);

        // set cache
/*
        if($this->tpl == 'menu.php') {
            Cache::put('menu', $this->menuHtml, 60);
        }
*/
        // dump($this->menuHtml);
        return $this->menuHtml;

    }

    protected function getTree(){
        $tree = [];
        foreach ($this->data as $id=>&$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }

        return $tree;
    }

    protected function getMenuHtml($tree, $tab=''){
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category,$tab);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }


}