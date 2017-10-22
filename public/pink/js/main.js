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
$(' .modal-body').on('click', '.del-item', function(){
	//alert(123);
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






function clearCart(){
	$.ajax({
		url: 'Clear',
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
	e.preventDefault();
	var id = $(this).data('id');
	var	 qty=$('#qty').val();

		// qty=1;
	$.ajax({
		//url: 'http://pullsky.kretivz.pro/web/cart/add',
      url: "addcartios",
	//	url: "<php echo URL::action('CartController@index')?>",
		cache: false,
		//contentType: false,
      //  url: '/CartController/cartAdd',
	//	url: '@web/cart/add',
		data: {id: id, qty: qty},
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

    $("#flexiselDemo3").flexisel({
        visibleItems: 4,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000,
        pauseOnHover: true,
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

$(function() {
// блок реакции на выбор кнопок и селекта
    var counter = 0;


    $("#slider-range").slider({
        range: true,
        min: 300,
        max: 80000,
        step: 100,
        values: [0, 80000],

        slide: function (event, ui) {
            $("#pricer").val("гр." + ui.values[0] + " - гр." + ui.values[1]);
        }
    });
    $("#pricer").val("гр." + $("#slider-range").slider("values", 0) + " - гр." + $("#slider-range").slider("values", 1));

   $(".selectValItem").on('slide',function(e){
      //  e.preventDefault();
    //   slider.slider('values', $(this).val());
        counter++;

        //  alert(counter);
    });

    $(".selectValItem").on('change',function(e){
        e.preventDefault();
        counter++;

        //  alert(counter);
    });

        $("#selectMyFixing").on('submit',function(e){
            $(this)
    e.preventDefault();
    var form= $(this);


            if(counter) {
	var data=$(form).serializeArray();
	//alert(data);
    $.ajax({

		 url: form.attr('action'),

        cache: false,
        data: data,
       /* beforeSend: function(data) { // сoбытиe дo oтпрaвки
            form.find('input[type="submit"]').attr('disabled', 'disabled'); // нaпримeр, oтключим кнoпку, чтoбы нe жaли пo 100 рaз
        }, */
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type:form.attr('method') ,
        dataType: "JSON",
        success: function(res){
            if(!res) alert('Ошибка!');

			//$('.wrap_result').append('<br/><strong>Выборка выполнена !</strong>').delay(2000).fadeOut(500);
            $('#mediumMine').empty();
          // $('#mediumMine').replaceWith(res.content);
            $('#mediumMine').append(res.content);

        },
        error: function(){
            alert('Ошибка передачи slider и кнопок!');
        }

    });
                      }

});

});