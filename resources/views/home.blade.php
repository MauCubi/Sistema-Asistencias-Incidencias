@extends('partials.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div style="text-align:center" class="card-header">{{ __('Asistencia') }}</div>

                <div style="text-align:center" class="card-body">

                    <?php 
                        $currentTime = getdate(); 
                    ?>
                    <h3 id="fecha">{{ date('d-m-Y') }}</h3>

                    <h3 id="clock"></h3>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="#" class="btn btn-success mr-2 btn-sm"><i
                        class="fa fw fa-check"></i> Marcar Entrada</a>
                    {{-- {{ __('Bienvenido!') }} --}}
                </div>
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

                                        document.getElementById('clock').innerHTML = (date.getHours() +':' + date.getMinutes() + ':' + date.getSeconds() );

    setInterval(function() {
        date.setSeconds(date.getSeconds() + 1);

        document.getElementById('clock').innerHTML = (date.getHours() +':' + date.getMinutes() + ':' + date.getSeconds() );
        
    }, 1000);
</script>
@endsection
