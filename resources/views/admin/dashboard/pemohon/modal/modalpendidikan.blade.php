<div id="pendidikan" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header bg-info">
          <h2 class="modal-title">Data Pendidikan</h2>

          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          *Aktifkan Toggle  -<input data-width="30" type="checkbox" data-toggle="toggle" data-on='<span class="fa fa-check"</span>' data-off='<span class="fa fa-times"</span>' data-onstyle="success" data-size="mini" checked="">- Terlebih Dahulu Untuk Mengisi Form <br>
          *Semua Form Yang Aktif Wajib Untuk Diisi<br>
          *Jika Anda <b><u>Tidak Memiliki</u></b> Pendidikan Apapun, Anda Bisa Langung Menyimpan Dengan Meng-klik Button <b>"Simpan Data Pendidikan"</b> Dibawah Form Ini
        </div>
      

        <form data-route="{{ route('postDatapendidikan') }}" data-routeback="{{ route('pemohonindex') }}" id="myFormpendidikan" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">

          <!-------------------------------Sekolah Menengah Pertama------------------------------>

           <p style="margin-bottom: 1px;"><span class="badge badge-info">Sekolah Menegah Pertama(SMP) :</span>
            <input id="toggle-smp" data-width="30" type="checkbox" data-toggle="toggle" data-on='<span class="fa fa-check"</span>' data-off='<span class="fa fa-times"</span>' data-onstyle="success" data-offstyle="danger" data-size="mini">
           </p>
           

           <fieldset id="fieldsetsmp" disabled>
            <input type="hidden" name="typesmp" value="1">
            <div class="shadow p-1 mb-1  rounded row mx-auto" style="width: 100%; background-color: #e8f3ff">
              
              
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="nama_sekolah">Nama Sekolah Smp:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-university"></i></span>
                      </div>
                      <textarea class="form-control" name="smp_namasekolah" id="smp_namasekolah" placeholder="Masukan Nama Sekolah" required></textarea>
                    </div>
                      <div class="help-block with-errors text-danger"></div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group" >
                        <label for="tahun_mulai">Mulai Pendidikan :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-hourglass-start"></i></span>
                          </div>
                          <input type="date" class="form-control" name="smp_tahunmulai" value=""  placeholder="Pilih Tanggal" autocomplete="off" required>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                      </div>
                    </div>
                  <div class="col-md-4">
                    <div class="form-group" >
                      <label for="tahun_selesai">Selesai Pendidikan :</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-hourglass-end"></i></span>
                        </div>
                        <input type="date" class="form-control" name="smp_tahunselesai" value=""  placeholder="Pilih Tanggal" autocomplete="off" required>
                      </div>
                          <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
              
              </div>
            </fieldset>


            <!-------------------------------Sekolah Menengah Atas------------------------------>
            <p style="margin-bottom: 1px;"><span class="badge badge-warning">Sekolah Menegah Atas(SMA) :</span>
              <input id="toggle-sma" data-width="30" type="checkbox" data-toggle="toggle" data-on='<span class="fa fa-check"</span>' data-off='<span class="fa fa-times"</span>' data-onstyle="success" data-offstyle="danger" data-size="mini">
            </p>

            <fieldset id="fieldsetsma" disabled>
              <input type="hidden" name="typesma" value="1">
              <div class="shadow p-1 mb-1  rounded row mx-auto" style="width: 100%; background-color: #feffc5">

                <div class="col-md-3">
                  <div class="form-group" >
                    <label for="nama_sekolah">Nama Sekolah Sma:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-university"></i></span>
                      </div>
                      <textarea class="form-control" name="sma_namasekolah" id="sma_namasekolah" placeholder="Masukan Nama Sekolah" required></textarea>
                    </div>
                      <div class="help-block with-errors text-danger"></div>
                    </div>
                  </div>

                 <div class="col-md-3">
                    <div class="form-group" >
                      <label for="Jurusan">Jurusan:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-chalkboard-teacher"></i></span>
                        </div>
                        <input type="text" class="form-control" name="sma_jurusan" placeholder="Masukan Jurusan" required>
                      </div>
                        <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
               
                  <div class="col-md-3">
                    <div class="form-group" >
                        <label for="tahun_mulai">Mulai Pendidikan :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-hourglass-start"></i></span>
                          </div>
                          <input type="date" class="form-control" name="sma_tahunmulai" value="" placeholder="Pilih Tanggal" required> 
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                      </div>
                    </div>
                  <div class="col-md-3">
                    <div class="form-group" >
                      <label for="tahun_selesai">Selesai Pendidikan :</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-hourglass-end"></i></span>
                        </div>
                        <input type="date" class="form-control" name="sma_tahunselesai" value=""  placeholder="Pilih Tanggal" required>
                      </div>
                          <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
                </div>
              </fieldset>

            <!-------------------------------Diploma------------------------------>
            <p style="margin-bottom: 1px;"><span class="badge badge-primary">Jenjang Pendidikan Lanjut :</span>
              <input id="toggle-perting" data-width="30" type="checkbox" data-toggle="toggle" data-on='<span class="fa fa-check"</span>' data-off='<span class="fa fa-times"</span>' data-onstyle="success" data-offstyle="danger" data-size="mini">
            </p>
            <fieldset id="fieldsetperguruantinggi" disabled>
              <input type="hidden" name="typependidikanlanjut" value="1">
              <div class="shadow p-1 mb-1 bg-light rounded row mx-auto" style="width: 100%">

                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="nama_perguruantinggi">Nama Perguruan Tinggi :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-university"></i></span>
                      </div>
                      <textarea class="form-control" name="pt_nama[]" id="diploma_namaperguruan" placeholder="Masukan Nama Perguruan Tinggi" required></textarea>
                    </div>
                      <div class="help-block with-errors text-danger"></div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group" >
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

                 <div class="col-md-4">
                    <div class="form-group" >
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

                <div class="col-md-4">
                  <div class="form-group" >
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

                  <div class="col-md-4">
                    <div class="form-group" >
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

                  <div class="col-md-4">
                    <div class="form-group" >
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

                  <button class="add_form_field btn btn-outline-success btn-xs">Tambah Jenjang Pendidikan Lanjut
                        <span style="font-size:16px; font-weight:bold;">+</span>
                  </button>

                </div>
              <div class="container1">
                       
              </div>
              </fieldset>


          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan Data Pendidikan</button>
        </div>
      </form>
      
    </div>
  </div>
</div>

  