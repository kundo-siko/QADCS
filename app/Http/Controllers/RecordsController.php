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
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Crypt;

use App\User;
use App\employee;
use App\academic;
use App\professional;
use App\training;
use App\employment_record;

class RecordsController extends Controller
{
 //
	/****************
	//Employee Profiles
	*****************/
	public function all_profiles(){
		$x = '';
		$e = \App\employee::all();
		return view("Admin.All_Records.all_profiles",['e'=>$e, 'x'=>$x]);
	}
	
	public function filter_all_profiles(Request $request){
		$employee_no = $request->employee_no;		
			       
            $employee_no = Crypt::encryptString($employee_no);
		
		return redirect()->action(
    'RecordsController@filtered_profiles', ['employee_no' => $employee_no]
		);
	}
	
	public function filtered_profiles(Request $request){
		$employee_no = $request->employee_no;
		
		try {
			$employee_no = Crypt::decryptString($employee_no);
		} catch (DecryptException $e) {
			//
		}
		
			if($employee_no != 'All'){
			$es = \App\employee::where('employee_no',$employee_no)
						->paginate(10);
			}else{
			$es = \App\employee::paginate(10);	
			} 
			
	return view("Admin.All_Records.filter_profiles",['es'=>$es, 'i'=>$employee_no]);
	}
	
	public function view_all_profiles(Request $request){
		$x = '1';
		$employee_no = $request->employee_no;
		
		
		$e = \App\employee::where('employee_no',$employee_no)
					->get();
		
		return view("Admin.All_Records.employee_view",['e'=>$e,'x'=>$x]);
	}
	/****************
	//Employee Profiles End
	*****************/
	
	/****************
	//Academic Records
	*****************/
	public function academic_qualifications(){		
		$e = \App\academic::all();
			foreach($e as $e){
				if(Auth::user()->employee_no == $e->employee_no){
					return Redirect::to('view_academic')->withSuccess('User : '.Auth::user()->employee_no .'. Review your qualifications here');
				}
			}
		return view('Data_collection.academic_qualifications',['x' => '']);		
	}
	
	//View all employees academic qualification
	public function all_academic(){
		$e = \App\academic::all();
		return view("Admin.All_Records.all_academic",['e'=>$e]);		
	}
	
	//Filter academic recoreds by employee number
	public function filter_all_academic(Request $request){
		$employee_no = $request->employee_no;
		$employee_no = Crypt::encryptString($employee_no); //Encrypt employee number to hide it
		
		return redirect()->action(
    'RecordsController@filter_academic', ['employee_no' => $employee_no]
		);		
	}
	
	//Filter results produced
	public function filter_academic(Request $request){
		$employee_no = $request->employee_no;
		
		try {
			$employee_no = Crypt::decryptString($employee_no); //Decrypt employee number to produce result
		} catch (DecryptException $e) {
			//
		}
		
		if($employee_no != 'All'){
		$e = \App\employee::where('employee_no',$employee_no)
					->paginate(10);
		}else{
		$e = \App\employee::paginate(10);	
		} 
		return view("Admin.All_Records.filter_academic",['e'=>$e]);		
	}
	
	//View all of employees academic records
	public function view_all_academic(Request $request){
		$x = '1';
		$employee_no = $request->employee_no;		
		
		$a = \App\academic::where('employee_no',$employee_no)
					->get();
		$count = \App\academic::where('employee_no',$employee_no)->count(); 
		
		return view("Admin.All_Records.academic_view",['a'=>$a,'x'=>$x,'count'=>$count]);
	}
	/****************
	//Academic Records End
	*****************/
	
	/*****************
	// Professional Records
	******************/
	public function all_professional(){
		$x = '';
		$e = \App\professional::all();
		return view("Admin.All_Records.all_professional",['e'=>$e, 'x'=>$x]);		
	}	
	
	//Filter professional recoreds by employee number
	public function filter_all_professional(Request $request){
		$employee_no = $request->employee_no;
		$employee_no = Crypt::encryptString($employee_no); //Encrypt employee number to hide it
		
		return redirect()->action(
    'RecordsController@filter_professional', ['employee_no' => $employee_no]
		);		
	}
	
	//Filter results produced
	public function filter_professional(Request $request){
		$employee_no = $request->employee_no;
		
		try {
			$employee_no = Crypt::decryptString($employee_no); //Decrypt employee number to produce result
		} catch (DecryptException $e) {
			//
		}
		//Get names of users by using employess table
		if($employee_no != 'All'){
		$e = \App\employee::where('employee_no',$employee_no)
					->paginate(10);
		}else{
		$e = \App\employee::paginate(10);
		} 
		return view("Admin.All_Records.filter_professional",['e'=>$e]);		
	}
	
	//View All Employees professionalqualifications
	public function view_all_professional(Request $request){
		$employee_no = $request->employee_no;
		$employee_no = Crypt::encryptString($employee_no); //Encrypt employee number to hide it
		
		return redirect()->action(
    'RecordsController@professional_view', ['employee_no' => $employee_no]
		);		
	}
	
