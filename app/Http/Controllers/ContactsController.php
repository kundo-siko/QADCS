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
use Illuminate\Support\Facades\Crypt;

use App\contact;

class ContactsController extends Controller
{
    //
	
	 public function new_contact()
    {
        return view('Contacts/new_contact');
    }

	public function view_contact()
    {
		$c = \App\contact::all();
		
			$e = $c->unique('employee_no');
			$s = $c->unique('surname');
			$j = $c->unique('job_title');
		
        return view('Contacts/view_contact',['e' => $e, 's' => $s, 'j' => $j]);
    }
	
	//Create new contact Or Edit existing one
	public function create_contact(Request $request){
		
		//Validate User Details
		 $validatedData = $request->validate([
		'employee_no' => 'required|unique:contacts',
		]);
		
		$i = $request->i;
		$id = $request->id;
		
			if($i == '0'){
				//Create contact profile
			$contact = new contact;
			}else if($i == '1'){			
				//Edit Employee Profile
			$contact = \App\contact::find($id);		
			}
		
			//Details entered by user	
		$contact->employee_no = $request->employee_no;
		$contact->surname = $request->surname;
		$contact->other_names = $request->other_names;
		$contact->phone = $request->phone;
		$contact->email = $request->email;
		$contact->department = $request->department;
		$contact->job_spec = $request->job_spec;
		$contact->job_title = $request->job_title;
		
		$contact->save();
		
		
		//return Redirect::to("view_contact")->withSuccess('Contact created Succesfully');	
		$search = 'All';
		$column = 'id';
		
		$search = Crypt::encryptString($search); //Encrypt employee number to hide it	 	
		$column = Crypt::encryptString($column); //Encrypt employee number to hide it		
		
			if($i == '0'){
				//Create contact profile
					return redirect()->action(
				'ContactsController@filter_contact', ['search' => $search,'column' => $column]
					)->withSuccess('Contact Created Succesfully');
			}else if($i == '1'){			
				//Edit Employee Profile
					return redirect()->action(
				'ContactsController@filter_contact', ['search' => $search,'column' => $column]
					)->withSuccess('Contact Edited Succesfully');		
			}
		
		}
		// End Create new contact Or Edit existing one
		
		
		
		//Filter contacts
	public function filter_all_contacts(Request $request){
		
		
		$search = $request->search;
		$search = Crypt::encryptString($search); //Encrypt employee number to hide it
		
		$column = $request->column;
		$column = Crypt::encryptString($column); //Encrypt employee number to hide it
		
		return redirect()->action(
    'ContactsController@filter_contact', ['search' => $search,'column' => $column]
		);		
	}
	
	//Filter results produced
	public function filter_contact(Request $request){
		$search = $request->search;
		$column = $request->column;
		
		try {
			$search = Crypt::decryptString($search); //Decrypt employee number to produce result
		} catch (DecryptException $e) {
			//
		}
		
		try {
			$column = Crypt::decryptString($column); //Decrypt employee number to produce result
		} catch (DecryptException $e) {
			//
		}
		
		//if($search != 'All'){
		//$c = \App\contact::where('search',$search)
		//			->paginate(10);
		//}else{
		//$c = \App\contact::paginate(10);	
		//} 
		
		
		if($search != 'All'){
			$c = DB::table('contacts')
			->where($column,$search)
			->paginate(15);
		}
		else{
			$c = \App\contact::paginate(15);
		}
		
		
		return view("Contacts/contact_results",['c'=>$c]);		
	}
		
	public function show_contact(Request $request){
		$employee_no = $request->employee_no;
		$id = $request->id;
		
		$c = \App\contact::where('id',$id)
				->get();
		
		return view("Contacts/contact",['c'=>$c]);		
	}
	
	public function edit_contact(Request $request){
		$id = $request->id;		
		
		$id = Crypt::encryptString($id); //Encrypt employee number to hide it
		
		return redirect()->action(
    'ContactsController@contact_edit', ['id' => $id]
		);		
	}
	
	//Filter results produced
	public function contact_edit(Request $request){
		$id = $request->id;
		
		try {
			$id = Crypt::decryptString($id); //Decrypt employee number to produce result
		} catch (DecryptException $e) {
			//
		}	
		
		$c = \App\contact::where('id',$id)
				->get();
	
	return view("Contacts/edit_contact",['c'=>$c]);	
	}
	
}
