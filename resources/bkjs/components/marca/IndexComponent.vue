<template>
     <div>
          <marca-banner :dataMarca=dataMarca></marca-banner>
          <marca-productos :dataMarca=dataMarca :cantidadProductos=cantidadProductos :imageSelectProducto=imageSelectProducto></marca-productos>
          <marca-nosotros :dataMarca=dataMarca bgcolor="#141c3c"></marca-nosotros>
          
     </div>
</template>
<script>
     export default {
          props: ['slug'],
          data() {
               return {
                    dataMarca: [],
                    cantidadProductos: 0,
                    imageSelectProducto: ''
               }
          },
          mounted() {
               this.apiMarca()
          },
          methods: {
               async apiMarca(){
                    let _slug = this.slug
                    try{
                         let sendSolicitud = await axios.get(`/api/v1/marca/${_slug}`)
                         console.log(sendSolicitud)
                         if (sendSolicitud.status === 200){
                              this.dataMarca = sendSolicitud.data.data.product
                              this.cantidadProductos = sendSolicitud.data.data.product.gallery_products.length
                              this.imageSelectProducto = sendSolicitud.data.data.product.gallery_products[0].image
                              // console.log(this.cantidadProductos)
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