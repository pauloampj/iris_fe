$(document).ready(function(){
	$('#addFilterBtn').click(function(){
		$container = getFilterContainer();
		$('#filterContainer').append($container);
		$container.fadeIn();
	});
	
	$('#cubeSelect').change(function(){
		var cube = $(this).val();
		
		if(dmpl.Cubes && dmpl.Cubes[cube]){
			updateFieldSelects(dmpl.Cubes[cube])
		}else{
			ajaxParams = {
				type: 'GET',
				url: dmpl.apiUrl + '/cubes/getFields',
				data: {
					Key: cube
				},
				xhrFields: {
				    withCredentials: true
				},
				dataType: 'json',
				success: function(response){
					if(response){
						dmpl.Cubes = dmpl.Cubes || [];
						dmpl.Cubes[cube] = response;
						updateFieldSelects(response)
					}else{
						dmpl.GUI.showMessage({text: 'Erro ao buscar campos do cubo. Resposta do sistema: ' + (response.message || 'sem resposta'), type: dmpl.GUI.MESSAGE_TYPES.error});
					}
				}
			};
		
			dmpl.Network.ajax({ajax: ajaxParams, errorMessage: 'Ocorreu um erro ao conectar com o servidor!', loadMessage: 'Atualizando campos do cubo...'});
		}
	});
	
		
});

function updateFieldSelects(cubeFields){
	$('.field-select').empty().append(getFieldSelectOptions(cubeFields));
}

function getFieldSelectOptions(cubeFields){
	var options = '';
	
	for(var i = 0; i < cubeFields.length; i++){
		options += '<option value="' + cubeFields[i].field + '">' + cubeFields[i].field + '</option>';
	}
	
	return options;
}

function getFilterContainer(){
	var cube = $('#cubeSelect').val();
	var container = '';
		container += '<div class="col-sm-4">';
			container += '<div class="form-group">';
				container += '<select class="form-control select2 field-select">';
					if(dmpl.Cubes && dmpl.Cubes[cube]){
						container += getFieldSelectOptions(dmpl.Cubes[cube]);
					}else{
						container += '<option value="-1">Campos não carregados...</option>';
					}
				container += '</select>';
			container += '</div>';
		container += '</div>';
		container += '<div class="col-sm-4">';
			container += '<div class="form-group">';
				container += '<select class="form-control">';
					container += '<option value="equal">É igual a</option>';
					container += '<option value="different">É diferente de</option>';
					container += '<option value="lesserthan">É menor que</option>';
					container += '<option value="lesserorequalthan">É menor ou igual a</option>';
					container += '<option value="biggerthan">É maior que</option>';
					container += '<option value="biggerorequalthan">É maior ou igual a</option>';
					container += '<option value="contain">Contém</option>';
					container += '<option value="startswith">Começa com</option>';
					container += '<option value="endswith">Termina com</option>';
				container += '</select>';
			container += '</div>';
		container += '</div>';
		container += '<div class="col-sm-3">';
			container += '<div class="form-group">';
				container += '<input type="text" class="form-control">';
			container += '</div>';
		container += '</div>';
		container += '<div class="col-sm-1">';
			container += '<div class="form-group">';
				container += '<button alt="remover" class="btn btn-danger btn-icon btn-circle btn-xs btn-remove"><i class="ion-trash-a icon-lg"></i></button>';
			container += '</div>';
		container += '</div>';
	
	$div = $('<div class="row filter-row">');
	$div.hide();
	$div.append(container);
	$div.find('.btn-remove').click(function(){
		$(this).parents('.filter-row').fadeOut(400, function(){
			$(this).remove();
		});
	});
	
	return $div;
}