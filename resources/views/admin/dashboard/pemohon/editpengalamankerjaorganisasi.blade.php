@extends('admin.layout.master')
@section('content')

<section class="content">
  <!-- /.timeline -->
  <div class="card-body">
      <div class="row"> 
        <div class="col-5 col-sm-2" id="myTab">
          <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="tab" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Bidang Pendidikan</a>
            <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="tab" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Non Pendidikan</a>
            <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="tab" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Organisasi</a>
          </div>
        </div>
        <div class="col-7 col-sm-10">
          <div class="tab-content" id="vert-tabs-tabContent">
            <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
               
              <div class="ex1">
                 <!--------------------------Pengalaman Kerja Bidang Pendidikan--------------------------->
                <h3><button class="tambahpkbpen btn btn-outline-success btn-xs btn flat"><span class="fa fa-plus-circle"></span> Tambah Pengalaman Kerja Bidang Pendidikan</button></h3>
                        
                @foreach ($bidangpend as $key => $bidangpendtampil)
                
                <div class="timeline">
                    <!-- /.timeline-label -->
                    <!-- timeline item --> 
                     <div>
                      <div class="timeline-item">
                        <span class="time bg-gray"><i class="fas fa-clock"></i> Mulai : <span class="badge badge-success">{{ $bidangpendtampil->pk_pend_mulai }}</span>  Selesai : <span class="badge badge-danger">{{ $bidangpendtampil->pk_pend_selesai }}</span></span>
                        <h3 class="timeline-header bg-info"><b>Bidang</b> Pendidikan</h3>

                          <table class="table table-bordered">
                            <thead class="bg-light">
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Sekolah/Perguruan Tinggi</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Mata Kuliah/Pelajaran</th>
                                <th scope="col">Gaji</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td> {{ $bidangpendtampil->nama_sekolah }} </td>
                                <td> {{ $bidangpendtampil->jenis_pekerjaan }} </td>
                                <td> {{ $bidangpendtampil->jenis_pelajaran }} </td>
                                <td> {{  number_format($bidangpendtampil->gaji) }}</td>
                              </tr>
                            </tbody>
                          </table>

                        <div class="timeline-footer">
                            <button class="bidangpendidikan btn btn-primary btn-xs"
                            data-id="{{ $bidangpendtampil->id_pengalaman_kerja_pend }}"
                            data-ns="{{ $bidangpendtampil->nama_sekolah }}"
                            data-jp="{{ $bidangpendtampil->jenis_pekerjaan }}"
                            data-jpel="{{ $bidangpendtampil->jenis_pelajaran }}"
                            data-gaji="{{ $bidangpendtampil->gaji }}"
                            data-pk_mulai="{{ $bidangpendtampil->pk_pend_mulai }}"
                            data-pk_selesai="{{ $bidangpendtampil->pk_pend_selesai }}"
                            ><span class="fa fa-edit"></span> edit</button>
                    
                         
                          @if($key > 0)
                           <button class="hapuspkbpen btn btn-outline-danger btn-xs"
                            data-id="{{ $bidangpendtampil->id_pengalaman_kerja_pend }}"
                            data-nmpkbpen="{{ $bidangpendtampil->nama_sekolah }}"
                            ><span class="fa fa-trash"></span> Hapus</button>
                          @else
                          @endif
                        </div>
                      </div>
                    </div>
                  <!-- END timeline item -->
                  <div>
                    <i class="fas fa-clock bg-gray"></i>
                  </div>
                  </div>
                  @endforeach
              <!-- /.col -->
              </div>
            </div>
            <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
              <div class="ex1">
                 <!--------------------------Pengalaman Kerja Bidang Non Pendidikan--------------------------->
                <h3><button class="tambahpkbnonpen btn btn-outline-success btn-xs btn flat"><span class="fa fa-plus-circle"></span> Tambah Pengalaman Kerja Bidang Non Pendidikan</button></h3>
                        
                @foreach ($bidangnonpend as $key => $bidangnonpendtampil)
                
                <div class="timeline">
                  
                    <!-- /.timeline-label -->
                    <!-- timeline item --> 
                     <div>
                      <div class="timeline-item">
                        <span class="time bg-gray"><i class="fas fa-clock"></i>
                           Mulai : <span class="badge badge-success"> {{ $bidangnonpendtampil->mulai_np }} </span>  Selesai : <span class="badge badge-danger">  {{ $bidangnonpendtampil->selesai_np }}</span>
                       </span>
                        <h3 class="timeline-header bg-info"><b>Bidang NON</b> Pendidikan</h3>

                            <table class="table table-bordered">
                              <thead class="bg-light">
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Nama Perusahaan</th>
                                  <th scope="col">Jabatan</th>
                                  <th scope="col">Gaji</th>
                                  <th scope="col">Deskripsi Pekerjaan</th>
                                  <th scope="col">Alasan Pindah</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">{{ $key + 1 }}</th>
                                  <td>{{ $bidangnonpendtampil->nama_perusahaan_np }} </td>
                                  <td>{{ $bidangnonpendtampil->Jabatan_np }} </td>
                                  <td>{{ number_format($bidangnonpendtampil->gaji_np) }}</td>
                                  <td>{{ $bidangnonpendtampil->deskripsi_np }} </td>
                                  <td>{{ $bidangnonpendtampil->alasan_pindah }} </td>
                                </tr>
                              </tbody>
                            </table>

                            <div class="timeline-footer">
                                <button class="bpnon btn btn-primary btn-xs"
                                data_id="{{ $bidangnonpendtampil->id_pk_nonpendidikan }}"
                                data_nmpnp="{{ $bidangnonpendtampil->nama_perusahaan_np }}"
                                data_jnp="{{ $bidangnonpendtampil->Jabatan_np }}"
                                data_gnp="{{ $bidangnonpendtampil->gaji_np }}"
                                data_dnp="{{ $bidangnonpendtampil->deskripsi_np }}"
                                data_apnp="{{ $bidangnonpendtampil->alasan_pindah }}"
                                data_mulainp="{{ $bidangnonpendtampil->mulai_np }}"
                                data_selesainp="{{ $bidangnonpendtampil->selesai_np }}"
                                ><span class="fa fa-edit"></span> Ubah</button>
                        
                             
                              @if($key > 0)
                               <button class="hpspknonpen btn btn-outline-danger btn-xs"
                                data-id="{{ $bidangnonpendtampil->id_pk_nonpendidikan }}"
                                data-nmpknonpen="{{ $bidangnonpendtampil->nama_perusahaan_np }}"
                                ><span class="fa fa-trash"></span> Hapus</button>
                              @else
                              @endif
                            </div>
                        </div>

                    </div>
                  <!-- END timeline item -->
                  <div>
                    <i class="fas fa-clock bg-gray"></i>
                  </div>
                  </div>
                  @endforeach
              <!-- /.col -->
              </div>
            </div>
            <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
               <div class="ex1">
                 <!--------------------------Pengalaman Kerja Bidang Non Pendidikan--------------------------->
                <h3><button class="tambahorgan btn btn-outline-success btn-xs btn flat"><span class="fa fa-plus-circle"></span> Tambah Organisasi Lainnya</button></h3>
                        
                @foreach ($bidangorg as $key => $bidangorgtampil)
                
                <div class="timeline">
                    <!-- /.timeline-label -->
                    <!-- timeline item --> 
                     <div>
                      <div class="timeline-item">
                        <span class="time bg-gray"><i class="fas fa-clock"></i> 
                           Mulai : <span class="badge badge-success"> {{ $bidangorgtampil->mulaiorganisasi }} </span>  Selesai : <span class="badge badge-danger">{{ $bidangorgtampil->selesaiorganisasi }}</span>

                         </span>
                        <h3 class="timeline-header bg-info"><b>Bidang</b> Organinsasi</h3>

                            <table class="table table-bordered">
                              <thead class="bg-light">
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Nama Organisasi</th>
                                  <th scope="col">Posisi Organisasi</th>
                                  <th scope="col">Deskripsi Tugas</th>
                                  <th scope="col">Kota</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">{{ $key + 1 }}</th>
                                  <td>{{ $bidangorgtampil->nama_organisasi }} </td>
                                  <td>{{ $bidangorgtampil->posisi_organisasi }} </td>
                                  <td>{{ $bidangorgtampil->deskripsitugasorganisasi }}</td>
                                  <td>{{ $bidangorgtampil->kotaorganisasi }} </td>
                                </tr>
                              </tbody>
                            </table>

                            <div class="timeline-footer">
                              <button class="btnorganmodal btn btn-primary btn-xs"
                              data_id="{{ $bidangorgtampil->id_pengalamanorganisasi }}"
                              data_nmorg="{{ $bidangorgtampil->nama_organisasi }}"
                              data_posisi="{{ $bidangorgtampil->posisi_organisasi }}"
                              data_desk="{{ $bidangorgtampil->deskripsitugasorganisasi }}"
                              data_kota="{{ $bidangorgtampil->kotaorganisasi }}"
                              data_morg="{{ $bidangorgtampil->mulaiorganisasi }}"
                              data_sorg="{{ $bidangorgtampil->selesaiorganisasi }}"
                              ><span class="fa fa-edit"></span> Ubah</button>
                      
                           
                            @if($key > 0)
                             <button class="hpsorgan btn btn-outline-danger btn-xs"
                              data-id="{{ $bidangorgtampil->id_pengalamanorganisasi }}"
                              data-nmorgan="{{ $bidangorgtampil->nama_organisasi }}"
                              ><span class="fa fa-trash"></span> Hapus</button>
                            @else
                            @endif
                          </div>
                        </div>
                    </div>
                  
                  <!-- END timeline item -->
                  <div>
                    <i class="fas fa-clock bg-gray"></i>
                  </div>
                  </div>
                  @endforeach
              <!-- /.col -->
              </div>
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
}
</style>
</section>
<!-- /.content -->

