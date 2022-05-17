
@extends('admin.layout.master')
@section('content')


<form data-route="{{ route('postDatapendidikan') }}" data-routeback="{{ route('pemohonindex') }}" id="myFormpendidikan" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
    {{ csrf_field() }}
    <div class="overlaymodal">
      
    </div>
        <div class="modal-body mx-auto col-md-10">
          <div class="card-body" style="padding: 5px;">

          <div id="smartwizard">
              <ul>
                  <li><a href="#step-1">Step 1<br /><small>Sekolah Menengah Pertama (Sederajat)</small></a></li>
                  <li><a href="#step-2">Step 2<br /><small>Sekolah Menengah Atas (Sederajat)</small></a></li>
                  <li><a href="#step-3">Step 3<br /><small>Sekolah Perguruan Tinggi (Lanjut)</small></a></li>
              </ul>
          <!-------------------------------Sekolah Menengah Pertama------------------------------>
          
          <!--DIV UNTUK MEMUNCULKAN BUTTON-->
          <div>

          
          <div id="step-1" style="padding: 0">
            <p style="margin-bottom: 1px;"><span class="badge badge-primary">Sekolah Menegah Pertama(SMP) :</span>
              
            </p>

          <input type="hidden" name="typesmp" value="1">
            <div class="shadow-sm p-3 mb-5 bg-light rounded mx-auto">
              <div id="form-step-0" role="form" data-toggle="validator" class="row">

                  <div class="form-group col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                          <label for="nama_lengkap">Nama Lengkap Sekolah : </label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-user-tag"></i></span>
                            </div>
                             <textarea class="form-control"  pattern="[a-z A-Z 0-9]{1,200}" name="smp_namasekolah" id="smp_namasekolah" placeholder="Masukan Nama Sekolah" required></textarea>
                          </div>
                          <font style="color: #007bff" size="2px">*Wajib Diisi | </font>
                            <span class="fa fa-info-circle" data-toggle="penjelasan" title="inputan hanya boleh huruf dan angka"></span><font color="red" size="2px"><div class="spinner-grow text-danger spinner-grow-sm" id="growspinner" role="status"><span class="sr-only">Loading...</span> </div>*inputan hanya boleh huruf, angka dan terdiri dari 200 karakter </font>
                          <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                  </div>

                  <div class="form-group col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                          <label for="nama_lengkap">Mulai Pendidikan : </label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-user-tag"></i></span>
                            </div>
                             <input type="date" class="form-control" name="smp_tahunmulai" value=""  placeholder="Pilih Tanggal" autocomplete="off" required>
                          </div>
                          <font style="color: #007bff" size="2px">*Wajib Diisi</font>
                          <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                  </div>

                  <div class="form-group col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                          <label for="nama_lengkap">Selesai Pendidikan: </label>
                           <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-user-tag"></i></span>
                            </div>
                            <input type="date" class="form-control" name="smp_tahunselesai" value=""  placeholder="Pilih Tanggal" autocomplete="off" required>
                          </div>
                          <font style="color: #007bff" size="2px">*Wajib Diisi</font>
                          <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                  </div>

                  
                  
              </div>
            </div>
          </div>


         <div id="step-2" style="padding: 0">
          <input type="hidden" name="typesma" value="1">
          <p style="margin-bottom: 1px;"><span class="badge badge-info">Sekolah Menegah Atas(SMA) :</span>
              
          </p>
            <div class="shadow-sm p-3 mb-5 bg-light rounded mx-auto">
              <div id="form-step-1" role="form" data-toggle="validator" class="row">

                 <div class="form-group col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                          <label for="nama_sekolah">Nama Lengkap Sekolah :</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-university"></i></span>
                            </div>
                            <textarea class="form-control"  pattern="[a-z A-Z 0-9]{1,200}" name="sma_namasekolah" id="sma_namasekolah" placeholder="Masukan Nama Sekolah" required></textarea>
                          </div>
                           <font style="color: #007bff" size="2px">*Wajib Diisi </font><br>
                            <span class="fa fa-info-circle" data-toggle="penjelasan" title="inputan hanya boleh huruf dan angka"></span><font color="red" size="2px"><div class="spinner-grow text-danger spinner-grow-sm" id="growspinner" role="status"><span class="sr-only">Loading...</span> </div>*inputan hanya boleh huruf, angka dan terdiri dari 200 karakter </font>
                          <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                  </div>


                  <div class="form-group col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                          <label for="Jurusan">Jurusan:</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-chalkboard-teacher"></i></span>
                              </div>
                              <input type="text" class="form-control" name="sma_jurusan" placeholder="Masukan Jurusan" required>
                            </div>
                            <font style="color: #007bff" size="2px">*Wajib Diisi</font>
                              <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                  </div>

                  <div class="form-group col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                          <label for="tahun_mulai">Mulai Pendidikan :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-hourglass-start"></i></span>
                            </div>
                            <input type="date" class="form-control" name="sma_tahunmulai" value="" placeholder="Pilih Tanggal" required> 
                          </div>
                          <font style="color: #007bff" size="2px">*Wajib Diisi</font>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                  </div>

                  <div class="form-group col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                          <label for="tahun_selesai">Selesai Pendidikan :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-hourglass-end"></i></span>
                          </div>
                          <input type="date" class="form-control" name="sma_tahunselesai" value=""  placeholder="Pilih Tanggal" required>
                        </div>
                        <font style="color: #007bff" size="2px">*Wajib Diisi</font>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div id="step-3" style="padding: 0">
              <input type="hidden" name="typependidikanlanjut" value="1">
              <p style="margin-bottom: 1px;"><span class="badge badge-warning">Sekolah Perguruan Tinggi/Pendidikan Lanjut:</span>
                  
              </p>
            <div class="shadow-sm p-3 mb-5 bg-light rounded mx-auto">
              <div id="form-step-2" role="form" data-toggle="validator" class="row">

                  <div class="form-group col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                          <label for="nama_perguruantinggi">Nama Lengkap Perguruan Tinggi :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-university"></i></span>
                          </div>
                          <textarea class="form-control"  pattern="[a-z A-Z 0-9]{1,200}" name="pt_nama[]" id="diploma_namaperguruan" placeholder="Masukan Nama Perguruan Tinggi" required></textarea>
                        </div>
                         <font style="color: #007bff" size="2px">*Wajib Diisi </font><br>
                            <span class="fa fa-info-circle" data-toggle="penjelasan" title="inputan hanya boleh huruf dan angka"></span><font color="red" size="2px"><div class="spinner-grow text-danger spinner-grow-sm" id="growspinner" role="status"><span class="sr-only">Loading...</span> </div>*inputan hanya boleh huruf, angka dan terdiri dari 200 karakter </font>
                          <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                  </div>

                  <div class="form-group col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                          <label for="Tingkat">Tingkat</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-graduation-cap"></i></span>
                          </div>
                          <select class="form-control" name="pt_jenjang[]" required>
                            <option value="">--Pilih Jenjang Pendidikan--</option>
                            <option value="S3">Doktoral (S3)</option>
                            <option value="S2">Magister (S2)</option>
                            <option value="S1">Sarjana (S1)</option>
                            <option value="D4">Diploma (D4)</option>
                            <option value="D3">Diploma (D3)</option>
                            <option value="D2">Diploma (D2)</option>
                            <option value="D1">Diploma (D1)</option>
                            

                          </select>
                        </div>
                          <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                  </div>

                   <div class="form-group col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                          <label for="Program Studi">Program Studi :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-chalkboard-teacher"></i></span>
                          </div>
                          <input type="text" class="form-control" name="pt_studi[]"  placeholder="Masukan Program Studi" required>
                        </div>
                          <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                  </div>

                  <div class="form-group col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                          <label for="ipk">IPK :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-star"></i></span>
                          </div>
                          <input type="text" class="form-control" name="pt_ipk[]" placeholder="Masukan IPK"  maxlength="5" required>
                        </div>
                          <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                  </div>

                  <div class="form-group col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                          <label for="tahun_mulai">Mulai Pendidikan :</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-hourglass-start"></i></span>
                            </div>
                            <input type="date" class="form-control" name="pt_mulai[]" value="" placeholder="Pilih Tanggal" autocomplete="off" required> 
                          </div>
                          <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                  </div>

                  <div class="form-group col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                          <label for="tahun_selesai">Selesai Pendidikan :</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-hourglass-end"></i></span>
                            </div>
                            <input type="date" class="form-control" name="pt_selesai[]" value=""  placeholder="Pilih Tanggal" autocomplete="off" required>
                          </div>
                              <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                  </div>

                 

                  </div>
                   <button class="add_form_field btn btn-outline-success btn-xs">Tambah Jenjang Pendidikan Lanjut
                          <span style="font-size:16px; font-weight:bold;">+</span>
                  </button>
                  <div class="container1">
                       
                  </div>

                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>


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
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
<script type="text/javascript">


 $(document).ready(function(){

        // Toolbar extra buttons
        /*var btnFinish = $('<button type="button"></button>').text('Finish')
                                         .addClass('btn btn-info')
                                         .on('click', function(){
                                                if( !$(this).hasClass('disabled')){
                                                    var elmForm = $("#myFormpendidikan");
                                                    if(elmForm){
                                                        elmForm.validator('validate');

                                                        var elmErr = elmForm.find('.has-error');
                                                        if(elmErr && elmErr.length > 0){

                                                          const Toast = Swal.mixin({
                                                            toast: true,
                                                            position: 'top-end',
                                                            showConfirmButton: false,
                                                            timer: 3000
                                                          });
                                                          Toast.fire({
                                                            type: 'error',
                                                            title: 'Terjadi Kesalahan, Lengkapi Data Yang Bersifat Wajib Harap Periksa kembali'
                                                          })

                                                            return false;
                                                        }else{

                                                            Swal.fire({
                                                              title: 'Apakah Anda Yakin ?',
                                                              text: "Pastikan Data Yang Dimasukan Sudah Benar",
                                                              type: 'warning',
                                                              showCancelButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              cancelButtonColor: '#d33',
                                                              confirmButtonText: 'Iya, Saya Yakin!',
                                                              cancelButtonText: 'Ngak Jadi Deh'
                                                            }).then((result) => {
                                                              if (result.value) {
                                                                elmForm.submit();
                                                                return false;
                                                              }else{
                                                                Swal.fire(
                                                                  'success!',
                                                                  'Cieee.. Ngak Jadi.',
                                                                  'success'
                                                                )
                                                              }
                                                            })
                                                        }
                                                    }
                                                }
                                            });*/

        
        var btnCancel = $('<button type="button"></button>').text('Reset ulang')
                                         .addClass('btn btn-danger')

                                         .on('click', function(){
                                          Swal.fire({
                                            title: 'Apakah Kamu Yakin?',
                                            text: "Data Yang Anda Masukan Akan Direset Ulang!",
                                            type: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Iya, Reset Semua Step!',
                                            cancelButtonText: 'Ngak Jadi Deh'
                                          }).then((result) => {
                                            if (result.value) {
                                              $('#smartwizard').smartWizard("reset");
                                              $('#myFormpendidikan').find("input:not([type='radio']), textarea, select").val("");
                                              //$('#myForm').find(".agama").val("");
                                              $('#myFormpendidikan').find('input:checkbox').prop('checked', false);
                                              $('#myFormpendidikan').find('input:radio').prop('checked', false);
                                              Swal.fire(
                                                'Deleted!',
                                                'Data Berhasil Direset.',
                                                'success'
                                              )
                                            }else{
                                              Swal.fire(
                                                'success!',
                                                'Cieee.. Ngak Jadi.',
                                                'success'
                                              )
                                            }
                                          })
                                        });

        var btnLangsungSimpan = $('<button type="button"></button> ').text('Simpan')
                                         .addClass('btn btn-primary')
                                         .on('click', function(){
                                                if( !$(this).hasClass('disabled')){
                                                    var elmForm = $("#myFormpendidikan");

                                                    Swal.fire({
                                                      title: 'Apakah Anda Yakin ?',
                                                      text: "Pastikan Data Yang Dimasukan Sudah Benar",
                                                      type: 'warning',
                                                      showCancelButton: true,
                                                      confirmButtonColor: '#3085d6',
                                                      cancelButtonColor: '#d33',
                                                      confirmButtonText: 'Iya, Saya Yakin!',
                                                      cancelButtonText: 'Ngak Jadi Deh'
                                                    }).then((result) => {
                                                      if (result.value) {
                                                        elmForm.submit();
                                                        return false;
                                                      }else{
                                                        Swal.fire(
                                                          'success!',
                                                          'Cieee.. Ngak Jadi.',
                                                          'success'
                                                        )
                                                      }
                                                    })
                                                    
                                                }
                                            });

        // Smart Wizard
        $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'arrows',
                transitionEffect:'fade',
                toolbarSettings: {toolbarPosition: 'bottom',
                                  toolbarExtraButtons: [ btnCancel, btnLangsungSimpan]
                                },
                anchorSettings: {
                            markDoneStep: true, // add done css
                            markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                            removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                            enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                        }
             });

        $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
            var elmForm = $("#form-step-" + stepNumber);
            // stepDirection === 'forward' :- this condition allows to do the form validation
            // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
           
            if(stepDirection === 'forward' && elmForm){
                elmForm.validator('validate');
                //step1
                var elmErr = elmForm.children('.has-error');
                if(elmErr && elmErr.length > 0){
                    // Form validation failed
                    return false;

                }

            }
            return true;
        });

        $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
            // Enable finish button only on last step
            if(stepNumber == 4){
                $('.btn-finish').removeClass('disabled');
            }else{
                $('.btn-finish').addClass('disabled');
            }
        });

});


