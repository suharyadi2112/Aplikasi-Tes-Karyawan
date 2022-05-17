<?php

namespace App\Http\Controllers\AdminUtama;

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
use URL;
use DateTime;
 
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class AdminDisc extends Controller
{
    
	public function RangkumanDisc(Request $request, $id){

		$Data = $this->DataSoal();
		return view('admin.dashboard.adminutama.disc.RangkumanDisc',['DataSoal' => $Data, 'id' => $id]);

	}

	//tampil Data 
	public function RenderData(Request $request){

		//Render Tipe Disc / Core dan Mask
		$StatusCoreMask = $this->ShowTipeDisc($request->id_user);
		//Render Jawaban Tabel
		$TabelJawaban = $this->TabelJawaban($request->id_user);
		//Render NIlai Akhir  
		$TabelNilaiAkhir = $this->RenderTabelNilaiDisc($request->id_user); 
		//Render Data Diri
		$DataDiri = $this->DataDiri($request->id_user);


		
		return Response::json(array('TabelJawaban' => $TabelJawaban, 'TabelNilaiAkhir' => $TabelNilaiAkhir, 'StatusCoreMask' => $StatusCoreMask, 'DataDiri' => $DataDiri), 200);

	}
	//Print (Core Mask)
	public function PrintCoreMask($id_user){

		$data = $this->DataCoreMask($id_user);
		$datadiri = $this->GetDataDiri($id_user);

		if ($data == 'no') {
				return Redirect::back()->with('CoreMask','Pelamar tidak mengisi DISC');
		}else{

			if ($data->isEmpty()) {
				return Redirect::back()->with('CoreMask','Core dan Mask Belum Diisi');
			}else{
				return view('admin.dashboard.adminutama.disc.PrintCoreMask',['id' => $id_user,'data' => $data, 'datadiri' => $datadiri]);
			}
		}

	}

	//mendapatkan data akhir core dan mask
	protected function DataCoreMask($id_user){

		$CekData = DB::table('d_core_mask')->select('jenis_tipe')->where('id_user','=',$id_user)->orderBy('kategori','ASC')->get();

		//check jika pilihan core dan mask sama
		$CekSama = $CekData->unique();

		if (count($CekSama) == '1') {
			$dataOne = DB::table('d_core_mask')
					->select('d_core_mask.jenis_tipe','d_core_mask.kategori','d_report_result_disc.karakteristik','d_report_result_disc.golongan')
					->join('d_report_result_disc','d_report_result_disc.tipe' ,'=','d_core_mask.jenis_tipe')
					->where([['id_user','=',$id_user],['d_core_mask.kategori','=','mask']])
					->get();
		}elseif(count($CekSama) == '2'){
			$dataOne = DB::table('d_core_mask')
					->select('d_core_mask.jenis_tipe','d_core_mask.kategori','d_report_result_disc.karakteristik','d_report_result_disc.golongan')
					->join('d_report_result_disc','d_report_result_disc.tipe' ,'=','d_core_mask.jenis_tipe')
					->where('id_user','=',$id_user)
					->get();
		}else{
			return 'no';
		}

		if ($dataOne) {
			return $dataOne;
		}else{
			return 'no';
		}

	}

	//RENDER TABEL NILAI AKHIR
	protected function RenderTabelNilaiDisc($id_user){

		$CekJawaban = DB::table('d_soal_disc')->select('d_soal_disc.id_soal','d_jawaban_disc.jawaban','d_soal_disc.p','d_soal_disc.k','d_jawaban_disc.id_user')
		->join('d_jawaban_disc','d_soal_disc.id_soal','=','d_jawaban_disc.id_soal')
		->where('d_jawaban_disc.id_user','=',$id_user)
		->get();

		if ($CekJawaban->isEmpty()) {echo 'terjadi kesalahan, harap hubungi admin'; die;}

		$HasilP = $this->HasilNilai_P($CekJawaban);
		$HasilK = $this->HasilNilai_K($CekJawaban);

		return $this->TabelNilaiDisc($HasilP,$HasilK);

	}


	//sumber nilai akhir
	protected function TabelNilaiDisc($HasilP,$HasilK){

		//CEK UNTUK JAWABAN YANG TIDAK DIPILIH SAMA SEKALI, (ARRAY KOSONG)
		//UNTUK HASIL K
		if (empty($HasilK['D'])) { $cekKD = "0"; }else{ $cekKD = $HasilK['D']; }
		if (empty($HasilK['I'])) { $cekKI = "0"; }else{ $cekKI = $HasilK['I']; }
		if (empty($HasilK['S'])) { $cekKS = "0"; }else{	$cekKS = $HasilK['S']; }
		if (empty($HasilK['C'])) { $cekKC = "0"; }else{ $cekKC = $HasilK['C']; }
		if (empty($HasilK['*'])) { $cekKBin = "0"; }else{ $cekKBin = $HasilK['*']; }

		//UNTUK HASIL P
		if (empty($HasilP['D'])) { $cekPD = "0"; }else{ $cekPD = $HasilP['D']; }
		if (empty($HasilP['I'])) { $cekPI = "0"; }else{ $cekPI = $HasilP['I']; }
		if (empty($HasilP['S'])) { $cekPS = "0"; }else{	$cekPS = $HasilP['S']; }
		if (empty($HasilP['C'])) { $cekPC = "0"; }else{ $cekPC = $HasilP['C']; }
		if (empty($HasilP['*'])) { $cekPBin = "0"; }else{ $cekPBin = $HasilP['*']; }

		$D = $cekPD - $cekKD;
		$I = $cekPI - $cekKI;

		$S = $cekPS - $cekKS;
		$C = $cekPC - $cekKC;

		$table = '<table class="table table-bordered">
				  <thead>
				    <tr>
				      <th scope="col"></th>
				      <th scope="col"class="bg-info">D</th> 
				      <th scope="col"class="bg-info">I</th>
				      <th scope="col"class="bg-info">S</th>
				      <th scope="col"class="bg-info">C</th>
				      <th scope="col"class="bg-info">*</th>
				    </tr>
				  </thead>
				  <tbody >
				    <tr class="jwbdisc">
				      <th style="width:50px"class="bg-info">P</th>

				      <td>'. $cekPD.'</td>
				      <td>'. $cekPI.'</td>
				      <td>'. $cekPS.'</td>
				      <td>'. $cekPC.'</td>
				      <td>'. $cekPBin.'</td>

				    </tr>
				    <tr class="jwbdisc">
				      <th class="bg-info">K</th>
				      <td>'. $cekKD.'</td>
				      <td>'. $cekKI.'</td>
				      <td>'. $cekKS.'</td>
				      <td>'. $cekKC.'</td>
				      <td>'. $cekKBin.'</td>
				    </tr>
				    <tr class="jwbdisc">
				      <th class="bg-info">Selisih</th>
				      <td>'.$D.'</td>
				      <td>'.$I.'</td>
				      <td>'.$S.'</td>
				      <td>'.$C.'</td>
				      <td class="bg-info"></td>
				    </tr>
				   </tbody>
				</table>
				<style type="text/css">th{text-align: center;background-color: #2a3f54;color: #ffffff;}
					.batas{background-color: #2a3f54}
					.jwbdisc{text-align: center;font-weight: bold;}
				</style>
		';

		return $table;
	}

	protected function HasilNilai_P($CekJawaban){
		$KumpulP = array();
		foreach ($CekJawaban as $key => $value) {
			if ($value->jawaban == 'P') {
				$KumpulP[] = $value->p;
			}
		}
		
		$HasilP = array_count_values($KumpulP);

		return $HasilP;
	}
	protected function HasilNilai_K($CekJawaban){
		$KumpulK = array();

		foreach ($CekJawaban as $key => $value) {
			if ($value->jawaban == 'K') {
				$KumpulK[] = $value->k;
			}
		}
		$HasilK = array_count_values($KumpulK);

		return $HasilK;
	}

	//Modal tambah / update Core Mask
	public function WatakKepribadian(Request $request){

		if ($this->CekCoreMask($request->id_user) == 'yes') {
			//update sesi
			$edit = DB::table('d_core_mask')->where('id_user','=',$request->id_user)->get();
			foreach ($edit as $key => $value) {
				$form[] = '
				<input type="hidden" name="id_tipe[]" value="'.$value->id.'" required>
				<input type="hidden" name="id_user" value="'.$value->id_user.'" required>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text">'.ucwords($value->kategori).'</span>
				  </div>
				  <select name="jenis_tipe[]" class="form-control" required>
				  	<option value="">Pilih '.ucwords($value->kategori).'</option>
				  	<option value="d" '.(($value->jenis_tipe=='d')?'selected="selected"':"").'>D</option>
				  	<option value="i" '.(($value->jenis_tipe=='i')?'selected="selected"':"").'>I</option>
				  	<option value="s" '.(($value->jenis_tipe=='s')?'selected="selected"':"").'>S</option>
				  	<option value="c" '.(($value->jenis_tipe=='c')?'selected="selected"':"").'>C</option>
				  </select>

				<input type="hidden" name="kategori[]" value="'.$value->kategori.'" required>
				</div><hr>';			    
			}
		}else{
			//tambah sesi
			$form = '
				<input type="hidden" name="id_user" value="'.$request->id_user.'" required>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text">Mask</span>
				  </div>
				  <select name="jenis_tipe[]" class="form-control" required>
				  	<option value="">Pilih Mask</option>
				  	<option value="d">D</option>
				  	<option value="i">I</option>
				  	<option value="s">S</option>
				  	<option value="c">C</option>
				  </select>

				<input type="hidden" name="kategori[]" value="mask" required>
				</div><hr>';
				$form .= '<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text">Core</span>
				  </div>
				  <select name="jenis_tipe[]" class="form-control" required>
				  	<option value="">Pilih Core</option>
				  	<option value="d">D</option>
				  	<option value="i">I</option>
				  	<option value="s">S</option>
				  	<option value="c">C</option>
				  </select>

				<input type="hidden" name="kategori[]" value="core" required>
				</div>';
		}
		return Response::json(array('MaskCore' => $form), 200);

	}

		//POST CORE DAN MASK
	public function PostCoreMask(Request $request){

		if ($this->CekCoreMask($request->id_user) == 'yes') {

			for ($i=0; $i < 2; $i++) { 

				$update = DB::table('d_core_mask')->where('id','=',$request->input('id_tipe')[$i] )->update(['jenis_tipe' => $request->input('jenis_tipe')[$i], 'kategori' => $request->input('kategori')[$i], 'created_at' => \Carbon\Carbon::now()]);

			}

			if ($update) {
				return Response::json(array('CekHasil' => '001'), 200);
			}else{
				return Response::json(array('CekHasil' => '002'), 200);
			}

		}else{
			//insert core mask 

			for ($i=0; $i < 2; $i++) { 

				$data[] = ['id_user' => $request->id_user, 'jenis_tipe' => $request->input('jenis_tipe')[$i], 'kategori' => $request->input('kategori')[$i], 'created_at' => \Carbon\Carbon::now()];

			}
			$insert = DB::table('d_core_mask')->insert($data);

			if ($insert) {
				return Response::json(array('CekHasil' => '001'), 200);
			}else{
				return Response::json(array('CekHasil' => '002'), 200);
			}
		}

	}


	//menampilkan tipe disc
	protected function ShowTipeDisc($id_user){

		$table = '';
		$table .= '<table class="table">
			      	<tbody>';
		if ($this->CekCoreMask($id_user) == 'yes') {

		//take data berdasarkan id user
		$data  = DB::table('d_core_mask')->select('kategori','jenis_tipe')->where('id_user','=',$id_user)->get();

		foreach ($data as $key => $value) {
			$table .= 	'<tr>
			      			<td nowrap="" style="vertical-align: middle;">Tipe '.$value->kategori.'</td>
			      			<td style="width: 1px; vertical-align: middle;">:</td>
			      			<td style="font-size: 20px; vertical-align: middle; font-weight: bold;">'.strtoupper($value->jenis_tipe).'</td>
			      			<td>('.$this->ArtiDisc($value->jenis_tipe).')</td>
			      		</tr>';
		}
		
		}else{
		$table .= 		'<tr>
			      			<td nowrap="" style="width: 12px; vertical-align: middle; font-weight:bold;">Status Belum Ditentukan</td>
			      		</tr>';
		}
		$table .=	    '</tbody>
			    	</table>';

		return $table;

	}

	//array arti DISC
	protected function ArtiDisc($value){
		$arrayName = array('d' => 'Dominance', 'i' => 'Influence', 's' => 'Steadiness', 'c' => 'Compliance','*' => '-');
		return $arrayName[$value];
	}

	//cek ketersediaan akun
	protected function CekCoreMask($id_user){

		$query = DB::table('d_core_mask')->where('id_user','=',$id_user)->first();
		if ($query) {
			return 'yes';
		}else{
			return 'no';
		}

	}


	//table data diri
	protected function DataDiri($id_user){

		$out =$this->GetDataDiri($id_user);

		$table = '';
		$table .= '<table class="table table-responsive" >
			      	<tbody>
			      		<tr>
			      			<td>Nama/Usia</td>
			      			<td style="width: 1px;">:</td>
			      			<td>'.$out->nama_lengkap.'</td>
			      		</tr>
			      		<tr>
			      			<td>Jenis Kelamin</td>
			      			<td>:</td>
			      			<td>'.$out->jenis_kelamin.'</td>
			      		</tr>
			      		<tr>
			      			<td>Jabatan</td>
			      			<td>:</td>
			      			<td>-</td>
			      		</tr>
			      		<tr>
			      			<td>Tanggal</td>
			      			<td>:</td>
			      			<td>'.$this->tanggal_indo($out->date_finish).'</td>
			      		</tr>
			      	</tbody>
			      </table>';

		return $table;

	}

	//get data diri
	protected function GetDataDiri($id_user){

		$data = DB::table('datadiri')
				->join('d_status_disc','d_status_disc.id_user','=','datadiri.id_user')
				->select('datadiri.nama_lengkap','datadiri.jenis_kelamin','d_status_disc.date_finish')
				->where('datadiri.id_user','=',$id_user)
				->first();
		if ($data) {
			return $data;
		}else{
			return 'Terjadi Kesalahan #ljhk3o';
		}
	}	



	//render fdf
	protected function CekPDF($id_user){

		$table = '<link href="'. URL::asset('adminutama/vendors/bootstrap/dist/css/bootstrap.min.css') .'" rel="stylesheet">
					';

		$table .= '
					<style type="text/css">
						p {
					  margin: 0px;
					}
					</style>

					<body onload="window.print()" style="margin-left:43px; margin-right: 43px;">
					<div class="container">
					  <div class="row">
					    <div class="col-sm">
					      	'.$this->tablesoal($this->DataSoal(),'32','1', $id_user).'
					    </div>
					    <div class="col-sm">
					      	'.$this->tablesoal($this->DataSoal(),'64','2', $id_user).'
					    </div>
					    <div class="col-sm">
					     	'.$this->tablesoal($this->DataSoal(),'96','3', $id_user).'
					    </div>
					  </div>
					</div>
					</body>';


		$table .= '<script src="'. URL::asset('adminutama/vendors/jquery/dist/jquery.min.js').'"></script>
				<script src="'. URL::asset('adminutama/vendors/bootstrap/dist/js/bootstrap.bundle.min.js').'"></script>
				<script src="'. URL::asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') .'"></script>
		';

		return $table;

	}


	//DATA SOAL
	protected function DataSoal(){
		$Data = DB::table('d_soal_disc')->select('id_soal','id_kelompok','soal_disc','p','k')->get();
		return $Data;
	}

	protected function TabelJawaban($id_user){
		// tabel di bagi 3 
		// tabel 1-32, 33-64, 65-96
		$table ='
	    	<div class="row">
				<div class="col">
			     	'.$this->tablesoal($this->DataSoal(),'32','1', $id_user).'
			    </div>


			    <div class="col">
			    	'.$this->tablesoal($this->DataSoal(),'64','2', $id_user).'
			    </div>


			    <div class="col">
			      	'.$this->tablesoal($this->DataSoal(),'96','3', $id_user).'
			    </div>
			</div>
				<style type="text/css">
					th{
						text-align: center;
						background-color: #2a3f54;
						color: #ffffff;
					}
					.batas{
						background-color: #2a3f54
					}
					.jwbdisc{
						text-align: center;
						font-weight: bold;

					}
				</style>
		';
		return $table;

	}

	protected function CekJawaban($valueId, $id_user){

		$CekJawaban = DB::table('d_soal_disc')->select('d_soal_disc.id_soal','d_jawaban_disc.jawaban')
			->join('d_jawaban_disc','d_soal_disc.id_soal','=','d_jawaban_disc.id_soal')
			->where([['d_soal_disc.id_soal','=',$valueId],['d_jawaban_disc.id_user','=',$id_user]])
			->first();

		if ($CekJawaban) {
			$out['a'] = "yes";
	    	$out['b'] = $CekJawaban->jawaban;
			return $out;
		}else{
			$out['a'] = "no";
	    	$out['b'] = "kosong";
	    	return $out;
		}
	}


	protected function tablesoal($DataAsal, $urutan, $tipe, $id_user){
		
		$table = '';
		$table.='<table class="table table-bordered">
				  <thead>
				    <tr>
				      <th>P</th>
				      <th>K</th>
				      <th>PERTANYAAN</th>
				    </tr>
				  </thead>
				  <tbody>';
				  $chou = 1;
				  $temp = null;
				  $pk = array();
				  foreach($DataAsal as $key => $Value){

					$datatt = $this->CekJawaban($Value->id_soal, $id_user);
				  	// tabel 1
				  	if ($tipe == '1') {
				  		if($key + 1 > $urutan){ break; } 
				  	}
				  	// tabel 2
				  	if($tipe == '2'){
				  		if ($key + 1 >= 1 && $key + 1 <= 32) {
				  			continue;
				  		}elseif($key + 1 > 64){
				  			break;
				  		}
				 	}
				 	// tabel 3
				 	if($tipe == '3'){
				  		if ($key + 1 >= 1 && $key + 1 <= 64) {
				  			continue;
				  		}
				 	}
				   	if(($temp == $Value->id_kelompok) || ($temp == null )){}else{
		$table .=	'<tr>
			          <td colspan="10" class="batas" style="padding: 2px"></td>
			        </tr>';
	                }

		$table .='<tr >
				      <td style="vertical-align: middle; text-align:center;">
				      	'.(($datatt['a'] == 'yes' && $datatt['b'] == 'P')?'<span class="badge badge-danger p-2">':"").'
				      		'.$Value->p.'
				      	'.(($datatt['a'] == 'yes' &&  $datatt['b'] == 'K')?'</span>':"").'
				      </td>
				      <td style="vertical-align: middle; text-align:center;">
				      	'.(($datatt['a'] == 'yes' &&  $datatt['b'] == 'K')?'<span class="badge badge-danger p-2">':"").'
				          	'.$Value->k.'
				        '.(($datatt['a'] == 'yes' &&  $datatt['b'] == 'K')?'</span>':"").'
					  </td>
				      <td style="height:70px; vertical-align: middle; text-align:left; padding-top:0px; padding-bottom:0px;">'.$Value->soal_disc.'</td>
				    </tr>';
				    $chou++;
				    $temp = $Value->id_kelompok;
				   }
		$table .='</tbody>
				</table>';

		return $table;
	}

	//PRINT PDF
	public function PrintPDFJawabanDisc(Request $request){

		return Response::json(array('maintenance' => 'Under Maintenance'), 200);
		// instantiate and use the dompdf class
		$dompdf = new Dompdf();
		$dompdf->loadHtml($this->CekPDF($request->id_user));
		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'potrait');
		// Render the HTML as PDF
		$dompdf->render();
		// Output the generated PDF to Browser
		$dompdf->stream("tes", array("Attachment" => false));

	}

	//Preview Print
	public function tespreview($id){
		return 'Under Maintenance';
		return $this->CekPDF($id);
	}


	//Method untuk mengubah date format y-m-d ke tanggal indonesia
    protected function tanggal_indo($tanggal)
    {
        if ($tanggal) {
            $bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
            $split = explode('-', $tanggal);
            return $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];
        } else {
            return '-';
        }
    }
}
