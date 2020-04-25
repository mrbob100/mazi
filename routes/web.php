<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(/**
 *
 */
    [], function(){
Route::get('/', 'IndexController@index')->name('index');
    Route::get('redirect', 'CartController@cartRedirect')->name('redirectCart');

 Route::post('cabanal',['uses'=>'CabinetController@caboption','as'=>'cabAnalize']);

//Route::get('cabinet', 'CabinetController@index')->name('cabinet');
Route::match(['post','get'],'cabinet',['uses'=> 'CabinetController@index','as'=>'cabinet']);
    Route::match(['post','get'],'change',['uses'=> 'IndexController@identityUser','as'=>'change']);
//Route::resource('/', 'IndexController', ['only' => 'index', 'names' => ['index' => 'home']]);
//Route::get('article/{page}', 'IndexController@show')->name('articleShow');
//Route::delete('page/delete/{article}', function(\App\Product $product) {

//    $article_tmp = \App\Models\Product::where('id', $product)->first;

    //dd($article);


  //  $product->delete();
 //   return redirect('/');

//})->name('articleDelete');

// маршрут новых, распродажа и топовых прдуктов
    Route::get('actionSell', ['uses'=>'ActionController@index', 'as'=>'actionSell']);

Route::get('loadcsv',['uses'=>'Admin\CsvloadController@index','as'=>'loadCsv']);
Route::post('loadcsv','Admin\CsvloadController@store')->name('storeCsv');
Route::get('updateJson',['uses'=>'Admin\CsvloadController@updateJsonProduct','as'=>'jsonProduct']);


//________________________________________________________________________________________________
// временная вставка маршрутов для отладки CSV
    Route::get('import', 'ImportController@getImport')->name('import');
    Route::post('/import_parse', 'ImportController@parseImport')->name('import_parse');
    Route::post('/import_process', 'ImportController@processImport')->name('import_process');
//________________________________________________________________________________________________

// работа с левым меню
Route::get('category',['uses'=>'CategoryController@index','as'=>'category']);
//Route::get('leftside',['uses'=>'CategoryleftController@index','as'=>'left']);
Route::get('categoryleft',['uses'=>'CategoryLeftController@index','as'=>'categoryleft']);
//Route::match(['get','post'],'category',['uses'=>'PreciseController@Index','as'=>'resume']);
Route::post('catRes',['uses'=>'CategoryController@resumeIndex','as'=>'resume']);
// стандартные маршруты  для аутенфикации
  //  Route::group(['prefix'=>'product'], function() {
 Route::get('product', ['uses'=>'ProductController@index', 'as'=>'product']);
 Route::match(['get','post'],'quickregister', ['uses'=>'QuickregisterController@index', 'as'=>'quickregister']);

 //   });
// работа с корзиной
Route::get('addcartios',['uses'=>'CartController@index', 'as'=>'addcartios']);
Route::get('changeQty',['uses'=>'PreciseController@changeQuantity','as'=>'changeBuy']);
 Route::get('cartShow',['uses'=>'CartController@cartShow', 'as'=>'cartShow']);
 Route::get('cartload',['uses'=>'CartController@loadCart', 'as'=>'cartload']);


Route::get('clear',['uses'=>'CartController@clear', 'as'=>'clearance']);
Route::get('arrange',['uses'=>'CartController@cartView', 'as'=>'arrangeContract']);
Route::post('contract',['uses'=>'CartController@cartView', 'as'=>'contract']);

Route::get('delIt',['uses'=>'CartController@DelItem']);

 Route::match(['get','post'],'search',['uses'=>'ProductController@actionSearch','as'=>'productSearch']);
 Route::get('admsearch',['uses'=>'ProductController@adminSearch','as'=>'admSearch']);

    Route::get('ulogin', ['uses'=>'UloginController@login', 'as'=>'ulogina']);
});


Route::get('ckeditor-demo',function(){
    return view('ckeditor.index');
});



Auth::routes();
Route::get('home', 'HomeController@login')->name('home');
// Activation user.
//Route::get('activate/{id}/{token}', 'Auth/RegisterController@activation')->name('activation');


Route::get('get_captcha/{config?}', function (\Mews\Captcha\Captcha $captcha, $config = 'default') {
    return $captcha->src($config);
});



// хлебные крошки




// маршруты для синего меню
Route::get('categoryMain', ['uses'=>'CategoryMainController@index', 'as'=>'catmain']);
Route::get('categorysub', ['uses'=>'CategorySubController@index', 'as'=>'catsub']);
Route::get('categorysuper', ['uses'=>'CategorySuperController@index', 'as'=>'super']);
Route::get('difference', ['uses'=>'DifferenceProductController@index', 'as'=>'differ']);


