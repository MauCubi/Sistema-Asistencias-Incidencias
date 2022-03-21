@csrf
<div class="card">
    <div class="card-body">
<div class="row">
    <div class="form-group col-md-6 mb-3">
        <label for="tipoevento_id">Empleado</label>
        <select class="form-control form-control-sm" name="empleado_id" id="empleado_id">
            @foreach ($empleados as $empleado)
                <option value="{{ $empleado->id}}">{{ $empleado->nombre}} {{ $empleado->apellido}} </option>
            @endforeach
        </select>
        
        @error('empleado_id')
        <small class="text-danger">{{ $message }}</small>
        @enderror   
    </div>
</div>

<div class="row">
    <div class="form-group col-md-3 mb-3">
        <label for="start" class="col-form-label col-form-label-sm">Comienza</label>        
        
        <input class="form-control form-control-sm" type="date" name="start" id="start" value="{{ old('start')}}" required autofocus>
        
        @error('start')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    
    <div class="form-group col-md-3 mb-3">
        <label for="end" class="col-form-label col-form-label-sm">Termina</label>

        
        <input class="form-control form-control-sm" type="date" name="end" id="end" value="{{ old('end')}}">
          
    
        @error('end')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>


<div class="row col-md-6 mb-3">
<input class="btn btn-primary" type="submit" value="Generar Reporte">
</div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('#empleado_id').select2();        
    });

    $(document).on('select2:open', () => {
    document.querySelector('.select2-search__field').focus();
  });
</script>