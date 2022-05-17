
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
<form role="form" id="cekdata" method="POST" action="{{ Route('viewdatakesehatanau') }}">
  @csrf
  <div class="col-sm-4" style="float: right;">
    <select class="form-control selectp" name="id_user" onchange="onSelectChange();">
      <option value="" ><center>-----------------Pilih Nama Pelamar-------------</center></option>
      @foreach ($linknamal as $item_namal)
        <option value="{{$item_namal->id_user}}">{{$item_namal->nama_lengkap}} | {{ $item_namal->no_ktp }}</option>
      @endforeach
    </select>
  </div>
</form>
@endif

<div class="clearfix"></div>

<ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
  <li class="nav-item">
  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><span class="fa fa-graduation-cap"></span> Pendidikan Formal</a>
  </li>
  <li class="nav-item">
  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><span class="fa fa-wrench"></span> Pendidikan Non Formal</a>
  </li>
  <li class="nav-item">
   <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><span class="fa fa-medkit"></span> Kesehatan</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <!--a href="{{{ route('ListPemohon') }}}" title="Kembali"><i class="fa fa-arrow-circle-left"></i> Kembali</a-->
      <div class="x_panel shadow-sm">
        <div class="x_title">
          <h2>Data Pendidikan Formal Perguruan Tinggi <small>{{ $namal }}</small></h2>

          @if(Auth::user()->level == "1")
          <a href="#" class="tambah_pt btn btn-round btn-outline-primary btn-sm"  style="float: right; width: 15rem"><i class="fa fa-fw fa-plus"></i>Tambah Perguruan Tinggi</a>
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
                        <th>Jenjang Pendidikan</th>
                        <th>Nama Sekolah/Perguruan Tinggi</th>
                        <th>Jurusan/Program Studi</th>
                        <th>IPK</th>
                        <th>Tahun</th>
                        @if(Auth::user()->level == "1")
                        <th>Aksi</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>

                    @foreach($perting as $key => $tamperting)
                    
                      <tr>
                       <td>{{ $tamperting->pt_jenjang }}</td>
                       <td>{{ $tamperting->pt_nama }}</td>
                       <td>{{ $tamperting->pt_studi }}</td>
                       <td>{{ $tamperting->pt_ipk }}</td>
                       <td style="white-space: nowrap;"><span class="badge badge-success">{{ $tamperting->pt_mulai }}</span> s/d <span class="badge badge-danger">{{ $tamperting->pt_selesai }}</span></td>

                       @if(Auth::user()->level == "1")
                       <td>
                        <a href="#" type="button" class="perguruan_tinggi btn btn-flat btn-outline-primary btn-xs" title="Edit data" 
                          data-id="{{ $tamperting->id_perguruantinggi }}"
                          data-ptnama="{{ $tamperting->pt_nama }}"
                          data-ptstudi="{{ $tamperting->pt_studi }}"
                          data-ptjenjang="{{ $tamperting->pt_jenjang }}"
                          data-ptipk="{{ $tamperting->pt_ipk }}"
                          data-ptmulai="{{ $tamperting->pt_mulai }}"
                          data-ptselesai="{{ $tamperting->pt_selesai }}"
                        ><i class="fa fa-pencil"></i></a>

                       
                        <a href="#" type="button" class="hapus_pt btn btn-flat btn-outline-danger btn-xs" title="Hapus data" 
                          data-id="{{ $tamperting->id_perguruantinggi }}"
                          data-iduser="{{ $tamperting->id_user }}"
                          data-nmpt="{{ $tamperting->pt_nama }}"
                        ><i class="fa fa-trash"></i></a>
                        
                       </td>
                       @endif

                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="x_title">
            <h2>Data Pendidikan Formal Sekolah Menengah<small>{{ $namal }}</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <table id="" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Jenjang Pendidikan</th>
                        <th>Nama Sekolah/Perguruan Tinggi</th>
                        <th>Jurusan/Program Studi</th>
                        <th>Tahun</th>
                        @if(Auth::user()->level == "1")
                        <th>Aksi</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($pend as $tampend)
                     @if((is_null($tampend->smp_namasekolah) && is_null($tampend->sma_namasekolah) ))
                     <tr>
                       <td colspan="10" style="text-align: center;"> Tidak Ada Pendidikan Apapun</td>
                     </tr>
                     @else
                        @if(is_null($tampend->sma_namasekolah))
                       
                        @else
                        <tr>
                         <td>SMA</td>
                         <td>{{ $tampend->sma_namasekolah }}</td>
                         <td>{{ $tampend->sma_jurusan }}</td>
                         <td style="white-space: nowrap;"><span class="badge badge-success">{{ $tampend->sma_tahunmulai }}</span> s/d <span class="badge badge-danger">{{ $tampend->sma_tahunselesai }}</span></td>

                         @if(Auth::user()->level == "1")
                         <td>
                           <a href="#" type="button" class="editpendidikansma btn btn-flat btn-outline-primary btn-xs" title="Edit data" 
                            data-id="{{ $tampend->id_pendidikan }}"
                            data-nsma="{{ $tampend->sma_namasekolah }}"
                            data-jsma="{{ $tampend->sma_jurusan }}"
                            data-tmsma="{{ $tampend->sma_tahunmulai }}"
                            data-tssma="{{ $tampend->sma_tahunselesai }}"
                          ><i class="fa fa-pencil"></i></a>
                         </td>
                         @endif

                        </tr>
                        @endif
                        @if(is_null($tampend->smp_namasekolah))
                       
                        @else
                        <tr>
                         <td>SMP</td>
                         <td>{{ $tampend->smp_namasekolah }}</td>
                         <td style="background: #949494"></td>
                         <td style="white-space: nowrap;"><span class="badge badge-success">{{ $tampend->smp_tahunmulai }}</span> s/d <span class="badge badge-danger">{{ $tampend->smp_tahunselesai }}</span></td>

                         @if(Auth::user()->level == "1")
                         <td>
                           <a href="#" type="button" class="editpendidikansmp btn btn-flat btn-outline-primary btn-xs" title="Edit data" 
                            id="{{ $tampend->id_pendidikan }}" data-nsmp="{{ $tampend->smp_namasekolah }}" data-msmp="{{ $tampend->smp_tahunmulai }}" data-ssmp="{{ $tampend->smp_tahunselesai }}"
                          ><i class="fa fa-pencil"></i></a>
                         </td>
                         @endif
                         
                       </tr>
                       @endif
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

      @if(Auth::user()->level == "1")
        <a href="#" class="tambah_nf btn btn-round btn-outline-primary btn-sm"  style="float: right; width: 15rem"><i class="fa fa-fw fa-plus"></i>Tambah Pendidikan Non Formal</a>
      @endif

      <div class="x_title">
          <h2>Data Pendidikan Non Formal <small>{{ $namal }}</small></h2>
          <div class="clearfix"></div>
        </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <table id="" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Jenis Pelatihan</th>
                        <th>Nama Penyelenggara</th>
                        <th>Kota</th>
                        <th>Tahun</th>
                        @if(Auth::user()->level == "1")
                        <th style="width: 6rem">Aksi</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($pendnf as $key => $tampendnf)
                      <tr>
                        <td>{{ $tampendnf->jenis_pelatihan }}</td>
                        <td>{{ $tampendnf->nama_penyelenggara }}</td>
                        <td>{{ $tampendnf->kota }}</td>
                        <td style="white-space: nowrap;"><span class="badge badge-success">{{ $tampendnf->nf_mulai }}</span> s/d <span class="badge badge-danger">{{ $tampendnf->nf_selesai }}</span></td>

                        @if(Auth::user()->level == "1")  
                        <td>
                          <button class="btnnonformal btn btn-outline-primary btn-xs btn-flat"
                          data-id="{{ $tampendnf->id_pen_nonformal }}"
                          data-nfnama="{{ $tampendnf->jenis_pelatihan }}"
                          data-nfpenyelenggara="{{ $tampendnf->nama_penyelenggara }}"
                          data-nfkota="{{ $tampendnf->kota }}"
                          data-nfmulai="{{ $tampendnf->nf_mulai }}"
                          data-nfselesai="{{ $tampendnf->nf_selesai }}"
                          ><i class="fa fa-pencil"></i> </button>

                          <button class="hapus_nf btn btn-outline-danger btn-xs btn-flat"
                            id="btnhapuspt"
                            data-id="{{ $tampendnf->id_pen_nonformal }}"
                            data-nfnama="{{ $tampendnf->jenis_pelatihan }}"
                            ><i class="fa fa-trash"></i></button>
                         
                        </td>
                        @endif

                      </tr>
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
          <h2>Data Kesehatan <small>{{ $namal }}</small></h2>
          <div class="clearfix"></div>
        </div>

          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  @if(empty($kes))
                  Pelamar Belum Memasukan Data Kesehatan <br>
                  @else
                  <table id="" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Nama Penyakit Yang Diderita</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if((is_null($kes->nama_penyakit) || empty($kes->nama_penyakit) 
                        && 
                        (is_null($kes->penyakit_lainnya) || empty($kes->penyakit_lainnya))))
                      <tr>
                        <td style="text-align: center;">Pelamar Sehat Jasmani dan Rohani</td>
                      </tr>
                      @else
                      <tr>
                        <td>{{ $kes->nama_penyakit }} {{ $kes->penyakit_lainnya }}</td>
                      </tr>
                      @endif
                    </tbody>
                  </table>

                  @if(Auth::user()->level == "1")
                  <a href="{{ Route('editKesehatanau', ['id' => $id_user]) }}"><span class="fa fa-pencil"></span> <u>Edit Kesehatan</u></a>
                  @endif

                  @endif
                  
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


