@extends('admin.layout.master')
 
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
<br>
<!-- /.content-header -->
<div class="container-fluid" style="font-family: 'Arial', sans-serif;">


  <div id="Peta"  style="font-size: 13px;" >
     <div class="card card-body p-3 bg-success" style="width: 120%;" id="waktuqwe">
      <div id="timer" style="font-weight: bold;text-align: center;">00:00:00</div>
    </div>

    <code>Disarankan 7 menit</code>
  </div> 


  <div class="col-6 mx-auto">
    <div class="row">
        <div class="col" style="font-size: 13px;">
          <button class="btn btn-outline-info btn-xs" type="button" data-toggle="modal" data-target="#exampleModal"><span class="fa fa-exclamation-circle"></span> Langkah Pengisian <div class="spinner-grow text-warning spinner-grow-sm" role="status" style="float:right"></div></button>
         
          <a href="{{ Route('zonatesshow', ['id' => Auth::id()]) }}" onclick="return confirm('Saat anda keluar dari halaman ini, jawaban anda akan direset !')"><button style="float: right;" class="btn btn-info btn-xs"><span class="fa fa-arrow-circle-left"></span> <u>kembali</u></button></a>
          <br><br>

          <div class="card p-3 mb-5 bg-white rounded">

          @if($status_disc == 0)
          <font style="text-align: center;">Diharapkan untuk membaca langkah pengisian sebelum pengerjaan, klik untuk melanjutkan.</font><hr>
          <div class="mx-auto">
            <a href="{{ Route('MulaiTesDisc') }}" onclick="return confirm('Anda yakin untuk memulai tes ?')"><button class="btn btn-outline-success btn-xs"><span class="fa fa-play-circle"></span> <u>Mulai Pengerjaan</u></button></a>
          </div>
          @elseif($status_disc == 1)

           <form data-route="{{ route('PostJawabanDisc') }}"  id="FormJawabanDisc" role="form" method="POST" accept-charset="utf-8">
            @csrf 
            <input type="hidden" name="TimerRealTime" value="" id="TimerRealTime">
            <table class="table table-sm" border="0">
              <thead>
              
                <tr>
                  <th>No</th>
                  <th>P</th>
                  <th>K</th>
                  <th>PERNYATAAN</th>
                </tr>
              </thead>
              <tbody>

                  @foreach($DataGrupSoal as $key => $VGrup)
                    <tr>
                        <td rowspan="5" style="vertical-align: middle; font-size: 17px;"><b><u>{{ $key+1 }}</u></b></td>
                    </tr>
                    @php
                      $DataSoal = DB::table('d_soal_disc')->select('id_soal','id_kelompok','soal_disc')->where('id_kelompok','=',$VGrup->id)->get();
                    @endphp
                      @foreach($DataSoal as $key2 => $VDataSoal)
                      <tr>
                        <input type="hidden" name="soal_id[]" value="{{ $VDataSoal->id_soal }}" required="">
                        <td style="vertical-align: middle; padding: 2px;">
                                                    
                          <div class="icheck-danger d-inline">
                            <input type="radio" id="sola{{$VDataSoal->id_soal}}{{$VGrup->id}}" data-id="{{$VDataSoal->id_soal}}" data-kel="{{$VGrup->id}}" class="sola{{$VGrup->id}}" value="P-{{ $VDataSoal->id_soal }}" name="SoalA{{$VGrup->id}}">
                            <label for="sola{{$VDataSoal->id_soal}}{{$VGrup->id}}">
                            </label>
                          </div>

                        </td>
                        <td style="vertical-align: middle;">
                          
                          <div class="icheck-yellow d-inline">
                            <input type="radio" id="solb{{$VDataSoal->id_soal}}{{$VGrup->id}}" value="K-{{ $VDataSoal->id_soal }}" data-id="{{$VDataSoal->id_soal}}" data-kel="{{$VGrup->id}}" class="solb{{$VGrup->id}}" name="SoalB{{$VGrup->id}}">
                            <label for="solb{{$VDataSoal->id_soal}}{{$VGrup->id}}">
                            </label> 
                          </div>
  
                        </td>

                        <td>{{ $VDataSoal->soal_disc }}</td>
                      </tr>

                    @endforeach
                    <tr>
                      <td colspan="10" class="bg-info" style="padding:2px;"></td>
                    </tr>
                  @endforeach
              </tbody>
            </table>

            <button type="submit" style="float: right;" id="LoadPost" class="SubmitFinish btn btn-sm btn-outline-primary"><span class="fa fa-save"></span> Simpan Jawaban</button>

            </form>
            @elseif($status_disc == 2)
            <font style="text-align: center; font-weight: bold;">Anda telah selesai mengerjakan tes DISC ini!</font><hr>
            @else
            @endif
          </div>

        </div>
      </div>
    </div>
  

  
