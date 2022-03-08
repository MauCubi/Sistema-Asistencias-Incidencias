@extends('partials.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div style="text-align:center" class="card-header">{{ __('Asistencia') }}</div>
               
                    
                @isset($asistencia)
                    
                
                <div style="text-align:center" class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <?php 
                        $currentTime = getdate(); 
                    ?>
                    <h3 id="fecha">{{ date('d-m-Y') }}</h3>

                    <h3 id="clock"></h3>

                    <label style="text-align: left" class="control-label">
                        <strong>Hora de entrada:</strong>
                        {{ $asistencia->start->format('H:i:s') }}
                    </label>
                    <hr>


                    <a href="{{ route('asistencia.add')}}" class="btn btn-danger mr-2 btn-sm"><i
                        class="fa fw fa-check"></i> Marcar Salida</a>
                    {{-- {{ __('Bienvenido!') }} --}}
                </div>
                @else

                <div style="text-align:center" class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <?php 
                        $currentTime = getdate(); 
                    ?>
                    <h3 id="fecha">{{ date('d-m-Y') }}</h3>

                    <h3 id="clock"></h3>
                    <hr>


                    <a href="{{ route('asistencia.add')}}" class="btn btn-success mr-2 btn-sm"><i
                        class="fa fw fa-check"></i> Marcar Entrada</a>
                    {{-- {{ __('Bienvenido!') }} --}}
                </div>

                @endisset
            </div>
        </div>
    </div>
</div>


<script>
    var date = new Date(Date.UTC(<?php echo $currentTime['year'] .",".
                                        $currentTime['mon'] .",".
                                        $currentTime['mday'] .",".
                                        $currentTime['hours'] .",".
                                        $currentTime['minutes'] .",".
                                        $currentTime['seconds']; ?>));

                                        document.getElementById('clock').innerHTML = ( ("0" + date.getHours()).slice(-2) +':' + ("0" + date.getMinutes()).slice(-2) + ':' + ("0" + date.getSeconds()).slice(-2) );

    setInterval(function() {
        date.setSeconds(date.getSeconds() + 1);

        document.getElementById('clock').innerHTML = ( ("0" + date.getHours()).slice(-2) +':' + ("0" + date.getMinutes()).slice(-2) + ':' + ("0" + date.getSeconds()).slice(-2) );
        
    }, 1000);
</script>

@endsection
