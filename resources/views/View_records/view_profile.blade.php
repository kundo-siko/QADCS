
@extends('layouts.header')

@section('title', 'Page Title')



@section('content')
<div class="container"> 

 <div class="py-5 text-LEFT">
    <div class="py-2 text-center border-bottom">
	
			<h3>VIEW PERSONAL PROFILE</h3>
	</div>
   			
    <p class="lead">Personal Profile</p>
	
  </div>
  
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

<div class="card" style="width: 60rem;">
  <div class="card-header">
	  <form action="/personal" method="POST">
			@csrf
		Employee Profile for {{ $e[0]->employee_no ??'' }} 						
				<button type="submit" class="btn btn-sm btn-warning"> <span data-feather="edit"> </span></button>
				<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $e[0]->employee_no }}" hidden>
		</form>	
  </div>
		
  <div class="card-body">
    <!-- h5 class="card-title">Special title treatment</h5 -->
	
	<div class="row"> 
	
	 <div class="col-md-5 order-md-2 mb-4 border-left">
	 
		<!-- Gender -->
		<div class="row"> 
			<div class="col-md-4 mb-3">
				<p class="card-text">Sex: </p>
			</div>
			<div class="col-md-8 mb-3">
				<strong>{{ $e[0]->sex ??'' }}</strong>
			</div>
		</div>
		
		<!-- Gender End -->
		
		<!-- Employee Number -->		
		<div class="row"> 
			<div class="col-md-4 mb-3">
				<p class="card-text">Employee No: </p>
			</div>
			<div class="col-md-8 mb-3">
				<strong>{{ $e[0]->employee_no ??'' }}</strong>
			</div>
		</div>
		<!-- Employee Number End -->
		
		<!-- AE Number End -->		
		<div class="row"> 
			<div class="col-md-4 mb-3">
				<p class="card-text">AE Number: </p>
			</div>
			<div class="col-md-8 mb-3">
				<strong>{{ $e[0]->ae_number ??'' }}</strong>
			</div>
		</div>
		<!-- AE Number End -->
		
		<!-- Salary Scale -->		
		<div class="row"> 
			<div class="col-md-4 mb-3">
				<p class="card-text">Salary Scale: </p>
			</div>
			<div class="col-md-8 mb-3">
				<strong>{{ $e[0]->salary_scale ??'' }}</strong>
			</div>
		</div>
		<!-- Salary Scale -->
	 
	 </div>
	 
	 
	
	<div class="col-md-7 order-md-1">
	
		<!-- Employee Number -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Surname: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->surname ??'' }}</strong>
			</div>
		</div>
		<!-- Employee Number End -->
		
		<!-- Other Names -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Other Names: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->other_names ??'' }}</strong>
			</div>
		</div>
		<!-- Other Names End -->
		
		<!--  NRC -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">NRC Number: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->NRC ??'' }}</strong>
			</div>
		</div>
		<!-- NRC End -->
		
		<!-- File Number -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">File Number: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->file_number ??'' }}</strong>
			</div>
		</div>
		<!-- File Number End -->
			
		<!-- DOB -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Date of Birth: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->DOB ??'' }}</strong>
			</div>
		</div>
		
		<!-- DOB End -->
		
		<!--  Email -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Email: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->email ??'' }}</strong>
			</div>
		</div>
		<!-- Email End -->
		
		
		
		<!-- Nationality -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Nationality: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->nationality ??'' }}</strong>
			</div>
		</div>
		<!-- Nationlity End -->
		
		<!-- Ministry/Institution -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Ministry/Institution: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->ministry ??'' }}</strong>
			</div>
		</div>
		<!-- Ministry/Institution -->
		
		<!-- Department/Unit -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Department/Unit: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->department ??'' }}</strong>
			</div>
		</div>
		<!-- Department/Unit -->
		
		<!-- District -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">District: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->district ??'' }}</strong>
			</div>
		</div>
		<!-- District -->
		
		<!-- Province -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Province: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->province ??'' }}</strong>
			</div>
		</div>
		<!-- Province -->
		
		<!-- Date of First Appointment -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Date of First Appointment: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->appointment ??'' }}</strong>
			</div>
		</div>
		<!-- Date of First Appointment -->
		
		<!-- Substantive Position -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Substantive Position: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->substantive ??'' }}</strong>
			</div>
		</div>
		<!-- Substantive Position -->
		
		<!-- Job Specification -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Job Specification: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->job ??'' }}</strong>
			</div>
		</div>
		<!-- Job Specification-->
		
		<!-- Confirmation To Permanent and Pensionable Establishment -->
		<div class="row"> 
			<div class="col-md-9 mb-3">
				<p class="card-text">Confirmation To Permanent and Pensionable Establishment: </p>
			</div>
			<div class="col-md-3 mb-3">
				<strong>{{ $e[0]->confirmation ??'' }}</strong>
			</div>
		</div>
		<!-- Confirmation To Permanent and Pensionable Establishment -->
		
		
    </div>
	
	
    </div>
	
  </div>
</div>


<div class="col-md-12 mb-3">
<hr class="mb-4">

	<a href="{{ url('Reset_Password') }}">
			<button type="button" class="btn btn-sm btn-primary " data-toggle="tooltip" data-placement="top" title="Add New Record">
	 <span data-feather="edit-2"></span> Reset Password</button></a>
<hr class="mb-4">

 <form action="/personal" method="POST">
						@csrf
				<button type="submit" class="btn btn-sm btn-warning">
				 <span data-feather="edit"></span> Edit</button>
				<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $e[0]->employee_no }}" hidden>
			</form>	
			<hr class="mb-4">
</div>
</div>
@endsection