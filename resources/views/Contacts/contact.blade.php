


<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Page Title')



@section('content')

 <div class="container">  
	 <div class="py-2 text-LEFT">		
		<div class="py-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="h2">View Employee Contact</h1>
		</div>	
			<div class="btn-group mr-2">
				<a href="{{ url('view_contact') }}">
				<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Search Record">
					  All Records</button></a>
			</div>			
	</div>

<div class="card" style="width: 55rem;">
  <div class="card-header">
	<form action="/edit_contact" method="POST">
						@csrf
    Employee Contact for {{ $c[0]->employee_no ??'' }} 			
				<button type="submit" class="btn btn-sm btn-warning">
				 <span data-feather="edit"></span>  </button>
				<input type="text" class="form-control" name="id" id="id"  value="{{ $c[0]->id }}" hidden>
			</form>	
  </div>
		
  <div class="card-body">
    <!-- h5 class="card-title">Special title treatment</h5 -->
	
	<div class="row"> 
	
	 <div class="col-md-5 order-md-2 mb-4 border-left">
	 
		<!-- Employee Number End -->		
		<div class="row"> 
			<div class="col-md-4 mb-3">
				<p class="card-text">Employee No: </p>
			</div>
			<div class="col-md-8 mb-3">
				<strong>{{ $c[0]->employee_no ??'' }}</strong>
			</div>
		</div>
		<!-- Employee Number End -->
		
		<!-- Phone -->		
		<div class="row"> 
			<div class="col-md-4 mb-3">
				<p class="card-text">Phone: </p>
			</div>
			<div class="col-md-8 mb-3">
				<strong>{{ $c[0]->phone ??'' }}</strong>
			</div>
		</div>
		<!-- Phone End -->
		
		<!-- Email -->		
		<div class="row"> 
			<div class="col-md-4 mb-3">
				<p class="card-text">Email: </p>
			</div>
			<div class="col-md-8 mb-3">
				<strong>{{ $c[0]->email ??'' }}</strong>
			</div>
		</div>
		<!-- Email End -->
		
	</div>
	 
	 
	
	<div class="col-md-7 order-md-1">
	
		<!-- Employee Number -->
		<div class="row"> 
			<div class="col-md-4 mb-3">
				<p class="card-text">Surname: </p>
			</div>
			<div class="col-md-8 mb-3">
				<strong>{{ $c[0]->surname ??'' }}</strong>
			</div>
		</div>
		<!-- Employee Number End -->
		
		<!-- Other Names -->
		<div class="row"> 
			<div class="col-md-4 mb-3">
				<p class="card-text">Other Names: </p>
			</div>
			<div class="col-md-8 mb-3">
				<strong>{{ $c[0]->other_names ??'' }}</strong>
			</div>
		</div>
		<!-- Other Names End -->		
		
		<!-- Department/Unit -->
		<div class="row"> 
			<div class="col-md-4 mb-3">
				<p class="card-text">Department/Unit: </p>
			</div>
			<div class="col-md-8 mb-3">
				<strong>{{ $c[0]->department ??'' }}</strong>
			</div>
		</div>
		<!-- Department/Unit -->

		<!-- Job Title -->
		<div class="row"> 
			<div class="col-md-4 mb-3">
				<p class="card-text">Job Title: </p>
			</div>
			<div class="col-md-8 mb-3">
				<strong>{{ $c[0]->job_title ??'' }}</strong>
			</div>
		</div>
		<!-- Job Title-->
		
		<!-- Job Specification -->
		<div class="row"> 
			<div class="col-md-4 mb-3">
				<p class="card-text">Job Specification: </p>
			</div>
			<div class="col-md-8 mb-3">
				<strong>{{ $c[0]->job_spec ??'' }}</strong>
			</div>
		</div>
		<!-- Job Specification-->
		
				
    </div>
	
	
    </div>
	
  </div>
</div>
<hr class="mb-4">
			<form action="/edit_contact" method="POST">
						@csrf
				<button type="submit" class="btn btn-sm btn-warning">
				 <span data-feather="edit"></span> Edit</button>
				<input type="text" class="form-control" name="id" id="id"  value="{{ $c[0]->id }}" hidden>
			</form>	
			<hr class="mb-4">

</div> 
@endsection