
@extends('admin.layout.masteradmin')

@section('content') 


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>

      @if(Auth::user()->level == 1)

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
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
          <a href="{{{ route('ListPemohon') }}}" title="Kembali"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
          <div class="x_panel shadow-sm">
                <div class="x_title">
                <h2>Hasil Tes Aptitude dan DISC <small></small></h2>
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
              <a href="{{{ route('ListPemohon') }}}" title="Kembali"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            </div>
          </div>

        @endif
        <!--Batas index untuk hasil koreksi-->

        <div class="row">
        <div class="col-md-12 col-sm-12 ">
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
          <div class="x_panel shadow-sm">
                <div class="x_title">
                <h2>Hasil <b><u>KOREKSI</u></b> Tes Aptitude DISC dan lainnya<small></small></h2>
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
                            @forelse($datakoreksi as $key2 => $showdatakoreksi)
                            <tr>
                              <td> {{ $key2 + 1 }} </td>
                              <td> {{ $showdatakoreksi->nama_filekoreksi }} </td>
                              <td> {{ $showdatakoreksi->type_filekoreksi }} </td>
                              <td> {{ formatSizeUnits($showdatakoreksi->size_filekoreksi) }} </td>

                              <td style="width: 10rem">
                                
                                <a href="{{ Route('downloadkoreksi',['id' => $showdatakoreksi->id_koreksi]) }}" title="Download File"><button type="button" class="btn btn-outline-info btn-xs"><span class="fa fa-download"></span></button></a>

                                <a href="{{ Route('PreviewKoreksi',['id' => $showdatakoreksi->id_koreksi]) }}" title="Preview File" target="_blank"><button type="button" class="btn btn-outline-info btn-xs"><span class="fa fa-eye"></span></button></a>

                                @if(Auth::user()->level == "1")
                                <a href="{{ Route('destroykoreksiaptidisc',['id' => $showdatakoreksi->id_koreksi]) }}" onclick="return confirm('Apa kamu yakin menghapus file {{ $showdatakoreksi->nama_filekoreksi }} ?')" title="Hapus File" ><button type="button" class="btn btn-outline-danger btn-xs"><span class="fa fa-trash"></span></button></a>
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
              <a href="{{{ route('ListPemohon') }}}" title="Kembali"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            </div>
          </div>

        @if(Auth::user()->level == 1)
        <!--Hasil Jawaban Berkas Soal Tes-->
        <div class="row">
        <div class="col-md-12 col-sm-12 ">
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
                              <td> {{ formatSizeUnits($showabcd->file_size) }} </td>

                              <td style="width: 10rem">
                                
                                <a href="{{ Route('DownloadBersol',['id' => $showabcd->id_jawaban]) }}" title="Download File"><button type="button" class="btn btn-outline-info btn-xs"><span class="fa fa-download"></span></button></a>

                                <a href="{{ Route('PreviewBersol',['id' => $showabcd->id_jawaban]) }}" title="Preview File" target="_blank"><button type="button" class="btn btn-outline-info btn-xs"><span class="fa fa-eye"></span></button></a>

                                @if(Auth::user()->level == "1")
                                <a href="{{ Route('destroykoreksiaptidisc',['id' => $showabcd->id_jawaban]) }}" onclick="return confirm('Apa kamu yakin menghapus file {{ $showabcd->file_name }} ?')" title="Hapus File" ><button type="button" class="btn btn-outline-danger btn-xs"><span class="fa fa-trash"></span></button></a>
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
              <a href="{{{ route('ListPemohon') }}}" title="Kembali"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            </div>
          </div>
          @endif

        </div>
      </div>  
@php
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

@include('sweet::alert')
@endsection
