<div id="modallamaran" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h2 class="modal-title">Data Pekerjaan Yang Dilamar</h2>

        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('postDatapekerjaanyangdilamar') }}" data-routeback="{{ route('pemohonindex') }}" id="myFormpekerjaanyangdilamar" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          *Anda <b><u>Diwajibkan</u></b> Mengisi Form Pekerjaan Yang Dilamar Dibawah Ini Dengan Sejujurnya</b>
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 1px;">
            <div style="margin-bottom: 1px;"><span class="badge badge-primary">Pekerjaan Yang Dilamar :</span></div>
               <div class="shadow p-1 mb-1 bg-light rounded mx-auto row" style="width: 100%"> 
                <input type="hidden" name="typepencapaian" value="1">

                  <div class="col-md-4">
                      <div class="form-group">
                        <label>Tingkat/Jenjang :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-school"></i></span>
                          </div>
                          <select class="form-control" name="tingkat" required>
                              
                              <option value="">-- Silahkan Pilih --</option>
                              <option value="KB-TK">KB-TK</option>
                              <option value="SD">SD</option>
                              <option value="SMP">SMP</option>
                              <option value="SMA">SMA</option>
                              <option value="SMK">SMK</option>
                              <option value="UNIVERSITAS">UNIVERSITAS</option>
                              <option value="LPP">LPP</option>
                              <option value="YAYASAN">YAYASAN</option>

                          </select>
                          
                        </div>
                        <font size="2" color="red">*Tingkat/Jenjang wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Posisi/Jabatan :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user-tie"></i></span>
                          </div>
                          <input type="text" class="form-control" name="posisi" placeholder="masukan Posisi Yang Dilamar" required=""/>
                        </div>
                        <font size="2" color="red">*posisi yang dilamar wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                    

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Penghasilan Yang Diminta Saat Ini :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-hand-holding-usd"></i></span>
                          </div>
                          <input type="number" class="form-control" name="penghasilan" placeholder="masukan penghasilan yang diminta" required="" />
                        </div>
                        <font size="2" color="red">*penghasilan yang diminta wajib diisi</font><br>
                        <font size="2" color="red">*isian berupa angka tanpa titik(.)</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Alasan Melamar Posisi Tersebut :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user-tie"></i></span>
                          </div>
                          <textarea class="form-control" name="alasan_melamar" placeholder="masukan alasan melamar diposisi ini" required></textarea>
                        </div>
                        <font size="2" color="red">*alasan wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Garis Besar/Tanggung Jawab Posisi Yang Dilamar:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user-md"></i></span>
                          </div>
                          <textarea class="form-control" name="tanggung_jawab" placeholder="masukan secara garis beras saja" required></textarea>
                        </div>
                        <font size="2" color="red">*garis besar/tanggung jawab wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>

              </div>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data Pekerjaan Yang Dilamar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

  