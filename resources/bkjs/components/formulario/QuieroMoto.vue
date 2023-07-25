<template>
     <div>
          <section class="pageProductoQuieroMoto">
               <div class="boxBackground">
                    <div class="container-fluid">
                         <div class="boxContent">
                              <div class="row">
                                   <div class="col-0 col-xl-1"></div>
                                   <div class="col-12 col-xl-10">
                                        <div class="row">
                                             <div class="col-0 col-md-1 col-xl-1"></div>
                                             <div class="col-12 col-md-4 col-xl-4">
                                                  <div class="viewImagenProduct pingMenu">
                                                       <img :src="dataProduct.image" id="ViewMotoActive1" />
                                                  </div>
                                                  <div class="boxDescription">
                                                       <div class="d-flex justify-content-start align-items-center">
                                                            <p>Selecciona color disponible:</p>
                                                            <div class="boxSelectorColors big" id="boxSelectorColors1">
                                                                 <div class="d-flex justify-content-start align-items-center">
                                                                      <a href="javascript:void(0)" v-for="(color,index) in dataProduct.colores" :key="index" :class="color.image === dataProduct.image ? color.color_estilo + ' active' : color.color_estilo"  v-on:click="selectColor(color.id,1)" :id="'selectColor1_'+color.id" :data-src="color.image"></a>
                                                                      <!-- <a href="javascript:void(0)" class="bgGrisOscuro" v-on:click="selectColor(2,1)" id="selectColor1_2" data-src="/frontend/images/producto/f1_c.png"></a> -->
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       
                                                  </div>
                                                  <div class="mt-3 d-flex justify-content-between align-items-center">
                                                       <div class="boxTitle">
                                                            <h3>{{ dataMarca.nombre }}</h3>
                                                            <h1 v-html="dataProduct.titulo"></h1>
                                                       </div>
                                                       <div class="boxSubTitle separate">
                                                            <h2>PRECIO</h2>
                                                            <h3>{{ formatPrice(dataProduct.precio) }}</h3>
                                                       </div>
                                                  </div>
                                                  <div class="boxDataCotizador" v-if="monto != ''">
                                                       <h3>Datos de tu Crédito Popular</h3>
                                                       <div class="d-flex justify-content-start align-items-center">
                                                            <h2>Monto a financiar: <span>{{ formatPrice(monto) }}</span></h2>
                                                       </div>
                                                       <div class="d-flex justify-content-start align-items-center">
                                                            <h2>Número de cuotas: <span>{{ cuotas  }}</span></h2>
                                                       </div>
                                                       <div class="d-flex justify-content-start align-items-center">
                                                            <h2>Valor de la cuota: <span>{{ formatPrice(valor)  }}</span></h2>
                                                       </div>
                                                       <div class="d-flex justify-content-start align-items-center">
                                                            <h2>SOAT: <span>{{ soat  }}</span></h2>
                                                       </div>
                                                       <div class="d-flex justify-content-start align-items-center">
                                                            <h2>Seguro Todo Riesgos: <span>{{ seguro  }}</span></h2>
                                                       </div>
                                                       <h4>*Valores referenciales.</h4>
                                                  </div>
                                                  <div class="boxLink">
                                                       <a :href="'/producto/'+slug">Volver a la página de especificaciones</a>
                                                  </div>
                                             </div>
                                             <div class="col-12 col-md-7 col-xl-7">
                                                  <div class="boxTitle2">
                                                       <h2>Quiero <span class="colorYellow">la moto</span></h2>
                                                  </div>
                                                  <div class="boxDescription mt-2">
                                                       <p>Ingresa tus datos y nos pondremos en contacto contigo muy pronto:</p>
                                                  </div>
                                                  <form name="formQuiero" id="formQuiero" v-on:submit="sendData" method="POST">
                                                       <div class="row">
                                                            <div class="col-12 col-md-6 mt-4">
                                                                 <label for="nombres">NOMBRES Y APELLIDOS:*</label>
                                                                 <input type="text" name="nombres" id="nombres" class="inputForm1" autocomplete="off" v-model="form.nombre" placeholder="Ingresa tus Nombres y Apellidos">
                                                            </div>
                                                            <div class="col-12 col-md-6 mt-4">
                                                                 <label for="celular">NRO. DE CELULAR:*</label>
                                                                 <input type="text" name="celular" id="celular" class="inputForm1" v-model="form.celular" placeholder="Ingres tu número de celular">
                                                            </div>
                                                            <div class="col-12 col-md-6 mt-4">
                                                                 <label for="email">CORREO ELECTRÓNICO:*</label>
                                                                 <input type="text" name="email" id="email" class="inputForm1" v-model="form.email" placeholder="tucorreo@correo.com">
                                                            </div>
                                                       </div>
                                                       <div class="row">
                                                            <div class="col-12 col-md-6 mt-4">
                                                                 <label for="tipoDoc">TIPO DE DOCUMENTO:*</label>
                                                                 <div class="boxSelect">
                                                                      <select name="tipoDoc" id="tipoDoc" class="form-select"  v-model="form.tipoDoc">
                                                                           <option selected value="">Selecciona tipo de documento</option>
                                                                           <option v-for="(typedoc,index) in allTypeDocument" :key="index" :value="typedoc.id">{{ typedoc.name }}</option>
                                                                      </select>
                                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                                                      <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                                                      </svg>
                                                                 </div>
                                                                 
                                                            </div>
                                                            <div class="col-12 col-md-6 mt-4">
                                                                 <label for="doc">NÚMERO DE DOCUMENTO:*</label>
                                                                 <input type="text" name="doc" id="doc" class="inputForm1" v-model="form.doc" placeholder="Ingresa tu número de documento">
                                                            </div>
                                                            <div class="col-12 col-md-4 mt-4">
                                                                 <label for="departamento">DEPARTAMENTO:*</label>
                                                                 <div class="boxSelect">
                                                                      <select name="departamento" id="departamento" class="form-select" @change="onChangeDepartamento($event)"  v-model="form.departamento" aria-label="Default select example">
                                                                           <option selected value="">Selecciona departamento</option>
                                                                           <option v-for="(departament, index) in allDepartament" :key="index" :value="departament.id">{{ departament.descripcion }}</option>
                                                                      </select>
                                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                                                      <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                                                      </svg>
                                                                 </div>
                                                                 
                                                            </div>
                                                            <div class="col-12 col-md-4 mt-4">
                                                                 <label for="provincia">PROVINCIA:*</label>
                                                                 <div class="boxSelect">
                                                                      <select name="provincia" id="provincia" class="form-select" @change="onChangeProvincia($event)" v-model="form.provincia" aria-label="Default select example">
                                                                           <option selected value="">Selecciona provincia</option>
                                                                           <option v-for="(province, index) in allProvinces" :key="index" :value="province.id">{{ province.descripcion }}</option>
                                                                      </select>
                                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                                                      <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                                                      </svg>
                                                                 </div>
                                                            </div>
                                                            <div class="col-12 col-md-4 mt-4">
                                                                 <label for="distrito">DISTRITO:*</label>
                                                                 <div class="boxSelect">
                                                                      <select name="distrito" id="distrito" class="form-select" v-model="form.distrito" aria-label="Default select example">
                                                                           <option selected value="">Selecciona distrito</option>
                                                                           <option v-for="(distrito, index) in allDistrito" :key="index" :value="distrito.id">{{ distrito.descripcion }}</option>
                                                                      </select>
                                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                                                      <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                                                      </svg>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="row">
                                                            <div class="col-12 mt-4">
                                                                 <div>
                                                                      <div class="d-flex justify-content-start align-items-center">
                                                                           <div class="boxCheckbox">
                                                                                <input type="checkbox" id="agree" name="agree" value="yes" v-model="form.agree" />
                                                                                <label for="agree"></label>
                                                                           </div>
                                                                           <p class="labelP">He leído y acepto la <a href="#" target="_blank">Política de Privacidad</a></p>
                                                                      </div>
                                                                      <label class="agree-error msnError">Debe aceptar los Términos y Condiciones </label>
                                                                 </div>
                                                                 
                                                                 <div class="boxButton">
                                                                      <button type="submit">Enviar Solicitud</button>
                                                                 </div>
                                                                 
                                                            </div>
                                                            <div class="col-12 mt-3" id="mensajeRespuesta">

                                                            </div>
                                                       </div>
                                                  </form>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col-0 col-xl-1"></div>
                              </div>
                         </div>
                    </div>
               </div>
          </section>
     </div>
