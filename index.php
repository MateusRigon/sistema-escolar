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
    <script src="https://kit.fontawesome.com/9e177e207c.js" crossorigin="anonymous"></script>

    <title>Home</title>
  </head>
  <body>
    <div class="header d-flex justify-content-between">
        <h1><span><i class="fas fa-graduation-cap"></i></span>School</h1>
        <p>Logado como Admin!</p>
    </div>

    <div class="container d-flex flex-column">
  
      <div class="d-flex">
        <div class="buttons mb-3 d-flex flex-column w-50 mr-5">
            <button onclick="window.location.href='cadastroAluno.php'">Cadastrar novo aluno</button>
        </div>
        <div class="buttons d-flex flex-column w-50">
          <button onclick="window.location.href='cadastroTurma.php'">Cadastrar nova turma</button> 
        </div>
      </div>
           <div class="buttons d-flex flex-column mb-3">
            <button>Vincular alunos a turma</button>        
        </div>

        <div class="buttons d-flex flex-column">
            <button onclick="window.location.href='consulta.php'">Consultar turmas e alunos</button>        
        </div>
         
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>