@extends('admin.layout.master')
@section('content')

<section class="content">
  <!-- /.timeline -->
  <div class="card-body">
      <div class="row"> 
        <div class="col-5 col-sm-2" id="myTab">
          <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="tab" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Bahasa</a>
            <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="tab" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Keahlian</a>
          </div>
        </div>
        <div class="col-7 col-sm-10">
          <div class="tab-content" id="vert-tabs-tabContent">
            <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
              
              <div class="ex1">
                 <!--------------------------Pengalaman Kerja Bidang Pendidikan--------------------------->
                <h3><button class="tambahbahasa btn btn-outline-success btn-xs btn flat"><span class="fa fa-plus-circle"></span> Tambah Bahasa Lainnya</button></h3>
                <div class="timeline">
                    <!-- /.timeline-label -->
                    <!-- timeline item --> 
                     <div>
                      <div class="timeline-item">
                        <h3 class="timeline-header bg-info">Bahasa</h3>

                          <table class="table table-bordered">
                            <thead class="bg-light">
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Bahasa</th>
                                <th scope="col">Lisan</th>
                                <th scope="col">Tulisan</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              
                                @foreach ($bahasa as $key => $bahasatampil)
                                <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td> {{ $bahasatampil->jenis_bahasa }} </td>
                                <td> {{ $bahasatampil->lisan_bahasa }} </td>
                                <td> {{ $bahasatampil->tulisan_bahasa }} </td>
                                <td style="width: 80px;">
                                    
                                    <button class="bahasaedit btn btn-primary btn-xs"
                                    data_id="{{ $bahasatampil->id_berbahasaasing }}"
                                    data_jenis="{{ $bahasatampil->jenis_bahasa }}"
                                    data_lisan="{{ $bahasatampil->lisan_bahasa }}"
                                    data_tulisan="{{ $bahasatampil->tulisan_bahasa }}"
                                    ><span class="fa fa-edit"></span></button>
                            
                                 
                                  @if($key > 1)
                                   <button class="hapusbahasa btn btn-outline-danger btn-xs"
                                    data-id="{{ $bahasatampil->id_berbahasaasing }}"
                                    data-jenis="{{ $bahasatampil->jenis_bahasa }}"
                                    ><span class="fa fa-trash"></span></button>
                                  @else
                                  @endif

                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                      </div>
                    </div>
                  <!-- END timeline item -->
                  <div>
                    <i class="fas fa-clock bg-gray"></i>
                  </div>
                  </div>
              <!-- /.col -->
              </div>
            </div>

            <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
              <div class="ex1">
                 <!--------------------------Pengalaman Kerja Bidang Non Pendidikan--------------------------->
               <div class="timeline">
                  <div>
                    <i class="fas fa-skating bg-info"></i>
                  </div>
                     <div>
                      <div class="timeline-item">
                       
                        <h3 class="timeline-header bg-info"><b>Keahlian</b> Lainnya</h3>

                        <div class="col-md-12">
                        <div class="card-body">
                        <form data-route="{{ route('updatekeahlian', ['id' => $id_user]) }}" data-routeback="{{ route('pemohonindex') }}" id="formkahlian" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
                          {{ csrf_field() }}
                          <table border="0"  class="table table-striped">
                            <thead class="bg-info">
                              
                            </thead>
                            <tbody>
                              <td>
                                 <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="keahlian1" name="alatmusik" value="Memainkan Alat Musik,"

                                     <?php $mam = strpos($jenis_keahlian,'Memainkan Alat Musik'); ?>

                                      @if($mam === false)
                                        
                                      @else
                                       checked="checked"
                                      @endif

                                    >
                                    <label for="keahlian1">
                                       Memainkan Alat Musik
                                    </label>
                                  </div>
                              </td>

                              <td>
                                 <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="keahlian2" name="bernyanyi" value="Bernyanyi,"

                                    <?php $y = strpos($jenis_keahlian,'Bernyanyi'); ?>

                                      @if($y === false)
                                        
                                      @else
                                       checked="checked"
                                      @endif

                                    >
                                    <label for="keahlian2">
                                       Bernyanyi
                                    </label>
                                  </div>
                              </td>

                              <td>
                                 <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="keahlian3" name="menari" value="Menari,"

                                    <?php $m = strpos($jenis_keahlian,'Menari'); ?>

                                      @if($m === false)
                                        
                                      @else
                                       checked="checked"
                                      @endif

                                    >
                                    <label for="keahlian3">
                                       Menari
                                    </label>
                                  </div>
                              </td>

                              <td>
                                 <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="keahlian4" name="menjahit" value="Menjahit,"

                                     <?php $menjahit = strpos($jenis_keahlian,'Menjahit'); ?>

                                      @if($menjahit === false)
                                        
                                      @else
                                       checked="checked"
                                      @endif

                                    >
                                    <label for="keahlian4">
                                       Menjahit
                                    </label>
                                  </div>
                              </td>

                              </tbody>
                              <td>
                                 <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="keahlian5" name="menyulam" value="Menyulam,"

                                    <?php $menyulam = strpos($jenis_keahlian,'Menyulam'); ?>

                                      @if($menyulam === false)
                                        
                                      @else
                                       checked="checked"
                                      @endif

                                    >
                                    <label for="keahlian5">
                                       Menyulam
                                    </label>
                                  </div>
                              </td>
                              <td>
                                 <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="keahlian6" name="memasak" value="Memasak,"

                                    <?php $memasak = strpos($jenis_keahlian,'Memasak'); ?>

                                      @if($memasak === false)
                                        
                                      @else
                                       checked="checked"
                                      @endif

                                    >
                                    <label for="keahlian6">
                                       Memasak
                                    </label>
                                  </div>
                              </td>

                              <td>
                                 <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="keahlian7" name="melukis" value="Melukis,"

                                    <?php $melukis = strpos($jenis_keahlian,'Melukis'); ?>

                                      @if($melukis === false)
                                        
                                      @else
                                       checked="checked"
                                      @endif

                                    >
                                    <label for="keahlian7">
                                       Melukis
                                    </label>
                                  </div>
                              </td>

                              <td>
                                 <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="keahlian8"

                                    @if($keahlian_lainnya)
                                      checked="checked"
                                    @else
                                     
                                    @endif        

                                    >
                                    <label for="keahlian8">
                                       Lainnya
                                    </label>
                                  </div>
                              </td>

                            </tbody>
                          </table>
                          <div class="form-group" id="keahlianshow" 
                          @if($keahlian_lainnya)
                            
                          @else
                           style="display: none" 
                          @endif>
                            <label>Keahlian Lainnya..</label>
                            <textarea class="form-control" id="keahlian_lainnya" name="keahlianlainnya" placeholder="masukan Keahlian Lainnya Disini" required=""

                            @if($keahlian_lainnya)
                            
                            @else
                             disabled="" 
                            @endif

                            >{{ $keahlian_lainnya }}</textarea>
                          </div>
                            
                          <button type="submit" class="btn btn-primary btn-xs btn-flat"><span class="fa fa-edit"></span> Ubah Data Keahlian</button>

                          </form>
                        </div>
                        </div>
                          
                      </div>

                    </div>
                  <!-- END timeline item -->
                  <div>
                    <i class="fas fa-clock bg-gray"></i>
                  </div>
                  </div>
              <!-- /.col -->
              </div>
            </div>
        </div>
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
}
</style>

