<div class="container portfolio_title">
    <div class="section-title">
        <h5>{{$title}}</h5>
    </div>
</div>
<div class="nav nav-pills  horizontal">
<div id="filters">
    <ul style="padding:0px 0px 0px 100px" class="nav navbar-nav navbar-left">
        <li>
            <a href="{{route('categories')}}">
              <h5>Категории</h5>
            </a>
        </li>
        <li>
            <a href="{{route('products')}}">
                <h5>Продукты</h5>
            </a>
        </li>
        <li>
            <a href="{{route('orders')}}">
                <h5>Заказы</h5>
            </a>
        </li>
        <li>
            <a href="{{route('ordertItems')}}">
                <h5>Структура заказа</h5>
            </a>
        </li>
    </ul>
</div>
</div>