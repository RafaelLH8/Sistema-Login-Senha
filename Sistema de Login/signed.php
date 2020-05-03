<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login - Online</title>
    <link rel="stylesheet" href="./css/style.css">
  </head>

  <body>
      <div id="title">Senha e usuário corretos, bem vindo.</div>
      <button id="signoff" onclick="window.location.href = 'index.php'">Sair da conta</button>
      <?php
        if(isset($_GET['signoff'])){
          session_start();
					$_SESSION['usuario1'] = $user;
					$_SESSION['senha1'] = $senha;
          unset($_SESSION["usuario"]);
          header("location: index.php");
        }
      ?>
  </body>
</html>
