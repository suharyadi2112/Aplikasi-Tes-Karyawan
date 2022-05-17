<?php

namespace App\Http\Controllers\Pemohon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;
use App\User as User;
use App\level as Level;  
use App\DataDiri as DataDiri;
use App\Kesehatan as Kesehatan;
use App\DataPendidikan as DataPendidikan;
use App\DataPerguruanTinggi as DataPerguruanTinggi;
use App\DataPendNonFormal as DataPendNonFormal;
use App\DataPengalamanKerjaPendidikan as DataPengalamanKerjaPendidikan;
use App\DataPengalamanKerjaNonPendidikan as DataPengalamanKerjaNonPendidikan;
use App\DataPengalamanOrganisasi as DataPengalamanOrganisasi;
use App\DataPencapaian as DataPencapaian;
use App\DataPekerjaanLamaran as DataPekerjaanLamaran;
use App\DataBerbahasaAsing as DataBerbahasaAsing;
use App\DataKeahlianLainnya as DataKeahlianLainnya;
use App\berkas as berkas;
use App\DataTambahanKategori as DataTambahanKategori;
use App\BerkasTes as BerkasTes;
use App\TesAptiDisc as TesAptiDisc;

use DataTables;
use DB;
use Validator;
use Response;
use Redirect; 
use Alert;
use Hash;
use Auth;
use File;
use URL;
use DateTime;


class PemohonController extends Controller
{
    

