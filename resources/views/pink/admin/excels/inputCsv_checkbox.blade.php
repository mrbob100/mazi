<h3>  {!! $data['title'] !!}</h3>
<div class="container">

    <form  id="companies"  action="{{route('exportIt')}}"   method="post">
    {{ csrf_field() }}
      <table>
        <div class="col-xs2">

                <tr><th>Наименование</th></tr>
                <tr><td>Код  </td></tr>
                <tr><td>Категория  </td></tr>
                <tr><td>Наименование  </td></tr>
                <tr><td>Краткое описание  </td></tr>
                <tr><td>Полное описание  </td></tr>
                <tr><td>Цена  </td></tr>
                <tr><td>Изображение  </td></tr>
                <tr><td>Тип продукции  </td></tr>
                <tr><td>Страна  </td></tr>
                <tr><td>Группа  </td></tr>
                <tr><td>Новый  </td></tr>
                <tr><td>Хит продаж  </td></tr>
                <tr><td>Распродажа  </td></tr>
                <tr><td>Брутто вес  </td></tr>
                <tr><td>Чистый вес  </td></tr>
                <tr><td>Ширина  </td></tr>
                <tr><td>Длина  </td></tr>
                <tr><td>Высота  </td></tr>
                <tr><td>Срок гарантии  </td></tr>
                <tr><td> Класс инструмента </td></tr>
                <tr><td>Упаковка  </td></tr>
                <tr><td> Характеристики </td></tr>
                <tr><td> На складе </td></tr>
                <tr><td>Код УКВД  </td></tr>


        @for($i=0; $i<count($data['companies']); $i++)

                <tr><th><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="Наименование"/></th></tr>
                 <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="code"/></td></tr>
                <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="category_id"/></td></tr>
                <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="name"/></td></tr>
                <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="description"/></td></tr>
                <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="text"/></td></tr>
                <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="price"/></td></tr>
                <tr><td> <input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="img"/></td></tr>
                <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="type"/></td></tr>
                <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="country"/></td></tr>
                <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="groupTools"/></td></tr>
                <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="new"/></td></tr>
                <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="hit"/></td></tr>
                <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="sale"/></td></tr>
                <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="weightbrutto"/></td></tr>
                <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="weightnetto"/></td></tr>
                <tr><td> <input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="width"/></td></tr>
                <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="length"/></td></tr>
                <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="height"/></td></tr>
                <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="termGuarantee"/></td></tr>
                <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="class"/></td></tr>
                <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="packing"/></td></tr>
                <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="exactlyType1"/></td></tr>
                <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="sclad"/></td></tr>
                <tr><td><input type="checkbox" id="{{$data['companies'][$i]}}" value="{{$data['companies'][$i]}}" name="ukvd"/></td></tr>




       @endfor
        </div>
     </table>

    </form>

</div>