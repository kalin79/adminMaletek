<template>
     <div>
          <section class="pageProductoVideo">
               <div class="boxVideo">
                    <iframe width="100%" height="100%" :src="dataProduct.url_video" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
               </div>
          </section>
     </div>
</template>
<script>
     export default {
          props: ['dataProduct']
     }
</script>
