<?php 
// src/Empresa/tenant.php

function buscar_empresa_por_slug($pdo, $slug) {
    $stmt = $pdo->prepare("SELECT * FROM empresas WHERE slug = :slug AND status = 'ativo' LIMIT 1");
    $stmt->execute(['slug' => $slug]);
    return $stmt->fetch();
}