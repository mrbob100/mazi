/*price range*/

$('#sl2').slider();
$('.catalog').dcAccordion({
    speed: 300
});


function myClearance() {
    window.location.replace('/mazi');
    exit();
}


function showCart(cart){
	$('#cart .modal-body').html(cart);
	$('#cart').modal();
}

function getCart(){
	$.ajax({
		url: 'cartShow',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      //  url: 'http://pullsky.kretivz.pro/web/cart/show',
		type: 'GET',
		success: function(res){
			if(!res) alert('Ошибка!');
			showCart(res);
		},
		error: function(){
			alert('Error!');
		}
	});
	return false;
}




$(function(){
$('.modal-body').on('click', '.del-item', function(e){

    e.preventDefault();
	let id = $(this).data('id');

	$.ajax({
		url: 'delIt',
		data: {id: id},
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: 'GET',
		success: function(res){
			if(!res) alert('Ошибка!');
			showCart(res);
		},
		error: function(){
			alert('Error!');
		}
	});
  });

});


$(function(){
    $('#contentHolder').on('click', '.container101 .tabOwl .del-item', function(e){
        //alert(123);
        e.preventDefault();
        let id = $(this).data('id'),
            cs=$(this).data('cs');

        $.ajax({
            url: 'arrange',
            data: {id: id, cs:cs},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'GET',
            success: function(res){
                if(!res) alert('Ошибка!');
                $('#contentHolder').empty();
                $('#contentHolder').append(res.content);
            },
            error: function(){
                alert('Error!');
            }
        });
    });

});



function clearCart(){
	$.ajax({
		url: 'clear',
		type: 'GET',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		success: function(res){
			if(!res) alert('Выйдите из категории товара и повторите очистку!');
			showCart(res);
		},
		error: function(){
			alert('Выйдите из категории товара и повторите очистку!!!');
		}
	      });
}


$( document ).ready(function(){
$('.add-to-cart').on('click', function (e) {
	//e.preventDefault();
	let id = $(this).data('id');

	$.ajax({

      url: "addcartios",
		cache: false,
		data: {id: id},
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: 'GET',
		dataType: "text",
		success: function(res){
			if(!res) alert('Ошибка!');
			showCart(res);


		},
		error: function(){
			alert('Ошибка передачи!');
		}

	});

});




//___________________________________________________________________________________________________________
 //    изменение количества в модальном окне

    $('.modal-body').on('click','.minus',function () {
        let $input = $(this).parent().find('input'),
             count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.modal-body').on('click','.plus',function () {
        let $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });

    $('.modal-body').on('change','input',function () {

    let qty=$(this).val(),
        id=$(this).data('id');

        $.ajax({
            url: "changeQty",
            cache: false,
            data: { id: id,  qty: qty },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'GET' ,
            dataType: "JSON",
            success: function(res){
                if(!res) alert('Ошибка!');

                //$('.wrap_result').append('<br/><strong>Выборка выполнена !</strong>').delay(2000).fadeOut(500);

                $('.table-responsive').empty();
                $('.table-responsive').append(res.content);
            },
            error: function(){
                alert('Ошибка передачи данных модального окна!');
            }
        });

    });




    $("#flexiselDemo3 ").flexisel({
        visibleItems: 5,
        animationSpeed: 500,
        autoPlay: false,
        autoPlaySpeed: 3000,
        pauseOnHover: true,
        itemsToScroll: 1,

        infinite: true,
        navigationTargetSelector:true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: {
            portrait: {
                changePoint:480,
                visibleItems: 1
            },
            landscape: {
                changePoint:640,
                visibleItems: 2
            },
            tablet: {
                changePoint:768,
                visibleItems: 5
            }
        }
    });
   $("#slick-slider").flexisel({
        visibleItems: 5,
        animationSpeed: 500,
        autoPlay: false,
        autoPlaySpeed: 3000,
        pauseOnHover: true,
        itemsToScroll: 1,

        infinite: true,
        navigationTargetSelector:true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: {
            portrait: {
                changePoint:480,
                visibleItems: 1
            },
            landscape: {
                changePoint:640,
                visibleItems: 2
            },
            tablet: {
                changePoint:768,
                visibleItems: 5
            }
        }
    });






});



	let RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};

/*scroll to top*/



$(document).ready(function(){

		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});

});


//______________________________________________________________________________________________________________________
//______________________________________________________________________________________________________________________
//  функция расчета бокового меню и создания фильтров
jQuery(document).ready(function($) {
// блок реакции на выбор кнопок и селекта

    $(" #slider-range").slider({
        range: true,
        min: $("input#pricer dataMin").data('min'),
        max: $("input#pricer").val(),
        step: 10,
        values: [$("#insertOption input#pricer").data('min'), $("#insertOption input#pricer").val()],
        //   values: [0, 80000],

        slide: function (event, ui) {

            $(" #pricer").val("гр." + ui.values[0] + " - гр." + ui.values[1]);
        }

    });
    $("#insertOption#pricer").val("гр." + $("#insertOption#slider-range").slider("values", 0) + " - гр." + $("#insertOption#slider-range").slider("values", 1));
    $("#insertOption #selectMyFixing").on('slide','.selectValItem', function (e) {
//$.listen('slide','.selectValItem', function(e){
        e.preventDefault();
        $(" #selectMyFixing").submit();


    });

});
//______________________________________________________________________________________________________________________
//______________________________________________________________________________________________________________________
function myRangeIn() {

    $(" #slider-range").slider({
        range: true,
        //    min: 300,
        //    max: 80000,
        min: $(" input#pricer dataMin").data('min'),
        max: $(" input#pricer").val(),
        step: 10,
        values: [$("input#pricer").data('min'), $("input#pricer").val()],
        //   values: [0, 80000],

        slide: function (event, ui) {

            $(" #pricer").val("гр." + ui.values[0] + " - гр." + ui.values[1]);
        }

    });
    $("#pricer").val("гр." + $("#slider-range").slider("values", 0) + " - гр." + $("#slider-range").slider("values", 1));
}

