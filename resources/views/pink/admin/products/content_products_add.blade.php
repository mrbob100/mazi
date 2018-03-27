@extends(env('THEME').'.admin.layouts.admin')
@section('content')
    <div class="container">
        <div class="wrapper container-fluid">

            <input type="text" id="rqueze1" style="display: none;" value="{{$power}}"  />
            <input type="text" id="rqueze2" style="display: none;" value="{{$voltage}}"  />
            <input type="text" id="capacity" style="display: none;" value="{{$capacity}}"  />
            <input type="text" id="angleCuttingDepth" style="display: none;" value="{{$angleCuttingDepth}}"  />
            <input type="text" id="cuttingDepth" style="display: none;" value="{{$cuttingDepth}}"  />
            <input type="text" id="cutmatdepth" style="display: none;" value="{{$cutmatdepth}}"  />
            <input type="text" id="diametrDisk" style="display: none;" value="{{$diametrDisk}}"  />
            <input type="text" id="idle" style="display: none;" value="{{$idle}}"  />
            <input type="text" id="impact" style="display: none;" value="{{$impact}}"  />
            <input type="text" id="maxHole" style="display: none;" value="{{$maxHole}}"  />
            <input type="text" id="performance" style="display: none;" value="{{$performance}}"  />
            <input type="text" id="qntImpact" style="display: none;" value="{{$qntImpact}}"  />
            <input type="text" id="rotationSpeed" style="display: none;" value="{{$rotationSpeed}}"  />
            <input type="text" id="spindle" style="display: none;" value="{{ $spindle}}"  />
            <input type="text" id="cartridge" style="display: none;" value="{{ $cartridge}}"  />

            <input type="text" id="airflow" style="display: none;" value="{{$airflow}}"  />
            <input type="text" id="cutedgewidth" style="display: none;" value="{{ $cutEdgeWidth}}"  />
            <input type="text" id="defence" style="display: none;" value="{{ $defence}}"  />
            <input type="text" id="frequency" style="display: none;" value="{{ $frequency}}"  />
            <input type="text" id="grindplate" style="display: none;" value="{{$grindplate}}"  />
            <input type="text" id="holestand" style="display: none;" value="{{ $holestand}}"  />
            <input type="text" id="maxcapacity" style="display: none;" value="{{ $maxcapacity}}"  />
            <input type="text" id="scaffold" style="display: none;" value="{{ $scaffold}}"  />
            <input type="text" id="shankrange" style="display: none;" value="{{$shankrange}}"  />
            <input type="text" id="steel" style="display: none;" value="{{$steel}}"  />
            <input type="text" id="strokelength" style="display: none;" value="{{$strokelength}}"  />
            <input type="text" id="vibration" style="display: none;" value="{{$vibration}}"  />
            <input type="text" id="workingwidth" style="display: none;" value="{{$workingwidth}}"  />

            <input type="text" id="accumulatortype" style="display: none;" value="{{$accumulatortype}}"/>
            <input type="text" id="accuracy" style="display: none;" value="{{$accuracy}}"/>
            <input type="text" id="accuracyslope" style="display: none;" value="{{$accuracyslope}}"/>
            <input type="text" id="android" style="display: none;" value="{{$android}}"/>
            <input type="text" id="angle" style="display: none;" value="{{$angle}}"/>
            <input type="text" id="brightness" style="display: none;" value="{{$brightness}}"  />
            <input type="text" id="calculation" style="display: none;" value="{{$calculation}}"  />
            <input type="text" id="chargetime" style="display: none;" value="{{$chargetime}}"  />
            <input type="text" id="containervol" style="display: none;" value="{{$containervol}}"  />
            <input type="text" id="crownlength" style="display: none;" value="{{$crownlength}}"  />
            <input type="text" id="display" style="display: none;" value="{{$display}}"  />
            <input type="text" id="fixture" style="display: none;" value="{{$fixture}}"  />
            <input type="text" id="functional" style="display: none;" value="{{$functional}}"  />
            <input type="text" id="gluediameter" style="display: none;" value="{{$gluediameter}}"  />
            <input type="text" id="gluelength" style="display: none;" value="{{$gluelength}}"  />
            <input type="text" id="goaldistance" style="display: none;" value="{{$goaldistance}}"  />
            <input type="text" id="holediameter" style="display: none;" value="{{$holediameter}}"  />
            <input type="text" id="ignition" style="display: none;" value="{{$ignition}}"  />
            <input type="text" id="iphone" style="display: none;" value="{{$iphone}}"  />
            <input type="text" id="laserclass" style="display: none;" value="{{$laserclass}}"  />
            <input type="text" id="magnificate" style="display: none;" value="{{$magnificate}}"  />
            <input type="text" id="measurange" style="display: none;" value="{{$measurange}}"  />
            <input type="text" id="measurenumber" style="display: none;" value="{{$measurenumber}}"  />
            <input type="text" id="oscillationangle" style="display: none;" value="{{$oscillationangle}}"  />
            <input type="text" id="powersupply" style="display: none;" value="{{$powersupply}}"  />
            <input type="text" id="screw" style="display: none;" value="{{$screw}}"  />
            <input type="text" id="strokeqnt" style="display: none;" value="{{$strokeqnt}}"  />
            <input type="text" id="turbinpower" style="display: none;" value="{{$turbinpower}}"  />
            <input type="text" id="typeaccuracy" style="display: none;" value="{{$typeaccuracy}}"  />
            <input type="text" id="unit" style="display: none;" value="{{$unit}}"  />
            <input type="text" id="wheeldiameter" style="display: none;" value="{{$wheeldiameter}}"  />
            <input type="text" id="worktime" style="display: none;" value="{{$worktime}}"  />
            <input type="text" id="temperature" style="display: none;" value="{{$temperature}}"  />
            <input type="text" id="thread" style="display: none;" value="{{$thread}}"  />


            {!! Form::open(['url'=>route('productAdd'/*,['category'=>$category->id]*/ ), 'class'=>'form-horizontal','style'=>'width:800px;',
            'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}
            <div class="form-group">
                {!! Form::label('name','Название',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Введите название продукции']) !!}
                </div>
            </div>

            <div class="form-group">

                {!! Form::label('code','код',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('code',old('code'),['class'=>'form-control','maxlength'=>10,'placeholder'=>' Код продукта']) !!}
                </div>
            </div>

            <!--div class="form-group">
                {--!! Form::label('category_id','Категория',['class'=>'col-xs2 control-label']) !!--}
                <div class="col-xs8">
                    {--!! Form::text('category_id',old('category_id'),['class'=>'form-control','placeholder'=>'Введите название категории']) !!--}
                </div>
            </div-->






        <div class="orderLine">



                    <div class="form-group">
                        {!! Form::label('category_id','Категория',['class'=>'col-xs2 control-label']) !!}
                        <div class="col-xs8">
                            {{--$var=$data['parent_id']===0 ? 'самостоятельная категория' : $data->getCategory->name--}}

                            <div class="form-group field-product-category_id has-success">
                                <!--label class="control-label" for="category-parent_id">Родительская категория</label
                                Для вывода виджета использован параметр config['model'] - это объект категории для выборки select.php- выпадающий список
                                -->

                                <select id="product-category_id" class="form-control" name="category_id" v-model="category" >
                                    <option value="0">Самостоятельная категория</option>
                                    {{ $var=Widget::run('MainWidget',['tpl'=>'select_product.php','model'=>$model]) }}
                                    {!! Form::select('category_id', $var,['class'=>'form-control','placeholder'=>'Категория']) !!}
                                </select>
                            </div>


                        </div>
                    </div>
           <p> Категория:  @{{category}} </p>

                <div class="row">


                    <div class="btn" v-if="category==10 || category==20 || category==12 || category==32">
                            <div class="col-xs-2">
                                power
                                <power-container></power-container>

                            </div>
                            <div class="col-xs-2">
                                 <!--product-container1  v-on:message-saved="handleCategory"></product-container1-->
                                voltage
                                <voltage-container></voltage-container>
                            </div>

                            <div class="col-xs-3">
                                capacity
                                <capacity-container></capacity-container>
                            </div>

                            <div class="col-xs-2">
                                impact
                                <impact-container></impact-container>
                            </div>
                            <div class="col-xs-2">
                                idle
                                <idle-container></idle-container>
                            </div>

                    </div>
                </div>

                <div class="row">
                    <div class="btn" v-if="category==10 ||category==20 || category==12 || category==32">


                             <div class="col-xs-2">
                                 spindle
                                 <spindle-container></spindle-container>
                             </div>

                               <div class="col-xs-2">
                                   cartridge
                                  <cartridge-container></cartridge-container>
                               </div>
                             <div class="col-xs-3">
                               rotationSpeed
                               <rotationspeed-container></rotationspeed-container>
                             </div>
                            <div class="col-xs-4">
                                maxHole
                                <maxhole-container></maxhole-container>
                            </div>
                      </div>
                  </div>
                <div class="row">
                          <div class="btn" v-if="category==10 || category==20 || category==12 || category==32">
                              <div class="col-xs-2">
                                qntImpact
                                  <qntimpact-container></qntimpact-container>
                              </div>
                         </div>
                </div>
            <div class="btn" v-if="category==19">
                <div class="row">
                        <div class="col-xs-3">
                            power
                            <power-container></power-container>

                        </div>
                        <div class="col-xs-4">
                            rotationSpeed
                            <rotationspeed-container></rotationspeed-container>
                        </div>
                        <div class="col-xs-3">
                            diametrDiska
                            <diametrdisk-container></diametrdisk-container>
                        </div>
                        <div class="col-xs-2">
                            spindle
                            <spindle-container></spindle-container>
                        </div>

                 </div>
            </div>
            <div class="btn" v-if="category==21 || category==22 || category==30 || category==33">
                <div class="row">
                    <div class="col-xs-3">
                        power
                        <power-container></power-container>

                    </div>
                    <div class="col-xs-3">
                        rotationSpeed
                        <rotationspeed-container></rotationspeed-container>
                    </div>
                    <div class="col-xs-3">
                        diametrDiska
                        <diametrdisk-container></diametrdisk-container>
                    </div>
                    <div class="col-xs-3">
                        spindle
                        <spindle-container></spindle-container>
                    </div>

                </div>
            </div>
            <div class="btn" v-if="category==21 || category==22 || category==30 || category==33">
                <div class="row">
                    <div class="col-xs-4">
                        performance
                        <performance-container></performance-container>
                    </div>
                </div>
            </div>


            <div class="btn" v-if="category==16">
                <div class="row">
                    <div class="col-xs-4">
                        voltage
                        <voltage-container></voltage-container>
                    </div>
                    <!--div class="col-xs-4">
                        oscillationangle
                        <oscillationangle-container></oscillationangle-container>
                    </div-->
                    <div class="col-xs-4">
                        idle
                        <idle-container></idle-container>
                    </div>


                </div>
            </div>

            <div class="btn" v-if="category==55">
                <div class="row">
                    <div class="col-xs-4">
                        power
                        <power-container></power-container>

                    </div>
                    <div class="col-xs-4">
                        airflow
                        <airflow-container></airflow-container>
                    </div>


                </div>
            </div>

            <div class="btn" v-if="category==99">
                <div class="row">
                    <div class="col-xs-4">
                        power
                        <power-container></power-container>
                    </div>
                    <div class="col-xs-4">
                        voltage
                        <voltage-container></voltage-container>
                    </div>
                    <div class="col-xs-4">
                        capacity
                        <capacity-container></capacity-container>
                    </div>

                </div>
            </div>

            <div class="btn" v-if="category==100">
                <div class="row">
                    <div class="col-xs-3">
                        power
                        <power-container></power-container>
                    </div>
                    <div class="col-xs-3">
                        voltage
                        <voltage-container></voltage-container>
                    </div>
                    <div class="col-xs-3">
                        capacity
                        <capacity-container></capacity-container>
                    </div>
                    <div class="col-xs-3">
                        brightness
                        <brightness-container></brightness-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==230 || category==235">
                <div class="row">

                    <div class="col-xs-3">
                        voltage
                        <voltage-container></voltage-container>
                    </div>
                    <div class="col-xs-3">
                        capacity
                        <capacity-container></capacity-container>
                    </div>
                    <div class="col-xs-3">
                        diametrdisk
                        <diametrdisk-container></diametrdisk-container>
                    </div>
                    <div class="col-xs-3">
                        spindle
                        <spindle-container></spindle-container>
                    </div>

                </div>
                <div class="row">

                    <div class="col-xs-4">
                        rotationspeed
                        <rotationspeed-container></rotationspeed-container>
                    </div>
                    <div class="col-xs-4">
                        idle
                        <idle-container></idle-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==302">
                <div class="row">
                    <div class="col-xs-3">
                        power
                        <power-container></power-container>
                    </div>
                    <div class="col-xs-3">
                        impact
                        <impact-container></impact-container>
                    </div>
                    <div class="col-xs-3">
                        capacity
                        <capacity-container></capacity-container>
                    </div>
                    <div class="col-xs-3">
                        qntimpact
                        <qntimpact-container></qntimpact-container>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        frequency
                        <frequency-container></frequency-container>
                    </div>


                    <div class="col-xs-3">
                        cartridge
                        <cartridge-container></cartridge-container>
                    </div>
                    <div class="col-xs-3">
                        vibration
                        <vibration-container></vibration-container>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        holediameter
                        <holediameter-container></holediameter-container>
                    </div>

                    <div class="col-xs-4">
                        idle
                        <idle-container></idle-container>
                    </div>
                </div>

            </div>

            <div class="btn" v-if="category==305">
                <div class="row">
                    <div class="col-xs-3">
                        power
                        <power-container></power-container>
                    </div>
                    <div class="col-xs-3">
                        rotationspeed
                        <rotationspeed-container></rotationspeed-container>
                    </div>
                    <div class="col-xs-3">
                        screw
                        <screw-container></screw-container>
                    </div>
                    <div class="col-xs-3">
                        cartridge
                        <cartridge-container></cartridge-container>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        spindle
                        <spindle-container></spindle-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==15">
                <div class="row">
                    <div class="col-xs-4">
                        power
                        <power-container></power-container>
                    </div>
                    <div class="col-xs-4">
                        strokelength
                        <strokelength-container></strokelength-container>
                    </div>
                    <div class="col-xs-4">
                        strokeqnt
                        <strokeqnt-container></strokeqnt-container>
                    </div>
                    <!--div class="col-xs-3">
                        cuttingDepth
                        <cuttingDepth-container></cuttingDepth-container>
                    </div-->
                    <!--div class="col-xs-3">
                        angleCuttingDepth
                        <angleCuttingDepth-container></angleCuttingDepth-container>
                    </div-->
                </div>
                <div class="row">


                    <div class="col-xs-4">
                        cutmatDepth
                        <cutmatdepth-container></cutmatdepth-container>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-4">
                        workingwidth
                        <workingwidth-container></workingwidth-container>
                    </div>
                    <div class="col-xs-4">
                        idle
                        <idle-container></idle-container>
                    </div>

                </div>
            </div>

            <div class="btn" v-if="category==34">
                <div class="row">
                    <div class="col-xs-3">
                        power
                        <power-container></power-container>
                    </div>
                    <div class="col-xs-3">
                        diametrdisk
                        <diametrdisk-container></diametrdisk-container>
                    </div>
                    <!--div class="col-xs-3">
                        cuttingDepth
                        <cuttingdepth-container></cuttingdepth-container>
                    </div-->
                    <div class="col-xs-3">
                        strokelength
                        <strokelength-container></strokelength-container>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        grindplate
                        <grindplate-container></grindplate-container>
                    </div>
                    <div class="col-xs-4">
                        workingwidth
                        <workingwidth-container></workingwidth-container>
                    </div>
                    <div class="col-xs-4">
                        holestand
                        <holestand-container></holestand-container>
                    </div>

                </div>
            </div>
            <div class="btn" v-if="category==102">
                <div class="row">
                    <div class="col-xs-4">
                        power
                        <power-container></power-container>
                    </div>
                    <div class="col-xs-4">
                        rotationspeed
                        <rotationspeed-container></rotationspeed-container>
                    </div>
                </div>
            </div>
            <div class="btn" v-if="category==18">
                <div class="row">
                    <div class="col-xs-3">
                        power
                        <power-container></power-container>
                    </div>
                    <div class="col-xs-3">
                        idle
                        <idle-container></idle-container>
                    </div>
                    <div class="col-xs-3">
                        steel
                        <steel-container></steel-container>
                    </div>
                    <div class="col-xs-3">
                        oscillationangle
                        <oscillationangle-container></oscillationangle-container>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        rotationspeed
                        <rotationspeed-container></rotationspeed-container>
                    </div>
                    <div class="col-xs-4">
                        diametrdisk
                        <diametrdisk-container></diametrdisk-container>
                    </div>
                    <div class="col-xs-4">
                        performance
                        <performance-container></performance-container>
                    </div>

                </div>
            </div>

            <div class="btn" v-if="category==7">
                <div class="row">
                    <div class="col-xs-3">
                        power
                        <power-container></power-container>
                    </div>
                    <div class="col-xs-3">
                        rotationspeed
                        <rotationspeed-container></rotationspeed-container>
                    </div>
                    <div class="col-xs-3">
                        diametrdisk
                        <diametrdisk-container></diametrdisk-container>
                    </div>
                    <div class="col-xs-3">
                        spindle
                        <spindle-container></spindle-container>
                    </div>
                </div>
                <div class="row">
                    <!--div class="col-xs-4">
                        cuttingdepth
                        <cuttingdepth-container></cuttingdepth-container>
                    </div-->

                </div>
            </div>

            <div class="btn" v-if="category==9">
                <div class="row">
                    <div class="col-xs-3">
                        power
                        <power-container></power-container>
                    </div>
                    <div class="col-xs-3">
                        rotationspeed
                        <rotationspeed-container></rotationspeed-container>
                    </div>
                    <!--div class="col-xs-3">
                        cuttingdepth
                        <cuttingdepth-container></cuttingdepth-container>
                    </div-->
                    <div class="col-xs-3">
                        holediameter
                        <holediameter-container></holediameter-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==13">
                <div class="row">
                    <div class="col-xs-4">
                        power
                        <power-container></power-container>
                    </div>
                    <div class="col-xs-4">
                        rotationspeed
                        <rotationspeed-container></rotationspeed-container>
                    </div>

                    <div class="col-xs-4">
                        cartridge
                        <cartridge-container></cartridge-container>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xs-4">
                        holediameter
                        <holediameter-container></holediameter-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==23">
                <div class="row">
                    <div class="col-xs-3">
                        power
                        <power-container></power-container>
                    </div>
                    <div class="col-xs-3">
                        rotationspeed
                        <rotationspeed-container></rotationspeed-container>
                    </div>
                    <!--div class="col-xs-3">
                        cuttingdepth
                        <cuttingdepth-container></cuttingdepth-container>
                    </div-->
                    <div class="col-xs-3">
                        cutmatdepth
                        <cutmatdepth-container></cutmatdepth-container>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        cutedgewidth
                        <cutedgewidth-container></cutedgewidth-container>
                    </div>

                </div>
            </div>

            <div class="btn" v-if="category==26">
                <div class="row">
                    <div class="col-xs-4">
                        power
                        <power-container></power-container>
                    </div>
                    <div class="col-xs-4">
                        voltage
                        <voltage-container></voltage-container>
                    </div>
                    <div class="col-xs-4">
                        airflow
                        <airflow-container></airflow-container>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-4">
                        turbinpower
                        <turbinpower-container></turbinpower-container>
                    </div>
                    <div class="col-xs-4">
                        containervol
                        <containervol-container></containervol-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==27">
                <div class="row">
                    <div class="col-xs-3">
                        power
                        <power-container></power-container>
                    </div>
                    <div class="col-xs-3">
                        rotationspeed
                        <rotationspeed-container></rotationspeed-container>
                    </div>
                    <div class="col-xs-3">
                        diametrdisk
                        <diametrdisk-container></diametrdisk-container>
                    </div>
                    <div class="col-xs-3">
                        spindle
                        <spindle-container></spindle-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==28">
                <div class="row">
                    <div class="col-xs-4">
                        power
                        <power-container></power-container>
                    </div>

                    <div class="col-xs-4">
                        airflow
                        <airflow-container></airflow-container>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        temperature
                        <temperature-container></temperature-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==37">
                <div class="row">
                    <div class="col-xs-4">
                        calculation
                        <calculation-container></calculation-container>
                    </div>
                    <div class="col-xs-4">
                        measurange
                        <measurange-container></measurange-container>
                    </div>
                    <div class="col-xs-4">
                        accuracy
                        <accuracy-container></accuracy-container>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-4">
                        accuracyslope
                        <accuracyslope-container></accuracyslope-container>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        goaldistance
                        <goaldistance-container></goaldistance-container>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xs-4">
                        defence
                        <defence-container></defence-container>
                    </div>
                    <div class="col-xs-4">
                        measurenumber
                        <measurenumber-container></measurenumber-container>
                    </div>
                    <div class="col-xs-4">
                        typeaccuracy
                        <typeaccuracy-container></typeaccuracy-container>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        display
                        <display-container></display-container>
                    </div>
                    <div class="col-xs-4">
                        unit
                        <unit-container></unit-container>
                    </div>
                    <div class="col-xs-4">
                        android
                        <android-container></android-container>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-4">
                        iphone
                        <iphone-container></iphone-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==38">
                <div class="row">
                    <div class="col-xs-3">
                        functional
                        <functional-container></functional-container>
                    </div>
                    <div class="col-xs-3">
                        measurange
                        <measurange-container></measurange-container>
                    </div>
                    <div class="col-xs-3">
                        accuracy
                        <accuracy-container></accuracy-container>
                    </div>
                    <div class="col-xs-3">
                        display
                        <display-container></display-container>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        goaldistance
                        <goaldistance-container></goaldistance-container>
                    </div>
                    <div class="col-xs-4">
                        defence
                        <defence-container></defence-container>
                    </div>
                    <div class="col-xs-4">
                        powersupply
                        <powersupply-container></powersupply-container>
                    </div>

                </div>
            </div>

            <div class="btn" v-if="category==39">
                <div class="row">
                    <div class="col-xs-4">
                        measurange
                        <measurange-container></measurange-container>
                    </div>
                    <div class="col-xs-4">
                        accuracy
                        <accuracy-container></accuracy-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==40">
                <div class="row">
                    <div class="col-xs-4">
                        display
                        <display-container></display-container>
                    </div>
                    <div class="col-xs-4">
                        accuracy
                        <accuracy-container></accuracy-container>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-4">
                        wheeldiameter
                        <wheeldiameter-container></wheeldiameter-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==41">
                <div class="row">
                    <div class="col-xs-3">
                        defence
                        <defence-container></defence-container>
                    </div>
                    <div class="col-xs-3">
                        measurange
                        <measurange-container></measurange-container>
                    </div>
                    <div class="col-xs-3">
                        accuracy
                        <accuracy-container></accuracy-container>
                    </div>
                    <div class="col-xs-3">
                        angle
                        <angle-container></angle-container>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        display
                        <display-container></display-container>
                    </div>

                    <div class="col-xs-4">
                        shankrange
                        <shankrange-container></shankrange-container>
                    </div>
                    <div class="col-xs-4">
                        powersupply
                        <powersupply-container></powersupply-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==42 || category==106">
                <div class="row">
                    <div class="col-xs-4">
                        measurange
                        <measurange-container></measurange-container>
                    </div>
                    <div class="col-xs-4">
                        accuracy
                        <accuracy-container></accuracy-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==43">
                <div class="row">
                    <div class="col-xs-4">
                        thread
                        <thread-container></thread-container>
                    </div>

                </div>
            </div>

            <div class="btn" v-if="category==54">
                <div class="row">
                    <div class="col-xs-6">
                        qntimpact
                        <qntimpact-container></qntimpact-container>
                    </div>
                    <div class="col-xs-6">
                        gluediameter
                        <gluediameter-container></gluediameter-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==56">
                <div class="row">
                    <div class="col-xs-3">
                        power
                        <power-container></power-container>
                    </div>
                    <div class="col-xs-3">
                        idle
                        <idle-container></idle-container>
                    </div>
                    <div class="col-xs-3">
                        voltage
                        <voltage-container></voltage-container>
                    </div>
                    <div class="col-xs-3">
                        rotationspeed
                        <rotationspeed-container></rotationspeed-container>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        oscillationangle
                        <oscillationangle-container></oscillationangle-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==57">
                <div class="row">
                    <div class="col-xs-3">
                        capacity
                        <capacity-container></capacity-container>
                    </div>
                    <div class="col-xs-3">
                        idle
                        <idle-container></idle-container>
                    </div>
                    <div class="col-xs-3">
                        voltage
                        <voltage-container></voltage-container>
                    </div>
                    <div class="col-xs-3">
                        diametrdisk
                        <diametrdisk-container></diametrdisk-container>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        oscillationangle
                        <oscillationangle-container></oscillationangle-container>
                    </div>
                    <div class="col-xs-4">
                        spindle
                        <spindle-container></spindle-container>
                    </div>
                    <div class="col-xs-4">
                        vibration
                        <vibration-container></vibration-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==59">
                <div class="row">
                    <div class="col-xs-4">
                        ignition
                        <ignition-container></ignition-container>
                    </div>
                    <div class="col-xs-4">
                        temperature
                        <temperature-container></temperature-container>
                    </div>
                    <div class="col-xs-4">
                        rotationspeed
                        <rotationspeed-container></rotationspeed-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==60 || category==74 ">
                <div class="row">
                    <div class="col-xs-4">
                        power
                        <power-container></power-container>
                    </div>
                    <div class="col-xs-4">
                        rotationspeed
                        <rotationspeed-container></rotationspeed-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==62">
                <div class="row">
                    <div class="col-xs-4">
                        voltage
                        <voltage-container></voltage-container>
                    </div>
                    <div class="col-xs-4">
                        capacity
                        <capacity-container></capacity-container>
                    </div>
                    <div class="col-xs-4">
                        chargetime
                        <chargetime-container></chargetime-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==78">
                <div class="row">
                    <div class="col-xs-4">
                        power
                        <power-container></power-container>
                    </div>
                    <div class="col-xs-4">
                        containervol
                        <containervol-container></containervol-container>
                    </div>
                    <div class="col-xs-4">
                        powersupply
                        <powersupply-container></powersupply-container>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        turbinpower
                        <turbinpower-container></turbinpower-container>
                    </div>
                    <div class="col-xs-4">
                        chargetime
                        <chargetime-container></chargetime-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==86">
                <div class="row">
                    <div class="col-xs-4">
                        containervol
                        <containervol-container></containervol-container>
                    </div>
                    <div class="col-xs-4">
                        gluelength
                        <gluelength-container></gluelength-container>
                    </div>
                    <div class="col-xs-4">
                        gluediameter
                        <gluediameter-container></gluediameter-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==103">
                <div class="row">
                    <div class="col-xs-4">
                        power
                        <power-container></power-container>
                    </div>
                    <div class="col-xs-4">
                        holestand
                        <holestand-container></holestand-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==315">
                <div class="row">
                    <div class="col-xs-4">
                        power
                        <power-container></power-container>
                    </div>
                    <div class="col-xs-4">
                        rotationspeed
                        <rotationspeed-container></rotationspeed-container>
                    </div>

                    <div class="col-xs-4">
                        voltage
                        <voltage-container></voltage-container>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-3">
                        containervol
                        <containervol-container></containervol-container>
                    </div>
                    <div class="col-xs-3">
                        gluelength
                        <gluelength-container></gluelength-container>
                    </div>
                    <div class="col-xs-3">
                        accumulatortype
                        <accumulatortype-container></accumulatortype-container>
                    </div>
                    <div class="col-xs-3">
                        temperature
                        <temperature-container></temperature-container>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        performance
                        <performance-container></performance-container>
                    </div>
                </div>
            </div>


            <div class="btn" v-if="category==24">
                <div class="row">
                    <div class="col-xs-3">
                        power
                        <power-container></power-container>
                    </div>
                    <div class="col-xs-3">
                        rotationspeed
                        <rotationspeed-container></rotationspeed-container>
                    </div>
                    <div class="col-xs-3">
                        strokelength
                        <strokelength-container></strokelength-container>
                    </div>
                    <div class="col-xs-3">
                        grindplate
                        <grindplate-container></grindplate-container>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-3">
                        idle
                        <idle-container></idle-container>
                    </div>
                    <div class="col-xs-3">
                        capacity
                        <capacity-container></capacity-container>
                    </div>
                    <div class="col-xs-3">
                        holestand
                        <holestand-container></holestand-container>
                    </div>
                    <div class="col-xs-3">
                        diametrdisk
                        <diametrdisk-container></diametrdisk-container>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        cutmatdepth
                        <cutmatdepth-container></cutmatdepth-container>
                    </div>
                </div>
            </div>

            <div class="btn" v-if="category==31">
                <div class="row">
                    <div class="col-xs-4">
                        power
                        <power-container></power-container>
                    </div>
                    <div class="col-xs-4">
                        rotationspeed
                        <rotationspeed-container></rotationspeed-container>
                    </div>
                    <div class="col-xs-4">
                        strokelength
                        <strokelength-container></strokelength-container>
                    </div>
                </div>
            </div>




         </div> <!-- конец блока vue.js-->




            <div class="form-group">
                {!! Form::label('exactlyType1','Характеристики',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('exactlyType1',old('exactlyType1'),['class'=>'form-control','placeholder'=>'Характеристики','id'=>'exactly']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('description','Краткое описание',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::textarea('description',old('description'),['id'=>'editor','class'=>'form-control','placeholder'=>'Краткое описание']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('text','Описание',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::textarea('text',old('text'),['id'=>'editor1','class'=>'form-control','placeholder'=>'Описание']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('price','Цена',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::number('price',old('price'),['class'=>'form-control','placeholder'=>'Цена']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('pricedealer1','Цена диллера 1',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::number('pricedealer1',old('pricedealer1'),['class'=>'form-control','placeholder'=>'Цена диллера 1']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('pricedealer2','Цена диллера 2',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::number('pricedealer2',old('pricedealer2'),['class'=>'form-control','placeholder'=>'Цена диллера 2']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('img','Изображение:',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::file('img',['class'=>'filestyle','data-buttonText'=>'Выберите изображение',
                    'data-buttonName'=>'btn-primary','data-placeholder'=>'Файла нет']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('mini_side','Наложение',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::file('mini_side',['class'=>'filestyle','data-buttonText'=>'Выберите изображение для наложения',
                    'data-buttonName'=>'btn-primary','data-placeholder'=>'Файла нет']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('type','Тип',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                   <!-- {--!! Form::text('type',old('type'),['class'=>'form-control','placeholder'=>'Тип']) !!--} -->
                    {!! Form::select('type',$listTool,['class'=>'form-control','placeholder'=>'Тип']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('country','Страна',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::select('country',$countryT,['class'=>'form-control','placeholder'=>'Страна']) !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('groupTools','Группа',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::select('groupTools',$groupT,['class'=>'form-control','placeholder'=>'Группа']) !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('new','Признак',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('признак',old('new'),['class'=>'form-control','placeholder'=>'Признак']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('weightbrutto','Вес(брутто)',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('weightbrutto',old('weightbrutto'),['class'=>'form-control','placeholder'=>'Вес(брутто)']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('weightnetto','Вес(нетто)',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('weightnetto',old('weightnetto'),['class'=>'form-control','placeholder'=>'Вес(нетто)']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('width','ширина',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('width',old('width'),['class'=>'form-control','placeholder'=>'ширина']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('length','длина',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('length',old('length'),['class'=>'form-control','placeholder'=>'длина']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('height','высота',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('height',old('height'),['class'=>'form-control','placeholder'=>'высота']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('termGuarantee','гарантия',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('termGuarantee',old('termGuarantee'),['class'=>'form-control','placeholder'=>'гарантия']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('class','класс',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::select('class',$classTo,['class'=>'form-control','placeholder'=>'класс']) !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('packing','упаковка',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::select('packing',$packingTo,['class'=>'form-control','placeholder'=>'упаковка']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('company','Компания',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::select('company',$companyTo,['class'=>'form-control','placeholder'=>'Компания']) !!}
                </div>
            </div>

            <!--div class="form-group">
                {--!! Form::label('created_at','Дата создания',['class'=>'col-xs2 control-label']) !!--}
                <div class="col-xs8">
                    {--!! Form::text('created_at',old('created_at'),['class'=>'form-control','placeholder'=>'Дата создания']) !!--}
                </div>
            </div-->




            <div class="form-group">
                {!! Form::label('keywords','Ключевые слова',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('keywords',old('keywords'),['class'=>'form-control','placeholder'=>'Ключевые слова']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('meta_desc','Мета описание',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('meta_desc',old('meta_desc'),['class'=>'form-control','placeholder'=>'Описание']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('sclad','склад',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('sclad',old('sclad'),['class'=>'form-control','placeholder'=>'склад']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('ukvd','код УКВД',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('ukvd',old('ukvd'),['class'=>'form-control','placeholder'=>'код УКВД']) !!}
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs10">
                    {!! Form::button('Сохранить',['class'=>'btn btn-primary','type'=>'submit']) !!}
                </div>
            </div>
            {!! Form::close() !!}
            <script>
                CKEDITOR.replace('editor');
                CKEDITOR.replace('editor1');
            </script>
        </div>
    </div>
@endsection