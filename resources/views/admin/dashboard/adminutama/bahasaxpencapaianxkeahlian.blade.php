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
<form role="form" id="cekdata" method="POST" action="{{ Route('viewdatapenxkeahxbah') }}">
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
  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><span class="fa fa-trophy"></span> Pencapaian (Achievement)</a>
  </li>
  <li class="nav-item">
  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><span class="fa fa-book"></span> Bahasa Yang Dikuasai</a>
  </li>
  <li class="nav-item">
   <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><span class="fa fa-bicycle"></span> Keahlian Lainnya</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <!--a href="{{{ route('ListPemohon') }}}" title="Kembali"><i class="fa fa-arrow-circle-left"></i> Kembali</a-->
      <div class="x_panel shadow-sm">
        <div class="x_title">
          <h2>Data Pencapaian (Achievement) <small>{{ $namal }}</small></h2>

          @if(Auth::user()->level == "1")
          <a href="#" class="tambahpenc btn btn-round btn-outline-primary btn-sm"  style="float: right; width: 11rem"><i class="fa fa-fw fa-plus"></i>Tambah Pencapaian</a>
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
                       <th>Bidang</th>
                       <th>Bentuk Penghargaan</th>
                       <th>Tahun Penghargaan</th>
                       @if(Auth::user()->level == "1")
                       <th>Aksi</th>
                       @endif
                     </tr>
                    </thead>
                    <tbody>
                      @forelse($queryone as $key => $tqueryone)
                        @if(is_null($tqueryone->bidang_penghargaan))
                          <tr>
                            <td colspan="10" style="text-align: center;">Tidak Ada Data</td>
                          </tr>
                        @else
                          <tr>
                            <td>{{ $tqueryone->bidang_penghargaan }}</td>
                            <td>{{ $tqueryone->bentuk_penghargaan }}</td>
                            <td><span class="badge badge-success"> {{ $tqueryone->tahun_penghargaan }}</span></td>

                            @if(Auth::user()->level == "1")
                            <td style="vertical-align: middle; text-align: center;">
                                
                              <button class="btnpenc btn btn-outline-primary btn-xs btn-flat"
                              data_id="{{ $tqueryone->id_pencapaian }}"
                              data_pencbidang="{{ $tqueryone->bidang_penghargaan }}"
                              data_pencbentuk="{{ $tqueryone->bentuk_penghargaan }}"
                              data_penctahun="{{ $tqueryone->tahun_penghargaan }}"
                              ><span class="fa fa-pencil"></span></button>

                              @if($key > 0)
                               <button class="hapuspenc btn btn-outline-danger btn-xs btn-flat"
                                id="btnhapuspt"
                                data-id="{{ $tqueryone->id_pencapaian }}"
                                data-pencnama="{{ $tqueryone->bidang_penghargaan }}"
                                ><span class="fa fa-trash"></span> </button>
                              @endif

                            </td>
                            @endif

                          </tr>
                        @endif
                        @empty
                          <tr>
                            <td colspan="10" style="text-align: center;">Tidak Ada Data</td>
                          </tr>
                      @endforelse
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
          <h2>Data Bahasa Yang Dikuasai <small>{{ $namal }}</small></h2>

          @if(Auth::user()->level == "1")
          <a href="#" class="tambahbahasa btn btn-round btn-outline-primary btn-sm"  style="float: right; width: 13rem"><i class="fa fa-fw fa-plus"></i>Tambah Bahasa Lainnya</a>
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
                       <th>Jenis Bahasa</th>
                       <th>Lisan Bahasa</th>
                       <th>Tulisan Bahasa</th>

                      @if(Auth::user()->level == "1")
                       <th>Aksi</th>
                      @endif

                     </tr>
                    </thead>
                    <tbody>
                    @forelse($querytwo as $key => $tquerytwo)
                      @if(is_null($tquerytwo->jenis_bahasa))
                        <tr>
                          <td colspan="10" style="text-align: center;">Tidak Ada Data</td>
                        </tr>
                      @else
                        <tr>
                          <td>{{ $tquerytwo->jenis_bahasa }}</td>
                          <td>{{ $tquerytwo->lisan_bahasa }}</td>
                          <td>{{ $tquerytwo->tulisan_bahasa }}</td>

                          @if(Auth::user()->level == "1")
                          <td style="width: 6rem">
                              
                            <button class="bahasaedit btn btn-outline-primary btn-xs"
                              data_id="{{ $tquerytwo->id_berbahasaasing }}"
                              data_jenis="{{ $tquerytwo->jenis_bahasa }}"
                              data_lisan="{{ $tquerytwo->lisan_bahasa }}"
                              data_tulisan="{{ $tquerytwo->tulisan_bahasa }}"
                              ><span class="fa fa-pencil"></span></button>

                              @if($key > 1)
                               <button class="hapusbahasa btn btn-outline-danger btn-xs"
                                data-id="{{ $tquerytwo->id_berbahasaasing }}"
                                data-jenis="{{ $tquerytwo->jenis_bahasa }}"
                                ><span class="fa fa-trash"></span></button>
                          
                              @endif

                          </td>
                          @endif

                        </tr>
                      @endif
                    @empty
                      <tr>
                        <td colspan="10" style="text-align: center;">Tidak Ada Data</td>
                      </tr>
                    @endforelse
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
          <h2>Data Keahlian Lainnya <small>{{ $namal }}</small></h2>
          <div class="clearfix"></div>
        </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <table id="" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                     <tr>
                       <th>Keahlian Lainnya</th>

                       @if(Auth::user()->level == "1")
                       <th>Aksi</th>
                       @endif

                     </tr>
                    </thead>
                    <tbody>
                      @forelse($querythree as $tquerythree)
                        @if((is_null($tquerythree->jenis_keahlian) || empty($tquerythree->jenis_keahlian)) && (is_null($tquerythree->keahlian_lainnya) || empty($tquerythree->keahlian_lainnya)))
                          <tr>
                            <td colspan="10" style="text-align: center;">Tidak Ada Data</td>
                          </tr>
                        @else
                          <tr>
                            <td>{{ $tquerythree->jenis_keahlian }}{{ $tquerythree->keahlian_lainnya }}</td>

                            @if(Auth::user()->level == "1")
                            <td>
                                
                              <a href="{{ Route('showeditkeahlianau', ['id' => $tquerythree->id_user]) }}" class="btn btn-outline-primary btn-xs btn-flat">
                                <i class="fa fa-pencil"></i>
                              </a>

                            </td>
                            @endif

                          </tr>
                        @endif
                      @empty
                        <tr>
                          <td colspan="10" style="text-align: center;">Tidak Ada Data</td>
                        </tr>
                      @endforelse

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