function myRangeOut() {
    $("#selectMyFixing ").on('slide','.selectValItem', function (e) {
//$.listen('slide','.selectValItem', function(e){
        e.preventDefault();
        $(" #selectMyFixing").submit();


    });

    //   $("#insertOption #selectMyFixing").on('change',' .selectValItem',function(e){
    $.listen('change', '#selectMyFixing .selectValItem', function (e) {
        e.preventDefault();

        $(" #selectMyFixing").submit();


    });
}


//______________________________________________________________________________________________________________________


      jQuery(document).ready(function() {
          $("#insertOption").on('submit', '#selectMyFixing ', function (e) {
              // $(this)

              e.preventDefault();
              let form = $(this),
                  data = $(form).serializeArray();

              $.ajax({

                  url: form.attr('action'),

                  cache: false,
                  data: data,
                  /* beforeSend: function(data) { // сoбытиe дo oтпрaвки
                   form.find('input[type="submit"]').attr('disabled', 'disabled'); // нaпримeр, oтключим кнoпку, чтoбы нe жaли пo 100 рaз
                   },  здесь должен быть ограничитель  звездочеа и косая  */
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  type: form.attr('method'),
                  dataType: "JSON",
                  success: function (res) {
                      if (!res) alert('Ошибка!');

                      //$('.wrap_result').append('<br/><strong>Выборка выполнена !</strong>').delay(2000).fadeOut(500);
                      $('#contentHolder').empty();
                      // $('#mediumMine').replaceWith(res.content);
                      $('#contentHolder').append(res.content);
                      let h1 = $('#contentHolder').height();
                      $('.wrapSubProd').css('height', h1 - 120);
                  },
                  error: function () {
                      alert('Ошибка передачи slider и кнопок!');
                  }

              });


          });




//__________________________________________________________________________________________________________
// функция выводит продукты по селекту сортировки на странице продукции
//function onSorties()
//{
    $('#contentHolder').on('change','#sortValue',function(e){
        e.preventDefault();
        let data21=$(this).val(),
            lat=$(this).data('sign'),
            pr=$(this).data('pr'),
            href=$(this).data('href');
         let   idi=href.split('/').pop();
        $.ajax({
            url: idi,
            data: {data: data21, latitude: lat, pr: pr},
            cache: false,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            //  url: 'http://pullsky.kretivz.pro/web/cart/show',
            type: 'GET',
            dataType: "JSON",
            success: function(res){
                if(!res) alert('Ошибка!');
                $('#contentHolder').empty();
                $('#contentHolder').append(res.content);
            },
            error: function(){
                alert('Ошибка передачи переметра сортировки');
            }

        });
    });
});
//}
//________________________________________________________________________________________________________

jQuery(document).ready(function() {
    $('#contentHolder').on('click','.sortieOption .sortie5 #cascad', function(e){
        e.preventDefault();
        let id=$(this).data('id'),
            href=$(this).data('href'),
            pr=$(this).data('pr'),
        idi=$(this).attr('href').split('/').pop(),
            lat=$(this).data('sign');
            if(lat) id=11;

        $.ajax({
            url:  idi,
            data: {vert: id, latitude: lat, pr: pr},
            cache: false,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            //  url: 'http://pullsky.kretivz.pro/web/cart/show',
            type: 'GET',
            dataType: "JSON",
            success: function(res){
                if(!res) alert('Ошибка!');
                $('#contentHolder').empty();
                $('#contentHolder').append(res.content);
            },
            error: function(){
                alert('Ошибка передачи переметра сортировки');
            }

        });
    });

    $('#contentHolder').on('click','.sortieOption .sortie4 #caucaus, #clearMain', function(e) {
        e.preventDefault();
         let href = $(this).data('href'),
             idi= $(this).attr('href'),
             hr=idi.split('?'),
             cs=$(this).data('sign'),
             id=0,
            pr=24; // признак работы с видом вывода на экран
             href=hr[0];
        if(cs==58)
        {
            window.location.replace('/mazi');
            exit();
        }
        let ss=getContent(href, true,id, pr,cs);
        jQuery('.like_name').removeClass('active');
        $(this).addClass('active');
    });

});




// всплывающий блок продукции
jQuery(document).ready(function() {
    let flag = 'true';
  //  $('.PinkerMain .subboth').on('click',function(e){
     $.listen('click','.PinkerMain .subboth',function(e){
       e.preventDefault();

        let id=$(this).data('id');

        if (flag) {
            flag = false;
            func1.call(this,id);
        }else {
            flag = true;
            func2.call(this,id);
        }
        return false;id=$(this).data('id');

    });
    function func1(id){

      //  $("tr.asdast").fadeOut(1000);
        $(".asdast").fadeOut(1000);
    }


    function func2(id){

        $(".asdast").fadeIn(1000);

    }


//______________________________________________________________________________________________________________________
// оформление главной страницы ее загрузка
//______________________________________________________________________________________________________________________
    let main="indexpage", nameCat="Главная", fg='';
    $('#crumbs').empty();
            $('#crumbs').append('<li><a>');
            $('#crumbs li:last-child a').attr("href", "#").attr("id", main).attr("autocomplete", "address-level1").html(nameCat);
    let inside={data: 'indexpage', pr: '99',nameCat:nameCat, url:'indexpage'};
    NavigationCache.push(inside);
    if($('.catalog li > a').hasClass('active'))
    {
        fg=$('.catalog li > ul').hide(500);
    }
//______________________________________________________________________________________________________________________
});



