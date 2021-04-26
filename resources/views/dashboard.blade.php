<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.header')

@section('title', 'Page Title')



@section('content')
<div class="container"> 

 <div class="container">
  <div class="jumbotron mt-3">
	<h1 class="border-bottom">@if(Auth::user()->status == 'Pending') Welcome! to the @endif Qualification Audit Data Collection System.</h1> 
    @php
					$names = \App\employee::where('employee_no',Auth::user()->employee_no)
								->get();
					@endphp
		<h4><em>{{ Auth::user()->employee_no }}</em></h4> 
		<h6>{{ $names[0]->surname ??'' }} {{ $names[0]->other_names ??'' }}</h6> 
		<h6>{{ Auth::user()->role }}</h6> 
		<hr class="mb-3">
		
  </div>
</div>
<p>The system that will eneble you to update and view your personal, qualification and employment details related to your public service.</p> 
	<div class="text-LEFT">
	 <!-- Admin Options -->
		  @if( Auth::user()->role == 'Admin')	 
			<p>As an Admin, you are able to add a new user & control thier privileges</p>	
	<!-- Admin Options End-->
		@endif
	</div>

	 <!-- Admin Options -->
			  @if( Auth::user()->role == 'Admin')	
	<div class="row">
	  <div class="col-sm-6">
		<div class="card">
		  <div class="card-body">
			<h5 class="card-title">Add a new user  <span data-feather="user-plus"></span></h5>
				<p>Add a user to the system, and give them privileges</p>
			<a  href="{{ url('add_user') }}"" class="btn btn-primary">Click Here</a>
		  </div>
		</div>
	  </div>
	  
	  <div class="col-sm-6">
		<div class="card">
		  <div class="card-body">
			<h5 class="card-title">View all existing users <span data-feather="users"></span></h5>
				<p>See all current users of the system</p>
			<a  href="{{ url('all_users') }}"" class="btn btn-primary">Click Here</a>
		  </div>
		</div>
	  </div> 
	</div>

	 <hr class="mb-4">
	 <!-- Admin Options End-->
		@endif
		
		
	<div class="py-3 text-LEFT">		 
		<p>Keep all your personal records updated</p>	
	</div>
	
	 <!-- General Employee Upload End -->
	 <div class="row">  
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
		<p>Use the following links to update your personal records</p>	
  <div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-uprofile-tab" data-toggle="pill" href="#v-pills-uprofile" role="tab" aria-controls="v-pills-uprofile" aria-selected="true">Personal Profile</a>
      <a class="nav-link" id="v-pills-uacademic-tab" data-toggle="pill" href="#v-pills-uacademic" role="tab" aria-controls="v-pills-uacademic" aria-selected="false">Academic Qualifications</a>
      <a class="nav-link" id="v-pills-uprofessional-tab" data-toggle="pill" href="#v-pills-uprofessional" role="tab" aria-controls="v-pills-uprofessional" aria-selected="false">Professional/Vocational Qualifications</a>
      <a class="nav-link" id="v-pills-utraining-tab" data-toggle="pill" href="#v-pills-utraining" role="tab" aria-controls="v-pills-utraining" aria-selected="false">Current Training</a>
      <a class="nav-link" id="v-pills-uemployment-tab" data-toggle="pill" href="#v-pills-uemployment" role="tab" aria-controls="v-pills-uemployment" aria-selected="false">Employment Record</a>
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-uprofile" role="tabpanel" aria-labelledby="v-pills-uprofile-tab">
				 <div class="row">
				<div class="py-3 text-LEFT">	
					<h5 class="card-title">Personal Profiles	<span data-feather="user-plus"></span></h5>
						<p>Your personal profile includes personal details and information that distinguishes you from other employees</p>
						<p>Update your personal information</p>
						<a  href="{{ url('personal_update') }}"" class="btn btn-primary">Click Here</a>
				</div>
				</div>
	  </div>
      <div class="tab-pane fade" id="v-pills-uacademic" role="tabpanel" aria-labelledby="v-pills-uacademic-tab">
				<div class="py-3 text-LEFT">	
					<h5 class="card-title">Academic Record	<span data-feather="file-plus"></span></h5>	
						<p>Your academic record will include the academic qualifications you have attained. Certificates must be included, & should be uploaded only in PDF</p>
						<p>Update your academic qualifications</p>
						<a  href="{{ url('academic_qualifications') }}"" class="btn btn-primary">Click Here</a>
				</div>
	  </div>
      <div class="tab-pane fade" id="v-pills-uprofessional" role="tabpanel" aria-labelledby="v-pills-uprofessional-tab">
				<div class="py-3 text-LEFT">	
					<h5 class="card-title">Professional/Vocational Qualifications Records	<span data-feather="file-text"></span></h5>	
						<p>These records will include the professeional/vocational qualifications you have attained. Certificates must be included, & should be uploaded only in PDF</p>
						<p>Update your professeional/vocational qualifications</p>
						<a  href="{{ url('professional_qualifications') }}"" class="btn btn-primary">Click Here</a>
				</div>
	  </div>
      <div class="tab-pane fade" id="v-pills-utraining" role="tabpanel" aria-labelledby="v-pills-utraining-tab">
				<div class="py-3 text-LEFT">	
					<h5 class="card-title">Current Training Records	<span data-feather="activity"></span></h5>	
						<p>If you are undertaking any current training, you are requireed to update these records</p>
						<p>Update any current training you're undertaking</p>
						<a  href="{{ url('current_training') }}"" class="btn btn-primary">Click Here</a>
				</div>
	  </div>
      <div class="tab-pane fade" id="v-pills-uemployment" role="tabpanel" aria-labelledby="v-pills-uemployment-tab">
			<div class="py-3 text-LEFT">	
					<h5 class="card-title">Employment Record	<span data-feather="folder-plus"></span></h5>	 
						<p>Your employment record includes details of your current employment in the public service</p>
						<p>Update your employment record</p>
						<a  href="{{ url('employment_record') }}"" class="btn btn-primary">Click Here</a>
				</div>
	  </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
  <!-- General Employee Upload End -->
	
	<!-- Admin Options -->
		  @if( Auth::user()->role == 'Admin')
			  
		  <div class="py-3 text-LEFT">		 
	<p>Your Admin status allows you to view & edit all system records</p>	
	</div>
		  
