<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Page Title')



@section('content')
 <div class="container"> 
 
   <div class="py-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 ">Employment Records</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{ url('employment_record ') }}">
			<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Add New Record">
				 <span data-feather="plus"></span> Add</button></a>
           <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
          </div>         
        </div>
      </div>
	   @php
		$count = $e->count();
		$i = 1;
	  @endphp
	  <h5>Your employment record in the public service</h5>
	  <p>Records Found: {{ $count }}</p>
 
    <div class="py-3 container"> 
	<!-- Error Check -->
		@if(count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
	
		<!-- Success Check -->
		@if(\Session::has('success'))
			<div class="alert alert-success">
				<p>{{ \Session::get('success') }}</p>
			</div>
			@endif
			
		<!-- Danger Check -->
		@if(\Session::has('danger'))
			<div class="alert alert-danger">
				<p>{{ \Session::get('danger') }}</p>
			</div>
			@endif
	</div>	
		
	<!--- View Table -->	
	
	@if($x == '')
	@if($e != '[]')
		
	<div class="card" style="width: 70rem;">
	  <div class="card-header">
	  Employment Record	for {{ $e[0]->employee_no ??'' }}	
		</div>
		
  <div class="card-body">
	
		  <div class="table-responsive">
        <table class="table table-sm">
          <thead>
            <tr>
              <th>S/N</th>
              <th>Position</th>
              <th>Department</th>
              <th>Ministry/Institution</th>
              <th>Province</th>
              <th></th>
              
            </tr>
          </thead>
		  @foreach ($e as $em)
          <tbody class="table-striped table-sm">
		  @php
		  $u = \App\User::where('employee_no',$em->employee_no)
					->get();		  
		  @endphp
		  @if($u[0]->status != 'Removed')
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $em->position }}</td> 	
              <td>{{ $em->department }}</td> 	
              <td>{{ $em->ministry }}</td> 	
              <td>{{ $em->province }}</td> 	
              <td>
				<form action="/view_full_employment" method="POST">
						@csrf
				<button type="submit" class="btn btn-sm btn-success">
				 <span data-feather="eye"></span>  View</button>
				<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $em->employee_no }}" hidden>
				<input type="text" class="form-control" name="id" id="employeeNO"  value="{{ $em->id }}" hidden>
					</form>	
			  </td> 
                         
            </tr>
			@endif
          </tbody>
		  @endforeach		  
        </table>
      </div>
	  <!-- Pagination -->
	   <div class="py-3 container">
	  {{ $e->links()??'' }}
      </div>
	   <!-- Pagination End -->
	  
	@endif
	@if($e == '[]')
		<p>No Records Found</p>
	@endif
			<!--- View Table End -->
			
		 </div>	 
      </div>
	  
@endif
@if($x == '1')	
		
			
			<div class="py-1 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h4>Employee Record</h4>		
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
           <a href="{{ url('view_employment') }}">
			<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Add New Record">
				 <span data-feather="folder"></span> Return to Records</button></a>
          </div>
        </div>		
      </div>
			
			
  <div class="card" style="width: 60rem;">
  <div class="card-header">
  <form action="/edit_employment" method="POST">
					@csrf
    Employemt Record for {{ $e[0]->employee_no ??'' }} 	
		
			<button type="submit" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit this record">
			 <span data-feather="edit"></span> </button>
			<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $e[0]->employee_no }}" hidden>
			<input type="text" class="form-control" name="id" id="id"  value="{{ $e[0]->id }}" hidden>
		</form>	  
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
		
		<!-- Station -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Station: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $e[0]->station ??'' }}</strong>
			</div>
		</div>
		<!-- Station End -->
				
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
				@if(($e[0]->recent_payslip) != null && ($e[0]->recent_payslip) != "Not Added")
				<form action="/download_payslip"  method="POST"> 
					@csrf
					<input type="text" class="form-control" name="id" id="id"  value="{{ $e[0]->id ??'' }}" hidden> 	
					<button type="submit" class="btn btn-sm btn-primary">Download</button>
					</form>
				@endif
				@if(($e[0]->recent_payslip) == null||($e[0]->recent_payslip) == "Not Added")
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
  <div class="col-md-12 mb-3">	
		<form action="/edit_employment" method="POST">
					@csrf
			<button type="submit" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit this record">
			 <span data-feather="edit"></span>  Edit</button>
			<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $e[0]->employee_no }}" hidden>
			<input type="text" class="form-control" name="id" id="id"  value="{{ $e[0]->id }}" hidden>
		</form>	
	</div>
<hr class="mb-4">	

@endif

</div>

@endsection


