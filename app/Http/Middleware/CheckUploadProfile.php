<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator,Redirect,Response;
use Session;
use Illuminate\Support\Facades\Storage;
use DB;
use App\employee;

class CheckUploadProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		$e = \App\employee::where('employee_no',Auth::user()->employee_no)
					->get();	
		
		if ($e == '[]') {
            return redirect('personal_update');
        }
        return $next($request);
    }
}