</section>
<!-- /.content -->

<!---------------------------EDIT BAHASA---------------------------------->

<div id="modalbahasa" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h2 class="modal-title">Edit Data Bahasa Yang Dikuasai</h2>

        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('bahasaupdate') }}" data-routeback="{{ route('pemohonindex') }}" id="formmodalbahasa" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div> 
        <div class="modal-body mx-auto">
         <h5>Kemampuan Dalam Menggunakan Bahasa Asing :</h5>
          <div class="card-body" style="padding: 1px;">
            <div style="margin-bottom: 1px;"><span class="badge badge-primary">Kemampuan Berbahasa Asing :</span></div>
               <div class="shadow p-1 mb-1 bg-light rounded mx-auto row" style="width: 100%"> 
                <input type="hidden" name="idbahasa" id="id">

                  <div class="col-md-4">
                      <div class="form-group">
                        <label>Jenis Bahasa :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-globe-asia"></i></span>
                          </div>
                          <input type="text" class="form-control" name="jenis_bahasa" id="jenis" required>
                          
                        </div>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                   
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tingkat Lisan :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-level-up-alt"></i></span>
                          </div>
                          <select class="form-control" name="lisan_bahasa" id="lisan" required>
                            <option value="">--pilih tingkat kemampuan--</option>
                            <option value="BAIK">Baik</option>
                            <option value="CUKUP">Cukup</option>
                            <option value="KURANG">Kurang</option>
                            <option value="TIDAK TAHU">Tidak Tahu</option>
                          </select>
                        </div>
                        <font size="2" color="red">*Tingkat lisan wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                     <div class="col-md-4">
                      <div class="form-group">
                         <label>Tingkat Tulisan :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-level-up-alt"></i></span>
                          </div>
                          <select class="form-control" name="tulisan_bahasa" id="tulisan" required>
                            <option value="">--pilih tingkat kemampuan--</option>
                            <option value="BAIK">Baik</option>
                            <option value="CUKUP">Cukup</option>
                            <option value="KURANG">Kurang</option>
                            <option value="TIDAK TAHU">Tidak Tahu</option>
                          </select>
                        </div>
                        <font size="2" color="red">*Tingkat tulisan wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ubah Data Bahasa</button>
      </div>
      </form>
      
    </div>
  </div>
