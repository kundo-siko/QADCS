<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator,Redirect,Response;
use Session;
use Illuminate\Support\Facades\Storage;
use DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\PDO;

use App\User;
use App\employee;
use App\academic;
use App\professional;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
	 //Home Route
    public function index()
    {
        return view('dashboard');
    }
	
	//No Privileges Route
    public function not_allowed()
    {
        return view('not_allowed');
    }
	
	 //Log out/Sign out Route
    public function logout()
    {
        Auth::logout();
		return view('auth.login');
    }
	
	public function view_profile(){			
		$e = \App\employee::where('employee_no',Auth::user()->employee_no)
					->get();		
		if($e != '[]'){
		return view("View_records.view_profile",['e'=>$e]);		
		}else{
			return redirect('personal_update');
		}
	}
	
	//Log out/Sign out Route
    public function Reset_Password()
    {
       $token = Auth::user()->remember_token;
		return view('auth.reset_password',['token'=>$token]);
    }
	
	// Reset Password
	public function password_reset(Request $request){	
		$request->validate([
        'password' => 'required|min:8',
        'password_confirmation' => 'required|min:8',
		]);
	
		//Request
		$employee_no = $request->employee_no;
		$id = $request->id;
		$password = $request->password;
		$confirm = $request->password_confirmation;
		
		//Retrieve User
		if($password == $confirm){ 		
		$user = \App\User::find($id);
		
		$user->password = Hash::make($confirm);
		
		$users = \App\User::where('employee_no',$employee_no)
						->get();		
	 
			$user->save(); 
		 
			return Redirect::to("view_profile")->withSuccess('New Password for Employee #: '.$employee_no.' Updated Succesfully');
			
		}else{ 
			return Redirect::to("Reset_Password")->withDanger('New Password Does Not Match Confirm For Employee #: '.$employee_no);
		}	
	}	
	
	
	
	
}
