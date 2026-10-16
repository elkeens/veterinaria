
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Expediente médico VetCare</title>

    <style>
        @page {
            margin: 35px 38px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            color: #34364a;
            font-size: 11px;
            line-height: 1.5;
        }

        .header {
            background-color: #fce7f1;
            border-bottom: 4px solid #9fc5f8;
            padding: 18px;
            margin-bottom: 22px;
        }

        .brand {
            color: #bd5487;
            font-size: 25px;
            font-weight: bold;
            margin: 0;
        }

        .subtitle {
            color: #526b91;
            margin: 5px 0 0;
        }

        h2 {
            color: #376aa8;
            font-size: 15px;
            border-bottom: 1px solid #dce7f6;
            padding-bottom: 6px;
            margin-top: 22px;
        }

        .section {
            background-color: #f8faff;
            padding: 12px;
            border: 1px solid #e4eaf4;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td, th {
            padding: 8px;
            text-align: left;
            vertical-align: top;
            border: 1px solid #e7e8ef;
        }

        th {
            background-color: #fce7f1;
            color: #8d426a;
        }

        .label {
            color: #526b91;
            font-weight: bold;
            width: 25%;
        }

        .consultation {
            margin-bottom: 18px;
            page-break-inside: avoid;
        }

        .consultation-title {
            background-color: #e5efff;
            padding: 9px;
            font-weight: bold;
            color: #315b91;
        }

        .value {
            white-space: pre-line;
        }

        .empty {
            padding: 15px;
            background-color: #f8faff;
            color: #777b91;
        }

        .footer {
            margin-top: 28px;
            border-top: 1px solid #e7e8ef;
            padding-top: 10px;
            text-align: center;
            color: #777b91;
            font-size: 9px;
        }
    </style>
</head>
<body>

    <div class="header">
        <p class="brand">VetCare</p>
        <p class="subtitle">
            Expediente médico veterinario
        </p>
        <p>
            Fecha de generación:
            {{ now()->format('d/m/Y H:i') }}
        </p>
    </div>

    <h2>1. Datos de la mascota</h2>

    <table>
        <tr>
            <td class="label">Nombre</td>
            <td>{{ $mascota->nombre }}</td>
            <td class="label">ID del registro</td>
            <td>{{ $mascota->id }}</td>
        </tr>
        <tr>
            <td class="label">Dueño</td>
            <td>{{ $mascota->dueno }}</td>
            <td class="label">Teléfono</td>
            <td>{{ $mascota->telefono_dueno ?: 'No registrado' }}</td>
        </tr>
        <tr>
            <td class="label">Especie</td>
            <td>{{ $mascota->especie }}</td>
            <td class="label">Raza</td>
            <td>{{ $mascota->raza ?: 'No especificada' }}</td>
        </tr>
        <tr>
            <td class="label">Edad</td>
            <td>{{ $mascota->edad }} años</td>
            <td class="label">Sexo</td>
            <td>{{ $mascota->sexo }}</td>
        </tr>
        <tr>
            <td class="label">Observaciones</td>
            <td colspan="3" class="value">
                {{ $mascota->observaciones ?: 'Sin observaciones registradas' }}
            </td>
        </tr>
    </table>

    <h2>2. Historial de consultas médicas</h2>

    @forelse ($mascota->consultas as $consulta)
        <div class="consultation">
            <div class="consultation-title">
                Consulta del {{ $consulta->fecha->format('d/m/Y') }}
            </div>

            <table>
                <tr>
                    <td class="label">Motivo</td>
                    <td class="value">
                        {{ $consulta->motivo_consulta ?: 'No registrado' }}
                    </td>
                </tr>
                <tr>
                    <td class="label">Diagnóstico</td>
                    <td class="value">
                        {{ $consulta->diagnostico ?: 'No registrado' }}
                    </td>
                </tr>
                <tr>
                    <td class="label">Procedimiento u operación</td>
                    <td class="value">
                        {{ $consulta->procedimiento_realizado ?: 'No registrado' }}
                    </td>
                </tr>
                <tr>
                    <td class="label">Tratamiento</td>
                    <td class="value">
                        {{ $consulta->tratamiento ?: 'No registrado' }}
                    </td>
                </tr>
                <tr>
                    <td class="label">Observaciones</td>
                    <td class="value">
                        {{ $consulta->observaciones ?: 'Sin observaciones' }}
                    </td>
                </tr>
            </table>
        </div>
    @empty
        <div class="empty">
            Esta mascota todavía no tiene consultas registradas.
        </div>
    @endforelse

    <div class="footer">
        VetCare · Expediente médico veterinario
        <br>
        Documento generado a partir de los registros del sistema.
    </div>

</body>
</html>
