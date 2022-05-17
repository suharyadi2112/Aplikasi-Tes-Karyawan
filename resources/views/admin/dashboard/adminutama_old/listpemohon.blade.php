

@extends('admin.layout.masteradmin')



@section('content')  





<!-- page content -->

<div class="right_col" role="main">

  <div class="">

    <div class="clearfix"></div>



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

      

      @if(Auth::user()->level == 1)

      <div id="accordion" >

          <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->

          <div class="card-header" style="margin-bottom: 0px; padding: 0px;">

            <h4 class="card-title" style="margin-bottom: 0px; padding: 0px;">

              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" id="infopengisian">

                <font size="2px" color="black"><span class="fa fa-info-circle"></span> Catatan Kecil Yang Lucu :v <div class="spinner-grow text-danger spinner-grow-sm" id="growspinner" role="status" style="float:right">

                          <span class="sr-only">Loading...</span>

                        </div></font>

              </a>

            </h4>

           </div>



          <div id="collapseOne" class="panel-collapse collapse in" >

            <div class="card-body">

              <ol type="1" style="line-height: 2.0; color: black" >

                <li>Tanda plus berwarna biru <img src="{{ URL::asset('adminutama/production/images/open.png')}}"> digunakan untuk melihat apa aja sih detail dari setiap palamar.</li>



                <li>Button <a class=" btn btn-outline-danger btn-round btn-sm"><span class="fa fa-exclamation-circle"></span></a> digunakan untuk mengubah status menjadi aktif <a class=" btn btn-outline-success btn-round btn-sm"><span class="fa fa-check-circle"></span></a> dan kepada koprodi atau dekan mana yang dituju.</li>



                  <ol type="a">

                    <li><u><b>Pangajuan pelamar ke koprodi, dekan dll, baru bisa dilakukan ketika pelamar telah siap mengisi form permohonan kerja.</b></u></li>

                  </ol>



                <li>Button <button type="button" class=" btn btn-round btn-info btn-sm"><span class="fa fa-comments-o"></span> </button> digunakan untuk melihat pesan dari DKK, koprodi atau dekan</li>



                <li>Button <button type="button" class="btn btn-round btn-secondary btn-sm"><span class="fa fa-upload"></span> </button> digunakan untuk mengupload hasil KOREKSI Aptitude dan DISC dari yang telah dikerjakan pelamar</li>



                <li><b>"Status Selesai"</b>, jika <span class="badge badge-success" > Selesai</span> berarti dimana pelamar sudah selesai menyelesaikan pengisian formulir, jika <span class="badge badge-warning" >proses</span> Berarti pelamar belum/masih dalam melakukan pengisian formulir dan lainnya </li>



                <li><b>"Keputusan Bidang Terkait"</b>, jika <span class="badge badge-success" > Diterima</span> berarti dimana pelamar yang telah diajukan diterima oleh koprodi, dekan atau bidang terkait, jika <span class="badge badge-warning" >Menunggu</span> Berarti pelamar belum diajukan, jika <span class="badge badge-danger" >Ditolak</span> Berarti pelamar yang di ajukan tidak diterima oleh bidang terkait dengan alasan tertentu </li>



                <li><b>"Keputusan DKK"</b>, jika <span class="badge badge-success" > Diterima</span> berarti dimana pelamar yang telah diajukan diterima oleh Direktur Bag. Kepegawaian dan Kerjasama, jika <span class="badge badge-warning" >Menunggu</span> Berarti pelamar belum diajukan, jika <span class="badge badge-danger" >Ditolak</span> Berarti pelamar yang di ajukan tidak diterima oleh Direktur Bag. Kepegawaian dan Kerjasama</li>

               

                                

              </ol>

            </div>

          </div>

        </div>

      @endif

      @if(Auth::user()->level == 3 || Auth::user()->level == 4 ||Auth::user()->level == 5)

        <div id="accordion" >

          <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->

          <div class="card-header" style="margin-bottom: 0px; padding: 0px;">

            <h4 class="card-title" style="margin-bottom: 0px; padding: 0px;">

              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOnetwo" id="infopengisian">

                <font size="2px" color="black"><span class="fa fa-info-circle"></span> Catatan <div class="spinner-grow text-danger spinner-grow" id="growspinner" role="status" style="float:right">

                          <span class="sr-only">Loading...</span>

                        </div></font>

              </a>

            </h4>

           </div>



            <div id="collapseOnetwo" class="panel-collapse collapse" ><!--show-->

              <div class="card-body">

                <div>Salam Dunia Satu Keluarga 😊</div>

                <div>Ydh. Bapak-Bapak Dekan Fakultas Universitas Universal</div>

                <div>&nbsp;</div>

                <div>Melalui akun ini, kami bagian Kepegawaian UVERS mengirimkan Calon Pelamar yang sudah dites.</div>

                <div>Mohon bapak untuk memeriksa dan mereview hasil tes dari calon pelamar serta silakan bapak untuk mewawancarai calon pelamar. Apabila memerlukan bantuan untuk mengatur jadwal wawancara, silakan hubungi WA Bu Leny 0857 6603 6533.</div>

                <div>&nbsp;</div>

                <div>Batas waktu untuk memeriksa dan mereview hasil tes serta wawancara ke setiap calon pelamar adalah 2 (dua) minggu terhitung dari Bu Leny memberikan akun ke Bapak-Bapak Dekan via WA☺.</div>

                <div>&nbsp;</div>

                <div>Atas perhatian dan kerjasamanya, kami mengucapkan terima kasih.</div>

                <div>&nbsp;</div>

                <div>&nbsp;</div>

                <div>Salam,</div>

                <div>Bagian Kepegawaian</div>

                <div>Universitas Universal</div>

                <div>Batam</div>

              </div>

            </div>

        </div>

      @endif



      @if(Auth::user()->level == 3 || Auth::user()->level == 4 ||Auth::user()->level == 5)

      <div id="accordion" >

          <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->

          <div class="card-header" style="margin-bottom: 0px; padding: 0px;">

            <h4 class="card-title" style="margin-bottom: 0px; padding: 0px;">

              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" id="infopengisian">

                <font size="2px" color="black"><span class="fa fa-info-circle"></span> Penggunaan Singkat <div class="spinner-grow text-danger spinner-grow-sm" id="growspinner" role="status" style="float:right">

                          <span class="sr-only">Loading...</span>

                        </div></font>

              </a>

            </h4>

           </div>



          <div id="collapseOne" class="panel-collapse collapse in" >

            <div class="card-body">

              <ol type="1" style="line-height: 2.0; color: black" >



                <li>Tanda plus berwarna biru <img src="{{ URL::asset('adminutama/production/images/open.png')}}"> digunakan untuk melihat apa aja sih detail dari setiap palamar.</li>



                  <ol type="a">

                    <li>Dalam memutuskan calon pelamar klik button  <button type="button" title="Tinggalkan pesan" class=" btn btn-round btn-danger btn-sm" ><span class="fa fa-paper-plane"></span> Putuskan</button> yang akan ditemukan jika mengklik <img src="{{ URL::asset('adminutama/production/images/open.png')}}"> </li>

                  </ol>

             

                <li>Button <button type="button" class=" btn btn-round btn-info btn-sm"><span class="fa fa-comments-o"></span> </button> digunakan untuk melihat pesan dari DKK, koprodi atau dekan</li>



                <li><b>"Keputusan Bidang Terkait"</b>, jika <span class="badge badge-success" > Diterima</span> berarti dimana pelamar yang telah diajukan diterima oleh koprodi, dekan atau bidang terkait, jika <span class="badge badge-warning" >Menunggu</span> Berarti pelamar belum diajukan, jika <span class="badge badge-danger" >Ditolak</span> Berarti pelamar yang di ajukan tidak diterima oleh bidang terkait dengan alasan tertentu </li>



                <li><b>"Keputusan DKK"</b>, jika <span class="badge badge-success" > Diterima</span> berarti dimana pelamar yang telah diajukan diterima oleh Direktur Bag. Kepegawaian dan Kerjasama, jika <span class="badge badge-warning" >Menunggu</span> Berarti pelamar belum diajukan, jika <span class="badge badge-danger" >Ditolak</span> Berarti pelamar yang di ajukan tidak diterima oleh Direktur Bag. Kepegawaian dan Kerjasama</li>

               

                                

              </ol>

            </div>

          </div>

        </div>

      @endif



      <div class="row"> 

        <div class="col-md-12 col-sm-12 ">

          <div class="x_panel shadow-sm">

            <div class="x_title">

                <h2>List Pemohon <small>pelamar</small></h2>

                <div class="clearfix"></div>

              </div>

                <div class="x_content">

                  <div class="row">

                    <div class="col-sm-12">

                      <div class="card-box table-responsive">

                        <table id="datatablepemohon" class="table table-striped table-bordered" style="width:100%" >

                          <thead>

                            <tr>

                              <th><center><span class="fa fa-eye"></span></center></th>

                              <th></th>

                              <th></th>

                              <th>id user</th>

                              <th>Nama Lengkap</th>

                              <th>Email</th>

                              <th>Jenis Kelamin</th>



                              @if(Auth::user()->level == 1)

                              <th style="text-align: center; max-width: 1px;">Status Aktif, Dll</th>

                              <th>Status Selesai</th>

                              @endif



                              @if(Auth::user()->level == 3 || Auth::user()->level == 4)

                              <th>Pesan</th>

                              @endif

                              <th>Keputusan Bidang Terkait</th>

                              <th>Keputusan DKK</th>

                              

                            </tr>

                          </thead>

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



