<?php 
  require 'php/db.php';
  require 'php/loginAdmin.php';

  $login = new LoginAdmin();
    
  if(isset($_POST['logar'])){
    $login->login();        
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
    <link rel="stylesheet" type="text/css" href="css/modalLogin.css">
    <script src="https://kit.fontawesome.com/9e177e207c.js" crossorigin="anonymous"></script>

    <title>Login</title>
  </head>
  <body>

       <div id="modal">
                <div>
                    <h1>Login</h1>
                </div>
                <div>
                    <form method="POST" class="d-flex flex-column">
                      <div class="d-flex">
                        <label for="user" class="mr-2">Usuário</label>
                        <?php if(isset($_POST['logar'])) { ?>
                            <span id="msgErro"><?php echo $msgErro ?></span>
                        <?php } ?>
                      </div>  
                        <input class="mb-2" type="text" name="user" required> 
                        <label for="senha">Senha</label>
                        <input type="text" name="senha" required>
                        <input class="submit mt-4 btn-success" type="submit" name="logar" value="ENTRAR">
                    </form>
                    
                </div>
            </div> 
            
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/home.js"></script>
  </body>
</html>