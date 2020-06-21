<?php 

class Aluno{

 	function cadastrarAluno(){
 		require 'db.php';
 		//cadastra o aluno no sistema
		$nome = $_POST['nome'];
		$sexo = $_POST['sexo'];
		$data = $_POST['data'];
		$cidade = $_POST['cidade'];
		$rua = $_POST['rua'];
		$numero = $_POST['numero'];
		$bairro = $_POST['bairro'];
		$complemento = $_POST['complemento'];
		global $msgErro;
		global $msgSucesso;

		if(empty($nome) || empty($sexo) || empty($data)){
			?>
			<div class="d-flex justify-content-center"><?php die("Erro ao cadastrar/Algum item está vazio"); ?></div>
			<?php
		}else{

		$cadastrar = "INSERT INTO alunos(nome,sexo,dataDeNascimento,cidade,rua,numero,bairro,complemento) 
					  VALUES('$nome','$sexo','$data','$cidade','$rua','$numero','$bairro','$complemento')";
		$query = mysqli_query($conexao, $cadastrar);			  

		if($query){
			$msgSucesso = "Cadastrado com sucesso!";
			?>
			<script>
				document.querySelector('.form-group').style.display = "none";
			</script>
			<?php
		}else
			$msgErro = "Erro ao cadastrar";
		}
	}

}






 ?>