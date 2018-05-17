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
$(' .modal-body').on('click', '.del-item', function(e){
	//alert(123);
    e.preventDefault();
	var id = $(this).data('id');

  //  var cat = $(this).data('cat');
	$.ajax({
		url: 'delIt',
		data: {id: id/*, cat: cat */},
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

        //  var cat = $(this).data('cat');
        $.ajax({
            url: 'delIt',
            data: {id: id/*, cat: cat */},
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


/*function redirectCart(){
    $.ajax({
        url: 'redirect',
        type: 'GET',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

        error: function(){
            alert('Нет перехода на главную страницу!!!');
        }
    });
} */

$( document ).ready(function(){
$('.add-to-cart').on('click', function (e) {
	//e.preventDefault();
	var id = $(this).data('id');
//	var	 qty=$('#qty').val();

		// qty=1;
	$.ajax({
		//url: 'http://pullsky.kretivz.pro/web/cart/add',
      url: "addcartios",
	//	url: "<php echo URL::action('CartController@index')?>",
		cache: false,
		//contentType: false,
      //  url: '/CartController/cartAdd',
	//	url: '@web/cart/add',
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
        let $input = $(this).parent().find('input');
        let count = parseInt($input.val()) - 1;
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

    let qty=$(this).val();
    let id=$(this).data('id');

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
              //   $('#mediumMine').replaceWith(res.content);
                $('.table-responsive').append(res.content);
            //    $(this).val(res.am1);
            //    $('.modal-body .table-responsive #speedIns').val(rez.content);
            //    $('.modal-body .table-responsive #speedTotal').val(rez.total);
            },
            error: function(){
                alert('Ошибка передачи данных модального окна!');
            }
        });

});




    $("#flexiselDemo3").flexisel({
        visibleItems: 4,
        animationSpeed: 500,
        autoPlay: true,
        autoPlaySpeed: 3000,
        pauseOnHover: true,
        itemsToScroll: 3,

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
                visibleItems: 3
            }
        }
    });

    $('.slick-slider').slick({
        infinite: true,
        speed: 350,
// определяем скорость перелистывания
        slidesToShow: 4,
//количество слайдов для показа
        slidesToScroll: 2,
//сколько слайдов за раз перелистнется
        responsive: [
            {
                breakpoint: 600,
//сообщает, при какой ширине экрана нужно включать настройки
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 2,
                    infinite: true,
                }
            }
        ]

    });




});



	var RGBChange = function() {
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

        $("#insertOption").on('submit','#selectMyFixing ', function (e) {
            // $(this)

            e.preventDefault();
            let form = $(this);


            //  if(counter)
            // {
            let data = $(form).serializeArray();
            // alert(data);
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
                    let h1= $('#contentHolder').height();
                    $('.wrapSubProd').css('height',h1-120);
                },
                error: function () {
                    alert('Ошибка передачи slider и кнопок!');
                }

            });
            // }

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
        return false;

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
    if(pr!=25 && pr!=23)$('#insertOption').empty();

    if(pr!="22") $('.profit .container-wrap-row .item .text').css({"border":"none","margin-top":"0"});
    $('.container-wrap-banner').empty();
    $('.slider').empty();
    $('.profit1').empty();
    $('#mediumMine').empty();
    $('.container-right-edgest').empty();
    if(pr!=22 && pr!=25 && pr!=23 &&pr!=26) $('#contentHolder').empty();
    $('#contentText').empty();
    if(pr==0){

        $('.container-wrap-row .catalog').remove();
        $('#wrap-last').css('display','none');
        /*  $('.container-wrap-row ').css('border','none');
         $('.container-wrap-row ').css({"display":"none"}); */

        // $('.container-wrap-row .catalog').css({"border":"none","margin-top":"0"});
    }
    if(pr==0||pr==21)  {
        $('.edgest1').empty();
        $('.edgest2').empty();
        $('#uri_last').empty();

        //  $('#wrap-last ').empty();
        //  $('#wrap-last ').append('<div id="container-right-edge"></div>');
        // $('#wrap-last ').append('<div class="container-right-edgest"></div>');
        $('.container-right-edge ').empty();
        $('.container-right-edgest').empty();
        $('.container-right-edgest').css('opacity','0');
        $('.container-wrap-row .catalog').css({"display":"flex","border":"1px solid lightblue"});
    }

    if(pr=="22")
    {

        //     $('.container-wrap-row .catalog').css('border','inherit');

        //     $('.container-wrap-row ').css({"display":"block"});

        //      $('.container-wrap-row .catalog').append(data.leftBar);
        $('#insertOption').append(data.leftBar);
        $('#insertOption').css('opacity','0');
        $('#insertOption').fadeTo(2000,1);
        $('#insertOption').css({"border":"1px solid lightblue"});
        /*
         $('#wrap-last ').empty();
         $('#wrap-last ').append('<div id="container-right-edge"></div>');
         $('#wrap-last ').append('<div class="container-right-edgest"></div>');
         */
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

        //  $sa=$('#insertOption input#pricer1').val();
        //  $('#insertOption#selectMyFixing input#pricer dataMin').val($sa);
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
        $('#insertOption').append(data.leftBar);

        myRangeIn();
    }
    if(pr!=22 && pr!=24 && pr!=23 && pr!=26)
    {
        $('#contentHolder').append(data.content);
        $('#contentText').append(data.sigma);

    }
    if(pr==25)
    {
        $('#container-right-edgest').empty();
        $('.container-right-edgest').append(data.commonSum);

    }

    if(pr==26){
        $('.container-right-edgest').empty();
        $('.modalMain').empty();
        $('.modalMain').append(data.content);
        openWin();

    }
    if(pr==27){
        $('#contentHolder').empty();
        $('#wrap-last ').css('display','none');
        $('#insertOption').css('opacity','0');
        $('nav .wrap1').empty();
        $('.container-wrap-row .catalog').css('border','inherit');
        $('.container-wrap-row .catalog').css({"display":"none"});
        // $('#container-right-edge ').empty();
        //  $('.container-right-edgest').empty();
        //  $('#wrap-last ').append('<div id="container-right-edge"></div>');
        //   $('#wrap-last ').append('<div class="container-right-edgest"></div>');
        $('#contentHolder').css('margin-left','20px');
        $('#contentHolder').append(data.content);

        $('.close').click();
    }

}
//______________________________________________________________________________________________________________________
// Функции history API

let NavigationCache = [];
let priznNav=0;
let dad='';
let riscMy=0;
let url='';
let cnt=0;
$('document').ready(function(){
    jQuery('.historyAPI').on('click', function(e){
        e.preventDefault();
        let href = $(this).data('href');
        // Getting Content

      let $ss=getContent(href, true);
        jQuery('.historyAPI').removeClass('active');
        $(this).addClass('active');


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
        /*  if (event.state) {
         window.location.reload();
         } */

     console.log(window.history.length);
     let ljn=window.history.length;
        let ere='';
        console.log(window.history);
        let sss = 0;
       // let State = History.getState();
        let stat1=window.location.toString();
        let kark = '';
        let priz = '';
    //    let pas = State.cleanUrl;
        let tt = [];

        let gibrid;
        tt =stat1.split('//');
        url = tt[1].split('/');
        url = url.pop();
        cnt=url.length;
        let str=url.slice(cnt-1);

        // убираем кэшированную запись из history
        if(str=='#' )
        {
             let State1=History.back();
            let stat1=window.location.toString();

            tt =stat1.split('//');
            url = tt[1].split('/');
            url = url.pop();
        }

        if (priznNav != 999)
        {

            cnt = NavigationCache.length; // длина крошек
            if (cnt > 0) {
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

          //  dad = gibrid.data;
            dad='';
            let pr = gibrid.pr;
            let id=gibrid.id;
         //   let init = {data: dad, pr: pr};

            priznNav = 0;
            cnt = NavigationCache.length; // длина
            $('#crumbs').empty();
            for (let i = 0; i < cnt; i++)
            {
                kark = NavigationCache[i].url; // имя таба в навигации крошек
              //  if(kark!=="addcartios" && kark!=="product")
                if( kark!=="product")
                {
                $('#crumbs').append('<li><a>');
                $('#crumbs li:last-child a').attr("href", "#").attr("id", kark).html(kark);
                }
            }
        //  if(url!= "addcartios"&& url!="indexpage")
            if(url!="indexpage")
          {
           getContent(url,false,id,pr);
        //     History.replaceState(null, null, url);
          }

        }

    });




    /*window.addEventListener('hashchange', function(e) {
        // Get State value using e.state

        getContent(location.pathname, false);
    }); */


function getContent(url, addEntry, id=0, pr=0) {
    $.get(url,{id: id},{cache: false})
        .done(function( data ) {
            // Updating Content on Page
           workupPr(pr, data);
            //  $('#contentHolder').html(data);
      // alert('Загрузка завершена.');
            $pas=url.split('/');
            url= $pas.pop();

            if(addEntry )
            {
               let kark=0;
                // dad=$('#central').html();
                 dad='';
                // console.log('data',data);
                let inside={data: dad, pr: pr, id: id, url:url};
                // Add History Entry using pushState
                cnt=NavigationCache.length; // длина
                let ofindi=false;
                if(cnt>0)
                {
                   for(let i=0; i<cnt; i++)
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
                       cnt=NavigationCache.length; // длина
                       for (let i = cnt-1; i >=0; i--)
                       {
                           kark = NavigationCache[i].url; // имя таба в навигации крошек

                           if (url != kark) {
                               let rer = NavigationCache.pop();
                           }

                           else break;
                       }

                       $('#crumbs').empty();
                        cnt=NavigationCache.length; // длина
                       for(let i=0; i<cnt; i++)
                       {
                           kark= NavigationCache[i].url; // имя таба в навигации крошек
                        //   if(kark!=="addcartios" && kark!=="product")
                           if(kark!=="product")
                           {
                               $('#crumbs').append('<li><a>');
                               $('#crumbs li:last-child a').attr("href", "#").attr("id", kark).html(kark);
                           }
                       }
                  //     $('#crumbs li:last-child a').replaceWith("<p></p>").attr("id", kark).html(kark);

                    //   History.replaceState({url:url}, null, url);
                   }
                   else
                       {
                           NavigationCache.push(inside) ;
                           priznNav=999;
                           $('#crumbs').empty();
                           let cnt=NavigationCache.length; // длина
                           for(let i=0; i<cnt; i++)
                           {
                                kark= NavigationCache[i].url; // имя таба в навигации крошек
                               //if(kark!=="addcartios" && kark!=="product")
                                   if(kark!=="product")
                               {
                                   $('#crumbs').append('<li><a>');
                                   $('#crumbs li:last-child a').attr("href","#").attr("id",kark).html(kark);
                               }
                           }
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
                     cnt=NavigationCache.length; // длина
                    for(let i=0; i<cnt; i++)
                    {
                        kark= NavigationCache[i].url; // имя таба в навигации крошек
                      //  if(kark!=="addcartios" && kark!=="product")
                            if(kark!=="product")
                        {
                        $('#crumbs').append('<li><a>');
                        $('#crumbs li:last-child a').attr("href","#").attr("id",kark).html(kark);
                        }
                    }
             //       $('#crumbs li:last-child a').replaceWith("<p></p>").attr("id", kark).html(kark);
                    History.pushState({url:url}, null, url);

                }


            }
            if(!addEntry)
                {

                    $('#crumbs').empty();

                    let cnt=NavigationCache.length; // длина
                    for(let i=0; i<cnt; i++)
                    {
                        kark= NavigationCache[i].url; // имя таба в навигации крошек
                        $('#crumbs').append('<li><a>');
                        $('#crumbs li:last-child a').attr("href","#").attr("id",kark).html(kark);
                    }
                 //  $('#crumbs li:last-child a').replaceWith("<p></p>").attr("id", kark).html(kark);
               //   History.replaceState({url:url}, null, url);
            }

            priznNav=0;

        });
}





jQuery('document').ready(function(){
    jQuery('#contentHolder').on('click','.like_name, #reactimage, #reactbutton', function(e){
        e.preventDefault();
        let href = $(this).data('href');

        let id=$(this).data('id');
        let pr=$(this).data('sign');
        // Getting Content
        let $ss=getContent(href, true,id, pr);
        jQuery('.like_name').removeClass('active');
        $(this).addClass('active');
    });


});


jQuery('document').ready(function(){
    jQuery('#crumbs').on('click','li a', function(e){
        e.preventDefault();
        let url = $(this).html(),
            base_url=window.location.toString();



        let pas= base_url.split('//');
      let str='';
          let second=pas[1].split('/');
          second.pop();
          let cnt=second.length;
          for(let i=0; i<cnt;i++)
          {
              str+= second[i]+'/';
          }
       base_url=pas[0]+'//'+str+url;
        if(url==='indexpage')
        {
           // window.load(base_url);
            window.location.replace('/mazi');
        }
        else
     {
        let kark='';
        cnt = NavigationCache.length; // длина крошек
        if (cnt > 0)
        {
            for (let i = cnt - 1; i >= 0; i--)
            {
                kark = NavigationCache[i].url; // имя таба в навигации крошек

                if (url != kark) {
                    let rer = NavigationCache.pop();
                } else {
                    kark = NavigationCache[i];
                    break;
                }
            }
        }
        if(kark)
        {
            let pr=kark.pr;
            let id=kark.id;
            let $ss=getContent(base_url, true,id, pr);
        }
      }
    });

});


jQuery(document).ready(function(){
    jQuery('.catalog ul#azar.azoneChild').on('click', 'li a.active', function(e){
   // jQuery('.catalog ul#azar.azoneChild').on('click','li.azoneFirst', function(e){
        e.preventDefault();
       let idi= $(this).attr('href');
      // let id1=$(this).data('id');
       let hr=idi.split('?');
       let href=hr[0];
       let pr=24;  // признак работы с видом вывода на экран
        let id=$(this).attr('href').split('data-id=').pop();

     //   alert('Я попал в категорию !');

   // console.log(id);
        let $ss=getContent(href, true,id, pr);

        jQuery('.like_name').removeClass('active');
        $(this).addClass('active');
  });
});

jQuery('document').ready(function(){
    jQuery('.container-right-edge, .modal-content').on('click',' #reactiveimg,  #reactivebut, #moreInfo, a', function(e){
        e.preventDefault();
        let href = $(this).data('href');

        let id=$(this).data('id');
        let pr=$(this).data('sign');
        // Getting Content
        let $ss=getContent(href, true,id, pr);

        jQuery('.like_name').removeClass('active');
        $(this).addClass('active');

    });


});

// javascript второе модальное окно продуктов

    var modal = document.querySelector('.modalMain');
    var overflow = document.createElement('div');
    function openWin() {
        overflow.className = "overflow";
        document.body.appendChild(overflow);
        var height = modal.offsetHeight;
        modal.style.marginTop = - height / 2 + "px";
        modal.style.top = "50%";
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