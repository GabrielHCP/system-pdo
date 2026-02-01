<?php 
// public/index.php

// Basta carregar o init e as configurações de banco
require_once __DIR__ . '/../includes/init.php';

$router = new \Bramus\Router\Router();

// Middleware Global para proteger todos os POSTs do sistema
$router->before('POST', '/.*', function() {
    check_csrf_token();
});

// Processa o envio formulário
$router->post('/', function() use ($pdo) {

    // Carrega módulo de Auth
    load_module('Auth/auth');
    processar_login_dinamico($pdo);
    
});

/**
 *  Área restrita (Multi-tenant)
 *  O middleware abaixo protege qualquer URL que comece com /app 
 * */ 

$router->before('GET|POST', '/app/.*', function(){

    if(!isset($_SESSION['usuario_id'])) {
        redirect('/');
    }

    /**
     * Se chegou aqui é porque está logado  
     * Podemos aproveitar e garantir que os dados da empresa estão na sessão
     */

    if(!isset($_SESSION['empresa_id'])){
        redirect('/');
    }

});

// Rota da dashboard
$router->get('/app/dashboard', function(){
    
    view('dashboard');
});

// Rota de Logout
$router->get('/logout', function() {
    session_destroy();
    redirect('/');
});


/** 
 * Rota que aceita / (raiz) ou /{slug}
 * Foi movida aqui para baixo porque estava conflitando com outras rotas
*/
$router->get('/{slug}?', function($slug = null) use ($pdo) {

    // Se não vier nada no slug, assume 'hedder'
    $slugAtual = empty($slug) ? 'hedder' : $slug;

    load_module('Empresa/tenant');
    $empresa = buscar_empresa_por_slug($pdo, $slugAtual);

    if (!$empresa) {
        // Se o cara digitou /empresa-fantasma, manda para a padrão
        redirect('/');
    }

    view('login', [
        'empresa' => $empresa,
        'titulo'  => 'Login - ' . $empresa['nome']
    ]);

});

// 404 - Página não encontrada
$router->set404(function() {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    echo "Página não encontrada!";
});

$router->run();