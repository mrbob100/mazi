<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Corp\Repositories\ProductsRepository;
use Corp\Models\Category;
use Response;

class ActionController extends SiteController
{
    public function __construct( ProductsRepository $p_rep)
    {
        parent::__construct(new \Corp\Repositories\MenusRepositories(new \Corp\Models\Menu));
        // $this->p_rep=$p_rep;  // portfolio
        $this->p_rep=$p_rep;  // products
        //   $this->bar='left'; // устанавливает сайт бар значения: left, right, no
        $this->template=env('THEME').'.index';
    }

    public function index(Request $request)
    {

        $categoryName='';
        $priznakSort=0;
        $priznakOut=0;
        $pr=0;
        $iu=0;
        $input = $request->except('_token');
        if(isset( $input['data']))
        {
            $priznakSort= $input['data'];
        }
        if(isset($input['vert']))
        {
            $priznakOut=($input['vert']); // признак вывода иконками или таблицей
        }

        if(isset($input['latitude']))
        {
            $priznakOut=11; // признак вывода иконками или таблицей
        }
        $newhit=['sale',1];

             if($input['pr'])
             {
                 $pr=$input['pr'];
                     if($input['pr']==30)
                     {
                         $categoryName="Распродажа";
                         $newhit=['sale',1];
                     }

                    if($input['pr']==50)
                    {
                        $categoryName="Лидеры продаж";
                       $newhit=['hit',1];
                    }

                    if($input['pr']==51)
                    {
                        $categoryName="Новинки";
                        $new=1;
                        $newhit=['new',1];
                    }
             }
        $products =$this->getProduct($priznakSort, $newhit);

        /*  $sliderItems->$this->check($sliderItems); */
        if( $products ->isEmpty()) return false;
        $products->load('categories');
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

        $cs=0;

        //  $articles=$this->getArticles(); // правый сайд бар
        // dd($sliderItems);
        //   $this->contentRightBar=view(env('THEME').'.indexBar')->with('articles',$articles)->render();
        // заголовок сайта


        if($priznakOut=='11')
        {
            $content=view(env('THEME').'.action_table_content')->with(['products'=>$products,'adopt'=>$this->adopt,'cs'=>$cs,'pr'=>$pr,'categoryName'=> $categoryName])->render();
        }
       else {
            $content=view(env('THEME').'.action_content')->with(['products'=>$products,'adopt'=>$this->adopt,'cs'=>$cs,'pr'=>$pr,'categoryName'=> $categoryName])->render();
            }
        $leftBar=view(env('THEME').'.left_bar_content')->with([/*'cat'=>$this->category_id,*/'data'=>$this->data])->render();
        $this->keywords = 'sale';
        $this->meta_desc = 'sale';
        $this->title = 'Sale';
        // return view('welcome');
        return Response::json(['success'=>true, 'content'=>$content, 'leftBar'=>$leftBar ]);
    }










    protected function getProduct( $priznakSort=0,$newhit=0)
    {


        $were=$newhit;

        $product= $this->p_rep->get(['id','name','code','description','img','price','pricedealer1','pricedealer2','type','country','class','groupTools','new','hit','sale','weightbrutto','weightnetto',
            'length','height','exactlyType1','category_id','keywords','meta_desc'], false,false,$were, $priznakSort);

        // dd( $product);
        $product->load('typeTools');
        return $product;
    }

}