@endsection

@section('script')



<div class="modal fade bs-example-modal-lg" id="linkdetail" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered modal-xl">

    <div class="modal-content">

      <div class="modal-body">

          <div class="row justify-content-md-center">

            <form action="{{ Route('viewdatadiriau') }}" role="form" method="POST">

              @csrf

              <input type="hidden" class="id_usermodal" name="id_user">

              <button type="submit" class="btn btn-round btn-outline-primary btn-sm"><span class="fa fa-male"></span>|<span class="fa fa-female"></span> Data Diri</button>

            </form>

            <form action="{{ Route('viewdatakesehatanau') }}" role="form" method="POST">

              @csrf

              <input type="hidden" class="id_usermodal" name="id_user">

              <button type="submit" class="btn btn-round btn-outline-primary btn-sm"><span class="fa fa-medkit"></span> Kesehatan X <span class="fa fa-graduation-cap"></span> Pendidikan</button>

            </form>

            <form action="{{ Route('viewpengalamankerjaxorganisasi') }}" role="form" method="POST">

              @csrf

              <input type="hidden" class="id_usermodal" name="id_user">

              <button type="submit" class="btn btn-round btn-outline-primary btn-sm"><span class="fa fa-suitcase"></span> Pengalaman Kerja X <span class="fa fa-puzzle-piece"></span> Organisasi</button>

            </form>

            <form action="{{ Route('viewpekerjaanyangdilamar') }}" role="form" method="POST">

              @csrf

              <input type="hidden" class="id_usermodal" name="id_user">

              <button type="submit" class="btn btn-round btn-outline-primary btn-sm"><span class="fa fa-tag"></span> Pekerjaan Yang Dilamar</button>

            </form>

            <form action="{{ Route('viewdatapenxkeahxbah') }}" role="form" method="POST">

              @csrf

              <input type="hidden" class="id_usermodal" name="id_user">

              <button type="submit" class="btn btn-round btn-outline-primary btn-sm"><span class="fa fa-trophy"></span> Pencapaian, Bahasa dan Keahlian Lainnya</button>

            </form>

          </div>

        </div>

     </div>

  </div>

