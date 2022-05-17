@extends('admin.layout.masteradmin')
@section('content') 
<!-- page content -->

<div class="right_col" role="main">
  <div class="row">

  	<a href="{{ Route('ShowAptiDisc',['id' => $id]) }}" ><button type="button" class="btn btn-outline-primary btn-sm" > 
	<span class="fa fa-arrow-circle-left"></span> Kembali</button></a> &nbsp;&nbsp;&nbsp;&nbsp;
	<button type="button" class="btn btn-info btn-sm" id="PrintPDF"> 
	<span class="fa fa-download"></span></button>
	<a href="{{ Route('tespreview',['id_user' => $id]) }}" target="_blank"><button type="button" class="btn btn-warning btn-sm" > 
	<span class="fa fa-file"></span></button></a>
	<button type="button" class="btn btn-success btn-sm" id="WatakKepribadian"><span class="fa fa-check-circle"></span></button>
	<a href="{{ Route('PrintCoreMask',['id_user' => $id]) }}" target="_blank"><button type="button" class="btn btn-outline-primary btn-sm" > 
	<span class="fa fa-file"></span> Hasil Akhir Keterangan</button></a>

	@if($message = Session::get('CoreMask'))
		<script type="text/javascript">
		var CekCoreMas = "{{ $message }}";
		alert(CekCoreMas)</script>
	@endif

		<div class="x_panel shadow-lg p-3 mb-5 bg-white rounded">
			<div class="x_content">
				<div class="container">

				  <div class="row">
				    <div class="col-sm-4">
				    	{{-- Render Nilah Hasil Akhir DISC --}}
					    <div id="RenderTabelNilaiDisc" class="no-print"></div>

				    </div>
				    {{-- batas col tengah --}}
				    <div class="col-sm-4"> 
				    	{{-- Render Status Cora dan Mask --}}
					    <div id="StatusCoreMask"></div>
				    </div>
				    <div class="col-sm-4">
				    	{{-- Render Data Diri --}}
				   		<div id="DataDiri"></div>
				    </div>
				  </div>
				  <hr>
						{{-- RENDER TABEL JAWABAN --}}
						<div id="RenderTabel"></div>
				</div>
			</div>
		</div>
	</div>  
</div>

<div class="modal fade" id="ModalWatak" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	  <div class="modal-header">
        <h5 class="modal-title">Mask & Core</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form data-route="{{ route('PostCoreMask') }}"  id="PostCoreMask" role="form" method="POST" accept-charset="utf-8">
	     <div class="modal-body">
	      	{{-- form input --}}
	      	    <div id="RenderWatak"></div>
	      </div>
	      <div class="modal-footer">
	        <button type="submit" id="ButtonCoreMask" class="btn btn-primary">Simpan</button>
	      </div>
	  </form>

    </div>
  </div>
</div>

@endsection
@section('script')
<style type="text/css">
th{text-align:center;background-color:#2a3f54;color:#fff}.batas{background-color:#2a3f54}.jwbdisc{text-align:center;font-weight:bold}
</style>
<script type="text/javascript">


jQuery( document ).ready(function( $ ) {

// RENDER STATUS CORE MASK
	
	RenderData();

	function RenderData(){
		$.post('{{ Route('RenderData') }}', {
	        _token: "{{ csrf_token() }}", 
	        id_user: {{ $id }},
	        beforeSend: function() { },

	    }).done(function(data, response) { 
				$( "#RenderTabel" ).html(data.TabelJawaban);
				$( "#StatusCoreMask" ).html(data.StatusCoreMask);
				$( "#RenderTabelNilaiDisc" ).html(data.TabelNilaiAkhir);
				$( "#DataDiri" ).html(data.DataDiri);
				$( "#StatusCoreMask" ).html(data.StatusCoreMask);
		 })
	}

//TAMPIL MODAL BUAT HASIL AKHIR
	$("#WatakKepribadian").click(function(){$.post('{{ Route('WatakKepribadian') }}',{_token:"{{ csrf_token() }}",id_user:{{$id}},beforeSend:function(){},}).done(function(data,response){$("#RenderWatak").html(data.MaskCore);$("#ModalWatak").modal('show');})});


//SUBMIT CORE MASK
 $(document).on('submit', '#PostCoreMask', function (e) {
 var result = confirm("Yakin untuk mengakhiri tes ini ?");
	 if (result) {
	 	e.preventDefault();
	 	var route = $('#PostCoreMask').data('route');
	 	var form_data = $(this);
	 	$.ajaxSetup({
	 		headers: {
	 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	 		}
	 	});
		 	$.ajax({
		 		type: 'POST',
		 		url: route,
		 		data: form_data.serialize(),
		 		beforeSend: function () {
		 			$('#ButtonCoreMask').prop('disabled', true)
		 		},
		 		success: function (data) {
		 			switch (data.CekHasil) {
		 			case '001':
		 				alert('Berhasil Memproses Data');
		 				$('#ModalWatak').modal('hide');
		 				$('#ButtonCoreMask').prop('disabled', false);
		 				RenderData();
		 				break;
		 			case '002':
		 				alert('Gagal Memproses Data');
		 				break;
		 			default:
		 				break;
		 			}
		 		},
		 		complete: function () {},
		 		error: function (xhr) {
		 			alert('Terjadi Kesalahan Yang Tidak Diketahui')
		 		}
		 	});
		 } else {
		 	return false;
		 }
	});
 


	//Print PDF Jawaban Disc
	//MAINTENANCE
		$("#PrintPDF").click(function(){$.post('{{ Route('PrintPDFJawabanDisc') }}',{_token:"{{ csrf_token() }}",id_user:{{$id}},beforeSend:function(){},}).done(function(data,response){alert(data.maintenance)})});
 });


</script>
@include('sweet::alert')
@endsection

