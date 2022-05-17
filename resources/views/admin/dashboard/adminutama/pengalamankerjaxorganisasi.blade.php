
@extends('admin.layout.masteradmin')

@section('content') 


<!-- page content -->
<div class="right_col" role="main">
<div class="">
<div class="col-sm-3">
  <form action="{{ Route('ListPemohon') }}">
    <input type="hidden" name="id_user_back" value="{{$id_user}}">
    <input type="hidden" name="nama_back" value="{{$namal}}">
    <button type="submit" class="btn btn-round btn-outline-primary btn-sm"><i class="fa fa-arrow-circle-left"></i> Kembali</button>
  </form>
</div>
@if(Auth::user()->level == "1")
<form role="form" id="cekdata" method="POST" action="{{ Route('viewpengalamankerjaxorganisasi') }}">
@csrf
<div class="col-md-4" style="float: right;">
  <select class="form-control selectp" name="id_user" onchange="onSelectChange();">
    <option value="" >Pilih Nama Pelamar</option>
    @foreach ($linknamal as $item_namal)
      <option value="{{$item_namal->id_user}}">{{$item_namal->nama_lengkap}} | {{ $item_namal->no_ktp }}</option>
    @endforeach
  </select>
  <hr style="margin-top: 10px; margin-bottom: 10px; background: #fce435;">
</div>
</form>
@endif

<div class="clearfix"></div>

<ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
  <li class="nav-item">
  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><span class="fa fa-graduation-cap"></span> Pengalaman Kerja Bidang Pendidikan</a>
  </li>
  <li class="nav-item">
  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><span class="fa fa-wrench"></span> Pengalaman Kerja Bidang NON Pendidikan</a>
  </li>
  <li class="nav-item">
   <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><span class="fa fa-users"></span> Organisasi</a>
  </li>
</ul>


<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <!--a href="{{{ route('ListPemohon') }}}" title="Kembali"><i class="fa fa-arrow-circle-left"></i> Kembali</a-->
      <div class="x_panel shadow-sm">
        <div class="x_title">
          <h2>Data Pengalaman Kerja Bidang Pendidikan <small>{{ $namal }}</small></h2>

          @if(Auth::user()->level == "1")
          <a href="#" class="tambahpkbpen btn btn-round btn-outline-primary btn-sm"  style="float: right; width: 11rem"><i class="fa fa-fw fa-plus"></i> Pengalaman Kerja</a>
          @endif

          <div class="clearfix"></div>
        </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <table id="" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                       <th>No</th>
                       <th>Nama Sekolah/Perguruan Tinggi</th>
                       <th>Jabatan</th>
                       <th>Pelajaran/Mata Kuliah</th>
                       <th>Gaji</th>
                       <th>Tahun</th>
                       @if(Auth::user()->level == "1")
                       <th>Aksi</th>
                       @endif
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($queryone as $key=>$showqueryone)
                      @if(is_null($showqueryone->nama_sekolah))
                      <tr>
                        <td colspan="10" style="text-align: center;">Tidak Ada Data</td>
                      </tr>
                      @else
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $showqueryone->nama_sekolah }}</td>
                        <td>{{ $showqueryone->jenis_pekerjaan }}</td>
                        <td>{{ $showqueryone->jenis_pelajaran }}</td>
                        <td>{{ number_format($showqueryone->gaji) }}</td>
                        <td nowrap="">
                          <span class="badge badge-success">{{ $showqueryone->pk_pend_mulai }}</span> s/d <span class="badge badge-danger">{{ $showqueryone->pk_pend_selesai }}</span>
                        </td>

                        @if(Auth::user()->level == "1")
                        <td nowrap="">
                          <button class="bidangpendidikan btn btn-outline-primary btn-xs"
                            data-id="{{ $showqueryone->id_pengalaman_kerja_pend }}"
                            data-ns="{{ $showqueryone->nama_sekolah }}"
                            data-jp="{{ $showqueryone->jenis_pekerjaan }}"
                            data-jpel="{{ $showqueryone->jenis_pelajaran }}"
                            data-gaji="{{ $showqueryone->gaji }}"
                            data-pk_mulai="{{ $showqueryone->pk_pend_mulai }}"
                            data-pk_selesai="{{ $showqueryone->pk_pend_selesai }}"
                            ><span class="fa fa-pencil"></span> 
                          </button>
                          @if($key > 0)
                           <button class="hapuspkbpen btn btn-outline-danger btn-xs"
                            data-id="{{ $showqueryone->id_pengalaman_kerja_pend }}"
                            data-nmpkbpen="{{ $showqueryone->nama_sekolah }}"
                            ><span class="fa fa-trash"></span> </button>
                          @endif
                        </td>
                        @endif

                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
         </div>
       </div>
    </div>