<!-------------------------------modal edit bidang pendidikan-------------------------------->
<div id="bp" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header bg-info">
          <h2 class="modal-title">Edit Data Pengalaman Kerja Bidang Pendidikan</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('updatepkbpend') }}" data-routeback="{{ route('pemohonindex') }}" id="myFormeditpkbpend" role="form" data-toggle="validator" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">

          <!-------------------------------Edit Pengalaman Kerja Bidang Pendidikan------------------------------>
          <input type="hidden" name="id_pkpen" id="id_pk">
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
                        <textarea class="form-control" name="nama_sekolah" id="ns" pattern="[a-z A-Z 0-9]{1,100}" placeholder="Masukan Nama Sekolah/Perguruan Tinggi" required=""></textarea>

                      </div>
                      <!-- /.input group -->
                      <font size="2" color="red">*nama sekolah/perguruan tinggi wajib diisi</font><br>
                      <font color="red" size="2">*masukan berupa huruf dan angka</font>
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
                        <input type="text" class="form-control" id="jabatan" name="jenis_pekerjaan" placeholder="Masukan Jabatan" required="" >
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
                        <input type="text" class="form-control" name="jenis_pelajaran" id="mapel" placeholder="Masukan Nama Mata Pelajaran/Mata Kuliah" required="" />
                      </div>
                      <!-- /.input group -->
                      <font size="2" color="red">*mata kuliah/pelajaran wajib diisi</font>
                     </div>
                    <!-- /.form group -->
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Gaji (Bulanan):</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-money-bill-wave-alt"></i></span>
                        </div>
                        <input type="number" class="form-control" id="gaji" name="gaji" required="" />
                      </div>
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
                        <input type="date" class="form-control" id="pk_mulai" name="pk_pend_mulai" required="" />
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
                        <input type="date" class="form-control" id="pk_selesai" name="pk_pend_selesai" required="" />
                      </div>
                      <!-- /.input group -->
                      <font size="2" color="red">*selesai kerja wajib diisi</font>
                     </div>
                    <!-- /.form group -->
                  </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="destroyvar btn btn-primary">Ubah Data</button>
        </div>
      </form>
      
    </div>
  </div>
