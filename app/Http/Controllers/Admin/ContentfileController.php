<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Storage;
class ContentfileController extends Controller
{
    public function index()
    {
        $str1=array();
        $exists = Storage::exists('file.jpg');
        if($exists)
        {


        $contents=Storage::get('file_error.txt');
       // $this->squareJson($contents);
        echo '<pre>Данные файла ошибок:<br>';
        print_r( $contents);
        echo '</pre>';
        } else {
            echo '<pre>Файла ошибок нет !<br>';
            echo '</pre>';
        }
        return ;
      // $str=json_decode($contents,JSON_UNESCAPED_UNICODE);
    }

       public function squareJson($stroka,$pos=0,$pos1=0)
        {
            $offset=$pos1+1;
            $length=mb_strlen($stroka);
            if($pos>$length) return;
            $pos=mb_strpos($stroka,'{',(int) $pos);
            $pos1=mb_strpos($stroka,'}',(int)$pos);
            $pos2=$pos1-$pos;

            $str1=mb_substr($stroka,$pos,$pos2+1);
            if(is_string($str1) && is_object(json_decode( $str1))&& json_last_error()==JSON_ERROR_NONE)
            {
            $str2=json_decode( $str1); // выборка записей из файла в обычном виде

                    if(($str2->code)&&($str2->code!='-')) // если товар зарегестрирован
                    {
                        $productsLine=new Product();

                        $productsLine->name=$str2->halfsegment;
                        $productsLine->code=$str2->code;
                        $productsLine->description=$str2->description;
                        $productsLine->name.=''.$str2->name;
                        $productsLine->packing=$str2->pack;

                            if($str2->price)
                            {
                                $sas=[];
                                $sas=trim(str_replace(',','.',$str2->price));
                                $sas=mb_split("[\s]",$sas);
                                $cntn=count($sas);
                                if($cntn==1) { $sas=$str2->price;}
                                if($cntn==2) { $sas=$sas[0].$sas[1];}
                                if($cntn==3)  $sas=$sas[0].$sas[1].$sas[2];
                               // $add3=urlencode($sas);
                           //     $add=str_replace("(%C2%A0)","", $sas);
                                $add=str_replace("[\s]","", $sas);
                             //  $add=preg_replace("&#x20;","",$sas);
                              //  $add=str_replace("A","", $add3);
                                $productsLine->price= $add;
                            }
                   // $productsLine->price=number_format($str2->price,2,'.','');
                        $productsLine->sclad=$str2->warehouse;
                        $productsLine->description=$str2->description;
                       // $productsLine->exactlyType1=json_encode($str2->ttd);
                        $productsLine->sclad=$str2->warehouse;
                        $productsLine->country=$str2->country;
                        $productsLine->ukvd=$str2->ukvd;
                        $productsLine->length=$str2->length;
                        $productsLine->width=$str2->width;
                        $productsLine->height=$str2->height;

                        $productsLine->weightbrutto=$str2->weightBrutto;
                        $productsLine->weightnetto=$str2->weightNetto;

                    // $productsLine->ttd;
                    //$productsLine->EAN_code;
                       //
//______________________________________________________________________________________________________________________
//______________________________ проверка регулярных выражений

                         if(($str2->ttd)!="" && ($str2->ttd)!="-")
                       // if(isset($str2->ttd))
                        {
                        $proximi=explode(',',$str2->ttd);
                        $cnt=count($proximi);
                            if($cnt)
                            {
                                //  $str='"impact":'.
                                $data = $this->regularCheck($proximi, $cnt); // проверка регулярных выражений

                                $productsLine->exactlyType1 = $data; // ввод json строки в столбец
                            }
                        }
//______________________________________________________________________________________________________________________
                    // обработка картинок
          $workImage='public/'.env('THEME').'/images/'.$str2->EAN_code.'.jpg';
                    if(file_exists( $workImage))
                    {
                      $obj= $this->workUpImages( $str2->EAN_code,$workImage);
                        $productsLine->img=json_encode($obj);
                    }

//______________________________________________________________________________________________________________________

            $productsLine->save(); // сохранение файла продукции


                     }
            }
            $pos=$pos1+2;
            $data=$this->squareJson($stroka,$pos,$pos1);


        }

}
