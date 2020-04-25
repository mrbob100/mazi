<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Corp\Repositories\NewproductRepository;
use Corp\Repositories\ProductsRepository;
use Corp\Repositories\SlidersRepository;
use Corp\Models\Category;
use Corp\Models\Product;
//use GuzzleHttp\Psr7\Response;
use Response;
//use Request;
use Config;
use Session;
use DB;
use Cache;
class CategoryleftController extends SiteController
{
    public function __construct( ProductsRepository $p_rep, SlidersRepository $s_rep)
    {
        parent::__construct(new \Corp\Repositories\MenusRepositories(new \Corp\Models\Menu));

        $this->p_rep=$p_rep;  // portfolio
        // $this->a_rep=$a_rep;  // articles
        $this->s_rep=$s_rep;
        $this->template=env('THEME').'.left_bar';
        $this->bar=true;  // устанавливает сайт бар значения: left, right, no

    }

    public function index(Request $request)
    {
        /*  $sliderItems = $this->getSliders(); // пункты кадров слайдера
          $sliders = view(env('THEME') . '.slider')->with('sliders', $sliderItems)->render();
          $this->vars = array_add($this->vars, 'sliders', $sliders);
  */
        $id=$request->id;
        Session::pull('Category');
        if(!session('Category')) Session::push('Category',['id'=>$id]);
        $this->category_id=$id;
        if(!$id) return redirect('/');
        $products=$this->getProducts($id);
        If(!$products) return redirect('/');
        $prod=$products[0];
        $prod->load('categories');
        $category=Category::where('id',$this->category_id);
        if(!isset($category->text)) {
            $sigma="Привет ! Все хорошо, это проверка";
        } else  $sigma=$category->text;
        //   dd($products);
        // блок перебора продукции и подсчета компаний , типов , фирм и т.д.
        $cnt=count($products);
        $aree=[];

        $countries=[]; $profile1=[]; $companies=[]; $profile2=[];
        $impact=[]; $packs=[];
        $notImpact=[]; $powers=[];
        $typeProducts=[];

        for($i=0; $i<$cnt; $i++)
        {
            $sas=$products[$i];
            $aree[$i]= $sas->price;
            //выбор страны
            if(isset($countries[$sas->country][1])&& ($countries[$sas->country][1]==$sas->country))
            {
                $countries[$sas->country][2]+=1;
            }
            else
            {
                $countries[$sas->country][1]=$sas->country;
                $countries[$sas->country][2]=1;
            }
            // выбор профиля пилы
            //<option value="2">Эксцентриковые</option>
            // <option value="3">Сабельные</option>
            // <option value="4">Торцовые</option>
            //<option value="5">Дисковые</option>
            // <option value="9">Лобзиковые</option>
            // <option value="10">Пеноматериал</option>
            // <option value="11">Цепные</option>
            if(($sas->groupTools>1&&($sas->groupTools<6))||($sas->groupTools>8)&&($sas->groupTools<12))
            {
                if(isset($profile1[$sas->groupTools][1])&& ($profile1[$sas->groupTools][1]==$sas->groupTools))
                {
                    $profile1[$sas->groupTools][2]+=1;
                }
                else
                {
                    $profile1[$sas->groupTools][1]=$sas->groupTools;
                    $profile1[$sas->groupTools][2]=1;
                }

            }

            // выбор профиля шлифмашины
            //   <option value="1">Вибромашины</option>
            // <option value="8">Ленточные</option>
            // <option value="12">Угловые</option>
            // <option value="13">Прямая</option>
            // <option value="14">Шлифмашина по бетону</option>

            if(($sas->groupTools==1) || ($sas->groupTools==8)||($sas->groupTools==12)||($sas->groupTools==13)||($sas->groupTools==14))
            {
                if(isset($profile2[$sas->groupTools][1])&& ($profile2[$sas->groupTools][1]==$sas->groupTools))
                {
                    $profile2[$sas->groupTools][2]+=1;
                }
                else
                {
                    $profile2[$sas->groupTools][1]=$sas->groupTools;
                    $profile2[$sas->groupTools][2]=1;
                }

            }
// выбор ударной дрели
            if($sas->groupTools==6)
            {
                if(isset( $impact[$sas->groupTools][1])&& ( $impact[$sas->groupTools][1]==$sas->groupTools))
                {
                    $impact[$sas->groupTools][2]+=1;
                }
                else
                {
                    $impact[$sas->groupTools][1]=$sas->groupTools;
                    $impact[$sas->groupTools][2]=1;
                }

            }

            // выбор безударной дрели
            if($sas->groupTools==7)
            {
                if(isset(  $notImpact[$sas->groupTools][1])&& ( $notImpact[$sas->groupTools][1]==$sas->groupTools))
                {
                    $notImpact[$sas->groupTools][2]+=1;
                }
                else
                {
                    $notImpact[$sas->groupTools][1]=$sas->groupTools;
                    $notImpact[$sas->groupTools][2]=1;
                }

            }


// выбор компании
            // BOSCH
            // Dremel
            if(isset($companies[$sas->company][1])&& ($companies[$sas->company][1]==$sas->company))
            {
                $companies[$sas->company][2]+=1;
            }
            else
            {
                $companies[$sas->company][1]=$sas->company;
                $companies[$sas->company][2]=1;
            }

// выбор упаковки
            //чемодан
            //картон
            if(isset( $packs[$sas->packing][1])&& ( $packs[$sas->packing][1]==$sas->packing))
            {
                $packs[$sas->packing][2]+=1;
            }
            else
            {
                $packs[$sas->packing][1]=$sas->packing;
                $packs[$sas->packing][2]=1;
            }



            if(isset($sas->exactlyType1)) // если параметр не пустой здесь вытаскиваются json параметры

            {
                /* $products[$i]->transform(function ($item, $key){
                     if(is_string($item->exactlyType1) && is_object(json_decode($item->exactlyType1))&& json_last_error()==JSON_ERROR_NONE)
                     {   $item->exactlyType1=json_decode($item->exactlyType1); }
                     return $item;
                 });*/

                foreach ($sas->exactlyType1 as $k=>$type)
                {
                    if (isset($typeProducts[$k][$type])) {
                        $typeProducts[$k][$type][2] += 1;

                    } else
                    {

                        $typeProducts[$k][$type][1] = $type;
                        $typeProducts[$k][$type][2] = 1;
                    }

                }

                /*   if(isset($sas->exactlyType1->power)) // если описана мощность
                   {
                       if(isset( $powers[$sas->exactlyType1->power][1])&& ( $powers[$sas->exactlyType1->power][1]==$sas->exactlyType1->power))
                       {
                           $powers[$sas->exactlyType1->power][2]+=1;
                       }
                       else
                       {
                           $powers[$sas->exactlyType1->power][1]=$sas->exactlyType1->power;
                           $powers[$sas->exactlyType1->power][2]=1;
                       }
                   } */
            }




        }  // конец цикла for
        $maxValue = collect($aree)->max();
        $maxValue+=10;
        $minValue=collect($aree)->min();

        $this->data=[
            'companies'=>$companies,
            'countries' =>   $countries,
            'profile1' => $profile1,
            'profile2' => $profile2,
            'impact'=> $impact,
            'notImpact'=> $notImpact,
            'packs'=>$packs,
            'powers'=>$powers,
            'minValue'=>$minValue,
            'maxValue'=>$maxValue,
            'typeProducts'=>$typeProducts,

        ];


        $content=view(env('THEME').'.products_left_content')->with(['products'=>$products,'adopt'=>$this->adopt])->render();
        //$this->vars=array_add($this->vars,  'content', $content);
        $leftBar=view(env('THEME').'.left_bar_content')->with([/*'cat'=>$this->category_id,*/'data'=>$this->data])->render();
        if(session('cardCommon.sum')) {
            $grivna=session('cardCommon.sum');
        }
        else $grivna=0;

        $commonSum=view(env('THEME').'.right_bar_buttom')->render();
        //  Session::pull('leftBar');
        // if(!session('leftBar')) Session::push('leftBar',['left'=> $this->data,'cat'=>$this->category_id]);
        // $this->vars=array_add($this->vars,'leftBar', $leftBar);
        //$this->vars=array_add($this->vars,'bar', $bar);

        /* $articles=$this->getArticles($cat_alias);
         $content=view(env('THEME').'.articles_content')->with('articles',$articles)->render();
         $this->vars=array_add($this->vars,'content', $content); */

        $this->keywords=$prod->categories->keywords;
        $this->meta_desc=$prod->categories->description;
        $this->title='Категория '.$prod->categories->name;

        // return $this->renderOutput();
        // if(Request::has('id')) $id=Request::__get('id');
        return Response::json(['success'=>true, 'content'=>$content, 'leftBar'=>$leftBar ,'commonSum'=>$commonSum, 'sigma'=>$sigma]);
    }

    protected function getProducts($alias=false)
    {
        $id=false;
        $were=false;
        if($alias) {

            //  $id=Category::select('id')->where('id',$alias)->first()->id;
            //  $id=DB::table('categories')->select('id')->where('alias',$alias)->get();

            $were=['category_id',$alias];
        }
        $products= $this->p_rep->get(['id','name','code','img','type','price','description','groupTools','new','class','company','country','packing','exactlyType1','category_id','keywords','meta_desc'], false,false,$were);
        // if($products) $articles->load('user','category','comments');
        // dd($id);

        return $products;
    }

    public function getSliders()
    {
        $sliders =$this->s_rep->get();
        // dd($sliders);
        if($sliders->isEmpty()) return false;
        $sliders->transform( function ($item, $key){
            $item->path =Config::get('settings.slider_path') .'/'.$item->path;

            return $item;
        });
        // dd($sliders);
        return $sliders;
    }
}
