@extends('admin.layout.masteradmin')

@section('content') 



<!-- page content -->

<div class="right_col" role="main">

  <div class="">

    @if(Auth::user()->level == "1")

    <form role="form" id="cekdata" method="POST" action="{{ Route('viewdatadiriau') }}">

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

    <div class="row">

      <div class="col-md-12 col-sm-12 ">

        <a href="{{{ route('ListPemohon') }}}" title="Kembali"><i class="fa fa-arrow-circle-left"></i> Kembali</a>

        <div class="x_panel">

          <div class="x_title">

            <h2>Informasi Data Diri <small>{{ $datadiri->nama_lengkap }}</small></h2>

            <ul class="nav navbar-right panel_toolbox">

              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

              </li>

              <li class="dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <a class="dropdown-item" href="#">Settings 1</a>

                    <a class="dropdown-item" href="#">Settings 2</a>

                  </div>

              </li>

              <li><a class="close-link"><i class="fa fa-close"></i></a>

              </li>

            </ul>

            <div class="clearfix"></div>

          </div>

          <div class="x_content">

            <div class="col-md-3 col-sm-3  profile_left">

              <div class="profile_img">

                <div id="crop-avatar">

                  <!-- Current avatar -->

                  @if(empty($fotodiri->nama_file))

                  <img class="img-responsive avatar-view" style="width: 220px; height: 220px;" src="{{ URL::asset('adminutama/production/images/user.png')}}" alt="Avatar" title="Change the avatar">

                 

                  @else

                  <img class="img-responsive avatar-view" style="width: 220px; height: 220px;" src="{{ URL::asset('berkas/'.$datadiri->id_user.'/fotodiri/'.$fotodiri->nama_file.'.'.$fotodiri->type_file.'')}}" alt="Avatar" title="Change the avatar">

                  @endif

                </div>

              </div> 

              <h3>{{ $datadiri->nama_lengkap }}</h3>

              <h2>{{ $datadiri->nama_mandarin }}</h2>



              <ul class="list-unstyled user_data">

                <li><i class="fa fa-map-marker user-profile-icon"></i> {{ $datadiri->alamat_sekarang }}

                </li>



                <li>

                  <i class="fa fa-phone user-profile-icon"></i> {{ $datadiri->nomor_telepon }}

                </li>



                <li class="m-top-xs">

                  <i class="fa fa-at user-profile-icon"></i>

                  <a href="mailto:{{ $datadiri->email }}?Subject=Lamaran Kerja" target="_blank">{{ $datadiri->email }}</a>

                </li>

              </ul>



              <br /><br />

              @if(Auth::user()->level == "1")

              <a href="{{ Route('editDataDiriau', ['id_user' => $datadiri->id_user]) }}"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>

              @endif

              <br />



            </div>

            <div class="col-md-9 col-sm-9 ">

              <div class="" role="tabpanel" data-example-id="togglable-tabs">

                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">

                  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Umum</a>

                  </li>

                  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Sekitar</a>

                  </li>

                  <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Identitas Lainnya</a>

                  </li>

                </ul>

                <div id="myTabContent" class="tab-content">

                  <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">



                    <!-- start recent activity -->

                    <ul class="messages">

                      <li>

                        <div class="message_wrapper">

                          <h4 class="heading">Agama :</h4>

                          <span class="fa fa-heart"></span> {{ $datadiri->agama }}

                        </div>

                      </li>

                    </ul>

                    <ul class="messages">

                      <li>

                        <div class="message_wrapper">

                          <h4 class="heading">NO KTP & Masa Berlaku:</h4>

                          <span class="glyphicon glyphicon-tags"></span> {{ $datadiri->no_ktp }} - <span class="fa glyphicon glyphicon-tags"></span> {{ $datadiri->masa_berlaku_ktp }}

                        </div>

                      </li>

                    </ul>

                    @if(is_null($datadiri->no_npwp))

                    @else

                    <ul class="messages">

                      <li>

                        <div class="message_wrapper">

                          <h4 class="heading">NO NPWP</h4>

                          <span class="glyphicon glyphicon-tags"></span> {{ $datadiri->no_npwp }}

                        </div>

                      </li>

                    </ul>

                    @endif

                    <ul class="messages">

                      <li>

                        <div class="message_wrapper">

                          <h4 class="heading">Tempat & Tanggal Lahir :</h4>

                          <span class="fa fa-map-marker"></span> {{ nama_prov($datadiri->tempatlahir_provinsi) }} - <span class="fa fa-map-marker"></span> {{ nama_kota($datadiri->tempatlahir_kota) }} - <i class="fa fa-calendar-alt"></i> {{ tanggal_indo($datadiri->tanggal_lahir) }}

                        </div>

                      </li>

                    </ul>

                    <ul class="messages">

                      <li>

                        <div class="message_wrapper">

                          <h4 class="heading">Golongan Darah :</h4>

                          <span class="fa fa-tint"></span> {{ $datadiri->golongan_darah }}

                        </div>

                      </li>

                    </ul>

                    <ul class="messages">

                      <li>

                        <div class="message_wrapper">

                          <h4 class="heading">Jenis Kelamin :</h4>

                          <span class="fa fa-venus-mars"></span> {{ $datadiri->jenis_kelamin }}

                        </div>

                      </li>

                    </ul>

                    <ul class="messages">

                      <li>

                        <div class="message_wrapper">

                          <h4 class="heading">NO WhatsApp :</h4>

                          <span class="fa fa-wechat"></span> {{ $datadiri->nomor_wa }}

                        </div>

                      </li>

                    </ul>

                    

                    <!-- end recent activity -->



                  </div>

                  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">



                    <!-- bagian 2 -->

                    <table id="datatablespemohon" class="table table-striped table-bordered" style="width:100%">

                      <thead>

                        <tr>

                          <th><span class="fa fa-eye"></span></th>

                          <th>Nomor Rekening</th>

                          <th>Tinggi Badan *cm</th>

                          <th>Berat Badan *kg</th>

                          <th>Status T.Tinggal</th>

                          <th>Nomor Telepon 2</th>

                        </tr>

                      </thead>

                    </table>

                    <!-- bagian 2 -->

                    <hr>

                    <!-- bagian 2 bawah-->

                    <table id="" class="table table-striped table-bordered" style="width:100%">

                      <thead>

                        <tr>

                          <th>Hobi</th>

                          <th>Olahraga</th>

                          <th>CPNS</th>

                          <th>Merokok</th>

                          <th>Beasiswa</th>

                          <th>Lama Bekerja</th>

                        </tr>

                      </thead>

                      <?php

                      $checkkon = array('0' => 'tidak','1' => 'Iya');

                      ?>

                      <tbody>

                        <td>{{ $datadiri->hobi }}</td>

                        <td>{{ $datadiri->minat_olahraga }}</td>

                        <td>{{ $checkkon[$datadiri->status_cpns] }}</td>

                        <td>{{ $checkkon[$datadiri->status_merokok] }}</td>

                        <td>{{ $checkkon[$datadiri->status_beasiswa] }}</td>

                        <td>

                          @if ($datadiri->kesediaan_lama_bekerja == 3)

                            Lebih {{ $datadiri->kesediaan_lama_bekerja }} Tahun

                          @else

                            {{ $datadiri->kesediaan_lama_bekerja }} Tahun

                          @endif

                        </td>

                      </tbody>

                    </table>

                    <!-- bagian 2 bawah-->

                    <hr>

                    <!-- bagian 2 tengah-->

                    <table id="" class="table table-striped table-bordered" style="width:100%">

                      <thead>

                        <tr>

                          <th>Kontak Darurat</th>

                          <th>Hubungan</th>

                          <th>Nomor Telepon</th>

                          <th>Kota</th>

                        </tr>

                      </thead>

                      

                      <tbody>

                        <tr>

                          <td>{{ $datadiri->nama_nodarurat }}</td>

                          <td>{{ $datadiri->hubungan_nodarurat }}</td>

                          <td>{{ $datadiri->nomor_darurat }}</td>

                          <td>{{ $datadiri->kota_nodarurat }}</td>

                        </tr>

                        <tr>

                          <td>{{ $datadiri->nama_nodarurat2 }}</td>

                          <td>{{ $datadiri->hubungan_nodarurat2 }}</td>

                          <td>{{ $datadiri->nomor_darurat2 }}</td>

                          <td>{{ $datadiri->kota_nodarurat2 }}</td>

                        </tr>

                      </tbody>

                    </table>

                    <!-- bagian 2 tengah-->



                  </div>

                  <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">



                    <table id="" class="table table-striped table-bordered" style="width:100%">

                      <thead>

                        <tr>

                          <th>Indentitas Lainnya</th>

                          <th>Status</th>

                        </tr>

                      </thead>

                      

                      <tbody>

                        <tr>

                          <td>Kartu Keluarga</td>

                          <td>

                             @if(is_null($datadiri->kartu_keluarga)) 

                             <span class="badge badge-danger">Tidak</span>

                             @else 

                             <span class="badge badge-success">Punya</span>

                             @endif

                          </td>

                        </tr>

                        <tr>

                          <td>Paspor</td>

                          <td>

                             @if(is_null($datadiri->paspor)) 

                             <span class="badge badge-danger">Tidak</span>

                             @else 

                             <span class="badge badge-success">Punya</span>

                             @endif

                          </td>

                        </tr>

                        <tr>

                          <td>Sim A</td>

                          <td>

                             @if(is_null($datadiri->sim_a)) 

                             <span class="badge badge-danger">Tidak</span>

                             @else 

                             <span class="badge badge-success">Punya</span>

                             @endif

                          </td>

                        </tr>

                        <tr>

                          <td>Sim B</td>

                          <td>

                             @if(is_null($datadiri->sim_b)) 

                             <span class="badge badge-danger">Tidak</span>

                             @else 

                             <span class="badge badge-success">Punya</span>

                             @endif

                          </td>

                        </tr>

                        <tr>

                          <td>Sim C</td>

                          <td>

                             @if(is_null($datadiri->sim_c)) 

                             <span class="badge badge-danger">Tidak</span>

                             @else 

                             <span class="badge badge-success">Punya</span>

                             @endif

                          </td>

                        </tr>

                        <tr>

                          <td>Bpjs Kesehatan</td>

                          <td>

                             @if(is_null($datadiri->bpjs_kesehatan)) 

                             <span class="badge badge-danger">Tidak</span>

                             @else 

                             <span class="badge badge-success">Punya</span>

                             @endif

                          </td>

                        </tr>

                        <tr>

                          <td>Bpjs Tenaga Kerja</td>

                          <td>

                             @if(is_null($datadiri->bpjs_tenagakerja)) 

                             <span class="badge badge-danger">Tidak</span>

                             @else 

                             <span class="badge badge-success">Punya</span>

                             @endif

                          </td>

                        </tr>

                        <tr>

                          <td>Bpjs Jaminan Pensiun</td>

                          <td>

                             @if(is_null($datadiri->bpjs_jaminanpensiun)) 

                             <span class="badge badge-danger">Tidak</span>

                             @else 

                             <span class="badge badge-success">Punya</span>

                             @endif

                          </td>

                        </tr>

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



