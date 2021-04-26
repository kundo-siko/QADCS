
@extends('layouts.header')

@section('title', 'Page Title')



@section('content')
<div class="container"> 

 <div class="py-5 text-LEFT">
    <div class="py-2 text-center border-bottom">
	
			<h3>VIEW ACADEMIC QUALIFICATIONS</h3>
	</div>
   			
    <p class="lead">Academic Qualification records</p>
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
			<div class="col-md-6 mb-3">
				@if($a[0]->grade9_PDF != 'Not Added')
				<form action="/download_academic"  method="POST"> 
					@csrf
					<input type="text" class="form-control" name="id" id="id"  value="{{ $a[0]->id ??'' }}" hidden>
					<input type="text" class="form-control" name="check" id="check"  value="grade9" hidden> 						
					<button type="submit" class="btn btn-sm btn-primary">Download</button>
					</form>
				@endif
				@if(($a[0]->grade9_PDF) == null || $a[0]->grade9_PDF == 'Not Added')
					<button type="submit" class="btn btn-sm btn-danger">Not Provided</button>
				@endif	
			</div>
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
			<div class="col-md-6 mb-3">
				@if(($a[0]->grade12_PDF) != 'Not Added')
				<form action="/download_academic"  method="POST"> 
					@csrf
					<input type="text" class="form-control" name="id" id="id"  value="{{ $a[0]->id ??'' }}" hidden> 
					<input type="text" class="form-control" name="check" id="check"  value="grade12" hidden> 	
					<button type="submit" class="btn btn-sm btn-primary">Download</button>
					</form>
				@endif
				@if(($a[0]->grade12_PDF) == null || $a[0]->grade12_PDF == 'Not Added')
					<button type="submit" class="btn btn-sm btn-danger">Not Provided</button>
				@endif	
			</div>
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
			<div class="col-md-6 mb-3">
			<p class="card-text">Specification : <strong>{{ $a[0]->specify ??'' }}</strong></p>
				
			</div>
			<div class="col-md-2 mb-3">
			@if(($a[0]->other_PDF) != 'Not Added')
				<form action="/download_academic"  method="POST"> 
					@csrf
					<input type="text" class="form-control" name="id" id="id"  value="{{ $a[0]->id ??'' }}" hidden> 		
					<input type="text" class="form-control" name="check" id="check"  value="other" hidden> 		
					<button type="submit" class="btn btn-sm btn-primary">Download</button>
					</form>
				@endif
				@if(($a[0]->other_PDF) == null || $a[0]->other_PDF == 'Not Added')
					<button type="submit" class="btn btn-sm btn-danger">Not Provided</button>
				@endif	
				
			</div>
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