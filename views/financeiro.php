<?php templates('header', ['titulo' => 'Financeiro - Faturas']); ?>

<div class="row g-4 mb-4">
    <!-- Título da Página e Ação -->
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fw-bold mb-0">Gestão Financeira</h2>
            <p class="text-muted mb-0">Visualize e gerencie as faturas da <strong><?= e($_SESSION['empresa_nome']) ?></strong>.</p>
        </div>
        <button class="btn btn-primary d-flex align-items-center gap-2 px-4 py-2 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalFatura">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
            </svg>
            Nova Fatura
        </button>
    </div>

    <!-- Cards de Resumo Financeiro -->
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="p-2 bg-success bg-opacity-10 rounded-3 me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle text-success" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                        </svg>
                    </div>
                    <span class="text-muted small fw-medium">Total Recebido</span>
                </div>
                <h3 class="fw-bold mb-0">R$ 45.200,00</h3>
                <small class="text-success">+R$ 2.400,00 este mês</small>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="p-2 bg-warning bg-opacity-10 rounded-3 me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-clock text-warning" viewBox="0 0 16 16">
                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                        </svg>
                    </div>
                    <span class="text-muted small fw-medium">A Receber</span>
                </div>
                <h3 class="fw-bold mb-0">R$ 15.840,00</h3>
                <small class="text-muted">7 faturas pendentes</small>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="p-2 bg-danger bg-opacity-10 rounded-3 me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle text-danger" viewBox="0 0 16 16">
                            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                        </svg>
                    </div>
                    <span class="text-muted small fw-medium">Vencidos</span>
                </div>
                <h3 class="fw-bold mb-0">R$ 2.150,00</h3>
                <small class="text-danger">2 faturas em atraso</small>
            </div>
        </div>
    </div>

    <!-- Filtros e Tabela -->
    <div class="col-12">
        <div class="card border-0 shadow-sm mt-2">
            <div class="card-header bg-white border-0 py-3 d-sm-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">Listagem de Faturas</h5>
                <div class="d-flex gap-2 mt-3 mt-sm-0">
                    <input type="text" class="form-control form-control-sm" placeholder="Buscar cliente ou #ID" style="width: 250px;">
                    <select class="form-select form-select-sm" style="width: 150px;">
                        <option value="">Todos Status</option>
                        <option value="pago">Pago</option>
                        <option value="pendente">Pendente</option>
                        <option value="atrasado">Atrasado</option>
                    </select>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light text-muted small uppercase">
                            <tr>
                                <th class="ps-4 border-0">ID / Data</th>
                                <th class="border-0">Cliente</th>
                                <th class="border-0">Serviço / Descrição</th>
                                <th class="border-0">Vencimento</th>
                                <th class="border-0">Status</th>
                                <th class="border-0 text-end">Valor</th>
                                <th class="border-0 text-center pe-4">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Exemplo de Item Pago -->
                            <tr>
                                <td class="ps-4">
                                    <span class="fw-bold text-dark">#1024</span><br>
                                    <small class="text-muted">01/02/2026</small>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm bg-primary bg-opacity-10 text-primary rounded-circle me-3 p-2 text-center" style="width: 38px; height: 38px;">
                                            JS
                                        </div>
                                        <span class="fw-medium">João Silva</span>
                                    </div>
                                </td>
                                <td><span class="text-muted small">Manutenção de Servidores</span></td>
                                <td><small>05/02/2026</small></td>
                                <td><span class="badge bg-success-subtle text-success px-2 py-1">Pago</span></td>
                                <td class="text-end fw-bold text-dark">R$ 850,00</td>
                                <td class="text-center pe-4">
                                    <div class="dropdown">
                                        <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Ações
                                        </button>
                                        <ul class="dropdown-menu shadow border-0">
                                            <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Ver Detalhes</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Editar</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Excluir</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Exemplo de Item Pendente -->
                            <tr>
                                <td class="ps-4">
                                    <span class="fw-bold text-dark">#1023</span><br>
                                    <small class="text-muted">31/01/2026</small>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm bg-warning bg-opacity-10 text-warning rounded-circle me-3 p-2 text-center" style="width: 38px; height: 38px;">
                                            MA
                                        </div>
                                        <span class="fw-medium">Maria Andrade</span>
                                    </div>
                                </td>
                                <td><span class="text-muted small">Consultoria Mensal</span></td>
                                <td><small>10/02/2026</small></td>
                                <td><span class="badge bg-warning-subtle text-warning px-2 py-1">Pendente</span></td>
                                <td class="text-end fw-bold text-dark">R$ 1.500,00</td>
                                <td class="text-center pe-4">
                                    <button class="btn btn-light btn-sm" title="Editar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg></button>
                                </td>
                            </tr>

                            <!-- Exemplo de Item Atrasado -->
                            <tr>
                                <td class="ps-4">
                                    <span class="fw-bold text-dark">#1022</span><br>
                                    <small class="text-muted">15/01/2026</small>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm bg-danger bg-opacity-10 text-danger rounded-circle me-3 p-2 text-center" style="width: 38px; height: 38px;">
                                            RC
                                        </div>
                                        <span class="fw-medium">Ricardo Costa</span>
                                    </div>
                                </td>
                                <td><span class="text-muted small">Venda de Licenças Core</span></td>
                                <td><small class="text-danger fw-bold">30/01/2026</small></td>
                                <td><span class="badge bg-danger-subtle text-danger px-2 py-1">Atrasado</span></td>
                                <td class="text-end fw-bold text-dark">R$ 2.450,00</td>
                                <td class="text-center pe-4">
                                    <button class="btn btn-primary btn-sm">Notificar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-white border-0 py-3">
                    <nav>
                        <ul class="pagination pagination-sm mb-0 justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Nova/Editar Fatura -->
