<?php

namespace Corp\Http\Controllers;
use Corp\Models\Product;
use Corp\Widgets\MainWidget;
use Cache;
use Illuminate\Http\Request;
use Symfony\Component\Routing\RequestContext;
use Corp\Repositories\ProductsRepository;
class ProductController extends SiteController
{

    public function __construct(  ProductsRepository $p_rep)
    {
        parent::__construct(new \Corp\Repositories\MenusRepositories(new \Corp\Models\Menu));
       // $this->s_rep=$s_rep; // slider
        // $this->p_rep=$p_rep;  // portfolio
        $this->p_rep=$p_rep;  // products
        //   $this->bar='left'; // устанавливает сайт бар значения: left, right, no
        $this->template=env('THEME').'.product';
    }

    // public function index($id)
    public function index(Request $request)
    {
        // print_r($request->all());

        $id = $request->id;
        //   $context= new RequestContext();
        //  $context->fromRequest($request);

        //  $akkord = new MainWidget();
        //  $akkord->init();
        //  $akkordeon= $akkord->run();
        $products = $this->getProduct($id);
        //dd( $productItem);
        $content = view(env('THEME') . '.product_content')->with('products', $products)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        

     /*   $products=$this->getProducts($id);
        //dd($productItems);
        $content=view(env('THEME').'.products_content')->with('products',$products)->render();
        $this->vars=array_add($this->vars,  'content', $content); */
// добавление имен файлов в карусель flexslider
        /*    $lab1= explode('.',$product->mini);
            $test1=strval($lab1[0]);
            $test2=strlen($test1);
            $alfa=substr($test1,2,10);
            $alfa2=$alfa+1;
            $alfa3=$alfa+2;
            if($test2>3){
                $base=substr($test1,0,$test2-2);
            } else { $base=substr($test1,0,$test2-1); }

            $common1=$base.$alfa2.'.'.$lab1[1];
            $common2=$base.$alfa3.'.'.$lab1[1];
           // dump($product);
    */
    //    $this->keywords =  $products->keywords;
    //    $this->meta_desc = $products->meta_desc;
    //    $this->title = $products->name;

        return $this->renderOutput();
    }

    protected function getProduct($alias=false)
    {
        $id=false;
        $were=false;
        if($alias) {

            //  $id=Category::select('id')->where('id',$alias)->first()->id;
            //  $id=DB::table('categories')->select('id')->where('alias',$alias)->get();

            $were=['id',$alias];
        }
        $product= $this->p_rep->get(['id','name','code','description','img','price','type','country','new','weightbrutto','weightnetto', 'range','height','exactlyType1','category_id','keywords','meta_desc'], false,true,$were);
        // if($products) $articles->load('user','category','comments');
        //
        // dd( $product);
        return $product;
    }

}