<?php



function nama_kota($id_kota){



    $findkota = DB::table('kabupaten')

    ->select('id_kab','nama_kab')

    ->where('id_kab', $id_kota)

    ->first();



    return $findkota->nama_kab;

}

function nama_prov($id_provinsi){



    $findprov = DB::table('provinsi')

    ->select('id_prov','nama')

    ->where('id_prov', $id_provinsi)

    ->first();



    return $findprov->nama;

}

//convertion tanggal format database

function tanggal_indo($tanggal) {

    $bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

    $split = explode('-', $tanggal);

    return $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];

}



?>

@endsection

@section('script')

<script type="text/javascript">



function format ( d ) {



return '<table class="table table-striped table-bordered table-sm" style="width:100%">'+

          '<thead>'+

            '<tr>'+

              '<td colspan="5" class="table-info" style="text-align: center;"><span class="fa fa-users"></span> Informasi Saudara</td>'+

            '</tr>'+

            '<tr>'+

              '<td>Anak Ke</td>'+

              '<td>'+d.anak_ke+'</td>'+

            '</tr>'+

            '<tr>'+

              '<td>Jumlah Saudara</td>'+

              '<td>'+d.jumlah_saudara+'</td>'+

            '</tr>'+

            '<tr>'+

              '<td colspan="5" class="table-info" style="text-align: center;"><span class="fa fa-users"></span> Informasi Orang Tua</td>'+

            '</tr>'+

            '<tr>'+

              '<td>Nama Ayah</td>'+

              '<td>'+d.nama_ayah+'</td>'+

            '</tr>'+

            '<tr>'+

              '<td>Nama Ibu</td>'+

              '<td>'+d.nama_ibu+'</td>'+

            '</tr>'+

            '<tr>'+

              '<td>Pekerjaan Ayah</td>'+

              '<td>'+d.pekerjaan_ayah+'</td>'+

            '</tr>'+

            '<tr>'+

              '<td>Pekerjaan Ibu</td>'+

              '<td>'+d.pekerjaan_ibu+'</td>'+

            '</tr>'+

            '<tr>'+

              '<td>Nomor Telepon Ayah</td>'+

              '<td>'+d.nomor_telepon_ayah+'</td>'+

            '</tr>'+

            '<tr>'+

              '<td>Nomor Telepon Ibu</td>'+

              '<td>'+d.nomor_telepon_ibu+'</td>'+

            '</tr>'+

            '<tr>'+

              '<td>Nama Wali</td>'+

              '<td>'+d.nama_wali+'</td>'+

            '</tr>'+

            '<tr>'+

              '<td>Alamat Wali</td>'+

              '<td>'+d.alamat_wali+'</td>'+

            '</tr>'+

            '<tr>'+

              '<td>Nomor Telepon Wali</td>'+

              '<td>'+d.nomor_wali+'</td>'+

            '</tr>'+

            '<tr>'+

              '<td colspan="5" class="table-info" style="text-align: center;"><span class="fa fa-home"></span> Informasi Rumah Tangga</td>'+

            '</tr>'+

            '<tr>'+

              '<td>Status Marital</td>'+

              '<td>'+d.status_marital+'</td>'+

            '</tr>'+

            <?php if ($datadiri->nama_pasangan != null) { ?>

            '<tr>'+

              '<td>Nama Pasangan</td>'+

              '<td>'+d.nama_pasangan+'</td>'+

            '</tr>'+

            <?php } ?>

            <?php if ($datadiri->pekerjaan_pasangan != null) { ?>

            '<tr>'+

              '<td>Pekerjaan Pasangan</td>'+

              '<td>'+d.pekerjaan_pasangan+'</td>'+

            '</tr>'+

            <?php } ?>

            <?php if ($datadiri->nomor_telepon_pasangan != null) { ?>

            '<tr>'+

              '<td>Nomor Telepon Pasangan</td>'+

              '<td>'+d.nomor_telepon_pasangan+'</td>'+

            '</tr>'+

            <?php } ?>

            <?php if ($datadiri->jumlah_anak != null) { ?>

            '<tr>'+

              '<td>Jumlah Anak</td>'+

              '<td>'+d.jumlah_anak+'</td>'+

            '</tr>'+

            <?php } ?>

          '</thead>'+

        '</table>'

   

}



