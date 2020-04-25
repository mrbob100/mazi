window.onload = function () {
    let ee2 =document.querySelector('#rqueze1').value;
    let exactly=document.querySelector('#exactly');
    let power=JSON.parse(ee2);
    let ee3 =document.querySelector('#rqueze2').value;
    let voltage=JSON.parse(ee3);
     ee2 =document.querySelector('#capacity').value;
    let capacity=JSON.parse(ee2);
    ee2 =document.querySelector('#angleCuttingDepth').value;
    let angleCuttingDepth=JSON.parse(ee2);
    ee4 =document.querySelector("#cuttingDepth").value;
    let cuttingDepth=JSON.parse(ee4);

    ee2 =document.querySelector('#cutmatdepth').value;
    let cutmatdepth=JSON.parse(ee2);
    ee2 =document.querySelector('#diametrDisk').value;
    let diametrdisk=JSON.parse(ee2);
    ee2 =document.querySelector('#idle').value;
    let idle=JSON.parse(ee2);
    ee2 =document.querySelector('#impact').value;
    let impact=JSON.parse(ee2);
    ee2 =document.querySelector('#maxHole').value;
    let maxhole=JSON.parse(ee2);
    ee2 =document.querySelector('#performance').value;
    let performance=JSON.parse(ee2);
    ee2 =document.querySelector('#qntImpact').value;
    let qntimpact=JSON.parse(ee2);
    ee2 =document.querySelector('#rotationSpeed').value;
    let rotationspeed=JSON.parse(ee2);
    ee2 =document.querySelector('#spindle').value;
    let spindle=JSON.parse(ee2);
    ee2 =document.querySelector('#cartridge').value;
    let cartridge=JSON.parse(ee2);
    ee2 =document.querySelector('#airflow').value;
    let airflow=JSON.parse(ee2);
    ee2 =document.querySelector('#cutedgewidth').value;
    let cutedgewidth=JSON.parse(ee2);
    ee2 =document.querySelector('#frequency').value;
    let frequency=JSON.parse(ee2);
    ee2 =document.querySelector('#grindplate').value;
    let grindplate=JSON.parse(ee2);
    ee2 =document.querySelector('#holestand').value;
    let holestand=JSON.parse(ee2);
    ee2 =document.querySelector('#maxcapacity').value;
    let maxcapacity=JSON.parse(ee2);
    ee2 =document.querySelector('#scaffold').value;
    let scaffold=JSON.parse(ee2);
    ee2 =document.querySelector('#shankrange').value;
    let shankrange=JSON.parse(ee2);
    ee2 =document.querySelector('#steel').value;
    let steel=JSON.parse(ee2);
    ee2 =document.querySelector('#strokelength').value;
    let strokelength=JSON.parse(ee2);
    ee2 =document.querySelector('#vibration').value;
    let vibration=JSON.parse(ee2);
    ee2 =document.querySelector('#workingwidth').value;
    let workingwidth=JSON.parse(ee2);
    ee2 =document.querySelector('#product-category_id').value;
    let category=JSON.parse(ee2);

    ee2 =document.querySelector('#accumulatortype').value;
    let accumulatortype=JSON.parse(ee2);
    ee2 =document.querySelector('#accuracy').value;
    let accuracy=JSON.parse(ee2);
    ee2 =document.querySelector('#accuracyslope').value;
    let accuracyslope=JSON.parse(ee2);
    ee2 =document.querySelector('#android').value;
    let android=JSON.parse(ee2);
    ee2 =document.querySelector('#angle').value;
    let angle=JSON.parse(ee2);
    ee2 =document.querySelector('#brightness').value;
    let brightness=JSON.parse(ee2);
    ee2 =document.querySelector('#calculation').value;
    let calculation=JSON.parse(ee2);
    ee2 =document.querySelector('#chargetime').value;
    let chargetime=JSON.parse(ee2);
    ee2 =document.querySelector('#containervol').value;
    let containervol=JSON.parse(ee2);
    ee2 =document.querySelector('#crownlength').value;
    let crownlength=JSON.parse(ee2);
    ee2 =document.querySelector('#display').value;
    let display=JSON.parse(ee2);
    ee2 =document.querySelector('#fixture').value;
    let fixture=JSON.parse(ee2);
    ee2 =document.querySelector('#functional').value;
    let functional=JSON.parse(ee2);
    ee2 =document.querySelector('#gluediameter').value;
    let gluediameter=JSON.parse(ee2);
    ee2 =document.querySelector('#gluelength').value;
    let gluelength=JSON.parse(ee2);
    ee2 =document.querySelector('#goaldistance').value;
    let goaldistance=JSON.parse(ee2);
    ee2 =document.querySelector('#holediameter').value;
    let holediameter=JSON.parse(ee2);
    ee2 =document.querySelector('#ignition').value;
    let ignition=JSON.parse(ee2);
    ee2 =document.querySelector('#iphone').value;
    let iphone=JSON.parse(ee2);
    ee2 =document.querySelector('#laserclass').value;
    let laserclass=JSON.parse(ee2);
    ee2 =document.querySelector('#magnificate').value;
    let magnificate=JSON.parse(ee2);
    ee2 =document.querySelector('#measurange').value;
    let measurange=JSON.parse(ee2);
    ee2 =document.querySelector('#measurenumber').value;
    let measurenumber=JSON.parse(ee2);
    ee2 =document.querySelector('#oscillationangle').value;
    let oscillationangle=JSON.parse(ee2);
    ee2 =document.querySelector('#powersupply').value;
    let powersupply=JSON.parse(ee2);
    ee2 =document.querySelector('#screw').value;
    let screw=JSON.parse(ee2);
    ee2 =document.querySelector('#strokeqnt').value;
    let strokeqnt=JSON.parse(ee2);
    ee2 =document.querySelector('#temperature').value;
    let temperature=JSON.parse(ee2);
    ee2 =document.querySelector('#thread').value;
    let thread=JSON.parse(ee2);
    ee2 =document.querySelector('#turbinpower').value;
    let turbinpower=JSON.parse(ee2);
    ee2 =document.querySelector('#typeaccuracy').value;
    let typeaccuracy=JSON.parse(ee2);
    ee2 =document.querySelector('#unit').value;
    let unit=JSON.parse(ee2);
    ee2 =document.querySelector('#wheeldiameter').value;
    let wheeldiameter=JSON.parse(ee2);
    ee2 =document.querySelector('#worktime').value;
    let worktime=JSON.parse(ee2);
    ee2 =document.querySelector('#defence').value;
    let defence=JSON.parse(ee2);



  // let ee5=ee4[0].name;

    console.log('category',category);
    console.log('brightness',brightness);
    console.log('cuttingDepth',cuttingDepth);
    console.log('accuracy',accuracy);

    Vue.component('variation-select', {
        props:['data', 'val'],
        template: `<div class="orderLine_variants orderLine">
                        
                          <select class="orderLine_size" v-on:input="onUpdate($event.target.value)">
                            <!--option value="0" v-bind:selected="val == 0">Не выбран</option-->
                            <option v-for="(item, id_item) in data" v-bind:value="id_item" v-bind:selected="val == id_item">
                           
                              {{item.name}}
                            </option>
                          </select>
                   </div>`,
        methods: {
            onUpdate: function (val) {
                console.log(val);
                this.$emit('input', val);
            }
        }
    });

    Vue.component('product', {
        props:['prices', 'onorder'],
        template: `<div>
          <variation-select  :data="prices" v-model="id_point" :val="id_point"></variation-select>
          <!--
          <variation-select title="Size" v-if="isColor" v-model="name" :data="prices[id_point].name" :val="id_point"></variation-select>
          <!--div class="orderLine_price" v-if="isSize">{{price}}</div>-->
          <div class="orderLine_button" v-if="isColor" v-on:click="onorder(id_point)"><div class="btn btn-primary "> Ввести</div> </div>
          
              </div>`,
        data: function ()  {
            return {
                id_point: "0",

            }

        },
        computed: {
            isColor: function () {

                if(this.id_point!=undefined)
                {
                console.log(this.id_point);
                    console.log('раздел1');
                console.log(this.prices[this.id_point].name);
                }
                return this.prices[this.id_point].name != undefined;
            },
        }
    });




    Vue.component('power-container', {
        template: '<product :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: power



            }
        },
        methods: {
            order: function (id_point) {
                this.$emit('message-saved', id_point);

                if(id_point!=0) {
                    console.log('в методе имитации события');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{
                        let str=exactly.value.length;
                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });

    Vue.component('angle-container', {
        template: '<product :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: angle



            }
        },
        methods: {
            order: function (id_point) {
                this.$emit('message-saved', id_point);

                if(id_point!=0) {
                    console.log('в методе имитации события');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{
                        let str=exactly.value.length;
                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('accuracy-container', {
        template: '<product :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: accuracy



            }
        },
        methods: {
            order: function (id_point) {
                this.$emit('message-saved', id_point);

                if(id_point!=0) {
                    console.log('в методе имитации события');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{
                        let str=exactly.value.length;
                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });

    Vue.component('accuracyslope-container', {
        template: '<product :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: accuracyslope



            }
        },
        methods: {
            order: function (id_point) {
                this.$emit('message-saved', id_point);

                if(id_point!=0) {
                    console.log('в методе имитации события');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{
                        let str=exactly.value.length;
                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });

    Vue.component('accumulatortype-container', {
        template: '<product :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: accumulatortype



            }
        },
        methods: {
            order: function (id_point) {
                this.$emit('message-saved', id_point);

                if(id_point!=0) {
                    console.log('в методе имитации события');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{
                        let str=exactly.value.length;
                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });

    Vue.component('brightness-container', {
        template: '<product :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: brightness



            }
        },
        methods: {
            order: function (id_point) {
                this.$emit('message-saved', id_point);

                if(id_point!=0) {
                    console.log('в методе имитации события');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{
                        let str=exactly.value.length;
                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('voltage-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

              prices: voltage


        }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });

    Vue.component('capacity-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: capacity


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });









    Vue.component('cuttingDepth-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: cuttingDepth


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('containervol-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: containervol


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });

    Vue.component('calculation-container', {
        template: '<product :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: calculation



            }
        },
        methods: {
            order: function (id_point) {
                this.$emit('message-saved', id_point);

                if(id_point!=0) {
                    console.log('в методе имитации события');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{
                        let str=exactly.value.length;
                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('angleCuttingDepth-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: angleCuttingDepth


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });

    Vue.component('cutmatdepth-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: cutmatdepth


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('diametrdisk-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: diametrdisk


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });

    Vue.component('holediameter-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: holediameter


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('idle-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: idle


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('impact-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: impact


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('maxhole-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: maxhole


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('measurange-container', {
        template: '<product :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: measurange



            }
        },
        methods: {
            order: function (id_point) {
                this.$emit('message-saved', id_point);

                if(id_point!=0) {
                    console.log('в методе имитации события');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{
                        let str=exactly.value.length;
                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });




    Vue.component('performance-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: performance


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });

    Vue.component('qntimpact-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: qntimpact


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('rotationspeed-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: rotationspeed


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });

    Vue.component('spindle-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: spindle


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('screw-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: screw


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });



    Vue.component('cartridge-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: cartridge


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });

    Vue.component('airflow-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: airflow


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('cutedgewidth-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: cutedgewidth


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });

    Vue.component('frequency-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: frequency


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('grindplate-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: grindplate


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });

    Vue.component('holestand-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: holestand


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });

    Vue.component('maxcapacity-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: maxcapacity


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });



    Vue.component('scaffold-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: scaffold


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });

    Vue.component('shankrange-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: shankrange


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });

    Vue.component('steel-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: steel


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });

    Vue.component('strokelength-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: strokelength


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });

    Vue.component('strokeqnt-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: strokeqnt


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('temperature-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: temperature


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('turbinpower-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: turbinpower


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });






    Vue.component('vibration-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: vibration


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('workingwidth-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: workingwidth


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });

    Vue.component('oscillationangle-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: oscillationangle


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('goaldistance-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: goaldistance


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });

    Vue.component('defence-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: defence


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('measurenumber-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: measurenumber


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('typeaccuracy-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: typeaccuracy


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('display-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: display


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('unit-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: unit


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('android-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: android


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('iphone-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: iphone


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('powersupply-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: powersupply


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('functional-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: functional


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('wheeldiameter-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: wheeldiameter


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('thread-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: thread


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('gluediameter-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: gluediameter


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });

    Vue.component('ignition-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: ignition


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('chargetime-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: chargetime


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });


    Vue.component('gluelength-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: gluelength


            }
        },
        methods: {
            order: function (id_point) {
                if(id_point!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_point].nick+"\""+":"+"\""+this.prices[id_point].name+"\""+as1;
                    }
                }
            }
        }

    });







    let a = new Vue({
        el: '.orderLine',
        data: {
            id_point: "",
            category: category,

        },
        methods: {
            Californiya: function(event)
            {
                this.category=event.target.value;
            }

        }

    });
}