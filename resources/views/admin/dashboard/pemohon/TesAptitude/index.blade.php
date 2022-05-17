@extends('admin.layout.master')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<br>
<!-- /.content-header -->
<div class="container-fluid">
  <div id="MyTimeBro">
    <div class="card card-body p-2 bg-success" id="BungkusTime"><div id="timer">00:00:00</div></div>
  </div>

  <div id="Peta"></div>
  <div id="ButtonFinish"></div>
  <div class="col-8 mx-auto">
    <div class="row">
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $vcount }} Soal</h3>
            <p>TIPE VERBAL APTITUDE</p>
          </div>
          <div class="icon">
            <i class="ion ion-chatbubbles"></i>
          </div>
            <a class="small-box-footer Informasi" data_info="verbal" style="cursor: pointer;"><i class="fas fa-exclamation-circle"></i> Info Soal</a>
          </div>

      </div>
      <!-- ./col --> 
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3>{{ $ncount }} Soal</h3>

            <p>TIPE NUMERIC APTITUDE</p>
          </div>
          <div class="icon">
            <i class="fa fa-sort-numeric-up-alt"></i>
          </div>
          <a class="small-box-footer Informasi" data_info="numeric" style="cursor: pointer;"><i class="fas fa-exclamation-circle"></i> Info Soal</a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{ $lcount }} Soal</h3>

            <p>TIPE LOGICAL APTITUDE</p>
          </div>
          <div class="icon">
            <i class="fa fa-user-tag"></i>
          </div>
          <a class="small-box-footer Informasi" data_info="logical" style="cursor: pointer;"><i class="fas fa-exclamation-circle"></i> Info info</a>
        </div>
      </div>
      
    </div>  

    

  </div>
  <div class="col-8 mx-auto">
    <div class="row" id="loadBtnKerja">

      <div class="col-lg-3 col-6">
        <button class="btn btn-sm btn-warning btn-flat InfoPengerjaan " style="width: 100%;"><i class="fas fa-exclamation-circle"></i> Info Soal & Pengerjaan</button>
      </div>
      <div class="col-lg-9 col-6" id="tipe_button">
        
      </div>

      <div class="col-lg-9 col-6" id="SpinerLoad"> 
        
      </div>

      <div class="col-lg-3 col-6" id="BtnVerbal"> 
      
      </div>
      <div class="col-lg-3 col-6" id="BtnNumerical">
       
      </div>
      <div class="col-lg-3 col-6" id="BtnLogical">
       
      </div>
    
  
    </div>
  </div>
  <br>

  <div class="col-8 mx-auto">
    <div class="card card-body shadow p-3 mb-5 bg-white rounded">
      <div id="RenderSoal"><div id="textTampil"></div></div>
    </div>
  </div>

  <br>

</div>
<!-- /.modal -->

<!-------------------------------MODAL PILIHAN KATEGORI APTITUDE---------------------------->
<div id="InfoSoal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs modal-dialog-centered">
    <div class="modal-content">
     
      <form role="form" method="POST" accept-charset="utf-8">
        <div class="overlaymodal"></div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">
            <div class="col-md-12">

              <div id="CekSolo"></div>

            </div>
          </div>
        </div>
       
      </form>
    </div>
  </div>
</div>
<!-------------------------------MODAL INFORMASI PENGERJAAN---------------------------->
<div id="InfoPengerjaan" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs modal-dialog-centered">
    <div class="modal-content">
     
      <form role="form" method="POST" accept-charset="utf-8">
        <div class="overlaymodal"></div>
        <div class="modal-body mx-auto">
          <div class="card-body" style="padding: 5px;">
            <div class="col-md-12">

              <div id="InfoPengerjaanRender"></div>

            </div>
          </div>
        </div>
       
      </form>
    </div>
  </div>
</div> 

<div id="tesg"></div>