</div>

<!-- Gambar tutor -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Aturan Main</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Gambar</th>
              <th>Aturan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="width: 40rem">
                <img src="{{URL::asset('/tutordisc/1a.jpg')}}" alt="profile Pic" height="200" width="100%">
              </td>
              <td>
                  <ol type="2" style="line-height: 1.5">
                    <li><b>Waktu pengisian 7 Menit </b>, Jika melewati batas waktu, maka silakan  tetap diisi, waktu yang lewat tetap akan dihitung.</li>
                    <li>Tanda pada Gambar <b>No. 1</b> dan <b>No. 2</b> merupakan Pernyataan yang diberikan untuk dijawab.</li>
                    <li>Tanda pada gambar No. 3<br>
                      <b>P :</b> Paling mencerminkan diri anda<br>
                      <b>K :</b> Kurang mencerminkan diri anda</li>
                      <li>Tanda pada gambar <b>No. 4</b> dan <b>No. 5</b> adalah pilihan yang perlu diisi dengan ketentuan bahwa hanya boleh diisi masing-masing satu <b>(1P dan 1K disetiap pernyataan)</b> </li>
                      <li>Setelah terisi semua makanan klik <b> <button class="btn btn-sm btn-outline-primary" disabled=""><span class="fa fa-save"></span> Simpan Jawaban</button></b> dibagian bawah</li>
                      <li>Jika ada kendala atau ada yang mau ditanyakan, dapat WA ke nomor 085766036533 (Leny)</li>
                  </ol>
              </td>
            </tr>
          </tbody>
        </table>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<br>
<br>
<br>
<br>
@php


$datakel = array();
foreach( $DataGrupSoal as $s ) {
  $Cks = DB::table('d_soal_disc')->select('id_soal')->where('id_kelompok','=',$s->id)->get();
  foreach ($Cks as $Vhjk) {
    $datasoal[] = $Vhjk->id_soal;
   
  }
  $datakel[] = array("id_kel" => $s->id, "id_soal" => $datasoal);
  unset($datasoal);
}

function tanggal_indo($tanggal) {
  if ($tanggal) {
    $bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
      $split = explode('-', $tanggal);
      return $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];
  }else{
    return '-';
  }
}

@endphp