</div>



<!-------------------------------modal tambah bagian pendidikan-------------------------------->
<div id="bptambah" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header bg-info">
          <h2 class="modal-title">Tambah Data Pengalaman Kerja Bidang Pendidikan</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('tambahpkbpen') }}" data-routeback="{{ route('pemohonindex') }}" id="myFormtambahpkbpend" role="form" data-toggle="validator" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">

          <input type="hidden" name="typepkbpen" value="1">
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
                        <textarea class="form-control" name="nama_sekolah" id="abcd" pattern="[a-z A-Z 0-9]{1,100}"  placeholder="Masukan Nama Sekolah/Perguruan Tinggi" required=""></textarea>

                      </div>
                      <!-- /.input group -->
                      <font size="2" color="red">*nama sekolah/perguruan tinggi wajib diisi</font><br>
                      <font color="red" size="2">*masukan berupa huruf dan angka</font>
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
                        <input type="text" class="form-control" name="jenis_pekerjaan" placeholder="Masukan Jabatan" required="" >
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
                        <input type="text" class="form-control" name="jenis_pelajaran" placeholder="Masukan Nama Mata Pelajaran/Mata Kuliah" required="" />
                      </div>
                      <!-- /.input group -->
                      <font size="2" color="red">*mata kuliah/pelajaran wajib diisi</font>
                     </div>
                    <!-- /.form group -->
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Gaji (Bulanan):</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-money-bill-wave-alt"></i></span>
                        </div>
                        <input type="number" class="form-control" name="gaji" required="" placeholder="4000000" />
                      </div>
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
                        <input type="date" class="form-control" name="pk_pend_mulai" required="" />
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
                        <input type="date" class="form-control" name="pk_pend_selesai" required="" />
                      </div>
                      <!-- /.input group -->
                      <font size="2" color="red">*selesai kerja wajib diisi</font>
                     </div>
                    <!-- /.form group -->
                  </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="destroyvar btn btn-primary">Tambah Data</button>
        </div>
      </form>
      
    </div>
  </div>
</div>



