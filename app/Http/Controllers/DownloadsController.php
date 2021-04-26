<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator,Redirect,Response;
use Session;
use Illuminate\Support\Facades\Storage;
use DB;

use App\academic;
use App\professional;
use App\employment_record;

class DownloadsController extends Controller
{
    //
    //Download academic record documents 
	public function download_academic(Request $request){	
	$id = $request->id;
	$check = $request->check;
	$u = \App\academic::where('id',$id)
					->get();

		if($check == 'grade9'){
				return Storage::download($u[0]->grade9_PDF);
		}
		elseif($check == 'grade12'){
				return Storage::download($u[0]->grade12_PDF);
		}
		elseif($check == 'other'){
				return Storage::download($u[0]->other_PDF);
		}
		
	}
	
	//Download professional record documents 
	public function download_professional(Request $request){	
	$id = $request->id;	
	$u = \App\professional::where('id',$id)
					->get();
	
	return Storage::download($u[0]->document);
	}
	
	//Download professional record documents 
	public function download_payslip(Request $request){	
	$id = $request->id;	
	$u = \App\employment_record::where('id',$id)
					->get();
	
	return Storage::download($u[0]->recent_payslip);
	}


}
