@csrf

<div class="row">
<div class="form-group col-md-3 mb-3">
    <label for="nombre">Nombre</label>
    <input class="form-control form-control-sm" type="text" name="nombre" id="nombre" value="{{ old('nombre', $horario->nombre)}}" required autofocus autocomplete="off"> 

    @error('nombre')
    <small class="text-danger">{{ $message }}</small>
    @enderror   

</div>
</div>


<div class="row">
<div class="form-group col-md-3 mb-3">
    <label for="categoria_id">Categoria</label>
    <select class="form-control form-control-sm" name="categoria_id" id="categoria_id">
        @foreach ($categorias as $categoria)
            <option {{ $horario->categoria_id == $categoria->id ? 'selected="selected"' : ''}} value="{{ $categoria->id}}">{{ $categoria->nombre}}</option>
        @endforeach
    </select>
    
    @error('categoria_id')
    <small class="text-danger">{{ $message }}</small>
    @enderror   
</div>
</div>

<div class="row">
    <div class="form-group col-md-3 mb-3">
        <label for="tolerancia">Tolerancia (minutos)</label>
        <input class="form-control form-control-sm col-md-3" type="number" min="0" max="60" name="tolerancia" id="tolerancia" value="{{ old('tolerancia', $horario->tolerancia)}}" oninput="this.value = 
        (!!(this.value && Math.abs(this.value) >= 0) ? Math.abs(this.value) : null) && (!!(this.value && Math.abs(this.value) <= 60) ? Math.abs(this.value) : 60)" required autofocus>
    
        @error('tolerancia')
        <small class="text-danger">{{ $message }}</small>
        @enderror   
    
    </div>
</div>

<div class="row col-md-6 mb-3">
<input class="btn btn-primary" type="submit" value="Guardar">
</div>