<!--###############_________________________BATAS MODAL___________________________################-->


<!-------------------------------perguruan tinggi------------------------------>
<div id="pendidikan_perguruantinggi" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
          <h2>Edit Data Perguruan Tinggi</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('updateperguruantinggiau') }}"  id="myFormperguruantinggi" role="form" data-toggle="validator" method="POST" accept-charset="utf-8">
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
                          <span class="input-group-text"><span class="fa fa-language"></span></span>
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
            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Ubah Data Perguruan Tinggi</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-------------------------------TAMBAH PERGURUAN TINGGI------------------------------>
<div id="pendidikan_perguruantinggitambah" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header bg-info">
          <h2 class="modal-title" style="color: white;">Tambah Data Perguruan Tinggi</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('postDatapendidikanptau') }}"  id="myFormperguruantinggitambahan" role="form" data-toggle="validator" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">
              <input type="hidden"  name="typetambahanpt" value="1">
              <input type="hidden"  value="{{ $id_user }}"  name="id_user">
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
                          <span class="input-group-text"><i class="fa fa-language"></i></span>
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


<!-------------------------------MODAL EDIT SMP-------------------------------->
<div id="pendidikan_smp" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Edit Data Pendidikan SMP</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>


        <form data-route="{{ route('updatePendidikansmpsmaau') }}" id="myFormpendidikansmp" role="form" data-toggle="validator" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">

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
                      <textarea class="tes form-control" name="smp_namasekolah" id="smp_namasekolah" placeholder="Masukan Nama Sekolah" required></textarea>
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
          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Ubah Data SMP</button>
        </div>
      </form>
      
    </div>
  </div>
