<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator,Redirect,Response;
use Session;
use Illuminate\Support\Facades\Storage;
use DB;
use Illuminate\Support\Facades\Crypt;

use App\academic;
use App\professional;
use App\training;
use App\employment_record;

class PersonalRecordsController extends Controller
{
    //
	
	
	 //
    /*
	//Professional/Vocational Qualificatios
	/
	*/
	public function view_professional(){		
		$p = \App\professional::where('employee_no',Auth::user()->employee_no)
					->paginate(10);
		if($p != '[]'){
		return view("View_records.view_professional",['p'=>$p]);	
		}else{
			return redirect('professional_qualifications');
		}	
	}
	
	public function edit_professional(Request $request){		
		$employee_no = $request->employee_no;
		$id = $request->id;
		$x = 1;
		$u = \App\professional::where('id',$id)
					->get();
		
		return view("Data_collection.professional_qualifications",['u'=>$u,'x'=>$x,'employee_no'=>$employee_no]);	
	}
	
	public function postedit_professional(Request $request){
		$emp = $request->employee_no;
		$url = $request->employee_no;
		$id = $request->id;
		$level = $request->level;
		$ed = \App\professional::where('id',$id)
					->get();
		
			//documents Document Upload			
		if ($ed[0]->document == Null){ //Check if Document in database does not exists
			if ($request->file('document') != null){ //Check if user has uploaded a file
					$document = $request->file('document')->storeAs('Professional_Qualifications/document/'.$emp, $emp.'_'.$level.'_'.date('YmdHis'));
			}else{ $document = 'Not Added'; }//Default statement if no file is uploaded
		}
		elseif($ed[0]->document != Null){ //Check if Document in database does exists
						if (($request->file('document')) == null){  //If user has not uploaded a new file, keep existing one in database
							$document = ($ed[0]->document); 
						} elseif ($request->file('document') != null) { //Check if user has uploaded new file
								$document = $request->file('document')->storeAs('Professional_Qualifications/document/'.$emp, $emp.'_'.$level.'_'.date('YmdHis'));
									} 
								}					 
					elseif($ed == '[]'){
							if ($request->file('document') != null) { //Check if user has uploaded a file
								$document = $request->file('document')->storeAs('Professional_Qualifications/document/'.$emp, $emp.'_'.$level.'_'.date('YmdHis'));
								}else{ $document = "Not Added"; 	} //Default statement if no file is uploaded
						}
			///document Document Upload End
		
			
		$professional = \App\professional::find($id);
		
		$professional->employee_no = $emp;
		$professional->qualification = $request->qualification;
		$professional->level = $request->level;
		$professional->institution = $request->institution;
		$professional->year = $request->year;
		$professional->document = $document;
	
		$professional->save();
		
		if($request->employee_no == Auth::user()->employee_no){
		return Redirect::to("view_professional")->withSuccess('User : '.$emp.'. Professional qualification record updated Succesfully');	
		}else{
		return Redirect::to("all_professional")->withSuccess('User : '.$emp.'. Professional qualification record updated Succesfully');		
		}
	}
	/*
	//Professional/Vocational Qualificatios End
	/
	*/
	
	/****	
	//Academic Qualificatios
	/
	*/
	//View Academic RecordsController
	public function view_academic(){		
		$a = \App\academic::where('employee_no',Auth::user()->employee_no)
					->get();
		if($a != '[]'){
		return view("View_records.view_academic",['a'=>$a]);	
		}else{
			return redirect('academic_qualifications');
		}				
	}
	
	public function edit_academic(Request $request){		
		$employee_no = $request->employee_no;
		$id = $request->id;
		$x = 1;
		$u = \App\academic::where('id',$id)
					->get();
		return view("Data_collection.academic_qualifications",['u'=>$u,'x'=>$x,'employee_no'=>$employee_no]);	
	}
	
