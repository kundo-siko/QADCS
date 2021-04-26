<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Page Title')



@section('content')
 <div class="container"> 
    <div class="py-3 container"> 
	<!-- Error Check -->
		@if(count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
	
		<!-- Success Check -->
		@if(\Session::has('success'))
			<div class="alert alert-success">
				<p>{{ \Session::get('success') }}</p>
			</div>
			@endif
			
		<!-- Danger Check -->
		@if(\Session::has('danger'))
			<div class="alert alert-danger">
				<p>{{ \Session::get('danger') }}</p>
			</div>
			@endif
	</div>	
		
		
			
      <div class="py-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Professional/Vocational Qualifications</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{ url('professional_qualifications') }}">
			<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Add New Record">
				 <span data-feather="plus"></span> Add</button></a>
           <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
          </div>
          <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button> -->
        </div>
      </div>
	  @php
		$count = $p->count();
		$x = 1;
	  @endphp
	  <h5>Qualifications attained</h5>
	  <p>Records Found: {{ $count }}</p>
	  
       <div class="card" style="width: 70rem;">
  <div class="card-header">
   Professional/Vocational Qualifications for {{ $p[0]->employee_no ??'' }} 			
  </div>
		
  <div class="card-body">
	   
      <div class="table-responsive">
        <table class="table table-sm">
          <thead>
            <tr>
              <th>S/N</th>
              <th>Qualification</th>
              <th>Level Of Study</th>
              <th>Institution Attended</th>
              <th>Year Obtained</th>
              <th>Document</th>
              <th><th>
              <th></th>
            </tr>
          </thead>
		  @foreach ($p as $pr)
          <tbody class="table-striped table-sm">
            <tr>
              <td>{{ $x++ }}</td>             
              <td>{{ $pr->qualification }}</td>             
              <td>{{ $pr->level }}</td>             
              <td>{{ $pr->institution }}</td>             
              <td>{{ $pr->year }}</td>                   
              <td>
				@if(($pr->document) != 'Not Added' || ($pr->document) != null )
				<form action="/download_professional"  method="POST"> 
					@csrf
					<input type="text" class="form-control" name="id" id="id"  value="{{ $pr->id ??'' }}" hidden> 	 		
					<button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Download this document">Download</button>
					</form>
				@endif
				@if(($pr->document) == 'Not Added' || ($pr->document) == null)
					<button type="submit" class="btn btn-sm btn-danger">Not Provided</button>
				@endif	
				
			  </td>                   
              <td>
					<form action="/edit_professional" method="POST">
						@csrf
				<button type="submit" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit this record">
				 <span data-feather="edit"></span>  Edit</button>
				<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $pr->employee_no }}" hidden>
				<input type="text" class="form-control" name="id" id="id"  value="{{ $pr->id }}" hidden>
					</form>		
			  </td>      
            </tr>
          </tbody>
		  @endforeach
		  
		 
		  
        </table>
      </div>
	  <!-- Pagination -->
	   <div class="py-3 container">
	  {{ $p->withQueryString()->links()??'' }}
      </div>
	   <!-- Pagination End -->
      </div>
      </div>
      
</div>	



@endsection