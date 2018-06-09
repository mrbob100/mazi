<div class="secondwrap-01">
    @if(session('status'))

        <div class="alert alert-success">
            <h2> Личный кабинет</h2>
            <h3>{!! session('status') !!}</h3>
        </div>
    @endif
    @if(session('Author'))
        <div class="alert alert-success">
            <h1>Статус:&nbsp  {{ Session::get('Author.status')}}</h1>
            <p>E-mail:&nbsp  {{ Session::get('Author.email')}}</p>

            <p>Тел: &nbsp     {{ Session::get('Author.phone')}}</p>
            <p>Адрес:  &nbsp  {{ Session::get('Author.address')}}</p>
            <p>Оборот(месячный):  &nbsp  {!! session('Turnover') !!}.00 гр</p>
            @if(Session::get('Author.status')!='dealer1' && Session::get('Author.status')!='dealer2')
                <h2>Скидка на товары :  &nbsp {{ Session::get('Author.discount')}}%</h2>
                <h3>Скидка зависит от объема закупок</h3>
            @endif



        </div>
        <form>
            <input type="button" class="alert alert-danger" value="Изменить параметры авторизации" onClick='location.href="{{ route('change') }}"'>
        </form>
    @endif
</div>