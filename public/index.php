<?php 
// public/index.php

// Basta carregar o init e as configurações de banco
require_once __DIR__ . '/../includes/init.php';
require_once __DIR__ . '/../includes/db.php'; 

$router = new \Bramus\Router\Router();

// --- Área pública ---

// Rota que aceita / (raiz) ou /{slug}
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

// Processa o envio formulário
$router->post('/', function() use ($pdo) {

    dd($_POST);
    
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

$router->get('app/dashboard', function(){
    echo 'Olá, mundo!';
});

// Rota de Logout
$router->get('/logout', function() {
    session_destroy();
    redirect('/');
});

// 404 - Página não encontrada
$router->set404(function() {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    echo "Página não encontrada!";
});

$router->run();