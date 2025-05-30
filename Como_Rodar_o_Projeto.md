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