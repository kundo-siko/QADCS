<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Academic Qualifications')



@section('content')
   <div class="container"> 
  
    <div class="py-5 text-LEFT">
    <div class="py-5 text-center border-bottom">
	
			 @if( $x  == Null) <h2>ACADEMIC QUALIFICATIONS</h2> @endif
			 @if( $x  != Null) <h2>EDIT ACADEMIC QUALIFICATIONS</h2> @endif
	</div>
   			
    <p class="lead">Please click where applicable and add associated documents in PDF. @if( $x  != Null) If documents where uploaded earlier, do not uploead them again @endif </p>
  </div>
  
 @if( $x  == Null) <form action="/academic"  method="POST" enctype="multipart/form-data">  @endif
 @if( $x  != Null) <form action="/postedit_academic"  method="POST" enctype="multipart/form-data">  @endif
	@csrf
	
	 <!-- Error Check -->
	<div class="col-md-12 order-md-1">
		@if(count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
	</div>
		
		<!-- Success Check -->
	<div class="col-md-12 order-md-1">
		@if(\Session::has('success'))
			<div class="alert alert-success">
				<p>{{ \Session::get('success') }}</p>
			</div>
			@endif
	</div>
	
  <div class="row"> 
  
	<!-- Grade 9 input -->
		<div class="col-md-12 mb-3">
			<div class="row">
				<div class="col-md-2 mb-3">
					<h6>GRADE 9/FORM ll:</h6>
				</div>
				<div class="col-md-2 mb-3">
					<div class="custom-control">
						<input id="grade9" name="grade9" type="checkbox" value="Yes" @if( $x  != Null) @if( $u[0]->grade9  == 'Yes') checked @endif @endif >
					
					<input type="text" class="form-control" name="employee_no" id="employee_no"  @if( $x  == Null) value="{{ Auth::user()->employee_no }}" @endif @if( $x  != Null) value="{{ $u[0]->employee_no ??'' }}" @endif hidden> 
					@if( $x  != Null) <input type="text" class="form-control" name="id" id="id"  value="{{ $u[0]->id ??'' }}" hidden> @endif
					</div>									  
				</div>						
				<div class="col-md-8 mb-3">
					<div class="custom-control">
						<input type="file" class="form-control" name="grade9_pdf" id="grade9_pdf" onchange="readURL(this);">
					</div>
					@if( $x  != Null) @if( $u[0]->grade9_PDF != Null) <p>*A document was previously uploaded.</p> @endif @endif
				</div>	
			</div>
		</div>			
			
    <!-- Grade 12 input -->  
		<div class="col-md-12 mb-3 border-bottom">
			<div class="row">
				<div class="col-md-2 mb-3">
					<h6>GRADE 12:</h6>
				</div>
				<div class="col-md-2 mb-3">						
					<div class="custom-control custom-radio ">
						<input id="grade12" name="grade12" type="checkbox" value="Yes" @if( $x  != Null) @if( $u[0]->grade12  == 'Yes') checked @endif @endif>
					</div>		  		  
				</div>	
				<div class="col-md-8 mb-3">						
					<div class="custom-control">
						<input type="file" class="form-control" name="grade12_pdf" id="grade12_pdf" onchange="readURL(this);">
					</div>	
					@if( $x  != Null) @if( $u[0]->grade12_PDF != Null) <p>*A document was previously uploaded.</p> @endif @endif					
				</div>
			</div>
		</div>
		
	<!-- Other type of qualification input -->	
		<div class="col-md-12 mb-3">
			<div class="row">
				<div class="col-md-2 mb-3">
					<h6>Other:</h6>
				</div>
				<div class="col-md-2 mb-3">
					<div class="row">
						<div class="col-md-5 mb-3">			 
							<div class="custom-control custom-radio">
								<input id="other" name="other" type="checkbox" value="Yes" @if( $x  != Null) @if( $u[0]->other  == 'Yes') checked @endif @endif>
							</div>		  
						</div>
					</div>		  
				</div>	
				<!-- Specify other input -->	
				<div class="col-md-8 mb-3">
					<div class="row">
						<div class="col-md-2 mb-3">
							<h6>SPECIFY:</h6>
						</div>
						<div class="col-md-10 mb-3">
							<input type="text" class="form-control" id="specify" name="specify" @if( $x  == Null) placeholder="" @endif
								@if( $x  != Null) value="{{ $u[0]->specify ??'' }}" @endif >
								<div class="invalid-feedback">
									Valid qualification is required.
								</div>
						</div>
					</div>
				</div>				
			</div>
		</div>	
		<!-- Other pdf input -->	
		<div class="col-md-12 mb-3">
			<div class="row">
				<div class="col-md-4 mb-3">
					<!-- Spacing for pdf input -->				
				</div>
				<div class="col-md-8 mb-3">
					<div class="custom-control">
						<input type="file" class="form-control" name="other_pdf" id="other_pdf">
					</div>
				@if( $x  != Null) @if( $u[0]->other_PDF != Null) <p>*A document was previously uploaded.</p> @endif @endif					
				</div>
			</div>			
        </div>	
	 
  </div>
  <hr class="mb-4">
	 <button type="submit" class="btn btn-sm btn-outline-primary">submit
	  </button>
	<hr class="mb-4">
	
	</form>
  </div>
    
	
@endsection