</div>
<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <!--a href="{{{ route('ListPemohon') }}}" title="Kembali"><i class="fa fa-arrow-circle-left"></i> Kembali</a-->
      <div class="x_panel shadow-sm">
      <div class="x_title">
          <h2>Data Pengalaman Kerja Bidang Non Pendidikan <small>{{ $namal }}</small></h2>

          @if(Auth::user()->level == "1")
          <a href="#" class="tambahpkbnonpen btn btn-round btn-outline-primary btn-sm"  style="float: right; width: 11rem"><i class="fa fa-fw fa-plus"></i> Pengalaman Kerja</a>
          @endif

          <div class="clearfix"></div>
        </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <table id="" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Jabatan</th>
                        <th>Gaji</th>
                        <th>tahun</th>

                        @if(Auth::user()->level == "1")
                        <th style="width: 92px">Aksi</th>
                        @endif

                      </tr>
                    </thead>
                    <tbody>
                      @foreach($querytwo as $key => $tamquerytwo)
                      @if(is_null($tamquerytwo->nama_perusahaan_np))
                      <tr>
                        <td colspan="10" style="text-align: center;">Tidak Ada Data</td>
                      </tr>
                      @else
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $tamquerytwo->nama_perusahaan_np }}</td>
                        <td>{{ $tamquerytwo->Jabatan_np }}</td>
                        <td>{{ number_format($tamquerytwo->gaji_np) }}</td>
                        <td nowrap=""><span class="badge badge-success">{{ $tamquerytwo->mulai_np }}</span> s/d <span class="badge badge-danger">{{ $tamquerytwo->selesai_np }}</span></td>

                        @if(Auth::user()->level == "1")
                        <td rowspan="2" style="vertical-align: middle; text-align: center;">
                          <button class="bpnon btn btn-outline-primary btn-xs"
                              data_id="{{ $tamquerytwo->id_pk_nonpendidikan }}"
                              data_nmpnp="{{ $tamquerytwo->nama_perusahaan_np }}"
                              data_jnp="{{ $tamquerytwo->Jabatan_np }}"
                              data_gnp="{{ $tamquerytwo->gaji_np }}"
                              data_dnp="{{ $tamquerytwo->deskripsi_np }}"
                              data_apnp="{{ $tamquerytwo->alasan_pindah }}"
                              data_mulainp="{{ $tamquerytwo->mulai_np }}"
                              data_selesainp="{{ $tamquerytwo->selesai_np }}"
                              ><span class="fa fa-pencil"></span> 
                          </button>
                            @if($key > 0)
                               <button class="hpspknonpen btn btn-outline-danger btn-xs"
                                data-id="{{ $tamquerytwo->id_pk_nonpendidikan }}"
                                data-nmpknonpen="{{ $tamquerytwo->nama_perusahaan_np }}"
                                ><span class="fa fa-trash"></span> </button>
                            @endif
                        </td>
                        @endif

                      </tr>
                     
                      <tr>
                        <td style="white-space: nowrap;"><b>Alasan Pindah : </b></td>
                        <td colspan="1" style="text-align: justify;">{{ $tamquerytwo->alasan_pindah }}</td>
                        <td style="white-space: nowrap;"><b>Deskripsi Tanggung <br> Jawab kerja : </b></td>
                        <td colspan="2" style="text-align: justify;">{{ $tamquerytwo->alasan_pindah }}</td>
                        
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
       </div>
    </div>
