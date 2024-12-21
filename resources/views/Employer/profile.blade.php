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
                <div class="content-header">
                    <h2 class="content-title" style="color:#f23022">Profile</h2>
                </div>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="row gx-5">
                            <!-- <aside class="col-lg-3 border-end">
                                <nav class="nav nav-pills flex-lg-column mb-4">
                                    <a class="nav-link active" aria-current="page" href="#">General</a>
                                    <a class="nav-link" href="#">Moderators</a>
                                    <a class="nav-link" href="#">Admin account</a>
                                    <a class="nav-link" href="#">SEO settings</a>
                                    <a class="nav-link" href="#">Mail settings</a>
                                    <a class="nav-link" href="#">Newsletter</a>
                                </nav>
                            </aside> -->
                            <div class="col-lg-12">
                                <section class="content-body p-xl-4">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="row gx-3">
                                                    <div class="col-6 mb-3">
                                                        <label class="form-label">Name <span style="color:red">*</span></label>
                                                        <input value="{{$employerDetails->EmployerInfo->companyname ?? 'Not Avaliable'}}" id="companyname" class="form-control" type="text" name="name" placeholder="Type here" />
                                                    </div>
                                                    <!-- col .// -->
                                                    <div class="col-6 mb-3">
                                                        <!-- <label class="form-label">Last name</label>
                                                        <input class="form-control" type="text" placeholder="Type here" /> -->
                                                    </div>
                                                    <!-- col .// -->
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label">Email <span style="color:red">*</span></label>
                                                        <input class="form-control" type="email" readonly name="email" value="{{$employerDetails->email ?? 'Not Avaliable'}}" placeholder="example@mail.com" />
                                                    </div>
                                                    <!-- col .// -->
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label">Phone <span style="color:red">*</span></label>
                                                        <input class="form-control" type="tel" value="{{$employerDetails->EmployerInfo->number ?? 'Not Avaliable'}}" name="mobile" id="mobile" placeholder="+1234567890" />
                                                    </div>
                                                    <div class="col-lg-12 mb-3">
                                                        <label class="form-label">Email <span style="color:red">*</span></label>
                                                        <input class="form-control" name="address" value="{{$employerDetails->EmployerInfo->companyemail ?? 'Not Avaliable'}}" type="text" id="companymail" placeholder="Type here" />
                                                    </div>
                                                    <div class="col-lg-12 mb-3">
                                                        <label class="form-label">City</label>
                                                        <input class="form-control" name="address" value="{{$employerDetails->EmployerInfo->companycity ?? 'Not Avaliable'}}" type="text" id="companycity" placeholder="Type here" />
                                                    </div>
                                                    <!-- col .// -->
                                                    <div class="col-lg-12 mb-3">
                                                        <label class="form-label">State</label>
                                                        <input class="form-control" name="address" value="{{$employerDetails->EmployerInfo->companystate ?? 'Not Avaliable'}}" type="text"  id="companystate" placeholder="Type here" />
                                                    </div>


                                                    <div class="col-lg-12 mb-3">
                                                        <label class="form-label">Address</label>
                                                        <textarea class="form-control" name="address" type="text"  id="companystate" placeholder="Type here">{{$employerDetails->EmployerInfo->companyaddress ?? 'Not Avaliable'}}</textarea>
                                                    </div>


                                                    <!-- <div class="col-lg-12 mb-3">
                                                        <label class="form-label">Company Email</label>
                                                        <input class="form-control" name="address" value="asdasdasd" type="text" placeholder="Type here" />
                                                    </div> -->
                                                    <div class="col-lg-12 mb-3">
                                                        <label class="form-label">Number <span style="color:red">*</span></label>
                                                        <input class="form-control" name="address" value="{{$employerDetails->EmployerInfo->companynumber ?? 'Not Avaliable'}}" type="text" id="companynumber" placeholder="Type here" />
                                                    </div>
                                                    <div class="col-lg-12 mb-3">
                                                        <label class="form-label">Website <span style="color:red">*</span></label>
                                                        <input class="form-control" name="address" value="{{$employerDetails->EmployerInfo->companywebsite ?? 'Not Avaliable'}}" type="text" id="companywebsite" placeholder="Type here" />
                                                    </div>
                                                    <!-- col .// -->
                                                    
                                                    <!-- col .// -->
                                                </div>
                                                <!-- row.// -->
                                            </div>
                                            <!-- col.// -->
                                           
                                            <!-- col.// -->
                                        </div>
                                        <!-- row.// -->
                                        <br />
                                        <button class="btn btn-primary" style="background-color: #f23022;" type="submit" onclick="editprofile()" name="submit">Save changes</button>
                                    <hr class="my-5" />
                                     
                                    <!-- row.// -->
                                </section>
                                <!-- content-body .// -->
                            </div>
                            <!-- col.// -->
                        </div>
                        <!-- row.// -->
                    </div>
                    <!-- card body end// -->
                </div>
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
    </script>
