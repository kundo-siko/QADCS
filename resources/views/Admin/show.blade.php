<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Page Title')



@section('content')
<form action="checkhash" method="POST">
			@csrf
   <div class="row">
			<div class="col-md-4 mb-3">
				<h6>EMPLOYEE NUMBER:</h6>
			</div>
			<div class="col-md-8 mb-3">
				<input type="text" class="form-control" name="plain" id="employeeNO" placeholder="Enter Employee Number" value="" required>
					<div class="invalid-feedback">
						Valid name is required.
					</div>
			</div>
			
			<hr class="mb-4">
	 <button type="submit" class="btn btn-sm btn-outline-primary">submit
	  </button>
	<hr class="mb-4">
	
	</form>	
        </div>	
    
	
@endsection