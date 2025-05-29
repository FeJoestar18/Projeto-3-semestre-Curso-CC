# 🧩 Layouts do Projeto - Frog Tech

Este documento descreve os layouts principais utilizados no projeto: **Frog Admin** e **Frog Users**.

---

## 📁 Estrutura de Layouts

O projeto utiliza dois layouts principais para organização visual e de funcionalidades:

- **Admin** – Painel administrativo para controle do sistema.
- **Users** – Interface do usuário comum, para navegação e utilização dos recursos do site.

---

## 🎛️ Layout: Frog Admin

### 📍 Caminho:

### 📄 Arquivos principais:
- `header.php` – Cabeçalho com navegação administrativa e logotipo.
- `sidebar.php` – Menu lateral com links para gerenciamento (usuários, produtos, pedidos, etc).
- `footer.php` – Rodapé fixo com créditos e informações gerais.
- `dashboard.php` – Painel de controle principal.

### 🎨 Características:
- Design focado na gestão do sistema.
- Acesso a funcionalidades restritas (administração, relatórios, estoque, etc).
- Menu lateral fixo com links dinâmicos conforme permissões.

### 👤 Acesso:
Apenas usuários com perfil **admin** têm acesso a esse layout.

---

## 🧑‍💻 Layout: Frog Users

### 📍 Caminho:

### 📄 Arquivos principais:
- `header.php` – Cabeçalho com logotipo, menu e botão de login/cadastro.
- `footer.php` – Rodapé com links de contato, redes sociais e copyright.
- `home.php` – Página inicial com carrossel de produtos e chamadas visuais.
- `product.php` – Página de exibição de produto.
- `cart.php` – Página do carrinho de compras.

### 🎨 Características:
- Interface amigável e intuitiva.
- Foco na experiência do usuário final.
- Design responsivo para desktop e mobile.
- Integração com sessões e carrinho de compras.

### 👥 Acesso:
Disponível para todos os usuários, com ou sem login.

---

## 🔁 Compartilhamento de Componentes

Alguns elementos como `alertas`, `modais`, e `componentes de formulário` podem ser reutilizados entre os dois layouts. Esses arquivos geralmente ficam em:


---

## 🗂️ Exemplo de Inclusão

```php
// Exemplo de inclusão do layout no Admin
include_once '../layouts/admin/header.php';
include_once '../layouts/admin/sidebar.php';
// Exemplo de inclusão do layout para usuários
include_once 'layouts/users/header.php';
