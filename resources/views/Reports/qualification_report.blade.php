<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Page Title')



@section('content')

 <div class="container"> 
 @if( $x == '' )
	 <div class="py-2 text-LEFT">		
		<div class="py-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="h2">Qualifications Reports</h1>
		</div>		
	<p>Select a qualification for the records you want to generate, or select 'ALL' to get the full report</p>		
	</div>

	<form action="/generate_academic_report"  method="POST">
	@csrf
 <div class="row"> 

	 <div class="col-md-8 mb-3">
	<div class="row">
        <div class="col-md-4 mb-3">
           <h6>Qualification:</h6>
		</div>
			<div class="col-md-8 mb-3">
			<select class="form-control" name="qualification" placehoder="Choose">
     
      <option value="grade9">Grade 9</option>
      <option value="grade12">Grade 12</option>
      <option value="other">other</option>
    </select>
					
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
            <a href="{{ url('qualification_report') }}">
			<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Add New Record">
				 <span data-feather="filter"></span> Filter Report</button></a>
           <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
          <!-- Export to Excel -->
		   <form action="export_academic" method="POST">
					@csrf	           
		    <input type="text" name="q" value="{{ $q }}" hidden>
		   <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Export
			</button>
				<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
				  <a class="dropdown-item" href="#"><button type="submit" name="export" class="btn">Export to Exel</button></a>   
				</div> 		
		  </form> 
          <!-- Export to Excel End -->
		  </div>
        </div>
      </div>

		@if($report != '[]')
			<div class="py-2 text-center border-bottom">
		<h3>QUALIFICATIONS</h3>
	</div>
		<div class="py-4 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-5 mb-3 ">
		<h6>Qualifications attained</h6>
		</div>
			
		<div class="table-responsive">
        <table class="table table-sm">
          <thead>
            <tr>
              <th>S/N</th>
              <th>Employee</th>
              <th>Full Name</th>
              <th>Qualification</th>
              <th>Attained</th>
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
              <td>
				@php
				if('All' == $q){
							if($p->grade9 == 'Yes'){
						echo 'Attained Grade 9 Certificate'.'<br>';
							}
							if($p->grade12 == 'Yes'){
						echo 'Attained Grade 12 Certificate'.'<br>';
							}
							if($p->other == 'Yes'){
						echo 'Attained Other Certificate'.'<br>';
							}
				}elseif('grade9'  == $q){
					echo 'Attained Grade 9 Certificate';
				}elseif('grade12'  == $q){
					echo 'Attained Grade 12 Certificate';
				}elseif('other'  == $q){
					echo 'Attained Other Certificate';
				}
				@endphp
				</td>                   
				<td>
				@php
				if('other'  == $q || 'All' == $q && $p->specify != null){
					echo 'Other Certficate: <strong>'.$p->specify.'</strong>';
						}	else{
						echo $p->$q;	
						}
			@endphp						
				</td>                   
                 
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