Route::group(['prefix'=>'admin','middleware'=>['web','auth']], function(){

    // Main page
    Route::get('/', function (){
        $user=Auth::user();
        if(!Auth::check()) {
            return redirect()->back();
        }
        $role_id=0;
        $roleIds=$user->roles;
        foreach( $roleIds as $role)
        {
            $item = $role->id;
            $alias = $role->name;
            if ($item == 1) {
                $role_id = 1;
                break;
            }
        }
        if( $role_id!=1)  {
            return redirect('ulogin');
        }
     if(view()->exists(env('THEME').'.admin.categories.index'))
         {
             $data=['title'=>'Панель администратора'];
           return view(env('THEME').'.admin.categories.index',$data);
           // return view(env('THEME').'.admin.layouts.patternAdmin',$data);
           //  return redirect()->route('handbooks');
         }
    });

    Route::match(['get','post'],'/images','Admin\ImageController@create')->name('images');
    Route::match(['get','post'],'/store','Admin\ImageController@store')->name('store');
    Route::get('img',['uses'=>'Admin\ImageController@index','as'=>'image']);
//Excel
    Route::get('excelitem', ['uses'=>'Admin\ExcelitemController@index','as'=>'excelIt']);
    Route::match(['get','post'],'excelitem/import', ['uses'=>'Admin\ExcelitemController@import','as'=>'importIt']);
    Route::post('exportHotline', ['uses'=>'Admin\ExcelitemController@export','as'=>'exportHotline']);



    Route::get('storage/{filename}', function ($filename)
    {
        $filename='storage/priceXML.xls';
        $path = storage_path('public/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    })->name('storage');

    Route::get('contentfile', ['uses'=>'Admin\ContentfileController@index','as'=>'contfile']);




    // Actions
    Route::group(['prefix'=>'categories'], function (){
        Route::get('/', ['uses'=>'Admin\CategoryController@index','as'=>'categories']);
        //admin/products/add
        Route::match(['get','post'],'/add',['uses'=>'Admin\CategoryAddController@index', 'as'=>'categoryAdd']);
        //admin/product/edit/2
        Route::match(['get','post','delete'],'edit/{id}',['uses'=>'Admin\CategoryEditController@index','as'=>'categoryEdit']);
    });
    // обработка сообщений от пользователя
    Route::group(['prefix'=>'quickinfo'], function (){
        Route::get('/', ['uses'=>'Admin\QuickinformController@index','as'=>'quickinfo']);

        //admin/product/edit/2
        Route::match(['get','post','delete'],'edit/{id}',['uses'=>'Admin\QuickinformEditController@index','as'=>'quickinfoEdit']);
    });


    // Actions
    Route::group(['prefix'=>'products'], function (){
        Route::get('/', ['uses'=>'Admin\ProductController@index','as'=>'products']);
        //admin/products/add
        Route::match(['get','post'],'/add',['uses'=>'Admin\ProductAddController@index', 'as'=>'productAdd']);
        //admin/product/edit/2
        Route::match(['get','post','delete'],'edit/{id}',['uses'=>'Admin\ProductEditController@index','as'=>'productEdit']);
    });

    // Actions
    Route::group(['prefix'=>'orders'], function (){
        Route::get('/', ['uses'=>'Admin\OrderController@index','as'=>'orders']);
        //admin/products/add
        Route::match(['get','post'],'/add',['uses'=>'Admin\OrderAddController@index', 'as'=>'orderAdd']);
        //admin/product/edit/2
        Route::match(['get','post','delete'],'edit/{id}',['uses'=>'Admin\OrderEditController@index','as'=>'orderEdit']);
    });

    // Actions
    Route::group(['prefix'=>'orderItems'], function (){
      //  Route::get('/', ['uses'=>'Admin\OrderItemsController@index','as'=>'orderItems']);
        //admin/products/add
        Route::match(['get','post'],'/',['uses'=>'Admin\OrderItemsController@index', 'as'=>'orderItems']);
        //admin/product/edit/2
        Route::match(['get','post','delete'],'edit/{id}',['uses'=>'Admin\OrderItemsEditController@index','as'=>'orderItemsEdit']);
    });

    Route::group(['prefix'=>'directories'], function (){
        Route::get('/', ['uses'=>'Admin\DirectoryController@index','as'=>'directories']);
        //admin/products/add
        Route::match(['get','post'],'/add',['uses'=>'Admin\DirectoryAddController@index', 'as'=>'directoriesAdd']);
        //admin/product/edit/2
        Route::match(['get','post','delete'],'edit/{id}',['uses'=>'Admin\DirectoryEditController@index','as'=>'directoriesEdit']);
    });

    Route::group(['prefix'=>'handbooks'], function (){
        Route::get('/', ['uses'=>'Admin\HandbookController@index','as'=>'handbooks']);

        //admin/products/add
        Route::match(['get','post'],'/add',['uses'=>'Admin\HandbookAddController@index', 'as'=>'handbooksAdd']);
        //admin/product/edit/2
        Route::match(['get','post','delete'],'edit/{id}',['uses'=>'Admin\HandbookEditController@index','as'=>'handbooksEdit']);
    });

    Route::group(['prefix'=>'users'], function (){
        // пользовате с кодом =3
        Route::get('/{id?}', ['uses'=>'Admin\UsersOnController@index','as'=>'userson']);
        Route::match(['get','post','delete'],'/work/{id?}',['uses'=>'Admin\UsersShowController@index', 'as'=>'showup']);

    });
    Route::group(['prefix'=>'sliders'], function (){
        // пользовате с кодом =3
        Route::get('/', ['uses'=>'Admin\SliderController@index','as'=>'slider']);
        Route::match(['get','post'],'/add',['uses'=>'Admin\SliderAddController@index', 'as'=>'sliderAdd']);
        Route::match(['get','post','delete'],'edit/{id?}',['uses'=>'Admin\SliderEditController@index', 'as'=>'sliderEdit']);

    });

    Route::match(['get','post','delete'],'/work/{id?}',['uses'=>'Admin\UsersShowController@index', 'as'=>'showup']);
    Route::match(['get','post'],'/show',['uses'=>'Admin\UsersShowController@index', 'as'=>'usershow']);
    Route::match(['get','post','delete'],'up/{id}',['uses'=>'Admin\UsersUpController@index','as'=>'userup']);

});


