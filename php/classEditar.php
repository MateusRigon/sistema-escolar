<?php 

	class Editar{

		function editarTurma(){
			require 'db.php';

			$descricao = $_POST['desc'];
			$qntVagas = $_POST['vagas'];
			$professor = $_POST['professor'];
			$numeroTurma = $_POST['numTurma'];

			if(empty($descricao) || empty($qntVagas) || empty($professor)){
				?>
					<div class="d-flex justify-content-center mb-5"><?php die("Erro/Algum item está vazio"); ?></div>
				<?php
			}

			$update = "UPDATE turmas 
					   SET descricao = '$descricao', numVagas = '$qntVagas', professorRegente = '$professor'
					   WHERE numTurma = '$numeroTurma'";
			$query =  mysqli_query($conexao, $update);

			if($query){
				?>
					<script>
						alert("Dados alterados com sucesso!");
					</script>
				<?php
			}
		}
	}


 ?>