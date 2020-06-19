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

		function pegaNome(){
			echo $_POST['alunos'];
			?>
				<script>
					document.querySelector('#divAluno').style.display = "none";
					document.querySelector('#divTurma').style.display = "block";
				</script>
			<?php
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

	}



 ?>