    //2.0
    //PROSES PENYAJIAN SOAL
    public function soalverbal(Request $request){

    if ($request->jenis) {

        $cekVerbal = DB::table('s_bank_soal')
                    ->join('s_kategorisoalaptitude','s_bank_soal.kategori_soal','=','s_kategorisoalaptitude.id_kategori')
                    ->leftJoin('s_penjelasan','s_penjelasan.id','=','s_kategorisoalaptitude.sub_penjelasan')
                    ->select('s_bank_soal.*','s_bank_soal.id_soal','s_kategorisoalaptitude.deskripsi_kategori','s_kategorisoalaptitude.nama_kategori','s_kategorisoalaptitude.sub_penjelasan','s_penjelasan.penjelasan','s_penjelasan.file_gambar')
                    ->where('s_kategorisoalaptitude.nama_kategori','=',$request->jenis)
                    ->get();


        $verbal = '';//PENGEMBALIAN DALAM BENTUK TABEL
        $CekKategori = '';//CEK KONDISI KATEGORI/PEMBATAS
        $CekPenje = '';//CEK KONDISI PENJELASAN
        $CekTipe = '';//CEK KONDISI TIPE
        
        if ($request->jenis == 'verbal') { $no = '1';}else if($request->jenis == 'numerical'){$no = '31';}else if($request->jenis == 'logical'){$no = '51';}else{return 'Terjadi Kesalahan #o3h465n'; }//NOMOR INCREMENT

        foreach ($cekVerbal as $keyV => $vVerbal) {

            $CekJwbFix = DB::table('s_jawaban')->select('jawaban')->where([['id_user','=',Auth::id()],['id_soal','=',$vVerbal->id_soal]])->first();

            if ($CekJwbFix) {
                $yt = $CekJwbFix->jawaban;
            }else{
                $yt = null;
            }

            $PushIdSoal[] = $vVerbal->id_soal;//UNTUK LOOPING DI INDEX EVENT CHECKBOX 
            //MENGHITUNG KATA TERBANYAK DARI OBJEKTIF
            $cekKata = [strlen($vVerbal->a),strlen($vVerbal->b),strlen($vVerbal->c),strlen($vVerbal->d),strlen($vVerbal->e)];
            $cekTbnyk = max($cekKata);

            if ($CekKategori != $vVerbal->kategori_soal) {
                if ($keyV != 0) {
                    $verbal .= '<br>';   
                }
            }
            //CEK JIKA TOTAL KOSONG, JIKA ADA ISI BERARTI SUDAH SUBMIT JAWABAN / SELESAI
            $CekTot = DB::table('s_total')->where('s_total.id_user','=', Auth::id())->count();

                $verbal .= '<fieldset '.(($CekTot > 0)?'disabled style="cursor: not-allowed;"':'').'>
                            <table border="0" class="col-12">
                              <thead>

                                '.(($CekTipe != $vVerbal->nama_kategori)?'
                                    <tr>
                                      <th colspan="10" style="text-align: center; "><h3><b>
                                      '.strtoupper($vVerbal->nama_kategori).' APTITUDE
                                      </b></h3></th>
                                    </tr>
                                ':"").'';

                $verbal .=     ''.(($CekPenje != $vVerbal->sub_penjelasan)?'
                                <tr>
                                  <th colspan="10" style="font-size: 16px;"><b><p>
                                  '.(
                                        ($vVerbal->penjelasan && is_null($vVerbal->file_gambar))?' '.$vVerbal->penjelasan.'':''
                                        .(($vVerbal->file_gambar && is_null($vVerbal->penjelasan))?'<img src="'.URL::asset('admin/dist/img/soal_aptitude/'.$vVerbal->file_gambar.'').'">':'

                                        '.(($vVerbal->penjelasan && $vVerbal->file_gambar)?''.$vVerbal->penjelasan.' | <img src="'.URL::asset('admin/dist/img/soal_aptitude/'.$vVerbal->file_gambar.'').'" >':'-').'').''
                                        ).'
                                  </p></b></th>
                                </tr>
                                ':"").'';

                $verbal .=      ''.(($CekKategori != $vVerbal->kategori_soal)?'
                                    '.(($vVerbal->deskripsi_kategori)?'
                                        <tr>
                                          <th colspan="10" style="font-size: 15px; text-align: justify;"><b>'.$vVerbal->deskripsi_kategori.'<p></p></b></th>
                                        </tr>
                                    ':"").'
                                ':"").'
                                <tr>
                                  <td colspan="10" style="font-size: 14px; text-align: justify;">
                                  <font size="5">'.$no.'.</font> 
                                  '.(
                                        ($vVerbal->soal && is_null($vVerbal->soal_gambar))?' '.$vVerbal->soal.'':''
                                        .(($vVerbal->soal_gambar && is_null($vVerbal->soal))?'<img src="'.URL::asset('admin/dist/img/soal_aptitude/'.$vVerbal->soal_gambar.'').'" alt="profile Pic" >':'

                                        '.(($vVerbal->soal_gambar && $vVerbal->soal)?''.$vVerbal->soal.' | <img src="'.URL::asset('admin/dist/img/soal_aptitude/'.$vVerbal->soal_gambar.'').'" alt="profile Pic" >':'-').'').''
                                    ).'
                                  
                                  </td>
                                </tr>
                                
                              </thead>
                            <tbody>';
                //OBJEKTIF
                $verbal .=  '<tr style="font-size: 14px;">';
                $verbal .=      '<td style="width:20%;padding-top: 5px;  text-align: justify;"> 
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="jwba'.$vVerbal->id_soal.'" name="jwb'.$vVerbal->id_soal.'" value="'.$vVerbal->id_soal.'|a" '.(($yt == 'a')?'checked':"").'>
                                        <label for="jwba'.$vVerbal->id_soal.'">
                                        '.(
                                        ($vVerbal->a && is_null($vVerbal->a_gambar))?' '.$vVerbal->a.'':''
                                        .(($vVerbal->a_gambar && is_null($vVerbal->a))?'<img src="'.URL::asset('admin/dist/img/soal_aptitude/'.$vVerbal->a_gambar.'').'">':'

                                        '.(($vVerbal->a_gambar && $vVerbal->a)?''.$vVerbal->a.' | <img src="'.URL::asset('admin/dist/img/soal_aptitude/'.$vVerbal->a_gambar.'').'" >':'-').'').''
                                        ).'
                                        </label>
                                    </div>
                                </td>'; 


                $verbal .=  ''.$this->CekTr($cekTbnyk,'tutup').$this->CekTr($cekTbnyk,'buka').'';
                
                $verbal .=      '<td style="width:20%; padding-top: 5px;"> 
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="jwbb'.$vVerbal->id_soal.'" name="jwb'.$vVerbal->id_soal.'" value="'.$vVerbal->id_soal.'|b" '.(($yt == 'b')?'checked':"").'>
                                        <label for="jwbb'.$vVerbal->id_soal.'">
                                        '.(
                                        ($vVerbal->b && is_null($vVerbal->b_gambar))?' '.$vVerbal->b.'':''
                                        .(($vVerbal->b_gambar && is_null($vVerbal->b))?'<img src="'.URL::asset('admin/dist/img/soal_aptitude/'.$vVerbal->b_gambar.'').'">':'

                                        '.(($vVerbal->b_gambar && $vVerbal->b)?''.$vVerbal->b.' | <img src="'.URL::asset('admin/dist/img/soal_aptitude/'.$vVerbal->b_gambar.'').'" >':'-').'').''
                                        ).'
                                        </label>
                                    </div>
                                 </td> ';

                $verbal .=  ''.$this->CekTr($cekTbnyk,'tutup').$this->CekTr($cekTbnyk,'buka').'';

                $verbal .=      '<td style="width:20%; padding-top: 5px;"> 
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="jwbc'.$vVerbal->id_soal.'" name="jwb'.$vVerbal->id_soal.'" value="'.$vVerbal->id_soal.'|c" '.(($yt == 'c')?'checked':"").'>
                                        <label for="jwbc'.$vVerbal->id_soal.'">
                                        '.(
                                        ($vVerbal->c && is_null($vVerbal->c_gambar))?' '.$vVerbal->c.'':''
                                        .(($vVerbal->c_gambar && is_null($vVerbal->c))?'<img src="'.URL::asset('admin/dist/img/soal_aptitude/'.$vVerbal->c_gambar.'').'">':'

                                        '.(($vVerbal->c_gambar && $vVerbal->c)?''.$vVerbal->c.' | <img src="'.URL::asset('admin/dist/img/soal_aptitude/'.$vVerbal->c_gambar.'').'" >':'-').'').''
                                        ).'
                                        </label>
                                    </div>
                                </td>';

                $verbal .=  ''.$this->CekTr($cekTbnyk,'tutup').$this->CekTr($cekTbnyk,'buka').'';

                $verbal .=      '<td style="width:20%; padding-top: 5px;"> 
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="jwbd'.$vVerbal->id_soal.'" name="jwb'.$vVerbal->id_soal.'" value="'.$vVerbal->id_soal.'|d" '.(($yt == 'd')?'checked':"").'>
                                        <label for="jwbd'.$vVerbal->id_soal.'">
                                        '.(
                                        ($vVerbal->d && is_null($vVerbal->d_gambar))?' '.$vVerbal->d.'':''
                                        .(($vVerbal->d_gambar && is_null($vVerbal->d))?'<img src="'.URL::asset('admin/dist/img/soal_aptitude/'.$vVerbal->d_gambar.'').'">':'

                                        '.(($vVerbal->c_gambar && $vVerbal->c)?''.$vVerbal->c.' | <img src="'.URL::asset('admin/dist/img/soal_aptitude/'.$vVerbal->c_gambar.'').'" >':'-').'').''
                                        ).'
                                        </label>
                                    </div>
                                </td>'; 

                $verbal .=  ''.$this->CekTr($cekTbnyk,'tutup').$this->CekTr($cekTbnyk,'buka').'';

                $verbal .=      '<td style="width:20%; padding-top: 5px;"> 
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="jwbe'.$vVerbal->id_soal.'" name="jwb'.$vVerbal->id_soal.'" value="'.$vVerbal->id_soal.'|e" '.(($yt == 'e')?'checked':"").'>
                                        <label for="jwbe'.$vVerbal->id_soal.'">
                                        '.(
                                        ($vVerbal->e && is_null($vVerbal->e_gambar))?' '.$vVerbal->e.'':''
                                        .(($vVerbal->e_gambar && is_null($vVerbal->e))?'<img src="'.URL::asset('admin/dist/img/soal_aptitude/'.$vVerbal->e_gambar.'').'">':'

                                        '.(($vVerbal->e_gambar && $vVerbal->e)?''.$vVerbal->e.' | <img src="'.URL::asset('admin/dist/img/soal_aptitude/'.$vVerbal->e_gambar.'').'" >':'-').'').''
                                        ).'
                                        </label>
                                    </div>
                                </td>
                               
                                </tr>
                            </tbody>
                        </table>
                        </fieldset><hr style="margin-top:7px; margin-bottom:7px;">';
               

        $CekTipe = $vVerbal->nama_kategori;
        $CekKategori = $vVerbal->kategori_soal;
        $CekPenje = $vVerbal->sub_penjelasan;
        $no++;
        }

        return Response::json(array(
                            'verbal' => $verbal,
                            'tipe' => $request->jenis,
                            'DataIdSoal' => $PushIdSoal
                        ), 200);

    }else{
        return 'Terjadi Kesalahan #ln345';
    }

    }


    //CEK BUTTON PENGERJAAN
    public function CekButPengerjaan(Request $request){

        $cekJum = DB::table('s_jawaban')->where('id_user','=',Auth::id())->count();//jumlah total jawaban 1 user
        $JumSol = DB::table('s_bank_soal')->count();//jumlah soal

        if ($cekJum == $JumSol) {
            $CekTot = DB::table('s_total')->where('s_total.id_user','=', Auth::id())->count();
                if ($CekTot > 0) {
                    return Response::json(array('cekIsi' => 'done' ,'waktu' => $this->GetWaktuBy(),
                    'textTampil' => '<font size="5"><center><span class="fa fa-check-circle"></span> Anda Telah Selesai !</center></font>.'), 200);
                }else{
                $array = $this->button3Tipe();
                $x = $array['BtnVerbal'];
                $y = $array['BtnNumerical'];
                $z = $array['BtnLogical'];
            }

            return Response::json(array(
                                    'verbal' =>$x ,
                                    'numerical' =>$y,
                                    'logical' =>$z ,
                                    'cekIsi' => 'adaisi',
                                    'textTampil' => '<center>Silahkan Pilih Tipe Soal.</center>',
                                    //'GetWaktu' => $this->GetWaktuBy() + $this->selisih(),
                                    'waktu' => $this->GetWaktuBy(),
                                ), 200);

        }else{

            return Response::json(array(
                                    'tipe_button' =>'<button class="btn btn-sm btn-outline-success btn-flat MulaiKerja" style="width: 100%;"><i class="fas fa-user-clock"></i> Mulai Pengerjaan ?</button>' ,
                                    
                                    'textTampil' => '<center>Klik <b>"Mulai Pengerjaan ?"</b> Untuk Memulai Pengerjaan Soal! </center>'
                                ), 200);
        }

    }

    //WAKTU SELISIH 
    protected function selisih(){

        $timeCek = DB::table('s_time_apti')->select('waktu_mulai')->where([['id_user','=',Auth::id()],['status','=','1']])->first();
        if ($timeCek) {
            $string = $timeCek->waktu_mulai;
            $time   = explode(":", $string);

            $hour   = $time[0]  * 60 * 60;
            $minute = $time[1]  * 60;
            $sec    = $time[2];

            $oy = $hour + $minute + $sec;

        }else{
            $oy = 0;
        }
        $start_date = new DateTime(date('H:i:s'));
        $since_start = $start_date->diff(new DateTime(gmdate("H:i:s", $oy)));
        $aS = $since_start->h * 60 * 60;
        $bS = $since_start->i * 60;
        $cS = $since_start->s;

        $result = $aS + $bS + $cS;

        $cek_tambah = DB::table('s_time_apti')->select('time')->where([['id_user','=',Auth::id()],['status','=','1']])->first();

        if ($cek_tambah) {
            $oy2 = $cek_tambah->time;
        }else{
            $oy2 = 0;
        }
        $cekHasil = $oy2 + $result; 

        return $cekHasil;

    }
    //GETWAKTU UNTUK MEMULAI TES
    protected function GetWaktuBy(){
        $timeCek = DB::table('s_time_apti')->select('time')->where([['id_user','=',Auth::id()],['status','=','1']])->first();
        if ($timeCek) {
            $oy = $timeCek->time;
        }else{
            $oy = 0;
        }
        return $oy;
    }
    //MULAI PENGERJAAN
    //SAAT MULAI TEMPAT JAWABAN DIBUAT TERLEBIH DAHULU DI DALAM DB
    public function MulaiPengerjaan(Request $request){

        $CekIdSoal = DB::table('s_bank_soal')->select('id_soal')->orderBy('id_soal','ASC')->get();
        $cekJum = DB::table('s_jawaban')->where('id_user','=',Auth::id())->count();//jumlah total jawaban 1 user
        $JumSol = DB::table('s_bank_soal')->count();//jumlah soal

        if ($cekJum > $JumSol) {
            return Response::json(array('cek' => 'tagalog'), 200);//cek jika total jawaban melebihi total soal
        }else{

            foreach($CekIdSoal as $keyS => $VlId){
               $Value[] = ['id_user' => Auth::id(), 'id_soal' => $VlId->id_soal];
            }
            $InsIdSol = DB::table('s_jawaban')->insert($Value);

            if ($InsIdSol) {

                //CEK KETERSEDIAAN TOTAL
                $CekTot = DB::table('s_total')->where('s_total.id_user','=', Auth::id())->count();
                if ($CekTot > 0) {
                    return Response::json(array('cek' => 'done' ,'GetWaktu' => $this->GetWaktuBy()), 200);
                }else{
                    $array = $this->button3Tipe();
                    $x = $array['BtnVerbal'];
                    $y = $array['BtnNumerical'];
                    $z = $array['BtnLogical'];
                }

                //INSERT TIME UNTUK MEMULAI PENGERJAAN, WAKTU TERHITUNG DARI SAAT INI
                $kedepan = date("H:i:s", strtotime('+2 hours')); 
                DB::table('s_time_apti')->insert(['id_user' => Auth::id(), 'time' => 1,'waktu_mulai' => date('H:i:s'),'tanggal_mulai' => date('Y-m-d'),'harus_selesai' => $kedepan, 'status' => 1]);
                //GET WAKTU AWAL YANG TELAH DI SIMPAN
                

                return Response::json(array(
                                    'verbal' =>$x ,
                                    'numerical' =>$y,
                                    'logical' =>$z ,
                                    'textTampil' => '<center>Silahkan Pilih Tipe Soal.</center>',
                                    'cek' => 'berhasil',
                                    'GetWaktu' => $this->GetWaktuBy()
                                ), 200);

            }else{
                return Response::json(array('cek' => 'gagal'), 200);
            }
        }

    }

    //UPDATE WAKTU PENGERJAAN BISA DIBILANG TIMER
    public function UpdateTimer(Request $request){
        $UpdateWaktu = DB::table('s_time_apti')->where('id_user','=',Auth::id())->update(['time' => $request->waktuNya]);
    }

    

    //MENMPILKAN 3 BUTTON TIPE
    protected function button3Tipe(){
        return array(
                'BtnVerbal' => '<button class="btn btn-sm btn-outline-primary btn-flat KerjaVerbal" data_info="verbal" style="width: 100%;"><span class="fa fa-play"></span> Kerjakan Soal Verbal</button>',

                'BtnNumerical' => '<button class="btn btn-sm btn-outline-primary btn-flat KerjaVerbal" data_info="numerical" style="width: 100%;"><span class="fa fa-play"></span> Kerjakan Soal Numeric</button>',

                'BtnLogical' => '<button class="btn btn-sm btn-outline-primary btn-flat KerjaVerbal" data_info="logical" style="width: 100%;"><span class="fa fa-play"></span> Kerjakan Soal Logical</button>');
    }

    public function UpdateJawaban(Request $request){

        //CEK JIKA TOTAL KOSONG, JIKA ADA ISI BERARTI SUDAH SUBMIT JAWABAN / SELESAI
        $CekTot = DB::table('s_total')->where('s_total.id_user','=', Auth::id())->count();

        if ($CekTot > 0) {
            return Response::json(array('cekjwb' => 'SudSub'), 200);
        }else{

            $cekEx = explode("|", $request->obsion);

            $IdSoal = $cekEx[0];
            $Jwb = $cekEx[1];
            $CekUpdate = DB::table('s_jawaban')->where([['id_user','=',Auth::id()],['id_soal','=',$IdSoal]])->update(['jawaban' => $Jwb]);

            if ($CekUpdate) {
                return Response::json(array('cekjwb' => 'suc'), 200);
            }else{
                return Response::json(array('cekjwb' => 'gal'), 200);
            }
        }
    }


    //INDEX HITUNG SOAL APTITUDE
    public function AptitudeTes(){

        //CEK JIKA TOTAL KOSONG, JIKA ADA ISI BERARTI SUDAH SUBMIT JAWABAN / SELESAI
        $CekTot = DB::table('s_total')->where('s_total.id_user','=', Auth::id())->count();

        if ($CekTot > 0) {
            return redirect()->route('zonatesshow',['id_user' => Auth::id()])->with('errorty', 'Anda Sudah Mengerjakan Ujian Aptitude');
        }else{

            return view('admin.dashboard.pemohon.TesAptitude.index',[
                'vcount' => $this->KategoriSoal('verbal'),
                'ncount' => $this->KategoriSoal('numerical'),
                'lcount' => $this->KategoriSoal('logical')
            ]);
        }

    }

  
    //MEMBERIKAN INFORMASI SETIAP KATEGORI DARI SOAL
    public function InfoKategori(Request $request){

        if ($request->jenis == 'verbal') {
            $button = '<h4><u>Test Verbal Aptitude</u></h4>
            <p>tes yang digunakan pada psikotes atau tes psikologi yang tujuannya untuk mengukur kecakapan dan kemampuan bahasa seseorang, baik itu lisan maupun tulisan, serta tes verbal ini untuk mengukur sejauh mana seseorang bisa memahami mengenai perihal yang dibicarakan.</p>';
        }else if($request->jenis == 'numeric'){
            $button = '<h4><u>Test Numerical Aptitude</u></h4>
                <p>tes yang ditujukan untuk mengetahui kemampuan seseorang dalam berhitung dengan benar dalam waktu yang terbatas. Ruang lingkup tes numerik meliputi perhitungan, estimasi, interpretasi data, dan logika matematika, serta barisan dan deret.</p>';
        }elseif($request->jenis == 'logical'){
            $button = '<h4><u>Test Logical/Penalaran Aptitude</u></h4>
            <p>Dalam tes ini, Anda harus menjawab pertanyaan-pertanyaan yang memerlukan logika yang ditentukan berdasarkan urutan diagram. Untuk setiap urutan pertanyaan, Anda harus menentukan diagram mana yang menggantikan urutan yang hilang yang disajikan dalam pertanyaan, yaitu penyelesaian pola.</p>';
        }else{

        }
        return $button;

    }

    //INFORMASI PENGERJAAN
    public function InfoPengerjaan(Request $request){

        $button = '<strong>Tes&nbsp;Potensial Akademik (<em>Aptitude Test</em></strong><strong><em>),</em></strong></p>
                    <p>Dimana Keseluruhan soal berisi <strong>75 soal</strong>, dibagi menjadi <strong>3 tipe.</strong></p>
                    <p>Tipe Verbal : <strong>30 Soal.</strong></p>
                    <p>Tipe Numerical : <strong>20 Soal.</strong></p>
                    <p>Tipe Logical : <strong>25 Soal.</strong></p>
                    <p>soal dan pengerjaan dengan waktu ideal<strong> 120 menit&nbsp;</strong>';

        return $button;

    }



    //PETA MINI MAP SAAT PENGERJAAN SOAL TES APTITUDE
    public function PetaMiniMap(Request $request){

        if ($request->jenis == 'verbal') { $NOin = '1';}else if($request->jenis == 'numerical'){$NOin = '31';}else if($request->jenis == 'logical'){$NOin = '51';}else{return 'Terjadi Kesalahan #o3h465n'; }//NOMOR INCREMENT

        $CekJawaban = DB::table('s_jawaban')
                    ->join('s_bank_soal','s_bank_soal.id_soal','=','s_jawaban.id_soal')
                    ->join('s_kategorisoalaptitude','s_kategorisoalaptitude.id_kategori','=','s_bank_soal.kategori_soal')
                    ->select('s_jawaban.jawaban')
                    ->where([['s_kategorisoalaptitude.nama_kategori','=',$request->jenis],['s_jawaban.id_user','=',Auth::id()]])
                    ->get();
        $Peta = '';
        $Peta = ' &nbsp;Mini Map | '.strtoupper($request->jenis).'
                <table class="table table-bordered table-sm" style="border-collapse: collapse; height: 22px;" border="1">
                <tbody>';
        $No = 1;
        foreach ($CekJawaban as $key => $CekJaw) {
            $Peta .= '<td style="width: 30px; vertical-align: middle; text-align: center;"  '.(($CekJaw->jawaban)?'class="bg-success"':'class="bg-warning"').';>'.$NOin.'</td>';
           
        if ($No%5 == 0) {
            $Peta .= '<tr></tr>';
        }

        $No++;
        $NOin++;
        }

        $Peta .= '</tbody>
                </table>
                <span class="badge badge-pill badge-success"> </span> <font size="2">Sudah Terisi</font><br>
                <span class="badge badge-pill badge-warning"> </span> <font size="2">Belum Terisi</font>
                ';
        return Response::json(array('Peta' => $Peta), 200);
    }

    //BUTTON FINISH
    public function BtnFnshApt(Request $request){

        //CEK JIKA TOTAL KOSONG, JIKA ADA ISI BERARTI SUDAH SUBMIT JAWABAN / SELESAI
        $CekTot = DB::table('s_total')->where('s_total.id_user','=', Auth::id())->count();
    
        $Button = '<button class="btn btn-flat '.(($CekTot > 0)?'btn-success':'btn-outline-info').' p-1 SubmitFinish" style="width: 9.4rem;" '.(($CekTot > 0)?'disabled':'').'><span class="fa '.(($CekTot > 0)?'fa-check-circle':'fa-exclamation-circle').'"></span> Telah Selesai !</button>';
 
        return Response::json(array('BtnFnsh' => $Button), 200);

    }


    //SUBMIT UJIAN APTITUDE
    public function SubmitUjianApti(Request $request){

        $Status = '1';
        $textSelesai = '<font size="5"><center><span class="fa fa-check-circle"></span> Anda Telah Selesai !</center></font>';
        $textBelum = '<font size="5"><center><span class="fa fa-exclamation-circle"></span> Soal Belum Diisi Sepenuhnya, Harap Cek Kembali !</center></font>';

        $Jwb = DB::table('s_jawaban')
                ->join('s_bank_soal','s_bank_soal.id_soal','=','s_jawaban.id_soal')
                ->select('s_jawaban.jawaban')
                ->where('s_jawaban.id_user','=', Auth::id())
                ->get();
        
        foreach ($Jwb as $jyt => $VJwb) {
           $fgh[] = $VJwb->jawaban;
        }
        if (in_array(null, $fgh)) {
            return Response::json(array('ceknul' => 'null','Ts' => $textBelum), 200);
        }else{
            //CEK KETERSEDIAAN TOTAL
            $CekTot = DB::table('s_total')->where('s_total.id_user','=', Auth::id())->count();

            if ($CekTot > 0 == false) {
             
                //HITUNG JUMLAH BENAR
                $VSkor = $this->HitBenApti('verbal');
                $Nskor = $this->HitBenApti('numerical');
                $Lskor = $this->HitBenApti('logical');

                //SKORING
                $SkoringV = $this->Skoring('verbal',$VSkor);
                $SkoringN = $this->Skoring('numerical',$Nskor);
                $SkoringL = $this->Skoring('logical',$Lskor);

                //RATA2
                $TotalTambah = array_sum(array($SkoringV,$SkoringN,$SkoringL));
                $HasAkh = $TotalTambah/3;

                DB::table('s_total')->insert(
                    [
                        'id_user' => Auth::id(),
                        'skor_verbal' => $SkoringV,
                        'skor_numerik' => $SkoringN,
                        'skor_logical' => $SkoringL,
                        'jumber_verbal' => $VSkor,
                        'jumber_numerik' => $Nskor,
                        'jumber_logical' => $Lskor,
                        'rata_rata' => round($HasAkh,2),
                        'created_at' => \Carbon\Carbon::now()
                    ]
                );


                DB::table('s_time_apti')->where('id_user', Auth::id())->update(['waktu_selesai' => date('H:i:s'), 'tanggal_selesai' => date('Y-m-d')]);

                return Response::json(array('SubmitUjian' => $Status,'Ts' => $textSelesai ,'ceknul' => 'gknull'), 200);
            }else{
                return Response::json(array('ceknul' => 'tiyu', 'h' => $CekTot), 200);
            }

        }

    }

    protected function Skoring($Tipe,$JumlahBenar){

        if ($Tipe == 'verbal') {
            $a = $JumlahBenar * 10;
            $tyu = $a / 3;
        }elseif ($Tipe == 'numerical') {
            $tyu = $JumlahBenar * 5;
        }elseif ($Tipe == 'logical') {
            $tyu = $JumlahBenar * 4;
        }else{
            return false;
        }

        return round($tyu,2);

    }

    protected function HitBenApti($jenis){

        $Jwb = DB::table('s_jawaban')
                ->join('s_bank_soal','s_bank_soal.id_soal','=','s_jawaban.id_soal')
                ->join('s_kategorisoalaptitude','s_kategorisoalaptitude.id_kategori','=','s_bank_soal.kategori_soal')
                ->select('s_jawaban.jawaban','s_bank_soal.jawaban_benar')
                ->where([
                            ['s_jawaban.id_user','=', Auth::id()],
                            ['s_kategorisoalaptitude.nama_kategori','=',$jenis]
                        ])
                ->get();

        $benar = 0;
        $salah = 0;
        foreach ($Jwb as $hj => $VJwb) {
            if ($VJwb->jawaban == $VJwb->jawaban_benar) {
                $benar++;
            }else{
                $salah++;
            }
        }

        return $benar;
        
    }



    public function index(){
        
        $countdatadiri = DataDiri::where('id_user',Auth::id())->count();
        $countkesehatan = Kesehatan::where('id_user',Auth::id())->count();
        $countpendidikan = DataPendidikan::where('id_user',Auth::id())->count();
        $countptinggi = DataPerguruanTinggi::where('id_user',Auth::id())->count();



        return view('admin.dashboard.pemohon.indexpemohon',['countdatadiri'=> $countdatadiri],['countkesehatan'=> $countkesehatan, 'id_user' => Auth::id()])
        ->with('countpendidikan', $countpendidikan)
        ->with('countptinggi', $countptinggi);


    	
    }

    public function listdatadiri(Request $request){
        $data2 = User::latest()
        ->where('id', '=', Auth::id())
        ->get();
        //countdatadiri
        
        return DataTables::of($data2)
        ->addIndexColumn()
        ->addColumn('action', function($data){

             $cekstatusfns = DB::table('datadiri')->select('status_finish')
                        ->where('id_user', '=', Auth::id())
                        ->first();

            //$tesDatdir = DB::table('datadiri')->select('status_finish')->where('id_user', '=', Auth::id())->first();
              if (empty($cekstatusfns)) {
            
              }else{
                $cekstatusfns = $cekstatusfns->status_finish;
              }

                if ($cekstatusfns == 1) {
                    $button = '<u>Anda telah selesai</u> <br><font> jika ada kendala <br> Silahkan hubungi nomor yang tertera <br> dipetunjuk pengisian';

                    return $button;

                }else{

                $finddatadiri = User::where('id', '=', Auth::id())->first();
                $countdatadiri = DataDiri::where('id_user',Auth::id())->count();

                if ($countdatadiri > 0) {
                    $button =   '

                        <span class="badge badge-success" style="width:15rem; text-align: left;"><i class="fa fa-user-tag"></i> Data Diri <i class="fa fa-check" style="float:right"></i></span>

                        <a href="pemohon/'.$finddatadiri->id.'/edit" data-id="" title="Edit data diri"><span class="badge badge-info"><i class="fa fa-edit"></i></span></a>

                        <hr style="margin-bottom: 2px; margin-top: 2px">

                        ';
                }else{
                    $button = '<a href="tambahpemohon" class="btn btn btn-info btn-xs btn-flat" data-id="" style="width:15rem; text-align: left;"><i class="fa fa-user-tag"></i> Data Diri <div class="spinner-grow text-warning spinner-grow-sm" role="status" style="float:right">
                          <span class="sr-only">Loading...</span>
                        </div></a><br><hr style="margin-bottom: 2px; margin-top: 2px">';
                }

               
                $countkesehatan = Kesehatan::where('id_user',Auth::id())->count();


                    if ($countdatadiri > 0) {

                        if ($countkesehatan > 0) {
                            $button .=  


                            '<span class="badge badge-success" style="width:15rem; text-align: left;"><i class="fa fa-notes-medical"></i> Kesehatan <i class="fa fa-check" style="float:right"></i></span>

                            <a href="kesehatan/'.$finddatadiri->id.'/edit" data-id="" title="Edit data kesehatan"><span class="badge badge-info"><i class="fa fa-edit"></i></span></a>

                            <hr style="margin-bottom: 2px; margin-top: 2px">';


                        }else{
                            $button .=  '<button type="button" name="" id="" class="tambahkesehatan btn btn-info btn-xs btn-flat" style="width:15rem; text-align: left;"><i class="fa fa-medkit"></i> Kesehatan <div class="spinner-grow text-warning spinner-grow-sm" role="status" style="float:right">
                                  <span class="sr-only">Loading...</span>
                                </div></button><br> <hr style="margin-bottom: 2px; margin-top: 2px">';
                        }

                    }else{
                         $button .=  '<button type="button" name="" id="" class="cekdatadiri btn btn-secondary btn-xs btn-flat" style="width:15rem; text-align: left;"><i class="fa fa-medkit"></i> Kesehatan 
                                </button><br> <hr style="margin-bottom: 2px; margin-top: 2px">';
                    }

                    $countpendidikan = DataPendidikan::where('id_user',Auth::id())->count();
                    $countptinggi = DataPerguruanTinggi::where('id_user',Auth::id())->count();

                    if ($countdatadiri > 0) {

                        $cp = array($countpendidikan, $countptinggi);

                        if (in_array(1, $cp)) {
                            $button .=   

                            '<span class="badge badge-success" style="width:15rem; text-align: left;"><i class="fa fa-university"></i> Pendidikan <i class="fa fa-check" style="float:right"></i></span>

                            <a href="pendidikan/'.$finddatadiri->id.'/edit" data-id="" title="Edit data pendidikan"><span class="badge badge-info"><i class="fa fa-edit"></i></span></a>

                            <hr style="margin-bottom: 2px; margin-top: 2px">';

                        }else{
                            /*$button .=  '<button type="button" name="" id="" class="tambahpendidikan btn btn-info btn-xs btn-flat" style="width:15rem; text-align: left;"><i class="fa fa-university"></i> Pendidikan <div class="spinner-grow text-warning spinner-grow-sm" role="status" style="float:right">
                                  <span class="sr-only">Loading...</span>
                                </div></button><br> <hr style="margin-bottom: 2px; margin-top: 2px">';*/

                            $button .=  '<a href="tpend" class="btn btn-info btn-xs btn-flat" style="width:15rem; text-align: left;"><i class="fa fa-university"></i> Pendidikan <div class="spinner-grow text-warning spinner-grow-sm" role="status" style="float:right">
                                  <span class="sr-only">Loading...</span>

                                </div></a>
                                <br> <hr style="margin-bottom: 2px; margin-top: 2px">';
                        }

                    }else{

                        $button .=  '<button type="button" name="" id="" class="cekdatadiri btn btn-secondary btn-xs btn-flat" style="width:15rem; text-align: left;"><i class="fa fa-university"></i> Pendidikan 
                                </button><br> <hr style="margin-bottom: 2px; margin-top: 2px">';
                    }


                    $countpnonformal = DataPendNonFormal::where('id_user',Auth::id())->count();

                    if ($countdatadiri > 0) {

                        if ($countpnonformal > 0) {
                            $button .=   '<span class="badge badge-success" style="width:15rem; text-align: left;"><i class="fa fa-certificate"></i> Pendidikan Non Formal <i class="fa fa-check" style="float:right"></i></span>

                            <a href="pendnonformal/'.$finddatadiri->id.'/edit" data-id="" title="Edit data pendidikan non formal"><span class="badge badge-info"><i class="fa fa-edit"></i></span></a>

                            <hr style="margin-bottom: 2px; margin-top: 2px">';
                        }else{
                            $button .=  '<button type="button" name="" id="" class="tambahpendnonformal btn btn-info btn-xs btn-flat" style="width:15rem; text-align: left;"><i class="fa fa-certificate"></i> Pendidikan Non Formal <div class="spinner-grow text-warning spinner-grow-sm" role="status" style="float:right">
                                  <span class="sr-only">Loading...</span>
                                </div>
                                </button><br> <hr style="margin-bottom: 2px; margin-top: 2px">';
                        }
                    }else{

                        $button .=  '<button type="button" name="" id="" class="cekdatadiri btn btn-secondary btn-xs btn-flat" style="width:15rem; text-align: left;"><i class="fa fa-certificate"></i> Pendidikan Non Formal 
                                </button><br> <hr style="margin-bottom: 2px; margin-top: 2px">';
                    }

                    $countpengalamankerja = DataPengalamanKerjaPendidikan::where('id_user',Auth::id())->count();
                    $countpengalamankerjanonpen = DataPengalamanKerjaNonPendidikan::where('id_user',Auth::id())->count();
                    $countorganisasi = DataPengalamanOrganisasi::where('id_user',Auth::id())->count();
                    
                    if ($countdatadiri > 0) {

                        if (($countpengalamankerja > 0) && ($countpengalamankerjanonpen > 0) && ($countorganisasi > 0)) {

                        $button .=  '<span class="badge badge-success" style="width:15rem; text-align: left;"><i class="fa fa-briefcase"></i> Pengalaman Kerja & Organisasi <i class="fa fa-check" style="float:right"></i></span>

                        <a href="pengalamankerjadanorganisasi/'.$finddatadiri->id.'/edit" data-id="" title="Edit data pengalaman kerja dan organisasi"><span class="badge badge-info"><i class="fa fa-edit"></i></span></a>

                         <hr style="margin-bottom: 2px; margin-top: 2px">';
                        }else{
                         $button .=   '<a href="showpengalamankerja" class="btn btn-info btn-xs btn-flat" data-id="" style="width:15rem; text-align: left;"><i class="fa fa-briefcase"></i> Pengalaman Kerja & Organisasi
                         <div class="spinner-grow text-warning spinner-grow-sm" role="status" style="float:right">
                          <span class="sr-only">Loading...</span>
                        </div>
                         </a><br> <hr style="margin-bottom: 2px; margin-top: 2px">';

                        }

                    }else{

                        $button .=  '<button type="button" name="" id="" class="cekdatadiri btn btn-secondary btn-xs btn-flat" style="width:15rem; text-align: left;"><i class="fa fa-briefcase"></i> pengalaman kerja dan organisasi
                                </button><br> <hr style="margin-bottom: 2px; margin-top: 2px">';
                    }


                    $countpencapaian = DataPencapaian::where('id_user',Auth::id())->count();

                    if ($countdatadiri > 0) {

                        if ($countpencapaian > 0) {
                        $button .=  '<span class="badge badge-success" style="width:15rem; text-align: left;"><i class="fa fa-trophy"></i> Pencapaian <i class="fa fa-check" style="float:right"></i></span>

                            <a href="pencapaian/'.$finddatadiri->id.'/edit" data-id="" title="Edit data Pencapaian"><span class="badge badge-info"><i class="fa fa-edit"></i></span></a>

                            <hr style="margin-bottom: 2px; margin-top: 2px">';
                        }else{
                          $button .=   '<a href="#" class="pencapaian btn btn-info btn-xs btn-flat" data-id="" style="width:15rem; text-align: left;"><i class="fa fa-trophy"></i> Pencapaian 
                          <div class="spinner-grow text-warning spinner-grow-sm" role="status" style="float:right">
                              <span class="sr-only">Loading...</span>
                            </div>
                            </a><br><hr style="margin-bottom: 2px; margin-top: 2px">';

                        }

                    }else{
                        $button .=  '<button type="button" name="" id="" class="cekdatadiri btn btn-secondary btn-xs btn-flat" style="width:15rem; text-align: left;"><i class="fa fa-trophy"></i> Pencapaian
                                </button><br> <hr style="margin-bottom: 2px; margin-top: 2px">';
                    }


                    $countpekerjaanlamaran = DataPekerjaanLamaran::where('id_user',Auth::id())->count();

                    if ($countdatadiri > 0) {

                        if ($countpekerjaanlamaran > 0) {
                        $button .=  '<span class="badge badge-success" style="width:15rem; text-align: left;"><i class="fa fa-briefcase"></i> Pekerjaan Yang Dilamar <i class="fa fa-check" style="float:right"></i></span>

                            <a href="pekerjaandilamar/'.$finddatadiri->id.'/edit" data-id="" title="Edit data Pekerjaan Yang Dilamar"><span class="badge badge-info"><i class="fa fa-edit"></i></span></a>

                            <hr style="margin-bottom: 2px; margin-top: 2px">';
                        }else{
                          $button .=   '<a href="#" class="lamaran btn btn-info btn-xs btn-flat" data-id="" style="width:15rem; text-align: left;"><i class="fa fa-briefcase"></i> Pekerjaan Yang Dilamar 
                          <div class="spinner-grow text-warning spinner-grow-sm" role="status" style="float:right">
                                  <span class="sr-only">Loading...</span>
                            </div>
                          </a><br><hr style="margin-bottom: 2px; margin-top: 2px">';

                        }
                    }else{

                        $button .=  '<button type="button" name="" id="" class="cekdatadiri btn btn-secondary btn-xs btn-flat" style="width:15rem; text-align: left;"><i class="fa fa-briefcase"></i> Pekerjaan Yang Dilamar 
                                </button><br> <hr style="margin-bottom: 2px; margin-top: 2px">';
                    }
               

                    $countdataberbahasaasing = DataBerbahasaAsing::where('id_user',Auth::id())->count();
                    $countdatakeahlianlainnya = DataKeahlianLainnya::where('id_user',Auth::id())->count();

                    if ($countdatadiri > 0) {
                        if (($countdataberbahasaasing > 0) && ($countdatakeahlianlainnya > 0)) {

                            $button .=  '<span class="badge badge-success" style="width:15rem; text-align: left;"><i class="fa fa-language"></i> Berbahasa Asing & Keahlian Lainnya <i class="fa fa-check" style="float:right"></i></span>

                             <a href="bahasakeahlian/'.$finddatadiri->id.'/edit" data-id="" title="Edit data Bahasa dan Keahlian lainnya"><span class="badge badge-info"><i class="fa fa-edit"></i></span></a>

                             <hr style="margin-bottom: 2px; margin-top: 2px">';

                        }else{

                            $button .=   '<a href="#" class="berbahasaasingdankeahlian btn btn-info btn-xs btn-flat" data-id="" style="width:15rem; text-align: left;"><i class="fa fa-language"></i> Berbahasa Asing & Keahlian Lainnya
                                <div class="spinner-grow text-warning spinner-grow-sm" role="status" style="float:right">
                                  <span class="sr-only">Loading...</span>
                                </div></a><br>';

                        }

                    }else{

                        $button .=  '<button type="button" name="" id="" class="cekdatadiri btn btn-secondary btn-xs btn-flat" style="width:15rem; text-align: left;"><i class="fa fa-language"></i> Berbahasa Asing & Keahlian Lainnya
                                </button><br> <hr style="margin-bottom: 2px; margin-top: 2px">';
                    }
                return $button;
                }
            })

        ->addColumn('resume', function($data){

            $finddatadiri = User::where('id', '=', Auth::id())->first();


            $countdatadiri = DataDiri::where('id_user',Auth::id())->count();
            $countkesehatan = Kesehatan::where('id_user',Auth::id())->count();
            $countpendidikan = DataPendidikan::where('id_user',Auth::id())->count();
            $countptinggi = DataPerguruanTinggi::where('id_user',Auth::id())->count();
            $countpnonformal = DataPendNonFormal::where('id_user',Auth::id())->count();
            $countpengalamankerja = DataPengalamanKerjaPendidikan::where('id_user',Auth::id())->count();
            $countpengalamankerjanonpen = DataPengalamanKerjaNonPendidikan::where('id_user',Auth::id())->count();
            $countorganisasi = DataPengalamanOrganisasi::where('id_user',Auth::id())->count();
            $countpencapaian = DataPencapaian::where('id_user',Auth::id())->count();
            $countpekerjaanlamaran = DataPekerjaanLamaran::where('id_user',Auth::id())->count();
            $countdataberbahasaasing = DataBerbahasaAsing::where('id_user',Auth::id())->count();
            $countdatakeahlianlainnya = DataKeahlianLainnya::where('id_user',Auth::id())->count();

            $cekarray = array($countdatadiri,$countkesehatan,$countpendidikan,$countptinggi,$countpnonformal,$countpengalamankerja,$countpengalamankerjanonpen,$countorganisasi,$countpencapaian,$countpekerjaanlamaran,$countdataberbahasaasing,$countdatakeahlianlainnya);

            //dd($cekarray);
            if (in_array(0, $cekarray)) {
                $button =   '<button type="button" class="swalDefaultError btn btn-secondary btn-xs" ><i class="fa fa-file"></i> 
                              Pratinjau
                            </button>';
            }else{
                $button = '<a href="resume/'.$finddatadiri->id.'/show" class="btn btn-outline-info btn-xs btn-flat" data-id=""><i class="fa fa-file"></i> Pratinjau</a><br>';

            }

             return $button;
            })

        ->addColumn('uploadfile', function($data){

            $dt123 = DataDiri::select('status_finish')
                ->where('id_user', '=', Auth::id())
                ->first();

            if (empty($dt123)) {
        
            }else{
                $dt123 = $dt123->status_finish;
            }

    
            if ($dt123 == 1) {
                $button = '<u>Anda telah selesai</u> <br><font> jika ada kendala <br> Silahkan hubungi nomor yang tertera <br> dipetunjuk pengisian';

                return $button;

            }else{

            $countdatadiri = DataDiri::where('id_user',Auth::id())->count();
            $countpendidikan = DataPendidikan::where('id_user',Auth::id())->count();
            $countptinggi = DataPerguruanTinggi::where('id_user',Auth::id())->count();
            $countpnonformal = DataPendNonFormal::where('id_user',Auth::id())->count();

            $countorganisasi = DataPengalamanOrganisasi::where('id_user',Auth::id())->count();
            $countpencapaian = DataPencapaian::where('id_user',Auth::id())->count();

            $finddatadiri = User::where('id', '=', Auth::id())->first();

            //datadiri upload file
            if ($countdatadiri > 0) {
                 $button = '<a href="upload/'.$finddatadiri->id.'/show" class="btn btn-outline-info btn-xs btn-flat" data-id="" style="width:15rem; text-align: left;"><i class="fa fa-file-upload"></i> Berkas Data Diri <div class="spinner-grow text-warning spinner-grow-sm" role="status" style="float:right">
                          <span class="sr-only">Loading...</span>
                        </div></a><br>

                    <hr style="margin-bottom: 2px; margin-top: 2px">
                    ';
            }else{
                $button =   '<button type="button" class="swalDefaultError2 btn btn-outline-secondary btn-xs" style="width:15rem; text-align: left;"><i class="fa fa-file-upload"></i> Berkas Diri</button><br>

                    <hr style="margin-bottom: 2px; margin-top: 2px">';
            }

            //pendidikan smp,sma dan perguruan tinggi upload file
            if (($countpendidikan > 0) && ($countptinggi > 0)) {
                $button .= '<a href="upload/'.$finddatadiri->id.'/show/pendidikan" class="btn btn-outline-info btn-xs btn-flat" data-id="" style="width:15rem; text-align: left;"><i class="fa fa-file-upload"></i> Berkas Pendidikan <div class="spinner-grow text-warning spinner-grow-sm" role="status" style="float:right">
                          <span class="sr-only">Loading...</span>
                        </div></a><br>
                        <hr style="margin-bottom: 2px; margin-top: 2px">';


            }else{
                $button .=   '<button type="button" class="swalDefaultError3 btn btn-outline-secondary btn-xs" style="width:15rem; text-align: left;"><i class="fa fa-file-upload"></i> Berkas Pendidikan</button><br>

                    <hr style="margin-bottom: 2px; margin-top: 2px">';
            }

            //pendidikan non formal upload file
            if ($countpnonformal > 0) {
                $button .= '<a href="upload/'.$finddatadiri->id.'/show/pendidikannf" class="btn btn-outline-info btn-xs btn-flat" data-id="" style="width:15rem; text-align: left;"><i class="fa fa-file-upload"></i> Berkas Pendidikan Non Formal <div class="spinner-grow text-warning spinner-grow-sm" role="status" style="float:right">
                          <span class="sr-only">Loading...</span>
                        </div></a><br>
                        <hr style="margin-bottom: 2px; margin-top: 2px">';


            }else{
                $button .=   '<button type="button" class="swalDefaultError3 btn btn-outline-secondary btn-xs" style="width:15rem; text-align: left;"><i class="fa fa-file-upload"></i> Berkas Pendidikan Non Formal</button><br>

                    <hr style="margin-bottom: 2px; margin-top: 2px">';
            }

            //organisasi dan pencapaian upload file
            if ($countorganisasi > 0 || $countpencapaian > 0) {

                $button .= '<a href="upload/'.$finddatadiri->id.'/show/organisasipencapaian" class="btn btn-outline-info btn-xs btn-flat" data-id="" style="width:15rem; text-align: left;"><i class="fa fa-file-upload"></i> Berkas Organisasi dan Pencapaian <div class="spinner-grow text-warning spinner-grow-sm" role="status" style="float:right">
                          <span class="sr-only">Loading...</span>
                        </div></a><br>
                    <hr style="margin-bottom: 2px; margin-top: 2px">';


            }else{
                $button .=  '<button type="button" class="swalDefaultError4 btn btn-outline-secondary btn-xs" style="width:15rem; text-align: left;"><i class="fa fa-file-upload"></i> Berkas Organisasi dan Pencapaian</button><br>

                    <hr style="margin-bottom: 2px; margin-top: 2px">';
            }

        
                $button .= '<a href="upload/'.$finddatadiri->id.'/show/lainnya" class="btn btn-outline-info btn-xs btn-flat" data-id="" style="width:15rem; text-align: left;"><i class="fa fa-file-upload"></i> Surat Lamaran Kerja, Surat Lamaran, Dll <div class="spinner-grow text-warning spinner-grow-sm" role="status" style="float:right">
                              <span class="sr-only">Loading...</span>
                            </div></a><br>
                        <hr style="margin-bottom: 2px; margin-top: 2px">
                        <br>
                        <br>
                        <br>';  


                $button .= '<a href="'. Route('zonatesshow', ['id_user' => Auth::id()]) .'" style="line-height: 2.0; font-size: 13px;"><i class="fa fa-fw fa-pencil-alt"></i><u> Klik untuk Menuju Tes </u>
                <div class="spinner-grow text-warning spinner-grow-sm" role="status"></div></a>
                <br>
                <hr style="margin-bottom: 2px; margin-top: 2px">';
                        

                    return $button;
                }
            })

        
        ->rawColumns(['action','resume','uploadfile'])
        ->make(true);
            
    }
    //show upload index

    //Download File Berkas soal
    public Function downloadsoaltambahan($id){

        $ceknmfile = DB::table('berkas_soal')->select('*')
        ->where('id_soal' ,'=', $id)
        ->first(); 


        $file= public_path(). "/berkas_tes/berkas_soal/".$ceknmfile->id_user."/".$ceknmfile->nama_file;

        $headers = [
              'Content-Type' => 'application/pdf',
              'Content-Type:' => 'image/png',
              'Content-Type:' => 'image/jpg',
           ];

        return response()->download($file, $ceknmfile->nama_file, $headers);

    }


    //Destroy File Soal tambahan file
    public function destroyhasilsoaltambahan($id){

        $cekdata = DB::table('jawaban_soal')->select('*')
        ->where('id_jawaban', '=', $id)
        ->count();

       
        if ($cekdata < 1) {

           return Redirect::back()->with('error', 'Data Mungkin Sudah Dihapus');

        }else{
     
            $cek = DB::table('jawaban_soal')->select('*')
            ->where('id_jawaban', '=', $id)
            ->first();

            $cek2 = DB::table('berkas_soal')->select('id_user')
            ->where('id_soal', '=', $cek->id_soal)
            ->first();

            $cek_berkas = File::delete(public_path()."/berkas_tes/berkas_soal/".$cek2->id_user."/jawaban/".$cek->file_name);

            if ($cek_berkas) {

                DB::table('jawaban_soal')->where('id_jawaban', '=', $id)->delete();

                return Redirect::back()->with('success123', 'Berhasil Hapus Foto '.$cek->file_name.'');
            }else{
                return Redirect::back()->with('error123', 'Terjadi Kesalahan #sdf334');
            }
        }
    } 


    //Upload Hasil soal tambahan

    Public Function uploadsoaltambahan(Request $request){

        $files = $request->file('files');

        $cek = DB::table('jawaban_soal')
        ->where('id_soal', '=' , $request->id_soal)
        ->count();

        if ($cek > 0) {

           return Redirect::back()->with('error123', 'File jawaban sudah ada harap hapus jika ingin diganti');
        
        }else{

            foreach($files as $file){

                $name = $file->getClientOriginalName();
                $size = $file->getSize();
                $extention = $file->getClientOriginalExtension();

                     $path = public_path().'/berkas_tes/berkas_soal/'.$request->id_user.'/jawaban';
                   

                      if(empty($errors)==true){
                          if(!File::isDirectory($path)){
                                Storage::makeDirectory($path, $mode = 0777, true, true);
                              }
                              if(File::isDirectory("$path/".$name)==false){
                                   if (file_exists($path.'/'.$name)) {
                                    return Redirect::back()->with('error123', 'File '.$name.' Sudah Ada, Mungkin Anda Harus Mengganti Nama File');
                                    die;
                                  }
                                  $file->move("$path/",$name);
                              }else{                  // rename the file if another one exist
                                    return Redirect::back()->with('error123', 'Terjadi Kesalahan');
                              }
                          }else{
                                  print_r($errors);
                          }

                  

            }
              DB::table('jawaban_soal')->insert(
                        ['id_soal' => $request->id_soal, 'file_name' => $name ,'file_type' => $extention, 
                        'file_size' => $size, 'created_at' => date('Y-m-d h:i:s')]
                    );
            return Redirect::back()->with('success123', 'Berhasil Upload File');

        }

    }


    //ubah status jika pemohon selesai mengisi biodata

    public function updatestatusselesai($statusselesai){
    
        $countdatadiri = DataDiri::where('id_user',Auth::id())->count();
        $countkesehatan = Kesehatan::where('id_user',Auth::id())->count();
        $countpendidikan = DataPendidikan::where('id_user',Auth::id())->count();
        $countptinggi = DataPerguruanTinggi::where('id_user',Auth::id())->count();
        $countpnonformal = DataPendNonFormal::where('id_user',Auth::id())->count();
        $countpengalamankerja = DataPengalamanKerjaPendidikan::where('id_user',Auth::id())->count();
        $countpengalamankerjanonpen = DataPengalamanKerjaNonPendidikan::where('id_user',Auth::id())->count();
        $countorganisasi = DataPengalamanOrganisasi::where('id_user',Auth::id())->count();
        $countpencapaian = DataPencapaian::where('id_user',Auth::id())->count();
        $countpekerjaanlamaran = DataPekerjaanLamaran::where('id_user',Auth::id())->count();
        $countdataberbahasaasing = DataBerbahasaAsing::where('id_user',Auth::id())->count();
        $countdatakeahlianlainnya = DataKeahlianLainnya::where('id_user',Auth::id())->count();

        $cekarray = array($countdatadiri,$countkesehatan,$countpendidikan,$countptinggi,$countpnonformal,$countpengalamankerja,$countpengalamankerjanonpen,$countorganisasi,$countpencapaian,$countpekerjaanlamaran,$countdataberbahasaasing,$countdatakeahlianlainnya);

        //dd($cekarray);
        if (in_array(0, $cekarray)) {
             return Redirect::back()->with('error', 'Harap Lengkapi Kelengkapan Data');
        }else{
           
            $cek = DB::table('datadiri')
            ->where('id_user', Auth::id())
            ->update([
                'status_finish' => $statusselesai,
            ]);

            if ($cek) {
                return Redirect::back()->with('success', 'Berhasil, Data Akan Diteruskan Ke bagian Kepegawaian UVERS');
            }else{
                return Redirect::back()->with('error', 'Terjadi Kesalahan #soj34');
            }

        }
    }


    //Zona Tes
    public function zonatesshow($id){

        /*$abc =  DB::table('tambahan_kategori')
        ->join('kategori_tes', 'tambahan_kategori.kategori', '=', 'kategori_tes.id_kategori')
        ->where('id_user', '=' ,$id)
        ->get();*/

        $abc = DB::table('tambahan_kategori')
        ->join('kategori_tes', 'tambahan_kategori.kategori', '=', 'kategori_tes.id_kategori')
         ->select('tambahan_kategori.*',  'kategori_tes.nama_kategori')
        ->where('id_user','=', $id)
        ->get();


        $cek = DB::table('berkas_apti_disc')->select('*')
        ->where('id_user' ,'=', $id)
        ->get();

        $cekberkassoal = DB::table('berkas_soal')
        ->leftJoin('jawaban_soal', 'berkas_soal.id_soal' ,'=','jawaban_soal.id_soal')
        ->select('berkas_soal.*', 'jawaban_soal.file_name','jawaban_soal.file_size','jawaban_soal.id_jawaban')
        ->where('id_user' ,'=', $id)
        ->get();

        return view('admin.dashboard.pemohon.indexzonates', ['id_user' => $id, 'data' => $abc, 'cek' => $cek, 'berkassoal' => $cekberkassoal]);
    }

    //Show Index Berkas Tes
    public function showfileberkastes($id,$id2){

        $abcd = BerkasTes::latest()
        ->where('id_tambahankat', '=' ,$id)
        ->get();

        return view('admin.dashboard.pemohon.indexdetailberkastes', ['data' => $abcd, 'id' => $id, 'id_user' => $id2] );

    }

    //Download File Berkas Tes
    public Function downloadbertes($id){

        $ceknmfile = DB::table('berkas_tes')->select('id_tambahankat','id_user','nama_filetes')
        ->where('id_berkastes' ,'=', $id)
        ->first(); 


        $file= public_path(). "/berkas_tes/".$ceknmfile->id_user."/".$ceknmfile->id_tambahankat."/".$ceknmfile->nama_filetes;

        $headers = [
              'Content-Type' => 'application/pdf',
              'Content-Type:' => 'image/png',
              'Content-Type:' => 'image/jpg',
           ];

        return response()->download($file, $ceknmfile->nama_filetes, $headers);

    }

    //Hapus File Berkas Tes
    public function destroyfileberkastes($id){

        $ceknmfile = DB::table('berkas_tes')->select('id_tambahankat','id_user','nama_filetes')
        ->where('id_berkastes' ,'=', $id)
        ->first();

        $cek_berkas = File::delete(public_path()."/berkas_tes/".$ceknmfile->id_user."/".$ceknmfile->id_tambahankat."/".$ceknmfile->nama_filetes);

        if ($cek_berkas) {

            DB::table('berkas_tes')->where('id_berkastes', '=' , $id)->delete();
            return Redirect::back()->with('success', 'Berhasil Hapus File '.$ceknmfile->nama_filetes.'');

        }else{
            return Redirect::back()->with('error', 'Terjadi Kesalahan Hapus File '.$ceknmfile->nama_filetes.'');
        }
    }   

    //UPLOAD BERKAS ZONA TES
    Public Function zonatesupload(Request $request){

        $files = $request->file('files');

        foreach($files as $file){

            $name = $file->getClientOriginalName();
            $size = $file->getSize();
            $extention = $file->getClientOriginalExtension();

            $id_berkas = $request->id_berkastes;

                $path = public_path().'/berkas_tes/' . $request->id_user.'/'.$id_berkas;
                  if(empty($errors)==true){
                      if(!File::isDirectory($path)){
                            Storage::makeDirectory($path, $mode = 0777, true, true);
                          }
                          if(File::isDirectory("$path/".$name)==false){
                               if (file_exists($path.'/'.$name)) {
                                return Redirect::back()->with('error', 'File '.$name.' Sudah Ada');
                                die;
                              }
                              $file->move("$path/",$name);
                          }else{                  // rename the file if another one exist
                                return Redirect::back()->with('error', 'Terjadi Kesalahan');
                          }
                      }else{
                              print_r($errors);
                      }

                    $flight = new BerkasTes;

                    $flight->id_user = $request->id_user;
                    $flight->nama_filetes = $name;
                    $flight->id_tambahankat = $id_berkas;
                    $flight->type_filetes = $extention;
                    $flight->size_filetes = $size;
                   
                    $flight->save();

        }
        return Redirect::back()->with('success', 'Berhasil Upload File');

    }


    //Digunakan Untuk Semua upload file
    public function getDownloadfile($id, $typeberkas){

        $ceknmfile = DB::table('berkas')->select('nama_file','type_file')
        ->where([
            ['id_user', '=', Auth::id()],
            ['jenis', '=', $typeberkas]
        ])
        ->first(); 

        $file= public_path(). "/berkas/".Auth::id()."/".$typeberkas."/".$ceknmfile->nama_file.".".$ceknmfile->type_file;

        $headers = [
              'Content-Type' => 'application/pdf',
              'Content-Type:' => 'image/png',
              'Content-Type:' => 'image/jpg',
           ];

        return response()->download($file, $ceknmfile->nama_file.'.'.$ceknmfile->type_file, $headers);
    }

    public function indexupload($id){

        $datadiri = DB::table('datadiri')->select('id_user','no_ktp','no_npwp','kartu_keluarga','paspor','sim_a','sim_b','sim_c','bpjs_kesehatan','bpjs_tenagakerja','bpjs_jaminanpensiun')
        ->where('id_user', Auth::id())
        ->get(); 

        $datdir = DataDiri::where('id_user', '=', Auth::id())->count();
       

        $ktp = berkas::where([['id_user', '=', Auth::id()],['jenis', '=', 'ktp']])->count();
        $npwp = berkas::where([['id_user', '=', Auth::id()],['jenis', '=', 'npwp']])->count();
        $kk = berkas::where([['id_user', '=', Auth::id()],['jenis', '=', 'kk']])->count();
        $paspor = berkas::where([['id_user', '=', Auth::id()],['jenis', '=', 'paspor']])->count();
        $sima = berkas::where([['id_user', '=', Auth::id()],['jenis', '=', 'sima']])->count();
        $simb = berkas::where([['id_user', '=', Auth::id()],['jenis', '=', 'simb']])->count();
        $simc = berkas::where([['id_user', '=', Auth::id()],['jenis', '=', 'simc']])->count();
        $bpjs_kesehatan = berkas::where([['id_user', '=', Auth::id()],['jenis', '=', 'bpjs_kesehatan']])->count();
        $bpjs_tenagakerja = berkas::where([['id_user', '=', Auth::id()],['jenis', '=', 'bpjs_tenagakerja']])->count();
        $bpjs_jaminanpensiun = berkas::where([['id_user', '=', Auth::id()],['jenis', '=', 'bpjs_jaminanpensiun']])->count();

        return view('admin.dashboard.pemohon.uploadfile.indexupload', 
            ['ktp' => $ktp,'npwp' => $npwp, 'kk' => $kk, 'paspor' => $paspor, 'sima' => $sima, 'simb' => $simb, 'simc' => $simc, 'bpjs_kesehatan' => $bpjs_kesehatan, 'bpjs_tenagakerja' => $bpjs_tenagakerja, 'bpjs_jaminanpensiun' => $bpjs_jaminanpensiun, 'datdircount' => $datdir]
        )
        ->with('datadiri', $datadiri);
        
    }

    //show upload index pendidikan formal
    public function indexuploadpendidikan($id){

        $berkaspendidikan = DB::table('datapendidikan')->select('*')
        ->where('id_user', Auth::id())
        ->get();

        $berkasperting = DB::table('dataperguruantinggi')->select('id_perguruantinggi','id_user','pt_nama','pt_jenjang')
        ->where('id_user', Auth::id())
        ->get();

        $berkas = DB::table('berkas')->select('jenis')
        ->where('id_user', Auth::id())
        ->get();

        $cek1 = DB::table('dataperguruantinggi')->select('pt_nama')
         ->where('id_user', '=', Auth::id())
         ->first();

        $cek2 = DB::table('datapendidikan')->select('smp_namasekolah','sma_namasekolah')
         ->where('id_user', '=', Auth::id())
         ->first();

        $smp = berkas::where([['id_user', '=', Auth::id()],['jenis', '=', 'smp']])->count();
        $sma = berkas::where([['id_user', '=', Auth::id()],['jenis', '=', 'sma']])->count();

        return view('admin.dashboard.pemohon.uploadfile.indexuploadpendidikan', 
            ['smp' => $smp, 'sma' => $sma, 'cek1' => $cek1, 'cek2' => $cek2]
        )
        ->with('berpen', $berkaspendidikan)
        ->with('perting', $berkasperting)
        ->with('berkas', $berkas);
        
    }

    //show upload index pendidikan nonformal
    public function indexuploadpendidikannf($id){

        $DataPendNonFormal = DataPendNonFormal::where('id_user', '=', Auth::id())->get();
        $berkas = DB::table('berkas')->select('jenis')
        ->where('id_user', Auth::id())
        ->get();

        return view('admin.dashboard.pemohon.uploadfile.indexuploadpendidikannonformal')
        ->with('nf', $DataPendNonFormal)
        ->with('berkas', $berkas);
        
    }

    public function indexuploadorganisasipencapaian(){

        $DataPengalamanOrganisasi = DataPengalamanOrganisasi::where('id_user', '=', Auth::id())->get();
        $DataPencapaian = DataPencapaian::where('id_user', '=', Auth::id())->get();

        $berkas = DB::table('berkas')->select('jenis')
        ->where('id_user', Auth::id())
        ->get();

        return view('admin.dashboard.pemohon.uploadfile.indexuploadorganisasipencapaian')
        ->with('organ', $DataPengalamanOrganisasi)
        ->with('penc', $DataPencapaian)
        ->with('berkas', $berkas);

    }

    public function indexuploadfilelainnya(){

         $cv = berkas::where([['id_user', '=', Auth::id()],['jenis', '=', 'cv']])->count();
         $slk = berkas::where([['id_user', '=', Auth::id()],['jenis', '=', 'suratlamarankerja']])->count();
         $spk = berkas::where([['id_user', '=', Auth::id()],['jenis', '=', 'suratpengalamankerja']])->count();
         $portofolio = berkas::where([['id_user', '=', Auth::id()],['jenis', '=', 'portofolio']])->count();
         $tambahan = berkas::where([['id_user', '=', Auth::id()],['jenis', '=', 'tambahan']])->count();
         $fotodiri = berkas::where([['id_user', '=', Auth::id()],['jenis', '=', 'fotodiri']])->count();

         return view('admin.dashboard.pemohon.uploadfile.indexuploadlainnya',['cv'=> $cv,'slk'=> $slk,'spk'=> $spk ,'portofolio'=> $portofolio, 'tambahan' => $tambahan, 'fotodiri' => $fotodiri]);

    }

    //Hapus File/Berkas DataDiri
    public function destroyfile($id, $typeberkas){
        $ceknmfile = DB::table('berkas')->select('nama_file')
         ->where([
            ['id_user', '=', Auth::id()],
            ['jenis', '=', $typeberkas]
        ])
        ->first();
        $cek_berkas = File::deleteDirectory(public_path()."/berkas/".Auth::id()."/".$typeberkas);
        if ($cek_berkas) {

            DB::table('berkas')->where([
                ['id_user', '=', Auth::id()],
                ['jenis', '=', $typeberkas]]
            )->delete();
            return Redirect::action('Pemohon\PemohonController@indexupload', ['id' => Auth::id()])
                  ->with('success','Berhasil Hapus File '.$ceknmfile->nama_file.'');
        }else{
            return Redirect::action('Pemohon\PemohonController@indexupload', ['id' => Auth::id()])
                  ->with('error','Terjadi Kesalahan');
        }
    }   

    //Hapus File Pendidikan Formal
    public function destroyfilependidikan($id, $typeberkas){
        $ceknmfile = DB::table('berkas')->select('nama_file')
         ->where([
            ['id_user', '=', Auth::id()],
            ['jenis', '=', $typeberkas]
        ])
        ->first();
        $cek_berkas = File::deleteDirectory(public_path()."/berkas/".Auth::id()."/".$typeberkas);
        if ($cek_berkas) {

            DB::table('berkas')->where([
                ['id_user', '=', Auth::id()],
                ['jenis', '=', $typeberkas]]
            )->delete();
            return Redirect::action('Pemohon\PemohonController@indexuploadpendidikan', ['id' => Auth::id()])
                  ->with('success','Berhasil Hapus File '.$ceknmfile->nama_file.'');
        }else{
            return Redirect::action('Pemohon\PemohonController@indexuploadpendidikan', ['id' => Auth::id()])
                  ->with('error','Terjadi Kesalahan');
        }
    }   

    //Hapus File Pendidikan NON Formal
    public function destroyfilependidikannf($id, $typeberkas){
        $ceknmfile = DB::table('berkas')->select('nama_file')
         ->where([
            ['id_user', '=', Auth::id()],
            ['jenis', '=', $typeberkas]
        ])
        ->first();
        $cek_berkas = File::deleteDirectory(public_path()."/berkas/".Auth::id()."/".$typeberkas);
        if ($cek_berkas) {

            DB::table('berkas')->where([
                ['id_user', '=', Auth::id()],
                ['jenis', '=', $typeberkas]]
            )->delete();
            return Redirect::action('Pemohon\PemohonController@indexuploadpendidikannf', ['id' => Auth::id()])
                ->with('success','Berhasil Hapus File '.$ceknmfile->nama_file.' ');
        }else{
            return Redirect::action('Pemohon\PemohonController@indexuploadpendidikannf', ['id' => Auth::id()])
                ->with('error','Terjadi Kesalahan');
        }
    }

    //Hapus File Organisasi Dan Pencapaian
    public function destroyfileorganpenc($id, $typeberkas){
        $ceknmfile = DB::table('berkas')->select('nama_file')
         ->where([
            ['id_user', '=', Auth::id()],
            ['jenis', '=', $typeberkas]
        ])
        ->first();
        $cek_berkas = File::deleteDirectory(public_path()."/berkas/".Auth::id()."/".$typeberkas);
        if ($cek_berkas) {

            DB::table('berkas')->where([
                ['id_user', '=', Auth::id()],
                ['jenis', '=', $typeberkas]]
            )->delete();
            return Redirect::action('Pemohon\PemohonController@indexuploadorganisasipencapaian', ['id' => Auth::id()])
                ->with('success','Berhasil Hapus File '.$ceknmfile->nama_file.' ');
        }else{
            return Redirect::action('Pemohon\PemohonController@indexuploadorganisasipencapaian', ['id' => Auth::id()])
                ->with('error','Terjadi Kesalahan');
        }
    } 

    //Hapus File CV Portofolio Dll
    public function destroylainya($id, $typeberkas){
        $ceknmfile = DB::table('berkas')->select('nama_file')
         ->where([
            ['id_user', '=', Auth::id()],
            ['jenis', '=', $typeberkas]
        ])
        ->first();
        $cek_berkas = File::deleteDirectory(public_path()."/berkas/".Auth::id()."/".$typeberkas);
        if ($cek_berkas) {

            DB::table('berkas')->where([
                ['id_user', '=', Auth::id()],
                ['jenis', '=', $typeberkas]]
            )->delete();
            return Redirect::action('Pemohon\PemohonController@indexuploadfilelainnya', ['id' => Auth::id()])
                ->with('success','Berhasil Hapus File '.$ceknmfile->nama_file.' ');
            }else{
                return Redirect::action('Pemohon\PemohonController@indexuploadfilelainnya', ['id' => Auth::id()])
                    ->with('error','Terjadi Kesalahan');
            }
        }   
  

    //digunakan untuk upload semua berkas
    public function prosesupload(Request $request){

        $extention = pathinfo(Input::file('files')->getClientOriginalName(), PATHINFO_EXTENSION);
        $namaphoto = pathinfo(Input::file('files')->getClientOriginalName(), PATHINFO_FILENAME);
        $sizephoto = $request->file('files')->getSize();

        
        if ($sizephoto > 2097152) {
            return Redirect::back()->with('error', 'File Melebihi 2 Mb');
        }else{

            $files = $request->file('files');

            if ($request->data_name == "fotodiri") {
               
                $validatorberkas = Validator::make(
                    $request->all(),
                    [    
                        'files' => 'mimes:jpeg,png'
                    ]
                );
                if ($validatorberkas->fails()) {
                    return Redirect::back()->with('error', 'File Yang Diizinkan Hanya Foto, .jpeg, .png');
                }
            }

            
            if (empty($namaphoto)) {
                return Redirect::back()->with('error', 'Nama File TIdak Boleh Kosong');
            }else{

                $countberkas = berkas::where([['id_user', '=', Auth::id()],['jenis', '=', $request->data_name]])->count();
              
                if ($countberkas > 0) {

                    return Redirect::back()->with('error', 'Data Sudah Ada');

                }else{
                    $messages = [
                            'required' => 'Atribut Dibutuhkan',
                        ];
                        $validatorberkas = Validator::make(
                            $request->all(),
                            [    
                                'id_user' => 'required',
                                'data_name' => 'required',
                            ],
                            $messages
                        );
                        if ($validatorberkas->fails()) {
                            return Redirect::back()->with('error', 'Terjadi Kesalahan #23vf');
                        }else{
                            //$randomname = date('Ymd') .'-'. substr(uniqid(rand(), true), 5, 5) .'-'. Auth::id();
                            $path = public_path().'/berkas/' . Auth::id().'/'.$request->data_name;
                              if(empty($errors)==true){
                                  if(!File::isDirectory($path)){
                                        Storage::makeDirectory($path, $mode = 0777, true, true);
                                      }
                                      if(File::isDirectory("$path/".$namaphoto)==false){
                                           if (file_exists($path.'/'.$namaphoto)) {
                                            return Redirect::back()->with('error', 'Terjadi Kesalahan #df345');
                                            die;
                                          }
                                        $files->move("$path/",$namaphoto.'.'.$extention);
                                      }else{                  // rename the file if another one exist
                                            return Redirect::back()->with('error', 'Terjadi Kesalahan #3453sd');
                                      }
                                  }else{
                                          print_r($errors);
                                  }

                                if ($files) {
                                    $flight = new berkas;
                                    $flight->id_user = Auth::id();
                                    $flight->nama_file = $namaphoto;
                                    $flight->type_file = $extention;
                                    $flight->size_file = $sizephoto;
                                    $flight->jenis = $request->data_name;
                                    $flight->keterangan = $request->keterangan;
                                   
                                    $flight->save();

                                    return Redirect::back()->with('success', 'Berhasil Upload File '.$namaphoto.'');
                                }
                               
                                
                    }
                }
            }
        }
    }
    
    public function resume($id){

        $DataDiri = DataDiri::where('id_user', '=', Auth::id())->first();
        $DataKesehatan = Kesehatan::where('id_user', '=', Auth::id())->first();
        $DataPendidikan = DataPendidikan::where('id_user', '=', Auth::id())->first();
        $DataPerguruanTinggi = DataPerguruanTinggi::where('id_user', '=', Auth::id())->get();
        $DataPendNonFormal = DataPendNonFormal::where('id_user', '=', Auth::id())->get();
        $DataPengalamanKerjaPendidikan = DataPengalamanKerjaPendidikan::where('id_user', '=', Auth::id())->get();
        $DataPengalamanKerjaNonPendidikan = DataPengalamanKerjaNonPendidikan::where('id_user', '=', Auth::id())->get();
        $DataPengalamanOrganisasi = DataPengalamanOrganisasi::where('id_user', '=', Auth::id())->get();
        $DataPencapaian = DataPencapaian::where('id_user', '=', Auth::id())->get();
        $DataPekerjaanLamaran = DataPekerjaanLamaran::where('id_user', '=', Auth::id())->first();
        $DataBerbahasaAsing = DataBerbahasaAsing::where('id_user', '=', Auth::id())->get();
        $DataKeahlianLainnya = DataKeahlianLainnya::where('id_user', '=', Auth::id())->first();

        return view('admin.dashboard.pemohon.resume', $DataDiri, ['kes' => $DataKesehatan, 'pen' => $DataPendidikan, 'peklam' => $DataPekerjaanLamaran, 'keahlian' => $DataKeahlianLainnya])
        ->with('perting',$DataPerguruanTinggi)
        ->with('nonformal', $DataPendNonFormal)
        ->with('pkpen', $DataPengalamanKerjaPendidikan)
        ->with('pknonpen', $DataPengalamanKerjaNonPendidikan)
        ->with('porgan', $DataPengalamanOrganisasi)
        ->with('pencapaian', $DataPencapaian)
        ->with('berba', $DataBerbahasaAsing);
    }


    //bahasa dan kealian lainnya 
    public function bahasakeahlianshow($id){

        $DataBerbahasaAsing = DataBerbahasaAsing::where('id_user', '=', Auth::id())->get();
        $DataKeahlianLainnya = DataKeahlianLainnya::where('id_user', '=', Auth::id())->first();
        return view('admin.dashboard.pemohon.editbahasakeahlian', $DataKeahlianLainnya)->with('bahasa',$DataBerbahasaAsing);

    }

    public function bahasaupdate(){

        $input = Input::all();

        if (empty($input['idbahasa']) === false ) {

                if ($input['idbahasa']) {
                    DB::table('databerbahasaasing')
                    ->where('id_berbahasaasing', $input['idbahasa'])
                    ->update([

                        'jenis_bahasa' => $input['jenis_bahasa'],
                        'lisan_bahasa' => $input['lisan_bahasa'],
                        'tulisan_bahasa' => $input['tulisan_bahasa'],
                        'updated_at' => \Carbon\Carbon::now()
                    ]);

                }else{
                    return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #s3439',

                    ), 400);
                }
            }
        /*$Response = ['success' => 'Berhasil'];
        return response()->json($Response, 200);*/
    }

