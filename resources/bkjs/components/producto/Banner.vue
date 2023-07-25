<template>
     <div>
          <section class="BannerMain relative">
               <!-- <div class="boxLogoIso">
                    <img src="/frontend/images/iso.svg" alt="M">
               </div> -->
               <div class="boxIso">
                    <img src="/frontend/images/fondo_iso.png" alt="ISO">
               </div>
               <div class="boxFullBanner">
                    <picture>
                         <source
                              srcset="/frontend/images/producto.png"
                              media="(min-width:992px)" 
                         >
                         <img src="/frontend/images/producto.png" />
                    </picture>
               </div>
               <div class="container-fluid">
                    <div class="boxContent">
                         <div class="row">
                              <div class="col-0 col-xl-1"></div>
                              <div class="col-0 col-xl-10">
                                   <div class="row">
                                        <div class="col-12 col-md-7 col-xl-7">
                                             <div class="boxTitle">
                                                  <h3>{{ dataMarca.nombre }}</h3>
                                                  <h1 v-html="dataProduct.titulo"></h1>
                                             </div>
                                             <div class="boxViewProduct d-flex justify-content-start align-items-center">
                                                  <div class="boxImage">
                                                       <img :src="dataProduct.image" id="detailMotoPhoto" :alt="dataProduct.titulo" :title="dataProduct.titulo"/>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-12 col-md-5 col-xl-5 ">
                                             <div class="boxTitle mediun separate  d-none d-md-block">
                                                  <h3>{{ dataMarca.nombre }}</h3>
                                                  <h2 v-html="dataProduct.titulo"></h2>
                                             </div>
                                             <div class="boxDetailProduct mt-3 pingMenu">
                                                  <div class="boxSubTitle ">
                                                       <h3>{{ dataProduct.titulo_descripcion }}</h3>
                                                  </div>
                                                  <div class="boxDescription mt-2">
                                                       <p v-html="dataProduct.descripcion"></p>
                                                  </div>
                                                  <div class="boxDescription2 mt-3">
                                                       <p>PRECIO REFERENCIAL PARA LIMA</p>
                                                  </div>
                                                  <div class="boxPrecioProducto mt-3">
                                                       <p>{{ formatPrice(dataProduct.precio) }}</p>
                                                  </div>
                                                  <div class="d-flex justify-content-start align-items-center">
                                                       <div class="boxSelectorColors">
                                                            <div class="d-flex justify-content-start align-items-center">
                                                                 <a href="javascript:void(0)" v-for="(color, index) in dataProduct.colores" :key="index" :class=" color.image === dataProduct.image ? color.color_estilo + ' active'  : color.color_estilo " v-on:click="selectColor(color.id)" :id="'selectColor'+color.id" :data-src="color.image"></a>
                                                            </div>
                                                       </div>
                                                  </div>
                                                  <div class="mt-4 d-flex justify-content-start align-items-center">
                                                       <div class="boxButton wmediun" v-on:click="irQuieroMoto(slug)">
                                                            <button>Quiero la moto</button>
                                                       </div>
                                                       <div class="boxButton btnTransparen wmediun marginLeft-1">
                                                            <button v-on:click="irSimulador()">Simula tu crédito</button>
                                                       </div>
                                                  </div>
                                             </div>
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
     props: ['dataProduct','dataMarca', 'slug'],
     methods: {
          irSimulador: function(){
               gsap.to(window, {
                    scrollTo: {
                         y: $("#pageProductoSimulador"),
                         autoKill: false
                    },
                    duration: .5
               })
          },
          irQuieroMoto: function(url){
               top.location.href = `/quiero-la-moto/${url}`
          },
          formatoPrecio: function(value){
               return Math.trunc(value)
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
          selectColor: function(id){
               if ($(`#selectColor${id}`).hasClass('active') === false){
                    let src = $(`#selectColor${id}`).data("src")
                    console.log(src)
                    $('.boxSelectorColors a').removeClass('active')
                    $('#detailMotoPhoto').attr('src', src)
                    $(`#selectColor${id}`).addClass('active')
               }
          },
     }
}
</script>