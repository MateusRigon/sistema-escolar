<?php 
    require 'php/db.php';
    require 'php/classConsulta.php';
    $c = new Consulta();
 ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/main.css">
    <link rel="stylesheet" type="text/css" href="CSS/home.css">
    <link rel="stylesheet" type="text/css" href="CSS/consulta.css">
    <script src="https://kit.fontawesome.com/9e177e207c.js" crossorigin="anonymous"></script>

    <title>Consulta</title>
  </head>
  <body onload='window.scrollTo({top: 200, behavior: "smooth"});'>
    <div class="header d-flex justify-content-between">
        <h1><span><i class="fas fa-graduation-cap"></i></span>School</h1>
        <a href="index.php"><span><i class="fas fa-arrow-left"></i></span>Voltar para home</a>
    </div>

    <div class="container d-flex flex-column">
        <form method="POST" class="p-4">
            <h1 class="mb-5">Consultar</h1>
            <div id="buttons" class="d-flex justify-content-around">
                <div class="button-group d-flex flex-column">
                    <button id="turma" name="turma">Turmas</button>
                </div>
                <div class="button-group d-flex flex-column">
                    <button id="aluno" name="aluno">Alunos</button>
                </div>
            </div>
        </form>

        <?php 
            if(isset($_POST['turma'])){
                $c->exibeTotal(); 
            }
         ?>
        <div class="row">                  
        <?php 
            if(isset($_POST['turma'])){
                $c->consultarTurma(); 
            }
            if(isset($_POST['aluno'])){
                $c->consultarAluno();
                ?>
                <div class="d-flex justify-content-center mt-2 mb-2"><?php echo $msg ?></div>
                <?php
            }

         ?>
         </div>
         <div id="exibeTurma">
         <?php 
            if(isset($_POST['buttonTurma'])){
                $c->exibeTurma();
            }
          ?>
          </div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/aluno.js"></script>
  </body>
</html>