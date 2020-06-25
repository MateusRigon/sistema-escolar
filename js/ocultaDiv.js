//oculta a div de sucesso e mostra novamente o cadastro	
$("#addMore").click(function(){
	$("#success").hide('slow');
	$(".form-group").show('slow');
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
$("#voltarpag").click(function(){
	location.href='consulta.php'
})