<!--------------------------------EDIT PENNCAPAIAN------------------------------------->
<div id="modalpencapaian" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h2 class="modal-title" style="color: white;">Edit Data Pencapaian (Achievement)</h2>

        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('updatepencapaianau') }}" id="myFormpencapaianedit" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="loading">
          
        </div>
     
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 1px;">
              <div style="margin-bottom: 1px;"><span class="badge badge-primary">Achievement :</span></div>
               <div class="shadow p-1 mb-1 bg-light rounded mx-auto row" style="width: 100%"> 
                <input type="hidden" name="typepencapaian" id="id">
                  <div class="col-md-4">
                      <div class="form-group">
                        <label>Bidang/Nama Pencapaian :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-trophy"></i></span>
                          </div>
                          <textarea  class="form-control" name="bidang_penghargaan" id="bidang" placeholder="Masukan Bidang Pencapaian" required=""></textarea>
                        </div>
                        <font size="2" color="red">*bidang pencapaian wajib diisi</font>
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
                          <textarea  class="form-control" name="bentuk_penghargaan" id="bentuk" placeholder="Masukan Bentuk Penghargaan Yang Diterima" required=""></textarea>
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
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                          </div>
                          <input  class="form-control" type="date" name="tahun_penghargaan" id="tahun" placeholder="Masukan Tahun Penerimaan Penghargaan" required="">
                        </div>
                        <font size="2" color="red">*tahun penghargaan wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                </div>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ubah Data Pencapaian</button>
      </div>
      </form>
      
    </div>
  </div>
