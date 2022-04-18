@csrf

<div class="card">
    <div class="card-body">
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', $empresa->nombre)}}" required autofocus>

    @error('nombre')
    <small class="text-danger">{{ $message }}</small>
    @enderror

</div>

<input class="btn btn-primary" type="submit" value="Guardar">

</div>
</div>