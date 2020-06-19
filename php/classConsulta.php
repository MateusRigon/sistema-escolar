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
					<div class="nullResult d-flex justify-content-center mt-2 mb-2"><?php echo "Não há turmas cadastradas" ?></div>
				<?php
			}else{
				$total = count($array);
				if($total > 0){
					do {
						?>
								<div class="col-lg-3 mt-5 mb-5">
										<form method="POST" class="d-flex justify-content-center">
                                            <button class="buttonTurmaAluno" name="buttonTurma">
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
										
										<div class="dadosGeral d-flex justify-content-center"> 									
												<p class="mr-5">Professor: <span><?php echo $array['professorRegente']?></span></p>
												<p>Total de vagas: <span><?php echo $array['numVagas']?></span></p>
										</div>
										<div class="d-flex justify-content-center">
											<div id="desc"><?php echo $array['descricao']?></div>
										</div>
								</div> 
								
						<?php
					} while ($array = mysqli_fetch_assoc($query));
				}

		}
		function exibeTotalTurmas(){
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
					<div class="nullResult d-flex justify-content-center mt-2 mb-2"><?php echo "Não há alunos cadastrados" ?></div>
				<?php
			}else{
				$total = count($array);

				if($total > 0){
					do {
						?>
							<div class="col-lg-3 mt-5 mb-5">
										<form method="POST" class="d-flex justify-content-center">
                                            <button id="btnCollor" class="buttonTurmaAluno" name="buttonAluno">
                                            <h3><?php echo mb_substr($array['nome'], 0, 15)?><?php if (strlen($array['nome']) >= 15):?>...<?php endif ?>
                                            </h3>
                                                <?php 
                                                $copia = $array;
												unset($copia['nome'],$copia['sexo'],$copia['dataDeNascimento'],
													  $copia['dataDeNascimento'],$copia['cidade'],$copia['rua'],
													  $copia['numero'],$copia['bairro'],$copia['complemento']);
                                                 ?>
                                         		<?php echo "<input type='hidden' name='matriculaAluno' value='" . implode($copia) . "'>"; ?>
                                            </button>
                                            
                                        </form> 
								</div>	
						<?php
					} while ($array = mysqli_fetch_assoc($query));
				}

			}
		}
		function exibeAluno(){
			require 'db.php';
			$select = "SELECT * FROM alunos WHERE matricula = ".$_POST['matriculaAluno'];
			$query = mysqli_query($conexao, $select);
			$array = mysqli_fetch_assoc($query);
			$data = date('d/m/Y', strtotime($array['dataDeNascimento']));

			if (empty($array['cidade']) || empty($array['numero']) || 
				empty($array['bairro']) || empty($array['complemento'])) {
				$msgVazio = "Vazio";
			}

			do {
				?>
					<input id="voltarpag" type="button" value="Voltar" onclick="window.history.back()"/>
						<div class="row flex-column mt-5 mb-5">
							<div class="nome d-flex justify-content-center mb-5">
								<h2><?php echo $array['nome']?></h2>
							</div>

							<div class="dadosGeral" id="divAlunos"> 
								<div class="d-flex">
								<p class="mr-5">Matrícula: <span><?php echo $array['matricula']?></span></p>
								<p>Turma: <span><?php echo $array['matricula']?></span></p>
								</div>
								<div class="d-flex">
								<p class="mr-5">Sexo: <span><?php echo $array['sexo'] ?></span></p>									
								<p>Nascimento: <span><?php echo $data ?></span></p>
								</div>
								<div class="d-flex">
								<p class="mr-5">Cidade: <span><?php echo $array['cidade'] ?: $msgVazio ?></span></p>	
								<p>Rua: <span><?php echo $array['rua'] ?: $msgVazio ?></span></p>
								</div>
								<div class="d-flex">
								<p class="mr-5">Número: <span><?php echo $array['numero'] ?: $msgVazio ?></span></p>	
								<p class="mr-5">Bairro: <span><?php echo $array['bairro'] ?: $msgVazio ?></span></p>
								<p>Complemento: <span><?php echo $array['complemento'] ?: $msgVazio ?></span></p>
								</div>
							</div>
							<form class="form-final d-flex justify-content-end">
								<button class="mr-4" id="buttonMatricula">Editar</button>
								<button class="mr-4" id="buttonMatricula">Excluir Aluno</button>
								<button id="buttonMatricula">Gerar Matrícula</button>
							</form>
						</div> 
				<?php
			} while ($array = mysqli_fetch_assoc($query));
		}

		function exibeTotalAlunos(){
			require 'db.php';
			global $totalAlunos;

			$busca = "SELECT * FROM alunos";
			$query = mysqli_query($conexao, $busca);
			$totalAlunos = mysqli_num_rows($query);

			?>
				<div class="mt-4 mb-2" style="color: gray;">Total de registros <?php echo $totalAlunos; ?></div>
			<?php
		}

	}

 ?>