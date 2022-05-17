
@extends('admin.layout.masteradmin')

@section('content') 

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <a href="{{{ Route('indextambahankategori', ['id_user' => $id_user]) }}}" title="Kembali"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel shadow-sm">
            <div class="x_title">

                <h2>Kategori<small>setup</small></h2>
                <div class="clearfix"></div>
              </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box">

                        <form data-route="{{ route('tambahankategori') }}"  id="tamkat" role="form" method="POST" accept-charset="utf-8">
                        {{ csrf_field() }}

                        <div class="overlaymodal">
                          
                        </div>
                              <input type="hidden" name="id_user" value="{{ $id_user }}">
                              <input type="hidden" name="typetamkatsol" value="1">

                              <div class="shadow-sm p-2 mb-1 bg-light rounded row mx-auto" style="width: 100%">

                                <div class="col-md-6">
                                  <div class="form-group" >
                                    <label for="detail_ptk">Detail Calon : </label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                      </div>
                                      <input type="text" class="form-control" name="detail_ptk" placeholder="Masukan Detail " required/>
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
                                      <select class="form-control" name="kategori" id="kategori" required>
                                        <option value="" >------Pilih Kategorinya-----</option>
                                          @foreach ($kategori as $b)
                                          <option value="{{$b->id_kategori}}">{{$b->nama_kategori}}</option>                                        
                                          @endforeach
                                      </select>
                                    </div>
                                      <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>

                                 <div class="col-md-12">
                                  <br><hr>
                                    <div class="form-group" >
                                      <label for="soal">Soal | <font size="2" color="red">Pilih kategori terlebih dahulu </font>|</label>
                                      <font size="2" color="orange">Tulisan dengan blok warna kuning kemungkinan mengalami perubahan</font></label>
                                      <div class="input-group" id="cekhasil">
                                        
                                      </div>
                                    </div>
                                  </div>

                                </div>

                           <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan Kategori & Soal</button>
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
  </div>



@endsection
@section('script')

<script type="text/javascript">

jQuery( document ).ready(function( $ ) {

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

          type: 'POST',
          url: route,
          data: form_data.serialize(),

          beforeSend: function(){

            $(wrapper).append(  '<b><center>Sedang Menyimpan Data...</center></b>');

          },
          success: function(Response){
            setTimeout($.unblockUI, 1000); 
            
            Swal.fire({
                  title: 'Berhasil !',
                  text: "Data Berhasil Disimpan",
                  type: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Oke'
                }).then((result) => {
                  if (result.value) {
                    $('.overlay').remove();
                    $('#tambahkatsoal').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                  }
                })
            $('#tambahkatsoal').modal('hide');
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


});
</script>

@endsection