    public function bahasatambah(Request $request){

        $input = Input::all();
        if ($input['typetambahbahasa'] == 1) {
                DataBerbahasaAsing::create(array_merge($request->all(), ['id_user' => Auth::id()]));
         }else{
            return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #doi3313',

                    ), 400);
         }

    }

    public function destroybahasa($id){

        if (empty($id) === true) {
           return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #sko398g43',

                    ), 400);
        }else{
            DB::table('databerbahasaasing')->where('id_berbahasaasing', $id)->delete();
        }

    }

    public function updatekeahlian(Request $request, $id){
        
        $deletefirst = DB::table('datakeahlianlainnya')->where('id_user', $id)->delete();

        if ($deletefirst) {

            $datakeahlian = new DataKeahlianLainnya;
            $datakeahlian->id_user = Auth::id();
            $datakeahlian->jenis_keahlian = $request->alatmusik.$request->bernyanyi.$request->menari.$request->menjahit.$request->menyulam.$request->memasak.$request->melukis;
                $datakeahlian->keahlian_lainnya = $request->keahlianlainnya;
            $datakeahlian->save();
            //$Response = ['success' => $deletefirst];
            //return response()->json($Response, 200);

        }else{
            
             return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #d2dsn53913',

                    ), 400);
        }
    }

    //edit pekerjaan yang dilamar
    public function showeditpekerjaanyangdilamar(){

        $DataPekerjaanYangDilamar = DataPekerjaanLamaran::where('id_user', '=', Auth::id())->first();
             return view('admin.dashboard.pemohon.editpekerjaanyangdilamar', $DataPekerjaanYangDilamar);

    }

    public function updatepydl(){

        $input = Input::all();

        if (empty($input['typepydl']) === false ) {

                if ($input['typepydl']) {
                    DB::table('data_pekerjaanyangdilamar')
                    ->where('id_pekerjaanyangdilamar', $input['typepydl'])
                    ->update([

                        'tingkat' => $input['tingkat'],
                        'posisi' => $input['posisi'],
                        'penghasilan' => $input['penghasilan'],
                        'alasan_melamar' => $input['alasan_melamar'],
                        'tanggung_jawab' => $input['tanggung_jawab'],
                        'updated_at' => \Carbon\Carbon::now()
                    ]);

                }else{
                    return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #so39',

                    ), 400);
                }
            }
    }

    //edit pencapaian
    public function showeditpencapaian($id){

        $DataPencapaian = DataPencapaian::where('id_user', '=', Auth::id())->get();
             return view('admin.dashboard.pemohon.editpencapaian')
            ->with('datapenc', $DataPencapaian);

    }

    public function tambahanpenc(Request $request){
        $input = Input::all();
        if ($input['typepenc'] == 1) {
                DataPencapaian::create(array_merge($request->all(), ['id_user' => Auth::id()]));
         }else{
            return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #d2v213',

                    ), 400);
         }
    }

    public function destroypencapaian($id){

         if (empty($id) === true) {
           return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #wdfg43',

                    ), 400);
        }else{
            DB::table('datapencapaian')->where('id_pencapaian', $id)->delete();
        }
    }


    public function updatepencapaian(){

        $input = Input::all();

        if (empty($input['typepencapaian']) === false ) {

                if ($input['typepencapaian']) {
                    DB::table('datapencapaian')
                    ->where('id_pencapaian', $input['typepencapaian'])
                    ->update([

                        'bidang_penghargaan' => $input['bidang_penghargaan'],
                        'bentuk_penghargaan' => $input['bentuk_penghargaan'],
                        'tahun_penghargaan' => $input['tahun_penghargaan'],
                        'updated_at' => \Carbon\Carbon::now()
                    ]);

                }else{
                    return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #ddfe4',

                    ), 400);
                }
            }
    }

    //edit pengalaman kerja dan organisasi
    public function showeditpengalamankerjadanorganisasi($id){

       
        $bidangpend = DataPengalamanKerjaPendidikan::where('id_user', '=', Auth::id())->get();
        $bidangnonpend = DataPengalamanKerjaNonPendidikan::where('id_user', '=', Auth::id())->get();
        $bidangorg = DataPengalamanOrganisasi::where('id_user', '=', Auth::id())->get();
        return view('admin.dashboard.pemohon.editpengalamankerjaorganisasi')
        ->with('bidangpend', $bidangpend)
        ->with('bidangnonpend', $bidangnonpend)
        ->with('bidangorg', $bidangorg);

    }

    //pengalaman oerganisasi

    public function destroyorgan($id){

        if (empty($id) === true) {
           return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #wdfg43',

                    ), 400);
        }else{
            DB::table('pengalaman_organisasi')->where('id_pengalamanorganisasi', $id)->delete();
        }
    }

    public function tambahorgan(Request $request){

        $input = Input::all();
        if ($input['typeorgan'] == 1) {
                DataPengalamanOrganisasi::create(array_merge($request->all(), ['id_user' => Auth::id()]));
         }else{
            return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #werfd3213',

                    ), 400);
         }

    }

    public function updateorgan(){

        $input = Input::all();

        if (empty($input['id_org']) === false ) {

                if ($input['id_org']) {
                    DB::table('pengalaman_organisasi')
                    ->where('id_pengalamanorganisasi', $input['id_org'])
                    ->update([

                        'nama_organisasi' => $input['nama_organisasi'],
                        'posisi_organisasi' => $input['posisi_organisasi'],
                        'kotaorganisasi' => $input['kotaorganisasi'],
                        'deskripsitugasorganisasi' => $input['deskripsitugasorganisasi'],
                        'mulaiorganisasi' => $input['mulaiorganisasi'],
                        'selesaiorganisasi' => $input['selesaiorganisasi'],
                        'updated_at' => \Carbon\Carbon::now()
                    ]);

                }else{
                    return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #ds3sd034',

                    ), 400);
                }
            }

    }


    //pengalaman kerja bidang non pendidikan

    public function tambahpkbnonpen(Request $request){

        $input = Input::all();
        if ($input['pk_nonpentambah'] == 1) {
                DataPengalamanKerjaNonPendidikan::create(array_merge($request->all(), ['id_user' => Auth::id()]));
         }else{
            return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #werfd3213',

                    ), 400);
         }

    }

    public function updatepkbnonpend(){

        $input = Input::all();

        if (empty($input['pk_nonpen']) === false ) {

                if ($input['pk_nonpen']) {
                    DB::table('pengalaman_kerja_non_pend')
                    ->where('id_pk_nonpendidikan', $input['pk_nonpen'])
                    ->update([

                        'nama_perusahaan_np' => $input['nama_perusahaan_np'],
                        'Jabatan_np' => $input['Jabatan_np'],
                        'gaji_np' => $input['gaji_np'],
                        'deskripsi_np' => $input['deskripsi_np'],
                        'mulai_np' => $input['mulai_np'],
                        'selesai_np' => $input['selesai_np'],
                        'alasan_pindah' => $input['alasan_pindah'],
                        'updated_at' => \Carbon\Carbon::now()
                    ]);

                }else{
                    return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #d2a34',

                    ), 400);
                }
            }

        /*$Response = ['success' => 'Berhasil'];
        return response()->json($Response, 200);*/

    }

    public function destroypkbnonpen($id){

        if (empty($id) === true) {
           return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #wese4313',

                    ), 400);
        }else{
            DB::table('pengalaman_kerja_non_pend')->where('id_pk_nonpendidikan', $id)->delete();
        }
    }

    ////////////////////////pengalaman kerja bidang pendidikan//////////////////////////////////////
    public function tambahpkbpen(Request $request){

        $input = Input::all();
        if ($input['typepkbpen'] == 1) {
                DataPengalamanKerjaPendidikan::create(array_merge($request->all(), ['id_user' => Auth::id()]));
         }else{
            return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #wer213',

                    ), 400);
         }
        /*$Response = ['success' => 'Berhasil'];
        return response()->json($Response, 200);*/
    }

    public function destroypkbpen($id){

        if (empty($id) === true) {
           return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #wer213',

                    ), 400);
        }else{
            DB::table('pengalaman_kerja_pend')->where('id_pengalaman_kerja_pend', $id)->delete();
        }
    }

    public function updatepkbpend(){

        $input = Input::all();

        if (empty($input['id_pkpen']) === false ) {

                if ($input['id_pkpen']) {
                    DB::table('pengalaman_kerja_pend')
                    ->where('id_pengalaman_kerja_pend', $input['id_pkpen'])
                    ->update([

                        'nama_sekolah' => $input['nama_sekolah'],
                        'jenis_pekerjaan' => $input['jenis_pekerjaan'],
                        'jenis_pelajaran' => $input['jenis_pelajaran'],
                        'gaji' => $input['gaji'],
                        'pk_pend_mulai' => $input['pk_pend_mulai'],
                        'pk_pend_selesai' => $input['pk_pend_selesai'],
                        'updated_at' => \Carbon\Carbon::now()
                    ]);

                }else{
                    return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #g334',

                    ), 400);
                }
            }
        /*$Response = ['success' => 'Berhasil'];
        return response()->json($Response, 200);*/
    }
    //edit pengalaman kerja dan organisasi

    //edit pendidikan non formal
    public function showeditpendnonformal($id){

        $nonformal = DataPendNonFormal::where('id_user', '=', Auth::id())->get();
        return view('admin.dashboard.pemohon.editpendnonformal')->with('nonformal', $nonformal);

    }

    public function updatenf(){

        $input = Input::all();

        if (empty($input['nf_id']) === false ) {

                if ($input['nf_id']) {
                    DB::table('datapendnonformal')
                    ->where('id_pen_nonformal', $input['nf_id'])
                    ->update([

                        'jenis_pelatihan' => $input['jenis_pelatihan'],
                        'nama_penyelenggara' => $input['nama_penyelenggara'],
                        'kota' => $input['kota'],
                        'nf_mulai' => $input['nf_mulai'],
                        'nf_selesai' => $input['nf_selesai'],
                        'updated_at' => \Carbon\Carbon::now()
                    ]);

                }else{
                    return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #g334',

                    ), 400);
                }
            }

    }

    public function tambahannf(Request $request){
         $input = Input::all();

         if ($input['settambahnf'] == 1) {
                DataPendNonFormal::create(array_merge($request->all(), ['id_user' => Auth::id()]));
         }else{
            return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #23f334',

                    ), 400);
         }
         

    }
    public function destroynf($id){

        DB::table('datapendnonformal')->where('id_pen_nonformal', $id)->delete();

    }
    //edit pendidikan non formal


    //edit pendidikan
    public function showeditpendidikan($id){

        $data = DataPendidikan::where('id_user', '=', Auth::id())->first();
        $kampus = DataPerguruanTinggi::where('id_user', '=', Auth::id())->get();
        return view('admin.dashboard.pemohon.editpendidikan', $data)->with('kampus', $kampus);

    }

    public function updatesmpsma(){

        $input = Input::all();

        if (empty($input['id_pendidikansmp']) === false ) {

            if ($input['id_pendidikansmp']) {
                DB::table('datapendidikan')
                ->where('id_pendidikan', $input['id_pendidikansmp'])
                ->update([

                    'smp_namasekolah' => $input['smp_namasekolah'],
                    'smp_tahunmulai' => $input['smp_tahunmulai'],
                    'smp_tahunselesai' => $input['smp_tahunselesai'],
                    'updated_at' => \Carbon\Carbon::now()
                ]);

            }else{
                return Response::json(array(
                    'success' => false,
                    'errors' => 'Gagal Memproses Data #g334',

                ), 400);
            }
        }

        if (empty($input['id_pendidikansma']) === false ) {

            if ($input['id_pendidikansma']) {
                DB::table('datapendidikan')
                ->where('id_pendidikan', $input['id_pendidikansma'])
                ->update([

                    'sma_namasekolah' => $input['sma_namasekolah'],
                    'sma_jurusan' => $input['sma_jurusan'],
                    'sma_tahunmulai' => $input['sma_tahunmulai'],
                    'sma_tahunselesai' => $input['sma_tahunselesai'],
                    'updated_at' => \Carbon\Carbon::now()
                ]);
            }else{
                 return Response::json(array(
                    'success' => false,
                    'errors' => 'Gagal Memproses Data #ert3',

                ), 400);
            }
        }

    }
    public function updateperting(){

        $input = Input::all();
        if (empty($input['id_perguruantinggi']) === false ) {

            if ($input['id_perguruantinggi']) {
                 DB::table('dataperguruantinggi')
                    ->where('id_perguruantinggi', $input['id_perguruantinggi'])
                    ->update([
                        'pt_nama' => $input['pt_nama'],
                        'pt_jenjang' => $input['pt_jenjang'],
                        'pt_studi' => $input['pt_studi'],
                        'pt_ipk' => $input['pt_ipk'],
                        'pt_mulai' => $input['pt_mulai'],
                        'pt_selesai' => $input['pt_selesai'],
                        'updated_at' => \Carbon\Carbon::now()
                    ]);
            }else{
                 return Response::json(array(
                    'success' => false,
                    'errors' => 'Gagal Memproses Data #rfgs434',

                ), 400);
            }
             
        }

    }
    //edit pendidikan
    
    //hapus pendidikan perguruan tinggi
    public function destroypt($id){

        DB::table('dataperguruantinggi')->where('id_perguruantinggi', $id)->delete();

    }
    //hapus pendidikan perguruan tinggi





    //edit kesehatan
    public function showeditkesehatan($id){

        $data = Kesehatan::where('id_user', '=', Auth::id())->first();

        $name = explode(',',$data->nama_penyakit);

        return view('admin.dashboard.pemohon.editkesehatan',$data)->with('name', $name);
        
    }   

    public function updatekesehatan(Request $request, $id){

            $messages = [
                'required' => 'Atribut Dibutuhkan',
            ];
            $Validatorupdatekesehatan = Validator::make(
                $request->all(),
                [     
                    'lainnya' => 'max:255',
                ],
                $messages
            );

            if ($Validatorupdatekesehatan->fails()) {
                
                return Response::json(array(
                    'success' => false,
                    'errors' => $Validatorupdatekesehatan->messages()->toArray()

                ), 400);
                
            }else{

                $deletefirst = DB::table('datakesehatan')->where('id_user', $id)->delete();

                if ($deletefirst) {

                    $datakesehatan = new Kesehatan;
                    $datakesehatan->id_user = Auth::id();
                    $datakesehatan->nama_penyakit = $request->asma.$request->malaria.$request->tbc.$request->ginjal.$request->patah_tulang.$request->ayan.$request->insomnia.$request->gangguan_berjalan.$request->radang_tenggorokan.$request->demam_berdarah.$request->migrain.$request->cacat_tubuh.$request->jantung.$request->hepatitis.$request->lambung;
                    $datakesehatan->penyakit_lainnya = $request->lainnya;; 
                    $datakesehatan->save();
                   

                }else{
                   return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #soj3098',

                    ), 400);
                }
            }
    }
    //edit kesehatan

    //edit data diri
    public function showeditdatadiri($id){

        $data = DataDiri::where('id_user', '=', Auth::id())->first();
        $cekkota = $this->nama_kota($data->tempatlahir_kota);

        $provinsi = DB::table('provinsi')->get();
        return view('admin.dashboard.pemohon.editpemohon', $data)
        ->with('list_provinsi', $provinsi)
        ->with('cekkota', $cekkota);

    }    

    public function updatedatadiri($id){

        $input = Input::all();

        if (empty($input['nama_pasangan']) && empty($input['pekerjaan_pasangan']) && empty($input['nomor_telepon_pasangan']) && empty($input['jumlah_anak'])) {

            $nama_pasangan =  null;
            $pekerjaan_pasangan =  null;
            $nomor_telepon_pasangan  =  null;
            $jumlah_anak  = null;
            
        }else{

            $nama_pasangan =  $input['nama_pasangan'];
            $pekerjaan_pasangan =  $input['pekerjaan_pasangan'];
            $nomor_telepon_pasangan  =  $input['nomor_telepon_pasangan'];
            $jumlah_anak  =  $input['jumlah_anak'];    
                   
        }

        DB::table('datadiri')
            ->where('id_user', $id)
            ->update([

                'nama_lengkap' => $input['nama_lengkap'],
                'nama_mandarin' => $input['nama_mandarin'],
                'no_ktp' => $input['no_ktp'],
                'no_npwp' => $input['no_npwp'],
                'masa_berlaku_ktp' => $input['masa_berlaku_ktp'],

                'kartu_keluarga' => $input['kartu_keluarga'],
                'paspor' => $input['paspor'],
                'sim_a' => $input['sim_a'],
                'sim_b' => $input['sim_b'],
                'sim_c' => $input['sim_c'],
                'bpjs_kesehatan' => $input['bpjs_kesehatan'],
                'bpjs_tenagakerja' => $input['bpjs_tenagakerja'],
                'bpjs_jaminanpensiun'=> $input['bpjs_jaminanpensiun'],


                'tempatlahir_provinsi' => $input['tempatlahir_provinsi'],
                'tempatlahir_kota' => $input['tempatlahir_kota'],
                'tanggal_lahir' => $input['tanggal_lahir'],
                'golongan_darah' => $input['golongan_darah'],
                'nomor_telepon' => $input['nomor_telepon'],
                'nomor_telepon2' => $input['nomor_telepon2'],
                'nomor_wa' => $input['nomor_wa'],
                'alamat_sekarang' => $input['alamat_sekarang'],
                'agama' => $input['agama'],

                'nomor_rekening' => $input['nomor_rekening'],
                'email' => $input['email'],
                'kepemilikan_tempat_tinggal' => $input['kepemilikan_tempat_tinggal'],
                'jenis_kelamin' => $input['jenis_kelamin'],
                'tinggi_badan' => $input['tinggi_badan'],
                'berat_badan' => $input['berat_badan'],

                'anak_ke' => $input['anak_ke'],
                'jumlah_saudara' => $input['jumlah_saudara'],
                'status_marital' => $input['status_marital'],

                'nama_pasangan' => $nama_pasangan,
                'pekerjaan_pasangan' => $pekerjaan_pasangan,
                'nomor_telepon_pasangan' => $nomor_telepon_pasangan,
                'jumlah_anak' => $jumlah_anak,

                'nama_ayah' => $input['nama_ayah'],
                'nama_ibu' => $input['nama_ibu'],
                'pekerjaan_ayah' => $input['pekerjaan_ayah'],
                'pekerjaan_ibu' => $input['pekerjaan_ibu'],
                'nomor_telepon_ayah' => $input['nomor_telepon_ayah'],
                'nomor_telepon_ibu' => $input['nomor_telepon_ibu'],
                'hobi' => $input['hobi'],
                'status_cpns' => $input['status_cpns'],
                'status_merokok' => $input['status_merokok'],
                'minat_olahraga' => $input['minat_olahraga'],
                'status_beasiswa' => $input['status_beasiswa'],
                'kesediaan_lama_bekerja' => $input['kesediaan_lama_bekerja'],

                'nama_nodarurat' => $input['nama_nodarurat'],
                'hubungan_nodarurat' => $input['hubungan_nodarurat'],
                'nomor_darurat' => $input['nomor_darurat'],
                'kota_nodarurat' => $input['kota_nodarurat'],

                'nama_nodarurat2' => $input['nama_nodarurat2'],
                'hubungan_nodarurat2' => $input['hubungan_nodarurat2'],
                'nomor_darurat2' => $input['nomor_darurat2'],

                'nama_wali' => $input['nama_wali'],
                'alamat_wali' => $input['alamat_wali'],
                'nomor_wali' => $input['nomor_wali']

            ]);


    }
    //edit data diri

    public function showtambah(){
    	$provinsi = DB::table('provinsi')->get();
    	return view('admin.dashboard.pemohon.tambahpemohon')->with('list_provinsi', $provinsi);
    	
    }
    //pengalamankerja
    public function showtambahpengalamankerja(){
       
       return view('admin.dashboard.pemohon.tambahpengalamankerja');
        
    }

    public function receive_bahasa_dan_keahlian(Request $request){

        $countdataberbahasaasing = DataBerbahasaAsing::where('id_user',Auth::id())->count();
        $countdatakeahlianlainnya = DataKeahlianLainnya::where('id_user',Auth::id())->count();

        if (($countdataberbahasaasing > 0) && ($countdatakeahlianlainnya > 0)) {

            return Response::json(array(
                'success' => false,
                'errors' => 'Data bahasa dan keahlian Anda sudah ada'

            ), 400); 

        }else{

             //bahasa asing
            $messages = [
                'required' => 'Atribut Dibutuhkan',
            ];
            $Validatorbahasakeahlian = Validator::make(
                $request->all(),
                [     
                    'jenis_bahasa.*' => 'required',
                    'lisan_bahasa.*' => 'required',
                    'tulisan_bahasa.*' => 'required',
                ],
                $messages
            );

            if ($Validatorbahasakeahlian->fails()) {
                
                return Response::json(array(
                    'success' => false,
                    'errors' => $Validatorbahasakeahlian->messages()->toArray()

                ), 400);
                
            }else{

                for ($i = 0; $i < count($request->input('jenis_bahasa')); $i++) {
                    $answersbahasa[] = [
                        'id_user' => Auth::id(),
                        'jenis_bahasa' => $request->input('jenis_bahasa')[$i],
                        'lisan_bahasa' => $request->input('lisan_bahasa')[$i],
                        'tulisan_bahasa' => $request->input('tulisan_bahasa')[$i],
                        'created_at' =>  \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now()
                    ];
                }
                DataBerbahasaAsing::insert($answersbahasa);
                 //keahlian lainnya

                $datakeahlian = new DataKeahlianLainnya;
                $datakeahlian->jenis_keahlian = $request->alatmusik.$request->bernyanyi.$request->menari.$request->menjahit.$request->menyulam.$request->memasak.$request->melukis;
                $datakeahlian->keahlian_lainnya = $request->keahlianlainnya;
                $datakeahlian->id_user = Auth::id();
                $datakeahlian->save();

                $Response = ['success' => 'success bahasa'];
                return response()->json($Response, 200);
            }  
        }

    }
    //receive pekerjaan yang dilamar
    public function receivepekerjaanyangdilamar(Request $request){

        $countpekerjaanlamaran = DataPekerjaanLamaran::where('id_user',Auth::id())->count();

        if ($countpekerjaanlamaran > 0) {
           return Response::json(array(
                'success' => false,
                'errors' => 'Data Pekerjaan Yang Dilamar Anda sudah ada'

            ), 400); 
        }else{
       
            $messages = [
                'required' => 'Atribut Dibutuhkan',
            ];
            $Validator = Validator::make(

                $request->all(),
                [     
                    'tingkat' => 'required',
                    'posisi' => 'required',
                    'penghasilan' => 'required',
                    'alasan_melamar' => 'required',
                    'tanggung_jawab' => 'required',
                    
                ],
                $messages
            );

            if ($Validator->fails()) {
                
                return Response::json(array(
                    'success' => false,
                    'errors' => $Validator->messages()->toArray()

                ), 400);
                
            }else{

                DataPekerjaanLamaran::create(array_merge($request->all(), ['id_user' => Auth::id()]));
                //$Response = ['success' => 'Berhasil input'];
            }
        }
    }

    //pencapaian
    public function receivepencapaian(Request $request){

        $countpencapaian = DataPencapaian::where('id_user',Auth::id())->count();

        if ($countpencapaian > 0) {
           return Response::json(array(
                'success' => false,
                'errors' => 'Data Pencapaian Anda sudah ada'

            ), 400); 
        }else{

            if (($request->input('typepencapaian') != null) && ($request->input('typepencapaian') == 1)) {

            $messages = [
                'required' => 'Atribut Dibutuhkan',
            ];
            $Validatorpencapaian = Validator::make(
                $request->all(),
                [     
                    'bidang_penghargaan.*' => 'required',
                    'bentuk_penghargaan.*' => 'required',
                    'tahun_penghargaan.*' => 'required',
                ],
                $messages
            );

            for ($i = 0; $i < count($request->input('bidang_penghargaan')); $i++) {
                $answerspencapaian[] = [
                    'id_user' => Auth::id(),
                    'bidang_penghargaan' => $request->input('bidang_penghargaan')[$i],
                    'bentuk_penghargaan' => $request->input('bentuk_penghargaan')[$i],
                    'tahun_penghargaan' => $request->input('tahun_penghargaan')[$i],
                    'created_at' =>  \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ];
            }

                if ($Validatorpencapaian->fails()) {
                    
                    return Response::json(array(
                        'success' => false,
                        'errors' => $Validatorpencapaian->messages()->toArray()

                    ), 400);
                    
                }else{
                    DataPencapaian::insert($answerspencapaian);
                    $Response = ['success' => $messages];
                }
            }
            else{
                DataPencapaian::create(array_merge($request->all(), ['id_user' => Auth::id()]));
                $Response = ['success' => 'Berhasil'];
                return response()->json($Response, 200);
            }
        }
    }


    public function receivepengalamankerja(Request $request){

        $countpengalamankerja = DataPengalamanKerjaPendidikan::where('id_user',Auth::id())->count();
        $countpengalamankerjanonpen = DataPengalamanKerjaNonPendidikan::where('id_user',Auth::id())->count();
        $countorganisasi = DataPengalamanOrganisasi::where('id_user',Auth::id())->count();

        if (($countpengalamankerja > 0) && ($countpengalamankerjanonpen > 0) && ($countorganisasi > 0)) {
            return Response::json(array(
                'success' => false,
                'errors' => 'Data Pengalaman kerja dan organisasi sudah ada'

            ), 400); 
        }else{
            //pengalaman kerja bidang pendidikan dan nonpendidikan dan organisasi
            if (($request->input('typependidikan') != null) && ($request->input('typependidikan') == 1)) {

                    $messages = [
                        'required' => 'Atribut Dibutuhkan',
                    ];
                    $Validator = Validator::make(
                        $request->all(),
                        [     
                            'nama_sekolah.*' => 'required',
                            'jenis_pekerjaan.*' => 'required',
                            'gaji.*' => 'required',
                            'pk_pend_mulai.*' => 'required',
                            'pk_pend_selesai.*' => 'required',
                        ],
                        $messages
                    );

                    for ($i = 0; $i < count($request->input('nama_sekolah')); $i++) {
                        $answers[] = [
                            'id_user' => Auth::id(),
                            'nama_sekolah' => $request->input('nama_sekolah')[$i],
                            'jenis_pekerjaan' => $request->input('jenis_pekerjaan')[$i],
                            'jenis_pelajaran' => $request->input('jenis_pelajaran')[$i],
                            'gaji' => $request->input('gaji')[$i],
                            'pk_pend_mulai' => $request->input('pk_pend_mulai')[$i],
                            'pk_pend_selesai' => $request->input('pk_pend_selesai')[$i],
                            'created_at' =>  \Carbon\Carbon::now(),
                            'updated_at' => \Carbon\Carbon::now()
                        ];
                    }

                    if ($Validator->fails()) {
                        return Response::json(array(
                            'success' => false,
                            'errors' => $Validator->messages()->toArray()

                        ), 400);
                    }else{
                        DataPengalamanKerjaPendidikan::insert($answers);
                    }
            }else{
                DataPengalamanKerjaPendidikan::create(array_merge($request->all(), ['id_user' => Auth::id()]));
            }
            //Bidang non pendidikan
            if(($request->input('typenonpendidikan') != null) && ($request->input('typenonpendidikan') == 1)){

                    $messages = [
                        'required' => 'Atribut Dibutuhkan',
                    ];
                    $Validator2 = Validator::make(
                        $request->all(),
                        [     
                            'nama_perusahaan_np.*' => 'required',
                            'Jabatan_np.*' => 'required',
                            'gaji_np.*' => 'required',
                            'deskripsi_np.*' => 'required',
                            'mulai_np.*' => 'required',
                            'selesai_np.*' => 'required',
                            'alasan_pindah.*' => 'required',
                        ],
                        $messages
                    );

                    for ($i = 0; $i < count($request->input('nama_perusahaan_np')); $i++) {
                        $answersnonpendidikan[] = [
                            'id_user' => Auth::id(),
                            'nama_perusahaan_np' => $request->input('nama_perusahaan_np')[$i],
                            'Jabatan_np' => $request->input('Jabatan_np')[$i],
                            'gaji_np' => $request->input('gaji_np')[$i],
                            'deskripsi_np' => $request->input('deskripsi_np')[$i],
                            'mulai_np' => $request->input('mulai_np')[$i],
                            'selesai_np' => $request->input('selesai_np')[$i],
                            'alasan_pindah' => $request->input('alasan_pindah')[$i],
                            'created_at' =>  \Carbon\Carbon::now(),
                            'updated_at' => \Carbon\Carbon::now()
                        ];
                    }    

                    if ($Validator2->fails()) {
                        return Response::json(array(
                            'success' => false,
                            'errors' => $Validator2->messages()->toArray()

                        ), 400);       
                    }else{
                        DataPengalamanKerjaNonPendidikan::insert($answersnonpendidikan);
                    }
                }else{
                    DataPengalamanKerjaNonPendidikan::create(array_merge($request->all(), ['id_user' => Auth::id()]));
                }   

             //Bidang Organisasi
            if(($request->input('typeorganisasi') != null) && ($request->input('typeorganisasi') == 1)){

                    $messages = [
                        'required' => 'Atribut Dibutuhkan',
                    ];
                    $Validator3 = Validator::make(
                        $request->all(),
                        [     
                            'nama_organisasi.*' => 'required',
                            'posisi_organisasi.*' => 'required',
                            'kotaorganisasi.*' => 'required',
                            'deskripsitugasorganisasi.*' => 'required',
                            'mulaiorganisasi.*' => 'required',
                            'selesaiorganisasi.*' => 'required',
                        ],
                        $messages
                    );

                    for ($i = 0; $i < count($request->input('nama_organisasi')); $i++) {
                        $answersorganisasi[] = [
                            'id_user' => Auth::id(),
                            'nama_organisasi' => $request->input('nama_organisasi')[$i],
                            'posisi_organisasi' => $request->input('posisi_organisasi')[$i],
                            'kotaorganisasi' => $request->input('kotaorganisasi')[$i],
                            'deskripsitugasorganisasi' => $request->input('deskripsitugasorganisasi')[$i],
                            'mulaiorganisasi' => $request->input('mulaiorganisasi')[$i],
                            'selesaiorganisasi' => $request->input('selesaiorganisasi')[$i],
                            'created_at' =>  \Carbon\Carbon::now(),
                            'updated_at' => \Carbon\Carbon::now()
                        ];
                    }    

                    if ($Validator3->fails()) {
                        return Response::json(array(
                            'success' => false,
                            'errors' => $Validator3->messages()->toArray()

                        ), 400);       
                    }else{
                        DataPengalamanOrganisasi::insert($answersorganisasi);
                    }
                }else{
                    DataPengalamanOrganisasi::create(array_merge($request->all(), ['id_user' => Auth::id()]));
                }
        }

    }


    //pendidikan nonformal
    public function recievependnonformal(Request $request){

        $countpnonformal = DataPendNonFormal::where('id_user',Auth::id())->count();
        if ($countpnonformal > 0) {
            return Response::json(array(
                'success' => false,
                'errors' => 'Data Pendidikan Non Formal Sudah Ada'

            ), 400);   
        }else{

            if (($request->input('typenonformal') != null) && ($request->input('typenonformal') == 1)){

                $messages = [
                    'required' => 'Atribut Dibutuhkan',
                    'numeric' => 'Masukan Hanya Berupa Angka',
                    'email' => 'Masukan Harus Email'
                ];
                $Validator = Validator::make(
                    $request->all(),
                    [     
                        'jenis_pelatihan.*' => 'required',
                        'nama_penyelenggara.*' => 'required',
                        'kota.*' => 'required',
                        'nf_mulai.*' => 'required',
                        'nf_selesai.*' => 'required',
                    ],
                    $messages
                );

                for ($i = 0; $i < count($request->input('jenis_pelatihan')); $i++) {
                    $answers[] = [
                        'id_user' => Auth::id(),
                        'jenis_pelatihan' => $request->input('jenis_pelatihan')[$i],
                        'nama_penyelenggara' => $request->input('nama_penyelenggara')[$i],
                        'kota' => $request->input('kota')[$i],
                        'nf_mulai' => $request->input('nf_mulai')[$i],
                        'nf_selesai' => $request->input('nf_selesai')[$i],
                        'created_at' =>  \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now()
                    ];
                }

                 if ($Validator->fails()) {
                    return Response::json(array(
                        'success' => false,
                        'errors' => $Validator->messages()->toArray()

                    ), 400);
                }else{
                    DataPendNonFormal::insert($answers);
                    //return response()->json($Response, 200);
                }
            }else{
                DataPendNonFormal::create(array_merge($request->all(), ['id_user' => Auth::id()]));
            }
        }
    }
    //kesehatan
    public function recievekesehatan(Request $request){

        $countkesehatan = Kesehatan::where('id_user',Auth::id())->count();
        if ($countkesehatan > 0) {

            return Response::json(array(
                'success' => false,
                'errors' => 'Data Kesehatan Anda Sudah Ada'

            ), 400);

        }else{

            $datakesehatan = new Kesehatan;
            $datakesehatan->id_user = Auth::id();
            $datakesehatan->nama_penyakit = $request->asma.$request->malaria.$request->tbc.$request->ginjal.$request->patah_tulang.$request->ayan.$request->insomnia.$request->gangguan_berjalan.$request->radang_tenggorokan.$request->demam_berdarah.$request->migrain.$request->cacat_tubuh.$request->jantung.$request->hepatitis.$request->lambung;
            $datakesehatan->penyakit_lainnya = $request->lainnya;; 
            $datakesehatan->save();
        }
        
        
    }
    //pendidikan

    public function tambahanpt(Request $request){

        if ($request->input('typetambahanpt') == 1 ) {
            DataPerguruanTinggi::create(array_merge($request->all(), ['id_user' => Auth::id()]));
        }else{
             return Response::json(array(
                'success' => false,
                'errors' => 'Gagal Melakukan Proses #feg234'

            ), 400);

        }
        

    }

    public function recievependidikan(Request $request){

        $countpendidikan = DataPendidikan::where('id_user',Auth::id())->count();
        $countptinggi = DataPerguruanTinggi::where('id_user',Auth::id())->count();

    
        if (($countpendidikan > 0) && ($countptinggi > 0)) {

           return Response::json(array(
                'success' => false,
                'errors' => 'Data Pendidikan Anda Sudah Ada'

            ), 400);

        }else{

            if (($request->input('typependidikanlanjut') != null) && ($request->input('typependidikanlanjut') == 1)) {

                     for ($i = 0; $i < count($request->input('pt_nama')); $i++) {
                        $answers[] = [
                            'id_user' => Auth::id(),
                            'pt_jenjang' => $request->input('pt_jenjang')[$i],
                            'pt_nama' => $request->input('pt_nama')[$i],
                            'pt_studi' => $request->input('pt_studi')[$i],
                            'pt_ipk' => $request->input('pt_ipk')[$i],
                            'pt_mulai' => $request->input('pt_mulai')[$i],
                            'pt_selesai' => $request->input('pt_selesai')[$i],
                            'created_at' =>  \Carbon\Carbon::now(),
                            'updated_at' => \Carbon\Carbon::now()
                        ];
                    }

                    DataPerguruanTinggi::insert($answers);
                }else{
                    DataPerguruanTinggi::create(array_merge($request->all(), ['id_user' => Auth::id()]));
                }
               
            if (($request->input('typesmp') != null) && ($request->input('typesmp') == 1)) {
                DataPendidikan::create(array_merge($request->all(), ['id_user' => Auth::id()]));
            }else{
                DataPendidikan::create(array_merge($request->all(), ['id_user' => Auth::id()]));
            }
        }
    }

    //datadiri
    public function recieve(Request $request){

    	$messages = [
    		'required' => 'Atribut Dibutuhkan',
            'numeric' => 'Masukan Hanya Berupa Angka',
            'email' => 'Masukan Harus Email'
    		//'numeric' => 'Masukan Berupa Angka'
    	];
    	$Validator = Validator::make(

    		$request->all(),
    		[     
                'nama_lengkap' => 'required',
                'no_ktp' => 'required|numeric',
                'masa_berlaku_ktp' => 'required',

                'tempatlahir_provinsi' => 'required',
                'tempatlahir_kota' => 'required',
                'tanggal_lahir' => 'required|date',
                'golongan_darah' => 'required',
                'nomor_telepon' => 'required',
                'alamat_sekarang' => 'required',
                'agama' => 'required',

                'email' => 'required|email',
                'kepemilikan_tempat_tinggal' => 'required',
                'jenis_kelamin' => 'required',
                'anak_ke' => 'required',
                'jumlah_saudara' => 'required',
                'status_marital' => 'required',
                'nama_pasangan' => 'sometimes|required',
                'pekerjaan_pasangan' => 'sometimes|required',
                'nomor_telepon_pasangan' => 'sometimes|required',
                'jumlah_anak' => 'sometimes|required',
                'nama_ayah' => 'required',
                'nama_ibu' => 'required',
                'hobi' => 'required',
                'status_cpns' => 'required',
                'status_merokok' => 'required',
                'minat_olahraga' => 'required',
                'status_beasiswa' => 'required',
                'kesediaan_lama_bekerja' => 'required',
                'nama_nodarurat' => 'required',
                'hubungan_nodarurat' => 'required',
                'nomor_darurat' => 'required',
                'kota_nodarurat' => 'required',

                'nama_wali' => 'required',
                'alamat_wali' => 'required',
                'nomor_wali' => 'required'
    		],
    		$messages
    	);

    	if ($Validator->fails()) {
    		
            return Response::json(array(
                'success' => false, 
                'errors' => $Validator->messages()->toArray()

            ), 400);
            
    	}else{

    		DataDiri::create(array_merge($request->all(), ['id_user' => Auth::id(), 'status' => '2', 'status_finish' => '2']));
    		$Response = ['success' => 'Berhasil input'];
    	}
        return response()->json($Response, 200);
    	
    	
    }

    //Tambah Pendidikan Beta
    public function showtambahpend(){
        return view('admin.dashboard.pemohon.tambahpendidikan');
    }


    //UPLOAD HASIL APTITUDE DAN DISC
    Public Function uploaddiscaptitude(Request $request){

        $files = $request->file('files');
        $name = $files->getClientOriginalName();
        $size = $files->getSize();
        $extention = $files->getClientOriginalExtension();

        $cekfileExist = TesAptiDisc::where([['id_user', '=', Auth::id()],['tipe_tes', '=', $request->tipetes]])->count();
       
        if ($cekfileExist > 0) {
            return Redirect::back()->with('error2', 'Tes Disc Sudah Diupload Harap Hapus File Sebelumnya');
        }else{

                $path = public_path().'/berkas_tes/soaltes/' .Auth::id();
                  if(empty($errors)==true){
                      if(!File::isDirectory($path)){
                            Storage::makeDirectory($path, $mode = 0777, true, true);
                          }
                          if(File::isDirectory("$path/".$name)==false){
                               if (file_exists($path.'/'.$name)) {
                                return Redirect::back()->with('error2', 'File '.$name.' Sudah Ada');
                                die;
                              }
                              $files->move("$path/",$name);
                          }else{                  // rename the file if another one exist
                                return Redirect::back()->with('error', 'Terjadi Kesalahan');
                          }
                      }else{
                              print_r($errors);
                      }

                    DB::table('berkas_apti_disc')->insert(
                        ['id_user' => Auth::id(), 'nama_file' => $name, 'size_file' => $size, 'type_file' => $extention,'tipe_tes' => $request->tipetes]
                    );

            return Redirect::back()->with('success2', 'Berhasil Upload File '.$name.'');
        }
    }

    //Hapus hasil Tes Aptitude
    public function DestroyHasilAptitude($id){

        $cekdata = DB::table('berkas_apti_disc')->select('*')
        ->where('id_apti_disc', '=', $id)
        ->count();

        if ($cekdata < 1) {

           return Redirect::back()->with('error2', 'Data Mungkin Sudah Dihapus');

        }else{

            $cek = DB::table('berkas_apti_disc')->select('*')
            ->where('id_apti_disc' ,'=', $id)
            ->first();

            $cek_berkas = File::delete(public_path()."/berkas_tes/soaltes/".$cek->id_user."/".$cek->nama_file);

            if ($cek_berkas) {

                DB::table('berkas_apti_disc')->where('id_apti_disc', '=' , $id)->delete();
                return Redirect::back()->with('success2', 'Berhasil Hapus File '.$cek->nama_file.'');

            }else{
                return Redirect::back()->with('error2', 'Terjadi Kesalahan Hapus File '.$cek->nama_file.'');
            }
        }
    }   

    //Hapus hasil Tes Disc
    public function DestroyHasilDisc($id){

        $cekdata = DB::table('berkas_apti_disc')->select('*')
        ->where('id_apti_disc', '=', $id)
        ->count();

        if ($cekdata < 1) {

           return Redirect::back()->with('error2', 'Data Mungkin Sudah Dihapus');

        }else{

            $cek = DB::table('berkas_apti_disc')->select('*')
            ->where('id_apti_disc' ,'=', $id)
            ->first();

            $cek_berkas = File::delete(public_path()."/berkas_tes/soaltes/".$cek->id_user."/".$cek->nama_file);

            if ($cek_berkas) {

                DB::table('berkas_apti_disc')->where('id_apti_disc', '=' , $id)->delete();
                return Redirect::back()->with('success2', 'Berhasil Hapus File '.$cek->nama_file.'');

            }else{
                return Redirect::back()->with('error2', 'Terjadi Kesalahan Hapus File '.$cek->nama_file.'');
            }
        }
    }   

    //DOWNLOAD SOAL APTITUDE
    public function downloadsoalaptitude(){


        $file= public_path(). "/berkas_tes/soaltes/soal_aptitude_tes.pdf";

        $headers = [
              'Content-Type' => 'application/pdf',
              'Content-Type:' => 'image/png',
              'Content-Type:' => 'image/jpg',
           ];

        return response()->download($file, "soal_aptitude_tes.pdf", $headers);
    }


    //DOWNLOAD LEMBAR JAWABAN APTITUDE
    public function downloadlembarjawabanaptitude(){

        $file= public_path(). "/berkas_tes/soaltes/lembaran_jawaban_aptitude_tes.xlsx";

        $headers = [
              'Content-Type' => 'application/pdf',
              'Content-Type:' => 'image/png',
              'Content-Type:' => 'image/jpg',
           ];

        return response()->download($file, "lembaran_jawaban_aptitude_tes.xlsx", $headers);
    }

    //DOWNLOAD SOAL DESC
    public function downloadsoaldisc(){


        $file= public_path(). "/berkas_tes/soaltes/soal_tes_disc.docx";

        $headers = [
              'Content-Type' => 'application/pdf',
              'Content-Type:' => 'image/png',
              'Content-Type:' => 'image/jpg',
           ];

        return response()->download($file, "soal_tes_disc.docx", $headers);
    }








    public function kabupatenkota() {   
        # Tarik ID inputan
        $set = Input::get('id');

        # Inisialisasi variabel berdasarkan masing-masing tabel dari model
        # dimana ID target sama dengan ID inputan
        $cekkabupatenkota = DB::table('kabupaten')
        ->select('id_kab','id_prov','nama_kab')
        ->where('id_prov', $set)
        ->get();

        # Buat pilihan "Switch Case" berdasarkan variabel "type" dari form
        switch(Input::get('type')):
            # untuk kasus "kabupaten"
            case 'kabupaten':
                # buat nilai default
                $return = '<option value="">Pilih Kabupaten/Kota...</option>';
                # lakukan perulangan untuk tabel kabupaten lalu kirim
                foreach($cekkabupatenkota as $key ) 
                    # isi nilai return
                    $return .= "<option value='$key->id_kab'>$key->nama_kab</option>";
                  # kirim
                return $return;
            break;
        # pilihan berakhir
        endswitch;    
    }

    protected function nama_kota($id_kota){

        $findkota = DB::table('kabupaten')
        ->select('id_kab','nama_kab')
        ->where('id_kab', $id_kota)
        ->first();

        return $findkota->nama_kab;

    }

    //2.0

    //CEK Tr TABLE
    protected function CekTr($ang,$tipe){
        if ($tipe == 'buka') {if ($ang < 17) { return '';}else{ return '<tr style="font-size: 14px;">'; }}
        if ($tipe == 'tutup') {if ($ang < 17) { return '';}else{ return '</tr>'; } }
    }
    protected function KategoriSoal($kat){
        $vcount = DB::table('s_bank_soal')->join('s_kategorisoalaptitude','s_bank_soal.kategori_soal','=','s_kategorisoalaptitude.id_kategori')
                ->where('s_kategorisoalaptitude.nama_kategori','=',$kat)->count();
        return $vcount;
    }

}
