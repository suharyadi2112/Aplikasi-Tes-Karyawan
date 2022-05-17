
@extends('admin.layout.masteradmin')

@section('content') 


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>

      <a href="{{{ route('ListPemohon') }}}" title="Kembali"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
            @if($message = Session::get('CoreMask'))
              <script type="text/javascript">
              var CekCoreMas = "{{ $message }}";
              alert(CekCoreMas)</script>
            @endif

          @if ($message = Session::get('error'))
           <div class="alert alert-error alert-dismissible " role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>Error</strong> {{ $message }}
            </div>
          @endif
          @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Success</strong> {{ $message }}
            </div>
          @endif
            @if ($message = Session::get('error2'))
           <div class="alert alert-error alert-dismissible " role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>Error</strong> {{ $message }}
            </div>
          @endif
          @if ($message = Session::get('success2'))
            <div class="alert alert-success alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Success</strong> {{ $message }}
            </div>
          @endif
          @if ($message = Session::get('error121'))
           <div class="alert alert-error alert-dismissible " role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>Error</strong> {{ $message }}
            </div>
          @endif
          @if ($message = Session::get('success121'))
            <div class="alert alert-success alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Success</strong> {{ $message }}
            </div>
          @endif


          <div class="x_content">
          <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
          <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Hasil Tes</a>
          </li>
          <li class="nav-item">
           <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Hasil Koreksi</a>
          </li>
          </ul>
          <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            
            @if(Auth::user()->level == 1)


              {{-- DISC --}}

              <div class="x_panel shadow-sm">
                <div class="x_title">
                <h2>Hasil Tes <b>DISC</b><small></small></h2>
                <div class="clearfix"></div>
                </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card-box table-responsive">
                          <table id="datatableberkas" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                              <tr>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Main Time</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse($DataDisc as $ValueDisc)
                              <tr>
                                <td>{{ tanggal_indo($ValueDisc->date_start) }}</td>
                                <td>{{ tanggal_indo($ValueDisc->date_finish) }}</td>
                                <td>{{ $ValueDisc->time_start }}</td>
                                <td>{{ $ValueDisc->time_finish }}</td>
                                <td>{{ $ValueDisc->timer_disc }}</td>
                                <td>
                                  <a href="{{ Route('RangkumanDisc',[$ValueDisc->id_user]) }}" ><button tipe="button"  title="Lihat Rangkuman" class="btn btn-sm btn-outline-info"><span class="fa fa-list"></span></button></a>
                                </td>
                              </tr>
                              @empty
                              <tr>
                                <td colspan="10" style="text-align: center;">Tidak ada data</td>
                              </tr>
                              @endforelse
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

            <div class="x_panel shadow-sm">
                <div class="x_title">
                <h2>Hasil Tes Aptitude<b>(OLD)</b> dan DISC <small></small></h2>
              <div class="clearfix"></div>
              </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <table id="datatableberkas" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama File</th>
                              <th>Type File</th>
                              <th>Size File</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse($data as $key => $show)
                            <tr>
                              <td> {{ $key + 1 }} </td>
                              <td> {{ $show->nama_file }} </td>
                              <td> {{ $show->type_file }} </td>
                              <td> {{ formatSizeUnits($show->size_file) }} </td>
                              <td style="width: 10rem">
                                
                                <a href="{{ Route('downloadaptidiscau',['id' => $show->id_apti_disc]) }}" title="Download File"><button type="button" class="btn btn-outline-info btn-xs"><span class="fa fa-download"></span></button></a>

                                <a href="{{ Route('PreviewAptiDisc',['id' => $show->id_apti_disc]) }}" title="Preview File" target="_blank"><button type="button" class="btn btn-outline-info btn-xs"><span class="fa fa-eye"></span></button></a>

                                @if(Auth::user()->level == "1")
                                <a href="{{ Route('destroyaptidiscau',['id' => $show->id_apti_disc]) }}" onclick="return confirm('Apa kamu yakin menghapus file {{ $show->nama_file }} ?')" title="Hapus File" ><button type="button" class="btn btn-outline-danger btn-xs"><span class="fa fa-trash"></span></button></a>
                                @endif

                              </td>
                            </tr>
                            @empty
                            <tr>
                              <td colspan="10" style="text-align: center;">Tidak Ada Data Apapun</td>
                            </tr>
                            @endforelse
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              {{-- TES DARI FILE/BERKAS --}}

              <div class="x_panel shadow-sm">
                <div class="x_title">
                <h2>Hasil <b><u></u></b> Tes Berkas Soal Dalam Bentuk File <small></small></h2>
              <div class="clearfix"></div>
              </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <table id="datatableberkas" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama File</th>
                              <th>Type File</th>
                              <th>Size File</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse($abcd as $key3 => $showabcd)
                            <tr>
                              <td> {{ $key3 + 1 }} </td>
                              <td> {{ $showabcd->file_name }} </td>
                              <td> {{ $showabcd->file_type }} </td>
                              <td> {{ $showabcd->file_size }} </td>

                              <td style="width: 10rem">
                                
                                <a href="{{ Route('DownloadBersol',['id' => $showabcd->id_jawaban]) }}" title="Download File"><button type="button" class="btn btn-outline-info btn-sm"><span class="fa fa-download"></span></button></a>
                                @if($showabcd->file_type == 'zip' || $showabcd->file_type == 'rar')
                                @else
                                <a href="{{ Route('PreviewBersol',['id' => $showabcd->id_jawaban]) }}" title="Preview File" target="_blank"><button type="button" class="btn btn-outline-info btn-sm"><span class="fa fa-eye"></span></button></a>
                                @endif

                                @if(Auth::user()->level == "1")
                                <a href="{{ Route('destroykoreksiaptidisc',['id' => $showabcd->id_jawaban]) }}" onclick="return confirm('Apa kamu yakin menghapus file {{ $showabcd->file_name }} ?')" title="Hapus File" ><button type="button" class="btn btn-outline-danger btn-sm"><span class="fa fa-trash"></span></button></a>
                                @endif

                              </td>
                            </tr>
                            @empty
                            <tr>
                              <td colspan="10" style="text-align: center;">Tidak Ada Data Apapun</td>
                            </tr>
                            @endforelse
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              @else
              <p style="font-weight: bold;">Tidak Memiliki Akses !</p>
              @endif


          </div>
 
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
              
              <div class="x_panel shadow-sm">
                <div class="x_title">
                <h2>Hasil Tes Aptitude<small></small></h2>
              <div class="clearfix"></div>
              </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <table id="datatableberkas" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>Verbal</th>
                              <th>Numerik</th>
                              <th>Logical</th>
                              <th>Skor Verbal</th>
                              <th>Skor Numerik</th>
                              <th>Skor Logical</th>
                              <th>Rata-Rata</th>
                              <th>Detail Waktu</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse($NewTesApti as $yu => $NewTesAptiV)
                            <tr>
                              <td> {{ $NewTesAptiV->jumber_verbal }} Jumlah Benar </td>
                              <td> {{ $NewTesAptiV->jumber_numerik }} Jumlah Benar </td>
                              <td> {{ $NewTesAptiV->jumber_logical }} Jumlah Benar </td>
                              <td> {{ $NewTesAptiV->skor_verbal }} </td>
                              <td> {{ $NewTesAptiV->skor_numerik }} </td>
                              <td> {{ $NewTesAptiV->skor_logical }} </td>
                              <td> {{ $NewTesAptiV->rata_rata }} </td>
                              <td> 
                                <button tipe="button" data-id="{{ $NewTesAptiV->id_user }}" title="Waktu Pengerjaan" class="btn btn-sm btn-outline-info LihatWaktu"><span class="fa fa-history"></span> </button>
                                <a href="{{ Route('PrintAptitude',['id_user' => $NewTesAptiV->id_user]) }}" target="_blank"><button tipe="button"  title="Print Out Ujian Aptitude" class="btn btn-sm btn-outline-primary"><span class="fa fa-book"></span> </button>
                              </td>
                             
                            </tr>
                            @empty
                            <tr>
                              <td colspan="10" style="text-align: center;">Tidak Ada Data Apapun</td>
                            </tr>
                            @endforelse
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="x_panel shadow-sm">
                <div class="x_title">
                <h2>Hasil <b><u>KOREKSI</u></b> DISC dan lainnya </h2>
              <div class="clearfix"></div>
              </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <table id="datatableberkas" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama File</th>
                              <th>Type File</th>
                              <th>Size File</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td colspan="4"><center><b>Hasil Akhir DISC</b></center></font></td>
                              <td nowrap="">
                                <a href="{{ Route('PrintCoreMask',['id_user' => $id_userss]) }}" target="_blank"><button type="button" class="btn btn-outline-primary btn-sm" > 
                                 <span class="fa fa-file"></span> Hasil DISC</button></a>
                              </td>
                            </tr>
                            @forelse($datakoreksi as $key2 => $showdatakoreksi)
                            <tr>
                              <td> {{ $key2 + 1 }} </td>
                              <td> {{ $showdatakoreksi->nama_filekoreksi }} </td>
                              <td> {{ $showdatakoreksi->type_filekoreksi }} </td>
                              <td> {{ formatSizeUnits($showdatakoreksi->size_filekoreksi) }} </td>

                              <td style="width: 10rem">
                                
                                <a href="{{ Route('downloadkoreksi',['id' => $showdatakoreksi->id_koreksi]) }}" title="Download File"><button type="button" class="btn btn-outline-info btn-sm"><span class="fa fa-download"></span></button></a>

                                <a href="{{ Route('PreviewKoreksi',['id' => $showdatakoreksi->id_koreksi]) }}" title="Preview File" target="_blank"><button type="button" class="btn btn-outline-info btn-sm"><span class="fa fa-eye"></span></button></a>

                                @if(Auth::user()->level == "1")
                                <a href="{{ Route('destroykoreksiaptidisc',['id' => $showdatakoreksi->id_koreksi]) }}" onclick="return confirm('Apa kamu yakin menghapus file {{ $showdatakoreksi->nama_filekoreksi }} ?')" title="Hapus File" ><button type="button" class="btn btn-outline-danger btn-sm"><span class="fa fa-trash"></span></button></a>
                                @endif

                              </td>
                            </tr>
                            @empty
                            <tr>
                              <td colspan="10" style="text-align: center;">Tidak Ada Data Apapun</td>
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

        <a href="{{{ route('ListPemohon') }}}" title="Kembali"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
      </div>
    </div>



  </div>
</div>  



<!--MODAL MELIHAT DETAIL WAKTU-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" id="LihatWaktu" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body" id="CekSolo">
      </div>
    </div>
  </div>
</div>


@php
function tanggal_indo($tanggal) {
  if ($tanggal) {
    $bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
      $split = explode('-', $tanggal);
      return $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];
  }else{
    return '-';
  }
}

function formatSizeUnits($bytes){
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
  }
@endphp

@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $(document).on('click', '.LihatWaktu', function () {

    var id = $(this).attr("data-id");
    var url = '{{route("DetailWaktu")}}';
    $.ajax({
      url: url,
      method: "POST",
      data: {
        id_user: id,
      },
      beforeSend: function () {},
      success: function (data) {
        $('#CekSolo').html(data.Waktu);
        $('#LihatWaktu').modal('show');
      }
    });
  });
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
</script>
@include('sweet::alert')
@endsection
