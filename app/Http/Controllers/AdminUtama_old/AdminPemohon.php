<?php

namespace App\Http\Controllers\AdminUtama;

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

use DataTables;
use DB;
use Validator;
use Response;
use Redirect; 
use Alert;
use Hash;
use Auth;
use File;
use DateTime;
use Javascript;

class AdminPemohon extends Controller
{   
    //Isi Pesan 
    public function isipesan($id){

        $ispes = DB::table('pesan')->select('*')
        ->where('id_user','=', $id)
        ->get();

        return view('admin.dashboard.adminutama.isipesan', ['ispes' => $ispes]);
    }

    //Index Berkas Aptitude Dan Disc dan hasil koreksinya
    public function ShowAptiDisc($id){

        $ad = DB::table('berkas_apti_disc')->select('*')
        ->where('id_user','=', $id)
        ->get();

        $de = DB::table('koreksi_aptidisc')->select('*')
        ->where('id_user','=', $id)
        ->get();

        $ef = DB::table('berkas_soal')

        ->join('jawaban_soal', 'berkas_soal.id_soal', '=', 'jawaban_soal.id_soal')
        ->select('jawaban_soal.file_name','jawaban_soal.file_type', 'jawaban_soal.file_size','jawaban_soal.id_jawaban', 'berkas_soal.*')
        ->where('berkas_soal.id_user', '=', $id)
        ->get();

        return view('admin.dashboard.adminutama.indexaptidisc', ['data' => $ad, 'datakoreksi' => $de, 'abcd' => $ef]);
    }

    public function ceksoalkategori(Request $request) {   
        # Tarik ID inputan
        $set = Input::get('id');

        # Inisialisasi variabel berdasarkan masing-masing tabel dari model
        # dimana ID target sama dengan ID inputan
        $ceksoal = DB::table('kategori_tes')
        ->select('soal')
        ->where('id_kategori', $set)
        ->first();

        # Buat pilihan "Switch Case" berdasarkan variabel "type" dari form
        switch(Input::get('type')):
            # untuk kasus "kabupaten"
            case 'soal':
                # buat nilai default
                $return = ' <textarea id="textarea" placeholder="Place some text here" name="soal" 
                                      style="font-size: 12px;height: 100%; ">'.$ceksoal->soal.'
                            </textarea>

                            <script>
                            jQuery( document ).ready(function( $ ) {
                                $("#textarea").summernote();


                            })
                            </script>

                            ';
                return $return;
            break;
        # pilihan berakhir
        endswitch;    
    }
    //form tambah kategori soal
    public function showtambahtamkatsol($id){

        $kt = DataTambahanKategori::latest()
        ->where('id_user','=', $id)
        ->get();

        $Kategori = DB::table('kategori_tes')->select('id_kategori','nama_kategori')
        ->get();


        return view('admin.dashboard.adminutama.formtambahtamkatsol', ['datatamkatsol' => $kt, 'id_user' => $id, 'kategori' => $Kategori]);
    }

    //Tambahan Kategori
    public function indextambahankategori($id){

        $kt = DB::table('tambahan_kategori')
        ->join('kategori_tes', 'tambahan_kategori.kategori', '=', 'kategori_tes.id_kategori')
         ->select('tambahan_kategori.*',  'kategori_tes.nama_kategori')
        ->where('id_user','=', $id)
        ->get();

        $Kategori = DB::table('kategori_tes')->select('nama_kategori')
        ->get();


        $berkassoal = DB::table('berkas_soal')->select('*')->where('id_user','=',$id)
        ->get();
     

        return view('admin.dashboard.adminutama.tambahankategori', ['datatamkatsol' => $kt, 'id_user' => $id, 'kategori' => $Kategori, 'berkas_soal' => $berkassoal]);
    }

    //Edit Tambahan Soal
    public function showedittamkatsol($id){

        $model = DataTambahanKategori::where('id_tambahan', $id)->first();

        $Kategori = DB::table('kategori_tes')->select('nama_kategori','id_kategori')
        ->get();

        return view('admin.dashboard.adminutama.editadmin.tamkatsol', $model)->with('kategori',$Kategori);
    }


    public function indexlistpemohon(){

        $dataposisi = DB::table('posisi')->select('id_posisi','nama_posisi')->get();
        return view('admin.dashboard.adminutama.listpemohon',['dataposisi' => $dataposisi]);
    }
 