@endsection
@section('script') 

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
<script type="text/javascript">


    //SUBMIT JAWABAN
    $(document).on('submit', '#FormJawabanDisc', function(e) {  
      var result = confirm("Yakin untuk mengakhiri tes ini ?");
      if (result) {
        e.preventDefault();
        var route = $('#FormJawabanDisc').data('route');
        var form_data = $(this);
        var id_usertyz = '{{ Auth::id() }}';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Pace.track(function(){
          $.ajax({

            type: 'POST',
            url: route,
            data: form_data.serialize(),

            beforeSend: function(){ Pace.restart() },
            success: function(data){
                switch(data.CekHasil){
                    case '001':
                    toastr.success('Berhasil Memproses Data')
                     window.setTimeout( function(){
                         window.location = '{{route("zonatesshow", ":id_userss")}}'.replace(":id_userss", id_usertyz)
                     }, 3000 );
                    break;
                    case '002':
                    toastr.error('Gagal Memproses Data')
                    break;
                    case '003':
                    toastr.warning('Data Sudah Pernah Diinput, Harap Hubungi Admin')
                    break;
                    case '004':
                    toastr.warning('Terdapat Pilihan Yang Belum Diisi')
                    break;
                    default:
                    break;
                  }
            },
            complete: function() {},
            error: function(xhr) {toastr.error('Terjadi Kesalahan, Harap Periksa Koneksi Internet Anda, Atau Hubungi Admin'); },
          });
        });
      }else{return false;}
    });

    //UBAH DATA KELOMPOK KE JSON
    var kelv = <?php echo json_encode( $datakel ) ?>;

    for (var i = 0; i < kelv.length; i++) {
      for (var sx = 0; sx < kelv[i].id_soal.length; sx++) {
        //DISABLED FORM TANGGAL YANG DIINGINKAN JIKA INPUT MENGGUNKANA TANGGAL INPUT
        $(document).on('click', '#sola'+kelv[i].id_soal[sx]+kelv[i].id_kel+'', function(){
          var id_P = $(this).attr('id');
          var data_id_kel = $(this).attr('data-kel')
          var data_id = $(this).attr('data-id')
          if (document.getElementById(id_P).checked == true) {
            $('input[name=SoalB'+data_id_kel+']').attr("disabled",false);
            $('#solb'+data_id+data_id_kel+'').prop('checked', false);
          }
        });
        //DISABLED FORM TANGGAL YANG DIINGINKAN JIKA INPUT MENGGUNKANA TANGGAL INPUT
        $(document).on('click', '#solb'+kelv[i].id_soal[sx]+kelv[i].id_kel+'', function(){
          var id_K = $(this).attr('id');
          var data_id_kel = $(this).attr('data-kel')
          var data_id = $(this).attr('data-id')
          if (document.getElementById(id_K).checked == true) {
            $('input[name=SoalA'+data_id_kel+']').attr("disabled",false);
            $('#sola'+data_id+data_id_kel+'').prop('checked', false);
          }
        });
      }

    }

    //untuk reset localstorage
    //localStorage.clear();
    var status_disc = <?php echo $status_disc; ?> ;
    var id_usersss = <?php echo Auth::id(); ?> ;


    if (status_disc == 1) {
      window.onload = function() {

          if(typeof localStorage.getItem('min'+id_usersss+'') !== 'undefined' && typeof localStorage.getItem('hour'+id_usersss+'') !== 'undefined' && typeof localStorage.getItem('sec'+id_usersss+'') !== 'undefined' && localStorage.getItem('min'+id_usersss+'')!= null && localStorage.getItem('hour'+id_usersss+'')!= null && localStorage.getItem('sec'+id_usersss+'')!= null ){

              var seconds = localStorage.getItem('sec'+id_usersss+'');
              var minute = localStorage.getItem('min'+id_usersss+'');
              var hour = localStorage.getItem('hour'+id_usersss+'');
              var client_id = localStorage.getItem('client_id'+id_usersss+'');
              //console.log(seconds)
            }
            else {
               //console.log("c2");
               var minute = "0";
               var seconds = "0";
               var hour = "0";
            }

            var time;
            var SecondCount = Number(seconds);
            var MinCount = Number(minute) * 60; 
            var HourCount = Number(hour) * 3600;
            var TodCount = SecondCount+MinCount+HourCount;
            //console.log(TodCount)
            var totalSeconds = TodCount;
            setInterval(function()
            { 
              ++totalSeconds;
               var hour = Math.floor(totalSeconds /3600);
               var minute = Math.floor((totalSeconds - hour*3600)/60);
               var seconds = totalSeconds - (hour*3600 + minute*60);
               if(hour < 10)
                 hour = "0"+hour;
               if(minute < 10)
                 minute = "0"+minute;
               if(seconds < 10)
                 seconds = "0"+seconds;

                localStorage.setItem('min'+id_usersss+'', minute);
                localStorage.setItem('sec'+id_usersss+'', seconds);
                localStorage.setItem('hour'+id_usersss+'', hour);
                localStorage.setItem('client_id'+id_usersss+'', id_usersss);

                time= hour +" : "+minute +" : "+ seconds;
                timeinput= hour+":"+minute+":"+seconds;

                if (totalSeconds > 420) {
                  $( "#waktuqwe" ).toggleClass("bg-danger","bg-success");
                }
            
                document.getElementById("timer").innerHTML = '<span class="fa fa-clock"></span> '+time;
                $("#TimerRealTime").val(timeinput);

            },1000);
      }
    }else if(status_disc == 0){

      localStorage.removeItem('sec'+id_usersss+'');
      localStorage.removeItem('min'+id_usersss+'');
      localStorage.removeItem('hour'+id_usersss+'');

    }else{

    }

</script>

@include('sweet::alert')

<style type="text/css">
  #Peta {
    padding-top : 45px;
    position: fixed;
  }

</style>

@endsection

