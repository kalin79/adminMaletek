<template>
     <div>
          <header class="" id="mainMenuNav">
               <div class="container-fluid">
                    <div class="row">
                         <div class="col-0 col-lg-0 col-xl-1"></div>
                         <div class="col-12 col-lg-12 col-xl-10">
                              <div class="boxSocials d-flex  justify-content-end align-items-center">
                                   <a href="" target="_blank">
                                        <img src="/frontend/images/facebook.png" alt="Facebook">
                                   </a>
                                   <a href="#" target="_blank">
                                        <img src="/frontend/images/instagram.png" alt="Instagram">
                                   </a>
                                   <a href="#" target="_blank">
                                        <img src="/frontend/images/youtube.png" alt="YouTube">
                                   </a>
                              </div>
                              <div class="d-flex justify-content-between align-items-center">
                                   <a href="/" class="btnLogo">
                                        <img src="/frontend/images/logo.svg" alt="Moto Popular">
                                   </a>
                                   <div class="d-flex justify-content-end align-items-center">
                                        <a href="javascript:void(0)" class="menuMovil d-block d-md-none" v-on:click="openMenuMovil()">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                                  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                                             </svg>
                                        </a>
                                        <div class="boxNav">
                                             <a href="/" class="btnLogo d-block d-md-none">
                                                  <img src="/frontend/images/logo.svg" alt="Moto Popular">
                                             </a>
                                             <a href="javascript:void(0)" class="btnCloseMovil d-block d-md-none" v-on:click="openMenuMovil()">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                       <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                                       <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                                  </svg>
                                             </a>
                                             <nav class="d-flex justify-content-start justify-content-md-end align-items-start align-items-md-center flex-column flex-md-row">
                                                  <a href="/" class="btnLink" :class="_route_ === 'frontend.home_web' ? 'active' : '' ">Principal</a>
                                                  <a href="/catalogo" class="btnLink" :class="_route_ === 'frontend.catalogo_web' ? 'active' : '' " >Catálogo</a>
                                                  <a href="/financiamiento" class="btnLink"  :class="_route_ === 'frontend.financiamiento' ? 'active' : '' " >Financiamiento</a>
                                                  <!-- <a href="/anuncia-aqui" class="btnLink">Anuncía Aquí</a>
                                                  <a href="/blog" class="btnLink">Blog</a> -->
                                                  
                                             </nav>
                                             <div class="boxSocials2">
                                                  <div class="d-flex  justify-content-start align-items-center">
                                                       <a href="" target="_blank">
                                                            <img src="/frontend/images/facebook.png" alt="Facebook">
                                                       </a>
                                                       <a href="#" target="_blank">
                                                            <img src="/frontend/images/instagram.png" alt="Instagram">
                                                       </a>
                                                       <a href="#" target="_blank">
                                                            <img src="/frontend/images/youtube.png" alt="YouTube">
                                                       </a>
                                                  </div>
                                             </div>
                                        </div>
                                        <a href="javascript:void(0)" class="btnSearch" v-on:click="openSearch()">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                             </svg>
                                        </a>
                                   </div>
                              </div>
                         </div>
                         <div class="col-0 col-lg-0 col-xl-1"></div>
                    </div>
               </div>
          </header>
     </div>
</template>
<script>
export default {
     props: ['_route_'],
     data: function () {
          return {
               
          }
     },
     mounted() {
          this.animationMenu()
          console.log(this._route_)
     },
     methods: {
          openSearch: function(){
               $(".boxContentLight").addClass('active')
          },
          openMenuMovil: function (){
               let _boxNav = $('.boxNav')
               if (_boxNav.hasClass('active')){
                    _boxNav.removeClass('active')
               }else{
                    _boxNav.addClass('active')
               }
          },
          quitActive: function(){
               let element = $('#mainMenuNav')
               element.removeClass('active')
          },
          animationMenu: function(){
               //mainMenuNav
               var ping = '.pingMenu'
               var _menu = "#mainMenuNav"
               var _this = this
               const parallaxTl2 = gsap.timeline({
                    ease: 'none',
                    scrollTrigger: {
                         trigger: ping,
                         start: 'top top+=20%',
                         end: 'top top',
                         scrub: true, // permite que la animacion se vuelva a reproduccion 
                         // onToggle: () => { console.log('onToggle'); },
                         // onEnter: () => { console.log('onEnter'); },
                         // onLeave: () => { console.log('onLeave'); },
                         // onEnterBack: () => { console.log('onEnterBack'); },
                         onLeaveBack: () => { 
                              _this.quitActive()
                              // console.log('onLeaveBack'); 
                         },
                         markers: false,
                    }
               })
               // console.log()
               parallaxTl2
                    .to(_menu, {className: "active"})
               
          }
     }
}
</script>