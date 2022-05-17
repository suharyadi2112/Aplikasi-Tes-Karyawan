@extends('admin.layout.master')
@section('content')

<div class="content-header">
 
</div>
<div id="giftes" style="display: none;">
    <img src="{{ asset('admin/dist/img/logo2.gif') }}"/>
    <h3>Sedang Menyimpan Data</h3>
   
</div>
<div class="container-fluid">
      <!-- left column -->
  <div class="col-md-11 mx-auto">
    <!-- general form elements -->
    <div class="card card-danger">
      
      <div class="card-header bg-info">
        <h3 class="card-title">Pengalaman Kerja & Organisasi</h3>
      </div>

      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        *Aktifkan Toggle  -<input data-width="30" type="checkbox" data-toggle="toggle" data-on="on" data-onstyle="success" data-size="mini" checked="">- Terlebih Dahulu Untuk Mengisi Form <br>
        *Jika Anda <b><u>Tidak Memiliki</u></b> Pengalaman Kerja Ataupun Organisasi Apapun, Anda Bisa Langung Meng-klik Button <b>"Simpan Data Pengalaman Kerja Dan Organisasi"</b> Dibawah Form Ini
      </div>
      
      <!-- /.card-header -->
          <!-- form start -->
      <form data-route="{{ route('postDatapengalamankerja') }}" data-routeback="{{ route('pemohonindex') }}" id="pengalamankerja" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
        
        <div class="shadow card-body bg-white text-dark ">

                <div class="row">
                  <div class="col-md-2">
                      <div style="margin-bottom: 1px;"><span class="badge badge-info">Bidang Pendidikan :</span></div>
                      <input id="pendidikan" data-width="130" type="checkbox" data-toggle="toggle" data-on="Saya Punya" data-off="Tidak Punya" data-onstyle="success" data-offstyle="danger">
                  </div>
                  <div class="col-md-2">
                      <div style="margin-bottom: 1px;"><span class="badge badge-warning">Bidang Non Pendidikan :</span></div>
                      <input id="nonpendidikan" data-width="130" type="checkbox" data-toggle="toggle" data-on="Saya Punya" data-off="Tidak Punya" data-onstyle="success" data-offstyle="danger">
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <div style="margin-bottom: 1px;"><span class="badge badge-success">Organisasi :</span></div>
                      <input id="organisasi" data-width="130" type="checkbox" data-toggle="toggle" data-on="Saya Punya" data-off="Tidak Punya" data-onstyle="success" data-offstyle="danger">
                    </div>
                </div>
              </div>
              <!--tambah form-->
                @csrf
                <div class="pk_pendidikan" id="pk_pendidikan" style="display: none;">
                <fieldset id="fieldsetpendidikan" disabled>
                  <input type="hidden" name="typependidikan" value="1">
                    <h5>Bidang Pendidikan (Sekolah/Perguruan Tinggi) :</h5>
                    <div style="margin-bottom: 1px;"><span class="badge badge-info">Bidang Pendidikan :</span></div>
                     <div class="shadow p-2 mb-2  rounded mx-auto row" style="width: 100%; background-color: #e8f3ff">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Nama Sekolah/Perguruan Tinggi :</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-university"></i></span>
                                </div>
                                <textarea class="form-control" name="nama_sekolah[]" id="abcd" pattern="[a-z A-Z 0-9]{1,200}" placeholder="Masukan Nama Sekolah/Perguruan Tinggi" required=""></textarea>

                              </div>
                              <!-- /.input group -->
                              <font style="color: #007bff" size="2px">*Wajib Diisi | </font>
                                <span class="fa fa-info-circle" data-toggle="penjelasan" title="inputan hanya boleh huruf dan angka"></span><font color="red" size="2px"><div class="spinner-grow text-danger spinner-grow-sm" id="growspinner" role="status"><span class="sr-only">Loading...</span> </div>*inputan hanya boleh huruf, angka dan terdiri dari 200 karakter </font>
                              <div class="help-block with-errors text-danger"></div>
                             </div>
                            <!-- /.form group -->
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Jabatan</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-user-tie"></i></span>
                                </div>
                                <input type="text" class="form-control" name="jenis_pekerjaan[]"placeholder="Masukan Jabatan" required="" >
                              </div>
                              <!-- /.input group -->
                              <font size="2" color="red">*jabatan wajib diisi</font>
                             </div>
                            <!-- /.form group -->
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Mata Kuliah/Pelajaran :</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-book-reader"></i></span>
                                </div>
                                <input type="text" class="form-control" name="jenis_pelajaran[]" placeholder="Masukan Nama Mata Pelajaran/Mata Kuliah" required="" />
                              </div>
                              <!-- /.input group -->
                              <font size="2" color="red">*mata kuliah/pelajaran wajib diisi</font>
                             </div>
                            <!-- /.form group -->
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Gaji (Bulanan):</label>
                                 <input type="text" class="js-range-slider" id="demo_0" name="gaji[]" value="" required="" />
                              <!-- /.input group -->
                              <font size="2" color="red">*gaji wajib diisi</font>
                             </div>
                            <!-- /.form group -->
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Waktu Mulai Kerja :</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" name="pk_pend_mulai[]" required="" />
                              </div>
                              <!-- /.input group -->
                              <font size="2" color="red">*mulai kerja wajib diisi</font>
                             </div>
                            <!-- /.form group -->
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Waktu Selesai Kerja:</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" name="pk_pend_selesai[]" required="" />
                              </div>
                              <!-- /.input group -->
                              <font size="2" color="red">*selesai kerja wajib diisi</font>
                             </div>
                            <!-- /.form group -->
                          </div>

                        <div class="col-md-4">
                            <div class="form-group">
                            <button class="tambahpendpkbp btn btn-outline-success btn-xs">Tambah Pengalaman Kerja Bidang Pendidikan Lainnya
                                    <span style="font-size:16px; font-weight:bold;">+</span>
                            </button>
                            
                          </div>
                        </div>
                    </div>

                    <div class="containerpkbp ">
                    </div>
                  </fieldset>
                </div>

                <!-- Pengalaman kerja Bidang Non Pendidikan-->
                <div class="pk_non_pendidikan" id="pk_non_pendidikan" style="display: none;">
                <hr>
                <fieldset id="fieldsetnonpendidikan" disabled>
                <h5>Bidang Non Pendidikan (Perusahaan Swasta Atau Lainnya) :</h5>
                  <div style="margin-bottom: 1px;"><span class="badge badge-warning">Bidang Non Pendidikan :</span></div>
                   <div class="shadow p-2 mb-2 bg-light rounded mx-auto row" style="width: 100%">
                    <input type="hidden" name="typenonpendidikan" value="1">
                        <div class="col-md-5">
                          <div class="form-group">
                            <label>Nama Perusahaan :</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-building"></i></span>
                              </div>
                              <textarea  class="form-control" name="nama_perusahaan_np[]" id="efgh" pattern="[a-z A-Z 0-9]{1,200}" placeholder="Masukan Nama Perusahaan" required=""></textarea>
                            </div>
                            <font style="color: #007bff" size="2px">*Wajib Diisi | </font>
                                <span class="fa fa-info-circle" data-toggle="penjelasan" title="inputan hanya boleh huruf dan angka"></span><font color="red" size="2px"><div class="spinner-grow text-danger spinner-grow-sm" id="growspinner" role="status"><span class="sr-only">Loading...</span> </div>*inputan hanya boleh huruf, angka dan terdiri dari 200 karakter </font>
                              <div class="help-block with-errors text-danger"></div>
                            <!-- /.input group -->
                           </div>
                          <!-- /.form group -->
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Jabatan</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user-tie"></i></span>
                              </div>
                              <input type="text" class="form-control" name="Jabatan_np[]" placeholder="Masukan Nama Jabatan" required="" />
                            </div>
                            <!-- /.input group -->
                            <font size="2" color="red">*jabatan wajib diisi</font>
                           </div>
                          <!-- /.form group -->
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Gaji (Bulanan):</label>
                              <input type="text" class="js-range-slider" id="demo_1" name="gaji_np[]" value="" required="" />
                            <!-- /.input group -->
                            <font size="2" color="red">*gaji wajib diisi</font>
                           </div>
                           <!-- /.form group -->
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <label>Deskripsi Tanggung Jawab Kerja :</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-sticky-note"></i></span>
                              </div>
                              <textarea class="form-control" name="deskripsi_np[]" placeholder="Masukan Deskripsi Kerja Ditempat Sebelumnya" required=""></textarea>
                            </div>
                            <!-- /.input group -->
                            <font size="2" color="red">*deskripsi tanggung jawab kerja wajib diisi</font>
                           </div>
                          <!-- /.form group -->
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Waktu Mulai Kerja :</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                              </div>
                              <input type="date" class="form-control" name="mulai_np[]" required=""/>
                            </div>
                            <!-- /.input group -->
                            <font size="2" color="red">*waktu mulai kerja wajib diisi</font>
                           </div>
                          <!-- /.form group -->
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Waktu Selesai Kerja:</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                              </div>
                              <input type="date" class="form-control" name="selesai_np[]" required="" />
                            </div>
                            <!-- /.input group -->
                            <font size="2" color="red">*waktu selesai kerja wajib diisi</font>
                           </div>
                          <!-- /.form group -->
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Alasan Pindah :</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-exchange-alt"></i></span>
                              </div>
                              <textarea class="form-control" name="alasan_pindah[]" placeholder="Masukan Alasan Pindah Dari Perusahaan Lama" required=""></textarea>
                            </div>
                            <!-- /.input group -->
                            <font size="2" color="red">*alasan pindah wajib diisi</font>
                           </div>
                          <!-- /.form group -->
                        </div>

                     
                      <div class="col-md-4">
                          <div class="form-group">
                          <button class="tambahpendpknp btn btn-outline-success btn-xs">Tambah Pengalaman Kerja Bidang Non Pendidikan Lainnya
                                  <span style="font-size:16px; font-weight:bold;">+</span>
                          </button>
                          
                        </div>
                      </div>
                  </div>

                  <div class="containerpknp ">
                  </div>
                </fieldset>
                </div>

                <!-- Pengalaman Organisasi-->
                <div class="pk_organisasi" id="pk_organisasi" style="display: none;">
                <hr>
                <fieldset id="fieldsetorganisasi" disabled>
                <h5>Pengalaman Berorganisasi :</h5>
                  <div style="margin-bottom: 1px;"><span class="badge badge-success">Organisasi :</span></div>
                   <div class="shadow p-2 mb-2 rounded mx-auto row" style="width: 100%; background-color: #feffc5">
                    <input type="hidden" name="typeorganisasi" value="1">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Nama Organisasi :</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-users"></i></span>
                              </div>
                              <input type="text" class="form-control" name="nama_organisasi[]" id="ijkl" pattern="[a-z A-Z 0-9]{1,200}" placeholder="Masukan Nama Organisasi" required="" />
                            </div>
                            <!-- /.input group -->
                             <font style="color: #007bff" size="2px">*Wajib Diisi | </font>
                                <span class="fa fa-info-circle" data-toggle="penjelasan" title="inputan hanya boleh huruf dan angka"></span><font color="red" size="2px"><div class="spinner-grow text-danger spinner-grow-sm" id="growspinner" role="status"><span class="sr-only">Loading...</span> </div>*inputan hanya boleh huruf, angka dan terdiri dari 200 karakter </font>
                              <div class="help-block with-errors text-danger"></div>
                           </div>
                          <!-- /.form group -->
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Posisi Organisasi</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user-tie"></i></span>
                              </div>
                              <input type="text" class="form-control" name="posisi_organisasi[]" placeholder="Masukan Posisi Dalam Organisasi" required="" />
                            </div>
                            <!-- /.input group -->
                            <font size="2" color="red">*posisi organisasi wajib diisi</font>
                           </div>
                          <!-- /.form group -->
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Kota Organisasi</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-city"></i></span>
                              </div>
                              <input type="text" class="form-control" name="kotaorganisasi[]" placeholder="Masukan Kota Organisasi" required="" />
                            </div>
                            <!-- /.input group -->
                            <font size="2" color="red">*kota organisasi wajib diisi</font>
                           </div>
                          <!-- /.form group -->
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Deskripsi Tugas Organisasi :</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-sticky-note"></i></span>
                              </div>
                              <textarea class="form-control" name="deskripsitugasorganisasi[]" placeholder="Masukan Deksipsi Tugas Dalam Organisasi" required=""></textarea>
                            </div>
                            <!-- /.input group -->
                            <font size="2" color="red">*deskripsi tugas organisasi wajib diisi</font>
                           </div>
                          <!-- /.form group -->
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Waktu Mulai Organisasi :</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                              </div>
                              <input type="date" class="form-control" name="mulaiorganisasi[]" required="" />
                            </div>
                            <!-- /.input group -->
                            <font size="2" color="red">*waktu mulai ikut organisasi wajib diisi</font>
                           </div>
                          <!-- /.form group -->
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Waktu Selesai Organisasi:</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                              </div>
                              <input type="date" class="form-control" name="selesaiorganisasi[]" required="" />
                            </div>
                            <!-- /.input group -->
                            <font size="2" color="red">*waktu selesai dalam organisasi wajib diisi</font>
                           </div>
                          <!-- /.form group -->
                        </div>

                     
                      <div class="col-md-4">
                          <div class="form-group">
                          <button class="tambahoragnisasi btn btn-outline-success btn-xs">Tambah Pengalaman Organisasi Lainnya
                                  <span style="font-size:16px; font-weight:bold;">+</span>
                          </button>
                          
                        </div>
                      </div>
                  </div>

                  <div class="containerorganisasi ">
                  </div>
                </fieldset>
                </div>
              
               <div class="card-footer" style="float: right;">
                  
                  <a href="{{{ route('pemohonindex') }}}" title="Cancel">
                    <span class="btn btn-danger"><i class="fa fa-back"> Cancel </i></span>
                  </a>  
                  <button type="submit" class="btn btn-primary" >Simpan Data Pengalaman Kerja Dan Organisasi</button>

              </div>

            </div>

        </form>
      </div>
    </div>
