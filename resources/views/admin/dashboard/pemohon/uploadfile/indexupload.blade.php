@extends('admin.layout.master')
@section('content')

<div class="content-header">
 
</div>
  <!-- /.content-header --> 
<div class="container-fluid">
  <div class="row">
    <div class="col-11 mx-auto">
      
      <div class="col-5" style="padding: 0px;">
        <h3>Berkas Data Diri</h3>
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
          <table id="datatables" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>File Yang Harus Diupload</th>
                <th style="width: 10rem">Uplaod File</th>
                <th style="width: 5rem">Aksi</th>
              </tr>

              @foreach($datadiri as $tampildatadiri)
              <tr>
                <td>{{ "KARTU TANDA PENDUDUK" }}</td>
                <td>
                  @if($ktp >= 1)
                   <a href="{{{ URL::to('download/'.$tampildatadiri->id_user.'/berkas/ktp') }}}">
                        <span class="fa fa-file-download"> </span> Sudah Upload
                  </a> 
                  @else
                   <button class="btnfileupload btn btn-primary btn-xs" 
                    data-id="{{ $tampildatadiri->id_user }}"
                    data-name="ktp"
                    ><span class="fa fa-file-upload"></span> Upload File</button>
                  @endif
                </td>
                <td>
                  @if($ktp >= 1)
                  <a href="{{{ URL::to('destroy/'.$tampildatadiri->id_user.'/berkas/ktp') }}}" class="btn btn-outline-danger btn-xs" onclick="return confirm('Anda Yakin Akan Menghapus File KTP?');" title="Hapus File Yang Diupload">
                      <span class="fa fa-trash"></span>
                  </a>
                  @else
                  @endif
                </td>
              </tr>

              @if(empty($tampildatadiri->no_npwp) || $tampildatadiri->no_npwp == null)
              @else
              <tr>
                <td>
                  {{ "NPWP" }}
                </td>
                <td>
                  @if($npwp >= 1)
                    <a href="{{{ URL::to('download/'.$tampildatadiri->id_user.'/berkas/npwp') }}}">
                        <span class="fa fa-file-download"> </span> Sudah Upload
                  </a> 
                  @else
                   <button class="btnfileupload btn btn-primary btn-xs" 
                    data-id="{{ $tampildatadiri->id_user }}"
                    data-name="npwp"
                    ><span class="fa fa-file-upload"></span> Upload File</button>
                  @endif
                </td>
                <td>
                  @if($npwp >= 1)
                  <a href="{{{ URL::to('destroy/'.$tampildatadiri->id_user.'/berkas/npwp') }}}" class="btn btn-outline-danger btn-xs" onclick="return confirm('Anda Yakin Akan Menghapus File NPWP?');" title="Hapus File Yang Diupload">
                      <span class="fa fa-trash"></span>
                  </a>
                  @else
                  @endif
                </td>
              </tr>
              @endif

              @if(empty($tampildatadiri->kartu_keluarga) || $tampildatadiri->kartu_keluarga == null)
              @else
              <tr>
                <td>
                  {{ "KARTU KELUARGA" }}
                </td>
                <td>
                  @if($kk >= 1)
                  <a href="{{{ URL::to('download/'.$tampildatadiri->id_user.'/berkas/kk') }}}">
                        <span class="fa fa-file-download"> </span> Sudah Upload
                  </a> 
                  @else
                   <button class="btnfileupload btn btn-primary btn-xs" 
                    data-id="{{ $tampildatadiri->id_user }}"
                    data-name="kk"
                    ><span class="fa fa-file-upload"></span> Upload File</button>
                  @endif
                </td>
                <td>
                  @if($kk >= 1)
                  <a href="{{{ URL::to('destroy/'.$tampildatadiri->id_user.'/berkas/kk') }}}" class="btn btn-outline-danger btn-xs" onclick="return confirm('Anda Yakin Akan Menghapus File Kartu keluarga?');" title="Hapus File Yang Diupload">
                      <span class="fa fa-trash"></span>
                  </a>
                  @else
                  @endif
                </td>
              </tr>
              @endif

              @if(empty($tampildatadiri->paspor) || $tampildatadiri->paspor == null)
              @else
              <tr>
                <td>
                  {{ "PASPOR" }}
                </td>
                <td>
                  @if($paspor >= 1)
                  <a href="{{{ URL::to('download/'.$tampildatadiri->id_user.'/berkas/paspor') }}}">
                        <span class="fa fa-file-download"> </span> Sudah Upload
                  </a> 
                  @else
                   <button class="btnfileupload btn btn-primary btn-xs" 
                    data-id="{{ $tampildatadiri->id_user }}"
                    data-name="paspor"
                    ><span class="fa fa-file-upload"></span> Upload File</button>
                  @endif
                </td>
                <td>
                  @if($paspor >= 1)
                  <a href="{{{ URL::to('destroy/'.$tampildatadiri->id_user.'/berkas/paspor') }}}" class="btn btn-outline-danger btn-xs" onclick="return confirm('Anda Yakin Akan Menghapus File Paspor?');" title="Hapus File Yang Diupload">
                      <span class="fa fa-trash"></span>
                  </a>
                  @else
                  @endif
                </td>
              </tr>
              @endif

              @if(empty($tampildatadiri->sim_a) || $tampildatadiri->sim_a == null)
              @else
              <tr>
                <td>
                  {{ "SIM A" }}
                </td>
                <td>
                  @if($sima >= 1)
                  <a href="{{{ URL::to('download/'.$tampildatadiri->id_user.'/berkas/sima') }}}">
                        <span class="fa fa-file-download"> </span> Sudah Upload
                  </a> 
                  @else
                   <button class="btnfileupload btn btn-primary btn-xs" 
                    data-id="{{ $tampildatadiri->id_user }}"
                    data-name="sima"
                    ><span class="fa fa-file-upload"></span> Upload File</button>
                  @endif
                </td>
                <td>
                  @if($sima >= 1)
                   <a href="{{{ URL::to('destroy/'.$tampildatadiri->id_user.'/berkas/sima') }}}" class="btn btn-outline-danger btn-xs" onclick="return confirm('Anda Yakin Akan Menghapus File SIM A?');" title="Hapus File Yang Diupload">
                      <span class="fa fa-trash"></span>
                  </a>
                  @else
                  @endif
                </td>
              </tr>
              @endif

              @if(empty($tampildatadiri->sim_b) || $tampildatadiri->sim_b == null)
              @else
              <tr>
                <td>
                  {{ "SIM B" }}
                </td>
                <td>
                  @if($simb >= 1)
                  <a href="{{{ URL::to('download/'.$tampildatadiri->id_user.'/berkas/simb') }}}">
                        <span class="fa fa-file-download"> </span> Sudah Upload
                  </a>
                  @else
                   <button class="btnfileupload btn btn-primary btn-xs" 
                    data-id="{{ $tampildatadiri->id_user }}"
                    data-name="simb"
                    ><span class="fa fa-file-upload"></span> Upload File</button>
                  @endif
                </td>
                <td>
                  @if($simb >= 1)
                  <a href="{{{ URL::to('destroy/'.$tampildatadiri->id_user.'/berkas/simb') }}}" class="btn btn-outline-danger btn-xs" onclick="return confirm('Anda Yakin Akan Menghapus File SIM B?');" title="Hapus File Yang Diupload">
                      <span class="fa fa-trash"></span>
                  </a>
                  @else
                  @endif
                </td>
              </tr>
              @endif

              @if(empty($tampildatadiri->sim_c) || $tampildatadiri->sim_c == null)
              @else
              <tr>
                <td>
                  {{ "SIM C" }}
                </td>
                <td>
                  @if($simc >= 1)
                  <a href="{{{ URL::to('download/'.$tampildatadiri->id_user.'/berkas/simc') }}}">
                        <span class="fa fa-file-download"> </span> Sudah Upload
                  </a>
                  @else
                   <button class="btnfileupload btn btn-primary btn-xs" 
                    data-id="{{ $tampildatadiri->id_user }}"
                    data-name="simc"
                    ><span class="fa fa-file-upload"></span> Upload File</button>
                  @endif
                </td>
                <td>
                  @if($simc >= 1)
                   <a href="{{{ URL::to('destroy/'.$tampildatadiri->id_user.'/berkas/simc') }}}" class="btn btn-outline-danger btn-xs" onclick="return confirm('Anda Yakin Akan Menghapus File SIM C?');" title="Hapus File Yang Diupload">
                      <span class="fa fa-trash"></span>
                  </a>
                  @else
                  @endif
                </td>
              </tr>
              @endif

              @if(empty($tampildatadiri->bpjs_kesehatan) || $tampildatadiri->bpjs_kesehatan == null)
              @else
              <tr>
                <td>
                  {{ "BPJS KESEHATAN" }}
                </td>
                <td>
                  @if($bpjs_kesehatan >= 1)
                  <a href="{{{ URL::to('download/'.$tampildatadiri->id_user.'/berkas/bpjs_kesehatan') }}}">
                        <span class="fa fa-file-download"> </span> Sudah Upload
                  </a>
                  @else
                   <button class="btnfileupload btn btn-primary btn-xs" 
                    data-id="{{ $tampildatadiri->id_user }}"
                    data-name="bpjs_kesehatan"
                    ><span class="fa fa-file-upload"></span> Upload File</button>
                  @endif
                </td>
                <td>
                  @if($bpjs_kesehatan >= 1)
                   <a href="{{{ URL::to('destroy/'.$tampildatadiri->id_user.'/berkas/bpjs_kesehatan') }}}" class="btn btn-outline-danger btn-xs" onclick="return confirm('Anda Yakin Akan Menghapus File BPJS KESEHATAN?');" title="Hapus File Yang Diupload">
                      <span class="fa fa-trash"></span>
                  </a>
                  @else
                  @endif
                </td>
              </tr>
              @endif

              @if(empty($tampildatadiri->bpjs_tenagakerja) || $tampildatadiri->bpjs_tenagakerja == null)
              @else
              <tr>
                <td>
                  {{ "BPJS TENAGA KERJA" }}
                </td>
                <td>
                  @if($bpjs_tenagakerja >= 1)
                  <a href="{{{ URL::to('download/'.$tampildatadiri->id_user.'/berkas/bpjs_tenagakerja') }}}">
                        <span class="fa fa-file-download"> </span> Sudah Upload
                  </a>
                  @else
                   <button class="btnfileupload btn btn-primary btn-xs" 
                    data-id="{{ $tampildatadiri->id_user }}"
                    data-name="bpjs_tenagakerja"
                    ><span class="fa fa-file-upload"></span> Upload File</button>
                  @endif
                </td>
                <td>
                  @if($bpjs_tenagakerja >= 1)
                   <a href="{{{ URL::to('destroy/'.$tampildatadiri->id_user.'/berkas/bpjs_tenagakerja') }}}" class="btn btn-outline-danger btn-xs" onclick="return confirm('Anda Yakin Akan Menghapus File BPJS TENAGA KERJA?');" title="Hapus File Yang Diupload">
                      <span class="fa fa-trash"></span>
                  </a>
                  @else
                  @endif
                </td>
              </tr>
              @endif

              @if(empty($tampildatadiri->bpjs_jaminanpensiun) || $tampildatadiri->bpjs_jaminanpensiun == null)
              @else
              <tr>
                <td>
                  {{ "BPJS JAMINAN PENSIUN" }}
                </td>
                <td>
                  @if($bpjs_jaminanpensiun >= 1)
                  <a href="{{{ URL::to('download/'.$tampildatadiri->id_user.'/berkas/bpjs_jaminanpensiun') }}}">
                        <span class="fa fa-file-download"> </span> Sudah Upload
                  </a>
                  @else
                   <button class="btnfileupload btn btn-primary btn-xs" 
                    data-id="{{ $tampildatadiri->id_user }}"
                    data-name="bpjs_jaminanpensiun"
                    ><span class="fa fa-file-upload"></span> Upload File</button>
                  @endif
                </td>
                <td>
                  @if($bpjs_jaminanpensiun >= 1)
                  <a href="{{{ URL::to('destroy/'.$tampildatadiri->id_user.'/berkas/bpjs_jaminanpensiun') }}}" class="btn btn-outline-danger btn-xs" onclick="return confirm('Anda Yakin Akan Menghapus File BPJS JAMINAN PENSIUN?');" title="Hapus File Yang Diupload">
                      <span class="fa fa-trash"></span>
                  </a>
                  @else
                  @endif
                </td>
              </tr>
              @endif

              @endforeach

              @if($datdircount > 0)
              @else
              <tr>
                <td colspan="5">
                  <center>{{ "Belum Melakukan Pengisian Data Diri" }}</center>
                </td>
              </tr>
              @endif
              

              </thead>
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
                <div class="col-md-12">
                  <div class="form-group" >
                    <label for="nama_perguruantinggi">Pilih File: <input type="text" name="" id="data_name2" style="border: none" readonly=""></label>
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



@include('sweet::alert')

@endsection
