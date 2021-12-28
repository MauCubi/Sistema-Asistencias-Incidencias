{{-- <script src="{{asset('js/app.js')}}"></script> --}}

@csrf

<div class="row">
<div class="form-group col-md-3 mb-3">
    <label for="nombre" class="col-form-label col-form-label-sm">Nombre</label>
    
    <input class="form-control form-control-sm" type="text" name="nombre" id="nombre" value="{{ old('nombre', $empleado->nombre)}}" required autofocus>
    
    @error('nombre')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group col-md-3 mb-3">
    <label for="apellido" class="col-form-label col-form-label-sm">Apellido</label>
    <input class="form-control form-control-sm" type="text" name="apellido" id="apellido" value="{{ old('apellido', $empleado->apellido)}}" required autofocus>

    @error('apellido')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
</div>

<div class="row">
<div class="form-group col-md-6 mb-3">
    <label for="dni" class="col-form-label col-form-label-sm">DNI</label>
    {{-- <input class="form-control form-control-sm" maxlength="8" type="text" name="dni" id="dni" value="{{ old('dni', $empleado->dni)}} " onkeypress="return event.charCode >= 48 && event.charCode <= 57" required autofocus> --}}

    <input class="form-control form-control-sm" type="text" maxlength="8" name="dni" id="dni" value="{{ old('dni', $empleado->dni)}}" required autofocus onkeypress="return event.charCode >= 48 && event.charCode <= 57">
  
    @error('dni')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
</div>

<div class="row">
<div class="form-group col-md-6 mb-3">
    <label for="direccion" class="col-form-label col-form-label-sm">Dirección</label>
    <input class="form-control form-control-sm" type="text" name="direccion" id="direccion" value="{{ old('direccion', $empleado->direccion)}}">

    @error('direccion')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
</div>


<div class="row">
<div class="form-group col-md-6 mb-3">
    <label for="telefono" class="col-form-label col-form-label-sm">Teléfono</label>
    <input class="form-control form-control-sm " type="text" name="telefono" maxlength="15" id="telefono" value="{{ old('telefono', $empleado->telefono)}}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" >

    @error('telefono')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
</div>

<div class="row">
<div class="form-group col-md-6 mb-3">
    <label for="email" class="col-form-label col-form-label-sm">E-Mail</label>
    <input class="form-control form-control-sm" type="email" name="email" id="email" maxlength="40" value="{{ old('email', $empleado->email)}}" placeholder="nombre@ejemplo.com">

    @error('email')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
</div>

<div class="row">
    <div class="form-group col-md-6 mb-3">
        <label for="altafip" class="col-form-label col-form-label-sm">Fecha Alta AFIP</label>
        <input class="form-control form-control-sm" type="date" name="altafip" id="altafip" value="{{ old('altafip', $empleado->altafip)}}">
    
        @error('altafip')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="row">
{{-- <div class="form-group col-md-3 mb-3">
    <label for="departamento_id" class="col-form-label col-form-label-sm">Departamento</label>
    <select class="form-control form-control-sm" name="departamento_id" id="departamento_id" disabled required autofocus>
        
            <option value="4" ></option>
        
    </select>
    
    @error('puesto_id')
    <small class="text-danger">{{ $message }}</small>
    @enderror   
</div> --}}

<div class="form-group col-md-6 mb-3">
    <label for="departamento_id" class="col-form-label col-form-label-sm">Departamento</label>
    <select class="form-control form-control-sm" name="departamento_id" id="departamento_id" required>
        @foreach ($departamentos as $departamento)
            @isset($puestoid)
                <option {{ $departamento->id == $puestoid->departamento_id ? 'selected="selected"' : ''}} value="{{ $departamento->id}}" required focus>{{ $departamento->nombre}}</option>
            @else
                <option value="{{ $departamento->id}}" required focus>{{ $departamento->nombre}}</option>
            @endisset
        @endforeach
    </select>
    
    @error('departamento_id')
    <small class="text-danger">{{ $message }}</small>
    @enderror   
</div>


<div class="form-group col-md-6 mb-3">
    <label for="puesto_id" class="col-form-label col-form-label-sm">Puesto</label>
    <select id="puesto_id" name="puesto_id" class="form-control form-control-sm" required>
    @foreach ($puestos as $puesto)
        <option {{ $puesto->id == $empleado->puesto_id ? 'selected="selected"' : ''}} value="{{ $puesto->id}}" required focus>{{ $puesto->nombre}}</option>
    @endforeach
    </select>
</div>

<div class="form-group col-md-6 mb-3">
    <label for="horario_id" class="col-form-label col-form-label-sm">Horario</label>
    <select id="horario_id" name="horario_id" class="form-control form-control-sm" required>
    @foreach ($horarios as $horario)
        <option {{ $horario->id == $empleado->horario_id ? 'selected="selected"' : ''}} value="{{ $horario->id}}" required focus>{{ $horario->nombre}}</option>
    @endforeach
    </select>
</div>
</div>

<div class="row">
<div class="col-md-6 mb-3">
<input class="btn btn-primary" type="submit" value="Guardar">
</div>
</div>


@isset($record)
    
@else

@endisset
{{-- <script>
    var departamento = document.getElementById("departamento_id");
    var puesto = document.getElementById("puesto_id");
    var options = document.getElementById("idesin");

    puesto.addEventListener('change', function(){
        departamento.disabled = false;
        options.value = "2";
    })


</script> --}}


<script>
    $(document).ready(function () {
    $(document).on('change', '#departamento_id', function() {
        var departamento_id = $(this).val();
        
        var op = " ";
        $.ajax({
            type: 'get',
            url: '{!!URL::to('/empleado/createfind')!!}',
            data: {'id':departamento_id},
            success: function(data){
                for (var i = 0; i < data.length; i++){
                    op += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
                }
                $('#puesto_id').html(" ");
                $('#puesto_id').append(op);
            },
            error: function(){
                console.log('success');
            },
        });
    });
});

</script>