# Documentação da Estrutura do Sistema

Este documento detalha a arquitetura e a organização de pastas do sistema **Admin**, explicando como cada componente interage para formar a aplicação.

---

## 📂 Árvore de Diretórios

```text
admin/
├── includes/          # Configurações globais e funções auxiliares
├── public/            # Ponto de entrada (index.php) e assets estáticos
├── src/               # Lógica de negócio (Módulos/Controladores)
├── templates/         # Componentes reutilizáveis de interface (Header/Footer)
├── views/             # Telas e layouts da aplicação
├── vendor/            # Dependências gerenciadas pelo Composer
├── .env               # Variáveis de ambiente (Configurações sensíveis)
├── composer.json      # Dependências e autoload do projeto
└── README.md          # Guia rápido de instalação
```

---

## 🧩 Detalhamento das Pastas

### 1. `public/`
É a única pasta que deve ser exposta ao servidor web.
- **`index.php`**: O "Front Controller". Todas as requisições passam por aqui. Ele inicializa o sistema, define as rotas usando o `Bramus\Router` e despacha a execução.
- **`assets/`**: Armazena arquivos CSS, JavaScript e imagens.

### 2. `includes/`
Contém a "infraestrutura" do sistema.
- **`init.php`**: Arquivo mestre de inicialização. Inicia sessões, configura erros, carrega o Composer, o `.env` e a conexão com o banco.
- **`db.php`**: Gerencia a conexão PDO com o banco de dados MySql.
- **`helpers.php`**: Conjunto de funções globais para facilitar o desenvolvimento (ex: `view()`, `redirect()`, `dd()`).

### 3. `src/` (Módulos)
Aqui reside a lógica "pesada" do sistema. Organizado por domínios:
- **`Auth/`**: Processamento de login, verificação de credenciais e gerenciamento de sessões.
- **`Empresa/`**: Lógica relacionada ao multi-tenant (identificação da empresa pelo slug).

### 4. `views/`
Arquivos PHP que contém o HTML final que o usuário vê. Elas são carregadas através da função `view()`.
- Exemplo: `dashboard.php`, `login.php`.

### 5. `templates/`
Partes de páginas que se repetem em várias views.
- **`header.php`**: Menu superior, cabeçalho HTML e inclusão de scripts/CSS.
- **`footer.php`**: Rodapé e scripts finais.

---

## ⚡ Fluxo de uma Requisição

1. O navegador acessa uma URL (ex: `/app/dashboard`).
2. O servidor redireciona para `public/index.php`.
3. O `index.php` carrega o `includes/init.php`.
4. O roteador (`Bramus\Router`) intercepta a URL.
5. Se for uma rota protegida (como `/app/.*`), um **Middleware** verifica se o usuário está logado.
6. A função da rota chama `load_module()` para processar lógica e `view()` para renderizar a interface.

---

## 🛠️ Funções Principais (Helpers)

| Função | Descrição |
| :--- | :--- |
| `view($nome, $dados)` | Carrega uma tela da pasta `views/` passando variáveis. |
| `templates($nome, $dados)` | Carrega um componente da pasta `templates/`. |
| `load_module($caminho)` | Inclui um arquivo de lógica da pasta `src/`. |
| `redirect($url)` | Atalho para redirecionamento de cabeçalho. |
| `csrf_field()` | Gera o input hidden com o token de segurança contra ataques CSRF. |
| `e($texto)` | Limpa o texto para evitar ataques XSS (htmlspecialchars). |

---

## 🔒 Segurança

- **Proteção CSRF**: Obrigatória para todas as requisições `POST`. O sistema valida o token automaticamente através de um middleware no `index.php`.
- **Prepared Statements**: Todas as queries ao banco devem usar PDO com parâmetros vinculados para evitar SQL Injection.
- **Sessões Seguras**: Gerenciadas nativamente pelo PHP e validadas em rotas sensíveis.
- **Multi-tenant**: O sistema filtra dados baseado no `empresa_id` armazenado na sessão após o login.

---

## 📦 Gerenciamento de Dependências

O sistema utiliza **Composer** para gerenciar bibliotecas externas:
- `bramus/router`: Roteamento amigável.
- `vlucas/phpdotenv`: Configurações de banco e ambiente.
- `phpmailer/phpmailer`: Envio de e-mails.
- `nesbot/carbon`: Manipulação de datas.
- `monolog/monolog`: Logs do sistema.