</div>


<!--------------------------------TAMBAH PENNCAPAIAN------------------------------------->
<div id="modalpencapaiantambah" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h2 class="modal-title" style="color: white;">Tambah Data Pencapaian (Achievement)</h2>

        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('tambahanpencau') }}" id="myFormpencapaiantambah" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div>
     
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 1px;">
              <div style="margin-bottom: 1px;"><span class="badge badge-primary">Achievement :</span></div>
               <div class="shadow p-1 mb-1 bg-light rounded mx-auto row" style="width: 100%"> 
                <input type="hidden" name="typepenc" value="1">
                <input type="hidden" name="id_user" value="{{ $id_user }}">
                  <div class="col-md-4">
                      <div class="form-group">
                        <label>Bidang/Nama Pencapaian :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-trophy"></i></span>
                          </div>
                          <textarea  class="form-control" name="bidang_penghargaan" placeholder="Masukan Bidang Pencapaian" required=""></textarea>
                        </div>
                        <font size="2" color="red">*bidang pencapaian wajib diisi</font>
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
                          <textarea  class="form-control" name="bentuk_penghargaan" placeholder="Masukan Bentuk Penghargaan Yang Diterima" required=""></textarea>
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
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                          </div>
                          <input  class="form-control" type="date" name="tahun_penghargaan" placeholder="Masukan Tahun Penerimaan Penghargaan" required="">
                        </div>
                        <font size="2" color="red">*tahun penghargaan wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                </div>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data Pencapaian</button>
      </div>
      </form>
      
    </div>
  </div>
</div>



<!---------------------------EDIT BAHASA---------------------------------->

<div id="modalbahasa" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h2 class="modal-title" style="color: white;">Edit Data Bahasa Yang Dikuasai</h2>

        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('bahasaupdateau') }}" id="formmodalbahasa" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div> 
        <div class="modal-body mx-auto">
         <h5>Kemampuan Dalam Menggunakan Bahasa Asing :</h5>
          <div class="card-body" style="padding: 1px;">
            <div style="margin-bottom: 1px;"><span class="badge badge-primary">Kemampuan Berbahasa Asing :</span></div>
               <div class="shadow p-1 mb-1 bg-light rounded mx-auto row" style="width: 100%"> 
                <input type="hidden" name="idbahasa" id="idbahasa">

                  <div class="col-md-4">
                      <div class="form-group">
                        <label>Jenis Bahasa :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-language"></i></span>
                          </div>
                          <input type="text" class="form-control" name="jenis_bahasa" id="jenis" required>
                          
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
                            <span class="input-group-text"><i class="fa fa-level-up"></i></span>
                          </div>
                          <select class="form-control" name="lisan_bahasa" id="lisan" required>
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
                            <span class="input-group-text"><i class="fa fa-level-up"></i></span>
                          </div>
                          <select class="form-control" name="tulisan_bahasa" id="tulisan" required>
                            <option value="">--pilih tingkat kemampuan--</option>
                            <option value="BAIK">Baik</option>
                            <option value="CUKUP">Cukup</option>
                            <option value="KURANG">Kurang</option>
                            <option value="TIDAK TAHU">Tidak Tahu</option>
                          </select>
                        </div>
                        <font size="2" color="red">*penghasilan yang diminta wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ubah Data Bahasa</button>
      </div>
      </form>
      
    </div>
  </div>
</div>


<!---------------------------TAMBAH BAHASA---------------------------------->

