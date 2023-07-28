<table id="tbl-slider" class="table table-striped mb-0">
    <thead>
        <tr>
            <th width="200px">Imagen</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
    </thead>
<tbody>
    @forelse ($articulos as $articulo)
        <tr >
            <td>
                @if($articulo->poster)
                <img src="{{ asset('images/blog') }}/{{$blog->id}}/articulos/{{ $articulo->id }}/{{ $articulo->principal }}"
                     width="200px">
                @endif
            </td>
            <td>
                {{ $articulo->titulo }}
                <br>
                <small>{{ $articulo->sub_titulo}}</small>
            </td>

            <td>{{ $articulo->fecha }}</td>
            @if ($articulo->active)
                <td><span class="badge badge-success">Activo</span></td>
            @else
                <td><span class="badge badge-danger">No-Activo</span></td>
            @endif
            <td width="150px">

                <a title="Editar" data-name="{{ $articulo->title }}" href="{{ route('blog.articulo.edit', ['blog' => $blog->id,'articulo' =>  $articulo->id]) }}"
                    class="btn btn-outline-info btn-sm edit-entity">
                    <i class="fa fa-pen"></i>
                </a> &nbsp;
                <button onclick="eliminar({{ $articulo->id }},'{{ route('blog.articulo.destroy', [ 'blog' => $blog->id, 'articulo' => $articulo->id]) }}')"
                    title="Dar de baja" class="btn btn-outline-danger btn-sm" data-id="{{ $articulo->id }}">
                    <i class="fa fa-trash"></i>
                </button> &nbsp;
                @if ($articulo->active == 1)
                    <button onclick="desactivar({{ $articulo->id }},'{{ route('blog.articulo.desactive') }}')" title="Desactivar"
                        data-id="{{ $articulo->id }}" class="btn btn-outline-warning btn-sm">
                        <i class="fa fa-ban"></i>
                    </button>
                @else

                    <button onclick="activar({{ $articulo->id }},'{{ route('blog.articulo.active') }}')" title="Activar"
                        data-id="{{ $articulo->id }}" class="btn btn-outline-success  btn-sm">
                        <i class="fa fa-check "></i>
                    </button>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center text-muted"><span>No se encontraron resultados</span></td>
        </tr>
    @endforelse

</tbody>
<tfoot>
    <tr>
        <td colspan="4">{{ $banners->links() }}</td>
        <td><span>Total: </span> <b>{{ $banners->total() }}</b></td>
    </tr>
</tfoot>
</table>
