


    <div class="section-title">
        <h4>{{$title}}</h4>
    </div>
    <h2> Панель администратора</h2>
<div class="nav nav-pills  horizontal menu_21">
<div id="filters">

    <ul  class="nav  ">
        <li>
            <a href="{{route('categories')}}">
              <h4>Категории</h4>
            </a>
        </li>
        <li>
            <a href="{{route('products')}}">
                <h4>Продукты</h4>
            </a>
        </li>
        <li>
            <a href="{{route('orders')}}">
                <h4>Заказы</h4>
            </a>
        </li>
        <li>
            <a href="{{route('loadCsv')}}">
                <h4>Загрузка файлов JSON</h4>
            </a>
        </li>

        <li>
            <a href="{{route('contfile')}}">
                <h4>Смотреть фал ошибок ввода при загрузке JSON</h4>
            </a>
        </li>

        <li>
            <a href="{{route('excelIt')}}">
                <h4>Выгрузка прайса для Hotline XMS</h4>
            </a>
        </li>



        <li>
                {{link_to('storage/app/public/priceXML.xls')}}
        </li>

        <li>
            <a href="{{route('userson',['id'=>2])}}">
                <h4>Работа с менеджерами</h4>
            </a>
        </li>

        <li>
            <a href="{{route('userson')}}">
                <h4>Работа с пользователями</h4>
            </a>
        </li>

        <li>
            <a href="{{route('slider')}}">
                <h4>Работа со слайдером</h4>
            </a>
        </li>


        <li>
            <a href="{{route('index')}}">
                <h4>Перейти на сайт</h4>
            </a>
        </li>
              <div class="catalog">
               <li>  {{Widget::run('MainWidget',['class'=>'Directory','tpl'=>'menuSpr.php'])}}</li>
              </div>

    </ul>
</div>
</div>
