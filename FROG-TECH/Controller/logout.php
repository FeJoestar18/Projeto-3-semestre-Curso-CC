<?php
session_start();
session_unset(); 
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="refresh" content="3; url=../pages-usuario/cadastro/login.php"> <!-- Redireciona após 3 segundos -->
  <title>Deslogando...</title>
  <style>
   
    #modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      font-size: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }
    #modalContent {
      background: #333;
      padding: 20px;
      border-radius: 10px;
    }
  </style>
</head>
<body>

<div id="modal">
  <div id="modalContent">
    <p>Deslogando...</p>
  </div>
</div>

<script>
  document.getElementById('modal').style.display = 'flex';

  setTimeout(function() {
    window.location.href = "../pages-usuario/cadastro/login.php"; 
  }, 3000); 
</script>

</body>
</html>
