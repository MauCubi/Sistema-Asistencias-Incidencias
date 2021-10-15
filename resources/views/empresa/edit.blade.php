@extends('master')


@section('content')
    
@include('partials.validation-error')

<form action="{{  route("empresa.update", $empresa->id)  }}" method="post">
    @method('PUT')
    @include('empresa._form')
</form>
<br>

@endsection