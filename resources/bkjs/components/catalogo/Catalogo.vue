<template>
     <div>
          <section class="CatalogoMain relative">
               <div class="boxLogoIso">
                    <img src="/frontend/images/fondo_iso.png" alt="ISO">
               </div>
               <div class="boxContent">
                    <div class="container-fluid">
                         <div class="row">
                              <div class="col-0 col-xl-1"></div>
                              <div class="col-12 col-xl-10">
                                   <div class="boxTitle d-flex justify-content-between align-items-center">
                                        <h1 class="txtUpperCase pingMenu">
                                             catálogo <br><span class="colorYellow">de motos</span>
                                        </h1>
                                        <div class="boxFiltrosCatalogo" >
                                             <a href="javascript:void(0)" class="d-flex justify-content-start align-items-center" v-on:click="viewCatalogo">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter-square-fill" viewBox="0 0 16 16">
                                                       <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm.5 5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1 0-1zM4 8.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm2 3a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5z"/>
                                                  </svg>
                                                  <p>Filtros</p>
                                             </a>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-12 col-md-3">
                                             <div class="boxContentFilterAll" id="boxContentFilterAll">
                                                  <div class="closeFilterAll">
                                                       <a href="javascript:void(0)" v-on:click="viewCatalogo">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                                                                 <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                                                            </svg>
                                                       </a>
                                                  </div>
                                                  <div class="boxContentFilter2">
                                                       <div class="boxMainSelect" id="boxMainSelect-1">
                                                            <div class="boxSelect" v-on:click="openFilter(1)">
                                                                 <h3>PRECIO</h3>
                                                            </div>
                                                            <div  class="boxContentSelect sliderBarRange notIrsGridPoll bgBlack">
                                                                 <div id="sliderBarPriceRange"></div>
                                                                 <div class="rangePriceClear">
                                                                      <a href="javascript:void(0)" v-on:click="clearPrice">LIMPIAR FILTRO</a>
                                                                 </div>
                                                            </div>
                                                            
                                                       </div>

                                                       <div class="boxMainSelect" id="boxMainSelect-2">
                                                            <div class="boxSelect" v-on:click="openFilter(2)">
                                                                 <h3>CILINDRADA</h3>
                                                            </div>
                                                            <div class="boxContentSelect sliderBarRange notIrsGridPoll bgBlack">
                                                                 <div id="sliderBarCilindrada"></div>
                                                                 <div class="rangePriceClear">
                                                                      <a href="javascript:void(0)" v-on:click="clearCilindrada">LIMPIAR FILTRO</a>
                                                                 </div>
                                                            </div>
                                                       </div>

                                                       <div class="boxMainSelect" id="boxMainSelect-3">
                                                            <div class="boxSelect" v-on:click="openFilter(3)">
                                                                 <h3>POSICIÓN DE MANEJO</h3>
                                                            </div>
                                                            <div class="boxContentSelect">
                                                                 <div class="d-flex justify-content-center align-items-center boxMultiSelect" id="boxMultiSelectPosicion">
                                                                      <a href="javascript:void(0)" v-for="(_posicion,index) in allTypePosition" :key="index" class="boxOptionPosition" :id="'boxOptionPosition-'+index" v-on:click="selectPosicion(index,_posicion.id)">
                                                                           <div class="fullHeight d-flex flex-column justify-content-center align-items-center">
                                                                                <img v-if="_posicion.id === 1"  src="/frontend/images/posicion/3.png" :alt="_posicion.name" />
                                                                                <img v-if="_posicion.id === 2"  src="/frontend/images/posicion/2.png" :alt="_posicion.name" />
                                                                                <img v-if="_posicion.id === 3"  src="/frontend/images/posicion/1.png" :alt="_posicion.name" />
                                                                           </div>
                                                                           <p class="txtCenter">{{ _posicion.name }}</p>
                                                                      </a>
                                                                     
                                                                 </div>
                                                                 <div class="rangePriceClear mt2 plr2">
                                                                      <a href="javascript:void(0)" v-on:click="clearPosicion">LIMPIAR FILTRO</a>
                                                                 </div>
                                                            </div>
                                                       </div>

                                                       <div class="boxTitleFiltro">
                                                            <h2>MECÁNICA</h2>
                                                       </div>

                                                       <div class="boxMainSelect" id="boxMainSelect-4">
                                                            <div class="boxSelect" v-on:click="openFilter(4)">
                                                                 <h3>POTENCIA</h3>
                                                            </div>
                                                            <div class="boxContentSelect sliderBarRange notIrsGridPoll bgBlack">
                                                                 <div id="sliderBarPotencia"></div>
                                                                 <div class="rangePriceClear">
                                                                      <a href="javascript:void(0)" v-on:click="clearPotencia">LIMPIAR FILTRO</a>
                                                                 </div>
                                                            </div>
                                                       </div>

                                                       <div class="boxMainSelect" id="boxMainSelect-5">
                                                            <div class="boxSelect" v-on:click="openFilter(5)">
                                                                 <h3>TIPO DE TRANSMISIÓN</h3>
                                                            </div>
                                                            <div class="boxContentSelect">
                                                                 <div class="d-flex justify-content-start align-items-start flex-column boxMultiSelectCheck" id="boxMultiSelectCheckTransimision">
                                                                      <a href="javascript:void(0)" v-for="(_transmision, index) in allTypeTransmision" :key="index" v-on:click="selectTransmision(index,_transmision.id)" :id="'checkTransmision-'+index">
                                                                           <div class="d-flex justify-content-start align-items-center">
                                                                                <div class="boxCheck"></div>
                                                                                <p>{{ _transmision.name }}</p>
                                                                           </div>
                                                                      </a>
                                                                      
                                                                 </div>
                                                                 <div class="rangePriceClear mt1 plr2">
                                                                      <a href="javascript:void(0)" v-on:click="clearTransmision">LIMPIAR FILTRO</a>
                                                                 </div>
                                                            </div>
                                                       </div>

                                                       <div class="boxMainSelect" id="boxMainSelect-6">
                                                            <div class="boxSelect" v-on:click="openFilter(6)">
                                                                 <h3>TIPO DE FRENOS</h3>
                                                            </div>
                                                            <div class="boxContentSelect">
                                                                 <div class="d-flex justify-content-start align-items-start flex-column boxMultiSelectCheck" id="boxMultiSelectCheckFrenos">
                                                                      <a href="javascript:void(0)" v-for="(_frenos,index) in alltypeFrenos" :key="index" v-on:click="selectFrenos(index,_frenos.id)" :id="'checkFrenos-'+index">
                                                                           <div class="d-flex justify-content-start align-items-center">
                                                                                <div class="boxCheck"></div>
                                                                                <p>{{ _frenos.name }}</p>
                                                                           </div>
                                                                      </a>
                                                                 </div>
                                                                 <div class="rangePriceClear mt1 plr2">
                                                                      <a href="javascript:void(0)" v-on:click="clearFrenos">LIMPIAR FILTRO</a>
                                                                 </div>
                                                            </div>
                                                       </div>

                                                       <div class="boxMainSelect" id="boxMainSelect-7">
                                                            <div class="boxSelect" v-on:click="openFilter(7)">
                                                                 <h3>NRO. DE CILINDROS</h3>
                                                            </div>
                                                            <div class="boxContentSelect">
                                                                 <div class="d-flex justify-content-start align-items-start flex-column boxMultiSelectCheck" id="boxMultiSelectCheckNroCilindros">
                                                                      <a href="javascript:void(0)" v-on:click="selectNroCilindro(1,1)" id="checkNroCilindro-1">
                                                                           <div class="d-flex justify-content-start align-items-center">
                                                                                <div class="boxCheck"></div>
                                                                                <p>1</p>
                                                                           </div>
                                                                      </a>
                                                                      <a href="javascript:void(0)" v-on:click="selectNroCilindro(2,2)" id="checkNroCilindro-2">
                                                                           <div class="d-flex justify-content-start align-items-center">
                                                                                <div class="boxCheck"></div>
                                                                                <p>2</p>
                                                                           </div>
                                                                      </a>
                                                                      
                                                                      
                                                                 </div>
                                                                 <div class="rangePriceClear mt1 plr2">
                                                                      <a href="javascript:void(0)" v-on:click="clearNroCilindros">LIMPIAR FILTRO</a>
                                                                 </div>
                                                            </div>
                                                       </div>

                                                       <div class="boxTitleFiltro">
                                                            <h2>COMBUSTIBLE</h2>
                                                       </div>

                                                       <div class="boxMainSelect" id="boxMainSelect-8">
                                                            <div class="boxSelect" v-on:click="openFilter(8)">
                                                                 <h3>RENDIMIENTO</h3>
                                                            </div>
                                                            <div class="boxContentSelect sliderBarRange notIrsGridPoll bgBlack">
                                                                 <div id="sliderBarRendimientoRange"></div>
                                                                 <div class="rangePriceClear">
                                                                      <a href="javascript:void(0)" v-on:click="clearRendimiento">LIMPIAR FILTRO</a>
                                                                 </div>
                                                            </div>
                                                       </div>

                                                       <div class="boxMainSelect" id="boxMainSelect-9">
                                                            <div class="boxSelect" v-on:click="openFilter(9)">
                                                                 <h3>SISTEMA DE COMBUSTIBLE</h3>
                                                            </div>
                                                            <div class="boxContentSelect">
                                                                 <div class="d-flex justify-content-start align-items-start flex-column boxMultiSelectCheck" id="boxMultiSelectCheckCombustible">
                                                                      <a href="javascript:void(0)" v-for="(_combustible,index) in allTypeCombustible" :key="index"  v-on:click="selectCombustible(index,_combustible.id)" :id="'checkCombustible-'+index">
                                                                           <div class="d-flex justify-content-start align-items-center">
                                                                                <div class="boxCheck"></div>
                                                                                <p>{{ _combustible.name }}</p>
                                                                           </div>
                                                                      </a>
                                                                 </div>
                                                                 <div class="rangePriceClear mt1 plr2">
                                                                      <a href="javascript:void(0)" v-on:click="clearCombustible">LIMPIAR FILTRO</a>
                                                                 </div>
                                                            </div>
                                                       </div>

                                                       <div class="boxTitleFiltro">
                                                            <h2>OTROS FILTROS</h2>
                                                       </div>

                                                       <div class="boxMainSelect" id="boxMainSelect-10">
                                                            <div class="boxSelect" v-on:click="openFilter(10)">
                                                                 <h3>ESTILO</h3>
                                                            </div>
                                                            <div class="boxContentSelect">
                                                                 <div class="d-flex justify-content-between align-items-center boxMultiSelect flex-wrap itemWrap" id="boxMultiSelectEstilo">
                                                                      <a href="javascript:void(0)" v-for="(_estilo, index) in allTypeEstilos" :key="index" class="boxOptionPosition" :id="'boxOptionEstilo-'+_estilo.id" v-on:click="selectEstilo(_estilo.id,_estilo.id)">
                                                                           <div class="fullHeight d-flex flex-column justify-content-center align-items-center">
                                                                                <img v-if="_estilo.id === 23"  src="/frontend/images/tipo/1.png" :alt="_estilo.name" />
                                                                                <img v-if="_estilo.id === 24"  src="/frontend/images/tipo/1.png" :alt="_estilo.name" />
                                                                                <img v-if="_estilo.id === 25"  src="/frontend/images/tipo/1.png" :alt="_estilo.name" />
                                                                                <img v-if="_estilo.id === 26"  src="/frontend/images/tipo/1.png" :alt="_estilo.name" />
                                                                                <img v-if="_estilo.id === 27"  src="/frontend/images/tipo/1.png" :alt="_estilo.name" />
                                                                           </div>
                                                                           <p class="txtCenter">{{ _estilo.name }}</p>
                                                                      </a>
                                                                 </div>
                                                                 <div class="rangePriceClear mt2 plr2">
                                                                      <a href="javascript:void(0)" v-on:click="clearEstilo">LIMPIAR FILTRO</a>
                                                                 </div>
                                                            </div>
                                                       </div>

                                                       <div class="boxMainSelect noHidden" id="boxMainSelect-11">
                                                            <div class="boxSelect" v-on:click="openFilter(11)">
                                                                 <h3>MARCA</h3>
                                                            </div>
                                                            <div class="boxContentSelect">
                                                                 <div class="boxContentInput">
                                                                      <multiselect v-model="selectedMarca" 
                                                                           id="ajax" 
                                                                           label="name" 
                                                                           track-by="id" 
                                                                           placeholder="Marcas" 
                                                                           open-direction="bottom" 
                                                                           :options="listMarcas" 
                                                                           :multiple="true" 
                                                                           :searchable="true" 
                                                                           :loading="isLoadingMarca" 
                                                                           :internal-search="false" 
                                                                           :clear-on-select="false" 
                                                                           :close-on-select="false" 
                                                                           :options-limit="300" 
                                                                           :showLabels=false
                                                                           :limit="10" 
                                                                           :limit-text="limitTextMarca" 
                                                                           :max-height="600" 
                                                                           :show-no-results="false" 
                                                                           :hide-selected="true" 
                                                                           @input="onChangeMarca()"
                                                                           @search-change="asyncFindMarca">
                                                                           <template slot="tag" slot-scope="{ option, remove }"><span class="custom__tag"><span>{{ option.name }}</span><span class="custom__remove" @click="remove(option)">❌</span></span></template>
                                                                           <template slot="clear" slot-scope="props">
                                                                                <div class="multiselect__clear" v-if="selectedMarca.length" @mousedown.prevent.stop="clearAllMarca(props.search)"></div>
                                                                           </template><span slot="noResult">Oops! no hemos encontrado ninguna marca!</span>
                                                                      </multiselect>
                                                                 </div>

                                                                 <div class="rangePriceClear mt2 plr2">
                                                                      <a href="javascript:void(0)" v-on:click="clearAllMarca">LIMPIAR FILTRO</a>
                                                                 </div>
                                                                 <!-- {{ selectedMarca }} -->
                                                            </div>
                                                       </div>

                                                       <div class="boxMainSelect noHidden" id="boxMainSelect-12">
                                                            <div class="boxSelect" v-on:click="openFilter(12)">
                                                                 <h3>TIPO DE MOTO</h3>
                                                            </div>
                                                            <div class="boxContentSelect">
                                                                 <div class="boxContentInput">
                                                                      <multiselect v-model="selectedTipoMoto" 
                                                                           id="ajax2" 
                                                                           label="name" 
                                                                           track-by="id" 
                                                                           placeholder="Tipo de Moto" 
                                                                           open-direction="bottom" 
                                                                           :options="listTipoMoto" 
                                                                           :multiple="true" 
                                                                           :searchable="true" 
                                                                           :loading="isLoadingTipoMoto" 
                                                                           :internal-search="false" 
                                                                           :clear-on-select="false" 
                                                                           :close-on-select="false" 
                                                                           :options-limit="300" 
                                                                           :showLabels=false
                                                                           :limit="10" 
                                                                           :limit-text="limitTextTipoMoto" 
                                                                           :max-height="600" 
                                                                           :show-no-results="false" 
                                                                           :hide-selected="true" 
                                                                           @input="onChangeTipoMoto()"
                                                                           @search-change="asyncFindTipoMoto">
                                                                           <template slot="tag" slot-scope="{ option, remove }"><span class="custom__tag"><span>{{ option.name }}</span><span class="custom__remove" @click="remove(option)">❌</span></span></template>
                                                                           <template slot="clear" slot-scope="props">
                                                                                <div class="multiselect__clear" v-if="selectedTipoMoto.length" @mousedown.prevent.stop="clearAllTipoMoto(props.search)"></div>
                                                                           </template><span slot="noResult">Oops! no hemos encontrado ninguna marca!</span>
                                                                      </multiselect>
                                                                 </div>

                                                                 <div class="rangePriceClear mt2 plr2">
                                                                      <a href="javascript:void(0)" v-on:click="clearAllTipoMoto">LIMPIAR FILTRO</a>
                                                                 </div>
                                                                 <!-- {{ selectedTipoMoto }} -->
                                                            </div>
                                                       </div>

                                                       <div class="boxMainSelect" id="boxMainSelect-13">
                                                            <div class="boxSelect" v-on:click="openFilter(13)">
                                                                 <h3>COLORES</h3>
                                                            </div>
                                                            <div class="boxContentSelect">
                                                                 <div class="d-flex justify-content-start align-items-start flex-wrap boxMultiSelectCheck2" id="boxMultiSelectCheckColor">
                                                                      <a href="javascript:void(0)" v-for="(_color, index) in allTypeColors" :key="index" v-on:click="selectColor(index,_color.id)" :id="'checkColor-'+index">
                                                                           <div class="boxCheck " :class="_color.valor">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                                                     <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                                                </svg>
                                                                           </div>
                                                                      </a>
                                                                 </div>
                                                                 <div class="rangePriceClear mt1 plr2">
                                                                      <a href="javascript:void(0)" v-on:click="clearColor">LIMPIAR FILTRO</a>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>

                                        </div>
                                        <div class="col-12 col-md-9">
                                             <div class="row">
                                                  <div class="col-12 col-md-6 col-lg-4" v-for="(dataProduct, index) in listProducts" :key="index">
                                                       <div class="boxProductDetail">
                                                            <div class="boxProductMain alingContent">
                                                                 <div class="productHeader">
                                                                      <div class="d-flex justify-content-between align-items-center">
                                                                           <h3>{{ formatInteger(dataProduct.cilindrada) }}cc</h3>
                                                                           <div class="d-flex justify-content-start align-items-center">
                                                                                <h3 :id="'countLike'+dataProduct.id">{{ dataProduct.count_like }}</h3>
                                                                                <div class="boxImage boxHeart" :class="dataProduct.has_like ? 'active' : '' " v-on:click="clickHeart(dataProduct.id)" :id="'svgProduct'+dataProduct.id" >
                                                                                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" :id="'heart'+dataProduct.id" viewBox="0 0 16 16">
                                                                                          <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                                                                     </svg>
                                                                                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" :id="'heart'+dataProduct.id+'-active'" viewBox="0 0 16 16" :style="dataProduct.has_like ? 'opacity: 1; visibility: inherit;': '' ">
                                                                                          <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                                                                     </svg>
                                                                                </div>
                                                                                
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <a :href="'/producto/'+dataProduct.slug" class="productBody">
                                                                      <div class="d-flex justify-content-center align-items-center">
                                                                           <div class="boxImage">
                                                                                <img :src="dataProduct.image" :id="'ViewMotoActive'+dataProduct.id" :alt="dataProduct.title">
                                                                           </div>
                                                                           
                                                                      </div>
                                                                 </a>
                                                            </div>
                                                            <div class="productFooter alingContent">
                                                                 <a :href="'/producto/'+dataProduct.slug" class="d-flex justify-content-between align-items-end">
                                                                      <div class="boxSubTitle">
                                                                           <h3>{{ dataProduct.marca }}</h3>
                                                                           <h2>{{ formatTitle(dataProduct.title) }}</h2>
                                                                      </div>
                                                                      <div class="boxPrecio">
                                                                           <p>{{ formatPrice(dataProduct.precio) }}</p>
                                                                      </div>
                                                                 </a>
                                                                 <div class="boxSelectorColors" :id="'boxSelectorColors'+dataProduct.id">
                                                                      <div class="d-flex justify-content-start align-items-center">
                                                                           <a href="javascript:void(0)" v-for="(colores, index2) in dataProduct.colores" :key="index2" :class="colores.image === dataProduct.image ? colores.color_estilo + ' active' : colores.color_estilo" v-on:click="selectColorMoto(colores.id,dataProduct.id)" :id="'selectColor'+dataProduct.id+'_'+colores.id" :data-src="colores.image"></a>
                                                                           <!-- <a href="javascript:void(0)" class="bgGrisOscuro" v-on:click="selectColorMoto(2,1)" id="selectColor1_2" data-src="/frontend/images/producto/f1_c.png"></a> -->
                                                                      </div>
                                                                 </div>
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
          </section>
     </div>
