<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Page Title')



@section('content')

 <div class="container"> 

 	 <div class="py-3 text-LEFT">		
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mb-3 border-bottom">
			<h1 class="h2">Reset Password</h1>
		</div>
		<p>Create a new password here</p>		
	</div
	
 
	<div class="py-2 text-LEFT">
			<!-- Error Check -->
				<div class="col-md-12 order-md-1">
					@if(count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach($errors->all() as $error)
									<li>{{$error}}</li>
								@endforeach
							</ul>
						</div>
						@endif
				</div>
					
					<!-- Success Check -->
				<div class="col-md-12 order-md-1">
					@if(\Session::has('success'))
						<div class="alert alert-success">
							<p>{{ \Session::get('success') }}</p>
						</div>
						@endif
				</div>
				
				<!-- Success Check -->
				<div class="col-md-12 order-md-1">
					@if(\Session::has('danger'))
						<div class="alert alert-danger">
							<p>{{ \Session::get('danger') }}</p>
						</div>
						@endif
				</div>
			</div>
  
  
  <div class="card" style="width: 30rem;">
  <div class="card-header">
    <h1 class="h6 mb-3 font-weight-normal">Create New Pasword</h1>
  </div>
  <div class="card-body">
    <!-- h5 class="card-title">Special title treatment</h5 -->
	
	<div class="row">	 
	
	<div class="col-md-12 mb-3">
	
	<form class="form-signin" action="password_reset" method="post">
	@CSRF
		
	 <input type="hidden" name="token" value="{{ $token }}">
  
		<!-- Employee Number -->
		<div class="row"> 
			<div class="col-md-12 mb-3">	
				<label for="employee_no" class="h6 font-weight-normal">Employee Number</label>
			</div>
			<div class="col-md-12 mb-3">
				<input type="text" id="inputEmployee" name="employee_no" class="form-control" value="{{ Auth::user()->employee_no }}" readonly autofocus>
				<input type="text" id="inputEmployee" name="id" class="form-control" value="{{ Auth::user()->id }}"  hidden>
			</div>
		</div>
		<!-- Employee Number -->		
		
		<!-- New Password -->
		<div class="row"> 
			<div class="col-md-12 mb-3">	
				<label for="password" class="h6 font-weight-normal">New Password </label>
			</div>
			<div class="col-md-12 mb-3">
				<input type="password" id="password" class="form-control" name="password" 
					 pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
					 required autocomplete="new-password">
			</div>
		</div>
		<!-- New Password  -->
		
		<!-- Confirm Password -->
		<div class="row"> 
			<div class="col-md-12 mb-3">	
				<label for="password-confirm" class="h6 font-weight-normal">Confirm Password</label>
			</div>
			<div class="col-md-12 mb-3">
				<input id="password-confirm" type="password" class="form-control" name="password_confirmation" 
				pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
				required autocomplete="new-password">
			</div>
		</div>
		<!-- Confirm Password  -->
	
	<!-- Confirm Password -->
		<div class="row"> 
			<div class="col-md-12 mb-3">	
				<button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
			</div>
			</div>
		<!-- Confirm Password  -->
	
	</form>	
		
    </div>
	
	
    </div>
	
  </div>
</div>
  
  
  <p class="mt-5 mb-3 text-muted">&copy; 2020 - QADCS</p>

	

 
 
</div>      
	
@endsection