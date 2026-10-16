
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar consulta | VetCare</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: 'Nunito', sans-serif; background: #f7f8fc; color: #34364a; }
        .container { max-width: 950px; margin: auto; padding: 35px; }
        .back { display: inline-block; margin-bottom: 24px; color: #4778b7; text-decoration: none; font-weight: 800; }
        h1 { font-size: 28px; margin: 0 0 6px; }
        .subtitle { color: #9296a8; margin: 0 0 25px; }
        .card { background: white; border: 1px solid #f0edf3; border-radius: 20px; overflow: hidden; }
        .card-header { padding: 25px 30px; background: linear-gradient(110deg, #fce4ef, #e5efff); }
        .card-header h2 { margin: 0; font-size: 20px; }
        .card-header p { color: #777b91; margin-bottom: 0; }
        .card-body { padding: 30px; }
        .fields { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 20px; }
        .field { display: flex; flex-direction: column; gap: 7px; }
        .full { grid-column: 1 / -1; }
        label { font-size: 13px; font-weight: 800; }
        label span { color: #bd5487; }
        input, select, textarea { width: 100%; padding: 12px 14px; border: 1px solid #e4e5ee; border-radius: 11px; font: inherit; color: #34364a; background: white; }
        textarea { min-height: 100px; resize: vertical; }
        input:focus, select:focus, textarea:focus { outline: 2px solid #d5e7ff; border-color: #76a9e8; }
        .error-summary { padding: 15px 20px; margin-bottom: 22px; border-radius: 12px; background: #fff0f2; color: #a82e50; }
        .error-summary ul { padding-left: 20px; }
        .error { color: #c03960; font-size: 12px; }
        .form-actions { display: flex; justify-content: flex-end; gap: 12px; margin-top: 28px; padding-top: 22px; border-top: 1px solid #f0edf3; }
        .button { display: inline-block; padding: 12px 20px; border: 0; border-radius: 11px; text-decoration: none; font: inherit; font-weight: 800; cursor: pointer; }
        .button-pink { background: #e78bb5; color: white; }
        .button-blue { background: #e8f2ff; color: #376aa8; }
        @media (max-width: 600px) { .container { padding: 18px; } .fields { grid-template-columns: 1fr; } .full { grid-column: auto; } .card-body { padding: 20px; } .form-actions { flex-direction: column-reverse; } .form-actions .button { text-align: center; } }
    </style>
</head>
<body>
<main class="container">
    <a href="{{ route('consultas.index') }}" class="back">← Volver a consultas</a>

    <h1>Editar consulta 🩺</h1>
    <p class="subtitle">Actualiza la información del historial médico.</p>

    <section class="card">
        <div class="card-header">
            <h2>Consulta del {{ $consulta->fecha->format('d/m/Y') }}</h2>
            <p>Mascota: {{ $consulta->mascota->nombre ?? 'No disponible' }}</p>
        </div>

        <div class="card-body">
            <form action="{{ route('consultas.update', $consulta) }}" method="POST">
                @csrf
                @method('PUT')
                @include('consultas._form')
            </form>
        </div>
    </section>
</main>
</body>
</html>
