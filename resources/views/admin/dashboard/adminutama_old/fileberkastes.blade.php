
@extends('admin.layout.masteradmin')

@section('content') 


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
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
                <h2>List Berkas Tes <small>{{ $DataDiri->nama_lengkap }}</small></h2>
              <div class="clearfix"></div>
              </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <table id="datatableberkastes" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Kategori</th>
                              <th>Nama File</th>
                              <th>Type File</th>
                              <th>Size File</th>
                              <th>Waktu Upload</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                        </table>
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
 
@endsection
@section('script')
<script type="text/javascript">
 
jQuery( document ).ready(function( $ ) {
   $('#datatableberkastes').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('FileUploadtesgetdata',['id_user' => $id_user]) !!}',
      
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false },
            { data: 'kategori', name: 'kategori' },
            { data: 'nama_filetes', name: 'nama_filetes' },
            { data: 'type_filetes', name: 'type_filetes' },
            { data: 'sizeconvertion', name: 'sizeconvertion' },
            { data: 'convertiondate', name: 'convertiondate' },
            { data: 'action', name: 'action' },
        ]
    });

});
</script>

@include('sweet::alert')
@endsection
