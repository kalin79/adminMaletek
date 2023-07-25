<template>
     <div>
         <div class="boxMoreSearch relative">
               <!-- <div class="boxBackgroundIso">
                   <img src="/frontend/images/fondo_iso.png" alt="">
               </div> -->
               <div class="boxBackground">
                    <div class="container-fluid">
                         <div class="boxTriangle">
                              <div class="triangle"></div>
                         </div>
                         <div class="boxContent">
                              <div class="row">
                                   <div class="col-0 col-xl-1"></div>
                                   <div class="col-12 col-xl-10">
                                        <div class="boxTitle relative">
                                             <h2>
                                                  las <br>
                                                  populares <br>
                                                  del mes
                                             </h2>
                                             <!-- <h2 class="txtBorder flotante d-none d-md-block">fierros</h2> -->
                                        </div>
                                        <div class="boxSubTitle d-none d-md-block">
                                             <h3>Encontramos el mejor precio para ti.</h3>
                                        </div>
                                        <div class="boxGalley">
                                             <div class="owl-carousel owl-carouselMotos owl-theme">
                                                  <a class="item" :href="'/producto/'+product.slug" v-for="(product, index ) in productos_populares" :key="index">
                                                       <div class="boxImage d-flex justify-content-center flex-column align-items-center">
                                                            <img :src="product.image" :alt="product.title">
                                                       </div>
                                                       <div class="boxInfo">
                                                            <h3>{{ product.marca }}</h3>
                                                            <h4>{{ titleProduct(product.title) }}</h4>
                                                            <h5>Precio: {{ formatPrice(product.precio) }}</h5>
                                                       </div>
                                                  </a>
                                                  
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col-0 col-xl-1"></div>
                              </div>
                              
                         </div>
                         
                    </div>
               </div>
          </div> 
     </div>
</template>
<script>
import 'owl.carousel/dist/assets/owl.carousel.css'
import 'owl.carousel'
export default {
     props: ['productos_populares'],
     mounted: function() {
          let _this = this
          setTimeout(function() {
               _this.activarCarouselMotos()
          },3000)
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
          formatoPrecio: function(value){
               return Math.trunc(value)
          },
          titleProduct: function(value){
               let _title = value.replace("<br>", " ");
               return _title
          },
          activarCarouselMotos: function () {
               $('.owl-carouselMotos').owlCarousel({
                    loop: false,
                    margin: 0,
                    responsiveClass: true,
                    autoplay: true,
                    autoplayTimeout: 8000,
                    autoplayHoverPause: true,
                    center: true,
                    dots: true,
                    responsive:{
                         0:{
                              items: 1,
                              dots: true,
                              nav: true
                         },
                         992:{
                              items: 3,
                              nav: true,
                              dots: true,
                         } 
                    }
               })
          }
     }
}
</script>