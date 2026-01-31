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