</div>



<!-------------------------------SEKOLAH MENENGAH ATAS------------------------------>
<div id="pendidikan_sma" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Edit Data Pendidikan SMA</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('updatePendidikansmpsmaau') }}" id="myFormpendidikansma" role="form" data-toggle="validator" method="POST" accept-charset="utf-8">
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
                      <span class="input-group-text"><i class="fa fa-language"></i></span>
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
          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Ubah Data SMA</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!------------------------------EDIT PENDIDIKAN NON FORMAL----------------------------->
<div id="nonformal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Edit Pendidikan NON FORMAL</h2>

        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('updatePendnonformalau') }}" id="myFormpendnonformal" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <input type="hidden" id="id_nf" name="nf_id">
        <div class="modal-body mx-auto">
          <div class="card-body row" style="padding: 5px;">
          <!-------------------------------Sekolah Menengah Pertama------------------------------>
          
           <p style="margin-bottom: 1px;"><span class="badge badge-info">Pendidikan Non Formal :</span></p>
            <div class="shadow p-1 mb-1 bg-light rounded row mx-auto" style="width: 100%">
                <div class="col-md-6">
                  <div class="form-group" >
                    <label for="Jenis Pelatihan">Jenis/Nama Pelatihan :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-tag"></i></span>
                      </div>
                      <textarea class="form-control" name="jenis_pelatihan" id="nf_nama" placeholder="Masukan Nama Pelatihan" required=""></textarea>
                    </div>
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
                      <textarea class="form-control" name="nama_penyelenggara" id="nf_nama_pen" placeholder="Masukan Nama Penyelenggara" required=""></textarea>
                    </div>
                      <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="Kota">Kota :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-building"></i></span>
                      </div>
                      <textarea class="form-control" name="kota" id="kota" placeholder="masukan kota penyelenggara" required=""></textarea>
                    </div>
                      <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="Mulai Pelatihan">Mulai Pelatihan :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                      <input type="date" name="nf_mulai" id="nf_mulai" class="form-control" required="">
                    </div>
                      <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="Selesai Pelatihan">Selesai Pelatihan :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                      <input type="date" name="nf_selesai"id="nf_selesai" class="form-control" required="">
                    </div>
                      <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update Data Pendidikan Non Formal</button>
        </div>
      </form>
      
    </div>
  </div>
