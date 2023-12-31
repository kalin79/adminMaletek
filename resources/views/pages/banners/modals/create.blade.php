<div class="row row-alert"></div>

<form action="{{ route('banner.store') }}" method="POST" id="form-banners-create"
      class="form-horizontal needs-validation">
    @csrf
    <div class="modal-body admin-form">
        <div class="form-group">
            <label for="title">Título </label>
            <label class="field">
                <input type="text" id="title" required class="form-control gui-input"
                       name="title"
                       placeholder="Ingresar Título"
                >
            </label>


        </div>

        <div class="form-group">
            <label for="description">Description </label>
            <textarea id="description" class=" form-control"
                      name="description"
                      placeholder="Ingresar Description" ></textarea>
        </div>
        <div class="row">
            <div class="form-group col-sm-4" style="display:none">
                <label for="button">Acción</label>
                <input type="text" id="button" class="form-control"
                       name="button"
                       placeholder="Comprar"
                >

            </div>

            <div class="form-group col-sm-12" >
                <label for="link">Link </label>
                <input type="text" id="link" class="form-control"
                       name="link"
                       placeholder="https://"
                >

            </div>
        </div>
        <div class="form-group">
            <label for="avatar">Imagen Derecha (*) </label>
            <div class="custom-file">
                <input accept="image/*" name="images" class="custom-file-input" id="avatar"
                       lang="es" type="file" >
                <label id="file-desktop" class="custom-file-label" for="avatar"></label>
            </div>
            <small>* [946*641]px Aproximado</small>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="font-icon-wrapper float-left mr-3 mb-3">
                    <img src="" class="rounded-circle img-custom"
                         id='img-upload'
                         width="100"/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="image_mobile">Imagen Logo(*) </label>
            <div class="custom-file">
                <input accept="image/*" name="image_mobile" class="custom-file-input" id="image_mobile"
                       lang="es" type="file" >
                <label id="file-mobile" class="custom-file-label" for="image_mobile"></label>
            </div>
            <small>* [140*105]px Aproximado</small>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="font-icon-wrapper float-left mr-3 mb-3">
                    <img src="" class="rounded-circle img-custom"
                         id='img-upload-mobile'
                         width="100"/>
                </div>
            </div>
        </div>
    </div>
</form>
