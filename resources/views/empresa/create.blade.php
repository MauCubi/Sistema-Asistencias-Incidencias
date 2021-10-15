@extends('master')


@section('content')
    
@include('partials.validation-error')

<form action="{{  route("empresa.store")  }}" method="post">
@include('empresa._form')
</form>

@endsection