</div>
<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
 <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <!--a href="{{{ route('ListPemohon') }}}" title="Kembali"><i class="fa fa-arrow-circle-left"></i> Kembali</a-->
      <div class="x_panel shadow-sm">
      <div class="x_title">
          <h2>Data Pengalaman Organisasi <small>{{ $namal }}</small></h2>

          @if(Auth::user()->level == "1")
          <a href="#" class="tambahorgan btn btn-round btn-outline-primary btn-sm"  style="float: right; width: 15rem"><i class="fa fa-fw fa-plus"></i>Tambah Pengalaman Organisasi</a>
          @endif

          <div class="clearfix"></div>
        </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <table id="" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                     <tr>
                       <th>No</th>
                       <th>Nama Organisasi</th>
                       <th>Posisi</th>
                       <th>Kota</th>
                       <th>Tahun</th>

                        @if(Auth::user()->level == "1")
                        <th>Aksi</th>
                        @endif

                     </tr>
                    </thead>
                    <tbody>
                      @foreach($querythree as $key => $tamquerythree)
                      @if(is_null($tamquerythree->nama_organisasi))
                      <tr>
                        <td colspan="10" style="text-align: center;">Tidak Ada Data</td>
                      </tr>
                      @else
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $tamquerythree->nama_organisasi }}</td>
                        <td>{{ $tamquerythree->posisi_organisasi }}</td>
                        <td>{{ $tamquerythree->kotaorganisasi }}</td>
                        <td nowrap="" "><span class="badge badge-success">{{ $tamquerythree->mulaiorganisasi }}</span> s/d <span class="badge badge-danger">{{ $tamquerythree->selesaiorganisasi }}</span></td>

                        @if(Auth::user()->level == "1")
                        <td style="width: 6rem; vertical-align: middle; text-align: center;" rowspan="2">
                           <button class="btnorganmodal btn btn-outline-primary btn-xs"
                            data_id="{{ $tamquerythree->id_pengalamanorganisasi }}"
                            data_nmorg="{{ $tamquerythree->nama_organisasi }}"
                            data_posisi="{{ $tamquerythree->posisi_organisasi }}"
                            data_desk="{{ $tamquerythree->deskripsitugasorganisasi }}"
                            data_kota="{{ $tamquerythree->kotaorganisasi }}"
                            data_morg="{{ $tamquerythree->mulaiorganisasi }}"
                            data_sorg="{{ $tamquerythree->selesaiorganisasi }}"
                            ><span class="fa fa-pencil"></span>
                          </button>
                          @if($key > 0)
                             <button class="hpsorgan btn btn-outline-danger btn-xs"
                              data-id="{{ $tamquerythree->id_pengalamanorganisasi }}"
                              data-nmorgan="{{ $tamquerythree->nama_organisasi }}"
                              ><span class="fa fa-trash"></span> </button>
                          @endif
                        </td>
                        @endif

                      </tr>
                      <tr>
                        <td colspan="2"><b>Deskripsi Tugas : </b></td>
                        <td colspan="3" style="text-align: justify;">{{ $tamquerythree->deskripsitugasorganisasi }}</td>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
       </div>
    </div>
  </div>
</div>
</div>
</div>


<!-------------------------------modal edit bidang Pengalaman Kerja Bidang pendidikan-------------------------------->
<div id="bp" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header bg-info">
          <h2 class="modal-title" style="color: white">Edit Data Pengalaman Kerja Bidang Pendidikan</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('updatepkbpendau') }}" id="myFormeditpkbpend" role="form" data-toggle="validator" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">

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
                        <textarea class="form-control" name="nama_sekolah" id="ns" placeholder="Masukan Nama Sekolah/Perguruan Tinggi" required=""></textarea>

                      </div>
                      <!-- /.input group -->
                      <font size="2" color="red">*nama sekolah/perguruan tinggi wajib diisi</font>
                     </div>
                    <!-- /.form group -->
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Jabatan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-user"></i></span>
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
                          <span class="input-group-text"><i class="fa fa-book"></i></span>
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
                          <span class="input-group-text"><i class="fa fa-money"></i></span>
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
                          <span class="input-group-text"><i class="fa fa-calendar"></i></span>
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
                          <span class="input-group-text"><i class="fa fa-calendar"></i></span>
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

