<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'PROFESSIONAL/VOCATIONAL QUALIFICATIONS')



@section('content')
   <div class="container"> 
  
    <div class="py-5 text-LEFT">
    <div class="py-5 text-center border-bottom">
	
			<h2>PROFESSIONAL/VOCATIONAL QUALIFICATIONS</h2>
	</div>
   			
    <p class="lead">Please fill in all details. @if( $x  != Null) If documents where uploaded earlier, do not uploead them again @endif</p>
  </div>
  
  @if( $x  == Null) <form action="/professional"  method="POST" enctype="multipart/form-data"> @endif
  @if( $x  != Null) <form action="/postedit_professional"  method="POST" enctype="multipart/form-data"> @endif
	@csrf
	
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
	
  <div class="row"> 
  
   <div class="col-md-3 mb-3">
           <h6>QUALIFICATION:</h6>
		</div>
			<div class="col-md-9 mb-3">
				<input type="text" class="form-control" name="qualification" id="qualification"  @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $u[0]->qualification ??'' }}" @endif >	
					 <input type="text" class="form-control" name="employee_no" id="employee_no" @if( $x  == Null) value="{{ Auth::user()->employee_no }}" @endif @if( $x  != Null) value="{{ $u[0]->employee_no ??'' }}" @endif hidden>
					@if( $x  != Null) <input type="text" class="form-control" name="id" id="id"  value="{{ $u[0]->id ??'' }}" hidden> @endif
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
		
		<div class="col-md-3 mb-3">
           <h6>LEVEL OF STUDY:</h6>
		</div>
			<div class="col-md-9 mb-3">		
				<select  class="w-100 form-control" id="type" name="level">				
					  <option value="">Choose...</option>
					  <option value="Certificate" @if( $x  != Null) @if( $u[0]->level  == 'Certificate') selected @endif @endif>Certificate</option>
					  <option value="Diploma" @if( $x  != Null) @if( $u[0]->level  == 'Diploma') selected @endif @endif>Diploma</option>
					  <option value="Degree" @if( $x  != Null) @if( $u[0]->level  == 'Degree') selected @endif @endif>Degree</option>
					  <option value="Masters Degree" @if( $x  != Null) @if( $u[0]->level  == 'Masters Degree') selected @endif @endif>Masters Degree</option>
					  <option value="PHD" @if( $x  != Null) @if( $u[0]->level  == 'PHD') selected @endif @endif>PHD</option>
					  </select>
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
		
		<div class="col-md-3 mb-3">
           <h6>INSTITUTION ATTENDED:</h6>
		</div>
			<div class="col-md-9 mb-3">
				<input type="text" class="form-control" name="institution" id="institution"  @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $u[0]->institution ??'' }}" @endif >			
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
		
		<div class="col-md-3 mb-3">
           <h6>YEAR OBTAINED:</h6>
		</div>
			<div class="col-md-9 mb-3">
				<input type="date" class="form-control" name="year" id="year"   @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $u[0]->year ??'' }}" @endif >			
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
		
		<div class="col-md-3 mb-3">
           <h6>UPLOAD DOCUMENT:</h6>
		</div>
			<div class="col-md-9 mb-3">
				<input type="file" class="form-control" name="document" id="document" >			
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			@if( $x  != Null) @if( $u[0]->document != Null) <p>*A document was previously uploaded.</p> @endif @endif
		</div>
		
		
	
		
  </div>
  <hr class="mb-4">
	 <button type="submit" class="btn btn-sm btn-outline-primary">submit
	  </button>
	<hr class="mb-4">
	
	</form>
  </div>
    
	
@endsection