@csrf
<div class="card">
    <div class="card-body">
<div class="row">
<div class="form-group col-md-6 mb-3">
    <label for="nombre" class="col-form-label col-form-label-sm">Nombre</label>
    
    <input class="form-control form-control-sm" type="text" name="nombre" id="nombre" value="{{ old('nombre', $tipoevento->nombre)}}" required autofocus>
    
    @error('nombre')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
</div>


{{-- 
<div class="row">
<div class="form-group col-md-3 mb-3">
    <label for="general" class="col-form-label col-form-label-sm">General</label>
    <input class="form-control form-control-sm" type="checkbox" name="general" id="general">


</div>

<div class="form-group col-md-3 mb-3">
    <label for="descuento" class="col-form-label col-form-label-sm">Descuento</label>
    <input class="form-control form-control-sm" type="checkbox" name="descuento" id="descuento">

</div>
</div> --}}


    <div class="form-group col-md-3 mb-3">
        @if ($tipoevento->general == true)
            <input class="col-form-check-input" type="checkbox" name="general" id="general" checked>
        @else
            <input class="col-form-check-input" type="checkbox" name="general" id="general">
        @endif
        <label class="col-form-check-label " for="general">
            General
        </label>
    
    </div>
    
    <div class="form-group col-md-3 mb-3">

                
        @if ($tipoevento->descuento == true)
            <input class="col-form-check-input" type="checkbox" name="descuento" id="descuento" checked>
        @else
            <input class="col-form-check-input" type="checkbox" name="descuento" id="descuento">
        @endif
        <label class="col-form-check-label " for="descuento">
            Aplica Descuento
        </label>
    </div>

    <div class="form-group col-md-3 mb-3">
        @if ($tipoevento->noLaboral == true)
            <input class="col-form-check-input" type="checkbox" name="laboral" id="laboral" checked>
        @else
            <input class="col-form-check-input" type="checkbox" name="laboral" id="laboral">
        @endif
        <label class="col-form-check-label " for="laboral">
            Día No Laboral
        </label>
    
    </div>
    

<div class="row">
<div class="col-md-6 mb-3">
<input class="btn btn-primary" type="submit" value="Guardar">
</div>
</div>

</div>
</div>

{{-- <script>
    var departamento = document.getElementById("departamento_id");
    var puesto = document.getElementById("puesto_id");
    var options = document.getElementById("idesin");

    puesto.addEventListener('change', function(){
        departamento.disabled = false;
        options.value = "2";
    })


</script> --}}