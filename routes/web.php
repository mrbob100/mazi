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
    ['middleware'=>'web'], function(){
Route::get('/', 'IndexController@index')->name('index');

//Route::resource('/', 'IndexController', ['only' => 'index', 'names' => ['index' => 'home']]);
//Route::get('article/{page}', 'IndexController@show')->name('articleShow');
//Route::delete('page/delete/{article}', function(\App\Product $product) {

//    $article_tmp = \App\Models\Product::where('id', $product)->first;

    //dd($article);


  //  $product->delete();
 //   return redirect('/');

//})->name('articleDelete');

Route::get('loadcsv',['uses'=>'Admin\CsvloadController@index','as'=>'loadCsv']);
Route::post('loadcsv','Admin\CsvloadController@store')->name('storeCsv');

Route::get('category/{id}',['uses'=>'CategoryController@index','as'=>'category']);

// стандартные маршруты  для аутенфикации
    Route::group(['prefix'=>'product'], function() {
        Route::get('/', ['uses'=>'ProductController@index', 'as'=>'product']);

    });
Route::get('addcartios',['uses'=>'CartController@index', 'as'=>'addcart']);
Route::get('clear',['uses'=>'CartController@clear', 'as'=>'clearance']);
Route::get('arrange',['uses'=>'CartController@cartView', 'as'=>'arrangeContract']);
Route::post('order',['uses'=>'CartController@cartView', 'as'=>'contract']);

Route::get('delIt',['uses'=>'CartController@DelItem']);



    Route::post('ulogin', ['uses'=>'UloginController@login', 'as'=>'ulogin']);
});



Auth::routes();
Route::get('home', 'HomeController@login')->name('home');


Route::group(['prefix'=>'admin','middleware'=>['web','auth']], function(){

    // Main page
    Route::get('/', function (){
        $user=Auth::user();
        if(!Auth::check()) {
            return redirect()->back();
        }


        if($user['login']!='admin')  {
            return redirect('ulogin');
        }
     if(view()->exists('admin.categories.index'))
         {
             $data=['title'=>'Панель администратора'];
             return view('admin.categories.index',$data);
         }
    });
    // Actions
    Route::group(['prefix'=>'categories'], function (){
        Route::get('/', ['uses'=>'Admin\CategoryController@index','as'=>'categories']);
        //admin/products/add
        Route::match(['get','post'],'/add',['uses'=>'Admin\CategoryAddController@index', 'as'=>'categoryAdd']);
        //admin/product/edit/2
        Route::match(['get','post','delete'],'edit/{id}',['uses'=>'Admin\CategoryEditController@index','as'=>'categoryEdit']);
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
        Route::get('/', ['uses'=>'Admin\OrderItemsController@index','as'=>'ordertItems']);
        //admin/products/add
        Route::match(['get','post'],'/add',['uses'=>'Admin\OrderItemsAddController@index', 'as'=>'orderItemsAdd']);
        //admin/product/edit/2
        Route::match(['get','post','delete'],'edit/{id}',['uses'=>'Admin\OrderItemsEditController@index','as'=>'orderItemsEdit']);
    });
});


