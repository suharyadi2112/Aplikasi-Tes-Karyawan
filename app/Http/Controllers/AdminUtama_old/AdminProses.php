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

class AdminProses extends Controller
{   
    
    //preview berkas soal hasil jawab dari pelamar
     public function previewbersol($id){

       $ef = DB::table('berkas_soal')

        ->join('jawaban_soal', 'berkas_soal.id_soal', '=', 'jawaban_soal.id_soal')
        ->select('jawaban_soal.file_name','jawaban_soal.file_type', 'jawaban_soal.file_size','jawaban_soal.id_jawaban', 'berkas_soal.*')
        ->where('jawaban_soal.id_jawaban', '=', $id)
        ->first();


        $file= public_path(). "/berkas_tes/berkas_soal/".$ef->id_user."/jawaban/".$ef->file_name;

        return response()->file($file);

    }


    //Download Berkas Soal file
    public function downloadbersol($id){


        $ef = DB::table('berkas_soal')

        ->join('jawaban_soal', 'berkas_soal.id_soal', '=', 'jawaban_soal.id_soal')
        ->select('jawaban_soal.file_name','jawaban_soal.file_type', 'jawaban_soal.file_size','jawaban_soal.id_jawaban', 'berkas_soal.*')
        ->where('jawaban_soal.id_jawaban', '=', $id)
        ->first();


        $file= public_path(). "/berkas_tes/berkas_soal/".$ef->id_user."/jawaban/".$ef->file_name;

        $headers = [
              'Content-Type' => 'application/pdf',
              'Content-Type:' => 'image/png',
              'Content-Type:' => 'image/jpg',
           ];

        return response()->download($file, $ef->file_name, $headers);
    }

    //Upload Berkas Soal
    Public Function UploadSoal(Request $request){

        $files = $request->file('files');

        foreach($files as $file){

            $name = $file->getClientOriginalName();
            $size = $file->getSize();
            $extention = $file->getClientOriginalExtension();

            $id_berkas = $request->id_berkastes;

                $path = public_path().'/berkas_tes/berkas_soal/'.$request->id_user;

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

                    DB::table('berkas_soal')->insert(
                        ['id_user' => $request->id_user, 'nama_file' => $name ,'type_file' => $extention, 
                        'file_size' => $size, 'created_at' => date('Y-m-d h:i:s')]
                    );

        }
        return Redirect::back()->with('success', 'Berhasil Upload File');

    }


    //Destroy File Soal Berkas
    public function destroyberkasfilesoal($id){

        $cekdata = DB::table('berkas_soal')->select('*')
        ->where('id_soal', '=', $id)
        ->count();

       
        if ($cekdata < 1) {

           return Redirect::back()->with('error', 'Data Mungkin Sudah Dihapus');

        }else{
     
            $cek = DB::table('berkas_soal')->select('*')
            ->where('id_soal', '=', $id)
            ->first();

            $cek_berkas = File::delete(public_path()."/berkas_tes/berkas_soal/".$cek->id_user."/".$cek->nama_file);

            if ($cek_berkas) {

                DB::table('berkas_soal')->where('id_soal', '=', $id)->delete();

                return Redirect::back()->with('success', 'Berhasil Hapus Foto '.$cek->nama_file.'');
            }else{
                return Redirect::back()->with('error', 'Terjadi Kesalahan #sdf334');
            }
        }
    } 

    //upload berkas hasil aptitude dan disc
    Public Function hasilkoreksiaptidisc(Request $request){

        $files = $request->file('files');

        foreach($files as $file){

            $name = $file->getClientOriginalName();
            $size = $file->getSize();
            $extention = $file->getClientOriginalExtension();

            $id_berkas = $request->id_berkastes;

                $path = public_path().'/berkas_tes/koreksi_aptidisc/'.$request->id_user;

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

                    DB::table('koreksi_aptidisc')->insert(
                        ['id_user' => $request->id_user, 'nama_filekoreksi' => $name ,'type_filekoreksi' => $extention, 
                        'size_filekoreksi' => $size, 'created_at' => date('Y-m-d h:i:s')]
                    );

        }
        return Redirect::back()->with('success', 'Berhasil Upload File');

    }



