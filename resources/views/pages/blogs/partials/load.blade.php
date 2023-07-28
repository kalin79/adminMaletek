
<table id="tbl-slider" class="table table-striped mb-0">
    <thead>
        <tr>

            <th width="200px">Poster</th>
            <th>Articulo</th>
            <th>Descripción Corta</th>
            <th>Fecha Publicación</th>
            <th>Estado</th>
            <th width="150px">Opciones</th>
        </tr>
    </thead>
<tbody>
    @forelse ($articulos as $blog)
        <tr>

                <td>
                    @if($blog->imagen_portada )
                    <img src="/images/articulos/{{$blog->id}}/{{ $blog->imagen_portada }}"
                        width="80px">
                    @endif
                </td>

            <td>
                {{ $blog->titulo }}

            </td>
            <td>
                {{ $blog->descripcion_corta }}
            </td>
            <td>
                {{ $blog->fecha }}
            </td>
            @if ($blog->active)
                <td><span class="badge badge-success">Activo</span></td>
            @else
                <td><span class="badge badge-danger">No-Activo</span></td>
            @endif
            <td width="150px">

                <a title="Editar" data-name="{{ $blog->titulo }}" href="{{ route('blogs.edit', $blog->id) }}"
                    class="btn btn-outline-info btn-sm edit-entity">
                    <i class="fa fa-pen"></i>
                </a> &nbsp;
                <button onclick="eliminar({{ $blog->id }},'{{ route('blogs.delete', $blog->id) }}')"
                    title="Dar de baja" class="btn btn-outline-danger btn-sm" data-id="{{ $blog->id }}">
                    <i class="fa fa-trash"></i>
                </button> &nbsp;
                @if ($blog->active == 1)
                    <button onclick="desactivar({{ $blog->id }},'{{ route('blogs.desactive') }}')" title="Desactivar"
                        data-id="{{ $blog->id }}" class="btn btn-outline-warning btn-sm">
                        <i class="fa fa-ban"></i>
                    </button>
                @else

                    <button onclick="activar({{ $blog->id }},'{{ route('blogs.active') }}')" title="Activar"
                        data-id="{{ $blog->id }}" class="btn btn-outline-success  btn-sm">
                        <i class="fa fa-check "></i>
                    </button>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="text-center text-muted"><span>No se encontraron resultados</span></td>
        </tr>
    @endforelse

</tbody>
<tfoot>
    <tr>
        <td colspan="4">{{ $articulos->links() }}</td>
        <td><span>Total: </span> <b>{{ $articulos->total() }}</b></td>
    </tr>
</tfoot>
</table>
