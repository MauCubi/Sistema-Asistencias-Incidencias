@extends('partials.admin')


@section('content')


<div class="row d-flex flex-row">
    <div class="p-2">
        <h3 class="text-primary">{{ $event->title }}</h3>

    </div>

    <div class="ml-auto p-2 d-flex align-items-center">
        <a href="{{ route('event.all_index') }}">
            <button class="btn btn-info btn-circle"><i class="fa fw fa-arrow-left"></i></button>
        </a>
    </div>

</div> <!-- fin de row -->
@include('partials.session-status')
<div class="row py-2">
    <div class="col-md-12">
        <div class="card shadow border-bottom-info">
            <div class="card-body">
                <label class="control-label">
                    <strong>Titulo:</strong>
                    {{ $event->title }}
                </label>
                <br>
                <label class="control-label">
                    <strong>Tipo de Incidencia:</strong>
                    {{ $event->tipoevento->nombre }}
                </label>
                <br>
                @if ($event->start == $event->end)
                <label class="control-label">
                    <strong>Fecha:</strong>
                    {{ $event->start->format('Y-m-d') }}
                </label>
                <br>
                @else
                    <label class="control-label">
                    <strong>Empieza:</strong>
                    {{ $event->start->format('Y-m-d') }}
                </label>
                <br>
                <label class="control-label">
                    <strong>Termina:</strong>
                    {{ $event->end->format('Y-m-d') }}
                </label>
                <br>
                @endif
                <label class="control-label">
                    <strong>Detalles:</strong>
                    {{ $event->description }}
                </label>
                <br>




            </div>
        </div>
    </div>
</div> <!-- fin de row -->


@endsection