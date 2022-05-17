@extends('admin.layout.master')
@section('content')

<div class="content-header">
 
</div>
<div id="giftes" style="display: none;">
    <!--img src="{{ asset('admin/dist/img/giftes.gif') }}" /-->
    <img src="{{ asset('admin/dist/img/logo2.gif') }}"/>
    <h3>Sedang Menyimpan Data</h3>
   
</div>
  <!-- /.content-header --> 
<div class="container-fluid">
    <div class="row">
      <div class="col-10 mx-auto"> 
        <div class="card">
         <div class="card-body">
          <form data-route="{{ route('postData') }}" data-routeback="{{ route('pemohonindex') }}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
            {{ csrf_field() }}

          <!-- SmartWizard html -->
          <div id="smartwizard">
          <ul>
              <li><a href="#step-1">Step 1<br /><small>Data Diri Bagian 1</small></a></li>
              <li><a href="#step-2">Step 2<br /><small>Data Diri Bagian 2</small></a></li>
              <li><a href="#step-3">Step 3<br /><small>Data Diri Bagian 3</small></a></li>
              <li><a href="#step-4">Step 4<br /><small>Data Diri Bagian 4</small></a></li>
              <li><a href="#step-5">Step 5<br /><small>Data Diri Bagian 5</small></a></li>
              <li><a href="#step-6">Step 6<br /><small>Data Diri Bagian 6</small></a></li>
          </ul>


          <div>
                <!-- batas form-->


          <div id="step-1" style="padding: 0">
            <div class="shadow-sm p-3 mb-5 bg-light rounded mx-auto">
              <div id="form-step-0" role="form" data-toggle="validator" class="row">

                  <div class="form-group col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                          <label for="nama_lengkap">Nama Lengkap : </label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-user-tag"></i></span>
                            </div>
                            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukan Nama Lengkap" required>
                          </div>
                          <font style="color: #007bff" size="2px">*Wajib Diisi</font>
                          <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nama_mandarin">Nama Mandarin : <font style="color: #007bff" size="2px">*Jika ada</font></label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-language"></i></span>
                              </div>
                              <input type="text" class="form-control" name="nama_mandarin" id="nama_mandarin" placeholder="Masukan Nama Mandarin">
                            </div>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                  </div> 

                  <div class="form-group col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <label for="nomorktp">Nomor KTP :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                                </div>
                              <input type="text" class="form-control" name="no_ktp" id="nomor_ktp" placeholder="Masukan Nomor KTP" required onkeypress="return isNumberKey(event)">
                            </div>
                            <font style="color: #007bff" size="2px">*Wajib Diisi</font>
                            <div class="help-block with-errors text-danger"></div>

                        </div>
                      </div>
                  </div>
                  <div class="form-group col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                          <hr>
                            <label for="nomorktp">Berlaku s.d :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-hourglass-start"></i></span>
                                </div>
                                <select name="masa_berlaku_ktp" class="form-control" id="berlaku_sd" required>
                                    <option value="">Masa Berlaku</option>
                                    <?php
                                      $thn_skr = date('Y');
                                      for ($x = $thn_skr; $x <= 2030; $x++) {
                                        ?>
                                            <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                        <?php
                                      }
                                    ?>
                                    <option value="SEUMUR HIDUP">Seumur Hidup</option>
                                </select>
                            </div>
                            <font style="color: #007bff" size="2px">*Wajib Diisi</font>
                            <div class="help-block with-errors text-danger"></div>

                        </div>
                      </div>
                  </div>

                  <div class="form-group col-md-6">
                    <div class="row">
                      <div class="col-md-12">
                        <hr>
                          <label for="nomorktp">Nomor NPWP : <font style="color: #007bff" size="2px">*Jika Ada</font></label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                              </div>
                            <input type="text" class="form-control" name="no_npwp" id="nomor_npwp" placeholder="Masukan Nomor NPWP" onkeypress="return isNumberKey(event)">
                          </div>
                          <div class="help-block with-errors text-danger"></div>
                      </div>
                    </div>
                  </div>


                  <div class="form-group col-md-6 mx-auto">
                      <div class="row">
                          <div class="col-md-12">
                            <table border="0" class="table table-sm ">
                              <hr>
                              <label for="nomorktp">Identitas Lainnya : <font style="color: #007bff" size="2px">*Centang Jika Ada</font></label>
                              <tr>
                                <thead class="bg-info">
                                  <th colspan="5">
                                    <center>
                                      Jenis Kartu Identitas
                                    </center>
                                  </th>
                                </thead>
                                <tbody>
                                  <td>
                                    <div class="icheck-primary d-inline">
                                      <input type="checkbox" id="checkboxPrimary1" name="kartu_keluarga" value="KARTU KELUARGA">
                                      <label for="checkboxPrimary1">
                                        KK
                                      </label>
                                    </div>
                                  </td>
                                  <td style="width: 50px"> </td>
                                  <td>
                                    <div class="icheck-primary d-inline">
                                      <input type="checkbox" id="checkboxPrimary2" name="paspor" value="PASPOR">
                                      <label for="checkboxPrimary2">
                                        PASPOR
                                      </label>
                                    </div>
                                  </td>
                                  <td  style="width: 50px"> </td>
                                  <td ></td>
                                </tbody>

                                <tbody>
                                  <td>
                                    <div class="icheck-primary d-inline">
                                      <input type="checkbox" id="checkboxPrimary3" name="sim_a" value="SIM A">
                                      <label for="checkboxPrimary3">
                                        SIM A
                                      </label>
                                    </div>
                                  </td>
                                  <td> </td>
                                  <td>
                                    <div class="icheck-primary d-inline">
                                      <input type="checkbox" id="checkboxPrimary4" name="sim_b" value="SIM B">
                                      <label for="checkboxPrimary4">
                                        SIM B
                                      </label>
                                    </div>
                                  </td>
                                  <td> </td>
                                  <td>
                                    <div class="icheck-primary d-inline">
                                      <input type="checkbox" id="checkboxPrimary5" name="sim_c" value="SIM C">
                                      <label for="checkboxPrimary5">
                                        SIM C
                                      </label>
                                    </div>
                                  </td>
                                </tbody>
                                <thead class="bg-info">
                                  <th colspan="5">
                                    <center>
                                      BPJS
                                    </center>
                                  </th>
                                </thead>
                                <tbody>
                                  <td>
                                    <div class="icheck-primary d-inline">
                                      <input type="checkbox" id="checkboxPrimary6" name="bpjs_kesehatan" value="BPJS KESEHATAN">
                                      <label for="checkboxPrimary6">
                                      Kesehatan
                                      </label>
                                    </div>
                                  </td>
                                  <td> </td>
                                  <td>
                                     <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="checkboxPrimary7" name="bpjs_tenagakerja" value="BPJS KETENAGAKERJAAN">
                                        <label for="checkboxPrimary7">
                                        Ketenagakerjaan
                                        </label>
                                    </div>
                                  </td>
                                  <td> </td>
                                  <td style="width: 200px"> 
                                    <div class="icheck-primary d-inline">
                                      <input type="checkbox" id="checkboxPrimary8" name="bpjs_jaminanpensiun" value="BPJS JAMINAN PENSIUN">
                                      <label for="checkboxPrimary8">
                                      Jaminan Pensiun
                                      </label>
                                    </div>
                                </td>
                                </tbody>
                              </tr>

                            </table>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>


          <!--step 2-->

          <div id="step-2">
            <div id="form-step-1" role="form" data-toggle="validator" class="row">
              
                <div class="form-group col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="provinsi">Provinsi Tempat Lahir :</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-map-marked-alt"></i></span>
                            </div>
                            <select class="form-control select" id="provinsi" name="tempatlahir_provinsi" required >
                                <option value="" >------Pilih Provinsi-----</option>
                                @foreach ($list_provinsi as $item_provinsi)
                                <option value="{{$item_provinsi->id_prov}}">{{$item_provinsi->nama}}</option>                                        
                                @endforeach

                            </select>
                          </div>
                            <hr>
                             <font style="color: #007bff" size="2px">*Wajib diisi</font>
                          <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
                </div>

                <div class="form-group col-md-4">
                  <div class="row">
                      <div class="col-md-12">
                        <label for="kabupatenkota">Kabupaten/Kota Tempat Lahir :</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-map-marked-alt"></i></span>
                            </div>
                            <select id="kabupatenkota" name="tempatlahir_kota" class="form-control select" required >
                              <option value="">Pilih Provinsi Dahulu</option>
                            
                            </select>
                          </div>
                        <hr>
                        <font style="color: #007bff" size="2px">*Wajib diisi</font>
                        <div class="help-block with-errors text-danger"></div>
                        </div>
                  </div>
                </div>

                <div class="form-group col-md-4">
                  <div class="row">
                      <div class="col-md-12">
                      <label for="tanggallahir">Tanggal Lahir :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                            </div>
                          <input type="text" name="tanggal_lahir" class="form-control float-right" id="reservationtime" readonly="" required >
                        </div>
                      <div class="help-block with-errors text-danger"></div>
                      <font style="color: #007bff" size="2px">*Wajib diisi</font>
                      </div>
                  </div>
                </div>

                <div class="form-group col-md-3">
                  <div class="row">
                      <div class="col-md-12">
                        <label for="tanggallahir">Golongan Darah :</label>
                        <table border="0" class="table table-sm ">
                          <tr>
                          <thead class="bg-info">
                            <th colspan="4">
                              Jenis
                            </th>
                           
                          </thead>   

                          <tbody>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary1" value="A" name="golongan_darah" required="">
                                <label for="radioPrimary1">
                                  A
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary2" value="B" name="golongan_darah" required="">
                                <label for="radioPrimary2">
                                B
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary3" value="AB" name="golongan_darah" required="">
                                <label for="radioPrimary3">
                                  AB
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary4" value="O" name="golongan_darah" required="">
                                <label for="radioPrimary4">
                                O
                                </label>
                              </div>
                            </td>
                          </tbody>
                          </tr>
                        </table>
                      <font style="color: #007bff" size="2px">*Wajib diisi, <b>Pilih salah satu</b></font>
                      <div class="help-block with-errors text-danger"></div>
                      <hr>
                      </div>
                    </div>
                  </div>

                  <div class="form-group col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                        <label for="nomortelepon">Nomor Telepon :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-phone-alt"></i></span>
                          </div>
                          <input type="text" class="form-control" name="nomor_telepon" data-inputmask='"mask": "9999-9999-9999"' data-mask placeholder="masukan nomor telepon" required="">
                        </div>
                        <font style="color: #007bff" size="2px">*Wajib diisi</font>
                        <div class="help-block with-errors text-danger"></div>
                        <hr>
                        </div>
                    </div>
                  </div>
                  <div class="form-group col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                        <label for="nomortelepon">Nomor Telepon 2:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-phone-alt"></i></span>
                          </div>
                          <input class="form-control" name="nomor_telepon2" placeholder="nomor telepon 2" data-inputmask='"mask": "9999-9999-9999"' data-mask/>
                        </div>
                        <font style="color: #007bff" size="2px">*Tambahan<b> jika ada</b></font>
                        <div class="help-block with-errors text-danger"></div>
                        <hr>
                        </div>
                    </div>
                  </div>
                  <div class="form-group col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                        <label for="nomortelepon">Nomor WhatsApp (WA) :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-comments"></i></span>
                          </div>
                          <input class="form-control" name="nomor_wa" placeholder="nomor WhatsApp" data-inputmask='"mask": "9999-9999-9999"' data-mask/>
                        </div>
                        <font style="color: #007bff" size="2px">*Tambahan<b> jika ada</b></font>
                        <div class="help-block with-errors text-danger"></div>
                        <hr>
                        </div>
                    </div>
                  </div>
                
                  <div class="form-group col-md-5">
                    <div class="row">
                        <div class="col-md-12">
                        <label for="alamat">Alamat Tinggal Sekarang :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-map-marker-alt"></i></span>
                          </div>
                          <textarea class="form-control" id="alamat" name="alamat_sekarang" placeholder="Masukan Alamat Tinggal" required="" ></textarea>
                        </div>
                        <font style="color: #007bff" size="2px">*Wajib diisi</font>
                        <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                  </div>

                  <div class="form-group col-md-4">
                  <div class="row">
                      <div class="col-md-12">
                      <label for="agama">Agama :</label>
                      
                      <table border="0" class="table table-sm table-bordered">
                        <tr>
                          <thead class="bg-info">
                            <th colspan="6"><center>Jenis</center></th>
                          </thead>
                          <tbody>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary2a" value="Islam" name="agama" required="">
                                <label for="radioPrimary2a">
                                  Islam
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary2b" value="Kristen" name="agama" required="" >
                                <label for="radioPrimary2b" >
                                  Kristen
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary2c" value="Katolik" name="agama" required="" >
                                <label for="radioPrimary2c" >
                                  Katolik
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary2d" value="Hindu" name="agama" required="" >
                                <label for="radioPrimary2d" >
                                  Hindu
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary2e" value="Buddha" name="agama" required="" >
                                <label for="radioPrimary2e" >
                                  Buddha
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary2f" value="Konghucu" name="agama" required="" >
                                <label for="radioPrimary2f" >
                                  Konghucu
                                </label>
                              </div>
                            </td>
                          </tbody>
                        </tr>
                      </table>

                      <font style="color: #007bff" size="2px">*Wajib diisi</font>
                      <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
                </div>


            </div>
          </div>


          <div id="step-3">
            <div id="form-step-2" role="form" data-toggle="validator" class="row">
                

                <div class="form-group col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                        <label for="nomortelepon">Nomor Rekening :<font style="color: #007bff" size="2px"> *BCA Jika ada</font></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
                          </div>
                          <input class="form-control" name="nomor_rekening" placeholder="Masukan Nomor Rekening" onkeypress="return isNumberKey(event)"/>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                        <hr>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                        <label for="nomortelepon">Alamat Email :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-at"></i></span>
                          </div>
                          <input class="form-control" type="email" name="email" placeholder="Masukan Alamat Email" required="" />
                        </div>
                        <font style="color: #007bff" size="2px">*Wajib diisi</font>
                        <div class="help-block with-errors text-danger"></div>
                        <hr>
                        </div>
                    </div>
                </div>


                <div class="form-group col-md-6">
                  <div class="row">
                      <div class="col-md-12">
                      <label for="alamat">Status Tempat Tinggal :</label>
                      
                      <table border="0" class="table table-sm table-bordered">
                        <tr>
                          <thead class="bg-info">
                            <th colspan="5"><center>Kepemilikan Tempat Tinggal</center></th>
                          </thead>
                          <tbody>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary5" value="Sewa" name="kepemilikan_tempat_tinggal" required="">
                                <label for="radioPrimary5">
                                  Sewa
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary6" value="Milik Sendiri" name="kepemilikan_tempat_tinggal" required="">
                                <label for="radioPrimary6">
                                  Milik Sendiri
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary7" value="Milik Keluarga" name="kepemilikan_tempat_tinggal" required="">
                                <label for="radioPrimary7">
                                  Milik Keluarga
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary8" value="Kos" name="kepemilikan_tempat_tinggal" required="">
                                <label for="radioPrimary8">
                                  Kos
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary9" value="Kontrak" name="kepemilikan_tempat_tinggal" required="">
                                <label for="radioPrimary9">
                                  Kontrak
                                </label>
                              </div>
                            </td>
                          </tbody>
                        </tr>
                      </table>

                      <font style="color: #007bff" size="2px">*Wajib diisi</font>
                      <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
                </div>

                <div class="form-group col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                        <label for="tinggibadan">Tinggi Badan : <font style="color: #007bff" size="2px"> *Jika ada</font></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-male"></i></span>
                          </div>
                          <input class="form-control" type="number" name="tinggi_badan" placeholder="Masukan hanya angka" onkeypress="return isNumberKey(event)"/>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                        <hr>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                        <label for="beratbadan">Berat Badan : <font style="color: #007bff" size="2px"> *Jika ada</font></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-weight"></i></span>
                          </div>
                          <input class="form-control" type="number" name="berat_badan" placeholder="Masukan hanya angka" onkeypress="return isNumberKey(event)"/>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                        <hr>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-6">
                  <div class="row">
                      <div class="col-md-12">
                      <label for="jenis_kelamin">Jenis Kelamin :</label>
                      
                      <table border="0" class="table table-sm table-bordered">
                        <tr>
                          <thead class="bg-info">
                            <th colspan="5"><center>Jenis Kelamin</center></th>
                          </thead>
                          <tbody>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary10" value="Pria" name="jenis_kelamin" required="">
                                <label for="radioPrimary10">
                                  Pria
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary11" value="Wanita" name="jenis_kelamin" required="">
                                <label for="radioPrimary11">
                                  Wanita
                                </label>
                              </div>
                            </td>
                          </tbody>
                        </tr>
                      </table>

                      <font style="color: #007bff" size="2px">*Wajib diisi</font>
                      <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
                </div>

            </div>
          </div>


          <div id="step-4" class="">
            <div id="form-step-3" role="form" data-toggle="validator" class="row">

              <div class="form-group col-md-4">
                <div class="row">
                    <div class="col-md-12">
                      <label for="anakke">Anak ke :</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-child"></i></span>
                          </div>
                          <select name="anak_ke" class="form-control" id="anak_ke" required>
                              <option value="">--Pilih Anak ke--</option>
                              <?php
                                $anakke = 1;
                                for ($a = $anakke; $a <= 15; $a++) {
                                  ?>
                                      <option value="<?php echo $a ?>">Anak ke <?php echo $a ?></option>
                                  <?php
                                }
                              ?>
                          </select>
                      </div>
                      <font style="color: #007bff" size="2px">*Wajib diisi</font>
                      <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
                </div>
                
                <div class="form-group col-md-4">
                <div class="row">
                    <div class="col-md-12">
                      <label for="jumlahsaudara">Dari :</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-users"></i></span>
                          </div>
                          <select name="jumlah_saudara" class="form-control" id="jumlah_saudara" required>
                              <option value="">--Pilih Jumlah Saudara--</option>
                              <?php
                                $jmlsdr = 1;
                                for ($b = $jmlsdr; $b <= 15; $b++) {
                                  ?>
                                      <option value="<?php echo $b ?>"><?php echo $b ?> Bersaudara</option>
                                  <?php
                                }
                              ?>
                          </select>
                      </div>
                      <font style="color: #007bff" size="2px">*Wajib diisi</font>
                      <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
                </div>

                <div class="form-group col-md-3">
                  <div class="row">
                      <div class="col-md-12">
                      <label for="jenis_kelamin">Status Marital :</label>
                      
                      <table border="0" class="table table-sm table-bordered">
                        <tr>
                          <thead class="bg-info">
                            <th colspan="5"><center>Jenis Marital</center></th>
                          </thead>
                          <tbody>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary12" value="Lajang" name="status_marital" required="" onclick="javascript:houseclean();">
                                <label for="radioPrimary12">
                                  Lajang
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary13" value="Menikah" name="status_marital" required="" onclick="javascript:houseclean();">
                                <label for="radioPrimary13" >
                                  Menikah
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary14" value="Duda/Janda" name="status_marital" required="" onclick="javascript:houseclean();">
                                <label for="radioPrimary14">
                                  Duda/Janda
                                </label>
                              </div>
                            </td>
                          </tbody>
                        </tr>
                      </table>

                      <font style="color: #007bff" size="2px">*Wajib diisi</font>
                      <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
                </div>


                <div class="form-group col-md-3" id="nama_pasangan" style="display: none;">
                <div class="row">
                    <div class="col-md-12">
                      <hr class="new4">
                        <label for="suamiistri">Nama Suami/Istri:</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-restroom"></i></span>
                            </div>
                            <input class="form-control" name="nama_pasangan" id="nama_pasangan2" required=""  placeholder="Masukan Nama Suami Atau Istri"  disabled />
                            </div>
                            <font style="color: #007bff" size="2px">*Wajib diisi</font>
                            <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
                </div>
                <div class="form-group col-md-3" id="pekerjaan_pasangan" style="display: none;">
                <div class="row">
                    <div class="col-md-12">
                      <hr class="new4">
                      <label for="Pekerjaan">Pekerjaan:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-people-carry"></i></span>
                        </div>
                        <input class="form-control"  name="pekerjaan_pasangan" required="" id="pekerjaan_pasangan2"  placeholder="Masukan Pekerjaan Suami Atau Istri" disabled/>
                      </div>
                      <font style="color: #007bff" size="2px">*Wajib diisi</font>
                      <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
                </div>
                <div class="form-group col-md-3" id="nomor_telepon_pasangan" style="display: none;">
                <div class="row">
                    <div class="col-md-12">
                      <hr class="new4">
                      <label for="notelppasangan">Nomor Telepon Suami/Istri:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-phone"></i></span>
                        </div>
                        <input class="form-control"  name="nomor_telepon_pasangan" required="" id="nomor_telepon_pasangan2"  placeholder="Masukan Nomor Telepon Suami Atau Istri" data-inputmask='"mask": "9999-9999-9999"' data-mask disabled/>
                      </div>
                      <font style="color: #007bff" size="2px">*Wajib diisi</font>
                      <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
                </div>


                <div class="form-group col-md-3" id="jumlah_anak" style="display: none">
                <div class="row">
                    <div class="col-md-12">
                      <hr class="new4">
                      <label for="jumlahanak">Jumlah Anak:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-baby"></i></span>
                        </div>
                        <select name="jumlah_anak"  class="form-control" id="jumlah_anak2" required="" disabled>
                            <option value="">--Pilih Jumlah Anak--</option>
                            <?php
                              $jmlank = 1;
                              for ($c = $jmlank; $c <= 15; $c++) {
                                ?>
                                    <option value="<?php echo $c ?>"><?php echo $c ?> Anak</option>
                                <?php
                              }
                            ?>
                            <option value="0">Belum Punya Anak</option>
                        </select>
                      </div>
                      <font style="color: #007bff" size="2px">*Wajib diisi</font>
                      <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
                </div>


                <div class="form-group col-md-4">
                <div class="row">
                    <div class="col-md-12">
                      <hr class="new4">
                      <label for="namaayah">Nama Ayah & Ibu Kandung:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                        </div>
                        <input class="form-control" name="nama_ayah" required="" placeholder="Masukan nama ayah" />
                      </div>
                      <font style="color: #007bff" size="2px">*Wajib diisi</font>
                      <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
                </div>
                <div class="form-group col-md-4">
                <div class="row">
                    <div class="col-md-12">
                      <hr class="new4">
                      <label for="pekerjaan ayah ibu">Pekerjaan Ayah & Ibu:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-people-carry"></i></span>
                        </div>
                        <input class="form-control" name="pekerjaan_ayah" placeholder="Masukan Pekerjaan Ayah"/>
                      </div>
                      <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
                </div>
                <div class="form-group col-md-4">
                <div class="row">
                    <div class="col-md-12">
                      <hr class="new4">
                      <label for="notelpayahibu">Nomor Telepon Ayah & Ibu:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-phone"></i></span>
                        </div>
                        <input class="form-control"  name="nomor_telepon_ayah" placeholder="Masukan Nomor Telepon Ayah" data-inputmask='"mask": "9999-9999-9999"' data-mask/>
                      </div>
                      <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
                </div>
                <div class="form-group col-md-4">
                <div class="row">
                    <div class="col-md-12">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                        </div>
                        <input class="form-control" name="nama_ibu" required="" placeholder="Masukan nama ibu" />
                      </div>
                      <font style="color: #007bff" size="2px">*Wajib diisi</font>
                      <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
                </div>
                <div class="form-group col-md-4">
                <div class="row">
                    <div class="col-md-12">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-people-carry"></i></span>
                        </div>
                        <input class="form-control" name="pekerjaan_ibu" placeholder="Masukan Pekerjaan Ibu"/>
                      </div>
                      <div class="help-block with-errors text-danger"></div>
                      <hr>
                      </div>
                  </div>
                </div>
                <div class="form-group col-md-4">
                <div class="row">
                    <div class="col-md-12">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-phone"></i></span>
                        </div>
                        <input class="form-control" name="nomor_telepon_ibu" placeholder="Masukan Nomor Telepon Ibu" data-inputmask='"mask": "9999-9999-9999"' data-mask/>
                      </div>
                      <div class="help-block with-errors text-danger"></div>
                      <hr>
                      </div>
                  </div>
                </div>


            </div>
          </div>

          <div id="step-5">
            <div id="form-step-4" role="form" data-toggle="validator" class="row">


              <div class="form-group col-md-4">
              <div class="row">
                  <div class="col-md-12">
                    <label for="hobi">Hobi:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-guitar"></i></span>
                        </div>
                        <input class="form-control" name="hobi" required="" placeholder="Masukan Hobi"/>
                      </div>
                    <font style="color: #007bff" size="2px">*Wajib diisi</font>
                    <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
              </div>


              <div class="form-group col-md-4">
                  <div class="row">
                      <div class="col-md-12">
                      <label for="cpns">Sedang Melamar CPNS ? :</label>
                      
                      <table border="0" class="table table-sm table-bordered">
                        <tr>
                          <tbody>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary15" value="1" name="status_cpns" required="">
                                <label for="radioPrimary15">
                                  Ya
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary16" value="0" name="status_cpns" required="" >
                                <label for="radioPrimary16" >
                                  Tidak
                                </label>
                              </div>
                            </td>
                          </tbody>
                        </tr>
                      </table>

                      <font style="color: #007bff" size="2px">*Wajib diisi</font>
                      <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
                </div>

                <div class="form-group col-md-4">
                  <div class="row">
                      <div class="col-md-12">
                      <label for="merokok">Merokok ? :</label>
                      
                      <table border="0" class="table table-sm table-bordered">
                        <tr>
                          <tbody>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary17" value="1" name="status_merokok" required="">
                                <label for="radioPrimary17">
                                  Ya
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary18" value="0" name="status_merokok" required="" >
                                <label for="radioPrimary18" >
                                  Tidak
                                </label>
                              </div>
                            </td>
                          </tbody>
                        </tr>
                      </table>

                      <font style="color: #007bff" size="2px">*Wajib diisi</font>
                      <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
                </div>

                <div class="form-group col-md-4">
                  <div class="row">
                      <div class="col-md-12">
                        <label for="olahraga">Olah Raga : <font style="color: #007bff" size="2px">*Yang disukai</font></label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-volleyball-ball"></i></span>
                        </div>
                          <input class="form-control" name="minat_olahraga" required="" placeholder="Masukan olahraga yang disukai"/>
                        </div>
                        <font style="color: #007bff" size="2px">*Wajib diisi</font>
                        <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4">
                  <div class="row">
                      <div class="col-md-12">
                      <label for="beasiswa">Sedang Pengajuan Beasiswa ? :</label>
                      
                      <table border="0" class="table table-sm table-bordered">
                        <tr>
                          <tbody>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary19" value="1" name="status_beasiswa" required="">
                                <label for="radioPrimary19">
                                  Ya
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary20" value="0" name="status_beasiswa" required="" >
                                <label for="radioPrimary20" >
                                  Tidak
                                </label>
                              </div>
                            </td>
                          </tbody>
                        </tr>
                      </table>

                      <font style="color: #007bff" size="2px">*Wajib diisi</font>
                      <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
                </div>

                <div class="form-group col-md-4">
                  <div class="row">
                      <div class="col-md-12">
                      <label for="lama_bekerja">Kesediaan Lama Bekerja ? :</label>
                      
                      <table border="0" class="table table-sm table-bordered">
                        <tr>
                          <tbody>
                            <td>
                              <div class="icheck-info d-inline">
                                <input type="radio" id="radioPrimary21" value="1" name="kesediaan_lama_bekerja" required="">
                                <label for="radioPrimary21">
                                  1 Tahun
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary22" value="2" name="kesediaan_lama_bekerja" required="" >
                                <label for="radioPrimary22" >
                                  2 Tahun
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-danger d-inline">
                                <input type="radio" id="radioPrimary23" value="3" name="kesediaan_lama_bekerja" required="" >
                                <label for="radioPrimary23" >
                                  > 3 Tahun
                                </label>
                              </div>
                            </td>
                          </tbody>
                        </tr>
                      </table>

                      <font style="color: #007bff" size="2px">*Wajib diisi</font>
                      <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
                </div>


            </div>
          </div>


          <div id="step-6">
            <div id="form-step-5" role="form" data-toggle="validator" class="row">
                

              <div class="form-group col-md-3">
                  <div class="row">
                      <div class="col-md-12">
                        <label for="kontakdarurat">Kontak Darurat :<font style="color: #007bff" size="2px"> *yang dihubungi</font></label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                        </div>
                          <input class="form-control" name="nama_nodarurat" required="" placeholder="Masukan Nama"/>
                        </div>
                        <font style="color: #007bff" size="2px">*Wajib diisi</font>
                        <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3">
                  <div class="row">
                      <div class="col-md-12">
                        <label for="kontakdarurat">Hubungan :<font style="color: #007bff" size="2px"> *sepupu, ipar dll</font></label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-user-tag"></i></span>
                        </div>
                          <input class="form-control" name="hubungan_nodarurat" required="" placeholder="Masukan Hubungan"/>
                        </div>
                        <font style="color: #007bff" size="2px">*Wajib diisi</font>
                        <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3">
                  <div class="row">
                      <div class="col-md-12">
                        <label for="kontakdarurat">Nomor Telepon :</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-phone"></i></span>
                        </div>
                          <input class="form-control" name="nomor_darurat" required="" placeholder="Masukan Nomor Telepon" data-inputmask='"mask": "9999-9999-9999"' data-mask/>
                        </div>
                        <font style="color: #007bff" size="2px">*Wajib diisi</font>
                        <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3">
                  <div class="row">
                      <div class="col-md-12">
                        <label for="kontakdarurat">Kota :</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-city"></i></span>
                        </div>
                          <input class="form-control" name="kota_nodarurat" required="" placeholder="Masukan Kota"/>
                        </div>
                        <font style="color: #007bff" size="2px">*Wajib diisi</font>
                        <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3">
                  <div class="row">
                      <div class="col-md-12">
                        <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                        </div>
                          <input class="form-control" name="nama_nodarurat2"  placeholder="Masukan Nama"/>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3">
                  <div class="row">
                      <div class="col-md-12">
                        <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-user-tag"></i></span>
                        </div>
                          <input class="form-control" name="hubungan_nodarurat2" placeholder="Masukan Hubungan"/>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3">
                  <div class="row">
                      <div class="col-md-12">
                        <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-phone"></i></span>
                        </div>
                          <input class="form-control" name="nomor_darurat2" placeholder="Masukan Nomor Telepon" data-inputmask='"mask": "9999-9999-9999"' data-mask/>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3">
                  <div class="row">
                      <div class="col-md-12">
                        <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-city"></i></span>
                        </div>
                          <input class="form-control" name="kota_nodarurat2" placeholder="Masukan Kota"/>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                </div>

                <br><br><br><br>

                <div class="form-group col-md-4">
                  <div class="row">
                      <div class="col-md-12">
                        <label for="nama_wali">Nama Wali :</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                          <input class="form-control" name="nama_wali" required="" placeholder="Masukan Nama Wali"/>
                        </div>
                        <font style="color: #007bff" size="2px">*Wajib diisi</font>
                        <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                  <div class="row">
                      <div class="col-md-12">
                        <label for="alamat">Alamat :</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-city"></i></span>
                        </div>
                          <input class="form-control" name="alamat_wali" required="" placeholder="Masukan Alamat Wali"/>
                        </div>
                        <font style="color: #007bff" size="2px">*Wajib diisi</font>
                        <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                  <div class="row">
                      <div class="col-md-12">
                        <label for="notelpwali">Nomor Telepon :</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-phone"></i></span>
                        </div>
                          <input class="form-control" name="nomor_wali" required="" placeholder="Masukan Nomor Telepon" data-inputmask='"mask": "9999-9999-9999"' data-mask/>
                        </div>
                        <font style="color: #007bff" size="2px">*Wajib diisi</font>
                        <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                </div>
              

            </div>
          </div>


                <!--penutup batas form-->
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="mybutton">
  <a class="nav-link" href="{{{ route('pemohonindex') }}}" title="Cancel" >
  <span class="btn btn-danger btn-flat"><i class="fa fa-arrow-circle-left">  </i> Kembali</span>
