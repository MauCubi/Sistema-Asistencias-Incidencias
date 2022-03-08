@csrf
<div class="card">
    <div class="card-body">
<div class="row">
    <div class="form-group col-md-6 mb-3">
        <label for="empleado_id">Empleado</label>
        <select class="form-control form-control-sm" name="empleado_id" id="empleado_id">
            @foreach ($empleados as $empleado)
            <option {{ $horaextra->empleado_id == $empleado->id ? 'selected="selected"' : ''}}
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
        <label for="start">Entrada</label>
        @isset($horaextra->start)
        <input class="form-control form-control-sm" type="datetime-local" name="start" id="start" required autofocus
            autocomplete="off" value="{{ $horaextra->start->format('Y-m-d\TH:i')}}">
        @else
        <input class="form-control form-control-sm" type="datetime-local" name="start" id="start" required autofocus
            autocomplete="off" value="{{ old('start')}}">
        @endisset

        @error('start')
        <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

</div>

<div class="row">
    <div class="form-group col-md-6 mb-3">
        <label for="end">Salida</label>
        @isset($horaextra->end)

        <input class="form-control form-control-sm" type="datetime-local" name="end" id="end" required autofocus
            autocomplete="off" value="{{ $horaextra->end->format('Y-m-d\TH:i')}}">
        @else
        <input class="form-control form-control-sm" type="datetime-local" name="end" id="end" required autofocus
            autocomplete="off" value="{{ old('end')}}">
        @endisset

        @error('end')
        <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>
</div>

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