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


Route::get('/', 'IndexController@index');
Route::get('article/{page}', 'IndexController@show')->name('articleShow');
Route::delete('page/delete/{article}', function(\App\Product $product) {

    $article_tmp = \App\Models\Product::where('id', $product)->first;

    //dd($article);


    $product->delete();
    return redirect('/');

})->name('articleDelete');

Route::get('loadcsv',['uses'=>'Admin\CsvloadController@index','as'=>'loadCsv']);
Route::post('loadcsv','Admin\CsvloadController@store')->name('storeCsv');