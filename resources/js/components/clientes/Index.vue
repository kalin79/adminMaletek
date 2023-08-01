<template>
    <div class="boxClientes">
        <h4>Clientes que confían en nosotros..11.</h4>
        <div class="boxLogos">
            <div class="sliderContainer">
                <div class="owl-carousel owl-theme owl-carouselBannerHomeLogos">
                    <a href="#" target="_blank">
                        <img src="/frontend/images/logos/01.png" alt="Real Plaza"  />
                    </a>
                    <a href="#" target="_blank" >
                        <img src="/frontend/images/logos/02.png" alt="Bembos" />
                    </a>
                    <a href="#" target="_blank">
                        <img src="/frontend/images/logos/03.png" alt="Cencosud"  />
                    </a>
                    <a href="#" target="_blank">
                        <img src="/frontend/images/logos/04.png" alt="Sodimac Home Center"  />
                    </a>
                    <a href="#" target="_blank">
                        <img src="/frontend/images/logos/05.png" alt="Super Mercados Peruanos SA"  />
                    </a>
                    <a href="#" target="_blank">
                        <img src="/frontend/images/logos/06.png" alt="Gloria"  />
                    </a>
                    <a href="#" target="_blank">
                        <img src="/frontend/images/logos/07.png" alt="Popeyes"  />
                    </a>
                    <a href="#" target="_blank">
                        <img src="/frontend/images/logos/08.png" alt="Mediterraneo" />
                    </a>
                    <a href="#" target="_blank">
                        <img src="/frontend/images/logos/09.png" alt="Mediterraneo" />
                    </a>
                    <a href="#" target="_blank">
                        <img src="/frontend/images/logos/10.png" alt="Mediterraneo" />
                    </a>

                    <a href="#" target="_blank">
                        <img src="/frontend/images/logos/11.png" alt="Real Plaza"  />
                    </a>
                    <a href="#" target="_blank" >
                        <img src="/frontend/images/logos/12.png" alt="Bembos" />
                    </a>
                    <a href="#" target="_blank">
                        <img src="/frontend/images/logos/13.png" alt="Cencosud"  />
                    </a>
                    <a href="#" target="_blank">
                        <img src="/frontend/images/logos/14.png" alt="Sodimac Home Center"  />
                    </a>
                    <a href="#" target="_blank">
                        <img src="/frontend/images/logos/15.png" alt="Super Mercados Peruanos SA"  />
                    </a>
                    <a href="#" target="_blank">
                        <img src="/frontend/images/logos/16.png" alt="Gloria"  />
                    </a>
                    <a href="#" target="_blank">
                        <img src="/frontend/images/logos/17.png" alt="Popeyes"  />
                    </a>
                    <!-- <a href="#" target="_blank">
                        <img src="/frontend/images/logos/18.png" alt="Mediterraneo" />
                    </a>
                    <a href="#" target="_blank">
                        <img src="/frontend/images/logos/19.png" alt="Mediterraneo" />
                    </a> -->
                    <!-- <a href="#" target="_blank">
                        <img src="/frontend/images/logos/clie20.png" alt="Mediterraneo" />
                    </a> -->
                    
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
     created(){
          // this.dameTodasCategorias()
     },
     mounted(){
            this.initLogos()
     },
     methods: {
        initLogos: function () {
               $('.owl-carouselBannerHomeLogos').owlCarousel({
                    loop: true,
                    margin: 20,
                    responsiveClass: true,
                    autoplay: true,
                    autoplayTimeout: 2500,
                    navigation : true,
                    autoplayHoverPause: true,
                    dots: true,
                    nav: false,
                    responsive:{
                         0:{
                              items: 2,
                         },
                         992:{
                              items: 5,
                         }
                    }
               })
          }
     }
}
</script>