<!-------------------------------modal tambah bagian pengalaman kerja bidang pendidikan-------------------------------->
<div id="bptambah" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Tambah Data Pengalaman Kerja Bidang Pendidikan</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('tambahpkbpenau') }}" id="myFormtambahpkbpend" role="form" data-toggle="validator" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">

          <input type="hidden" name="typepkbpen" value="1">
          <input type="hidden" name="id_user" value="{{ $id_user }}">
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
                        <textarea class="form-control" name="nama_sekolah" placeholder="Masukan Nama Sekolah/Perguruan Tinggi" required=""></textarea>

                      </div>
                      <!-- /.input group -->
                      <font size="2" color="red">*nama sekolah/perguruan tinggi wajib diisi</font>
                     </div>
                    <!-- /.form group -->
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Jabatan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
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
                          <span class="input-group-text"><i class="fa fa-book"></i></span>
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
                          <span class="input-group-text"><i class="fa fa-money"></i></span>
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
                          <span class="input-group-text"><i class="fa fa-calendar"></i></span>
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
                          <span class="input-group-text"><i class="fa fa-calendar"></i></span>
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



<!-------------------------------MODAL EDIT pengalaman Kerja Bidang NON PENDIDIKAN------------------------------->
<div id="bpnonmodal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Edit Data Pengalaman Kerja Bidang NON Pendidikan</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('updatepkbnonpendau') }}" id="myFormeditpkbnonpend" role="form" data-toggle="validator" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">

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
                              <textarea  class="form-control" name="nama_perusahaan_np" id="nama_perusahaan_np" placeholder="Masukan Nama Perusahaan" required=""></textarea>
                            </div>
                            <font size="2" color="red">*nama perusahaan wajib diisi</font>
                            <!-- /.input group -->
                           </div>
                          <!-- /.form group -->
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Jabatan</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
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
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-money"></i></span>
                              </div>
                              <input type="number" class="form-control" id="demo_1" name="gaji_np" value="" required="" />
                            </div>
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
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
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
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
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
                                <span class="input-group-text"><i class="fa fa-external-link"></i></span>
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
        <div class="modal-header">
          <h2 class="modal-title">Tambah Data Pengalaman Kerja Bidang NON Pendidikan</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('tambahpkbnonpenau') }}" data-routeback="{{ route('pemohonindex') }}" id="tambahpkbnonpend" role="form" data-toggle="validator" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">

                <h5>Bidang Non Pendidikan (Perusahaan Swasta Atau Lainnya) :</h5>
                  <div style="margin-bottom: 1px;"><span class="badge badge-warning">Bidang Non Pendidikan :</span></div>
                   <div class="shadow p-2 mb-2 bg-light rounded mx-auto row" style="width: 100%">
                    <input type="hidden" name="pk_nonpentambah" value="1">
                    <input type="hidden" name="id_user" value="{{ $id_user }}">
                        <div class="col-md-5">
                          <div class="form-group">
                            <label>Nama Perusahaan :</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-building"></i></span>
                              </div>
                              <textarea  class="form-control" name="nama_perusahaan_np"  placeholder="Masukan Nama Perusahaan" required=""></textarea>
                            </div>
                            <font size="2" color="red">*nama perusahaan wajib diisi</font>
                            <!-- /.input group -->
                           </div>
                          <!-- /.form group -->
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Jabatan</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
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
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
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
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
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
                                <span class="input-group-text"><i class="fa fa-tag"></i></span>
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
        <div class="modal-header">
          <h2 class="modal-title">Edit Data Pengalaman Organisasi</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('updateorganau') }}" id="editpengalamanorgan" role="form" data-toggle="validator" method="POST" accept-charset="utf-8">
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
                    <input type="text" class="form-control" name="nama_organisasi" id="nama_organisasi" placeholder="Masukan Nama Organisasi" required="" />
                  </div>
                  <!-- /.input group -->
                  <font size="2" color="red">*nama organisasi wajib diisi</font>
                 </div>
                <!-- /.form group -->
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Posisi Organisasi</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-user"></i></span>
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
                      <span class="input-group-text"><i class="fa fa-building"></i></span>
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
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
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
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
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
          <h3 class="modal-title" style="color: white;">Tambah Data Pengalaman Organisasi</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('tambahorganau') }}" id="tambahpengalamanorganisasi" role="form" data-toggle="validator" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body row" style="padding: 5px;">
          <input type="hidden" name="typeorgan" value="1">
          <input type="hidden" name="id_user" value="{{ $id_user }}">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nama Organisasi :</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-users"></i></span>
                    </div>
                    <input type="text" class="form-control" name="nama_organisasi" placeholder="Masukan Nama Organisasi" required="" />
                  </div>
                  <!-- /.input group -->
                  <font size="2" color="red">*nama organisasi wajib diisi</font>
                 </div>
                <!-- /.form group -->
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Posisi Organisasi</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-user"></i></span>
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
                      <span class="input-group-text"><i class="fa fa-building"></i></span>
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
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
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
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
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