    public function datapemohon(Request $request){

        if (Auth::user()->level == 1) {
            $datadiri = DB::table('datadiri')
            ->leftJoin('pesan', 'datadiri.id_user', '=', 'pesan.id_user')
            ->leftJoin('posisi', 'posisi.id_posisi', '=', 'datadiri.status_posisi')
            ->select('datadiri.*',  'pesan.isi_pesan','pesan.status_keputusan','pesan.isi_pesan','pesan.isi_pesan_dkk','pesan.status_keputusan_dkk','posisi.nama_posisi')
            ->orderBy('datadiri.status', 'asc')
            ->get();

        }elseif(Auth::user()->level == 3 || Auth::user()->level == 5){

            $datadiri = DB::table('datadiri')
            ->leftJoin('pesan', 'datadiri.id_user', '=', 'pesan.id_user')
            ->leftJoin('posisi', 'posisi.id_posisi', '=', 'datadiri.status_posisi')
            ->select('datadiri.*',  'pesan.isi_pesan','pesan.status_keputusan','pesan.isi_pesan_dkk','pesan.status_keputusan_dkk','posisi.nama_posisi','posisi.id_posisi')

            ->where([['datadiri.status', '=', 1],['datadiri.status_posisi' ,'=', Auth::user()->posisi]])

            ->orderBy('id_data_diri', 'desc')
            ->get();

        }elseif(Auth::user()->level == 4){

            $datadiri = DB::table('datadiri')
            ->leftJoin('pesan', 'datadiri.id_user', '=', 'pesan.id_user')
            ->leftJoin('posisi', 'posisi.id_posisi', '=', 'datadiri.status_posisi')
            ->select('datadiri.*',  'pesan.isi_pesan','pesan.status_keputusan','pesan.isi_pesan_dkk','pesan.status_keputusan_dkk','posisi.nama_posisi','posisi.id_posisi')

            ->where('datadiri.status', '=', 1)

            ->orderBy('id_data_diri', 'desc')
            ->get();

        }else{

        }
        
        return DataTables::of($datadiri)
        ->addIndexColumn()
       
        ->addColumn('countberkas', function($data){

        	$countberkas = Berkas::where('id_user', $data->id_user)->count();
            return $countberkas;

         })
        ->addColumn('countberkastes', function($data){

            $countberkastes = BerkasTes::where('id_user', $data->id_user)->count();
            return $countberkastes;

         })

        ->addColumn('status', function($data){

            if ($data->status == 1) {
                $status = '<a href="#" datadiri-id="'.$data->id_data_diri.'" stsaktf="'.$data->status.'" title="Status: Aktif" class="posisitujuan btn btn-outline-success btn-round btn-sm") "><span class="fa fa-check-circle"></span></a>';

            }elseif($data->status == 2){
                $status = '<a href="#" datadiri-id="'.$data->id_data_diri.'" stsaktf="'.$data->status.'" title="Status: Tidak Aktif"  class="posisitujuan btn btn-outline-danger btn-round btn-sm"><span class="fa fa-exclamation-circle"></span></a>';
            }else{
                $status = '';
            }
            
            return $status;

         })

        ->addColumn('status_finish', function($data){

            if ($data->status_finish == 1) {
                $status_finish = '<span class="badge badge-success" title="Selesai Mengisi Formulir dan Berkas"> Selesai</span>';
            }elseif($data->status_finish == 2){
                $status_finish = '<span class="badge badge-warning" title="Proses Mengisi Formulir dan Berkas" style="vertical-align:middle;"> Proses</span>';
            }else{
                $status_finish = '';
            }
            
            return $status_finish;

         })

        ->addColumn('keputusan', function($data){

            if ($data->status_keputusan == 1) {

                $status_keputusan = '<span class="badge badge-success" title="Pelamar Ini Diterima oleh pengecek" style="vertical-align:middle;"> Diterima</span>';
            }elseif ($data->status_keputusan == 2){

                $status_keputusan = '<span class="badge badge-danger" title="Pelamar Ini Ditolak oleh pengecek" style="vertical-align:middle;"> Ditolak</span>';

            }else{

                $status_keputusan = '<span class="badge badge-warning" title="Pelamar ini belum ditindak" style="vertical-align:middle;"> Menunggu</span>';

            }
            return $status_keputusan;
            
         })

        ->addColumn('keputusan_dkk', function($data){

            if ($data->status_keputusan_dkk == 1) {

                $status_keputusan = '<span class="badge badge-success" title="Pelamar Ini Diterima oleh pengecek" style="vertical-align:middle;"> Diterima</span>';
            }elseif ($data->status_keputusan_dkk == 2){

                $status_keputusan = '<span class="badge badge-danger" title="Pelamar Ini Ditolak oleh pengecek" style="vertical-align:middle;"> Ditolak</span>';

            }else{

                $status_keputusan = '<span class="badge badge-warning" title="Pelamar ini belum ditindak" style="vertical-align:middle;"> Menunggu</span>';

            }
            return $status_keputusan;
            
         })
        
        ->rawColumns(['countberkas','countberkastes','status','status_finish','keputusan','keputusan_dkk'])
        ->make(true);
    }

