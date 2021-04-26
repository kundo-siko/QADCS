<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Page Title')



@section('content')

 <div class="container"> 
 @if( $x == '' )
	 <div class="py-2 text-LEFT">		
		<div class="py-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="h2">Professional/Vocational Qualifications Reports</h1>
		</div>	
	<p>Type a qualification name or type for the records you want to generate, or type 'ALL' to get the full report</p>		
	</div>

	<form action="/generate_professional_report"  method="POST">
	@csrf
 <div class="row"> 

	 <div class="col-md-8 mb-3">
	<div class="row">
        <div class="col-md-4 mb-3">
           <h6>Qualification:</h6>
		</div>
			<div class="col-md-8 mb-3">
			<input class="form-control" name="qualification" list="qualify" value="All">
	<datalist id="qualify">
	<option value="All">All</option>
	
	@foreach($qu as $p)
		<option value="{{ $p->qualification }}">{{ $p->qualification }}</option>
	@endforeach
	@foreach($l as $le)
		<option value="{{ $le->level }}">{{ $le->level }}</option>
	@endforeach
    </datalist>
					
			</div>
	</div>
	</div> 
	
	
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
            <a href="{{ url('professional_report') }}">
			<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Add New Record">
				 <span data-feather="filter"></span> Filter Report</button></a>
				 
			<form action="export_excel" method="POST">
					@csrf	 
           
		    @foreach ($report as $ps)
		   <input type="text" name="emp" value="{{ $ps->employee_no }}" hidden>
		   <input type="text" name="qualify" value="{{ $qualify }}" hidden>
		   @endforeach
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
		<h3>Professional/Vocational Qualifications</h3>
	</div>
		<div class="py-4 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-5 mb-3 ">
		<h6>Report filtered on qualification: {{ $qualify ??'' }}</h6>
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
              <th>Employee</th>
              <th>Full Name</th>
              <th>Qualification</th>
              <th>Level</th>
              <th>Insitution Attended</th>
              <th>Year Obtained</th>
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
              <td>{{ $p->qualification }}</td>    
			  <td>{{ $p->level }}</td>                   
			  <td>{{ $p->institution }}</td>                   
			  <td>{{ $p->year }}</td>                   
                 
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