<template>
     <div>
          <div class="boxMarcaProducto">
               <div class="container-fluid">
                    <div class="boxContent">
                         <div class="row">
                              <div class="col-0 col-xl-1"></div>
                              <div class="col-12 col-xl-10">
                                   <div class="boxTitle">
                                        <h2>TODOS LOS <br><span class="colorYellow">MODELOS <br>bajaj</span></h2>
                                   </div>
                                   <div class="barProducts">
                                        <div class="d-flex justify-content-md-between align-items-md-center justify-content-start align-items-start flex-column flex-md-row">
                                             <div class="boxDescription mb-3 mb-md-0">
                                                  <p>Mostrando {{ cantidadProductos }} de {{ cantidadProductos }} motos {{ dataMarca.nombre }}</p>
                                             </div>
                                             <div class="d-flex justify-content-end align-items-center">
                                                  <label for="cbxPrecio">Ordenar por:</label>
                                                  <select id="cbxPrecio" class="form-select">
                                                       <option selected>Precio más bajo</option>
                                                       <option value="1">más recientes</option>
                                                       <option value="2">Precio más bajos</option>
                                                       <option value="3">Precio más altos</option>
                                                       <option value="3">Cilindrada más baja</option>
                                                       <option value="3">Cilindrada más altos</option>
                                                  </select>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="row ">
                                        <div class="col-12 col-md-3" v-for="(marcaListProducts, index) in dataMarca.gallery_products" :key="index">
                                             <div class="boxProductDetail">
                                                  <div class="boxProductMain alingContent">
                                                       <div class="productHeader">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                 <h3>{{ dameCilindrada(marcaListProducts.cilindrada) }}cc</h3>
                                                                 <div class="d-flex justify-content-start align-items-center">
                                                                      <h3 :id="'countLike'+marcaListProducts.id">{{ marcaListProducts.count_like }}</h3>
                                                                      <div class="boxImage boxHeart" :class="marcaListProducts.has_like ? 'active' : '' " v-on:click="clickHeart(marcaListProducts.id)" :id="'svgProduct'+marcaListProducts.id" >
                                                                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" :id="'heart'+marcaListProducts.id" viewBox="0 0 16 16" :style="marcaListProducts.has_like ? '': '' " >
                                                                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                                                           </svg>
                                                                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" :id="'heart'+marcaListProducts.id+'-active'" viewBox="0 0 16 16" :style="marcaListProducts.has_like ? 'opacity: 1; visibility: inherit;': '' ">
                                                                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                                                           </svg>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <a :href="'/producto/'+marcaListProducts.slug" class="productBody">
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                 <div class="boxImage">
                                                                      <img :src="marcaListProducts.image" :id="'ViewMotoActive'+marcaListProducts.id" :alt="marcaListProducts.title" :title="marcaListProducts.title">
                                                                 </div>
                                                            </div>
                                                       </a>
                                                  </div>
                                                  <div class="productFooter alingContent">
                                                       <a :href="'/producto/'+marcaListProducts.slug" class="d-flex justify-content-between align-items-end">
                                                            <div class="boxSubTitle">
                                                                 <h3>{{ marcaListProducts.marca }}</h3>
                                                                 <h2>{{ titleProduct(marcaListProducts.title) }}</h2>
                                                            </div>
                                                            <div class="boxPrecio">
                                                                 <p>{{ formatPrice(marcaListProducts.precio) }}</p>
                                                            </div>
                                                       </a>
                                                       <div class="boxSelectorColors" :id="'boxSelectorColors'+marcaListProducts.id">
                                                            <div class="d-flex justify-content-start align-items-center">
                                                                 <a href="javascript:void(0)" v-for="(color, index2) in marcaListProducts.colores" :key="index2" :class="color.default === 1 ?  color.color_estilo +' active' : color.color_estilo" v-on:click="selectColor(color.id,marcaListProducts.id)" :id="'selectColor'+marcaListProducts.id+'_'+color.id" :data-src="color.image"></a>
                                                                 <!-- <a href="javascript:void(0)" class="bgGrisOscuro" v-on:click="selectColor(2,1)" id="selectColor1_2" data-src="/frontend/images/producto/f1_c.png"></a> -->
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        

                                        
                                   </div>
                              </div>
                              <div class="col-0 col-xl-1"></div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</template>
<script>
export default {
     props: ['dataMarca', 'cantidadProductos','imageSelectProducto'],
     data() {
          return {
          }
     },
     methods: {
          formatoPrecio: function(value){
               return Math.trunc(value)
          },
          formatPrice: function (value) {
               // console.log(`total Kalin ${value}`)
               let _price = Math.trunc(value)
               // _price = _price.toString()
               const exp = /(\d)(?=(\d{3})+(?!\d))/g
               const rep = '$1,'
               let arr = _price.toString().split('.')
               // console.log(arr)
               if (arr.length > 1){
                    if (arr[1].length > 4 ){
                         arr[1] = arr[1].substr(0,4)
                    }
               }
               arr[0] = arr[0].replace(exp,rep)
               let result =  arr[1] ? arr.join('.'): arr[0]
               return `S/ ${result}`
          },
          dameCilindrada: function(value){
               let _valor = parseFloat(value)
               return Math.trunc(_valor)
          },
          titleProduct: function(value){
               let _title = value.replace("<br>", " ");
               return _title
          },
          
          async clickHeart(id){
               let _svgProduct = $(`#svgProduct${id}`) 
               let _hear = $(`#heart${id}`)
               let _hearActive = $(`#heart${id}-active`)
               if (_svgProduct.hasClass('active')){
                    _svgProduct.removeClass('active')
                    gsap.to(_hear, 1, {autoAlpha:1})
                    gsap.to(_hearActive, 0.5, {autoAlpha:0})
               }else{
                    _svgProduct.addClass('active')
                    gsap.to(_hearActive, 1, {autoAlpha:1})
                    gsap.to(_hear, 0.5, {autoAlpha:0})
               }

               try{
                    let dataForm  = new FormData()
                    dataForm.append("producto_id", id)
                    let sendSolicitud = await axios.post('/api/v1/producto-like',dataForm)
                    console.log(sendSolicitud)
                    if (sendSolicitud.status === 201){
                         // this.count_like = sendSolicitud.data.data.count_like
                         $(`#countLike${id}`).html(sendSolicitud.data.data.count_like)
                    }
               }catch (error) {
                    console.log(error)
               } finally {
                    console.log('final')
               }
          },
          selectColor: function(idColor, idMotoActive){
               if ($(`#selectColor${idMotoActive}_${idColor}`).hasClass('active') === false){
                    let src = $(`#selectColor${idMotoActive}_${idColor}`).data("src")
                    // console.log(`#ViewMotoActive${idMotoActive}`)
                    // console.log(`#boxSelectorColors${idMotoActive}`)
                    // console.log(`#selectColor${idMotoActive}`)
                    // console.log(src)
                    $(`#boxSelectorColors${idMotoActive} a`).removeClass('active')
                    $(`#ViewMotoActive${idMotoActive}`).attr('src', src)
                    $(`#selectColor${idMotoActive}_${idColor}`).addClass('active')
               }
          },
     }
}
</script>