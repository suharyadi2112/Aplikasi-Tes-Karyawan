@extends('admin.layout.master')
@section('content')

<div class="content-header">
 
</div>
<div id="giftes" style="display: none;">
    <!--img src="{{ asset('admin/dist/img/giftes.gif') }}" /-->
    <img src="{{ asset('admin/dist/img/logo2.gif') }}"/>
    <h3>Sedang Mengupdate Data</h3>
   
</div>
<div class="container-fluid">
      <!-- left column -->
  <div class="col-md-11 mx-auto">
    <!-- general form elements -->
    <div class="card card-danger">
      
      <div class="card-header bg-info">
        <h3 class="card-title">Update Data Kesehatan</h3>
      </div>
  
     <form data-route="{{ route('updateKesehatan' , ['id'=>$id_user]) }}" data-routeback="{{ route('pemohonindex') }}" id="myFormEditKesehatan" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Periksa Kembali Sebelum Melakukan Perubahan
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 1px;">
            <div class="form-group clearfix" id="jenispenyakit" >
              <table border="0" class="table table-striped ">
                <thead class="bg-info">
                  <th colspan="6"><center>Jenis Penyakit dan Kelainan Fisik</center></th>
                </thead>
                  <tbody>
                    <td>
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary1" value="Asma," name="asma" class="group1" 
                      <?php $Asma = strpos($nama_penyakit,'Asma'); ?>

                      @if($Asma === false)
                        
                      @else
                       checked="checked"
                      @endif

                      >
                      <label for="checkboxPrimary1">
                        Asma
                      </label>
                    </div>
                    </td>

                    <td>
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary2" value="Malaria," name="malaria" class="group1"
                      <?php $Malaria = strpos($nama_penyakit,'Malaria'); ?>

                      @if($Malaria === false)
                        
                      @else
                       checked="checked"
                      @endif

                      >
                      <label for="checkboxPrimary2">
                        Malaria
                      </label>
                    </div>
                    </td>
                    <td>
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary3" value="TBC," name="tbc" class="group1"  
                      <?php $TBC = strpos($nama_penyakit,'TBC'); ?>

                      @if($TBC === false)
                        
                      @else
                       checked="checked"
                      @endif
                      >
                      <label for="checkboxPrimary3">
                        TBC
                      </label>
                    </div>
                    </td>
                    <td>
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary4" value="Ginjal," name="ginjal" class="group1"
                     <?php $Ginjal = strpos($nama_penyakit,'Ginjal'); ?>

                      @if($Ginjal === false)
                        
                      @else
                       checked="checked"
                      @endif
                        >
                      <label for="checkboxPrimary4">
                        Ginjal
                      </label>
                    </div>
                    </td>
                    </tbody>
                    <tbody>
                      <td>
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="checkboxPrimary5" value="Patah Tulang," name="patah_tulang" class="group1"  
                          <?php $PatahTulang = strpos($nama_penyakit,'Patah Tulang'); ?>

                          @if($PatahTulang === false)
                            
                          @else
                           checked="checked"
                          @endif
                          >
                          <label for="checkboxPrimary5">
                            Patah Tulang
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="checkboxPrimary6" value="Ayan," name="ayan" class="group1"  

                          <?php $Ayan = strpos($nama_penyakit,'Ayan'); ?>

                          @if($Ayan === false)
                            
                          @else
                           checked="checked"
                          @endif
                          >
                          <label for="checkboxPrimary6">
                            Ayan
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="checkboxPrimary7" value="Insomnia," name="insomnia" class="group1"  

                          <?php $Insomnia = strpos($nama_penyakit,'Insomnia'); ?>

                          @if($Insomnia === false)
                            
                          @else
                           checked="checked"
                          @endif
                          >
                          <label for="checkboxPrimary7">
                            Insomnia
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="checkboxPrimary9" value="Gangguan Berjalan," name="gangguan_berjalan" class="group1" 
                          <?php $GangguanBerjalan = strpos($nama_penyakit,'Gangguan Berjalan'); ?>

                          @if($GangguanBerjalan === false)
                            
                          @else
                           checked="checked"
                          @endif
                          >
                          <label for="checkboxPrimary9">
                            Gangguan Berjalan
                          </label>
                        </div>
                      </td>
                  </tbody>
                  <tbody>
                    <td>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary10" value="Radang Tenggorokan," name="radang_tenggorokan" class="group1"  

                        <?php $RadangTenggorokan = strpos($nama_penyakit,'Radang Tenggorokan'); ?>

                        @if($RadangTenggorokan === false)
                          
                        @else
                         checked="checked"
                        @endif
                        >
                        <label for="checkboxPrimary10">
                          Radang Tenggorokan
                        </label>
                      </div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="checkboxPrimary11" value="Demam Berdarah," name="demam_berdarah" class="group1" 

                          <?php $DemamBerdarah = strpos($nama_penyakit,'Demam Berdarah'); ?>

                          @if($DemamBerdarah === false)
                            
                          @else
                           checked="checked"
                          @endif
                          >
                          <label for="checkboxPrimary11">
                            Demam Berdarah
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="checkboxPrimary12" value="Migrain," name="migrain" class="group1" 
                          <?php $Migrain = strpos($nama_penyakit,'Migrain'); ?>

                          @if($Migrain === false)
                            
                          @else
                           checked="checked"
                          @endif
                          >
                          <label for="checkboxPrimary12">
                            Migrain
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="checkboxPrimary13" value="Cacat Tubuh," name="cacat_tubuh" class="group1" 
                          <?php $CacatTubuh = strpos($nama_penyakit,'Cacat Tubuh'); ?>

                          @if($CacatTubuh === false)
                            
                          @else
                           checked="checked"
                          @endif
                          >
                          <label for="checkboxPrimary13">
                            Cacat Tubuh
                          </label>
                        </div>
                      </td>
                    </tbody>
                    <tbody>
                      <td>
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="checkboxPrimary14" value="Jantung," name="jantung" class="group1"  
                          <?php $Jantung = strpos($nama_penyakit,'Jantung'); ?>

                          @if($Jantung === false)
                            
                          @else
                           checked="checked"
                          @endif
                          >
                          <label for="checkboxPrimary14">
                            Jantung
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="checkboxPrimary15" value="Hepatitis," name="hepatitis" class="group1"  
                          <?php $Hepatitis = strpos($nama_penyakit,'Hepatitis'); ?>

                          @if($Hepatitis === false)
                            
                          @else
                           checked="checked"
                          @endif
                          >
                          <label for="checkboxPrimary15">
                            Hepatitis
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="checkboxPrimary16" value="Lambung," name="lambung" class="group1"  
                          <?php $Lambung = strpos($nama_penyakit,'Lambung'); ?>

                          @if($Lambung === false)
                            
                          @else
                           checked="checked"
                          @endif
                          >
                          <label for="checkboxPrimary16">
                            Lambung
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="checkboxPrimary17" class="group1"  
                          @if($penyakit_lainnya)
                            checked="checked"
                          @else
                           
                          @endif>
                          <label for="checkboxPrimary17">
                            Lainnya
                          </label>
                        </div>
                      </td>
                    </tbody>
                 
              </table>

              <div class="form-group" id="penyakitlainnyashow" 
              @if($penyakit_lainnya)
                            
              @else
               style="display: none" 
              @endif
              >
                <label>Penyakit Lainnya..</label>
                <textarea class="form-control" id="penyakit_lainnya" name="lainnya" placeholder="masukan penyakit lainnya" required="" 
                @if($penyakit_lainnya)
                            
                @else
                 disabled="" 
                @endif

                >{{ $penyakit_lainnya }}</textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="{{{ route('pemohonindex') }}}" title="Cancel">
            <span class="btn btn-danger"><i class="fa fa-back"></i> Kembali</span>
          </a> 
          <button type="submit" class="btn btn-primary">Ubah Data Kesehatan</button>
        </div>
      </form>
    </div>
  </div>
