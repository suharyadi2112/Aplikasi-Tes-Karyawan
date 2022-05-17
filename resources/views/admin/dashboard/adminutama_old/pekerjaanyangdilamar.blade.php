
@extends('admin.layout.masteradmin')

@section('content') 


<!-- page content -->
<div class="right_col" role="main">
<div class="">

@if(Auth::user()->level == "1")
<form role="form" id="cekdata" method="POST" action="{{ Route('viewpekerjaanyangdilamar') }}">
@csrf
<div class="col-sm-4" style="float: right;">
  <select class="form-control selectp" name="id_user" onchange="onSelectChange();"> 
    <option value="" ><center>-----------------Pilih Nama Pelamar-------------</center></option>
    @foreach ($linknamal as $item_namal)
      <option value="{{$item_namal->id_user}}">{{$item_namal->nama_lengkap}} | {{ $item_namal->no_ktp }}</option>
    @endforeach
  </select>
</div>
</form>
@endif

<div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <a href="{{{ route('ListPemohon') }}}" title="Kembali"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
      <div class="x_panel shadow-sm">
        <div class="x_title">
          <h2>Pekerjaan Yang di Lamar <small>{{ $namal }}</small></h2>
          <div class="clearfix"></div>
        </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <table id="" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                       <th>Posisi/Jabatan</th>
                       <th>Tingkat/Jenjang</th>
                       <th>Penghasilan Yang Diminta Saat Ini</th>

                      @if(Auth::user()->level == "1")
                       <th>Aksi</th>
                      @endif

                      </tr>
                    </thead>
                    <tbody>
                      @foreach($queryone as $tqueryone)
                      <tr>
                        <td>{{ $tqueryone->posisi }}</td>
                        <td>{{ $tqueryone->tingkat }}</td>
                        <td>Rp.{{ number_format($tqueryone->penghasilan) }}</td>

                        @if(Auth::user()->level == "1")
                        <td rowspan="3" style="vertical-align: middle; text-align: center;">
                          <button class="btnpydl btn btn-outline-primary btn-xs btn-flat"
                          data_id="{{ $tqueryone->id_pekerjaanyangdilamar }}"
                          data_posisi="{{ $tqueryone->posisi }}"
                          data_tingkat="{{ $tqueryone->tingkat }}"
                          data_penghasilan="{{ $tqueryone->penghasilan }}"
                          data_alasan_melamar="{{ $tqueryone->alasan_melamar }}"
                          data_tanggung_jawab="{{ $tqueryone->tanggung_jawab }}">
                          <span class="fa fa-edit"></span></button>
                        </td>
                        @endif

                      </tr>
                      <tr>
                        <td><b>Alasan Melamar Diposisi Tersebut : </b></td>
                        <td colspan="2" style="text-align: justify;">{{ $tqueryone->alasan_melamar }}</td>
                      </tr>
                      <tr>
                        <td><b>Garis Besar/Tanggung Jawab : </b></td>
                        <td colspan="2" style="text-align: justify;">{{ $tqueryone->tanggung_jawab }}</td>
                      </tr>
                      
                      @endforeach
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

<!--------------------------------EDIT PENNCAPAIAN------------------------------------->

<div id="modalpydl" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h2 class="modal-title" style="color: white">Edit Data Pekerjaan Yang Dilamar</h2>

        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('updatepydlau') }}" id="formpydl" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
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
                            <span class="input-group-text"><i class="fa fa-graduation-cap"></i></span>
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
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
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
                            <span class="input-group-text"><i class="fa fa-money"></i></span>
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
                            <span class="input-group-text"><i class="fa fa-reply"></i></span>
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
                            <span class="input-group-text"><i class="fa fa-legal"></i></span>
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


@endsection
@section('script')

<script type="text/javascript">
jQuery( document ).ready(function($){

  //Edit Pekerjaan Yang Di lamar

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

          },
          complete: function() {
                    $.unblockUI();
                    $('#modalpydl').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                    
                },

      })
    });


  $('.selectp').select2({
    theme: 'bootstrap4'
  });
});
</script>

<script type="text/javascript">
  function onSelectChange(){
   document.getElementById('cekdata').submit();
  }
</script>

@endsection
