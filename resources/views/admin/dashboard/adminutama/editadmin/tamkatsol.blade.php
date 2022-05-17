
@extends('admin.layout.masteradmin')

@section('content') 

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>

    <a href="#" onclick="goBack()" title="Kembali"><i class="fa fa-arrow-circle-left"></i> Kembali</a>

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel shadow-sm">
            <div class="x_title">
                <h2>Edit<small>Tambahan</small></h2>
                <div class="clearfix"></div>
              </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-8">
                      <form data-route="{{ route('edittamkatsol' , ['id' => $model->id_tambahan]) }}"  id="tamkat" role="form" method="POST" accept-charset="utf-8">
                        {{ csrf_field() }}

                      <div class="card-body" style="padding: 5px;">

                        <div class="overlaymodal">
                          
                        </div>

                        <div class="shadow-sm p-2 mb-1 bg-light rounded row mx-auto" style="width: 100%">

                          <div class="col-md-6">
                            <div class="form-group" >
                              <label for="detail_ptk">Detail Calon : </label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $model->detail_ptk }}" name="detail_ptk" placeholder="Masukan Detail" required/>
                              </div>
                                <div class="help-block with-errors text-danger"></div>
                              </div>
                          </div>

                            <div class="col-md-6">
                              <div class="form-group" >
                                <label for="Kategori">Kategori</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-puzzle-piece"></i></span>
                                  </div>
                                  <select class="target form-control" name="kategori" id="kategori" required >
                                      @foreach ($kategori as $b)
                                      <option value="{{$b->id_kategori}}" @if($b->id_kategori==$model->kategori) selected='selected' @endif>{{$b->nama_kategori}}</option>                                        
                                      @endforeach
                                  </select>
                                </div>
                                  <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>

                            <div class="colors">
                            <div class=" col-md-12" >
                              <div class="form-group" >
                                <label for="soal">Soal</label>
                                <div class="input-group" >

                                    <textarea class="textarea123" id="dataphplama" name="soal">{{ $model->soal }}</textarea>

                                </div>
                              </div>
                            </div>
                            </div>



                           <div class="col-md-12">
                              <div class="form-group" >
                                <div class="input-group" id="cekhasil">
                                  
                                </div>
                              </div>
                            </div>


                            <button type="submit" class="btn btn-primary btn-sm btn-flat">Update</button>
                          </div>

                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>  



@endsection
@section('script')

<script>

jQuery( document ).ready(function( $ ) {

      
    $(function() {
        $('#kategori').change(function(){
            $('.colors').hide();
        });
    });

    //EDIT TAMBAHAN SOAL KATEGORI

    $(document).on('submit', '#tamkat', function(e) {  
      e.preventDefault();
      var route = $('#tamkat').data('route');
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

            $(wrapper).append(  '<b><center>Sedang Mengupdate Data...</center></b>');

          },
          success: function(Response){
            setTimeout($.unblockUI, 1000); 
            
            Swal.fire({
                  title: 'Berhasil !',
                  text: "Data Berhasil Diubah",
                  type: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Oke'
                }).then((result) => {
                  if (result.value) {
                    $('.overlay').remove();
                    
                  }
                })
             
             $.blockUI({ css: { 
                border: 'none', 
                padding: '5px', 
                backgroundColor: '#000', 
                '-webkit-border-radius': '5px', 
                '-moz-border-radius': '5px', 
                opacity: .5, 
                color: '#fff' 
            } }); 
          setTimeout(location.reload.bind(location), 2000);
          },
          complete: function() {
          setTimeout(location.reload.bind(location), 2000);    
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                },

      })
    });


    $('#kategori').on('change', function(){
          $.post('{{ URL::to('/ceksoal') }}', {
              type: 'soal', 
              _token: "{{ csrf_token() }}",

              id: $('#kategori').val(),

              beforeSend: function() {
               
              },

              success: function(msg) {
                
              },
            }, 
            function(e){
              $('#cekhasil').html(e);
          });
      });

    //rich textarea
    $('.textarea123').summernote();

    });

    function goBack() {
      window.history.back();
    }


</script>
@endsection
