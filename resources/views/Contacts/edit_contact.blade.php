<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Page Title')



@section('content')
   <div class="container"> 
   
   <form action="/create_contact"  method="POST"> 
	@csrf
  
    <div class="py-5 text-LEFT">
    <div class="py-5 text-center border-bottom">
	
			<h2>Employee Contact Information</h2>
	</div>
   			
    <p class="lead">Please fill in all details</p>
  </div>
  
  <div class="row"> 
  
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
	

 <div class="col-md-5 order-md-2 mb-4">
	
	
	<div class="row">
        <div class="col-md-5 mb-3">
           <h6>EMPLOYEE NO:</h6>
		</div>
			<div class="col-md-7 mb-3">
				<input type="text" class="form-control" name="employee_no" id="employee_no" value="{{ $c[0]->employee_no ??'' }}" >
				
				<!-- Hidden -->
				<input type="text" class="form-control" name="i" id="i" value="1" hidden>
				<input type="text" class="form-control" name="id" id="id" value="{{ $c[0]->id ??'' }}" hidden>
				<!-- Hidden -->
				
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
	</div>
 
	<div class="row">
        <div class="col-md-5 mb-3">
           <h6>PHONE:</h6>
		</div>
			<div class="col-md-7 mb-3">
				<input type="text" class="form-control" name="phone" id="phone" value="{{ $c[0]->phone ??'' }}">
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
	</div>
	
	<div class="row">
        <div class="col-md-5 mb-3">
           <h6>EMAIL:</h6>
		</div>
			<div class="col-md-7 mb-3">
				<input type="text" class="form-control" name="email" id="email" value="{{ $c[0]->email ??'' }}">
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
	</div>
 
 </div>
  
  <div class="col-md-7 order-md-1">
		
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>SURNAME:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="text" class="form-control" id="surname" name="surname"  value="{{ $c[0]->surname ??'' }}">
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
        </div>	
		
		<!-- other names input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>OTHER NAMES:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="text" class="form-control" id="other_names" name="other_names"  value="{{ $c[0]->other_names ??'' }}">
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
        </div>
		
		
		<!-- Department or Unit input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>DEPARTMENT/UNIT:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="text" class="form-control" id="department" name="department"  value="{{ $c[0]->department ??'' }}">				
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
        </div>	
		
		<!-- Job specification input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>JOB SPECIFICATION:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="text" class="form-control" name="job_spec" id="job_spec" value="{{ $c[0]->job_spec ??'' }}">
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
        </div>
		<!-- Job specification input -->
		
		
		<!-- Job specification input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>JOB TITLE:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="text" class="form-control" name="job_title" id="job_title" value="{{ $c[0]->job_title ??'' }}">
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
        </div>

	
  </div>
	 
  </div>
	<hr class="mb-4">
	 <button type="submit" class="btn btn-sm btn-outline-primary">submit
	  </button>
	<hr class="mb-4">
	
	</form>
  </div>
    
	
@endsection