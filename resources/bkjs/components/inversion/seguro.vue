<template>
     <div>
          <section class="pageSoat">
               <div class="boxBackground">
                    <div class="container-fluid">
                         <div class="boxContent">
                              <div class="boxTitle pingMenu">
                                   <h1 class="txtCenter">
                                        <span>Elige tu</span> Seguro para motos
                                   </h1>
                              </div>
                              <div class="boxLogosSeguros">
                                   <div class="d-flex justify-content-center align-items-center">
                                        <img src="/frontend/images/logoseguros2.png" alt="La Positiva y Rimac">
                                   </div>
                              </div>
                              <div class="d-flex justify-content-center align-items-center flex-column">
                                   <div class="boxFormSeguros">
                                        <form>
                                             <div class="row">
                                                  <div class="col-12 mbRow2">
                                                       <label for="marca">MARCA</label>
                                                       <input type="text" name="marca" id="marca" class="inputForm1" v-model="form.marca" placeholder="Ingresa la marca de tu moto">
                                                  </div>
                                                  <div class="col-12 mbRow">
                                                       <label for="placa">AÑO DE FABRICACIÓN:</label>
                                                       <input type="text" name="anno" id="anno" class="inputForm1" v-model="form.anno" placeholder="Ingresa año de fabricación">
                                                  </div>

                                                  <div class="col-12 mbRow">
                                                       <label for="placa">¿CUÁNTO VALE TU MOTO?</label>
                                                       <input type="text" name="monto" id="monto" class="inputForm1" v-model="form.monto" placeholder="Ingresa el monto">
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
                                                                      <p>SEGURO MOTO</p>
                                                                      <p>USD 200 por año</p>
                                                                 </div>
                                                            </button>
                                                       </h2>
                                                       <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                 <p>
                                                                      Financiamiento: <br>
                                                                      4 cupones de USD 50
                                                                 </p>
                                                                 <div class="vineta">
                                                                      <p>
                                                                           Pérdida parcial por daños materiales, robo, hurto o uso no autorizado hasta USD 2500
                                                                      </p>
                                                                      <p>
                                                                           Pérdida total por daños materiales, robo, hurto o uso no autorizado hasta USD 2500
                                                                      </p>
                                                                      <p>
                                                                           Responsabilidad civil frente a terceros hasta USD 75,000
                                                                      </p>
                                                                      <p>
                                                                           Muerte e invalidez permanente - por ocupante ( máximo 1), hasta USD 7,000
                                                                      </p>
                                                                      <p>
                                                                           Gastos de Curación - por ocupante (máximo 1), hasta USD 2,000
                                                                      </p>
                                                                      <p>
                                                                           Gastos de Sepelio - por ocupante (máximo 1), hasta USD 1,000
                                                                      </p>
                                                                      <p>
                                                                           Defensa judicial hasta USD 500
                                                                      </p>
                                                                      <p>
                                                                           Asistencia en Viaje y/o Auxilio Mecánico hasta USD 500
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
                                                                 <img src="/frontend/images/otro.png" alt="La Positiva" title="La Positiva" />
                                                                 <p>SEGURO MOTO</p>
                                                                 <p>USD 200 por año</p>
                                                            </div>
                                                            </button>
                                                       </h2>
                                                       <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                 <p>
                                                                      Financiamiento: <br>
                                                                      4 cupones de USD 50
                                                                 </p>
                                                                 <div class="vineta">
                                                                      <p>
                                                                           Pérdida parcial por daños materiales, robo, hurto o uso no autorizado hasta USD 2500
                                                                      </p>
                                                                      <p>
                                                                           Pérdida total por daños materiales, robo, hurto o uso no autorizado hasta USD 2500
                                                                      </p>
                                                                      <p>
                                                                           Responsabilidad civil frente a terceros hasta USD 75,000
                                                                      </p>
                                                                      <p>
                                                                           Muerte e invalidez permanente - por ocupante ( máximo 1), hasta USD 7,000
                                                                      </p>
                                                                      <p>
                                                                           Gastos de Curación - por ocupante (máximo 1), hasta USD 2,000
                                                                      </p>
                                                                      <p>
                                                                           Gastos de Sepelio - por ocupante (máximo 1), hasta USD 1,000
                                                                      </p>
                                                                      <p>
                                                                           Defensa judicial hasta USD 500
                                                                      </p>
                                                                      <p>
                                                                           Asistencia en Viaje y/o Auxilio Mecánico hasta USD 500
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
                    anno: "",
                    monto: "",
               }
          }
     },
     methods: {
          goWhatsApp: function(event){
               let espacio = "%20"
               event.preventDefault()
               $('.ContentAccordion').addClass('active')
               this.url = `https://api.whatsapp.com/send?phone=51987639405&text=Hola${espacio}Moto${espacio}Popular,${espacio}te${espacio}escribo${espacio}desde${espacio}la${espacio}web.${espacio}Estoy${espacio}interesado${espacio}en${espacio}un${espacio}Seguro${espacio}para${espacio}mi${espacio}moto${espacio}marca${espacio}${this.form.marca}${espacio},${espacio}con${espacio}placa${espacio}${this.form.placa},${espacio}de${espacio}año${espacio}${this.form.anno}${espacio}y${espacio}de${espacio}monto${espacio}${this.form.monto}${espacio}con${espacio}un${espacio}seguro${espacio}de${espacio}la${espacio}POSITIVA${espacio}de${espacio}USD${espacio}200${espacio}por${espacio}año`
               this.urlRimac = `https://api.whatsapp.com/send?phone=51987639405&text=Hola${espacio}Moto${espacio}Popular,${espacio}te${espacio}escribo${espacio}desde${espacio}la${espacio}web.${espacio}Estoy${espacio}interesado${espacio}en${espacio}un${espacio}Seguro${espacio}para${espacio}mi${espacio}moto${espacio}marca${espacio}${this.form.marca}${espacio},${espacio}con${espacio}placa${espacio}${this.form.placa},${espacio}de${espacio}año${espacio}${this.form.anno}${espacio}y${espacio}de${espacio}monto${espacio}${this.form.monto}${espacio}con${espacio}OTRO${espacio}seguro ${espacio}de${espacio}USD${espacio}200${espacio}por${espacio}año`
          }
     }
}
</script>