//pega todas cidades do RS
$("select[name=cidade]").click(getCidades);

function getCidades(click){
	var city = $("select[name=cidade]");
	const url = `https://servicodados.ibge.gov.br/api/v1/localidades/estados/RS/municipios?orderBy=nome`;

	fetch(url).then(function(res){return res.json()}).then(function(cidades){
		for(const cidade of cidades){
			city.append(`<option value="${cidade.nome}">${cidade.nome}</option>`);
		}
	});
}
