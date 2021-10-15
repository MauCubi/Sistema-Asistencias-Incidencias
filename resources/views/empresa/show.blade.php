@extends('master')


@section('content')
    

        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input readonly class="form-control" type="text" name="nombre" id="nombre" value="{{ $empresa->nombre }}">

            @error('nombre')
                <small class="text-danger">{{ $message }}</small>
            @enderror

        </div>

        


@endsection