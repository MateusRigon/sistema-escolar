//trata do input next e pronto
$("select[name=alunos]").change(function(){
	$("input[name=next]").prop("disabled", false);
	$("input[name=next]").css("cursor", "pointer");
})

$("select[name=turmas]").change(function(){
	$("input[name=pronto]").prop("disabled", false);
	$("input[name=pronto]").css("cursor", "pointer");
})
//esconde a div sucesso e mostra novamente os alunos
$("#addMore").click(function(){
	$("#success").hide('slow');
	$("#divAluno").show('slow');
})
$("#voltarpag").click(function(){
	location.href='vincular.php'
})