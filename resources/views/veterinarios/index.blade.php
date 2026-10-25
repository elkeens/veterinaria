
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Veterinarios | VetCare</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; padding: 25px; font-family: Arial, sans-serif; background: #f7f8fc; color: #34364a; }
        .container { max-width: 1100px; margin: auto; }
        .top { display: flex; align-items: center; justify-content: space-between; gap: 15px; flex-wrap: wrap; }
        .button { display: inline-block; padding: 11px 16px; border-radius: 9px; text-decoration: none; border: 0; cursor: pointer; font-weight: bold; }
        .pink { background: #e78bb5; color: white; }
        .blue { background: #e8f2ff; color: #376aa8; }
        .red { background: #fde8e8; color: #b42323; }
        .card { margin-top: 22px; background: white; border: 1px solid #eee; border-radius: 14px; overflow: hidden; }
        .notice { padding: 13px; border-radius: 10px; background: #e8f7ee; color: #246b43; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 14px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #f9f8fc; }
        .actions { display: flex; gap: 8px; flex-wrap: wrap; }
        .inline { display: inline; }
        .empty { padding: 25px; text-align: center; color: #777; }
        @media(max-width: 650px) { body { padding: 12px; } .card { overflow-x: auto; } table { min-width: 650px; } }
    </style>
</head>
<body>
<main class="container">
    <div class="top">
        <div>
            <h1>Veterinarios 🩺</h1>
            <p>Administra los médicos registrados en VetCare.</p>
        </div>
        <a href="{{ route('veterinarios.create') }}" class="button pink">+ Registrar veterinario</a>
    </div>

    <p><a href="{{ route('dashboard') }}">← Volver al inicio</a></p>

    @if (session('success'))
        <div class="notice">{{ session('success') }}</div>
    @endif

    <section class="card">
        @if ($veterinarios->count())
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cédula profesional</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($veterinarios as $veterinario)
                        <tr>
                            <td>{{ $veterinario->nombre }}</td>
                            <td>{{ $veterinario->cedula }}</td>
                            <td>{{ $veterinario->telefono ?: 'No registrado' }}</td>
                            <td>
                                <div class="actions">
                                    <a class="button blue"
                                       href="{{ route('veterinarios.edit', $veterinario) }}">Editar</a>
                                    <form class="inline"
                                          action="{{ route('veterinarios.destroy', $veterinario) }}"
                                          method="POST"
                                          onsubmit="return confirm('¿Seguro que deseas eliminar este veterinario?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button red" type="submit">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="padding: 18px;">
                {{ $veterinarios->links() }}
            </div>
        @else
            <div class="empty">
                <p>Aún no hay veterinarios registrados.</p>
                <a href="{{ route('veterinarios.create') }}" class="button pink">Registrar el primero</a>
            </div>
        @endif
    </section>
</main>
</body>
</html>
