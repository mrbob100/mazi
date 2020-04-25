<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Validator;
use Session;
class HandbookAddController extends adminSiteController
{
   public function index(Request $request)
   {
       $books= Session::get('books');
       $singlebook=$books[0]['name1'];
       $prim=get_class( $singlebook);
       $book=new  $prim();
        $table= $book->table;

       if ($request->isMethod('post')) {
           $input = $request->except('_token');

           //валидация данных
           $validator = Validator::make($input, [
              'nick'=>'required | max:50',
               'name' => 'required|unique:'.$table.'| max:255'
           ]);
           Session::pull('books');
           if ($validator->fails()) {
               return redirect()->route('handbooksAdd')->withErrors($validator)->withInput();
           }



           $book->nick=$input['nick'];
           $book->name=$input['name'];

           if( $book->save())
           {
               return redirect('admin')->with('status','Позиция в справочник добавлена');
           }
       }

       if(view()->exists(env('THEME').'.admin.handbooks.index'))
       {
           $data=[
               'title' =>'Новая страница'
           ];

           $content = view(env('THEME').'.admin.handbooks.content_handbookAdd')->with(['data'=> $data])->render();
           $this->vars = array_add($this->vars, 'content', $content);  // вывод навигации меню
           return $this->renderOutput();

       }
       abort(404);
   }
}
