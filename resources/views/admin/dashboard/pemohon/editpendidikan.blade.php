@extends('admin.layout.master')
@section('content')
<section class="content">
  <!-- /.timeline -->
  <div class="card-body">
      <div class="row"> 
        <div class="col-5 col-sm-2" id="myTab">
          <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="tab" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Tingkat SMP</a>
            <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="tab" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Tingkat SMA</a>
            <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="tab" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Perguruan Tinggi</a>
          </div>

        </div>
   
        <div class="col-7 col-sm-10">
          <div class="tab-content" id="vert-tabs-tabContent">
            <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
              
              <div class="ex1">
                 <!--------------------------Pengalaman Kerja Bidang Pendidikan--------------------------->
                <div class="timeline">
                  <div>
                    <i class="fas fa-university bg-info"></i>
                  </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item --> 
                     <div>
                      <div class="timeline-item">
                        <span class="time bg-gray"><i class="fas fa-clock"></i> Mulai : <span class="badge badge-success">{{ $smp_tahunmulai }}</span>  Selesai : <span class="badge badge-danger">{{ $smp_tahunselesai }}</span></span>
                        <h3 class="timeline-header bg-info"><b>Tingkat</b> SMP (Sederajat)</h3>

                          <table class="table table-bordered">
                            <thead class="bg-light">
                              <tr>
                                <th scope="col">Nama Sekolah</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td> {{ $smp_namasekolah }} </td>
                              </tr>
                            </tbody>
                          </table>
                          <div class="timeline-footer">
                          <button class="editpendidikansmp btn btn-primary btn-xs" id="{{ $id_pendidikan }}" data-nsmp="{{ $smp_namasekolah }}" data-msmp="{{ $smp_tahunmulai }}" data-ssmp="{{ $smp_tahunselesai }}"><span class="fa fa-edit"></span> Ubah</button>
                          </div>

                      </div>
                    </div>
                  <!-- END timeline item -->
                  <div>
                    <i class="fas fa-clock bg-gray"></i>
                  </div>
                  </div>
              <!-- /.col -->
              </div>
            </div>
            <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
              <div class="ex1">
                 <!--------------------------Pengalaman Kerja Bidang Non Pendidikan--------------------------->
                <div class="timeline">
                  <div>
                    <i class="fas fa-university bg-info"></i>
                  </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item --> 
                     <div>
                      <div class="timeline-item">
                        <span class="time bg-gray"><i class="fas fa-clock"></i>
                           Mulai : <span class="badge badge-success"> {{ $sma_tahunmulai }} </span>  Selesai : <span class="badge badge-danger">  {{ $sma_tahunselesai }}</span>
                       </span>
                        <h3 class="timeline-header bg-info"><b>Tingkat</b> SMA (Sederajat)</h3>

                          <table class="table table-bordered">
                            <thead class="bg-light">
                              <tr>
                                <th scope="col">Nama Sekolah</th>
                                <th scope="col">Nama Jurusan</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td> {{ $sma_namasekolah }} </td>
                                <td> {{ $sma_jurusan }} </td>
                              </tr>
                            </tbody>
                          </table>
                          <div class="timeline-footer">
                           <button class="editpendidikansma btn btn-primary btn-xs" 
                            data-id="{{ $id_pendidikan }}"
                            data-nsma="{{ $sma_namasekolah }}"
                            data-jsma="{{ $sma_jurusan }}"
                            data-tmsma="{{ $sma_tahunmulai }}"
                            data-tssma="{{ $sma_tahunselesai }}"
                            ><span class="fa fa-edit"></span> Ubah</button>
                          </div>
                        </div>

                    </div>
                  <!-- END timeline item -->
                  <div>
                    <i class="fas fa-clock bg-gray"></i>
                  </div>
                  </div>
              <!-- /.col -->
              </div>
            </div>
            <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
               <div class="ex1">
                 <!--------------------------Pengalaman Kerja Bidang Non Pendidikan--------------------------->
                <h3><button class="tambah_pt btn btn-outline-success btn-xs btn-flat"><span class="fa fa-plus-circle"></span> Tambah Perguruan Tinggi Lainnya</button></h3>
                        
                @foreach ($kampus as $key => $kampustampil)
                <div class="timeline">
                    <!-- /.timeline-label -->
                    <!-- timeline item --> 
                     <div>
                      <div class="timeline-item">
                        <span class="time bg-gray"><i class="fas fa-clock"></i> 
                           Mulai : <span class="badge badge-success"> {{ $kampustampil->pt_mulai }} </span>  Selesai : <span class="badge badge-danger">{{ $kampustampil->pt_selesai }}</span>

                         </span>
                        <h3 class="timeline-header bg-info"><b>Tingkat</b> Perguruan Tinggi</h3>

                          <table class="table table-bordered">
                            <thead class="bg-light">
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Perguruan Tinggi</th>
                                <th scope="col">Nama Program Studi</th>
                                <th scope="col">Jenjang</th>
                                <th scope="col">IPK</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td> {{ $kampustampil->pt_nama }} </td>
                                <td> {{ $kampustampil->pt_studi }} </td>
                                <td> {{ $kampustampil->pt_jenjang }} </td>
                                <td> {{ $kampustampil->pt_ipk }} </td>
                              </tr>
                            </tbody>
                          </table>
                          <div class="timeline-footer">
                          <button class="perguruan_tinggi btn btn-primary btn-xs"
                          data-id="{{ $kampustampil->id_perguruantinggi }}"
                          data-ptnama="{{ $kampustampil->pt_nama }}"
                          data-ptstudi="{{ $kampustampil->pt_studi }}"
                          data-ptjenjang="{{ $kampustampil->pt_jenjang }}"
                          data-ptipk="{{ $kampustampil->pt_ipk }}"
                          data-ptmulai="{{ $kampustampil->pt_mulai }}"
                          data-ptselesai="{{ $kampustampil->pt_selesai }}"
                          ><span class="fa fa-edit"></span> Ubah</button>
                  
                       
                        @if($key > 0)
                         <button class="hapus_pt btn btn-outline-danger btn-xs"
                          id="btnhapuspt"
                          data-id="{{ $kampustampil->id_perguruantinggi }}"
                          data-iduser="{{ $kampustampil->id_user }}"
                          data-nmpt="{{ $kampustampil->pt_nama }}"
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

