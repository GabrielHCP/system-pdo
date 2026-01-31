<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($titulo ?? 'Área do cliente'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= URL_BASE ?>/assets/css/style.css">

    <style>
        :root {
            /* Pega a cor da empresa na sessão ou usa o azul padrão do Bootstrap */
            --cor-primaria: <?= $_SESSION['empresa_cor'] ?? '#0d6efd' ?>;
        }

        /* Sobrescreve classes do Bootstrap com a cor da empresa */
        .btn-primary {
            background-color: var(--cor-primaria) !important;
            border-color: var(--cor-primaria) !important;
        }
        
        .bg-primary {
            background-color: var(--cor-primaria) !important;
        }

        .text-primary {
            color: var(--cor-primaria) !important;
        }

        .navbar-custom {
            background-color: var(--cor-primaria);
            border-bottom: 3px solid rgba(0,0,0,0.1);
        }
    </style>
    
</head>
<body class="bg-light">

<?php if (isset($_SESSION['usuario_id'])): ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="/app/dashboard">Controle</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="/app/dashboard">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="/app/financeiro">Financeiro</a></li>
                </ul>
                <div class="d-flex align-items-center text-white">
                    <span class="me-3 small text-secondary"><?= e($_SESSION['empresa_nome']) ?></span>
                    <span class="me-3"><?= e($_SESSION['usuario_nome']) ?></span>
                    <a href="/logout" class="btn btn-outline-danger btn-sm">Sair</a>
                </div>
            </div>
        </div>
    </nav>
<?php endif; ?>

<div class="container">