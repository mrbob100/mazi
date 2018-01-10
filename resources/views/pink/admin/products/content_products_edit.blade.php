@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="wrapper container-fluid">

            <input type="text" id="rqueze1" style="display: none;" value="{{$power}}"  />
            <input type="text" id="rqueze2" style="display: none;" value="{{$voltage}}"  />
            <input type="text" id="capacity" style="display: none;" value="{{$capacity}}"  />
            <input type="text" id="angleCuttingDepth" style="display: none;" value="{{$angleCuttingDepth}}"  />
            <input type="text" id="cuttingDepth" style="display: none;" value="{{ $cuttingDepth}}"  />
            <input type="text" id="diametrDisk" style="display: none;" value="{{ $diametrDisk}}"  />
            <input type="text" id="idle" style="display: none;" value="{{$idle}}"  />
            <input type="text" id="impact" style="display: none;" value="{{$impact}}"  />
            <input type="text" id="maxHole" style="display: none;" value="{{$maxHole}}"  />
            <input type="text" id="performance" style="display: none;" value="{{$performance}}"  />
            <input type="text" id="qntImpact" style="display: none;" value="{{$qntImpact}}"  />
            <input type="text" id="rotationSpeed" style="display: none;" value="{{$rotationSpeed}}"  />
            <input type="text" id="spindle" style="display: none;" value="{{ $spindle}}"  />
            <input type="text" id="cartridge" style="display: none;" value="{{ $cartridge}}"  />

            <input type="text" id="airflow" style="display: none;" value="{{$airflow}}"  />
            <input type="text" id="cutedgewidth" style="display: none;" value="{{ $cutEdgeWidth}}"  />
            <input type="text" id="defence" style="display: none;" value="{{ $defence}}"  />
            <input type="text" id="frequency" style="display: none;" value="{{ $frequency}}"  />
            <input type="text" id="grindplate" style="display: none;" value="{{$grindplate}}"  />
            <input type="text" id="holestand" style="display: none;" value="{{ $holestand}}"  />
            <input type="text" id="maxcapacity" style="display: none;" value="{{ $maxcapacity}}"  />
            <input type="text" id="scaffold" style="display: none;" value="{{ $scaffold}}"  />
            <input type="text" id="shankrange" style="display: none;" value="{{$shankrange}}"  />
            <input type="text" id="steel" style="display: none;" value="{{$steel}}"  />
            <input type="text" id="strokelength" style="display: none;" value="{{$strokelength}}"  />
            <input type="text" id="vibration" style="display: none;" value="{{$vibration}}"  />
            <input type="text" id="workingwidth" style="display: none;" value="{{$workingwidth}}"  />



            {!! Form::open(['url'=>route('productEdit',['product'=>$data['id']]), 'class'=>'form-horizontal','style'=>'width:800px;',
            'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}
            <div class="form-group">
                {!! Form::hidden('id',$data['id']) !!}
                {!! Form::label('name','Название',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('name',$old['name'],['class'=>'form-control', 'placeholder'=>'Введите название продукции']) !!}
                </div>
            </div>

            <div class="form-group">

                {!! Form::label('code','код',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('code',$old['code'],['class'=>'form-control','maxlength'=>10,'placeholder'=>' Код продукта']) !!}
                </div>
            </div>

            <!--div class="form-group">
                {--!! Form::label('category_id','Категория',['class'=>'col-xs2 control-label']) !!--}
                <div class="col-xs8">
                    {--!! Form::text('category_id',old('category_id'),['class'=>'form-control','placeholder'=>'Введите название категории']) !!--}
                </div>
            </div-->






            <div class="orderLine">



                <div class="form-group">
                    {!! Form::label('category_id','Категория',['class'=>'col-xs2 control-label']) !!}
                    <div class="col-xs8">
                        {{--$var=$data['parent_id']===0 ? 'самостоятельная категория' : $data->getCategory->name--}}

                        <div class="form-group field-product-category_id has-success">
                            <!--label class="control-label" for="category-parent_id">Родительская категория</label
                            Для вывода виджета использован параметр config['model'] - это объект категории для выборки select.php- выпадающий список
                            -->

                            <select id="product-category_id" class="form-control" name="category_id" v-model="category"  v-on:imput="Californiya" >
                                <option value="0">Самостоятельная категория</option>

                                {{ $var=Widget::run('MainWidget',['tpl'=>'select_product.php','model'=>$model]) }}
                                {!! Form::select('category_id', $var, ['class'=>'form-control','placeholder'=>'Категория']) !!}


                            </select>
                        </div>


                    </div>
                </div>
                <p> Категория:  @{{category}} </p>


                <div class="row">


                    <div class="btn" v-if="category==10 || category==20 || category==12 || category==32">
                        <div class="col-xs-2">
                            power
                            <power-container></power-container>

                        </div>
                        <div class="col-xs-2">
                            <!--product-container1  v-on:message-saved="handleCategory"></product-container1-->
                            voltage
                            <voltage-container></voltage-container>
                        </div>

                        <div class="col-xs-3">
                            capacity
                            <capacity-container></capacity-container>
                        </div>

                        <div class="col-xs-2">
                            impact
                            <impact-container></impact-container>
                        </div>
                        <div class="col-xs-2">
                            idle
                            <idle-container></idle-container>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="btn" v-if="category==10 ||category==20 || category==12 || category==32">


                        <div class="col-xs-2">
                            spindle
                            <spindle-container></spindle-container>
                        </div>

                        <div class="col-xs-2">
                            cartridge
                            <cartridge-container></cartridge-container>
                        </div>
                        <div class="col-xs-3">
                            rotationSpeed
                            <rotationspeed-container></rotationspeed-container>
                        </div>
                        <div class="col-xs-4">
                            maxHole
                            <maxhole-container></maxhole-container>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="btn" v-if="category==10 || category==20 || category==12 || category==32">
                        <div class="col-xs-2">
                            qntImpact
                            <qntimpact-container></qntimpact-container>
                        </div>
                    </div>
                </div>
                <div class="btn" v-if="category==19">
                    <div class="row">
                        <div class="col-xs-3">
                            power
                            <power-container></power-container>

                        </div>
                        <div class="col-xs-4">
                            rotationSpeed
                            <rotationspeed-container></rotationspeed-container>
                        </div>
                        <div class="col-xs-3">
                            diametrDiska
                            <diametrdisk-container></diametrdisk-container>
                        </div>
                        <div class="col-xs-2">
                            spindle
                            <spindle-container></spindle-container>
                        </div>

                    </div>
                </div>
                <div class="btn" v-if="category==21 || category==22 || category==30 || category==33">
                    <div class="row">
                        <div class="col-xs-3">
                            power
                            <power-container></power-container>

                        </div>
                        <div class="col-xs-3">
                            rotationSpeed
                            <rotationspeed-container></rotationspeed-container>
                        </div>
                        <div class="col-xs-3">
                            diametrDiska
                            <diametrdisk-container></diametrdisk-container>
                        </div>
                        <div class="col-xs-3">
                            spindle
                            <spindle-container></spindle-container>
                        </div>

                    </div>
                </div>
                <div class="btn" v-if="category==21 || category==22 || category==30 || category==33">
                    <div class="row">
                        <div class="col-xs-4">
                            performance
                            <performance-container></performance-container>
                        </div>
                    </div>
                </div>


            </div> <!-- конец блока vue.js-->




            <div class="form-group">
                {!! Form::label('exactlyType1','Характеристики',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('exactlyType1',$old['exactlyType1'],['class'=>'form-control','placeholder'=>'Характеристики','id'=>'exactly']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('description','Краткое описание',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::textarea('description',$old['description'],['id'=>'editor','class'=>'form-control','placeholder'=>'Краткое описание']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('text','Описание',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::textarea('text',$old['text'],['id'=>'editor1','class'=>'form-control','placeholder'=>'Описание']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('price','Цена',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::number('price',$old['price'],['class'=>'form-control','placeholder'=>'Цена']) !!}
                </div>
            </div>
             @if(isset($pic))
            {!! Form::label('old_images','Изображение:',['class'=>'col-xs2 control-label']) !!}
            <div class="col-xs-offset-2 col-xs10">
                {!! Html::image(asset('public/'.env('THEME')).'/images/'. $pic ,'',['class'=>'img-circle img-responsive', 'width'=>'250px',
                'data-buttonName'=>'btn-primary','data-placeholder'=>$pic ]) !!}
                {!! Form::hidden('old_images',$pic ) !!}
            </div>
             @endif


            <div class="form-group">
                {!! Form::label('img','Изображение:',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::file('img',['class'=>'filestyle','data-buttonText'=>'Выберите изображение',
                    'data-buttonName'=>'btn-primary','data-placeholder'=>'Файла нет']) !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('type','Тип',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    <!-- {--!! Form::text('type',old('type'),['class'=>'form-control','placeholder'=>'Тип']) !!--} -->
                    {!! Form::select('type',$listTool,isset($old->type) ? $old->type : 0,['class'=>'form-control','placeholder'=>'Тип']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('country','Страна',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::select('country',$countryT,isset($old->country) ? $old->country : 0,['class'=>'form-control','placeholder'=>'Страна']) !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('groupTools','Группа',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::select('groupTools',$groupT,isset($old->groupTools) ? $old->groupTools : '',['class'=>'form-control','placeholder'=>'Группа']) !!}
                </div>
            </div>




            <div class="form-group">
                {!! Form::label('new','Новый',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::checkbox('new',$old['new'],$old['new'],['class'=>'form-control','placeholder'=>'Новый']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('hit','Хит',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::checkbox('hit',$old['hit'],$old['hit'],['class'=>'form-control','placeholder'=>'Хит']) !!}
                </div>
            </div>
            {!! Form::label('','Распродажа',['class'=>'col-xs2 control-label']) !!}
            <div class="col-xs8">
                {!! Form::checkbox('sale',$old['sale'],$old['sale'],['class'=>'form-control','placeholder'=>'Распродажа']) !!}
            </div>
        </div>

            <div class="form-group">
                {!! Form::label('weightbrutto','Вес(брутто)',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('weightbrutto',$old['weightbrutto'],['class'=>'form-control','placeholder'=>'Вес(брутто)']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('weightnetto','Вес(нетто)',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('weightnetto',$old['weightnetto'],['class'=>'form-control','placeholder'=>'Вес(нетто)']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('width','ширина',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('width',$old['width'],['class'=>'form-control','placeholder'=>'ширина']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('length','длина',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('length',$old['length'],['class'=>'form-control','placeholder'=>'длина']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('height','высота',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('height',$old['height'],['class'=>'form-control','placeholder'=>'высота']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('termGuarantee','гарантия',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('termGuarantee',$old['termGuarantee'],['class'=>'form-control','placeholder'=>'гарантия']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('class','класс',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::select('class',$classTo,isset($old->class) ? $old->class : 0,['class'=>'form-control','placeholder'=>'класс']) !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('packing','упаковка',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::select('packing',$packingTo,isset($old->packing) ? $old->packing : 0,['class'=>'form-control','placeholder'=>'упаковка']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('company','Компания',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::select('company',$companyTo, isset($old['company']) ? $old['company'] : 0,['class'=>'form-control','placeholder'=>'Компания']) !!}
                </div>
            </div>

            <!--div class="form-group">
                {--!! Form::label('created_at','Дата создания',['class'=>'col-xs2 control-label']) !!--}
                <div class="col-xs8">
                    {--!! Form::text('created_at',old('created_at'),['class'=>'form-control','placeholder'=>'Дата создания']) !!--}
                </div>
            </div-->




            <div class="form-group">
                {!! Form::label('keywords','Ключевые слова',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('keywords',$old['keywords'],['class'=>'form-control','placeholder'=>'Ключевые слова']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('meta_desc','Мета описание',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('meta_desc',$old['meta_desc'],['class'=>'form-control','placeholder'=>'Описание']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('sclad','склад',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('sclad',$old['sclad'],['class'=>'form-control','placeholder'=>'склад']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('ukvd','код УКВД',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('ukvd',$old['ukvd'],['class'=>'form-control','placeholder'=>'код УКВД']) !!}
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs10">
                    {!! Form::button('Сохранить',['class'=>'btn btn-primary','type'=>'submit']) !!}
                </div>
            </div>
            {!! Form::close() !!}
            <script>
                CKEDITOR.replace('editor');
                CKEDITOR.replace('editor1');
            </script>
        </div>
    </div>
@endsection