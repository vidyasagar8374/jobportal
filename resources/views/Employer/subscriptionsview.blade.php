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
    <link href="css/plugins.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="css/style.css" rel="stylesheet">
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
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
      <div class="container col-md-12">
      <h3 class="section-title mb-0">Payments<br> <img src="images/title-border.png" alt=""></h3>
            <div class="row">
               <div class="col-sm-12 col-md-6 col-lg-3">
                  <div class="price-box">
                     <div class="plan">Ronze</div>
                     <div class="head">
                        <h4>$50</h4>
                        <p>365 Days</p>
                     </div>
                     <ul class="services-list mt-2">
                        <li>1 User Included</li>
						<br><br>
                     </ul>
                     <button onclick="paynow(1)" class="btn mt-3">Subscribe</button>
                  </div>
               </div>
               <div class="col-sm-12 col-md-6 col-lg-3">
                  <div class="price-box">
                     <div class="plan">Silver</div>
                     <div class="head">
                        <h4>$100</h4>
                        <p>365 Days</p>
                     </div>
                     <ul class="services-list mt-2">
                        <li>2 User Included</li>
                        <li>10$ Save</li>
                     </ul>
                     <button onclick="paynow(2)" class="btn mt-3">Subscribe</button>
                  </div>
               </div>
               <div class="col-sm-12 col-md-6 col-lg-3">
                  <div class="price-box">
                     <div class="plan">Gold</div>
                     <div class="head">
                        <h4>$300</h4>
                        <p>365 Days</p>
                     </div>
                     <ul class="services-list mt-2">
                        <li>5 Users Included</li>
                        <li>50$ Save</li>
                     </ul>
                     <button onclick="paynow(3)" class="btn mt-3">Sign Up</button>
                  </div>
               </div>
               <div class="col-sm-12 col-md-6 col-lg-3">
                  <div class="price-box">
                     <div class="plan">Diamond</div>
                     <div class="head">
                        <h4>$500</h4>
                        <p>365 Days</p>
                     </div>
                     <ul class="services-list mt-2">
                        <li>10 Users Included</li>
                        <li>150$ Save</li>
                     </ul>
                     <button onclick="paynow(4)" class="btn mt-3">Sign Up</button>
                  </div>
               </div>			   
            </div>
</div>
    </main>
   
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
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

</html>