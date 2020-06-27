<?php 
  require 'php/db.php'; 
  require_once 'php/classAluno.php'; 
  $alunos = new Aluno();
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
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <script src="https://kit.fontawesome.com/9e177e207c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Pangolin&display=swap" rel="stylesheet">

    <title>Cadastro de alunos</title>
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
          <h1 class="mb-5 mt-3">Cadastro de alunos</h1>
              <div class="d-flex flex-column">
                <label for="nome">Nome Completo <span class="requireDot"> * </span></label>
                <input type="text" name="nome" required>
                </div>
          <div class="d-flex">
            <div id="btnSexo" class="d-flex flex-column">
                <label for="sexo">Sexo <span class="requireDot"> * </span></label>
                <select class="select" name="sexo" required>
                  <option disabled selected value id="primeiraOption">--Escolha o sexo--</option>
                  <option>Masculino</option>
                  <option>Feminino</option>
                </select>
            </div>    
            <div class="d-flex flex-column">
                <label for="data">Data de nascimento <span class="requireDot"> * </span></label>
               <input type="date" name="data" required>
            </div>
  
          </div>      
                
            <div class="d-flex">    
             <div class="btnMargin50 d-flex flex-column">
                <label for="cidade">Cidade <span class="requireDot"> * </span></label>
                <select class="select mb-2" name="cidade" required>
                  <option disabled selected value>Selecione a cidade</option>
                </select>
            </div>
            
            </div>      

            <div class="btnsDisplay" class="d-flex">    
             <div id="btnRua" class="d-flex flex-column w-100 mr-5">
                <label for="cidade">Rua</label>
               <input type="text" name="rua">
            </div>
            <div class="d-flex flex-column">
                <label for="cidade">Número</label>
               <input type="text" name="numero">
            </div>
            </div> 
            <div class="btnsDisplay" class="d-flex">
               <div class="btnMargin50 d-flex flex-column mr-5">
                <label for="cidade">Bairro</label>
               <input type="text" name="bairro">
            </div>
             <div class="btnMargin50 d-flex flex-column">
                <label for="cidade">Complemento</label>
               <input type="text" name="complemento">
            </div>
            </div>
            <div class="d-flex justify-content-center">
              <input class="submit mt-5 mb-4" type="submit" name="submit" value="Enviar formulário">
            </div>    

            
      </form>  
         <?php 
                if (isset($_POST['submit'])) {
                  $alunos->cadastrarAluno();
                  ?> 
                  <div id="success" class="flex-column m-5" style="display: flex;"> 
                    <h2 class="d-flex justify-content-center"><?php echo $msgSucesso; ?></h2> 
                    <a id="addMore" class="d-flex justify-content-center" href="#">Adicionar mais Alunos</a> 
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
    <script type="text/javascript" src="js/aluno.js"></script>
    <script type="text/javascript" src="js/ocultaDiv.js"></script>
  </body>
</html>