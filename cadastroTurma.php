<?php 
  require 'php/db.php';
  require 'php/classTurma.php';
  $turmas = new Turma();  
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
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
    <link rel="stylesheet" type="text/css" href="css/cadastroTurmas.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <script src="https://kit.fontawesome.com/9e177e207c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Pangolin&display=swap" rel="stylesheet">

    <title>Cadastro de Turmas</title>
  </head>
  <body onload='window.scrollTo({top: 200, behavior: "smooth"});'>
    <?php 
    if(isset($_SESSION['admin'])) { ?> 
    <div class="header d-flex justify-content-between">
        <h1><span><i class="fas fa-graduation-cap"></i></span>School</h1>
        <a href="index.php"><span><i class="fas fa-arrow-left"></i></span>Voltar para home</a>
    </div>

    <div class="container d-flex flex-column">

      <form method="POST" class="form-group flex-column p-4" style="display: flex;">
          <h1 class="mb-5 mt-3">Cadastro de turmas</h1>
              <div class="d-flex flex-column">
                <label for="desc">Descrição <span class="requireDot"> * </span></label>
                <textarea name="desc" required placeholder="Descrição da turma"></textarea>
                </div>
          <div class="btnsDisplay">
            <div class="d-flex flex-column pr-5">
                <label for="vagas">Quantidade de vagas <span class="requireDot"> * </span></label>
               <input type="number" name="vagas" required min="1" value="1">
            </div>    
            <div class="d-flex flex-column w-100">
                <label for="professor">Professor regente <span class="requireDot"> * </span></label>
               <input type="text" name="professor" placeholder="Nome do professor" required>
            </div>
  
          </div>      
                
          
            <div class="d-flex justify-content-center">
            <input class="submit mt-5" type="submit" name="submit" value="Enviar formulário">
            </div>      
    </form>  
    <?php 
      if(isset($_POST['submit'])){
        $turmas->cadastrarTurma();
        ?>
          <div id="success" class="flex-column m-5" style="display: flex;"> 
              <h2 class="d-flex justify-content-center"><?php echo $msg; ?></h2> 
              <a id="addMore" class="d-flex justify-content-center" href="#">Adicionar mais Turmas</a> 
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/ocultaDiv.js"></script>
  </body>
</html>