function workupPr(pr=0, data=0)
{

    if(pr==0){
        $('#picture').hide();
        $('#insertOption, #contentHolder, #contentText').empty();
        $('.slider, .profit1,.container-wrap-banner').empty();
        $('.container-right-edgest').empty();
        $('#contentText').empty();
        $('#wrap-last').css('display','none');
     //   if($('div').hasClass('piza'))
      //  {
       //     $('#contentHolder').empty();
       // } else {
        //    let newElem=$("<div class='piza' id='contentHolder'></div>");
        //    $('.container-right-wpap').append(newElem);
        //}
        $('.edgest1').empty();
        $('.edgest2').empty();
        $('#uri_last').empty();


        $('.container-right-edge ').empty();
        $('.container-right-edgest').empty();
        $('.container-right-edgest').css('opacity','0');
        $('.container-wrap-row .catalog').css({"display":"flex","border":"1px solid lightblue"});
        $('#contentHolder').append(data.content);
        return;
    }

    if(pr=="22")
    {
        $('#picture').hide();
        $('#insertOption,  #contentText').empty();
        $('.slider, .profit1,.container-wrap-banner').empty();
        $('#insertOption').append(data.leftBar);
        $('#insertOption').css('opacity','0');
        $('#insertOption').fadeTo(2000,1);
        $('#insertOption').css({"border":"1px solid lightblue"});

        $('#wrap-last').css('display','block');


        if($('.container-end ').hasClass('edgest1'))
        {
            $('.container-end ').empty();
            $('.edjes1').empty();
            $('.edjes2').empty();
        }
    //    $('.edgest1').empty();
    //    $('.edgest2').empty();
        $('.container-right-edge ').empty();
        // $('.container-end ').css('display','none');
        $('.container-right-edge ').append(data.content);
        $('.container-right-edge ').css('opacity','0');
        $('.container-right-edge ').fadeTo(3000,1);
        $('.container-right-edgest').empty();
        $('.container-right-edgest').css('opacity','1');
        $('.container-right-edgest').append(data.commonSum);
        $('#wrap-last .container-end ').empty();
        $('#wrap-last .container-end').css('display','none');


        myRangeIn();
        return;

    }

    if(pr==24) // категория дрели как левое боковое меню, так и центр
    {
        $('.slider, .profit1,.container-wrap-banner').empty();
        $('#picture').hide();
        $('#insertOption, #contentHolder, #contentText').empty();

        $('.container-right-edge, .container-right-edgest').empty();
        $('#contentHolder').append(data.content);
        $('#contentHolder').css('opacity','0');
        $('#contentHolder').fadeTo(2000,1);
        $('#insertOption').append(data.leftBar);
        $('#contentText').append(data.sigma);
        numberDifference=data.cs;
        if( numberDifference)
        {
            $('#contentHolder .sortie .sortieOption .sortie1_4').empty();
            $('#contentHolder .sortie .sortieOption .sortie1_4').css("display","block");
            let  newElem=$("<div class='layer002'></div>").append(data.cs);
            $('#contentHolder .sortie .sortieOption .sortie1_4').append(newElem);

        }
        myRangeIn();
        return;
    }

    if(pr==25)
    {
        $('#picture').hide();
        $('#contentText').empty();
        $('.slider, .profit1,.container-wrap-banner, #mediumMine').empty();

        $('.container-right-edgest').empty();
        $('.container-right-edgest').append(data.commonSum);
       $('#contentHolder').append(data.content);
        $('#contentText').append(data.sigma);
        return;
    }
    if(pr==26){ // признак вывода модального окна продукта
        //  $('.container-right-edgest').empty();
        $('.modalMain').empty();

        $('.modalMain').append(data.content);

        $('.modalMain').animate({opacity:1, top:'45%'},200, function () {$(this).css('display','block')});
        $(' .overflow').animate({opacity:1, top:'0'},200, function () {$(this).css('display','block')});

        $(" html, body").animate({scrollTop:0},"slow");

            openWin();

        // $(' div.overflow').remove();
        return;
    }
    if(pr==27){
        $('#picture').hide();
        $('#insertOption, #contentHolder, #contentText').empty();
        $('.slider, .profit1,.container-wrap-banner').empty();
        $('#mediumMine, .container-right-edgest').empty();
        $('#wrap-last ').css('display','none');
        $('#insertOption').css('opacity','0');

        $('nav .wrap1').empty();
        $('.container-wrap-row .catalog').css('border','inherit');
        $('.container-wrap-row .catalog').css({"display":"none"});

        $('#contentHolder').css('margin-left','20px');
        $('#contentHolder').append(data.content);

        $('.close').click();
        return;
    }

    if(pr==36) // категория  электроинструменты. газонокосилки и тд.
        {

            $('.slider, .profit1,.container-wrap-banner,.container-right-edge,.container-right-edgest').empty();
            $('#contentHolder').empty();
            $('#contentHolder').append(data.content);
            $('#contentHolder').css('opacity','0');
            $('#contentHolder').fadeTo(2000,1);
            $('#contentText').append(data.sigma);


            return;
        }

    if(pr==39) // модальное окно корзины
    {
        $('#insertOption').empty();
        $('.modal-body').empty();
        $('.modal-body').append(data.content);
        showCart(data.content);
        return;
    }

    if(pr==40)
    {
        let yyy=0;
        $('#contentHolder .sortie .sortieOption .sortie1_4').empty();
        $('#contentHolder .sortie .sortieOption .sortie1_4').css("display","block");
        let  newElem=$("<div class='layer002'></div>").append(data.content);
        $('#contentHolder .sortie .sortieOption .sortie1_4').append(newElem);
        $('.layer002').css('opacity','0');
        $('.layer002').fadeTo(500,1);
        return;
    }
    else{
        if(pr!=39)
        {
            $('#picture').hide();
        }

    }
    if(pr==41)
    {
        $('#contentHolder').empty();
        $('#contentHolder').append(data.content);
        return;
    }

    if(pr==50 || pr==51)
   {
       $('.container-wrap-banner').empty();
       $('.slider').empty();
       $('.profit1').empty();
       $('#contentHolder').empty();
       $('#contentHolder').append(data.content);
       $('#contentHolder').css('opacity','0');
       $('#contentHolder').fadeTo(2000,1);
       return;
   }

    if(pr==52)
    {
        $('.modalMain2').empty();
        $('.modalMain2').append(data.content);
        openWin2();
        return;
    }
    if(pr==53 ||  pr==57)
    {
        $('#contentHolder').empty();
        $('.container-wrap-banner').css("display","none");
        $('.slider').css("display","none");
        $('.profit1').css("display","none");
        $('#contentHolder').append(data.content);
        $('#contentHolder').css('opacity','0');
       $('#contentHolder').fadeTo(2000,1);
        return;
    }
    if(pr==59)
    {
        $('.modalMain').animate({opacity:0, top:'45%'},200, function () {$(this).css('display','none')});
        $(' .overflow').animate({opacity:0, top:'45%'},200, function () {$(this).css('display','none')});
        $('.modalMain').empty();
        $(' .overflow').empty();
        $('#insertOption').empty();
        $('.modal-body').empty();
        $('.modal-body').append(data.content);

        showCart(data.content);
        return;
    }

        if(pr!=25 && pr!=23)
        {
            $('#insertOption').empty();
        }


    if(pr==34)  // кабинет нет регистрации
    {
        let reign=data.content;
        if(reign==="Авторизация")
        {
            window.location.replace('home');
            return;
        }
    }
     if(pr==35) // кабинет есть регистрация
     {
        $('.wrap1').css('display','none');
         $('#cabinet').replaceWith(data.sesille);
         $('.secondwrap-02 .rockwel-01').empty();
         $('.secondwrap-02 .rockwel-01').append(data.leftBar);
         $('.secondwrap-02  #mediumMine').empty();
         $('.secondwrap-02  #mediumMine').append(data.content);
         $('.container-wrap').css('display','none');
         return;
     }



    if(pr!="22" && pr!="36")
    {
        $('.profit .container-wrap-row .item .text').css({"border":"none","margin-top":"0"});
    }
    $('.container-wrap-banner').empty();
    $('.slider').empty();
    $('.profit1').empty();
    $('#mediumMine').empty();
    $('.container-right-edgest').empty();
    if(pr!=22 && pr!=25 && pr!=23 &&pr!=26) $('#contentHolder').empty();
    $('#contentText').empty();


    if(pr==36)$('#wrap-last').css('display','none');

    if(pr==0||pr==21)  {
        $('.edgest1').empty();
        $('.edgest2').empty();
        $('#uri_last').empty();


        $('.container-right-edge ').empty();
        $('.container-right-edgest').empty();
        $('.container-right-edgest').css('opacity','0');
        $('.container-wrap-row .catalog').css({"display":"flex","border":"1px solid lightblue"});
    }


    if(pr==23){
        $('#wrap-last .container-end ').empty();

        $('#wrap-last .container-end ').append(data.commonSum);

        //$('#wrap-last .container-end ').css({"display":"block","background-color":"#E9E9E9","margin-left":"10px","height":"100px","width":"200px"});
        $('.edgest1').css({"background-color":"#E9E9E9","margin":"0 0 0 10px","height":"50px","width":"200px"});
        $('.edgest2').css({"background-color":"#E9E9E9","margin":"0 0 0 10px","padding-left":"90px","height":"50px","width":"200px"});
    }

    if(pr!=22 && pr!=24 && pr!=23 && pr!=26)
    {
        $('#contentHolder').append(data.content);
        $('#contentHolder').css('opacity','0');
        $('#contentHolder').fadeTo(2000,1);
        $('#contentText').append(data.sigma);

    }



}
//______________________________________________________________________________________________________________________
// Функции history API

