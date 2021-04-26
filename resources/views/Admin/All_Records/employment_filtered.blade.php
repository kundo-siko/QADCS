
@extends('layouts.header')

@section('title', 'Page Title')



@section('content')

 <div class="container">  
	 <div class="py-3 text-LEFT">		
		<div class="py-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mb-3 border-bottom">
			<h1 class="h2">View Employment Record Records</h1>
		</div>
			<div class="btn-group mr-2">
				<a href="{{ url('all_employment') }}">
				<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Search Record">
					  All Records</button></a>
			</div>		
	</div>

<div class="card" style="width: 70rem;">
  <div class="card-header">
    Employment Records for {{ $e[0]->employee_no ??'' }} 
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
		
	<!-- Qualification Details -->		
	<hr class="mb-4">
	<p>Employment Record: {{ $count }} Added</p>
	<div class="table-responsive">
        <table class="table table-sm">
          <thead>
            <tr>
              <th>S/N</th>
              <th>Position</th>
              <th>Department</th>
              <th>Mininstry/Institution</th>
              <th>Province</th>
              
              <th></th>
            </tr>
          </thead>
					@php $x = 1; @endphp
		  @foreach ($e as $p)
          <tbody class="table-striped table-sm">
            <tr>
              <td>			  
			  {{ $x++ }}
			  </td>             
              <td>{{ $p->position }}</td>             
              <td>{{ $p->department }}</td>             
              <td>{{ $p->ministry }}</td>             
              <td>{{ $p->province }}</td>                   
                          
              <td>
					<form action="/view_all_employment" method="POST">
						@csrf
				<button type="submit" class="btn btn-sm btn-success">
				 <span data-feather="eye"></span>  View</button>
				<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $p->employee_no }}" hidden>
				<input type="text" class="form-control" name="id" id="employeeNO"  value="{{ $p->id }}" hidden>
					</form>	
			  </td> 
				
            </tr>
          </tbody>
		  @endforeach		  
        </table>
      </div>  
	
	<div class="py-3 container">
	  {{ $e->withQueryString()->links() }}
      </div>
	
    </div>
	
    </div>
	
  </div>
</div>
<hr class="mb-4">
	 

</div> 
@endsection