<template>
     <div>
          <div class="bannerCategoria">
               <div class="owl-carousel owl-carouselBannerCategoria owl-theme">
                    <div class="item" v-for="(banner, index) in category" :key="index">
                         <div class="imageFullScreem">
                              <picture>
                                   <source media="(min-width: 992px)" :srcset="`/frontend/images/bannerCat1.png`">
                                   <img :src="`/frontend/images/bannerCat1Movil.png`" :alt="`SDSDDS`">
                              </picture>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</template>
<script>
import { mapActions, mapState, mapGetters, mapMutations } from 'vuex'

export default {
     props: ['category'],
     computed: {

     },
     mounted: function() {
          this.activeCarouselBannerHome()
     },
     methods: {
          activeCarouselBannerHome: function () {
               $('.owl-carouselBannerCategoria').owlCarousel({
                    loop: false,
                    margin: 0,
                    responsiveClass: true,
                    autoplay: false,
                    autoplayTimeout: 118000,
                    navigation : true,
                    autoplayHoverPause: true,
                    dots: false,
                    nav: false,
                    responsive:{
                         0:{
                              items: 1,
                         }
                    }
               })
          }
     }
}
</script>
