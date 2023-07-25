<template>
     <div>
         <div class="boxSearchHome relative" id="homeSearch">
               <!-- <div class="boxIso">
                    <a href="javascript:void(0)">
                         <img src="/frontend/images/iso.svg" alt="">
                    </a>
               </div> -->
               <div class="boxScrollDown">
                    <a href="javascript:void(0)">
                         <img src="/frontend/images/arrow.svg" alt="">
                    </a>
               </div>
               <div class="boxBackground d-flex justify-content-center flex-column align-items-center">
                    <div>
                         <div class="boxTitle ">
                              <h1 class="txtUpperCase txtCenter">
                                        BUSCA TU <br>
                                        SIGUIENTE MOTO
                                   </h1>
                         </div>
                         <div class="boxSubTitle pingMenu">
                              <h2 class="txtCenter d-none d-md-block">Encuentra la moto y el financiamiento que quieras</h2>
                              <!-- <h2 class="txtCenter d-block d-md-none">Informate, cómprala <br>o finánciala aquí.</h2> -->
                         </div>
                         <form>
                              <!-- <div class="row">
                                   <div class="col-12">
                                        <div class="boxDescription">
                                             <p class="txtCenter">
                                                       Si tienes una moto en mente, marca o <br>
                                                       un presupuesto búscala aquí:
                                                  </p>
                                        </div>
                                   </div>
                              </div> -->
                              <div class="row mt-2">
                                   <div class="col-12">
                                        <a href="javascript:void(0)" v-on:click="openSearch()" class="boxSearchInput ">
                                             <div class="InputText">
                                                  <p>Escribe modelo, marca o tipo de moto...</p>
                                             </div>
                                             <div class="svgIcon">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                       <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                  </svg>
                                             </div>
                                        </a>
                                   </div>
                              </div>
                              <div class="row mt-4">
                                   <div class="col-12">
                                        <div class="boxLinea d-flex justify-content-center align-items-center">
                                             <div class="linea" v-for="n in countLineas" v-bind:key="n"></div>
                                        </div>
                                   </div>
                              </div>
                              <div class="row">
                                   <div class="col-12 d-flex justify-content-center align-items-center">
                                        <div class="boxButton">
                                             <button v-on:click="irCatalogo($event)">Ver todo el Catálogo</button>
                                        </div>
                                   </div>
                              </div>
                              <div class="row mt-3">
                                   <div class="col-12">
                                        <div class="boxLink txtCenter">
                                             <a href="/catalogo" class="">
                                                  Financia tu nueva moto
                                             </a>
                                        </div>
                                   </div>
                              </div>
                         </form>
                    </div>
               </div>
          </div> 
     </div>
</template>
<script>
export default {
     data: function () {
          return {
               countLineas: 70
          }
     },
     methods: {
          openSearch: function(){
               $(".boxContentLight").addClass('active')
          },
          irCatalogo: function(e){
               e.preventDefault()
               top.location.href = '/catalogo'
               
          },
     
     }
}
</script>