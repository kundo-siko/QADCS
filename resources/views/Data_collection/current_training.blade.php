<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Current training')



@section('content')
   <div class="container"> 
  
    <div class="py-5 text-LEFT">
    <div class="py-5 text-center border-bottom">
	
			<h2>CURRENT TRAINING BEING UNDERTAKEN</h2>
	</div>
   			
    <p class="lead">Please fill in all details. @if( $x  != Null) If documents where uploaded earlier, do not uploead them again @endif</p>
  </div>
  
  @if( $x  == Null) <form action="/training_record"  method="POST" enctype="multipart/form-data"> @endif
  @if( $x  != Null) <form action="/postedit_training"  method="POST" enctype="multipart/form-data"> @endif
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
           <h6>COURSE/PROGRAMME:</h6>
		</div>
			<div class="col-md-9 mb-3">
				<input type="text" class="form-control" name="course" id="course"  @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $t[0]->course ??'' }}" @endif >	
					<input type="text" class="form-control" name="employee_no" id="employee_no" @if( $x  == Null) value="{{ Auth::user()->employee_no }}" @endif @if( $x  != Null) value="{{ $t[0]->employee_no ??'' }}" @endif hidden> 
					@if( $x  != Null) <input type="text" class="form-control" name="id" id="id"  value="{{ $t[0]->id ??'' }}" hidden> @endif
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
		
		<div class="col-md-3 mb-3">
           <h6>CURRENT STAGE:</h6>
		</div>
		<div class="col-md-9 mb-3">
			<input type="text" class="form-control" name="stage" id="stage"  @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $t[0]->stage ??'' }}" @endif >	
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
		
		<div class="col-md-3 mb-3">
           <h6>FINAL QUALIFICATION:</h6>
		</div>
			<div class="col-md-9 mb-3">
				<input type="text" class="form-control" name="qualification" id="qualification"  @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $t[0]->qualification ??'' }}" @endif >			
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
		
		<div class="col-md-3 mb-3">
           <h6>START DATE:</h6>
		</div>
			<div class="col-md-9 mb-3">
				<input type="date" class="form-control" name="start" id="start"   @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $t[0]->start ??'' }}" @endif >			
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
		
		<div class="col-md-3 mb-3">
           <h6>FINISH DATE:</h6>
		</div>
			<div class="col-md-9 mb-3">
				<input type="date" class="form-control" name="finish" id="finish"   @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $t[0]->finish ??'' }}" @endif >			
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
		
		<div class="col-md-3 mb-3">
           <h6>TRAINING INSTITUTION:</h6>
		</div>
			<div class="col-md-9 mb-3">
				<input type="text" class="form-control" name="institution" id="institution"   @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $t[0]->institution ??'' }}" @endif >		
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
			
		<div class="col-md-3 mb-3">
           <h6>SPONSOR:</h6>
		</div>
			<div class="col-md-9 mb-3">
				<input type="text" class="form-control" name="sponsor" id="sponsor"   @if( $x  == Null) placeholder="" required @endif
					@if( $x  != Null) value="{{ $t[0]->sponsor ??'' }}" @endif >		
					<div class="invalid-feedback">
						Valid last name is required.
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