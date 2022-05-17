<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use App\User as User;
use App\level as Level;
use DataTables;
use DB;
use Validator;
use Response;
use Redirect;  
use Alert;
use Hash;
use Auth;

class UserController extends Controller
{	

    //UBAH STATUS//
    public function changestatus(Request $request){

        $cekStatus = DB::table('users')->select('status_aktif')->where('id','=',$request->id)->first();

        if ($cekStatus->status_aktif == 'aktif') {
            
            DB::table('users')->where('id', $request->id)->update(['status_aktif' => 'tidak aktif']);
            return Response::json(array( 'gg' => '1', 'errors' => false), 200);

        }elseif($cekStatus->status_aktif == 'tidak aktif'){

            DB::table('users')->where('id', $request->id)->update(['status_aktif' => 'aktif']);
            return Response::json(array( 'gg' => '2', 'errors' => false), 200);

        }else{
            return Response::json(array( 'gg' => 'gagal', 'errors' => false), 200);
        }
    }


	//////index///////
	public function index(){

		$level = Level::orderBy('id_level')->get();
        $posisi = DB::table('posisi')->get();

    	return view('admin.dashboard.user.index')->with('level', $level)->with('posisi', $posisi);
    	
    }
    public function prodilist(){

        if (Auth::user()->level == "1" || Auth::user()->level == "4") {

            return DataTables::of(DB::table('users')
            ->join('level', 'level.id_level', '=', 'users.level') 
            ->leftJoin('posisi', 'posisi.id_posisi', '=', 'users.posisi') 
            ->select('users.*', 'level.nama_level','posisi.nama_posisi')
            ->where('users.level','!=', '2'))
            ->addColumn('action', function($data){

                            $button = '<div class="dropdown show dropleft ">
                              <a class="btn btn-info dropdown-toggle btn-xs" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-cogs"></span>
                              </a>

                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a href="user/'.$data->id.'/edit" title="Edit User" class="dropdown-item">
                                        <span class="fa fa-edit" style="color: black"></span> Edit Data

                                  </a>
                                <a class="dropdown-item  delete" name="delete" id="'.$data->id.'"><span class="fa fa-trash" style="color: black"></span> Hapus Data</a>
                                <a class="dropdown-item  reset" name="reset" id="'.$data->id.'"><span class="fa fa-recycle" style="color: black"></span> Reset Password</a>
                              </div>
                            </div>';

                            return $button;

                            
                        })

        
                        ->rawColumns(['action','usernamepassword'])
                        ->make(true);
                        
            }

	}

     public function indexuser2(){

        if (Auth::user()->level == "1" || Auth::user()->level == "4") {

            return DataTables::of(DB::table('users')
            ->join('level', 'level.id_level', '=', 'users.level') 
            ->leftJoin('posisi', 'posisi.id_posisi', '=', 'users.posisi') 
            ->select('users.*', 'level.nama_level','posisi.nama_posisi')
            ->where('users.level','=', '2')
            //->orderBy('users.id','DESC')
            )
            ->addColumn('action', function($data){
                         
                             $button = '<div class="dropdown show dropleft">
                              <a class="btn btn-info dropdown-toggle btn-xs" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-cogs"></span>
                              </a>

                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink " >
                                <a href="user/'.$data->id.'/edit" title="Edit User" class="dropdown-item">
                                        <span class="fa fa-edit" style="color: black"></span> Edit Data

                                  </a>
                                <a class="dropdown-item  delete" name="delete" id="'.$data->id.'"><span class="fa fa-trash" style="color: black"></span> Hapus Data</a>
                                <a class="dropdown-item  reset" name="reset" id="'.$data->id.'"><span class="fa fa-recycle" style="color: black"></span> Reset Password</a>
                                <a class="dropdown-item  UbahStatus" name="reset" id="'.$data->id.'"><span class="fa fa-check" style="color: black"></span> Ubah Status</a>
                              </div>
                            </div>';

                            return $button;

                            
                        })

                        ->rawColumns(['action','usernamepassword'])
                        ->make(true);
                        
            }
            

    }
	//////index///////


	//////tambah///////
	public function showtambah(){

		$level = Level::orderBy('id_level')->get();
        $posisi = DB::table('posisi')->get();
		return view('admin.dashboard.user.tambahuser')->with('level', $level)->with('posisi', $posisi);

	}

