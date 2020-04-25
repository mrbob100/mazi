<!DOCTYPE html>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/vue.min.js" charset="utf-8" ></script>

<form  id="selectMyFixing" style="display: block;  width: 250px; padding: 20px 20px;" action="{{route('resume')}}"   method="post">
    <p> Диапазон цен:
        <input type="text" style="width:200px; border:0; color:#f6931f;font-weight: bold;" id="pricer" class="selectValItem" name="pricer"  value="{{$data['maxValue']}}" data-min="{{$data['minValue']}}" /></p>

   <!--div class="nav-justified">
        <input type="text" style="width:50px; border:0; color:#f6931f;font-weight: bold; position: absolute;" id="pricer" class="selectValItem" name="pricer"  value="{--{$data['minValue']}--}" />
        <input type="hidden" style="width:50px; border:0; color:#f6931f;font-weight: bold; position: absolute; margin-left: 8%;" id="pricer1" class="selectValItem" name="pricer1"  value="{--{$data['minValue']}--}" />
    </div-->





    <br/>
    <div name="slider-range" style="width:200px; border:0; color:#f6931f;font-weight: bold;" class="selectValItem"  id="slider-range"></div>
   <!--input type="hidden" id="zuzanna"  data-min="{--{$data['minValue']}--}" data-max="{--{$data['maxValue']}--}" /-->
    <br/> <br/>

    <div id="slider2"></div>
    {{ csrf_field() }}


    @if($data['companies'])
    <select name="menuFirms"  style="width:200px;" size="1" id="menuFirms" class="selectValItem" onchange="myRangeOut();">
        <option  disabled selected>Производитель</option>
        @foreach($data['companies'] as $company)
        <option value="{{$company[1]}}">{{$company[1]}} - &nbsp;<span style="color:#f6931f; font-weight: bold;">({!!$company[2]!!})</span></option>
        @endforeach

    </select>
    <br/> <br/>
    @endif

    @if($data['countries'])
    <select name="menuCountries" size="1" style="width:200px;"  id="menuCountries" class="selectValItem" onchange="myRangeOut();">
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

    @if($data['typeProducts'])
        @foreach($data['typeProducts'] as $k=>$type)


        <select name="{{$k}}" size="1" style="width:200px;" id="menuPower" class="selectValItem" onchange="myRangeOut();">
            <option disabled selected>{!! trans('ru.'.$k) !!} </option>
            @foreach($type as $item)

                <option value="{{$item[1]}}">"{{$item[1]}}- &nbsp;<span style="color:#f6931f; font-weight: bold;">{!!$item[2]  !!}</span></option>
             @endforeach
        </select>
            <br/> <br/>
        @endforeach
      @endif


  <!--  @if($data['powers'])
    <select name="menuPower" size="1" style="width:200px;" id="menuPower" class="selectValItem">
        <option disabled selected>Мощность</option>
        @foreach($data['powers'] as $power)
            <option value="{--{$power[1]}--}">"{--{$power[1]}--}- &nbsp;<span style="color:#f6931f; font-weight: bold;">({--!!$power[2]!!--})</span></option>
        @endforeach
    </select>
    <br/> <br/>
    @endif
-->

    @if($data['packs'])
    <select name="menuComplect" size="1"  style="width:200px;" id="menuComplect" class="selectValItem" onchange="myRangeOut();">
        <option disabled selected>Упаковка</option>
        @foreach($data['packs'] as $pack)
           <option value="{{$pack[1]}}">{{$pack[1]}}- &nbsp;<span style="color:#f6931f; font-weight: bold;">({!!$pack[2]!!})</span></option>
        @endforeach
    </select>
    <br/> <br/>
    @endif

    @if($data['profile1'])
    <select name="menuTools" size="1"  style="width:200px;" id="menuTools" class="selectValItem" onchange="myRangeOut();">
        <option disabled selected>Профиль - пилы</option>
        @foreach($data['profile1'] as $profile)
         <option value="{{$profile[1]}}">{{$profile[1]}}- &nbsp;<span style="color:#f6931f; font-weight: bold;">({!!$profile[2]!!})</span></option>
      @endforeach
    </select>
    <br/> <br/>
    @endif
    @if($data['profile2'])
    <select name="menuTools2" size="1"  style="width:200px;" id="menuTools2" class="selectValItem" onchange="myRangeOut();">
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
    <input type="checkbox" value="{{$pack[1]}}" name="dop_options" id="shlem_left" class="selectValItem" onchange="myRangeOut();"/>
    <label for="shlem-left">Ударная</label>
            -<span style="color:#f6931f; font-weight: bold;">{!!$pack[2]!!}</span>
        @endforeach
    @endif


    @if($data['notImpact'])
        @foreach($data['notImpact'] as $pack)
            <input type="checkbox" value="{{$pack[1]}}" name="dop_options1" id="shlem_left1" class="selectValItem"  onchange="myRangeOut();"/>
             <label for="shlem-left1">Безударная</label>
            -<span style="color:#f6931f; font-weight: bold;">{!!$pack[2]!!}</span>
        @endforeach

   @endif



    <!--br/> <br/> <br/>
    <p><b>Тип инструмента</b></p>
    <p><input name="dzen" type="radio"  value="6" class="selectValItem">Электрический</p>
    <p><input name="dzen" type="radio"  value="1" class="selectValItem" > Аккумуляторный</p>
    <p><input name="dzen" type="radio"  value="7" class="selectValItem">Гидравлический</p>
    <p><input name="dzen" type="radio"  value="2" class="selectValItem">Механический</p>
    <p><input name="dzen" type="radio"  value="3" class="selectValItem">Пневматический</p>
    <p><input name="dzen" type="radio"  value="4" class="selectValItem">Батарейки</p>
    <p><input name="dzen" type="radio"  value="5" class="selectValItem">Импульсный</p>
    <br/> <br/-->
    <!--input type="hidden" id="button_left"  value="отправить" /-->
</form>