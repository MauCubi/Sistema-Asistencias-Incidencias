@csrf
<div class="form-group">
    <label for="name">Nombre del Rol</label>
    <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $role->name)}}">

    @error('name')
    <small class="text-danger">{{ $message }}</small>
    @enderror

</div>

<h2>Lista de Permisos</h2>

@foreach ($permissions as $permission)
<div>
    <label for="permissions[]">
        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="mr-1" @if ($role->permissions->contains('id',
        $permission->id))
        checked
        @endif>
        {{ $permission->description }}
    </label>
</div>

@endforeach

<input class="btn btn-primary" type="submit" value="Guardar">