<div id="modalpencapaian" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h2 class="modal-title">Data Pencapaian (Achievement)</h2>

        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('postDatapencapaian') }}" data-routeback="{{ route('pemohonindex') }}" id="myFormpencapaian" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          *Aktifkan Toggle  -<input data-width="30" type="checkbox" data-toggle="toggle" data-on="on" data-onstyle="success" data-size="mini" checked="">- Terlebih Dahulu Untuk Mengisi Form <br>
          *Jika Anda <b><u>Tidak Memiliki</u></b> Pencapaian(Achievement) Apapun, Anda Bisa Langung Menyimpan Dengan Meng-klik Button <b>"Simpan Data Pencapaian"</b> Dibawah Form Ini
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 1px;">
            
         
          <input id="toggle-pencapaian" data-width="100" type="checkbox" data-toggle="toggle" data-on="Punya" data-off="Tidak Punya" data-onstyle="success" data-offstyle="danger" >
          <fieldset id="pencapaian" disabled>
            <hr>
              <div style="margin-bottom: 1px;"><span class="badge badge-primary">Achievement :</span></div>
               <div class="shadow p-1 mb-1 bg-light rounded mx-auto row" style="width: 100%"> 
                <input type="hidden" name="typepencapaian" value="1">
                  <div class="col-md-4">
                      <div class="form-group">
                        <label>Bidang/Nama Pencapaian :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-medal"></i></span>
                          </div>
                          <textarea  class="form-control" name="bidang_penghargaan[]" id="nmpencapaian" pattern="[a-z A-Z 0-9]{1,200}" placeholder="Masukan Bidang Pencapaian" required=""></textarea>
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
                        <label>Bentuk Penghargaan :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-trophy"></i></span>
                          </div>
                          <textarea  class="form-control" name="bentuk_penghargaan[]" placeholder="Masukan Bentuk Penghargaan Yang Diterima" required=""></textarea>
                        </div>
                        <font size="2" color="red">*bentuk penghargaan wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tahun Penghargaan :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                          </div>
                          <input  class="form-control" type="date" name="tahun_penghargaan[]" placeholder="Masukan Tahun Penerimaan Penghargaan" required="">
                        </div>
                        <font size="2" color="red">*tahun penghargaan wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>

                    <div class="col-md-4">
                          <div class="form-group">
                          <button class="tambahpencapaian btn btn-outline-success btn-xs">Tambah Pencapaian(Achievement) Lainnya
                                  <span style="font-size:16px; font-weight:bold;">+</span>
                          </button>
                          
                        </div>
                    </div>

                </div>
                  <div class="containerpencapaian ">
                  </div>
              </fieldset>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data Pencapaian</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

  