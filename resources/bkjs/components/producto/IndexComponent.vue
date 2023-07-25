<template>
     <div>
          <producto-banner :slug=slug :dataMarca=dataMarca :dataProduct=dataProduct></producto-banner>
          <producto-caracteristicas :dataProduct=dataProduct></producto-caracteristicas>
          <producto-galeria :galleries=galleries></producto-galeria>
          <producto-video :dataProduct=dataProduct></producto-video>
          <marca-nosotros :dataMarca=dataMarca bgcolor="#19255a"></marca-nosotros>
          <producto-simulador :slug=slug :precioProducto=precioProducto :dataProduct=dataProduct :dataMarca=dataMarca></producto-simulador>
     </div>
</template>
<script>
     export default {
          props: ['slug'],
          data() {
               return {
                    dataMarca: [],
                    dataProduct: [],
                    cantidadProductos: 0,
                    imageSelectProducto: '',
                    precioProducto: 0,
                    galleries: 0,
               }
          },
          mounted() {
               this.apiMarca()
          },
          methods: {
               async apiMarca(){
                    let _slug = this.slug
                    try{
                         let sendSolicitud = await axios.get(`/api/v1/producto/${_slug}`)
                         console.log(sendSolicitud)
                         if (sendSolicitud.status === 200){
                              this.dataMarca = sendSolicitud.data.data.product.marca
                              this.dataProduct = sendSolicitud.data.data.product
                              this.precioProducto = parseFloat(this.dataProduct.precio)
                              this.precioProducto = parseFloat(this.dataProduct.precio)
                              this.galleries = this.dataProduct.galleries
                              // this.cantidadProductos = sendSolicitud.data.data.product.gallery_products.length
                              // this.imageSelectProducto = sendSolicitud.data.data.product.gallery_products[0].image
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