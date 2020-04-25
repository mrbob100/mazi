<div class="titleOne"><h3>  {!! $data['title'] !!}</h3></div>


    <form  id="companies"  action="{{route('exportHotline')}}"   method="post">
    {{ csrf_field() }}
<div class="combat">

      <div id="catalog">
          {{Widget::run('MainWidget',['class'=>'CheckBox','tpl'=>'checkbox.php'])}}

      </div>

        <div class="category_two">
           <div id="sortable">
               <div class="ui-state-default">Наименование  <input type="checkbox" style="margin-left: 70px;" id="code1" value="name" name="Наименование"/></div>
                <div class="ui-state-default">Код<input type="checkbox" style="margin-left: 149px;" id="code1" value="code" name="Код"/></div>
               <div class="ui-state-default">Краткое описание  <input type="checkbox" style="margin-left: 47px;" id="code1" value="description" name="Краткое описание"/></div>
                <div class="ui-state-default">Полное описание  <input type="checkbox" style="margin-left: 52px;" id="code1" value="text " name="Полное описание "/></div>
                <div class="ui-state-default">Цена  <input type="checkbox" id="code1" style="margin-left: 136px;" value="price" name="Цена"/></div>
                <div class="ui-state-default">Изображение  <input type="checkbox" style="margin-left: 77px;" id="code1" value="img" name="Изображение"/></div>
               <div class="ui-state-default">Тип продукции  <input type="checkbox"  style="margin-left: 69px;" id="code1" value="type" name="Тип продукции"/></div>
                <div class="ui-state-default">Страна  <input type="checkbox"  style="margin-left: 122px;" id="code1" value="country" name="Страна"/></div>
                <div class="ui-state-default" >Группа  <input type="checkbox"  style="margin-left: 125px;" id="code1" value="groupTools " name="Группа "/></div>
                <div class="ui-state-default">Новый  <input type="checkbox" style="margin-left: 126px;" id="code1" value="new" name="Наименование"/></div>
               <div class="ui-state-default">Хит продаж <input type="checkbox" style="margin-left: 91px;" id="code1" value="hit" name="Хит"/></div>
                <div class="ui-state-default">Распродажа <input type="checkbox" style="margin-left: 87px;" id="code1" value="sale" name="Распродажа"/></div>
               <div class="ui-state-default">Брутто вес  <input type="checkbox" style="margin-left: 97px;" id="code1" value="weightbrutto" name="Брутто вес"/></div>
               <div class="ui-state-default">Чистый вес  <input type="checkbox" style="margin-left: 93px;" id="code1" value="weightnetto" name="Чистый вес"/></div>
                <div class="ui-state-default">Ширина  <input type="checkbox" style="margin-left: 116px;" id="code1" value="width" name="Ширина"/></div>
                <div class="ui-state-default">Длина  <input type="checkbox" style="margin-left: 129px;" id="code1" value="length" name="Длина"/></div>
                <div class="ui-state-default">Высота  <input type="checkbox" style="margin-left: 122px;" id="code1" value="height" name="Высота"/></div>
               <div class="ui-state-default">Срок гарантии  <input type="checkbox" style="margin-left: 73px;" id="code1" value="termGuarantee" name="Срок гарантии"/></div>
                <div class="ui-state-default">Класс инструмента <input type="checkbox" style="margin-left: 40px;" id="code1" value="class" name="Класс инструмента"/></div>
                <div class="ui-state-default">Упаковка  <input type="checkbox" style="margin-left: 110px;" id="code1" value="packing" name="Упаковка"/></div>
                <div class="ui-state-default"> Характеристики <input type="checkbox" style="margin-left: 60px;" id="code1" value="exactlyType1" name="Характеристики"/></div>
                <div class="ui-state-default"> На складе <input type="checkbox" style="margin-left: 103px;" id="code1" value="sclad" name="На складе"/></div>
               <div class="ui-state-default">Код УКВД  <input type="checkbox" style="margin-left: 107px;" id="code1" value="ukvd" name="Код УКВД"/></div>
           </div>

        </div>


</div>
        <button type="submit" style="margin: 10px 10px 50px 300px; width:200px;" id="button_left" class="btn btn-success">Отправить</button>

    </form>

