@csrf

<div class="row">
<div class="form-group col-md-6 mb-3">
    <label for="nombre">Nombre</label>
    <input class="form-control form-control-sm" type="text" name="nombre" id="nombre" value="{{ old('nombre', $departamento->nombre)}}">

    @error('nombre')
    <small class="text-danger">{{ $message }}</small>
    @enderror   

</div>
</div>

<div class="row">
<div class="form-group col-md-6 mb-3">
    <label for="area_id">Area</label>
    <select class="form-control form-control-sm" name="area_id" id="area_id">
        @foreach ($areas as $area)
            <option {{ $departamento->area_id == $area->id ? 'selected="selected"' : ''}} value="{{ $area->id}}">{{ $area->nombre}}</option>
        @endforeach
    </select>
    
    @error('area_id')
    <small class="text-danger">{{ $message }}</small>
    @enderror   
</div>
</div>

<div class="row col-md-6 mb-3">
<input class="btn btn-primary" type="submit" value="Enviar">
</div>