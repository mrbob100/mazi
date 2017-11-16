@section('content')
    <div class="container">
        <div class="wrapper container-fluid">

            {!! Form::open(['url'=>route('productEdit',['product'=>$data['id']] ), 'class'=>'form-horizontal',
            'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}

            <div class="form-group">
                {!! Form::hidden('id',$data['id']) !!}
                {!! Form::label('name','Название',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('name',$data['name'],['class'=>'form-control','placeholder'=>' Название продукта']) !!}
                </div>
            </div>
            <div class="form-group">

                {!! Form::label('code','код',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('code',$data['code'],['class'=>'form-control','placeholder'=>' Код продукта']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('category_id','Категория',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {{--$var=$data['parent_id']===0 ? 'самостоятельная категория' : $data->getCategory->name--}}

                    <div class="form-group field-product-category_id has-success">
                        <!--label class="control-label" for="category-parent_id">Родительская категория</label
                        Для вывода виджета использован параметр config['model'] - это объект категории для выборки select.php- выпадающий список
                        -->

                        <select id="product-category_id" class="form-control" name="Production[category_id]">
                            <option value="0">Самостоятельная категория</option>
                            {{ $var=Widget::run('MainWidget',['tpl'=>'select_product.php','model'=>$model]) }}
                            {!! Form::select('category_id', $var,['class'=>'form-control','placeholder'=>'Категория']) !!}
                        </select>
                    </div>


                </div>
            </div>

            <!--div class="form-group">
                {--!! Form::label('category_id','Категория',['class'=>'col-xs2 control-label']) !!--}
                <div class="col-xs8">
                    {--!! Form::text('category_id',$data['category_id'],['class'=>'form-control','placeholder'=>'Введите название категории']) !!--}
                </div>
            </div-->
            <div class="form-group">
                {!! Form::label('description','Краткое описание',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::textarea('description',$data['description'],['id'=>'editor','class'=>'form-control','placeholder'=>'Краткое описание']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('text','Описание',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::textarea('text',$data['text'],['id'=>'editor1','class'=>'form-control','placeholder'=>'Описание']) !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('price','Цена',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('price',$data['price'],['class'=>'form-control','placeholder'=>'Цена']) !!}
                </div>
            </div>

            <div class="form-group">

               {!! Form::label('old_images','Изображение:',['class'=>'col-xs2 control-label']) !!}
               <div class="col-xs-offset-2 col-xs10">
                   {!! Html::image('public/'.env('THEME').'/images/'.$pic,'',['class'=>'img-circle img-responsive', 'width'=>'250px',
                   'data-buttonName'=>'btn-primary','data-placeholder'=>$pic]) !!}
                   {!! Form::hidden('old_images',$pic) !!}
               </div>
           </div>

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
                    {!! Form::text('type',$data['type'],['class'=>'form-control','placeholder'=>'Тип']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('country','Страна',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('country',$data['country'],['class'=>'form-control','placeholder'=>'Страна']) !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('groupTools','Группа',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('groupTools',$data['groupTools'],['class'=>'form-control','placeholder'=>'Группа']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('new','Признак',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('new',$data['new'],['class'=>'form-control','placeholder'=>'Признак']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('weightbrutto','Вес(брутто)',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('weightbrutto',$data['weightbrutto'],['class'=>'form-control','placeholder'=>'Вес(брутто)']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('weightnetto','Вес(нетто)',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('weightnetto',$data['weightnetto'],['class'=>'form-control','placeholder'=>'Вес(нетто)']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('width','ширина',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('width',$data['width'],['class'=>'form-control','placeholder'=>'ширина']) !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('length','длина',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('length',$data['length'],['class'=>'form-control','placeholder'=>'длина']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('height','высота',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('height',$data['height'],['class'=>'form-control','placeholder'=>'высота']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('termGuarantee','гарантия',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('termGuarantee',$data['termGuarantee'],['class'=>'form-control','placeholder'=>'гарантия']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('class','класс',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('class',$data['class'],['class'=>'form-control','placeholder'=>'класс']) !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('packing','упаковка',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('packing',$data['packing'],['class'=>'form-control','placeholder'=>'упаковка']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('company','Компания',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('company',$data['company'],['class'=>'form-control','placeholder'=>'Компания']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('created_at','Дата создания',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('created_at',$data['created_at'],['class'=>'form-control','placeholder'=>'Дата создания']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('updated_at','Последняя корректировка',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('updated_at',$data['updated_at'],['class'=>'form-control','placeholder'=>'Последняя корректировка']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('exactlyType1','Характеристики',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('exactlyType1',$data['exactlyType1'],['class'=>'form-control','placeholder'=>'Характеристики']) !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('keywords','Ключевые слова',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('keywords',$data['keywords'],['class'=>'form-control','placeholder'=>'Ключевые слова']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('meta_desc','Мета описание',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('meta_desc',$data['meta_desc'],['class'=>'form-control','placeholder'=>'Мета описание']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('sclad','склад',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('sclad',$data['sclad'],['class'=>'form-control','placeholder'=>'склад']) !!}
                </div>
            </div>




            <!--div class="form-group">
                {--!! Form::label('sclad','Хит продаж',['class'=>'col-xs2 control-label']) !!--}
                <div class="col-xs8">

                    {--!! Form::checkbox('sclad',$data['sclad'], $data['sclad']  ,['class'=>'form-control','placeholder'=>'Хит']) !!--}

                </div-->

            <div class="form-group">
                {!! Form::label('ukvd','код УКВД',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('ukvd',$data['ukvd'],['class'=>'form-control','placeholder'=>'код УКВД']) !!}
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