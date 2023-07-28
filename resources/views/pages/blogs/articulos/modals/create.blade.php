<div class="row row-alert"></div>

<form action="{{ route('category.banner.store',$category->id) }}" method="POST" id="form-banners-create"
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
            <label for="sub_title">Descripción Corta </label>
            <label class="field">
                <input type="text" id="sub_title" required class="form-control gui-input"
                       name="sub_title"
                       placeholder="Ingresar Descripción Corta"
                >
            </label>


        </div>

        <div class="form-group">
            <label for="description">Description </label>
            <textarea id="description" class=" form-control"
                      name="description"
                      placeholder="Ingresar Description" ></textarea>
        </div>

        <div class="form-group">
            <label for="avatar">Imagen (*) </label>
            <div class="custom-file">
                <input accept="image/*" name="images" class="custom-file-input" id="avatar"
                       lang="es" type="file" >
                <label id="file-desktop" class="custom-file-label" for="avatar"></label>
            </div>
            <small>* [1440*550] Sólo imágenes JPG y PNG, Máximo de 1M</small>
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
            <label for="image_mobile">Imagen Movil(*) </label>
            <div class="custom-file">
                <input accept="image/*" name="image_mobile" class="custom-file-input" id="image_mobile"
                       lang="es" type="file" >
                <label id="file-mobile" class="custom-file-label" for="image_mobile"></label>
            </div>
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
