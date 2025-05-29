# Repositorio do Projeto antigo

https://github.com/FeJoestar18/FROG-TECH.git

---

### LINKS 

- [Documentação e Videos](Documentação_e_Videos.md)

- [Lista De Integrantes](Lista_De_Integrantes.md)

- [Melhorias Feitas no Projeto](Melhorias_Feitas_no_Projeto.md)

- [Como rodar O Projeto](Como_Rodar_o_Projeto.md)

---

# Frog Tech - Sistema de E-commerce Acadêmico

**Frog Tech** é um projeto de e-commerce voltado para fins educacionais, criado como parte de um trabalho universitário de Ciência da Computação, atualmente em sua versão aprimorada para o terceiro semestre. O sistema simula uma loja de produtos tecnológicos e é desenvolvido em **PHP puro**, com **PDO para acesso ao banco de dados** e uma interface moderna inspirada na identidade visual verde neon.

## 🏢 Objetivo do Projeto

Criar uma plataforma de e-commerce funcional com foco em:

* Cadastro e gestão de produtos.
* Registro e baixa de vendas.
* Autenticação de usuários e perfis (Admin e Funcionários).
* Controle de departamentos e funcionalidades administrativas.

## 💡 Tecnologias Utilizadas

* **PHP Puro** (sem frameworks)
* **PDO** (PHP Data Objects) para comunicação segura com o banco de dados
* **HTML5** + **CSS3** moderno e responsivo (sem frameworks CSS)
* **Bootstrap 5** (utilizado em partes com modal e tabelas)
* **MySQL** (presumido como banco de dados relacional)

## 💼 Funcionalidades do Sistema

### 1. Autenticação

* Login com controle de acesso baseado em roles:

  * `role_id = 1` para Admins
  * `role_id = 2` para Funcionarios
  * `role_id = 3` para Usuarios

### 2. Produtos

* Cada produto possui:

  * ID
  * Nome
  * Preço
  * Descrição
  * Quantidade

### 3. Saídas (Vendas)

* Registro das compras realizadas
* Baixa automática no estoque dos produtos
* Registro do nome e valor de cada produto vendido

### 4. Administração

* Painel com visualização e edição de usuários
* Cadastro e exclusão de usuários
* Visualização de perguntas feitas pelos usuários e resposta através de modal
* Cadastro, edição e exclusão de departamentos

## 🎨 Identidade Visual

A identidade visual da Frog Tech é baseada em um tema **verde e branco**, que é aplicado a todas as telas administrativas.

### Elementos Estilizados

* **Títulos (h1, h2, etc.)** com verde neon
* **Botões** personalizados com hover animado
* **Cards** com bordas arredondadas e sombreamento leve
* **Formulários e tabelas** com visual moderno e limpo

## ⚖️ Estrutura de Pastas - Frog Tech

Abaixo está a estrutura principal da aplicação **Frog Tech**, com a função de cada pasta e arquivo detalhada para facilitar a navegação e entendimento do projeto:

FROG-TECH/
├── Api/ 🛠️ Endpoints para integrações futuras (REST, AJAX, etc)

├── components/ 🧩 Componentes reutilizáveis (menu lateral, cabeçalho, rodapé)

├── Controller/ 📂 Lógica de negócios e processamento (CRUD, validações, requisições)

├── css/ 🎨 Estilos customizados (tema neon, layout)

├── database/ 💾 Scripts e configurações do banco de dados

├── Imagens/ 🖼️ Imagens gerais (produtos, banners)

├── img/ 🔗 Ícones e imagens estáticas (sugere-se unificar com Imagens/)

├── js/ ⚙️ Scripts JavaScript para funcionalidades e interações

├── pages-admin/ 🛡️ Telas do painel administrativo

│ ├── produtos/ 📦 Gerenciamento de produtos

│ ├── usuarios/ 👥 Gestão de usuários e permissões

│ ├── departamentos/ 🏢 Controle dos departamentos da empresa

│ └── ... ⋯ Outras funcionalidades administrativas

├── pages-usuario/ 👤 Telas para usuários comuns (catálogo, login, registro)

├── uploads-files-produtos/ 📂 Armazenamento das imagens enviadas dos produtos

├── .env 🔐 Variáveis de ambiente (ex: BASE_URL, config banco)

├── .gitignore 🚫 Arquivos e pastas ignorados pelo Git

├── .htaccess 🔧 Regras para URLs amigáveis, segurança e redirecionamentos Apache

├── index.html 🏠 Página inicial 

└── info.php 🧪 Diagnóstico das configurações do PHP

## 🎓 Contexto Acadêmico

O sistema foi idealizado como parte do **curso de Ciência da Computação**, com foco na compreensão dos princípios básicos de back-end, banco de dados e front-end estruturado sem depender de frameworks complexos.

## ✨ Possíveis Melhorias Futuras

* Integração com sistema de pagamentos
* API para integrações externas
* Melhora do UI e UX

## 🚀 Conclusão

Frog Tech é um excelente exemplo de aplicação PHP com boas práticas básicas, padrões visuais bem definidos e propósito educacional. Um sistema ideal para demonstrar conhecimento em CRUD, autenticação, manipulação de banco de dados e organização de código.

---

> "Tecnologia em evolução constante, aprendizado em progresso infinito." - Frog Tech

---

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