<div class="row">  
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
		<p>Use the following to perform actions on the records currently in the system</p>	
			   <ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item" role="presentation">
			<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All Profiles</a>
		  </li>
		  <li class="nav-item" role="presentation">
			<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">All Academic Records</a>
		  </li>
		  <li class="nav-item" role="presentation">
			<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">All Professional Records</a>
		  </li>
		  <li class="nav-item" role="presentation">
			<a class="nav-link" id="training-tab" data-toggle="tab" href="#training" role="tab" aria-controls="training" aria-selected="false">All Current Training</a>
		  </li>
		  <li class="nav-item" role="presentation">
			<a class="nav-link" id="employment-tab" data-toggle="tab" href="#employment" role="tab" aria-controls="employment" aria-selected="false">All Employment Records</a>
		  </li>
			</ul>
			<div class="tab-content" id="myTabContent">
			  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				<div class="py-3 text-LEFT">	
					<h5 class="card-title"> View All Profiles	<span data-feather="user"></span></h5>
						<p>View all employee profiles of current employees of the institution</p>
						<a  href="{{ url('all_profiles') }}"" class="btn btn-primary">Click Here</a>
				</div>
			  </div>
			  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				<div class="py-3 text-LEFT">	
					<h5 class="card-title"> View All Academic Records	<span data-feather="list"></span></h5>	 			
						<p>View academic qualification records of current employees of the institution</p>
						<a  href="{{ url('all_academic') }}"" class="btn btn-primary">Click Here</a>
				</div>
			  </div>
			  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
				<div class="py-3 text-LEFT">	
					<h5 class="card-title"> View All Professional Records	<span data-feather="grid"></span></h5>	 			
						<p>View professeional/vocational qualification records of current employees of the institution</p>
						<a  href="{{ url('all_professional') }}"" class="btn btn-primary">Click Here</a>
				</div>
			   </div>
			   <div class="tab-pane fade" id="training" role="tabpanel" aria-labelledby="training-tab">
				<div class="py-3 text-LEFT">	
					  <h5 class="card-title">  View All Current Training	<span data-feather="file-text"></span></h5>	 			
					<p>View all current training records of current employees of the institution</p>
					<a  href="{{ url('all_training') }}"" class="btn btn-primary">Click Here</a>
				</div>
			   </div>
			  <div class="tab-pane fade" id="employment" role="tabpanel" aria-labelledby="employment-tab">
			   <div class="py-3 text-LEFT">	
					<h5 class="card-title"> View Employment Records	<span data-feather="folder"></span></h5>	 			
						<p>View employmwnt records of current employees of the institution</p>
						<a  href="{{ url('all_employment') }}"" class="btn btn-primary">Click Here</a>
				</div>
			   </div>
			</div>
      </div>
    </div>
  </div> 
 </div>
	 
  <!-- Admin Options End-->
		@endif
		
  <!-- General Employee Options-->
  
  <div class="py-3 text-LEFT">		 
	<p>Review all your personal records easily</p>
	</div>
	
 <div class="row">  
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
		<p>Use the following to perform actions on your personal records</p>	
			   <ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item" role="presentation">
			<a class="nav-link active" id="personal-profile-tab" data-toggle="tab" href="#personal-profile" role="tab" aria-controls="personal-profile" aria-selected="true">Profile</a>
		  </li>
		  <li class="nav-item" role="presentation">
			<a class="nav-link" id="personal-academic-tab" data-toggle="tab" href="#personal-academic" role="tab" aria-controls="personal-academic" aria-selected="false">Academic Records</a>
		  </li>
		  <li class="nav-item" role="presentation">
			<a class="nav-link" id="personal-professional-tab" data-toggle="tab" href="#personal-professional" role="tab" aria-controls="personal-professional" aria-selected="false">Professional Records</a>
		  </li>
		  <li class="nav-item" role="presentation">
			<a class="nav-link" id="personal-training-tab" data-toggle="tab" href="#personal-training" role="tab" aria-controls="personal-training" aria-selected="false">Current Training</a>
		  </li>
		  <li class="nav-item" role="presentation">
			<a class="nav-link" id="personal-employment-tab" data-toggle="tab" href="#personal-employment" role="tab" aria-controls="personal-employment" aria-selected="false">Employment Record</a>
		  </li>
			</ul>
			<div class="tab-content" id="myTabContent">
			  <div class="tab-pane fade show active" id="personal-profile" role="tabpanel" aria-labelledby="personal-profile-tab">
				<div class="py-3 text-LEFT">	
					<h5 class="card-title"> View Profile	<span data-feather="list"></span></h5>	 			
						<p>Review your personal profile</p>
						<a  href="{{ url('view_profile') }}"" class="btn btn-primary">Click Here</a>
				</div>
			  </div>
			  <div class="tab-pane fade" id="personal-academic" role="tabpanel" aria-labelledby="personal-academic-tab">
				<div class="py-3 text-LEFT">	
					<h5 class="card-title"> View Academic Records	<span data-feather="list"></span></h5>	 			
						<p>Review your academic qualification records</p>
						<a  href="{{ url('view_academic') }}"" class="btn btn-primary">Click Here</a>
				</div>
			  </div>
			  <div class="tab-pane fade" id="personal-professional" role="tabpanel" aria-labelledby="personal-professional-tab">
				<div class="py-3 text-LEFT">	
					<h5 class="card-title"> View Professional Records	<span data-feather="grid"></span></h5>	 			
						<p>Review your professeional/vocational qualification records</p>
						<a  href="{{ url('view_professional') }}"" class="btn btn-primary">Click Here</a>
				</div>
			   </div>
			   <div class="tab-pane fade" id="personal-training" role="tabpanel" aria-labelledby="personal-training-tab">
				<div class="py-3 text-LEFT">	
					  <h5 class="card-title">  View Current Training	<span data-feather="file-text"></span></h5>	 			
					<p>Review your training records</p>
					<a  href="{{ url('view_training') }}"" class="btn btn-primary">Click Here</a>
				</div>
			   </div>
			  <div class="tab-pane fade" id="personal-employment" role="tabpanel" aria-labelledby="personal-employment-tab">
			   <div class="py-3 text-LEFT">	
					<h5 class="card-title"> View Employment Record <span data-feather="folder"></span></h5>	 			
						<p>Review your employment record</p>
						<a  href="{{ url('view_employment') }}"" class="btn btn-primary">Click Here</a>
				</div>
			   </div>
			</div>
      </div>
    </div>
  </div> 
 </div>
  
  <!-- General Employee Options End -->
  
  
 
  
  <hr class="mb-4">
</div>
	

 
     
	
@endsection