<!-------------------------------MODAL EDIT NON PENDIDIKAN------------------------------->
<div id="bpnonmodal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header bg-info">
          <h2 class="modal-title">Edit Data Pengalaman Kerja Bidang NON Pendidikan</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('updatepkbnonpend') }}" data-routeback="{{ route('pemohonindex') }}" id="myFormeditpkbnonpend" role="form" data-toggle="validator" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">

             <!-- Pengalaman kerja Bidang Non Pendidikan-->
                <h5>Bidang Non Pendidikan (Perusahaan Swasta Atau Lainnya) :</h5>
                  <div style="margin-bottom: 1px;"><span class="badge badge-warning">Bidang Non Pendidikan :</span></div>
                   <div class="shadow p-2 mb-2 bg-light rounded mx-auto row" style="width: 100%">
                    <input type="hidden" name="pk_nonpen" id="pk_nonpen">
                        <div class="col-md-5">
                          <div class="form-group">
                            <label>Nama Perusahaan :</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-building"></i></span>
                              </div>
                              <textarea  class="form-control" name="nama_perusahaan_np" id="nama_perusahaan_np" pattern="[a-z A-Z 0-9]{1,100}" placeholder="Masukan Nama Perusahaan" required=""></textarea>
                            </div>
                            <font size="2" color="red">*nama perusahaan wajib diisi</font><br>
                            <font color="red" size="2">*masukan berupa huruf dan angka</font>
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
                              <input type="text" class="form-control" name="Jabatan_np" id="Jabatan_np" placeholder="Masukan Nama Jabatan" required="" />
                            </div>
                            <!-- /.input group -->
                            <font size="2" color="red">*jabatan wajib diisi</font>
                           </div>
                          <!-- /.form group -->
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Gaji (Bulanan):</label>
                              <input type="number" class="form-control" id="demo_1" name="gaji_np" value="" required="" />
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
                              <textarea class="form-control" name="deskripsi_np" id="deskripsi_np" placeholder="Masukan Deskripsi Kerja Ditempat Sebelumnya" required=""></textarea>
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
                              <input type="date" class="form-control" id="mulai_np" name="mulai_np" required=""/>
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
                              <input type="date" class="form-control" id="selesai_np" name="selesai_np" required="" />
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
                              <textarea class="form-control" name="alasan_pindah" id="alasan_pindah" placeholder="Masukan Alasan Pindah Dari Perusahaan Lama" required=""></textarea>
                            </div>
                            <!-- /.input group -->
                            <font size="2" color="red">*alasan pindah wajib diisi</font>
                           </div>
                          <!-- /.form group -->
                        </div>

                    </div>
                </div>
            </div>  
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="destroyvar btn btn-primary">Ubah Data</button>
        </div>
      </form>
      
    </div>
  </div>
</div>



<!-------------------------------MODAL TAMBAH NON PENDIDIKAN------------------------------->
<div id="pkbnonpendmodal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header bg-info">
          <h2 class="modal-title">Tambah Data Pengalaman Kerja Bidang NON Pendidikan</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('tambahpkbnonpen') }}" data-routeback="{{ route('pemohonindex') }}" id="tambahpkbnonpend" role="form" data-toggle="validator" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">

             <!-- Pengalaman kerja Bidang Non Pendidikan-->
                <h5>Bidang Non Pendidikan (Perusahaan Swasta Atau Lainnya) :</h5>
                  <div style="margin-bottom: 1px;"><span class="badge badge-warning">Bidang Non Pendidikan :</span></div>
                   <div class="shadow p-2 mb-2 bg-light rounded mx-auto row" style="width: 100%">
                    <input type="hidden" name="pk_nonpentambah" value="1">
                        <div class="col-md-5">
                          <div class="form-group">
                            <label>Nama Perusahaan :</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-building"></i></span>
                              </div>
                              <textarea  class="form-control" name="nama_perusahaan_np" id="nama_perusahaan_nptambah" pattern="[a-z A-Z 0-9]{1,100}"  placeholder="Masukan Nama Perusahaan" required=""></textarea>
                            </div>
                            <font size="2" color="red">*nama perusahaan wajib diisi</font><br>
                            <font color="red" size="2">*masukan berupa huruf dan angka</font>
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
                              <input type="text" class="form-control" name="Jabatan_np"  placeholder="Masukan Nama Jabatan" required="" />
                            </div>
                            <!-- /.input group -->
                            <font size="2" color="red">*jabatan wajib diisi</font>
                           </div>
                          <!-- /.form group -->
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Gaji (Bulanan):</label>
                              <input type="number" class="form-control"  name="gaji_np" value="" required="" placeholder="3800000" />
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
                              <textarea class="form-control" name="deskripsi_np" placeholder="Masukan Deskripsi Kerja Ditempat Sebelumnya" required=""></textarea>
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
                              <input type="date" class="form-control" name="mulai_np" required=""/>
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
                              <input type="date" class="form-control" name="selesai_np" required="" />
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
                              <textarea class="form-control" name="alasan_pindah"  placeholder="Masukan Alasan Pindah Dari Perusahaan Lama" required=""></textarea>
                            </div>
                            <!-- /.input group -->
                            <font size="2" color="red">*alasan pindah wajib diisi</font>
                           </div>
                          <!-- /.form group -->
                        </div>

                    </div>
                </div>
            </div>  
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="destroyvar btn btn-primary">Tambah Data Pengalaman Kerja Non Pendidikan</button>
        </div>
      </form>
      
    </div>
  </div>
</div>


