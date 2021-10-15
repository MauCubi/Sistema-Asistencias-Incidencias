@extends('master')


@section('content')

<a class="btn btn-success mt-3 mb-3" href="{{ route('empresa.create') }}">Crear</a>

<table class="table">
    <thead>
        <tr>
            <td>
                Id
            </td>
            <td>
                Nombre
            </td>            
            <td>

            </td>
        </tr>
    </thead>
    <tbody>
       @foreach ( $empresas as $empresa)
            <td>
                {{ $empresa->id }}
            </td>
            <td>
                {{ $empresa->nombre }}
            </td>
            <td>
                <a href="{{ route('empresa.show', $empresa->id)}}" class="btn btn-primary">Ver</a>
                <a href="{{ route('empresa.edit', $empresa->id)}}" class="btn btn-warning">Editar</a>
                
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="">Eliminar</button>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $empresas->links() }}

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
                <form  id="formDelete" action="{{ route('empresa.destroy',0) }}" method="POST" data-action="{{ route('empresa.destroy',0) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Eliminar</button>
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
  modal.find('.modal-title').text('Vas a borrar la empresa: ' + id)
})
}
</script>

@endsection