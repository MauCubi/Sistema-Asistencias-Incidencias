@csrf
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', $puesto->nombre)}}">

    @error('nombre')
    <small class="text-danger">{{ $message }}</small>
    @enderror   

</div>

<div class="form-group">
    <label for="departamento_id">Departamento</label>
    <select class="form-control" name="departamento_id" id="departamento_id">
        @foreach ($departamentos as $departamento)
            <option {{ $puesto->departamento_id == $departamento->id ? 'selected="selected"' : ''}} value="{{ $departamento->id}}">{{ $departamento->nombre}}</option>
        @endforeach
    </select>
    
    @error('departamento_id')
    <small class="text-danger">{{ $message }}</small>
    @enderror   
</div>

<input class="btn btn-primary" type="submit" value="Enviar">