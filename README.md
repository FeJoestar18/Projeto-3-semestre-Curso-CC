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
* Relatórios gráficos (vendas, estoque)
* Upload de imagens dos produtos
* API para integrações externas
* Controle de sessão e log de auditoria

## 🚀 Conclusão

Frog Tech é um excelente exemplo de aplicação PHP com boas práticas básicas, padrões visuais bem definidos e propósito educacional. Um sistema ideal para demonstrar conhecimento em CRUD, autenticação, manipulação de banco de dados e organização de código.

---

> "Tecnologia em evolução constante, aprendizado em progresso infinito." - Frog Tech


### Como rodar o Projeto 

### Passo 1°- Clonar o Repositorio

```bash
# Inicializar um repositório Git
git init

# Adicionar todos os arquivos ao staging
git add .

# Fazer o primeiro commit
git commit -m "Initial commit"

# Configurar o repositório remoto
git remote add origin https://github.com/FeJoestar18/FROG-TECH.git

# Enviar os arquivos para o repositório remoto
git push -u origin main

# Puxar os arquivos do Repositorio
git pull origin main

Use o comando `git status` para verificar o estado do repositório.

```
---

# Como rodar um projeto PHP com WAMP, XAMPP e Docker

## 1. Rodando o Projeto PHP com WAMP

### Passo 1: Baixar e Instalar o WAMP
1. Acesse o site do [WAMP](http://www.wampserver.com/en/).
2. Baixe a versão apropriada para o seu sistema operacional (Windows).
3. Instale o WAMP no seu computador, seguindo as instruções do instalador.

### Passo 2: Iniciar o WAMP
1. Abra o WAMP no seu computador.
2. Você verá um ícone verde no tray, indicando que o servidor está funcionando corretamente.

### Passo 3: Colocar o Projeto no Diretório `www`
1. Localize o diretório de instalação do WAMP (geralmente `C:\wamp\www`).
2. Coloque os arquivos do seu projeto PHP dentro dessa pasta.

### Passo 4: Acessar o Projeto
1. No navegador, acesse `http://localhost/nomedoprojeto`.
2. Se tudo estiver correto, seu projeto será carregado.

## 2. Rodando o Projeto PHP com XAMPP

### Passo 1: Baixar e Instalar o XAMPP
1. Acesse o site do [XAMPP](https://www.apachefriends.org/pt_br/index.html).
2. Baixe a versão apropriada para o seu sistema operacional.
3. Instale o XAMPP seguindo as instruções fornecidas.

### Passo 2: Iniciar o XAMPP
1. Abra o XAMPP e inicie os módulos Apache e MySQL (caso seu projeto precise de banco de dados).
2. O ícone do XAMPP no tray se tornará verde quando os serviços estiverem funcionando.

### Passo 3: Colocar o Projeto no Diretório `htdocs`
1. Navegue até o diretório de instalação do XAMPP (geralmente `C:\xampp\htdocs`).
2. Coloque os arquivos do seu projeto PHP dentro dessa pasta.

### Passo 4: Acessar o Projeto
1. No navegador, acesse `http://localhost/nomedoprojeto`.
2. O seu projeto será exibido.

## 3. Rodando o Projeto PHP com Docker

### Passo 1: Baixar e Instalar o Docker
1. Acesse o site do [Docker](https://www.docker.com/get-started) e baixe a versão do Docker para o seu sistema operacional.
2. Siga as instruções de instalação.

### Passo 2: Criar um `Dockerfile` para o Projeto PHP
1. Crie um arquivo chamado `Dockerfile` no diretório raiz do seu projeto.
2. O conteúdo do `Dockerfile` pode ser algo como:

```Dockerfile
# Usar a imagem do PHP com Apache
FROM php:8.0-apache

# Copiar os arquivos do projeto para o diretório raiz do Apache
COPY . /var/www/html/

# Habilitar mod_rewrite se necessário
RUN a2enmod rewrite
``` 

---

### Passo 3: Criar o Arquivo docker-compose.yml (opcional)

Para facilitar a configuração do Docker, crie um arquivo chamado docker-compose.yml no diretório do projeto:

```yaml
Copiar código
version: '3.8'
services:
  web:
    build: .
    ports:
      - "8080:80"
    volumes:
      - .:/var/www/html
    networks:
      - app_network

networks:
  app_network:
    driver: bridge
```
---
### Passo 4: Rodar o Projeto com Docker
Abra o terminal ou prompt de comando e navegue até o diretório do seu projeto.
Execute o comando para criar e rodar os containers:

```bash
Copiar código

docker-compose up --build

Passo 5: Acessar o Projeto

Abra o navegador e acesse http://localhost:8080.

O seu projeto PHP será exibido.
```

### Passo 5: Passar os dados da pasta SQL para o MySQL Workbench ou phpMyAdmin

#### Usando MySQL Workbench:

1. **Abrir o MySQL Workbench**: Inicie o MySQL Workbench e conecte-se ao seu servidor MySQL.

2. **Abrir o arquivo SQL**:
   - Vá para o menu "File" e clique em "Open SQL Script".
   - Selecione o arquivo SQL que você deseja importar da pasta SQL.

3. **Executar o script**:
   - Depois de abrir o arquivo SQL, o conteúdo será exibido na aba de SQL.
   - Clique no ícone de raio ("Execute" ou "Run") para rodar o script no banco de dados selecionado.

4. **Verificar dados**:
   - Vá até o painel "Navigator" e clique em "Schemas" para verificar se as tabelas e dados foram importados corretamente.

---

#### Usando phpMyAdmin:

1. **Acessar o phpMyAdmin**: Acesse o phpMyAdmin através do seu navegador. Normalmente, é acessado através de `http://localhost/phpmyadmin` ou o endereço correspondente ao seu servidor.

2. **Selecionar o banco de dados**:
   - No painel à esquerda, escolha o banco de dados onde você deseja importar os dados ou crie um novo banco de dados, se necessário.

3. **Importar o arquivo SQL**:
   - No painel principal, clique na aba "Importar".
   - Na seção "Arquivo a ser importado", clique em "Escolher arquivo" e selecione o arquivo SQL da sua pasta.
   - Clique em "Executar" para iniciar o processo de importação.

4. **Verificar dados**:
   - Depois de completar a importação, as tabelas e dados estarão disponíveis no banco de dados selecionado.
   - Você pode navegar pelas tabelas e visualizar os dados inseridos.

---
