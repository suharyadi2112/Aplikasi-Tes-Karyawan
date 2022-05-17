
@extends('admin.layout.masteradmin')

@section('content') 
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>

     @if ($message = Session::get('error'))
       <div class="alert alert-error alert-dismissible " role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <strong>Error</strong> {{ $message }}
        </div>
      @endif
      @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Success</strong> {{ $message }}
        </div>
      @endif
      
    <a href="{{{ action('Auth\UserController@index') }}}" title="Kembali"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel shadow-sm">
            <div class="x_title">

              <a href="#" class="berkas_soalbtn btn btn-round btn-outline-primary btn-sm" data-idsoalfile="{{ $id_user }}"  style="float: right; width: 11rem"><i class="fa fa-fw fa-plus"></i>Tambah Soal File</a>

                <h2>Soal Dalam Bentuk File<small>setup</small></h2>
                <div class="clearfix"></div>
              </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box">
                        <table id="datatablekategoritambahan" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama File</th>
                              <th>Size File</th>
                              <th >Aksi</th>
                            </tr>
                          </thead>
                          <tbody> 
                            @forelse($berkas_soal as $key2 => $show)
                            <tr>
                              <td style="width: 2rem">{{ $key2 + 1 }}</td>
                              <td style="width: 10rem">{{ $show->nama_file }}</td>
                              <td style="width: 10rem">{{ formatSizeUnits($show->file_size) }}</td>
                              <td style="width: 6rem">
                           
                               <a href="#" class="hps_berkassoal btn btn-outline-danger btn-xs btn-flat"

                                  data_id="{{ $show->id_soal }}"
                                  data_nm="{{ $show->nama_file }}"

                                  ><i class="fa fa-fw fa-trash"></i></a>
                               
                              </td>
                            </tr>
                            @empty
                            <tr>
                              <td colspan="10" style="text-align: center;">Belum Ada Data</td>
                            </tr>
                            @endforelse
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <a href="{{{ action('Auth\UserController@index') }}}" title="Kembali"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            <div class="x_panel shadow-sm">
            <div class="x_title">

              <a href="{{ Route('showtambahtamkatsol', ['id_user' => $id_user]) }}" class="btn btn-round btn-outline-primary btn-sm"  style="float: right; width: 12rem"><i class="fa fa-fw fa-plus"></i>Tambah Soal & Kategori</a>

                <h2>Kategori & Soal<small>setup</small></h2>
                <div class="clearfix"></div>
              </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box">
                        <table id="datatablekategoritambahan" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Detail PTK</th>
                              <th>Kategori</th>
                              <th style="width: 15rem">Soal</th>
                              <th >Aksi</th>
                            </tr>
                          </thead>
                          <tbody> 
                            @forelse($datatamkatsol as $key => $s)
                            <tr>
                              <td style="width: 2rem">{{ $key + 1 }}</td>
                              <td style="width: 10rem">{{ $s->detail_ptk }}</td>
                              <td style="width: 10rem">{{ $s->nama_kategori }}</td>
                              <td class="review"> @php echo $s->soal @endphp</td>
                              <td style="width: 6rem">
                                   
                                <a href="{{Route('showedittamkatsol',[ 'id' => $s->id_tambahan ] ) }}" class=" btn btn-outline-primary btn-xs btn-flat"><i class="fa fa-fw fa-pencil"></i></a>


                                <a href="#" class="tamkatsolhapus btn btn-outline-danger btn-xs btn-flat"

                                  data_id="{{ $s->id_tambahan }}"
                                  data_nm="{{ $s->nama_kategori }}"

                                  ><i class="fa fa-fw fa-trash"></i></a>

                              </td>
                            </tr>
                            @empty
                            <tr>
                              <td colspan="10" style="text-align: center;">Belum Ada Data</td>
                            </tr>
                            @endforelse
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

             </div>
           </div>
          </div>
        </div>
      </div>
    </div>  