</div>





@if(Auth::user()->level == 3 || Auth::user()->level == 4)

<div class="modal fade bs-example-modal-lg" id="pesan" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered modal-md">

    <div class="modal-content">

      <div class="modal-header bg-info" style="color: white">

        <h5 class="modal-title"> Keputusan dan Pesan</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>



      <form action="{{ Route('SimpanPesan') }}" role="form" method="POST" onsubmit="return confirm('Pastikan keputusan sudah tepat, anda yakin untuk melanjutkannya ?');">

      <div class="modal-body">

          <div class="left-content-md-center">

              @csrf

              <input type="hidden" name="id_user" class="id_userpesan">



              @if(Auth::user()->level == 3)

              <input type="hidden" name="cekpengecek" value="3">

              @endif

              @if(Auth::user()->level == 4)

              <input type="hidden" name="cekpengecek" value="4">

              @endif



              <div class="col-md-12">

                <div class="radio">

                  <label>

                    <input type="radio" class="flat" name="status_keputusan" value="1" required=""> Iya, saya oke dengan pelamar ini

                  </label>

                   <label>

                    <input type="radio" class="flat" name="status_keputusan" value="2" required=""> Tidak, saya kurang dengan pelamar ini

                  </label>

                  <br>

                  <font color="red" size="2"> *keputusan yang dipilih akan diteruskan kebagian kepegawaian</font><br>

                 </div>

              </div>



              <div class="col-md-12">

                <hr>

                <textarea class="form-control" name="pesan" placeholder="Masukan Pesan/Alasan Dari Keputusan" required=""></textarea>

                <br>

              </div>



          </div>

        </div>

        <div class="modal-footer">

          <button type="submit" class="btn btn-primary">Simpan</button>

        </div>

        </form>

     </div>

  </div>