	protected function validator(array $data)
    {
        $messages = [
            'username.required'    => 'Username dibutuhkan.',
            'username.unique'      => 'Username sudah Digunakan.',
            'password.required'    => 'Password dibutuhkan.',
            'level.required'       => 'level dibutuhkan.',
            'password.confirmed'   => 'Password dan Konfirmasi password tidak sama.',
            'password.min'         => 'Panjang password minimal 6 karakter',
            'posisi.required'         => 'Wajib Kalo Ini Mah',
            
        ];
        return Validator::make($data, [
            'username' 	=> 'required|unique:users',
            'level'	 	=> 'required',
            'posisi'     => 'required',
            'password' 	=> 'required|confirmed|min:6'
            
        ], $messages);
    }

    protected function insertakun(array $data)
    {

        $account = new User();
        $account->name        		= $data['name'];
        $account->username        	= $data['username'];
        $account->level         	= $data['level'];
        $account->posisi            = $data['posisi'];
        $account->status_aktif      = 'aktif';
        $account->password         	= bcrypt($data['password']);

        //melakukan save, jika gagal (return value false) lakukan harakiri
        //error kode 500 - internel server error
        if (! $account->save() )
          App::abort(500);

    }

    public function tambahakun(Request $request)

    {
        $validator = $this->validator($request->all(), 'user')->validate();
 
        $this->insertakun($request->all());
 
        response()->json($request->all(),200);

        return Redirect::action('Auth\UserController@index')
                          ->with('successMessage','Data User "'.Input::get('name').'" telah berhasil ditambah.');

    }
    //////tambah///////


    //////Edit///////

   	public function edituser($id){

	        $data = User::find($id);

	        $levelgrup = Level::orderBy('id_level')->get();
            $posisi = DB::table('posisi')->get();

	        return view('admin.dashboard.user.edituser',['data' => $data, 'posisi' => $posisi])
	                ->with('levelgrup', $levelgrup);
                    

	}


	public function simpanedit($id){

       $input = Input::all();

       foreach ($input as $key) {
            $input['username'];
       }
       $usernamec = $input['username'];
       
        $messages = [
            'username.required'     =>   'Username dibutuhkan.'
        ];
        
        $validator = Validator::make($input, [
                           	'username' 	=> 'required'

                      ], $messages);

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();
          # Bila validasi sukses
        }

        //$editProdi = Prodi::find($id);
        //$editProdi->prodiKode = Input::get('prodiKode'); //atau bisa $input['prodiKode']
        //$editProdi->prodiNama = $input['prodiNama'];
        //$editProdi->prodiKodeJurusan = Input::get('prodiJurKode');
        $users_count = DB::table('users')
         ->where('username', '=', $usernamec)
         ->count();

        $data = User::find($id);
        if ($users_count > 0 && $usernamec != $data->username) {
            $messages = [
                'username'     =>   'Username Sudah Digunakan.'
            ];
           return Redirect::back()->withErrors($messages)->withInput();
        }

        $user = DB::table('users')->where('id', $id)->update([
			'name' => $input['name'],
			'username' => $input['username'],
			'level' => $input['level'],
            'posisi' => $input['posisi']
			]);

        if ($user) {
        	return Redirect::action('Auth\UserController@index')
                            ->with('successMessage','Data User "'.Input::get('name').'" telah berhasil diubah.'); 
        }else{
        	return Redirect::action('Auth\UserController@index');
        }
    }


    //////Edit///////


    //////Hapus///////
    public function destroy($id){

	        $data = User::findOrFail($id);
	        $data->delete();

	        if ($data) {
	        	alert()->success('User', 'Berhasil Hapus Data')->persistent('Close');
	        }else{
	        	alert()->error('User', 'Gagal Menghapus Data')->persistent('Close');
	        }

	}
	//////Hapus///////

	//reseting//
	public function reset($id){

       	$input 	= Input::all();
        $user 	= DB::table('users')->where('id', $id)->update([
			'password' => bcrypt('12345678'),
			]);

        if ($user) {
        	return Redirect::action('Auth\UserController@index')
                          ->with('successMessage','Data telah berhasil direset.'); 
        }else{
        	abort(500);
        }
    }
    //resetting//


    //////change password//////
    public function showChangePasswordForm(){
        return view('admin.dashboard.user.changepassword');
    }
    
    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password Berhasil Diganti !");
    }
    //////change password//////

}
