<?php 
	class Vincular{

		function exibeAlunos(){
			require 'db.php';

			$select = "SELECT * FROM alunos";
			$query = mysqli_query($conexao, $select);
			$array = mysqli_fetch_assoc($query);
			
			$total = count($array);

			if ($total > 0) {
				do {
					?>
                                <option>
									<?php echo $array['nome'] ?>
							 	</option>
					<?php
				} while ($array = mysqli_fetch_assoc($query));
			}else
				echo "Não há alunos cadastrados";

		}

		function exibeTurma(){
			require 'db.php';

			$select = "SELECT * FROM turmas";
			$query = mysqli_query($conexao, $select);
			$array = mysqli_fetch_assoc($query);
			
			$total = count($array);

			if ($total > 0) {
				do {
					?>	

                                <option> 
                                	Turma - <?php echo $array['numTurma'] ?> -
                                	Professor: <span><?php echo $array['professorRegente'] ?></span>
                                </option>

					<?php
				} while ($array = mysqli_fetch_assoc($query));
			}else
				echo "Não há alunos cadastrados";

		}

		function salvaNome(){
			$aluno = array($_POST['alunos']);
			echo "<input type='hidden' name='nomeAluno' value='" . implode($aluno) ."'>";
		}

		function updateTurma(){
			require 'db.php';
			global $msgSucesso;
			global $msgSucesso2;
			global $msgSucesso3;
			global $msgErro;
			global $msgErro2;
			$aluno = $_POST['nomeAluno'];
			$turma = $_POST['turmas'];

			$pegaTurma = "SELECT turma FROM alunos WHERE nome = '$aluno'";
			$query = mysqli_query($conexao, $pegaTurma);
			$array = mysqli_fetch_assoc($query);
			$turmaCadastrada = $array['turma'];

			if($turmaCadastrada == $turma){
				$msgErro = "Aluno já está vinculado a";
				$msgSucesso3 = "$turma.";
				$msgErro2 = "Por favor insira outra turma.";
			}else {

				$update = "UPDATE alunos SET turma = '$turma' WHERE nome = '$aluno'";
				$query2 = mysqli_query($conexao, $update);

				if($query2){
					$msgSucesso = "$aluno,";
					$msgSucesso2 = "foi vinculado com sucesso a";
					$msgSucesso3 = "$turma.";
				}else
					echo "Erro ao vincular aluno.";
			}
		}

	}



 ?>