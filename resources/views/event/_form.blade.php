@csrf

<div class="row">
<div class="form-group col-md-6 mb-3">
    <label for="title">Título</label>
    <input class="form-control form-control-sm" type="text" name="title" id="title" value="{{ old('title', $event->title)}}" required autofocus>

    @error('title')
    <small class="text-danger">{{ $message }}</small>
    @enderror   

</div>
</div>

<div class="row">
<div class="form-group col-md-6 mb-3">
    <label for="tipoevento_id">Tipo de Incidencia</label>
    <select class="form-control form-control-sm" name="tipoevento_id" id="tipoevento_id">
        @foreach ($tipoeventos as $tipoevento)
            <option {{ $event->tipoevento_id == $tipoevento->id ? 'selected="selected"' : ''}}  value="{{ $tipoevento->id}}">{{ $tipoevento->nombre}}</option>
        @endforeach
    </select>
    
    @error('tipoevento_id')
    <small class="text-danger">{{ $message }}</small>
    @enderror   
</div>
</div>

<div class="row">
    <div class="form-group col-md-6 mb-3">
        <label for="description">Detalles</label>
        <textarea class="form-control form-control-sm" type="text" name="description" id="description" value="{{ old('description', $event->description)}}"></textarea>
    
        @error('description')
        <small class="text-danger">{{ $message }}</small>
        @enderror  
    
    </div>
</div>

<div class="row">
    <div class="form-group col-md-3 mb-3">
        <label for="start" class="col-form-label col-form-label-sm">Comienza</label>
        
        <input class="form-control form-control-sm" type="date" name="start" id="start" value="{{ old('start', $event->start->format('Y-m-d'))}}" required autofocus>
        
        @error('start')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    
    <div class="form-group col-md-3 mb-3">
        <label for="end" class="col-form-label col-form-label-sm">Termina</label>
        <input class="form-control form-control-sm" type="date" name="end" id="end" value="{{ old('end', $event->end->format('Y-m-d'))}}">
    
        @error('end')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    </div>



<div class="row col-md-6 mb-3">
<input class="btn btn-primary" type="submit" value="Guardar">
</div>



{{-- <script>
    $(document).ready(function() {
        $('#tipoeventos').select2();
    });

    $(document).on('select2:open', () => {
    document.querySelector('.select2-search__field').focus();
  });
</script> --}}