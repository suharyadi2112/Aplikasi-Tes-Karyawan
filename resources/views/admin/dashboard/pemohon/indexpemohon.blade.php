@extends('admin.layout.master')
@section('content')
<div class="content-header">
</div>

<!-- /.content-header -->
<div class="container-fluid">
  <div class="row">
    <div class="col-11 mx-auto">
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
              <li>Isilah "Data Diri" pada button <a href="#" class="btn btn btn-info btn-xs btn-flat" style="text-align: left;"><i class="fa fa-user-tag"></i> Data Diri </a> dibagian kelengkapan data terlebih dahulu sebelum mengisi item lainnya</li>
              <li>Semua data harus diisi dengan benar dan sesuai dengan keadaan hingga saat ini.</li>
              <li>Setelah selesai mengisi data dibagian kelengkapan data, lanjutkan dengan Mengupload Berkas yang diminta</li>
              <ol type="a">
                <li>Upload berkas bersifat wajib, kecuali jika terdapat note <font color="red">"*Jika Ada"</font> saat berada ditampilan upload file.</li>
              </ol>
              <li>Pratinjau "Resume" bisa dilihat setelah kelengkapan data telah diisi semua.</li>
              <li>Klik Button -<a href="#" class="btn btn-outline-success btn-flat btn-xs" title="Klik Jika Selesai"><span class="fa fa-exclamation-circle"></span> Saya Telah Selesai </a>-</b>jika sudah menyelesaikan semua yang diminta.</li>
              <li>Jika menemukan kendala silahkan hubungi ke admin kami ke nomor WhatsApp <b>+62 857-6603-6533 / 082283778944</b>
              </li>
            </ol>
          </div>
        </div>
      </div>

      @if ($message = Session::get('error'))
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> <strong>{{ $message }}</strong>
      </div>@endif @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> <strong>{{ $message }}</strong>
      </div>@endif
      <div class="card">
        <div class="card-body">
          @php

          $cekstatusfns = DB::table('datadiri')->select('status_finish')
                        ->where('id_user', '=', Auth::id())
                        ->first();

          if (empty($cekstatusfns)) {
            
          }else{
            $cekstatusfns = $cekstatusfns->status_finish;
          }

          @endphp
          @if($cekstatusfns == 1) 

          <span class="btn btn-info btn-flat btn-xs" title="Anda Telah Mengerjakannya Dengan Baik"><span class="fa fa-check-square"></span> Selesai</span>@else <a href="{{ Route('updatestatusselesai',['statusselesai' => '1']) }}" class="btn btn-outline-success btn-flat btn-xs" onclick="return confirm('Pastikan Anda Sudah Mengecek Keseluruhan Data ?')" title="Klik Jika Selesai"><span class="fa fa-exclamation-circle"></span> Saya Telah Selesai </a>
          <font color="red" size="1" style="vertical-align: bottom;"> *jika sudah melengkapi data-data yang diminta</font>
          @endif
          <table id="datatables" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nama Lengkap Pelamar</th>
                <th>Lihat Resume</th>
                <th>Upload File</th>
                <th>Kelengkapan Data</th>
              </tr>
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


<!-- /.modal -->

@endsection
@section('script')

@include('admin.dashboard.pemohon.modal.modalkesehatan')

@include('admin.dashboard.pemohon.modal.modalpendidikan')

@include('admin.dashboard.pemohon.modal.modalpendnonformal')

@include('admin.dashboard.pemohon.modal.modalpencapaian')

@include('admin.dashboard.pemohon.modal.modalpekerjaanyangdilamar')

@include('admin.dashboard.pemohon.modal.modaldataberbahasaasing_dan_keahlian')

<script>

$.noConflict();