    //Status Keputusan 
    public function statuspesan(Request $request){

        $cekdata = DB::table('pesan')
        ->where('id_user', '=', $request->id_user)
        ->count();

        $cekdata2 = DB::table('pesan')
        ->where('id_user', '=', $request->id_user)
        ->first();


        if ($cekdata > 0) {

            if ($request->cekpengecek == 4) {

                    $queryupdate = DB::table('pesan')
                    ->where('id_user','=', $request->id_user)
                    ->update([
                        'isi_pesan_dkk' => $request->pesan,
                        'status_keputusan_dkk' => $request->status_keputusan,
                        'tanggal_keputusan_dkk' => date('Y-m-d H:i:s')
                    ]);

                    return Redirect::back()->with('success', 'Berhasil Memberi Keputusan');

            }

            if ($request->cekpengecek == 3) {

                     $queryupdate = DB::table('pesan')
                    ->where('id_user','=', $request->id_user)
                    ->update([
                        'isi_pesan' => $request->pesan,
                        'status_keputusan' => $request->status_keputusan,
                        'tanggal_keputusan' => date('Y-m-d H:i:s')
                    ]);

                    return Redirect::back()->with('success', 'Berhasil Memberi Keputusan');

            }
           

        }else{

            if ($request->cekpengecek == 4) {

                if ($cekdata <= 0) {
                    return Redirect::back()->with('error', 'Bidang terkait belum memberi keputusan');
                }

            }else{

                $cekquery = DB::table('pesan')->insert(
                    ['id_user' => $request->id_user,
                     'isi_pesan' => $request->pesan,
                     'status_keputusan' => $request->status_keputusan,
                     'status_keputusan_dkk' => '0',
                     'tanggal_keputusan' => date('Y-m-d H:i:s'),
                     'created_at' => date('Y-m-d H:i:s')
                 ]);
            }

        }

        return Redirect::back()->with('success', 'Berhasil');


    }

    //ubah status aktif atau tidak
    public function updatestatuspelamar(Request $request){

        $selesaiOrnot = DB::table('datadiri')
                ->where('id_data_diri', $request->id_datadiri)
                ->first();

        if ($selesaiOrnot->status_finish == 2 || is_null($selesaiOrnot)) {
           return Redirect::back()->with('error', 'Pelamar ini belum menyelesaikan form permohonan kerja atau yang lainnya, harap tunggu pelamar menyelesaikannya terima kasih');
        }else{

            if($request->statusaktif == "on"){
                
                $newstatus = 1;
                $cek = DB::table('datadiri')
                    ->where('id_data_diri', $request->id_datadiri)
                    ->update([
                        'status' => $newstatus,
                        'status_posisi' => $request->posisi
                ]);

            }else{

                $newstatus2 = 2;
                    $cek = DB::table('datadiri')
                    ->where('id_data_diri', $request->id_datadiri)
                    ->update([
                        'status' => $newstatus2,
                        'status_posisi' => null
                ]);

            }

            if ($cek) {
                return Redirect::back()->with('success', 'Berhasil Mengubah Status Pelamar');
            }else{
                return Redirect::back()->with('error', 'Terjadi Kesalahan #2342kn');
            }
        }
    }

    //download hasil koreksi aptitude dan disc
    public function downloadkoreksi($id){

        $cek = DB::table('koreksi_aptidisc')->select('*')
        ->where('id_koreksi', '=', $id)
        ->first();


        $file= public_path(). "/berkas_tes/koreksi_aptidisc/".$cek->id_user."/".$cek->nama_filekoreksi;

        $headers = [
              'Content-Type' => 'application/pdf',
              'Content-Type:' => 'image/png',
              'Content-Type:' => 'image/jpg',
           ];

        return response()->download($file, $cek->nama_filekoreksi, $headers);
    }

