@extends('admin.layout.masteradmin')

@section('content') 


@if(Auth::user()->level == "1" || Auth::user()->level == "4")

<!-- page content -->
<div class="right_col" role="main">
  <div class=""> 
    <div class="clearfix"></div>


    @if(Auth::user()->level == "1" || Auth::user()->level == "4")
    <a href="{{{ action('Auth\UserController@showtambah') }}}" class="btn btn-round btn-outline-primary btn-sm" data-id=""><i class="fa fa-fw fa-plus"></i>Tambah Pengguna/pelamar</a>
    @endif

    <hr> 

    @if(Auth::user()->level == "1" || Auth::user()->level == "4")
    <h2><b><u>Data User Untuk Pelamar Pekerjaan</u></b></h2>
    <div class="x_panel shadow-sm">
        <div class="x_title">
        <table class="table-responsive">
        <table id="datatables2" class="table table-bordered table-striped" width="100%">
          <thead>
          <tr>
            <th></th>
            <th>Nama</th>
            <th>Username</th>
            <th>Level</th>
            @if(Auth::user()->level == "1" || Auth::user()->level == "4")
            <th>Posisi Detail</th>
            <th>Status Aktif</th>
            <th style="width: 20%;">Aksi</th>
            @endif
          </tr>
          </thead>
        </table>  
        </table>
      </div>
    </div>
    @endif


    <h2>Data User Utama</h2>
      <div class="x_panel shadow-sm">
        <div class="x_title">
        <table id="datatables" class="table table-bordered table-striped" width="100%">
          <thead>
          <tr>
            <th></th>
            <th>Nama</th>
            <th>Username</th>
            <th>Level</th>
            @if(Auth::user()->level == "1" || Auth::user()->level == "4")
            <th>Posisi Detail</th>
            <th style="width: 20%;">Aksi</th>
            @endif
          </tr>
          </thead>
        </table>  
      </div>
    </div>
  </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Confirmation</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Apakah Anda Yakin Ingin Menghapus Ini?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


   <div id="confirmModalreset" class="modal fade" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h2 class="modal-title">Confirmation</h2>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                  <h4 align="center" style="margin:0;">Apakah Anda Yakin Ingin Mereset Pass Ini?</h4>
              </div>
              <div class="modal-footer">
               <button type="button" name="ok_button_reset" id="ok_button_reset" class="btn btn-danger">OK</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
          </div>
      </div>
  </div>

@else

<script type="text/javascript">
  alert('Terjadi Kesalahan');
  history.back();
</script>
@endif
@endsection




@section('script')


<script>

jQuery( document ).ready(function( $ ) {

    console.log(),
    $('#datatables').DataTable({
        processing: true,
        serverSide: true, 
        ajax: '{!! route('user.data') !!}',

        order: [ 0, 'DESC' ],
        columns: [
            { data: 'id', name: 'id', visible: false},

          

            /*{ data: 'name',   

              render: function ( data, type, row ) {
                  return row.name + ' | <a href="tambahankategori/'+row.id+'"><button type="button" title="Setup Soal Dan Tes Lainnya" class="isi_pesan btn btn-round btn-info btn-sm"><span class="fa fa-pencil-square-o"></span> </button></a> ';
              } },*/
            { data: 'name',   name: 'name' },
            { data: 'username', name: 'username' },
            { data: 'nama_level', name: 'level' },

            
            @if(Auth::user()->level == "1" || Auth::user()->level == "4"  )
            { data: 'nama_posisi', name: 'posisi' },
            { data: 'action', name: 'action' },
            @endif

        ]
    });



    $('#datatables2').DataTable({
        processing: true,
        serverSide: true, 
        ajax: '{!! route('indexuser2') !!}',

        order: [ 0, 'DESC' ],
        columns: [
            { data: 'id', name: 'id', visible: false},
            { data: 'name', 
               render: function ( data, type, row ) {
                  return row.name + ' | <a href="tambahankategori/'+row.id+'"><button type="button" title="Setup Soal Dan Tes Lainnya" class="isi_pesan btn btn-round btn-info btn-sm"><span class="fa fa-pencil-square-o"></span> </button></a> ';

              } 
             },

            { data: 'username', name: 'username' },
            { data: 'nama_level', name: 'level' },

            @if(Auth::user()->level == "1" || Auth::user()->level == "4")
            { data: 'nama_posisi', name: 'posisi' },
            { data: 'status_aktif',  render: function ( data, type, row ) {
                if (data == 'aktif') {
                  return '<span class="badge badge-pill badge-success" style="width: 60px; color:white">Aktif</span>';
                }else{
                  return '<span class="badge badge-pill badge-danger" style="width: 60px; color:white">Tidak Aktif</span>';
                }
              },
            },
            { data: 'action', name: 'action' },
            @endif
        ],
        createdRow: function ( row, data, index ) {
            $('td', row).eq(0).attr("nowrap","nowrap");
          },
    });

    //Hapus 

    var id_user;

     $(document).on('click', '.delete', function(){
      id_user = $(this).attr('id');
      $('#confirmModal').modal('show');
     });

     $('#ok_button').click(function(){

      $.ajax({
       url:"datauser/destroy/"+id_user,
       beforeSend:function(){
        $('#ok_button').text('Deleting...');
       },
       success:function(data)
       {

        setTimeout(function(){
         $('#confirmModal').modal('hide');
         swal.fire({
              title: "Deleted!",
              text: "Your post has been deleted.",
              type: "success"
          }),
         $('#datatables').DataTable().ajax.reload();
         $('#datatables2').DataTable().ajax.reload();
        }, 1000);
       }
      })
     });

    var id_user;
     $(document).on('click', '.reset', function(){
      id_user = $(this).attr('id');
      $('#confirmModalreset').modal('show');
     });

     $('#ok_button_reset').click(function(){
      $.ajax({
       url:"datauser/reset/"+id_user,
       beforeSend:function(){
        $('#ok_button_reset').text('Reseting...');
       },

       success:function(data)
       {
        setTimeout(function(){
         $('#confirmModalreset').modal('hide');
         swal.fire({
              title: "Reseting!",
              text: "Your post has been Reseting.",
              type: "success"
          }),
         $('#datatables2').DataTable().ajax.reload();
         $('#datatables').DataTable().ajax.reload();
        }, 1000);
       }
      })
     });

});


</script>

<script type="text/javascript">
jQuery( document ).ready(function( $ ) {
     //tipe surat penguji
    $(document).on('click', '.UbahStatus', function(){
        id = $(this).attr('id');
        $.post('{{ Route('changestatus') }}', {
            type: 'status', 
            _token: "{{ csrf_token() }}",
            id: id,

            beforeSend: function() {},

        }).done(function(data, response) {
          switch(data.gg){
            case '1': /*First case */
            swal.fire({
              title: "Update!",
              text: "User Diubah Menjadi Tidak Aktif.",
              type: "success"
            })
            $('#datatables2').DataTable().ajax.reload();
            break;
            case '2' : /*Second... */
            swal.fire({
              title: "Update!",
              text: "User Diubah Menjadi Aktif.",
              type: "success"
            })
            $('#datatables2').DataTable().ajax.reload();
            default:
            /* If none of the above */
            }
   
        })
    });
});
</script>
@endsection