@endsection
@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
<script type="text/javascript">


    //SUBMIT FINISH TELAH MENGERJAKAN UJIAN
    $(document).on('click','.SubmitFinish',function(){

      Swal.fire({
          title: 'Apakah Anda Yakin ?',
          text: 'Mengakhiri Tes Ini ?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya, Saya Yakin!',
          cancelButtonText: 'Saya Kurang Yakin  :('
        }).then((result) => {
          if (result.value) {
              var url='{{route("SubmitUjianApti")}}';
              $.ajax({
                  url:url,
                  method:"POST",
                  beforeSend:function(){
                    $('#RenderSoal').html('<center><img src="{{ URL::asset('admin/dist/img/giftes.gif')}}"></center>');
                  },
                  success:function(data){
                    switch(data.ceknul){
                      case 'null': /*First case */
                      toastr.error('Masih Ada Soal Yang Blum Diisi, Harap Cek Kembali');
                      $('#RenderSoal').html(data.Ts);
                      break;
                      case 'gknull': /*First case */
                      toastr.success('Terima Kasih Telah Mengerjakan Aptitude Test');
                      $('#RenderSoal').html(data.Ts);

                      setTimeout(function(){ 
                        alert('Halaman Akan Dialihkan');
                        window.location.href = "{{ Route('zonatesshow',['id_user' => Auth::id()])}}"; 
                      }, 3000);
                      

                      break;
                      case 'tiyu':
                      toastr.error('Terjadi Kesalahan Hubungi Admin #o3h45l3nj4');
                      break;
                      default:
                      break;
                    }
                  }
                });
          }else{
            Swal.fire(
              'Batal!',
              'Batal Mengakhiri Tes',
              'success'
            )
          }
        })

    });

    //UNTUK MENAMPILKAN KONDISI MULAI PENGERJAAN
    $(document).ready(function () {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    var url='{{route("CekButPengerjaan")}}';
        $.ajax({url:url,
          method:"POST",
          beforeSend:function(){},
          success:function(data){
            switch(data.cekIsi){
              case 'adaisi': /*First case */
              $("#SpinerLoad" ).remove();
              $("#tipe_button").remove();
              TampilButton(data);
              $('#textTampil').html(data.textTampil);
              GetWaktuRt(data.waktu);
              break;
              case 'done': /*First case */
              toastr.success('Anda Telah Selesai')
              GetWaktuRt(data.waktu);
              default:
              $('#tipe_button').html(data.tipe_button);
              $('#textTampil').html(data.textTampil);
              break;
            }
          }});
    });

    //UNTUK RENDER SOAL
    $(document).ready(function () {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $(document).on('click', '.KerjaVerbal', function () {
        var a = $(this).attr("data_info");
        var url = '{{route("SoalVerbal")}}';
        $.ajax({
          url: url,
          method: "POST",
          data: {
            jenis: a
          },
          beforeSend: function () {
           $('#RenderSoal').html('<center><img src="{{ URL::asset('admin/dist/img/giftes.gif')}}"></center>');
          },
          success: function (data) {
            ShowMiniMap(a);
            ButtonFinish();
            //lempar renderan soal
            $('#RenderSoal').html(data.verbal);
            //update jawaban perklik
            for(var i=0;i<data.DataIdSoal.length;i++){
              $('input:radio[name=jwb'+data.DataIdSoal[i]+']').change(function() {
                  if (this.value){
                   
                    var url='{{route("UpdateJawaban")}}';
                    $.ajax({url:url,
                      method:"POST",
                      data : {obsion:this.value},
                      beforeSend:function(){
                        $.blockUI({css:{border:'none',padding:'5px',backgroundColor:'#000','-webkit-border-radius':'5px','-moz-border-radius':'5px',opacity:.5,color:'#fff'}});
                      },
                      success:function(data){ 
                        switch(data.cekjwb){
                            case 'gal': /*First case */
                            toastr.error('Terjadi Kesalahan, Harap Hubungi Admin #fsdfs')
                            break;
                            case 'suc': /*First case */
                            ShowMiniMap(a);
                            break;
                            case 'SudSub':
                            toastr.error('Anda Sudah Men-submit Jawaban / Anda Telah Selesai')
                            break
                            default:
                            break;
                          }
                        $.unblockUI();}
                      });

                  }else{
                    toastr.error('Terjadi Kesalahan, Harap Hubungi Admin #r3yge')
                  }
              });
            }
            $.unblockUI();
          }
        });
      });
    }); 

    //INFORMASI SOAL
    $(document).ready(function(){$.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});$(document).on('click','.Informasi',function(){var a=$(this).attr("data_info"); var url='{{route("InfoKategori")}}';$.ajax({url:url,method:"POST",data:{jenis:a},beforeSend:function(){$.blockUI({css:{border:'none',padding:'5px',backgroundColor:'#000','-webkit-border-radius':'5px','-moz-border-radius':'5px',opacity:.5,color:'#fff'}});},success:function(data){$('#CekSolo').html(data);$('#InfoSoal').modal('show');$.unblockUI();}});});});

    //INFORMASI PENGERJAAN
    $(document).ready(function(){$.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
      $(document).on('click','.InfoPengerjaan',function(){
        var url='{{route("InfoPengerjaan")}}';
        $.ajax({url:url,
          method:"POST",
          beforeSend:function(){$.blockUI({css:{border:'none',padding:'5px',backgroundColor:'#000','-webkit-border-radius':'5px','-moz-border-radius':'5px',opacity:.5,color:'#fff'}});},
          success:function(data){
            $('#InfoPengerjaanRender').html(data);
            $('#InfoPengerjaan').modal('show');
            $.unblockUI();}});});});

    //MULAI PENGERJAAN
    $(document).ready(function(){$.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
      $(document).on('click','.MulaiKerja',function(){

          Swal.fire({
                title: 'Apakah Anda Yakin ?',
                text: 'Setelah anda klik "Ya,Saya Yakin" maka waktu akan terhitung mulai',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, Saya Yakin!',
                cancelButtonText: 'Saya Kurang Yakin  :('
              }).then((result) => {
                if (result.value) {
                    var url='{{route("MulaiPengerjaan")}}';
                    $.ajax({url:url,
                      method:"POST",
                      beforeSend:function(){

                        $( "#tipe_button" ).remove();
                        $('#SpinerLoad').html('<center><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></center>');
                      },
                      success:function(data){

                         switch(data.cek){
                            case 'gagal': /*First case */
                            toastr.error('Terjadi Kesalahan, Harap Hubungi Admin #fdht34')
                            break;
                            case 'tagalog': /*First case */
                            toastr.error('Terjadi Kesalahan, Harap Hubungi Admin #dfbdf45')
                            break;
                            case 'done': /*First case */
                            toastr.success('Anda Telah Selesai')
                            break;
                            case 'berhasil': /*First case */

                            toastr.success('Waktu Berjalan, Selamat Mengerjakan')
                            $("#SpinerLoad" ).remove();
                            TampilButton(data);
                            $('#textTampil').html(data.textTampil);
                            $.unblockUI();
                            GetWaktuRt(data.GetWaktu);
                            
                            break;
                            default:
                            break;
                          }
                        }
                      });
                }else{
                  Swal.fire(
                    'Batal!',
                    'Pembatalan dalam pengerjaan soal',
                    'success'
                  )
                }
              })


      });});

      function TampilButton(data){
          $('#BtnVerbal').html(data.verbal);
          $('#BtnNumerical').html(data.numerical);
          $('#BtnLogical').html(data.logical);
      }

      function GetWaktuRt (ValueAwal){
        
          var timerVar = setInterval(countTimer, 1000);
          var totalSeconds = ValueAwal;
          function countTimer() {
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
            
              if (totalSeconds > 7200) {
                document.getElementById("timer").innerHTML = '<span class="fa fa-clock"></span> '+ hour + ":" + minute + ":" + seconds;
                document.getElementById("BungkusTime").classList.toggle('bg-danger');
              }else{
                document.getElementById("timer").innerHTML = '<span class="fa fa-clock"></span> '+ hour + ":" + minute + ":" + seconds;
              }
              
              return totalSeconds;
          }

          function load_unseen_notification(timeBro){
                var url='{{route("UpdateTimer")}}';
                const data = { waktuNya: timeBro };

                fetch(url, {
                  method: 'POST', // or 'PUT'
                  headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token": $('input[name="_token"]').val()
                  },
                    body: JSON.stringify(data),
                  })
                 }
                  
                  setInterval(function(){ 
                    load_unseen_notification(countTimer());
                  }, 10000);    
      }

setInterval(function(){ location.reload()}, 900000);

    //MENAMPILKAN MINI MAP 
    function ShowMiniMap (Value){
      $(document).ready(function () {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      var url='{{route("PetaMiniMap")}}';
          $.ajax({url:url,
            method:"POST",
            data: {
              jenis: Value,
            },
            beforeSend:function(){},
            success:function(data){
                $('#Peta').html(data.Peta);
            }});
      });
    }

    //MENAMPILKAN BUTTON FINISH
    function ButtonFinish(){
      $(document).ready(function () {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      var url='{{route("BtnFnshApt")}}';
        $.ajax({url:url,
          method:"POST",
          beforeSend:function(){},
          success:function(data){
              $('#ButtonFinish').html(data.BtnFnsh);
          }});
      });
    }

</script>

<style type="text/css">
  label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 500;
}
#MyTimeBro {
  padding-top : 2px;
  position: fixed;
  
  left: -1px
}

#Peta {
  padding-top : 50px;
  position: fixed;
  
  left: -1px
}
#ButtonFinish {
  padding-top : 23rem;
  position: fixed;
  
  left: -1px
}
</style>

@include('sweet::alert')
@endsection

