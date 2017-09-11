<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Validator;
use Corp\Models\Category;
class CategoryAddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if($request->isMethod('post'))
       {
           $input=$request->except('_token');

           //валидация данных
           $validator=Validator::make($input,[
               'name'=>'required |unique:categories| max:255',
               'parent_id'=>'min:0'

           ]);
           if( $validator->fails())
           {
               return redirect()->route('categoryAdd')->withErrors( $validator)->withInput();
           }
           // загрузка изображений
           // if($request->hasFile('images')) {
         //  $file=$request->file('images');
        //   $input['images']= $file->getClientOriginalName(); // вставка реального имени
           // move - команда перемещения файла из временного хранилища в постоянное
        //   $file->move(public_path().'/assets/img',$input['images']);  // записывает в библиотеку public содержимое файла $input['images']
           // }
           //dd($input);
           $category=new Category();
           //  $category->unguard(); // снимает ограничения fillable
           $category->fill($input);  // заполнение полей category

           if($category->save())
           {
               return redirect('admin')->with('status','Категория добавлена');
           }
       }
        if(view()->exists('admin.categories.category_add'))
        {
            $data=[
             'title' =>'Новая страница'
            ];
            return view('admin.categories.category_add', $data);
        }
        abort(404);
    }


}