</div>

@else

<script>

  function myFunction() {

    alert("Anda tidak bisa menikmati fitur ini");

  }

</script>

@endif



<!----------------------------Upload Hasil Aptitude dan DISC-------------------------->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="aptitudedischasil">

  <div class="modal-dialog modal-dialog-centered modal-md">

    <div class="modal-content">

      <div class="modal-header bg-info" style="color: white">

        <h5 class="modal-title">Upload Hasil Koreksi Aptitude, DISC dan Lainnya</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <form action="{{ Route('hasilkoreksiaptidisc') }}" role="form" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Yakin untuk melanjutkannya ? ');">

        {{ csrf_field() }}



        <div class="overlaymodal">

          

        </div>



        <input type="hidden" name="id_user" id="id_userhasilaptidisc" required="">



        <div class="modal-body mx-auto">

          <div class="card-body" style="padding: 5px;">

            <div class="col-md-12">

              <div class="form-group" >

                <label for="nama_perguruantinggi">Pilih File:</label>

                  <div class="input-group">

                    <div class="input-group-prepend">

                      <span class="input-group-text"><i class="fa fa-upload"></i></span>

                    </div>

                    <input type="file" name="files[]" class="form-control" id="someId2" required="" multiple=""><br>

                  </div>

                  <br>

                  <font color="red" size="2">File Yang Diizinkan <b><u>HANYA</u></b> .pdf, .docx, .doc, .xls, .xlsx Maks 2 mb</font>

                <div class="help-block with-errors text-danger"></div>

              </div>

            </div>

          </div>

        </div>

        <div class="modal-footer">

          <button type="submit" class="btn btn-primary">Simpan</button>

        </div>

        </form>

     </div>

  </div>

</div>





<!----------------------------MENENTUKAN TUJUAN KEMANA PELAMAR INI DISERAHKAN-------------------------->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="posisitujuan" >

  <div class="modal-dialog modal-dialog modal-md">

    <div class="modal-content">

      <div class="modal-header bg-info" style="color: white">

        <h5 class="modal-title">Pilih Kemana Mau Dituju</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <form action="{{ Route('updatestatus') }}" role="form" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Yakin posisi yang dituju sudah benar ?');">

        {{ csrf_field() }}



        <div class="overlaymodal">

          

        </div>



        <input type="hidden" name="id_datadiri" id="iduserposisi" required="">



        <div class="modal-body mx-auto row">

          <div class="card-body" style="padding: 5px;">

            <div class="col-md-12">



              <label for="nama_perguruantinggi">Status : </label>&nbsp;

                  <input type="checkbox" name="statusaktif" id="status" style="transform: scale(1.5);" />

                <b> Centang jika akan diaktifkan</b>

              <br>

              <hr>

              

              <label for="nama_perguruantinggi">Pilih Posisi Yang Dituju:</label>



              <div id="untukhide">

                <select class="form-control" name="posisi" id="posisi" required>

                  <option value="">-- Silahkan Pilih Posisi--</option>

                  @foreach($dataposisi as $showposisi)

                  <option value="{{$showposisi->id_posisi}}">{{ $showposisi->nama_posisi }}</option>

                  @endforeach

                </select>

              </div><br>

              <font color="red" size="2"> *baru bisa dilakukan jika pelamar telah selesai mengerjakan formulir permohonan kerja</font>



            </div>

          </div>

        </div>

        <div class="modal-footer">

          <button type="submit" class="btn btn-outline-primary btn-flat btn-sm">Aktifkan pelamar ini</button>

        </div>

        </form>

     </div>

  </div>