</div>


@endsection
@section('script')
<script>
   $("#demo_0").ionRangeSlider({
        min: 100000,
        max: 20000000,
        from: 100000,
        skin: "round",
        max_postfix: "+",
        prefix: "Rp.",
    });
</script>
<script>
   $("#demo_1").ionRangeSlider({
        min: 100000,
        max: 20000000,
        from: 100000,
        skin: "round",
        max_postfix: "+",
        prefix: "Rp.",
    });
</script>

<script>
  //pengalaman kerja bidang pendidikan
    $(document).ready(function() {
        var max_fieldspkbp = 10;
        var wrapperpkbp = $(".containerpkbp");
        var add_buttonpkbp = $(".tambahpendpkbp");

        var x = 1;
        $(add_buttonpkbp).click(function(e) {
            e.preventDefault();
            if (x < max_fieldspkbp) {
                //$(".tahuntambah").attr("id", "tahuntambah"+x);
                x++;
                $(wrapperpkbp).append('<div>'+
              '<div style="margin-bottom: 1px;"><span class="badge badge-info">Bidang Pendidikan :</span></div>'+
                '<div class="shadow p-2 mb-2 rounded mx-auto row" style="width: 100%;  background-color: #e8f3ff">'+
                 
                  '<div class="col-md-4">'+
                          '<div class="form-group">'+
                            '<label>Nama Sekolah/Perguruan Tinggi :</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<span class="input-group-text"><i class="fa fa-university"></i></span>'+
                              '</div>'+
                              '<textarea class="form-control" name="nama_sekolah[]" id="abcd'+x+'" pattern="[a-z A-Z 0-9]{1,200}" placeholder="Masukan Nama Sekolah/Perguruan Tinggi" required=""></textarea>'+
                            '</div>'+
                            '<!-- /.input group -->'+
                            '<font style="color: #007bff" size="2px">*Wajib Diisi | </font>'+
                                '<span class="fa fa-info-circle" data-toggle="penjelasan" title="inputan hanya boleh huruf dan angka"></span><font color="red" size="2px"><div class="spinner-grow text-danger spinner-grow-sm" id="growspinner" role="status"><span class="sr-only">Loading...</span> </div>*inputan hanya boleh huruf, angka dan terdiri dari 200 karakter </font>'+
                              '<div class="help-block with-errors text-danger"></div>'+
                           '</div>'+
                          '<!-- /.form group -->'+
                        '</div>'+
                        '<div class="col-md-4">'+
                          '<div class="form-group">'+
                            '<label>Jabatan</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<span class="input-group-text"><i class="fa fa-user-tie"></i></span>'+
                              '</div>'+
                              '<input type="text" class="form-control" name="jenis_pekerjaan[]" required="" placeholder="Masukan Jabatan">'+
                            '</div>'+
                            '<!-- /.input group -->'+
                            '<font size="2" color="red">*jabatan wajib diisi</font>'+
                           '</div>'+
                          '<!-- /.form group -->'+
                        '</div>'+
                        '<div class="col-md-4">'+
                          '<div class="form-group">'+
                            '<label>Mata Kuliah/Pelajaran :</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<span class="input-group-text"><i class="fa fa-book-reader"></i></span>'+
                              '</div>'+
                             '<input type="text" class="form-control" name="jenis_pelajaran[]" placeholder="Masukan Nama Mata Pelajaran/Mata Kuliah" required/>'+
                            '</div>'+
                            '<font size="2" color="red">*mata kuliah/pelajaran wajib diisi</font>'+
                           '</div>'+
                        '</div>'+
                        '<div class="col-md-4">'+
                          '<div class="form-group">'+
                            '<label>Gaji (Bulanan):</label>'+
                               '<input type="text" class="js-range-slider" id="demo'+x+'" name="gaji[]" value="" required/>'+
                           '<font size="2" color="red">*gaji wajib diisi</font>'+
                           '</div>'+
                        '</div>'+
                        '<div class="col-md-4">'+
                          '<div class="form-group">'+
                            '<label>Waktu Mulai Kerja :</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>'+
                              '</div>'+
                              '<input type="date" class="form-control" name="pk_pend_mulai[]" required="" />'+
                            '</div>'+
                            '<font size="2" color="red">*mulai kerja wajib diisi</font>'+
                           '</div>'+
                        '</div>'+
                        '<div class="col-md-4">'+
                          '<div class="form-group">'+
                            '<label>Waktu Selesai Kerja:</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>'+
                              '</div>'+
                              '<input type="date" class="form-control" name="pk_pend_selesai[]" required="" />'+
                            '</div>'+
                            '<font size="2" color="red">*selesai kerja wajib diisi</font>'+
                           '</div>'+
                        '</div>'+



                    '</div>'+
                    '<a href="#" class="deletepend btn btn-danger btn-xs"><span class="fa fa-trash"</span></a>'+
                '</div>'

                ); //add input box
            } else {
                alert('Melebihi Batas Maksimum')
            }

            $('#demo'+x+'').ionRangeSlider({
                min: 100000,
                max: 30000000,
                max_postfix: "+",
                from: 100000,
                skin: "round",
                prefix: "Rp.",
            });


        }); 

       $(wrapperpkbp).on("click", ".deletepend", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })


       $(add_buttonpkbp).click(function(e) {
            e.preventDefault();
             $('#abcd'+x+'').keyup(abcdabcd);

              function abcdabcd() {
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

         //Validasi input text area
    $('#abcd').keyup(abcd);

    function abcd() {
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

      //pengalaman kerja non pendidikan
      $(document).ready(function() {
          var max_fieldspknp = 10;
          var wrapperpknp = $(".containerpknp");
          var add_buttonpknp = $(".tambahpendpknp");

          var x = 1;
          $(add_buttonpknp).click(function(e) {
              e.preventDefault();
              if (x < max_fieldspknp) {
                  //$(".tahuntambah").attr("id", "tahuntambah"+x);
                  x++;
                  $(wrapperpknp).append('<div>'+
                '<div style="margin-bottom: 1px;"><span class="badge badge-warning">Bidang Non Pendidikan :</span></div>'+
                  '<div class="shadow p-2 mb-2 bg-light rounded mx-auto row" style="width: 100%">'+
                   
                    '<div class="col-md-5">'+
                        '<div class="form-group">'+
                          '<label>Nama Perusahaan :</label>'+
                          '<div class="input-group">'+
                            '<div class="input-group-prepend">'+
                              '<span class="input-group-text"><i class="fa fa-building"></i></span>'+
                            '</div>'+
                            '<textarea  class="form-control" name="nama_perusahaan_np[]" id="efgh'+x+'" pattern="[a-z A-Z 0-9]{1,200}" placeholder="Masukan Nama Perusahaan" required=""></textarea>'+
                          '</div>'+
                          '<font style="color: #007bff" size="2px">*Wajib Diisi | </font>'+
                                '<span class="fa fa-info-circle" data-toggle="penjelasan" title="inputan hanya boleh huruf dan angka"></span><font color="red" size="2px"><div class="spinner-grow text-danger spinner-grow-sm" id="growspinner" role="status"><span class="sr-only">Loading...</span> </div>*inputan hanya boleh huruf, angka dan terdiri dari 200 karakter </font>'+
                              '<div class="help-block with-errors text-danger"></div>'+
                         '</div>'+
                      '</div>'+
                      '<div class="col-md-4">'+
                        '<div class="form-group">'+
                          '<label>Jabatan</label>'+
                          '<div class="input-group">'+
                            '<div class="input-group-prepend">'+
                              '<span class="input-group-text"><i class="fa fa-user-tie"></i></span>'+
                            '</div>'+
                            '<input type="text" class="form-control" name="Jabatan_np[]" placeholder="Masukan Nama Jabatan" required="" />'+
                          '</div>'+
                          '<font size="2" color="red">*jabatan wajib diisi</font>'+
                         '</div>'+
                      '</div>'+
                      '<div class="col-md-3">'+
                        '<div class="form-group">'+
                          '<label>Gaji (Bulanan):</label>'+
                            '<input type="text" class="js-range-slider" id="demo2'+x+'" name="gaji_np[]" value="" required/>'+
                            '<font size="2" color="red">*gaji wajib diisi</font>'+
                          '</div>'+
                      '</div>'+
                      '<div class="col-md-5">'+
                        '<div class="form-group">'+
                          '<label>Deskripsi Tanggung Jawab Kerja :</label>'+
                          '<div class="input-group">'+
                            '<div class="input-group-prepend">'+
                              '<span class="input-group-text"><i class="fa fa-sticky-note"></i></span>'+
                            '</div>'+
                            '<textarea class="form-control" name="deskripsi_np[]" placeholder="Masukan Deskripsi Kerja Ditempat Sebelumnya" required></textarea>'+
                          '</div>'+
                          '<font size="2" color="red">*deskripsi tanggung jawab kerja wajib diisi</font>'+
                         '</div>'+
                      '</div>'+
                      '<div class="col-md-4">'+
                        '<div class="form-group">'+
                          '<label>Waktu Mulai Kerja :</label>'+
                          '<div class="input-group">'+
                            '<div class="input-group-prepend">'+
                              '<span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>'+
                            '</div>'+
                            '<input type="date" class="form-control" name="mulai_np[]" required="" />'+
                          '</div>'+
                          '<font size="2" color="red">*waktu mulai kerja wajib diisi</font>'+
                         '</div>'+
                      '</div>'+
                      '<div class="col-md-3">'+
                        '<div class="form-group">'+
                          '<label>Waktu Selesai Kerja:</label>'+
                          '<div class="input-group">'+
                            '<div class="input-group-prepend">'+
                              '<span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>'+
                            '</div>'+
                            '<input type="date" class="form-control" name="selesai_np[]" required="" />'+
                          '</div>'+
                          '<font size="2" color="red">*waktu selesai kerja wajib diisi</font>'+
                         '</div>'+
                      '</div>'+

                      '<div class="col-md-12">'+
                        '<div class="form-group">'+
                          '<label>Alasan Pindah :</label>'+
                          '<div class="input-group">'+
                            '<div class="input-group-prepend">'+
                              '<span class="input-group-text"><i class="fa fa-exchange-alt"></i></span>'+
                            '</div>'+
                            '<textarea class="form-control" name="alasan_pindah[]" placeholder="Masukan Alasan Pindah Dari Perusahaan Lama" required></textarea>'+
                          '</div>'+
                          '<font size="2" color="red">*alasan pindah wajib diisi</font>'+
                         '</div>'+
                      '</div>'+

                    '</div>'+
                    '<a href="#" class="deletenonpend btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>'+
                  '</div>'

                  ); //add input box
              } else {
                  alert('Melebihi Batas Maksimum')
              }

               $('#demo2'+x+'').ionRangeSlider({
                min: 100000,
                max: 30000000,
                from: 100000,
                max_postfix: "+",
                skin: "round",
                prefix: "Rp.",
            });


          }); 

           $(wrapperpknp).on("click", ".deletenonpend", function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })

          $(add_buttonpknp).click(function(e) {
            e.preventDefault();
             $('#efgh'+x+'').keyup(efghefgh);

              function efghefgh() {
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
      
  
    $('#efgh').keyup(abcd); 

    function efgh() {
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


      //pengalaman Berorganisasi
      $(document).ready(function() {
          var max_fieldorganisasi = 10;
          var wrapperorganisasi = $(".containerorganisasi");
          var add_buttonorganisasi = $(".tambahoragnisasi");

          var x = 1;
          $(add_buttonorganisasi).click(function(e) {
              e.preventDefault();
              if (x < max_fieldorganisasi) {
                  //$(".tahuntambah").attr("id", "tahuntambah"+x);
                  x++;
                  $(wrapperorganisasi).append('<div>'+
                

                '<div style="margin-bottom: 1px;"><span class="badge badge-success">Organisasi :</span></div>'+
                        '<div class="shadow p-2 mb-2 rounded mx-auto row" style="width: 100%; background-color:#feffc5">'+
                   
                          '<div class="col-md-6">'+
                          '<div class="form-group">'+
                            '<label>Nama Organisasi :</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<span class="input-group-text"><i class="fa fa-users"></i></span>'+
                              '</div>'+
                              '<input type="text" class="form-control" name="nama_organisasi[]" id="ijkl'+x+'" pattern="[a-z A-Z 0-9]{1,200}" placeholder="Masukan Nama Organisasi" required="" />'+
                            '</div>'+
                            '<font style="color: #007bff" size="2px">*Wajib Diisi | </font>'+
                                '<span class="fa fa-info-circle" data-toggle="penjelasan" title="inputan hanya boleh huruf dan angka"></span><font color="red" size="2px"><div class="spinner-grow text-danger spinner-grow-sm" id="growspinner" role="status"><span class="sr-only">Loading...</span> </div>*inputan hanya boleh huruf, angka dan terdiri dari 200 karakter </font>'+
                              '<div class="help-block with-errors text-danger"></div>'+
                           '</div>'+
                        '</div>'+
                        '<div class="col-md-3">'+
                          '<div class="form-group">'+
                            '<label>Posisi Organisasi</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<span class="input-group-text"><i class="fa fa-user-tie"></i></span>'+
                              '</div>'+
                              '<input type="text" class="form-control" name="posisi_organisasi[]" placeholder="Masukan Posisi Dalam Organisasi" required="" />'+
                            '</div>'+
                            '<font size="2" color="red">*posisi organisasi wajib diisi</font>'+
                           '</div>'+
                        '</div>'+
                        '<div class="col-md-3">'+
                          '<div class="form-group">'+
                            '<label>Kota Organisasi</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<span class="input-group-text"><i class="fa fa-city"></i></span>'+
                              '</div>'+
                              '<input type="text" class="form-control" name="kotaorganisasi[]" placeholder="Masukan Kota Organisasi" required="" />'+
                            '</div>'+
                            '<font size="2" color="red">*kota organisasi wajib diisi</font>'+
                           '</div>'+
                        '</div>'+
                        '<div class="col-md-6">'+
                          '<div class="form-group">'+
                            '<label>Deskripsi Tugas Organisasi :</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<span class="input-group-text"><i class="fa fa-sticky-note"></i></span>'+
                              '</div>'+
                              '<textarea class="form-control" name="deskripsitugasorganisasi[]" placeholder="Masukan Deksipsi Tugas Dalam Organisasi" required></textarea>'+
                            '</div>'+
                            '<font size="2" color="red">*deskripsi tugas organisasi wajib diisi</font>'+
                           '</div>'+
                        '</div>'+
                        '<div class="col-md-3">'+
                          '<div class="form-group">'+
                            '<label>Waktu Mulai Organisasi :</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>'+
                              '</div>'+
                              '<input type="date" class="form-control" name="mulaiorganisasi[]" required="" />'+
                            '</div>'+
                            '<font size="2" color="red">*waktu ikut mulai organisasi wajib diisi</font>'+
                           '</div>'+
                        '</div>'+
                        '<div class="col-md-3">'+
                          '<div class="form-group">'+
                            '<label>Waktu Selesai Organisasi:</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>'+
                              '</div>'+
                              '<input type="date" class="form-control" name="selesaiorganisasi[]" required="" />'+
                            '</div>'+
                            '<font size="2" color="red">*waktu selesai dalam organisasi wajib diisi</font>'+
                           '</div>'+
                        '</div>'+
  
                        '</div>'+


                        '<a href="#" class="deleteorganisasi btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>'+
                  '</div>'
                  

                  ); //add input box
              } else {
                  alert('Melebihi Batas Maksimum')
              }
          }); 
            $(wrapperorganisasi).on("click", ".deleteorganisasi", function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })

          $(add_buttonorganisasi).click(function(e) {
            e.preventDefault();
             $('#ijkl'+x+'').keyup(ijklijkl);

              function ijklijkl() {
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
  
    $('#ijkl').keyup(ijkl);

    function ijkl() {
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



     $('#pendidikan').change(function() {
        //$('#console-event').html('Toggle: ' + $(this).prop('checked'))
        if (document.getElementById('pendidikan').checked == true) {
          $("#pk_pendidikan").show();
          document.getElementById('fieldsetpendidikan').removeAttribute('disabled','disabled');
        }else{
          $("#pk_pendidikan").hide();
          document.getElementById('fieldsetpendidikan').setAttribute('disabled','disabled');
        }
      });



      $('#nonpendidikan').change(function() {
        //$('#console-event').html('Toggle: ' + $(this).prop('checked'))
        if (document.getElementById('nonpendidikan').checked == true) {
          $("#pk_non_pendidikan").show();
          document.getElementById('fieldsetnonpendidikan').removeAttribute('disabled','disabled');
        }else{
          $("#pk_non_pendidikan").hide();
          document.getElementById('fieldsetnonpendidikan').setAttribute('disabled','disabled');
        }
      });


       $('#organisasi').change(function() {
        //$('#console-event').html('Toggle: ' + $(this).prop('checked'))
        if (document.getElementById('organisasi').checked == true) {
          $("#pk_organisasi").show();
          document.getElementById('fieldsetorganisasi').removeAttribute('disabled','disabled');
        }else{
          $("#pk_organisasi").hide();
          document.getElementById('fieldsetorganisasi').setAttribute('disabled','disabled');
        }
      });


       $(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-Token' : $("input[name='_token'").attr('value')
                }
            });
              $('#pengalamankerja').submit(function(e){
                var route = $('#pengalamankerja').data('route');
                var routeback = $('#pengalamankerja').data('routeback');
                var form_data = $(this);

                  $.ajax({

                    type: 'POST',
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
                      //console.log(Response);
                      //setTimeout($.unblockUI, 1000); 
                    
                      Swal.fire({
                            title: 'Berhasil !',
                            text: "Data Berhasil Disimpan",
                            type: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Oke'
                          }).then((result) => {
                            if (result.value) {
                              window.location.href = routeback;
                            }
                          })

                    },
                    complete: function() {
                              $.unblockUI();
                              
                              
                          },
                    error: function(xhr) { // if error occured
                              swal.fire("Upsss!", "Terjadi kesalahan Dalam Menyimpan Data", "error");
                          },

                })

                e.preventDefault();
              });


 
  
});
     
</script>

<!--script src="{{ URL::asset('js/postdatapengalamankerja.js')}}" type="text/javascript"></script-->

@include('sweet::alert')
@endsection