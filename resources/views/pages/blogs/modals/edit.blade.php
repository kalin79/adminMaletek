<div class="row row-alert"></div>

<form action="{{ route('blogs.update',$articulo->id) }}" method="POST" id="form-blog-edit"
    class="form-horizontal needs-validation">
    @csrf
    <div class="modal-body admin-form">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="titulo">Título </label>
                <label class="field">
                    <input type="text" id="titulo" required class="form-control gui-input"
                           name="titulo"
                           placeholder="Ingresar Título" value="{{$articulo->titulo}}"
                    >
                </label>
            </div>

            <div class="form-group col-md-6">
                <label for="sub_titulo">Sub Titulo </label>
                <input type="text" id="sub_titulo" required class="form-control gui-input"
                       name="sub_titulo"
                       placeholder="Ingresar Sub Título" value="{{$articulo->titulo}}"
                >
            </div>

        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="etiqueta">Hashtag </label>
                <label class="field">
                    <input type="text" id="etiqueta" required class="form-control gui-input"
                           name="etiqueta"
                           placeholder="Ingresar Título" value="{{$articulo->etiqueta}}"
                    >
                </label>
            </div>

            <div class="form-group col-md-6">
                <label for="fecha">Fecha </label>
                <input type="text" id="fecha" required class="form-control"
                       name="fecha"
                       placeholder="Ingresar fecha" value="{{$articulo->fecha}}"
                >

            </div>

        </div>

        <div class="row">

            <div class="form-group col-md-4">
                <label for="image_poster">Poster (*) </label>
                <div class="custom-file">
                    <input accept="image/*" name="imagen_portada" class="custom-file-input" id="image_poster"
                           lang="es" type="file" >
                    <label id="file-poster" class="custom-file-label" for="image_poster"></label>
                </div>
                <small>* Sólo imágenes JPG y PNG, Máximo de 1M</small>
                <div class="col-sm-12">
                    <div class="font-icon-wrapper float-left mr-3 mb-3">
                        <img src="{{asset('images/articulos')}}/{{$articulo->id}}/{{$articulo->imagen_portada}}" class="rounded-circle img-custom"
                             id='img-upload-poster'
                             width="100"/>
                    </div>
                </div>
                <br>

            </div>
            <div class="form-group col-md-4">
                <label for="avatar">Imagen</label>
                <div class="custom-file">
                    <input accept="image/*" name="imagen_banner" class="custom-file-input" id="imagen"
                           lang="es" type="file" >
                    <label id="file-desktop" class="custom-file-label" for="avatar"></label>
                </div>
                <small>* Sólo imágenes JPG y PNG, Máximo de 1M</small>

                <br>

                <div class="col-sm-12">
                    <div class="font-icon-wrapper float-left mr-3 mb-3">
                        <img src="{{asset('images/articulos')}}/{{$articulo->id}}/{{$articulo->imagen_banner}}" class="rounded-circle img-custom"
                             id='img-upload'
                             width="100"/>
                    </div>
                </div>

            </div>


            <div class="form-group col-md-4">
                <label for="imagen_banner_mobile">Imagen Movil(*) </label>
                <div class="custom-file">
                    <input accept="image/*" name="imagen_banner_mobile" class="custom-file-input" id="image_mobile"
                           lang="es" type="file" >
                    <label id="file-mobile" class="custom-file-label" for="imagen_banner_mobile"></label>
                </div>
                <small>* Sólo imágenes JPG y PNG, Máximo de 1M</small>
                <div class="col-sm-12">
                    <div class="font-icon-wrapper float-left mr-3 mb-3">
                        <img src="{{asset('images/articulos')}}/{{$articulo->id}}/{{$articulo->imagen_banner_mobile}}" class="rounded-circle img-custom"
                             id='img-upload-mobile'
                             width="100"/>
                    </div>
                </div>
                <br>

            </div>

        </div>

        <div class="row ">

            <div class=" col-md-6">
                <label for="descripcion_historia_2"><b>Descripcion</b></label>
                <label class="field">
                                    <textarea id="descripcion_historia_2" class="form-control form-control-sm gui-input tinymce"
                                              name="contenido"
                                              placeholder="descripcion_historia_2" >{{$articulo->contenido}}</textarea>
                </label>
            </div>
            <div class=" col-md-6">
                <label for="descripcion_corta"><b>Descripcion Corta</b></label>
                <label class="field">
                                    <textarea id="descripcion_historia_1" class="form-control form-control-sm gui-input tinymce"
                                              name="descripcion_corta"
                                              placeholder="descripcion_historia_1" >{{$articulo->descripcion_corta}}</textarea>
                </label>
            </div>


        </div>

    </div>
</form>