<!-------------------------------MODAL EDIT ORGANISASI------------------------------->
<div id="organmodal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header bg-info">
          <h2 class="modal-title">Edit Data Pengalaman Organisasi</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('updateorgan') }}" data-routeback="{{ route('pemohonindex') }}" id="editpengalamanorgan" role="form" data-toggle="validator" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body row" style="padding: 5px;">
          <input type="hidden" name="id_org" id="id_org">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nama Organisasi :</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-users"></i></span>
                    </div>
                    <input type="text" class="form-control" name="nama_organisasi" id="nama_organisasi" pattern="[a-z A-Z 0-9]{1,100}" placeholder="Masukan Nama Organisasi" required="" />
                  </div>
                  <!-- /.input group -->
                  <font size="2" color="red">*nama organisasi wajib diisi</font><br>
                  <font color="red" size="2">*masukan berupa huruf dan angka</font>
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
                    <input type="text" class="form-control" name="posisi_organisasi" id="posisi_organisasi" placeholder="Masukan Posisi Dalam Organisasi" required="" />
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
                    <input type="text" class="form-control" name="kotaorganisasi" id="kotaorganisasi" placeholder="Masukan Kota Organisasi" required="" />
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
                    <textarea class="form-control" name="deskripsitugasorganisasi" id="deskripsitugasorganisasi" placeholder="Masukan Deksipsi Tugas Dalam Organisasi" required=""></textarea>
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
                    <input type="date" class="form-control" name="mulaiorganisasi" id="mulaiorganisasi" required="" />
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
                    <input type="date" class="form-control" name="selesaiorganisasi" id="selesaiorganisasi" required="" />
                  </div>
                  <!-- /.input group -->
                  <font size="2" color="red">*waktu selesai dalam organisasi wajib diisi</font>
                 </div>
                <!-- /.form group -->
              </div>
          </div>
        </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="destroyvar btn btn-primary">Ubah Data Organisasi</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-------------------------------MODAL TAMBAH ORGANISASI------------------------------->
<div id="organmodaltambah" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header bg-info">
          <h2 class="modal-title">Tambah Data Pengalaman Organisasi</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('tambahorgan') }}" data-routeback="{{ route('pemohonindex') }}" id="tambahpengalamanorganisasi" role="form" data-toggle="validator" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body row" style="padding: 5px;">
          <input type="hidden" name="typeorgan" value="1">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nama Organisasi :</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-users"></i></span>
                    </div>
                    <input type="text" class="form-control" name="nama_organisasi" id="nama_organisasitambah" pattern="[a-z A-Z 0-9]{1,100}" placeholder="Masukan Nama Organisasi" required="" />
                  </div>
                  <!-- /.input group -->
                  <font size="2" color="red">*nama organisasi wajib diisi</font><br>
                  <font color="red" size="2">*masukan berupa huruf dan angka</font>
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
                    <input type="text" class="form-control" name="posisi_organisasi" placeholder="Masukan Posisi Dalam Organisasi" required="" />
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
                    <input type="text" class="form-control" name="kotaorganisasi" placeholder="Masukan Kota Organisasi" required="" />
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
                    <textarea class="form-control" name="deskripsitugasorganisasi" placeholder="Masukan Deksipsi Tugas Dalam Organisasi" required=""></textarea>
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
                    <input type="date" class="form-control" name="mulaiorganisasi" required="" />
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
                    <input type="date" class="form-control" name="selesaiorganisasi"  required="" />
                  </div>
                  <!-- /.input group -->
                  <font size="2" color="red">*waktu selesai dalam organisasi wajib diisi</font>
                 </div>
                <!-- /.form group -->
              </div>
          </div>
        </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="destroyvar btn btn-primary">Tambah Data Organisasi</button>
        </div>
      </form>
    </div>
  </div>
</div>



</fieldset>
@endsection
@section('script')