@endsection
@section('script')

<script type="text/javascript">
jQuery( document ).ready(function($){

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
              
              url:  "hapus/organau/"+id_organ,

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

          type: 'post',
          url: route,
          data: form_data.serialize(),

          beforeSend: function(){

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
          

          },
          complete: function() {
                    $.unblockUI();
                    $('#organmodaltambah').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                    
                },

      })
    });


    //Edit Organisasi
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

          },
          complete: function() {
                    $.unblockUI();
                    $('#organmodal').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                    
                },

      })
    });
  


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
      var form_data = $(this);
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
            
          },
          complete: function() {
                    $.unblockUI();
                    $('#bp').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                },

      })
    });


    //Hapus Pengalaman Kerja Bidang Pendidikan
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
                
                url:  "hapus/pkbpenau/"+id_pkbpen,

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


      $(document).on('click', '.tambahpkbpen', function(){
        $('#bptambah').modal('show');
       });

      //edit data pendidikan
      $(document).on('submit', '#myFormtambahpkbpend', function(e) {  
        e.preventDefault();
        var route = $('#myFormtambahpkbpend').data('route');
        var form_data = $(this);
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
             $('#bptambah').modal('hide');
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
              $('#bptambah').modal('hide');

            },
            complete: function() {
                    $.unblockUI();
                    setTimeout(location.reload.bind(location), 2000);
                        
                  },
            error: function(xhr) { // if error occured
                      swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                  },

        })
      });


      //Edit Pengalaman Kerja Bidang NON Pendidikan

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

      $(document).on('submit', '#myFormeditpkbnonpend', function(e) {  
        e.preventDefault();
        var route = $('#myFormeditpkbnonpend').data('route');
        var form_data = $(this);
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
              
            },
            complete: function() {
                      $.unblockUI();
                      $('#bpnonmodal').modal('hide');
                      setTimeout(location.reload.bind(location), 2000);
                  },
            error: function(xhr) { // if error occured
                      swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                   },

        })
      });
      

      //Hapus Pengalaman Kerja Bidang Non Pendidikan
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
                    
                    url:  "hapus/pkbnonpenau/"+id_pknonpen,

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


    //Tambah Pengalaman Kerja Bidang Non Pendidikan
    $(document).on('click', '.tambahpkbnonpen', function(){
    
      $('#pkbnonpendmodal').modal('show');

    });

    //edit data pendidikan
    $(document).on('submit', '#tambahpkbnonpend', function(e) {  
      e.preventDefault();
      var route = $('#tambahpkbnonpend').data('route');
      var form_data = $(this);
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
            
          },
          complete: function() {
                    $.unblockUI();
                    $('#pkbnonpendmodal').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                  
                },

      })
    });


  $('.selectp').select2({
    theme: 'bootstrap4'
  });

  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
      localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
      $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
  });

});
</script>

<script type="text/javascript">
  function onSelectChange(){
   document.getElementById('cekdata').submit();
  }
</script>

@endsection