jQuery( document ).ready(function( $ ) {

    console.log(),

    $('#datatables').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('viewdatadiri') !!}',
        searching : false,
        lengthChange : false,
        paging : false,
        bInfo : false,
        columns: [
            { data: 'name', name: 'name' },
            { data: 'resume', name: 'resume' },
            { data: 'uploadfile', name: 'uploadfile' },
            { data: 'action', name: 'action' },
        ]
    });


     $(document).on('click', '.swalDefaultError', function () {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      Toast.fire({
        type: 'error',
        title: 'Pastikan Kelengkapan Data Sudah Terisi Semua'
      })
    });
    $(document).on('click', '.swalDefaultError2', function(){
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          Toast.fire({
            type: 'error',
            title: 'Pastikan Data Diri Sudah Diisi Pada Bagian Kelengkapan Data'
          })
    });



    $(document).on('click', '.swalDefaultError3', function(){
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          Toast.fire({
            type: 'error',
            title: 'Pastikan Data Pendidikan Sudah Diisi Pada Dibagian Kelengkapan Data'
          })
    });



    $(document).on('click', '.swalDefaultError4', function(){
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          Toast.fire({
            type: 'error',
            title: 'Pastikan Data Organisasi dan Pencapaian Sudah Diisi Pada Bagian Kelengkapan Data'
          })
    });

    $(document).on('click', '.cekdatadiri', function(){
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          Toast.fire({
            type: 'error',
            title: 'Pastikan Data Diri Sudah Isi Terlebih Dahulu'
          })
    });



    //datakesahatan//

    var id_user;



     $(document).on('click', '.tambahkesehatan', function(){

      id_user = $(this).attr('id');

      $('#confirmModal').modal('show');

     });



     //tambah Data kesehatan

     $(document).on('submit', '#myForm', function(e) {  

        e.preventDefault();

        var route = $('#myForm').data('route');

        var routeback = $('#myForm').data('routeback');

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

              console.log(Response);

              //setTimeout($.unblockUI, 1000); 

              setTimeout(function(){

              

              Swal.fire({

                    title: 'Berhasil !',

                    text: "Data Berhasil Disimpan",

                    type: 'success',

                    confirmButtonColor: '#3085d6',

                    confirmButtonText: 'Oke'

                  }).then((result) => {

                    if (result.value) {

                      $('.overlay').remove();

                      $('#confirmModal').modal('hide');

                      //window.location.href = routeback;

                      $("#status_bar").load(location.href + " #status_bar");

                    }

                  })

              $('.overlay').remove();

              $('#confirmModal').modal('hide');

              $('#datatables').DataTable().ajax.reload();

                  }, 1000);



            },

            complete: function() {

                      $.unblockUI();

                      $("#status_bar").load(location.href + " #status_bar");

                      

                  },

            error: function(xhr) { // if error occured

                      swal.fire("Upsss!", "Terjadi kesalahan Dalam Menyimpan Data", "error");

                  },



        })

      });

    

     $(document).on('click', '#checkboxPrimary17', function(){

       if (document.getElementById('checkboxPrimary17').checked == true)

          {

            $("#penyakitlainnyashow").show();

            

            $("#penyakitlainnyashow").show();

            document.getElementById('penyakit_lainnya').removeAttribute('disabled','disabled');

          }else{

            $("#penyakitlainnyashow").hide();

            document.getElementById('penyakit_lainnya').setAttribute('disabled','disabled');

          }

     });

        

     $('#toggle-event').change(function() {

      //$('#console-event').html('Toggle: ' + $(this).prop('checked'))

      if (document.getElementById('toggle-event').checked == true) {

        $("#jenispenyakit").show();

        $("#a1").show();

        $("#a2").hide();

        document.getElementById('checkboxPrimary1').removeAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary2').removeAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary3').removeAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary4').removeAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary5').removeAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary6').removeAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary7').removeAttribute('disabled','disabled');

        //document.getElementById('checkboxPrimary8').removeAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary9').removeAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary10').removeAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary11').removeAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary12').removeAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary13').removeAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary14').removeAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary15').removeAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary16').removeAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary17').removeAttribute('disabled','disabled');

        

      }else{

        $("#jenispenyakit").hide();

        $("#a1").hide();

        $("#a2").show();

        document.getElementById('checkboxPrimary1').setAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary2').setAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary3').setAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary4').setAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary5').setAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary6').setAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary7').setAttribute('disabled','disabled');

        //document.getElementById('checkboxPrimary8').setAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary9').setAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary10').setAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary11').setAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary12').setAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary13').setAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary14').setAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary15').setAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary16').setAttribute('disabled','disabled');

        document.getElementById('checkboxPrimary17').setAttribute('disabled','disabled');

      }

    });





    //datapendidikannonformal

    $(document).on('click', '.tambahpendnonformal', function(){

      $('#nonformal').modal('show');

    });



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



          type: 'POST',

          url: route,

          data: form_data.serialize(),



          beforeSend: function(){

            $(wrapper).append(  '<div class="overlay d-flex justify-content-center align-items-center" id="cekoverlay">'+ 

                                  '<i class="fas fa-2x fa-sync fa-spin"></i>'+

                                ' <b>Sedang Menyimpan Data...</div>');

          },

          success: function(Response){

            console.log(Response);

            //setTimeout($.unblockUI, 1000); 

            setTimeout(function(){

            

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

                    //window.location.href = routeback;

                    $("#status_bar").load(location.href + " #status_bar");

                  }

                })

            $('.overlay').remove();

            $('#nonformal').modal('hide');

            $('#datatables').DataTable().ajax.reload();

                }, 1000);



          },

          complete: function() {

                    $.unblockUI();

                    $("#status_bar").load(location.href + " #status_bar");

                      

                },

          error: function(xhr) { // if error occured

                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Menyimpan Data", "error");

                    $('.overlay').remove();

                },



      })

    });



    $('#toggle-pendnonformal').change(function() {

      //$('#console-event').html('Toggle: ' + $(this).prop('checked'))

      if (document.getElementById('toggle-pendnonformal').checked == true) {

  

        document.getElementById('fieldsetpendnonformal').removeAttribute('disabled','disabled');

      }else{

        document.getElementById('fieldsetpendnonformal').setAttribute('disabled','disabled');

      }

    });

    





     //Tambah Jenjang non formal Pendidikan

    $(document).ready(function() {

        var max_fieldsnf = 10;

        var wrappernf = $(".container2");

        var add_buttonnf = $(".tambahpendnf");



        var x = 1;

        $(add_buttonnf).click(function(e) {

            e.preventDefault();

            if (x < max_fieldsnf) {

              $(wrappernf).append('<div>'+

                '<p style="margin-bottom: 1px;"><span class="badge badge-info">Pendidikan Non Formal :</span></p>'+

                '<div class="shadow p-1 mb-1 bg-light rounded mx-auto row" style="width: 100%">'+

                 '<div class="col-md-6">'+

                  '<div class="form-group" >'+

                    '<label for="Jenis Pelatihan">Jenis/nama Pelatihan :</label>'+

                    '<div class="input-group">'+

                      '<div class="input-group-prepend">'+

                        '<span class="input-group-text"><i class="fa fa-award"></i></span>'+

                      '</div>'+

                      '<textarea class="form-control" name="jenis_pelatihan[]" pattern="[a-z A-Z 0-9]{1,200}" id="pendnonformal2'+x+'"  placeholder="Masukan Nama Pelatihan" required="">'+x+'</textarea>'+

                    '</div>'+

                      '<font style="color: #007bff" size="2px">*Wajib Diisi | </font>'+
                        '<span class="fa fa-info-circle" data-toggle="penjelasan" title="inputan hanya boleh huruf dan angka"></span><font color="red" size="2px"><div class="spinner-grow text-danger spinner-grow-sm" id="growspinner" role="status"><span class="sr-only">Loading...</span> </div>*inputan hanya boleh huruf, angka dan terdiri dari 200 karakter </font>'+
                      '<div class="help-block with-errors text-danger"></div>'+

                      '<div class="help-block with-errors text-danger"></div>'+

                    '</div>'+

                '</div>'+



                '<div class="col-md-6">'+

                  '<div class="form-group" >'+

                    '<label for="Nama Penyelenggara">Nama Penyelenggara :</label>'+

                    '<div class="input-group">'+

                      '<div class="input-group-prepend">'+

                        '<span class="input-group-text"><i class="fa fa-building"></i></span>'+

                      '</div>'+

                      '<textarea class="form-control" name="nama_penyelenggara[]" id="nama_penyelenggara" placeholder="Masukan Nama Penyelenggara" required=""></textarea>'+

                    '</div>'+

                      '<font color="red" size="2">*wajib diisi</font><br>'+

                      '<div class="help-block with-errors text-danger"></div>'+

                    '</div>'+

                '</div>'+



                '<div class="col-md-4">'+

                  '<div class="form-group" >'+

                    '<label for="Kota">Kota :</label>'+

                    '<div class="input-group">'+

                      '<div class="input-group-prepend">'+

                        '<span class="input-group-text"><i class="fa fa-city"></i></span>'+

                      '</div>'+

                      '<textarea class="form-control" name="kota[]" placeholder="masukan kota penyelenggara" required=""></textarea>'+

                    '</div>'+

                      '<font color="red" size="2">*wajib diisi</font><br>'+

                      '<div class="help-block with-errors text-danger"></div>'+

                    '</div>'+

                '</div>'+



                '<div class="col-md-4">'+

                  '<div class="form-group" >'+

                    '<label for="Mulai Pelatihan">Mulai Pelatihan :</label>'+

                    '<div class="input-group">'+

                      '<div class="input-group-prepend">'+

                        '<span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>'+

                      '</div>'+

                      '<input type="date" name="nf_mulai[]" class="form-control" required="">'+

                    '</div>'+

                      '<font color="red" size="2">*wajib diisi</font><br>'+

                      '<div class="help-block with-errors text-danger"></div>'+

                    '</div>'+

                '</div>'+



                '<div class="col-md-4">'+

                  '<div class="form-group" >'+

                    '<label for="Selesai Pelatihan">Selesai Pelatihan :</label>'+

                    '<div class="input-group">'+

                      '<div class="input-group-prepend">'+

                        '<span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>'+

                      '</div>'+

                      '<input type="date" name="nf_selesai[]" class="form-control" required="">'+

                    '</div>'+

                      '<font color="red" size="2">*wajib diisi</font><br>'+

                      '<div class="help-block with-errors text-danger"></div>'+

                    '</div>'+

                '</div>'+

                '</div>'+

                '<a href="#" class="nonformaldelete btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>'+

                '</div>'  


                ); //add input box
               
              //PENDIDIKAN NON FORMAL
              $('#pendnonformal2'+x+'').keyup(validateTextarea2);

              function validateTextarea2() {
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


                x++;
             
                //Validasi input text area
            } else {
                alert('Melebihi Batas Maksimum')
            }
        }); 


      $(wrappernf).on("click", ".nonformaldelete", function(e) {
                  e.preventDefault();
                  $(this).parent('div').remove();
                  x--;
          })


      });



      //data pencapaian

      $(document).on('click', '.pencapaian', function(){

        $('#modalpencapaian').modal('show');

      });



      $(document).on('submit', '#myFormpencapaian', function(e) {  

      e.preventDefault();

      var route = $('#myFormpencapaian').data('route');

      var routeback = $('#myFormpencapaian').data('routeback');

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

            console.log(Response);

            //setTimeout($.unblockUI, 1000); 

            setTimeout(function(){

            

            Swal.fire({

                  title: 'Berhasil !',

                  text: "Data Berhasil Disimpan",

                  type: 'success',

                  confirmButtonColor: '#3085d6',

                  confirmButtonText: 'Oke'

                }).then((result) => {

                  if (result.value) {

                    $('.overlay').remove();

                    $('#modalpencapaian').modal('hide');

                    //window.location.href = routeback;

                    $("#status_bar").load(location.href + " #status_bar");

                  }

                })

            $('#modalpencapaian').modal('hide');

            $('#datatables').DataTable().ajax.reload();

                }, 1000);



          },

          complete: function() {

                    $.unblockUI();

                    $("#status_bar").load(location.href + " #status_bar");

                },

          error: function(xhr) { // if error occured

                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Menyimpan Data", "error");

                    $('.overlay').remove();

                },



      })

    });





    //Tambah pencapaian

    $(document).ready(function() {

        var max_fieldpencapaian = 10;

        var wrapperpencapaian = $(".containerpencapaian");

        var add_buttonpencapaian = $(".tambahpencapaian");



        var x = 1;

        $(add_buttonpencapaian).click(function(e) {

            e.preventDefault();

            if (x < max_fieldpencapaian) {

                //$(".tahuntambah").attr("id", "tahuntambah"+x);

                x++;

                $(wrapperpencapaian).append(' <div>'+

              '<p style="margin-bottom: 1px;"><span class="badge badge-primary">Achievement :</span></p>'+

              '<div class="shadow p-1 mb-1 bg-light rounded mx-auto row" style="width: 100%">'+

              

                  '<div class="col-md-4">'+

                      '<div class="form-group">'+

                        '<label>Bidang :</label>'+

                        '<div class="input-group">'+

                          '<div class="input-group-prepend">'+

                            '<span class="input-group-text"><i class="fa fa-medal"></i></span>'+

                          '</div>'+

                          '<textarea  class="form-control" name="bidang_penghargaan[]" id="qwerewq'+x+'" pattern="[a-z A-Z 0-9]{1,200}"  placeholder="Masukan Bidang Pencapaian" required=""></textarea>'+

                        '</div>'+

                        '<font style="color: #007bff" size="2px">*Wajib Diisi | </font>'+
                          '<span class="fa fa-info-circle" data-toggle="penjelasan" title="inputan hanya boleh huruf dan angka"></span><font color="red" size="2px"><div class="spinner-grow text-danger spinner-grow-sm" id="growspinner" role="status"><span class="sr-only">Loading...</span> </div>*inputan hanya boleh huruf, angka dan terdiri dari 200 karakter </font>'+
                        '<div class="help-block with-errors text-danger"></div>'+

                       '</div>'+

                    '</div>'+

                    '<div class="col-md-4">'+

                      '<div class="form-group">'+

                        '<label>Bentuk Penghargaan :</label>'+

                        '<div class="input-group">'+

                          '<div class="input-group-prepend">'+

                            '<span class="input-group-text"><i class="fa fa-trophy"></i></span>'+

                          '</div>'+

                          '<textarea  class="form-control" name="bentuk_penghargaan[]" placeholder="Masukan Bentuk Penghargaan Yang Diterima" required=""></textarea>'+

                        '</div>'+

                        '<font size="2" color="red">*bentuk penghargaan wajib diisi</font>'+

                       '</div>'+

                    '</div>'+

                    '<div class="col-md-4">'+

                      '<div class="form-group">'+

                        '<label>Tahun Penghargaan :</label>'+

                        '<div class="input-group">'+

                          '<div class="input-group-prepend">'+

                            '<span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>'+

                          '</div>'+

                          '<input  class="form-control" type="date" name="tahun_penghargaan[]" placeholder="Masukan Tahun Penerimaan Penghargaan" required="">'+

                        '</div>'+

                        '<font size="2" color="red">*tahun penghargaan wajib diisi</font>'+

                       '</div>'+

                    '</div>'+

                '</div>'+

                '<a href="#" class="deleteachiev btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>'+

              '</div>'



                ); //add input box

            } else {

                alert('Melebihi Batas Maksimum')

            }

        }); 

        

        $(wrapperpencapaian).on("click", ".deleteachiev", function(e) {

            e.preventDefault();

            $(this).parent('div').remove();

            x--;

        });





        $(add_buttonpencapaian).click(function(e) {

            e.preventDefault();

             $('#qwerewq'+x+'').keyup(qwerewq);



              function qwerewq() {

                  var errorMsg = "inputan hanya boleh huruf, angka dan terdiri dari 200 karakter.";

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

          });



      

      });



    $('#nmpencapaian').keyup(nmpencapaian);



    function nmpencapaian() {

            var errorMsg = "inputan hanya boleh huruf, angka dan terdiri dari 200 karakter.";

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



    $('#toggle-pencapaian').change(function() {

      //$('#console-event').html('Toggle: ' + $(this).prop('checked'))

      if (document.getElementById('toggle-pencapaian').checked == true) {

  

        document.getElementById('pencapaian').removeAttribute('disabled','disabled');

      }else{

        document.getElementById('pencapaian').setAttribute('disabled','disabled');

      }

    });





    //data pencapaian

    $(document).on('click', '.lamaran', function(){

      $('#modallamaran').modal('show');

    });



    $(document).on('submit', '#myFormpekerjaanyangdilamar', function(e) {  

      e.preventDefault();

      var route = $('#myFormpekerjaanyangdilamar').data('route');

      var routeback = $('#myFormpekerjaanyangdilamar').data('routeback');

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

            console.log(Response);

            //setTimeout($.unblockUI, 1000); 

            setTimeout(function(){

            

            Swal.fire({

                  title: 'Berhasil !',

                  text: "Data Berhasil Disimpan",

                  type: 'success',

                  confirmButtonColor: '#3085d6',

                  confirmButtonText: 'Oke'

                }).then((result) => {

                  if (result.value) {

                    $('.overlay').remove();

                    $('#modallamaran').modal('hide');

                    //window.location.href = routeback;

                    $("#status_bar").load(location.href + " #status_bar");

                  }

                })

            $('#modallamaran').modal('hide');

            $('#datatables').DataTable().ajax.reload();

                }, 1000);



          },

          complete: function() {

                    $.unblockUI();

                    $("#status_bar").load(location.href + " #status_bar");

                },

          error: function(xhr) { // if error occured

                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Menyimpan Data", "error");

                    $('.overlay').remove();

                },



      })

    });







    //data Bahasa Dan Keahlian Lainnya

    $(document).on('click', '.berbahasaasingdankeahlian', function(){

      $('#modalberbahasaasing_dan_keahlian').modal('show');

    });



    $('.selectbahasaasing').select2({

      theme: 'bootstrap4'

    });



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





    $(document).ready(function() {

        var max_fieldbahasaasing = 10;

        var wrapperbahasaasing = $(".containertambahbahasa");

        var add_buttonbahasaasing = $(".tambahbahasa");



        var x = 1;

        $(add_buttonbahasaasing).click(function(e) {

            e.preventDefault();

            if (x < max_fieldbahasaasing) {

                //$(".tahuntambah").attr("id", "tahuntambah"+x);

                x++;

                $(wrapperbahasaasing).append(' <div>'+

              '<div style="margin-bottom: 1px;"><span class="badge badge-primary">Kemampuan Berbahasa Asing :</span></div>'+

                '<div class="shadow p-1 mb-1 bg-light rounded mx-auto row" style="width: 100%">'+

                    



                    '<div class="col-md-4">'+

                      '<div class="form-group">'+

                        '<label>Jenis Bahasa :</label>'+

                        '<div class="input-group">'+

                          '<div class="input-group-prepend">'+

                            '<span class="input-group-text"><i class="fa fa-globe-asia"></i></span>'+

                          '</div>'+

                          '<input type="text" class="form-control" name="jenis_bahasa[]" placeholder="masukan bahasa tambahan" required>'+

                          

                        '</div>'+

                        '<font size="2" color="red">*bahasa asing wajib diisi</font><br>'+

                        '<font size="2" color="blue">*bahasa inggris & bahasa mandarin lebih diutamakan</font>'+

                        '<!-- /.input group -->'+

                       '</div>'+

                      '<!-- /.form group -->'+

                    '</div>'+

                   

                    '<div class="col-md-4">'+

                      '<div class="form-group">'+

                        '<label>Tingkat Lisan :</label>'+

                        '<div class="input-group">'+

                          '<div class="input-group-prepend">'+

                            '<span class="input-group-text"><i class="fa fa-level-up-alt"></i></span>'+

                          '</div>'+

                          '<select class="form-control" name="lisan_bahasa[]" required>'+

                            '<option value="">--pilih tingkat kemampuan--</option>'+

                            '<option value="BAIK">Baik</option>'+

                            '<option value="CUKUP">Cukup</option>'+

                            '<option value="KURANG">Kurang</option>'+

                            '<option value="TIDAK TAHU">Tidak Tahu</option>'+

                          '</select>'+

                        '</div>'+

                        '<font size="2" color="red">*Tingkat lisan wajib diisi</font>'+

                        '<!-- /.input group -->'+

                       '</div>'+

                      '<!-- /.form group -->'+

                    '</div>'+

                     '<div class="col-md-4">'+

                      '<div class="form-group">'+

                         '<label>Tingkat Tulisan :</label>'+

                        '<div class="input-group">'+

                          '<div class="input-group-prepend">'+

                            '<span class="input-group-text"><i class="fa fa-level-up-alt"></i></span>'+

                          '</div>'+

                          '<select class="form-control" name="tulisan_bahasa[]" required>'+

                            '<option value="">--pilih tingkat kemampuan--</option>'+

                            '<option value="BAIK">Baik</option>'+

                            '<option value="CUKUP">Cukup</option>'+

                            '<option value="KURANG">Kurang</option>'+

                            '<option value="TIDAK TAHU">Tidak Tahu</option>'+

                          '</select>'+

                        '</div>'+

                        '<font size="2" color="red">*Tingkat Tulisan Wajib Diisi</font>'+

                        '<!-- /.input group -->'+

                       '</div>'+

                      '<!-- /.form group -->'+

                    '</div>'+



                  '</div>'+

                '<a href="#" class="deletebahasaasing btn btn-danger btn-xs">Hapus Tambahan Bahasa</a>'+

              '</div>'



                ); //add input box

            } else {

                alert('Melebihi Batas Maksimum')

            }

        }); 

        

        $(wrapperbahasaasing).on("click", ".deletebahasaasing", function(e) {

            e.preventDefault();

            $(this).parent('div').remove();

            x--;

        });

      

      });



      $(document).on('submit', '#bahasa_dan_keahlian_lainnya', function(e) {  

      e.preventDefault();

      var route = $('#bahasa_dan_keahlian_lainnya').data('route');

      var routeback = $('#bahasa_dan_keahlian_lainnya').data('routeback');

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

            console.log(Response);

            //setTimeout($.unblockUI, 1000); 

            setTimeout(function(){

            

            Swal.fire({

                  title: 'Berhasil !',

                  text: "Data Berhasil Disimpan",

                  type: 'success',

                  confirmButtonColor: '#3085d6',

                  confirmButtonText: 'Oke'

                }).then((result) => {

                  if (result.value) {

                    $('.overlay').remove();

                    $('#modalberbahasaasing_dan_keahlian').modal('hide');

                    //window.location.href = routeback;

                    $("#status_bar").load(location.href + " #status_bar");

                  }

                })

            $('#modalberbahasaasing_dan_keahlian').modal('hide');

            $('#datatables').DataTable().ajax.reload();

                }, 1000);



          },

          complete: function() {

                    $.unblockUI();

                    $("#status_bar").load(location.href + " #status_bar");

                },

          error: function(xhr) { // if error occured

                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Menyimpan Data", "error");

                    $('.overlay').remove();

                },



      })

    });



    $(document).on('click', '#infopengisian', function(){

      $( "#growspinner" ).removeClass( "spinner-grow text-danger spinner-grow-sm" );

    });






//PENDIDIKAN NON FORMAL
$('#pendnonformal').keyup(validateTextarea2);

function validateTextarea2() {
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




});


</script>

@include('sweet::alert')



@endsection

