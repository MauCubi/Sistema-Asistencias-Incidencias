@csrf

<div class="card">
    <div class="card-body">
        <!-- CUIT -->
        <div class="form-group">
          <label for="cuit">CUIT</label>
          <input type="form-control" maxlength="11" name="cuit" id="cuit" class="form-control" aria-describedby="textHelp" value="{{ old('cuit', $empresa->cuit)}}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
          <small id="textHelp" class="form-text text-muted">Ingrese sin guiones el CUIT</small>

          @error('cuit')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        
        <!-- Razon social -->
        <div class="form-group">
            <label for="nombre">Razon social</label>
            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', $empresa->nombre)}}" required>

            @error('nombre')
            <small class="text-danger">{{ $message }}</small>
            @enderror

        </div>

        <!-- Email (opcional) -->
        <div class="form-group">
          <label for="contacto">Email</label>
          <input type="text" maxlength="100" name="contacto" id="contacto" class="form-control" value="{{ old('contacto', $empresa->contacto)}}">
        </div>

        <!-- Telefono (opcional) -->
        <div class="form-group">
          <label for="telefono">Telefono</label>
          <input class="form-control" type="text" name="telefono" maxlength="15" id="telefono" value="{{ old('telefono', $empresa->telefono)}}" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        </div>

    <input class="btn btn-primary" type="submit" id="empresa_boton" value="Guardar">

</div>
</div>