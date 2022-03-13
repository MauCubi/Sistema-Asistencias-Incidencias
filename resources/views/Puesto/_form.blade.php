@csrf
<div class="card">
    <div class="card-body">
<div class="row">
<div class="form-group col-md-6 mb-3">
    <label for="nombre">Nombre</label>
    <input class="form-control form-control-sm" type="text" name="nombre" id="nombre" value="{{ old('nombre', $puesto->nombre)}}">

    @error('nombre')
    <small class="text-danger">{{ $message }}</small>
    @enderror   

</div>
</div>

<div class="row">
<div class="form-group col-md-6 mb-3">
    <label for="departamento_id">Departamento</label>
    <select class="form-control form-control-sm" name="departamento_id" id="departamento_id">
        @foreach ($departamentos as $departamento)
            <option {{ $puesto->departamento_id == $departamento->id ? 'selected="selected"' : ''}} value="{{ $departamento->id}}">{{ $departamento->nombre}}</option>
        @endforeach
    </select>
    
    @error('departamento_id')
    <small class="text-danger">{{ $message }}</small>
    @enderror   
</div>
</div>

<div class="row col-md-6 mb-3">
<input class="btn btn-primary" type="submit" value="Guardar">
</div>

</div>
</div>