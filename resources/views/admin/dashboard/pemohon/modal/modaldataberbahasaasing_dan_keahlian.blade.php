<div id="modalberbahasaasing_dan_keahlian" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h2 class="modal-title">Data Kemampuan Berbahasa Asing dan Keahlian Lainnya</h2>

        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('postDataBahasaKeahlian') }}" data-routeback="{{ route('pemohonindex') }}" id="bahasa_dan_keahlian_lainnya" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div> 
        <div class="modal-body mx-auto">
         <h5>Kemampuan Dalam Menggunakan Bahasa Asing :</h5>
          <div class="card-body" style="padding: 1px;">
            <div style="margin-bottom: 1px;"><span class="badge badge-primary">Kemampuan Berbahasa Asing :</span></div>
               <div class="shadow p-1 mb-1 bg-light rounded mx-auto row" style="width: 100%"> 
                <input type="hidden" name="typepencapaian" value="1">

                  <div class="col-md-4">
                      <div class="form-group">
                        <label>Jenis Bahasa :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-globe-asia"></i></span>
                          </div>
                          <input type="text" class="form-control" name="jenis_bahasa[]" value="Bahasa Inggris" readonly required>
                          
                        </div>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                   
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tingkat Lisan :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-level-up-alt"></i></span>
                          </div>
                          <select class="form-control" name="lisan_bahasa[]" required>
                            <option value="">--pilih tingkat kemampuan--</option>
                            <option value="BAIK">Baik</option>
                            <option value="CUKUP">Cukup</option>
                            <option value="KURANG">Kurang</option>
                            <option value="TIDAK TAHU">Tidak Tahu</option>
                          </select>
                        </div>
                        <font size="2" color="red">*Tingkat lisan wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                     <div class="col-md-4">
                      <div class="form-group">
                         <label>Tingkat Tulisan :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-level-up-alt"></i></span>
                          </div>
                          <select class="form-control" name="tulisan_bahasa[]" required>
                            <option value="">--pilih tingkat kemampuan--</option>
                            <option value="BAIK">Baik</option>
                            <option value="CUKUP">Cukup</option>
                            <option value="KURANG">Kurang</option>
                            <option value="TIDAK TAHU">Tidak Tahu</option>
                          </select>
                        </div>
                        <font size="2" color="red">*Tingkat Tulisan Wajib Diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>

                    
                     <div class="col-md-4">
                      <div class="form-group">
                        <label>Jenis Bahasa :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-globe-asia"></i></span>
                          </div>
                          <input type="text" class="form-control" name="jenis_bahasa[]" value="Bahasa Mandarin" readonly required>
                          
                        </div>
                        <font size="2" color="red">*bahasa asing wajib diisi</font><br>
                        <font size="2" color="blue">*bahasa inggris & bahasa mandarin lebih diutamakan</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tingkat Lisan :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-level-up-alt"></i></span>
                          </div>
                          <select class="form-control" name="lisan_bahasa[]" required>
                            <option value="">--pilih tingkat kemampuan--</option>
                            <option value="BAIK">Baik</option>
                            <option value="CUKUP">Cukup</option>
                            <option value="KURANG">Kurang</option>
                            <option value="TIDAK TAHU">Tidak Tahu</option>
                          </select>
                        </div>
                        <font size="2" color="red">*Tingkat lisan wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                         <label>Tingkat Tulisan :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-level-up-alt"></i></span>
                          </div>
                          <select class="form-control" name="tulisan_bahasa[]" required>
                            <option value="">--pilih tingkat kemampuan--</option>
                            <option value="BAIK">Baik</option>
                            <option value="CUKUP">Cukup</option>
                            <option value="KURANG">Kurang</option>
                            <option value="TIDAK TAHU">Tidak Tahu</option>
                          </select>
                        </div>
                        <font size="2" color="red">*Tingkat Tulisan Wajib Diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>

                     <button class="tambahbahasa btn btn-outline-success btn-xs">Tambah Kemampuan Berbahasa Asing Lainnya
                        <span style="font-size:16px; font-weight:bold;">+</span>
                     </button>

                  </div>

                  <div class="containertambahbahasa">
                        
                  </div>
                <hr>

                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  *Jika Anda <b><u>Tidak Memiliki</u></b> Keahlian Khusus Apapun, Anda Bisa Langung Meng-klik Button <b>"Simpan Data Bahasa Dan Keahlian"</b> Dibawah Form Ini
                </div>
                <h5>Memiliki Keahlian Khusus :</h5>
                <div style="margin-bottom: 1px;"><span class="badge badge-warning">Mempunyai Keahlian Lainnya:</span></div>
                   <div class="shadow p-1 mb-1 rounded mx-auto row" style="width: 100%; background-color: #e8f3ff"> 

                    <div class="col-md-12">
                      
                          <table border="0"  class="table table-striped">
                            <thead class="bg-info">
                              <th colspan="4"><center>Jenis Keahlian</center></th>
                            </thead>
                            <tbody>
                              <td>
                                 <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="keahlian1" name="alatmusik" value="Memainkan Alat Musik,">
                                    <label for="keahlian1">
                                       Memainkan Alat Musik
                                    </label>
                                  </div>
                              </td>

                              <td>
                                 <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="keahlian2" name="bernyanyi" value="Bernyanyi,">
                                    <label for="keahlian2">
                                       Bernyanyi
                                    </label>
                                  </div>
                              </td>

                              <td>
                                 <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="keahlian3" name="menari" value="Menari,">
                                    <label for="keahlian3">
                                       Menari
                                    </label>
                                  </div>
                              </td>

                              <td>
                                 <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="keahlian4" name="menjahit" value="Menjahit,">
                                    <label for="keahlian4">
                                       Menjahit
                                    </label>
                                  </div>
                              </td>

                            </tbody>
                            
                              <td>
                                 <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="keahlian5" name="menyulam" value="Menyulam,">
                                    <label for="keahlian5">
                                       Menyulam
                                    </label>
                                  </div>
                              </td>

                              <td>
                                 <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="keahlian6" name="memasak" value="Memasak,">
                                    <label for="keahlian6">
                                       Memasak
                                    </label>
                                  </div>
                              </td>

                           
                              <td>
                                 <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="keahlian7" name="melukis" value="Melukis,">
                                    <label for="keahlian7">
                                       Melukis
                                    </label>
                                  </div>
                              </td>

                              <td>
                                 <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="keahlian8">
                                    <label for="keahlian8">
                                       Lainnya
                                    </label>
                                  </div>
                              </td>

                            </tbody>
                          </table>
                          <div class="form-group" id="keahlianshow" style="display: none;">
                            <label>Keahlian Lainnya..</label>
                            <textarea class="form-control" id="keahlian_lainnya" name="keahlianlainnya" placeholder="masukan Keahlian Lainnya Disini" disabled required=""></textarea>
                          </div>
                        <!-- /.input group -->
                      
                      <!-- /.form group -->
                    </div>

              </div>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data Bahasa Dan Keahlian</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

  