</section>
<!-- /.content -->

<!-------------------------------modal edit bagian smp-------------------------------->
<div id="pendidikan_smp" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header bg-info">
          <h2 class="modal-title">Edit Data Pendidikan SMP</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>


        <form data-route="{{ route('updatePendidikansmpsma') }}" data-routeback="{{ route('pemohonindex') }}" id="myFormpendidikansmp" role="form" data-toggle="validator" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">

          <!-------------------------------Sekolah Menengah Pertama------------------------------>

           <p style="margin-bottom: 1px;"><span class="badge badge-info">Sekolah Menegah Pertama(SMP) :</span>
           </p>
           
            <input type="hidden" name="id_pendidikansmp" id="id_pendidikansmp">
            <div class="shadow p-1 mb-1  rounded row mx-auto" style="width: 100%; background-color: #e8f3ff">
              
              
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="nama_sekolah">Nama Sekolah Smp:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-university"></i></span>
                      </div>
                      <textarea class="tes form-control" name="smp_namasekolah" id="smp_namasekolah" placeholder="Masukan Nama Sekolah" pattern="[A-Za-z0-9]{3,}" required></textarea>
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
                          <input type="date" class="form-control" id="mulai_smp" name="smp_tahunmulai" value=""  placeholder="Pilih Tanggal" autocomplete="off" required>
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
                        <input type="date" class="form-control" id="selesai_smp" name="smp_tahunselesai" value=""  placeholder="Pilih Tanggal" autocomplete="off" required>
                      </div>
                          <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
              
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Ubah Data SMP</button>
        </div>
      </form>
      
    </div>
  </div>
</div>

<!-------------------------------Sekolah Menengah Atas------------------------------>
<div id="pendidikan_sma" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header bg-info">
          <h2 class="modal-title">Edit Data Pendidikan SMA</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('updatePendidikansmpsma') }}" data-routeback="{{ route('pemohonindex') }}" id="myFormpendidikansma" role="form" data-toggle="validator" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">

          <input type="hidden" name="id_pendidikansma" id="id_pendidikansma" >
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
                    <input type="text" class="form-control" name="sma_jurusan" id="sma_jurusan" placeholder="Masukan Jurusan" required>
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
                      <input type="date" class="form-control" name="sma_tahunmulai" id="sma_tahunmulai" value="" placeholder="Pilih Tanggal" required> 
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
                    <input type="date" class="form-control" name="sma_tahunselesai" id="sma_tahunselesai" value=""  placeholder="Pilih Tanggal" required>
                  </div>
                      <div class="help-block with-errors text-danger"></div>
                  </div>
                </div>
            </div>
          </div>
        </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Ubah Data SMA</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-------------------------------perguruan tinggi------------------------------>
