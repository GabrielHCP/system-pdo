<?php templates('header', ['titulo' => $titulo]); ?>

<div class="row justify-content-center align-items-center vh-100">
    <div class="col-md-4">
        <div class="card shadow border-0">
            <div class="card-body p-5">
                <h2 class="text-center mb-4 fw-bold">Login</h2>

                <?php if (isset($_GET['erro'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Usuário ou senha inválidos.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <form action="/" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="seu@email.com" required autofocus>
                    </div>

                    <div class="mb-4">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control form-control-lg" placeholder="******" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
        <p class="text-center mt-3 text-muted small">Suporte: Penápolis-SP</p>
    </div>
</div>

<?php templates('footer'); ?>