jQuery( document ).ready(function( $ ) {
 
    $(document).on('submit', '#myFormpendidikan', function(e) {  
      e.preventDefault();
      var route = $('#myFormpendidikan').data('route');
      var routeback = $('#myFormpendidikan').data('routeback');
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
                    $('#pendidikan').modal('hide');
                    window.location.href = routeback;
                  }
                })
            $('#cekoverlay').remove();
            $('#pendidikan').modal('hide');
            $('#datatables').DataTable().ajax.reload();
                }, 1000);

          },
          complete: function() {
                    $.unblockUI();
                    window.location.href = routeback;
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Menyimpan Data", "error");
                    $('.overlay').remove();
                },

      })
    });

    $(function () {
      $('[data-toggle="penjelasan"]').tooltip()
    })

    //Tambah Jenjang Pendidikan
    $(document).ready(function() {
        var max_fieldspend = 5;
        var wrapperpend = $(".container1");
        var add_buttonpend = $(".add_form_field");

        var x = 1;
        $(add_buttonpend).click(function(e) {
            e.preventDefault();
            if (x < max_fieldspend) {
                //$(".tahuntambah").attr("id", "tahuntambah"+x);
                x++;
                $(wrapperpend).append(' <hr><div class="row">'+
              
                '<div class="col-md-4">'+
                '<div class="form-group" >'+
                  '<label for="nama_perguruantinggi">Nama Lengkap Perguruan Tinggi:</label>'+
                  '<div class="input-group">'+
                    '<div class="input-group-prepend">'+
                      '<span class="input-group-text"><i class="fa fa-university"></i></span>'+
                   '</div>'+
                   '<textarea class="form-control" name="pt_nama[]"  placeholder="Masukan Nama Perguruan Tinggi" required=""></textarea>'+
                  '</div>'+
                    '<font style="color: #007bff" size="2px">*Wajib Diisi </font><br>'+
                            '<span class="fa fa-info-circle" data-toggle="penjelasan" title="inputan hanya boleh huruf dan angka"></span><font color="red" size="2px"><div class="spinner-grow text-danger spinner-grow-sm" id="growspinner" role="status"><span class="sr-only">Loading...</span> </div>*inputan hanya boleh huruf, angka dan terdiri dari 200 karakter </font>'+
                         '<div class="help-block with-errors text-danger"></div>'+
                  '</div>'+
                '</div>'+

                '<div class="col-md-4">'+
                 '<div class="form-group" >'+
                    '<label for="Tingkat">Tingkat</label>'+
                    '<div class="input-group">'+
                      '<div class="input-group-prepend">'+
                        '<span class="input-group-text"><i class="fa fa-graduation-cap"></i></span>'+
                      '</div>'+
                      '<select class="form-control" name="pt_jenjang[]" required="">'+
                        '<option value="">--Pilih Jenjang Pendidikan--</option>'+
                        '<option value="S3">Doktoral (S3)</option>'+
                        '<option value="S2">Magister (S2)</option>'+
                        '<option value="S1">Sarjana (S1)</option>'+
                        '<option value="D4">Diploma (D4)</option>'+
                        '<option value="D3">Diploma (D3)</option>'+
                        '<option value="D2">Diploma (D2)</option>'+
                        '<option value="D1">Diploma (D1)</option>'+
                      '</select>'+
                    '</div>'+
                      '<div class="help-block with-errors text-danger"></div>'+
                    '</div>'+
                '</div>'+

                '<div class="col-md-4">'+
                  '<div class="form-group" >'+
                    '<label for="Program Studi">Program Studi:</label>'+
                    '<div class="input-group">'+
                      '<div class="input-group-prepend">'+
                        '<span class="input-group-text"><i class="fa fa-chalkboard-teacher"></i></span>'+
                      '</div>'+
                      '<input type="text" class="form-control" name="pt_studi[]" id="" placeholder="Masukan Program Studi" required>'+
                    '</div>'+
                     '<div class="help-block with-errors text-danger"></div>'+
                    '</div>'+
                '</div>'+

                '<div class="col-md-4">'+
                '<div class="form-group" >'+
                    '<label for="ipk">IPK :</label>'+
                    '<div class="input-group">'+
                      '<div class="input-group-prepend">'+
                        '<span class="input-group-text"><i class="fa fa-star"></i></span>'+
                      '</div>'+
                      '<input type="text" class="form-control" name="pt_ipk[]" id="" placeholder="Masukan IPK"  maxlength="5" required>'+
                    '</div>'+
                      '<div class="help-block with-errors text-danger"></div>'+
                    '</div>'+
                '</div>'+

                '<div class="col-md-4">'+
                  '<div class="form-group" >'+
                      '<label for="tahun_mulai">Mulai Pendidikan :</label>'+
                      '<div class="input-group">'+
                        '<div class="input-group-prepend">'+
                          '<span class="input-group-text"><i class="fa fa-hourglass-start"></i></span>'+
                        '</div>'+
                        '<input type="date" class="form-control" name="pt_mulai[]" placeholder="Pilih Tanggal" required=""> '+
                      '</div>'+
                      '<div class="help-block with-errors text-danger"></div>'+
                    '</div>'+
                  '</div>'+

                  '<div class="col-md-4">'+
                  '<div class="form-group" >'+
                    '<label for="tahun_selesai">Selesai Pendidikan :</label>'+
                    '<div class="input-group">'+
                      '<div class="input-group-prepend">'+
                        '<span class="input-group-text"><i class="fa fa-hourglass-end"></i></span>'+
                      '</div>'+
                     '<input type="date" class="form-control" id="" name="pt_selesai[]"  placeholder="Pilih Tanggal" required="">'+
                    '</div>'+
                        '<div class="help-block with-errors text-danger"></div>'+
                    '</div>'+

                '</div>'+
                '<a href="#" class="deletepend123 btn btn-danger btn-xs" title="Hapus Tambahan Pendidikan Lanjut"><span class="fa fa-trash"> </span</a>'+
                '<div>'
                ); //add input box
            } else {
                alert('Melebihi Batas Maksimum')
            }
        });
      
      $(wrapperpend).on("click", ".deletepend123", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
       
    });
    

 
    $('#smp_namasekolah').keyup(validateTextarea);

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

    $('#sma_namasekolah').keyup(validateTextarea2);

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

    $('#diploma_namaperguruan').keyup(validateTextarea3);

    function validateTextarea3() {
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