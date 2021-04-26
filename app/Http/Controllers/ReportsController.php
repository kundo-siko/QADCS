<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator,Redirect,Response;
use Session;
use Illuminate\Support\Facades\Storage;
use DB;

use App\User;
use App\employee;
use App\academic;
use App\professional;
use App\training;
use App\employment_record;

class ReportsController extends Controller
{
    //
    //
	/****
	Training Reports
	****/
	public function training_report(){
		$x = '';
		$ct = \App\training::all();
		return view("Reports.training_report",['ct'=>$ct, 'x'=>$x]);
	}
	
	public function generate_training_report(Request $request){
		$x = '1';
		$from = $request->from;
		$to = $request->to;	
		
		return redirect()->action(
    'ReportsController@view_training_report', ['x' => $x,'from'=> $from, 'to' => $to]
		);	
		
	}
	
	public function view_training_report(Request $request){
		$x = $request->x;
		$from = $request->from;
		$to = $request->to;
		 if($to != null){
		$report = DB::table('trainings')
		   ->Where('finish','>',$from)
           ->orWhereBetween('finish', [$from, $to])			
           ->paginate(15);
		 
		 }else{
			 $report = \App\training::Where('finish','>',date("Y-m-d"))
					->paginate(15);
		 }
		return view("Reports.training_report",['report'=>$report,'x'=>$x,'from'=>$from,'to'=>$to]);
	}
	
	/****
	Qualifications Reports
	***/
	public function qualification_report(){
		$x = '';
		$q = \App\academic::all();
		return view("Reports.qualification_report",['q'=>$q, 'x'=>$x]);
	}
	
	public function generate_academic_report(Request $request){
		$x = '1';
		$q = $request->qualification;
		
		return redirect()->action(
    'ReportsController@view_qualification_report', ['x' => $x,'q'=> $q]
		);	
		
	}
	
	public function view_qualification_report(Request $request){
		$x = '1';
		$q = $request->q;
		
		if('All' == $q){
			$report = \App\academic::paginate(15);
		}elseif('grade9'  == $q){
			$report = \App\academic::where('grade9','Yes')
					->paginate(15);
		}elseif('grade12'  == $q){
			$report = \App\academic::where('grade12','Yes')
					->paginate(15);
		}elseif('other'  == $q){
			$report = \App\academic::where('other','Yes')
					->paginate(15);
		}
		
		 return view("Reports.qualification_report",['report'=>$report,'x'=>$x,'q'=>$q]);
	}
	
	/****
	Profesional
	***/
	public function professional_report(){
		$x = '';
		$q = \App\professional::all();
		$qu = $q->unique('qualification');
		$l = $q->unique('level');
		return view("Reports.professional_report",['q'=>$q,'x'=>$x,'l'=>$l,'qu'=>$qu]);
	}
	
	public function generate_professional_report(Request $request){
		$x = '1';
		$qualify = $request->qualification;
		
		return redirect()->action(
    'ReportsController@view_professional_report', ['x' => $x,'qualify'=> $qualify]
		);	
		
	}
	
	public function view_professional_report(Request $request){
		$x = '1';
		$qualify = $request->qualify;
		
		if($qualify != 'All'){
		$report = \App\professional::where('qualification',$qualify)
				->orWhere('level',$qualify)
				->orderBy('employee_no','desc')
				 ->paginate(15);				
		}else{
		$report = \App\professional::paginate(15);	
		}		
		return view("Reports.professional_report",['report'=>$report,'x'=>$x,'qualify'=>$qualify]);
	}
	
	/****
	employment_report
	***/
	public function employment_report(){		
			$e = \App\employment_record::all();
			$e = $e->unique('position');
			$su = $e->unique('appointment_status');
			$at = $e->unique('appointment_type');
			$se = $e->unique('section');
			$de = $e->unique('department');
			$st = $e->unique('station');
		return view("Reports.employment_report",['e'=>$e,'x'=>'','at'=>$at,'se'=>$se,'de'=>$de,'st'=>$st,'su'=>$su]);
	}
	
	public function generate_employment_report(Request $request){
		$x = '1';
		$column = $request->column;
		$filter = $request->filter;
		$search = $request->search;
		$from = $request->from;
		$to = $request->to;
		
		return redirect()->action(
    'ReportsController@view_employment_report', ['x' => $x,'filter'=>$filter,'column'=>$column,'search'=>$search,'from'=>$from,'to'=>$to]
		);	
		
	}
	
	public function view_employment_report(Request $request){
		$x = $request->x;
		$column = $request->column;
		$filter = $request->filter;
		$search = $request->search;
		$from = $request->from;
		$to = $request->to;
		
		if($column == 'appointment_date'){
			$report = DB::table('employment_records')
           ->whereBetween('appointment_date', [$from, $to])
			->paginate(15);
		  $search = $from;
		}
		elseif($search != 'All' && $from != null){
			$report = DB::table('employment_records')
			->where($column,$search)
			->whereBetween('appointment_date', [$from, $to])
			->paginate(15);
		}
		elseif($search != 'All' && $from == null){
			$report = DB::table('employment_records')
			->where($column,$search)
			->paginate(15);
		}
		else{
			$report = \App\employment_record::paginate(15);
		}
		
	return view("Reports.employment_report",['report'=>$report,'x'=>$x,'filter'=>$filter,'column'=>$column,'search'=>$search,'from'=>$from,'to'=>$to]);
	}
	
	
}
