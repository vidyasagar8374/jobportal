<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>DesignAlley Dashboard</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets1/imgs/theme/fav-da.png" />
        <!-- Template CSS -->
        <!-- <link href="assets1/css/main.css?v=1.1" rel="stylesheet" type="text/css" /> -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link href="{{asset('assets1/css/mainnodatatable.css?v=1.1')}}" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div class="screen-overlay"></div>
        @include('Employer.sidebar') 
        <main class="main-wrap">
            <header class="main-header navbar">
                <div class="col-search">
                    <form class="searchform">
                        <div class="input-group">
                            <!--<input list="search_terms" type="text" class="form-control" placeholder="Search term" />-->
                            <!--<button class="btn btn-light bg" type="button"><i class="material-icons md-search"></i></button>-->
                        </div>
                        <datalist id="search_terms">
                            <option value="Products"></option>
                            <option value="New orders"></option>
                            <option value="Apple iphone"></option>
                            <option value="Ahmed Hassan"></option>
                        </datalist>
                    </form>
                </div>
                <div class="col-nav">
                    <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"><i class="material-icons md-apps"></i></button>
                    <ul class="nav">
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link btn-icon" href="#">-->
                        <!--        <i class="material-icons md-notifications animation-shake"></i>-->
                        <!--        <span class="badge rounded-pill">3</span>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <!--   <li class="nav-item">-->
                        <!--    <a class="nav-link btn-icon darkmode" href="#"> <i class="material-icons md-nights_stay"></i> </a>-->
                        <!--</li>-->
                        <!--<li class="nav-item">-->
                        <!--    <a href="#" class="requestfullscreen nav-link btn-icon"><i class="material-icons md-cast"></i></a>-->
                        <!--</li>-->
                        <!--  <li class="dropdown nav-item">-->
                        <!--    <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownLanguage" aria-expanded="false"><i class="material-icons md-public"></i></a>-->
                        <!--    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLanguage">-->
                        <!--        <a class="dropdown-item text-brand" href="#"><img src="assets1/imgs/theme/flag-us.png" alt="English" />English</a>-->
                        <!--        <a class="dropdown-item" href="#"><img src="assets1/imgs/theme/flag-fr.png" alt="Français" />Français</a>-->
                        <!--        <a class="dropdown-item" href="#"><img src="assets1/imgs/theme/flag-jp.png" alt="Français" />日本語</a>-->
                        <!--        <a class="dropdown-item" href="#"><img src="assets1/imgs/theme/flag-cn.png" alt="Français" />中国人</a>-->
                        <!--    </div>-->
                        <!--</li> -->
                        <!--<li class="dropdown nav-item">-->
                        <!--    <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="assets1/imgs/people/avatar-2.png" alt="User" /></a>-->
                        <!--    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">-->
                        <!--        <a class="dropdown-item" href="page-settings-1.html"><i class="material-icons md-perm_identity"></i>Edit Profile</a>-->
                        <!--        <a class="dropdown-item" href="#"><i class="material-icons md-settings"></i>Account Settings</a>-->
                        <!--        <a class="dropdown-item" href="#"><i class="material-icons md-account_balance_wallet"></i>Wallet</a>-->
                        <!--        <a class="dropdown-item" href="#"><i class="material-icons md-receipt"></i>Billing</a>-->
                        <!--        <a class="dropdown-item" href="#"><i class="material-icons md-help_outline"></i>Help center</a>-->
                        <!--        <div class="dropdown-divider"></div>-->
                        <!--        <a class="dropdown-item text-danger" href="#"><i class="material-icons md-exit_to_app"></i>Logout</a>-->
                        <!--    </div>-->
                        <!--</li>-->
                    </ul>
                </div>
            </header>
            <section class="content-main">
               @foreach($jobPosts as $jobpost)
            <div style="background-color:white;" class="card text-center">
  <div class="card-header">
    {{$jobpost->role}}
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$jobpost->description}}</h5>
    <p class="card-text">Expericence Required : {{$jobpost->experience}}.</p>
    <p class="card-text">Job Location  : {{$jobpost->location}}.</p>
    <p class="card-text">Salary  : {{$jobpost->Salary}}.</p>
    <a onclick="ApplyJob('{{$jobpost->id}}')" class="btn btn-primary">Apply</a>
  </div>
  <div class="card-footer text-muted">
    {{$jobpost->created_at}}
  </div>
</div>
@endforeach 


                <!-- card end// -->
            </section>
            <!-- content-main end// -->
            <footer class="main-footer font-xs">
                <div class="row pb-30 pt-15">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        &copy; DesignAlley . All Right Reserved
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end">All rights reserved</div>
                    </div>
                </div>
            </footer>
        </main>
        <script src="assets1/js/vendors/jquery-3.6.0.min.js"></script>
        <script src="assets1/js/vendors/bootstrap.bundle.min.js"></script>
        <script src="assets1/js/vendors/select2.min.js"></script>
        <script src="assets1/js/vendors/perfect-scrollbar.js"></script>
        <script src="assets1/js/vendors/jquery.fullscreen.min.js"></script>
        <!-- Main Script -->
        <script src="assets1/js/main.js?v=1.1" type="text/javascript"></script>
    </body>
</html>
<script>
    function editprofile()
    {
        var companyname = $('#companyname').val();
        var mobile = $('#mobile').val();
        var companymail = $('#companymail').val();
        var companycity = $('#companycity').val();
        var companystate = $('#companystate').val();
        var companynumber = $('#companynumber').val();
        var companywebsite = $('#companywebsite').val();
        $.ajax({
            method : 'POST',
            url : 'editprofile',
            data: {
                '_token' : '{{ csrf_token() }}',
                'companyname' : companyname,
                'mobile' : mobile,
                'companymail' : companymail,
                'companycity' : companycity,
                'companystate' : companystate,
                'companynumber' : companynumber,
                'companywebsite' : companywebsite
            },
            success: function(data)
            {
                if(data.status == 1 && data.success == true)
                {
                    swal({
                        title: "Profile Updated Sucessfully",
                        text: "Success",
                        icon: "success",
                        button: "Ok",
                        timer: 3000
                    });
                }else{
                    swal({
                        title: "Some Thing Went Wrong!",
                        text: "error",
                        icon: "error",
                        button: "Ok",
                        timer: 4000
                    });
                }
            },
            error: function(data)
            {
                swal({
                    title: "Some Thing Went Wrong!",
                    text: "error",
                    icon: "error",
                    button: "Ok",
                    timer: 4000
                });
            }
        })
    }
    function ApplyJob(id)
    {
        $.ajax({
            method : 'POST',
            url : 'ApplyJob',
            data: {
                '_token' : '{{ csrf_token() }}',
                'jobid' : id
            },
            success: function(data)
            {

            },
            error: function(data)
            {

            }
        })
    }
    </script>
