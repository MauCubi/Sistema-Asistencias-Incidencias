@csrf
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', $departamento->nombre)}}">

    @error('nombre')
    <small class="text-danger">{{ $message }}</small>
    @enderror   

</div>

<div class="form-group">
    <label for="area_id">Area</label>
    <select class="form-control" name="area_id" id="area_id">
        @foreach ($areas as $area)
            <option {{ $departamento->area_id == $area->id ? 'selected="selected"' : ''}} value="{{ $area->id}}">{{ $area->nombre}}</option>
        @endforeach
    </select>
    
    @error('area_id')
    <small class="text-danger">{{ $message }}</small>
    @enderror   
</div>

<input class="btn btn-primary" type="submit" value="Enviar">