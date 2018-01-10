<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Models\Excelitem;
use Excel;
use DB;
use Storage;
use Corp\Models\Product;
class ExcelitemController extends Controller
{
    public function index()
    {
        return view(env('THEME').'.admin.excels.excelitems');
    }

    /**
     * import a file in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        if($request->file('imported-file'))
        {

            DB::table('excelitems')->truncate();
            $path = $request->file('imported-file')->getRealPath();
            $data = Excel::load($path, function($reader)
            {
            })->get();

            if(!empty($data) && $data->count())
            {
                foreach ($data->toArray() as $row)
                {
                    if(!empty($row))
                    {
                        $dataArray[] =
                            [
                                'heading'=>$row['rubrika'],
                                'category_id'=>$row['category'],
                                'company'=>$row['company'],
                                'name' => $row['name'],
                                'code' => $row['code'],
                                'description' => $row['description'],
                                'price' => $row['price'],
                                'termGuarantee' => $row['guarantee'],
                                'sclad' => $row['sclad'],
                                'linkToGood' => $row['reference'],
                                'linkToPhoto' => $row['img'],

                            ];
                    }
                }
                if(!empty($dataArray))
                {
                    Excelitem::insert($dataArray);
                    return back();
                }
            }
        }
        $items=[];
        return view(env('THEME').'.admin.excels.excelitems',['items'=>$items]);
    }


    /**
     * export a file in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        $items = Product::all();

        Excel::create('priceXML', function($excel) use($items) {
            $excel->sheet('ExportFile', function($sheet) use($items) {
                $sheet->fromArray($items);
            });
        })->export('xls');

    }




}
