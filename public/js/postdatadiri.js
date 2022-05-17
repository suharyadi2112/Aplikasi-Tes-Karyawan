$(function(){
$.ajaxSetup({
    headers:{
        'X-CSRF-Token' : $("input[name='_token'").attr('value')
    }
});
	$('#myForm').submit(function(e){
		var route = $('#myForm').data('route');
		var routeback = $('#myForm').data('routeback');
		var form_data = $(this);

			$.ajax({

				type: 'POST',
				url: route,
				data: form_data.serialize(),

				beforeSend: function(){
					$.blockUI({ css: { 
			            border: 'none', 
			            padding: 'none', 
			            backgroundColor: '#000', 
			            '-webkit-border-radius': '10px', 
			            '-moz-border-radius': '10px', 
			            opacity: .6, 
			            color: '#fff',
			            
			        },message: $('#giftes') });
				},
				success: function(Response){
					//console.log(Response);
					//setTimeout($.unblockUI, 1000); 
				
					Swal.fire({
			          title: 'Berhasil !',
			          text: "Data Berhasil Disimpan",
			          type: 'success',
			          confirmButtonColor: '#3085d6',
			          confirmButtonText: 'Oke'
			        }).then((result) => {
			          if (result.value) {
			            window.location.href = routeback;
			          }
			        })

				},
				complete: function() {
                	$.unblockUI();
                	
                	
            	},
				error: function(xhr) { // if error occured
	                swal.fire("Upsss!", "Terjadi kesalahan Dalam Menyimpan Data", "error");
	            },

		})

		e.preventDefault();
	});
});