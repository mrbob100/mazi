/*price range*/

$('#sl2').slider();
$('.catalog').dcAccordion({
    speed: 300
});





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


  /* $('.modal-body').on('blur','#movieMaker', function(e){
        e.preventDefault();

        var id=$(this).data('id');
        var qt=$(this).val();

        $.ajax({
            url: "changeQty",
            cache: false,
            data: { id: id,  qt: qt},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'GET' ,
            dataType: "JSON",
            success: function(res){
                if(!res) alert('Ошибка!');

                //$('.wrap_result').append('<br/><strong>Выборка выполнена !</strong>').delay(2000).fadeOut(500);

                $('.table-responsive').empty();
                // $('#mediumMine').replaceWith(res.content);
                $('.table-responsive').append(res.content);

            },
            error: function(){
                alert('Ошибка передачи данных модального окна!');
            }
		});
    });
*/

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

 /*   $('.slick-slider').slick({
        infinite: true,
        speed: 350,
// определяем скорость перелистывания
        slidesToShow: 4,
//количество слайдов для показа
        slidesToScroll: 3,
//сколько слайдов за раз перелистнется
        responsive: [
            {
                breakpoint: 600,
//сообщает, при какой ширине экрана нужно включать настройки
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 3,
                    infinite: true,
                }
            }
        ]

    }); */




});



	let RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};

/*scroll to top*/



