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


class ExelExportsController extends Controller
{
    //
	public function export_excel(Request $request){
		$qualify = $request->qualify;
		 return view('Reports/prof_report',['qualify'=>$qualify]);
	}
	
	public function export_emp(Request $request){
		$column = $request->column;
		$search = $request->search;
		$from = $request->from;
		$to = $request->to;
		 return view('Reports/emp_report',['column'=>$column,'search'=>$search,'from'=>$from,'to'=>$to]);
	}
	
	public function export_training(Request $request){
		$from = $request->from;
		$to = $request->to;
		 return view('Reports/tra_report',['from'=>$from,'to'=>$to]);
	}
	
	public function export_academic(Request $request){
		$q = $request->q;
		 return view('Reports/aca_report',['q'=>$q]);
	}
	
}
