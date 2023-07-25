<template>
     <div>
          <section class="boxContentLight">
               <a href="javascript:void(0)" class="boxClose" v-on:click="closeSearch()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                         <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                         <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                    </svg>
               </a>
               <div class="boxContent">
                    <div class="container-fluid">
                         <div class="d-flex justify-content-center align-items-center">
                              <div class="boxSearchForm">
                                   <form class="headerSearch">
                                        <a class="boxSVGClose" href="javascript:void(0)" v-on:click="clearSearch()">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                  <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                                  <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                             </svg>
                                        </a>
                                        <input type="text" class="inputForm1" placeholder="Busca el modelo o marca..." v-on:keyup="searchProduct"  v-model="inputSearch" />
                                   </form>
                                   <div class="boxResultProduct">
                                        <div class="boxContentResult" v-if="boolResult">
                                             <div class="boxInfo" v-for="(headerData, index) in productsList" :key="index">
                                                  <div class="infoTitle">{{ formatTitle(headerData.title) }}</div>
                                                  <ul>
                                                       <li v-for="(producto, subIndex) in headerData.productos" :key="subIndex">
                                                            <a :href="'/'+headerData._slug+producto.slug">{{ formatTitle(producto.name) }}</a>
                                                       </li>
                                                  </ul>
                                             </div>
                                        </div>
                                        <div class="boxContentResult noResult" v-if="boolResult === false">
                                             <h3>
                                                  ¡Suave motero, parece que 
                                                  estas fuera de ruta!
                                             </h3>
                                             <div class="boxDescription mt-3">
                                                  <p>
                                                       La palabra que has escrito no coincide 
                                                       en nuestra base de datos. !Prueba con otras!
                                                  </p>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </section>
     </div>
</template>
<script>
export default {
     data() {
          return {
               inputSearch: '',
               productsList: [
                    {
                         title: "Marca",
                         _slug: "marca/",
                         productos: []
                    },
                    {
                         title: "Productos",
                         _slug: "producto/",
                         productos: []
                    }
               ],
               boolResult: false,
          }
     },
     mounted(){
     },
     methods: {
          formatTitle: function(value){
               console.log(value)
               let _title = value.replace("<br>", " ");
               return _title
          },
          closeSearch: function(){
               $(".boxContentLight").removeClass("active")
          },
          clearSearch: function(){
               this.inputSearch = ""
               this.productsList = []
               $(".boxResultProduct").removeClass('active')
          },
          async searchProduct(){
               if (this.inputSearch.length >= 3){
                    // console.log(this.productsList)
                    let formData = new FormData()
                    formData.append("valor", this.inputSearch)
                    // formData.append("page", 1)
                    // console.log(this.inputSearch)
                    // console.log(formData)
                    // console.log(this.productsList.length)
                    
                    
                    // return false
                    try{
                         let sendSolicitud = await axios.get(`/api/v1/search-product?search=${this.inputSearch}`)
                         console.log(sendSolicitud)
                         if (sendSolicitud.status === 200){
                              console.log(sendSolicitud)
                              this.productsList[0].productos = sendSolicitud.data.data.marcas
                              this.productsList[1].productos = sendSolicitud.data.data.productos_populares
                              
                              if ((this.productsList[0].productos.length > 0 )  || (this.productsList[1].productos.length > 0) ){
                                   this.boolResult = true
                              }else{
                                   this.boolResult = false
                              }
                              $(".boxResultProduct").addClass('active')

                         }
                    }catch (error) {
                         console.log(error)
                    } finally {
                         console.log('final')
                    }
                    
               }else{
                    if (this.inputSearch.length === 0){
                         this.productsList = [
                              {
                                   title: "Marca",
                                   _slug: "marca/",
                                   productos: []
                              },
                              {
                                   title: "Productos",
                                   _slug: "producto/",
                                   productos: []
                              }
                         ]
                         $(".boxResultProduct").removeClass('active')
                    }
               }
          }     
     }
}
</script>