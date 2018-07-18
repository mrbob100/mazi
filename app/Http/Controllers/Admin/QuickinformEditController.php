<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Models\QuickInformation;
use Validator;
use DB;
class QuickinformEditController extends Controller
{
    public function index( Request $request)
        // public function index(Category $category,Request $request)
    {
        $id = $request->id;
        if ($request->isMethod('delete'))
        {
            $inform=QuickInformation::where('id', $id)->delete();

            return redirect('admin')->with('status', 'Сообщение удалено');
        }
            if($request->isMethod('post'))
                {
                    $input = $request->except('_token');

                    $validator = Validator::make($input, [
                        // уникальное поле в таблице categories, поле - которое игнорируется, по какому полю поиск
                        'name' => 'required|max:120' . $input['id'],
                        'phone' => 'required|min:10|numeric',
                        'url' => 'required|max:255',

                    ]);


                    if ($validator->fails())
                    {
                        return redirect()->route('quickinfoEdit', ['id' => $input['id']])->withErrors($validator)->withInput();
                    }


                    $inform=new QuickInformation();
                    $inform->fill($input); //заполнение полей category значениями $input

                    $cat=DB::table('quickInformations')->where('id',$id)->update($inform->toArray());
                    if($cat)
                    {
                        return redirect('admin')->with('status','Сообщение обновлено !');
                    }
                    else abort(404);
                }

        $old=QuickInformation::find($id);
        //  $old=$category->toArray();
        //  dd($old);


//$model=$old;
        if(view()->exists(env('THEME').'.admin.quickinform.edit'))
        {
            $data=[
                'title'=>'Редактирование сообщения -'.$old['name'],
                'data'=>$old,



            ];
            return view(env('THEME').'.admin.quickinform.edit',$data,['model'=>$old]);
        }
        abort(404);


    }
}
