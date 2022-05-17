@extends('admin.layout.master')
@section('content')

<div class="content-header">
 
</div>
  <!-- /.content-header --> 
<div class="container-fluid">
    <div class="row">
      <div class="col-6 mx-auto">
        <h3>File yang diupload</h3>
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $message }}</strong>
          </div>
        @endif
        <a href=" {{ Route('zonatesshow', ['id_user' => $id_user]) }} "><span class="fa fa-arrow-left"></span> Kembali</a>

        </script>
        <div class="card">
          <div class="card-body">
            <table id="datatables" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama File</th>
                <th>Type File</th>
                <th>Size File</th>
                <th nowrap="">Aksi</th>
              </tr>
              </thead>
              <tbody>
                @forelse($data as $key => $showdata)
                <tr>
                  <td style="text-align: center; width: 2rem">{{ $key + 1 }}</td>
                  <td> {{$showdata->nama_filetes}} </td>
                  <td> {{$showdata->type_filetes}} </td>
                  <td> {{formatSizeUnits($showdata->size_filetes)}} </td>
                  <td style="width: 5rem"> 

                    <a href=" {{Route('Downloadberkastes',['id' => $showdata->id_berkastes])}} " title="Download File" class="btn btn-outline-info btn-xs">
                       <span class="fa fa-download"></span>
                    </a>
                    <a href="{{ Route('Destroyfileberkastes', ['id' => $showdata->id_berkastes]) }}" onclick="return confirm('apakah anda yakin menghapus file {{ $showdata->nama_filetes }}?')" title="Hapus File" class="btn btn-outline-danger btn-xs">
                       <span class="fa fa-trash"></span>
                    </a>

                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="10" style="text-align: center;">Tidak Ada Data</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>

</div>


<?php 
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

?>


<!-- /.modal -->
@endsection
@section('script')


@include('sweet::alert')

@endsection
