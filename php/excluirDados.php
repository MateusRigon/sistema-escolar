<?php 
	class Excluir{

		function excluirAluno(){
			require 'db.php';
			$matricula = $_POST['excluirPorMatricula'];
			
			$excluir = "DELETE FROM alunos WHERE matricula = '$matricula'";
			$query = mysqli_query($conexao, $excluir);

			if($query){
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