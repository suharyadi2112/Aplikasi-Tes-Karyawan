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
        <h3><center><u>Pencapaian</u></center><button class="tambahpenc btn btn-outline-success btn-xs btn flat"><span class="fa fa-plus-circle"></span> Tambah Pencapaian Lainnya</button></h3>
                
        @foreach ($datapenc as $key => $tampildatapenc)
        
        <div class="timeline">
           
            <!-- /.timeline-label -->
            <!-- timeline item -->
             <div>
              <i class="fas fa-university bg-blue"></i>
              <div class="timeline-item">
                <span class="time bg-gray"><i class="fas fa-clock"></i> Tahun Penghargaan : <span class="badge badge-success">{{ $tampildatapenc->tahun_penghargaan }}</span></span>
                <h3 class="timeline-header bg-info">Pencapaian</h3>

                  <table class="table table-bordered">
                    <thead class="bg-light">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama/Bidang Penghargaan</th>
                        <th scope="col">Bentuk Penghargaan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        @if(($tampildatapenc->bidang_penghargaan == null) || (empty($tampildatapenc->bidang_penghargaan)))
                        <td colspan="10"><center> Tidak Memiliki Pencapaian Apapun </center></td>
                        @else
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $tampildatapenc->bidang_penghargaan }}</td>
                        <td> {{ $tampildatapenc->bentuk_penghargaan }}</td>
                        @endif
                      </tr>
                    </tbody>
                  </table>
                <div class="timeline-footer">
                  
                    <button class="btnpenc btn btn-primary btn-xs btn-flat"
                    data_id="{{ $tampildatapenc->id_pencapaian }}"
                    data_pencbidang="{{ $tampildatapenc->bidang_penghargaan }}"
                    data_pencbentuk="{{ $tampildatapenc->bentuk_penghargaan }}"
                    data_penctahun="{{ $tampildatapenc->tahun_penghargaan }}"
                    ><span class="fa fa-edit"></span> Ubah</button>
                  
                 
                  @if($key > 0)
                   <button class="hapuspenc btn btn-outline-danger btn-xs btn-flat"
                    id="btnhapuspt"
                    data-id="{{ $tampildatapenc->id_pencapaian }}"
                    data-pencnama="{{ $tampildatapenc->bidang_penghargaan }}"
                    ><span class="fa fa-trash"></span> Hapus</button>
                  @else
                  @endif
                </div>
              </div>
            </div>
          <!-- END timeline item -->
          <div>
            <i class="fas fa-clock bg-gray"></i>
          </div>
          </div>
          @endforeach
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
<div id="modalpencapaian" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h2 class="modal-title">Edit Data Pencapaian (Achievement)</h2>

        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('updatepencapaian') }}" data-routeback="{{ route('pemohonindex') }}" id="myFormpencapaianedit" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
     
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 1px;">
              <div style="margin-bottom: 1px;"><span class="badge badge-primary">Achievement :</span></div>
               <div class="shadow p-1 mb-1 bg-light rounded mx-auto row" style="width: 100%"> 
                <input type="hidden" name="typepencapaian" id="id">
                  <div class="col-md-4">
                      <div class="form-group">
                        <label>Bidang/Nama Pencapaian :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-medal"></i></span>
                          </div>
                          <textarea  class="form-control" name="bidang_penghargaan" id="bidang" pattern="[a-z A-Z 0-9]{1,100}" placeholder="Masukan Bidang Pencapaian" required=""></textarea>
                        </div>
                        <font size="2" color="red">*bidang pencapaian wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Bentuk Penghargaan :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-trophy"></i></span>
                          </div>
                          <textarea  class="form-control" name="bentuk_penghargaan" id="bentuk" placeholder="Masukan Bentuk Penghargaan Yang Diterima" required=""></textarea>
                        </div>
                        <font size="2" color="red">*bentuk penghargaan wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tahun Penghargaan :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                          </div>
                          <input  class="form-control" type="date" name="tahun_penghargaan" id="tahun" placeholder="Masukan Tahun Penerimaan Penghargaan" required="">
                        </div>
                        <font size="2" color="red">*tahun penghargaan wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                </div>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ubah Data Pencapaian</button>
      </div>
      </form>
      
    </div>
  </div>
