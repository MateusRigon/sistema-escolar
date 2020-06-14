<?php 

class Turma {

	function cadastrarTurma(){
		require 'db.php';

		$descricao = $_POST['desc'];
		$qntVagas = $_POST['vagas'];
		$professor = $_POST['professor'];
		global $msg;

		if(empty($descricao) || empty($qntVagas) || empty($professor)){
			?>
			<div class="d-flex justify-content-center mb-5"><?php die("Erro/Algum item está vazio"); ?></div>
			<?php
		}

		$cadastrar = "INSERT INTO turmas(descricao, numVagas, professorRegente) VALUES('$descricao','$qntVagas','$professor')";
		$query = mysqli_query($conexao, $cadastrar);

		if($query){
			$msg = "Turma cadastrada com sucesso!";
			?>
			<script>
				document.querySelector(".form-group").style.display = "none";		
			</script>
			<?php 
		}else{
			$msg = "Erro ao cadastrar!";
		}

	}



}







 ?>