<div class="modal fade" id="modalFatura" tabindex="-1" aria-labelledby="modalFaturaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-primary text-white border-0">
                <h5 class="modal-title fw-bold" id="modalFaturaLabel">📄 Gerar Nova Fatura</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="formFatura" action="/app/financeiro/salvar" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" id="fatura_id"> <!-- Campo ID -->
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-medium">Cliente</label>
                            <select class="form-select" name="cliente_id" required>
                                <option value="">Selecione um cliente...</option>
                                <?php foreach($clientes as $cliente): ?>

                                    <option value="<?= e($cliente['id']); ?>"><?= e($cliente['nome']); ?></option>

                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Valor (R$)</label>
                            <input type="number" step="0.01" class="form-control" name="valor" placeholder="0,00" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-medium">Descrição do Serviço</label>
                            <input type="text" class="form-control" name="descricao" placeholder="Ex: Manutenção Mensal" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Data de Emissão</label>
                            <input type="date" class="form-control" name="data_emissao" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Data de Vencimento</label>
                            <input type="date" class="form-control" name="data_vencimento" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-medium">Observações (Interno)</label>
                            <textarea class="form-control" name="observacoes" rows="2"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0 p-4 pt-0">
                <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="formFatura" class="btn btn-primary px-4 fw-bold">Salvar Fatura</button>
            </div>
        </div>
    </div>
</div>

<style>
.bg-success-subtle { background-color: #d1e7dd; }
.bg-warning-subtle { background-color: #fff3cd; }
.bg-danger-subtle { background-color: #f8d7da; }
.avatar-sm { display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 0.8rem; }
.table thead th { font-weight: 600; letter-spacing: 0.5px; }
.card { border-radius: 12px; }
.btn-primary { border-radius: 8px; font-weight: 500; transition: all 0.3s; }
.btn-primary:hover { transform: translateY(-1px); box-shadow: 0 4px 12px rgba(0,0,0,0.15); }
</style>

<?php templates('footer'); ?>
