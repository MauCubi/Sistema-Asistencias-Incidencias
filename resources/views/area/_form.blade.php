@csrf
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', $area->nombre)}}">

    @error('nombre')
    <small class="text-danger">{{ $message }}</small>
    @enderror   

</div>

<div class="form-group">
    <label for="empresa_id">Empresa</label>
    <select class="form-control" name="empresa_id" id="empresa_id">
        @foreach ($empresas as $empresa)
            <option {{ $area->empresa_id == $empresa->id ? 'selected="selected"' : ''}} value="{{ $empresa->id}}">{{ $empresa->nombre}}</option>
        @endforeach
    </select>
    
    @error('empresa_id')
    <small class="text-danger">{{ $message }}</small>
    @enderror   
</div>

<input class="btn btn-primary" type="submit" value="Enviar">