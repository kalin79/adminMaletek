<template>
     <div>
          <section class="pageSoat">
               <div class="boxBackground">
                    <div class="container-fluid">
                         <div class="boxContent">
                              <div class="boxTitle pingMenu">
                                   <h1 class="txtCenter">
                                        <span>Elige tu</span> Soat para moto
                                   </h1>
                              </div>
                              <div class="boxLogosSeguros">
                                   <div class="d-flex justify-content-center align-items-center">
                                        <img src="/frontend/images/logoseguros.png" alt="La Positiva y Rimac">
                                   </div>
                              </div>
                              <div class="d-flex justify-content-center align-items-center flex-column">
                                   <div class="boxFormSeguros">
                                        <form>
                                             <div class="row">
                                                  <div class="col-12 mbRow">
                                                       <label for="placa">PLACA</label>
                                                       <input type="text" name="placa" id="placa" class="inputForm1" v-model="form.placa" placeholder="Ingresa  placa de tu moto">
                                                  </div>
                                                  <div class="col-12 mbRow2">
                                                       <label for="marca">MARCA</label>
                                                       <input type="text" name="marca" id="marca" class="inputForm1" v-model="form.marca" placeholder="Ingresa la marca de tu moto">
                                                  </div>
                                                  <div class="col-12">
                                                       <div class="d-flex justify-content-center align-items-center">
                                                            <div class="boxButton btnSmall">
                                                                 <button type="submit" v-on:click="goWhatsApp($event)">Ver precios</button>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </form>
                                   </div>
                                   <div class="infoSumilla">
                                         <p>*Valido solo para uso particular</p>
                                   </div>
                              </div>
                              <div class="d-flex justify-content-center align-items-center flex-column">
                                   <div class="ContentAccordion">
                                        <div class="infoSeguro">
                                             <div class="boxDescription">
                                                  <p class="txtCenter title">Mostrando precios para SOAT Moto: PLACA - MARCA</p>
                                             </div>
                                        </div>
                                        <div class="boxAccordion">
                                             <div class="accordion" id="accordionExample">
                                                  <div class="accordion-item">
                                                       <h2 class="accordion-header" id="headingOne">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                 <div class="d-flex justify-content-between align-items-center">
                                                                      <img src="/frontend/images/po2.png" alt="La Positiva" title="La Positiva" />
                                                                      <p>SOAT MOTO</p>
                                                                      <p>S/ 580.00 por año</p>
                                                                 </div>
                                                            </button>
                                                       </h2>
                                                       <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                 <div class="vineta">
                                                                      <p>
                                                                           Muerte hasta cuatro UIT
                                                                      </p>
                                                                      <p>
                                                                           Invalidez permanente c/u hasta cuatro UIT
                                                                      </p>
                                                                      <p>
                                                                           Incapacidad temporal c/u hasta una UIT
                                                                      </p>
                                                                      <p>
                                                                           Gastos médicos c/u hasta cinco UIT
                                                                      </p>
                                                                      <p>
                                                                           Gastos de sepelio c/u hasta una UIT
                                                                      </p>
                                                                 </div>
                                                                 <div class="d-flex justify-content-center align-items-center">
                                                                      <div class="boxButtonLink">
                                                                           <a :href="url" target="_blank">Lo quiero</a>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                                  <div class="accordion-item">
                                                       <h2 class="accordion-header" id="headingTwo">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                 <img src="/frontend/images/po3.png" alt="La Positiva" title="La Positiva" />
                                                                 <p>SOAT MOTO</p>
                                                                 <p>S/ 580.00 por año</p>
                                                            </div>
                                                            </button>
                                                       </h2>
                                                       <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                 <div class="vineta">
                                                                      <p>
                                                                           Muerte hasta cuatro UIT
                                                                      </p>
                                                                      <p>
                                                                           Invalidez permanente c/u hasta cuatro UIT
                                                                      </p>
                                                                      <p>
                                                                           Incapacidad temporal c/u hasta una UIT
                                                                      </p>
                                                                      <p>
                                                                           Gastos médicos c/u hasta cinco UIT
                                                                      </p>
                                                                      <p>
                                                                           Gastos de sepelio c/u hasta una UIT
                                                                      </p>
                                                                 </div>
                                                                 <div class="d-flex justify-content-center align-items-center">
                                                                      <div class="boxButtonLink">
                                                                           <a :href="urlRimac" target="_blank">Lo quiero</a>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                                  
                                             </div>
                                        </div>
                                   </div>
                                   <div class="boxSoatMoto">
                                        <p class="txtCenter">
                                             Con el respaldo de <br>comercializadora de seguros:
                                        </p>
                                        <div class="d-flex justify-content-center align-items-center">
                                             <img src="/frontend/images/soat2.png" alt="SoatMoto">
                                        </div>
                                   </div>
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
               url:"",
               urlRimac:"",
               form: {
                    placa: "",
                    marca: "",
               }
          }
     },
     methods: {
          goWhatsApp: function(event){
               event.preventDefault()
               $('.ContentAccordion').addClass('active')
               this.url = `https://api.whatsapp.com/send?phone=51987639405&text=Hola%20Moto%20Popular,%20te%20escribo%20desde%20la%20web.%20Estoy%20interesado%20en%20un%20SOAT%20para%20mi%20moto%20marca%20${this.form.marca}%20,%20con%20placa%20${this.form.placa},%20con%20Positiva%20Seguros%20a%20S/.%20580`
               this.urlRimac =  `https://api.whatsapp.com/send?phone=51987639405&text=Hola%20Moto%20Popular,%20te%20escribo%20desde%20la%20web.%20Estoy%20interesado%20en%20un%20SOAT%20para%20mi%20moto%20marca%20${this.form.marca}%20,%20con%20placa%20${this.form.placa},%20con%RIMAC%20a%20S/.%20580`
          }
     }
}
</script>