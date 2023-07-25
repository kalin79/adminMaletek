<template>
     <div>
          <div class="boxPageNosotros" v-bind:style="{ background: bgcolor }">
               <div class="container-fluid">
                    <div class="boxContent">
                         <div class="row">
                              <div class="col-0 col-md-0 col-xl-1"></div>
                              <div class="col-12 col-md-2 col-xl-2">
                                   <div class="boxTitle mb-4 mb-md-0 relative">
                                        <h2>
                                             Acerca <br>
                                             de <span class="colorYellow">la <br>
                                             MArca</span>
                                        </h2>
                                   </div>
                              </div>
                              <div class="col-12 col-md-4 col-xl-3">
                                   <div class="boxDescription">
                                        <p v-html="dataMarca.descripcion_historia_1"></p>
                                   </div>
                              </div>
                              <div class="col-12 col-md-4 col-xl-3">
                                   <div class="boxDescription">
                                        <p v-html="dataMarca.descripcion_historia_2"></p>
                                   </div>
                              </div>
                              <div class="col-12 col-md-2 col-xl-2 mt-4 mb-mt-0">
                                   <div class="fullHeight d-flex justify-content-center align-items-center flex-column">
                                        <div class="boxImage">
                                             <img :src="dataMarca.logo_detalle" :alt="dataMarca.nombre" :title="dataMarca.nombre">
                                        </div>
                                   </div>
                                   
                              </div>
                              <div class="col-0 col-md-0 col-xl-1"></div>
                         </div>
                         <div class="row mt-4">
                              <div class="col-0 col-md-3"></div>
                              <div class="col-12 col-md-6">
                                   <div class="d-flex justify-content-between align-items-start flex-wrap">
                                        <div class="boxInfo">
                                             <p class="txtCenter">REPRESENTANTE</p>
                                             <div class="boxImage mt-2 mb-2">
                                                  <img :src="dataMarca.origen_pais_logo" :alt="dataMarca.origen_pais" :title="dataMarca.origen_pais">
                                             </div>
                                             <p class="txtCenter">{{ dataMarca.origen_pais }}</p>
                                        </div>
                                        <div class="boxInfo">
                                             <p class="txtCenter">AÑOS EN EL MERCADO <br>MUNDIAL</p>
                                             <p class="txtCenter txtNumber">{{ dataMarca.anios_en_mercado_mundial }}</p>
                                        </div>
                                        <div class="boxInfo">
                                             <p class="txtCenter">AÑOS EN EL MERCADO <br>Peruano</p>
                                             <p class="txtCenter txtNumber">{{ dataMarca.anios_en_mercado_peru }}</p>
                                        </div>
                                        <div class="boxInfo">
                                             <p class="txtCenter">talleres oficiales <br>&nbsp;</p>
                                             <p class="txtCenter txtNumber">{{ dataMarca.tallares_oficiales }}</p>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-12 col-md-3"></div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</template>
<script>
export default {
     props: ['dataMarca','bgcolor'],
     data() {
          return {

          }
     }
}
</script>