<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Page Title')



@section('content')
   <div class="container"> 
   
   @if( $x  == Null) <form action="/personal_profile"  method="POST"> @endif
   @if( $x  != Null) <form action="/edit_profile"  method="POST"> @endif
	@csrf
  
    <div class="py-5 text-LEFT">
    <div class="py-5 text-center border-bottom">
	
			<h2>PERSONAL PROFILE</h2>
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
	

 <div class="col-md-4 order-md-2 mb-4">
 
 
	<!-- confirmation to permanent and pentionable establishment input -->
		<div class="row">
			<div class="col-md-5 mb-3">
				<h6>SEX:</h6>
			</div>
		<div class="col-md-7 mb-3">
			<div class="row">
				<div class="col-md-5 mb-3">
					 
					<div class="custom-control custom-radio">					
						<input type="radio" id="male" name="sex" value="Male" class="custom-control-input"
							@if( $x  != Null)	@if( $e[0]->sex  == 'Male') checked @endif @endif >
							<label class="custom-control-label" for="male">Male</label><br>
					</div>		  
				</div>
				<div class="col-md-5 mb-3">
					 
					<div class="custom-control custom-radio">					
						<input type="radio" id="female" name="sex" value="Female" class="custom-control-input"
							@if( $x  != Null)	@if( $e[0]->sex  == 'Female') checked @endif @endif >
							<label class="custom-control-label" for="female">Female</label><br>
					</div>		  
				</div>
						
			</div>		  
        </div>			
        </div>	
	
	
	<div class="row">
        <div class="col-md-5 mb-3">
           <h6>EMPLOYEE NO:</h6>
		</div>
			<div class="col-md-7 mb-3">
				<input type="text" class="form-control" name="employee_no" id="employee_no" @if( $x  != Null) value="{{ $e[0]->employee_no ??'' }}" @else value="{{ Auth::user()->employee_no }}" @endif readonly>
				<input type="text" class="form-control" name="ed" id="ed" @if( $x  == Null) value="0" @endif @if( $x  != Null) value="1" @endif hidden>
				<input type="text" class="form-control" name="dhere" id="dhere" @if( $x  == Null) value="0" @endif @if( $x  != Null) value="{{ $e[0]->id ??'' }}" @endif hidden>
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
	</div>
	
	<div class="row">
        <div class="col-md-5 mb-3">
           <h6>AE NUMBER:</h6>
		</div>
			<div class="col-md-7 mb-3">
				<input type="text" class="form-control" name="ae_number" id="ae_number" @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->ae_number ??'' }}" @endif >
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
	</div>
	
	<div class="row">
        <div class="col-md-5 mb-3">
           <h6>SALARY SCALE:</h6>
		</div>
			<div class="col-md-7 mb-3">
				<input type="text" class="form-control" name="salary_scale" id="salary_scale" @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->salary_scale ??'' }}" @endif >
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
	</div>
 
 </div>
  
  <div class="col-md-8 order-md-1">
		
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>SURNAME:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="text" class="form-control" id="surname" name="surname" @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->surname ??'' }}" @endif >
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
				<input type="text" class="form-control" id="other_names" name="other_names" @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->other_names ??'' }}" @endif >
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
        </div>
		
		<!-- DOB input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>DATE OF BIRTH:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="date" class="form-control" id="DOB" name="DOB" @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->DOB ??'' }}" @endif >
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
        </div>	
		
		<!-- nrc input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>NRC:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="text" class="form-control" id="NRC" name="NRC" @if( $x  == Null) placeholder="000000/00/0" required @endif
					@if( $x  != Null) value="{{ $e[0]->NRC ??'' }}" @endif >
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
        </div>	
		
		<!-- File number input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>EMAIL:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="email" class="form-control" id="email" name="email" @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->email ??'' }}" @endif >
					<div class="invalid-feedback">
						Valid email is required.
					</div>
			</div>
        </div>	
		
		<!-- File number input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>FILE NUMBER:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="text" class="form-control" id="file_number" name="file_number" @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->file_number ??'' }}" @endif >
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
        </div>	
		
		<!-- nationality input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>NATIONALITY:</h6>
			</div>
			<div class="col-md-8 mb-3">
				 <input class="form-control" list="country" name="nationality" id="nationality" @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->nationality ??'' }}" @endif >
					<datalist class="" id="country">
					  @include('Lists.countries')
					</datalist>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
			</div>
        </div>
		
		<!-- MINISTRY/INSTITUTION input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>MINISTRY/INSTITUTION:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input class="form-control" list="ministry" name="ministry" @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->ministry ??'' }}" @endif >
					<datalist  class="w-100" id="ministry">				
					  <option value="">Choose...</option>
					  @include('Lists.ministries')
					</datalist>
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
				<input type="text" class="form-control" id="department" name="department" @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->department ??'' }}" @endif >				
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
        </div>	
		
		<!-- distict input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>DISTRICT:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input class="form-control" list="district" name="district" @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->district ??'' }}" @endif >
					<datalist  class="w-100" id="district">				
					  <option value="">Choose...</option>
					  @include('Lists.districts')
					</datalist>			
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
			</div>
        </div>	
		
		<!-- Province input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>PROVINCE:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input class="form-control" list="province" name="province" @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->province ??'' }}" @endif >
					<datalist  class="w-100" id="province">				
					  <option value="">Choose...</option>
					  @include('Lists.provinces')
					</datalist>		
			<div class="invalid-feedback">
              Please select a valid country.
            </div>
			</div>
        </div>

		<!-- Date of first appointment input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>DATE OF FIRST APPOINTMENT:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="date" class="form-control" name="appointment" id="appointment" @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->appointment ??'' }}" @endif >
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
        </div>	
		
		<!-- Substantive position input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>SUBSTANTIVE POSITION:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="text" class="form-control" name="substantive" id="substantive" @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->substantive ??'' }}" @endif >
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
				<input type="text" class="form-control" name="job" id="job" @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->job ??'' }}" @endif >
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
        </div>

		<!-- confirmation to permanent and pentionable establishment input -->
		<div class="row">
			<div class="col-md-8 mb-3">
				<h6>COMFIRMATION TO PERMANEMT AND PENSIONABLE ESTABLISHMENT:</h6>
			</div>
			<div class="col-md-4 mb-3">
				 <div class="d-block my-3">
				 
				 <div class="row"> 		  
				<div class="col-md-5 mb-3">					 
					<div class="custom-control custom-radio">					
						<input type="radio" id="confirmed" name="confirmation" value="Confirmed" class="custom-control-input"
							@if( $x  != Null) @if( $e[0]->confirmation  == 'Confirmed') checked @endif @endif >
							<label class="custom-control-label" for="confirmed">Confirmed</label><br>
					</div>		  
				</div>
				<div class="col-md-7 mb-3">		  
					<div class="custom-control custom-radio">					
						<input type="radio" id="not_confirmed" name="confirmation" value="Not Confirmed" class="custom-control-input"
							@if( $x  != Null) @if( $e[0]->confirmation  == 'Not Confirmed') checked @endif @endif >
							<label class="custom-control-label" for="not_confirmed">Not Confirmed</label><br>
					</div>          
				</div>	
		  </div>
		  
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