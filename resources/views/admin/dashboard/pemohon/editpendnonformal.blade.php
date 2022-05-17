@extends('admin.layout.master')
@section('content')

<div class="content-header">
 
</div>

<section class="content">
  <div class="container-fluid">
    
    <!-- Timelime example  -->
    <div class="row">
      <div class="col-md-10 mx-auto">
        <!--------------------------Pendidikan Non Formal--------------------------->
        <h3><center><u>PENDIDIKAN NON FORMAL</u></center><button class="tambah_nf btn btn-outline-success btn-xs btn-flat"><span class="fa fa-plus-circle"></span> Tambah Pendidikan Non Formal Lainnya</button></h3>
                
        @foreach ($nonformal as $key => $nftampil)
        
        <div class="timeline">
            <!-- /.timeline-label -->
            <!-- timeline item -->
             <div>
              <i class="fas fa-university bg-blue"></i>
              <div class="timeline-item">
                <span class="time bg-gray"><i class="fas fa-clock"></i>  Mulai : <span class="badge badge-success">{{ $nftampil->nf_mulai }}</span>  Selesai : <span class="badge badge-danger">{{ $nftampil->nf_selesai }}</span></span>
                <h3 class="timeline-header bg-info">Pendidikan Non Formal</h3>

                <div class="timeline-body">
                  <table class="table table-bordered">
                    <thead class="bg-light">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pendidikan Non Formal</th>
                        <th scope="col">Nama Penyelenggara</th>
                        <th scope="col">Kota Dilaksanakan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $nftampil->jenis_pelatihan }}</td>
                        <td> {{ $nftampil->nama_penyelenggara }}</td>
                        <td>{{ $nftampil->kota }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="timeline-footer">
                  
                    <button class="btnnonformal btn btn-primary btn-xs btn-flat"
                    data-id="{{ $nftampil->id_pen_nonformal }}"
                    data-nfnama="{{ $nftampil->jenis_pelatihan }}"
                    data-nfpenyelenggara="{{ $nftampil->nama_penyelenggara }}"
                    data-nfkota="{{ $nftampil->kota }}"
                    data-nfmulai="{{ $nftampil->nf_mulai }}"
                    data-nfselesai="{{ $nftampil->nf_selesai }}"
                    ><span class="fa fa-edit"></span> Ubah</button>
                  
                 
                  @if($key > 0)
                   <button class="hapus_pt btn btn-outline-danger btn-xs btn-flat"
                    id="btnhapuspt"
                    data-id="{{ $nftampil->id_pen_nonformal }}"
                    data-nfnama="{{ $nftampil->jenis_pelatihan }}"
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
  <!-- /.timeline -->

</section>
<!-- /.content -->

<!-------------------------------Tambah Pendidikan Nonformal------------------------------>
<div id="nonformaltambah" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h2 class="modal-title">Tambah Pendidikan NON FORMAL Lainnya</h2>

        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('postDatapendidikannf') }}" data-routeback="{{ route('pemohonindex') }}" 
        id="myFormpendnonformaltambahan" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <input type="hidden" id="" name="settambahnf" value="1">
        <div class="modal-body mx-auto">
          <div class="card-body row" style="padding: 5px;">
          <!-------------------------------Sekolah Menengah Pertama------------------------------>
          
           <p style="margin-bottom: 1px;"><span class="badge badge-info">Pendidikan Non Formal :</span></p>
            <div class="shadow p-1 mb-1 bg-light rounded row mx-auto" style="width: 100%">
                <div class="col-md-6">
                  <div class="form-group" >
                    <label for="Jenis Pelatihan">Jenis/Nama Pelatihan :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-award"></i></span>
                      </div>
                      <textarea class="form-control" name="jenis_pelatihan" id="tambahpendnf" pattern="[a-z A-Z 0-9]{1,200}" placeholder="Masukan Nama Pelatihan" required=""></textarea>
                    </div>
                      <font color="red" size="2">*wajib diisi</font><br>
                      <font color="red" size="2">*masukan berupa huruf dan angka</font>
                      <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group" >
                    <label for="Nama Penyelenggara">Nama Penyelenggara :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-building"></i></span>
                      </div>
                      <textarea class="form-control" name="nama_penyelenggara"   placeholder="Masukan Nama Penyelenggara" required=""></textarea>
                    </div>
                      <font color="red" size="2">*wajib diisi</font>
                      <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="Kota">Kota :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-city"></i></span>
                      </div>
                      <textarea class="form-control" name="kota" placeholder="masukan kota penyelenggara" required=""></textarea>
                    </div>
                      <font color="red" size="2">*wajib diisi</font>
                      <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="Mulai Pelatihan">Mulai Pelatihan :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                      </div>
                      <input type="date" name="nf_mulai" class="form-control" required="">
                    </div>
                      <font color="red" size="2">*wajib diisi</font>
                      <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="Selesai Pelatihan">Selesai Pelatihan :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                      </div>
                      <input type="date" name="nf_selesai" class="form-control" required="">
                    </div>
                      <font color="red" size="2">*wajib diisi</font>
                      <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Pendidikan Non Formal</button>
        </div>
      </form>
      
    </div>
  </div>