</a>
</div>

<style type="text/css">

#mybutton {
  position: fixed;
  bottom: 70px;
  left: -10px
}
</style>
@endsection
@section('script')

<!-- Include jQuery Validator plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
<script src="{{ asset('js/postdatadiri.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function(){

        // Toolbar extra buttons
        var btnFinish = $('<button type="button"></button>').text('Finish')
                                         .addClass('btn btn-info')
                                         .on('click', function(){
                                                if( !$(this).hasClass('disabled')){
                                                    var elmForm = $("#myForm");
                                                    if(elmForm){
                                                        elmForm.validator('validate');

                                                        var elmErr = elmForm.find('.has-error');
                                                        if(elmErr && elmErr.length > 0){

                                                          const Toast = Swal.mixin({
                                                            toast: true,
                                                            position: 'top-end',
                                                            showConfirmButton: false,
                                                            timer: 3000
                                                          });
                                                          Toast.fire({
                                                            type: 'error',
                                                            title: 'Terjadi Kesalahan, Lengkapi Data Yang Bersifat Wajib Harap Periksa kembali'
                                                          })

                                                            return false;
                                                        }else{

                                                            Swal.fire({
                                                              title: 'Apakah Anda Yakin ?',
                                                              text: "Pastikan Data Yang Dimasukan Sudah Benar",
                                                              type: 'warning',
                                                              showCancelButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              cancelButtonColor: '#d33',
                                                              confirmButtonText: 'Iya, Saya Yakin!',
                                                              cancelButtonText: 'Ngak Jadi Deh'
                                                            }).then((result) => {
                                                              if (result.value) {
                                                                elmForm.submit();
                                                                return false;
                                                              }else{
                                                                Swal.fire(
                                                                  'success!',
                                                                  'Cieee.. Ngak Jadi.',
                                                                  'success'
                                                                )
                                                              }
                                                            })
                                                        }
                                                    }
                                                }
                                            });
        var btnCancel = $('<button type="button"></button>').text('Cancel')
                                         .addClass('btn btn-danger')

                                         .on('click', function(){
                                          Swal.fire({
                                            title: 'Apakah Kamu Yakin?',
                                            text: "Data Yang Anda Masukan Akan Direset Ulang!",
                                            type: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Iya, Reset Semua Step!',
                                            cancelButtonText: 'Ngak Jadi Deh'
                                          }).then((result) => {
                                            if (result.value) {
                                              $('#smartwizard').smartWizard("reset");
                                              $('#myForm').find("input:not([type='radio']), textarea, select").val("");
                                              //$('#myForm').find(".agama").val("");
                                              $('#myForm').find('input:checkbox').prop('checked', false);
                                              $('#myForm').find('input:radio').prop('checked', false);
                                              Swal.fire(
                                                'Deleted!',
                                                'Data Berhasil Direset.',
                                                'success'
                                              )
                                            }else{
                                              Swal.fire(
                                                'success!',
                                                'Cieee.. Ngak Jadi.',
                                                'success'
                                              )
                                            }
                                          })
                                        });



        // Smart Wizard
        $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'arrows',
                transitionEffect:'fade',
                toolbarSettings: {toolbarPosition: 'bottom',
                                  toolbarExtraButtons: [btnFinish, btnCancel]
                                },
                anchorSettings: {
                            markDoneStep: true, // add done css
                            markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                            removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                            enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                        }
             });

        $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
            var elmForm = $("#form-step-" + stepNumber);
            // stepDirection === 'forward' :- this condition allows to do the form validation
            // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
           
            if(stepDirection === 'forward' && elmForm){
                elmForm.validator('validate');
                //step1
                var elmErr = elmForm.children('.has-error');
                if(elmErr && elmErr.length > 0){
                    // Form validation failed
                    return false;

                }

            }
            return true;
        });

        $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
            // Enable finish button only on last step
            if(stepNumber == 6){
                $('.btn-finish').removeClass('disabled');
            }else{
                $('.btn-finish').addClass('disabled');
            }
        });

    });

  function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
  $(document).on("keydown", disableF5);

   function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }

   function houseclean()
    {
    if (document.getElementById('radioPrimary13').checked == true)
      {
      $("#nama_pasangan").show();
      $("#pekerjaan_pasangan").show();
      $("#nomor_telepon_pasangan").show();
      $("#jumlah_anak").show();
      document.getElementById('nama_pasangan2').removeAttribute('disabled');
      document.getElementById('pekerjaan_pasangan2').removeAttribute('disabled');
      document.getElementById('nomor_telepon_pasangan2').removeAttribute('disabled');
      document.getElementById('jumlah_anak2').removeAttribute('disabled');
      //$("#checkboxPrimary3").prop('checked', false); 
      }
    else
      {
      $("#nama_pasangan").hide();
      $("#pekerjaan_pasangan").hide();
      $("#nomor_telepon_pasangan").hide();
      $("#jumlah_anak").hide();
      document.getElementById('nama_pasangan2').setAttribute('disabled','disabled');
      document.getElementById('pekerjaan_pasangan2').setAttribute('disabled','disabled');
      document.getElementById('nomor_telepon_pasangan2').setAttribute('disabled','disabled');
      document.getElementById('jumlah_anak2').setAttribute('disabled','disabled');

     
      }
    }

    /*window.addEventListener("beforeunload", function(event) {
        event.returnValue = "Your custom message.";
    });*/
</script>
<script type="text/javascript">
  jQuery( document ).ready(function($){
    $('.select').select2({
      theme: 'bootstrap4'
    });
  });
</script>
<script type="text/javascript">
  
jQuery( document ).ready(function($){
  $('#provinsi').on('change', function(){
        $.post('{{ URL::to('/kabupatenkota') }}', {
            type: 'kabupaten', 
            _token: "{{ csrf_token() }}",
            id: $('#provinsi').val(),

            beforeSend: function() {
              Pace.start();
            },

            success: function(msg) {
              Pace.stop();
              const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                  });
                    Toast.fire({
                      type: 'success',
                      title: ' Silahkan Pilih Kabupaten Atau Kota'
                    })
            },
          }, 
          function(e){
            $('#kabupatenkota').html(e);
        });
    });
});
</script>
<script type="text/javascript">
  jQuery( document ).ready(function($){
   $('#reservationtime').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10),
    locale:{
    format: 'YYYY-MM-DD',
    }
  })
 })
</script>
<script type="text/javascript">
  jQuery( document ).ready(function($){
  $('[data-mask]').inputmask()
});
</script>

<style type="text/css">
          hr.new4 {
    border: 1px solid #5bc0de;
  }
</style>
@include('sweet::alert')
@endsection