</div>


<!---------------------------TAMBAH BAHASA---------------------------------->

<div id="modalbahasatambah" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h2 class="modal-title">Tambah Data Bahasa Yang Dikuasai</h2>

        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('bahasatambah') }}" data-routeback="{{ route('pemohonindex') }}" id="formmodalbahasatambah" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div> 
        <div class="modal-body mx-auto">
         <h5>Kemampuan Dalam Menggunakan Bahasa Asing :</h5>
          <div class="card-body" style="padding: 1px;">
            <div style="margin-bottom: 1px;"><span class="badge badge-primary">Kemampuan Berbahasa Asing :</span></div>
               <div class="shadow p-1 mb-1 bg-light rounded mx-auto row" style="width: 100%"> 
                <input type="hidden" name="typetambahbahasa" value="1">

                  <div class="col-md-4">
                      <div class="form-group">
                        <label>Jenis Bahasa :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-globe-asia"></i></span>
                          </div>
                          <input type="text" class="form-control" name="jenis_bahasa" placeholder="Masukan Bahasa Yang Dikuasai" required>
                          
                        </div>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                   
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tingkat Lisan :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-level-up-alt"></i></span>
                          </div>
                          <select class="form-control" name="lisan_bahasa" required>
                            <option value="">--pilih tingkat kemampuan--</option>
                            <option value="BAIK">Baik</option>
                            <option value="CUKUP">Cukup</option>
                            <option value="KURANG">Kurang</option>
                            <option value="TIDAK TAHU">Tidak Tahu</option>
                          </select>
                        </div>
                        <font size="2" color="red">*Tingkat lisan wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                     <div class="col-md-4">
                      <div class="form-group">
                         <label>Tingkat Tulisan :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-level-up-alt"></i></span>
                          </div>
                          <select class="form-control" name="tulisan_bahasa" required>
                            <option value="">--pilih tingkat kemampuan--</option>
                            <option value="BAIK">Baik</option>
                            <option value="CUKUP">Cukup</option>
                            <option value="KURANG">Kurang</option>
                            <option value="TIDAK TAHU">Tidak Tahu</option>
                          </select>
                        </div>
                        <font size="2" color="red">*Tingkat Tulisan wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data Bahasa</button>
      </div>
      </form>
      
    </div>
  </div>
</div>



@endsection
@section('script')

<!---------------------------------------BAHASA--------------------------------->

