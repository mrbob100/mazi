<div id="edgest1" style="margin-bottom: 19px;">
    @if(session('cardCommon.sum'))
        <h1>Мой набор - {!! session('cardCommon.sum') !!} гр.</h1>
    @else
        <h1>Мой набор - 0 гр.</h1>
    @endif
</div>
<div id="edgest2">
    <a href="#"  onclick="getCart();"><img src="{{ asset('public/'.env('THEME'))}}/images/features/buy.png" alt="вывод кнопки купить" /></a>
</div>