	public function postedit_academic(Request $request){
		$emp = $request->employee_no;
		$id = $request->id;
		$level1= 'Grade 9 Certificate';
		$level2= 'Grade 12 Certificate';
		$level3= 'Other';
		$ed = \App\academic::where('id',$id)
					->get();
		
		//grade9_pdf Document Upload			
		if ($ed[0]->grade9_PDF == Null){ //Check if Document in database does not exists
			if ($request->file('grade9_pdf') != null){ //Check if user has uploaded a file
					$grade9pdf = $request->file('grade9_pdf')->storeAs('Academic_Qualifications/grade9_pdf/'.$emp, $emp.'_'.$level1.'_'.date('YmdHis'));
			}else{ $grade9pdf = 'Not Added'; }//Default statement if no file is uploaded
		}
		elseif($ed[0]->grade9_PDF != Null){ //Check if Document in database does exists
						if (($request->file('grade9_pdf')) == null){  //If user has not uploaded a new file, keep existing one in database
							$grade9pdf = ($ed[0]->grade9_PDF); 
						} elseif ($request->file('grade9_pdf') != null) { //Check if user has uploaded new file
								$grade9pdf = $request->file('grade9_pdf')->storeAs('Academic_Qualifications/grade9_pdf/'.$emp, $emp.'_'.$level1.'_'.date('YmdHis'));
									} 
								}					 
					elseif($ed == '[]'){
							if ($request->file('grade9_pdf') != null) { //Check if user has uploaded a file
								$grade9pdf = $request->file('grade9_pdf')->storeAs('Academic_Qualifications/grade9_pdf/'.$emp, $emp.'_'.$level1.'_'.date('YmdHis'));
								}else{ $grade9pdf = "Not Added"; 	} //Default statement if no file is uploaded
						}
			///grade9_pdf Document Upload End
			
		//grade12_pdf Document Upload			
		if ($ed[0]->grade12_PDF == Null){ //Check if Document in database does not exists
			if ($request->file('grade12_pdf') != null){ //Check if user has uploaded a file
					$grade12pdf = $request->file('grade12_pdf')->storeAs('Academic_Qualifications/grade12_pdf/'.$emp, $emp.'_'.level2.'_'.date('YmdHis'));
			}else{ $grade12pdf = 'Not Added'; }//Default statement if no file is uploaded
		}
		elseif($ed[0]->grade12_PDF != Null){ //Check if Document in database does exists
						if (($request->file('grade12_pdf')) == null){  //If user has not uploaded a new file, keep existing one in database
							$grade12pdf = ($ed[0]->grade12_PDF); 
						} elseif ($request->file('grade12_pdf') != null) { //Check if user has uploaded new file
								$grade12pdf = $request->file('grade12_pdf')->storeAs('Academic_Qualifications/grade12_pdf/'.$emp, $emp.'_'.$level2.'_'.date('YmdHis'));
									} 
								}					 
					elseif($ed == '[]'){
							if ($request->file('grade12_pdf') != null) { //Check if user has uploaded a file
								$grade12pdf = $request->file('grade12_pdf')->storeAs('Academic_Qualifications/grade12_pdf/'.$emp, $emp.'_'.$level2.'_'.date('YmdHis'));
								}else{ $grade12pdf = "Not Added"; 	} //Default statement if no file is uploaded
						}
			///grade12_pdf Document Upload End
				
		//other_pdf Document Upload			
		if ($ed[0]->other_PDF == Null){ //Check if Document in database does not exists
			if ($request->file('other_pdf') != null){ //Check if user has uploaded a file
					$otherpdf = $request->file('other_pdf')->storeAs('Academic_Qualifications/other_pdf/'.$emp, $emp.'_'.$level3.'_'.date('YmdHis'));
			}else{ $otherpdf = 'Not Added'; }//Default statement if no file is uploaded
		}
		elseif($ed[0]->other_PDF != Null){ //Check if Document in database does exists
						if (($request->file('other_pdf')) == null){  //If user has not uploaded a new file, keep existing one in database
							$otherpdf = ($ed[0]->other_PDF); 
						} elseif ($request->file('other_pdf') != null) { //Check if user has uploaded new file
								$otherpdf = $request->file('other_pdf')->storeAs('Academic_Qualifications/other_pdf/'.$emp, $emp.'_'.$level3.'_'.date('YmdHis'));
									} 
								}					 
					elseif($ed == '[]'){
							if ($request->file('other_pdf') != null) { //Check if user has uploaded a file
								$otherpdf = $request->file('other_pdf')->storeAs('Academic_Qualifications/other_pdf/'.$emp, $emp.'_'.$level3.'_'.date('YmdHis'));
								}else{ $otherpdf = "Not Added"; 	} //Default statement if no file is uploaded
						}
			///other_pdf Document Upload End			
		
		$academic = \App\academic::find($id);
	
		$academic->employee_no = $emp;
		$academic->grade9 = $request->grade9;
		$academic->grade9_PDF = $grade9pdf;
		$academic->grade12 = $request->grade12;
		$academic->grade12_pdf = $grade12pdf;
		$academic->other = $request->other;
		$academic->other_pdf = $otherpdf;
		$academic->specify = $request->specify;
		
		$academic->save();
		
		if($request->employee_no == Auth::user()->employee_no){
		return Redirect::to("view_academic")->withSuccess('User : '.$emp.'. Academic record updated Succesfully');	
		}else{
		$employee_no = Crypt::encryptString($emp); //Encrypt employee number to hide it
		
		return redirect()->action(
    'RecordsController@filter_academic', ['employee_no' => $employee_no]
		)->withSuccess('User : '.$emp.'. Academic record updated Succesfully');			
		}
	}
	
