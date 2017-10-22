<!DOCTYPE html>
<form  id="selectMyFixing" style="display: block; background-color: #DEDEDE; width: 240px; padding: 20px 20px;" action="{{route('resume')}}"   method="post">
    <p> Диапазон цен:
        <input type="text" style="width:200px; border:0; color:#f6931f;font-weight: bold;" id="pricer" class="selectValItem" name="pricer" /></p>
    <br/>
    <div name="slider-range" style="width:200px; border:0; color:#f6931f;font-weight: bold;" class="selectValItem" id="slider-range"></div>
    <br/> <br/>
    <div id="slider2"></div>
    {{ csrf_field() }}


    @if($data['companies'])
    <select name="menuFirms"  style="width:200px;" size="1" id="menuFirms" class="selectValItem" >
        <option  disabled selected>Производитель</option>
        @foreach($data['companies'] as $company)
        <option value="{{$company[1]}}">{{$company[1]}} - &nbsp;<span style="color:#f6931f; font-weight: bold;">({!!$company[2]!!})</span></option>
        @endforeach

    </select>
    <br/> <br/>
    @endif

    @if($data['countries'])
    <select name="menuCountries" size="1" style="width:200px;"  id="menuCountries" class="selectValItem">
   <table border="1" width="100%" cellpadding="5">
       <tr>
        <option disabled selected><td>Страна производителя</td><td></td></option>
       </tr>
     @foreach($data['countries'] as $country)
       <tr>
              <option value="{{$country[1]}}">
                  <td> {{$country[1]}}</td>
                  <td> - &nbsp;<span style="color:#f6931f; font-weight: bold;">({!!$country[2]!!})</span></td>
              </option>
       </tr>
     @endforeach
   </table>
    </select>
    <br/> <br/>
    @endif


    @if($data['powers'])
    <select name="menuPower" size="1" style="width:200px;" id="menuPower" class="selectValItem">
        <option disabled selected>Мощность</option>
        @foreach($data['powers'] as $power)
            <option value="{{$power[1]}}">"{{$power[1]}}- &nbsp;<span style="color:#f6931f; font-weight: bold;">({!!$power[2]!!})</span></option>
        @endforeach
    </select>
    <br/> <br/>
    @endif


    @if($data['packs'])
    <select name="menuComplect" size="1"  style="width:200px;" id="menuComplect" class="selectValItem">
        <option disabled selected>Упаковка</option>
        @foreach($data['packs'] as $pack)
           <option value="{{$pack[1]}}">{{$pack[1]}}- &nbsp;<span style="color:#f6931f; font-weight: bold;">({!!$pack[2]!!})</span></option>
        @endforeach
    </select>
    <br/> <br/>
    @endif

    @if($data['profile1'])
    <select name="menuTools" size="1"  style="width:200px;" id="menuTools" class="selectValItem">
        <option disabled selected>Профиль - пилы</option>
        @foreach($data['profile1'] as $profile)
         <option value="{{$profile[1]}}">{{$profile[1]}}- &nbsp;<span style="color:#f6931f; font-weight: bold;">({!!$profile[2]!!})</span></option>
      @endforeach
    </select>
    <br/> <br/>
    @endif
    @if($data['profile2'])
    <select name="menuTools2" size="1"  style="width:200px;" id="menuTools2" class="selectValItem">
        <option disabled selected>Профиль - шлифмашины</option>
        @foreach($data['profile2'] as $profile)
           <option value="{{$profile[1]}}">{{$profile[1]}}- &nbsp;<span style="color:#f6931f; font-weight: bold;">({!!$profile[2]!!})</span></option>
        @endforeach
    </select>
    <br/> <br/>
    @endif
    <br/>


    @if($data['impact'])
        @foreach($data['impact'] as $pack)
    <input type="checkbox" value="{{$pack[1]}}" name="dop_options" id="shlem_left" class="selectValItem" />
    <label for="shlem-left">Ударная</label>
            -<span style="color:#f6931f; font-weight: bold;">{!!$pack[2]!!}</span>
        @endforeach
    @endif


    @if($data['notImpact'])
        @foreach($data['notImpact'] as $pack)
            <input type="checkbox" value="{{$pack[1]}}" name="dop_options1" id="shlem_left1" class="selectValItem"/>
             <label for="shlem-left1">Безударная</label>
            -<span style="color:#f6931f; font-weight: bold;">{!!$pack[2]!!}</span>
        @endforeach

   @endif

    <br/> <br/> <br/>
    <p><b>Тип инструмента</b></p>
    <p><input name="dzen" type="radio"  value="6" class="selectValItem">Электрический</p>
    <p><input name="dzen" type="radio"  value="1" class="selectValItem" > Аккумуляторный</p>
    <p><input name="dzen" type="radio"  value="6" class="selectValItem">Гидравлический</p>
    <p><input name="dzen" type="radio"  value="2" class="selectValItem">Механический</p>
    <p><input name="dzen" type="radio"  value="3" class="selectValItem">Пневматический</p>
    <p><input name="dzen" type="radio"  value="4" class="selectValItem">Батарейки</p>
    <p><input name="dzen" type="radio"  value="5" class="selectValItem">Импульсный</p>
    <br/> <br/>
    <input type="submit" id="button_left"  value="отправить" />
</form>