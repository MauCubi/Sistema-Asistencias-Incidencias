@csrf

<div class="row">
<div class="form-group col-md-6 mb-3">
    <label for="name">Nombre</label>
    <input class="form-control form-control-sm" type="text" name="name" id="name" value="{{ old('name', $user->name)}}">

    @error('name')
    <small class="text-danger">{{ $message }}</small>
    @enderror   

</div>
</div>

<div class="row">
    <div class="form-group col-md-6 mb-3">
        <label for="roles">Roles</label>
        @foreach ($roles as $role)
            <div>
                <label for="">
                    <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="mr-1" 
                    @if ($user->roles->contains('id', $role->id))
                        checked
                    @endif>
                    {{ $role->name }}
                </label>
            </div>
        @endforeach
    
        @error('roles')
        <small class="text-danger">{{ $message }}</small>
        @enderror   
    
    </div>
    </div>



<div class="row col-md-6 mb-3">
<input class="btn btn-primary" type="submit" value="Guardar">
</div>