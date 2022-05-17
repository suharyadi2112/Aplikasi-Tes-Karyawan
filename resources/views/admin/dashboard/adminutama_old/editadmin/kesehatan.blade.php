@extends('admin.layout.masteradmin')

@section('content') 
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel shadow-sm">
        
        <form role="form" method="POST" action="{{ Route('viewdatakesehatanau') }}">
          @csrf
          <div class="col-sm-4" >
            <input type="hidden" name="id_user" value="{{ $id_user }}">
            <button type="submit" class="btn"><span class="fa fa-arrow-left"></span> <u>kembali</u></button>
          </div>
        </form>

        <form data-route="{{ route('updateKesehatanau' , ['id'=>$id_user]) }}"  id="myFormEditKesehatan" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
          {{ csrf_field() }}
       
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
                          <input type="checkbox" id="checkboxPrimary1" value="Asma," name="asma" class="flat" 
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
                          <input type="checkbox" id="checkboxPrimary2" value="Malaria," name="malaria" class="flat"
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
                          <input type="checkbox" id="checkboxPrimary3" value="TBC," name="tbc" class="flat"  
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
                          <input type="checkbox" id="checkboxPrimary4" value="Ginjal," name="ginjal" class="flat"
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
                              <input type="checkbox" id="checkboxPrimary5" value="Patah Tulang," name="patah_tulang" class="flat"  
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
                              <input type="checkbox" id="checkboxPrimary6" value="Ayan," name="ayan" class="flat"  

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
                              <input type="checkbox" id="checkboxPrimary7" value="Insomnia," name="insomnia" class="flat"  

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
                              <input type="checkbox" id="checkboxPrimary9" value="Gangguan Berjalan," name="gangguan_berjalan" class="flat" 
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
                            <input type="checkbox" id="checkboxPrimary10" value="Radang Tenggorokan," name="radang_tenggorokan" class="flat"  

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
                              <input type="checkbox" id="checkboxPrimary11" value="Demam Berdarah," name="demam_berdarah" class="flat" 

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
                              <input type="checkbox" id="checkboxPrimary12" value="Migrain," name="migrain" class="flat" 
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
                              <input type="checkbox" id="checkboxPrimary13" value="Cacat Tubuh," name="cacat_tubuh" class="flat" 
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
                              <input type="checkbox" id="checkboxPrimary14" value="Jantung," name="jantung" class="flat"  
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
                              <input type="checkbox" id="checkboxPrimary15" value="Hepatitis," name="hepatitis" class="flat"  
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
                              <input type="checkbox" id="checkboxPrimary16" value="Lambung," name="lambung" class="flat"  
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
                          
                          </td>
                        </tbody>
                     
                  </table>

               
                  <textarea class="form-control" id="penyakit_lainnya" name="lainnya" placeholder="masukan penyakit lainnya" >{{ $penyakit_lainnya }}</textarea>
                </div>

              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Ubah Data Kesehatan</button>
          </div>
        </form>

      </div>
    </div>  
  </div>
</div>
@endsection
@section('script')
<script>
  //edit data kesehatan
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


     $(document).on('submit', '#myFormEditKesehatan', function(e) {  
        e.preventDefault();
        var route = $('#myFormEditKesehatan').data('route');
        var form_data = $(this);
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
                        padding: '5px', 
                        backgroundColor: '#000', 
                        '-webkit-border-radius': '5px', 
                        '-moz-border-radius': '5px', 
                        opacity: .5, 
                        color: '#fff' 
                    } }); 
            },
            success: function(Response){
              console.log(Response);
              
              Swal.fire({
                    title: 'Berhasil !',
                    text: "Data Berhasil Diupdate",
                    type: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Oke'
                  }).then((result) => {
                    if (result.value) {
                    }
                  })
              setTimeout(location.reload.bind(location), 2000);
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
            complete: function() {
                      $.unblockUI();
                      setTimeout(location.reload.bind(location), 2000);
                  },
            error: function(xhr) { // if error occured
                      swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                  },

        })
      });
    
    
</script>
  
</script>

@include('sweet::alert')
@endsection