</template>
<script>
export default {
     props: ['slug','monto','cuotas','valor', 'soat', 'seguro'],
     data: function () {
          return {
               form:{
                    nombre: "",
                    celular: "",
                    email: "",
                    tipoDoc: "",
                    doc: "",
                    departamento: "",
                    provincia: "",
                    distrito: "",
                    agree: false,
               },
               dataSimulacro: {
                    marca: "",
                    producto: "",
                    precio: "",
                    montoFinanciar: 0,
                    numeroCuotas: 0,
                    valorCuota: 0,
                    soat: "",
                    seguroRiesgo: "",
               },
               dataProduct: [],
               dataMarca: [],
               allDepartament: [],
               allTypeDocument: [],
               allProvinces: [],
               allDistrito: [],
          }
     },
     mounted: function() {
          this.loadForm()
          this.eventForm()
          this.loadData()
          this.loadFilters()
          this.validateElementForm()
          this.resetForm()
     },
     methods: {
          resetForm(){
               this.form.nombre = ""
               this.form.celular = ""
               this.form.email = ""
               this.form.tipoDoc = ""
               this.form.doc = ""
               this.form.departamento = ""
               this.form.provincia = ""
               this.form.distrito = ""
               this.form.agree = false
                    
          },
          validateElementForm: function(){
               $("#doc").keydown(function (e) {
                    // console.log(e.keyCode)
                    // if ($("#doc").val().length >= 8){
                    //      if ($("#checkRecaptcha").is(':checked')){
                    //           $("#boxButtonLogin").addClass('active')
                    //      }
                    // }
                    if (($("#doc").val().length < 9) || (e.keyCode == 8)){
                         if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || (e.keyCode == 65 && e.ctrlKey === true) || (e.keyCode >= 35 && e.keyCode <= 39)) {
                              return;
                         }
                         if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                              e.preventDefault();
                         }
                    }else{
                         e.preventDefault();
                    }

               })

               $("#celular").keydown(function (e) {
                    if (($("#celular").val().length < 12) || (e.keyCode == 8)){
                         if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || (e.keyCode == 65 && e.ctrlKey === true) || (e.keyCode >= 35 && e.keyCode <= 39)) {
                              return;
                         }
                         if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                              e.preventDefault();
                         }
                    }else{
                         e.preventDefault();
                    }

               })


               $("#nombres").keypress(function (event) {
                    let regex = new RegExp("^[a-zA-ZñÑ' ]+$")
                    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                    if (!regex.test(key)) {
                         event.preventDefault();
                         return false;
                    }

               })
          },
          async loadFilters(){
               try{
                    let sendSolicitud = await axios.get('/api/v1/quiero-la-moto-data')
                    // console.log(sendSolicitud)
                    if (sendSolicitud.status === 200){
                         this.allDepartament = sendSolicitud.data.data.depatamento
                         this.allTypeDocument = sendSolicitud.data.data.tipo_documentos
                         // console.log(this.allDepartament)
                    }
               }catch (error) {
                    console.log(error)
               } finally {
                    console.log('final')
               }
          },
          async onChangeProvincia(event){
               // console.log(this.form.provincia)
               this.form.distrito = ""
               try{
                    let sendSolicitud = await axios.get(`/api/v1/get-distritos?departamento_id=${this.form.departamento}&provincia_id=${this.form.provincia}`)
                    // console.log(sendSolicitud)
                    if (sendSolicitud.status === 201){
                         this.allDistrito = sendSolicitud.data.data.distritos
                    }
               }catch (error) {
                    console.log(error)
               } finally {
                    console.log('final')
               }
          },
          async onChangeDepartamento(event){
               // console.log(this.form.departamento)
               this.form.provincia = ""
               this.form.distrito = ""
               try{
                    let sendSolicitud = await axios.get(`/api/v1/get-provincias?departamento_id=${this.form.departamento}`)
                    // console.log(sendSolicitud)
                    if (sendSolicitud.status === 201){
                         this.allProvinces = sendSolicitud.data.data.provincias
                    }
               }catch (error) {
                    console.log(error)
               } finally {
                    console.log('final')
               }
          },
          formatPrice: function (value) {
               // console.log(`total Kalin ${value}`)
               let _price = Math.trunc(value)
               // _price = _price.toString()
               const exp = /(\d)(?=(\d{3})+(?!\d))/g
               const rep = '$1,'
               let arr = _price.toString().split('.')
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
          async loadData() {
               let _slug = this.slug
               
               try{
                    let sendSolicitud = await axios.get(`/api/v1/producto/${_slug}`)
                    console.log(sendSolicitud)
                    if (sendSolicitud.status === 200){
                         this.dataProduct = sendSolicitud.data.data.product
                         this.dataMarca = sendSolicitud.data.data.product.marca
                         this.dataSimulacro.marca           = this.dataMarca.nombre
                         this.dataSimulacro.producto        = this.dataProduct.titulo
                         this.dataSimulacro.precio          = this.dataProduct.precio
                         this.dataSimulacro.montoFinanciar  = this.monto
                         this.dataSimulacro.numeroCuotas    = this.cuotas
                         this.dataSimulacro.valorCuota      = this.valor
                         this.dataSimulacro.soat            = this.soat
                         this.dataSimulacro.seguroRiesgo    = this.seguro
                    }


               }catch (error) {
                    console.log(error)
               } finally {
                    console.log('final')
               }
          },
          loadForm: function(){
               $( "#formQuiero" ).validate({
                    rules: {
                         nombres: {
                              required: true,
                              minlength: 2
                         },
                         celular: {
                              required: true,
                              minlength: 9
                         },
                         email: {
                              required: true,
                              email: true
                         },
                         tipoDoc: {
                              required: true,
                         },
                         doc: {
                              required: true,
                              minlength: 8
                         },
                         departamento: {
                              required: true,
                         },
                         provincia: {
                              required: true,
                         },
                         distrito: {
                              required: true,
                         },
                    }, 
                    messages: {
                         nombres: {
                              required: "Nombre - necesario",
                              minlength: "Como mínimo 2 caracteres"
                         },
                         celular: {
                              required: "Celular - necesario",
                              minlength: "Como mínimo 9 caracteres"
                         },
                         email: {
                              required: "Debe completar un correo válido",
                              email: "Debe completar un correo válido"
                         },
                         tipoDoc: {
                              required: "Tipo de doc. - necesario",
                         },
                         doc: {
                              required: "Doc. - necesario",
                              minlength: "Como mínimo 8 caracteres"
                         },
                         departamento: {
                              required: "Departamento - necesario",
                         },
                         provincia: {
                              required: "Provincia - necesario",
                         },
                         distrito: {
                              required: "Distrito - necesario",
                         },
                    }
               })
          },
          eventForm: function(){
               $('#agree').on("click", function(){
                    if ($('#agree').is(':checked')) {
                         $(".agree-error").removeClass('errorManual')
                    }else{
                         $(".agree-error").addClass('errorManual')     
                    }
               })
          },
          titleProduct: function(value){
               let _title = value.replace("<br>", " ")
               return _title
          },
          async sendData(event) {
               let formData = new FormData()
               let _moto = this.dataSimulacro.producto.replace("<br>", " ")
               $('.loadPageLoading').addClass('active')
               // let _data = {}
               event.preventDefault()
               var _flat_agree = 0
               if ($('#agree').is(':checked') != true ) {
                    // alert('no')
                    $(".agree-error").addClass('errorManual')
                    return false
               }else{
                    _flat_agree = 1
                    $(".agree-error").removeClass('errorManual')
               }
               if ($("#formQuiero").valid()) {
                    console.log("PASO")
                    // console.log(this.form)
                    // console.log(this.dataSimulacro)
                    
                    formData.append("nombre_apellidos", this.form.nombre)
                    formData.append("nro_celular", this.form.celular)
                    formData.append("correo", this.form.email)
                    formData.append("tipo_documento_id", this.form.tipoDoc)
                    formData.append("nro_documento", this.form.doc)
                    formData.append("departamento_id", this.form.departamento)
                    formData.append("provincia_id", this.form.provincia)
                    formData.append("distrito_id", this.form.distrito)
                    formData.append("tyc", _flat_agree)
                    formData.append("marca", this.dataSimulacro.marca)
                    formData.append("producto", _moto)
                    formData.append("precio", this.dataSimulacro.precio)
                    formData.append("montoFinanciar", this.dataSimulacro.montoFinanciar)
                    formData.append("numeroCuotas", this.dataSimulacro.numeroCuotas)
                    formData.append("valorCuota", this.dataSimulacro.valorCuota)
                    formData.append("seguroRiesgo", this.dataSimulacro.seguroRiesgo)
                    formData.append("soat", this.dataSimulacro.soat)
                    console.log(this.form)
                    console.log(this.dataSimulacro)
                    console.log(this._moto)
                    try{
                         let sendSolicitud = await axios.post('/api/v1/store-quiero-la-moto',formData)
                         $('.loadPageLoading').removeClass('active')
                         if (sendSolicitud.data.code === 201){
                              this.resetForm()
                              let _msn = "<div class='alert alert-success'  role='alert'>"
                              _msn += "<p class='txtCenter'>Sus datos han sido enviados de manera correcta</p>"
                              _msn +="</div>"
                              $("#mensajeRespuesta").html(_msn)
                         }else{
                              let _msn = "<div class='alert alert-danger' role='alert'>"
                              _msn += "<p class='txtCenter'>No se pudo enviar sus datos, intente m&aacute;s tarde</p>"
                              _msn +="</div>"
                              $("#mensajeRespuesta").html(_msn)
                         }
                    }catch (error) {
                         $('.loadPageLoading').removeClass('active')
                         let _msn = "<div class='alert alert-danger' role='alert'>"
                         _msn += "<p class='txtCenter'>No se pudo enviar sus datos, intente m&aacute;s tarde</p>"
                         _msn +="</div>"
                         $("#mensajeRespuesta").html(_msn)
                         console.log(error)
                    } finally {
                         console.log('final')
                    }
               }else{
                    console.log("no PASO")
               }
          },
          selectColor: function(idColor, idMotoActive){
               if ($(`#selectColor${idMotoActive}_${idColor}`).hasClass('active') === false){
                    let src = $(`#selectColor${idMotoActive}_${idColor}`).data("src")
                    console.log(src)
                    $(`#boxSelectorColors${idMotoActive} a`).removeClass('active')
                    $(`#ViewMotoActive${idMotoActive}`).attr('src', src)
                    $(`#selectColor${idMotoActive}_${idColor}`).addClass('active')
               }
          },
     }
}
</script>