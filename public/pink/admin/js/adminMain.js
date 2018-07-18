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

    function workupPr01(pr=0, data=0) {
        if (pr == 26) { // признак вывода модального окна продукта
            //  $('.container-right-edgest').empty();
            $('.modalMain').empty();
            $('.modalMain').append(data.content);
            openWin01();
            return;
        }
    }

    function getContent01(url, addEntry, id=0, pr=0,cs=0) {
        $.get(url, {id: id, pr: pr, cs: cs}, {cache: false})
            .done(function (data) {
                // Updating Content on Page
                workupPr01(pr, data);
                //  $('#contentHolder').html(data);
                // alert('Загрузка завершена.');
                let pas = url.split('/');
                url = pas.pop();

            });
    }

    // работа с админкой в быстром звонке
    $('#wrapper #titleProductsMy #belle').on('click','.backConnect .table tbody tr #quickInfo', function(e){
        e.preventDefault();
        let href = $(this).data('href'),
            pr=26,
            cs=0,
        id= $(this).data('id');
        let  pas= id.split('?');
        id= pas.pop();
        let ss=getContent01(href, true,id, pr,cs);
    });

    let modal = document.querySelector('.modalMain'),
        overflow = document.createElement('div');
    function openWin01() {
        overflow.className = "overflow";
        document.body.appendChild(overflow);
        let height = modal.offsetHeight;
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

    $('.modalMain').on('click','.close', function(){
        modal.style.top = "-100%";
        overflow.remove();
    });




    });