</div>


<!--------------------------------TAMBAH PENNCAPAIAN------------------------------------->
<div id="modalpencapaiantambah" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h2 class="modal-title">Tambah Data Pencapaian (Achievement)</h2>

        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('tambahanpenc') }}" data-routeback="{{ route('pemohonindex') }}" id="myFormpencapaiantambah" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
     
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 1px;">
              <div style="margin-bottom: 1px;"><span class="badge badge-primary">Achievement :</span></div>
               <div class="shadow p-1 mb-1 bg-light rounded mx-auto row" style="width: 100%"> 
                <input type="hidden" name="typepenc" value="1">
                  <div class="col-md-4">
                      <div class="form-group">
                        <label>Bidang/Nama Pencapaian :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-medal"></i></span>
                          </div>
                          <textarea  class="form-control" name="bidang_penghargaan" id="bidang123" pattern="[a-z A-Z 0-9]{1,100}"  placeholder="Masukan Bidang Pencapaian" required=""></textarea>
                        </div>
                        <font size="2" color="red">*bidang pencapaian wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Bentuk Penghargaan :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-trophy"></i></span>
                          </div>
                          <textarea  class="form-control" name="bentuk_penghargaan" placeholder="Masukan Bentuk Penghargaan Yang Diterima" required=""></textarea>
                        </div>
                        <font size="2" color="red">*bentuk penghargaan wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tahun Penghargaan :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                          </div>
                          <input  class="form-control" type="date" name="tahun_penghargaan" placeholder="Masukan Tahun Penerimaan Penghargaan" required="">
                        </div>
                        <font size="2" color="red">*tahun penghargaan wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                </div>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data Pencapaian</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<!-- /.content -->
@endsection
@section('script')

<!--------------Hapus ----------------->
<script type="text/javascript">
  $(document).on('click', '.hapuspenc', function(){

    var id_penc = $(this).attr('data-id');
    var nm_penc = $(this).attr('data-pencnama');
       Swal.fire({
          title: 'Apakah Anda Yakin ?',
          text: 'Untuk Menghapus "'+nm_penc+'"',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya, Saya Yakin!',
          cancelButtonText: 'Ngak Jadi Deh'
        }).then((result) => {
          if (result.value) {
            $.ajax({
                
                url:  "../../hapus/penc/"+id_penc,

                beforeSend:function(){
                     $.blockUI({ css: { 
                        border: 'none', 
                        padding: '5px', 
                        backgroundColor: '#000', 
                        '-webkit-border-radius': '5px', 
                        '-moz-border-radius': '5px', 
                        opacity: .5, 
                        color: '#fff' 
                    } }); 
                 },
                success:function(Response)
                 {
                   Swal.fire({
                      title: 'Berhasil !',
                      text: 'Data '+nm_penc+' Berhasil Dihapus',
                      type: 'success'
                    })
                  setTimeout(location.reload.bind(location), 2000);
                 },
                error: function(xhr) { // if error occured
                      swal.fire("Upsss!", "Terjadi Kesalahan!", "error");
                  },
              })  
          }else{
            Swal.fire(
              'success!',
              'Proses dibatalkan.',
              'success'
            )
          }
        })
      });
