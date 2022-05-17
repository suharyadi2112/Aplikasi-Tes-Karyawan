<?php

namespace App\Http\Controllers\Pemohon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;

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
 
class TesDisc extends Controller
{

    public function index(){

        $CekStatus = DB::table('d_status_disc')->select('status_disc')->where('id_user','=', Auth::id())->first();

        if (is_null($CekStatus)) {
            $Insrt = DB::table('d_status_disc')->insert(['id_user' => Auth::id(), 'status_disc' => 0, 'created_at' => \Carbon\Carbon::now()]);
            if ($Insrt) {
                return redirect()->route('KerjakanDisc');
            }else{

            }
        }else{
            if ($this->CekSedia(Auth::id()) == false) {
               return Redirect::back()->with('errorhtj', 'Anda Sudah Mengerjakan Tes DISC!');
            }

            $Data = DB::table('d_soal_disc')->get();
            $VData = DB::table('d_grupsoaldisc')->get();
            $VDataStatus = DB::table('d_status_disc')->where('id_user','=',Auth::id())->first();

            return view('admin.dashboard.pemohon.TesDisc.index',['DataSoal' => $Data, 'DataGrupSoal' => $VData,'status_disc' => $CekStatus->status_disc, 'status_info' => $VDataStatus]);
        }

    }

    //MULAI TES ATAU MENGUBAH STATUS
    public function MulaiTes(){

        $Start = DB::table('d_status_disc')->where('id_user','=', Auth::id())->update(['status_disc' => 1,'date_start' => date('Y-m-d'), 'time_start' => date('H:i:s'), 'updated_at' => \Carbon\Carbon::now()]);
        if ($Start) {
            return redirect()->route('KerjakanDisc');
        }else{
            return Redirect()->route('zonatesshow', ['id' => Auth::id()])->with('errorhtj', 'Terjadi kesalahan dalam memulai pengerjaan soal!');
        }

    }


    //POST JAWABAN DISC
    public function PostJawabanDisc(Request $request){

    	$DataDB = DB::table('d_soal_disc')->select('id_soal','id_kelompok')->get();
        $VData = DB::table('d_grupsoaldisc')->get();

        //CEK JAWABAN YANG SEBELUMNYA SUDAH PERNAH DISIMPAN
        if ($this->CekSedia(Auth::id()) == false) {
            return Response::json(array('CekHasil' => '003' ), 200);
        }


    	foreach ($VData as $key => $Vkel) {
            if (is_null($request->input('SoalA'.$Vkel->id)) || empty($request->input('SoalA'.$Vkel->id))) {
                # code...
            }else{
                $PecahA = explode("-", $request->input('SoalA'.$Vkel->id));
                $IsiDataA[] = ['id_soal' => $PecahA[1], 'jawaban' => $PecahA[0], 'id_user' => Auth::id()];
            }
    	}

        foreach ($VData as $key => $Vkel) {
            if (is_null($request->input('SoalB'.$Vkel->id)) || empty($request->input('SoalB'.$Vkel->id))) {
                # code...
            }else{
                $PecahB = explode("-", $request->input('SoalB'.$Vkel->id));
                $IsiDataB[] = ['id_soal' => $PecahB[1], 'jawaban' => $PecahB[0], 'id_user' => Auth::id()];
            }
        }

        if ((empty($IsiDataA) || empty($IsiDataB)) || (empty($IsiDataA) && empty($IsiDataB)))  {
                
            return Response::json(array('CekHasil' => '004', 'id_user' => Auth::id()), 200);

        }else{
             //CEK JAWABAN YANG BELUM DI PILIH
            if ($this->TotalSoalPK(count($IsiDataA), count($IsiDataB)) == false) {
                return Response::json(array('CekHasil' => '004','id_user' => Auth::id() ), 200);
            }

            //MULAI INSERT DATA
            $AInsert = DB::table('d_jawaban_disc')->insert($IsiDataA);
            $BInsert = DB::table('d_jawaban_disc')->insert($IsiDataB);

            if ($AInsert && $BInsert) {

                //UPDATE STATUS DISC
                $Start = DB::table('d_status_disc')->where('id_user','=', Auth::id())->update(['status_disc' => 2,'date_finish' => date('Y-m-d'), 'time_finish' => date('H:i:s'),'timer_disc' => $request->TimerRealTime , 'updated_at' => \Carbon\Carbon::now()]);

                return Response::json(array('CekHasil' => '001' ), 200);
            }else{
                return Response::json(array('CekHasil' => '002' ), 200);
            }   
        }

       
    }

    //CEK DATA JAWABAN AKUN YANG SUDAH PERNAH DISIMPAN
    protected function CekSedia($cekSedia){
        $Data = DB::table('d_jawaban_disc')->select('id_user')->where('id_user','=',$cekSedia)->count();
        if ($Data > 0) {
            return false;
        }else{
            return true;
        }
    }

    //CEK JAWABAN YANG BELUM DIISI
    protected function TotalSoalPK($TotalJawabA, $TotalJawabB){

        $TotalAll = $TotalJawabA + $TotalJawabB;
        $Data = DB::table('d_soal_disc')->count();
        $Tyk = $Data / 2;

        if ($TotalAll < $Tyk) {
            return false;
        }else{
            return true;
        }
    }

}