</template>
<style>
    @import "~/../node_modules/vue-multiselect/dist/vue-multiselect.min.css";
</style>
<script>
import Multiselect from 'vue-multiselect'
export default {
     props: ['idestilo'],
     components: {
          Multiselect
     },
     data() {
          return {
               rangeSlider: '',
               rangeBullet: '',
               montoInicial: 0,
               montoFinal: 0,
               montoResetInicial: 0,
               montoResetFinal: 0,
               clearBoolPrice: false,
               montoCilindradaInicial: 0,
               montoCilindradaFinal: 0,
               montoResetCilindradaInicial: 0,
               montoResetCilindradaFinal: 0,
               clearBoolCilindrada: false,
               typePosition: [],
               allTypePosition: [],
               montoPotenciaInicial: 0,
               montoPotenciaFinal: 0,
               montoResetPotenciaInicial: 0,
               montoResetPotenciaFinal: 0,
               clearBoolPotencia: false,
               typeTransmision: [],
               allTypeTransmision: [],
               typeFrenos: [],
               alltypeFrenos: [],
               typeNroCilindro: [],
               typeCombustible: [],
               allTypeCombustible: [],
               typeTipoMoto: [],
               axiosTipoMoto: [],
               typeEstilo: [],
               allTypeEstilos: [],
               typeColors: [],
               allTypeColors: [],
               montoRendimientoInicial: 0,
               montoRendimientoFinal: 300,
               montoResetRendimientoInicial: 0,
               montoResetRendimientoFinal: 0,

               listMarcas: [],
               selectedMarca: [],
               axiosMarca:[],
               isLoadingMarca: false,

               listTipoMoto: [],
               selectedTipoMoto: [],
               isLoadingTipoMoto: false,

               ionRangePotencia: null,
               ionRangeCilindrada: null,
               ionRangePrice: null,
               ionRangeRendimiento: null,

               listProducts: [],

               timeLoad: 0
          }
     },
     mounted() {
          this.montoInicial = 500
          this.montoFinal = 40000
          this.montoResetInicial = 500
          this.montoResetFinal = 40000
          this.typePosition = []
          this.typeTransmision = []
          this.typeFrenos = []
          this.typeNroCilindro = []
          this.typeCombustible = []
          this.typeTipoMoto = []
          this.typeEstilo = []
          this.typeColors = []

          this.montoCilindradaInicial = 0
          this.montoCilindradaFinal = 550
          this.montoResetCilindradaInicial = 0
          this.montoResetCilindradaFinal = 550

          this.montoPotenciaInicial = 0
          this.montoPotenciaFinal = 200
          this.montoResetPotenciaInicial = 0
          this.montoResetPotenciaFinal = 200

          this.montoRendimientoInicial = 0,
          this.montoRendimientoFinal = 300,
          this.montoResetRendimientoInicial = 0,
          this.montoResetRendimientoFinal = 300,

          this.listMarcas = [],
          this.selectedMarca = [],
          this.isLoadingMarca = false,

          // this.listTipoMoto = [],
          this.selectedTipoMoto = [],
          this.isLoadingTipoMoto = false,

          this.initPriceSliderRange()
          this.initCilindradaSliderRange()
          this.initPotenciaSliderRange()
          this.initRendimientoSliderRange()
          // this.loadMoresTipoMoto()
          console.log(this.idestilo)
          this.loadFilters()
          

          
     },
     
     methods: {
          async loadFilters(){
               console.log(this.idestilo)
               try{
                    let sendSolicitud = await axios.get('/api/v1/get-filters')
                    // console.log(sendSolicitud)
                    if (sendSolicitud.status === 200){
                         this.listTipoMoto = sendSolicitud.data.data.tipos_motos
                         this.allTypeColors = sendSolicitud.data.data.colores
                         this.listMarcas = sendSolicitud.data.data.marcas
                         this.allTypeEstilos = sendSolicitud.data.data.estilos_motos
                         this.allTypeCombustible = sendSolicitud.data.data.tipos_sistema_combustible
                         this.alltypeFrenos = sendSolicitud.data.data.tipos_frenos
                         this.allTypeTransmision = sendSolicitud.data.data.tipos_transmicion
                         this.allTypePosition = sendSolicitud.data.data.posicion_manejo
                         
                         if (this.idestilo!=""){
                                   let _numIdStyle = parseInt(this.idestilo)
                                   let _this = this
                                   setTimeout( function(){
                                        _this.selectEstilo(_numIdStyle,_numIdStyle)
                                        _this.openFilter(10)
                                   },1500)
                                   
                         }else{
                              this.viewProducts()
                         }
                         
                    }
               }catch (error) {
                    console.log(error)
               } finally {
                    console.log('final')
               }
          },
          formatTitle: function(value){
               // console.log(value)
               let _title = value.replace("<br>", " ");
               return _title
               // return ''
          },
          formatInteger: function(value){
               return Math.trunc(value)
          },
          formatPrice: function (value) {
               // console.log(value)
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
               // let result =  arr[1]
               // console.log(result)
               return `S/ ${result}`
          },
          onChangeMarca: function (){
               // console.log(this.selectedMarca)
               this.axiosMarca = []
               this.selectedMarca.forEach(value => {
                    this.axiosMarca.push(value.id)
               })
               this.viewProducts()
          },
          onChangeTipoMoto: function (){
               // console.log(this.selectedTipoMoto)
               this.axiosTipoMoto = []
               this.selectedTipoMoto.forEach(value => {
                    this.axiosTipoMoto.push(value.id)
               })
               this.viewProducts()
          },
          async viewProducts(){

               let dataFilters  = new FormData()
               dataFilters.append("precioInicial", this.montoInicial)
               dataFilters.append("precioFinal", this.montoFinal)
               dataFilters.append("cilindradaInicial", this.montoCilindradaInicial)
               dataFilters.append("cilindradaFinal", this.montoCilindradaFinal)
               dataFilters.append("posicionManejo", this.typePosition)
               dataFilters.append("potenciaInicial", this.montoPotenciaInicial)
               dataFilters.append("potenciaFinal", this.montoPotenciaFinal)
               dataFilters.append("tipoTransmision", this.typeTransmision)
               dataFilters.append("tipoFrenos", this.typeFrenos)
               dataFilters.append("numerosCilindros", this.typeNroCilindro)
               dataFilters.append("rendimiento", this.montoRendimientoInicial)
               dataFilters.append("sistemaCombustible", this.typeCombustible)
               dataFilters.append("estilo", this.typeEstilo)
               dataFilters.append("marca", this.axiosMarca)
               dataFilters.append("tipoMoto", this.axiosTipoMoto)
               dataFilters.append("colores", this.typeColors)

               let ___data = {
                    precioInicial: this.montoInicial,
                    precioFinal: this.montoFinal,
                    cilindradaInicial: this.montoCilindradaInicial,
                    cilindradaFinal: this.montoCilindradaFinal,
                    posicionManejo: this.typePosition,
                    potenciaInicial: this.montoPotenciaInicial,
                    potenciaFinal: this.montoPotenciaFinal,
                    tipoTransmision: this.typeTransmision,
                    tipoFrenos: this.typeFrenos,
                    numerosCilindros: this.typeNroCilindro,
                    rendimiento: this.montoRendimientoInicial,
                    sistemaCombustible: this.typeCombustible,
                    estilo: this.typeEstilo,
                    marca: this.axiosMarca,
                    tipoMoto: this.axiosTipoMoto,
                    colores: this.typeColors,
               }

               console.log(___data)

               try{
                    let sendSolicitud = await axios.post('/api/v1/catalogo',dataFilters)
                    console.log(sendSolicitud)
                    if (sendSolicitud.status === 200){
                         this.listProducts = sendSolicitud.data
                    }
               }catch (error) {
                    console.log(error)
               } finally {
                    console.log('final')
               }
          },
          selectColorMoto: function(idColor, idMotoActive){
               if ($(`#selectColor${idMotoActive}_${idColor}`).hasClass('active') === false){
                    let src = $(`#selectColor${idMotoActive}_${idColor}`).data("src")
                    // console.log(src)
                    $(`#boxSelectorColors${idMotoActive} a`).removeClass('active')
                    $(`#ViewMotoActive${idMotoActive}`).attr('src', src)
                    $(`#selectColor${idMotoActive}_${idColor}`).addClass('active')
               }
          },
          async clickHeart (id){
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
          openFilter: function (id) {
               if ($("#boxMainSelect-"+id).hasClass('active')){
                    $("#boxMainSelect-"+id).removeClass('active')
               }else{
                    $("#boxMainSelect-"+id).addClass('active')
               }
          },
          viewCatalogo: function(){
               var _elem = $('#boxContentFilterAll')
               if (_elem.hasClass('active')){
                    $('.CatalogoMain').css("z-index", 1)
                    _elem.removeClass('active')
                    $('.closeFilterAll').removeClass('active')
               }else{
                    _elem.addClass('active')
                    $('.closeFilterAll').addClass('active')
                    $('.CatalogoMain').css("z-index", 750)
               }
          },
          loadMoresTipoMoto: function(){
               this.listTipoMoto = [
                    {
                    "name": "SCOOTER",
                    "code": "1"
                    },
                    {
                    "name": "PISTERA",
                    "code": "2"
                    },
                    {
                    "name": "DEPORTIVA",
                    "code": "3"
                    },
                    {
                    "name": "TODO TERRENO",
                    "code": "4"
                    },
                    {
                    "name": "DOBLE PROPOSITO ",
                    "code": "5"
                    },
                    {
                    "name": "CAFÉ RACER",
                    "code": "6"
                    },
                    {
                    "name": "UTILITARIA",
                    "code": "7"
                    },
                    {
                    "name": "CUB",
                    "code": "8"
                    }
               ]
          },
          limitTextTipoMoto (count) {
               return `and ${count} other countries`
          },
          async asyncFindTipoMoto (query) {
               // console.log(query)
               this.isLoadingTipoMoto = true
               if (query.length > 1) {
                    this.isLoadingTipoMoto = true
                    let _slug = this.slug
                    try{
                         let sendSolicitud = await axios.get(`api/v1/search-tipo-moto?search=${query}`)
                         console.log(sendSolicitud)
                         if (sendSolicitud.status === 200){
                              this.listTipoMoto = sendSolicitud.data
                         }
                    }catch (error) {
                         console.log(error)
                    } finally {
                         console.log('final')
                    }
                    this.isLoadingTipoMoto = false
               }else{
                    this.isLoadingTipoMoto = false
               }
               
          },
          async clearAllTipoMoto () {
               this.selectedTipoMoto = []
               this.axiosTipoMoto = []
               try{
                    let sendSolicitud = await axios.get('/api/v1/get-filters')
                    // console.log(sendSolicitud)
                    if (sendSolicitud.status === 200){
                         this.listTipoMoto = sendSolicitud.data.data.tipos_motos
                    }
               }catch (error) {
                    console.log(error)
               } finally {
                    console.log('final')
               }
               this.viewProducts()
          },
          limitTextMarca (count) {
               return `and ${count} other countries`
          },
          async asyncFindMarca (query) {
               // console.log(query)
               
               // let query = this.listMarcas 
               if (query.length > 1) {
                    this.isLoadingMarca = true
                    let _slug = this.slug
                    try{
                         let sendSolicitud = await axios.get(`api/v1/search-marca?search=${query}`)
                         console.log(sendSolicitud)
                         if (sendSolicitud.status === 200){
                              this.listMarcas = sendSolicitud.data
                         }
                    }catch (error) {
                         console.log(error)
                    } finally {
                         console.log('final')
                    }
                    // let _search = this.listMarcas
                    // this.listMarcas.find(object => query.toLowerCase() === object.name.toLowerCase())
                    // this.listMarcas = _search
                    this.isLoadingMarca = false
               }else{
                    this.isLoadingMarca = false
               }
          },
          async clearAllMarca () {
               this.selectedMarca = []
               this.axiosMarca = []
               try{
                    let sendSolicitud = await axios.get('/api/v1/get-filters')
                    // console.log(sendSolicitud)
                    if (sendSolicitud.status === 200){
                         this.listMarcas = sendSolicitud.data.data.marcas
                    }
               }catch (error) {
                    console.log(error)
               } finally {
                    console.log('final')
               }
               this.viewProducts()
          },
          selectCombustible: function(id, value){
               let _element = $(`#checkCombustible-${id}`)
               // console.log(`checkCombustible-${id}`)
               if (_element.hasClass('active')){
                    let i = this.typeCombustible.indexOf(value)
                    if ( i !== -1 ) {
                         this.typeCombustible.splice( i, 1 )
                    }
                    _element.removeClass('active')
               }else{
                    _element.addClass('active')
                    this.typeCombustible.push(value)
               }
               // console.log(this.typeCombustible)
               this.viewProducts()
          },
          selectNroCilindro: function(id, value){
               let _element = $(`#checkNroCilindro-${id}`)
               // console.log(`checkFrenos-${id}`)
               if (_element.hasClass('active')){
                    let i = this.typeNroCilindro.indexOf(value)
                    if ( i !== -1 ) {
                         this.typeNroCilindro.splice( i, 1 )
                    }
                    _element.removeClass('active')
               }else{
                    _element.addClass('active')
                    this.typeNroCilindro.push(value)
               }
               // console.log(this.typeNroCilindro)
               this.viewProducts()
          },
          selectFrenos: function(id, value){
               let _element = $(`#checkFrenos-${id}`)
               // console.log(`checkFrenos-${id}`)
               if (_element.hasClass('active')){
                    let i = this.typeFrenos.indexOf(value)
                    if ( i !== -1 ) {
                         this.typeFrenos.splice( i, 1 )
                    }
                    _element.removeClass('active')
               }else{
                    _element.addClass('active')
                    this.typeFrenos.push(value)
               }
               // console.log(this.typeFrenos)
               this.viewProducts()
          },
          selectColor: function(id, value){
               let _element = $(`#checkColor-${id}`)
               // console.log(`checkTransmision-${id}`)
               if (_element.hasClass('active')){
                    let i = this.typeColors.indexOf(value)
                    if ( i !== -1 ) {
                         this.typeColors.splice( i, 1 )
                    }
                    _element.removeClass('active')
               }else{
                    _element.addClass('active')
                    this.typeColors.push(value)
               }
               console.log(this.typeColors)
               this.viewProducts()
          },
          selectTransmision: function(id, value){
               let _element = $(`#checkTransmision-${id}`)
               // console.log(`checkTransmision-${id}`)
               if (_element.hasClass('active')){
                    let i = this.typeTransmision.indexOf(value)
                    if ( i !== -1 ) {
                         this.typeTransmision.splice( i, 1 )
                    }
                    _element.removeClass('active')
               }else{
                    _element.addClass('active')
                    this.typeTransmision.push(value)
               }
               // console.log(this.typeTransmision)
               this.viewProducts()
          },
          selectEstilo: function(id, value){
               
               let _element = $(`#boxOptionEstilo-${id}`)
               if (_element.hasClass('active')){
                    let i = this.typeEstilo.indexOf(value)
                    if ( i !== -1 ) {
                         this.typeEstilo.splice( i, 1 )
                    }
                    _element.removeClass('active')
               }else{
                    console.log(`#boxOptionEstilo-${id}`)
                    _element.addClass('active')
                    this.typeEstilo.push(value)
               }
               // console.log(this.typeEstilo)
               this.viewProducts()
          },
          selectPosicion: function(id, value){
               
               let _element = $(`#boxOptionPosition-${id}`)
               if (_element.hasClass('active')){
                    let i = this.typePosition.indexOf(value)
                    if ( i !== -1 ) {
                         this.typePosition.splice( i, 1 )
                    }
                    _element.removeClass('active')
               }else{
                    _element.addClass('active')
                    this.typePosition.push(value)
               }
               // console.log(this.typePosition)
               this.viewProducts()

          },
          clearCombustible: function(){
               this.typeCombustible = []
               $('#boxMultiSelectCheckCombustible a').removeClass('active')
               // console.log(this.typeCombustible)
          },
          clearNroCilindros: function(){
               this.typeNroCilindro = []
               $('#boxMultiSelectCheckNroCilindros a').removeClass('active')
               // console.log(this.typeNroCilindro)
               this.viewProducts()
          },
          clearFrenos: function(){
               this.typeFrenos = []
               $('#boxMultiSelectCheckFrenos a').removeClass('active')
               // console.log(this.typeFrenos)
               this.viewProducts()

          },
          clearColor: function(){
               this.typeColors = []
               $('#boxMultiSelectCheckColor a').removeClass('active')
               // console.log(this.typeColors)
               this.viewProducts()
          },
          clearTransmision: function(){
               this.typeTransmision = []
               $('#boxMultiSelectCheckTransimision a').removeClass('active')
               // console.log(this.typeTransmision)
               this.viewProducts()
          },
          clearEstilo: function(){
               this.typeEstilo = []
               $('#boxMultiSelectEstilo a').removeClass('active')
               // console.log(this.typeEstilo)
               this.viewProducts()
          },
          clearPosicion: function(){
               this.typePosition = []
               $('#boxMultiSelectPosicion a').removeClass('active')
               // console.log(this.typePosition)
               this.viewProducts()
          },
          clearPotencia: function(){

               let _this = this
               this.ionRangePotencia.update({
                    from: _this.montoResetPotenciaInicial,
                    to:  _this.montoResetPotenciaFinal,
               })
               this.ionRangePotencia.reset()
               this.montoPotenciaInicial = this.montoResetPotenciaInicial
               this.montoPotenciaFinal = this.montoResetPotenciaFinal
               _this.dameRangoPotencia()
               this.viewProducts()

          },
          clearCilindrada: function(){
               let _this = this
               this.ionRangeCilindrada.update({
                    from: _this.montoResetCilindradaInicial,
                    to:  _this.montoResetCilindradaFinal,
               })
               this.ionRangeCilindrada.reset()
               this.montoCilindradaInicial = this.montoResetCilindradaInicial
               this.montoCilindradaFinal = this.montoResetCilindradaFinal
               _this.dameRangoCilindrada()
               this.viewProducts()
          },
          clearPrice: function(){
               let _this = this
               this.ionRangePrice.update({
                    from: _this.montoResetInicial,
                    to:  _this.montoResetFinal,
               })
               this.ionRangePrice.reset()
               this.montoInicial = this.montoResetInicial
               this.montoFinal = this.montoResetFinal
               _this.dameRangoPrecio()
               this.viewProducts()
          },
          clearRendimiento: function(){
               let _this = this
               this.ionRangeRendimiento.update({
                    from: _this.montoResetRendimientoInicial,
                    to:  _this.montoResetRendimientoFinal,
               })
               this.ionRangeRendimiento.reset()
               this.montoRendimientoInicial = this.montoResetRendimientoInicial
               this.montoRendimientoFinal = this.montoResetRendimientoFinal
               _this.dameRangoRendimiento()
               this.viewProducts()
          },
          dameRangoRendimiento: function(){
               console.log(this.montoRendimientoInicial)
               console.log(this.montoRendimientoFinal)
               if (this.timeLoad > 0)
                    this.viewProducts()
          },
          dameRangoPotencia: function(){
               console.log(this.montoPotenciaInicial)
               console.log(this.montoPotenciaFinal)
               if (this.timeLoad > 0)
                    this.viewProducts()
          },
          dameRangoCilindrada: function(){
               console.log(this.montoCilindradaInicial)
               console.log(this.montoCilindradaFinal)
               if (this.timeLoad > 0)
                    this.viewProducts()
          },
          dameRangoPrecio: function(){
               console.log(this.montoInicial)
               console.log(this.montoFinal)
               if (this.timeLoad > 0)
                    this.viewProducts()
          },
          formatRendimiento: function (value) {
               // let val = (value/1).toFixed(2).replace('.', ',')
               let val = value
               return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' Km/gl'
          },
          formatCilindrada: function (value) {
               // let val = (value/1).toFixed(2).replace('.', ',')
               let val = value
               return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' cc'
          },
          formatPotencia: function (value) {
               // let val = (value/1).toFixed(2).replace('.', ',')
               let val = value
               return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' HP'
          },
          initRendimientoSliderRange: function(){
               
               let barRange = '#sliderBarRendimientoRange'
               var _this = this
               $(barRange).ionRangeSlider({
                    // type: "double",
                    min: _this.montoResetRendimientoInicial,
                    max: _this.montoResetRendimientoFinal,
                    from: _this.montoResetRendimientoInicial,
                    to: _this.montoResetRendimientoFinal,
                    step: 1,
                    prettify_separator: ",",
                    postfix: " km/gl",
                    prefix: "Min. ",
                    hide_min_max: true,
                    grid: true,
                    grid_snap: true,
                    from_fixed: false,  // fix position of FROM handle
                    to_fixed: false ,    // fix position of TO handle
                    onStart: function (data) {
                         // fired then range slider is ready
                         // console.log(`onStart2 ${data}`)
                         // console.log(data)
                         _this.montoRendimientoInicial = data.from
                         _this.montoRendimientoFinal = data.to
                         _this.dameRangoRendimiento()
                    },
                    onChange: function (data) {
                         // fired on every range slider update
                         // console.log(`onChange ${data}`)
                    },
                    onFinish: function (data) {
                         // Aqui es donde debo procesar la funcion
                         // console.log(`onFinish2 ${data}`)
                         // console.log(data)
                         _this.montoRendimientoInicial = data.from
                         _this.montoRendimientoFinal = data.to
                         _this.dameRangoRendimiento()
                    },
                    onUpdate: function (data) {
                         // fired on changing slider with Update method
                         // console.log(`onUpdate ${data}`)
                    }
               })
               this.ionRangeRendimiento = $(barRange).data("ionRangeSlider")


               
          },
          initPotenciaSliderRange: function(){
               let barRange = '#sliderBarPotencia'
               var _this = this
               $(barRange).ionRangeSlider({
                    type: "double",
                    min: _this.montoPotenciaInicial,
                    max: _this.montoPotenciaFinal,
                    from: _this.montoPotenciaInicial,
                    to: _this.montoPotenciaFinal,
                    step: 1,
                    prettify_separator: ",",
                    postfix: " HP",
                    hide_min_max: true,
                    grid: true,
                    grid_snap: true,
                    from_fixed: false,  // fix position of FROM handle
                    to_fixed: false ,    // fix position of TO handle
                    onStart: function (data) {
                         // fired then range slider is ready
                         // console.log(`onStart2 ${data}`)
                         // console.log(data)
                         _this.montoPotenciaInicial = data.from
                         _this.montoPotenciaFinal = data.to
                         _this.dameRangoPotencia()
                    },
                    onChange: function (data) {
                         // fired on every range slider update
                         // console.log(`onChange ${data}`)
                    },
                    onFinish: function (data) {
                         // Aqui es donde debo procesar la funcion
                         // console.log(`onFinish2 ${data}`)
                         // console.log(data)
                         _this.montoPotenciaInicial = data.from
                         _this.montoPotenciaFinal = data.to
                         _this.dameRangoPotencia()
                    },
                    onUpdate: function (data) {
                         // fired on changing slider with Update method
                         // console.log(`onUpdate ${data}`)
                    }
               })
               this.ionRangePotencia = $(barRange).data("ionRangeSlider")
               
          },
          initCilindradaSliderRange: function(){
               let barRange = '#sliderBarCilindrada'
               var _this = this
               $(barRange).ionRangeSlider({
                    type: "double",
                    min: _this.montoCilindradaInicial,
                    max: _this.montoCilindradaFinal,
                    from: _this.montoCilindradaInicial,
                    to: _this.montoCilindradaFinal,
                    step: 1,
                    prettify_separator: ",",
                    postfix: " cc",
                    hide_min_max: true,
                    grid: true,
                    grid_snap: true,
                    from_fixed: false,  // fix position of FROM handle
                    to_fixed: false ,    // fix position of TO handle
                    onStart: function (data) {
                         // fired then range slider is ready
                         // console.log(`onStart2 ${data}`)
                         // console.log(data)
                         _this.montoCilindradaInicial = data.from
                         _this.montoCilindradaFinal = data.to
                         _this.dameRangoCilindrada()
                    },
                    onChange: function (data) {
                         // fired on every range slider update
                         // console.log(`onChange ${data}`)
                    },
                    onFinish: function (data) {
                         // Aqui es donde debo procesar la funcion
                         // console.log(`onFinish2 ${data}`)
                         // console.log(data)
                         _this.montoCilindradaInicial = data.from
                         _this.montoCilindradaFinal = data.to
                         _this.dameRangoCilindrada()
                    },
                    onUpdate: function (data) {
                         // fired on changing slider with Update method
                         // console.log(`onUpdate ${data}`)
                    }
               })
               this.ionRangeCilindrada = $(barRange).data("ionRangeSlider")


               
          },
          initPriceSliderRange: function() {
               let barRange = '#sliderBarPriceRange'
               let _this = this
               $(barRange).ionRangeSlider({
                    type: "double",
                    min: _this.montoInicial,
                    max: _this.montoFinal,
                    from: _this.montoInicial,
                    to: _this.montoFinal,
                    hide_min_max: true,
                    prettify_separator: ",",
                    prefix: "S/ ",
                    step: 100,
                    grid: true,
                    grid_snap: true,
                    from_fixed: false,  // fix position of FROM handle
                    to_fixed: false ,    // fix position of TO handle
                    onStart: function (data) {
                         // fired then range slider is ready
                         // console.log(`onStart ${data}`)
                         
                         _this.dameRangoPrecio()
                         setTimeout( function(){
                              _this.timeLoad = 1
                         }, 2000)
                         
                    },
                    onChange: function (data) {
                         // fired on every range slider update
                         // console.log(`onChange ${data}`)
                    },
                    onFinish: function (data) {
                         // Aqui es donde debo procesar la funcion
                         // console.log(`onFinish ${data}`)
                         // console.log(data.from)
                         _this.montoInicial = data.from
                         _this.montoFinal = data.to
                         _this.dameRangoPrecio()
                    },
                    onUpdate: function (data) {
                         // fired on changing slider with Update method
                         // console.log(`onUpdate ${data}`)
                    }
               })
               this.ionRangePrice = $(barRange).data("ionRangeSlider")
          },
          
     }
}
</script>