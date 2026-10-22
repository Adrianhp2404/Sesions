<header>
    <nav style="display: flex; justify-content: space-between; padding: 20px; background: #f3f4f6;">
        <div>
            <a href="/">Mi Aplicación</a>
        </div>
        <div>
            @if(session()->has('token'))
                <span style="margin-right: 15px;">Hola, {{ session('name') }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>
            @else
                <a href="{{ route('login') }}" style="margin-right: 10px;">Iniciar sesión</a>
                <a href="/register">Crear cuenta</a>
            @endif
        </div>
    </nav>
</header>