<div id="pendidikan_perguruantinggi" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header bg-info">
          <h2 class="modal-title">Edit Data Perguruan Tinggi</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('updateperguruantinggi') }}" data-routeback="{{ route('pemohonindex') }}" id="myFormperguruantinggi" role="form" data-toggle="validator" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">
              <input type="hidden" name="id_perguruantinggi" id="id_perguruantinggi">
              <div class="shadow p-1 mb-1 bg-light rounded row mx-auto" style="width: 100%">

                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="nama_perguruantinggi">Nama Perguruan Tinggi :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-university"></i></span>
                      </div>
                      <textarea class="form-control" name="pt_nama" id="ptnama" placeholder="Masukan Nama Perguruan Tinggi" required></textarea>
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
                        <select class="form-control" name="pt_jenjang" id="ptjenjang"  required>
                          <option value="">--Pilih Jenjang Pendidikan--</option>
                          <option value="S3" >Doktoral (S3)</option>
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
                        <input type="text" class="form-control" name="pt_studi" id="ptstudi" placeholder="Masukan Program Studi" required>
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
                        <input type="text" class="form-control" name="pt_ipk" id="ptipk" placeholder="Masukan IPK"  maxlength="5" required>
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
                          <input type="date" class="form-control" name="pt_mulai" id="ptmulai" value="" placeholder="Pilih Tanggal" autocomplete="off" required> 
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
                        <input type="date" class="form-control" name="pt_selesai" id="ptselesai" value=""  placeholder="Pilih Tanggal" autocomplete="off" required>
                      </div>
                          <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>
                </div>
            </div>
          </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Ubah Data Perguruan Tinggi</button>
          </div>
        </form>
    </div>
  </div>
</div>
<!-------------------------------perguruan tinggi------------------------------>
<div id="pendidikan_perguruantinggitambah" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header bg-info">
          <h2 class="modal-title">Tambah Data Perguruan Tinggi</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('postDatapendidikanpt') }}" data-routeback="{{ route('editPendidikan',['id'=>$id_user]) }}" id="myFormperguruantinggitambahan" role="form" data-toggle="validator" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">
              <input type="hidden" name="typetambahanpt" value="1">
              <div class="shadow p-1 mb-1 bg-light rounded row mx-auto" style="width: 100%">

                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="nama_perguruantinggi">Nama Perguruan Tinggi :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-university"></i></span>
                      </div>
                      <textarea class="form-control" name="pt_nama" placeholder="Masukan Nama Perguruan Tinggi" required></textarea>
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
                        <select class="form-control" name="pt_jenjang" required>
                          <option value="">--Pilih Jenjang Pendidikan--</option>
                          <option value="S3" >Doktoral (S3)</option>
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
                        <input type="text" class="form-control" name="pt_studi" placeholder="Masukan Program Studi" required>
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
                        <input type="text" class="form-control" name="pt_ipk" placeholder="Masukan IPK"  maxlength="5" required>
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
                          <input type="date" class="form-control" name="pt_mulai" value="" placeholder="Pilih Tanggal" autocomplete="off" required> 
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
                        <input type="date" class="form-control" name="pt_selesai"  value=""  placeholder="Pilih Tanggal" autocomplete="off" required>
                      </div>
                          <div class="help-block with-errors text-danger"></div>
                      </div>
                  </div>

                </div>
                </div>
            </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Perguruan Tinggi</button>
          </div>
        </form>
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
  bottom: 60px;
  left: 20px
}
</style>

@endsection
@section('script')

