$(document).ready(function(){
	$('#addFilterBtn').click(function(){
		$container = getFilterContainer();
		$('#filterContainer').append($container);
		$container.fadeIn();
	});
	
	$('#loadListBtn').click(function(){
		var data = dmpl.Util.serialize('[name^="data["]', $('#filterContainer'));
		data['cube'] = $('#cubeSelect').val();
		data['compress'] = true;
		ajaxParams = {
			type: 'GET',
			url: dmpl.apiUrl + '/cubes/load',
			data: data,
			xhrFields: {
			    withCredentials: true
			},
			dataType: 'json',
			success: function(response){
				if(response){
					$table = dmpl.GUI.buildTable({fields: response.fields, keyColumn: response.keyColumn, items: response.items});
					$('#itemsList').html($table);
				}else{
					dmpl.GUI.showMessage({text: 'Erro ao carregar cubo. Resposta do sistema: ' + (response.message || 'sem resposta'), type: dmpl.GUI.MESSAGE_TYPES.error});
				}
			}
		};
		
		dmpl.Network.ajax({ajax: ajaxParams, errorMessage: 'Ocorreu um erro ao conectar com o servidor!', loadMessage: 'Carregando cubo...'});
	});
	
	$('#btnSave').click(function(){
		var selecteds = $('#itemsList tbody [id^="form-checkbox-"]:checked').map(function(idx, elem) {
		    return $(elem).val();
		}).get();
		
		var data = dmpl.Util.serialize('[name^="data["]', $('#basicInfoContainer'));
		data['items'] = selecteds;
		data['keyColumn'] = $('#itemsList [id^="form-checkbox-all"]').data('key-column');
		
		ajaxParams = {
			type: 'POST',
			url: dmpl.apiUrl + '/batches/save',
			data: data,
			xhrFields: {
			    withCredentials: true
			},
			dataType: 'json',
			success: function(response){
				if(response){
					alert('salvo...');
				}else{
					dmpl.GUI.showMessage({text: 'Erro ao carregar cubo. Resposta do sistema: ' + (response.message || 'sem resposta'), type: dmpl.GUI.MESSAGE_TYPES.error});
				}
			}
		};
		
		dmpl.Network.ajax({ajax: ajaxParams, errorMessage: 'Ocorreu um erro ao conectar com o servidor!', loadMessage: 'Salvando lote...'});
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
		options += '<option value="' + cubeFields[i].Field + '">' + cubeFields[i].Name + '</option>';
	}
	
	return options;
}

function getFilterContainer(){
	var cube = $('#cubeSelect').val();
	var size = $('#filterContainer .filter-row').length;
	var container = '';
	var prepend = '';

	if(size > 0){
		prepend += '<div class="col-sm-1">';
			prepend += '<div class="form-group">';
				prepend += '<select class="form-control" name="data['+size+'][logic]">';
					prepend += '<option value="AND">E</option>';
					prepend += '<option value="OR">Ou</option>';
				prepend += '</select>';
			prepend += '</div>';
		prepend += '</div>';
		prepend += '<div class="col-sm-3">';
	}else{
		prepend += '<div class="col-sm-4">';
	}
		container += prepend; 
			container += '<div class="form-group">';
				container += '<select class="form-control select2 field-select" name="data['+size+'][field]">';
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
				container += '<select class="form-control" name="data['+size+'][operator]">';
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
				container += '<input type="text" class="form-control" name="data['+size+'][value]">';
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