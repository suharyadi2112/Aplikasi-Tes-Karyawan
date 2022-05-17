<div id="nonformal" class="modal fade" role="dialog">

  <div class="modal-dialog modal-xl">

    <div class="modal-content">

      <div class="modal-header bg-info">

        <h2 class="modal-title">Data Pendidikan NON FORMAL</h2>



        <button type="button" class="close" data-dismiss="modal">&times;</button> 

        </div>



        <form data-route="{{ route('postDatapendnonformal') }}" data-routeback="{{ route('pemohonindex') }}" 

        id="myFormpendnonformal" role="form" data-toggle="validator" method="post" accept-charset="utf-8">

        {{ csrf_field() }}

        <div class="overlaymodal">

          

        </div>

        <div class="alert alert-danger alert-dismissible">

          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

          *Aktifkan Toggle  -<input data-width="30" type="checkbox" data-toggle="toggle" data-on="on" data-onstyle="success" data-size="mini" checked="">- Terlebih Dahulu Untuk Mengisi Form <br>

          *Semua Form Yang Aktif Wajib Untuk Diisi<br>

          *Jika Anda <b><u>Tidak Memiliki</u></b> Pendidikan Non Formal Apapun, Anda Bisa Langung Meng-klik Button <b>"Simpan Data Pendidikan Non Formal"</b> Dibawah Form Ini

        </div>

        <div class="modal-body mx-auto">

          <div class="card-body row" style="padding: 5px;">



          <!-------------------------------Sekolah Menengah Pertama------------------------------>

          

           <p style="margin-bottom: 1px;"><span class="badge badge-info">Pendidikan Non Formal :</span>

              <input id="toggle-pendnonformal" data-width="30" type="checkbox" data-toggle="toggle" data-on='<span class="fa fa-check"</span>' data-off='<span class="fa fa-times"</span>' data-onstyle="success" data-offstyle="danger" data-size="mini">

           </p>

           <fieldset id="fieldsetpendnonformal" disabled>

            <div class="shadow p-1 mb-1 bg-light rounded row mx-auto" style="width: 100%">

              <input type="hidden" name="typenonformal" value="1">

                <div class="col-md-6">

                  <div class="form-group" >

                    <label for="Jenis Pelatihan">Jenis/Nama Pelatihan :</label>

                    <div class="input-group">

                      <div class="input-group-prepend">

                        <span class="input-group-text"><i class="fa fa-award"></i></span>

                      </div>

                      <textarea class="form-control" pattern="[a-z A-Z 0-9]{1,200}" name="jenis_pelatihan[]" id="pendnonformal" placeholder="Masukan Nama Pelatihan" required=""></textarea>

                    </div>

                      <font style="color: #007bff" size="2px">*Wajib Diisi | </font>
                        <span class="fa fa-info-circle" data-toggle="penjelasan" title="inputan hanya boleh huruf dan angka"></span><font color="red" size="2px"><div class="spinner-grow text-danger spinner-grow-sm" id="growspinner" role="status"><span class="sr-only">Loading...</span> </div>*inputan hanya boleh huruf, angka dan terdiri dari 200 karakter </font>
                      <div class="help-block with-errors text-danger"></div>

                    </div>

                </div>

                <div class="col-md-6">

                  <div class="form-group" >

                    <label for="Nama Penyelenggara">Nama Penyelenggara :</label>

                    <div class="input-group">

                      <div class="input-group-prepend">

                        <span class="input-group-text"><i class="fa fa-building"></i></span>

                      </div>

                      <textarea class="form-control" name="nama_penyelenggara[]" id="nama_penyelenggara" placeholder="Masukan Nama Penyelenggara" required=""></textarea>

                    </div>

                      <font color="red" size="2">*wajib diisi</font><br>

                      <div class="help-block with-errors text-danger"></div>

                    </div>

                </div>

                <div class="col-md-4">

                  <div class="form-group" >

                    <label for="Kota">Kota :</label>

                    <div class="input-group">

                      <div class="input-group-prepend">

                        <span class="input-group-text"><i class="fa fa-city"></i></span>

                      </div>

                      <textarea class="form-control" name="kota[]" placeholder="masukan kota penyelenggara" required=""></textarea>

                    </div>

                      <font color="red" size="2">*wajib diisi</font><br>

                      <div class="help-block with-errors text-danger"></div>

                    </div>

                </div>

                <div class="col-md-4">

                  <div class="form-group" >

                    <label for="Mulai Pelatihan">Mulai Pelatihan :</label>

                    <div class="input-group">

                      <div class="input-group-prepend">

                        <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>

                      </div>

                      <input type="date" name="nf_mulai[]" class="form-control" required="">

                    </div>

                      <font color="red" size="2">*wajib diisi</font><br>

                      <div class="help-block with-errors text-danger"></div>

                    </div>

                </div>

                <div class="col-md-4">

                  <div class="form-group" >

                    <label for="Selesai Pelatihan">Selesai Pelatihan :</label>

                    <div class="input-group">

                      <div class="input-group-prepend">

                        <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>

                      </div>

                      <input type="date" name="nf_selesai[]" class="form-control" required="">

                    </div>

                      <font color="red" size="2">*wajib diisi</font><br>

                      <div class="help-block with-errors text-danger"></div>

                    </div>

                </div>

                 <button class="tambahpendnf btn btn-outline-success btn-xs">Tambah Pendidikan Non Formal Lainnya

                        <span style="font-size:16px; font-weight:bold;">+</span>

                </button>

              </div>

               



                <div class="container2">

                     

                </div>



            </fieldset>



          </div>

        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-primary">Simpan Data Pendidikan Non Formal</button>

        </div>

      </form>

      

    </div>

  </div>

</div>



  