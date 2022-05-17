<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h2 class="modal-title">Data Kesehatan</h2>

        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('postDataKesehatan') }}" data-routeback="{{ route('pemohonindex') }}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          *Jika Sehat, Anda Langsung Bisa Mengklik "Ya, Saya Sehat"<br>
          *Jika Tidak, Anda Bisa Memilih Opsi Jenis Penyakit Yang Anda Alami Dibawah Ini Dengan Mengaktifkan Toggle  -<input data-width="30" type="checkbox" data-toggle="toggle" data-on="on" data-onstyle="success" data-size="mini" checked="">- Terlebih Dahulu
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 1px;">
            <input id="toggle-event" data-width="100" type="checkbox" data-toggle="toggle" data-on="Punya" data-off="Sehat" data-onstyle="danger" data-offstyle="success" >
           
            <div class="form-group clearfix" id="jenispenyakit" style="display: none;">
              <font style="size: 4px; " color="red">*Penyakit Dan Kelainan Fisik Yang Pernah Diderita Dan Masih Sampai Saat Ini</font><br>
              <table border="0" class="table table-striped ">
                <thead class="bg-info">
                  <th colspan="6"><center>Jenis Penyakit dan Kelainan Fisik</center></th>
                </thead>
              
                <tbody>
                  <td>
                  <div class="icheck-primary d-inline">
                    <input type="checkbox" id="checkboxPrimary1" value="Asma," name="asma" class="group1" disabled>
                    <label for="checkboxPrimary1">
                      Asma
                    </label>
                  </div>
                  </td>
                  <td>
                  <div class="icheck-primary d-inline">
                    <input type="checkbox" id="checkboxPrimary2" value="Malaria," name="malaria" class="group1" disabled>
                    <label for="checkboxPrimary2">
                      Malaria
                    </label>
                  </div>
                  </td>
                  <td>
                  <div class="icheck-primary d-inline">
                    <input type="checkbox" id="checkboxPrimary3" value="TBC," name="tbc" class="group1" disabled>
                    <label for="checkboxPrimary3">
                      TBC
                    </label>
                  </div>
                  </td>
                  <td>
                  <div class="icheck-primary d-inline">
                    <input type="checkbox" id="checkboxPrimary4" value="Ginjal," name="ginjal" class="group1" disabled>
                    <label for="checkboxPrimary4">
                      Ginjal
                    </label>
                  </div>
                  </td>
                  </tbody>
                  <tbody>
                    <td>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary5" value="Patah Tulang," name="patah_tulang" class="group1" disabled>
                        <label for="checkboxPrimary5">
                          Patah Tulang
                        </label>
                      </div>
                    </td>
                    <td>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary6" value="Ayan," name="ayan" class="group1" disabled>
                        <label for="checkboxPrimary6">
                          Ayan
                        </label>
                      </div>
                    </td>
                    <td>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary7" value="Insomnia," name="insomnia" class="group1" disabled>
                        <label for="checkboxPrimary7">
                          Insomnia
                        </label>
                      </div>
                    </td>
                    <td>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary9" value="Gangguan Berjalan," name="gangguan_berjalan" class="group1" disabled>
                        <label for="checkboxPrimary9">
                          Gangguan Berjalan
                        </label>
                      </div>
                    </td>
                </tbody>
                <tbody>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="checkboxPrimary10" value="Radang Tenggorokan," name="radang_tenggorokan" class="group1" disabled>
                      <label for="checkboxPrimary10">
                        Radang Tenggorokan
                      </label>
                    </div>
                    </td>
                    <td>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary11" value="Demam Berdarah," name="demam_berdarah" class="group1" disabled>
                        <label for="checkboxPrimary11">
                          Demam Berdarah
                        </label>
                      </div>
                    </td>
                    <td>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary12" value="Migrain," name="migrain" class="group1" disabled>
                        <label for="checkboxPrimary12">
                          Migrain
                        </label>
                      </div>
                    </td>
                    <td>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary13" value="Cacat Tubuh," name="cacat_tubuh" class="group1" disabled>
                        <label for="checkboxPrimary13">
                          Cacat Tubuh
                        </label>
                      </div>
                    </td>
                  </tbody>
                  <tbody>
                    <td>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary14" value="Jantung," name="jantung" class="group1" disabled>
                        <label for="checkboxPrimary14">
                          Jantung
                        </label>
                      </div>
                    </td>
                    <td>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary15" value="Hepatitis," name="hepatitis" class="group1" disabled>
                        <label for="checkboxPrimary15">
                          Hepatitis
                        </label>
                      </div>
                    </td>
                    <td>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary16" value="Lambung," name="lambung" class="group1" disabled>
                        <label for="checkboxPrimary16">
                          Lambung
                        </label>
                      </div>
                    </td>
                    <td>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary17" class="group1" disabled>
                        <label for="checkboxPrimary17">
                          Lainnya
                        </label>
                      </div>
                    </td>
                  </tbody>
              </table>
              <div class="form-group" id="penyakitlainnyashow" style="display: none;">
                <label>Penyakit Lainnya..</label>
                <textarea class="form-control" id="penyakit_lainnya" name="lainnya" placeholder="masukan penyakit lainnya" disabled required=""></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="a1" style="display: none;">Simpan Data Kesehatan</button>
          <button type="submit" class="btn btn-primary" id="a2">Ya, Saya Sehat :)</button>
        </div>
        </form>
        
      </div>
    </div>
  </div>

  