<template>
     <div>
          <section class="pageProductoFinanciar">
               <div class="boxBackground">
                    <div class="container-fluid">
                         <div class="boxContent">
                              <div class="row">
                                   <div class="col-0 col-xl-1"></div>
                                   <div class="col-12 col-xl-10">
                                        <div class="boxTitle pingMenu">
                                             <h1>
                                                  <span class="colorYellow">Financia</span> con <br>
                                                  MotoPopular
                                             </h1>
                                        </div>
                                        <div class="row mt-2">
                                             <div class="col-12 col-md-6">
                                                  <div class="boxDescription">
                                                       <p class="bold mb-2">
                                                            ¿Necesitas financiar la moto que buscabas? Hazlo sin salir de casa
                                                       </p>
                                                       <p>
                                                            Completa tus datos y recibe la mejor opción para financiar tu siguiente moto. 
                                                            Puedes solicitar montos desde S/1000 hasta S/5000 soles,según tu perfil crediticio
                                                       </p>
                                                  </div>
                                             </div>
                                        </div>
                                        <form class="separateForm" name="formFinanciar" id="formFinanciar" v-on:submit="sendData" method="POST">
                                             
                                             <div class="boxLabel">
                                                  01. ELIGE LA MOTO QUE DESEAS FINANCIAR
                                             </div>
                                             <div class="row">
                                                  <div class="col-12 col-md-4 mb-4">
                                                       <label for="marca">MARCA DE MOTO DE TU PREFERENCIA:*</label>
                                                       <div class="boxSelect">
                                                            <select name="marca" id="marca" class="form-select"  v-model="form.marca" @change="onChangeMarca($event)">
                                                                 <option selected value="">Seleccione marca</option>
                                                                 <option v-for="(marca, index) in allMarcas" :key="index" :value="marca">{{ marca.name }}</option>
                                                            </select>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                                                 <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                                            </svg>
                                                       </div>
                                                  </div>
                                                  <div class="col-12 col-md-4 mb-4">
                                                       <label for="moto">MODELO DE LA MOTO:*</label>
                                                       <div class="boxSelect">
                                                            <select name="moto" id="moto" class="form-select"  v-model="form.moto" @change="onChangeModelo($event)">
                                                                 <option selected value="">Seleccione marca</option>
                                                                 <option v-for="(product, index) in allProducts" :key="index" :value="product">{{ titleProduct(product.title) }}</option>
                                                                 
                                                            </select>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                                                 <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                                            </svg>
                                                       </div>
                                                  </div>
                                                  <div class="col-12 col-md-4 mb-4">
                                                       <label for="color">COLOR </label>
                                                       <div class="boxSelect">
                                                            <select name="color" id="color" class="form-select"  v-model="form.color">
                                                                 <option selected value="">Seleccione color</option>
                                                                 <option v-for="(color, index) in allTypeColors" :key="index" :value="color.id">{{ color.color }}</option>
                                                            </select>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                                                 <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                                            </svg>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="boxLabel boxMT">
                                                  02. INFORMACIÓN PERSONAL
                                             </div>
                                             <div class="row">
                                                  <div class="col-12 col-md-4 mb-4">
                                                       <label for="nombres">NOMBRES:*</label>
                                                       <input type="text" name="nombres" id="nombres" class="inputForm1" autocomplete="off" v-model="form.nombres" placeholder="Ingresa tus nombres">
                                                  </div>
                                                  <div class="col-12 col-md-4 mb-4">
                                                       <label for="apellidos">APELLIDOS:*</label>
                                                       <input type="text" name="apellidos" id="apellidos" class="inputForm1" autocomplete="off" v-model="form.apellidos" placeholder="Ingresa tus apellidos">
                                                  </div>
                                                  <div class="col-12 col-md-4 mb-4">
                                                       <label for="email">CORREO ELECTRÓNICO:*</label>
                                                       <input type="text" name="email" id="email" class="inputForm1" autocomplete="off" v-model="form.email" placeholder="tucorreo@correo.com">
                                                  </div>
                                                  <div class="col-12 col-md-4 mb-4">
                                                       <label for="celular">NRO. DE CELULAR:*</label>
                                                       <input type="text" name="celular" id="celular" class="inputForm1" autocomplete="off" v-model="form.celular" placeholder="Ingresa tu número de celular">
                                                  </div>
                                                  <div class="col-12 col-md-4 mb-4">
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
                                                  <div class="col-12 col-md-4 mb-4">
                                                       <label for="doc">NÚMERO DE DOCUMENTO:*</label>
                                                       <input type="text" name="doc" id="doc" class="inputForm1" autocomplete="off" v-model="form.doc" placeholder="Ingresa tu número de documento">
                                                  </div>
                                                  <div class="col-12 col-md-4 mb-4">
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
                                                  <div class="col-12 col-md-4 mb-4">
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
                                                  <div class="col-12 col-md-4 mb-4">
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
                                             <div class="boxLabel boxMT">
                                                  03. INFORMACIÓN LABORAL
                                             </div>
                                             <div class="row">
                                                  <div class="col-12">
                                                       <label for="nombres" class="mb-2">¿CUÁL ES TU SITUACIÓN LABORAL?</label>
                                                  </div>
                                                  <div class="col-12 col-md-4 mb-4">
                                                       <div class="d-flex justify-content-start align-items-center">
                                                            <div class="boxRadio">
                                                                 <input type="radio" id="laboral" value="DEPENDIENTE" v-model="form.laboral" />
                                                                 <label for="laboral"></label>
                                                            </div>
                                                            <div>
                                                                 <p class="labelP2">
                                                                      DEPENDIENTE
                                                                 </p>
                                                                 <p class="labelP2">
                                                                      Estoy en planilla en la empresa en la que trabajo.
                                                                 </p>
                                                            </div>
                                                       </div>
                                                       <!-- <label class="agree-error msnError">Debe aceptar los Términos y Condiciones </label> -->
                                                  </div>
                                                  <div class="col-12 col-md-4 mb-4">
                                                       <div class="d-flex justify-content-start align-items-center">
                                                            <div class="boxRadio">
                                                                 <input type="radio" id="independiente" value="INDEPENDIENTE" v-model="form.laboral" />
                                                                 <label for="independiente"></label>
                                                            </div>
                                                            <div>
                                                                 <p class="labelP2">
                                                                      INDEPENDIENTE
                                                                 </p>
                                                                 <p class="labelP2">
                                                                      Realizo trabajos y/o servicios por Recibo por Honorarios.
                                                                 </p>
                                                            </div>
                                                       </div>
                                                       <!-- <label class="agree-error msnError">Debe aceptar los Términos y Condiciones </label> -->
                                                  </div>
                                                  <div class="col-12 col-md-4 mb-4">
                                                       <div class="d-flex justify-content-start align-items-center">
                                                            <div class="boxRadio">
                                                                 <input type="radio" id="informal" value="INFORMAL" v-model="form.laboral" />
                                                                 <label for="informal"></label>
                                                            </div>
                                                            <div>
                                                                 <p class="labelP2">
                                                                      INFORMAL
                                                                 </p>
                                                                 <p class="labelP2">
                                                                      Genero ingresos sin ningún sustento de pago.
                                                                 </p>
                                                            </div>
                                                       </div>
                                                       <!-- <label class="agree-error msnError">Debe aceptar los Términos y Condiciones </label> -->
                                                  </div>
                                                  <div class="col-12 col-md-4 mb-4">
                                                       <label for="monto">¿CON QUÉ INICIAL CUENTAS PARA LA MOTO?* <br>(SOLES)</label>
                                                       <input type="text" name="monto" id="monto" class="inputForm1" autocomplete="off" v-model="form.monto" placeholder="Ingresa monto en soles">
                                                  </div>
                                                  <div class="col-12 col-md-4 mb-4">
                                                       <label for="cuota">CUOTA MENSUAL QUE PODRÍAS PAGAR* <br>(SOLES)</label>
                                                       <input type="text" name="cuota" id="cuota" class="inputForm1" autocomplete="off" v-model="form.cuota" placeholder="Ingresa monto en soles">
                                                  </div>
                                                  <div class="col-12">
                                                       <div class="separateAgree d-flex justify-content-center align-items-center">
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
                                                       </div>
                                                  </div>
                                                  <div class="col-12">
                                                       <div class="d-flex justify-content-center align-items-center">
                                                            <div class="boxButton">
                                                                 <button type="submit">Enviar Solicitud</button>
                                                            </div>
                                                       </div>
                                                  </div>
                                                  <div class="col-12 mt-3" id="mensajeRespuesta">

                                                  </div>
                                             </div>
                                        </form>
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
     data: function () {
          return {
               allTypeColors: [],
               allMarcas: [],
               allTypeDocument: [],
               allDepartament: [],
               allProducts: [],
               allProvinces: [],
               allDistrito: [],
               form: {
                    nombres: "",
                    apellidos: "",
                    celular: "",
                    email: "",
                    tipoDoc: "",
                    doc: "",
                    departamento: "",
                    provincia: "",
                    distrito: "",
                    marca: "",
                    moto: "",
                    color: "",
                    laboral: "",
                    monto: "",
                    cuota: "",
                    agree: false,
               }
          }
     },
     mounted: function() {
          this.loadForm()
          this.eventForm()
          this.loadFilters()
          this.validateElementForm()
          this.resetForm()
          // this.loadFilters2()
     },
     methods: {
          resetForm(){
               this.form.nombres = ""
               this.form.apellidos = ""
               this.form.celular = ""
               this.form.email = ""
               this.form.tipoDoc = ""
               this.form.doc = ""
               this.form.departamento = ""
               this.form.provincia = ""
               this.form.distrito = ""
               this.form.moto = ""
               this.form.color = ""
               this.form.laboral = ""
               this.form.cuota = ""
               this.form.marca = ""
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

               $("#monto").keydown(function (e) {
                    if (($("#monto").val().length < 8) || (e.keyCode == 8)){
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

               $("#cuota").keydown(function (e) {
                    if (($("#cuota").val().length < 8) || (e.keyCode == 8)){
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


               $("#nombres, #apellidos").keypress(function (event) {
                    let regex = new RegExp("^[a-zA-ZñÑ' ]+$")
                    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                    if (!regex.test(key)) {
                         event.preventDefault();
                         return false;
                    }

               })
          },
          titleProduct: function(value){
               let _title = value.replace("<br>", " ");
               return _title
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
          async onChangeModelo(event){
               console.log(this.form.moto)
               this.form.color = ""
               this.allTypeColors = this.form.moto.colores
          },
          async onChangeMarca(event){
               let _slug = this.form.marca.slug
               // console.log(_slug)
               this.form.moto = ""
               try{
                    let sendSolicitud = await axios.get(`/api/v1/marca/${_slug}`)
                    // console.log(sendSolicitud)
                    if (sendSolicitud.status === 200){
                         this.allProducts = sendSolicitud.data.data.product.gallery_products
                         // console.log(this.allProducts)
                    }
               }catch (error) {
                    console.log(error)
               } finally {
                    console.log('final')
               }
          },
          async loadFilters(){
               try{
                    let sendSolicitud = await axios.get('/api/v1/financiamiento-data')
                    // console.log(sendSolicitud)
                    if (sendSolicitud.status === 200){
                         this.allDepartament = sendSolicitud.data.data.depatamento
                         this.allMarcas = sendSolicitud.data.data.marcas
                         this.allTypeDocument = sendSolicitud.data.data.tipo_documentos
                         console.log(this.allDepartament)
                    }
               }catch (error) {
                    console.log(error)
               } finally {
                    console.log('final')
               }
          },
          loadForm: function(){
               $( "#formFinanciar" ).validate({
                    rules: {
                         nombres: {
                              required: true,
                              minlength: 2
                         },
                         apellidos: {
                              required: true,
                              minlength: 2
                         },
                         marca: {
                              required: true
                         },
                         moto: {
                              required: true
                         },
                         color: {
                              required: true
                         },
                         monto: {
                              required: true
                         },
                         cuota: {
                              required: true    
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
                              required: "Nombres - necesario",
                              minlength: "Como mínimo 2 caracteres"
                         },
                         apellidos: {
                              required: "Apellidos - necesario",
                              minlength: "Como mínimo 2 caracteres"
                         },
                         celular: {
                              required: "Celular - necesario",
                              minlength: "Como mínimo 9 caracteres"
                         },
                         marca: {
                              required: "Marca - necesario",
                         },
                         monto: {
                              required: "Monto - necesario",
                         },
                         cuota: {
                              required: "Cuota - necesario",
                         },
                         moto: {
                              required: "Moto - necesario",
                         },
                         color: {
                              required: "Color - necesario",
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
          async sendData(event) {
               let formData = new FormData()
               event.preventDefault()
               $('.loadPageLoading').addClass('active')
               var _flat_agree = 0
               if ($('#agree').is(':checked') != true ) {
                    alert('no')
                    $(".agree-error").addClass('errorManual')
                    return false
               }else{
                    _flat_agree = 1
                    $(".agree-error").removeClass('errorManual')
               }
               if ($("#formFinanciar").valid()) {
                    formData.append("nombres", this.form.nombres)
                    formData.append("apellidos", this.form.apellidos)
                    formData.append("celular", this.form.celular)
                    formData.append("correo", this.form.email)
                    formData.append("tipo_documento_id", this.form.tipoDoc)
                    formData.append("nro_documento", this.form.doc)
                    formData.append("departamento_id", this.form.departamento)
                    formData.append("provincia_id", this.form.provincia)
                    formData.append("distrito_id", this.form.distrito)
                    formData.append("marca_id", this.form.marca.id)
                    formData.append("producto_id", this.form.moto.id)
                    formData.append("color_id", this.form.color)
                    formData.append("laboral", this.form.laboral)
                    formData.append("cuota_inicial", this.form.monto)
                    formData.append("cuota_mensual", this.form.cuota)
                    formData.append("situacion_laboral", this.form.laboral)
                    formData.append("agree", _flat_agree)
                    console.log(this.form)
                    try{
                         let sendSolicitud = await axios.post('/api/v1/store-finaciamiento',formData)
                         console.log(sendSolicitud)
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
                         console.log(error)
                         let _msn = "<div class='alert alert-danger' role='alert'>"
                         _msn += "<p class='txtCenter'>No se pudo enviar sus datos, intente m&aacute;s tarde</p>"
                         _msn +="</div>"
                         $("#mensajeRespuesta").html(_msn)
                    } finally {
                         console.log('final')
                    }
               }
          },
     }
}
</script>