    //profile pemohon
    public function profilepemohon(){
    	return view('admin.dashboard.adminutama.profilepemohon');
    }

    //Index Untuk File Upload Waktu Tes
    public function datafileuploadtes($id){

        $DataDiri = DataDiri::where('id_user', $id)->first();
        return view('admin.dashboard.adminutama.fileberkastes',['id_user' => $id, 'DataDiri' => $DataDiri]);

    }

    //get data berkas Tes serverside
    public function databerkastes(Request $request, $id){

        $berkastes = BerkasTes::latest()
        ->where('id_user', '=', $id)
        ->get();
        
        return DataTables::of($berkastes)
        ->addIndexColumn()
        ->addColumn('action', function($data){

            $button =   '<a href="'.Route('downloadberkastes',['id' => $data->id_berkastes]).'" title="Download File"><button type="button" class="btn btn-outline-info btn-xs"><span class="fa fa-download"></span></button></a>';

             $button .=   '<a href="'.Route('Previewfileberkastes',['id' => $data->id_berkastes]).'" title="Preview File Berkas Tes" target="_blank"><button type="button" class="btn btn-outline-primary btn-xs"><span class="fa fa-eye"></span></button></a>';

            if(Auth::user()->level == "1"){
            $button .=  '<a href="'. url('destroyberkastesau/'.$data->id_berkastes) .'" title="Hapus File" onclick="return confirm(\'Apakah Anda Yakin Menghapus File '.$data->nama_filetes.' Ini ? \' ) "><button type="button" class="btn btn-outline-danger btn-xs"><span class="fa fa-trash"></span></button></a>';
            }
            return $button;

  
         })
        ->addColumn('sizeconvertion', function($data){

            $endsize =   $this->formatSizeUnits($data->size_filetes);
            return $endsize;

         })
        ->addColumn('convertiondate', function($data){

            $dt = new DateTime($data->created_at);
            return $this->tanggal_indo($dt->format('Y-m-d'));

         })
        ->addColumn('kategori', function($data){

            $ceksz = DB::table('tambahan_kategori')
            ->leftJoin('kategori_tes','kategori_tes.id_kategori','=','tambahan_kategori.kategori')
            ->leftJoin('berkas_tes','berkas_tes.id_tambahankat','=','tambahan_kategori.id_tambahan')
            ->select('tambahan_kategori.kategori','kategori_tes.nama_kategori','berkas_tes.id_berkastes')
            ->where('id_tambahan', '=' ,$data->id_tambahankat)
            ->first();

            return $ceksz->nama_kategori;

         })
        ->rawColumns(['action','sizeconvertion','convertiondate','kategori'])
        ->make(true);
            
    }

     //Download Berkas Tes Bagian Admin Utama
    public function getDownloadfileberkastes($id){

        $cekfile = DB::table('berkas_tes')->select('id_berkastes','id_tambahankat','id_user','nama_filetes','type_filetes')
        ->where('id_berkastes', '=', $id)
        ->first(); 

        $file= public_path(). "/berkas_tes/".$cekfile->id_user."/".$cekfile->id_tambahankat."/".$cekfile->nama_filetes;

        $headers = [
              'Content-Type' => 'application/pdf',
              'Content-Type:' => 'image/png',
              'Content-Type:' => 'image/jpg',
           ];

        return response()->download($file, $cekfile->nama_filetes, $headers);
    }


    public function previewfileberkastes($id){

        $cekfile = DB::table('berkas_tes')->select('id_berkastes','id_tambahankat','id_user','nama_filetes','type_filetes')
        ->where('id_berkastes', '=', $id)
        ->first(); 

        $file= public_path(). "/berkas_tes/".$cekfile->id_user."/".$cekfile->id_tambahankat."/".$cekfile->nama_filetes;

        return response()->file($file);

    }

