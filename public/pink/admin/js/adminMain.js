$(function () {
    $('#side-menu .catalogist ').on('click',function (e) {
     e.preventDefault();
    console.log("я в каталоге");
    alert("я в каталоге");
        $('#titleProductsMy').empty();
     let j=1, catalogMy='',newElem1='',
         newElem=$("<div class='catalog001'></div>");
     $('#titleProductsMy').append(newElem);

     $('.catalog ul li').each(function (i,el) {

            if(i%12)
            {
                $(newElem).append(el);


            } else {
                if(i!=0)
                {


                    j++;
                    catalogMy = "catalog00" + j;
                    newElem1 = $("<div ></div>");
                    newElem1.addClass(catalogMy);

                    $('#titleProductsMy').append(newElem1);
                    newElem = newElem1;
                }
            }



        });

        $('.catalog').remove();

      //  $('#titleProductsMy').css({'flex-direction':'row', 'margin-left':'50px'});

        $('.commomAdmin').empty();
        $('#page-wrapper').empty();
        //$(".innerAdmin").empty();
        $('#belle').css("display","none");
        $('.handbook').empty();
    });
});