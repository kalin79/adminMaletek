<template>
     <div>
          <div class="boxBrands relative">
               <div class="boxBackground">
                    <div class="bgColorGrayLight2 relative">
                         <div class="boxTriangle">
                              <div class="triangle"></div>
                         </div>
                         <div class="boxTrapecio">
                              <img src="/frontend/images/trapecio.png">
                         </div>
                         <div class="boxBackgroundMotoo"></div>
                         <div class="container-fluid">
                              <div class="boxContent">
                                   <div class="row">
                                        <div class="col-0 col-xl-1"></div>
                                        <div class="col-12 col-xl-10">
                                             <div class="boxTitle">
                                                  <h2 class="txtColorGray">
                                                       motos por <br>
                                                       marca
                                                  </h2>
                                                  <div class="boxDescription separation">
                                                       <p class="txtColorGray d-none d-md-block">
                                                            A nivel nacional representamos a la mejores marcas, <br>
                                                            solo para moteros con alma y estilo de competencia
                                                       </p>
                                                       <p class="txtColorGray d-block d-md-none mt-3">
                                                            A nivel nacional representamos a la mejores marcas,
                                                            solo para moteros con alma y estilo de competencia
                                                       </p>
                                                  </div>
                                             </div>
                                             <div class="boxLogos d-flex justify-content-between align-items-start flex-wrap">
                                                  <a :href="'/marca/'+marca.slug" v-for="(marca, index) in marcas" :key="index" class="d-flex justify-content-center align-items-center flex-column">
                                                       <img :src="marca.icon" :alt="marca.name" :title="marca.name" />
                                                  </a>
                                                  <!-- <a href="/marca/BAJAJ"  class="d-flex justify-content-center align-items-center flex-column">
                                                       <img src="/frontend/images/l2.png" alt="logo" title="logo" />
                                                  </a>
                                                  <a href="/marca/BAJAJ"  class="d-flex justify-content-center align-items-center flex-column">
                                                       <img src="/frontend/images/l3.png" alt="logo" title="logo" />
                                                  </a>
                                                  <a href="/marca/BAJAJ"  class="d-flex justify-content-center align-items-center flex-column">
                                                       <img src="/frontend/images/lronco.png" alt="logo" title="logo" />
                                                  </a>
                                                  <a href="/marca/BAJAJ"  class="d-flex justify-content-center align-items-center flex-column">
                                                       <img src="/frontend/images/l4.png" alt="logo" title="logo" />
                                                  </a>
                                                  <a href="/marca/BAJAJ"  class="d-flex justify-content-center align-items-center flex-column">
                                                       <img src="/frontend/images/l5.png" alt="logo" title="logo" />
                                                  </a>
                                                  <a href="/marca/BAJAJ"  class="d-flex justify-content-center align-items-center flex-column">
                                                       <img src="/frontend/images/l6.png" alt="logo" title="logo" />
                                                  </a>
                                                  <a href="/marca/BAJAJ"  class="d-flex justify-content-center align-items-center flex-column">
                                                       <img src="/frontend/images/l7.png" alt="logo" title="logo" />
                                                  </a>
                                                  <a href="/marca/BAJAJ"  class="d-flex justify-content-center align-items-center flex-column">
                                                       <img src="/frontend/images/l8.png" alt="logo" title="logo" />
                                                  </a>
                                                  <a href="/marca/BAJAJ"  class="d-flex justify-content-center align-items-center flex-column">
                                                       <img src="/frontend/images/l9.png" alt="logo" title="logo" />
                                                  </a>
                                                  <a href="/marca/BAJAJ"  class="d-flex justify-content-center align-items-center flex-column">
                                                       <img src="/frontend/images/l10.png" alt="logo" title="logo" />
                                                  </a>
                                                  <a href="/marca/BAJAJ"  class="d-flex justify-content-center align-items-center flex-column">
                                                       <img src="/frontend/images/l11.png" alt="logo" title="logo" />
                                                  </a>
                                                  <a href="/marca/BAJAJ"  class="d-flex justify-content-center align-items-center flex-column">
                                                       <img src="/frontend/images/l12.png" alt="logo" title="logo" />
                                                  </a>
                                                  <a href="/marca/BAJAJ"  class="d-flex justify-content-center align-items-center flex-column">
                                                       <img src="/frontend/images/l13.png" alt="logo" title="logo" />
                                                  </a>
                                                  <a href="/marca/BAJAJ"  class="d-flex justify-content-center align-items-center flex-column">
                                                       <img src="/frontend/images/l14.png" alt="logo" title="logo" />
                                                  </a>
                                                  <a href="/marca/BAJAJ"  class="d-flex justify-content-center align-items-center flex-column">
                                                       <img src="/frontend/images/l15.png" alt="logo" title="logo" />
                                                  </a>
                                                  <a href="/marca/BAJAJ"  class="d-flex justify-content-center align-items-center flex-column">
                                                       <img src="/frontend/images/l16.png" alt="logo" title="logo" />
                                                  </a>
                                                  <a href="/marca/BAJAJ"  class="d-flex justify-content-center align-items-center flex-column">
                                                       <img src="/frontend/images/l17.png" alt="logo" title="logo" />
                                                  </a>
                                                  <a href="/marca/BAJAJ"  class="d-flex justify-content-center align-items-center flex-column">
                                                       <img src="/frontend/images/l18.png" alt="logo" title="logo" />
                                                  </a>
                                                  <a href="/marca/BAJAJ"  class="d-flex justify-content-center align-items-center flex-column">
                                                       <img src="/frontend/images/l19.png" alt="logo" title="logo" />
                                                  </a>
                                                  <a href="/marca/BAJAJ"  class="d-flex justify-content-center align-items-center flex-column">
                                                       <img src="/frontend/images/l20.png" alt="logo" title="logo" />
                                                  </a>
                                                  <a href="/marca/BAJAJ"  class="d-flex justify-content-center align-items-center flex-column">
                                                       <img src="/frontend/images/l21.png" alt="logo" title="logo" />
                                                  </a> -->
                                                  
                                             </div>
                                        </div>
                                        <div class="col-0 col-xl-1"></div>
                                   </div>
                                   
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</template>
<script>
export default {
     props: ['marcas'],
     mounted: function() {
          
     },
     methods: {
          
     }
}
</script>