    //Destroy File Berkas Tes
    public function destroyfileberkastesau($id){

        $cekfile = DB::table('berkas_tes')->select('id_berkastes','id_tambahankat','id_user','nama_filetes','type_filetes')
        ->where('id_berkastes','=', $id)
        ->first();

        $cek_berkas = File::delete(public_path()."/berkas_tes/".$cekfile->id_user."/".$cekfile->id_tambahankat."/".$cekfile->nama_filetes);

        if ($cek_berkas) {

            DB::table('berkas_tes')->where('id_berkastes', '=', $id)->delete();

            return Redirect::back()->with('success', 'Berhasil Hapus Foto '.$cekfile->nama_filetes.'');
        }else{
            return Redirect::back()->with('error', 'Terjadi Kesalahan #df34');
        }
    } 


    //index file upload berkas data
    public function datafileupload($id){
    	$DataDiri = DataDiri::where('id_user', $id)->first();
    	return view('admin.dashboard.adminutama.fileberkas',['id_user' => $id, 'DataDiri' => $DataDiri]);
    }

    public function previewfile($id){

        $ceknmfile = DB::table('berkas')->select('nama_file','type_file','id_file','jenis','id_user')
        ->where('id_file', '=', $id)
        ->first(); 

        $file= public_path(). "/berkas/".$ceknmfile->id_user."/".$ceknmfile->jenis."/".$ceknmfile->nama_file.".".$ceknmfile->type_file;


        return response()->file($file);

    }

    //get data berkas serverside
    public function databerkas(Request $request, $id){
        $berkas = berkas::latest()
        ->where('id_user', '=', $id)
        ->get();
        
        return DataTables::of($berkas)
        ->addIndexColumn()
        ->addColumn('action', function($data){

            $button =   '<a href="'.Route('downloadfile',['id' => $data->id_file]).'" title="Download File"><button type="button" class="btn btn-outline-info btn-xs"><span class="fa fa-download"></span></button></a>';

            $button .=   '<a href="'.Route('Previewfile',['id' => $data->id_file]).'" title="Preview File" target="_blank"><button type="button" class="btn btn-outline-primary btn-xs"><span class="fa fa-eye"></span></button></a>';


            if(Auth::user()->level == "1"){
            $button .=   '<a href="'.Route('destroyfileau',['id' => $data->id_file]).'" title="Hapus File" onclick="return confirm(\'Apakah Anda Yakin Menghapus File '.$data->nama_file.' Ini ? \' ) "><button type="button" class="btn btn-outline-danger btn-xs"><span class="fa fa-trash"></span></button></a>';
            }
            
            return $button;
  
         })
        ->addColumn('sizeconvertion', function($data){

            $endsize =   $this->formatSizeUnits($data->size_file);
            return $endsize;

         })
        ->addColumn('convertiondate', function($data){

  			$dt = new DateTime($data->created_at);
			return $this->tanggal_indo($dt->format('Y-m-d'));

         })
        ->rawColumns(['action','sizeconvertion','convertiondate'])
        ->make(true);
            
    }

    //index Data Diri 
    public function indexdatadiriau(Request $request){

    	$DataDiri = DataDiri::where('id_user', $request->id_user)->first();

    	$CekFotoDiri = DB::table('berkas')->select('jenis','nama_file','type_file')
        ->where([['id_user','=', $request->id_user],['jenis','=','fotodiri']])
    	->first();
        
    	return view('admin.dashboard.adminutama.profilepemohon', ['datadiri' => $DataDiri, 'fotodiri' => $CekFotoDiri, 'linknamal' => $this->linknamal()]);

    }

     //get data diri detail serverside
    public function detaildatadiri(Request $request, $id){
        $datadiridetail = DataDiri::latest()
        ->where('id_user', '=', $id)
        ->get();
        
        return DataTables::of($datadiridetail)
        ->make(true);
            
    }

    //index kesehatan dan pendidikan au, admin utama
    public function indexdatakesehatanxpendidikanau(Request $request){

    	$Kesehatanau = Kesehatan::where('id_user', $request->id_user)->first();
    	$Pendidikanau = DataPendidikan::where('id_user', $request->id_user)->get();
    	$Perting = DataPerguruanTinggi::where('id_user', $request->id_user)
    	->orderBy('id_perguruantinggi', 'desc')->get();

    	$pendnf = DataPendNonFormal::where('id_user', $request->id_user)->get();
    	
    	return view('admin.dashboard.adminutama.kesehatanxpendidikanau', ['kes' => $Kesehatanau, 'namal' => $this->namal($request->id_user), 'pend' => $Pendidikanau, 'perting' => $Perting, 'pendnf' => $pendnf, 'linknamal' => $this->linknamal(), 'id_user' => $request->id_user]);

    }

