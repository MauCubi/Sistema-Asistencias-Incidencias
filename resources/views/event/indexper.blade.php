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
        <h5 class="modal-title">Incidencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          {{-- <label class="control-label" id="title"><strong>Titulo:</strong></label> --}}
            {{-- <label for="title">Nombre Incidencia</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder=""> --}}

{{--           
          <label class="control-label" id="tipoevento_id" value=""><strong>Tipo de Incidencia:</strong></label>
          

          
            <label class="control-label" id="description" value=""><strong>Detalles:</strong></label>   
            
            <label class="control-label" id="start" value=""><strong>Empieza:</strong></label>      

            <label class="control-label" id="end" value=""><strong>Termina:</strong></label>      --}}



    
              <div class="form-group">
                <label for="title"><strong>Incidencia: </strong></label><b> </b><label id="title"> </label>
              </div>  

    
              <div class="form-group">
                <label for="start"><strong>Empieza: </strong></label><b> </b><label id="start"> </label>
              </div>
    
              <div class="form-group">
                <label for="end"><strong>Termina: </strong></label><b> </b><label id="end"> </label>
              </div>

              <div class="form-group">
                <label for="description"><strong>Detalles: </strong></label><b> </b><label id="description"> </label>
              </div>
    
              {{-- <div class="form-group d-none">
                <input type="hidden" class="form-control" title="user-id" id="user-id" aria-describedby="helpId" placeholder="">
              </div>  --}}
    
            



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