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
  * Funcionários logam com o **CPF**, usando a tabela `funcionarios`

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

A identidade visual da Frog Tech é baseada em um tema **verde neon e branco**, que é aplicado a todas as telas administrativas. O verde primário usado é:

```css
#00a86b
```

### Elementos Estilizados

* **Títulos (h1, h2, etc.)** com verde neon
* **Botões** personalizados com hover animado
* **Cards** com bordas arredondadas e sombreamento leve
* **Formulários e tabelas** com visual moderno e limpo

## ⚖️ Estrutura Esperada (Resumida)

* `/pages-admin/` - Páginas do painel administrativo
* `/Controller/admin/` - Lógicas e processamentos de dados (editar, deletar, etc.)
* `/components/` - Inclui arquivos como `menu-rapido.php`
* `BASE_URL` - Constante utilizada para referenciar a raiz do sistema

## 🎓 Contexto Acadêmico

O sistema foi idealizado como parte do **curso de Ciência da Computação**, com foco na compreensão dos princípios básicos de back-end, banco de dados e front-end estruturado sem depender de frameworks complexos.

## ✨ Possíveis Melhorias Futuras

* Integração com sistema de pagamentos
* Relatórios gráficos (vendas, estoque)
* Upload de imagens dos produtos
* API para integrações externas
* Controle de sessão e log de auditoria

## 🚀 Conclusão

Frog Tech é um excelente exemplo de aplicação PHP com boas práticas básicas, padrões visuais bem definidos e propósito educacional. Um sistema ideal para demonstrar conhecimento em CRUD, autenticação, manipulação de banco de dados e organização de código.

---

> "Tecnologia em evolução constante, aprendizado em progresso infinito." - Frog Tech