</div>
<!------------------------------EDIT PENDIDIKAN NON FORMAL----------------------------->

<!------------------------------TAMBAH PENDIDIKAN NON FORMAL------------------------------>
<div id="nonformaltambah" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Tambah Pendidikan NON FORMAL Lainnya</h2>

        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ Route('tambahnfau') }}" id="myFormpendnonformaltambahan" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
        <input type="hidden" name="settambahnf" value="1">
        <input type="hidden" name="id_user" value="{{ $id_user }}">
        <div class="modal-body mx-auto">
          <div class="card-body row" style="padding: 5px;">
          <!-------------------------------Sekolah Menengah Pertama------------------------------>
          
           <p style="margin-bottom: 1px;"><span class="badge badge-info">Pendidikan Non Formal :</span></p>
            <div class="shadow p-1 mb-1 bg-light rounded row mx-auto" style="width: 100%">
                <div class="col-md-6">
                  <div class="form-group" >
                    <label for="Jenis Pelatihan">Jenis/Nama Pelatihan :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-tag"></i></span>
                      </div>
                      <textarea class="form-control" name="jenis_pelatihan"  placeholder="Masukan Nama Pelatihan" required=""></textarea>
                    </div>
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
                      <textarea class="form-control" name="nama_penyelenggara" placeholder="Masukan Nama Penyelenggara" required=""></textarea>
                    </div>
                      <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="Kota">Kota :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-building"></i></span>
                      </div>
                      <textarea class="form-control" name="kota" placeholder="masukan kota penyelenggara" required=""></textarea>
                    </div>
                      <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="Mulai Pelatihan">Mulai Pelatihan :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                      <input type="date" name="nf_mulai" class="form-control" required="">
                    </div>
                      <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="Selesai Pelatihan">Selesai Pelatihan :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                      <input type="date" name="nf_selesai" class="form-control" required="">
                    </div>
                      <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Pendidikan Non Formal</button>
        </div>
      </form>
      
    </div>
  </div>
