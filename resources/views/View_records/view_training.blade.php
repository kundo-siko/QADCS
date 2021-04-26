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
        <h1 class="h2 ">Current Training</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{ url('current_training') }}">
			<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Add New Record">
				 <span data-feather="plus"></span> Add</button></a>
           <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
          </div>
         
        </div>
      </div>
	  
	  @php
		$count = $t->count();
		$x = 1;
	  @endphp
	   <h5>Training being undertaken</h5>
	  <p>Records Found: {{ $count }}</p>
	  
       <div class="card" style="width: 70rem;">
  <div class="card-header">
   Current Training for {{ $t[0]->employee_no ??'' }} 			
  </div>
		
  <div class="card-body">
	   <div class="card-title pull-right">
      <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Filter Status" title="Search" style="width: 20rem;">
</div>
      <div class="table-responsive">
        <table class="table table-sm" id="myTable">
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
              <th><th>
              <th></th>
            </tr>
          </thead>
		  @foreach ($t as $tr)
          <tbody class="table-striped table-sm">
            <tr>
              <td>{{ $x++ }}</td>               
              <td>{{ $tr->course }}</td>             
              <td>{{ $tr->stage }}</td>             
              <td>{{ $tr->qualification }}</td>             
              <td>{{ $tr->start }}</td>             
              <td>{{ $tr->finish }}</td>             
              <td>{{ $tr->institution }}</td>             
              <td>{{ $tr->sponsor }}</td>                          
              <td>
			  @if($tr->finish > (date("Y-m-d")))
					Ongoing 
				 @else
					Completed
				 @endif
			  </td>                          
              <td>
					<form action="/edit_training" method="POST">
						@csrf
				<button type="submit" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit this record">
				 <span data-feather="edit"></span>Edit</button>
				<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $tr->employee_no }}" hidden>
				<input type="text" class="form-control" name="id" id="id"  value="{{ $tr->id }}" hidden>
					</form>		
			  </td>        
            </tr>
          </tbody>
		  @endforeach
		  
		 
		  
        </table>
		
			<script>
			function myFunction() {
			  var input, filter, table, tr, td, i, txtValue;
			  input = document.getElementById("myInput");
			  filter = input.value.toUpperCase();
			  table = document.getElementById("myTable");
			  tr = table.getElementsByTagName("tr");
			  for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[8];
				if (td) {
				  txtValue = td.textContent || td.innerText;
				  if (txtValue.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				  } else {
					tr[i].style.display = "none";
				  }
				}       
			  }
			}
			</script>
		
      </div>
	  
			  <!-- Pagination -->
			   <div class="py-3 container">
			  {{ $t->links()??'' }}
			  </div>
			   <!-- Pagination End -->
	  
      </div>
      </div>
	  
</div>	
@endsection