let NavigationCache = [],
    priznNav=0,
    suprizeMe='',
     dad='',
     url='',
      cntqnt=0,
    arc=false,
    commonNamePlus='',
    commoNameReal='',
    numberDifference=0,
    updatePr22=false,
    modalSign=0,
index='',
    tabname='{"indexpage":"Главная","categorysuper":"Раздел","difference":"Сравнение","cartload":"Корзина","category":"Категория","categoryMain":"Набор","categoryleft":"Категория набора","addcartios":"Добавить","actionSell":"Акция","arrange":"Заказ","contract":"Контракт"}';
indexmy=JSON.parse(tabname);


$('document').ready(function(){
    jQuery('.historyAPI, .sem').on('click','a', function(e){
        e.preventDefault();
        let href = $(this).data('href'),
            url='',
            cs=0,
          pr=$(this).data('sign');
        if(pr<31 || pr>33 ){ //это временное отключение меню акция, доставка...
        // Getting Content
            let  pas= href.split('/');
            pas= pas.pop();
            pas=  pas.split('?');
            url=pas[0];
let glass=indexmy[ url];
      let ss=getContent(href, true,0, pr,cs, glass);
        jQuery('.historyAPI').removeClass('active');
        $(this).addClass('active');
        }

    });

});

// Adding popstate event listener to handle browser back button
/*window.addEventListener("popstate", function(e) {
    // Get State value using e.state
    $pat=location.pathname;
    getContent(location.pathname, false);
});

*/

    History.Adapter.bind(window, 'statechange', function (e) {

        let sss = 0,
       // let State = History.getState();
            stat1=window.location.toString(),
             kark = '',
             priz = '',
             gibrid='';
        url=lastAlfa(url);

    //    let pas = State.cleanUrl;

        if(url==='index.php')
        {
            // window.load(base_url);
            window.location.replace('/mazi');
        }else {
                    if (priznNav != 999)
                    {
                        $('#central').css("display","block");
                    gibrid=navigationHistory(url);
                       dad = gibrid.data;
                      //  history.back();
                        let State = History.getState();
                        console.log("State ",State);
                       // dad='';
                        $('#contentHolder').html(dad);
                        let pr = gibrid.pr;
                        let id=gibrid.id;
                     //   let init = {data: dad, pr: pr};

                        priznNav = 0;
                        $('#crumbs').empty();
                        navigateBread();
                    //  if(url!= "addcartios"&& url!="indexpage")
                        if(url!="indexpage")
                      {
                       getContent(stat1,false,id,pr);
                    //     History.replaceState(null, null, url);
                      }
                    }
             }
    });




    /*window.addEventListener('hashchange', function(e) {
        // Get State value using e.state

        getContent(location.pathname, false);
    }); */


