<?php
// includes/functions.php

/**
 * Dump and Die: Para você debugar variáveis rapidamente.
 */
function dd($data) {
    echo '<pre style="background: #222; color: #0f0; padding: 20px; border-radius: 5px;">';
    print_r($data);
    echo '</pre>';
    die();
}

/**
 * Escapar HTML: Proteção contra ataques XSS na hora de dar echo.
 */
function e($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/**
 * Redirecionamento rápido.
 */
function redirect($url) {
    header("Location: $url");
    exit;
}

/**
 * Carrega um módulo de lógica da pasta src
 * Exemplo: load_module('Auth/auth');
 */
function load_module($modulePath) {
    // Definimos o caminho absoluto a partir da raiz do projeto
    $file = __DIR__ . '/../src/' . $modulePath . '.php';

    if (file_exists($file)) {
        require_once $file;
    } else {
        // Um erro amigável para você não ficar perdido no debug
        die("Erro crítico: O módulo de lógica '{$modulePath}' não foi encontrado.");
    }
}

/**
 * Carrega um componente da pasta templates
 * Exemplo: templates('header', ['titulo' => 'Dashboard']);
 */
function templates($name, $data = []) {
    // Transforma as chaves do array em variáveis (ex: $data['titulo'] vira $titulo)
    extract($data);

    $file = __DIR__ . '/../templates/' . $name . '.php';

    if (file_exists($file)) {
        require_once $file;
    } else {
        die("Erro: Template '{$name}' não encontrado em templates/.");
    }
}

/**
 * Carrega uma view da pasta views
 * Exemplo: view('dashboard', ['usuarios' => $lista]);
 */
function view($name, $data = []) {
    // Torna a conexão com o banco disponível dentro da view
    global $pdo;

    // Transforma chaves do array em variáveis (ex: ['nome' => 'Gabriel'] vira $nome)
    extract($data);

    $file = __DIR__ . '/../views/' . $name . '.php';

    if (file_exists($file)) {
        require_once $file;
    } else {
        die("Erro crítico: A view '{$name}' não foi encontrada na pasta views/.");
    }
}

/**
 * Gera um token CSRF se não existir e retorna o campo HTML oculto
 */
function csrf_field() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return '<input type="hidden" name="csrf_token" value="' . $_SESSION['csrf_token'] . '">';
}

/**
 * Valida o token CSRF enviado via POST
 */
function check_csrf_token() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $token = $_POST['csrf_token'] ?? '';
        if (!$token || $token !== ($_SESSION['csrf_token'] ?? '')) {
            // Em Penápolis ou em qualquer lugar, segurança em primeiro lugar:
            header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
            die("Erro de validação CSRF. A requisição parece maliciosa.");
        }
    }
}