</script>
<!--------------Tambah ----------------->
<script>

    $(document).on('click', '.tambahpenc', function(){
    
      $('#modalpencapaiantambah').modal('show');

     });

    $(document).on('submit', '#myFormpencapaiantambah', function(e) {  
      e.preventDefault();
      var route = $('#myFormpencapaiantambah').data('route');
      var form_data = $(this);
      var wrapper = $(".overlaymodal");
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
        $.ajax({

          type: 'POST',
          url: route,
          data: form_data.serialize(),

          beforeSend: function(){

            $(wrapper).append(  '<div class="overlay d-flex justify-content-center align-items-center" id="cekoverlay">'+ 
                                  '<i class="fas fa-2x fa-sync fa-spin"></i>'+
                                ' <b>Sedang memprosess Data...</div>');
          },
          success: function(Response){
            console.log(Response)
             Swal.fire({
                    title: 'Berhasil !',
                    text: "Data Berhasil Disimpan",
                    type: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Oke'
                  }).then((result) => {
                    if (result.value) {
                      $('.overlay').remove();
                      $('#modalpencapaiantambah').modal('hide');
                      setTimeout(location.reload.bind(location), 2000);
                    }
                    $('#modalpencapaiantambah').modal('hide');
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
                    $('#modalpencapaiantambah').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Memproses Data", "error");
                    $('.overlay').remove();
                },

      })
    });
  
</script>

<!--------------Edit  ----------------->
<script>

    $(document).on('click', '.btnpenc', function(){
    
      id = $(this).attr('data_id');
      bidang = $(this).attr('data_pencbidang');
      bentuk = $(this).attr('data_pencbentuk');
      tahun = $(this).attr('data_penctahun');
      $("#id").val(id);
      $("#bidang").val(bidang);
      $("#bentuk").val(bentuk);
      $("#tahun").val(tahun);
      $('#modalpencapaian').modal('show');

     });

    //edit data pendidikan
    $(document).on('submit', '#myFormpencapaianedit', function(e) {  
      e.preventDefault();
      var route = $('#myFormpencapaianedit').data('route');
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
           Swal.fire({
                  title: 'Berhasil !',
                  text: "Data Berhasil Diubah",
                  type: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Oke'
                }).then((result) => {
                  if (result.value) {
                    $('.overlay').remove();
                    $('#modalpencapaian').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                  }
                  $('#modalpencapaian').modal('hide');
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
                    $('#modalpencapaian').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                    $('.overlay').remove();
                },

      })
    });

    $('#bidang').keyup(bidang);

    function bidang() {
            var errorMsg = "Masukan hanya berupa huruf dan angka.";
            var textarea = this;
            var pattern = new RegExp('^' + $(textarea).attr('pattern') + '$');
            // check each line of text
            $.each($(this).val().split("\n"), function () {
                // check if the line matches the pattern
                var hasError = !this.match(pattern);
                if (typeof textarea.setCustomValidity === 'function') {
                    textarea.setCustomValidity(hasError ? errorMsg : '');
                } else {
                    // Not supported by the browser, fallback to manual error display...
                    $(textarea).toggleClass('error', !!hasError);
                    $(textarea).toggleClass('ok', !hasError);
                    if (hasError) {
                        $(textarea).attr('title', errorMsg);
                    } else {
                        $(textarea).removeAttr('title');
                    }
                }
                return !hasError;
            });
        }

    $('#bidang123').keyup(bidang123);

    function bidang123() {
            var errorMsg = "Masukan hanya berupa huruf dan angka.";
            var textarea = this;
            var pattern = new RegExp('^' + $(textarea).attr('pattern') + '$');
            // check each line of text
            $.each($(this).val().split("\n"), function () {
                // check if the line matches the pattern
                var hasError = !this.match(pattern);
                if (typeof textarea.setCustomValidity === 'function') {
                    textarea.setCustomValidity(hasError ? errorMsg : '');
                } else {
                    // Not supported by the browser, fallback to manual error display...
                    $(textarea).toggleClass('error', !!hasError);
                    $(textarea).toggleClass('ok', !hasError);
                    if (hasError) {
                        $(textarea).attr('title', errorMsg);
                    } else {
                        $(textarea).removeAttr('title');
                    }
                }
                return !hasError;
            });
        }
  
</script>



<style type="text/css">
hr.new4 {
  border: 2px solid #5293d5;
  border-radius: 5px;
}

</style>

@include('sweet::alert')
@endsection