<!--------------Edit Bahasa ----------------->
<script>

    $(document).on('click', '.bahasaedit', function(){
    
      id = $(this).attr('data_id');
      jenis = $(this).attr('data_jenis');
      lisan = $(this).attr('data_lisan');
      tulisan = $(this).attr('data_tulisan');

      var hasiljenis
      var bahasa1 = "Bahasa Inggris"
      var bahasa2 = "Bahasa Mandarin"
      if (jenis === bahasa1) {
         document.getElementById('jenis').setAttribute("readonly", "readonly");
         document.getElementById('jenis').setAttribute("value", jenis);
      }else if(jenis === bahasa2){
         document.getElementById('jenis').setAttribute("readonly", "readonly");
         document.getElementById('jenis').setAttribute("value", jenis);

      }else{
         document.getElementById('jenis').setAttribute("value", jenis);
         document.getElementById("jenis").removeAttribute("readonly");
      }

      $("#id").val(id);
      document.getElementById('lisan').value=lisan;
      document.getElementById('tulisan').value=tulisan;
      $('#modalbahasa').modal('show');

     });

    //edit data pendidikan
    $(document).on('submit', '#formmodalbahasa', function(e) {  
      e.preventDefault();
      var route = $('#formmodalbahasa').data('route');
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
                                ' <b>Sedang Menyimpan Data...</div>');
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
                    $('#modalbahasa').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                  }
                  $('#modalbahasa').modal('hide');
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
                    $('#modalbahasa').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Memproses Data", "error");
                    $('.overlay').remove();
                },

      })
    });
  
</script>

<!-----------------------Hapus Bahasa-------------------------------->
<script type="text/javascript">
  $(document).on('click', '.hapusbahasa', function(){

    var id_bahasa = $(this).attr('data-id');
    var nm_jenis = $(this).attr('data-jenis');
       Swal.fire({
          title: 'Apakah Anda Yakin ?',
          text: 'Untuk Menghapus "'+nm_jenis+'"',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya, Saya Yakin!',
          cancelButtonText: 'Ngak Jadi Deh'
        }).then((result) => {
          if (result.value) {
            $.ajax({
                
                url:  "../../hapus/bahasa/"+id_bahasa,

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
                      text: 'Data '+nm_jenis+' Berhasil Dihapus',
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
<!--------------Tambah Bahasa ----------------->
<script>

    $(document).on('click', '.tambahbahasa', function(){
    
      $('#modalbahasatambah').modal('show');

     });

    $(document).on('submit', '#formmodalbahasatambah', function(e) {  
      e.preventDefault();
      var route = $('#formmodalbahasatambah').data('route');
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
                                ' <b>Sedang Menyimpan Data...</div>');
          },
          success: function(Response){
            console.log(Response)
           Swal.fire({
                  title: 'Berhasil !',
                  text: "Data Berhasil Ditambah",
                  type: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Oke'
                }).then((result) => {
                  if (result.value) {
                    $('.overlay').remove();
                    $('#modalbahasatambah').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                  }
                  $('#modalbahasatambah').modal('hide');
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
                    $('#modalbahasatambah').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                    $('.overlay').remove();
                },
      })
    });
  
</script>

<!-----------------------EDIT KEAHLIAN LAINNYA--------------->
<script>

    //edit data pendidikan
    $(document).on('submit', '#formkahlian', function(e) {  
      e.preventDefault();
      var route = $('#formkahlian').data('route');
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

          },
          success: function(Response){
            console.log(Response)
           Swal.fire({
                  title: 'Berhasil !',
                  text: "Data Berhasil Ubah",
                  type: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Oke'
                }).then((result) => {
                  if (result.value) {
                    setTimeout(location.reload.bind(location), 2000);
                  }
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

          },
          complete: function() {
                    $.unblockUI();
                    setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Memproses Data", "error");
                },

      })
    });
  
</script>

<script type="text/javascript">
  $(document).on('click', '#keahlian8', function(){
   if (document.getElementById('keahlian8').checked == true)
      {
        $("#keahlianshow").show();
        document.getElementById('keahlian_lainnya').removeAttribute('disabled','disabled');
      }else{
        $("#keahlianshow").hide();
        document.getElementById('keahlian_lainnya').setAttribute('disabled','disabled');
      }
 });
</script>
 <script type="text/javascript">
 //stay di tab jika di refresh
  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
      localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
      $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
  });
  </script>
<!---------------------------------------Bahasa dan keahlian lainnya--------------------------------->


<style type="text/css">
hr.new4 {
  border: 2px solid #5293d5;
  border-radius: 5px;
}
div.ex1 {
  height: 430px;
  overflow-x: scroll;
}
/* Hide scrollbar for Chrome, Safari and Opera */
.ex1::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE and Edge */
.ex1 {
    -ms-overflow-style: none;
}
</style>

@include('sweet::alert')
@endsection

  