<?php

namespace Corp\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Cache;
use Corp\Models\Category;
use Corp\Models\Directory;
use DB;

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
    protected $myClass;

    protected $config=[];

    public function init($a){

        if( $a === null ){
            $this->tpl = 'menu';
            $this->config=['tpl'=>$a];
            $this->tpl = '.php';
        } else {$this->tpl = $a; }

    }

    public function run()
    {
        if(!$this->config) {
            $this->config=['tpl'=>'menu.php'];
            $this->tpl='menu.php';
        } else {
            //    $this->config=['tpl'=>'select.php'];
            if(isset($this->config['model'])) {
            $this->model= $this->config['model'];
            }
            if(isset($this->config['class'])) {
            $this->myClass=$this->config['class'];
            }
            if(isset($this->config['tpl'])) {
                $this->tpl=$this->config['tpl'];
            }
          if($this->config['tpl']=='select.php')   $this->tpl='select.php';
            if($this->config['tpl']=='select_product.php')  $this->tpl='select_product.php';
        }
        // get cache

       if($this->tpl=='menu.php'){
            $menu = Cache::get('menu');
           if($menu) return $menu;
        }
if( $this->myClass!='Directory') {
    $categories=Category::all();
}
       else  $categories=Directory::all();


        $keyd=$categories->keyBy('id');
        $this->data=$keyd->toArray();
       // dump($this->data);


        $this->tree = $this->getTree();
      //  echo '<pre>'.print_r($this->tree, true).'</pre>';
        $this->menuHtml = $this->getMenuHtml($this->tree);

        // set cache

        if($this->tpl == 'menu.php') {
            Cache::put('menu', $this->menuHtml, 60);
        }

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
        $sas=$this->tpl;
        include __DIR__ . '/menu_tpl/' . $this->tpl;

        return ob_get_clean();
    }


}