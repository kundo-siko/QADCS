


<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Page Title')



@section('content')

 <div class="container">  
	 <div class="py-2 text-LEFT">		
		<div class="py-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="h2">View Employment Record</h1>
		</div>	
<div class="btn-group mr-2">
				<a href="{{ url('all_employment') }}">
				<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Search Record">
					  All Records</button></a>
			</div>			
	</div>

<div class="card" style="width: 60rem;">
  <div class="card-header">
  <form action="/edit_employment" method="POST">
					@csrf
    Employment Record for {{ $e[0]->employee_no ??'' }} 
		
			<button type="submit" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit this record">
			 <span data-feather="edit"></span> </button>
			<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $e[0]->employee_no }}" hidden>
			<input type="text" class="form-control" name="id" id="id"  value="{{ $e[0]->id }}" hidden>
		</form>
	  </button>
  </div>
		
  <div class="card-body">
    <!-- h5 class="card-title">Special title treatment</h5 -->
	
	<div class="row"> 
	
		<div class="col-md-12 mb-3 border-bottom">
		
		<!-- Employee Number -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Employee Number: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->employee_no ??'' }}</strong>
			</div>
		</div>
		<!-- Employee Number -->
		
		<!-- Full Nmae -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Full Name: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>
					@php
					$names = \App\employee::where('employee_no',$e[0]->employee_no)
								->get();
					@endphp
				{{ $names[0]->surname }} {{ $names[0]->other_names }}
				</strong>
			</div>
		</div>
		<!-- Full Name End -->
		</div>
	
	 <div class="col-md-5 order-md-2 mb-4 border-left">
	 
		<!-- Appointment Date -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Appointment Date: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->appointment_date ??'' }}</strong>
			</div>
		</div>
		
		<!-- Appointment Status -->		
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Appointment Status: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->appointment_status ??'' }}</strong>
			</div>
		</div>
		<!-- Appointment Status End -->
		
		<!-- Appointment Type -->		
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Appointment Type: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->appointment_type ??'' }}</strong>
			</div>
		</div>
		<!-- Appointment Type End -->
		
	</div>
	 
	 
	
	<div class="col-md-7 order-md-1">
	
		<!-- Position Number -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Position: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->position ??'' }}</strong>
			</div>
		</div>
		<!-- Position Number End -->
		
		<!-- Duration -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Duration: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->duration ??'' }}</strong>
			</div>
		</div>
		<!-- Duration End -->
		
		<!--  Section -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Section: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->section ??'' }}</strong>
			</div>
		</div>
		<!-- Section End -->
		
		<!-- Department -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Department: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->department ??'' }}</strong>
			</div>
		</div>
		<!-- Department End -->
		
		<!-- Ministry/Institution -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Ministry/Institution: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->ministry ??'' }}</strong>
			</div>
		</div>
		<!-- Ministry/Institution End -->
		
		<!-- Section -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Section: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->section ??'' }}</strong>
			</div>
		</div>
		<!-- Section End -->
				
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
		
		<hr class="mb-4">
		<!-- Payslip -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Recent Payslip: </p>
			</div>
			<div class="col-md-7 mb-3">
				@if(($e[0]->recent_payslip) != null)
				<form action="/download_payslip"  method="POST"> 
					@csrf
					<input type="text" class="form-control" name="id" id="id"  value="{{ $e[0]->id ??'' }}" hidden> 	
					<button type="submit" class="btn btn-sm btn-primary">Download</button>
					</form>
				@endif
				@if(($e[0]->recent_payslip) == null)
					<button type="submit" class="btn btn-sm btn-danger">Not Provided</button>
				@endif	
			</div>
		</div>
		<!-- Payslip -->
		
	</div>
	
	
    </div>
	
  </div>
</div>
<hr class="mb-4">
		<div class="btn-group mr-2">
	<form action="/edit_employment" method="POST">
					@csrf
			<button type="submit" class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Edit this record">
			 <span data-feather="edit"></span> Edit </button>
			<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $e[0]->employee_no }}" hidden>
			<input type="text" class="form-control" name="id" id="id"  value="{{ $e[0]->id }}" hidden>
		</form>
		
		<!-- Remove Modal -->
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#myBtn_{{  $e[0]->id }}" data-toggle="tooltip" data-placement="top" title="Delete this record">
					   <span data-feather="trash-2"></span>  Delete
					</button>
					<!-- Modal -->
					<div class="modal fade" id="myBtn_{{  $e[0]->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Remove "{{ $e[0]->employee_no}}" employment record</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
						  <p>Performing this action will permanently remove this record</p>
						  <p>Do you still want to proceed?</p>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">No, Cancel</button>
								<form action="delete_employment" method="POST">
								@csrf
									<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{  $e[0]->employee_no }}" hidden>
									<input type="text" class="form-control" name="id" id="id"  value="{{  $e[0]->id }}" hidden>						
									<input type="text" class="form-control" name="document" id="document"  value="{{ $e[0]->recent_payslip }}" hidden>						
								<button type="submit" class="btn btn-success">Yes, Save changes</button>
								</form>	
						  </div>
						</div>
					  </div>
					</div>						
				<!-- End Remove Modal -->	
		</div>
	<hr class="mb-4">

</div> 
@endsection