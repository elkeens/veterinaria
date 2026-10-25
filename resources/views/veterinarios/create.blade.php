
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar veterinario | VetCare</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, sans-serif; background: #f7f8fc; color: #34364a; }
        .container { max-width: 850px; margin: auto; padding: 30px; }
        .back { display: inline-block; margin-bottom: 20px; color: #4778b7; text-decoration: none; font-weight: bold; }
        .card { background: white; border: 1px solid #eee; border-radius: 18px; overflow: hidden; }
        .card-header { padding: 24px; background: linear-gradient(110deg, #fce4ef, #e5efff); }
        .card-body { padding: 25px; }
        .fields { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px; }
        .field { display: flex; flex-direction: column; gap: 7px; }
        .full { grid-column: 1 / -1; }
        label { font-weight: bold; font-size: 14px; }
        label span { color: #bd5487; }
        input { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 10px; font: inherit; }
        .error { color: #c03960; font-size: 12px; }
        .error-summary { padding: 15px; background: #fff0f2; color: #a82e50; border-radius: 10px; margin-bottom: 20px; }
        .form-actions { display: flex; justify-content: flex-end; gap: 12px; margin-top: 25px; }
        .button { padding: 12px 18px; border: 0; border-radius: 10px; text-decoration: none; font-weight: bold; cursor: pointer; }
        .button-pink { background: #e78bb5; color: white; }
        .button-blue { background: #e8f2ff; color: #376aa8; }
        @media(max-width: 600px) { .fields { grid-template-columns: 1fr; } .full { grid-column: auto; } .container { padding: 16px; } }
    </style>
</head>
<body>
<main class="container">
    <a class="back" href="{{ route('veterinarios.index') }}">← Volver a veterinarios</a>
    <h1>Registrar veterinario 🩺</h1>
    <p>Registra los datos profesionales del médico veterinario.</p>

    <section class="card">
        <div class="card-header">
            <h2>Datos del veterinario</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('veterinarios.store') }}" method="POST">
                @csrf
                @include('veterinarios._form')
            </form>
        </div>
    </section>
</main>
</body>
</html>
