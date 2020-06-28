//oculta a div de sucesso e mostra novamente o cadastro	
$("#addMore").click(function(){
	$("#success").hide();
	$(".form-group").show();
});
//mostra a div modal na consulta
$(".buttonExcluirTurma").click(function(){
	$("#modal").css("visibility", "visible");
})
$(".buttonExcluirAluno").click(function(){
	$(".modal-2").css("visibility", "visible");
})
$("button[name=nao]").click(function(){
	$("#modal").css("visibility", "hidden");
})
//voltar btn
$("#voltarpag").click(function(){
	location.href='consulta.php'
})
//habilita botão de editar
$("textarea[name=desc], input[name=vagas], input[name=professor]").change(function(){
	$("button[name=editarTurma]").show();
})