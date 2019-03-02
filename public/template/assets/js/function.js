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


$('#passwordForm').submit(function (event) {
	event.preventDefault();
	var old_password = $('#old_password').val();
	var new_password = $('#new_password').val();
	var confirm_password = $('#confirm_password').val();

	if (new_password != confirm_password) {

		Swal.fire('Oppss','Password Baru dan konfirmasi password tidak sama','info');
          // alert('New password and confirm password does not match');
          return false;
      }
      document.getElementById("passwordForm").submit();

  });

function summernote(){
	$('.summernote').summernote({
		placeholder: 'Jawaban anda ...',
		toolbar: [
		['style', ['bold', 'italic', 'underline', 'clear']],
		['fontsize', ['fontsize']],
		['para', ['ul', 'ol', 'paragraph']],
		['height', ['height']]
		],
		tabsize: 2,
		height: 250
	});
}


dropzone()
function dropzone(){
	Dropzone.options.dropzoneFrom = {
		autoProcessQueue: false,
		acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
		addRemoveLinks: true,
		paramName: 'file',


		init: function(){
			var submitButton = document.querySelector('#submit-all');
			myDropzone = this;
			submitButton.addEventListener("click", function(){
				myDropzone.processQueue();
			});
			this.on("complete", function(){
				if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
				{
					var _this = this;
					_this.removeAllFiles();
				}
			});
		},
	};
}



