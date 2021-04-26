<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Page Title')



@section('content')

 <div class="container">  
	 <div class="py-2 text-LEFT border-bottom">		
		<div class="py-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
			<h1 class="h2">All Employee Contacts</h1>
		</div>

	<p>Search for an employee contact below</p>
			
	</div>
		<!-- Error & Success Check -->
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
			<!-- Error & Success Check End -->
	
<div class="row">  
  <div class="col-sm-10">
    <div class="card">
      <div class="card-body">
		<p>Use the following to filter your search</p>	
			   <ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item" role="presentation">
			<a class="nav-link active" id="employee_no-tab" data-toggle="tab" href="#employee_no" role="tab" aria-controls="employee_no" aria-selected="true">Employee No</a>
		  </li>
		 <li class="nav-item" role="presentation">
			<a class="nav-link" id="name-tab" data-toggle="tab" href="#name" role="tab" aria-controls="name" aria-selected="true">Name</a>
		  </li>		
		  <li class="nav-item" role="presentation">
			<a class="nav-link" id="job_title-tab" data-toggle="tab" href="#job_title" role="tab" aria-controls="job_title" aria-selected="false">Job Title</a>
		  </li>
			</ul>
			<div class="tab-content" id="myTabContent">
			  <!-- employee_no -->
			  <div class="tab-pane fade show active" id="employee_no" role="tabpanel" aria-labelledby="employee_no-tab"> <!-- employee_no -->
				<div class="py-3 text-LEFT"> 
					<form action="/filter_all_contacts"  method="POST">
					@csrf
					<h5 class="card-title"> Employee Number	<span data-feather="hash"></span></h5>
						<p>Filter by typing an employee number </p>
							<div class="col-md-8 mb-3">
								<div class="row">
									<div class="col-md-4 mb-3">
									   <h6>Employee Number :</h6>
									</div>
									<div class="col-md-8 mb-3">
										<input type="text" class="form-control" name="search" list="num" id="number" value="All" >
											<datalist id="num">
											  <option value="All">All</option>
											  
											@foreach($e as $c)											
											  <option value="{{ $c->employee_no }}">{{ $c->employee_no }}</option>
											@endforeach
											  
											</datalist>
										<div class="invalid-feedback">
											Valid last name is required.
										</div>
									</div>
								</div>
							</div> 	
						<input type="text" name="filter" value="Position" hidden>
						<input type="text" name="column" value="employee_no" hidden>
						
						<hr class="mb-4">
							<button type="submit" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Search Records">
								<span data-feather="search"></span> Search
							</button>
						<hr class="mb-4">
					</form>
				</div>
			  </div> 
			  <!-- <!-- employee_no  End -->
			  		   <!-- Department -->
			 <div class="tab-pane fade" id="name" role="tabpanel" aria-labelledby="name-tab"> 
			   <div class="py-3 text-LEFT">	
				<form action="/filter_all_contacts"  method="POST">
					@csrf
						<h5 class="card-title"> Employee Name	<span data-feather="user"></span></h5>
							<p>Filter by typing an employee's name</p>
								<div class="col-md-8 mb-3">
									<div class="row">
										<div class="col-md-4 mb-3">
										   <h6>Employee Name :</h6>
										</div>
										<div class="col-md-8 mb-3">
											<input type="text" class="form-control" name="search" list="sur" id="sname" value="All" >
												<datalist id="sur">
												  <option value="All">All</option>
												  
												@foreach($s as $c)											
												<option value="{{ $c->surname }}">{{ $c->surname }}</option>
												@endforeach
												  
												</datalist>
											<div class="invalid-feedback">
												Valid last name is required.
											</div>
										</div>
									</div>
								</div> 	
						<input type="text" name="filter" value="Department" hidden>
						<input type="text" name="column" value="surname" hidden>						
						
						<hr class="mb-4">
							<button type="submit" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Search Records">
								<span data-feather="search"></span> Search
							</button>
						<hr class="mb-4">
					</form>
				</div>
			   </div> 
			   <!-- Name End -->
			   <!-- Station Start -->
			 <div class="tab-pane fade" id="job_title" role="tabpanel" aria-labelledby="job_title-tab">
			   <div class="py-3 text-LEFT">	
					<form action="/filter_all_contacts"  method="POST">
						@csrf		
						<h5 class="card-title"> Employee Job Title	<span data-feather="user"></span></h5>
							<p>Filter by typing an employee's job title</p>
									<div class="col-md-8 mb-3">
										<div class="row">
											<div class="col-md-4 mb-3">
											   <h6>Employee Job Title :</h6>
											</div>
											<div class="col-md-8 mb-3">
												<input type="text" class="form-control" name="search" list="job" id="title" value="All" >
													<datalist id="job">
													  <option value="All">All</option>
													  
													@foreach($j as $c)
													  <option value="{{ $c->job_title }}">{{ $c->job_title }}</option>
													@endforeach
													  
													</datalist>
												<div class="invalid-feedback">
													Valid last name is required.
												</div>
											</div>
										</div>
									</div> 
								
								<input type="text" name="filter" value="Station" hidden>
								<input type="text" name="column" value="job_title" hidden>								
								
						<hr class="mb-4">
							<button type="submit" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Search Records">
								<span data-feather="search"></span> Search
							</button>
						<hr class="mb-4">
					</form>
				</div>
			   </div>			   
			   <!-- Station End -->
			</div>
      </div>
    </div>
	
	<hr class="mb-4">
	
  </div> 
 </div>

	
	
</div> 
@endsection