    //index pengalaman kerja dan organisasi
    public function datapengalamankerjaxorganisasi(Request $request){

    	$queryone = DataPengalamanKerjaPendidikan::where('id_user', $request->id_user)->get();
    	$querytwo = DataPengalamanKerjaNonPendidikan::where('id_user', $request->id_user)->get();
    	$querythree = DataPengalamanOrganisasi::where('id_user', $request->id_user)->get();

    	return view('admin.dashboard.adminutama.pengalamankerjaxorganisasi',['namal' => $this->namal($request->id_user), 
    		'queryone' => $queryone, 'querytwo' => $querytwo, 'querythree' => $querythree, 'linknamal' => $this->linknamal(), 'id_user' => $request->id_user]);

    }

    //index data pekerjaan yang dilamar
    public function datapekerjaanyangdilamar(Request $request){

    	$queryone = DataPekerjaanLamaran::where('id_user', $request->id_user)->get();

    	return view('admin.dashboard.adminutama.pekerjaanyangdilamar',['namal' => $this->namal($request->id_user),'queryone' => $queryone, 'linknamal' => $this->linknamal()]);
    }

    public function datapenxkeahxbah(Request $request){

		$queryone = DataPencapaian::where('id_user', $request->id_user)->get();
		$querytwo = DataBerbahasaAsing::where('id_user', $request->id_user)->get();
		$querythree = DataKeahlianLainnya::where('id_user', $request->id_user)->get();

    	return view('admin.dashboard.adminutama.bahasaxpencapaianxkeahlian',['queryone' => $queryone, 'querytwo' => $querytwo, 'querythree' => $querythree, 'namal' => $this->namal($request->id_user), 'linknamal' => $this->linknamal(),'id_user' => $request->id_user]);

    }

    //Edit Keahlian Lainnya 
    public function showkeahlianau($id){

      $queryone = DataKeahlianLainnya::where('id_user', $id)->first();

      return view('admin.dashboard.adminutama.editadmin.keahlian',$queryone);
    }

    //Digunakan Untuk Semua upload file (download)
    public function getDownloadfile($id){

        $ceknmfile = DB::table('berkas')->select('nama_file','type_file','id_file','jenis','id_user')
        ->where('id_file', '=', $id)
        ->first(); 

        $file= public_path(). "/berkas/".$ceknmfile->id_user."/".$ceknmfile->jenis."/".$ceknmfile->nama_file.".".$ceknmfile->type_file;

        $headers = [
              'Content-Type' => 'application/pdf',
              'Content-Type:' => 'image/png',
              'Content-Type:' => 'image/jpg',
           ];

        return response()->download($file, $ceknmfile->nama_file.'.'.$ceknmfile->type_file, $headers);
    }

    //Hapus File/Berkas
    public function destroyfile($id){

        $ceknmfile = DB::table('berkas')->select('nama_file','id_user','jenis')
        ->where('id_file','=', $id)
    	->first();

        $cek_berkas = File::deleteDirectory(public_path()."/berkas/".$ceknmfile->id_user."/".$ceknmfile->jenis);
        if ($cek_berkas) {

            DB::table('berkas')->where('id_file', '=', $id)->delete();

            return Redirect::back()->with('success', 'Berhasil Hapus Foto '.$ceknmfile->nama_file.'');
        }else{
             return Redirect::back()->with('error', 'Terjadi Kesalahan #df34');
        }
    } 

    //conversion file size 
    protected function formatSizeUnits($bytes){
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

	//convertion tanggal format database
	protected function tanggal_indo($tanggal) {
        $bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];
    }

    //index Data Diri 
    protected function namal($id_user){
    	$ceknl = DB::table('datadiri')->select('nama_lengkap')
        ->where('id_user','=', $id_user)
    	->first();
    	return $ceknl->nama_lengkap;
    }
    //untuk fast data link dropdown
    protected function linknamal(){
    	$ceknl = DB::table('datadiri')->select('id_data_diri','nama_lengkap','no_ktp','id_user')
    	->get();

    	return $ceknl;
    }
    	
}