<!----------------------------Upload Berkas Soal dalam bentuk file-------------------------->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="berkas_soal">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header bg-info" style="color: white">
        <h5 class="modal-title">Upload Berkas Soal Dalam Bentuk File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ Route('BerkasSoal') }}" role="form" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Yakin untuk melanjutkannya ? ');">
        {{ csrf_field() }}

        <div class="overlaymodal">
          
        </div>

        <input type="hidden" name="id_user" id="id_userberkassoal" required="">

        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">
            <div class="col-md-12">
              <div class="form-group" >
                <label for="nama_perguruantinggi">Pilih File:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-upload"></i></span>
                    </div>
                    <input type="file" name="files[]" class="form-control" id="someId2" required="" multiple=""><br>
                  </div>
                  <br>
                  <font color="red" size="2">File Yang Diizinkan <b><u>HANYA</u></b> .pdf, .docx, .doc, .xls, .xlsx Maks 2 mb</font>
                <div class="help-block with-errors text-danger"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
     </div>
  </div>
</div>


@endsection
@section('script')

<style type="text/css">
  .hideContent {
    overflow: hidden;
    line-height: 2em;
    height: 2em;
}
</style>
<script type="text/javascript">


jQuery( document ).ready(function( $ ) {

     //untuk upload file hasil aptitude dan disc
    $(document).on('click', '.berkas_soalbtn', function(){
      id = $(this).attr('data-idsoalfile');
      $("#id_userberkassoal").val(id);
      $('#berkas_soal').modal('show');
    });



    //Hapus Berkas File Soal
    $(document).on('click', '.hps_berkassoal', function(){

    var id = $(this).attr('data_id');
    var nm = $(this).attr('data_nm');
       Swal.fire({
          title: 'Apakah Anda Yakin ?',
          text: 'Untuk Menghapus File "'+nm+'"',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya, Saya Yakin!',
          cancelButtonText: 'Ngak Jadi Deh'
        }).then((result) => {
          if (result.value) {
            $.ajax({
                
                url:  "../destroyberkassoalfile/"+id,

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
                success:function(data)
                 {
                   Swal.fire({
                      title: 'Berhasil !',
                      text: "Data Berhasil Dihapus",
                      type: 'success'
                    })
                  setTimeout(location.reload.bind(location), 2000);
                 },
                error: function(xhr) { // if error occured
                      swal.fire("Upsss!", "Terjadi Kesalahan!", "error");
                  setTimeout(location.reload.bind(location), 2000);
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


    
    //HAPUS PERGURUAN TINGGI
    $(document).on('click', '.tamkatsolhapus', function(){

    var id = $(this).attr('data_id');
    var nm = $(this).attr('data_nm');
       Swal.fire({
          title: 'Apakah Anda Yakin ?',
          text: 'Untuk Menghapus Kategori "'+nm+'"',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya, Saya Yakin!',
          cancelButtonText: 'Ngak Jadi Deh'
        }).then((result) => {
          if (result.value) {
            $.ajax({
                
                url:  "../destroytamkatsol/"+id,

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
                success:function(data)
                 {
                   Swal.fire({
                      title: 'Berhasil !',
                      text: "Data Berhasil Dihapus",
                      type: 'success'
                    })
                  setTimeout(location.reload.bind(location), 2000);
                 },
                error: function(xhr) { // if error occured
                      swal.fire("Upsss!", "Terjadi Kesalahan!", "error");
                      setTimeout(location.reload.bind(location), 2000);
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


    //rich textarea
    $('.textarea').summernote();

});
</script>

<script type="text/javascript">
//cek validasi file

var file2 = document.getElementById('someId2');

file2.onchange = function() {
   for (var i = 0; i < file2.files.length; i++) {

        if(this.files[i].size > 2097152){
           swal.fire( file2.files.item(i).name  +  "", "File Mungkin Lebih 2MB!", "error");
           this.value = "";

        }
        var ext = file2.files[i].name.substr(-3);
        var ygempat = file2.files[i].name.substr(-4);
        if(ext!== "PDF" && ext!== "pdf" && ygempat!== "docx" && ext!== "doc" && ext!== "xls" && ygempat!== "xlsx")  {

            swal.fire( file2.files.item(i).name  +  "", "Extention File Mungkin Tidak Diizinkan", "error");
            this.value = '';

        }else{
            alert( file2.files.item(i).name  + ", File Diizinkan");
        }
      
      }

      function getFile(filePath) {
          return filePath.substr(filePath.lastIndexOf('\\') + 1).split('.')[0];
      }
};
</script>
@php
function formatSizeUnits($bytes){
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
  }
@endphp
<style>
.tooltip-inner {
    min-width: 350px; /* the minimum width */
}

</style>
@endsection
