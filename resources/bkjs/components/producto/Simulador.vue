<template>
     <div>
          <section class="pageProductoSimulador" id="pageProductoSimulador">
               <div class="boxbgBlack">
                    <div class="container-fluid">
                         <div class="boxContent">
                              <div class="row">
                                   <div class="col-0 col-md-1"></div>
                                   <div class="col-12 col-md-10">
                                        <div class="row">
                                             <div class="col-12 col-md-12 col-lg-4 col-xl-4">
                                                  <div class="boxSubTitle2 relative">
                                                       <h2>SIMULA TU <br><span class="colorYellow">crédito <br>popular</span></h2>
                                                       
                                                  </div>
                                                  <div class="boxDescription mt-4 pmb">
                                                       <p>
                                                            Tu financiamiento 100% en línea, rápido y desembolsado 
                                                            en tienda para que te lleves tu moto a casa.
                                                            Da click en "Lo Quiero" y financia hasta el 70% de tu moto.
                                                       </p>
                                                  </div>
                                             </div>
                                             <div class="col-12 col-md-6 col-lg-3 col-xl-3">
                                                  <div class="boxInfoSimulador">
                                                       <h3>{{ dataMarca.nombre }}</h3>
                                                       <h2 v-html="dataProduct.titulo"></h2>
                                                  </div>
                                                  <div class="boxPrecioSimulador">
                                                       <h3>precio:</h3>
                                                       <h2>{{ formatPrice(montoProducto) }}</h2>
                                                  </div>
                                                  <div class="boxImageSimulador">
                                                       <div class="d-flex justify-content-center align-items-center">
                                                            <div class="boxImage">
                                                                 <img :src="dataProduct.image" alt="">
                                                            </div>
                                                       </div>
                                                  </div>
                                                  
                                             </div>
                                             <div class="col-12 col-md-6 col-lg-5 col-xl-5">
                                                  <div class="boxRangeContent d-flex justify-content-between align-items-start flex-column flex-xxl-row">
                                                       <div class="boxStep">
                                                            <div class="boxStepTitle d-flex justify-content-start align-items-start">
                                                                 <h3>¿Cuánto quieres financiar?</h3>
                                                            </div>
                                                            <div class="boxContentSelect sliderBarRange notIrsGridPoll">
                                                                 <div id="sliderBarPriceRangeSimulador"></div>
                                                            </div>
                                                       </div>
                                                       <div class="boxStep">
                                                            <div class="boxStepTitle d-flex justify-content-start align-items-start">
                                                                 <h3>¿Cuántas quincenas?</h3>
                                                            </div>
                                                            <div class="boxContentSelect sliderBarRange notIrsGridPoll ">
                                                                 <div id="sliderBarCuotasRangeSimulador"></div>
                                                            </div>
                                                       </div>
                                                  </div>
                                                  <div class="boxSimuladorCrediticio">
                                                       <div class="boxSimuladorItems">
                                                            <div class="d-flex justify-content-between align-items-strech">
                                                                 <div class="contentData flex1">
                                                                      <h3>valor de cuota*</h3>
                                                                      <div class="boxViewData">
                                                                           <h4>{{ CalcularCuota }}</h4>
                                                                      </div>
                                                                 </div>
                                                                 <div class="boxMore d-flex flex-column justify-content-center align-items-center" :class="boolSoat === false  ? 'inactivo' : ''">
                                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                                           <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                                      </svg>
                                                                 </div>
                                                                 <div class="contentData" :class="boolSoat === false  ? 'inactivo' : ''">
                                                                      <h3>SOAT</h3>
                                                                      <div class="boxViewData" >
                                                                           <h4>{{ formatPrice(costoSoat) }}</h4>
                                                                      </div>
                                                                 </div>
                                                                 <div class="boxMore d-flex flex-column justify-content-center align-items-center" :class="boolSeguro === false  ? 'inactivo' : ''">
                                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                                           <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                                      </svg>
                                                                 </div>
                                                                 <div class="contentData" :class="boolSeguro === false  ? 'inactivo' : ''">
                                                                      <h3>SEG. TODO RIESGO</h3>
                                                                      <div class="boxViewData">
                                                                           <h4>{{ formatPrice(costoSeguroRiesgo) }}</h4>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="mt-3 boxSwitchContent d-flex align-items-center justify-content-start">
                                                            <div class="boxSwitch">
                                                                 <!-- <p>Anónimo</p> -->
                                                                 <div class="switch">
                                                                      <input id="switch" class="switch__input" name="switch" type="checkbox" v-model="boolSoat" value="true" unchecked-value="false" >
                                                                      <label class="switch__label" for="switch"></label>
                                                                 </div>
                                                            </div>
                                                            <p>
                                                                 Agregar SOAT
                                                            </p>
                                                       </div>
                                                       <div class="boxSwitchContent d-flex align-items-center justify-content-start">
                                                            <div class="boxSwitch">
                                                                 <!-- <p>Anónimo</p> -->
                                                                 <div class="switch">
                                                                      <input id="switch" class="switch__input" name="switch" type="checkbox" v-model="boolSeguro" value="true" unchecked-value="false" >
                                                                      <label class="switch__label" for="switch"></label>
                                                                 </div>
                                                            </div>
                                                            <p>
                                                                 Agregar Seguro todo riesgo
                                                            </p>
                                                       </div>
                                                  </div>
                                                  <div class="boxCalculadora">
                                                       <div class="boxButton">
                                                            <button type="button" v-on:click="irFormulario()">Lo Quiero</button>
                                                       </div>
                                                       
                                                  </div>                                                  
                                                  <div class="boxLegal mt-3">
                                                       <p>
                                                            * Las cuotras son quincenales,
                                                       </p>
                                                       <p>
                                                            * TCA máxima  {{ TCEAMax }}
                                                       </p>
                                                       <p>
                                                            * Valores referenciales.
                                                       </p>
                                                  </div>
                                             </div>
                                             
                                             
                                        </div>
                                        
                                   </div>
                                   <div class="col-0 col-md-1"></div>
                              </div>
                         </div>
                    </div>
               </div>
               
          </section>
     </div>
