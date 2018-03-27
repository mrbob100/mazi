<?php

namespace Corp\Http\Controllers;

//use Illuminate\Support\Facades\Request;
use Corp\Repositories\NewproductRepository;
use Corp\Repositories\ProductsRepository;
use Corp\Repositories\SlidersRepository;
use Corp\Models\Category;
use Corp\Models\Product;
//use GuzzleHttp\Psr7\Response;
use Response;
use Request;
use Config;
use Session;
use DB;
use Cache;
class CategoryController extends SiteController  // выбор из бокового меню - категорий
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

    public function index($id)
    {
      /*  $sliderItems = $this->getSliders(); // пункты кадров слайдера
        $sliders = view(env('THEME') . '.slider')->with('sliders', $sliderItems)->render();
        $this->vars = array_add($this->vars, 'sliders', $sliders);
*/
        Session::pull('Category');
      if(!session('Category')) Session::push('Category',['id'=>$id]);
        $this->category_id=$id;
        $products=$this->getProducts($id);
        If(!$products) return redirect('/');
        $prod=$products[0];
        $prod->load('categories');


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


        $content=view(env('THEME').'.products_content')->with(['products'=>$products,'adopt'=>$this->adopt])->render();
        $this->vars=array_add($this->vars,  'content', $content);

       /* $articles=$this->getArticles($cat_alias);
        $content=view(env('THEME').'.articles_content')->with('articles',$articles)->render();
        $this->vars=array_add($this->vars,'content', $content); */

        $this->keywords=$prod->categories->keywords;
        $this->meta_desc=$prod->categories->description;
        $this->title='Категория '.$prod->categories->name;

        return $this->renderOutput();
     // if(Request::has('id')) $id=Request::__get('id');

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
        $products= $this->p_rep->get(['id','name','code','img','type','price','description','groupTools','new','class','company','country','packing','exactlyType1','category_id','keywords','meta_desc'], false,true,$were);
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


//______________________________________________________________________________________________________________________

public function resumeIndex()
{


    $id_cat =Session::get('Category');

    $request=Request::createFromGlobals();
    //Session::flush();
    if($request->isMethod('post'))
    {
        $this->template=env('THEME').'.both_bars';
       // $this->bar=false;
        $input = $request->except('_token');
        $p_inp=explode('-',$input['pricer']);
     //   $p_inp1=mb_substr($p_inp[0],3);
    //    $p_inp2=mb_substr($p_inp[1],3);
        $p_inp1=explode('.',$p_inp[0]);
        $p_inp2=explode('.',$p_inp[1]);

        $query=DB::table('products')->whereBetween('price',[$p_inp1[1],$p_inp2[1]])->select('*')->where('category_id',$id_cat[0]);
        unset($input['pricer']);
               if(isset($input['menuFirms']))
                {
                   $query->addSelect('company')->where('company',$input['menuFirms']);
                  unset($input['menuFirms']);
                }
                if(isset($input['menuCountries']))
                {
                  // $counterer=mb_strtolower($input['menuCountries'],'UTF-8');
                    $query->addSelect('country')->where('country',$input['menuCountries']);
                    unset($input['menuCountries']);
                }


                if(isset($input['menuComplect']))  // чемоданы ,кейсы, картонные коробки
                {
                    //$counterer=mb_strtolower($input['menuComplect'],'UTF-8');
                    $query->addSelect('packing')->where('packing',$input['menuComplect']);
                    unset($input['menuComplect']);
                }
                if(isset($input['menuTools']))  // пилы
                {
                    $query->addSelect('groupTools')->where('groupTools',$input['menuTools']);
                    unset($input['menuTools']);
                }

                if(isset($input['menuTools2'])) // вибромашины
                {
                    $query->addSelect('groupTools')->where('groupTools',$input['menuTools2']);
                   unset($input['menuTools2']);
                }

                if(isset($input['dop_options'])) // ударные
                {
                    $query->addSelect('groupTools')->where('groupTools',6);
                    unset($input['dop_options']);
                }
                if(isset($input['dop_options1'])) //  и безударные
                {
                    $query->addSelect('groupTools')->where('groupTools',7);
                    unset($input['dop_options1']);
                }
     /*   if(isset($input['dzen'])) //  типы электрическая. батарейки...
        {
            $query->addSelect('type')->where('type',$input['dzen']);
            unset($input['dzen']);
        } */



     //   $products=$query->get(['id','name','code','description','img','price','type','country','groupTools','new','weightbrutto','weightnetto', 'length','height','exactlyType1','category_id','keywords','meta_desc']);
        $productsItem=$query->get();

       // $productsItem->load('categories');


      //  $products=$this->getProducts( $id_cat);
       // dd($productsItem);

        $productsItem->transform(function ($item, $key){
            if(is_string($item->img) && is_object(json_decode($item->img))&& json_last_error()==JSON_ERROR_NONE)
            {   $item->img=json_decode($item->img); }
            if(is_string($item->exactlyType1) && is_object(json_decode($item->exactlyType1))&& json_last_error()==JSON_ERROR_NONE)
            {   $item->exactlyType1=json_decode($item->exactlyType1); }
            return $item;
        });
        $vars=[];
       // $inputSave=$input;
        if($input)
        {

            foreach($input as $k=>$item)
            {
                   foreach($productsItem as $product)
                   {



                        $sa=$item;

                        if((isset($product->exactlyType1->$k))&&($item==$product->exactlyType1->$k))
                        {
                            $sas=$product->exactlyType1->$k;
                            array_push($vars,$product);
                        }

                  }
                $productsItem=$vars;
                $vars=[];
           }
        }
       /* $cnt=count($vars);
        $productsIt=[];
      if($cnt>0)
      {
          for($j=0; $j<$cnt; $j++)
          {
              $productsIt[$j]=array_pop($vars);
          }
      }
        $productsItem=$productsIt; */

$category=Category::where('id', $id_cat)->first();
        $content=view(env('THEME').'.products_choise')->with(['productsItem'=>$productsItem,'category'=>$category])->render();
       // $this->vars=array_add($this->vars,  'content', $content);

        /* $articles=$this->getArticles($cat_alias);
         $content=view(env('THEME').'.articles_content')->with('articles',$articles)->render();
         $this->vars=array_add($this->vars,'content', $content);*/



      //  return $this->renderOutput();
       // return view($this->template)->with($this->vars);
        return Response::json(['success'=>true, 'content'=>$content]);
    }
    exit();
}

//______________________________________________________________________________________________________________________


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($alias=false)
    {
        $article=$this->a_rep->one($alias, ['comments'=>true]);
        //dd( $article->comments->groupBy('parent_id'));
        if($article) $article->img=json_decode($article->img);

        $this->title=$article->title;
        $this->meta_desc=$article->meta_desc;
        $this->keywords=$article->keywords;
        $content=view(env('THEME').'.article_content')->with('article',$article)->render();
        $this->vars=array_add($this->vars,'content', $content);

        $portfolios=$this->getPortfolios(config('settings.resent_portfolios'));
        $comments=$this->getComments(config('settings.resent_comments'));
        //dd($portfolios);
        $this->contentRightBar=view(env('THEME').'.articleBar')->with(['comments'=>$comments,'portfolios'=>$portfolios])->render();

        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