<script type="text/javascript">
  $(document).on('click', '.hapus_pt', function(){

    var id_pthapus = $(this).attr('data-id');
    var id_userpt = $(this).attr('data-iduser');
    var nm_pthapus = $(this).attr('data-nmpt');
    var route = $('#btnhapuspt').data('route');
       Swal.fire({
          title: 'Apakah Anda Yakin ?',
          text: 'Untuk Menghapus "'+nm_pthapus+'"',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya, Saya Yakin!',
          cancelButtonText: 'Ngak Jadi Deh'
        }).then((result) => {
          if (result.value) {
            $.ajax({
                
                url:  "../../hapus/proses/"+id_pthapus,

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
                success:function(data)
                 {
                   Swal.fire({
                      title: 'Berhasil !',
                      text: "Data Berhasil Dihapus",
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
<!--tambah perguruan tinggi-->
<script>

     $(document).on('click', '.tambah_pt', function(){
      id_perguruantinggi = $(this).attr('data-id');
      $('#pendidikan_perguruantinggitambah').modal('show');
     });

    //edit data pendidikan
    $(document).on('submit', '#myFormperguruantinggitambahan', function(e) {  
      e.preventDefault();
      var route = $('#myFormperguruantinggitambahan').data('route');
      var routeback = $('#myFormperguruantinggitambahan').data('routeback');
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
           
            $('.overlay').remove();
            
           
            $('#pendidikan_perguruantinggitambah').modal('hide');
            
         
          },
          complete: function() {
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
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                    $('.overlay').remove();
                },

      })
    });
  
</script>


<!--edit perguruan tinggi-->
<script>

     $(document).on('click', '.perguruan_tinggi', function(){
      id_perguruantinggi = $(this).attr('data-id');
      ptnama = $(this).attr('data-ptnama');
      ptstudi = $(this).attr('data-ptstudi');
      ptjenjang = $(this).attr('data-ptjenjang');
      ptipk = $(this).attr('data-ptipk');
      ptmulai = $(this).attr('data-ptmulai');
      ptselesai = $(this).attr('data-ptselesai');
      $("#ptnama").val(ptnama);
      $("#ptstudi").val(ptstudi);
      $("#ptipk").val(ptipk);
      $("#ptmulai").val(ptmulai);
      $("#ptselesai").val(ptselesai);
      $("#id_perguruantinggi").val(id_perguruantinggi);
      $('#ptjenjang option[value="' + ptjenjang + '"]').attr('selected','selected');
      $('#pendidikan_perguruantinggi').modal('show');
     });

    //edit data pendidikan
    $(document).on('submit', '#myFormperguruantinggi', function(e) {  
      e.preventDefault();
      var route = $('#myFormperguruantinggi').data('route');
      var routeback = $('#myFormperguruantinggi').data('routeback');
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
                                ' <b>Sedang Mengupdate Data...</div>');
          },
          success: function(Response){
            Swal.fire({
                  title: 'Berhasil !',
                  text: "Data Berhasil Disimpan",
                  type: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Oke'
                }).then((result) => {
                  if (result.value) {
                    $('.overlay').remove();
                    $('#pendidikan_perguruantinggi').modal('hide');
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
            $('#pendidikan_perguruantinggi').modal('hide');
         
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
  
</script>

<!--edit sekolah menengah atas-->
<script>

    var id_pendidikansma;

     $(document).on('click', '.editpendidikansma', function(){
      id_pendidikansma = $(this).attr('data-id');
      nm_sma = $(this).attr('data-nsma');
      jur_sma = $(this).attr('data-jsma');
      tm_sma = $(this).attr('data-tmsma');
      ts_sma = $(this).attr('data-tssma');
      $("#sma_namasekolah").val(nm_sma);
      $("#sma_jurusan").val(jur_sma);
      $("#sma_tahunmulai").val(tm_sma);
      $("#sma_tahunselesai").val(ts_sma);
      $("#id_pendidikansma").val(id_pendidikansma);
      $('#pendidikan_sma').modal('show');
     });

    //edit data pendidikan
    $(document).on('submit', '#myFormpendidikansma', function(e) {  
      e.preventDefault();
      var route = $('#myFormpendidikansma').data('route');
      var routeback = $('#myFormpendidikansma').data('routeback');
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
                                ' <b>Sedang Mengupdate Data...</div>');
          },
          success: function(Response){
            console.log(Response);
            //setTimeout($.unblockUI, 1000); 
            
            Swal.fire({
                  title: 'Berhasil !',
                  text: "Data Berhasil Disimpan",
                  type: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Oke'
                }).then((result) => {
                  if (result.value) {
                    $('.overlay').remove();
                    $('#pendidikan_sma').modal('hide');
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
            $('#pendidikan_sma').modal('hide');
      
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
  
</script>

<!--edit sekolah menengah pertama-->
<script>

    var id_pendidikansmp;

     $(document).on('click', '.editpendidikansmp', function(){
      id_pendidikansmp = $(this).attr('id');
      nm_smp = $(this).attr('data-nsmp');
      m_smp = $(this).attr('data-msmp');
      s_smp = $(this).attr('data-ssmp');
      $("#smp_namasekolah").val(nm_smp);
      $("#mulai_smp").val(m_smp);
      $("#selesai_smp").val(s_smp);
      $("#id_pendidikansmp").val(id_pendidikansmp);
      $('#pendidikan_smp').modal('show');
     });

    //edit data pendidikan
    $(document).on('submit', '#myFormpendidikansmp', function(e) {  
      e.preventDefault();
      var route = $('#myFormpendidikansmp').data('route');
      var routeback = $('#myFormpendidikansmp').data('routeback');
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
                                ' <b>Sedang Mengupdate Data...</div>');
          },
          success: function(Response){
            console.log(Response);
            //setTimeout($.unblockUI, 1000); 
            
            Swal.fire({
                  title: 'Berhasil !',
                  text: "Data Berhasil Disimpan",
                  type: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Oke'
                }).then((result) => {
                  if (result.value) {
                    $('.overlay').remove();
                    $('#pendidikan_smp').modal('hide');
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
            $('#pendidikan_smp').modal('hide');
         
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
  
</script>

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
@include('sweet::alert')
@endsection