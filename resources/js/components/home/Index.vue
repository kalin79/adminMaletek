<template>
     <div>
          <div class="sliderContainer" v-if="listslider.length > 0">
               <div class="">
                    <div class="slide" v-for="(item, index) in listslider" :key="index">
                         <div class="bcg">
                              <img src="/frontend/images/fondo.jpg" alt="fondo"  />
                         </div>
                         <div class="slideContent">
                              <div class="container">
                                   <div class="contentGrid">
                                        <div>
                                             <div class="boxLogo" v-if="(item.imagemobile != '') && (item.imagemobile != NULL)">
                                                  <img :src="item.imagemobile" :alt="item.title" />
                                             </div>
                                             <h2>
                                                  {{ item.title }}
                                             </h2>
                                             <p>
                                                  {{ item.descripcion }}
                                             </p>
                                             <button v-on:click="irSitio(item.link)">VER PRODUCTOS</button>
                                        </div>
                                        <div>
                                             <img :src="item.image" :alt="item.title" />
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               
               </div>
          </div>
          <!-- <home-banner :list_slider="listslider"></home-banner> -->
          <!-- <home-promocion></home-promocion>
          <home-ingresados :productosRecientes="productosRecientes"></home-ingresados>
          <home-linea :rubros="rubros"></home-linea>
          <home-publicidad></home-publicidad>
          <home-blog></home-blog>
          <home-somos></home-somos> -->
          
     </div>
</template>
<script>
// import { mapActions, mapState, mapGetters, mapMutations } from 'vuex'
export default {
     props: ['slug'],
     name: 'PageHome',
     data(){
          return {
               rubros: [],
               listslider: [],
               productosRecientes: [],
          }
     },
     created(){
          // this.dameTodasCategorias()
     },
     mounted(){
          this.loadApis()
          const _this = this
          setTimeout(() => {
               _this.activeCarouselBannerHome()
          }, 1000);
     },
     methods: {
          activeCarouselBannerHome: function () {
               $('.owl-carouselBannerHome').owlCarousel({
                    loop: false,
                    margin: 0,
                    responsiveClass: true,
                    autoplay: false,
                    autoplayTimeout: 5000,
                    navigation : true,
                    autoplayHoverPause: true,
                    dots: true,
                    nav: true,
                    responsive:{
                         0:{
                              items: 1,
                              nav: false,
                         },
                         992:{
                              items: 1,
                              nav: true,
                         }
                    }
               })
          },
          loadApis: async function(){
               // Traemos las consultas de API 
               
               try{
                    let sendSolicitudAPI = await axios.get(`/api/v1/home`)
                    console.log(sendSolicitudAPI.data.code)
                    // console.log(sendSolicitudAPI.data.data.slider)
                    if (sendSolicitudAPI.data.code === 200){
                         this.listslider = sendSolicitudAPI.data.data.slider
                         this.productosRecientes = sendSolicitudAPI.data.data.recently_entered_products
                    }
               }catch(error){
                    console.log(error)
               }finally{

               }

               // Traemos los rubros
               try{
                    let sendSolicitud = await axios.get(`/data/rubros.json`)
                    // console.log(sendSolicitud.data)
                    // console.log(sendSolicitud)
                    if (sendSolicitud.status === 200){
                         this.rubros = sendSolicitud.data
                    }
               }catch(error){
                    console.log(error)
               }finally{

               }
          },
     }
}
</script>