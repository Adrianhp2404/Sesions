<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background-color: #f3f4f6;
            color: #1f2937;
        }
        header {
            background-color: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        .nav-brand {
            text-decoration: none;
            font-weight: 700;
            color: #111827;
            font-size: 1.25rem;
        }
        .nav-menu {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .nav-user {
            color: #4b5563;
            font-weight: 500;
        }
        .btn {
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            border: none;
            display: inline-block;
        }
        .btn-primary {
            background-color: #2563eb;
            color: white;
        }
        .btn-danger {
            background-color: #dc2626;
            color: white;
        }
        .btn-outline {
            color: #2563eb;
            background: transparent;
        }
        .card {
            max-width: 400px;
            margin: 3rem auto;
            background: white;
            padding: 2.5rem;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .card h2 {
            margin-top: 0;
            margin-bottom: 1.5rem;
            color: #111827;
        }
        .form-group {
            margin-bottom: 1.25rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #374151;
            font-size: 0.875rem;
            font-weight: 500;
        }
        .form-control {
            width: 100%;
            padding: 0.75rem;
            box-sizing: border-box;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 0.875rem;
        }
        .alert-error {
            background-color: #fee2e2;
            color: #991b1b;
            padding: 0.75rem;
            border-radius: 0.375rem;
            margin-bottom: 1.25rem;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    
    <header>
        <nav>
            <a href="/" class="nav-brand">Mi Aplicación</a>
            <div class="nav-menu">
                @if(session()->has('token'))
                    <span class="nav-user">Hola, {{ session('name') }}</span>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Cerrar sesión</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Crear cuenta</a>
                @endif
            </div>
        </nav>
    </header>

    <div class="card">
        <h2>Iniciar Sesión</h2>

        @if($errors->any())
            <div class="alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="/login" method="POST">
            @csrf
            <div class="form-group">
                <label>Correo Electrónico</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 0.75rem; margin-top: 0.5rem;">Entrar</button>
        </form>
    </div>

</body>
</html>