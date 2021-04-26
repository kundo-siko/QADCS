 <!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Page Title')



@section('content')

 <div class="container">  
 
 @if( $x == '' )
	 <div class="py-2 text-LEFT">		
		<div class="py-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="h2">Current Training Reports</h1>
		</div>		
	</div>
	<form action="/generate_training_report"  method="POST">
	@csrf
 <div class="row"> 

	
	<div class="col-md-12 mb-3">
	<p>Select dates to filter report. Leave "To" empty ang click "Generate" to get the full list</p>
	</div>
	<div class="col-md-6 mb-3">
	<div class="row">
        <div class="col-md-4 mb-3">
           <h6>From:</h6>
		</div>
			<div class="col-md-8 mb-3">
			<input type="date" class="form-control" name="from" id="to" placeholder="" value='{{ date("Y-m-d") }}'>				
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
	</div>
	</div>
	
	<div class="col-md-6 mb-3">
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
	
	<input type="text" name="x" value="1" hidden>
	</div> 
	<hr class="mb-4">
	 <button type="submit" class="btn btn-sm btn-outline-primary">Generate
	  </button>
	<hr class="mb-4">
	</form>
@endif
@if( $x == '1' )
				
			
	<div class="py-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom ">
        <h1 class="h4 ">Filter Results</h1>		
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{ url('training_report') }}">
			<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Add New Record">
				 <span data-feather="filter"></span> Filter Report</button></a>
           <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
		   <form action="export_training" method="POST">
					@csrf	 
           
		    <input type="text" name="from" value="{{ $from }}" hidden>
			<input type="text" name="to" value="{{ $to }}" hidden>
		   <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Export
			</button>
		<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
		  <a class="dropdown-item" href="#"><button type="submit" name="export" class="btn">Export to Exel</button></a>   
		</div> 
		
		  </form> 
          </div>
        </div>
      </div>

		@if($report != '[]')
	 <div class="py-2 text-center border-bottom">
		<h3>CURRENT TRAINING BEING UNDERTAKEN</h3>
	</div>
		<div class="py-4 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-5 mb-3 ">			
			<h6>List of employees undertaking training @if($to != null) in the dates between {{ $from }} to {{ $to }} @endif</h6>			
		@php
		$count = $report->count();
		@endphp
		<h6>Records Found: {{ $count }}</h6>
		</div>
			
		  <div class="table-responsive">
        <table class="table table-sm">
          <thead>
            <tr>
              <th>S/N</th>
              <th>Employee No</th>
              <th>Course/Programme</th>
              <th>Current Stage</th>
              <th>Final Qualification</th>
              <th>Start Date</th>
              <th>Finish Date</th>
              <th>Training Institution</th>
              <th>Sponsor</th>
            </tr>
          </thead>
				@php $x = 1; @endphp
		  @foreach ($report as $t)
		  @php
		 $u = \App\User::where('employee_no',$t->employee_no)
					->get();		  
		  @endphp
		   @if($u[0]->status != 'Removed')
          <tbody class="table-striped table-sm">
            <tr>
              <td>{{ $x++ }}</td>             
              <td>{{ $t->employee_no }}</td>             
              <td>{{ $t->course }}</td>             
              <td>{{ $t->stage }}</td>             
              <td>{{ $t->qualification }}</td>             
              <td>{{ $t->start }}</td>             
              <td>{{ $t->finish }}</td>             
              <td>{{ $t->institution }}</td>             
              <td>{{ $t->sponsor }}</td>   
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