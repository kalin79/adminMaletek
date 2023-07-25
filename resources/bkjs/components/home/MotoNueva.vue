<template>
     <div class="boxMotoNueva">
          <div class="boxBackground relative">
               <div class="boxUserMoto">
                    <img src="/frontend/images/userMoto.png" alt="">
               </div>
               <div class="container-fluid">
                    <div class="boxContent">
                         <div class="row">
                              <div class="col-0 col-xl-1"></div>
                              <div class="col-12 col-xl-10">
                                   <div class="boxTitle">
                                        <h2 class="txtUpperCase">
                                             ELIGE TU MOTO  <br>
                                             Y CALCULA <br>
                                             LA CUOTA <br>
                                             PARA TENERLA. 
                                        </h2>
                                   </div>
                                   <div class="boxDescription mt-2">
                                        <p class="mb-2 col-6">
                                             Descubre y compara diferentes opciones de financiamiento para que puedas comprar una moto a tu medida.
                                        </p>
                                   </div>
                                   <div class="boxButton btnSmall sinborder mt-4">
                                        <button v-on:click="irCatalogo($event)">Simular mi crédito</button>
                                   </div>
                              </div>
                              <div class="col-0 col-xl-1"></div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</template>
<script>
export default {
     data: function () {
          return {
               
          }
     },
     methods: {
          irCatalogo: function(e){
               e.preventDefault()
               top.location.href = '/catalogo'
               
          }
     }
}
</script>