	//Paginate Results
	public function professional_view(Request $request){
		$x = '1';
		$employee_no = $request->employee_no;
			try {
			$employee_no = Crypt::decryptString($employee_no); //Decrypt employee number to produce result
			} catch (DecryptException $e) {
				//
			}
		
		$e = \App\professional::where('employee_no',$employee_no)
					->paginate(10);
		$count = \App\professional::where('employee_no',$employee_no)->count(); 
		
		return view("Admin.All_Records.professional_view",['e'=>$e,'x'=>$x,'count'=>$count]);
	}
	/*****************
	// Professional Records End
	******************/
	
	/******************
	// Current Training Records
	*****************/
	public function all_training(){
		$x = '';
		$e = \App\training::all();
		return view("Admin.All_Records.all_training",['e'=>$e, 'x'=>$x]);		
	}
	
	//Filter Current Training recoreds by employee number
	public function filter_all_training(Request $request){
		$employee_no = $request->employee_no;
		$employee_no = Crypt::encryptString($employee_no); //Encrypt employee number to hide it
		
		return redirect()->action(
    'RecordsController@filter_training', ['employee_no' => $employee_no]
		);		
	}
	
	//Filter results produced
	public function filter_training(Request $request){
		$employee_no = $request->employee_no;
		
		try {
			$employee_no = Crypt::decryptString($employee_no); //Decrypt employee number to produce result
		} catch (DecryptException $e) {
			//
		}
		
		//Get names of users by using employess table
		if($employee_no != 'All'){
		$e = \App\employee::where('employee_no',$employee_no)
					->paginate(10);
		}else{
		$e = \App\employee::paginate(10);
		} 
		return view("Admin.All_Records.filter_training",['e'=>$e]);		
	}
	
	public function fil_tra(Request $request){
		$x = '1';
		$employee_no = $request->employee_no;
		$employee_no = Crypt::encryptString($employee_no); //Encrypt employee number to hide it
		
		return redirect()->action(
    'RecordsController@view_all_training', ['x' => $x,'employee_no'=> $employee_no]
		);		
	}
		
	public function view_all_training(Request $request){
		$x = '1';
		$employee_no = $request->employee_no;
		
		try {
			$employee_no = Crypt::decryptString($employee_no); //Decrypt employee number to produce result
		} catch (DecryptException $e) {
			//
		}
		$e = \App\training::where('employee_no',$employee_no)
					->paginate(10);
		$count = \App\training::where('employee_no',$employee_no)->where('finish','>',date("Y-m-d"))->count(); 
		$count2 = \App\training::where('employee_no',$employee_no)->where('finish','<',date("Y-m-d"))->count(); 
		
		return view("Admin.All_Records.training_view",['e'=>$e,'x'=>$x,'count'=>$count,'count2'=>$count2]);
	}
	/******************
	// Current Training Records
	*****************/
	
	/*************
	// employment_record Records
	***************/
	public function all_employment(){
		$x = '';
		$e = \App\employment_record::all();
		return view("Admin.All_Records.all_employment",['e'=>$e, 'x'=>$x]);		
	}
	
	//Filter Current Training recoreds by employee number
	public function filter_all_employment(Request $request){
		$employee_no = $request->employee_no;
		$employee_no = Crypt::encryptString($employee_no); //Encrypt employee number to hide it
		
		return redirect()->action(
    'RecordsController@filter_employment', ['employee_no' => $employee_no]
		);		
	}
	
	//Filter results produced
	public function filter_employment(Request $request){
		$employee_no = $request->employee_no;
		
		try {
			$employee_no = Crypt::decryptString($employee_no); //Decrypt employee number to produce result
		} catch (DecryptException $e) {
			//
		}
		
		//Get names of users by using employess table
		if($employee_no != 'All'){
		$e = \App\employee::where('employee_no',$employee_no)
					->paginate(10);
		}else{
		$e = \App\employee::paginate(10);
		} 
		return view("Admin.All_Records.filter_employment",['e'=>$e]);		
	}
	
	
	//View All Employees professionalqualifications
	public function view_employment_filtered(Request $request){
		$employee_no = $request->employee_no;
		$employee_no = Crypt::encryptString($employee_no); //Encrypt employee number to hide it
		
		return redirect()->action(
    'RecordsController@employment_view', ['employee_no' => $employee_no]
		);		
	}
	
	//Paginate Results
	public function employment_view(Request $request){
		$x = '1';
		$employee_no = $request->employee_no;
			try {
			$employee_no = Crypt::decryptString($employee_no); //Decrypt employee number to produce result
			} catch (DecryptException $e) {
				//
			}
		
		$e = \App\employment_record::where('employee_no',$employee_no)
					->paginate(10);
		$count = \App\employment_record::where('employee_no',$employee_no)->count(); 
		
		return view("Admin.All_Records.employment_filtered",['e'=>$e,'x'=>$x,'count'=>$count]);
	}
	
	public function view_all_employment(Request $request){
		$x = '1';
		$employee_no = $request->employee_no;
		$id = $request->id;
		
		
		$e = \App\employment_record::where('id',$id)
					->get();
		$count = \App\employment_record::where('employee_no',$employee_no)->count(); 
		
		return view("Admin.All_Records.employment_record_view",['e'=>$e,'x'=>$x,'count'=>$count]);
	}
	/*************
	// employment_record Records End
	***************/
	
 
}
