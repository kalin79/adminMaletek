<template>
     <div>
          <section class="BannerMain relative">
               <div class="boxIso">
                    <img src="/frontend/images/fondo_iso.png" alt="ISO">
               </div>
               <div class="boxFullBanner">
                    <picture>
                         <source
                              srcset="/frontend/images/bannerBajaj.png"
                              media="(min-width:992px)" 
                         >
                         <img src="/frontend/images/bannerBajaj.png" alt="Bajaj">
                    </picture>
               </div>
               <div class="container-fluid">
                    <div class="boxContent">
                         <div class="row">
                              <div class="col-0 col-xl-1"></div>
                              <div class="col-12 col-xl-10">
                                   <div class="d-flex justify-content-between align-items-center">
                                        <div class="boxTitle ">
                                             <h3>motos</h3>
                                             <h1>{{ dataMarca.nombre }}</h1>
                                        </div>
                                        <div class="boxLogo">
                                             <img :src="dataMarca.logo_detalle" :alt="dataMarca.nombre" :title="dataMarca.nombre" />
                                        </div>
                                   </div>
                                   <div class="row mt-3">
                                        <div class="col-12 col-md-6">
                                             <div class="boxDescription pingMenu ">
                                                  <p v-html="dataMarca.descripcion"></p>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="boxGalley">
                                        <div class="boxTitle">
                                             <h2>LAS MÁS <br><span class="colorYellow">VISTAS</span></h2>
                                        </div>
                                        <div class="owl-carousel owl-carouselMotosBanner owl-theme">
                                             <a :href="'/producto/'+productoVisto.slug" class="item" v-for="(productoVisto, index) in dataMarca.productos_mas_vistos" :key="index">
                                                  <div class="boxImage d-flex justify-content-center flex-column align-items-center">
                                                       <img :src="productoVisto.image" :alt="productoVisto.title" :title="productoVisto.title">
                                                  </div>
                                                  <div class="boxInfo">
                                                       <h3>{{ productoVisto.marca }}</h3>
                                                       <h4>{{ titleProduct(productoVisto.title) }}</h4>
                                                       <h5>Precio: {{ formatPrice(productoVisto.precio) }}</h5>
                                                  </div>
                                             </a>
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
     props: ['dataMarca'],
     mounted: function() {
          let _this = this
          setTimeout(function() {
               _this.activarCarouselMotos()
          }, 3000)
     },
     methods: {
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
          titleProduct: function(value){
               let _title = value.replace("<br>", " ");
               return _title
          },
          activarCarouselMotos: function () {
               $('.owl-carouselMotosBanner').owlCarousel({
                    loop: false,
                    margin: 0,
                    responsiveClass: true,
                    autoplay: true,
                    autoplayTimeout: 8000,
                    autoplayHoverPause: true,
                    center: true,
                    responsive:{
                         0:{
                              items: 1,
                              dots: true,
                              nav: true
                         },
                         992:{
                              items: 3,
                              nav: true
                         } 
                    }
               })
          }
     }
}
</script>