<div id="modalbahasatambah" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h2 class="modal-title" style="color: white;">Tambah Data Bahasa Yang Dikuasai</h2>

        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        </div>

        <form data-route="{{ route('bahasatambahau') }}" id="formmodalbahasatambah" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="overlaymodal">
          
        </div> 
        <div class="modal-body mx-auto">
         <h5>Kemampuan Dalam Menggunakan Bahasa Asing :</h5>
          <div class="card-body" style="padding: 1px;">
            <div style="margin-bottom: 1px;"><span class="badge badge-primary">Kemampuan Berbahasa Asing :</span></div>
               <div class="shadow p-1 mb-1 bg-light rounded mx-auto row" style="width: 100%"> 
                <input type="hidden" name="typetambahbahasa" value="1">
                <input type="hidden" name="id_user" value="{{ $id_user }}">

                  <div class="col-md-4">
                      <div class="form-group">
                        <label>Jenis Bahasa :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-language"></i></span>
                          </div>
                          <input type="text" class="form-control" name="jenis_bahasa" placeholder="Masukan Bahasa Yang Dikuasai" required>
                          
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
                            <span class="input-group-text"><i class="fa fa-level-up"></i></span>
                          </div>
                          <select class="form-control" name="lisan_bahasa" required>
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
                            <span class="input-group-text"><i class="fa fa-level-up"></i></span>
                          </div>
                          <select class="form-control" name="tulisan_bahasa" required>
                            <option value="">--pilih tingkat kemampuan--</option>
                            <option value="BAIK">Baik</option>
                            <option value="CUKUP">Cukup</option>
                            <option value="KURANG">Kurang</option>
                            <option value="TIDAK TAHU">Tidak Tahu</option>
                          </select>
                        </div>
                        <font size="2" color="red">*penghasilan yang diminta wajib diisi</font>
                        <!-- /.input group -->
                       </div>
                      <!-- /.form group -->
                    </div>
                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data Bahasa</button>
      </div>
      </form>
      
    </div>
  </div>
</div>



@endsection
@section('script')

