@extends('admin.layout.master')
@section('content')
<div class="content-header">
 
</div>
<section class="content">
  <!-- /.timeline -->
  <div class="container-fluid">
    
    <!-- Timelime example  -->
    <div class="row">
      <div class="col-md-10 mx-auto">
        <!--------------------------Pendidikan Non Formal--------------------------->
        <h3><center><u>Pekerjaan Yang Dilamar</u></center></h3>
                 
        
        <div class="timeline">
           
            <!-- /.timeline-label -->
            <!-- timeline item -->
             <div>
              <i class="fas fa-university bg-blue"></i>
              <div class="timeline-item">
                <h3 class="timeline-header bg-info">Pendidikan Non Formal </h3>

                  <table class="table table-bordered">
                    <thead class="bg-light">
                      <tr>
                        <th scope="col">Posisi</th>
                        <th scope="col">Alasan Melamar</th>
                        <th scope="col">Garis Besar Pekerjaan</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        @if(($posisi == null) || (empty($posisi)))
                        <td colspan="10"><center> Tidak Memiliki Data Apapun </center></td>
                        @else
                        <td>{{ $posisi }}</td>
                        <td>{{ $alasan_melamar }}</td>
                        <td>{{ $tanggung_jawab }}</td>
                        <td>
                         <button class="btnpydl btn btn-primary btn-xs btn-flat"
                          data_id="{{ $id_pekerjaanyangdilamar }}"
                          data_posisi="{{ $posisi }}"
                          data_tingkat="{{ $tingkat }}"
                          data_penghasilan="{{ $penghasilan }}"
                          data_alasan_melamar="{{ $alasan_melamar }}"
                          data_tanggung_jawab="{{ $tanggung_jawab }}">
                          <span class="fa fa-edit"></span></button>
                        </td>
                        @endif
                      </tr>
                    </tbody>
                  </table>
                <div class="timeline-footer right">
                    <span class="badge badge-success">Tingkat : {{ $tingkat }}</span>
                    <span class="badge badge-info">Penghasilan Yang Diminta : {{ number_format($penghasilan) }}</span>
                </div>
              </div>
            </div>
          <!-- END timeline item -->
          <div>
            <i class="fas fa-clock bg-gray"></i>
          </div>
          </div>
        </div>
      </div>
      <!-- /.col -->
    </div>

<div id="mybutton">
  <a class="nav-link" href="{{{ route('pemohonindex') }}}" title="Cancel" >
  <span class="btn btn-danger btn-flat"><i class="fa fa-arrow-circle-left">  </i> Kembali</span>
</a>
</div>
<style type="text/css">

#mybutton {
  position: fixed;
  bottom: 70px;
}
</style>

</section>

<!--------------------------------EDIT PENNCAPAIAN------------------------------------->

