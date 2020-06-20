$("select[name=alunos]").change(function(){
	$("input[name=next]").prop("disabled", false);
	$("input[name=next]").css("cursor", "pointer");
})

$("select[name=turmas]").change(function(){
	$("input[name=pronto]").prop("disabled", false);
	$("input[name=pronto]").css("cursor", "pointer");
})

$("#addMore").click(function(){
	$("#divAluno").show();
	$("#success").hide();
})
