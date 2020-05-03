<?php
      session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de login</title>
    <link rel="stylesheet" href="./css/style.css">
  </head>

  <body>
    <div id="title">Efetuar Login</div>
    <form class="usuario" action="" method="post">
        <input type="email" name="usuario" id="i01" required placeholder=" Nome de Usuário">
        <input type="password" name="senha" id="i02" required placeholder=" Senha">
        <button type="submit" name="sign">Entrar</button>
    </form>
    <?php
      $arquivo = fopen('arquivo.txt','a+');
      $usuario1 = "rafael-lhenrichs@educar.rs.gov.br";
      $senha1 = "asyd8378312nasd";
      $dados = $usuario1."/".$senha1."\n";
      fwrite($arquivo, $dados);
      fclose($arquivo);
      if(isset($_POST['sign'])){
        $usuario = $_REQUEST['usuario'];
        $senha = $_REQUEST['senha'];
        $arquivo = fopen('arquivo.txt','r');
        $check = fgets($arquivo);
        $check = explode('/', $check);
        $usuarioY = $check[0];
        $senhaY = $check[1];
        fclose($arquivo);
        $senhaY = str_replace("\n", "", $senhaY);
        if ($usuario1 == $usuario && $senha1 == $senha) {
          session_start();
          $_SESSION['usuario'] = $usuarioY;
          $_SESSION['senha'] = $senhaY;
          $senhaY = md5($senhaY);
          echo "<meta http-equiv='refresh' content='0, url=signed.php'>";
        }
        else{
          echo "<script>alert('Usuário e/ou senha inválido(s), Tente novamente!');</script>";
        }
      }
    ?>
  </body>
</html>
