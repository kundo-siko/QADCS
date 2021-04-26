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

use App\User;

class AdminsController extends Controller
{
    //
	// Add a new user
	public function addUser(Request $request){		
		//Validate User Details
		 $validatedData = $request->validate([
		'employee_no' => 'required|unique:users',
		'password' => 'required|min:6','confirm' => 'required|min:6',
		'role' => 'required',
		]);
			
		$employee_no = $request->employee_no;
		$password = $request->password;
		$confirm = $request->confirm;
		$role = $request->role;
		$status = $request->status;
		
		if($password == $confirm){
			//Create a user in the DB
			User::create([
            'employee_no' => $employee_no,
            'role' => $role,
            'status' => $status,
            'password' => Hash::make($confirm),
        ]);
			
			return Redirect::to("add_user")->withSuccess('User Added Succesfully');
			
		}
		else{
			return Redirect::to("add_user")->withSuccess('Password Does Not Match Confirm Password');
	
		}
	}
	
	//Validate that Hash Matches Plain Text 
	public function checkhash(Request $request){
		$plain = $request->plain;
		$us = \App\User::where('employee_no','123')
					->get();

		if (Hash::check($plain, $u->password)) {
			// The passwords match...
			echo "Password Match";
		}else{
	echo "No Match  ".$u->password;
		}
	}
	
	public function ahh(){
		return view("dashboard");
	}
	
	public function all_Users(){
		$users = \App\User::paginate(15);
		
		return view("Admin.all_users",['users'=>$users]);
		
	}
	
	// Edit a user
	public function editUser(Request $request){
		
		$employee_no = $request->employee_no;
		$id = $request->id;
		$x = 1;
		$u = \App\User::where('employee_no',$employee_no)
					->get();
		
		if(Auth::user()->id == $id){
			return Redirect::to("all_users")->withDanger('You cannot edit your own user acount in this way. Employee #: '.$employee_no);
		}else{
		return view("Admin.add_user",['u'=>$u,'x'=>$x, 'employee_no'=>$employee_no]);
		}
	}
	
	// Complete edit, save new details
	public function post_editUser(Request $request){		
		//Request
		$employee_no = $request->employee_no;
		$id = $request->id;
		$password = $request->password;
		$confirm = $request->confirm;
		$role = $request->role;
		$status = $request->status;
		
		//Retrieve User
		if($password == $confirm){ 		
		$user = \App\User::find($id);
		
		$user->employee_no = $employee_no;
		$user->role = $role;
		$user->status = $status;
		$user->password = Hash::make($confirm);
		
		$users = \App\User::where('employee_no',$employee_no)
						->get();
		
		if($users != '[]'){	
			if($employee_no != $users[0]->employee_no || $id == $users[0]->id){
			$user->save(); 
		 
				return Redirect::to("all_users")->withSuccess('User of Employee #: '.$employee_no.' Edited Succesfully');
			}else{
				return Redirect::to("all_users")->withDanger('User of Employee #: '.$employee_no.' Already Exists');		
			}
		}else{ 
			$user->save(); 
		 
				return Redirect::to("all_users")->withSuccess('User of Employee #: '.$employee_no.' Edited Succesfully');
		}
			
		}else{ 
			return Redirect::to("all_users")->withDanger('Password Does Not Match Confirm For Employee #: '.$employee_no);
		}
		
		
	}	
	
	public function remove_user(Request $request){		
		//Request
		$employee_no = $request->employee_no;
		$id = $request->id;		
		$status = 'Removed';
		
		//Retrieve User
			
		$user = \App\User::find($id);		
		
		$user->status = $status;
		
		if(Auth::user()->id == $id){
			return Redirect::to("all_users")->withDanger('You cannot remove privileges for an account you are logged into');
		}else{
			$user->save();
			return Redirect::to("all_users")->withSuccess('Privileges for employee '.$employee_no.', removed succesfully');
		}		
	}
	
	public function return_user(Request $request){		
		//Request
		$employee_no = $request->employee_no;
		$id = $request->id;		
		$status = 'Pending';
		
		//Retrieve User
			
		$user = \App\User::find($id);		
		
		$user->status = $status;
		
		if(Auth::user()->id == $id){
			return Redirect::to("all_users")->withDanger('You cannot remove privileges for an account you are logged into');
		}else{
			$user->save();
			return Redirect::to("all_users")->withSuccess('Privileges for employee '.$employee_no.', returned succesfully');
		}		
	}
	
}
