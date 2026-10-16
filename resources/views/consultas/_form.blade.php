
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
        <label for="mascota_id">Mascota <span>*</span></label>
        <select id="mascota_id" name="mascota_id" required>
            <option value="">Selecciona una mascota</option>
            @foreach ($mascotas as $mascota)
                <option value="{{ $mascota->id }}"
                    @selected((string) old('mascota_id', isset($consulta) ? $consulta->mascota_id : '') === (string) $mascota->id)>
                    {{ $mascota->nombre }} — Dueño: {{ $mascota->dueno }}
                </option>
            @endforeach
        </select>
        @error('mascota_id')
            <small class="error">{{ $message }}</small>
        @enderror

        @if ($mascotas->isEmpty())
            <small class="error">
                Primero debes registrar una mascota.
                <a href="{{ route('mascotas.create') }}">Registrar mascota</a>
            </small>
        @endif
    </div>

    <div class="field">
        <label for="fecha">Fecha de consulta <span>*</span></label>
        <input
            type="date"
            id="fecha"
            name="fecha"
            value="{{ old('fecha', isset($consulta) ? $consulta->fecha->format('Y-m-d') : now()->format('Y-m-d')) }}"
            required
        >
        @error('fecha')
            <small class="error">{{ $message }}</small>
        @enderror
    </div>

    <div class="field">
        <label for="motivo_consulta">Motivo de consulta</label>
        <textarea id="motivo_consulta" name="motivo_consulta" maxlength="5000"
            placeholder="¿Por qué acudió el paciente?">{{ old('motivo_consulta', $consulta->motivo_consulta ?? '') }}</textarea>
        @error('motivo_consulta')
            <small class="error">{{ $message }}</small>
        @enderror
    </div>

    <div class="field full">
        <label for="diagnostico">Diagnóstico</label>
        <textarea id="diagnostico" name="diagnostico" maxlength="5000"
            placeholder="Diagnóstico de la veterinaria">{{ old('diagnostico', $consulta->diagnostico ?? '') }}</textarea>
        @error('diagnostico')
            <small class="error">{{ $message }}</small>
        @enderror
    </div>

    <div class="field full">
        <label for="procedimiento_realizado">Procedimiento u operación realizada</label>
        <textarea id="procedimiento_realizado" name="procedimiento_realizado" maxlength="5000"
            placeholder="Describe los procedimientos realizados">{{ old('procedimiento_realizado', $consulta->procedimiento_realizado ?? '') }}</textarea>
        @error('procedimiento_realizado')
            <small class="error">{{ $message }}</small>
        @enderror
    </div>

    <div class="field full">
        <label for="tratamiento">Tratamiento e indicaciones</label>
        <textarea id="tratamiento" name="tratamiento" maxlength="5000"
            placeholder="Medicamentos, cuidados y seguimiento indicado">{{ old('tratamiento', $consulta->tratamiento ?? '') }}</textarea>
        @error('tratamiento')
            <small class="error">{{ $message }}</small>
        @enderror
    </div>

    <div class="field full">
        <label for="observaciones">Observaciones adicionales</label>
        <textarea id="observaciones" name="observaciones" maxlength="5000"
            placeholder="Información adicional relevante">{{ old('observaciones', $consulta->observaciones ?? '') }}</textarea>
        @error('observaciones')
            <small class="error">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="form-actions">
    <a href="{{ route('consultas.index') }}" class="button button-blue">
        Cancelar
    </a>
    <button type="submit" class="button button-pink">
        {{ isset($consulta) ? 'Guardar cambios' : 'Guardar consulta' }}
    </button>
</div>
