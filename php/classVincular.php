<?php 
	class Vincular{

		function exibeAlunos(){
			require 'db.php';
			//exibe todos alunos cadastrados
			$select = "SELECT * FROM alunos";
			$query = mysqli_query($conexao, $select);
			$array = mysqli_fetch_assoc($query);
			
			if(empty($array)){
				?>
					<option disabled selected value>
						<?php echo "Não há alunos cadastrados"; ?>
					</option>
				<?php 
			}else{
				$total = count($array);
				if ($total > 0) {
					do {
						?>
	                                <option>
										<?php echo $array['nome'] ?>
								 	</option>
						<?php
					} while ($array = mysqli_fetch_assoc($query));
				}
			}
		}

		function exibeTurma(){
			require 'db.php';

			//exibe todas turmas cadastradas
			$select = "SELECT * FROM turmas";
			$query = mysqli_query($conexao, $select);
			$array = mysqli_fetch_assoc($query);
			
			if(empty($array)){
				?>
					<option disabled selected value >
						<?php echo "Não há turmas cadastradas"; ?>
					</option>
				<?php 
			}else{
				$total = count($array);
				if ($total > 0) {
					do {
						?>	
	                                <option> 
	                                	Turma - <?php echo $array['numTurma'] ?> -
	                                	Professor: <?php echo $array['professorRegente'] ?>
	                                </option>
						<?php
					} while ($array = mysqli_fetch_assoc($query));
				}
			}
		}

		function salvaNome(){
			//pega o nome do select e salva em input hidden para ser tratado no updateTurma
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

			//seleciona a turma que o aluno está vinculado
			$pegaTurma = "SELECT turma FROM alunos WHERE nome = '$aluno'";
			$query = mysqli_query($conexao, $pegaTurma);
			$array = mysqli_fetch_assoc($query);
			$turmaCadastrada = $array['turma'];

			//pega somente o numero da turma das duas strings
			$onlyNumberTurma = preg_replace("/[^0-9]/","", $turma);
			$onlyNumberTurma2 = preg_replace("/[^0-9]/","", $turmaCadastrada);

			//verifica se a turma já está cadastrada no aluno
			if($turmaCadastrada == $turma){
				$msgErro = "Aluno já está vinculado a";
				$msgSucesso3 = "$turma.";
				$msgErro2 = "Por favor insira outra turma.";
			}else {
				//adiciona a turma no ao aluno
				$update = "UPDATE alunos SET turma = '$turma' WHERE nome = '$aluno'";
				$query2 = mysqli_query($conexao, $update);

				//muda os valores da turma anterior
				$update2 = "UPDATE turmas 
							SET numVagas = numVagas+1,numAlunos = numAlunos-1 
							WHERE numTurma = '$onlyNumberTurma2'";
				$query3 = mysqli_query($conexao, $update2);

				//muda os valores da nova turma
				$update3 = "UPDATE turmas 
							SET numVagas = numVagas-1,numAlunos = numAlunos+1 
					        WHERE numTurma = '$onlyNumberTurma'";
				$query4 = mysqli_query($conexao, $update3);

				//se tudo estiver certo - msg de sucesso
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