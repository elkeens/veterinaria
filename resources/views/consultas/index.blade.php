
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas | VetCare</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --pink: #e78bb5;
            --pink-dark: #bd5487;
            --pink-light: #fce8f1;
            --blue: #76a9e8;
            --blue-light: #e8f2ff;
            --bg: #f7f8fc;
            --text: #34364a;
            --muted: #9296a8;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Nunito', sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        .container { max-width: 1250px; margin: auto; padding: 35px; }

        .back {
            display: inline-block;
            color: #4778b7;
            text-decoration: none;
            font-weight: 800;
            margin-bottom: 24px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        h1 { font-size: 28px; }
        .subtitle { color: var(--muted); margin-top: 5px; }

        .button {
            display: inline-block;
            padding: 12px 18px;
            border: 0;
            border-radius: 12px;
            text-decoration: none;
            font: inherit;
            font-weight: 800;
            cursor: pointer;
        }

        .pink { background: var(--pink); color: white; }
        .blue { background: var(--blue-light); color: #376aa8; }

        .panel {
            background: white;
            border: 1px solid #f0edf3;
            border-radius: 18px;
            padding: 24px;
            margin-bottom: 22px;
        }

        .search { display: flex; gap: 12px; flex-wrap: wrap; }

        .search input {
            flex: 1;
            min-width: 200px;
            padding: 13px 15px;
            border: 1px solid #e5e4ed;
            border-radius: 12px;
            font: inherit;
        }

        .alert {
            background: #e4f7eb;
            color: #21683a;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .table-wrap { overflow-x: auto; }

        table { width: 100%; border-collapse: collapse; min-width: 800px; }

        th {
            text-align: left;
            padding: 15px;
            color: var(--muted);
            background: #fbfaff;
            font-size: 12px;
        }

        td {
            padding: 16px 15px;
            border-bottom: 1px solid #f0edf3;
            font-size: 14px;
            vertical-align: top;
        }

        .pet {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .pet-icon {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            border-radius: 12px;
            background: var(--pink-light);
            display: grid;
            place-items: center;
        }

        .muted { color: var(--muted); font-size: 12px; }

        .actions { display: flex; gap: 10px; white-space: nowrap; }
        .edit { color: #4778b7; text-decoration: none; font-weight: 800; }

        .delete {
            background: none;
            border: 0;
            color: #bd5487;
            font: inherit;
            font-weight: 800;
            cursor: pointer;
        }

        .empty { text-align: center; padding: 40px; color: var(--muted); }
        .empty div { font-size: 38px; margin-bottom: 10px; }
        .pagination { margin-top: 20px; }

        @media (max-width: 600px) {
            .container { padding: 18px; }
            h1 { font-size: 23px; }
        }

        .pdf-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 6px 12px;
            background-color: #e53935;
            color: #ffffff;
            border: 1px solid #c62828;
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 800;
            white-space: nowrap;
            transition: background-color 0.2s ease;
        }

        .pdf-button:hover {
            background-color: #c62828;
            color: #ffffff;
        }
    </style>
</head>
<body>
<main class="container">

    <a href="{{ route('dashboard') }}" class="back">
        ← Volver al panel principal
    </a>

    <header class="topbar">
        <div>
            <h1>📋 Consultas veterinarias</h1>
            <p class="subtitle">Administra las atenciones e historiales médicos.</p>
        </div>

        <a href="{{ route('consultas.create') }}" class="button pink">
            + Registrar consulta
        </a>
    </header>

    @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <section class="panel">
        <form action="{{ route('consultas.index') }}" method="GET" class="search">
            <input
                type="search"
                name="buscar"
                value="{{ $buscar }}"
                placeholder="Buscar por mascota, dueño, diagnóstico o procedimiento..."
            >
            <button type="submit" class="button blue">Buscar</button>

            @if ($buscar)
                <a href="{{ route('consultas.index') }}" class="button blue">Limpiar</a>
            @endif
        </form>
    </section>

    <section class="panel">
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>FECHA</th>
                        <th>MASCOTA / DUEÑO</th>
                        <th>MOTIVO</th>
                        <th>DIAGNÓSTICO</th>
                        <th>PROCEDIMIENTO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($consultas as $consulta)
                        <tr>
                            <td>{{ $consulta->fecha->format('d/m/Y') }}</td>

                            <td>
                                @if ($consulta->mascota)
                                    <div class="pet">
                                        <div class="pet-icon">🐾</div>
                                        <div>
                                            <strong>{{ $consulta->mascota->nombre }}</strong>
                                            <div class="muted">
                                                {{ $consulta->mascota->dueno }}
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    Mascota no disponible
                                @endif
                            </td>

                            <td>{{ $consulta->motivo_consulta ?: 'No especificado' }}</td>
                            <td>{{ $consulta->diagnostico ?: 'Pendiente' }}</td>
                            <td>{{ $consulta->procedimiento_realizado ?: 'No especificado' }}</td>

                            <td>
                                <div class="actions">
                                    <a href="{{ route('consultas.edit', $consulta) }}"
                                       class="edit">Editar</a>

                                    <form
                                        action="{{ route('consultas.destroy', $consulta) }}"
                                        method="POST"
                                        onsubmit="return confirm('¿Seguro que deseas eliminar esta consulta? Esta acción no se puede deshacer.');"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete">Eliminar</button>
                                    </form>

                                    <a
                                        href="{{ route('consultas.pdf', $consulta) }}"
                                        class="pdf-button"
                                        target="_blank"
                                    >
                                    PDF
                                    </a>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty">
                                <div>🩺</div>
                                <strong>No hay consultas registradas</strong>
                                <p>Registra la primera atención veterinaria para comenzar el historial.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination">
            {{ $consultas->links() }}
        </div>
    </section>
</main>
</body>
</html>
