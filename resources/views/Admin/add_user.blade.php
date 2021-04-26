<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Page Title')



@section('content')
   <div class="container"> 
		@if( $x  != Null) <form action="/post_editUser"  method="POST"> @endif 
		@if( $x  == Null) <form action="/addUser"  method="POST"> @endif 
		 
			@csrf
	
    <div class="py-5 text-LEFT">
    <div class="py-5 text-center border-bottom">
	
			 <h2> @if( $x  == Null) ADD NEW USER {{ $employee_no ?? '' }} @endif  
						@if( $x  != Null) EDIT USER DETAILS FOR {{ $employee_no ?? '' }} @endif </h2> 
			
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
	
	
	
  <div class="col-md-8 order-md-1">
		
		
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>EMPLOYEE NUMBER:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="text" class="form-control" name="employee_no" id="employeeNO" @if( $x  == Null)  placeholder="Enter Employee Number" required @endif
						@if( $x  != Null) 	value="{{ $u[0]->employee_no ??'' }}" @endif >
				
				@if( $x  != Null) <input type="text" class="form-control" name="id" id="employeeNO"  value="{{ $u[0]->id }}" hidden> @endif
						
				<input type="text" class="form-control" name="status" id="employeeNO"  value="Pending" hidden>
					<div class="invalid-feedback">
						Valid name is required.
					</div>
			</div>
        </div>	
	
		
		<!-- Role input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>ROLE:</h6>
			</div>
			<div class="col-md-8 mb-3">
				 <select class="custom-select d-block w-100" id="country" name="role" required>
              <option value="">Choose...</option>
              <option value="Admin"  @if( $x  != Null) @php if($u[0]->role == "Admin") echo 'selected="selected"';  @endphp @endif >Admin</option>
              <option value="General Employee" @if( $x  != Null) @php if($u[0]->role == "General Employee") echo 'selected="selected"'; @endphp @endif >General Employee</option>
             
            </select>
            <div class="invalid-feedback">
              Please select a valid role.
            </div>
			</div>
        </div>
		
		<!-- Password input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>PASSWORD:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="password" class="form-control" id="lastName" name="password" placeholder="" value="" required>
					<div class="invalid-feedback">
						Password is required.
					</div>
			</div>
        </div>	
		
		<!-- Confirm Password input -->
		<div class="row">
			<div class="col-md-4 mb-3">
				<h6>CONFIRM PASSWORD:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="password" class="form-control" id="lastName" name="confirm" placeholder="" value="" required>
					<div class="invalid-feedback">
						Password is required.
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