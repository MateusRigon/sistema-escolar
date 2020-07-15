<?php 

	class Consulta{

		function consultarTurma(){
			require 'db.php';
			global $msg;
			//mostra todas as turmas em vários botões
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
								<div class="col-lg-3 mt-5">
										<form method="POST" class="d-flex justify-content-center">
                                            <button class="buttonTurmaAluno" name="buttonTurma">
                                                <h3>Turma <?php echo $array['numTurma']?></h3>
                                                <?php 
                                                $copia = $array;
												unset($copia['professorRegente'],$copia['descricao'],
													  $copia['numVagas'],$copia['numAlunos']);
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
			//clicando no botão abre os dados da turma clicada
			$select = "SELECT * FROM turmas WHERE numTurma = ".$_POST['numTurmaCopia'];
			$query = mysqli_query($conexao, $select);
			$array = mysqli_fetch_assoc($query);
			global $inputDadosTurma;
			$total = count($array);
				if($total > 0){
					do {
						?>
								<input id="voltarpag" type="button" value="Voltar">
								<div class="row flex-column mt-5">
										<div class="d-flex justify-content-center mb-3">
											<h1>Turma <?php echo $array['numTurma']?></h1>
										</div>
										<div class="dadosAluno d-flex justify-content-center">
											<p>Total de alunos: <span><?php echo $array['numAlunos'] ?></span></p>
										</div>
										
										<form method="POST" class="form-group flex-column p-4" style="display: flex;">
											<input type="hidden" name="numTurma" value='<?php echo $array['numTurma']?>'>
								              <div class="d-flex flex-column">
								                <label for="desc">Descrição <span class="requireDot"> * </span></label>
								                <textarea name="desc" required ><?php echo $array['descricao'] ?></textarea>
								                </div>
								          <div class="btnsDisplay d-flex ">
								            <div class="d-flex flex-column pr-5">
								                <label for="vagas">Quantidade de vagas <span class="requireDot"> * </span></label>
								               <input type="number" name="vagas" required value='<?php echo $array['numVagas'] ?>'>
								            </div>    
								            <div class="d-flex flex-column w-100">
								                <label for="professor">Professor regente <span class="requireDot"> * </span></label>
								               <input type="text" name="professor" value='<?php echo $array['professorRegente'] ?>' required>
								            </div>
								  
								          </div> 
								          <div id="alterar">
								          	<p>* Mude algum campo para salvar as alterações</p>
								          </div>
											<div class="divButtons d-flex justify-content-end">
												<button style="display: none;" name="editarTurma" class="mr-4" id="buttonMatricula">Salvar</button>
												<button type="button" class="buttonExcluirTurma" id="buttonMatricula">Excluir Turma</button>
											</div> 
    									</form>
    									
    										
    								
    									
										<form method="POST" class="form-final d-flex justify-content-end">
											<?php 
			                                    $copia = $array;
												unset($copia['professorRegente'],$copia['descricao'],
													  $copia['numVagas'],$copia['numAlunos']);
			                                    ?>
											<?php $inputDadosTurma = "<input type='hidden' name='excluirPorNumTurma' value='" 
																	. implode($copia) . "'>"; ?>
										</form>
								</div> 
								
						<?php
					} while ($array = mysqli_fetch_assoc($query));
				}

		}
		function exibeTotalTurmas(){
			require 'db.php';
			global $totalTurmas;
			//mostra o total de turmas cadastradas no sistema
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
			//mostra todos os alunos em vários botões
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
							<div class="col-lg-3 mt-5">
										<form method="POST" class="d-flex justify-content-center">
                                            <button id="btnCollor" class="buttonTurmaAluno" name="buttonAluno">
                                            <h3><?php echo mb_substr($array['nome'], 0, 15)?><?php if (strlen($array['nome']) >= 15):?>...<?php endif ?>

                                            </h3>
                                                <?php 
                                                $copia = $array;
												unset($copia['nome'],$copia['sexo'],$copia['dataDeNascimento'],
													  $copia['dataDeNascimento'],$copia['cidade'],$copia['rua'],
													  $copia['numero'],$copia['bairro'],$copia['complemento'],$copia['turma']);
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
			//clicando no botão abre os dados do aluno clicado
			$select = "SELECT * FROM alunos WHERE matricula = ".$_POST['matriculaAluno'];
			$query = mysqli_query($conexao, $select);
			$array = mysqli_fetch_assoc($query);
			$data = date('d/m/Y', strtotime($array['dataDeNascimento']));
			global $inputDadosAluno;
			if (empty($array['cidade']) || empty($array['numero']) || 
				empty($array['bairro']) || empty($array['complemento']) ||
				empty($array['turma'])) {
				$msgVazio = "Não preenchido";
			}

			do {
				?>
					<input id="voltarpag" type="button" value="Voltar" onclick="window.history.back()"/>
						<div class="row flex-column mt-5 mb-5">
							<div class="nome d-flex justify-content-center mb-5">
								<h2><?php echo $array['nome']?></h2>
							</div>
					<form method="POST" class="form-group flex-column p-4" style="display: flex;">
          				  <div class="d-flex justify-content-center mb-5">
				            <div class="d-flex flex-column mr-5">
				                <h5>Matrícula: <?php echo $array['matricula'] ?: $msgVazio; ?></h5>
				                <input type="hidden" name="matricula" value='<?php echo $array['matricula']?>'>
				            </div>    
				            <div class="d-flex flex-column">
				                <h5>Turma: <?php echo $array['turma'] ?: $msgVazio; ?></h5>
				            </div>
				  
				          </div>
              			  <div class="d-flex flex-column">
			                <label for="nome">Nome Completo <span class="requireDot"> * </span></label>
			                <input type="text" name="nome" value='<?php echo $array['nome']; ?>' required>
			              </div>
				          <div class="d-flex">
				            <div id="btnSexo" class="d-flex flex-column mr-5">
				                <label for="sexo">Sexo <span class="requireDot"> * </span></label>
				                <select class="select" name="sexo" required>
				                  <option id="primeiraOption"><?php echo $array['sexo']; ?></option>
				                  <option>Masculino</option>
				                  <option>Feminino</option>
				                </select>
				            </div>    
				            <div class="d-flex flex-column">
				                <label for="data">Data de nascimento <span class="requireDot"> * </span></label>
				               <input type="date" name="data" value='<?php echo $array['dataDeNascimento']; ?>' required>
				            </div>
				  
				          </div>      
			                
				            <div class="d-flex">    
				             <div class="btnMargin50 d-flex flex-column">
				                <label for="cidade">Cidade <span class="requireDot"> * </span></label>
				                <select class="select mb-2" name="cidade" required>
				                  <option><?php echo $array['cidade']; ?></option>
				                </select>
				            </div>
				            
				            </div>      

				            <div class="btnsDisplay" class="d-flex">    
				             <div id="btnRua" class="d-flex flex-column w-100 mr-5">
				                <label for="rua">Rua</label>
				               <input type="text" name="rua" placeholder='<?php echo $msgVazio ?>' value='<?php echo $array['rua']; ?>'>
				            </div>
				            <div class="d-flex flex-column">
				                <label for="numero">Número</label>
				               <input type="text" name="numero" placeholder='<?php echo $msgVazio ?>'value='<?php echo $array['numero']; ?>'>
				            </div>
				            </div> 
				            <div class="btnsDisplay" class="d-flex">
				               <div class="btnMargin50 d-flex flex-column mr-5">
				                <label for="bairro">Bairro</label>
				               <input type="text" name="bairro" placeholder='<?php echo $msgVazio ?>' value='<?php echo $array['bairro']; ?>'>
				            </div>
				             <div class="btnMargin50 d-flex flex-column">
				                <label for="complemento">Complemento</label>
				               <input type="text" name="complemento" placeholder='<?php echo $msgVazio ?>' value='<?php echo $array['complemento']; ?>'>
				            </div>
				            </div>

				            <div id="alterar">
								<p>* Mude algum campo para salvar as alterações</p>
							</div>

				            <div class="divButtons d-flex justify-content-end">
									<button style="display: none;" name="editarAluno" class="mr-4" id="buttonMatricula">Salvar</button>
									<button type="button" class="buttonExcluirAluno mr-4" id="buttonMatricula">Excluir Aluno</button>
									<button type="button" id="buttonMatricula">Gerar Matrícula</button>
							</div>   
      				</form>


      						<form method="POST" class="form-final d-flex justify-content-end">
								<?php 
                                    $copia = $array;
									unset($copia['nome'],$copia['sexo'],$copia['dataDeNascimento'],
										  $copia['dataDeNascimento'],$copia['cidade'],$copia['rua'],
										  $copia['numero'],$copia['bairro'],$copia['complemento'],$copia['turma']);
                                    ?>
							<?php $inputDadosAluno = "<input type='hidden' name='excluirPorMatricula' value='" . implode($copia) . "'>"; ?>							
							</form>
							
						</div> 
				<?php
			} while ($array = mysqli_fetch_assoc($query));
		}

		function exibeTotalAlunos(){
			require 'db.php';
			global $totalAlunos;
			//mostra o total de alunos cadastrados no sistema
			$busca = "SELECT * FROM alunos";
			$query = mysqli_query($conexao, $busca);
			$totalAlunos = mysqli_num_rows($query);

			?>
				<div class="mt-4 mb-2" style="color: gray;">Total de registros <?php echo $totalAlunos; ?></div>
			<?php
		}

	}

 ?>