$(document).ready(function(){
	$(function () {
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

    $('#contentHolder').on('click','.sortieOption .sortie4 #caucaus', function(e) {
        e.preventDefault();
         let href = $(this).data('href'),
             idi= $(this).attr('href'),
             hr=idi.split('?'),
             cs=$(this).data('sign'),
             id=0,
            pr=24; // признак работы с видом вывода на экран
             href=hr[0];
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
        return false;id=$(this).data('id')

    });
    function func1(id){

      //  $("tr.asdast").fadeOut(1000);
        $(".asdast").fadeOut(1000);
    }


    function func2(id){

        $(".asdast").fadeIn(1000);

    }

});


jQuery(document).ready(function() {
    $('#product-category_id').on('input')
});

//("main").css("opacity",0);
jQuery(document).ready(function() {
 //   ("main").css("opacity",1);
    let main="indexpage";
    $('#crumbs').empty();
            $('#crumbs').append('<li><a>');
            $('#crumbs li:last-child a').attr("href", "#").attr("id", main).html(main);
    let inside={data: 'indexpage', pr: '99', url:'indexpage'};
    NavigationCache.push(inside);

});

function workupPr(pr=0, data=0)
{
    if(pr==26){ // признак вывода модального окна продукта
        //  $('.container-right-edgest').empty();
        $('.modalMain').empty();
        $('.modalMain').append(data.content);
        openWin();
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
    if(pr==53)
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
    if(pr==40)
    {
        let yyy=0;
        $('#contentHolder .sortie .sortieOption .sortie1_4').empty();
        $('#contentHolder .sortie .sortieOption .sortie1_4').css("display","block");
        let  newElem=$("<div class='layer002'></div>").append(data.content);
        $('#contentHolder .sortie .sortieOption .sortie1_4').append(newElem);
        $('.layer002').css('opacity','0');
        $('.layer002').fadeTo(2000,1);
        return;
    }
    else $('#picture').hide();
    if(pr==41)
    {
        $('#contentHolder').empty();
        $('#contentHolder').append(data.content);
        return;
    }
        if(pr!=25 && pr!=23)$('#insertOption').empty();
    if(pr==39) // модальное окно корзины
    {
        $('.modal-body').empty();
        $('.modal-body').append(data.content);
        showCart(data.content);
        return;
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



    if(pr!="22" && pr!="36") $('.profit .container-wrap-row .item .text').css({"border":"none","margin-top":"0"});
    $('.container-wrap-banner').empty();
    $('.slider').empty();
    $('.profit1').empty();
    $('#mediumMine').empty();
    $('.container-right-edgest').empty();
    if(pr!=22 && pr!=25 && pr!=23 &&pr!=26) $('#contentHolder').empty();
    $('#contentText').empty();
    if(pr==0){

    //    $('.container-wrap-row .catalog').remove();
        $('#wrap-last').css('display','none');

    }
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

    if(pr=="22")
    {
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
        $('.edgest1').empty();
        $('.edgest2').empty();
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

    }
    if(pr==23){
        $('#wrap-last .container-end ').empty();

        $('#wrap-last .container-end ').append(data.commonSum);

        //$('#wrap-last .container-end ').css({"display":"block","background-color":"#E9E9E9","margin-left":"10px","height":"100px","width":"200px"});
        $('.edgest1').css({"background-color":"#E9E9E9","margin":"0 0 0 10px","height":"50px","width":"200px"});
        $('.edgest2').css({"background-color":"#E9E9E9","margin":"0 0 0 10px","padding-left":"90px","height":"50px","width":"200px"});
    }
    if(pr==24)  {
        $('#container-right-edge, .container-right-edgest').css('opacity','0');
        $('#contentHolder').append(data.content);
        $('#contentHolder').css('opacity','0');
        $('#contentHolder').fadeTo(2000,1);
        $('#insertOption').append(data.leftBar);

        myRangeIn();
    }
    if(pr!=22 && pr!=24 && pr!=23 && pr!=26)
    {
        $('#contentHolder').append(data.content);
        $('#contentHolder').css('opacity','0');
        $('#contentHolder').fadeTo(2000,1);
        $('#contentText').append(data.sigma);

    }
    if(pr==25)
    {
        $('#container-right-edgest').empty();
        $('.container-right-edgest').append(data.commonSum);

    }


    if(pr==27){
        $('#contentHolder').empty();
        $('#wrap-last ').css('display','none');
        $('#insertOption').css('opacity','0');
        $('nav .wrap1').empty();
        $('.container-wrap-row .catalog').css('border','inherit');
        $('.container-wrap-row .catalog').css({"display":"none"});

        $('#contentHolder').css('margin-left','20px');
        $('#contentHolder').append(data.content);

        $('.close').click();
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
    updatePr22=false;



$('document').ready(function(){
    jQuery('.historyAPI, .sem').on('click','a', function(e){
        e.preventDefault();
        let href = $(this).data('href'),
          pr=$(this).data('sign');
        if(pr<31 || pr>33 ){ //это временное отключение меню акция, доставка...
        // Getting Content

      let ss=getContent(href, true,0, pr);
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


function getContent(url, addEntry, id=0, pr=0,cs=0) {
    $.get(url,{id: id, pr: pr, cs: cs},{cache: false})
        .done(function( data ) {
            // Updating Content on Page
           workupPr(pr, data);
            //  $('#contentHolder').html(data);
      // alert('Загрузка завершена.');
          let  pas=url.split('/');
            url= pas.pop();

            if(addEntry )
            {
               let kark=0;
                dad=data.content;
                if(pr==0)
                {
                    suprizeMe=dad;
                }
                // console.log('data',data);
                let inside={data: dad, pr: pr, id: id, url:url};
                // Add History Entry using pushState
                cnt=NavigationCache.length; // длина
                let ofindi=false;
                let i=0;
                if(cnt>0)
                {
                   for( i=0; i<cnt; i++)
                   {
                      kark= NavigationCache[i].url;
                      if(url==kark)
                      {
                          ofindi=true; break;
                      }
                   }
                   if(ofindi)
                   {
                       priznNav=999;
                        let j=0;
                       kark=navigationHistory(kark);
                       dad=kark.data;
                       if((!updatePr22) && (pr!=39)&& (pr!=24)&& (pr!=26) &&(pr!=36) && (pr!=40) &&(pr!=41) &&(pr!=30)&&(pr!=50) &&(pr!=51) &&(pr!=53))
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
                           History.pushState({url:url}, null, url);
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
                    History.pushState({url:url}, null, url);

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
        kark= NavigationCache[i].url; // имя таба в навигации крошек
        if(kark!=="product")
        {
        $('#crumbs').append('<li><a>');
        $('#crumbs li:last-child a').attr("href","#").attr("id",kark).html(kark);
        }
    }
}

function navigationHistory(url)
{
     cnt = NavigationCache.length; // длина крошек

     let   kark='', gibrid='';
    if (cnt > 0)
    {
        for (let i = cnt-1; i >=0; i--) {
            kark = NavigationCache[i].url; // имя таба в навигации крошек

            if(url!=kark )
            {
                let rer = NavigationCache.pop();
            } else
            {
                gibrid= NavigationCache[i];
                break;
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
    jQuery('#contentHolder').on('click','.like_name, #reactimage, #reactbutton,.wrapProdT01 .productsinT01 a, .wrapProdT02 .productsinT02 a, .wrapperProducts .inwrapInvent #reactivebut', function(e){
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
                .append("<img src='http://localhost/mazi/public/pink/images/features/tick.png' style='width:50px; height:auto; z-index:1;position:absolute; top: 218px; left: 140px; ' />");
         //  $(this).css('display','none');
         //   $(this).hide();
           $(this).parents('.productsinT01').append(newElem);
        }
       // commoNameReal.closest('ul').slideUp(1000);
      let rer=  $('.catalog li .active').siblings().hide(1000);

        let ss=getContent(href, true,id, pr,cs);
        jQuery('.like_name').removeClass('active');
        $(this).addClass('active');


    });


});


jQuery('document').ready(function(){
    jQuery('#crumbs').on('click','li a', function(e){
        e.preventDefault();
        let url = $(this).html(),
            base_url=window.location.toString(),
           kark='',
           pas= base_url.split('//'),
           str='',
           second=pas[1].split('/');
          second.pop();
           cnt=second.length;
          for(let i=0; i<cnt;i++)
          {
              str+= second[i]+'/';
          }
       base_url=pas[0]+'//'+str+url;
        let j=0;
          kark= navigationHistory(url);
        if(url==='indexpage')
        {
            window.location.replace('/mazi');
        }
        else
     {

        if(kark)
        {

         /*   let bell='';
            cnt = window.history.length; // длина крошек
            if (cnt > 0)
            {
                for (let i = cnt - 1; i >= 0; i--)
                {
                    bell = History.getState(); // имя таба в навигации крошек

                    if (kark.url != bell.data.url) {
                        let rer = History.back();
                    } else {
                        bell = History.getState();
                        break;
                    }
                }
            }
    */
            let pr=kark.pr,
               id=kark.id,
             ss=getContent( base_url, false,id, pr);
        }
      }
    });

});


jQuery(document).ready(function(){
    jQuery('.catalog ').on('click', '.dcjq-parent-li #azar li a ', function(e){
   // jQuery('.catalog ul#azar.azoneChild').on('click','li.azoneFirst', function(e){
        e.preventDefault();
      //  e.stopPropagation();
        $(this).closest('ul').slideUp(1000);

        // arc=true;
        let idi= $(this).attr('href'),
            hr=idi.split('?'),
            href=hr[0],
            pr=24,  // признак работы с видом вывода на экран
            id=$(this).attr('href').split('data-id=').pop(),
             ss=getContent(href, true,id, pr);

        jQuery('.like_name').removeClass('active');
        $(this).addClass('active');

  });
});

jQuery('document').ready(function(){
    jQuery('.container-right-edge, .modal-content, .modalMain').on('click',' #reactiveimg,  #reactivebut, #reactivequick, #moreInfo, a', function(e){
        e.preventDefault();

        let href = $(this).data('href'),
            id=$(this).data('id'),
            pr=$(this).data('sign'),
        // Getting Content
          ss=getContent(href, true,id, pr);

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
                    kark= NavigationCache[i].url; // имя таба в навигации крошек
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
    pr=36,
    shortUrl=[];
if(href==commonNamePlus)
{
    commonNamePlus='';
    e.stopPropagation();
    return;
}
commonNamePlus=href;
        commoNameReal=$(this);
shortUrl=href.split('?');
pic=shortUrl[0];
pic+="super";

  id=href.split('&');
  href=pic;
   id=id.pop();
pic=id.split('=');
id=pic[1];
        ss=getContent(href, true,id, pr);

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
            overflow = document.createElement('div');
    function openWin() {
        overflow.className = "overflow";
        document.body.appendChild(overflow);
        let height = modal.offsetHeight;
        modal.style.marginTop = - height / 2 + "px";
        modal.style.top = "50%";
    }

function openWin2() {
    overflow2.className = "overflow2";
    document.body.appendChild(overflow2);
    let height = modal2.offsetHeight;
    modal2.style.marginTop = - height / 2 + "px";
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



});

