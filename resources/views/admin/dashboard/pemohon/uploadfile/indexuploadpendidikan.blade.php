@extends('admin.layout.master')

@section('content')



<div class="content-header">

 

</div>

  <!-- /.content-header --> 

<div class="container-fluid">

  <div class="row">

    <div class="col-11 mx-auto">

      <div class="col-5" style="padding: 0px;">

        <h3>Berkas Pendidikan Formal</h3>

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

                <th style="width: 5rem;">Tingkat</th>

                <th style="width: 8rem;">Upload File</th>

                <th style="width: 8rem">Status</th>

                <th style="width: 8rem">Aksi</th>

              </tr>

            </thead>

            <tbody>

              @foreach($berpen as $tampilberpen)

              @if(empty($tampilberpen->smp_namasekolah) || $tampilberpen->smp_namasekolah == null)



              @else

              <tr>

                <td>{{ "Sekolah Menengah Pertama (tidak wajib)" }}</td>

                <td style="background: #bfbfbf;">

                  

                </td>

                <td>

                 <button class="btnfileupload btn btn-primary btn-xs" 

                    data-id="{{ $tampilberpen->id_user }}"

                    data-name="smp"  style="width: 7rem; text-align: left;"

                    ><span class="fa fa-file-upload"></span> Ijazah</button>

                </td>

                <td>

                   @if($smp >= 1)

                   <span class="badge badge-success" style="width: 6rem; text-align: left;">Ijazah Ok <i class="fa fa-check" style="float: right;"></i></span>

                  

                   @endif

                </td>

                <td>

                  @if($smp >= 1)

                  <a href="{{{ URL::to('download/'.$tampilberpen->id_user.'/berkas/smp') }}}" class="btn btn-warning btn-xs" title="Download File">

                        <span class="fa fa-file-download"> </span>

                  </a>

                  <a href="{{{ URL::to('destroypend/'.$tampilberpen->id_user.'/berkas/smp') }}}" class="btn btn-outline-danger btn-xs" onclick="return confirm('Anda Yakin Akan Menghapus File Ijazah SMP?');" title="Hapus File Yang Diupload">

                      <span class="fa fa-trash"></span>

                  </a>

                  @endif

                </td>

              </tr>

              @endif



              @if(empty($tampilberpen->sma_namasekolah) || $tampilberpen->sma_namasekolah == null)

              @else

              <tr>

                <td>

                  {{ "Sekolah Menengah Atas" }}

                </td>

                <td style="background: #bfbfbf;">

                 

                </td>

                <td>

                   <button class="btnfileupload btn btn-primary btn-xs" 

                    data-id="{{ $tampilberpen->id_user }}"

                    data-name="sma"  style="width: 7rem; text-align: left;"

                    ><span class="fa fa-file-upload"></span> Ijazah</button>

                </td>

                <td>

                  @if($sma >= 1)

                    <span class="badge badge-success" style="width: 6rem; text-align: left;">Ijazah Ok <i class="fa fa-check" style="float: right;"></i></span>

                 

                  @endif

                </td>

                <td>

                   @if($sma >= 1)

                   <a href="{{{ URL::to('download/'.$tampilberpen->id_user.'/berkas/sma') }}}" class="btn btn-warning btn-xs" title="Download File">

                        <span class="fa fa-file-download"> </span>

                   </a>

                   <a href="{{{ URL::to('destroypend/'.$tampilberpen->id_user.'/berkas/sma') }}}" class="btn btn-outline-danger btn-xs" onclick="return confirm('Anda Yakin Akan Menghapus File Ijazah SMA?');" title="Hapus File Yang Diupload">

                      <span class="fa fa-trash"></span>

                   </a>

                   @endif



                </td>

              </tr>

              @endif

              @endforeach





              @foreach($perting as $tampilperting)



              @if(empty($tampilperting->pt_nama) || $tampilperting->pt_nama == null)

              @else

              <tr>

                <td>

                  {{ $tampilperting->pt_nama }}

                </td>

                <td  style="text-align: center;">

                  {{ $tampilperting->pt_jenjang }}

                </td>

                <td>

                  <button class="btnfileupload btn btn-primary btn-xs"

                  data-id="{{ $tampilperting->id_user }}"

                  data-name="Ijazah-{{ $tampilperting->id_perguruantinggi }}-{{ $tampilperting->pt_nama }}" style="width: 7rem; text-align: left;"

                  ><span class="fa fa-file-upload"></span> Ijazah</button> 



                  <br> 

                 

                  <button class="btnfileupload btn btn-info btn-xs" 

                  data-id="{{ $tampilperting->id_user }}"

                  data-name="Transkrip-{{ $tampilperting->id_perguruantinggi }}-{{ $tampilperting->pt_nama }}" style="width: 7rem; text-align: left;"

                  ><span class="fa fa-file-upload"></span> Transkrip Nilai</button>

                </td>

                <td>

                  @foreach($berkas as $key => $tampilberkas)



                  @if($tampilberkas->jenis == 'Ijazah-'.$tampilperting->id_perguruantinggi.'-'.$tampilperting->pt_nama )

                  <span class="badge badge-success" style="width: 6rem; text-align: left;">Ijazah Ok <i class="fa fa-check" style="float: right;"></i></span>

                 

                  @endif



                  @if($tampilberkas->jenis == 'Transkrip-'.$tampilperting->id_perguruantinggi.'-'.$tampilperting->pt_nama)

                  <span class="badge badge-success" style="width: 6rem; text-align: left;">Transkrip Ok <i class="fa fa-check" style="float: right;"></i></span>



                  @endif



                  @endforeach

                </td>

                <td>

                  @foreach($berkas as $key => $tampilberkas)



                  @if($tampilberkas->jenis == 'Ijazah-'.$tampilperting->id_perguruantinggi.'-'.$tampilperting->pt_nama)

                  <a href="

                  {{{ URL::to('download/'.$tampilperting->id_user.'/berkas/Ijazah-'.$tampilperting->id_perguruantinggi.'-'.$tampilperting->pt_nama.'') }}}" class="btn btn-warning btn-xs" data-toggle="tooltip" title="Download File Ijazah">

                        <span class="fa fa-file-download" > </span>

                  </a>

                  <a href="{{{ URL::to('destroypend/'.$tampilberpen->id_user.'/berkas/Ijazah-'.$tampilperting->id_perguruantinggi.'-'.$tampilperting->pt_nama.'') }}}" class="btn btn-outline-danger btn-xs" onclick="return confirm('Anda Yakin Akan Menghapus File Ijazah Ini');" data-toggle="tooltip" title="Hapus File Yang Diupload, Ijazah {{ $tampilperting->pt_nama }}">

                      <span class="fa fa-trash"></span>

                  </a>

                  @endif

                  @if($tampilberkas->jenis == 'Transkrip-'.$tampilperting->id_perguruantinggi.'-'.$tampilperting->pt_nama)

                  <a href="{{{ URL::to('download/'.$tampilperting->id_user.'/berkas/Transkrip-'.$tampilperting->id_perguruantinggi.'-'.$tampilperting->pt_nama.'') }}}" class="btn btn-warning btn-xs" data-toggle="tooltip" title="Download File Transkrip">

                        <span class="fa fa-file-download"> </span>

                  </a>

                  <a href="{{{ URL::to('destroypend/'.$tampilberpen->id_user.'/berkas/Transkrip-'.$tampilperting->id_perguruantinggi.'-'.$tampilperting->pt_nama.'') }}}" class="btn btn-outline-danger btn-xs" onclick="return confirm('Anda Yakin Akan Menghapus File Transkrip');" data-toggle="tooltip" title="Hapus File Yang Diupload, Transkrip {{ $tampilperting->pt_nama }}">

                      <span class="fa fa-trash"></span>

                  </a>

                  @endif



                  @endforeach

                </td>

                

              </tr>

              @endif

              @endforeach

              @if(($cek1->pt_nama == null) && ($cek2->smp_namasekolah == null) && ($cek2->sma_namasekolah == null))

              <tr>

                <td colspan="10" style="text-align: center;">Tidak Ada Pendidikan Formal Apapun</td>

              </tr>

              @endif



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

            <input type="hidden" name="pendstatus" value="1">

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

