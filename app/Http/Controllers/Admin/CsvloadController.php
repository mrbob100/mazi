<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Models\Product;

use File;
use Illuminate\Support\Facades\Storage;
use Image;
use Config;
use Validator;


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
        if(isset($_FILES['my_file']))
        {
            $req = false;
            // Приведём полученную информацию в удобочитаемый вид
            ob_start();
            echo '<pre>Данные загруженного файла:<br>';
            print_r($_FILES['my_file']);
            echo '</pre>';
            $req = ob_get_contents();
            ob_end_clean();
            echo json_encode($req,JSON_UNESCAPED_UNICODE); // вернем полученное в ответе
            $uploads_dir = 'public/'.env('THEME').'/upload';
            // if ($_FILES["my_file"]["error"]) {

            $tmp_name = $_FILES["my_file"]["tmp_name"];
            // basename() может предотвратить атаку на файловую систему;
            // может быть целесообразным дополнительно проверить имя файла
            $name = basename($_FILES["my_file"]["name"]);
            $result=move_uploaded_file($tmp_name, "$uploads_dir/$name");
            if( $result)
                {
                        $fileName = str_replace('\\','\\\\',  $name);
                        $r=0; $str=array();

                      $file =file_get_contents('public/'.env('THEME').'/upload/'. $fileName);

                        $stroka= preg_replace("/[\t\r\n]+/","", $file );
                    $str1=[]; $str=[];
                        $pos=0; $pos1=0;

                    $str1=explode('},',$stroka);
                    $len=count( $str1);
                    $str1[0]=mb_substr($str1[0],3);
                    $str1[0]='{'. $str1[0];
                    unset($str1[$len-1]);  // только в случае когда все данные в массиве - [...]

                    for($i=0; $i<$len-1; $i++)
                    {
                        $str1[$i] = mb_substr($str1[$i], 0, -1);
                        $str1[$i].='"}';

                    }

                    for($i=0; $i<$len-1; $i++)
                    {
                        $str[$i]=json_decode($str1[$i]);


                    }
                     //   $this->squareJson($stroka,$pos,$pos1);
                    for($i=0; $i<$len-1; $i++)
                    {
                        if (!$str[$i]) {  // если нулевые значения строки json
                        //    echo ('<pre>');
                        //    echo ($str1[$i]);
                         //    echo ('</pre>');
                            $serka="не строка json "."|".$str1[$i];
                            Storage::prepend('file_error.txt',$serka);
                        } else { // работа с записями json

                           $this->selectJson($str[$i]) ;  // подпрограмма обработки записей



                               }
                    }
                }

                    echo ('\'<br/><br/>выборка в БД закончена<br/>');

         }

            exit;

        }
    public function selectJson($str2)
    {
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
            $validator=is_numeric($add);
                if(!$validator)
                {
                    $add=0;
                   /* echo ('<pre>');
                    echo ("ошибка в цене");
                    echo ($str2);
                    echo ('</pre>'); */
                    $serka="нулевое price "."|".$str2;
                    Storage::prepend('file_error.txt',$serka);
                }
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



/*    public function squareJson($stroka,$pos=0,$pos1=0)
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
*/

// функция ресайза изображений
        public function workUpImages($myImage, $workImage)
        {

            {
                $line=str_random(7);
                $obj= new \stdClass;
                $obj->mini=$line.$myImage.'_mini.jpg';
                $obj->max=$line.$myImage.'_max.jpg';
                $obj->path=$line.$myImage.'_path.jpg';
                $img=Image::make($workImage);
                //   $img->resize(null, 600, function ($constraint) {
                //      $constraint->aspectRatio();
                $img->resize(null,Config::get('settings.image')['height'],function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path().'/'.env('THEME').'/images/'.$obj->path);
                $img->resize(null,Config::get('settings.product_img')['max']['height'],function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path().'/'.env('THEME').'/images/'.$obj->max);

                $img->resize(null,Config::get('settings.product_img')['mini']['height'],function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path().'/'.env('THEME').'/images/'.$obj->mini);
            }
           return $obj;
        }



// функция обработки регулярных выражений
        public function regularCheck($proximi,$cnt)
        {
            $obj= new \stdClass;
            $data=array();
            $sa=0;
            for($i=0; $i<$cnt; $i++)
            {
                if(preg_match("/сила/i",$proximi[$i])) {
                  //  $obj->impact='"impact":'.'"'. $proximi[$i].'"';
                    $obj->impact=$proximi[$i];continue;
                }
                if(preg_match("/мощност(ь|и)/iu",$proximi[$i])) {
                    $obj->power=$proximi[$i];continue;
                }
                if(preg_match("/число.ударов/iu",$proximi[$i])) {
                    $obj->qntImpact=$proximi[$i];continue;
                }
                if(preg_match("/бетон\/полая|диаметр отверстия|макс.диаметр сверления|диам.сверления|диаметр|диам отв-я/iu",$proximi[$i])) {
                    $obj->maxHole=$proximi[$i];continue;
                }
                if(preg_match("/(Н|н)апряжение| Акк\./iu",$proximi[$i])) {
                    $obj->voltage=$proximi[$i];continue;
                }
                if(preg_match("/((Е|е)мкость|вольтаж|энергоемкость)/iu",$proximi[$i])) {
                    $obj->capacity=$proximi[$i];continue;
                }
                if(preg_match("/число оборотов/iu",$proximi[$i])) {
                    $obj->idle=$proximi[$i];continue;
                }
                if(preg_match("/макс(.|мально)*крут(.|ящий) момент|крутящий момент|крут.момент/iu",$proximi[$i])) {
                    $obj->torque=$proximi[$i];continue;
                }
                if(preg_match("/диапазон хвостовик(а|ов)|диапазон/iu",$proximi[$i])) {
                    $obj->shankRange=$proximi[$i];continue;
                }
                if(preg_match("/скор(\.|ость) *вр(.|ащения|скор.вр)|скорость/iu",$proximi[$i])) {
                    $obj->rotationSpeed=$proximi[$i];continue;
                }
                if(preg_match("/макс. диам. (шурупов|шуруп(а)| диам.шурупа)/iu",$proximi[$i])) {
                    $obj->maxScrew=$proximi[$i];continue;
                }
                if(preg_match("/длина шурупа/iu",$proximi[$i])) {
                    $obj->lengthScrew=$proximi[$i];continue;
                }
                if(preg_match("/диам. шляпки/iu",$proximi[$i])) {
                    $obj->capScrew=$proximi[$i];continue;
                }
                if(preg_match("/д(.|иаметр) *диска/iu",$proximi[$i])) {
                    $obj->diameterDiska=$proximi[$i];continue;
                }
                if(preg_match("/шпиндель/iu",$proximi[$i])) {
                    $obj->spindle=$proximi[$i];continue;
                }
                if(preg_match("/энергия удара/iu",$proximi[$i])) {
                    $obj->impactEnergy=$proximi[$i];continue;
                }

                if(preg_match("/макс(.|имальный) *объем/iu",$proximi[$i])) {
                    $obj->maxCapacity=$proximi[$i];continue;
                }

                if(preg_match("/макс(.|имальный) *поток *возд(.|уха)/iu",$proximi[$i])) {
                    $obj->airFlow=$proximi[$i];continue;
                }

                if(preg_match("/глубина пропила/iu",$proximi[$i])) {
                    $obj->cuttingDepth=$proximi[$i];continue;
                }
                if(preg_match("/макс(.|имальный) *угол косого пропила|угол/iu",$proximi[$i])) {
                    $obj->angleCuttingDepth=$proximi[$i];continue;
                }

                if(preg_match("/Рабочая ширина/iu",$proximi[$i])) {
                    $obj->workingWidth=$proximi[$i];continue;
                }

                if(preg_match("/Ширина режущей кромки/iu",$proximi[$i])) {
                    $obj->cuttingEdgeWidth=$proximi[$i];continue;
                }

                if(preg_match("/д.шлифлиста/iu",$proximi[$i])) {
                    $obj->scaffold=$proximi[$i];continue;
                }

                if(preg_match("/производительность/iu",$proximi[$i])) {
                    $obj->performance=$proximi[$i];continue;
                }

                if(preg_match("/шлифпласт(.|ина)/iu",$proximi[$i])) {
                    $obj->grindingPlate=$proximi[$i];continue;
                }

                if(preg_match("/сталь\\дерево/iu",$proximi[$i])) {
                    $obj->grindingPlate=$proximi[$i];continue;
                }
                if(preg_match("/патрон/iu",$proximi[$i])) {
                    $obj->cartrige=$proximi[$i];continue;
                }

                if(preg_match("/винты/iu",$proximi[$i])) {
                    $obj->screws=$proximi[$i];continue;
                }

                if(preg_match("/частота/iu",$proximi[$i])) {
                    $obj->frequency=$proximi[$i];continue;
                }

                if(preg_match("/длина хода|ход/iu",$proximi[$i])) {
                    $obj->strokeLength=$proximi[$i];continue;
                }

                if(preg_match("/скорость (хол.хода|x\/x)|обороты|ск.ленты/iu",$proximi[$i])) {
                    $obj->speedIdle=$proximi[$i];continue;
                }

                if(preg_match("/число ходов/iu",$proximi[$i])) {
                    $obj->strokeNumber=$proximi[$i];continue;
                }

                if(preg_match("/макс.толщина/iu",$proximi[$i])) {
                    $obj->maxThick=$proximi[$i];continue;
                }
                if(preg_match("/Размер обхвата/iu",$proximi[$i])) {
                    $obj->girthSize=$proximi[$i];continue;
                }


                if(preg_match("/резьба/iu",$proximi[$i])) {
                    $obj->thread=$proximi[$i];continue;
                }

                if(preg_match("/время работы/iu",$proximi[$i])) {
                    $obj->workingHour=$proximi[$i];continue;
                }

                if(preg_match("/фиксация/iu",$proximi[$i])) {
                    $obj->fixing=$proximi[$i];continue;
                }

                if(preg_match("/размер болта/iu",$proximi[$i])) {
                    $obj->boltSize=$proximi[$i];continue;

                }

                if(preg_match("/глубина резки в металле/iu",$proximi[$i])) {
                    $obj->metalCuttingDepth=$proximi[$i];continue;

                }
                if(preg_match("/глубина резки в древесине/iu",$proximi[$i])) {
                    $obj->woodCuttingDepth=$proximi[$i];continue;

                }
                if(preg_match("/глубина резки трубы/iu",$proximi[$i])) {
                    $obj->pipeCuttingDepth=$proximi[$i];continue;

                }
                if(preg_match("/уровень вибрации|(В|в)ибрационная амлитуда/iu",$proximi[$i])) {
                    $obj->vibrationLevel=$proximi[$i];continue;

                }

                if(preg_match("/осцилляции/iu",$proximi[$i])) {
                    $obj->oscillations=$proximi[$i];continue;

                }
                if(preg_match("/Обхват рукоятки/iu",$proximi[$i])) {
                    $obj->handleGirth=$proximi[$i];continue;

                }

                if(preg_match("/Ø сверления в бетоне/iu",$proximi[$i])) {
                $obj->diamConcreet=$proximi[$i];continue;

            }

                if(preg_match("/Ø сверления в каменной/iu",$proximi[$i])) {
                    $obj->diamStone=$proximi[$i];continue;

                }

                if(preg_match("/посадочное отверстие/iu",$proximi[$i])) {
                    $obj->holeStande=$proximi[$i];continue;

                }

                if(preg_match("/яркость/iu",$proximi[$i])) {
                    $obj->lightning=$proximi[$i];continue;

                }

                if(preg_match("/Объем контейнера/iu",$proximi[$i])) {
                    $obj->contVolume=$proximi[$i];continue;

                }

                if(preg_match("/макс.объемный/iu",$proximi[$i])) {
                    $obj->maxContVolume=$proximi[$i];continue;

                }

                if(preg_match("/макс.разрежение/iu",$proximi[$i])) {
                    $obj->maxVacuum=$proximi[$i];continue;

                }

                if(preg_match("/част.колеб/iu",$proximi[$i])) {
                    $obj->frequencyOscillation=$proximi[$i];continue;

                }
                if(preg_match("/диап.колеб/iu",$proximi[$i])) {
                    $obj->amplituda=$proximi[$i];continue;

                }
                if(preg_match("/количество USB/iu",$proximi[$i])) {
                    $obj->usb=$proximi[$i];continue;

                }

                if(preg_match("/зарядка до/iu",$proximi[$i])) {
                    $obj->chargingUp=$proximi[$i];continue;

                }
                if(preg_match("/зарядный ток/iu",$proximi[$i])) {
                    $obj->chargingCurrent=$proximi[$i];continue;

                }
                if(preg_match("/совместимость/iu",$proximi[$i])) {
                    $obj->compatibility=$proximi[$i];continue;
                }
                if(preg_match("/сила тока/iu",$proximi[$i])) {
                    $obj->amperage=$proximi[$i];continue;
                }
                if(preg_match("/Время зарядки/iu",$proximi[$i])) {
                    $obj->chargingTime=$proximi[$i];continue;
                }
                if(preg_match("/ЗУ/iu",$proximi[$i])) {
                    $obj->zu=$proximi[$i];continue;
                }
                if(preg_match("/д.чаш.шлиф./iu",$proximi[$i])) {
                    $obj->grindingCup=$proximi[$i];continue;
                }

                if(preg_match("/сталь/iu",$proximi[$i])) {
                    $obj->steel=$proximi[$i];continue;
                }
                if(preg_match("/квадрат/iu",$proximi[$i])) {
                    $obj->square=$proximi[$i];continue;
                }
                if(preg_match("/шарошки/iu",$proximi[$i])) {
                    $obj->cutter=$proximi[$i];continue;
                }
                if(preg_match("/ Паз /iu",$proximi[$i])) {
                    $obj->groove=$proximi[$i];continue;
                }
                if(preg_match("/стружк(и|а)/iu",$proximi[$i])) {
                    $obj->shavings=$proximi[$i];continue;
                }

                if(preg_match("/цанга/iu",$proximi[$i])) {
                    $obj->collet=$proximi[$i];continue;
                }
                if(preg_match("/стружк(и|а)/iu",$proximi[$i])) {
                    $obj->shavings=$proximi[$i];continue;
                }
                if(preg_match("/макс.нагрузка|нагрузка/iu",$proximi[$i])) {
                    $obj->maxLoad=$proximi[$i];continue;
                }

                if(preg_match("/расстояние/iu",$proximi[$i])) {
                    $obj->distance=$proximi[$i];continue;
                }
                if(preg_match("/диап.темпер./iu",$proximi[$i])) {
                    $obj->tempRange=$proximi[$i];continue;
                }
                if(preg_match("/плавкий/iu",$proximi[$i])) {
                    $obj->melting=$proximi[$i];continue;
                }

                if(preg_match("/время разогр./iu",$proximi[$i])) {
                    $obj->warmUpTime=$proximi[$i];continue;
                }

                if(preg_match("/макс.разр./iu",$proximi[$i])) {
                    $obj->maxDischarge=$proximi[$i];continue;
                }

                if(preg_match("/регулировка скорости/iu",$proximi[$i])) {
                    $obj->speedControl=$proximi[$i];continue;
                }
                if(preg_match("/дисплей/iu",$proximi[$i])) {
                    $obj->display=$proximi[$i];continue;
                }

                if(preg_match("/рабочая длина/iu",$proximi[$i])) {
                    $obj->workDistance=$proximi[$i];continue;
                }

                if(preg_match("/диаметр коронки/iu",$proximi[$i])) {
                    $obj->crownDiameter=$proximi[$i];continue;
                }
                if(preg_match("/длина коронки/iu",$proximi[$i])) {
                    $obj->crownLength=$proximi[$i];continue;
                }

                if(preg_match("/глубина\/ширина/iu",$proximi[$i])) {
                    $obj->depthHight=$proximi[$i];continue;
                }
              /*  if(preg_match("/(Т|т)очность/iu",$proximi[$i])) {
                    $obj->precise=$proximi[$i];
                }*/
                if(preg_match("/длина шланга/iu",$proximi[$i])) {
                    $obj->hoseLength=$proximi[$i];continue;
                }
                if(preg_match("/до темной цели/iu",$proximi[$i])) {
                    $obj->uptoTarget=$proximi[$i];continue;
                }
                if(preg_match("/защита|Класс защиты/iu",$proximi[$i])) {
                    $obj->defence=$proximi[$i];continue;
                }
                if(preg_match("/максимальное количество измерений/iu",$proximi[$i])) {
                    $obj->numberMeasurements=$proximi[$i];continue;
                }
                if(preg_match("/класс лазера/iu",$proximi[$i])) {
                    $obj->laserClass=$proximi[$i];continue;
                }

                if(preg_match("/тип лазера/iu",$proximi[$i])) {
                    $obj->laserType=$proximi[$i];continue;
                }
                if(preg_match("/батарейки/iu",$proximi[$i])) {
                    $obj->batteries=$proximi[$i];continue;
                }
                if(preg_match("/углов|угол развертки/iu",$proximi[$i])) {
                    $obj->sweepAngle=$proximi[$i];continue;
                }
                if(preg_match("/Увеличение/iu",$proximi[$i])) {
                    $obj->Increase=$proximi[$i];continue;
                }
                if(preg_match("/Диапазон измерений/iu",$proximi[$i])) {
                    $obj->workingRange=$proximi[$i];continue;
                }
                if(preg_match("/Мин.измеряемый/iu",$proximi[$i])) {
                    $obj->batteries=$proximi[$i];continue;
                }
                if(preg_match("/Поле/iu",$proximi[$i])) {
                    $obj->field=$proximi[$i];continue;
                }
                if(preg_match("/калибровка/iu",$proximi[$i])) {
                    $obj->calibration=$proximi[$i];continue;
                }
                if(preg_match("/(О|о)бнаружения/iu",$proximi[$i])) {
                    $obj->detection=$proximi[$i];continue;
                }
                if(preg_match("/локализация/iu",$proximi[$i])) {
                    $obj->localization=$proximi[$i];continue;
                }
                if(preg_match("/подсветка/iu",$proximi[$i])) {
                    $obj->illumination=$proximi[$i];continue;
                }
                if(preg_match("/предел/iu",$proximi[$i])) {
                    $obj->limit=$proximi[$i];continue;
                }
                if(preg_match("/оборот колеса/iu",$proximi[$i])) {
                    $obj->wheelTurn=$proximi[$i];continue;
                }
                if(preg_match("/держатель/iu",$proximi[$i])) {
                    $obj->holder=$proximi[$i];continue;
                }

                if(preg_match("/(П|п)ростое/iu",$proximi[$i])) {
                    $obj->simple=$proximi[$i];continue;
                }
                if(preg_match("/наклон/iu",$proximi[$i])) {
                    $obj->incline=$proximi[$i];continue;
                }
                if(preg_match("/(И|и)сточники питания/iu",$proximi[$i])) {
                    $obj->powerSupplies=$proximi[$i];continue;
                }
                if(preg_match("/функция отвеса/iu",$proximi[$i])) {
                    $obj->plumbBob=$proximi[$i];continue;
                }
                if(preg_match("/Влаго-/iu",$proximi[$i])) {
                    $obj->wetProtection=$proximi[$i];continue;
                }
                if(preg_match("/Алюминиевое/iu",$proximi[$i])) {
                    $obj->alluminium=$proximi[$i];continue;
                }
                if(preg_match("/(Ц|ц)ифровой/iu",$proximi[$i])) {
                    $obj->digital=$proximi[$i];continue;
                }
                if(preg_match("/(Т|т)елескопическая/iu",$proximi[$i])) {
                    $obj->telescope=$proximi[$i];continue;
                }
                if(preg_match("/Счетчик/iu",$proximi[$i])) {
                    $obj->counter=$proximi[$i];continue;
                }
                if(preg_match("/Тормоз/iu",$proximi[$i])) {
                    $obj->brake=$proximi[$i];continue;
                }
                if(preg_match("/бар/iu",$proximi[$i])) {
                    $obj->bar=$proximi[$i];continue;
                }
                if(preg_match("/Комбинированное косвенное измерение/iu",$proximi[$i])) {
                    $obj->indMesure=$proximi[$i];continue;
                }
                if(preg_match("/Запирающий механизм/iu",$proximi[$i])) {
                    $obj->locking=$proximi[$i];continue;
                }
                if(preg_match("/Пузырьковые/iu",$proximi[$i])) {
                    $obj->buble=$proximi[$i];continue;
                }
                if(preg_match("/Доступно/iu",$proximi[$i])) {
                    $obj->available=$proximi[$i];continue;
                }
                if(preg_match("/windows/iu",$proximi[$i])) {
                    $obj->windows=$proximi[$i];continue;
                }

            }
            $data=json_encode($obj,JSON_UNESCAPED_UNICODE);

            return $data;

        }

            public function updateJsonProduct()
            {
                $product=Product::get();
                $cnt=count($product);
                for($i=0;$i<$cnt; $i++)
                {
                    $prod=new Product;
                    $sas=$product[$i];
                    $prod->fill($sas->toArray());
                    $prod->company='BOSCH';
                    Product::where('id', $prod->id)->update($prod->toArray());
                }


              //  $prod=$this->objectToarray($product);
               exit;
            }

   public function objectToarray($data)
    {
    $array=[]; $array=$data;
        foreach($array as $key => &$field){

            if(is_object($field))$field = $this->objectToarray($field);
        }
        return $array;
    }
}
