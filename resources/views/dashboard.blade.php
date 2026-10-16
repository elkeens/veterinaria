
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | VetCare</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --pink: #e78bb5;
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

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: var(--white);
            padding: 30px 18px;
            border-right: 1px solid #f0edf3;
            flex-shrink: 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 10px;
            margin-bottom: 42px;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            border-radius: 15px;
            background: var(--pink-light);
            font-size: 24px;
        }

        .brand h2 {
            font-size: 21px;
            font-weight: 800;
        }

        .brand span {
            color: var(--pink);
        }

        .menu-title {
            color: var(--muted);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.5px;
            padding: 0 12px;
            margin-bottom: 13px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 14px;
            text-decoration: none;
            color: #73778c;
            border-radius: 12px;
            font-weight: 700;
            transition: 0.2s;
        }

        .menu a:hover,
        .menu a.active {
            background: var(--pink-light);
            color: #bd5487;
        }

        .menu a .emoji {
            font-size: 19px;
        }

        .sidebar-note {
            margin-top: 45px;
            padding: 18px;
            border-radius: 16px;
            background: var(--blue-light);
            color: #4778b7;
            font-size: 13px;
            line-height: 1.6;
        }

        .sidebar-note strong {
            display: block;
            margin-bottom: 5px;
        }

        .main {
            flex: 1;
            min-width: 0;
            padding: 32px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 32px;
        }

        .topbar h1 {
            font-size: 28px;
            font-weight: 800;
        }

        .topbar p {
            color: var(--muted);
            margin-top: 4px;
        }

        .admin {
            display: flex;
            align-items: center;
            gap: 10px;
            background: white;
            padding: 10px 15px;
            border-radius: 14px;
            box-shadow: 0 4px 18px #27365b08;
        }

        .admin-avatar {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            background: var(--blue-light);
            border-radius: 12px;
            font-size: 21px;
        }

        .admin small {
            display: block;
            color: var(--muted);
        }

        .welcome {
            background: linear-gradient(115deg, #f9dfeb, #e2edff);
            border-radius: 22px;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 27px;
            overflow: hidden;
        }

        .welcome h2 {
            font-size: 25px;
            margin-bottom: 8px;
        }

        .welcome p {
            color: #6f7187;
            max-width: 440px;
            line-height: 1.7;
        }

        .welcome .paw {
            font-size: 70px;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 28px 0 17px;
        }

        .section-heading h2 {
            font-size: 19px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .card {
            background: white;
            border: 1px solid #f0edf3;
            border-radius: 18px;
            padding: 23px;
            box-shadow: 0 5px 20px #27365b05;
        }

        .card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 20px;
        }

        .card-icon {
            width: 47px;
            height: 47px;
            display: grid;
            place-items: center;
            border-radius: 15px;
            font-size: 23px;
        }

        .pink { background: var(--pink-light); }
        .blue { background: var(--blue-light); }
        .lavender { background: #eee9ff; }

        .card-label {
            color: var(--muted);
            font-weight: 700;
            font-size: 13px;
        }

        .card-number {
            font-size: 31px;
            font-weight: 800;
        }

        .card-description {
            font-size: 12px;
            color: var(--muted);
            margin-top: 5px;
        }

        .table-card {
            background: white;
            border: 1px solid #f0edf3;
            border-radius: 18px;
            overflow: hidden;
        }

        .table-scroll {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            background: #fbfaff;
            color: var(--muted);
            font-size: 12px;
            padding: 16px 20px;
        }

        td {
            padding: 17px 20px;
            border-top: 1px solid #f2f0f5;
            font-size: 13px;
        }

        .pet-name {
            font-weight: 800;
        }

        .empty {
            text-align: center;
            padding: 35px 20px;
            color: var(--muted);
        }

        .empty span {
            display: block;
            font-size: 35px;
            margin-bottom: 8px;
        }

        .footer {
            text-align: center;
            color: var(--muted);
            font-size: 12px;
            margin-top: 30px;
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 205px;
            }

            .main {
                padding: 22px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 18px;
                border-right: none;
                border-bottom: 1px solid #f0edf3;
            }

            .brand {
                margin-bottom: 20px;
            }

            .menu {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .menu-title,
            .sidebar-note {
                display: none;
            }

            .menu a {
                padding: 10px;
                font-size: 12px;
            }

            .main {
                padding: 18px;
            }

            .topbar h1 {
                font-size: 22px;
            }

            .admin {
                padding: 7px;
            }

            .admin > div:last-child {
                display: none;
            }

            .welcome {
                padding: 22px;
            }

            .welcome h2 {
                font-size: 21px;
            }

            .welcome .paw {
                font-size: 45px;
            }
        }
    </style>
</head>

<body>
<div class="layout">

    <aside class="sidebar">
        <div class="brand">
            <div class="brand-icon">🐾</div>
            <h2>Vet<span>Care</span></h2>
        </div>

        <div class="menu-title">MENÚ PRINCIPAL</div>

        <nav class="menu">
            <a href="{{ route('dashboard') }}" class="active">
                <span class="emoji">🏠</span> Inicio
            </a>

            <a href="{{ route('mascotas.index') }}" class="active">
                <span class="emoji">🐶</span> Mascotas
            </a>

            <a href="{{ route('consultas.index') }}" class="active">
                <span class="emoji">📅</span> Consultas
            </a>
        </nav>

        <div class="sidebar-note">
            <strong>💗 Cuidamos de ellos</strong>
            Cada mascota merece atención y cariño.
        </div>
    </aside>

    <main class="main">

        <header class="topbar">
            <div>
                <h1>Panel principal</h1>
                <p>Resumen administrativo de la veterinaria.</p>
            </div>

            <div class="admin">
                <div class="admin-avatar">👩‍⚕️</div>
                <div>
                    <strong>Administración</strong>
                    <small>Panel de control</small>
                </div>
            </div>
        </header>

        <section class="welcome">
            <div>
                <h2>¡Bienvenido a VetCare! 🩷</h2>
                <p>
                    Administra las mascotas, consulta sus historiales
                    y mantén organizada la información de tus pacientes.
                </p>
            </div>
            <div class="paw">🐾</div>
        </section>

        <div class="section-heading">
            <h2>Resumen general</h2>
        </div>

        <section class="cards">

            <article class="card">
                <div class="card-top">
                    <div class="card-icon pink">🐶</div>
                    <span class="card-label">Pacientes</span>
                </div>
                <div class="card-number">{{ $totalMascotas }}</div>
                <div class="card-description">Mascotas registradas</div>
            </article>

            <article class="card">
                <div class="card-top">
                    <div class="card-icon blue">📋</div>
                    <span class="card-label">Historiales</span>
                </div>
                <div class="card-number">{{ $totalConsultas }}</div>
                <div class="card-description">Consultas registradas</div>
            </article>

            <article class="card">
                <div class="card-top">
                    <div class="card-icon lavender">📅</div>
                    <span class="card-label">Actividad de hoy</span>
                </div>
                <div class="card-number">{{ $consultasHoy }}</div>
                <div class="card-description">Consultas con fecha de hoy</div>
            </article>

        </section>

        <div class="section-heading">
            <h2>Últimas consultas</h2>
        </div>

        <section class="table-card">
            <div class="table-scroll">
                <table>
                    <thead>
                        <tr>
                            <th>MASCOTA</th>
                            <th>FECHA</th>
                            <th>DIAGNÓSTICO</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($ultimasConsultas as $consulta)
                            <tr>
                                <td class="pet-name">
                                    {{ $consulta->mascota->nombre }}
                                </td>
                                <td>
                                    {{ $consulta->fecha->format('d/m/Y') }}
                                </td>
                                <td>
                                    {{ $consulta->diagnostico ?: 'Pendiente' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="empty">
                                    <span>🐾</span>
                                    <strong>Aún no hay consultas registradas</strong>
                                    <p>Cuando registres consultas, aparecerán aquí.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <footer class="footer">
            VetCare · Sistema administrativo veterinario 🐾
        </footer>

    </main>
</div>
</body>
</html>