<!---------------------------------------ORGANISASI--------------------------------->
<!--Hapus Pengalaman kerja bidang NON pendidikan-->
<script type="text/javascript">
  $(document).on('click', '.hpsorgan', function(){

    var id_organ = $(this).attr('data-id');
    var nm_organ = $(this).attr('data-nmorgan');
       Swal.fire({
          title: 'Apakah Anda Yakin ?',
          text: 'Untuk Menghapus "'+nm_organ+'"',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya, Saya Yakin!',
          cancelButtonText: 'Ngak Jadi Deh'
        }).then((result) => {
          if (result.value) {
            $.ajax({
                
                url:  "../../hapus/organ/"+id_organ,

                beforeSend:function(){
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
                success:function(Response)
                 {
                   Swal.fire({
                      title: 'Berhasil !',
                      text: 'Data '+nm_organ+' Berhasil Dihapus',
                      type: 'success'
                    })
                  setTimeout(location.reload.bind(location), 2000);
                 },
                error: function(xhr) { // if error occured
                      swal.fire("Upsss!", "Terjadi Kesalahan!", "error");
                  },
              })  
          }else{
            Swal.fire(
              'success!',
              'Proses dibatalkan.',
              'success'
            )
          }
        })
      });
</script>
<!--------------Tambah Organisasi ----------------->
<script>

    $(document).on('click', '.tambahorgan', function(){
    
      $('#organmodaltambah').modal('show');

     });

    //edit data pendidikan 
    $(document).on('submit', '#tambahpengalamanorganisasi', function(e) {  
      e.preventDefault();
      var route = $('#tambahpengalamanorganisasi').data('route');
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

            $(wrapper).append(  '<div class="overlay d-flex justify-content-center align-items-center" id="cekoverlay">'+ 
                                  '<i class="fas fa-2x fa-sync fa-spin"></i>'+
                                ' <b>Sedang Menyimpan Data...</div>');
          },
          success: function(Response){
            console.log(Response)
           Swal.fire({
                  title: 'Berhasil !',
                  text: "Data Berhasil Diubah",
                  type: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Oke'
                }).then((result) => {
                  if (result.value) {
                    $('.overlay').remove();
                    $('#organmodaltambah').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                  }
                  $('#organmodaltambah').modal('hide');
                      $.blockUI({ css: { 
                          border: 'none', 
                          padding: '5px', 
                          backgroundColor: '#000', 
                          '-webkit-border-radius': '5px', 
                          '-moz-border-radius': '5px', 
                          opacity: .5, 
                          color: '#fff' 
                      } }); 
                })
          $('.overlay').remove();

          },
          complete: function() {
                    $.unblockUI();
                    $('#organmodaltambah').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                    $('.overlay').remove();
                },

      })
    });

    $('#nama_organisasitambah').keyup(nama_organisasitambah);

    function nama_organisasitambah() {
            var errorMsg = "Masukan hanya berupa huruf dan angka.";
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
  
</script>

<!--------------Edit Organisasi ----------------->
<script>

    $(document).on('click', '.btnorganmodal', function(){
    
      id = $(this).attr('data_id');
      nmorg = $(this).attr('data_nmorg');
      posisi = $(this).attr('data_posisi');
      desk = $(this).attr('data_desk');
      kota = $(this).attr('data_kota');
      morg = $(this).attr('data_morg');
      sorg = $(this).attr('data_sorg');
      $("#id_org").val(id);
      $("#nama_organisasi").val(nmorg);
      $("#posisi_organisasi").val(posisi);
      $("#kotaorganisasi").val(kota);
      $("#deskripsitugasorganisasi").val(desk);
      $("#mulaiorganisasi").val(morg);
      $("#selesaiorganisasi").val(sorg);
      $('#organmodal').modal('show');

     });

    //edit data pendidikan
    $(document).on('submit', '#editpengalamanorgan', function(e) {  
      e.preventDefault();
      var route = $('#editpengalamanorgan').data('route');
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

            $(wrapper).append(  '<div class="overlay d-flex justify-content-center align-items-center" id="cekoverlay">'+ 
                                  '<i class="fas fa-2x fa-sync fa-spin"></i>'+
                                ' <b>Sedang Menyimpan Data...</div>');
          },
          success: function(Response){
           Swal.fire({
                  title: 'Berhasil !',
                  text: "Data Berhasil Diubah",
                  type: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Oke'
                }).then((result) => {
                  if (result.value) {
                    $('.overlay').remove();
                    $('#organmodal').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                  }
                  $('#organmodal').modal('hide');
                      $.blockUI({ css: { 
                          border: 'none', 
                          padding: '5px', 
                          backgroundColor: '#000', 
                          '-webkit-border-radius': '5px', 
                          '-moz-border-radius': '5px', 
                          opacity: .5, 
                          color: '#fff' 
                      } }); 
                })
          $('.overlay').remove();

          },
          complete: function() {
                    $.unblockUI();
                    $('#organmodal').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                    $('.overlay').remove();
                },

      })
    });
  
    $('#nama_organisasi').keyup(nama_organisasi);

    function nama_organisasi() {
            var errorMsg = "Masukan hanya berupa huruf dan angka.";
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
</script>

<!---------------------------------------ORGANISASI--------------------------------->

<!---------------------------------------PENGALAMAN KERJA NON BIDANG PENDIDIKAN--------------------------------->

<!--Tambah Pengalaman kerja bidang NON pendidikan-->
<script>

    $(document).on('click', '.tambahpkbnonpen', function(){
    
      $('#pkbnonpendmodal').modal('show');

     });

    //edit data pendidikan
    $(document).on('submit', '#tambahpkbnonpend', function(e) {  
      e.preventDefault();
      var route = $('#tambahpkbnonpend').data('route');
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
            $(wrapper).append(  '<div class="overlay d-flex justify-content-center align-items-center" id="cekoverlay">'+ 
                                  '<i class="fas fa-2x fa-sync fa-spin"></i>'+
                                ' <b>Sedang Menyimpan Data...</div>');
          },
          success: function(Response){
            console.log(Response)
           Swal.fire({
                  title: 'Berhasil !',
                  text: "Data Berhasil Ditambah",
                  type: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Oke'
                }).then((result) => {
                  if (result.value) {
                    $('.overlay').remove();
                    $('#pkbnonpendmodal').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                  }
                   $.blockUI({ css: { 
                          border: 'none', 
                          padding: '5px', 
                          backgroundColor: '#000', 
                          '-webkit-border-radius': '5px', 
                          '-moz-border-radius': '5px', 
                          opacity: .5, 
                          color: '#fff' 
                      } }); 
                })
          $('.overlay').remove();
            
          },
          complete: function() {
                    $.unblockUI();
                    $('#pkbnonpendmodal').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                    $('.overlay').remove();
                },

      })
    });

    $('#nama_perusahaan_nptambah').keyup(nama_perusahaan_nptambah);

    function nama_perusahaan_nptambah() {
            var errorMsg = "Masukan hanya berupa huruf dan angka.";
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
  
</script>
<!--Edit Pengalaman kerja bidang NON pendidikan-->
<script>

    $(document).on('click', '.bpnon', function(){
    
      id = $(this).attr('data_id');
      nmpnp = $(this).attr('data_nmpnp');
      np = $(this).attr('data_jnp');
      gnp = $(this).attr('data_gnp');
      dnp = $(this).attr('data_dnp');
      apnp = $(this).attr('data_apnp');
      mulainp = $(this).attr('data_mulainp');
      selesainp = $(this).attr('data_selesainp');
      $("#pk_nonpen").val(id);
      $("#nama_perusahaan_np").val(nmpnp);
      $("#Jabatan_np").val(np);
      $("#demo_1").val(gnp);
      $("#deskripsi_np").val(dnp);
      $("#mulai_np").val(mulainp);
      $("#selesai_np").val(selesainp);
      $("#alasan_pindah").val(apnp);
      $('#bpnonmodal').modal('show');

     });

    //edit data pendidikan
    $(document).on('submit', '#myFormeditpkbnonpend', function(e) {  
      e.preventDefault();
      var route = $('#myFormeditpkbnonpend').data('route');
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
            $(wrapper).append(  '<div class="overlay d-flex justify-content-center align-items-center" id="cekoverlay">'+ 
                                  '<i class="fas fa-2x fa-sync fa-spin"></i>'+
                                ' <b>Sedang Menyimpan Data...</div>');
          },
          success: function(Response){
            console.log(Response)
           Swal.fire({
                  title: 'Berhasil !',
                  text: "Data Berhasil Diubah",
                  type: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Oke'
                }).then((result) => {
                  if (result.value) {
                    $('.overlay').remove();
                    $('#bpnonmodal').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                  }
                   $.blockUI({ css: { 
                          border: 'none', 
                          padding: '5px', 
                          backgroundColor: '#000', 
                          '-webkit-border-radius': '5px', 
                          '-moz-border-radius': '5px', 
                          opacity: .5, 
                          color: '#fff' 
                      } }); 
                })
          $('.overlay').remove();
            
          },
          complete: function() {
                    $.unblockUI();
                    $('#bpnonmodal').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                    $('.overlay').remove();
                },

      })
    });

    $('#nama_perusahaan_np').keyup(nama_perusahaan_np);

    function nama_perusahaan_np() {
            var errorMsg = "Masukan hanya berupa huruf dan angka.";
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
  
</script>


<!--Hapus Pengalaman kerja bidang NON pendidikan-->
<script type="text/javascript">
  $(document).on('click', '.hpspknonpen', function(){

    var id_pknonpen = $(this).attr('data-id');
    var pknonpen = $(this).attr('data-nmpknonpen');
       Swal.fire({
          title: 'Apakah Anda Yakin ?',
          text: 'Untuk Menghapus "'+pknonpen+'"',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya, Saya Yakin!',
          cancelButtonText: 'Ngak Jadi Deh'
        }).then((result) => {
          if (result.value) {
            $.ajax({
                
                url:  "../../hapus/pkbnonpen/"+id_pknonpen,

                beforeSend:function(){
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
                success:function(Response)
                 {
                   Swal.fire({
                      title: 'Berhasil !',
                      text: 'Data '+pknonpen+' Berhasil Dihapus',
                      type: 'success'
                    })
                  setTimeout(location.reload.bind(location), 2000);
                 },
                error: function(xhr) { // if error occured
                      swal.fire("Upsss!", "Terjadi Kesalahan!", "error");
                  },
              })  
          }else{
            Swal.fire(
              'success!',
              'Proses dibatalkan.',
              'success'
            )
          }
        })
      });
</script>
<!---------------------------------------PENGALAMAN KERJA BIDANG NON PENDIDIKAN--------------------------------->



<!---------------------------------------PENGALAMAN KERJA BIDANG PENDIDIKAN--------------------------------->

<!--Edit Pengalaman kerja bidang pendidikan-->
<script>

    $(document).on('click', '.bidangpendidikan', function(){
  
      ns = $(this).attr('data-ns');
      jp = $(this).attr('data-jp');
      jpel = $(this).attr('data-jpel');
      gaji = $(this).attr('data-gaji');
      pk_mulai = $(this).attr('data-pk_mulai');
      pk_selesai = $(this).attr('data-pk_selesai');
      id = $(this).attr('data-id');
      $("#ns").val(ns);
      $("#jabatan").val(jp);
      $("#mapel").val(jpel);
      $("#pk_mulai").val(pk_mulai);
      $("#pk_selesai").val(pk_selesai);
      $("#id_pk").val(id);
      $("#gaji").val(gaji);
      $('#bp').modal('show');

     });

    //edit data pendidikan
    $(document).on('submit', '#myFormeditpkbpend', function(e) {  
      e.preventDefault();
      var route = $('#myFormeditpkbpend').data('route');
      var routeback = $('#myFormeditpkbpend').data('routeback');
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
            $(wrapper).append(  '<div class="overlay d-flex justify-content-center align-items-center" id="cekoverlay">'+ 
                                  '<i class="fas fa-2x fa-sync fa-spin"></i>'+
                                ' <b>Sedang Menyimpan Data...</div>');
          },
          success: function(Response){
           Swal.fire({
                  title: 'Berhasil !',
                  text: "Data Berhasil Diubah",
                  type: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Oke'
                }).then((result) => {
                  if (result.value) {
                    $('.overlay').remove();
                    $('#bp').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                  }
                   $.blockUI({ css: { 
                          border: 'none', 
                          padding: '5px', 
                          backgroundColor: '#000', 
                          '-webkit-border-radius': '5px', 
                          '-moz-border-radius': '5px', 
                          opacity: .5, 
                          color: '#fff' 
                      } }); 
                })
          $('.overlay').remove();
            
          },
          complete: function() {
                    $.unblockUI();
                    $('#bp').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                    $('.overlay').remove();
                },

      })
    });

    $('#ns').keyup(ns);

    function ns() {
            var errorMsg = "Masukan hanya berupa huruf dan angka.";
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
  
</script>

<!--Tambah Pengalaman kerja bidang pendidikan-->
<script>

     $(document).on('click', '.tambahpkbpen', function(){
      $('#bptambah').modal('show');
     });

    //edit data pendidikan
    $(document).on('submit', '#myFormtambahpkbpend', function(e) {  
      e.preventDefault();
      var route = $('#myFormtambahpkbpend').data('route');
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
            $(wrapper).append(  '<div class="overlay d-flex justify-content-center align-items-center" id="cekoverlay">'+ 
                                  '<i class="fas fa-2x fa-sync fa-spin"></i>'+
                                ' <b>Sedang Mengupdate Data...</div>');

          },
          success: function(Response){
            console.log(Response)
            Swal.fire({
                  title: 'Berhasil !',
                  text: "Data Berhasil Disimpan",
                  type: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Oke'
                }).then((result) => {
                  if (result.value) {
                    $('.overlay').remove();
                    $('#bptambah').modal('hide');
                  }
                   $.blockUI({ css: { 
                          border: 'none', 
                          padding: '5px', 
                          backgroundColor: '#000', 
                          '-webkit-border-radius': '5px', 
                          '-moz-border-radius': '5px', 
                          opacity: .5, 
                          color: '#fff' 
                      } }); 
                })
            $('.overlay').remove();
            $('#bptambah').modal('hide');

          },
          complete: function() {
                  $.unblockUI();
                  setTimeout(location.reload.bind(location), 2000);
                      
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                    $('.overlay').remove();
                },

      })
    });

    $('#abcd').keyup(abcd);

    function abcd() {
            var errorMsg = "Masukan hanya berupa huruf dan angka.";
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

  
</script>


<!--Hapus Pengalaman kerja bidang pendidikan-->
<script type="text/javascript">
  $(document).on('click', '.hapuspkbpen', function(){

    var id_pkbpen = $(this).attr('data-id');
    var pkbpen = $(this).attr('data-nmpkbpen');
       Swal.fire({
          title: 'Apakah Anda Yakin ?',
          text: 'Untuk Menghapus "'+pkbpen+'"',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya, Saya Yakin!',
          cancelButtonText: 'Ngak Jadi Deh'
        }).then((result) => {
          if (result.value) {
            $.ajax({
                
                url:  "../../hapus/pkbpen/"+id_pkbpen,

                beforeSend:function(){
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
                success:function(Response)
                 {
                   Swal.fire({
                      title: 'Berhasil !',
                      text: 'Data '+pkbpen+' Berhasil Dihapus',
                      type: 'success'
                    })
                  setTimeout(location.reload.bind(location), 2000);
                 },
                error: function(xhr) { // if error occured
                      swal.fire("Upsss!", "Terjadi Kesalahan!", "error");
                  },
              })  
          }else{
            Swal.fire(
              'success!',
              'Proses dibatalkan.',
              'success'
            )
          }
        })
      });






</script>
 <script type="text/javascript">
//stay di tab jika di refresh
  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
      localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
      $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
  });
  </script>
<!---------------------------------------PENGALAMAN KERJA BIDANG PENDIDIKAN--------------------------------->

<style type="text/css">
hr.new4 {
  border: 2px solid #5293d5;
  border-radius: 5px;
}
div.ex1 {
  height: 430px;
  overflow-x: scroll;
}
/* Hide scrollbar for Chrome, Safari and Opera */
.ex1::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE and Edge */
.ex1 {
    -ms-overflow-style: none;
}
</style>

@include('sweet::alert')
@endsection