jQuery( document ).ready(function( $ ) {

   var dt = $('#datatablespemohon').DataTable({

        processing: true,

        serverSide: true,

        searching : false,

        lengthChange : false,

        paging : false,

        bInfo : false,

        orderable: false,

        ajax: '{!! route('detaildatadiri',['id_user' => $datadiri->id_user]) !!}',

      

        columns: [

            {

                "class":          "details-control",

                "orderable":      false,

                //"data":           '',

                "defaultContent": '<div class="spinner-grow text-info" role="status"><span class="sr-only">Loading...</span></div>'

            },

            { data: 'nomor_rekening', name: 'nomor_rekening' },

            { data: 'tinggi_badan', name: 'tinggi_badan' },

            { data: 'berat_badan', name: 'berat_badan' },

            { data: 'kepemilikan_tempat_tinggal', name: 'kepemilikan_tempat_tinggal' },

            { data: 'nomor_telepon2', name: 'nomor_telepon2' },

        ]

    });





    // Array to track the ids of the details displayed rows

  var detailRows = [];



  $('#datatablespemohon tbody').on( 'click', 'tr td.details-control', function () {

      var tr = $(this).closest('tr');

      var row = dt.row( tr );

      var idx = $.inArray( tr.attr('id'), detailRows );



      if ( row.child.isShown() ) {

          tr.removeClass( 'details' );

          row.child.hide();



          // Remove from the 'open' array

          detailRows.splice( idx, 1 );

      }

      else {

          tr.addClass( 'details' );

          row.child( format( row.data() ) ).show();



          // Add to the 'open' array

          if ( idx === -1 ) {

              detailRows.push( tr.attr('id') );

          }

      }

  } );



  // On each draw, loop over the `detailRows` array and show any child rows

  dt.on( 'draw', function () {

      $.each( detailRows, function ( i, id ) {

          $('#'+id+' td.details-control').trigger( 'click' );

      } );

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

jQuery( document ).ready(function($){

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



<style>

.tooltip-inner {

    min-width: 350px; /* the minimum width */

}

td.details-control {

    background: url('{{ URL::asset('adminutama/production/images/open.png')}}') no-repeat center center;

    cursor: pointer;

}

tr.details td.details-control {

    background: url('{{ URL::asset('adminutama/production/images/close.png')}}') no-repeat center center;

}

</style>



@endsection