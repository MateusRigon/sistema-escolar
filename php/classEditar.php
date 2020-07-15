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

		function editarAluno(){
			require 'db.php';

			$nome = $_POST['nome'];
			$sexo = $_POST['sexo'];
			$data = $_POST['data'];
			$cidade = $_POST['cidade'];
			$rua = $_POST['rua'];
			$numero = $_POST['numero'];
			$bairro = $_POST['bairro'];
			$complemento = $_POST['complemento'];
			$matricula = $_POST['matricula'];

			if(empty($nome) || empty($sexo) || empty($data) || empty($cidade)){
				?>
					<div class="d-flex justify-content-center mb-5"><?php die("Erro/Algum item está vazio"); ?></div>
				<?php
			}else{

				$update = "UPDATE alunos 
						   SET nome = '$nome', sexo = '$sexo', dataDeNascimento = '$data',
						   	   cidade = '$cidade', rua = '$rua', numero = '$numero',
						   	   bairro = '$bairro', complemento = '$complemento' 
						   WHERE matricula = '$matricula'";
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
	}


 ?>