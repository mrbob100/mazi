<?php

namespace Corp\Http\Controllers;

//use Illuminate\Http\Request;
use Corp\Repositories\ProductsRepository;
use Request;
use Config;
use Session;
class PreciseController extends SiteController // контроллер отзыв jquery
{
    public function __construct(  ProductsRepository $p_rep)
    {
        parent::__construct(new \Corp\Repositories\MenusRepositories(new \Corp\Models\Menu));
        // $this->s_rep=$s_rep; // slider
        // $this->p_rep=$p_rep;  // portfolio
        $this->p_rep=$p_rep;  // products
        //   $this->bar='left'; // устанавливает сайт бар значения: left, right, no
        $this->template=env('THEME').'.both_bars';

    }

    // public function index($id)
    // подпрограмма получает leftBar с количественными характеристиками выбранных элементов из jquery
    public function index()
    {
        $id_cat = Session::pull('Category');
        $request = Request::createFromGlobals();
        if ($request->isMethod('post')) {
            $this->template = env('THEME') . '.both_bars';
            $this->template=env('THEME').'.both_bars';

            $input = $request->except('_token');
            $p_inp=explode('-',$input['pricer']);
            //   $p_inp1=mb_substr($p_inp[0],3);
            //    $p_inp2=mb_substr($p_inp[1],3);
            $p_inp1=explode('.',$p_inp[0]);
            $p_inp2=explode('.',$p_inp[1]);
            $query=DB::table('products')->whereBetween('price',[$p_inp1[1],$p_inp2[1]])->select('*')->where('category_id',$id_cat[0]);

            if(isset($input['menuFirms']))
            {
                $query->addSelect('company')->where('company',$input['menuFirms']);
            }
            if(isset($input['menuCountries']))
            {
                $query->addSelect('country')->where('country',$input['menuCountries']);
            }

            /*     if($input['menuPower'])
                 {
                     $query->addSelect('company',$input['menuPower']);
                 }

           */
            if(isset($input['menuComplect']))  // чемоданы ,кейсы, картонные коробки
            {
                $query->addSelect('packing')->where('packing',$input['menuComplect']);
            }
            if(isset($input['menuTools']))  // пилы
            {
                $query->addSelect('groupTools')->where('groupTools',$input['menuTools']);
            }

            if(isset($input['menuTools2'])) // вибромашины
            {
                $query->addSelect('groupTools')->where('groupTools',$input['menuTools2']);
            }

            if(isset($input['dop_options'])) // ударные
            {
                $query->addSelect('groupTools')->where('groupTools',6);
            }
            if(isset($input['dop_options1'])) //  и безударные
            {
                $query->addSelect('groupTools')->where('groupTools',7);
            }


            //   $products=$query->get(['id','name','code','description','img','price','type','country','groupTools','new','weightbrutto','weightnetto', 'length','height','exactlyType1','category_id','keywords','meta_desc']);
            $productsItem=$query->get();

            //  $products=$this->getProducts( $id_cat);
            //dd($productItems);

            $productsItem->transform(function ($item, $key){
                if(is_string($item->img) && is_object(json_decode($item->img))&& json_last_error()==JSON_ERROR_NONE)
                {   $item->img=json_decode($item->img); }
                return $item;
            });

            $contentItem=view(env('THEME').'.products_choise')->with('productsItem',$productsItem)->render();
            $this->vars=array_add($this->vars,  'contentItem', $contentItem);

            /* $articles=$this->getArticles($cat_alias);
             $content=view(env('THEME').'.articles_content')->with('articles',$articles)->render();
             $this->vars=array_add($this->vars,'content', $content); */

            $this->keywords='Home Page';
            $this->meta_desc='Home Page';
            $this->title='Home Page';

            return $this->renderOutput();
        }
    }
}