    //review file koreksi aptidisc

    public function PreviewKoreksi($id){

        $cek = DB::table('koreksi_aptidisc')->select('*')
        ->where('id_koreksi', '=', $id)
        ->first();


        $file= public_path(). "/berkas_tes/koreksi_aptidisc/".$cek->id_user."/".$cek->nama_filekoreksi;

        return response()->file($file);

    }

    
    //Destroy File Tes Aptitude Dan DISC
    public function destroykoreksiaptidisc($id){

        $cekdata = DB::table('koreksi_aptidisc')->select('*')
        ->where('id_koreksi', '=', $id)
        ->count();

        if ($cekdata < 1) {

           return Redirect::back()->with('error', 'Data Mungkin Sudah Dihapus');

        }else{
     
            $cek = DB::table('koreksi_aptidisc')->select('*')
            ->where('id_koreksi', '=', $id)
            ->first();

            $cek_berkas = File::delete(public_path()."/berkas_tes/koreksi_aptidisc/".$cek->id_user."/".$cek->nama_filekoreksi);

            if ($cek_berkas) {

                DB::table('koreksi_aptidisc')->where('id_koreksi', '=', $id)->delete();

                return Redirect::back()->with('success2', 'Berhasil Hapus Foto '.$cek->nama_filekoreksi.'');
            }else{
                return Redirect::back()->with('error2', 'Terjadi Kesalahan #sdf334');
            }
        }
    } 

    //download file Aptitude Dan Disc
    public function downloadaptidiscau($id){

        $cek = DB::table('berkas_apti_disc')->select('*')
        ->where('id_apti_disc', '=', $id)
        ->first();


        $file= public_path(). "/berkas_tes/soaltes/".$cek->id_user."/".$cek->nama_file;

        $headers = [
              'Content-Type' => 'application/pdf',
              'Content-Type:' => 'image/png',
              'Content-Type:' => 'image/jpg',
           ];

        return response()->download($file, $cek->nama_file, $headers);
    }

    public function previewaptidisc($id){

        $cek = DB::table('berkas_apti_disc')->select('*')
        ->where('id_apti_disc', '=', $id)
        ->first();


        $file= public_path(). "/berkas_tes/soaltes/".$cek->id_user."/".$cek->nama_file;

        return response()->file($file);

    }

    //Destroy File Tes Aptitude Dan DISC
    public function destroyaptidiscau($id){

        $cekdata = DB::table('berkas_apti_disc')->select('*')
        ->where('id_apti_disc', '=', $id)
        ->count();

        if ($cekdata < 1) {

           return Redirect::back()->with('error', 'Data Mungkin Sudah Dihapus');

        }else{
     
            $cek = DB::table('berkas_apti_disc')->select('*')
            ->where('id_apti_disc', '=', $id)
            ->first();

            $cek_berkas = File::delete(public_path()."/berkas_tes/soaltes/".$cek->id_user."/".$cek->nama_file);

            if ($cek_berkas) {

                DB::table('berkas_apti_disc')->where('id_apti_disc', '=', $id)->delete();

                return Redirect::back()->with('success', 'Berhasil Hapus Foto '.$cek->nama_file.'');
            }else{
                return Redirect::back()->with('error', 'Terjadi Kesalahan #df34');
            }
        }
    } 

    //Edit Tambahan Kategori Dan Soal
    public function edittamkatsol($id){

        $input = Input::all();
       
         DB::table('tambahan_kategori')
            ->where('id_tambahan', $id)
            ->update([
                'detail_ptk' => $input['detail_ptk'],
                'kategori' => $input['kategori'],
                'soal' => $input['soal'],
                'updated_at' => \Carbon\Carbon::now()
            ]);
    }

