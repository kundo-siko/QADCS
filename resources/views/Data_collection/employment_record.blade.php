<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Page Title')



@section('content')
   <div class="container"> 
   
   @if( $x  == Null) <form action="/employment"  method="POST" enctype="multipart/form-data"> @endif
   @if( $x  != Null) <form action="/postedit_employment"  method="POST" enctype="multipart/form-data"> @endif
	@csrf
  
    <div class="py-5 text-LEFT">
    <div class="py-5 text-center border-bottom">
	
			<h2>EMPLOYMENT RECORD (In the Public Service)</h2>
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
	
  <div class="col-md-12 order-md-1">
		
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>POSITION:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="text" class="form-control" id="position" name="position" @if( $x == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->position ??'' }}" @endif >
					
					<input type="text" class="form-control" name="employee_no" id="employee_no"  @if( $x == Null) value="{{ Auth::user()->employee_no }}" @endif @if( $x != Null) value="{{ $e[0]->employee_no ??'' }}" @endif hidden>
					@if( $x  != Null) <input type="text" class="form-control" name="id" id="id"  value="{{ $e[0]->id ??'' }}" hidden> @endif
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
        </div>	
		
		<!-- other names input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>APPOINTMENT DATE:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="date" class="form-control" id="appointment_date" name="appointment_date" @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->appointment_date ??'' }}" @endif >
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
        </div>
		
		<!-- DOB input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>APPOINTMENT STATUS:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="text" class="form-control" id="appointment_status" name="appointment_status" list="statuses" @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->appointment_status ??'' }}" @endif >
					<datalist  class="w-100" id="statuses">	
					  @include('Lists.appointment_status')
					</datalist>
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			<P>*Applicable 'Appointment Status' include Administrative Convenience, Acting with a view for Promotion, Substative, Regrading, Secondment, Transfer and Attachment.</P>
			</div>
        </div>	
		
		<!-- nrc input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>APPOINTMENT TYPE:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="text" class="form-control" id="appointment_type" name="appointment_type" list="types" @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->appointment_type ??'' }}" @endif >
					<datalist  class="w-100" id="types">	
					  @include('Lists.appointment_type')
					</datalist>
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			<p>*Applicable 'Appointment Type' include Contract, Permanent and Pensionable, probation and Temporal</p>
			</div>
        </div>	
		
		<!-- File number input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>DURATION:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="text" class="form-control" id="duration" name="duration" @if( $x  == Null) placeholder="e.g 1 Year" required @endif
					@if( $x  != Null) value="{{ $e[0]->duration ??'' }}" @endif >
					<div class="invalid-feedback">
						Valid email is required.
					</div>
			</div>
        </div>	
		
		<!-- File number input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>SECTION:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="text" class="form-control" id="section" name="section" @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->section ??'' }}" @endif >
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
        </div>	
		
		<!-- Department or Unit input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>DEPARTMENT:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="text" class="form-control" id="department" name="department" @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->department ??'' }}" @endif >				
					<div class="invalid-feedback">
						Valid last name is required.
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
				<h6>STATION:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="text" class="form-control" id="station" name="station" @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $e[0]->station ??'' }}" @endif >				
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
		
		<!-- Recent Payslip -->
		<div class="row">
		<div class="col-md-4 mb-3">
           <h6>RECENT PAYSLIP:</h6>
		</div>
			<div class="col-md-8 mb-3">
				<input type="file" class="form-control" name="payslip" id="payslip" >			
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
					@if( $x  != Null) @if( $e[0]->recent_payslip != Null) <p>*A document was previously uploaded.</p> @endif @endif
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