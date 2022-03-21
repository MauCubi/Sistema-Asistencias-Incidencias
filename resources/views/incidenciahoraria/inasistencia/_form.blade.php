@csrf
<div class="card">
    <div class="card-body">
<div class="row">
    <div class="form-group col-md-6 mb-3">
        <label for="empleado_id">Empleado</label>
        <select class="form-control form-control-sm" name="empleado_id" id="empleado_id">
            @foreach ($empleados as $empleado)
            <option {{ $incidenciahoraria->empleado_id == $empleado->id ? 'selected="selected"' : ''}}
                {{ old('empleado_id') == $empleado->id ? 'selected' : '' }}
                value="{{ $empleado->id}}">{{ $empleado->nombre}} {{ $empleado->apellido}}
            </option>
            @endforeach
        </select>

        @error('empleado_id')
        <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>
</div>

<div class="row">
    <div class="form-group col-md-6 mb-3">
        <label for="fecha">Fecha</label>
        @isset($incidenciahoraria->fecha)
        <input class="form-control form-control-sm" type="date" name="fecha" id="fecha" required autofocus
            autocomplete="off" value="{{ $incidenciahoraria->fecha}}">
        @else
        <input class="form-control form-control-sm" type="date" name="fecha" id="fecha" required autofocus
            autocomplete="off" value="{{ old('fecha')}}">
        @endisset
        <div class="invalid-feedback">
            Por favor seleccione fecha
        </div>
        @error('fecha')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>


</div>



<div class="row">
    <div class="form-group col-md-6 mb-3">
        <label for="empleado_id">Descripción</label> <br>
        <textarea name="descripcion" id="descripcion" style="width: 100%" rows="6">{{ $incidenciahoraria->descripcion}}</textarea>
        @error('descripcion')
        <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>
</div>

<div class="row">
    <div class="form-group col-md-6 mb-3">
        @if ($incidenciahoraria->justificacion == true)
        <input class="col-form-check-input" type="checkbox" name="justificacion" id="justificacion" checked>
    @else
        <input class="col-form-check-input" type="checkbox" name="justificacion" id="justificacion">
    @endif
    <label class="col-form-check-label " for="justificacion">
        Inasistencia Justificada
    </label>
    </div>
</div>


<input type="hidden" value="Inasistencia" id="tipo" name="tipo">




{{-- <div class="row">
    <div class="form-group col-md-6 mb-3">
        <label for="descripcion">Descripcion</label>
        <textarea class="form-control form-control-sm" name="descripcion" id="descripcion" required autofocus
            autocomplete="off"></textarea>

        @error('descripcion')
        <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>
</div> --}}

<div class="row col-md-6 mb-3">
    <input class="btn btn-primary" type="submit" value="Guardar">
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