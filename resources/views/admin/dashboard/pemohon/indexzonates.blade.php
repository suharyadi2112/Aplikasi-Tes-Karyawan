@extends('admin.layout.master')

@section('content')



<div class="content-header"></div>

  <!-- /.content-header --> 

<div class="container-fluid">
  <!--Tes APTITUDE dan tes DESC-->
   <div class="row">
      <div class="col-11 mx-auto">

        @if ($message = Session::get('errorhtj'))
        <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> <strong>{{ $message }}</strong>
        </div>@endif
        @if ($message = Session::get('errorty'))
        <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> <strong>{{ $message }}</strong>
        </div>@endif @if ($message = Session::get('successty'))
        <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> <strong>{{ $message }}</strong>
        </div>@endif

        <h3>Tes untuk diselesaikan <u>(Aptitude Test & DISC)</u></h3>
        <a href=" {{ Route('pemohonindex') }} " ><span class="fa fa-arrow-left"></span> Kembali</a>
        <div id="accordion">
          <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
          <div class="card-header" style="padding: 4px">
            <h4 class="card-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOnetwo" id="infopengisian">
                <font size="2px" color="black"><span class="fa fa-info-circle"></span> Baca Petunjuk Pengisian <div class="spinner-grow text-danger spinner-grow-sm" id="growspinner" role="status" style="float:right">
                          <span class="sr-only">Loading...</span>
                        </div></font>
              </a>
            </h4>
          </div>

          <div id="collapseOnetwo" class="panel-collapse collapse in">
          <div class="card-body">
            <ol type="1" style="line-height: 2.0">Salam Dunia Satu Keluarga :)
              <br>
              <br>
              <li>Jika menemukan kendala silahkan hubungi ke Nomor WhatsApp <b>+62 857-6603-6533</b>
              </li>
            </ol>
          </div>
        </div>
        </div>
        @if ($message = Session::get('error2'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> <strong>{{ $message }}</strong>
        </div>@endif @if ($message = Session::get('success2'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> <strong>{{ $message }}</strong>
        </div>
        @endif

          <div class="card">
              <div class="card-body">
                <table id="datatables" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama Tes</th>
                    <th>Status</th>
                    <th style="width: 30rem">Bahan</th>
                  </tr>
                  </thead>

                  <tbody> 
                    <tr>
                     <td>Soal Tes Aptitude</td>

                  
                       <td>
                        @php
                        $CekTot = DB::table('s_total')->where('s_total.id_user','=', Auth::id())->count();
                        if ($CekTot > 0) {
                       echo '<span class="badge badge-pill badge-success">Selesai <span class="fa fa-check-circle"></span></span>';
                    }else{
                           echo '<span class="badge badge-pill badge-warning">Kerjakan Tes <span class="fa fa-exclamation-circle
    "></span></span>';
                        }
                        @endphp
                      
                       </td>
                     <td>
                         <a href="{{ Route('KerjakanTesAptitude') }}" class="TesSoloAptitude btn btn-info btn-xs btn-flat"><span class="fa fa-book-reader"></span> Kerjakan Tes</a> 
                     </td>
                    </tr>
                    <tr>
                     <td>Soal Tes DISC</td>

                     <td>
                      @php
                      $CekStatus = DB::table('d_status_disc')->select('status_disc')->where('id_user','=', Auth::id())->first();
                      if (CekSedia(Auth::id()) == false) {
                      echo '<span class="badge badge-pill badge-success">Selesai <span class="fa fa-check-circle"></span></span>';
                      }else{
                      echo '<span class="badge badge-pill badge-warning">Kerjakan Tes <span class="fa fa-exclamation-circle
                      "></span></span>';
                      }
                      function CekSedia($cekSedia){
                      $Data = DB::table('d_jawaban_disc')->select('id_user')->where('id_user','=',$cekSedia)->count();
                      if ($Data > 0) {
                      return false;
                      }else{
                      return true;
                      }
                      }
                      @endphp
                     {{--  @foreach($cek as $showcek)
                      @if($showcek->tipe_tes == "disc")

                        <a href="#" class="btn btn-outline-info btn-xs btn-flat" ><span class="fa fa-file" disable></span> {{ $showcek->nama_file }}</a> 
                          <a href="{{ Route('DestroyHasilDisc', ['id' => $showcek->id_apti_disc]) }}" onclick="return confirm('apakah anda yakin menghapus file {{ $showcek->nama_file }}?')" title="Hapus File" class="btn btn-outline-danger btn-xs">
                          <span class="fa fa-trash"></span></a> 
                      @endif
                      @endforeach --}}
                     </td>
                     <td> 
                      <a href="{{ Route('KerjakanDisc') }}" class="btn btn-info btn-xs btn-flat"><span class="fa fa-book-reader"></span> Kerjakan Tes</a>
                      {{-- <a href="{{ Route('downloadsoaldisc') }}" class="btn btn-info btn-xs btn-flat"><span class="fa fa-download"></span> download soal</a> | 

                      <a href="#" class="aptitudedisc btn btn-warning btn-xs btn-flat" data_tipe="disc"><span class="fa fa-upload"></span> upload hasil</a>  --}}
                    </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
          </div>
        </div>
    </div>



    <!-- Tes lainnya untuk di selesaikan-->



    <div class="row">
      <div class="col-11 mx-auto">
        <h3>Tes untuk diselesaikan</h3>
        <a href=" {{ Route('pemohonindex') }} " ><span class="fa fa-arrow-left"></span> Kembali</a>
        <div id="accordion">
          <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->

          <div class="card-header" style="padding: 4px">
            <h4 class="card-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" id="infopengisian">

                <font size="2px" color="black"><span class="fa fa-info-circle"></span> Baca Petunjuk Pengisian <div class="spinner-grow text-danger spinner-grow-sm" id="growspinner" role="status" style="float:right">

                          <span class="sr-only">Loading...</span>

                        </div></font>
              </a>
            </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in">
            <div class="card-body">
              <ol type="1" style="line-height: 2.0">

                Salam Dunia Satu Keluarga :) <br><br>

                Jika ada yang kurang jelas atau kendala, silakan memberitahukan kepada saya melalui Nomor WhatsApp <b>+62 857-6603-6533</b><br>

                Jika tes-tes di atas sudah diselesaikan, silahkan upload dibagian "Upload Hasil". <br>

                Mohon tidak menggunakan alat bantu apapun baik kalkulator, kamus, buku, internet, ataupun lainnya.

              </ol>
            </div>
          </div>
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

                <th>No</th>
                <th>Detail</th>
                <th>Kategori Tes</th>
                <th>Soal</th>
                <th nowrap="">Upload Hasil</th>
              </tr>
              </thead>
              <tbody>
                @forelse($data as $key => $showdata)

                <tr>
                  <td style="text-align: center;">{{ $key + 1 }}</td>
                  <td nowrap="">{{ $showdata->detail_ptk }}</td>
                  <td nowrap="">{{ $showdata->nama_kategori }}</td>
                  <td>@php echo $showdata->soal @endphp</td>
                  <td style="text-align: center; vertical-align: top;" >

                      

                      <a href="#" class="btnfileupload btn btn-round btn-outline-info btn-xs" title="Upload Hasil"

                      data_id = "{{ $showdata->id_tambahan }}"

                      data_id_user = "{{ $showdata->id_user }}"

                       ><i class="fa fa-upload"></i></a><br><hr>
                      <a href="{{ url('detailberkastes/'.$showdata->id_tambahan.'/'.$showdata->id_user) }}" title="Lihat File Yang Diupload">
                       Lihat File

                      </a>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="10" style="text-align: center;">Tidak Ada Data</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>





  <div class="row">

      <div class="col-11 mx-auto">
        <h3>Soal Tes Tambahan <font color="red" size="2">*dikerjakan jika soal terlapir, jika tidak abaikan saja</font></h3>
        <a href=" {{ Route('pemohonindex') }} " ><span class="fa fa-arrow-left"></span> Kembali</a>

        @if ($message = Session::get('error123'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
        </div>

        @endif

        @if ($message = Session::get('success123'))
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
                <th>Nama File</th>
                <th>File</th>
                <th>File Hasil</th>
                <th nowrap="">Upload Hasil</th>
              </tr>
              </thead>
              <tbody>
                @forelse($berkassoal as $key12 => $showfilesoal)
                <tr>
                  <td nowrap="">{{ $showfilesoal->nama_file }}</td>
                  <td>
                    <a href="" title="Download Soal">
                       <a href="{{ Route('downloadsoaltambahan', ['id_soal' => $showfilesoal->id_soal]) }}" class="btn btn-info btn-xs btn-flat"><span class="fa fa-download"></span> download Soal</a>
                    </a>
                  </td>

                  <td>

                    @if(empty($showfilesoal->file_name) != true)
                    {{ $showfilesoal->file_name }}

                    <a href="{{ Route('destroyhasilsoaltambahan', ['id_jawaban' => $showfilesoal->id_jawaban]) }}" class=" btn btn-round btn-outline-danger btn-xs" title="Hapus File Jawaban"><i class="fa fa-trash"></i></a>
                    @endif
                  </td>

                  <td style="text-align: center; vertical-align: top;" >
                      <a href="#" class="uploadsoaltambahan btn btn-round btn-outline-info btn-xs" title="Upload Hasil"data_id = "{{ $showfilesoal->id_soal }}"data_idusersoaltambahan="{{ $showfilesoal->id_user }}"><i class="fa fa-upload"></i></a>

                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="10" style="text-align: center;">Tidak Ada Data</td>
                </tr>
                @endforelse
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



<!-------------------------------Upload Berkas Hasil Tes------------------------------>

<div id="modalfileupload" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
        <div class="modal-header bg-info">
          <h2 class="modal-title">Upload File</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>


        <form action="{{ route('zonatesuploadtes') }}" role="form" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="overlaymodal"></div>

        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">
            <input type="hidden" name="id_berkastes" id="id_tambahan">
            <input type="hidden" name="id_user" id="id_user">
                <div class="col-md-12">
                  <div class="form-group" >
                    <label for="nama_perguruantinggi">Pilih File:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-file-upload"></i></span>
                        </div>

                        <input type="file" name="files[]" id="someId" required="" multiple="">
                        <font color="red" size="2">File Yang Diizinkan jpg, jpeg, png, pdf. Maks 2 mb</font>
                      </div>
                      <br>
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





<!-------------------------------UPLOAD JAWABAN APTITUDE DAN DISC------------------------------>

<div id="aptitudedisc" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
        <div class="modal-header bg-info">
          <h2 class="modal-title">Upload File</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form action="{{ route('uploaddiscaptitude') }}" role="form" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="overlaymodal"> </div>

        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">
            <div class="col-md-12">
              <div class="form-group" >
                <label for="nama_perguruantinggi">Pilih File:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-file-upload"></i></span>
                    </div>
                    <input type="hidden" name="tipetes" id="data_tipe" required="">
                    <input type="file" name="files" id="someId2" required="">
                    <font color="red" size="2">File Yang Diizinkan <b><u>HANYA</u></b> .pdf, Maks 2 mb</font>
                  </div>
                  <br>
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







<!-------------------------------UPLOAD JAWABAN DARI SOAL TAMBAHAN---------------------------->

<div id="modaltambahansoal" class="modal fade" role="dialog">

  <div class="modal-dialog modal-xs">
    <div class="modal-content">
        <div class="modal-header bg-info">
          <h2 class="modal-title">Upload File</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>



        <form action="{{ route('uploadsoaltambahan') }}" role="form" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

        {{ csrf_field() }}
        <div class="overlaymodal">

        
        </div>

        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">
            <div class="col-md-12">
              <div class="form-group" >
                <label for="nama_perguruantinggi">Pilih File:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-file-upload"></i></span>
                    </div>
                    <input type="hidden" name="id_soal" id="id_soal" required="">
                    <input type="hidden" name="id_user" id="id_usersoaltambahan" required="">
                    <input type="file" name="files[]" id="someId3" required="">
                    <font color="red" size="2">File Yang Diizinkan <b><u>HANYA</u></b> .pdf, .zip,Maks 20 mb</font>
                  </div>
                  <br>
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
<script type="text/javascript">

    $(document).on('click', '.btnfileupload', function(){
      id = $(this).attr('data_id');
      data_id_user = $(this).attr('data_id_user');
      $("#id_tambahan").val(id);
      $("#id_user").val(data_id_user);
      $('#modalfileupload').modal('show');

     });

</script>



<script type="text/javascript">

    $(document).on('click', '.aptitudedisc', function(){
      data_tipe = $(this).attr('data_tipe');
      $("#data_tipe").val(data_tipe);
      $('#aptitudedisc').modal('show');
     });

</script>



<script type="text/javascript">

    $(document).on('click', '.uploadsoaltambahan', function(){
      id = $(this).attr('data_id');
      id_user = $(this).attr('data_idusersoaltambahan');
      $("#id_soal").val(id);
      $("#id_usersoaltambahan").val(id_user);
      $('#modaltambahansoal').modal('show');
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

var file2 = document.getElementById('someId2');
file2.onchange = function() {
   for (var i = 0; i < file2.files.length; i++) {
        if(this.files[i].size > 2097152){
           swal.fire( file2.files.item(i).name  +  "", "File Mungkin Lebih 2MB!", "error");
           this.value = "";
        }
        var ext = file2.files[i].name.substr(-3);
        var ygempat = file2.files[i].name.substr(-4);
        if(ext!== "PDF" && ext!== "pdf")  {
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



<script type="text/javascript">

var file3 = document.getElementById('someId3');

file3.onchange = function() {
   for (var i = 0; i < file3.files.length; i++) {
        if(this.files[i].size > 20971520){
           swal.fire( file3.files.item(i).name  +  "", "File Mungkin Lebih 20 MB!", "error");
           this.value = "";
        }
        var ext = file3.files[i].name.substr(-3);
        var ygempat = file3.files[i].name.substr(-4);
        if(ext!== "PDF" && ext!== "pdf" && ext!== "zip" && ext!== "ZIP")  {
            swal.fire( file3.files.item(i).name  +  "", "Extention File Mungkin Tidak Diizinkan", "error");
            this.value = '';
        }else{
            alert( file3.files.item(i).name  + ", File Diizinkan");
        }
      }
      function getFile(filePath) {
          return filePath.substr(filePath.lastIndexOf('\\') + 1).split('.')[0];
      }
};
</script>

@include('sweet::alert')

@endsection

