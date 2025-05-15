<?php

include("/Controller/Conect/config-url.php");

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FrogTech</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .topo {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #34953b;
      padding: 10px 40px;
    }

    .logo img {
      height: 40px;
    }

    .icones .icone {
      height: 30px;
      margin-left: 1100px;
    }

    .menu-hamburguer{
     width: 30px;
    height: 25px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    cursor: pointer;
}

    .menu-hamburguer span {
    height: 4px;
    background-color: black;
    border-radius: 2px;
    display: block;
}

    main {
      padding: 40px;
    }

    .sapo-fala {
      display: flex;
      align-items: center;
      gap: 30px;
      margin-bottom: 50px;
    }

    .sapo-img {
      width: 190px;
      margin-left: 80px;
      margin-top: 80px;
    }

    .fala {
  max-width: 250px;
  background: white;
  border: 3px solid black;
  border-radius: 20px;
  padding: 20px;
  font-family: sans-serif;
  position: relative;
  box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
}

.balao-fala::after {
  content: "";
  position: absolute;
  bottom: -20px;
  left: 30px;
  width: 0;
  height: 0;
  border: 10px solid transparent;
  border-top-color: black;
  border-bottom: 0;
  margin-left: -10px;
}

.balao-fala::before {
  content: "";
  position: absolute;
  bottom: -17px;
  left: 30px;
  width: 0;
  height: 0;
  border: 10px solid transparent;
  border-top-color: white;
  border-bottom: 0;
  margin-left: -10px;
}

    .servicos {
      display: flex;
      justify-content: space-between;
      gap: 30px;
      margin-top: 90px;
    }

    .card {
      flex: 1;
      text-align: center;
    }

    .card img {
      height: 90px;
      margin-bottom: 15px;
    }

    .card h3 {
      color: #2e7d32;
      margin-bottom: 10px;
    }

    .card p {
      font-size: 14px;
      padding: 0 10px;
    }
  </style>
</head>
<body>
  <header class="topo">
    <div class="logo">
      <img src="/Imagens/Logo2.png" alt="Logo FrogTech" />
    </div>
    <div class="icones">
      <img src="<?= BASE_URL ?>imagens/Icone.usuario.png" class="icone" />
    </div>
    <div class="menu-hamburguer">
        <span></span>
        <span></span>
        <span></span>
    </div>
  </header>

  <main>
    <section class="sapo-fala">
      <img src="/Imagens/image.png" alt="Sapo com fone" class="sapo-img" />
      <div class="fala">
        <p>Olá, eu sou o Frog Tech!<br>Em que posso te ajudar?</p>
      </div>
    </section>

    <section class="servicos">
      <div class="card">
        <img src="/Imagens/Lupa.png" alt="Pesquisas e soluções" />
        <h3>Pesquisas e soluções</h3>
        <p>Aqui você pode encontrar mecanismos de pesquisa e soluções a serem resolvidas.</p>
      </div>

      <div class="card">
        <img src="/Imagens/Balão.png" alt="Suporte" />
        <h3>Suporte Frogtech</h3>
        <p>Te auxiliamos no que for preciso e necessário.</p>
      </div>

      <div class="card">
        <img src="/Imagens/Mensagem.png" alt="Avaliações e melhorias" />
        <h3>Avaliações e melhorias</h3>
        <p>Envie e-mail avaliando nosso site e nosso atendimento ao cliente.</p>
      </div>
    </section>
  </main>
</body>
</html>