<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Page Title')



@section('content')

 <div class="container">  
	 <div class="py-2 text-LEFT border-bottom">		
		<div class="py-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
			<h1 class="h2">All Employee Profiles</h1>
		</div>

	<p>Click the 'Filter' button to return to the filter page</p>
			
	</div>
				
			
	<div class="py-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2 ">Employee Profiles</h1>		
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{ url('all_profiles') }}">
			<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Add New Record">
				 <span data-feather="filter"></span> Filter</button></a>
           <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
          </div>
        </div>
      </div>

		@if($es != '[]')
			
		  <div class="table-responsive">
        <table class="table table-sm">
          <thead>
            <tr>
              <th>Employee Number</th>
              <th>Surname</th>
              <th>Other Names</th>
              <th>Ministry/Institution</th>
              <th>Department</th>
              <th></th>
              
            </tr>
          </thead>
		  @foreach ($es as $e)
          <tbody class="table-striped table-sm">
		  @php
		  $u = \App\User::where('employee_no',$e->employee_no)
					->get();		  
		  @endphp
		  @if($u[0]->status != 'Removed')
            <tr>
              <td>{{ $e->employee_no }}</td>                            
              <td>{{ $e->surname }}</td>                            
              <td>{{ $e->other_names }}</td>                            
              <td>{{ $e->ministry }}</td>                            
              <td>{{ $e->department }}</td>                            
              <td>
				<form action="/view_all_profiles" method="POST">
						@csrf
				<button type="submit" class="btn btn-sm btn-success">
				 <span data-feather="eye"></span>  View</button>
				<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $e->employee_no }}" hidden>
				<input type="text" class="form-control" name="id" id="employeeNO"  value="{{ $e->id }}" hidden>
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
	  {{ $es->withQueryString()->links() }}
      </div>
	 <!-- Pagination End -->	
	 
	@endif
	@if($es == '[]')
		<p>No Records Found</p>
	@endif


</div> 
@endsection