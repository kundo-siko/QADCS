
@extends('layouts.header')

@section('title', 'Page Title')



@section('content')

 <div class="container">  
	 <div class="py-2 text-LEFT border-bottom">		
		<div class="py-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
			<h1 class="h2">Employee Contacts</h1>
		</div>
		<p>Click the 'Filter' button to return to the filter page</p>
	</div>
	
	<div class="py-3 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
			<h4>Employee Contact Results </h4>		
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{ url('view_contact') }}">
			<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Filter Record">
				 <span data-feather="filter"></span> Filter</button></a>
			<a href="{{ url('new_contact') }}">
			<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Add New Record">
				 <span data-feather="plus"></span> Add Contact</button></a>
           <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
          </div>
        </div>		
      </div>
	  
		@if($c != '[]')
		
				<!-- Alerts -->
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
				<!-- Alerts End -->
			
		  <div class="table-responsive">
        <table class="table table-sm">
          <thead>
            <tr>
              <th>Employee Number</th>
              <th>Full Name</th>
              <th>Department</th>
              <th>Job Title</th>
              <th>Email</th>
              <th></th>
              
            </tr>
          </thead>
		  @foreach ($c as $t)		  
          <tbody class="table-striped table-sm">		  
            <tr>
              <td>{{ $t->employee_no ??'' }}</td>                            
              <td>{{ $t->surname ??'' }} {{ $t->other_names ??'' }}</td>
              <td>{{ $t->department ??'' }}</td> 	
              <td>{{ $t->job_title ??'' }}</td> 	
              <td>{{ $t->email ??'' }}</td> 	
              <td>
				<form action="/show_contact" method="POST">
					@csrf
					<button type="submit" class="btn btn-sm btn-success">
					 <span data-feather="eye"></span>  View</button>
					<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $t->employee_no ??'' }}" hidden>
					<input type="text" class="form-control" name="id" id="employeeNO"  value="{{ $t->id ??'' }}" hidden>
				</form>	
			  </td>             
            </tr>			
          </tbody>				
		  @endforeach		  
        </table>
      </div>	
	  
	  <!-- Pagination -->	 
	  <div class="py-3 container">
	  {{ $c->withQueryString()->links() }}
      </div>
	 <!-- Pagination End -->
	  
	@endif
	@if($c == '[]')
		<p>No Records Found</p>
	@endif


</div> 
@endsection