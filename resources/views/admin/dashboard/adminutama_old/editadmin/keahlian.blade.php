@extends('admin.layout.masteradmin')

@section('content') 

<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="col-md-12 col-sm-12 ">
        <a href="{{{ route('ListPemohon') }}}" title="Kembali"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
        <div class="x_panel shadow-sm">
            <div class="x_title">
              <h2>Data Keahlian Lainnya</h2>
              <div class="clearfix"></div>
            </div>

            <div class="card-body">
              <form data-route="{{ route('updatekeahlianau', ['id' => $id_user]) }}" id="formkahlian" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
                {{ csrf_field() }}
                <table border="0"  class="table table-striped">
                  <thead class="bg-info">
                    
                  </thead>
                  <tbody>
                    <td>
                       <div class="icheck-danger d-inline">
                          <input type="checkbox" id="keahlian1" name="alatmusik" value="Memainkan Alat Musik,"class="flat"

                           <?php $mam = strpos($jenis_keahlian,'Memainkan Alat Musik'); ?>

                            @if($mam === false)
                              
                            @else
                             checked="checked" 
                            @endif

                          >
                          <label for="keahlian1">
                             Memainkan Alat Musik
                          </label>
                        </div>
                    </td>

                    <td>
                       <div class="icheck-danger d-inline">
                          <input type="checkbox" id="keahlian2" name="bernyanyi" value="Bernyanyi,"class="flat"

                          <?php $y = strpos($jenis_keahlian,'Bernyanyi'); ?>

                            @if($y === false)
                              
                            @else
                             checked="checked"
                            @endif

                          >
                          <label for="keahlian2">
                             Bernyanyi
                          </label>
                        </div>
                    </td>

                    <td>
                       <div class="icheck-danger d-inline">
                          <input type="checkbox" id="keahlian3" name="menari" value="Menari,"class="flat"

                          <?php $m = strpos($jenis_keahlian,'Menari'); ?>

                            @if($m === false)
                              
                            @else
                             checked="checked"
                            @endif

                          >
                          <label for="keahlian3">
                             Menari
                          </label>
                        </div>
                    </td>

                    <td>
                       <div class="icheck-danger d-inline">
                          <input type="checkbox" id="keahlian4" name="menjahit" value="Menjahit,"class="flat"

                           <?php $menjahit = strpos($jenis_keahlian,'Menjahit'); ?>

                            @if($menjahit === false)
                              
                            @else
                             checked="checked"
                            @endif

                          >
                          <label for="keahlian4">
                             Menjahit
                          </label>
                        </div>
                    </td>

                    </tbody>
                    <td>
                       <div class="icheck-danger d-inline">
                          <input type="checkbox" id="keahlian5" name="menyulam" value="Menyulam," class="flat"

                          <?php $menyulam = strpos($jenis_keahlian,'Menyulam'); ?>

                            @if($menyulam === false)
                              
                            @else
                             checked="checked"
                            @endif

                          >
                          <label for="keahlian5">
                             Menyulam
                          </label>
                        </div>
                    </td>
                    <td>
                       <div class="icheck-danger d-inline">
                          <input type="checkbox" id="keahlian6" name="memasak" value="Memasak,"class="flat"

                          <?php $memasak = strpos($jenis_keahlian,'Memasak'); ?>

                            @if($memasak === false)
                              
                            @else
                             checked="checked"
                            @endif

                          >
                          <label for="keahlian6">
                             Memasak
                          </label>
                        </div>
                    </td>

                    <td>
                       <div class="icheck-danger d-inline">
                          <input type="checkbox" id="keahlian7" name="melukis" value="Melukis,"class="flat"

                          <?php $melukis = strpos($jenis_keahlian,'Melukis'); ?>

                            @if($melukis === false)
                              
                            @else
                             checked="checked"
                            @endif

                          >
                          <label for="keahlian7">
                             Melukis
                          </label>
                        </div>
                    </td>

                    <td>
                       <div class="icheck-danger d-inline">
                        
                        </div>
                    </td>

                  </tbody>
                </table>
                <div class="form-group" id="keahlianshow" >
                
                  <label>Keahlian Lainnya..</label>
                  <textarea class="form-control" id="keahlian_lainnya" name="keahlianlainnya" placeholder="masukan Keahlian Lainnya Disini" required="">{{ $keahlian_lainnya }}</textarea>
                </div>
                  
                <button type="submit" class="btn btn-primary btn-xs btn-flat"><span class="fa fa-edit"></span> Ubah Data Keahlian</button>

                </form>
              </div>

      </div>
    </div>
  </div>
</div>

@endsection
@section('script')

<!-----------------------EDIT KEAHLIAN LAINNYA--------------->
<script>

    //edit data pendidikan
    $(document).on('submit', '#formkahlian', function(e) {  
      e.preventDefault();
      var route = $('#formkahlian').data('route');
      var form_data = $(this);
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

          },
          success: function(Response){
           Swal.fire({
                  title: 'Berhasil !',
                  text: "Data Berhasil Ubah",
                  type: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Oke'
                }).then((result) => {
                  if (result.value) {
                    setTimeout(location.reload.bind(location), 2000);
                  }
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
                    setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Memproses Data", "error");
                },

      })
    });
  
</script>


@include('sweet::alert')
@endsection