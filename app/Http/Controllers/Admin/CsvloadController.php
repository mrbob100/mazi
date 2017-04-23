<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CsvloadController extends Controller
{
    public function index()
    {
        return view('loadcsv');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(/*Request $request*/)
    {
        if(isset($_FILES['my_file'])){
            $req = false;
            // Приведём полученную информацию в удобочитаемый вид
            ob_start();
            echo '<pre>Данные загруженного файла:<br>';
            print_r($_FILES['my_file']);
            echo '</pre>';
            $req = ob_get_contents();
            ob_end_clean();
            echo json_encode($req,JSON_UNESCAPED_UNICODE); // вернем полученное в ответе
            $uploads_dir = 'public/upload';
            // if ($_FILES["my_file"]["error"]) {

            $tmp_name = $_FILES["my_file"]["tmp_name"];
            // basename() может предотвратить атаку на файловую систему;
            // может быть целесообразным дополнительно проверить имя файла
            $name = basename($_FILES["my_file"]["name"]);
            move_uploaded_file($tmp_name, "$uploads_dir/$name");

            // }
            exit;

        }
    }
}
