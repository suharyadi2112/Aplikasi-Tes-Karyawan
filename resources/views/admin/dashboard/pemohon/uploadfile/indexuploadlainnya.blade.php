@extends('admin.layout.master')
@section('content')

<div class="content-header">
 
</div>
  <!-- /.content-header --> 
<div class="container-fluid">
  <div class="row">
    <div class="col-11 mx-auto">
      <div class="col-5" style="padding: 0px;">
        <h3>Berkas Cv, Surat Lamaran, Dll</h3>
        <a href="{{{ route('pemohonindex') }}}" title="Kembali"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
      </div>
      @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
        </div>
      @endif
      @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
        </div>
      @endif
      <div class="card">
        <div class="card-body">
          <table id="datatables" class="table table-bordered table-striped ">
            <thead>
              <tr>
                <th>File Yang Harus Diupload</th>
                <th style="width: 10rem">Upload File</th>
                <th style="width: 8rem">Status</th>
                <th style="width: 8rem">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="background: #edda46">Foto Diri <font size="3" color="red"></font></td>
                <td>
                   <button class="btnfileupload btn btn-primary btn-xs" 
                    data-id="{{ Auth::id() }}"
                    data-name="fotodiri"  style="width: 8rem; text-align: left;"
                    ><span class="fa fa-file-upload"></span> Foto Diri
                  </button>
                </td>
                <td>
                  @if($fotodiri >= 1)
                    <span class="badge badge-success" style="width: 6rem; text-align: left;">Foto Ok <i class="fa fa-check" style="float: right;"></i></span>
                  @endif
                </td>
                <td>
                  @if($fotodiri >= 1)
                  <a href="{{{ URL::to('download/'.Auth::id().'/berkas/fotodiri') }}}" class="btn btn-warning btn-xs" title="Download File">
                        <span class="fa fa-file-download"> </span>
                  </a>
                  <a href="{{{ URL::to('destroylainya/'.Auth::id().'/berkas/fotodiri') }}}" class="btn btn-outline-danger btn-xs" onclick="return confirm('Anda Yakin Akan Menghapus File Foto Ini?');" title="Hapus File Yang Diupload">
                      <span class="fa fa-trash"></span>
                  </a>
                  @endif
                </td>
             </tr>

             <tr>
                <td>Curriculum Vitae <font size="3" color="red"><sup>*Jika ada</sup></font></td>
                <td>
                  <button class="btnfileupload btn btn-primary btn-xs" 
                    data-id="{{ Auth::id() }}"
                    data-name="cv"  style="width: 8rem; text-align: left;"
                    ><span class="fa fa-file-upload"></span> Curriculum Vitae
                  </button>
                <td>
                  @if($cv >= 1)
                    <span class="badge badge-success" style="width: 6rem; text-align: left;">CV Ok <i class="fa fa-check" style="float: right;"></i></span>
                  @endif
                </td>
                <td>
                  @if($cv >= 1)
                  <a href="{{{ URL::to('download/'.Auth::id().'/berkas/cv') }}}" class="btn btn-warning btn-xs" title="Download File">
                        <span class="fa fa-file-download"> </span>
                  </a>
                  <a href="{{{ URL::to('destroylainya/'.Auth::id().'/berkas/cv') }}}" class="btn btn-outline-danger btn-xs" onclick="return confirm('Anda Yakin Akan Menghapus File Curriculum Vitae?');" title="Hapus File Yang Diupload">
                      <span class="fa fa-trash"></span>
                  </a>
                  @endif
                </td>
             </tr>
             <tr>
                <td>Surat Lamaran Kerja</td>
                <td>
                  <button class="btnfileupload btn btn-primary btn-xs" 
                    data-id="{{ Auth::id() }}"
                    data-name="suratlamarankerja"  style="width: 8rem; text-align: left;"
                    ><span class="fa fa-file-upload"></span> Surat Lamaran
                  </button>
                </td>
                <td>
                  @if($slk >= 1)
                    <span class="badge badge-success" style="width: 6rem; text-align: left;">Surat Ok <i class="fa fa-check" style="float: right;"></i></span>
                  @endif
                </td>
                <td>
                  @if($slk >= 1)
                  <a href="{{{ URL::to('download/'.Auth::id().'/berkas/suratlamarankerja') }}}" class="btn btn-warning btn-xs" title="Download File">
                        <span class="fa fa-file-download"> </span>
                  </a>
                  <a href="{{{ URL::to('destroylainya/'.Auth::id().'/berkas/suratlamarankerja') }}}" class="btn btn-outline-danger btn-xs" onclick="return confirm('Anda Yakin Akan Menghapus File Surat Lamaran Kerja Ini?');" title="Hapus File Yang Diupload">
                      <span class="fa fa-trash"></span>
                  </a>
                  @endif
                </td>
             </tr>
             <tr>
                <td>Surat Pengalaman Kerja <font size="3" color="red"><sup>*Jika ada</sup></font></td>
                <td>
                   <button class="btnfileupload btn btn-primary btn-xs" 
                    data-id="{{ Auth::id() }}"
                    data-name="suratpengalamankerja"  style="width: 8rem; text-align: left;"
                    ><span class="fa fa-file-upload"></span> Surat Pengalaman
                  </button>
                </td>
                <td>
                  @if($spk >= 1)
                    <span class="badge badge-success" style="width: 6rem; text-align: left;">Surat Ok <i class="fa fa-check" style="float: right;"></i></span>
                  @endif
                </td>
                <td>
                  @if($spk >= 1)
                  <a href="{{{ URL::to('download/'.Auth::id().'/berkas/suratpengalamankerja') }}}" class="btn btn-warning btn-xs" title="Download File">
                        <span class="fa fa-file-download"> </span>
                  </a>
                  <a href="{{{ URL::to('destroylainya/'.Auth::id().'/berkas/suratpengalamankerja') }}}" class="btn btn-outline-danger btn-xs" onclick="return confirm('Anda Yakin Akan Menghapus File Surat Pengalaman Kerja Ini?');" title="Hapus File Yang Diupload">
                      <span class="fa fa-trash"></span>
                  </a>
                  @endif
                </td>
             </tr>
             <tr>
                <td>Portofolio <font size="3" color="red"><sup>*Jika ada</sup></font></td>
                <td>
                   <button class="btnfileupload btn btn-primary btn-xs" 
                    data-id="{{ Auth::id() }}"
                    data-name="portofolio"  style="width: 8rem; text-align: left;"
                    ><span class="fa fa-file-upload"></span> Portofolio
                  </button>
                </td>
                <td>
                  @if($portofolio >= 1)
                    <span class="badge badge-success" style="width: 6rem; text-align: left;">Portofolio Ok <i class="fa fa-check" style="float: right;"></i></span>
                  @endif
                </td>
                <td>
                  @if($portofolio >= 1)
                  <a href="{{{ URL::to('download/'.Auth::id().'/berkas/portofolio') }}}" class="btn btn-warning btn-xs" title="Download File">
                        <span class="fa fa-file-download"> </span>
                  </a>
                  <a href="{{{ URL::to('destroylainya/'.Auth::id().'/berkas/portofolio') }}}" class="btn btn-outline-danger btn-xs" onclick="return confirm('Anda Yakin Akan Menghapus File Portofolio Ini?');" title="Hapus File Yang Diupload">
                      <span class="fa fa-trash"></span>
                  </a>
                  @endif
                </td>
             </tr>

             <tr>
                <td style="background: #b2d5ed">Tambahan Lainnya <font size="3" color="red"><sup>*Jika ada</sup></font></td>
                <td>
                   <button class="btnfileupload btn btn-primary btn-xs" 
                    data-id="{{ Auth::id() }}"
                    data-name="tambahan"  style="width: 8rem; text-align: left;"
                    ><span class="fa fa-file-upload"></span> Tambahan
                  </button>
                </td>
                <td>
                  @if($tambahan >= 1)
                    <span class="badge badge-success" style="width: 6rem; text-align: left;">Tambahan Ok <i class="fa fa-check" style="float: right;"></i></span>
                  @endif
                </td>
                <td>
                  @if($tambahan >= 1)
                  <a href="{{{ URL::to('download/'.Auth::id().'/berkas/tambahan') }}}" class="btn btn-warning btn-xs" title="Download File">
                        <span class="fa fa-file-download"> </span>
                  </a>
                  <a href="{{{ URL::to('destroylainya/'.Auth::id().'/berkas/tambahan') }}}" class="btn btn-outline-danger btn-xs" onclick="return confirm('Anda Yakin Akan Menghapus File Tambahan Ini?');" title="Hapus File Yang Diupload">
                      <span class="fa fa-trash"></span>
                  </a>
                  @endif
                </td>
             </tr>
            </tbody>
          </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    <!-- /.col -->
  </div>
