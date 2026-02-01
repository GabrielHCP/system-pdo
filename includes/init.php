<?php
// includes/init.php

// 1. Iniciar a sessão (Obrigatório para identificar a empresa logada)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Configurações de Erro (Em desenvolvimento, queremos ver tudo)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 3. Configurar o Fuso Horário (Importante para o seu módulo financeiro)
date_default_timezone_set('America/Sao_Paulo');

// 4. Carregar o Autoload do Composer e o .env
// Usamos o __DIR__ para garantir que o caminho esteja sempre correto
require_once __DIR__ . '/../vendor/autoload.php';

try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
} catch (Exception $e) {
    // Se o .env não existir, o sistema não deve rodar
    die("Erro ao carregar configurações do sistema (.env)");
}

// 5. Carregando o banco de dados
require_once __DIR__ . '/db.php';

// 6. Definição de constantes úteis
define('URL_BASE', $_ENV['URL_BASE'] ?? 'http://localhost:8080/admin/public');