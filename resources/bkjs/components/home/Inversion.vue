<template>
     <div>
          <div class="boxInversion">
               <div class="boxBackground">
                    <div class="container-fluid ">
                         <div class="boxContent">
                              <div class="d-flex justify-content-center align-items-center flex-column">
                                   <div>
                                        <div class="boxTitle">
                                             <h2 class="txtUpperCase txtCenter">
                                                  protégete a ti <br>
                                                  y a tu inversión
                                             </h2>
                                        </div>
                                        <div class="boxDescription mt-2">
                                             <p class="txtCenter">
                                                  Ahora comprar tu SOAT digital y el Seguro <br>
                                                  Todo Riesgo es más fácil.
                                             </p>
                                        </div>
                                        <div class="d-flex justify-content-center justify-content-md-center  align-items-center align-items-md-start listButtons mt-4 flex-column flex-md-row">
                                             <div class="boxButton btnSmall sinborder mb-3">
                                                  <button v-on:click="irInversion($event,'soat-para-moto')">SOAT para moto</button>
                                             </div>
                                             <div class="boxButton btnSmall sinborder">
                                                  <button v-on:click="irInversion($event,'seguro-todo-riesgo')">SEGURO todo riesgo</button>
                                             </div>
                                        </div>
                                        <div class="boxSoat d-flex justify-content-center align-items-center ">
                                             <a href="#" target="_blank">
                                                  <img src="/frontend/images/soat.png" alt="Soat">
                                             </a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</template>
<script>
export default {
     methods: {
          irInversion: function(event,url){
               event.preventDefault()
               top.location.href = `/${url}`
          }
     }
}
</script>