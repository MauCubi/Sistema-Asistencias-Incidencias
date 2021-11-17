@extends('partials.admin')



@section('content')


<div class="container">
  <div id="agenda">

  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nueva Incidencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="" id="event-form">
          @csrf
          <div class="form-group d-none">
            <input type="hidden" class="form-control" title="id" id="id" aria-describedby="helpId" placeholder="">
          </div> 

          <div class="form-group">
            <label for="title">Nombre Incidencia</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="">
          </div>

          <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
          </div>

          <div class="form-group">
            <input type="hidden" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">

          </div>

          <div class="form-group">
            <input type="hidden" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">

          </div>

          <div class="form-group d-none">
            <input type="hidden" class="form-control" title="user-id" id="user-id" aria-describedby="helpId" placeholder="">
          </div> 

        </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
        <button type="button" class="btn btn-warning" id="btnEditar">Editar</button>
        <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>


      </div>
    </div>
  </div>
</div>

<br>

<script src="{{asset('fullcalendar/agenda-personal.js')}}"></script>
{{-- <script>

let formulario = document.querySelector("form");

document.getElementById("btnGuardar").addEventListener("click", function(){

const datos = new FormData(formulario);
console.log(formulario.title.value);



axios.post('/event/store', datos)
  .then(response => { 
    console.log(response)
    $("#event").modal("hide");
 })
 .catch(error => {
   console.log(error.response)
 });

});



</script> --}}



@endsection