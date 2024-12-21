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
                    <h2 class="content-title" style="color:red">Create Users</h2>
                </div>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="row gx-5">
                            <div class="col-lg-12">
                                <section class="content-body p-xl-4">
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <div class="row gx-3">
                                                    <div class="col-6 mb-3">
                                                        <label class="form-label">Name <span style="color:red">*</span></label>
                                                        <input  id="username" class="form-control" type="text" name="username" placeholder="Type here" />
                                                    </div>
                                                    <!-- col .// -->
                                                    <div class="col-6 mb-3">
                                                    <label class="form-label">Mobile <span style="color:red">*</span></label>
                                                        <input  id="mobile" class="form-control" type="number" name="mobile" placeholder="Type here" />
                                                        <!-- <label class="form-label">Last name</label>
                                                        <input class="form-control" type="text" placeholder="Type here" /> -->
                                                    </div>
                                                    <!-- col .// -->
                                                    <div class="col-lg-6 mb-4">
                                                        <label class="form-label">Register Email <span style="color:red">*</span></label>
                                                        <input class="form-control" type="email" id="email" name="email"  placeholder="example@mail.com" />
                                                        <span style="color:red;" hidden id="emailerror">Please Enter Email</span>
                                                    </div>
                                                    <!-- col .// -->
                                                    <div class="col-lg-6 mb-4">
                                                        <label class="form-label">Password <span style="color:red">*</span></label>
                                                        <input class="form-control" type="text"  name="password" id="password" placeholder="Type Here" />
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label">Role <span style="color:red">*</span></label>
                                                        <select class="form-control" name="role" id="role">
                                                            <option value="">Select One</option>
                                                            <option value="4">Sales</option>
                                                            <option value="5">Hr</option>
                                                        </select>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <!-- row.// -->
                                            </div>
                                            <!-- col.// -->
                                           
                                            <!-- col.// -->
                                        </div>
                                        <!-- row.// -->
                                        <br />
                                        <!-- <button onclick="myFunction()">Click me</button> -->
                                        <!-- <a onclick="CreateEmployerUser()">Save changes</a> -->
                                        <button class="btn btn-primary" style="background-color:red"  onclick="CreateEmployerUser()">Submit</button>
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
        <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
        <script src="assets1/js/main.js?v=1.1" type="text/javascript"></script>
        <script>
        function CreateEmployerUser()
        {
            var name = $('#username').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var role = $('#role').val();
            var mobile = $('#mobile').val();
            var validation = false
            debugger
            if(name == '')
            {
                $("#username").css("border-color", "red")
                var validation = true
            }
            if(mobile == '')
            {
                $("#mobile").css("border-color", "red")
                var validation = true
            }
            if(email == '')
            {
                $("#email").css("border-color", "red")
                $('#emailerror').removeAttr('hidden');
                var validation = true
            }
            if(password == '')
            {
                $("#password").css("border-color", "red")
                var validation = true
            }
            if(role == '')
            {
                $("#role").css("border-color", "red")
                var validation = true
            }
            if(validation == true){
                return false
            }
            $.ajax({
                method : 'POST',
                url : 'CreateNewUser',
                data: {
                    '_token' : '{{ csrf_token() }}',
                    'username' : name,
                    'email' : email,
                    'password' : password,
                    'mobile' : mobile,
                    'role' : role
                },
                success: function(data)
                {
                    swal("Success!", "User Added Sucessfully!", "success");
                    // swal("Success!", "User In Activated!", "success");
                    $('#username').val('');
                    $('#email').val('');
                    $('#password').val('');
                    $('#role').val('');
                    setTimeout(() => {
                        window.location.href = "{{ url('/EmployerUsers') }}"
                    }, 3000);
                },
                error: function(data)
                {
                    swal("Good job!", "You clicked the button!", "error");
                }
            })
        }
        </script>
    </body>
</html>
