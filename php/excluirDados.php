<?php 
	class Excluir{

		function excluirAluno(){
			require 'db.php';
			$matricula = $_POST['excluirPorMatricula'];

			$selectTurma = "SELECT turma FROM alunos WHERE matricula = '$matricula'";
			$query = mysqli_query($conexao, $selectTurma);
			$array = mysqli_fetch_assoc($query);
			$turma = $array['turma'];
			$onlyNumberTurma = preg_replace("/[^0-9]/","", $turma);
			
			$excluir = "DELETE FROM alunos WHERE matricula = '$matricula'";
			$query2 = mysqli_query($conexao, $excluir);

			if($query2){
				$update =  "UPDATE turmas 
							SET numVagas = numVagas+1,numAlunos = numAlunos-1 
							WHERE numTurma = '$onlyNumberTurma'";
				$query3 = mysqli_query($conexao, $update);
				?>
					<script>
						alert("Aluno excluido!");
					</script>
				<?php
			}else{
				?>
					<script>
						alert("Erro ao excluir aluno.");
					</script>
				<?php
			}
		}

		function excluirTurma(){
			require 'db.php';
			$numTurma = $_POST['excluirPorNumTurma'];

			$excluir = "DELETE FROM turmas WHERE numTurma = '$numTurma'";
			$query = mysqli_query($conexao, $excluir);

			if($query){
				$select = "SELECT * FROM alunos";
				$query2 = mysqli_query($conexao, $select);
				$array = mysqli_fetch_assoc($query2);
				$turma = $array['turma'];
				$onlyNumberTurma = preg_replace("/[^0-9]/","", $turma);
				
				if(isset($turma)){
					if($onlyNumberTurma == $numTurma){
						$update = "UPDATE alunos SET turma = 'NULL'";
						$query3 = mysqli_query($conexao, $update);
					}
				}
				?>
					<script>
						alert("Turma excluida!");
					</script>
				<?php
			}else{
				?>
					<script>
						alert("Erro ao excluir turma.");
					</script>
				<?php
			}
		}

	}



 ?>