</template>
<style>
    @import "~/../node_modules/vue-multiselect/dist/vue-multiselect.min.css";
    @import "~/../node_modules/ion-rangeslider/css/ion.rangeSlider.min.css";
</style>
<script>
import Multiselect from 'vue-multiselect'
export default {
     props: ['slug', 'dataProduct', 'dataMarca','precioProducto'],
     components: {
          Multiselect
     },
     data() {
          return {
               montoFinanciar: 0,
               montoMaxFinanciar: 0,
               montoMaxFinanciar: 0,
               CuotaInicial: 0,
               CuotaFinal: 0,
               CuotaResetInicial: 0,
               montoProducto: 0,
               montoResult: 0,
               tasaInteres: 0,
               TCEAMax: 0,
               costoSoat: 0,
               costoSeguroRiesgo: 0,
               boolSeguro: false,
               boolSoat: false,
               ionRangeCuota: null,
               ionRangePrice: null,
               boolInitCuota: false,
               valorCuota: 0,

          }
     },
     mounted() {
          
          let _this = this 
          setTimeout( function(){
               _this.initSimulation()
          }, 3000)
         
          
     },
     computed: {
          CalcularCuota: function(){
               // console.log(`montoFinanciar: ${this.montoFinanciar}`)
               // console.log(`cuotaPagar: ${this.CuotaInicial}`)
               // console.log(`tasaInteres: ${this.tasaInteres}`)
               this.valorCuota = ( (this.montoFinanciar / this.CuotaInicial) + ((this.montoFinanciar * this.tasaInteres) / this.CuotaInicial) )
               this.valorCuota = Math.round(this.valorCuota)
               // console.log(">>>" + this.valorCuota)
               return this.formatPrice(this.valorCuota)
          },
          TotalPagar: function(){
               let resultado = this.valorCuota * this.CuotaInicial
               if (this.boolSeguro){
                    resultado = resultado + this.costoSeguroRiesgo
               }
               if (this.boolSoat){
                    resultado = resultado + this.costoSoat
               }
               return this.formatPrice(resultado)
          }
     },
     methods: {
          initSimulation: function(){
               // console.log(122)
               this.tasaInteres = 0
               this.valorCuota = 0
               this.TCEAMax = "84.3%"
               this.costoSeguroRiesgo = 750
               this.costoSoat = 580
               this.montoProducto = this.precioProducto
               // console.log('>>kalinxxx'+this.montoProducto)
               this.montoFinanciar = 1000
               this.montoMaxFinanciar = Math.round(this.montoProducto*0.7)
               this.montoMaxFinanciar2 = this.montoMaxFinanciar
               if (this.montoMaxFinanciar > 5000){
                    this.montoMaxFinanciar = 5000
               }
               this.initPriceSliderRange()
          },
          formatPorcentaje: function(valor){
               let result = valor * 100
               return `${result} %`
          },
          async CalcularRangoCuotas (){

               if ( (this.montoFinanciar <= 1199) ){
                    this.CuotaInicial = 4
                    this.CuotaFinal = 6
               }
               if ( ( (this.montoFinanciar > 1199) && (this.montoFinanciar <= 1399) ) ){
                    this.CuotaInicial = 4
                    this.CuotaFinal = 8
               }
               if ( ( (this.montoFinanciar > 1399) && (this.montoFinanciar <= 1999) ) ){
                    this.CuotaInicial = 4
                    this.CuotaFinal = 8
               }
               if (( (this.montoFinanciar > 1999) && (this.montoFinanciar <= 2499) ) ){
                    this.CuotaInicial = 4
                    this.CuotaFinal = 10
               }
               if ( ( (this.montoFinanciar > 2499) && (this.montoFinanciar <= 2999) ) ){
                    this.CuotaInicial = 4
                    this.CuotaFinal = 12
               }
               if ( ( (this.montoFinanciar > 2999) && (this.montoFinanciar <= 3499) ) ){
                    this.CuotaInicial = 4
                    this.CuotaFinal = 14
               }
               if (( (this.montoFinanciar > 3499) && (this.montoFinanciar <= 5000) ) ){
                    this.CuotaInicial = 4
                    this.CuotaFinal = 24
               }
               this.clearCuota()
               this.dameRangoCuota()
               
          },
          CalcularTasaInteres: function(){
               console.log("CUAOTA INCIAL"+ this.CuotaInicial)
               console.log("montoFinanciar"+ this.montoFinanciar)
               if ((this.CuotaInicial === 4) ){
                    this.tasaInteres = 0.16
               }
               if ( (this.CuotaInicial >=6) && (this.CuotaInicial < 8) ) {
                    this.tasaInteres = 0.24
               }
               if ( (this.CuotaInicial >=8) && (this.CuotaInicial < 10) ) {
                    this.tasaInteres = 0.32
               }
               if ( (this.CuotaInicial >=10) && (this.CuotaInicial < 12) ) {
                    this.tasaInteres = 0.40
               }
               if ( (this.CuotaInicial >=12) && (this.CuotaInicial < 14) ) {
                    this.tasaInteres = 0.48
               }
               if ( (this.CuotaInicial >=14) && (this.CuotaInicial < 16) ) {
                    this.tasaInteres = 0.56
               }
               if ( (this.CuotaInicial >=16) && (this.CuotaInicial < 18) ) {
                    this.tasaInteres = 0.64
               }
               if ( (this.CuotaInicial >=18) && (this.CuotaInicial < 20) ) {
                    this.tasaInteres = 0.72
               }
               if ( (this.CuotaInicial >=20) && (this.CuotaInicial <= 24) ) {
                    this.tasaInteres = 0.80
               }
          },
          
          dameRangoPrecio: function(){
               // console.log(this.montoFinanciar)
               // console.log(this.montoMaxFinanciar)
               // this.clearCuota()
          },
          dameRangoCuota: function(){
               // console.log(this.CuotaInicial)
               // console.log(this.CuotaFinal)
               // this.clearCuota()
               this.CalcularTasaInteres()
          },
          formatPrice: function (value) {
               // console.log(`total Kalin ${value}`)
               const exp = /(\d)(?=(\d{3})+(?!\d))/g
               const rep = '$1,'
               let arr = value.toString().split('.')
               // console.log(arr)
               if (arr.length > 1){
                    if (arr[1].length > 4 ){
                         arr[1] = arr[1].substr(0,4)
                    }
               }
               arr[0] = arr[0].replace(exp,rep)
               let result =  arr[1] ? arr.join('.'): arr[0]
               return `S/ ${result}`
          },
          clearCuota: function(){
               let _this = this
               if (this.boolInitCuota){
                    // console.log(this.CuotaInicial)
                    // console.log(this.CuotaFinal)
                    this.ionRangeCuota.update({
                         from: _this.CuotaInicial,
                         to: _this.CuotaFinal,
                         min: _this.CuotaInicial,
                         max: _this.CuotaFinal,
                    })
                    this.ionRangeCuota.reset()
                    // this.initCuotasSliderRange()
               }else{
                    this.initCuotasSliderRange()
                    this.boolInitCuota = true
               }
               // this.dameRangoCuota()
               
          },
          initCuotasSliderRange: function() {
               let barRange = '#sliderBarCuotasRangeSimulador'
               var _this = this
               $(barRange).ionRangeSlider({
                    //type: "double",
                    min: _this.CuotaInicial,
                    max: _this.CuotaFinal,
                    from: _this.CuotaInicial,
                    to: _this.CuotaFinal,
                    step: 2,
                    hide_min_max: true,
                    grid: true,
                    grid_snap: true,
                    from_fixed: false,  // fix position of FROM handle
                    to_fixed: false ,    // fix position of TO handle
                    onStart: function (data) {
                         // fired then range slider is ready
                         // console.log(`onStart2 ${data}`)
                         // console.log(data)
                         _this.CuotaInicial = data.from
                         // _this.CalcularRangoCuotas()
                         // _this.dameRangoCuota()
                    },
                    onChange: function (data) {
                         // fired on every range slider update
                         // console.log(`onChange ${data}`)
                    },
                    onFinish: function (data) {
                         // Aqui es donde debo procesar la funcion
                         // console.log(`onFinish2 ${data}`)
                         // console.log(data)
                         _this.CuotaInicial = data.from
                         _this.dameRangoCuota()
                    },
                    onUpdate: function (data) {
                         // fired on changing slider with Update method
                         // console.log(`onUpdate2 ${data}`)
                    }
               })
               this.ionRangeCuota = $(barRange).data("ionRangeSlider")
          },
          initPriceSliderRange: function() {
               let barRange = '#sliderBarPriceRangeSimulador'
               let _this = this
               $(barRange).ionRangeSlider({
                    // type: "double",
                    min: _this.montoFinanciar,
                    max: _this.montoMaxFinanciar,
                    from: _this.montoFinanciar,
                    to: _this.montoMaxFinanciar,
                    hide_min_max: true,
                    prettify_separator: ",",
                    prefix: "S/ ",
                    step: 100,
                    grid: true,
                    grid_snap: true,
                    from_fixed: false,  // fix position of FROM handle
                    to_fixed: false ,    // fix position of TO handle
                    onStart: function (data) {
                         // fired then range slider is ready
                         // console.log(`onStart ${data}`)
                         _this.CalcularRangoCuotas()
                        
                         // _this.dameRangoPrecio()
                    },
                    onChange: function (data) {
                         // fired on every range slider update
                         // console.log(`onChange ${data}`)
                    },
                    onFinish: function (data) {
                         // Aqui es donde debo procesar la funcion
                         // console.log(`onFinish ${data}`)
                         // console.log(data.from)
                         _this.montoFinanciar = data.from
                         _this.CalcularRangoCuotas()
                         _this.dameRangoPrecio()
                    },
                    onUpdate: function (data) {
                         // fired on changing slider with Update method
                         // console.log(`onUpdate ${data}`)
                    }
               })
               // this.ionRangePrice = $(barRange).data("ionRangeSlider")
               
          },
          irFormulario: function () {
               let _soat = 'NO'
               let _seguro = 'NO' 
               if (this.boolSeguro){
                    _seguro = 'SI'
               }
               if (this.boolSoat){
                    _soat = 'SI'
               }
               top.location.href = `/quiero-la-moto/${this.slug}/${this.montoFinanciar}/${this.CuotaInicial}/${this.valorCuota}/${_soat}/${_seguro}`
          },
     }
}
</script>