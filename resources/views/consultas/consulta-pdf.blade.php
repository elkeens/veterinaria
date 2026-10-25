
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Receta médica veterinaria VetCare</title>

    <style>
        @page {
            margin: 32px 38px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            color: #34364a;
            font-size: 10px;
            line-height: 1.5;
        }

        .header {
            background-color: #fce7f1;
            border-bottom: 4px solid #9fc5f8;
            padding: 15px 18px;
            margin-bottom: 18px;
        }

        .brand {
            color: #bd5487;
            font-size: 25px;
            font-weight: bold;
            margin: 0;
        }

        .subtitle {
            color: #526b91;
            margin: 4px 0;
        }

        .document-title {
            color: #376aa8;
            font-size: 16px;
            font-weight: bold;
            margin-top: 12px;
        }

        .header-info {
            margin-top: 10px;
            width: 100%;
        }

        h2 {
            color: #376aa8;
            font-size: 13px;
            border-bottom: 1px solid #dce7f6;
            padding-bottom: 5px;
            margin-top: 18px;
            margin-bottom: 9px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td, th {
            padding: 7px;
            text-align: left;
            vertical-align: top;
            border: 1px solid #e7e8ef;
        }

        .label {
            color: #526b91;
            font-weight: bold;
            width: 22%;
        }

        .value {
            white-space: pre-line;
            overflow-wrap: break-word;
        }

        .section {
            background-color: #f8faff;
            border: 1px solid #e4eaf4;
            padding: 11px;
        }

        .prescription {
            min-height: 150px;
            padding: 15px;
            border: 1px solid #cbd9ee;
            background-color: #ffffff;
            white-space: pre-line;
            overflow-wrap: break-word;
        }

        .prescription-title {
            background-color: #e5efff;
            color: #315b91;
            font-weight: bold;
            padding: 9px;
            border: 1px solid #cbd9ee;
            border-bottom: none;
        }

        .muted {
            color: #777b91;
        }

        .signature-container {
            margin-top: 20px;
            width: 100%;
            page-break-inside: avoid;
        }

        .signature-line {
            width: 65%;
            margin: 0 auto;
            border-top: 1px solid #777b91;
            text-align: center;
            padding-top: 7px;
        }

        .footer {
            margin-top: 24px;
            border-top: 1px solid #e7e8ef;
            padding-top: 9px;
            text-align: center;
            color: #777b91;
            font-size: 8px;
        }
    </style>
</head>

<body>

    {{-- ENCABEZADO --}}
    <div class="header">
        <p class="brand">VetCare</p>

        <p class="subtitle">
            Atención y cuidado veterinario
        </p>

        <div class="document-title">
            RECETA MÉDICA VETERINARIA
        </div>

        <table class="header-info">
            <tr>
                <td>
                    <strong>Folio:</strong>
                    VC-{{ str_pad((string) $consulta->id, 6, '0', STR_PAD_LEFT) }}
                </td>
                <td style="text-align: right;">
                    <strong>Fecha de consulta:</strong>
                    {{ $consulta->fecha
                        ? $consulta->fecha->format('d/m/Y')
                        : 'No registrada' }}
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <strong>Fecha de generación:</strong>
                    {{ now()->format('d/m/Y H:i') }}
                </td>
            </tr>
        </table>
    </div>

    {{-- DATOS DE LA MASCOTA --}}
    <h2>1. Datos de la mascota</h2>

    <table>
        <tr>
            <td class="label">Nombre</td>
            <td>{{ $consulta->mascota->nombre ?? 'No disponible' }}</td>

            <td class="label">ID del registro</td>
            <td>{{ $consulta->mascota->id ?? 'No disponible' }}</td>
        </tr>

        <tr>
            <td class="label">Dueño</td>
            <td>{{ $consulta->mascota->dueno ?? 'No registrado' }}</td>

            <td class="label">Teléfono principal</td>
            <td>{{ $consulta->mascota->telefono_dueno ?: 'No registrado' }}</td>
        </tr>

        <tr>
            <td class="label">Teléfono adicional</td>
            <td>
                {{ $consulta->mascota->telefono_dueno_secundario ?: 'No registrado' }}
            </td>

            <td class="label">Ubicación</td>
            <td>
                {{ $consulta->mascota->ubicacion ?: 'No registrada' }}
            </td>
        </tr>

        <tr>
            <td class="label">Especie</td>
            <td>{{ $consulta->mascota->especie ?? 'No registrada' }}</td>

            <td class="label">Raza</td>
            <td>{{ $consulta->mascota->raza ?: 'No especificada' }}</td>
        </tr>

        <tr>
            <td class="label">Edad</td>
            <td>
                {{ $consulta->mascota->edad !== null
                    ? $consulta->mascota->edad . ' años'
                    : 'No especificada' }}
            </td>

            <td class="label">Sexo</td>
            <td>{{ $consulta->mascota->sexo ?? 'No registrado' }}</td>
        </tr>

        <tr>
            <td class="label">Observaciones de la mascota</td>
            <td colspan="3" class="value">
                {{ $consulta->mascota->observaciones ?: 'Sin observaciones registradas' }}
            </td>
        </tr>
    </table>

    {{-- DATOS DEL VETERINARIO --}}
    <h2>2. Datos del veterinario responsable</h2>

    <div class="section">
        <table>
            <tr>
                <td class="label">Nombre completo</td>
                <td>
                    {{ $consulta->veterinario->nombre ?? 'Veterinario no asignado' }}
                </td>
            </tr>

            <tr>
                <td class="label">Cédula profesional</td>
                <td>
                    {{ $consulta->veterinario->cedula ?? 'No registrada' }}
                </td>
            </tr>
        </table>
    </div>

    {{-- RECETA --}}
    <h2>3. Receta médica e indicaciones</h2>

    <div class="prescription-title">
        Tratamiento
    </div>

    <div class="prescription">{{ $consulta->tratamiento ?: 'Sin tratamiento o indicaciones registradas.' }}</div>

    {{-- FIRMA --}}
    <table class="signature-container">
        <tr>
            <td style="border: none; text-align: center;">
                <div class="signature-line">
                    <strong>
                        {{ $consulta->veterinario->nombre ?? 'Veterinario responsable' }}
                    </strong>
                    <br>
                    <span class="muted">
                        Cédula profesional:
                        {{ $consulta->veterinario->cedula ?? 'No registrada' }}
                    </span>
                    <br>
                    <span class="muted">Firma del veterinario</span>
                </div>
            </td>
        </tr>
    </table>

    {{-- PIE DE PÁGINA --}}
    <div class="footer">
        VetCare · Receta médica veterinaria
        <br>
        Folio VC-{{ str_pad((string) $consulta->id, 6, '0', STR_PAD_LEFT) }}
        · Documento generado a partir de la consulta seleccionada.
    </div>

</body>
</html>
