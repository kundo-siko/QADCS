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
		
		</div>	
			
      <div class="py-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">All Users</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{ url('add_user') }}"><button type="button" class="btn btn-sm btn-outline-secondary">
			 <span data-feather="plus"></span>  Add</button></a>
           <!--  <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> --> 
          </div>
         <!--  <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span> 
            This week
          </button> -->
        </div>
      </div>
	  
	   <div class="card" style="width: 65rem;">
  <div class="card-header">
  Added Users	
		
	</div>
		
  <div class="card-body">
  <div class="card-title">
      <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Type Employee Number" title="Search" style="width: 20rem;">
</div>     
	 <div class="table-responsive">
        <table class="table table-sm" id="myTable">
          <thead>
            <tr>
              <th>Employee Number</th>
              <th>Role</th>
              <th>Status</th>
              <th>Date Added</th>
              <th>Date Updated</th>
              <th><th>
              <th></th>
            </tr>
          </thead>
		  @foreach ($users as $u)
          <tbody class="table-striped table-sm">
            <tr>
              <td>{{ $u->employee_no }}</td>             
              <td>{{ $u->role }}</td>             
              <td>{{ $u->status }}</td>             
              <td>{{ $u->created_at }}</td>             
              <td>{{ $u->updated_at }}</td>             
              <td>
					<form action="/editUser" method="POST">
						@csrf
				<button type="submit" class="btn btn-sm btn-warning">
				 <span data-feather="edit"></span>  Edit</button>
				<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $u->employee_no }}" hidden>
				<input type="text" class="form-control" name="id" id="employeeNO"  value="{{ $u->id }}" hidden>
					</form>		
			  </td>             
              <td>	
	@if(($u->status) != 'Removed' )			  
					<!-- Remove Modal -->
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myBtn_{{ $u->id }}">
					   <span data-feather="trash-2"></span>  Remove
					</button>
					<!-- Modal -->
					<div class="modal fade" id="myBtn_{{ $u->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Remove User {{ $u->employee_no }}'s privileges</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
						  <p>Perfoming this action will remove privileges that allow <strong>{{ $u->employee_no }}</strong> access the sytem.</p>
						  <p>Do you still want to proceed?</p>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">No, Cancel</button>
								<form action="/remove_user" method="POST">
								@csrf
									<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $u->employee_no }}" hidden>
									<input type="text" class="form-control" name="id" id="employeeNO"  value="{{ $u->id }}" hidden>						
								<button type="submit" class="btn btn-success">Yes, Save changes</button>
								</form>	
						  </div>
						</div>
					  </div>
					</div>						
				<!-- End Remove Modal -->	
		@else	
				<!-- Return Modal -->
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myBtn_{{ $u->id }}">
					   <span data-feather="unlock"></span>  Return
					</button>
					<!-- Modal -->
					<div class="modal fade" id="myBtn_{{ $u->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Return User {{ $u->employee_no }}'s privileges</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
						  <p>Perfoming this action will return privileges that allow <strong>{{ $u->employee_no }}</strong> access the sytem.</p>
						  <p>Do you still want to proceed?</p>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">No, Cancel</button>
								<form action="/return_user" method="POST">
								@csrf
									<input type="text" class="form-control" name="employee_no" id="employeeNO"  value="{{ $u->employee_no }}" hidden>
									<input type="text" class="form-control" name="id" id="employeeNO"  value="{{ $u->id }}" hidden>						
								<button type="submit" class="btn btn-success">Yes, Save changes</button>
								</form>	
						  </div>
						</div>
					  </div>
					</div>						
				<!-- End Return Modal -->	
			 @endif 
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
    td = tr[i].getElementsByTagName("td")[0];
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
      </div>
	  <div class="py-3 container">
	  {{ $users->links()??'' }}
      </div>
      </div>
    <hr>
	
	
</div>	
@endsection