<div id="modalpydl" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h2 class="modal-title">Edit Data Pekerjaan Yang Dilamar</h2>

        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('updatepydl') }}" data-routeback="{{ route('pemohonindex') }}" id="formpydl" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 1px;">
            <div style="margin-bottom: 1px;"><span class="badge badge-primary">Pekerjaan Yang Dilamar :</span></div>
               <div class="shadow p-1 mb-1 bg-light rounded mx-auto row" style="width: 100%"> 
                <input type="hidden" name="typepydl" id="id">

                  <div class="col-md-4">
                      <div class="form-group">
                        <label>Tingkat/Jenjang :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-school"></i></span>
                          </div>
                          <select class="form-control" name="tingkat" id="tingkat" required>
                              
                              <option value="">-- Silahkan Pilih --</option>
                              <option value="KB-TK">KB-TK</option>
                              <option value="SD">SD</option>
                              <option value="SMP">SMP</option>
                              <option value="SMA">SMA</option>
                              <option value="SMK">SMK</option>
                              <option value="UNIVERSITAS">UNIVERSITAS</option>
                              <option value="LPP">LPP</option>
                              <option value="YAYASAN">YAYASAN</option>

                          </select>
                          
                        </div>
                        <font size="2" color="red">*Tingkat/Jenjang wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Posisi/Jabatan :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user-tie"></i></span>
                          </div>
                          <input type="text" class="form-control" name="posisi" id="posisi" placeholder="masukan Posisi Yang Dilamar" required=""/>
                        </div>
                        <font size="2" color="red">*posisi yang dilamar wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                    

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Penghasilan Yang Diminta Saat Ini :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-hand-holding-usd"></i></span>
                          </div>
                          <input type="number" class="form-control" name="penghasilan" id="penghasilan" placeholder="masukan penghasilan yang diminta" required="" />
                        </div>
                        <font size="2" color="red">*penghasilan yang diminta wajib diisi</font><br>
                        <font size="2" color="red">*isian berupa angka tanpa titik(.)</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Alasan Melamar Posisi Tersebut :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user-tie"></i></span>
                          </div>
                          <textarea class="form-control" name="alasan_melamar" id="alasan" placeholder="masukan alasan melamar diposisi ini" required></textarea>
                        </div>
                        <font size="2" color="red">*alasan wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Garis Besar/Tanggung Jawab Posisi Yang Dilamar:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user-md"></i></span>
                          </div>
                          <textarea class="form-control" name="tanggung_jawab" id="tanggungjawab" placeholder="masukan secara garis beras saja" required></textarea>
                        </div>
                        <font size="2" color="red">*garis besar/tanggung jawab wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>

              </div>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ubah Data Pekerjaan Yang Dilamar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

  
<!-- /.content -->
@endsection
@section('script')

<!--------------Edit  ----------------->
<script>

    $(document).on('click', '.btnpydl', function(){
    
      id = $(this).attr('data_id');
      posisi = $(this).attr('data_posisi');
      tingkat = $(this).attr('data_tingkat');
      penghasilan = $(this).attr('data_penghasilan');
      alasan = $(this).attr('data_alasan_melamar');
      tanggungjawab = $(this).attr('data_tanggung_jawab');
      $("#id").val(id);
      $("#posisi").val(posisi);
      $("#penghasilan").val(penghasilan);
      $("#alasan").val(alasan);
      $("#tanggungjawab").val(tanggungjawab);
      $('#tingkat option[value="' + tingkat + '"]').attr('selected','selected');
      $('#modalpydl').modal('show');

     });

    //edit data pendidikan
    $(document).on('submit', '#formpydl', function(e) {  
      e.preventDefault();
      var route = $('#formpydl').data('route');
      var form_data = $(this);
      var wrapper = $(".overlaymodal");
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
        $.ajax({

          type: 'PUT',
          url: route,
          data: form_data.serialize(),

          beforeSend: function(){

            $(wrapper).append(  '<div class="overlay d-flex justify-content-center align-items-center" id="cekoverlay">'+ 
                                  '<i class="fas fa-2x fa-sync fa-spin"></i>'+
                                ' <b>Sedang Memproses Data...</div>');
          },
          success: function(Response){
            console.log(Response)
           Swal.fire({
                  title: 'Berhasil !',
                  text: "Data Berhasil Diubah",
                  type: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Oke'
                }).then((result) => {
                  if (result.value) {
                    $('.overlay').remove();
                    $('#modalpydl').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                  }
                  $('#modalpydl').modal('hide');
                  $.blockUI({ css: { 
                      border: 'none', 
                      padding: '5px', 
                      backgroundColor: '#000', 
                      '-webkit-border-radius': '5px', 
                      '-moz-border-radius': '5px', 
                      opacity: .5, 
                      color: '#fff' 
                  } }); 
                })
          $('.overlay').remove();

          },
          complete: function() {
                    $.unblockUI();
                    $('#modalpydl').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                    $('.overlay').remove();
                },

      })
    });
  
</script>
<!---------------------------------------PENGALAMAN KERJA BIDANG PENDIDIKAN--------------------------------->

<style type="text/css">
hr.new4 {
  border: 2px solid #5293d5;
  border-radius: 5px;
}

</style>

@include('sweet::alert')
@endsection
