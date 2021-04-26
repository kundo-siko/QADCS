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
use App\employee;
use App\academic;
use App\professional;
use App\training;
use App\employment_record;

class AuditController extends Controller
{
    //
	
	//Create Personal Profile
	public function personal_profile(Request $request){
		//Check if we are editing or creating
		$ed = $request->ed;
		$id = $request->dhere;
		
			if($ed == '0'){
				//Create employee profile
			$employee = new employee;
			}else if($ed == '1'){			
				//Edit Employee Profile
			$employee = \App\employee::find($id);		
			}

		//Details entered by user	
		$employee->employee_no = $request->employee_no;
		$employee->sex = $request->sex;
		$employee->ae_number = $request->ae_number;
		$employee->salary_scale = $request->salary_scale;
		$employee->surname = $request->surname;
		$employee->other_names = $request->other_names;
		$employee->DOB = $request->DOB;
		$employee->NRC = $request->NRC;
		$employee->email = $request->email;
		$employee->file_number = $request->file_number;
		$employee->nationality = $request->nationality;
		$employee->ministry = $request->ministry;
		$employee->department = $request->department;
		$employee->district = $request->district;
		$employee->province = $request->province;
		$employee->appointment = $request->appointment;
		$employee->substantive = $request->substantive;
		$employee->job = $request->job;
		$employee->confirmation = $request->confirmation;
		
				$e = \App\employee::all();
				foreach($e as $e){
					if($request->ae_number == $e->ae_number){
						return Redirect::to("personal_update")->withDanger('User : '.$request->employee_no.'. AE Number already taken');						
					}
					if($request->NRC == $e->NRC){
						return Redirect::to("personal_update")->withDanger('User : '.$request->employee_no.'. NRC already exixts');						
					}
					if($request->file_number == $e->file_number){
						return Redirect::to("personal_update")->withDanger('User : '.$request->employee_no.'. File nnumber already exists');						
					}
					if($request->email == $e->email){
						return Redirect::to("personal_update")->withDanger('User : '.$request->employee_no.'. Email address already exists');						
					}
				}
				
				//Setting user status to active
			$user = \App\User::find(Auth::user()->id);
			$user->status = 'Active';
			$user->save();
		
		//Saving employee profile		
		$employee->save();
		
		if($request->employee_no == Auth::user()->employee_no){
			return Redirect::to("view_profile")->withSuccess('User : '.$request->employee_no.'. Personal profile updated Succesfully');	
		}
		else{
			return Redirect::to("all_profiles")->withSuccess('User : '.$request->employee_no.'. Personal profile updated Succesfully');	
		}
			
	}
	
	//Edit Personal Profile
	public function edit_profile(Request $request){
		//Check if we are editing or creating
		$ed = $request->ed;
		$id = $request->dhere;		
			
			$employee = \App\employee::find($id);		
			
		//Details entered by user	
		$employee->employee_no = $request->employee_no;
		$employee->sex = $request->sex;
		$employee->ae_number = $request->ae_number;
		$employee->salary_scale = $request->salary_scale;
		$employee->surname = $request->surname;
		$employee->other_names = $request->other_names;
		$employee->DOB = $request->DOB;
		$employee->NRC = $request->NRC;
		$employee->email = $request->email;
		$employee->file_number = $request->file_number;
		$employee->nationality = $request->nationality;
		$employee->ministry = $request->ministry;
		$employee->department = $request->department;
		$employee->district = $request->district;
		$employee->province = $request->province;
		$employee->appointment = $request->appointment;
		$employee->substantive = $request->substantive;
		$employee->job = $request->job;
		$employee->confirmation = $request->confirmation;
		
				
				$e = \App\employee::all();
				foreach($e as $e){
					if($request->ae_number == $e->ae_number && $e->employee_no != $request->employee_no){
						return Redirect::to("personal_update")->withDanger('User : '.$request->employee_no.'. AE Number already taken');						
					}
					if($request->NRC == $e->NRC && $e->employee_no != $request->employee_no){
						return Redirect::to("personal_update")->withDanger('User : '.$request->employee_no.'. NRC already exixts');						
					}
					if($request->file_number == $e->file_number && $e->employee_no != $request->employee_no){
						return Redirect::to("personal_update")->withDanger('User : '.$request->employee_no.'. File nnumber already exists');						
					}
					if($request->email == $e->email && $e->employee_no!= $request->employee_no){
						return Redirect::to("personal_update")->withDanger('User : '.$request->employee_no.'. Email address already exists');						
					}
				}
				
				//Setting user status to active
			$u = \App\User::where('employee_no',$request->employee_no)
						->get();
			$user = \App\User::find($u[0]->id);
			$user->status = 'Active';
			$user->save();
		 
		//Saving employee profile		
		$employee->save();
		
		if($request->employee_no == Auth::user()->employee_no){
			return Redirect::to("view_profile")->withSuccess('User : '.$request->employee_no.'. Personal profile Edited Succesfully');	
		}
		else{
			return Redirect::to("all_profiles")->withSuccess('User : '.$request->employee_no.'. Personal profile Edited Succesfully');	
		}
			
	}
	
	public function personal_update(){	
			$e = \App\employee::all();
			foreach($e as $e){
				if(Auth::user()->employee_no == $e->employee_no){
					return Redirect::to('view_profile')->withSuccess('User : '.Auth::user()->employee_no .'. Review your profile here');
				}
			}
			
		 $x = [];
		return view("Data_collection.personal_profile",['x'=>$x]);		
	}
	
