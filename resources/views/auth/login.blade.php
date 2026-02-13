<x-guest-layout>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background: #f5f6fa;">
        <div class="card shadow-lg p-4" style="width: 380px; border-radius: 12px;">
            
            <div class="text-center mb-3">
                <img src="https://cdn-icons-png.flaticon.com/512/5087/5087579.png" 
                     alt="CRM Logo" 
                     width="80" 
                     class="mb-3">
                <h3 class="fw-bold">Acceso al CRM</h3>
                <p class="text-muted">Inicia sesión para continuar</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Correo electrónico</label>
                    <input id="email" class="form-control" type="email" name="email" required autofocus>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input id="password" class="form-control" type="password" name="password" required>
                </div>

                <div class="form-check mb-3">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label class="form-check-label" for="remember_me">Recordarme</label>
                </div>

                <button class="btn btn-primary w-100">Entrar</button>
            </form>
        </div>
    </div>
</x-guest-layout>