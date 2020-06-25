<?php 
  session_start();

  if (isset($_POST['sair'])) {
    unset($_SESSION['admin']);
    header("location: loginPage.php");
    session_destroy();
  }
 ?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <script src="https://kit.fontawesome.com/9e177e207c.js" crossorigin="anonymous"></script>

    <title>Home</title>
  </head>
  <body>
    <?php

      if(isset($_SESSION['admin'])) { ?> 
        <div class="header d-flex justify-content-between">
            <h1><span><i class="fas fa-graduation-cap"></i></span>School</h1>
            <div class="d-flex">
            <p id="sessionMsg" class="mr-5 mt-3"><?php echo $_SESSION['admin']; ?></p>
              <form method="POST" class="form-inline my-2 my-lg-0">
                <button id="sair" class="btn btn-outline-success" type="submit" name="sair">Sair</button>
              </form>
            </div>
        </div>

        <div class="container d-flex flex-column">
      
          <div id="cadastroBtn">
            <div id="btnAluno" class="buttons mb-3 d-flex flex-column">
                <button onclick="window.location.href='cadastroAluno.php'">Cadastrar novo aluno</button>
            </div>
            <div id="btnTurma" class="buttons d-flex flex-column">
              <button onclick="window.location.href='cadastroTurma.php'">Cadastrar nova turma</button> 
            </div>
          </div>
               <div class="buttons d-flex flex-column mb-3">
                <button onclick="window.location.href='vincular.php'">Vincular alunos a turma</button>        
            </div>

            <div class="buttons d-flex flex-column">
                <button onclick="window.location.href='consulta.php'">Consultar turmas e alunos</button>        
            </div>
             
        </div>
    <?php } else { ?>
        <div class="header d-flex justify-content-between">
            <h1><span><i class="fas fa-graduation-cap"></i></span>School</h1>
              <a href="loginPage.php" style="text-decoration: underline;">Faça Login para acessar o site!</a>
        </div>

    <?php } ?>        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
  </body>
</html>