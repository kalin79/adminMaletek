<template>
     <div>
          <section class="pageProductoCaracteristicas">
               <div class="container-fluid">
                    <div class="boxContent">
                         <div class="row">
                              <div class="col-0 col-xl-1"></div>
                              <div class="col-12 col-xl-10">
                                   <div class="boxSubTitle2 relative">
                                        <h2 class="colorYellow">Características</h2>
                                        <h3>principales</h3>
                                   </div>
                                   <div class="d-flex justify-content-center align-items-start">
                                        <div class="boxListCaracteristicas">
                                             <div class="d-flex justify-content-center align-items-start">
                                                  <div class="ListMain">
                                                       <div class="listHeader">
                                                            <div class="d-flex justify-content-center align-items-center flex-column">
                                                                 <div class="boxImage mb-1 w150">
                                                                      <img v-if="dataProduct.posicion_manejo === 'RECTO' " src="/frontend/images/carac2/B_posicionDeManejo_Recto.svg" :alt="dataProduct.posicion_manejo">
                                                                      <img v-if="dataProduct.posicion_manejo === 'RECOSTADO' " src="/frontend/images/carac2/A_posicionDeManejo_Reclinada.svg" :alt="dataProduct.posicion_manejo">
                                                                      <img v-if="dataProduct.posicion_manejo === 'INCLINADO' " src="/frontend/images/carac2/C_posicionDeManejo_Inclinada.svg" :alt="dataProduct.posicion_manejo">
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="listBody">
                                                            <div class="d-flex justify-content-center align-items-start">
                                                                 <div class="d-flex justify-content-center align-items-center flex-column">
                                                                      <div class="detailCara">
                                                                           <div class="boxImage">
                                                                                <img src="/frontend/images/carac2/11_Neumatico_Trasero.svg" alt="Neumatico Trasero">
                                                                           </div>
                                                                           <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                                <div class="boxValor small">{{ dataProduct.neumatico_trasero }}</div>
                                                                                <div class="boxUnidad nml"></div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="d-flex justify-content-center align-items-center flex-column">
                                                                      <div class="detailCara">
                                                                           <div class="boxImage">
                                                                                <img src="/frontend/images/carac2/10_Neumatico_Delantero.svg" alt="Neumatico Delantero">
                                                                           </div>
                                                                           <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                                <div class="boxValor small">{{ dataProduct.neumatico_delantero }}</div>
                                                                                <div class="boxUnidad nml"></div>
                                                                           </div>
                                                                      </div>
                                                                      
                                                                 </div>
                                                                 <div class="d-flex justify-content-center align-items-center flex-column">
                                                                      <div class="detailCara">
                                                                           <div class="boxImage">
                                                                                <img src="/frontend/images/carac2/01_potencia.svg" alt="pontencia">
                                                                           </div>
                                                                           <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                                <div class="boxValor">{{ dataProduct.potencia }}</div>
                                                                                <div class="boxUnidad">hp</div>
                                                                           </div>
                                                                           
                                                                      </div>
                                                                      
                                                                 </div>
                                                            </div>
                                                            <div class="d-flex justify-content-center align-items-start">
                                                                 <div class="d-flex justify-content-center align-items-center flex-column">
                                                                      <div class="detailCara">
                                                                           <div class="boxImage">
                                                                                <img src="/frontend/images/carac2/08_FrenoTrasero_TamborDeZapatas.svg" alt="Freno Trasero Tambor De Zapatas">
                                                                           </div>
                                                                           <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                                <div class="boxValor"></div>
                                                                                <div class="boxUnidad nml">{{ dataProduct.freno_trasero }}</div>
                                                                                <!-- <div class="boxUnidad">mm</div> -->
                                                                           </div>
                                                                      </div>
                                                                      
                                                                 </div>
                                                                 <div class="d-flex justify-content-center align-items-center flex-column">
                                                                      <div class="detailCara">
                                                                           <div class="boxImage">
                                                                                <img src="/frontend/images/carac2/07_FrenoDelantero_DiscoVentilado.svg" alt="FrenoDelantero DiscoVentilado">
                                                                           </div>
                                                                           <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                                <div class="boxValor"></div>
                                                                                <div class="boxUnidad nml">{{ dataProduct.freno_delantero_disco_ventilado }}</div>
                                                                                <!-- <div class="boxUnidad">mm</div> -->
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="d-flex justify-content-center align-items-center flex-column">
                                                                      <div class="detailCara">
                                                                           <div class="boxImage">
                                                                                <img src="/frontend/images/carac2/09_Sistema_ABS.svg" alt="Sistema ABS">
                                                                           </div>
                                                                           <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                                <div class="boxValor"></div>
                                                                                <div class="boxUnidad nml">{{ dataProduct.sistema_abs }}</div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                                  <div class="ListMain">
                                                       <div class="listHeader">
                                                            <div class="d-flex justify-content-center align-items-center flex-column fullHeight">
                                                                 <div class="d-flex justify-content-center align-items-start">
                                                                      <div class="boxImage mb-1 w100">
                                                                           <img src="/frontend/images/carac2/00_Cilindrada.svg" alt="Cilindrada">
                                                                      </div>
                                                                      <div class="boxInfoCilin d-flex justify-content-center align-items-center">
                                                                           <div>
                                                                                <h3>&nbsp;</h3>
                                                                                <h4>{{ formatoEntero(dataProduct.cilindrada) }}</h4>
                                                                           </div>
                                                                           <div><span>cc</span></div>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="listBody">
                                                            <div class="d-flex justify-content-center align-items-start">
                                                                 <div class="d-flex justify-content-center align-items-center flex-column">
                                                                      <div class="detailCara">
                                                                           <div class="boxImage">
                                                                                <img src="/frontend/images/carac2/02_Velocidad_Maxima.svg" alt="Velocidad Maxima">
                                                                           </div>
                                                                           <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                                <div class="boxValor">{{ formatoEntero(dataProduct.velocidad_maxima) }}</div>
                                                                                <div class="boxUnidad">km/h</div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="d-flex justify-content-center align-items-center flex-column">
                                                                      <div class="detailCara">
                                                                           <div class="boxImage">
                                                                                <img src="/frontend/images/carac2/05_Rendimiento_Por_Galon.svg" alt="Rendimiento Por Galon">
                                                                           </div>
                                                                           <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                                <div class="boxValor">{{ formatoEntero(dataProduct.rendimiento_por_galon) }}</div>
                                                                                <div class="boxUnidad">km</div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="d-flex justify-content-center align-items-center flex-column">
                                                                      <div class="detailCara">
                                                                           <div class="boxImage">
                                                                                <img src="/frontend/images/carac2/03_Transmision.svg" alt="Transmision">
                                                                           </div>
                                                                           <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                                <div class="boxValor"></div>
                                                                                <div class="boxUnidad nml">{{ dataProduct.transmision }}</div>
                                                                           </div>
                                                                      </div>
                                                                      
                                                                 </div>
                                                            </div>
                                                            <div class="d-flex justify-content-center align-items-start">
                                                                 <div class="d-flex justify-content-center align-items-center flex-column">
                                                                      <div class="detailCara">
                                                                           <div class="boxImage">
                                                                                <img src="/frontend/images/carac2/04_Cambios.svg" alt="Cambios">
                                                                           </div>
                                                                           <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                                <div class="boxValor">{{ dataProduct.numero_cambios }}</div>
                                                                                <div class="boxUnidad nml"></div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="d-flex justify-content-center align-items-center flex-column">
                                                                      <div class="detailCara">
                                                                           <div class="boxImage">
                                                                                <img src="/frontend/images/carac2/06_Sistema_De_Combustible.svg" alt="Sistema De Combustible">
                                                                           </div>
                                                                           <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                                <div class="boxValor"></div>
                                                                                <div class="boxUnidad nml">{{ dataProduct.sistema_combustible }}</div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="d-flex justify-content-center align-items-center flex-column">
                                                                      <div class="detailCara">
                                                                           <div class="boxImage">
                                                                                <img src="/frontend/images/carac2/12_Peso.svg" alt="Peso">
                                                                           </div>
                                                                           <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                                <div class="boxValor">{{ formatoEntero(dataProduct.peso) }}</div>
                                                                                <div class="boxUnidad">kg</div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>

                                        <div class="boxListCaracteristicasMovil">
                                             <div class="boxTableHeader">
                                                  <div class="d-flex justify-content-center align-items-center flex-column">
                                                       <div class="boxImage w200">
                                                            <img v-if="dataProduct.posicion_manejo === 'RECTO' " src="/frontend/images/carac2/B_posicionDeManejo_Recto.svg" :alt="dataProduct.posicion_manejo">
                                                            <img v-if="dataProduct.posicion_manejo === 'RECOSTADO' " src="/frontend/images/carac2/A_posicionDeManejo_Reclinada.svg" :alt="dataProduct.posicion_manejo">
                                                            <img v-if="dataProduct.posicion_manejo === 'INCLINADO' " src="/frontend/images/carac2/C_posicionDeManejo_Inclinada.svg" :alt="dataProduct.posicion_manejo">
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="boxTableHeader">
                                                  <div class="d-flex justify-content-center align-items-center flex-column">
                                                       <div class="d-flex justify-content-center align-items-start mt-2">
                                                            <div class="boxImage mb-1 w100">
                                                                 <img src="/frontend/images/carac2/00_Cilindrada.svg" alt="Cilindrada">
                                                            </div>
                                                            <div class="boxInfoCilin d-flex justify-content-center align-items-center">
                                                                 <div>
                                                                      <h3>&nbsp;</h3>
                                                                      <h4>{{ formatoEntero(dataProduct.cilindrada) }}</h4>
                                                                 </div>
                                                                 <div><span>cc</span></div>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="boxTableBody">
                                                  <div class="row">
                                                       <div class="col-6">
                                                            <div class="detailCara">
                                                                 <div class="boxImage">
                                                                      <img src="/frontend/images/carac2/02_Velocidad_Maxima.svg" alt="Velocidad Maxima">
                                                                 </div>
                                                                 <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                      <div class="boxValor">{{ formatoEntero(dataProduct.velocidad_maxima) }}</div>
                                                                      <div class="boxUnidad">km/h</div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="col-6">
                                                            <div class="detailCara">
                                                                 <div class="boxImage">
                                                                      <img src="/frontend/images/carac2/05_Rendimiento_Por_Galon.svg" alt="Rendimiento Por Galon">
                                                                 </div>
                                                                 <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                      <div class="boxValor">{{ formatoEntero(dataProduct.rendimiento_por_galon) }}</div>
                                                                      <div class="boxUnidad">km</div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="col-6">
                                                            <div class="detailCara">
                                                                 <div class="boxImage">
                                                                      <img src="/frontend/images/carac2/04_Cambios.svg" alt="Cambios">
                                                                 </div>
                                                                 <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                      <div class="boxValor">{{ dataProduct.numero_cambios }}</div>
                                                                      <div class="boxUnidad nml"></div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="col-6">
                                                            <div class="detailCara">
                                                                 <div class="boxImage">
                                                                      <img src="/frontend/images/carac2/01_potencia.svg" alt="Pontencia">
                                                                 </div>
                                                                 <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                      <div class="boxValor">{{ dataProduct.potencia }}</div>
                                                                      <div class="boxUnidad">hp</div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="col-6">
                                                            <div class="detailCara">
                                                                 <div class="boxImage">
                                                                      <img src="/frontend/images/carac2/03_Transmision.svg" alt="Transmision">
                                                                 </div>
                                                                 <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                      <div class="boxValor"></div>
                                                                      <div class="boxUnidad nml">{{ dataProduct.transmision }}</div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="col-6">
                                                            <div class="detailCara">
                                                                 <div class="boxImage">
                                                                      <img src="/frontend/images/carac2/06_Sistema_De_Combustible.svg" alt="Sistema De Combustible">
                                                                 </div>
                                                                 <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                      <div class="boxValor"></div>
                                                                      <div class="boxUnidad nml">{{ dataProduct.sistema_combustible }}</div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="col-6">
                                                            <div class="detailCara">
                                                                 <div class="boxImage">
                                                                      <img src="/frontend/images/carac2/11_Neumatico_Trasero.svg" alt="Neumatico Trasero">
                                                                 </div>
                                                                 <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                      <div class="boxValor small">{{ dataProduct.neumatico_trasero }}</div>
                                                                      <div class="boxUnidad nml"></div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="col-6">
                                                            <div class="detailCara">
                                                                 <div class="boxImage">
                                                                      <img src="/frontend/images/carac2/10_Neumatico_Delantero.svg" alt="Neumatico Delantero">
                                                                 </div>
                                                                 <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                      <div class="boxValor small">{{ dataProduct.neumatico_delantero }}</div>
                                                                      <div class="boxUnidad nml"></div>
                                                                 </div>
                                                            </div>
                                                            
                                                       </div>
                                                       <div class="col-6">
                                                            <div class="detailCara">
                                                                 <div class="boxImage">
                                                                      <img src="/frontend/images/carac2/08_FrenoTrasero_TamborDeZapatas.svg" alt="Freno Trasero Tambor De Zapatas">
                                                                 </div>
                                                                 <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                      <div class="boxValor"></div>
                                                                      <div class="boxUnidad nml">{{ dataProduct.freno_trasero }}</div>
                                                                      <!-- <div class="boxUnidad">mm</div> -->
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="col-6">
                                                            <div class="detailCara">
                                                                 <div class="boxImage">
                                                                      <img src="/frontend/images/carac2/07_FrenoDelantero_DiscoVentilado.svg" alt="FrenoDelantero DiscoVentilado">
                                                                 </div>
                                                                 <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                      <div class="boxValor"></div>
                                                                      <div class="boxUnidad nml">{{ dataProduct.freno_delantero_disco_ventilado }}</div>
                                                                      <!-- <div class="boxUnidad">mm</div> -->
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="col-6">
                                                            <div class="detailCara">
                                                                 <div class="boxImage">
                                                                      <img src="/frontend/images/carac2/12_Peso.svg" alt="Peso">
                                                                 </div>
                                                                 <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                      <div class="boxValor ">{{ formatoEntero(dataProduct.peso) }}</div>
                                                                      <div class="boxUnidad ">kg</div>
                                                                 </div>
                                                            </div>
                                                            
                                                       </div>
                                                       <div class="col-6">
                                                            <div class="detailCara">
                                                                 <div class="boxImage">
                                                                      <img src="/frontend/images/carac2/09_Sistema_ABS.svg" alt="Sistema ABS">
                                                                 </div>
                                                                 <div class="boxMedida d-flex justify-content-center align-items-center">
                                                                      <div class="boxValor"></div>
                                                                      <div class="boxUnidad nml">{{ dataProduct.sistema_abs }}</div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        
                                   </div>
                                   <div class="d-flex justify-content-center align-items-start ">
                                        <div class="boxButtonLink wsmall">
                                             <a :href="dataProduct.ficha_tecnica" target="_blank" class="d-flex justify-content-center align-items-center flex-column">Descargar ficha</a>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-0 col-xl-1"></div>
                         </div>
                    </div>
               </div>
          </section>
     </div>
</template>
<script>
     export default {
          props: ['dataProduct'],
          data() {
               return {
                   
               }
          },
          mounted() {
               
          },
          methods: {
               formatoEntero: function(value){
                    return Math.trunc(value)
               }
          }
     }
</script>