function getContent(url, addEntry, id=0, pr=0,cs=0, nameCat=false) {
    $.get(url,{id: id, pr: pr, cs: cs, nameCat: nameCat},{cache: false})
        .done(function( data ) {
            // Updating Content on Page
           workupPr(pr, data);
            //  $('#contentHolder').html(data);
      // alert('Загрузка завершена.');

          let  pas=url.split('/');
            pas= pas.pop();
            pas=  pas.split('?');
            url=pas[0];
            if(addEntry )
            {
               let kark=0, numId=0, numURL=0;
                dad=data.content;
                if(pr==0)
                {
                    suprizeMe=dad;
                }
                // console.log('data',data);
                let inside={data: dad, pr: pr, id: id, nameCat:nameCat, url:url};
                // Add History Entry using pushState
                cnt=NavigationCache.length; // длина
                let ofindi=false;
                let i=0;
                if(cnt>0)
                {
                   for( i=0; i<cnt; i++)
                   {
                      kark= NavigationCache[i].nameCat;
                      if(nameCat==kark)
                      {
                          numURL=NavigationCache[i].nameCat;

                          ofindi=true; break;
                      }
                   }
                   if(ofindi)
                   {
                       priznNav=999;
                        let j=0,karla=0,pit=0;
                       karla=navigationHistory( numURL);

                       dad=karla.data;
                       if((!updatePr22) && (pr!=39)&& (pr!=24) &&(pr!=25) && (pr!=26) &&(pr!=36) && (pr!=40) &&(pr!=41) &&(pr!=30)&&(pr!=50) &&(pr!=51) &&(pr!=53)&&(pr!=57)&&(pr!=59)&&(pr!=60))
                       {
                           $('#contentHolder').replaceWith(dad);
                       }

                       $('#crumbs').empty();
                       navigateBread();

                   }
                   else
                       {
                           NavigationCache.push(inside) ;
                           priznNav=999;
                           $('#crumbs').empty();
                          navigateBread();
                 //          $('#crumbs li:last-child a').replaceWith("<p></p>").attr("id", kark).html(kark);
                           History.pushState({id:id,nameCat:nameCat}, null, url);
                           priznNav=0;
                       }
                }
                else
                {
                   NavigationCache.push(inside) ;
                    priznNav=999;
                    $('#crumbs').empty();
                     navigateBread();
             //       $('#crumbs li:last-child a').replaceWith("<p></p>").attr("id", kark).html(kark);
                    History.pushState({id:id,nameCat:nameCat}, null, url);

                }


            }
            if(!addEntry)
            {

                    $('#crumbs').empty();

                    navigateBread();

            }

            if(pr==22){
                $('#contentHolder').empty();
                $('#contentHolder').append(suprizeMe);
            }

            priznNav=0;

        });
}

function navigateBread()
{
     cnt=NavigationCache.length; // длина
    for(let i=0; i<cnt; i++)
    {
        kark= NavigationCache[i].nameCat; // имя таба в навигации крошек
        if(kark!=="product")
        {
        $('#crumbs').append('<li><a>');
        $('#crumbs li:last-child a').attr("href","#").attr("id",kark).attr("autocomplete","address-level1").html( kark);
        }
    }
}

function navigationHistory(cs)
{
     cnt = NavigationCache.length; // длина крошек

     let   kark='', gibrid='',workup=[], j=0, m=0, cart='';
    if (cnt > 0)
    {
       if(cs==indexmy['cartload'])
       {
           for (let i = cnt-1; i >=0; i--) // поиск корзины
           {

               if(NavigationCache[i].nameCat==indexmy['cartload'])
               {
                   j=i;
                   for(let k=cnt-1; k>=j; k--)
                   {
                       if(k>j)
                       {
                           workup[k]=NavigationCache.pop();
                       }
                       else
                           {
                               cart= NavigationCache.pop();
                           }
                   }
                    for(let k=j+1; k<= cnt-1; k++)
                    {


                        NavigationCache.push(workup[k]);

                    }
                   NavigationCache.push(cart);
                  break;
               }

           }
           cnt = NavigationCache.length-1;
           return  NavigationCache[cnt];
       }
         else
       {
                for (let i = cnt-1; i >=0; i--)
                {
                    kark = NavigationCache[i].nameCat; // имя таба в навигации крошек

                    if(cs!=kark )
                    {
                        let rer = NavigationCache.pop();
                    } else
                    {
                        gibrid= NavigationCache[i];
                        break;
                    }
                }
       }
    }
    return gibrid;
}

function lastAlfa(url)
{

    let stat1=window.location.toString(),
        str='',
        tt = [];
    tt =stat1.split('//');
    url = tt[1].split('/');
    url = url.pop();
    cnt=url.length;
   str=url.slice(cnt-1);
    // убираем кэшированную запись из history
    if(str=='#' )
    {
        let State1=History.back(),
          stat1=window.location.toString();

        tt =stat1.split('//');
        url = tt[1].split('/');
        url = url.pop();
    }
    return url;
}


jQuery('document').ready(function(){
    jQuery('#contentHolder').on('click',' #reactimage, #reactbutton,   .wrapProdT02 .productsinT02 a', function(e){
        e.preventDefault();
        let href = $(this).data('href'),
           cs=0,
            newElem='',
          id=$(this).data('id'),
            glass=$(this).parent().siblings('p').text(),
            hrefAdd='',
            pr=$(this).data('sign'),
            shortUrl=[];
        shortUrl=href.split('&');
        hrefAdd=shortUrl[0];

        gl1 =glass.split('\n,');
        gl1=$.trim(gl1);
        gl1=gl1.split('          ');
        if(!gl1[1])
        {
            glass= gl1[0];
        }
        else
        {
            glass= gl1[0]+ gl1[1];
        }

        if(pr==55) cs=43;
        if(pr==26)
        {
        cs=26;

        }


        updatePr22=false;

        if(pr==22) updatePr22=true;
        // Getting Content
        if(pr==40){
            cntqnt++;
            cs=cntqnt;
            newElem=$("<div class='layer001'></div>")
                .append("<img src='http://localhost/mazi/public/pink/images/features/tick.png' style='width:50px; height:auto; z-index:1;position:absolute; top: 218px; left: 140px; ' />");
         //  $(this).css('display','none');
         //   $(this).hide();
           $(this).parents('.productsinT01').append(newElem);
        }
       // commoNameReal.closest('ul').slideUp(1000);
      let rer=  $('.catalog li .active').siblings().hide(1000),
          glass='',
         pas=href.split('/');
        pas= pas.pop();
        glass=indexmy[pas];

        let ss=getContent(href, true,id, pr,cs, glass);



    });

});

 /*function zaraza(elem) {
    let fd=elem;
    let href=$(fd).attr('data-href'),

        id=$(fd).attr('data-id'),
    cs=$(fd).attr('data-sign'),
        glass="Корзина";
    pr=cs;
    updatePr22 = false;
    $.ajax({
        url:  'cartload',
        data: {id: id, pr: pr},
        cache: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //  url: 'http://pullsky.kretivz.pro/web/cart/show',
        type: 'GET',
        dataType: "JSON",
        success: function(res){
            if(!res) alert('Ошибка!');
            $('.modal-body').empty();
            $('.modal-body').append(data.content);
            showCart(data.content);
        },
        error: function(){
            alert('Ошибка передачи переметра сортировки');
        }

    });


} */