	 //
    /*
	//Current Training 
	/
	*/
	public function view_training(){
		$t = \App\training::where('employee_no',Auth::user()->employee_no)
					->paginate(10);
			if($t != '[]'){
		return view("View_records.view_training",['t'=>$t]);	
		}else{
			return redirect('current_training');
		}	
	}
	
	public function edit_training(Request $request){		
		$employee_no = $request->employee_no;
		$id = $request->id;
		$x = 1;
		$t = \App\training::where('id',$id)
					->get();
		return view("Data_collection.current_training",['t'=>$t,'x'=>$x,'employee_no'=>$employee_no]);	
	}
	
	//Create current training record
	public function postedit_training(Request $request){
		$emp = $request->employee_no;
		$id = $request->id;
		
		//Create current training record
		$training = \App\training::find($id);
		
		$training->employee_no = $emp;
		$training->course = $request->course;
		$training->stage = $request->stage;
		$training->qualification = $request->qualification;
		$training->start = $request->start;
		$training->finish = $request->finish;
		$training->institution = $request->institution;
		$training->sponsor = $request->sponsor;
		
		$training->save();
		
		if($request->employee_no == Auth::user()->employee_no){
			return Redirect::to("view_training")->withSuccess('User : '.$emp.'. Current training record updated Succesfully');
		}else{
			return Redirect::to("to_training")->withSuccess('User : '.$emp.'. Current training record updated Succesfully');
		}
	}
	
	 //
    /*
	// Employment Record 
	/
	*/
	public function view_employment(){		
		$x = '';
		$e = \App\employment_record::where('employee_no',Auth::user()->employee_no)
					->paginate(10);	
			if($e != '[]'){
		return view("View_records.view_employment",['e'=>$e,'x'=>$x]);
		}else{
			return redirect('employment_record');
		}	
	}
	public function view_full_employment(Request $request){		
		$x = '1';
		$e = \App\employment_record::where('id',$request->id)
					->get();	
			if($e != '[]'){
		return view("View_records.view_employment",['e'=>$e,'x'=>$x]);
		}else{
			return redirect('employment_record');
		}	
	}
	public function edit_employment(Request $request){		
		$employee_no = $request->employee_no;
		$id = $request->id;
		$x = 1;
		$e = \App\employment_record::where('id',$id)
					->get();
		return view("Data_collection.employment_record",['e'=>$e,'x'=>$x,'employee_no'=>$employee_no]);	
	}
	
	//Edit Employment Record record
	public function postedit_employment(Request $request){
		$emp = $request->employee_no;
		$id = $request->id;
		$ed = \App\employment_record::where('id',$id)
					->get(); 
					
	//payslip Document Upload			
		if ($ed[0]->recent_payslip == Null){ //Check if Document in database does not exists
			if ($request->file('payslip') != null){ //Check if user has uploaded a file
					$payslip = $request->file('payslip')->storeAs('Employment_Record/payslip/'.$emp, $emp.'_'.date('YmdHis'));
			}else{ $payslip = 'Not Added'; }//Default statement if no file is uploaded
		}
		elseif($ed[0]->recent_payslip != Null){ //Check if Document in database does exists
						if (($request->file('payslip')) == null){  //If user has not uploaded a new file, keep existing one in database
							$payslip = ($ed[0]->recent_payslip); 
						} elseif ($request->file('payslip') != null) { //Check if user has uploaded new file
								$payslip = $request->file('payslip')->storeAs('Employment_Record/payslip/'.$emp, $emp.'_'.date('YmdHis'));
									} 
								}					 
					elseif($ed == '[]'){
							if ($request->file('payslip') != null) { //Check if user has uploaded a file
								$payslip = $request->file('payslip')->storeAs('Employment_Record/payslip/'.$emp, $emp.'_'.date('YmdHis'));
								}else{ $payslip = "Not Added"; 	} //Default statement if no file is uploaded
						}
			///payslip Document Upload End			
		
		//Edit current training record
		$employment_record = \App\employment_record::find($id);
		
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
		
		if($request->employee_no == Auth::user()->employee_no){
			return Redirect::to("view_employment")->withSuccess('User : '.$emp.'. Employment Record record updated Succesfully');
		}else{
			return Redirect::to("all_employment")->withSuccess('User : '.$emp.'. Employment Record record updated Succesfully');
		}		
	}
	// Employment Record End
	
}
