function loader(attr) {
	$(attr).waitMe({
		effect : 'ios',
		text : 'sedang memuat...',
		bg :' rgba(0,0,0,0.5)',
		color : '#e8eaf1',
		maxSize : '',
		waitTime : -1,
		textPos : 'vertical',
		fontSize : '',
		source : '',
		onClose : function() {}
	});
}

function errorHandling(jqXHR, exception) {
	if (jqXHR===0) {
		Swal.fire('Oopps','Tidak ada koneksi','info')
	}else if(jqXHR===404){

		Swal.fire('Oppss','request not found','info')
	}else if(jqXHR===500){

		Swal.fire('Oppss','internal server Error','info')
	}else if(exception==='parseerror'){

		alert('Request Json Parse failed')
	}else if(exception==='timeout'){

		alert('Timeout Error')
	}else if(exception==='abort'){

		alert('Ajax Request Aborted')
	}else{

		alert('error '+jqXHR.responseText)
	}
	$('#load').waitMe('hide')
	$('button').prop('disabled', false)
}

function reset(form){
	$(form)[0].reset()
	$('.form-group').removeClass('has-success has-error')
	$('.error').remove()
}

function validasi(form){
	$(form).validate({
		validClass: "success",
		rules: {
			
		},
		highlight: function(element) {
			$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		success: function(element) {
			$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			$(element).closest('.error').remove();
		},
	});
}


$('#basic').select2({
	theme: "bootstrap"
});

$('#multiple').select2({
	theme: "bootstrap"
});

$('#multiple-states').select2({
	theme: "bootstrap"
});