jQuery('document').ready(function() {
   // jQuery.listen('click', '.wrapperProducts  .productsinT021 .result .mask #reactivebut', function (e) {
        //  e.preventDefault();
            jQuery('#contentHolder').on('click','.wrapperProducts .productsinT021 .result .mask #reactivebut ', function(e){
        e.preventDefault();
        let href = $(this).data('href'),
            cs = 0,
            newElem = '',
            id = $(this).data('id'),
             pr=$(this).data('sign'),
            glass="Корзина";

        updatePr22 = false;



        let ss = getContent(href, true, id, pr, cs, glass);
        jQuery('.like_name').removeClass('active');
        $(this).addClass('active');


    });

});




jQuery('document').ready(function(){

    jQuery('#contentHolder').on('click','  .productsinT01 a,  .productsinT01 .liked-product .mask11 .mask110 a,  .productsinT01 .liked-product .mask11 .mask110  #buy,  .productsinT01 .liked-product .mask11 .mask111 a', function(e) {
        e.preventDefault();
        let href = $(this).data('href'),
            cs=0,
            newElem='',
            id=$(this).data('id'),
            glass=$(this).parent().siblings('p').text(),
            hrefAdd='',
            pr=$(this).data('sign'),
            shortUrl=[];
        shortUrl=href.split('&');
        hrefAdd=shortUrl[0];

        gl1 =glass.split('\n,');
        gl1=$.trim(gl1);
        gl1=gl1.split('          ');
        if(!gl1[1])
        {
            glass= gl1[0];
        }
        else
        {
            glass= gl1[0]+ gl1[1];
        }

        if(pr==55) cs=43;
        if(pr==26)
        {
            cs=26;

        }


        updatePr22=false;
        if(pr==22) updatePr22=true;
        // Getting Content
        if(pr==40){
            cntqnt++;
            cs=cntqnt;
            newElem=$("<div class='layer001'></div>")
                .append("<img src='http://localhost/mazi/public/pink/images/features/tick.png' style='width:50px; height:auto; z-index:1;position:absolute; top: 218px; left: 140px; ' />");
            //  $(this).css('display','none');
            //   $(this).hide();
            $(this).parents('.productsinT01').append(newElem);
        }
        // commoNameReal.closest('ul').slideUp(1000);
        let rer=  $('.catalog li .active').siblings().hide(1000),

            pas=href.split('/');
        pas= pas.pop();
        glass=indexmy[pas];

        let ss=getContent(href, true,id, pr,cs, glass);
        jQuery('.like_name').removeClass('active');
        $(this).addClass('active');
    });





    jQuery('#contentHolder').on('click','.wrapProdT02 .productsinT03 .mask11 img,.productsinT03 .mask11 #picture ', function(e){
        e.preventDefault();
        let href = $(this).data('href'),
            cs=0,
            newElem='',
            id=$(this).data('id'),
            pr=$(this).data('sign');
        if(pr==55) cs=43;
        if(pr==26)
        {
            cs=26;

        }
        updatePr22=false;

        if(pr==22) updatePr22=true;
        // Getting Content
        if(pr==40){
            cntqnt++;
            cs=cntqnt;
            newElem=$("<div class='layer001'></div>")
                .append("<img src='http://localhost/mazi/public/pink/images/features/tick.png' style='margin-left:130px; margin-top: -30px; width:50px; height:auto; z-index:1;position:absolute; ' />");
            //  $(this).css('display','none');
            //   $(this).hide();
            $(this).parents('.productsinT03').append(newElem);
        }
        // commoNameReal.closest('ul').slideUp(1000);
        let rer=  $('.catalog li .active').siblings().hide(1000);

        let ss=getContent(href, true,id, pr,cs);
        jQuery('.like_name').removeClass('active');
        $(this).addClass('active');


    });







// Удаление продукта из сравниваемых
    jQuery('#contentHolder').on('click', '.wrapperCompareProducts .productsCompare #delButton a',function (e) {
        e.preventDefault();
        let href = $(this).data('href'),
            id=$(this).data('id'),
            cs=$(this).data('sign'),
            pr=24;
         getContent(href, true,id, pr,cs);
        jQuery('.like_name').removeClass('active');
        $(this).addClass('active');
    });

// собрать набор -> акк. инструмент
    jQuery('.container-right-wpap').on('click','.wrapCat .categoriesin .like_name', function (e) {
        e.preventDefault();
        let href = $(this).data('href'),
            cs=$(this).data('sign'),
            pr=0,
            newElem='',
            id=$(this).data('id'),
            glass='',
            //glass=$(this).siblings('p').text(),
            hrefAdd='',
            shortUrl=[];
        shortUrl=href.split('&');
        hrefAdd=shortUrl[0];

        glass=$(this).siblings('p').text();


        gl1 =glass.split('\n,');
        gl1=$.trim(gl1);
        gl1=gl1.split('          ');
        if(!gl1[1])
        {
            glass= gl1[0];
        }
        else
        {
            glass= gl1[0]+ gl1[1];
        }

        cs=$(this).data('sign');
        pr=cs;
        let ss=getContent(href, true,id, pr,cs, glass);
        jQuery('.like_name').removeClass('active');
        $(this).addClass('active');
    });

});


