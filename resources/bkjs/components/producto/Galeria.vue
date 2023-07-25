<template>
     <div>
          <section class="pageProductoGaleria">
               <div class="container-fluid">
                    <div class="boxContent">
                         <div class="row">
                              <div class="col-0 col-xl-1"></div>
                              <div class="col-12 col-xl-10">
                                   <div class="boxSubTitle2">
                                        <h2 class="colorYellow">galería </h2>
                                        <h2>de fotos</h2>
                                   </div>
                                   <div class="boxViewGallery">

                                        <div class="row">
                                             <div class="col-0 col-md-1"></div>
                                             <div class="col-0 col-md-10">
                                                  <div class="row">
                                                       <div class="col-0 col-md-8">
                                                            <div class="row">
                                                                 <div class="col-12 col-md-4 mb-4">
                                                                      <a :href="galleries[0]" data-lightbox="roadtrip">
                                                                           <img :src="galleries[0]" alt="" />
                                                                      </a>
                                                                 </div>
                                                                 <div class="col-12 col-md-8 mb-4">
                                                                      <a :href="galleries[1]" data-lightbox="roadtrip">
                                                                           <img :src="galleries[1]" alt="" />
                                                                      </a>
                                                                 </div>
                                                            </div>
                                                            <div class="row">
                                                                 <div class="col-12 col-md-5 mb-4">
                                                                      <a :href="galleries[3]" data-lightbox="roadtrip">
                                                                           <img :src="galleries[3]" alt="" />
                                                                      </a>
                                                                 </div>
                                                                 <div class="col-12 col-md-7 mb-4">
                                                                      <a :href="galleries[4]" data-lightbox="roadtrip">
                                                                           <img :src="galleries[4]" alt="" />
                                                                      </a>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="col-0 col-md-4 mb-4">
                                                            <a :href="galleries[2]" data-lightbox="roadtrip">
                                                                 <img :src="galleries[2]" alt="" />
                                                            </a>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col-0 col-md-1"></div>
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
     props: ['galleries'],
     mounted() {
          let _this = this
          setTimeout( function(){
               _this.loadLightBox()
          },3000)
          
     },
     methods:{
          loadLightBox: function(){
               // alert(2)
               lightbox.option({
                    'resizeDuration': 200,
                    'wrapAround': true,
                    'showImageNumberLabel': true
               })
          },
     },
}
</script>