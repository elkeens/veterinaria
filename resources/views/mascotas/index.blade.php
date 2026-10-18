
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mascotas | VetCare</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --pink: #e78bb5;
            --pink-dark: #bd5487;
            --pink-light: #fce8f1;
            --blue: #76a9e8;
            --blue-light: #e8f2ff;
            --background: #f7f8fc;
            --text: #34364a;
            --muted: #9296a8;
            --white: #ffffff;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: var(--background);
            color: var(--text);
        }

        .container {
            max-width: 1250px;
            margin: auto;
            padding: 35px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 28px;
        }

        h1 {
            font-size: 28px;
        }

        .subtitle {
            color: var(--muted);
            margin-top: 5px;
        }

        .button {
            display: inline-block;
            padding: 12px 18px;
            border: none;
            border-radius: 12px;
            text-decoration: none;
            font: inherit;
            font-weight: 800;
            cursor: pointer;
        }

        .button-pink {
            background: var(--pink);
            color: white;
        }

        .button-blue {
            background: var(--blue-light);
            color: #376aa8;
        }

        .panel {
            background: white;
            border: 1px solid #f0edf3;
            border-radius: 18px;
            padding: 24px;
            margin-bottom: 22px;
        }

        .search {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

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

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

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
        }

        .pet {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .pet-icon {
            width: 42px;
            height: 42px;
            border-radius: 13px;
            background: var(--pink-light);
            display: grid;
            place-items: center;
            font-size: 22px;
        }

        .pet strong {
            display: block;
        }

        .pet small {
            color: var(--muted);
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .action-link {
            text-decoration: none;
            font-weight: 800;
            color: #4778b7;
        }

        .delete-form {
            display: inline;
        }

        .delete-button {
            background: none;
            border: none;
            color: #c04f79;
            font: inherit;
            font-weight: 800;
            cursor: pointer;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: var(--muted);
        }

        .empty div {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .pagination {
            margin-top: 20px;
        }

        .back {
            display: inline-block;
            color: #4778b7;
            text-decoration: none;
            font-weight: 800;
            margin-bottom: 22px;
        }

        @media (max-width: 600px) {
            .container {
                padding: 18px;
            }

            h1 {
                font-size: 23px;
            }
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
                <h1>🐾 Registro de mascotas</h1>
                <p class="subtitle">
                    Administra los pacientes de la veterinaria.
                </p>
            </div>

            <a href="{{ route('mascotas.create') }}"
               class="button button-pink">
                + Registrar mascota
            </a>
            
        </header>

        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <section class="panel">
            <form action="{{ route('mascotas.index') }}"
                  method="GET"
                  class="search">

                <input
                    type="search"
                    name="buscar"
                    value="{{ $buscar }}"
                    placeholder="Buscar por mascota, dueño, raza o teléfono..."
                >

                <button class="button button-blue" type="submit">
                    Buscar
                </button>

                @if ($buscar)
                    <a href="{{ route('mascotas.index') }}"
                       class="button button-blue">
                        Limpiar
                    </a>
                @endif
            </form>
        </section>

        <section class="panel">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>MASCOTA</th>
                            <th>DUEÑO</th>
                            <th>ESPECIE / RAZA</th>
                            <th>EDAD</th>
                            <th>SEXO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($mascotas as $mascota)
                            <tr>
                                <td>
                                    <div class="pet">
                                        <div class="pet-icon">🐾</div>
                                        <div>
                                            <strong>{{ $mascota->nombre }}</strong>
                                            <small>
                                                ID: {{ $mascota->id }}
                                            </small>
                                        </div>
                                    </div>
                                </td>

                                <td>{{ $mascota->dueno }}</td>

                                <td>
                                    {{ $mascota->especie }}
                                    <br>
                                    <small>
                                        {{ $mascota->raza ?: 'Sin raza especificada' }}
                                    </small>
                                </td>

                                <td>
                                    {{ $mascota->edad !== null
                                        ? $mascota->edad . ' años'
                                        : 'No especificada' }}
                                </td>

                                <td>{{ $mascota->sexo }}</td>

                                <td>
                                    <div class="actions">
                                        <a class="action-link"
                                           href="{{ route('mascotas.edit', $mascota) }}">
                                            Editar
                                        </a>

                                        <form class="delete-form"
                                              action="{{ route('mascotas.destroy', $mascota) }}"
                                              method="POST"
                                              onsubmit="return confirm('¿Seguro que deseas eliminar esta mascota y sus consultas asociadas? Esta acción no se puede deshacer.');">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="delete-button">
                                                Eliminar
                                            </button>
                                        </form>
                                        
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="empty">
                                    <div>🐶</div>
                                    <strong>No hay mascotas registradas</strong>
                                    <p>Utiliza el botón para registrar tu primer paciente.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                {{ $mascotas->links() }}
            </div>
        </section>
    </main>
</body>
</html>