</div>
<!-------------------------------Edit Pendidikan Nonformal------------------------------>
<div id="nonformal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h2 class="modal-title">Edit Pendidikan NON FORMAL</h2>

        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('updatePendnonformal') }}" data-routeback="{{ route('pemohonindex') }}" 
        id="myFormpendnonformal" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <input type="hidden" id="id_nf" name="nf_id">
        <div class="modal-body mx-auto">
          <div class="card-body row" style="padding: 5px;">
          <!-------------------------------Sekolah Menengah Pertama------------------------------>
          
           <p style="margin-bottom: 1px;"><span class="badge badge-info">Pendidikan Non Formal :</span></p>
            <div class="shadow p-1 mb-1 bg-light rounded row mx-auto" style="width: 100%">
                <div class="col-md-6">
                  <div class="form-group" >
                    <label for="Jenis Pelatihan">Jenis/Nama Pelatihan :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-award"></i></span>
                      </div>
                      <textarea class="form-control" name="jenis_pelatihan" pattern="[a-z A-Z 0-9]{1,200}"  id="nf_nama" placeholder="Masukan Nama Pelatihan" required=""></textarea>
                    </div>
                      <font color="red" size="2">*wajib diisi</font><br>
                      <font color="red" size="2">*masukan berupa huruf dan angka</font>
                      <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group" >
                    <label for="Nama Penyelenggara">Nama Penyelenggara :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-building"></i></span>
                      </div>
                      <textarea class="form-control" name="nama_penyelenggara" id="nf_nama_pen" placeholder="Masukan Nama Penyelenggara" required=""></textarea>
                    </div>
                      <font color="red" size="2">*wajib diisi</font><br>
                      <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="Kota">Kota :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-city"></i></span>
                      </div>
                      <textarea class="form-control" name="kota" id="kota" placeholder="masukan kota penyelenggara" required=""></textarea>
                    </div>
                      <font color="red" size="2">*wajib diisi</font><br>
                      <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="Mulai Pelatihan">Mulai Pelatihan :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                      </div>
                      <input type="date" name="nf_mulai" id="nf_mulai" class="form-control" required="">
                    </div>
                      <font color="red" size="2">*wajib diisi</font><br>
                      <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="Selesai Pelatihan">Selesai Pelatihan :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                      </div>
                      <input type="date" name="nf_selesai"id="nf_selesai" class="form-control" required="">
                    </div>
                      <font color="red" size="2">*wajib diisi</font><br>
                      <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update Data Pendidikan Non Formal</button>
        </div>
      </form>
      
    </div>
  </div>
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
  left: -10px
}
</style>
@endsection
@section('script')

