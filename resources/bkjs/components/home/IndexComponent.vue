<template>
     <div>
          <home-search></home-search>
          <more-search :productos_populares=productos_populares></more-search>
          <style-biker></style-biker>
          <home-brands :marcas=marcas></home-brands>
          <moto-nueva></moto-nueva>
          <inversion></inversion>
     </div>
</template>
<script>
     export default {
          data() {
               return {
                    marcas: [],
                    productos_populares: [],
               }
          },
          mounted() {
               this.dataHome()
          },
          methods: {
               async dataHome(){
                    try{
                         let sendSolicitud = await axios.get('/api/v1/home')
                         // console.log(sendSolicitud)
                         if (sendSolicitud.status === 200){
                              this.marcas = sendSolicitud.data.data.marcas
                              this.productos_populares = sendSolicitud.data.data.productos_populares
                         }


                    }catch (error) {
                         console.log(error)
                    } finally {
                         console.log('final')
                    }
               }
          }
     }
</script>