<div class="edgest1" style="margin:  15px 20px  30px 50px; ">
    @if(session('cardCommon.sum'))
        <div><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #FF0000;">&times;</span></button></div>
        <h1 style="font: bold italic 120% serif;">Мой набор - {!! session('cardCommon.sum') !!} гр.</h1>
    @else
        <h1>Мой набор - 0 гр.</h1>
    @endif
</div>
<div class="edgest2">
    <a href="#"  onclick="getCart();"><img src="{{ asset('public/'.env('THEME'))}}/images/features/buy.png"  style="margin-left: 50px;" alt="вывод кнопки купить" /></a>
</div>