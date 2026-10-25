
@if ($errors->any())
    <div class="error-summary">
        <strong>Revisa los siguientes datos:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="fields">
    <div class="field full">
        <label for="nombre">Nombre completo <span>*</span></label>
        <input id="nombre" name="nombre" type="text" maxlength="150"
            value="{{ old('nombre', $veterinario->nombre ?? '') }}"
            placeholder="Nombre del veterinario" required>
        @error('nombre')
            <small class="error">{{ $message }}</small>
        @enderror
    </div>

    <div class="field">
        <label for="cedula">Cédula profesional <span>*</span></label>
        <input id="cedula" name="cedula" type="text" maxlength="50"
            value="{{ old('cedula', $veterinario->cedula ?? '') }}"
            placeholder="Número de cédula" required>
        @error('cedula')
            <small class="error">{{ $message }}</small>
        @enderror
    </div>

    <div class="field">
        <label for="telefono">Teléfono (opcional)</label>
        <input id="telefono" name="telefono" type="tel" maxlength="20"
            value="{{ old('telefono', $veterinario->telefono ?? '') }}"
            placeholder="Teléfono de contacto">
        @error('telefono')
            <small class="error">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="form-actions">
    <a href="{{ route('veterinarios.index') }}" class="button button-blue">
        Cancelar
    </a>
    <button type="submit" class="button button-pink">
        {{ isset($veterinario) ? 'Guardar cambios' : 'Registrar veterinario' }}
    </button>
</div>
