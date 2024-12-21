<!DOCTYPE html>
<html>
<head>
  
    <title>Job Portal</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="{{asset('assets1/css/mainnodatatable.css?v=1.1')}}" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="{{asset('assets1/css/main.css?v=1.1')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css" />
    


  </head>
<body>
@include('Employer.sidebar')

<main class="main-wrap">
      <header class="main-header navbar">
        <div class="col-search"></div>
        <div class="col-nav">
          <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside">
            <i class="material-icons md-apps"></i>
          </button>
          <ul class="nav">
            <li class="dropdown nav-item">
              <!--<a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"><img class="img-xs rounded-circle" src="{{asset('assets1/imgs/people/avatar-2.png')}}" alt="User" /></a>-->
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                <a class="dropdown-item" href="page-settings-1.html">
                  <i class="material-icons md-perm_identity"></i>Edit Profile </a>
                <a class="dropdown-item" href="#">
                  <i class="material-icons md-settings"></i>Account Settings </a>
                <a class="dropdown-item" href="#">
                  <i class="material-icons md-account_balance_wallet"></i>Wallet </a>
                <a class="dropdown-item" href="#">
                  <i class="material-icons md-receipt"></i>Billing </a>
                <a class="dropdown-item" href="#">
                  <i class="material-icons md-help_outline"></i>Help center </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="#">
                  <i class="material-icons md-exit_to_app"></i>Logout </a>
              </div>
            </li>
          </ul>
        </div>
      </header>
     <br>

<div class="container">
      <?php
        $type = ["All", 'Active', 'Inactive'];
      ?>
     
    <br>
  </div>
</div>


     <!-- table start -->
     <div id="tag_container">
@include('Employer.jobsapplicants')
</div>

     <!-- end of table -->
    </main>
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Job Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span onclick="removedata()" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Role : <p id="role"></p>
        <br>
        Description: <p id="description"></p>
        <br>

        Languages: <p id="languages"></p>
        <br>
        
        Experience: <p id="experience"></p>
        <br>
        Level:<p id="level"></p>
        <br>
        Location: <p id="location"></p>
        <br>
        Mode: <p id="mode"></p>
        <br>
        ClientName: <p id="clientname"></p>
        <br>
        Duration: <p id="duration"></p>
        <br> 
        Start Date: <p id="date"></p>
        <br>
        Salary: <p id="salary"></p>
        <br>
        Contact Email: <p id="email"></p>
        <br>
        Recuriter Name: <p id="recuriter"></p>
        <br>
        Post Created Date: <p id="cdate"></p>

      </div>
      <div class="modal-footer">
        <button type="button" onclick="removedata()" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
   
</body>
<script src="{{asset('assets1/js/vendors/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets1/js/vendors/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets1/js/vendors/select2.min.js')}}"></script>
<script src="{{asset('assets1/js/vendors/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets1/js/vendors/jquery.fullscreen.min.js')}}"></script>
<script src="{{asset('assets1/js/vendors/chart.js')}}"></script>
<script src="{{asset('assets1/js/main.js?v=1.1')}}" type="text/javascript"></script>
<script src="{{asset('assets1/js/custom-chart.js')}}" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> -->



</html>