jQuery('document').ready(function(){
    jQuery('#crumbs').on('click','li a', function(e){
        e.preventDefault();
        let  url='',
            url_rus = $(this).html(),
            cs=0,
            cnt=0,
         base_url=window.location.toString(),
           kark='',
           pas= base_url.split('//'),
           str='',
            glass=$(this).addClass('.active').text(),
           second=pas[1].split('/');
          second.pop();
        cnt = NavigationCache.length;

        let gl1=glass.split('\n,');
        gl1=$.trim(gl1);

        gl1=gl1.split('          ');
            if(!gl1[1])
            {
                glass= gl1[0];
            }
  else      glass= gl1[0]+ gl1[1];
        for(let i=0; i<cnt; i++)
        {
            kark = NavigationCache[i].nameCat; // имя таба в навигации крошек
            if(kark== url_rus)
            {
                cs=kark;
                url=NavigationCache[i].url;
                break;
            }
        }


         /*   $.each(indexmy, function (index, value) {

               if(url_rus == value) {
                    url = index;
                }

            }); */

           cnt=second.length;
          for(let i=0; i<cnt;i++)
          {
              str+= second[i]+'/';
          }
       base_url=pas[0]+'//'+str+url;
        let j=0;
          kark= navigationHistory(cs);
        if(url==='indexpage')
        {
            window.location.replace('/mazi');
        }
        else
     {

        if(kark)
        {
            let pr=kark.pr,
               id=kark.id,
                temp=0,
                temp2='',
                temp1='',
            pas=base_url.split('/');
            temp2=pas.pop();
            temp=base_url.lastIndexOf('/');
                temp1=base_url.substring(0,temp+1);
            temp1+='index.php';
            temp1+='/'+ temp2 + '?id='+id;

                commonNamePlus= temp1;
             ss=getContent( temp1, false,id, pr,cs,glass);
        }
      }
    });





    jQuery('.catalog ').on('click', '.dcjq-parent-li #azar li a ', function(e){
   // jQuery('.catalog ul#azar.azoneChild').on('click','li.azoneFirst', function(e){
        e.preventDefault();
      //  e.stopPropagation();
      //  $(this).closest('ul').slideUp(1000);

        // arc=true;
        let idi= $(this).attr('href'),
            hr=idi.split('?'),
            cs=0,
            href=hr[0],
            hrefAdd='',
            pic='',
            shortUrl=[],
            pr=24,  // признак работы с видом вывода на экран
            id=$(this).attr('href').split('data-id=').pop(),
            glass=$(this).addClass('.active').text(),
            gl1=glass.split('\n,');
        gl1=$.trim(gl1);
        gl1=gl1.split('          ');
        if(!gl1[1])
        {
            glass= gl1[0];
        }
        else
        {
            glass= gl1[0]+ gl1[1];
        }






        hrefAdd=href;
        hrefAdd+='?id='+id;
        if(hrefAdd==commonNamePlus)
        {
            // commonNamePlus='';
            e.stopPropagation();
            return;
        }
        commonNamePlus= hrefAdd;
             getContent(hrefAdd, true,id, pr, cs, glass);

        jQuery('.like_name').removeClass('active');
        $(this).addClass('active');

  });

    jQuery('.container-right-edge, .modal-content, .modalMain').on('click',' #reactiveimg,  #reactivebut, #reactivequick, #moreInfo, a', function(e){
        e.preventDefault();

        let href = $(this).data('href'),
            id=$(this).data('id'),
            pr=$(this).data('sign'),
            glass=" ",
            cs=0,
        // Getting Content
            pas=href.split('/');
        pas= pas.pop();

            glass=indexmy[pas];
          getContent(href, true,id, pr,cs,glass);

        jQuery('.like_name').removeClass('active');
        $(this).addClass('active');

    });



});


// отправка формы заказа usera
jQuery('document').ready(function() {
    $('#contentHolder').on('submit','#contractUser', function (e) {
        e.preventDefault();
        let form = $(this),
            href = $(this).data('href'),
            pr=$(this).data('sign'),
            data = $(form).serializeArray();

        $.ajax({
            url: form.attr('action'),
            cache: false,
            data: data,
            /* beforeSend: function(data) { // сoбытиe дo oтпрaвки
             form.find('input[type="submit"]').attr('disabled', 'disabled'); // нaпримeр, oтключим кнoпку, чтoбы нe жaли пo 100 рaз
             },  здесь должен быть ограничитель  звездочеа и косая  */
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: form.attr('method'),
            dataType: "JSON",
            success: function (res) {
                if (!res) alert('Ошибка!');

                //$('.wrap_result').append('<br/><strong>Выборка выполнена !</strong>').delay(2000).fadeOut(500);
            //    window.location.replace( href);
                $('#cabinet').replaceWith(res.sesille);
                $('.secondwrap-02 .rockwel-01').empty();
                $('.secondwrap-02 .rockwel-01').append(res.leftBar);
                $('.secondwrap-02  #mediumMine').empty();
                $('.secondwrap-02  #mediumMine').append(res.content);
               let dad='';
                priznNav=999;
                $pas=href.split('/');
               let url= $pas.pop();
                let inside={data: dad, pr: pr, url:url};
                NavigationCache.push(inside);
                let cnt=NavigationCache.length; // длина
                let kark='';
                $('#crumbs').empty();
                for(let i=0; i<cnt; i++)
                {
                    kark= NavigationCache[i].nameCat; // имя таба в навигации крошек
                    $('#crumbs').append('<li><a>');
                    $('#crumbs li:last-child a').attr("href","#").attr("id",kark).html(kark);
                }
                $('#central').css("display","none");
                History.pushState({url:url}, null, url);

            },
            error: function () {
                alert('Ошибка передачи slider и кнопок!');
            }
        });
    });
});

// события левого бокового меню по категориям типа -электроинстпументы
jQuery('document').ready(function() {
    $('.catalog').on('click','.dcjq-parent-li .dcjq-parent', function (e) {
        e.preventDefault();
        /*
         if(arc) {
         arc=false;
         exit();
         }
         */

        let href=$(this).attr('href'),
            pic=[],
            id='',
            cs=0,
            pr=36,
            gl1='',
            glass=$(this).addClass('.active').text(),
            hrefAdd='',
            shortUrl=[];
        shortUrl=href.split('&');
        hrefAdd=shortUrl[0];

        gl1 =glass.split('\n,');
        gl1=$.trim(gl1);
        gl1=gl1.split('          ');
        if(!gl1[1])
        {
            glass= gl1[0];
        }
        else
        {
            glass= gl1[0]+ gl1[1];
        }

        commoNameReal=$(this);
        shortUrl=href.split('?');
        pic=shortUrl[0];
        pic+="super";

        id=href.split('&');
        hrefAdd=pic;
        id=id.pop();
        pic=id.split('=');
        id=pic[1];
        hrefAdd+='?id='+id;
        if(hrefAdd==commonNamePlus)
        {
           // commonNamePlus='';
            e.stopPropagation();
            return;
        }
        commonNamePlus= hrefAdd;

        ss=getContent( hrefAdd, true,id, pr,cs,glass);

    });

});




