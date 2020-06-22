<?php 
	class LoginAdmin{

		function login(){
			require 'db.php';

			$usuario = $_POST['user'];
			$senha = $_POST['senha'];
			global $msgErro;
			global $msgInput;
			$login = "SELECT * FROM login WHERE (usuario = '$usuario') AND (senha = '$senha')";
			$query = mysqli_query($conexao, $login);

			if(mysqli_num_rows($query) <= 0){
				$msgErro = "Login e/ou senha errados";
			}else{
				session_start();
				$_SESSION['admin'] = "Logado como administrador";
				echo"<script language='javascript' type='text/javascript'>
			    alert('Logado com sucesso!');window.location.
	     		href='index.php'</script>";
			}	
		}
	}

 ?>