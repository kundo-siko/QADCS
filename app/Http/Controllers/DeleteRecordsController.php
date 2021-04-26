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

class DeleteRecordsController extends Controller
{
    //
	public function delete_academic(Request $request){
		$id =  $request->id;
		$employee_no =  $request->employee_no;
		$grade =  $request->grade;
		$document =  $request->document;
		$doc_type =  $request->doc_type;
		
		//echo $id.'<br>'.$grade.'<br>'.$document.'<br>'.$doc_type;
		Storage::delete($document);
		
		$academic = \App\academic::find($id);
		$academic->$grade = null;
		$academic->$doc_type = "Not Added";
		$academic->save();
		
	$employee_no = Crypt::encryptString($employee_no); //Encrypt employee number to hide it
		
		return redirect()->action(
    'RecordsController@filter_academic', ['employee_no' => $employee_no]
		)->withDanger('User Academic record deleted Succesfully');		
	}
	
	//Delete Professional RecordsController@filter_academic
	public function delete_professional(Request $request){
		$id =  $request->id;
		$employee_no =  $request->employee_no;
		$document =  $request->document;
		
		Storage::delete($document);
		
		$professional = \App\professional::find($id);
		$professional->delete();
		
		$employee_no = Crypt::encryptString($employee_no); //Encrypt employee number to hide it
		
		return redirect()->action(
    'RecordsController@filter_professional', ['employee_no' => $employee_no]
		)->withDanger('Professional record deleted Succesfully');		
	}
	
	//Delete Training Record
	public function delete_training(Request $request){
		$id =  $request->id;
		$employee_no =  $request->employee_no;
		
		$training = \App\training::find($id);
		$training->delete();
		
		$employee_no = Crypt::encryptString($employee_no); //Encrypt employee number to hide it
		
		return redirect()->action(
    'RecordsController@filter_training', ['employee_no' => $employee_no]
		)->withDanger('Training record deleted Succesfully');
	}
	
	//Delete Employment Record
	public function delete_employment(Request $request){
		$id =  $request->id;
		$employee_no =  $request->employee_no;
		$document =  $request->document;
		
		Storage::delete($document);
		
		$employment_record = \App\employment_record::find($id);
		$employment_record->delete();
		
		$employee_no = Crypt::encryptString($employee_no); //Encrypt employee number to hide it
		
		return redirect()->action(
    'RecordsController@filter_employment', ['employee_no' => $employee_no]
		)->withDanger('Employment record deleted Succesfully');	
	}
	
	
}