</div>





<script type="text/javascript">





function format ( d ) {



    return '<div class="slider">'+  
    'Informasi Lainya : <span class="badge badge-success">'+d.countberkas+' File Upload Data Diri</span> <span class="badge badge-info">'+d.countberkastes+' File Upload Tes</span>'+

            '<hr>'+

            

            '<button type="button" class="linkdetail btn btn-round btn-primary btn-sm" title="Navigasi Untuk Melihat Informasi lainnya" data-id="'+d.id_user+'" data-nama="'+d.nama_lengkap+'"><span class="fa fa-info-circle"></span> Detail Informasi</button>'+



            '<a href="fileupload/'+d.id_user+'"><button type="button" title="File Yang Diupload Saat Pengisian Datadiri" class="btn btn-round btn-primary btn-sm"><span class="fa fa-file"></span> File Upload Data Diri </button></a>'+



            '<a href="fileuploadtes/'+d.id_user+'"><button type="button" title="File Yang Diupload Saat Tes" class="btn btn-round btn-primary btn-sm"><span class="fa fa-book"></span> File Upload Tes</button></a>'+



            '<a href="IndexAptitudeXdiscc/'+d.id_user+'"><button type="button" title="File Tes Aptitude dan DISC" class="btn btn-round btn-primary btn-sm"><span class="fa fa-pencil"></span> Aptitude, DISC Dan Lainnya</button></a>'+



            '<a href="#"><button type="button" title="Tinggalkan pesan" onclick="myFunction()" class="pesan btn btn-round btn-danger btn-sm" data-id="'+d.id_user+'" ><span class="fa fa-paper-plane"></span> Putuskan</button></a>'+

            '</div>'



}



