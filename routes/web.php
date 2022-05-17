<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('homepage','homepage');
Route::resource('/posts', 'PostController');



Auth::routes(['register' => false,'reset' => false]);
Route::get('/home', array('as' => 'admin', 'uses' => 'AdminController@index'))->name('home');
Route:: get('/', 'AdminController@index')->name('home');
//Route::get('/', array('as' => 'admin', 'uses' => 'AdminController@index'));
//Route::get('/indexh', 'PostController@index');

 

//admin utama/superadmin

Route::middleware('web','auth')->group(function () {

 
	Route:: get('/indexpemohon', 'AdminUtama\AdminPemohon@indexlistpemohon')->name('ListPemohon');
	//serverside get data
	Route:: get('/datapemohon', 'AdminUtama\AdminPemohon@datapemohon')->name('DataPemohon');

	//DAFTAR ONLINE 2.0
	Route:: get('/DataPemohonSelesai', 'AdminUtama\AdminPemohon@datapemohonselesai')->name('DataPemohonSelesai');
	Route:: get('/DataPemohonDitolak', 'AdminUtama\AdminPemohon@datapemohonditolak')->name('DataPemohonDitolak');

	Route:: get('/profilepemohon', 'AdminUtama\AdminPemohon@profilepemohon')->name('profilepemohon');

	//file upload
	Route:: get('/fileupload/{id}', 'AdminUtama\AdminPemohon@datafileupload')->name('FileUpload');
	Route:: get('/databerkas/{id}', 'AdminUtama\AdminPemohon@databerkas')->name('FileUploadData');
	Route:: get('/download/{id}', 'AdminUtama\AdminPemohon@getDownloadfile')->name('downloadfile');
	Route:: get('/hapus/{id}', 'AdminUtama\AdminPemohon@destroyfile')->name('destroyfileau');

	Route:: get('/preview/{id}', 'AdminUtama\AdminPemohon@previewfile')->name('Previewfile');

	//File Upload Untuk Tes
	Route:: get('/fileuploadtes/{id}', 'AdminUtama\AdminPemohon@datafileuploadtes')->name('FileUploadtes');
	Route:: get('/getdataberkastes/{id}', 'AdminUtama\AdminPemohon@databerkastes')->name('FileUploadtesgetdata');

	Route:: get('/downloadberkastes/{id}', 'AdminUtama\AdminPemohon@getDownloadfileberkastes')->name('downloadberkastes');
	Route:: get('/destroyberkastesau/{id}', 'AdminUtama\AdminPemohon@destroyfileberkastesau')->name('destroyberkastesau');
	//preview berkas tes
	Route:: get('/previewberkastes/{id}', 'AdminUtama\AdminPemohon@previewfileberkastes')->name('Previewfileberkastes');


	//datadiriadminutama
	Route:: post('/datadiriau', 'AdminUtama\AdminPemohon@indexdatadiriau')->name('viewdatadiriau');
	Route:: get('/detaildatadiri/{id}', 'AdminUtama\AdminPemohon@detaildatadiri')->name('detaildatadiri');

	//data kesehatan dan pendidikan admin utama
	Route:: post('/datakesehatanau', 'AdminUtama\AdminPemohon@indexdatakesehatanxpendidikanau')->name('viewdatakesehatanau');

	//data pengalaman kerja dan organisasi
	Route:: post('/datapengalamankerjaxorganisasi', 'AdminUtama\AdminPemohon@datapengalamankerjaxorganisasi')->name('viewpengalamankerjaxorganisasi');

	//datapekerjaan yang dilamar admin utama
	Route:: post('/pekerjaanyangdilamar', 'AdminUtama\AdminPemohon@datapekerjaanyangdilamar')->name('viewpekerjaanyangdilamar');

	//data pencapaian bahasa dan keahlian
	Route:: post('/pencapaianXkeahlianXbahasa', 'AdminUtama\AdminPemohon@datapenxkeahxbah')->name('viewdatapenxkeahxbah');
	
	//Handle User
	
	////////user////////

	//2.0
	Route::post('Change/Status','Auth\UserController@changestatus')->name('changestatus');

	Route::get('/user',array('as'=>'user', 'uses' => 'Auth\UserController@index'));
	Route::get('/datauser',array('as'=>'user.data', 'uses' => 'Auth\UserController@prodilist'));
	Route::get('/datauser2',array('as'=>'user.data2', 'uses' => 'Auth\UserController@indexuser2'));
	Route:: get('/datauser2', 'Auth\UserController@indexuser2')->name('indexuser2');
	//tambah
	Route::get('/user/tambah',array('as'=>'user.tambah.show', 'uses' => 'Auth\UserController@showtambah'));
	Route::post('/datauser/tambah',array('as'=>'user.tambah', 'uses' => 'Auth\UserController@tambahakun'));
	//hapus
	Route::get('datauser/destroy/{id}', 'Auth\UserController@destroy');
	//resetpass
	Route::get('datauser/reset/{id}', 'Auth\UserController@reset');
	//changePassword
	Route::get('/changePassword',array('as'=>'user.changepassword', 'uses' => 'Auth\UserController@showChangePasswordForm'));
	Route::post('simpan/changePassword','Auth\UserController@changePassword')->name('simpan/changePassword');
	//edit
	Route::get('/user/{id}/edit',array('as'=>'user.edit', 'uses' => 'Auth\UserController@edituser'));
	Route::put('/user/{id}/simpanedit',array('as'=>'user.simpan.edit', 'uses' => 'Auth\UserController@simpanedit'));
	////////user////////

	//editpemohon admin utama//
	Route:: get('/pemohonau/{id}/edit', 'AdminUtama\AdminProses@showeditdatadiriau')->name('editDataDiriau');
	Route:: put('/updateau/{id}/datadiri', 'AdminUtama\AdminProses@updatedatadiri')->name('updateDataDiriau');
	//editpemohon admin utama//

	//editpendidikan Perguruan tinggi admin utama//
	Route:: put('/perguruantinggiau/edit', 'AdminUtama\AdminProses@updateperting')->name('updateperguruantinggiau');
	Route::get('/hapus/prosesau/{id}', 'AdminUtama\AdminProses@destroyptau')->name('destroyptau');
	Route:: post('/pttambahan/tambahau', 'AdminUtama\AdminProses@tambahanptau')->name('postDatapendidikanptau');
	//editpendidikan Perguruan tinggi admin utama//

	//Edit Smp dan Sma//
	Route:: put('/pendidikansmp/editau', 'AdminUtama\AdminProses@updatesmpsmaau')->name('updatePendidikansmpsmaau');
	//Edit Pendidikan Non Formal
	Route:: put('/edit/prosesau', 'AdminUtama\AdminProses@updatenfau')->name('updatePendnonformalau');
	Route::get('/hapus/nfau/{id}', 'AdminUtama\AdminProses@destroynfau')->name('destroynfau');
	Route::post('/nftambahan/tambahau', 'AdminUtama\AdminProses@tambahannfau')->name('tambahnfau');

	//editkesehatan//
	Route:: get('/kesehatan/{id}/editau', 'AdminUtama\AdminProses@showeditkesehatanau')->name('editKesehatanau');
	Route:: put('/update/{id}/kesehatanau', 'AdminUtama\AdminProses@updatekesehatanau')->name('updateKesehatanau');
	//editkesehatan//

	//Pengalaman kerja Bidang Pendidikan
	Route:: put('/editpkbpend/updateau', 'AdminUtama\AdminProses@updatepkbpendau')->name('updatepkbpendau');
	Route:: get('/hapus/pkbpenau/{id}', 'AdminUtama\AdminProses@destroypkbpenau')->name('destroypkbpen');
	Route:: post('/tambahpknpen/tambahau', 'AdminUtama\AdminProses@tambahpkbpenau')->name('tambahpkbpenau');
	//Pengalaman kerja Bidang Pendidikan

	//Pengalaman kerja Bidang NON Pendidikan
	Route:: put('/editpkbnonpend/updateau', 'AdminUtama\AdminProses@updatepkbnonpendau')->name('updatepkbnonpendau');
	Route:: get('/hapus/pkbnonpenau/{id}', 'AdminUtama\AdminProses@destroypkbnonpenau')->name('destroypkbnonpenau');
	Route:: post('/tambah/prosesau/', 'AdminUtama\AdminProses@tambahpkbnonpenau')->name('tambahpkbnonpenau');
	//Pengalaman kerja Bidang NON Pendidikan

	//Orgaanisasi
	Route:: put('/editorgan/updateau', 'AdminUtama\AdminProses@updateorganau')->name('updateorganau');
	Route:: post('/tambahorgan/tambahau', 'AdminUtama\AdminProses@tambahorganau')->name('tambahorganau');
	Route:: get('/hapus/organau/{id}', 'AdminUtama\AdminProses@destroyorganau')->name('destroyorganau');
	//Orgaanisasi

	//Pekerjaan Yang Dilamar
	Route:: put('/update/pydlau', 'AdminUtama\AdminProses@updatepydlau')->name('updatepydlau');

	//Pencapaian
	Route:: put('/pencapaian/updateau', 'AdminUtama\AdminProses@updatepencapaianau')->name('updatepencapaianau');
	Route:: get('/hapus/pencau/{id}', 'AdminUtama\AdminProses@destroypencapaianau')->name('destroypencapaianau');
	Route:: post('/tambah/pencau/', 'AdminUtama\AdminProses@tambahanpencau')->name('tambahanpencau');

	//Edit Bahasa 
	Route:: put('/update/bahasaau', 'AdminUtama\AdminProses@bahasaupdateau')->name('bahasaupdateau');
	Route:: post('/tambah/bahasaau', 'AdminUtama\AdminProses@bahasatambahau')->name('bahasatambahau');
	Route:: get('/hapus/bahasaau/{id}', 'AdminUtama\AdminProses@destroybahasaau')->name('destroybahasaau');

	//Keahlian Lainnya
	Route:: get('/show/keahlianau/{id}', 'AdminUtama\AdminPemohon@showkeahlianau')->name('showeditkeahlianau');
	Route:: post('/update/keahlianau/{id}', 'AdminUtama\AdminProses@updatekeahlianau')->name('updatekeahlianau');


	//kategori dan Tambahan
	Route:: get('/tambahankategori/{id}', 'AdminUtama\AdminPemohon@indextambahankategori')->name('indextambahankategori');
	Route:: get('/getdatatabmahankategori/{id}', 'AdminUtama\AdminPemohon@getDataKategoriTambahan')->name('DataKategoriTambahan');
	Route:: post('/tamkatso', 'AdminUtama\AdminProses@tamkatsol')->name('tambahankategori');
	Route:: get('/edittamkatsol/{id}', 'AdminUtama\AdminPemohon@showedittamkatsol')->name('showedittamkatsol');
	Route:: put('/puttamkatsol/{id}', 'AdminUtama\AdminProses@edittamkatsol')->name('edittamkatsol');

	Route:: get('/destroytamkatsol/{id}', 'AdminUtama\AdminProses@destroytamkatsol')->name('destroytamkatsol');

	Route:: get('/showtambahtamkatsol/{id}', 'AdminUtama\AdminPemohon@showtambahtamkatsol')->name('showtambahtamkatsol');
	Route:: post('/ceksoal', 'AdminUtama\AdminPemohon@ceksoalkategori')->name('ceksoalkategori');

	
	//Berkas Tes Aptitude Dan DISC


	//2.0 DISC
	Route::get('/RangkumanDisc/{id}', 'AdminUtama\AdminDisc@RangkumanDisc')->name('RangkumanDisc');
	Route::post('/RenderTabelDisc/', 'AdminUtama\AdminDisc@RenderTabelDisc')->name('RenderTabelDisc');
	Route::post('/RenderTabelNilaiDisc/', 'AdminUtama\AdminDisc@RenderTabelNilaiDisc')->name('RenderTabelNilaiDisc');
	Route::post('/PrintPdfJawDisc/', 'AdminUtama\AdminDisc@PrintPDFJawabanDisc')->name('PrintPDFJawabanDisc');
	Route::get('/tespreview/{id}', 'AdminUtama\AdminDisc@tespreview')->name('tespreview');

	//bagian proses core dan mask, hasil akhir
	Route::post('/WatakKepribadian/', 'AdminUtama\AdminDisc@WatakKepribadian')->name('WatakKepribadian');
	Route::post('/PostCoreMask/', 'AdminUtama\AdminDisc@PostCoreMask')->name('PostCoreMask');

	Route::post('/RenderData/', 'AdminUtama\AdminDisc@RenderData')->name('RenderData');
	//Print Hasil Akhir Disc (Core Mask)
	Route::get('/PrintCoreMask/{id}', 'AdminUtama\AdminDisc@PrintCoreMask')->name('PrintCoreMask');


	//2.0
	Route::post('/DetailWaktu/', 'AdminUtama\AdminPemohon@DetailWaktu')->name('DetailWaktu');
	Route::get('/PrintAptitude/', 'AdminUtama\AdminPemohon@PrintAptitude')->name('PrintAptitude');



	///////------------------/////////////
	Route:: get('/IndexAptitudeXdiscc/{id}', 'AdminUtama\AdminPemohon@ShowAptiDisc')->name('ShowAptiDisc');

	Route:: get('/downloadaptidiscau/{id}', 'AdminUtama\AdminProses@downloadaptidiscau')->name('downloadaptidiscau');
	Route:: get('/destroyaptidiscau/{id}', 'AdminUtama\AdminProses@destroyaptidiscau')->name('destroyaptidiscau');

	Route:: get('/PreviewAptiDisc/{id}', 'AdminUtama\AdminProses@previewaptidisc')->name('PreviewAptiDisc');

	//Update Status
	Route:: post('update/status/', 'AdminUtama\AdminProses@updatestatuspelamar')->name('updatestatus');

	//Pesan
	Route:: post('statuspesan/', 'AdminUtama\AdminProses@statuspesan')->name('SimpanPesan');
	Route:: get('isipesan/{id}', 'AdminUtama\AdminPemohon@isipesan');

	//hasil koreksi aptidisc 
	Route:: post('hasilkoreksiaptidisc/', 'AdminUtama\AdminProses@hasilkoreksiaptidisc')->name('hasilkoreksiaptidisc');
	Route:: get('downloadkoreksi/{id}', 'AdminUtama\AdminProses@downloadkoreksi')->name('downloadkoreksi');
	Route:: get('PreviewKoreksi/{id}', 'AdminUtama\AdminProses@PreviewKoreksi')->name('PreviewKoreksi');
	Route:: get('destroykoreksiaptidisc/{id}', 'AdminUtama\AdminProses@destroykoreksiaptidisc')->name('destroykoreksiaptidisc');
	
	//Berkas Soal UPload
	Route:: post('berkassoal/', 'AdminUtama\AdminProses@UploadSoal')->name('BerkasSoal');
	Route:: get('destroyberkassoalfile/{id}', 'AdminUtama\AdminProses@destroyberkasfilesoal')->name('DestroyBerkasSoal');

	//Berkas hasil pengisian soal dalam file
	Route:: get('downloadbersol/{id}', 'AdminUtama\AdminProses@downloadbersol')->name('DownloadBersol');
	Route:: get('previewbersol/{id}', 'AdminUtama\AdminProses@previewbersol')->name('PreviewBersol');


});
 

