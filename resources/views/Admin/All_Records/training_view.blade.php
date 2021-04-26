


<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Page Title')



@section('content')

 <div class="container">  
	 <div class="py-3 text-LEFT">		
		<div class="py-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mb-3 border-bottom">
			<h1 class="h2">View Current Training Records</h1>
		</div>
			<div class="btn-group mr-2">
				<a href="{{ url('all_training') }}">
				<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Search Record">
					  All Records</button></a>
			</div>		
	</div>

<div class="card" style="width: 70rem;">
  <div class="card-header">
    Current Training Records for {{ $e[0]->employee_no ??'' }} 
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
	<p>Employee is undertaking {{ $count }} training programs, and has completed {{ $count2 }}</p>
	  <div class="table-responsive">
        <table class="table table-sm">
          <thead>
            <tr>
              <th>S/N</th>
              <th>Course/Programme</th>
              <th>Current Stage</th>
              <th>Final Qualification</th>
              <th>Start Date</th>
              <th>Finish Date</th>
              <th>Training Institution</th>
              <th>Sponsor</th>
			   <th>Status</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
		  @php $x = 1; @endphp
		  @foreach ($e as $p)
          <tbody class="table-striped table-sm">
            <tr>
              <td>{{ $x++ }}</td>             
              <td>{{ $p->course }}</td>             
              <td>{{ $p->stage }}</td>             
              <td>{{ $p->qualification }}</td>             
              <td>{{ $p->start }}</td>             
              <td>{{ $p->finish }}</td>             
              <td>{{ $p->institution }}</td>             
              <td>{{ $p->sponsor }}</td>                   
                <td>
			  @if($p->finish > (date("Y-m-d")))
					Ongoing 
				 @else
					Completed
				 @endif
			  </td>                 
              <td>
					<form action="/edit_training" method="POST">
						@csrf
				<button type="submit" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit this record">
				 <span data-feather="edit"></span>  </button>
				<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $p->employee_no }}" hidden>
				<input type="text" class="form-control" name="id" id="id"  value="{{ $p->id }}" hidden>
					</form>		
			  </td>  
			  <td>
				<!-- Remove Modal -->
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myBtn_{{ $p->id }}" data-toggle="tooltip" data-placement="top" title="Delete this record">
					   <span data-feather="trash-2"></span>  
					</button>
					<!-- Modal -->
					<div class="modal fade" id="myBtn_{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Remove "{{ $p->course }}" record</h5>
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
								<form action="delete_training" method="POST">
								@csrf
									<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $p->employee_no }}" hidden>
									<input type="text" class="form-control" name="id" id="id"  value="{{ $p->id }}" hidden>						
								<button type="submit" class="btn btn-success">Yes, Save changes</button>
								</form>	
						  </div>
						</div>
					  </div>
					</div>						
				<!-- End Remove Modal -->	
			</td>
				
            </tr>
          </tbody>
		  @endforeach		  
        </table>
      </div>
	
	
	<!-- Pagination -->	 
	  <div class="py-3 container">
	  {{ $e->withQueryString()->links() }}
      </div>
	 <!-- Pagination End -->
	
	
    </div>
	
	
    </div>
	
  </div>
</div>
<hr class="mb-4">
	 

</div> 
@endsection