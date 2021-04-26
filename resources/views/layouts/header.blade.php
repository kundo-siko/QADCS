<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>QADCS</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
	<!-- <link href="{ asset('css/modal.css') }}" rel="stylesheet"> -->
<link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
	  
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('dashboard.css') }}" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{ url('home') }}">QADCS</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
  
  <ul class="navbar-nav px-3">
	<li class="nav-item text-nowrap">	 
      <a class="nav-link" href="{{ url('logout') }}">Sign out <span data-feather="log-out"></span></a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-20">
        <ul class="nav flex-column">
          <li class="nav-item text-center border-bottom">
            <a class="nav-link" href="#">
              <span data-feather="user"></span>
              <strong>Employee #:</strong> {{ Auth::user()->employee_no }}<span class="sr-only">(current)</span>
            </a>
			@php
					$names = \App\employee::where('employee_no',Auth::user()->employee_no)
								->get();
					@endphp
				
			<span class="nav-link">{{ $names[0]->surname ??'' }} {{ $names[0]->other_names ??'' }}</span>
			<span class="nav-link">{{ Auth::user()->role }}</span>
          </li>
		  
		  <li class="nav-item">
            <a class="nav-link @php
			if(url()->current()=='http://127.0.0.1:8000/home'){ echo 'active';}
			@endphp
			" href="home">
              <span data-feather="home"></span> 
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
		  
		  
		  <!-- Admin Options -->
		  @if( Auth::user()->role == 'Admin')
		   <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted dropdown-btn">
          <span>Admin Actions</span>
			<a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="user"></span>
          </a>
        </h6>
		<div class="dropdown-container">
		<!-- Add New User -->
		 <li class="nav-item">
            <a class="nav-link
			@php
			if(url()->current()=='http://127.0.0.1:8000/add_user'){ echo 'active';}
			@endphp
			" href="{{ url('add_user') }}">
              <span data-feather="user-plus"></span>
              Add New User
            </a>
          </li>
		  
		  <!-- All New Users Table -->
		 <li class="nav-item">
            <a class="nav-link
			@php
			if(url()->current()=='http://127.0.0.1:8000/all_users'){ echo 'active';}
			@endphp
			" href="{{ url('all_users') }}">
              <span data-feather="users"></span>
              View All Users
            </a>
          </li>
		  
		
		  
		  <!-- View All Records -->
		  
		  <hr><small class=" d-flex justify-content-between align-items-right px-5 text-muted">View All Records</small>
		  
						<li class="nav-item">
							<a class="nav-link
							@php
							if(url()->current()=='http://127.0.0.1:8000/all_profiles'){ echo 'active';}
							@endphp "
							href="{{ url('all_profiles') }}">
							  <span data-feather="user"></span>
							  View All Profiles
							</a>
						  </li>

						  <li class="nav-item">
							<a class="nav-link
							@php
							if(url()->current()=='http://127.0.0.1:8000/all_academic'){ echo 'active';}
							@endphp "
							href="{{ url('all_academic') }}">
							  <span data-feather="list"></span>
							  View All Academic Records
							</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link
							@php
							if(url()->current()=='http://127.0.0.1:8000/all_professional'){ echo 'active';}
							@endphp "
							href="{{ url('all_professional') }}">
							  <span data-feather="grid"></span>
							  View All Professional Records
							</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link
							@php
							if(url()->current()=='http://127.0.0.1:8000/all_training'){ echo 'active';}
							@endphp "
							href="{{ url('all_training') }}">
							  <span data-feather="file-text"></span>
							  View All Current Training
							</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link
							@php
							if(url()->current()=='http://127.0.0.1:8000/all_employment'){ echo 'active';}
							@endphp "
							href="{{ url('all_employment') }}">
							  <span data-feather="folder"></span>
							  View Employment Record
							</a>
						  </li>
		  
		  <!-- View All Records End -->
		  
		   </div>
		<!-- Admin Options End-->
		@endif
		
		
		<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted dropdown-btn">
          <span>UPDATE RECORDS</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
		<div class="dropdown-container">
          <li class="nav-item">
            <a class="nav-link
			@php
			if(url()->current()=='http://127.0.0.1:8000/personal_update'){ echo 'active';}
			@endphp "
			href="{{ url('personal_update') }}">
              <span data-feather="user-plus"></span>
              Personal Profile
            </a>
          </li>
		 
          <li class="nav-item">
            <a class="nav-link
			@php
			if(url()->current()=='http://127.0.0.1:8000/academic_qualifications'){ echo 'active';}
			@endphp "
			href="{{ url('academic_qualifications') }}">
              <span data-feather="file-plus"></span>
              Academic Qualifications
            </a>
          </li>

		  <li class="nav-item">
            <a class="nav-link
			@php
			if(url()->current()=='http://127.0.0.1:8000/professional_qualifications'){ echo 'active';}
			@endphp "
			href="{{ url('professional_qualifications') }}">
              <span data-feather="file-text"></span>
              Professional/Vocational Qualifications
            </a>
          </li>
        
		<li class="nav-item">
            <a class="nav-link
			@php
			if(url()->current()=='http://127.0.0.1:8000/current_training'){ echo 'active';}
			@endphp "
			href="{{ url('current_training') }}">
              <span data-feather="activity"></span>
              Current Training
            </a>
          </li>
        
		<li class="nav-item">
            <a class="nav-link
			@php
			if(url()->current()=='http://127.0.0.1:8000/employment_record'){ echo 'active';}
			@endphp "
			href="{{ url('employment_record') }}">
              <span data-feather="folder-plus"></span>
              Employment Record
            </a>
          </li>   
		  </div>
		
		
		<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted dropdown-btn">
          <span>View Personal Records</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="View Records">
            <span data-feather="eye"></span>
          </a>
        </h6>
		<div class="dropdown-container">
		 <li class="nav-item">
            <a class="nav-link
			@php
			if(url()->current()=='http://127.0.0.1:8000/view_profile'){ echo 'active';}
			@endphp "
			href="{{ url('view_profile') }}">
              <span data-feather="user"></span>
              View Profile
            </a>
          </li>

		  <li class="nav-item">
            <a class="nav-link
			@php
			if(url()->current()=='http://127.0.0.1:8000/view_academic'){ echo 'active';}
			@endphp "
			href="{{ url('view_academic') }}">
              <span data-feather="list"></span>
              View Academic Records
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link
			@php
			if(url()->current()=='http://127.0.0.1:8000/view_professional'){ echo 'active';}
			@endphp "
			href="{{ url('view_professional') }}">
              <span data-feather="grid"></span>
              View Professional Records
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link
			@php
			if(url()->current()=='http://127.0.0.1:8000/view_training'){ echo 'active';}
			@endphp "
			href="{{ url('view_training') }}">
              <span data-feather="file-text"></span>
              View Current Training
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link
			@php
			if(url()->current()=='http://127.0.0.1:8000/view_employment'){ echo 'active';}
			@endphp "
			href="{{ url('view_employment') }}">
              <span data-feather="folder"></span>
              View Employment Record
            </a>
          </li>
		</div>
		
		

				  
       

		<!-- Admin Report Options -->
		  @if( Auth::user()->role == 'Admin')		
		<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted dropdown-btn">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="bar-chart-2"></span>
          </a>
        </h6>
		<div class="dropdown-container">
        		
				
		<li class="nav-item">
            <a class="nav-link
			@php
			if(url()->current()=='http://127.0.0.1:8000/professional_report'){ echo 'active';}
			@endphp "
			href="{{ url('professional_report') }}">
              <span data-feather="file-text"></span>
              Professional/Vocational Qualifications Report
            </a>
          </li>
		  
		  <li class="nav-item">
            <a class="nav-link
			@php
			if(url()->current()=='http://127.0.0.1:8000/training_report'){ echo 'active';}
			@endphp "
			href="{{ url('training_report') }}">
              <span data-feather="file-text"></span>
              Current Training Report
            </a>
          </li>
		  
		  <li class="nav-item">
            <a class="nav-link
			@php
			if(url()->current()=='http://127.0.0.1:8000/qualification_report'){ echo 'active';}
			@endphp "
			href="{{ url('qualification_report') }}">
              <span data-feather="file-text"></span>
              Qualifications Report
            </a>
          </li>

		  <li class="nav-item">
            <a class="nav-link
			@php
			if(url()->current()=='http://127.0.0.1:8000/employment_report'){ echo 'active';}
			@endphp "
			href="{{ url('employment_report') }}">
              <span data-feather="file-text"></span>
              Employment Report
            </a>
          </li>
		 		  
		   </div>
       
		@endif
		<!-- End Admin Options -->
		
		<!--  Contact  -->
		 @if( Auth::user()->role == 'Admin') 
		<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted dropdown-btn">         
		<span>Employee Contact</span>
		  <a class="d-flex align-items-center text-muted" href="#" aria-label="Contacts">
            <span data-feather="user"></span>
          </a>
        </h6>
		<div class="dropdown-container">
        		
				
		<li class="nav-item">
            <a class="nav-link
			@php
			if(url()->current()=='http://127.0.0.1:8000/new_contact'){ echo 'active';}
			@endphp "
			href="{{ url('new_contact') }}">
              <span data-feather="file-text"></span>
              Add New Contact
            </a>
          </li>
		  
		  <li class="nav-item">
            <a class="nav-link
			@php
			if(url()->current()=='http://127.0.0.1:8000/view_contact'){ echo 'active';}
			@endphp "
			href="{{ url('view_contact') }}">
              <span data-feather="file-text"></span>
              View Contact
            </a>
          </li>   
		 
		  </div>
		  @endif
		<!--  Contact  -->
		
		<!--  Reset Password  -->
		 
		<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted dropdown-btn">
         
		<a class="d-flex align-items-center text-muted" href="{{ url('Reset_Password') }}">
		 <span>Reset Password</span></a>
          <a class="d-flex align-items-center text-muted" @php
			if(url()->current()=='http://127.0.0.1:8000/Reset_Password'){ echo 'active';}
			@endphp
			" href="{{ url('Reset_Password') }}" aria-label="Add a new report">
            <span data-feather="edit"></span>
          </a>
        </h6>
		<!--  Reset Password  -->
		
		
		 </ul>	  
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
 	  
			@yield('content')
			
		</main>
		
  </div>
  
  
  
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="{{ asset('dashboard.js') }}"></script>
     
<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
	 </script>
	   @include('Lists.script')
		</body>
</html>
