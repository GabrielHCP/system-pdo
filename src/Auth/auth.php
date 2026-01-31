<?php
// src/Auth/auth.php

/**
 * Valida o login e retorna os dados do usuário e sua empresa
 */
function tentar_login($pdo, $email, $senha) {
    // Buscamos o usuário e o nome da empresa dele (fazendo um JOIN)
    $sql = "SELECT u.*, e.nome as empresa_nome 
            FROM usuarios u 
            JOIN empresas e ON u.empresa_id = e.id 
            WHERE u.email = :email AND u.status = 'ativo' 
            LIMIT 1";
            
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $usuario = $stmt->fetch();

    // Verificamos se o usuário existe e se a senha bate (usando password_verify)
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        return $usuario;
    }

    return false;
}