//Client / Pemohon
Route::group(['middleware' => ['web','auth','level:2']], function(){

////////form daftar pemohon////////

Route:: get('/pemohon', 'Pemohon\PemohonController@index')->name('pemohonindex');
Route::get('/tambahpemohon',array('as'=>'pemohon.showtambah', 'uses' => 'Pemohon\PemohonController@showtambah'));
Route::get('/showpengalamankerja',array('as'=>'pemohon.showpengalamankerja', 'uses' => 'Pemohon\PemohonController@showtambahpengalamankerja'));
Route::get('/showtambahkesehatan',array('as'=>'pemohon.showtambahkesehatan', 'uses' => 'Pemohon\PemohonController@showtambahkesehatan'));

Route:: post('/kabupatenkota', array('as'=>'pemohon.kabupatenkota', 'uses' => 'Pemohon\PemohonController@kabupatenkota'));
Route:: post('/post-data', 'Pemohon\PemohonController@recieve')->name('postData');
Route:: post('/post-data-kesehatan', 'Pemohon\PemohonController@recievekesehatan')->name('postDataKesehatan');
Route:: post('/post-data-pendidikan', 'Pemohon\PemohonController@recievependidikan')->name('postDatapendidikan');
Route:: post('/post-data-pendnonformal', 'Pemohon\PemohonController@recievependnonformal')->name('postDatapendnonformal');
Route:: post('/post-data-pengalamankerja', 'Pemohon\PemohonController@receivepengalamankerja')->name('postDatapengalamankerja');
Route:: post('/post-data-pencapaian', 'Pemohon\PemohonController@receivepencapaian')->name('postDatapencapaian');
Route:: post('/post-data-pekerjaanyangdilamar', 'Pemohon\PemohonController@receivepekerjaanyangdilamar')->name('postDatapekerjaanyangdilamar');
Route:: post('/post-data-bahasakeahlian', 'Pemohon\PemohonController@receive_bahasa_dan_keahlian')->name('postDataBahasaKeahlian');


//editkesehatan//
Route:: get('/kesehatan/{id}/edit', 'Pemohon\PemohonController@showeditkesehatan')->name('editKesehatan');
Route:: put('/update/{id}/kesehatan', 'Pemohon\PemohonController@updatekesehatan')->name('updateKesehatan');
//editkesehatan//

//editpendidikan//
Route:: post('/pttambahan/tambah', 'Pemohon\PemohonController@tambahanpt')->name('postDatapendidikanpt');
Route:: get('/pendidikan/{id}/edit', 'Pemohon\PemohonController@showeditpendidikan')->name('editPendidikan');
Route:: put('/pendidikansmp/edit', 'Pemohon\PemohonController@updatesmpsma')->name('updatePendidikansmpsma');
Route:: put('/perguruantinggi/edit', 'Pemohon\PemohonController@updateperting')->name('updateperguruantinggi');
Route::get('/hapus/proses/{id}', 'Pemohon\PemohonController@destroypt')->name('destroypt');
//editpendidikan//

//editpendidikannonformal//
Route:: post('/nftambahan/tambah', 'Pemohon\PemohonController@tambahannf')->name('postDatapendidikannf');
Route:: get('/pendnonformal/{id}/edit', 'Pemohon\PemohonController@showeditpendnonformal')->name('editPendnonformal');
Route:: put('/edit/proses', 'Pemohon\PemohonController@updatenf')->name('updatePendnonformal');
Route::get('/hapus/nf/{id}', 'Pemohon\PemohonController@destroynf')->name('destroynf');
//editpendidikannonformal//

//pengalamankerjadanorganisasi//
//pendidikan
Route:: get('/pengalamankerjadanorganisasi/{id}/edit', 'Pemohon\PemohonController@showeditpengalamankerjadanorganisasi')->name('editpengalamankerjadanorganisasi');
Route:: put('/editpkbpend/update', 'Pemohon\PemohonController@updatepkbpend')->name('updatepkbpend');
Route:: post('/tambahpknpen/tambah', 'Pemohon\PemohonController@tambahpkbpen')->name('tambahpkbpen');
Route:: get('/hapus/pkbpen/{id}', 'Pemohon\PemohonController@destroypkbpen')->name('destroypkbpen');

//nonpendidikan
Route:: put('/editpkbnonpend/update', 'Pemohon\PemohonController@updatepkbnonpend')->name('updatepkbnonpend');
Route:: get('/hapus/pkbnonpen/{id}', 'Pemohon\PemohonController@destroypkbnonpen')->name('destroypkbnonpen');
Route:: post('/tambah/proses/', 'Pemohon\PemohonController@tambahpkbnonpen')->name('tambahpkbnonpen');

//organisasi
Route:: put('/editorgan/update', 'Pemohon\PemohonController@updateorgan')->name('updateorgan');
Route:: put('/tambahorgan/tambah', 'Pemohon\PemohonController@tambahorgan')->name('tambahorgan');
Route:: get('/hapus/organ/{id}', 'Pemohon\PemohonController@destroyorgan')->name('destroyorgan');

//pengalamankerjadanorganisasi//

//editpemohon//
Route:: get('/pemohon/{id}/edit', 'Pemohon\PemohonController@showeditdatadiri')->name('editDataDiri');
Route:: put('/update/{id}/datadiri', 'Pemohon\PemohonController@updatedatadiri')->name('updateDataDiri');
//editpemohon//

//edit bahasa dan keahllian lainnya//
Route:: get('/bahasakeahlian/{id}/edit', 'Pemohon\PemohonController@bahasakeahlianshow')->name('bahasakeahlianshow');
Route:: put('/update/bahasa', 'Pemohon\PemohonController@bahasaupdate')->name('bahasaupdate');
Route:: post('/tambah/bahasa', 'Pemohon\PemohonController@bahasatambah')->name('bahasatambah');
Route:: get('/hapus/bahasa/{id}', 'Pemohon\PemohonController@destroybahasa')->name('destroybahasa');
Route:: post('/update/keahlian/{id}', 'Pemohon\PemohonController@updatekeahlian')->name('updatekeahlian');

//edit bahasa dan keahllian lainnya//
 
Route:: get('/listdatadiri', 'Pemohon\PemohonController@listdatadiri')->name('viewdatadiri');


//pencapaian
Route:: get('/pencapaian/{id}/edit', 'Pemohon\PemohonController@showeditpencapaian')->name('editpencapaian');
Route:: put('/pencapaian/update', 'Pemohon\PemohonController@updatepencapaian')->name('updatepencapaian');
Route:: get('/hapus/penc/{id}', 'Pemohon\PemohonController@destroypencapaian')->name('destroypencapaian');
Route:: post('/tambah/penc/', 'Pemohon\PemohonController@tambahanpenc')->name('tambahanpenc');


//pekerjaan yang dilamar
Route:: get('/pekerjaandilamar/{id}/edit', 'Pemohon\PemohonController@showeditpekerjaanyangdilamar')->name('showeditpydl');
Route:: put('/update/pydl', 'Pemohon\PemohonController@updatepydl')->name('updatepydl');

//lihat hasil resume data
Route:: get('/resume/{id}/show', 'Pemohon\PemohonController@resume')->name('resumeview');

//sesi upload data yang ada
Route:: get('/upload/{id}/show', 'Pemohon\PemohonController@indexupload')->name('uploadview');
Route:: get('/upload/{id}/show/pendidikan', 'Pemohon\PemohonController@indexuploadpendidikan')->name('uploadviewpendidikan');
Route:: get('/upload/{id}/show/pendidikannf', 'Pemohon\PemohonController@indexuploadpendidikannf')->name('uploadviewpendidikannf');
Route:: get('/upload/{id}/show/organisasipencapaian', 'Pemohon\PemohonController@indexuploadorganisasipencapaian')->name('uploadvieworganisasipencapaian');

Route:: get('/upload/{id}/show/lainnya', 'Pemohon\PemohonController@indexuploadfilelainnya')->name('indexuploadfilelainnya');

Route:: post('/upload/proses', 'Pemohon\PemohonController@prosesupload')->name('prosesupload');

Route:: get('/download/{id}/berkas/{typeberkas}', 'Pemohon\PemohonController@getDownloadfile')->name('downloadberkas');

Route:: get('/destroy/{id}/berkas/{typeberkas}', 'Pemohon\PemohonController@destroyfile')->name('destroyfile');


Route:: get('/destroypend/{id}/berkas/{typeberkas}', 'Pemohon\PemohonController@destroyfilependidikan')->name('destroyfilependidikan');
Route:: get('/destroypendnf/{id}/berkas/{typeberkas}', 'Pemohon\PemohonController@destroyfilependidikannf')->name('destroyfilependidikannf');
Route:: get('/destroyorganpenc/{id}/berkas/{typeberkas}', 'Pemohon\PemohonController@destroyfileorganpenc')->name('destroyfileorganpenc');
Route:: get('/destroylainya/{id}/berkas/{typeberkas}', 'Pemohon\PemohonController@destroylainya')->name('destroylainya');


//pendidikan
Route:: get('/tpend', 'Pemohon\PemohonController@showtambahpend')->name('showtambahpend');

//Zona Tes
Route:: get('/zonates/{id}', 'Pemohon\PemohonController@zonatesshow')->name('zonatesshow');
Route:: post('/zonatesupload', 'Pemohon\PemohonController@zonatesupload')->name('zonatesuploadtes');

Route:: get('/detailberkastes/{id}/{id2}', 'Pemohon\PemohonController@showfileberkastes')->name('showfileberkastes');
Route:: get('/downloadfileberkastes/{id}', 'Pemohon\PemohonController@downloadbertes')->name('Downloadberkastes');
Route:: get('/destroyberkastes/{id}', 'Pemohon\PemohonController@destroyfileberkastes')->name('Destroyfileberkastes');

//TES APTITUDE
//APTITUDE 2.0 
Route:: get('/KerjakanTesAptitude', 'Pemohon\PemohonController@AptitudeTes')->name('KerjakanTesAptitude');
Route:: post('/InfoKategori', 'Pemohon\PemohonController@InfoKategori')->name('InfoKategori');
Route:: post('/InfoPengerjaan', 'Pemohon\PemohonController@InfoPengerjaan')->name('InfoPengerjaan');


//MULAI PENGERJAAN
Route:: post('/MulaiPengerjaan', 'Pemohon\PemohonController@StartPengerjaan')->name('StartPengerjaan');
Route:: post('/UpdateJawaban', 'Pemohon\PemohonController@UpdateJawaban')->name('UpdateJawaban');
Route:: post('/CekButPengerjaan', 'Pemohon\PemohonController@CekButPengerjaan')->name('CekButPengerjaan');
Route:: post('/UpdateTimer', 'Pemohon\PemohonController@UpdateTimer')->name('UpdateTimer');

//MULAI SIMPAN PENGERJAAN
Route:: post('/StartPengerjaan', 'Pemohon\PemohonController@MulaiPengerjaan')->name('MulaiPengerjaan');
Route:: post('/soal/aptitude/verbal', 'Pemohon\PemohonController@soalverbal')->name('SoalVerbal');


//MINI MAP TEST APTITUDE
Route:: post('/PetaMiniMap', 'Pemohon\PemohonController@PetaMiniMap')->name('PetaMiniMap');
//BUTTON FINISH TES APTITUDE
Route:: post('/BtnFnshApt', 'Pemohon\PemohonController@BtnFnshApt')->name('BtnFnshApt');
//PROSES SIMPAN AKHIRI TES ATAU SUBMIT
Route:: post('/SubmitUjianApti', 'Pemohon\PemohonController@SubmitUjianApti')->name('SubmitUjianApti');








Route:: get('/soalaptitude', 'Pemohon\PemohonController@downloadsoalaptitude')->name('downloadsoalaptitude');
Route:: get('/lembarjawabanaptitude', 'Pemohon\PemohonController@downloadlembarjawabanaptitude')->name('downloadlembarjawabanaptitude');

//TES DESC
Route:: get('/soaldisc', 'Pemohon\PemohonController@downloadsoaldisc')->name('downloadsoaldisc');
//UPLOAD TES DISC DAN APTITUDE
Route:: post('/uploaddiscaptitude', 'Pemohon\PemohonController@uploaddiscaptitude')->name('uploaddiscaptitude');

//Destroy Hasil Tes Aptitude
Route:: get('/DestroyHasilAptitude/{id}', 'Pemohon\PemohonController@DestroyHasilAptitude')->name('DestroyHasilAptitude');
//Destroy Hasil Tes Disc
Route:: get('/DestroyHasilDisc/{id}', 'Pemohon\PemohonController@DestroyHasilDisc')->name('DestroyHasilDisc');

////////form daftar pemohon////////

//update Status Selesai
Route:: get('update/status/{statusselesai}', 'Pemohon\PemohonController@updatestatusselesai')->name('updatestatusselesai');

//download soal tambahan
Route:: get('downloadsoaltambahan/{id}', 'Pemohon\PemohonController@downloadsoaltambahan')->name('downloadsoaltambahan');
Route:: post('uploadsoaltambahan/', 'Pemohon\PemohonController@uploadsoaltambahan')->name('uploadsoaltambahan');
Route:: get('destroyhasilsoaltambahan/{id}', 'Pemohon\PemohonController@destroyhasilsoaltambahan')->name('destroyhasilsoaltambahan');




//TES DISC 2.0 BARU 
Route:: get('/KerjakanDisc', 'Pemohon\TesDisc@index')->name('KerjakanDisc');

Route:: get('/MulaiPengerjaan', 'Pemohon\TesDisc@MulaiTes')->name('MulaiTesDisc');

//POST TES DISC
Route:: post('/PostJawabanDisc', 'Pemohon\TesDisc@PostJawabanDisc')->name('PostJawabanDisc');


});

