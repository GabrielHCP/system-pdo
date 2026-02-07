<?php
// src/Financeiro/financeiro.php


/**
 * Busca os clientes da empresa logada (Futuramente migrar para src/clientes)
 * @param PDO $pdo
 * @return array
 */
function buscar_clientes_empresa($pdo){
 
    $empresa_id = $_SESSION['empresa_id'];

    $sql = "SELECT * FROM usuarios WHERE empresa_id = :empresa_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['empresa_id' => $empresa_id]);
    return $stmt->fetchAll();

}


/**
 * Salva ou edita fatura no banco de dados
 * @param PDO $pdo
 * @param array $dados
 * @return bool Retorna verdadeiro em caso de sucesso.
 */
function salvar_fatura($pdo, $dados) {

    // Se veio ID, é edição.
    $id = $dados['id'] ?? null;

    if($id) {
        // Lógica de UPDATE
        $sql = "";

    } else {
        // Lógica de INSERT
        $numero_fatura = gerar_numero_fatura();

        $sql = <<<SQL
        INSERT INTO faturas (
            empresa_id, cliente_id, numero_fatura, descricao, 
            valor_bruto, desconto, valor_liquido, status, 
            data_emissao, data_vencimento, metodo_pagamento 
        ) VALUES (
            :empresa_id, :cliente_id, :numero_fatura, :descricao,
            :valor_bruto, :desconto, :valor_liquido, :status,
            :data_emissao, :data_vencimento, :metodo_pagamento
        )
        SQL;

        $stmt = $pdo->prepare($sql);

        $params = [
            'empresa_id' => (int) $_SESSION['empresa_id'],
            'cliente_id' => (int) $dados['cliente_id'],
            'numero_fatura' => (string) $numero_fatura,
            'descricao' => (string) $dados['descricao'],
            'valor_bruto' => (float) $dados['valor'],
            'desconto' => (float) isset($dados['desconto']) ?? 0,
            'valor_liquido' => (float) $dados['valor'],
            'status' => (string) 'pendente', // Status padrão 
            'data_emissao' => (string) $dados['data_emissao'],
            'data_vencimento' => (string) $dados['data_vencimento'],
            'metodo_pagamento' => (string ) 'pix' // Valor padrão por enquanto
        ];

        $stmt->execute($params);

        // Retorna true se inseriu 
        return $stmt->rowCount();

    }
    


}

/**
 * Gera um número único para a fatura
 * @return string o número gerado no formato YYYYRRRR
 */
function gerar_numero_fatura() {
    // Retorna ano atual + número aleatório
    return date('Y') . rand(1000, 9999);
}