/*
$(document).ready(function () {
    document.addEventListener("keypress", function onEvent(event) {
        if (event.key === "r" && event.ctrlKey) {
            window.location.replace('/mazi');
        }
    });


});*/




// javascript второе модальное окно продуктов

    let modal = document.querySelector('.modalMain'),
        modal2=document.querySelector('.modalMain2'),
        overflow2 = document.createElement('div'),
        heightMine = modal.offsetHeight;
            overflow = document.createElement('div');

    function openWin() {
        overflow.className = "overflow";
        document.body.appendChild(overflow);
        modal.style.marginTop = - heightMine /2 + "px";
        modal.style.top = "50%";
    }

function openWin2() {
    overflow2.className = "overflow2";
    document.body.appendChild(overflow2);
    let height = modal2.offsetHeight;
    modal2.style.marginTop = - height/2  + "px";
    modal2.style.top = "50%";
}

    if (!Element.prototype.remove) {
        Element.prototype.remove = function remove() {
            if (this.parentNode) {
                this.parentNode.removeChild(this);
            }
        };
    }

    overflow.onclick = function () {
        modal.style.top = "-100%";
        overflow.remove();
    };
overflow2.onclick = function () {
    modal2.style.top = "-100%";
    overflow2.remove();
};

jQuery('document').ready(function() {
$('.modalMain').on('click','.close', function(){
    modal.style.top = "-100%";
    overflow.remove();
});

    $('.modalMain2').on('click','.close', function(){
        modal2.style.top = "-100%";
        overflow2.remove();
    });
});

        // функция hover
/*let begin=new Date().getTime();
jQuery('#contentHolder').on('hover','.wrapProdT01 .productsinT01' ,function () {
   begin=new Date().getTime(); },

    function(){

    if((new Date().getTime() - begin) >=1000) {
        let s_name=jQuery(this).find('.dopContent').html();
        jQuery(this).find('#how-to').empty();
        jQuery(this).find(' .dopContent').append(s_name);
        jQuery(this).find('.productsinT01').css({"background":"#fff"," border":"3px solid red"," display":"block"});
    } //else jQuery(this).find(' .dopContent').empty();
    });

*/
jQuery('document').ready(function() {
$('.slider').on('click','.flexslider #flexiselDemo3 .mask a, .flexslider #flexiselDemo3 .pict', function (e) {
    e.preventDefault();
    let href = $(this).data('href'),
        cs=0,
        newElem='',
        id=$(this).data('id'),
        pr=$(this).data('sign');
    if(pr==26)
    {
        cs=26;

    }
    updatePr22=false;

    if(pr==22) updatePr22=true;
    // Getting Content
    if(pr==40){
        cntqnt++;
        cs=cntqnt;
        newElem=$("<div class='layer001'></div>")
            .append("<img src='http://localhost/mazi/public/pink/images/features/tick.png' style='width:50px; height:auto; z-index:1; ' />");
        //  $(this).css('display','none');
        $(this).hide();
        $(this).parents('.productsinT01').append(newElem);
    }
    let ss=getContent(href, true,id, pr,cs);
    jQuery('.like_name').removeClass('active');
    $(this).addClass('active');
});

});



jQuery('document').ready(function(e) {
    $('.wrap_01').on('click','#flexslider #slick-slider .productsLine  .liked-product .mask a,#flexslider #slick-slider .pict', function (e) {
        e.preventDefault();

        let href = $(this).data('href'),
            cs=0,
            newElem='',
            id=$(this).data('id'),
            pr=$(this).data('sign');
        if(pr==26)
        {
            cs=26;

        }
        updatePr22=false;

        if(pr==22) updatePr22=true;
        // Getting Content
        if(pr==40){
            cntqnt++;
            cs=cntqnt;
            newElem=$("<div class='layer001'></div>")
                .append("<img src='http://localhost/mazi/public/pink/images/features/tick.png' style='width:50px; height:auto; z-index:1; ' />");
            //  $(this).css('display','none');
            $(this).hide();
            $(this).parents('.productsinT01').append(newElem);
        }
        let ss=getContent(href, true,id, pr,cs);
        jQuery('.like_name').removeClass('active');
        $(this).addClass('active');
    });




  $('.slider, .profit1 ').on('click','#header', function(e){
      e.preventDefault();
      let href = $(this).data('href'),
          id=0,
          cs=0,
          pr=$(this).data('sign');
      let ss=getContent(href, true,id, pr,cs);
      jQuery('.like_name').removeClass('active');
      $(this).addClass('active');
  });



//_____________________________________________________________
// поиск по сайту
    $('.menu-search-art a').on('click', function (e) {
        e.preventDefault();
        let href = $(this).data('href'),
            id=0,

            pr=$(this).data('sign');
        let form=$('#searchMain'),
            data=$(form).serializeArray(),
            cs=data;
        let ss=getContent(href, true,id, pr,cs);
        jQuery('.like_name').removeClass('active');
        $(this).addClass('active');
    });



//_______________________________________________________________
    $('.search').on('keydown', function (e) {
        if (e.keyCode == 13)
        {
        e.preventDefault();
        let href = $(this).data('href'),
            id=0,

            pr=$(this).data('sign');
        let form=$('#searchMain'),
            data=$(form).serializeArray(),
            cs=data;
        let ss=getContent(href, true,id, pr,cs);
        jQuery('.like_name').removeClass('active');
        $(this).addClass('active');
        }
    });


//__________________________________________________________________
//   обращение к сравнению продуктов
    $('#contentHolder ').on('click','#difbutton', function(e){
        e.preventDefault();
        let href = $(this).data('href'),
            id=$(this).data('id'),
            cs=57,
            pr=$(this).data('sign');

        let ss=getContent(href, true,id, pr,cs);
        jQuery('.like_name').removeClass('active');
        $(this).addClass('active');
    });

});

