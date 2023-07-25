<template>
     <div>
          <div class="boxSuscrite">
               <div class="boxSubTitle mb-3">
                    <h2>
                         Suscríbete y recibe las mejores <br>
                         ofertas de motocicletas 
                    </h2>
               </div>
               <form>
                    <div class="row">
                         <div class="col">
                              <div class="d-flex justify-content-center align-items-center flex-column flex-md-row justify-content-md-center ">
                                   <div class="boxInpunt relative">
                                        <form class="" name="formSuscribete" id="formSuscribete" v-on:submit="sendData" method="POST">
                                             <input type="text" name="email" id="email" v-model="form.email" placeholder="Ingresa tu email" />
                                             <div class="boxButton btnSmall sinborder">
                                                  <button type="submit">ENVIAR</button>
                                             </div>
                                             <div class="alert alert-success mt-3" id="msnSuscripcion" role="alert">
                                             A simple success alert—check it out!
                                             </div>
                                        </form>
                                   </div>
                              </div>
                              
                         </div>
                    </div>
               </form>
          </div>
     </div>
</template>
<script>
export default {
     data: function () {
          return {
               form: {
                    email: "",
               }
          }
     },
     mounted: function() {
          this.loadForm()
     },
     methods: {
          loadForm: function(){
               $( "#formSuscribete" ).validate({
                    rules: {
                         email: {
                              required: true,
                              email: true
                         }
                    },
                    messages: {
                         email: {
                              required: "Debe completar un correo válido",
                              email: "Debe completar un correo válido"
                         },
                    }
               })
          },
          async sendData(event) {
               let formData = new FormData()
               event.preventDefault()
               if ($("#formSuscribete").valid()) {
                    formData.append("email", this.form.email)
                    try{
                         let sendSolicitud = await axios.post('/api/v1/subscription',formData)
                         console.log(sendSolicitud)
                         if (sendSolicitud.status === 201) {
                              $("#msnSuscripcion").addClass("active")
                              $("#msnSuscripcion").html("Se registro su correo")
                              this.form.email = ""
                         }
                    }catch (error) {
                         console.log(error)
                    } finally {
                         console.log('final')
                    }
               }
          },
     },
}
</script>