<?php 
	class Consulta{

		function consultarTurma(){
			require 'db.php';
			global $msg;

			$busca = "SELECT * FROM turmas";
			$query = mysqli_query($conexao, $busca);
			$array = mysqli_fetch_assoc($query);
			

			if(empty($array)){
				?>
					<div class="d-flex justify-content-center mt-2 mb-2"><?php echo "Não há turmas cadastradas" ?></div>
				<?php
			}else{
				$total = count($array);
				if($total > 0){
					do {
						?>
								<div class="col-lg-3 mt-5 mb-5">
										<form method="POST" class="d-flex justify-content-center">
                                            <button class="buttonTurma" name="buttonTurma">
                                                <h3>Turma <?php echo $array['numTurma']?></h3>
                                                <?php 
                                                $copia = $array;
												unset($copia['professorRegente'],$copia['descricao'],$copia['numVagas']);
                                                 ?>
                                         		<?php echo "<input type='hidden' name='numTurmaCopia' value='" . implode($copia) . "'>"; ?>
                                            </button>
                                            
                                        </form> 
								</div>
						<?php
					} while ($array = mysqli_fetch_assoc($query));
				}
			}
		}
		function exibeTurma(){
			require 'db.php';
			$select = "SELECT * FROM turmas WHERE numTurma = ".$_POST['numTurmaCopia'];
			$query = mysqli_query($conexao, $select);
			$array = mysqli_fetch_assoc($query);

			$total = count($array);
				if($total > 0){
					do {
						?>
								<input id="voltarpag" type="button" value="Voltar" onclick="window.history.back()"/>
								<div class="row flex-column mt-5 mb-5">
										<div class="d-flex justify-content-center mb-3">
											<h2>Turma <?php echo $array['numTurma']?></h2>
										</div>
										
										<div class="dadosTurma d-flex justify-content-center"> 									
												<p class="mr-5">Professor: <span><?php echo $array['professorRegente']?></span></p>
												<p>Total de vagas: <span><?php echo $array['numVagas']?></span></p>
										</div>
										<div class="d-flex justify-content-center">
											<textarea readonly class="mt-3"> - <?php echo $array['descricao']?></textarea>
										</div>
								</div> 
								
						<?php
					} while ($array = mysqli_fetch_assoc($query));
				}

		}
		function exibeTotal(){
			require 'db.php';
			global $totalTurmas;

			$busca = "SELECT * FROM turmas";
			$query = mysqli_query($conexao, $busca);
			$totalTurmas = mysqli_num_rows($query);

			?>
				<div class="mt-4 mb-2" style="color: gray;">Total de registros <?php echo $totalTurmas; ?></div>
			<?php
		}

		function consultarAluno(){
			require 'db.php';
			global $msg;

			$busca = "SELECT * FROM alunos";
			$query = mysqli_query($conexao, $busca);
			$array = mysqli_fetch_assoc($query);

			if(empty($array)){
				?>
					<div class="d-flex justify-content-center mt-2 mb-2"><?php echo "Não há alunos cadastrados" ?></div>
				<?php
			}
		}

	}

 ?>