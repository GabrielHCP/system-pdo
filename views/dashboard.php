<?php templates('header', ['titulo' => 'Dashboard']); ?>

<div class="row g-4 mb-4">
    <!-- Cabeçalho de Boas-vindas -->
    <div class="col-12">
        <div class="card border-0 shadow-sm bg-primary text-white overflow-hidden">
            <div class="card-body p-4 position-relative">
                <div class="position-relative z-1">
                    <h2 class="fw-bold mb-1">Olá, <?= e($_SESSION['usuario_nome']) ?>! 👋</h2>
                    <p class="mb-0 opacity-75">Bem-vindo de volta ao painel da <strong><?= e($_SESSION['empresa_nome']) ?></strong>.</p>
                </div>
                <!-- Círculos decorativos no fundo -->
                <div class="position-absolute top-0 end-0 mt-n4 me-n4 bg-white opacity-10 rounded-circle" style="width: 200px; height: 200px;"></div>
            </div>
        </div>
    </div>

    <!-- Cards de Estatísticas -->
    <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="p-2 bg-success bg-opacity-10 rounded-3 me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-wallet2 text-success" viewBox="0 0 16 16">
                            <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.5-1.5H2V1.78a1.5 1.5 0 0 1 1.864-1.454zM3 3h9v-1.22a.5.5 0 0 0-.622-.484l-7.864 1.454A.5.5 0 0 0 3 3m1.5 2a.5.5 0 0 0 0 1h8a.5.5 0 0 0 0-1z"/>
                        </svg>
                    </div>
                    <span class="text-muted small">Receita Mensal</span>
                </div>
                <h3 class="fw-bold mb-0">R$ 12.450,00</h3>
                <span class="text-success small fw-medium">
                    +12% <span class="text-muted fw-normal ms-1">vs mês anterior</span>
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="p-2 bg-primary bg-opacity-10 rounded-3 me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-people text-primary" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                        </svg>
                    </div>
                    <span class="text-muted small">Clientes Ativos</span>
                </div>
                <h3 class="fw-bold mb-0">842</h3>
                <span class="text-success small fw-medium">
                    +5 <span class="text-muted fw-normal ms-1">hoje</span>
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="p-2 bg-warning bg-opacity-10 rounded-3 me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-clock-history text-warning" viewBox="0 0 16 16">
                            <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342zm1.747.996a7 7 0 0 0-.747-.534l.459-.888c.317.165.62.35.904.556zm1.503 1.503a7 7 0 0 0-.556-.903l.888-.459c.306.31.585.65.836 1.013zm.996 1.747a7 7 0 0 0-.342-1.126l.976-.219c.142.365.257.743.342 1.126zM16 8v.5a8 8 0 0 1-.022.589L15 9a7 7 0 0 0-1-1zm-1.042 1.747.976.219c-.085.383-.2.76-.342 1.126l-.976-.219c.142-.365.257-.743.342-1.126zm-.996 1.747.888.459c-.25.362-.53.702-.836 1.013l-.888-.459c.306-.31.585-.65.836-1.013zm-1.503 1.503.459.888a8 8 0 0 1-1.013-.836l.459-.888c.317.165.62.35.904.556zm-1.747.996.219.976c-.383.086-.76.2-1.126.342l-.219-.976c.383-.086.76-.2 1.126-.342zM8 15a7 7 0 0 0 1-1v1a8 8 0 0 1-.589-.022l.104-.993zm-2.004-.45a7 7 0 0 0 .985.299l-.219.976c-.383-.086-.76-.2-1.126-.342l.219-.976c.383.086.76.2 1.126.342zM4.257 14.053l-.459.888a8 8 0 0 1-.904-.556l.459-.888c.317.165.62.35.904.556zm-1.503-1.503-.888.459a8 8 0 0 1-.836-1.013l.888-.459c.25-.362.53-.702.836-1.013zm-.996-1.747-.976-.219a8 8 0 0 1-.342-1.126l.976.219c.085.383.2.76.342 1.126zM1 8a7 7 0 0 0 1 1l-1 .104A8 8 0 0 1 0 8.5V8zm.45-2.004L.474 5.777C.56 5.394.675 5.016.817 4.65l.976.219c-.142.365-.257.743-.342 1.126zm.996-1.747L.987 3.79a8 8 0 0 1 .836-1.013l.888.459c-.25.362-.53.702-.836 1.013zm1.503-1.503L3.49 1.86a8 8 0 0 1 1.013-.836l.459.888c-.317.165-.62.35-.904.556zM8 3a.5.5 0 0 0-.5.5v4a.5.5 0 0 0 .246.434l3 1.732a.5.5 0 0 0 .496-.868L8.5 7.036V3.5A.5.5 0 0 0 8 3"/>
                        </svg>
                    </div>
                    <span class="text-muted small">Pendentes</span>
                </div>
                <h3 class="fw-bold mb-0">12</h3>
                <span class="text-danger small fw-medium">
                    Atenção necessária
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="p-2 bg-info bg-opacity-10 rounded-3 me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-box-seam text-info" viewBox="0 0 16 16">
                            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.747-6.5 2.6v7.422l3.228-1.291a.5.5 0 0 0 .304-.462V5.144l2.968-1.187zM11 13.04l-2 1V5.933l2-1zm-1 1.433-3.228-1.291a.5.5 0 0 0-.304-.462V5.144L3.5 6.331v7.412l3.228 1.291a.5.5 0 0 0 .304-.462V5.442l2 1zM11.5 5.5l-3.228-1.291a.5.5 0 0 0-.304-.462V2.442l3.228 1.291a.5.5 0 0 0 .304-.462zM3.5 13.04l-2 1V5.933l2-1zm-1 1.433-3.228-1.291a.5.5 0 0 0-.304-.462V5.144L.5 6.331v7.412l3.228 1.291a.5.5 0 0 0 .304-.462V5.442l2 1z"/>
                        </svg>
                    </div>
                    <span class="text-muted small">Produtos</span>
                </div>
                <h3 class="fw-bold mb-0">156</h3>
                <span class="text-muted small">
                    Gerenciar estoque
                </span>
            </div>
        </div>
    </div>

    <!-- Tabela de Atividades Recentes -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">Atividades Recentes</h5>
                <a href="#" class="btn btn-sm btn-light text-primary fw-medium">Ver tudo</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light text-muted small uppercase">
                            <tr>
                                <th class="ps-4 border-0">Cliente</th>
                                <th class="border-0">Data</th>
                                <th class="border-0">Status</th>
                                <th class="border-0 text-end pe-4">Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm bg-primary bg-opacity-10 text-primary rounded-circle me-3 p-2 text-center" style="width: 38px; height: 38px;">
                                            JS
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-medium">João Silva</p>
                                            <small class="text-muted">Serviço de Manutenção</small>
                                        </div>
                                    </div>
                                </td>
                                <td>01 Fev, 2026</td>
                                <td><span class="badge bg-success-subtle text-success px-2 py-1">Pago</span></td>
                                <td class="text-end pe-4 fw-medium text-dark">R$ 450,00</td>
                            </tr>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm bg-warning bg-opacity-10 text-warning rounded-circle me-3 p-2 text-center" style="width: 38px; height: 38px;">
                                            MA
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-medium">Maria Andrade</p>
                                            <small class="text-muted">Consultoria</small>
                                        </div>
                                    </div>
                                </td>
                                <td>31 Jan, 2026</td>
                                <td><span class="badge bg-warning-subtle text-warning px-2 py-1">Pendente</span></td>
                                <td class="text-end pe-4 fw-medium text-dark">R$ 1.200,00</td>
                            </tr>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm bg-info bg-opacity-10 text-info rounded-circle me-3 p-2 text-center" style="width: 38px; height: 38px;">
                                            RC
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-medium">Ricardo Costa</p>
                                            <small class="text-muted">Hardware</small>
                                        </div>
                                    </div>
                                </td>
                                <td>30 Jan, 2026</td>
                                <td><span class="badge bg-danger-subtle text-danger px-2 py-1">Atrasado</span></td>
                                <td class="text-end pe-4 fw-medium text-dark">R$ 890,00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Atalhos Rápidos -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-0 py-3">
                <h5 class="fw-bold mb-0">Ações Rápidas</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-3">
                    <button class="btn btn-outline-primary py-3 text-start px-3 border-dashed">
                        <div class="d-flex align-items-center">
                            <span class="fs-4 me-3">➕</span>
                            <div>
                                <small class="d-block text-muted">Novo Registro</small>
                                <strong>Adicionar Cliente</strong>
                            </div>
                        </div>
                    </button>
                    <button class="btn btn-outline-success py-3 text-start px-3 border-dashed">
                        <div class="d-flex align-items-center">
                            <span class="fs-4 me-3">📄</span>
                            <div>
                                <small class="d-block text-muted">Financeiro</small>
                                <strong>Gerar Fatura</strong>
                            </div>
                        </div>
                    </button>
                    <button class="btn btn-outline-info py-3 text-start px-3 border-dashed">
                        <div class="d-flex align-items-center">
                            <span class="fs-4 me-3">📊</span>
                            <div>
                                <small class="d-block text-muted">Relatórios</small>
                                <strong>Exportar CSV</strong>
                            </div>
                        </div>
                    </button>
                </div>
                
                <hr class="my-4 opacity-50">
                
                <div class="alert alert-light border-0 mb-0 small">
                    <p class="mb-2 text-muted fw-bold text-uppercase">Informações Adicionais</p>
                    <p class="mb-0">Seu plano vence em <strong>15 dias</strong>. <a href="#">Renovar agora</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Estilos extras para o dashboard se sentir "premium" */
.card {
    transition: transform 0.2s ease-in-out;
}
.border-dashed {
    border-style: dashed !important;
}
.bg-success-subtle { background-color: #d1e7dd; }
.bg-warning-subtle { background-color: #fff3cd; }
.bg-danger-subtle { background-color: #f8d7da; }
.avatar-sm { display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 0.8rem; }
</style>

<?php templates('footer'); ?>
