


<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Page Title')



@section('content')

 <div class="container">  
	 <div class="py-3 text-LEFT ">		
		<div class="py-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mb-3 border-bottom">
			<h1 class="h2">View Academic Qualification Records</h1>
		</div>
			<div class="btn-group mr-2">
				<a href="{{ url('all_academic') }}">
				<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Search Record">
					  All Records</button></a>
			</div>		
	</div>

<div class="card" style="width: 60rem;">
  <div class="card-header">
	  <form action="/edit_academic" method="POST">
							@csrf
    Academic Qualifications Records for {{ $a[0]->employee_no ??'' }} 
	
	<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $a[0]->employee_no }}" hidden>
	<input type="text" class="form-control" name="id" id="employeeNO"  value="{{ $a[0]->id }}" hidden>
	<button type="submit" class="btn btn-sm btn-warning">	<span data-feather="edit">	</span></button>				
		</form>	
  </div>
		
  <div class="card-body">
    <!-- h5 class="card-title">Special title treatment</h5 -->
	
	<div class="row">	 
	
	<div class="col-md-12 mb-3">
		
		<!-- Employee Number -->
		<div class="row"> 
			<div class="col-md-5 mb-3">
				<p class="card-text">Employee Number: </p>
			</div>
			<div class="col-md-7 mb-3">
				<strong>{{ $a[0]->employee_no ??'' }}</strong>
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
					$names = \App\employee::where('employee_no',$a[0]->employee_no)
								->get();
					@endphp
				{{ $names[0]->surname }} {{ $names[0]->other_names }}
				</strong>
			</div>
		</div>
		<!-- Full Name End -->
		
	<!-- Qualification Details -->		
	<hr class="mb-4">
	<p>Employee has attained the following academic qualifications</p>
	 
	 @if($a[0]->grade9 != null)
	 <!-- Grade 9 -->
		<div class="row"> 
			<div class="col-md-2 mb-3">
				<p class="card-text">Grade 9: </p>
			</div>
			<div class="col-md-4 mb-3">
				<strong>{{ $a[0]->grade9 ??'' }}</strong>
			</div>
			<div class="col-md-4 mb-3">
				@if(($a[0]->grade9_PDF) != null)
				<form action="/download_academic"  method="POST"> 
					@csrf
					<input type="text" class="form-control" name="id" id="id"  value="{{ $a[0]->id ??'' }}" hidden>
					<input type="text" class="form-control" name="check" id="check"  value="grade9" hidden> 						
					<button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Download Grade 9 certificate">Download</button>
					</form>
				@endif
				@if(($a[0]->grade9_PDF) == null)
					<button type="submit" class="btn btn-sm btn-danger">Not Provided</button>
				@endif	
			</div>
			<!-- Delete Record -->
			<div class="col-md-2 mb-3">
				@if(($a[0]->grade9_PDF) != null)
						<!-- Remove Modal -->
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myBtn1_{{ $a[0]->id }}">
					 Delete  <span data-feather="trash-2"></span>  
					</button>
					<!-- Modal -->
					<div class="modal fade" id="myBtn1_{{ $a[0]->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Remove "Grade9" record</h5>
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
								<form action="delete_academic" method="POST">
								@csrf
									<input type="text" class="form-control" name="grade" id="employeeNO"  value="grade9" hidden>
									<input type="text" class="form-control" name="document" id="employeeNO"  value="{{ $a[0]->grade9_PDF }}" hidden>
									<input type="text" class="form-control" name="doc_type" id="employeeNO"  value="grade9_PDF" hidden>
									<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $a[0]->employee_no }}" hidden>
									<input type="text" class="form-control" name="id" id="id"  value="{{ $a[0]->id }}" hidden>						
								<button type="submit" class="btn btn-success">Yes, Proceed</button>
								</form>	
						  </div>
						</div>
					  </div>
					</div>						
				<!-- End Remove Modal -->	
				@endif	
			</div>
			<!-- Delete Record End -->
		</div>
		<!-- Grade 9 -->
	@endif	
	@if($a[0]->grade12 != null)
		<!-- Grade 12 -->
		<div class="row"> 
			<div class="col-md-2 mb-3">
				<p class="card-text">Grade 12: </p>
			</div>
			<div class="col-md-4 mb-3">
				<strong>{{ $a[0]->grade12 ??'' }}</strong>
			</div>
			<div class="col-md-4 mb-3">
				@if(($a[0]->grade12_PDF) != null)
				<form action="/download_academic"  method="POST"> 
					@csrf
					<input type="text" class="form-control" name="id" id="id"  value="{{ $a[0]->id ??'' }}" hidden> 
					<input type="text" class="form-control" name="check" id="check"  value="grade12" hidden> 	
					<button type="submit" class="btn btn-sm btn-primary" data-placement="top" title="Download Grade 12 certificate">Download</button>
					</form>
				@endif
				@if(($a[0]->grade12_PDF) == null)
					<button type="submit" class="btn btn-sm btn-danger">Not Provided</button>
				@endif	
			</div>
			<!-- Delete Record -->
			<div class="col-md-2 mb-3">
				@if(($a[0]->grade12_PDF) != null)
						<!-- Remove Modal -->
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myBtn2_{{$a[0]->id }}">
					 Delete  <span data-feather="trash-2"></span>  
					</button>
					<!-- Modal -->
					<div class="modal fade" id="myBtn2_{{ $a[0]->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Remove "Grade12" record</h5>
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
								<form action="delete_academic" method="POST">
								@csrf
									<input type="text" class="form-control" name="grade" id="employeeNO"  value="grade12" hidden>
									<input type="text" class="form-control" name="document" id="employeeNO"  value="{{ $a[0]->grade12_PDF }}" hidden>
									<input type="text" class="form-control" name="doc_type" id="employeeNO"  value="grade12_PDF" hidden>
									<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $a[0]->employee_no }}" hidden>
									<input type="text" class="form-control" name="id" id="id"  value="{{ $a[0]->id }}" hidden>					
								<button type="submit" class="btn btn-success">Yes, Proceed</button>
								</form>	
						  </div>
						</div>
					  </div>
					</div>						
				<!-- End Remove Modal -->	
				@endif	
			</div>
			<!-- Delete Record End -->
		</div>
		<!-- Grade 12 -->
	@endif
	@if($a[0]->other != null)	
		<!-- Other -->
		<div class="row"> 
			<div class="col-md-2 mb-3">
				<p class="card-text">Other: </p>
			</div>
			<div class="col-md-2 mb-3">
				<strong>{{ $a[0]->other ??'' }}</strong>
			</div>
			<div class="col-md-4 mb-3">
			<p class="card-text">Specification : <strong>{{ $a[0]->specify ??'' }}</strong></p>
				
			</div>
			<div class="col-md-2 mb-3">
			@if(($a[0]->other_PDF) != null)
				<form action="/download_academic"  method="POST"> 
					@csrf
					<input type="text" class="form-control" name="id" id="id"  value="{{ $a[0]->id ??'' }}" hidden> 		
					<input type="text" class="form-control" name="check" id="check"  value="other" hidden> 		
					<button type="submit" class="btn btn-sm btn-primary" data-placement="top" title="Download Other certificate">Download</button>
					</form>
				@endif
				@if(($a[0]->other_PDF) == null)
					<button type="submit" class="btn btn-sm btn-danger">Not Provided</button>
				@endif					
			</div>
			<!-- Delete Record -->
			<div class="col-md-2 mb-3">
				@if(($a[0]->other_PDF) != null)
						<!-- Remove Modal -->
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myBtn3_{{$a[0]->id }}">
					 Delete  <span data-feather="trash-2"></span>  
					</button>
					<!-- Modal -->
					<div class="modal fade" id="myBtn3_{{ $a[0]->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Remove "Other" record</h5>
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
								<form action="delete_academic" method="POST">
								@csrf
									<input type="text" class="form-control" name="grade" id="employeeNO"  value="other" hidden>
									<input type="text" class="form-control" name="document" id="employeeNO"  value="{{ $a[0]->other_PDF }}" hidden>
									<input type="text" class="form-control" name="doc_type" id="employeeNO"  value="other_PDF" hidden>
									<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $a[0]->employee_no }}" hidden>
									<input type="text" class="form-control" name="id" id="id"  value="{{ $a[0]->id }}" hidden>				
								<button type="submit" class="btn btn-success">Yes, Proceed</button>
								</form>	
						  </div>
						</div>
					  </div>
					</div>						
				<!-- End Remove Modal -->	
				@endif	
			</div>
			<!-- Delete Record End -->
		</div>
		<!-- Other -->
	@endif
	
	
	
    </div>
	
	
    </div>
	
  </div>
</div>

<hr class="mb-4">
				<form action="/edit_academic" method="POST">
						@csrf
				<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $a[0]->employee_no }}" hidden>
				<input type="text" class="form-control" name="id" id="employeeNO"  value="{{ $a[0]->id }}" hidden>
				<button type="submit" class="btn btn-sm btn-outline-warning">	<span data-feather="edit">	</span>Edit</button>				
					</form>	
<hr class="mb-4">
</div> 
@endsection