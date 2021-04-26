@extends('layouts.login_layout')

@section('content')

 <div class="container"> 
	<h1 class="h3 mb-3 font-weight-normal">Qualification Data Audit Collection System</h1>
 	
 <form class="form-signin" action="{{ url('login') }}" method="post">
	@CSRF
	
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
			<div class="alert alert-danger">
				<p>{{ \Session::get('success') }}</p>
			</div>
			@endif

  <!-- <img class="mb-4" src="../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
	   
		<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
	<div class="form-group row">
		<div class="col-md-12">
			<label for="inputEmail" class="sr-only">Employee Number</label>
			<input type="text" class="form-control" id="inputEmployee" name="employee_no" class="form-control" placeholder="Employee Number" required autofocus>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-md-12">
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" class="form-control" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
		</div>
	</div>
			<!-- <div class="checkbox mb-3">
			<label>
			  <input type="checkbox" value="remember-me"> Remember me
			</label>
			</div> -->
	<div class="form-group row">
		<div class="col-md-12">
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		</div>
	</div>
	  
		<p class="mt-5 mb-3 text-muted">&copy; 2020 - QADCS</p>
		</form>


</div>
@endsection
