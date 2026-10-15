
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar mascota | VetCare</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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
            max-width: 1000px;
            margin: auto;
            padding: 35px;
        }

        .back {
            display: inline-block;
            color: #4778b7;
            text-decoration: none;
            font-weight: 800;
            margin-bottom: 24px;
        }

        .heading {
            margin-bottom: 25px;
        }

        .heading h1 {
            font-size: 28px;
        }

        .heading p {
            color: var(--muted);
            margin-top: 6px;
        }

        .form-card {
            background: white;
            border: 1px solid #f0edf3;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 30px #27365b08;
        }

        .form-header {
            background: linear-gradient(110deg, #fce4ef, #e5efff);
            padding: 25px 30px;
        }

        .form-header h2 {
            font-size: 20px;
        }

        .form-header p {
            color: #777b91;
            margin-top: 5px;
            font-size: 14px;
        }

        .form-body {
            padding: 30px;
        }

        .section-title {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .fields {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        label {
            font-size: 13px;
            font-weight: 800;
        }

        .required {
            color: var(--pink-dark);
        }

        input, select, textarea {
            width: 100%;
            border: 1px solid #e4e5ee;
            border-radius: 11px;
            padding: 12px 14px;
            font: inherit;
            color: var(--text);
            background: white;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus, select:focus, textarea:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px #76a9e81c;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .hint {
            color: var(--muted);
            font-size: 12px;
        }

        .error {
            color: #c03960;
            font-size: 12px;
        }

        .input-error {
            border-color: #d94c72;
        }

        .error-summary {
            background: #fff0f2;
            color: #a82e50;
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 22px;
        }

        .error-summary ul {
            padding-left: 20px;
            margin-top: 8px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 30px;
            padding-top: 22px;
            border-top: 1px solid #f0edf3;
        }

        .button {
            display: inline-block;
            padding: 12px 21px;
            border: none;
            border-radius: 11px;
            text-decoration: none;
            font: inherit;
            font-weight: 800;
            cursor: pointer;
        }

        .button-pink {
            background: var(--pink);
            color: white;
        }

        .button-pink:hover {
            background: var(--pink-dark);
        }

        .button-blue {
            background: var(--blue-light);
            color: #376aa8;
        }

        @media (max-width: 600px) {
            .container {
                padding: 18px;
            }

            .fields {
                grid-template-columns: 1fr;
            }

            .field.full {
                grid-column: auto;
            }

            .form-body {
                padding: 22px;
            }

            .heading h1 {
                font-size: 23px;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .form-actions .button {
                text-align: center;
            }
        }
    </style>
</head>
<body>

<main class="container">

    <a href="{{ route('mascotas.index') }}" class="back">
        ← Volver a mascotas
    </a>

    <header class="heading">
        <h1>Registrar mascota 🐾</h1>
        <p>Agrega un nuevo paciente al sistema veterinario.</p>
    </header>

    <section class="form-card">

        <div class="form-header">
            <h2>Información del paciente</h2>
            <p>Completa los datos de la mascota y su propietario.</p>
        </div>

        <div class="form-body">

            @if ($errors->any())
                <div class="error-summary">
                    <strong>Hay algunos datos que debes revisar:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('mascotas.store') }}" method="POST">
                @csrf

                <h3 class="section-title">Datos de la mascota</h3>

                <div class="fields">

                    <div class="field">
                        <label for="nombre">
                            Nombre de la mascota <span class="required">*</span>
                        </label>
                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            value="{{ old('nombre') }}"
                            class="@error('nombre') input-error @enderror"
                            placeholder="Ej. Max"
                            maxlength="255"
                            required
                            autofocus
                        >
                        @error('nombre')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="especie">
                            Especie <span class="required">*</span>
                        </label>
                        <select
                            id="especie"
                            name="especie"
                            class="@error('especie') input-error @enderror"
                            required
                        >
                            <option value="">Selecciona una especie</option>
                            @foreach (['Perro', 'Gato', 'Ave', 'Conejo', 'Reptil', 'Otro'] as $especie)
                                <option value="{{ $especie }}"
                                    @selected(old('especie') === $especie)>
                                    {{ $especie }}
                                </option>
                            @endforeach
                        </select>
                        @error('especie')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="raza">Raza</label>
                        <input
                            type="text"
                            id="raza"
                            name="raza"
                            value="{{ old('raza') }}"
                            placeholder="Ej. Labrador"
                            maxlength="255"
                        >
                    </div>

                    <div class="field">
                        <label for="edad">Edad en años</label>
                        <input
                            type="number"
                            id="edad"
                            name="edad"
                            value="{{ old('edad') }}"
                            min="0"
                            max="150"
                            placeholder="Ej. 4"
                        >
                        <span class="hint">Si no conoces la edad, puedes dejarlo vacío.</span>
                        @error('edad')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="sexo">
                            Sexo <span class="required">*</span>
                        </label>
                        <select
                            id="sexo"
                            name="sexo"
                            required
                        >
                            <option value="">Selecciona una opción</option>
                            <option value="Macho" @selected(old('sexo') === 'Macho')>
                                Macho
                            </option>
                            <option value="Hembra" @selected(old('sexo') === 'Hembra')>
                                Hembra
                            </option>
                            <option value="No especificado"
                                @selected(old('sexo') === 'No especificado')>
                                No especificado
                            </option>
                        </select>
                        @error('sexo')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <h3 class="section-title" style="margin-top: 32px;">
                    Datos del propietario
                </h3>

                <div class="fields">

                    <div class="field">
                        <label for="dueno">
                            Nombre del dueño <span class="required">*</span>
                        </label>
                        <input
                            type="text"
                            id="dueno"
                            name="dueno"
                            value="{{ old('dueno') }}"
                            placeholder="Nombre completo"
                            maxlength="255"
                            required
                        >
                        @error('dueno')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="telefono_dueno">Teléfono del dueño</label>
                        <input
                            type="tel"
                            id="telefono_dueno"
                            name="telefono_dueno"
                            value="{{ old('telefono_dueno') }}"
                            placeholder="Ej. 3312345678"
                            maxlength="20"
                        >
                        @error('telefono_dueno')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field full">
                        <label for="observaciones">Observaciones</label>
                        <textarea
                            id="observaciones"
                            name="observaciones"
                            maxlength="5000"
                            placeholder="Alergias conocidas u otra información importante..."
                        >{{ old('observaciones') }}</textarea>
                        @error('observaciones')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="form-actions">
                    <a href="{{ route('mascotas.index') }}"
                       class="button button-blue">
                        Cancelar
                    </a>

                    <button type="submit" class="button button-pink">
                        Guardar mascota
                    </button>
                </div>

            </form>
        </div>
    </section>

</main>

</body>
</html>
