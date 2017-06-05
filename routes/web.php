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

Route::group(['middleware'=>'web'], function(){
Route::get('/', 'IndexController@index')->name('index');
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
Route::get('product/{id}',['uses'=>'ProductController@index','as'=>'product']);


// стандартные маршруты  для аутенфикации


    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
});





// Admin
//These are the roures of the administrat0r's panel





Route::group(['prefix'=>'admin','middleware'=>['web','auth']], function(){

    // Main page
    Route::get('/', function (){
     if(view()->exists('admin.index'))
         {
             $data=['title'=>'Панель администратора'];
             return view('admin.index',$data);
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