jQuery( document ).ready(function( $ ) {



    //untuk menentukan kemana pelamar ini di tujukan

    $(document).on('click', '.posisitujuan', function(){



      id = $(this).attr('datadiri-id');

      sts = $(this).attr('stsaktf');



      if (sts == 1) {

        $( "#status" ).prop( "checked", true );

      }else if(sts == 2){

        $( "#status" ).prop( "checked", false );

      }else{



      }



      var ckbox = $('#status');

      if (ckbox.is(':checked')) {

            $("#posisi").removeAttr('disabled','disabled')

        } else {

            $("#posisi").attr('disabled','disabled')

      }

      

       $('#status').change(function() {

          if($(this).is(":checked")) {

              $("#posisi").removeAttr('disabled','disabled')

          }else{

              $("#posisi").attr('disabled','disabled')    

          }

      });



      $("#statusaktif").val(sts);

      $("#iduserposisi").val(id);

      $('#posisitujuan').modal('show');

    });





    //untuk link yang banyak2

    $(document).on('click', '.linkdetail', function(){

      id = $(this).attr('data-id');

      namalengkap = $(this).attr('data-nama');

      $(".id_usermodal").val(id);

      $(".id_userpesan").val(namalengkap);

      $('#linkdetail').modal('show');

    });



    //untuk upload file hasil aptitude dan disc

    $(document).on('click', '.hasilaptidisc', function(){

      id = $(this).attr('data-id_user');

      $("#id_userhasilaptidisc").val(id);

      $('#aptitudedischasil').modal('show');

    });



    //untuk menampilkan pesan

    $(document).on('click', '.pesan', function(){

      id123 = $(this).attr('data-id');

      $(".id_userpesan").val(id123);

      $('#pesan').modal('show');

    });



   var dt =  $('#datatablepemohon').DataTable({

        processing: true,

        serverSide: true,

        ajax: '{!! route('DataPemohon') !!}',

        

        columns: [

            {

                "class":          "details-control",

                "orderable":      false,

                //"data":           'id_surattugas',

                "defaultContent": '<div class="spinner-grow text-info" role="status"><span class="sr-only">Loading...</span></div>'

            },

            { data: 'id_user', name: 'id_user', visible: false },

            { data: 'countberkas', name: 'countberkas', visible: false },

            { data: 'countberkastes', name: 'countberkastes', visible: false },

            { data: 'nama_lengkap', name: 'nama_lengkap' },

            { data: 'email', name: 'email' },

            { data: 'jenis_kelamin', name: 'jenis_kelamin' },



            //akses yang hanya admin bisa melihat

            @if(Auth::user()->level == 1)

             { data: 'status',

              render: function ( data, type, row ) {

                  return row.status + ' <a href="isipesan/'+ row.id_user + '"><button type="button" title="Isi Pesan Dari Pengecek" class="isi_pesan btn btn-round btn-info btn-sm"><span class="fa fa-comments-o"></span> </button></a> ' + 



                  ' <a href="#"><button type="button" title="Upload Hasil Aptitude dan DISC" class="hasilaptidisc btn btn-round btn-secondary btn-sm" data-id_user="'+row.id_user+'"><span class="fa fa-upload"></span> </button></a> ';

              }

            },

            { data: 'status_finish', name: 'status_finish' },

            @endif



            @if(Auth::user()->level == 3 || Auth::user()->level == 4)

            

             { data: 'isi_pesan',

              render: function ( data, type, row ) {

                  return ' <a href="isipesan/'+ row.id_user + '"><button type="button" title="Isi Pesan Dari Pengecek" class="isi_pesan btn btn-round btn-info btn-sm"><span class="fa fa-comments-o"></span> </button></a> ';

              }

            },

            @endif



            { data: 'keputusan', 

             render: function ( data, type, row ) {

                  return row.keputusan + '<br><span class="badge badge-info" title="Proses Mengisi Formulir dan Berkas" > '+row.nama_posisi+'</span>';

              } 

            },



            { data: 'keputusan_dkk', name: 'keputusan_dkk' },

        ]

    });



  // Array to track the ids of the details displayed rows

  var detailRows = [];


      // Add event listener for opening and closing details
    $('#datatablepemohon tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = dt.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            $('div.slider', row.child()).slideUp( function () {
                row.child.hide();
                tr.removeClass('shown');
            } );
        }
        else {
            // Open this row
            row.child( format(row.data()), 'padding' ).show();
            tr.addClass('shown');
 
            $('div.slider', row.child()).slideDown();
        }
    } );


  // On each draw, loop over the `detailRows` array and show any child rows

  dt.on( 'draw', function () {

      $.each( detailRows, function ( i, id ) {

          $('#'+id+' td.details-control').trigger( 'click' );

      } );

  });

});

</script>



<script type="text/javascript">

//cek validasi file



var file2 = document.getElementById('someId2');



file2.onchange = function() {

   for (var i = 0; i < file2.files.length; i++) {



        if(this.files[i].size > 2097152){

           swal.fire( file2.files.item(i).name  +  "", "File Mungkin Lebih 2MB!", "error");

           this.value = "";



        }

        var ext = file2.files[i].name.substr(-3);

        var ygempat = file2.files[i].name.substr(-4);

        if(ext!== "PDF" && ext!== "pdf" && ygempat!== "docx" && ext!== "doc" && ext!== "xls" && ygempat!== "xlsx")  {



            swal.fire( file2.files.item(i).name  +  "", "Extention File Mungkin Tidak Diizinkan", "error");

            this.value = '';



        }else{

            alert( file2.files.item(i).name  + ", File Diizinkan");

        }

      

      }



      function getFile(filePath) {

          return filePath.substr(filePath.lastIndexOf('\\') + 1).split('.')[0];

      }

};

</script>






<style>
td.details-control {
    background: url('https://raw.githubusercontent.com/DataTables/DataTables/1.10.7/examples/resources/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('https://raw.githubusercontent.com/DataTables/DataTables/1.10.7/examples/resources/details_close.png') no-repeat center center;
}
div.slider {
    display: none;
}
</style>

@endsection

