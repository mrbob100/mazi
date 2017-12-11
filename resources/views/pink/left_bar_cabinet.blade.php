<form  id="selectMyFixing" style="display: block; background-color: #DEDEDE; width: 240px; padding: 20px 20px;" action="{{route('cabAnalize')}}"   method="post">
    @if($data['worked'])
        <p><b>Заказы по стадии выполнения</b></p>

            @if($data['worked'][0])
            <input type="checkbox" value="не выбран" name="notchoise" id="shlem_left" class="selectValItem" />
            <label for="shlem-left">Не выбран</label>
            -<span style="color:#f6931f; font-weight: bold;">{!!$data['worked'][0]!!}</span>
            @endif
                @if($data['worked'][1])
                    <input type="checkbox" value="В работе" name="inworks" id="shlem_left1" class="selectValItem" />
                    <label for="shlem-left1">В работе</label>
                    -<span style="color:#f6931f; font-weight: bold;">{!!$data['worked'][1]!!}</span>
                @endif
                @if($data['worked'][2])
                    <input type="checkbox" value="Завершен" name="finished" id="shlem_left2" class="selectValItem" />
                    <label for="shlem-left2">Завершен</label>
                    -<span style="color:#f6931f; font-weight: bold;">{!!$data['worked'][2]!!}</span>
                @endif
                @if($data['worked'][3])
                    <input type="checkbox" value="Отправлен" name="sent" id="shlem_left3" class="selectValItem" />
                    <label for="shlem-left3">Отправлен</label>
                    -<span style="color:#f6931f; font-weight: bold;">{!!$data['worked'][3]!!}</span>
                @endif


    @endif


    @if($data['qntDay'])

            <br/> <br/> <br/>
            <p><b>Заказы по дате размещения</b></p>
            @if($data['qntDay'][0])
            <p><input name="dzen" type="radio"  value="день" class="selectValItem" > За текущий день {!! $data['qntDay'][0] !!}</p>
            @endif
            @if($data['qntDay'][1])
            <p><input name="dzen" type="radio"  value="неделя" class="selectValItem">за текущую неделю  {!! $data['qntDay'][1] !!}</p>
            @endif
            @if($data['qntDay'][2])
            <p><input name="dzen" type="radio"  value="месяц" class="selectValItem">за текущий месяц  {!! $data['qntDay'][2] !!}</p>
            @endif
            @if($data['qntDay'][3])
            <p><input name="dzen" type="radio"  value="квартал" class="selectValItem">за три последних месяца  {!! $data['qntDay'][3] !!}</p>
            @endif
            @if($data['qntDay'][4])
            <p><input name="dzen" type="radio"  value="год" class="selectValItem">за текущий год  {!! $data['qntDay'][4] !!}</p>
            @endif
            <br/> <br/>
            <input type="submit" id="button_left"  value="отправить" />
</form>

@endif