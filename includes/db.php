<?php
// includes/db.php

// Buscamos os dados do .env que você já criou
$host    = $_ENV['DB_HOST'] ?? 'localhost';
$db      = $_ENV['DB_NAME'] ?? '';
$user    = $_ENV['DB_USER'] ?? '';
$pass    = $_ENV['DB_PASS'] ?? '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    // Lança uma exceção se houver erro (para você capturar no log)
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    // Transforma o resultado das queries em Array Associativo por padrão
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // Desativa a emulação de prepared statements (usa a do MySQL, mais seguro)
    PDO::ATTR_EMULATE_PREPARES   => false,
    // Verifica se já existe uma conexão
    PDO::ATTR_PERSISTENT         => true,
];

try {
    // Criamos a variável global $pdo
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // Em produção, você logaria isso em logs/error.log ao invés de exibir
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}