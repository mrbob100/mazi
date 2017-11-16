window.onload = function () {
    let ee2 =document.getElementById('rqueze1').value;
    let exactly=document.getElementById('exactly');
    let ee1=JSON.parse(ee2);
    let ee3 =document.getElementById('rqueze2').value;
    let ee4=JSON.parse(ee3);
     ee2 =document.getElementById('capacity').value;
    let capacity=JSON.parse(ee2);
    ee2 =document.getElementById('angleCuttingDepth').value;
    let angleCuttingDepth=JSON.parse(ee2);
    ee2 =document.getElementById('cuttingDepth').value;
    let cuttingDepth=JSON.parse(ee2);
    ee2 =document.getElementById('diametrDisk').value;
    let diametrdisk=JSON.parse(ee2);
    ee2 =document.getElementById('idle').value;
    let idle=JSON.parse(ee2);
    ee2 =document.getElementById('impact').value;
    let impact=JSON.parse(ee2);
    ee2 =document.getElementById('maxHole').value;
    let maxhole=JSON.parse(ee2);
    ee2 =document.getElementById('performance').value;
    let performance=JSON.parse(ee2);
    ee2 =document.getElementById('qntImpact').value;
    let qntimpact=JSON.parse(ee2);
    ee2 =document.getElementById('rotationSpeed').value;
    let rotationspeed=JSON.parse(ee2);
    ee2 =document.getElementById('spindle').value;
    let spindle=JSON.parse(ee2);
    ee2 =document.getElementById('cartridge').value;
    let cartridge=JSON.parse(ee2);
    ee2 =document.getElementById('airflow').value;
    let airflow=JSON.parse(ee2);
    ee2 =document.getElementById('cutedgewidth').value;
    let cutedgewidth=JSON.parse(ee2);
    ee2 =document.getElementById('frequency').value;
    let frequency=JSON.parse(ee2);
    ee2 =document.getElementById('grindplate').value;
    let grindplate=JSON.parse(ee2);
    ee2 =document.getElementById('holestand').value;
    let holestand=JSON.parse(ee2);
    ee2 =document.getElementById('maxcapacity').value;
    let maxcapacity=JSON.parse(ee2);
    ee2 =document.getElementById('scaffold').value;
    let scaffold=JSON.parse(ee2);
    ee2 =document.getElementById('shankrange').value;
    let shankrange=JSON.parse(ee2);
    ee2 =document.getElementById('steel').value;
    let steel=JSON.parse(ee2);
    ee2 =document.getElementById('strokelength').value;
    let strokelength=JSON.parse(ee2);
    ee2 =document.getElementById('vibration').value;
    let vibration=JSON.parse(ee2);
    ee2 =document.getElementById('workingwidth').value;
    let workingwidth=JSON.parse(ee2);


  // let ee5=ee4[0].name;
    console.log('ee1',ee1);
    console.log('ee4',ee4);
    console.log('capacity',capacity);
    console.log('angleCuttingDepth',angleCuttingDepth);
    console.log('cuttingDepth',cuttingDepth);
    console.log('diametrdisk',diametrdisk);
    console.log('idle',idle);
    console.log('impact',impact);
    console.log('maxhole',maxhole);
    console.log('performance',performance);
    console.log('qntimpact',qntimpact);
    console.log('rotationspeed',rotationspeed);
    console.log('spindle',spindle);
    console.log('cartridge',cartridge);




    Vue.component('variation-select', {
        props:['title', 'data', 'val'],
        template: `<div class="orderLine_variants orderLine">
                        <div class="orderLine_title">{{title}}</div>
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
          <variation-select title="" :data="prices" v-model="id_color" :val="id_color"></variation-select>
          <!--
          <variation-select title="Size" v-if="isColor" v-model="name" :data="prices[id_color].name" :val="id_color"></variation-select>
          <!--div class="orderLine_price" v-if="isSize">{{price}}</div>-->
          <div class="orderLine_button" v-if="isColor" v-on:click="onorder(id_color)"><div class="btn btn-primary "> Ввести</div> </div>
          
              </div>`,
        data: function ()  {
            return {
                id_color: "0",
              //  name: ""
              //  id_size: "0"


            }

        },
        computed: {
            isColor: function () {

                if(this.id_color!=undefined)
                {
                console.log(this.id_color);
                    console.log('раздел1');
                console.log(this.prices[this.id_color].name);
                }
                return this.prices[this.id_color].name != undefined;
            },
        }
    });

    Vue.component('power-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

                prices: ee1



            }
        },
        methods: {
            order: function (id_color) {
                this.$emit('message-saved', id_color);

                if(id_color!=0) {
                    console.log('в методе имитации события');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{
                        let str=exactly.value.length;
                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    }
                }
            }
        }

    });




    Vue.component('voltage-container', {
        template: '<product  :prices="prices" :onorder="order"></product>',
        data: function () {
            return {

              prices: ee4


        }
        },
        methods: {
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
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
            order: function (id_color) {
                if(id_color!=0) {
                    console.log('в методе имитации события 2');

                    let as='{';
                    let as1='}';
                    if(!exactly.value.length){
                        exactly.value+=as+'\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    } else{

                        exactly.value= exactly.value.toString().substring(0,exactly.value.length-1);
                        exactly.value+=',\"'+this.prices[id_color].nick+"\""+":"+"\""+this.prices[id_color].name+"\""+as1;
                    }
                }
            }
        }

    });



   // console.log('ee1  ',ee1);

    let a = new Vue({
        el: '.orderLine',
        data: {
            id_color: "",
            category: ""

        }



    });
}