</div>


<!-------------------------------perguruan tinggi------------------------------>
<div id="modalfileupload" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
        <div class="modal-header bg-info">
          <h2 class="modal-title">Upload File</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form action="{{ route('prosesupload') }}" role="form" data-toggle="validator" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">
            <input type="hidden" name="id_user" id="id_user">
            <input type="hidden" name="data_name" id="data_name">
            <input type="hidden" name="pendstatus" value="2">
                <div class="col-md-12">
                  <div class="form-group" >
                    <label for="nama_perguruantinggi">Pilih File: <input type="text" name="" id="data_name2" style="border: none; width: 100%" readonly=""></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-file-upload"></i></span>
                        </div>
                        <input type="file" name="files" id="someId" required="">
                        <font color="red" size="2">File Yang Diizinkan jpg, jpeg, png, pdf. Maks 2 mb</font>
                      </div>
                      <br>
                      <label for="nama_perguruantinggi">Keterangan: </label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-align-left"></i></span>
                        </div>
                        <textarea class="form-control" name="keterangan" placeholder="masukan keterangan berkas jika ada"></textarea>
                      </div>
                    <div class="help-block with-errors text-danger"></div>
                  </div>
                </div>
              </div>
            </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Upload File</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- /.modal -->
@endsection
@section('script')
<script>

     $(document).on('click', '.btnfileupload', function(){
      id = $(this).attr('data-id');
      data_name = $(this).attr('data-name');
      $("#id_user").val(id);
      $("#data_name").val(data_name);
      $("#data_name2").val(data_name);
      $('#modalfileupload').modal('show');
     });

     
</script>

<script type="text/javascript">
var file = document.getElementById('someId');

file.onchange = function() {
   for (var i = 0; i < file.files.length; i++) {

        if(this.files[i].size > 2097152){
           swal.fire( file.files.item(i).name  +  "", "File Mungkin Lebih 2MB!", "error");
           this.value = "";

        }
        var ext = file.files[i].name.substr(-3);
        var ygempat = file.files[i].name.substr(-4);
        if(ext!== "jpg" && ext!== "PNG"  && ext!== "png" && ext!== "PDF" && ext!== "pdf" && ygempat!=="jpeg")  {

            swal.fire( file.files.item(i).name  +  "", "Extention File Mungkin Tidak Diizinkan", "error");
            this.value = '';

        }else{
            alert( file.files.item(i).name  + ", File Diizinkan");
        }
      
      }

      function getFile(filePath) {
          return filePath.substr(filePath.lastIndexOf('\\') + 1).split('.')[0];
      }
};
</script>

<script type="text/javascript">
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>

@include('sweet::alert')

@endsection
