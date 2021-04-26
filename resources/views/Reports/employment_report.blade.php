<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Page Title')



@section('content')

 <div class="container">  
 

	 <div class="py-2 text-LEFT">		
		<div class="py-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="h2">Employment Record Reports</h1>
		</div>		
	</div>
	 @if( $x == '' )
 
<div class="row">  
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
		<p>Use the following to filter employment records to generate a report</p>	
			   <ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item" role="presentation">
			<a class="nav-link active" id="position-tab" data-toggle="tab" href="#position" role="tab" aria-controls="position" aria-selected="true">Position</a>
		  </li>
		  <li class="nav-item" role="presentation">
			<a class="nav-link" id="date-tab" data-toggle="tab" href="#date" role="tab" aria-controls="date" aria-selected="false">Appointment Date</a>
		  </li>
		  <li class="nav-item" role="presentation">
			<a class="nav-link" id="status-tab" data-toggle="tab" href="#status" role="tab" aria-controls="status" aria-selected="false">Appointment Status</a>
		  </li>
		  <li class="nav-item" role="presentation">
			<a class="nav-link" id="type-tab" data-toggle="tab" href="#type" role="tab" aria-controls="type" aria-selected="false">Appointment Type</a>
		  </li>
		  <li class="nav-item" role="presentation">
			<a class="nav-link" id="section-tab" data-toggle="tab" href="#section" role="tab" aria-controls="section" aria-selected="false">Section</a>
		  </li>
		  <li class="nav-item" role="presentation">
			<a class="nav-link" id="department-tab" data-toggle="tab" href="#department" role="tab" aria-controls="department" aria-selected="false">Department</a>
		  </li>
		  <li class="nav-item" role="presentation">
			<a class="nav-link" id="station-tab" data-toggle="tab" href="#station" role="tab" aria-controls="station" aria-selected="false">Station</a>
		  </li>
			</ul>
			<div class="tab-content" id="myTabContent">
			  <div class="tab-pane fade show active" id="position" role="tabpanel" aria-labelledby="position-tab"> <!-- Position -->
				<div class="py-3 text-LEFT"> 
					<form action="/generate_employment_report"  method="POST">
					@csrf
					<h5 class="card-title"> Employee Position	<span data-feather="user"></span></h5>
						<p>Filter report by selecting a position from the list</p>
						 <div class="col-md-8 mb-3">
						<div class="row">
							<div class="col-md-4 mb-3">
							   <h6>Position:</h6>
							</div>
								<div class="col-md-8 mb-3">
								<select class="form-control" name="search" placehoder="Choose">
							<option value="All">All</option>
						@foreach($e as $p)
							<option value="{{ $p->position }}">{{ $p->position }}</option>
						@endforeach
						</select>
										
								</div>
						</div>
						</div>
						<input type="text" name="filter" value="Position" hidden>
						<input type="text" name="column" value="position" hidden>
						<!-- With Time-->						
			<div class="accordion" id="accordionExample">			  
			  <div class="card">
				<div class="card-header" id="headingTwo">
				  <h2 class="mb-0">
					<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					  Filter With Time Period
					</button>
				  </h2>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				  <div class="card-body">
					
						<div class="col-md-8 mb-3">
							<div class="row">
								<div class="col-md-4 mb-3">
									<h6>From:</h6>
								</div>
								<div class="col-md-8 mb-3">
									<input type="date" pattern="Y" class="form-control" name="from" id="to" placeholder="" >				
										<div class="invalid-feedback">
											Valid last name is required.
										</div>
								</div>
							</div>
						</div>
						
						<div class="col-md-8 mb-3">
							<div class="row">
								<div class="col-md-4 mb-3">
									<h6>To:</h6>
								</div>
								<div class="col-md-8 mb-3">
									<input type="date" class="form-control" name="to" id="from" placeholder="" >
										<div class="invalid-feedback">
											Valid last name is required.
										</div>
								</div>
							</div>
						</div>						
		
					</div>
				</div>
				</div>					 
			</div>				
				<!-- With Time end -->	
				
						<hr class="mb-4">
							<button type="submit" class="btn btn-sm btn-outline-primary">Generate
							</button>
						<hr class="mb-4">
					</form>
				</div>
			  </div> <!-- Position End -->
			  <div class="tab-pane fade" id="date" role="tabpanel" aria-labelledby="date-tab"> <!-- Appointment Date -->
				<div class="py-3 text-LEFT">	
						<form action="/generate_employment_report"  method="POST">
						@csrf
						<h5 class="card-title"> Employee Appointment Date <span data-feather="calendar"></span></h5>
						<p>Filter report by selecting a time period</p>
						
						 <div class="col-md-8 mb-3">
						<div class="row">
							<div class="col-md-4 mb-3">
							   <h6>From:</h6>
							</div>
								<div class="col-md-8 mb-3">
								<input type="date" pattern="Y" class="form-control" name="from" id="to" placeholder="" >				
										<div class="invalid-feedback">
											Valid last name is required.
										</div>
								</div>
						</div>
						</div>
						<input type="text" name="column" value="appointment_date" hidden>
						 <div class="col-md-8 mb-3">
						<div class="row">
							<div class="col-md-4 mb-3">
							   <h6>To:</h6>
							</div>
								<div class="col-md-8 mb-3">
									<input type="date" class="form-control" name="to" id="from" placeholder="" >
										<div class="invalid-feedback">
											Valid last name is required.
										</div>
								</div>
						</div>
						</div>
						<input type="text" name="filter" value="Appointment Date" hidden>
						<hr class="mb-4">
						 <button type="submit" class="btn btn-sm btn-outline-primary">Generate
						  </button>
						<hr class="mb-4">
						</form>			 
				</div>
				</div> 
				<!-- Appointment Date End -->
			  <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="status-tab"> <!-- Appointment Status -->
				<div class="py-3 text-LEFT">
						<form action="/generate_employment_report"  method="POST">
						@csrf
							<h5 class="card-title"> Employee Appointment Status	<span data-feather="user"></span></h5>
								<p>Filter report by selecting an appointment status from the list</p>
						<div class="col-md-8 mb-3">
							<div class="row">
								<div class="col-md-4 mb-3">
								   <h6>Appointment Status:</h6>
								</div>
								<div class="col-md-8 mb-3">
									<select class="form-control" name="search" placehoder="Choose">
										<option value="All">All</option>
										@foreach($su as $p)
										<option value="{{ $p->appointment_status }}">{{ $p->appointment_status }}</option>
										@endforeach
									</select>										
								</div>
							</div>
						</div>
						<input type="text" name="filter" value="Appointment Status" hidden>
						<input type="text" name="column" value="appointment_status" hidden>
						<!-- With Time-->						
			<div class="accordion" id="accordionExample">			  
			  <div class="card">
				<div class="card-header" id="headingTwo">
				  <h2 class="mb-0">
					<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					  Filter With Time Period
					</button>
				  </h2>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				  <div class="card-body">
					
						<div class="col-md-8 mb-3">
							<div class="row">
								<div class="col-md-4 mb-3">
									<h6>From:</h6>
								</div>
								<div class="col-md-8 mb-3">
									<input type="date" pattern="Y" class="form-control" name="from" id="to" placeholder="" >				
										<div class="invalid-feedback">
											Valid last name is required.
										</div>
								</div>
							</div>
						</div>
						
						<div class="col-md-8 mb-3">
							<div class="row">
								<div class="col-md-4 mb-3">
									<h6>To:</h6>
								</div>
								<div class="col-md-8 mb-3">
									<input type="date" class="form-control" name="to" id="from" placeholder="" >
										<div class="invalid-feedback">
											Valid last name is required.
										</div>
								</div>
							</div>
						</div>						
		
					</div>
				</div>
				</div>					 
			</div>				
				<!-- With Time end -->
						
						<hr class="mb-4">
							<button type="submit" class="btn btn-sm btn-outline-primary">Generate
							</button>
						<hr class="mb-4">
						</form>		
					</div>
			   </div> 
			   <!-- Appointment Status End -->
			   <!-- Appointment Type -->
			   <div class="tab-pane fade" id="type" role="tabpanel" aria-labelledby="type-tab"> <!-- Appointment Type -->
				<div class="py-3 text-LEFT">	
					<form action="/generate_employment_report"  method="POST">
					@csrf
						<h5 class="card-title"> Employee Appointment Type	<span data-feather="user"></span></h5>
							<p>Filter report by selecting an appointment type from the list</p>
						<div class="col-md-8 mb-3">
							<div class="row">
								<div class="col-md-4 mb-3">
								   <h6>Appointment Type:</h6>
								</div>
								<div class="col-md-8 mb-3">
									<select class="form-control" name="search" placehoder="Choose">
										<option value="All">All</option>
										@foreach($at as $p)
										<option value="{{ $p->appointment_type }}">{{ $p->appointment_type }}</option>
										@endforeach
									</select>									
								</div>
							</div>
						</div> 
						<input type="text" name="filter" value="Appointment Type" hidden>
						<input type="text" name="column" value="appointment_type" hidden>
						
						<!-- With Time-->						
			<div class="accordion" id="accordionExample">			  
			  <div class="card">
				<div class="card-header" id="headingTwo">
				  <h2 class="mb-0">
					<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					  Filter With Time Period
					</button>
				  </h2>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				  <div class="card-body">
					
						<div class="col-md-8 mb-3">
							<div class="row">
								<div class="col-md-4 mb-3">
									<h6>From:</h6>
								</div>
								<div class="col-md-8 mb-3">
									<input type="date" pattern="Y" class="form-control" name="from" id="to" placeholder="" >				
										<div class="invalid-feedback">
											Valid last name is required.
										</div>
								</div>
							</div>
						</div>
						
						<div class="col-md-8 mb-3">
							<div class="row">
								<div class="col-md-4 mb-3">
									<h6>To:</h6>
								</div>
								<div class="col-md-8 mb-3">
									<input type="date" class="form-control" name="to" id="from" placeholder="" >
										<div class="invalid-feedback">
											Valid last name is required.
										</div>
								</div>
							</div>
						</div>						
		
					</div>
				</div>
				</div>					 
			</div>				
				<!-- With Time end -->
						
						<hr class="mb-4">
							<button type="submit" class="btn btn-sm btn-outline-primary">Generate
							</button>
						<hr class="mb-4">
					</form>
				</div>
			   </div> 
			   <!-- Appointment Type End -->
				<!-- Section -->
			<div class="tab-pane fade" id="section" role="tabpanel" aria-labelledby="section-tab"> 
			   <div class="py-3 text-LEFT">	
					<form action="/generate_employment_report"  method="POST">
					@csrf
						<h5 class="card-title"> Employee Section	<span data-feather="user"></span></h5>
							<p>Filter report by selecting a section from the list</p>
						<div class="col-md-8 mb-3">
							<div class="row">
								<div class="col-md-4 mb-3">
									<h6>Section:</h6>
								</div>
								<div class="col-md-8 mb-3">
									<select class="form-control" name="search" placehoder="Choose">
										<option value="All">All</option>
										@foreach($se as $p)
										<option value="{{ $p->section }}">{{ $p->section }}</option>
										@endforeach
									</select>
									
								</div>
							</div>
						</div> 
						
						<input type="text" name="filter" value="Section" hidden>
						<input type="text" name="column" value="section" hidden>
						
						<!-- With Time-->						
			<div class="accordion" id="accordionExample">			  
			  <div class="card">
				<div class="card-header" id="headingTwo">
				  <h2 class="mb-0">
					<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					  Filter With Time Period
					</button>
				  </h2>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				  <div class="card-body">
					
						<div class="col-md-8 mb-3">
							<div class="row">
								<div class="col-md-4 mb-3">
									<h6>From:</h6>
								</div>
								<div class="col-md-8 mb-3">
									<input type="date" pattern="Y" class="form-control" name="from" id="to" placeholder="" >				
										<div class="invalid-feedback">
											Valid last name is required.
										</div>
								</div>
							</div>
						</div>
						
						<div class="col-md-8 mb-3">
							<div class="row">
								<div class="col-md-4 mb-3">
									<h6>To:</h6>
								</div>
								<div class="col-md-8 mb-3">
									<input type="date" class="form-control" name="to" id="from" placeholder="" >
										<div class="invalid-feedback">
											Valid last name is required.
										</div>
								</div>
							</div>
						</div>						
		
					</div>
				</div>
				</div>					 
			</div>				
				<!-- With Time end -->
						
						<hr class="mb-4">
							<button type="submit" class="btn btn-sm btn-outline-primary">Generate
							</button>
						<hr class="mb-4">
					</form>
				</div>
			   </div> 
			   <!-- Section End -->
			   <!-- Department -->
			 <div class="tab-pane fade" id="department" role="tabpanel" aria-labelledby="department-tab"> 
			   <div class="py-3 text-LEFT">	
				<form action="/generate_employment_report"  method="POST">
					@csrf
						<h5 class="card-title"> Employee Department	<span data-feather="user"></span></h5>
							<p>Filter report by selecting a department from the list</p>
						<div class="col-md-8 mb-3">
							<div class="row">
								<div class="col-md-4 mb-3">
									<h6>Department:</h6>
								</div>
								<div class="col-md-8 mb-3">
									<select class="form-control" name="search" placehoder="Choose">
										<option value="All">All</option>
										@foreach($de as $dep)
										<option value="{{ $dep->department }}">{{ $dep->department }}</option>
										@endforeach
									</select>									
								</div>
							</div>
						</div> 
						
						<input type="text" name="filter" value="Department" hidden>
						<input type="text" name="column" value="department" hidden>
						
						<!-- With Time-->						
			<div class="accordion" id="accordionExample">			  
			  <div class="card">
				<div class="card-header" id="headingTwo">
				  <h2 class="mb-0">
					<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					  Filter With Time Period
					</button>
				  </h2>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				  <div class="card-body">
					
						<div class="col-md-8 mb-3">
							<div class="row">
								<div class="col-md-4 mb-3">
									<h6>From:</h6>
								</div>
								<div class="col-md-8 mb-3">
									<input type="date" pattern="Y" class="form-control" name="from" id="to" placeholder="" >				
										<div class="invalid-feedback">
											Valid last name is required.
										</div>
								</div>
							</div>
						</div>
						
						<div class="col-md-8 mb-3">
							<div class="row">
								<div class="col-md-4 mb-3">
									<h6>To:</h6>
								</div>
								<div class="col-md-8 mb-3">
									<input type="date" class="form-control" name="to" id="from" placeholder="" >
										<div class="invalid-feedback">
											Valid last name is required.
										</div>
								</div>
							</div>
						</div>						
		
					</div>
				</div>
				</div>					 
			</div>				
				<!-- With Time end -->
						
						<hr class="mb-4">
							<button type="submit" class="btn btn-sm btn-outline-primary">Generate
							</button>
						<hr class="mb-4">
					</form>
				</div>
			   </div> 
			   <!-- Department End -->
			   <!-- Station Start -->
			 <div class="tab-pane fade" id="station" role="tabpanel" aria-labelledby="station-tab">
			   <div class="py-3 text-LEFT">	
					<form action="/generate_employment_report"  method="POST">
						@csrf		
						<h5 class="card-title"> Employee Station	<span data-feather="user"></span></h5>
							<p>Filter report by selecting a station from the list</p>
								<div class="col-md-8 mb-3">
									<div class="row">
										<div class="col-md-4 mb-3">
											<h6>Station:</h6>
										</div>
										<div class="col-md-8 mb-3">
											<select class="form-control" name="search" placehoder="Choose">
												<option value="All">All</option>
												@foreach($st as $p)
												<option value="{{ $p->station }}">{{ $p->station }}</option>
												@endforeach
											</select>
										
										</div>
									</div>
								</div> 
								
								<input type="text" name="filter" value="Station" hidden>
								<input type="text" name="column" value="station" hidden>
								
								<!-- With Time-->						
			<div class="accordion" id="accordionExample">			  
			  <div class="card">
				<div class="card-header" id="headingTwo">
				  <h2 class="mb-0">
					<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					  Filter With Time Period
					</button>
				  </h2>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				  <div class="card-body">
					
						<div class="col-md-8 mb-3">
							<div class="row">
								<div class="col-md-4 mb-3">
									<h6>From:</h6>
								</div>
								<div class="col-md-8 mb-3">
									<input type="date" pattern="Y" class="form-control" name="from" id="to" placeholder="" >				
										<div class="invalid-feedback">
											Valid last name is required.
										</div>
								</div>
							</div>
						</div>
						
						<div class="col-md-8 mb-3">
							<div class="row">
								<div class="col-md-4 mb-3">
									<h6>To:</h6>
								</div>
								<div class="col-md-8 mb-3">
									<input type="date" class="form-control" name="to" id="from" placeholder="" >
										<div class="invalid-feedback">
											Valid last name is required.
										</div>
								</div>
							</div>
						</div>						
		
					</div>
				</div>
				</div>					 
			</div>				
				<!-- With Time end -->
								
						<hr class="mb-4">
							<button type="submit" class="btn btn-sm btn-outline-primary">Generate
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
@endif
 @if( $x == '1' )
	 
 	<div class="py-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom ">
        <h1 class="h4 ">Filter Results</h1>		
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{ url('employment_report') }}">
			<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Add New Record">
				 <span data-feather="filter"></span> Filter Report</button></a>
	<form action="export_emp" method="POST">
					@csrf	 

	 <input type="text" name="column" value="{{ $column }}" hidden>
	 <input type="text" name="search" value="{{ $search }}" hidden>
	 <input type="text" name="from" value="{{ $from }}" hidden>
	 <input type="text" name="to" value="{{ $to }}" hidden>
     <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Export
    </button>
		<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
		  <a class="dropdown-item" href="#"><button type="submit" name="export" class="btn ">Export to Exel</button></a>   
		</div>
		   
		  </form> 
		  </div>
        </div>
      </div>

		@if($report != '[]')
			<div class="py-2 text-center border-bottom">
		<h3>EMPLOYMENT RECORD (In the Public Service)</h3>
	</div>
		<div class="py-5 d-flex justify-content-left flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
		 <div class="text-LEFT">	
		<h6>Employment Records Report filtered on {{ $filter ??'' }}: {{ $search??'' }}</h6>
		@if($from != null) <p> For the period of {{ $from ?? '' }} to {{ $to ?? '' }}. <p> @endif
		</div>
		</div>
			
		<div class="table-responsive">
        <table class="table table-sm">
          <thead>
            <tr>
              <th>S/N</th>
              <th>Employee</th>
              <th>Full Name</th>
              <th>Position</th>
              <th>Appointment Date</th>
              <th>Appointment Status</th>
              <th>Appointment Type</th>
              <th>Duration</th>
              <th>Section</th>
              <th>Department</th>
              <th>Ministry/Institution</th>
              <th>Station</th>
              <th>District/Province</th>
            </tr>
          </thead>
		  @foreach ($report as $p)
		   @php
		 $u = \App\User::where('employee_no',$p->employee_no)
					->get();		  
		  @endphp
		   @if($u[0]->status != 'Removed')
          <tbody class="table-striped table-sm">
            <tr>
              <td>{{ $x++ }}</td>             
              <td>{{ $p->employee_no }}</td>             
              <td>
				@php
					$names = \App\employee::where('employee_no',$p->employee_no)
								->get();
					@endphp
					{{ $names[0]->surname }} {{ $names[0]->other_names }}
			  </td>             
              <td>{{ $p->position }}</td>    
			  <td>{{ $p->appointment_date }}</td>                   
			  <td>{{ $p->appointment_status }}</td>                   
			  <td>{{ $p->appointment_type }}</td>                   
			  <td>{{ $p->duration }}</td>                   
			  <td>{{ $p->section }}</td>                   
			  <td>{{ $p->department }}</td>                   
			  <td>{{ $p->ministry }}</td>                   
			  <td>{{ $p->station }}</td>                   
			  <td>{{ $p->district }}/{{ $p->province }}</td>                   
                 
            </tr>
          </tbody>
		  @endif
		  @endforeach
		  
		 
		  
        </table>
      </div>
	@endif
	@if($report == '[]')
		<p>No Records Found</p>
	@endif
 
	<!-- Paginate -->
	<div class="py-3 container">
	  {{ $report->withQueryString()->links()??'' }}
      </div>
	<!-- Paginate End -->
 
	 @endif
</div> 
@endsection