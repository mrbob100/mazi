<?php

namespace Corp\Http\Controllers;

//use Illuminate\Support\Facades\Request;
use Corp\Repositories\ProductsRepository;
use Corp\Repositories\SlidersRepository;
use Corp\Models\Category;
use Corp\Models\Product;
use Config;
class CategoryController extends SiteController
{
    public function __construct( ProductsRepository $p_rep, SlidersRepository $s_rep)
    {
        parent::__construct(new \Corp\Repositories\MenusRepositories(new \Corp\Models\Menu));

        $this->p_rep=$p_rep;  // portfolio
       // $this->a_rep=$a_rep;  // articles
        $this->s_rep=$s_rep;
        $this->bar='right'; // устанавливает сайт бар значения: left, right, no
        $this->template=env('THEME').'.products';
    }

    public function index($id)
    {
      /*  $sliderItems = $this->getSliders(); // пункты кадров слайдера
        $sliders = view(env('THEME') . '.slider')->with('sliders', $sliderItems)->render();
        $this->vars = array_add($this->vars, 'sliders', $sliders);
*/
        $products=$this->getProducts($id);
        //dd($productItems);
        $content=view(env('THEME').'.products_content')->with('products',$products)->render();
        $this->vars=array_add($this->vars,  'content', $content);

       /* $articles=$this->getArticles($cat_alias);
        $content=view(env('THEME').'.articles_content')->with('articles',$articles)->render();
        $this->vars=array_add($this->vars,'content', $content); */






        $this->keywords='Home Page';
        $this->meta_desc='Home Page';
        $this->title='Home Page';

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
        $products= $this->p_rep->get(['id','name','code','img','price','description','category_id','keywords','meta_desc'], false,true,$were);
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
