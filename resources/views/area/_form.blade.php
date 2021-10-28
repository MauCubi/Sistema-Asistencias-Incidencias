@csrf

<div class="row">
<div class="form-group col-md-6 mb-3">
    <label for="nombre">Nombre</label>
    <input class="form-control form-control-sm" type="text" name="nombre" id="nombre" value="{{ old('nombre', $area->nombre)}}">

    @error('nombre')
    <small class="text-danger">{{ $message }}</small>
    @enderror   

</div>
</div>

<div class="row">
<div class="form-group col-md-6 mb-3">
    <label for="empresa_id">Empresa</label>
    <select class="form-control form-control-sm" name="empresa_id" id="empresa_id">
        @foreach ($empresas as $empresa)
            <option {{ $area->empresa_id == $empresa->id ? 'selected="selected"' : ''}} value="{{ $empresa->id}}">{{ $empresa->nombre}}</option>
        @endforeach
    </select>
    
    @error('empresa_id')
    <small class="text-danger">{{ $message }}</small>
    @enderror   
</div>
</div>

<div class="row col-md-6 mb-3">
<input class="btn btn-primary" type="submit" value="Guardar">
</div>