    //Hapus tambahan kategori dan soal
    public function destroytamkatsol($id){

        DB::table('tambahan_kategori')->where('id_tambahan', $id)->delete();

    }

    //Tambah Tambahan Kategori dan Soal
    public function tamkatsol(Request $request){

        if ($request->input('typetamkatsol') == 1 ) {
            DataTambahanKategori::create(array_merge($request->all(), ['id_user' => $request->id_user]));
        }else{
             return Response::json(array(
                'success' => false,
                'errors' => 'Gagal Melakukan Proses #fsdjy'

            ), 400);

        }
    }

    //edit data diri
    public function showeditdatadiriau($id){
        $data = DataDiri::where('id_user', '=', $id)->first();
        $cekkota = $this->nama_kota($data->tempatlahir_kota);

        $provinsi = DB::table('provinsi')->get();
        return view('admin.dashboard.adminutama.editadmin.datadiri', $data)
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
                'kota_nodarurat2' => $input['kota_nodarurat2'],

                'nama_wali' => $input['nama_wali'],
                'alamat_wali' => $input['alamat_wali'],
                'nomor_wali' => $input['nomor_wali']

            ]);


    }
    //Edit data diri

    //Edit Perguruan Tinggi
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

    //EDIT SEKOLAH MENENGAH ATAS DAN SEKOLAH MENENGAH PERTAMA
    public function updatesmpsmaau(){

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

    //TAMBAHAN PERGURUAN TINGGI
    public function tambahanptau(Request $request){

        if ($request->input('typetambahanpt') == 1 ) {
            DataPerguruanTinggi::create(array_merge($request->all(), ['id_user' => $request->id_user]));
        }else{
             return Response::json(array(
                'success' => false,
                'errors' => 'Gagal Melakukan Proses #feg234'

            ), 400);

        }
    }

    public function destroyptau($id){

        DB::table('dataperguruantinggi')->where('id_perguruantinggi', $id)->delete();

    }

    //Edit Pendidikan Non Formal

    public function updatenfau(){

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
    //Hapus pendidikan Non Formal
    public function destroynfau($id){

        DB::table('datapendnonformal')->where('id_pen_nonformal', $id)->delete();

    }

    //Tambah Pendidikan Non Formal
    public function tambahannfau(Request $request){
         $input = Input::all();

         if ($input['settambahnf'] == 1) {
                DataPendNonFormal::create(array_merge($request->all(), ['id_user' => $request->id_user]));
         }else{
            return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #23f334',

                    ), 400);
         }
    }

    //Edit kesehatan
    public function showeditkesehatanau($id){

        $data = Kesehatan::where('id_user', '=', $id)->first();

        $name = explode(',',$data->nama_penyakit);

        return view('admin.dashboard.adminutama.editadmin.kesehatan',$data)->with('name', $name);
        
    }   
    //Edit kesehatan
    public function updatekesehatanau(Request $request, $id){

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
                    $datakesehatan->id_user = $id;
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

    //Edit Pengalaman Kerja Bidang Pendidikan
    public function updatepkbpendau(){

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

    //Hapus Pengalaman Kerja Bidang Pendidikan
    public function destroypkbpenau($id){

        if (empty($id) === true) {
           return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #wer213',

                    ), 400);
        }else{
            DB::table('pengalaman_kerja_pend')->where('id_pengalaman_kerja_pend', $id)->delete();
        }
    }

    public function tambahpkbpenau(Request $request){

        $input = Input::all();
        if ($input['typepkbpen'] == 1) {
                DataPengalamanKerjaPendidikan::create(array_merge($request->all(), ['id_user' => $request->id_user]));
         }else{
            return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #wer213',

                    ), 400);
         }
        /*$Response = ['success' => 'Berhasil'];
        return response()->json($Response, 200);*/
    }


    //Edit Pengalaman Kerja Bidang Non Pendidikan
    public function updatepkbnonpendau(){

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

    //Hapus Pengalaman Kerja Non Pendidikan
    public function destroypkbnonpenau($id){

        if (empty($id) === true) {
           return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #wese4313',

                    ), 400);
        }else{
            DB::table('pengalaman_kerja_non_pend')->where('id_pk_nonpendidikan', $id)->delete();
        }
    }

    //Tambah Pengalaman Kerja Bidang NON Pendidikan
    public function tambahpkbnonpenau(Request $request){

        $input = Input::all();
        if ($input['pk_nonpentambah'] == 1) {
                DataPengalamanKerjaNonPendidikan::create(array_merge($request->all(), ['id_user' => $request->id_user]));
         }else{
            return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #werfd3213',

                    ), 400);
         }

    }

    //Edit Organisasi
    public function updateorganau(){

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

    //Tambah Organisasi
    public function tambahorganau(Request $request){

        $input = Input::all();
        if ($input['typeorgan'] == 1) {
                DataPengalamanOrganisasi::create(array_merge($request->all(), ['id_user' => $request->id_user]));
         }else{
            return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #werfd3213',

                    ), 400);
         }

    }

    //Hapus Organisasi
    public function destroyorganau($id){

        if (empty($id) === true) {
           return Response::json(array(
                        'success' => false, 
                        'errors' => 'Gagal Memproses Data #wdfg43',

                    ), 400);
        }else{
            DB::table('pengalaman_organisasi')->where('id_pengalamanorganisasi', $id)->delete();
        }
    }

    //Edit Pekerjaan Yang Dilamar
    public function updatepydlau(){

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


    public function updatepencapaianau(){

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


    //Hapus Pencapaian Admin Utama
    public function destroypencapaianau($id){

         if (empty($id) === true) {
           return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #wdfg43',

                    ), 400);
        }else{
            DB::table('datapencapaian')->where('id_pencapaian', $id)->delete();
        }
    }


    //Tambah Pencapaian Admin Utama

    public function tambahanpencau(Request $request){
        $input = Input::all();
        if ($input['typepenc'] == 1) {
                DataPencapaian::create(array_merge($request->all(), ['id_user' => $request->id_user]));
         }else{
            return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #d2v213',

                    ), 400);
         }
    }

    public function bahasaupdateau(){

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
    }


    //Tambah Bahasa Lainnya Admin Utama
    public function bahasatambahau(Request $request){

        $input = Input::all();
        if ($input['typetambahbahasa'] == 1) {
                DataBerbahasaAsing::create(array_merge($request->all(), ['id_user' => $request->id_user]));
         }else{
            return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #doi3313',

                    ), 400);
         }

    }

    //Hapus Bahasa Admin Utama
    public function destroybahasaau($id){

        if (empty($id) === true) {
           return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #sko398g43',

                    ), 400);
        }else{
            DB::table('databerbahasaasing')->where('id_berbahasaasing', $id)->delete();
        }

    }

    //Edit Keahlian Lainnya
    public function updatekeahlianau(Request $request, $id){
        
        $deletefirst = DB::table('datakeahlianlainnya')->where('id_user', $id)->delete();

        if ($deletefirst) {

            $datakeahlian = new DataKeahlianLainnya;
            $datakeahlian->id_user = $id;
            $datakeahlian->jenis_keahlian = $request->alatmusik.$request->bernyanyi.$request->menari.$request->menjahit.$request->menyulam.$request->memasak.$request->melukis;
                $datakeahlian->keahlian_lainnya = $request->keahlianlainnya;
            $datakeahlian->save();

        }else{
            
             return Response::json(array(
                        'success' => false,
                        'errors' => 'Gagal Memproses Data #d2dsn53913',

                    ), 400);
        }
    }

    protected function nama_kota($id_kota){
        $findkota = DB::table('kabupaten')
        ->select('id_kab','nama_kab')
        ->where('id_kab', $id_kota)
        ->first();

        return $findkota->nama_kab;
    }
}
