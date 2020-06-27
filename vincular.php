<?php 
    require 'php/db.php';
    require 'php/classVincular.php';
    $v = new Vincular();
    session_start();
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
    <link rel="stylesheet" type="text/css" href="css/vincular.css">
    <script src="https://kit.fontawesome.com/9e177e207c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Pangolin&display=swap" rel="stylesheet">

    <title>Vincular</title>
  </head>
  <body onload='window.scrollTo({top: 200, behavior: "smooth"});'>
    <?php 
    if(isset($_SESSION['admin'])) { ?> 
    <div class="header d-flex justify-content-between">
        <h1><span><i class="fas fa-graduation-cap"></i></span>School</h1>
        <a href="index.php"><span><i class="fas fa-arrow-left"></i></span>Voltar para home</a>
    </div>

    <div class="container d-flex flex-column">
            <h1 class="mb-5 p-4">Vincular alunos</h1>
            <div id="divAluno">
                <div id="buttons" class="d-flex justify-content-around">
                    <h3>Selecione o aluno</h3>
                </div>
                <div class="d-flex justify-content-center">
                <form method="POST">
                 <div class="form-group">
                    <select name="alunos" multiple class="form-control mt-3" id="exampleFormControlSelect2" required>
                      <?php 
                        $v->exibeAlunos();
                     ?>
                    </select>
                </div>
                <div class="d-flex justify-content-end mb-5 mt-5">
                    <input class="buttonVincular" type="submit" name="next" value="Próximo" disabled="true">
                </div>
                
                </form>
                </div>
                
            </div>

            <div id="divTurma" style="display: none;">
                <input id="voltarpag" type="button" value="Voltar">
                <div id="buttons" class="d-flex justify-content-around">
                    <h3>Selecione a Turma</h3>
                </div>
                <div class="d-flex justify-content-center">
                <form method="POST">
                 <div class="form-group">
                    <select name="turmas" multiple class="form-control mt-3" id="exampleFormControlSelect2" required>
                      <?php 
                        $v->exibeTurma();
                      ?>
                    </select>
                    <?php 
                        if(isset($_POST['next'])){
                            $v->salvaNome();
                        }

                    ?>
                </div>
                <div class="d-flex justify-content-end mb-5 mt-5">
                    <input class="buttonVincular" type="submit" name="pronto" value="Pronto" disabled="true">
                </div>
                
                </form>
                </div>
                

            </div>
                <?php 
                    if (isset($_POST['next'])) {
                        ?>
                        <script>
                            document.querySelector('#divAluno').style.display = "none";
                            document.querySelector('#divTurma').style.display = "block";
                        </script>
                        <?php
                    }

                    if(isset($_POST['pronto'])){
                        $v->updateTurma();
                        ?>
                        <script>
                            document.querySelector('#divAluno').style.display = "none";
                            document.querySelector('#divTurma').style.display = "none";
                        </script>
                        <div id="success" class="flex-column mt-2 mb-5" style="display: flex;"> 
                            <h3 class="d-flex justify-content-center"><?php echo $msgSucesso ?: $msgErro; ?></h3>
                             <h3 class="d-flex justify-content-center"><?php echo $msgSucesso2 ?></h3>
                             <h3 class="d-flex justify-content-center"><?php echo $msgSucesso3 ?></h3>
                             <h3 class="d-flex justify-content-center mt-1"><?php echo $msgErro2 ?></h3>   
                            <a id="addMore" class="d-flex justify-content-center mt-3" href="#">Vincular mais alunos</a> 
                        </div>
                        <?php

                    }
              
                 ?>
    
                
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
    <script type="text/javascript" src="js/vincular.js"></script>
  </body>
</html>