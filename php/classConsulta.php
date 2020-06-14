<?php 
	class Consulta{

		function consultarTurma(){
			require 'db.php';
			global $msg;

			$busca = "SELECT * FROM turmas";
			$query = mysqli_query($conexao, $busca);
			$array = mysqli_fetch_assoc($query);

			if(empty($array)){
				$msg = "Não há turmas cadastradas";
			}
		}

		function consultarAluno(){
			require 'db.php';
			global $msg;

			$busca = "SELECT * FROM alunos";
			$query = mysqli_query($conexao, $busca);
			$array = mysqli_fetch_assoc($query);

			if(empty($array)){
				$msg = "Não há alunos cadastrados";
			}
		}

	}

 ?>