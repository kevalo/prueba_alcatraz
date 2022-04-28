$(function() {

	jQuery.extend(jQuery.validator.messages, {
	  required: "Este campo es obligatorio.",
	  remote: "Por favor, rellena este campo.",
	  email: "Por favor, escribe una dirección de correo válida",
	  url: "Por favor, escribe una URL válida.",
	  date: "Por favor, escribe una fecha válida.",
	  dateISO: "Por favor, escribe una fecha (ISO) válida.",
	  number: "Por favor, escribe un número entero válido.",
	  digits: "Por favor, escribe sólo dígitos.",
	  creditcard: "Por favor, escribe un número de tarjeta válido.",
	  equalTo: "Por favor, escribe el mismo valor de nuevo.",
	  accept: "Por favor, escribe un valor con una extensión aceptada.",
	  maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
	  minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
	  rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
	  range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
	  max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
	  min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
	});

	$("#form").validate();
	var tokenForm = '';

	/*$.post($("#form").attr('data-url'), {usuario:"kvargas", password:"kvargasalcatraz"}, function(response){
		if(!response.error){
			tokenForm = response.token;
		}
	});*/

	$.ajax({
	  type: 'POST',
	  url: $("#form").attr('data-url'),
	  success: function(response){
		if(!response.error){
			tokenForm = response.token;
		}
	  },
	  data: {usuario:"kvargas", password:"kvargasalcatraz"},
	  async:false
	});


	$.ajaxSetup({
	    headers: {
	        token: tokenForm
	    }
	});

	$.get($("#departamento").attr('data-url'), function(response){
		if(!response.error){
			var options = "<option value=''>Seleccionar</option>";
			for (var i = 0; i < response.data.length; i++) {
				options += "<option value='"+response.data[i].id_departamento+"'>"+response.data[i].departamento+"</option>"
			}
			$("#departamento").html(options);
		}
	});

	$("#departamento").on('change', function(){
		var idDept = $(this).val();
		$.get($("#ciudad").attr('data-url') + '/' + idDept, function(response){
			if(!response.error){
				var options = "<option value=''>Seleccionar</option>";
				for (var i = 0; i < response.data.length; i++) {
					options += "<option value='"+response.data[i].id_municipio+"'>"+response.data[i].municipio+"</option>"
				}
				$("#ciudad").html(options);
			}
		});
	});

});