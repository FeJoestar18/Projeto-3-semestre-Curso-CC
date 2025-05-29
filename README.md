# Repositorio do Projeto antigo

https://github.com/FeJoestar18/FROG-TECH.git

---





# Documentação juntamente com o Video e o Database necessario pra rodar o Projeto localmente
https://drive.google.com/drive/folders/1GnvQkU-7EJX6WX6KMFzwcK7OBR5zrR02?usp=drive_link

# Video de Apresentação
https://drive.google.com/file/d/1Cv_YQQdJiEiJpkF3EDXDR0ce0HlZ86xf/view?usp=drive_link

# Documentação 
https://docs.google.com/document/d/1DDH3VsCG73-EskIKxZDXPnNfmJ5-OjQhOAsLefE80so/edit?usp=drive_link

# Melhorias Documentadas
https://docs.google.com/document/d/1pLAhkpNQTAMHezIBBbFrAEigIZTJ7SM7/edit?usp=drive_link&ouid=111527009699470287628&rtpof=true&sd=true

# DataBase
https://drive.google.com/file/d/1P_6F6VE96aITSnvWvN7NTD28FiYXLAa5/view?usp=drive_link

---
TUDO ISSO ACIMA ESTÁ NO PRIMERIO LINK, ESSES LINKS SÓ É CASO QUEIRA VER INDIVIDUALMENTE CADA UM
---





# Integrantes do Projeto Frog Tech

## 1. Arthur Godwin Maia - RA 924100889
**Função:**  
Responsável por auxiliar no design utilizando a ferramenta Canva.

## 2. Felipe Amaro Souza de Jesus - RA 924110739
**Função:**  
Responsável pelo desenvolvimento do back-end e de todas as suas funcionalidades. Transformou os designs criados no Canva em páginas web, foi o idealizador do projeto e atuou como líder da equipe. Participou ativamente de todas as etapas, inclusive desde o semestre anterior, sendo o principal desenvolvedor do sistema e contribuindo significativamente para a criação de novas funcionalidades.

## 3. Daniel Santos Henrique Vieira - RA 925114224
**Função:**  
Auxiliou na gravação do vídeo de apresentação do projeto.

## 4. João Victor Pontes Lima - RA 924115789
**Função:**  
Responsável por colaborar no design com o Canva e desenvolver o roteiro do vídeo de apresentação.

## 5. Eduardo Santos Rodrigues - RA 924111424
**Função:**  
Contribuiu com o desenvolvimento de uma página no front-end.

## 6. Tainá Sousa Da Silva - RA 9241115431
**Função:**  
Responsável pelo design utilizando o Canva, auxiliou na gravação do vídeo, colaborou com o roteiro, participou do desenvolvimento do front-end e foi responsável pela edição do vídeo.

---

Cada membro foi essencial para o desenvolvimento e aprimoramento do projeto **Frog Tech**, colaborando com suas habilidades específicas para entregar um sistema completo, funcional e bem estruturado.


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

### Como rodar o Projeto 

### Passo 1°- Clonar o Repositorio

```bash
# git clone https://github.com/FeJoestar18/Projeto-3-semestre-Curso-CC.git
```
### Usar o git clone na pasta "Htdocs" se estiver usando o XAMPP

### Clonar na "WWW" se estiver usando WAMPP
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

# Melhorias no Projeto Frog Tech

O projeto **Frog Tech** passou por uma série de melhorias significativas, visando aprimorar sua estrutura, funcionalidades e a experiência do usuário. Essas mudanças foram implementadas **sem a utilização de frameworks** robustos como o Laravel, o que reforça o desafio técnico e a atenção dedicada à organização do código e à escalabilidade da aplicação.

## 🧱 Arquitetura do Projeto

Uma das principais evoluções foi a **melhoria na arquitetura**, que agora conta com uma estrutura mais clara e modular. Essa reformulação trouxe:

- Maior legibilidade do código;
- Separação de responsabilidades;
- Facilidade na manutenção e evolução do sistema.

## ✉️ Novas Funcionalidades

Foram adicionados novos recursos que aumentam a usabilidade e a eficiência do sistema:

- **Formulário de Fale Conosco** – permite a comunicação direta entre usuários e a equipe;
- **Gestão de Departamentos** – melhora a organização interna;
- **Painéis de Funcionários** – cada funcionário possui um painel próprio;
- **Sistema de Permissões** – diferentes níveis de acesso de acordo com o tipo de usuário.

## 🎨 Experiência do Usuário

Para modernizar o visual e tornar o sistema mais responsivo, foi integrado o **Bootstrap**, resultando em:

- Interface mais limpa e profissional;
- Melhor usabilidade em dispositivos móveis;
- Layouts padronizados e responsivos.

## 🔁 Refatoramento de Código

Grande parte das **funções principais foi refatorada**, com foco em:

- Otimização de desempenho;
- Clareza na lógica de programação;
- Redução de código duplicado.

## 🌐 Hospedagem

O sistema agora está **hospedado na plataforma Hostinger**, garantindo:

- Maior estabilidade e segurança;
- Melhor tempo de resposta em produção;
- Suporte completo para banco de dados e PHP.

---

Essas melhorias tornaram o **Frog Tech** um sistema mais completo, confiável e preparado para atender às necessidades dos usuários com maior eficiência e organização.
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