	public function personal(Request $request){		
		$employee_no = $request->employee_no;
		$e = \App\employee::where('employee_no',$employee_no)
					->get();		
		if($e == '[]'){ $x = [];}
		else{ $x = 1; }
		return view("Data_collection.personal_profile",['e'=>$e,'x'=>$x]);		
	}
	
	//Create Academic Qualifications Record
	public function academic(Request $request){		
		$emp = $request->employee_no;
		$level1= 'Grade 9 Certificate';
		$level2= 'Grade 12 Certificate';
		$level3= 'Other';
		
		if (isset($_POST['grade9'])){
			$grade9 = $_POST['grade9']; // Displays value of checked checkbox.
		}else{ $grade9 = 'No'; }
		if (isset($_POST['grade12'])){
			$grade12 = $_POST['grade12']; // Displays value of checked checkbox.
		}else{ $grade12 = 'No'; }
		if (isset($_POST['other'])){
			$other = $_POST['other']; // Displays value of checked checkbox.
		}else{ $other = 'No'; }
		
		$ed = \App\academic::where('employee_no', $emp) //Retrieve all Education Data
                     ->get();
	//Grade 9 Document Upload
	if ($request->file('grade9_pdf') != null){ //Check if user has uploaded a file
					$grade9pdf = $request->file('grade9_pdf')->storeAs('Academic_Qualifications/grade9_pdf/'.$emp, $emp.'_'.$level1.'_'.date('YmdHis'));
			}else{ $grade9pdf = 'Not Added'; }//Default statement if no file is uploaded
	//Grade 9 Document Upload end

	//Grade 12 Document Upload
	if ($request->file('grade12_pdf') != null){ //Check if user has uploaded a file
					$grade12pdf = $request->file('grade12_pdf')->storeAs('Academic_Qualifications/grade12_pdf/'.$emp, $emp.'_'.$level2.'_'.date('YmdHis'));
			}else{ $grade12pdf = 'Not Added'; }//Default statement if no file is uploaded
	//Grade 12 Document Upload End
	
	//Other academic Document Upload
	if ($request->file('other_pdf') != null){ //Check if user has uploaded a file
					$otherpdf = $request->file('other_pdf')->storeAs('Academic_Qualifications/other_pdf/'.$emp, $emp.'_'.$level3.'_'.date('YmdHis'));
			}else{ $otherpdf = 'Not Added'; }//Default statement if no file is uploaded
	//Other academic Document Upload End
	
		//Create academic qualifications record
		$academic = new academic;
	
		$academic->employee_no = $emp;
		$academic->grade9 = $request->grade9;
		$academic->grade9_PDF = $grade9pdf;
		$academic->grade12 = $request->grade12;
		$academic->grade12_pdf = $grade12pdf;
		$academic->other = $request->other;
		$academic->other_pdf = $otherpdf;
		$academic->specify = $request->specify;
		
		$academic->save();
		return Redirect::to("view_academic")->withSuccess('User : '.$emp.'. Academic record edited Succesfully');
	}
	
	//Create Professional/Vocational record qualifications
	public function professional(Request $request){
		$emp = $request->employee_no;
		$level = $request->level;
		
		if ($request->file('document') != null){ //Check if user has uploaded a file
					$document = $request->file('document')->storeAs('Professional_Qualifications/document/'.$emp, $emp.'_'.$level.'_'.date('YmdHis'));
			}else{ $document = 'Not Added'; }//Default statement if no file is uploaded
			
		//Create professional qualifications record
		$professional = new professional;
		
		$professional->employee_no = $emp;
		$professional->qualification = $request->qualification;
		$professional->level = $request->level;
		$professional->institution = $request->institution;
		$professional->year = $request->year;
		$professional->document = $document;
	
		$professional->save();

		return Redirect::to("view_professional")->withSuccess('User : '.$emp.'. Professional qualification record added Succesfully');	
	}

	//Create current training record
	public function training_record(Request $request){
		$emp = $request->employee_no;
			
		//Create current training record
		$training = new training;
		
		$training->employee_no = $emp;
		$training->course = $request->course;
		$training->stage = $request->stage;
		$training->qualification = $request->qualification;
		$training->start = $request->start;
		$training->finish = $request->finish;
		$training->institution = $request->institution;
		$training->sponsor = $request->sponsor;
		
		$training->save();
		
		return Redirect::to("view_training")->withSuccess('User : '.$emp.'. Current training record added Succesfully');	
	}
	
	
	//Create Employment Record record
	public function employment(Request $request){
		$emp = $request->employee_no;
		
			
		//Other academic Document Upload
	if ($request->file('payslip') != null){ //Check if user has uploaded a file
					$payslip = $request->file('payslip')->storeAs('Employment_Record/payslip/'.$emp, $emp.'_'.date('YmdHis'));
			}else{ $payslip = 'Not Added'; }//Default statement if no file is uploaded
	//Other academic Document Upload End
		
		//Create current training record
		$employment_record = new employment_record;
		
		$employment_record->employee_no = $emp;
		$employment_record->position = $request->position;
		$employment_record->appointment_date = $request->appointment_date;
		$employment_record->appointment_status = $request->appointment_status;
		$employment_record->appointment_type = $request->appointment_type;
		$employment_record->duration = $request->duration;
		$employment_record->section = $request->section;
		$employment_record->department = $request->department;
		$employment_record->ministry = $request->ministry;
		$employment_record->station = $request->station;
		$employment_record->district = $request->district;
		$employment_record->province = $request->province;
		$employment_record->recent_payslip = $payslip;
		
		$employment_record->save();
		
		return Redirect::to("view_employment")->withSuccess('User : '.Auth::user()->employee_no.'. Employment Record record added Succesfully');	
	}


	
}
