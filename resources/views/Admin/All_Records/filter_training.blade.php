
@extends('layouts.header')

@section('title', 'Page Title')



@section('content')

 <div class="container">  
	 <div class="py-2 text-LEFT border-bottom">		
		<div class="py-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
			<h1 class="h2">All Employee Current Training Records</h1>
		</div>
		<p>Click the 'Filter' button to return to the filter page</p>
	</div>
	
	<div class="py-3 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
			<h4>Employee Training Records</h4>		
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{ url('all_training') }}">
			<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Add New Record">
				 <span data-feather="filter"></span> Filter</button></a>
           <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
          </div>
        </div>		
      </div>
	  
		@if($e != '[]')
		
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
              <th>Number of Ongoing</th>
              <th>Number of Completed</th>
              <th></th>
              
            </tr>
          </thead>
		  @foreach ($e as $t)
		  @php
			  $count = \App\training::where('employee_no',$t->employee_no)
					->where('finish','>',date("Y-m-d"))
					->count();
			  $count2 = \App\training::where('employee_no',$t->employee_no)
					->where('finish','<',date("Y-m-d"))
					->count();

				$u = \App\User::where('employee_no',$t->employee_no)
					->get();
		  @endphp
	   @if($count > 0 || $count2 > 0)	
		   @if($u[0]->status != 'Removed')
          <tbody class="table-striped table-sm">		  
            <tr>
              <td>{{ $t->employee_no }}</td>                            
              <td>{{ $t->surname }} {{ $t->other_names }}</td>
              <td>{{ $count }}</td> 	
              <td>{{ $count2 }}</td> 	
              <td>
				<form action="/fil_tra" method="POST">
					@csrf
					<button type="submit" class="btn btn-sm btn-success">
					 <span data-feather="eye"></span>  View</button>
					<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $t->employee_no }}" hidden>
					<input type="text" class="form-control" name="id" id="employeeNO"  value="{{ $t->id }}" hidden>
				</form>	
			  </td>             
            </tr>			
          </tbody>
				@endif			
			@endif
		  @endforeach		  
        </table>
      </div>
	  
	  <!-- Pagination -->	 
	  <div class="py-3 container">
	  {{ $e->withQueryString()->links() }}
      </div>
	 <!-- Pagination End -->	
	  
	@endif
	@if($e == '[]')
		<p>No Records Found</p>
	@endif


</div> 
@endsection