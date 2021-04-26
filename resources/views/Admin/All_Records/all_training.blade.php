<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Page Title')



@section('content')

 <div class="container">  
	 <div class="py-2 text-LEFT border-bottom">		
		<div class="py-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
			<h1 class="h2">All Employee Current Training Records</h1>
		</div>

	<p>Search for an employee by typing their employee number. Or type "All" to get the full records</p>
			
	</div>

	<form action="/filter_all_training"  method="POST">
	@csrf
 <div class="row py-5"> 

	<div class="col-md-8 mb-3">
	<div class="row">
        <div class="col-md-4 mb-3">
           <h6>Employee Number:</h6>
		</div>
			<div class="col-md-8 mb-3">
			<input type="text" class="form-control" name="employee_no" list="emp" id="ae_number" value="All" >
				<datalist id="emp">
      <option value="All">All</option>
	  @foreach($e as $e)
      <option value="{{ $e->employee_no }}">{{ $e->employee_no }}</option>
      @endforeach
    </datalist>
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
			</div>
	</div>
	</div>
	
	</div> 
	<hr class="mb-4">
	  <button type="submit" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Search Records">
	 <span data-feather="search"></span> Search
	  </button>
	<hr class="mb-4">
	</form>

</div> 
@endsection