<script type="text/javascript">
  $(document).on('click', '.hapus_pt', function(){

    var id_nfhapus = $(this).attr('data-id');
    var nfnama = $(this).attr('data-nfnama');
    var route = $('#btnhapuspt').data('route');
       Swal.fire({
          title: 'Apakah Anda Yakin ?',
          text: 'Untuk Menghapus "'+nfnama+'"',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya, Saya Yakin!',
          cancelButtonText: 'Ngak Jadi Deh'
        }).then((result) => {
          if (result.value) {
            $.ajax({
                
                url:  "../../hapus/nf/"+id_nfhapus,

                beforeSend:function(){
                  
                 },
                success:function(data)
                 {
                   Swal.fire({
                      title: 'Berhasil !',
                      text: 'Data '+nfnama+' Berhasil Dihapus',
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

<!--Tambah pendidikan non formal-->
<script>

    var id_nf;

     $(document).on('click', '.tambah_nf', function(){
      $('#nonformaltambah').modal('show');
     });

    $(document).on('submit', '#myFormpendnonformaltambahan', function(e) {  
      e.preventDefault();
      var route = $('#myFormpendnonformaltambahan').data('route');
      var routeback = $('#myFormpendnonformaltambahan').data('routeback');
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
                                ' <b>Sedang Menambah Data...</div>');
          },
          success: function(Response){
            console.log(Response);
            //setTimeout($.unblockUI, 1000); 
            
            Swal.fire({
                  title: 'Berhasil !',
                  text: "Data Berhasil Disimpan",
                  type: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Oke'
                }).then((result) => {
                  if (result.value) {
                    $('.overlay').remove();
                    $('#nonformaltambah').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                  }
                })
            $('.overlay').remove();
            $('#nonformaltambah').modal('hide');
            setTimeout(location.reload.bind(location), 2000);
         
          },
          complete: function() {
                setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                    $('.overlay').remove();
                },

      })
    });
  
</script>


<!--edit pendidikan non formal-->
<script>

    var id_nf;

     $(document).on('click', '.btnnonformal', function(){
      id_nf = $(this).attr('data-id');
      nama_nf = $(this).attr('data-nfnama');
      pen_nf = $(this).attr('data-nfpenyelenggara');
      kota_nf = $(this).attr('data-nfkota');
      mulai_nf = $(this).attr('data-nfmulai');
      selesai_nf = $(this).attr('data-nfselesai');
      $("#id_nf").val(id_nf);
      $("#nf_nama").val(nama_nf);
      $("#nf_nama_pen").val(pen_nf);
      $("#kota").val(kota_nf);
      $("#nf_mulai").val(mulai_nf);
      $("#nf_selesai").val(selesai_nf);
      $('#nonformal').modal('show');
     });

    //edit data pendidikan
    $(document).on('submit', '#myFormpendnonformal', function(e) {  
      e.preventDefault();
      var route = $('#myFormpendnonformal').data('route');
      var routeback = $('#myFormpendnonformal').data('routeback');
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
                                ' <b>Sedang Mengupdate Data...</div>');
          },
          success: function(Response){
            console.log(Response);
            //setTimeout($.unblockUI, 1000); 
            
            Swal.fire({
                  title: 'Berhasil !',
                  text: "Data Berhasil Disimpan",
                  type: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Oke'
                }).then((result) => {
                  if (result.value) {
                    $('.overlay').remove();
                    $('#nonformal').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                  }
                })
            $('.overlay').remove();
            $('#nonformal').modal('hide');
            setTimeout(location.reload.bind(location), 2000);
         
          },
          complete: function() {
                setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                    $('.overlay').remove();
                },

      })
    });
    

   $('#tambahpendnf').keyup(validateTextarea);

    function validateTextarea() {
            var errorMsg = "Please match the format requested.";
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

    $('#nf_nama').keyup(validateTextarea);

    function validateTextarea() {
            var errorMsg = "Please match the format requested.";
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