<script type="text/javascript">
jQuery( document ).ready(function($){

  //Hapus Bahasa 
  $(document).on('click', '.hapusbahasa', function(){

    var id_bahasa = $(this).attr('data-id');
    var nm_jenis = $(this).attr('data-jenis');
       Swal.fire({
          title: 'Apakah Anda Yakin ?',
          text: 'Untuk Menghapus "'+nm_jenis+'"',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya, Saya Yakin!',
          cancelButtonText: 'Ngak Jadi Deh'
        }).then((result) => {
          if (result.value) {
            $.ajax({
                
                url:  "hapus/bahasaau/"+id_bahasa,

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
                      text: 'Data '+nm_jenis+' Berhasil Dihapus',
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

    //Tambah Bahasa Lainnya

    $(document).on('click', '.tambahbahasa', function(){
    
      $('#modalbahasatambah').modal('show');

    });

    $(document).on('submit', '#formmodalbahasatambah', function(e) {  
      e.preventDefault();
      var route = $('#formmodalbahasatambah').data('route');
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

            $(wrapper).append(  '<b><center>Sedang Menyimpan Data...</center></b>');
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
                    $('#modalbahasatambah').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                  }
                  $('#modalbahasatambah').modal('hide');
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
                    $('#modalbahasatambah').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                    $('.overlay').remove();
                },
      })
    });

  //Edit Bahasa Admin Utama
  $(document).on('click', '.bahasaedit', function(){
    
      id = $(this).attr('data_id');
      jenis = $(this).attr('data_jenis');
      lisan = $(this).attr('data_lisan');
      tulisan = $(this).attr('data_tulisan');

      var hasiljenis
      var bahasa1 = "Bahasa Inggris"
      var bahasa2 = "Bahasa Mandarin"

      if (jenis === bahasa1) {
         document.getElementById('jenis').setAttribute("readonly", "readonly");
         document.getElementById('jenis').setAttribute("value", jenis);
      }else if(jenis === bahasa2){
         document.getElementById('jenis').setAttribute("readonly", "readonly");
         document.getElementById('jenis').setAttribute("value", jenis);

      }else{
         document.getElementById('jenis').setAttribute("value", jenis);
         document.getElementById("jenis").removeAttribute("readonly");
      }

      $("#idbahasa").val(id);
      document.getElementById('lisan').value=lisan;
      document.getElementById('tulisan').value=tulisan;
      $('#modalbahasa').modal('show');

     });

    //edit data pendidikan
    $(document).on('submit', '#formmodalbahasa', function(e) {  
      e.preventDefault();
      var route = $('#formmodalbahasa').data('route');
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
            $(wrapper).append(  '<b><center>Sedang Melakukan Penyimpanan Data...</center></b>');
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
                    $('#modalbahasa').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                  }
                  $('#modalbahasa').modal('hide');
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
                    $('#modalbahasa').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Memproses Data", "error");
                    $('.overlay').remove();
                },

      })
    });


  //Tambah Pencapaian
  $(document).on('click', '.tambahpenc', function(){
    
    $('#modalpencapaiantambah').modal('show');

  });

  $(document).on('submit', '#myFormpencapaiantambah', function(e) {  
      e.preventDefault();
      var route = $('#myFormpencapaiantambah').data('route');
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

            $(wrapper).append(  '<b><center>Sedang Melakukan Penyimpanan Data...</center></b>');
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
                      $('#modalpencapaiantambah').modal('hide');
                      setTimeout(location.reload.bind(location), 2000);
                    }
                    $('#modalpencapaiantambah').modal('hide');
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
                    $('#modalpencapaiantambah').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Memproses Data", "error");
                    $('.overlay').remove();
                },

      })
  });


  //Hapus Pencapaian

  $(document).on('click', '.hapuspenc', function(){

    var id_penc = $(this).attr('data-id');
    var nm_penc = $(this).attr('data-pencnama');
       Swal.fire({
          title: 'Apakah Anda Yakin ?',
          text: 'Untuk Menghapus "'+nm_penc+'"',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya, Saya Yakin!',
          cancelButtonText: 'Ngak Jadi Deh'
        }).then((result) => {
          if (result.value) {
            $.ajax({
                
            url:  "hapus/pencau/"+id_penc,

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
                  text: 'Data '+nm_penc+' Berhasil Dihapus',
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


  $(document).on('click', '.btnpenc', function(){
    
      id = $(this).attr('data_id');
      bidang = $(this).attr('data_pencbidang');
      bentuk = $(this).attr('data_pencbentuk');
      tahun = $(this).attr('data_penctahun');
      $("#id").val(id);
      $("#bidang").val(bidang);
      $("#bentuk").val(bentuk);
      $("#tahun").val(tahun);
      $('#modalpencapaian').modal('show');

     });

    //edit data pendidikan
    $(document).on('submit', '#myFormpencapaianedit', function(e) {  
      e.preventDefault();
      var route = $('#myFormpencapaianedit').data('route');
      var form_data = $(this);
      var wrapper = $(".loading");
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
            $(wrapper).append(  '<b><center>Sedang Melakukan Penyimmpanan Data..<center></b>');
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
                    $('#modalpencapaian').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                  }
                  $('#modalpencapaian').modal('hide');
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
                    $('#modalpencapaian').modal('hide');
                    setTimeout(location.reload.bind(location), 2000);
                },
          error: function(xhr) { // if error occured
                    swal.fire("Upsss!", "Terjadi kesalahan Dalam Mengupdate Data", "error");
                    $('.overlay').remove();
                },

      })
  });

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

  //select pencarian jika di refresh
  $('.selectp').select2({
    theme: 'bootstrap4'
  });
});
</script>

<script type="text/javascript">
  function onSelectChange(){
   document.getElementById('cekdata').submit();
  }
</script>

@endsection