</div>



@endsection
@section('script')
<script>
  //edit data kesehatan
     $(document).on('submit', '#myFormEditKesehatan', function(e) {  
        e.preventDefault();
        var route = $('#myFormEditKesehatan').data('route');
        var routeback = $('#myFormEditKesehatan').data('routeback');
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
               $.blockUI({ css: { 
                    border: 'none', 
                    padding: 'none', 
                    backgroundColor: '#000', 
                    '-webkit-border-radius': '10px', 
                    '-moz-border-radius': '10px', 
                    opacity: .6, 
                    color: '#fff',
                    
                },message: $('#giftes') });
            },
            success: function(Response){
              console.log(Response);
              setTimeout(function(){
              
              Swal.fire({
                    title: 'Berhasil !',
                    text: "Data Berhasil Diupdate",
                    type: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Oke'
                  }).then((result) => {
                    if (result.value) {
                      window.location.href = routeback;
                      $("#status_bar").load(location.href + " #status_bar");
                    }
                  })
              $('#datatables').DataTable().ajax.reload();
                  }, 1000);

            },
            complete: function() {
                      $.unblockUI();
                      $("#status_bar").load(location.href + " #status_bar");
                      
                  },
            error: function(xhr) { // if error occured
                      swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                  },

        })
      });
    
     $(document).on('click', '#checkboxPrimary17', function(){
       if (document.getElementById('checkboxPrimary17').checked == true)
          {
            $("#penyakitlainnyashow").show();
            document.getElementById('penyakit_lainnya').removeAttribute('disabled','disabled');
          }else{
            $("#penyakitlainnyashow").hide();
            document.getElementById('penyakit_lainnya').setAttribute('disabled','disabled');
          }
     });
  
</script>

@include('sweet::alert')
@endsection