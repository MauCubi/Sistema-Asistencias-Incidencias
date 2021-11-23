@extends('partials.admin')

{{-- INDEX GENERALES --}}

@section('content')
<div class="row d-flex flex-row">
    <div class="p-2">
        <h3 class="text-primary">Listado de Incidencias Generales</h3>
    </div>
</div>

{{-- <a class="btn btn-success mt-3 mb-3" href="{{ route('empresa.create') }}">Crear</a> --}}


@include('partials.session-status')
<p class="alert alert-info d-none d-sm-block animated fadeIn" >
    Desde aquí, podrá <strong>crear, editar</strong> o <strong>dar de baja</strong> una Incidencia General.
</p>
<table class="table table-bordered table-hover table-responsive-sm shadow table-sm">
    <thead class="bg-dark text-white">
        <tr>
            <td>
                Id
            </td>
            <td>
                Titulo
            </td>        
            <td>
                Tipo de Incidencia
            </td>
            <td>
                Fecha de Inicio
            </td>   
            <td>
                Fecha de Finalización
            </td>         
            <td>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('event.create') }}" >
                        <button class="btn btn-success btn-sm" type="button"><i class="fa fw fa-plus"></i> Nuevo</button>
                    </a>
                </div>
            </td>
        </tr>
    </thead>
    <tbody>
       @foreach ( $events as $event)
       <tr>
            <td>
                {{ $event->id }}
            </td>
            <td>
                {{ $event->title }}
            </td>
            <td>
                {{ $event->tipoevento->nombre }}
            </td>
            <td>
                {{ $event->start->format('Y-m-d') }}
            </td>
            <td>
                {{ $event->end->format('Y-m-d') }}
            </td>
            <td>
                <div class="d-flex justify-content-center">
                <a href="{{ route('event.show', $event->id)}}" class="btn btn-primary mr-2 btn-sm"><i class="fa fw fa-info"></i> Ver</a>
                <a href="{{ route('event.edit', $event->id)}}" class="btn btn-warning mr-2 btn-sm"><i class="fa fw fa-edit"></i> Editar</a>
                
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-id="{{ $event->id }}"><i class="fas fa-trash"></i> Eliminar</button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- {{ $events->links() }} --}}

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Seguro que desea borrar el registro seleccionado?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form  id="formDelete" action="{{ route('event.destroy',0) }}" method="POST" data-action="{{ route('event.destroy',0) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    window.onload = function() {
    $('#deleteModal').on('show.bs.modal', function (event) {  
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  action = $('#formDelete').attr('data-action').slice(0,-1)
  action += id
  console.log(action)

  $('#formDelete').attr('action', action)
  
  
  var modal = $(this)
  modal.find('.modal-title').text('Vas a borrar la incidencia: ' + id)
})
}
</script>

@endsection

