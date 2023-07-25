<div class="row row-alert" ></div>

        <form action="{{ route('administrator.register') }}" method="POST" id="form-administrator-create" class="form-horizontal needs-validation">
           @csrf
          <div class="modal-body admin-form">
              <div class="form-group row">
                <label class="col-sm-3 control-label" for="roles">Rol</label>
                <div class="col-sm-9">
                  <label class="field select">
                    <select name="role[]" id="cmb_rol" class="form-control  gui-input" placeholder="Seleccione un rol" style="width: 100%">
                      <option ></option>
                      @foreach($roles as $id => $name)
                        <option value="{{$id}}" >{{$name}}</option>
                      @endforeach
                    </select>
                  </label>
                </div>
              </div>
              
                <div class="form-group row">
                  <label for="nombre" class="col-sm-3 control-label">Nombre</label>
                  <div class="col-sm-9">
                    <label class="field">
                      <input type="text" name="nombre" id="nombre" class="form-control gui-input" required  placeholder="Nombre del Usuario" >
                    </label>
                  </div>
                </div>
                <!--<div class="form-group row">
                  <label for="apellidos" class="col-sm-3 control-label">Apellidos</label>
                  <div class="col-sm-9">
                    <label class="field">
                      <input type="text" name="apellidos" class="form-control gui-input" id="apellidos" placeholder="Apellidos del Usuario" >
                    </label>
                  </div>
                </div>-->
              
              
              <div class="form-group row">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                  <label class="field">
                    <input type="text" name="email" id="email" class="form-control gui-input" placeholder="Email..." >
                  </label>
                  
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-sm-3 control-label">Contraseña</label>
                <div class="col-sm-9">
                  <label class="field">
                    <input type="password" name="password" id ="password" class="form-control gui-input" placeholder="Password..." >
                  </label>
                </div>
              </div>
          </div>
        </form>
      