</div>
<!------------------------------TAMBAH PENDIDIKAN NON FORMAL------------------------------>

@endsection
@section('script')

<script type="text/javascript">
jQuery( document ).ready(function($){

    //EDIT PERGURUAN TINGGI
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
    

    //HAPUS PERGURUAN TINGGI
    $(document).on('click', '.hapus_pt', function(){

    var id_pthapus = $(this).attr('data-id');
    var id_userpt = $(this).attr('data-iduser');
    var nm_pthapus = $(this).attr('data-nmpt');
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
                
                url:  "hapus/prosesau/"+id_pthapus,

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
                      setTimeout(location.reload.bind(location), 2000);
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

    //TAMBAH PERGURUAN TINGGI 
    $(document).on('click', '.tambah_pt', function(){
      id_perguruantinggi = $(this).attr('data-id');
      $('#pendidikan_perguruantinggitambah').modal('show');
     });

    $(document).on('submit', '#myFormperguruantinggitambahan', function(e) {  
      e.preventDefault();
      var route = $('#myFormperguruantinggitambahan').data('route');
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
                },

      })
    });


    //EDIT SEKOLAH MENENGAH PERTAMA (SMP)
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
    

      //EDIT PENDIDIKAN SEKOLAH MENENGAH ATAS (SMA)

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
    

    //EDIT PENDIDIKAN NON FORMAL
    var id_nf;

     $(document).on('click', '.btnnonformal', function(){
      id_nf = $(this).attr('data-id');
      nama_nf = $(this).attr('data-nfnama');
      pen_nf = $(this).attr('data-nfpenyelenggara');
      kota_nf = $(this).attr('data-nfkota');
      mulai_nf = $(this).attr('data-nfmulai');
      selesai_nf = $(this).attr('data-nfselesai');
      $("#id_nf").val(id_nf);
      $("#nf_nama").val(nama_nf);
      $("#nf_nama_pen").val(pen_nf);
      $("#kota").val(kota_nf);
      $("#nf_mulai").val(mulai_nf);
      $("#nf_selesai").val(selesai_nf);
      $('#nonformal').modal('show');
     });

    //edit data pendidikan
    $(document).on('submit', '#myFormpendnonformal', function(e) {  
      e.preventDefault();
      var route = $('#myFormpendnonformal').data('route');
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
                    $('#nonformal').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                  }
                })
            $('#nonformal').modal('hide');
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
          complete: function() {
                setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                },

      })
    });

    //HAPUS PENDIDIKAN NON FORMAL
    $(document).on('click', '.hapus_nf', function(){

    var id_nfhapus = $(this).attr('data-id');
    var nfnama = $(this).attr('data-nfnama');
    var route = $('#btnhapuspt').data('route');
       Swal.fire({
          title: 'Apakah Anda Yakin ?',
          text: 'Untuk Menghapus "'+nfnama+'"',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya, Saya Yakin!',
          cancelButtonText: 'Ngak Jadi Deh'
        }).then((result) => {
          if (result.value) {
            $.ajax({
                
                url:  "hapus/nfau/"+id_nfhapus,

                beforeSend:function(){
                  
                 },
                success:function(data)
                 {
                   Swal.fire({
                      title: 'Berhasil !',
                      text: 'Data '+nfnama+' Berhasil Dihapus',
                      type: 'success'
                    })
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
  

    //TAMBAH PENDIDIKAN NON FORMAL LAINNYA

    var id_nf;

     $(document).on('click', '.tambah_nf', function(){
      $('#nonformaltambah').modal('show');
     });

    $(document).on('submit', '#myFormpendnonformaltambahan', function(e) {  
      e.preventDefault();
      var route = $('#myFormpendnonformaltambahan').data('route');
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
                    $('#nonformaltambah').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                  }
                })
            $('#nonformaltambah').modal('hide');
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
          complete: function() {
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
