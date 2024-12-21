<!doctype html>
<html>
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Job Portal - Job Portal HTML5 Template</title>
      <!-- Plugins CSS -->
      <link href="css/plugins.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="css/style.css" rel="stylesheet">
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="images/favicon.html">



      <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>



   </head>
   <body style="background-image: url('images/banner.jpg');" >
      <div id="dvLoading"></div>
      <header class="custom-navbar" id="navigation">
         <div class="container">
            <div class="row px-3">
               <div class="wow fadeInLeft" data-wow-delay="0.3s">
                  <!-- Header Logo -->
                  <div class="header-logo">
                     <a href="index.html"><img src="images/logo.png" class="img-fluid" alt=""></a>
                  </div>
                  <!-- Header Logo end -->
               </div>
               <div class="d-flex position-static menu-sec">
                  <!-- main menu area -->
                  <nav class="main-menu-area ml-auto mobile-menu-active">
                     <ul class="main-menu">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li class="sub-menu-wrap">
                           <a href="javascript:void(0)">Jobs</a>
                           <!-- Sub Menu -->
                           <ul class="sub-menu">
                              <li><a href="job-list.html" class="nav-link">Job List</a></li>
                              <li><a href="job-details.html" class="nav-link">Job Details</a></li>
                           </ul>
                        </li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact Us</a></li>
                     </ul>
                  </nav>
                  <div class="login-sec">
                     <div class="dropdown">
                        <button class="btn open-popup-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login / Sign Up
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                           <a class="dropdown-item" href="{{url('Userlogin')}}">Employer</a>
                           <a class="dropdown-item" href="{{route('EmployeeLogin')}}">Candidate</a>
                        </div>
                     </div>
                     <!-- <a class="btn open-popup-link" href="#sign-in-popup">Login / Sign Up</a> -->
                  </div>
                  <!-- main menu area end -->
                  <!-- Mobile Menu Container -->
                  <div class="mobile-menu-container"><span class="sr-only">Mobile Menu Will Come Here.</span></div>
               </div>
            </div>
         </div>
      </header>
      <div class="container" >
         <div class="card o-hidden border-0 shadow-lg my-5" >
            <div class="card-body p-0">
               <!-- Nested Row within Card Body -->
               <div class="row">
                  <div class="col-lg-12">
                     <div class="p-5">
                        <div class="text-center">
                           <h1 class="h4 text-gray-900 mb-4">Employee Register Form</h1>
                        </div>
                        <form action="{{route('EmployeeRegistrationsubmit')}}" method="post" enctype="multipart/form-data">
                           @csrf
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="middlename">Middle Name</label>
                                    <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Middle Name">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name">
                                 </div>
                              </div>
                              <div class="col-md-6">
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="number">Contact Number <span style="color:red;">*</span></label>
                                    <input type="number" class="form-control" name="number" id="number" placeholder="Enter Mobile Number">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="password"> Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="password">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="confirmpassword"> Confirm Password</label>
                                    <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Location">Location</label>
                                    <input type="text" class="form-control" name="Location" id="Location" placeholder="Location">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="authorization">Work Authorization</label>
                                    <select name="authorization" class="form-control">
                                       <option value="0">Select One</option>
                                       <option value="1">HIB</option>
                                       <option value="2">EAD</option>
                                       <option value="3">GC</option>
                                       <option value="4">Citizen</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="ctc">Current CTC</label>
                                    <input type="number" class="form-control" name="ctc" id="ctc" placeholder="CTC">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="ectc">Expected CTC</label>
                                    <label for="ectc">Location</label>
                                    <input type="number" class="form-control" name="ectc" id="ectc" placeholder="Excepted CTC">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="relocate">Willing To Relocate</label>
                                    <select name="relocate"  class="form-control">
                                       <option value="0">Select One</option>
                                       <option value="1">Yes</option>
                                       <option value="2">No</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="travel">Open To Travel</label>
                                    <select name="travel"  class="form-control">
                                       <option value="0">Select One</option>
                                       <option value="1">Yes</option>
                                       <option value="2">No</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="travel">Years Of Experience</label>
                                    <input type="number" class="form-control" name="experience" id="experience" placeholder="Experience in Years">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <!-- <div class="container1 col-md-4">
                                 <button class="form-control add_form_field">Skills &nbsp; 
                                 <span style="font-size:16px; font-weight:bold;">+ </span>
                                 </button>
                                 <br>
                                 <div>
                                    <input type="hidden" class="form-control" name="skills[]">
                                 </div>
                              </div> -->
 <div class="container1 col-md-4">

                              <label for="skils">Skils:</label>
                            <select multiple name="skils[]" class="choices" id="skill11" placeholder="Select Your Skils">
                              @foreach($techoologies as $tech)
                                 <option value="{{$tech->id}}">{{$tech->techonology}}</option>
                              @endforeach

                              
                            </select>
                              </div>
                              <div class="col-md-8">
                              <input type="file" class="form-control" name="file" >
                              </div>
                           </div>
                           <br>
                           <input style="background-color: #f23022;" type="submit" name="submit" value="Register" class="btn btn-primary btn-user btn-block col-md-3">
                        </form>
                        <hr>
                        <!--  <div class="text-center">
                           <a class="small" href="forgot-password.html">Forgot Password?</a>
                           </div> -->
                        <div class="text-center">
                           <a style="color: #f23022;" class="small" href="login.html">Already have an account? Login!</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="{{asset('jquery/jquery.min.js')}}"></script>
   <script src="{{asset('jquery/bootstrap.bundle.min.js')}}"></script>
   <!-- Core plugin JavaScript-->
   <script src="{{asset('jquery/jquery.easing.min.js')}}"></script>
   <!-- Custom scripts for all pages-->
   <script src="{{asset('jquery/sb-admin-2.min.js')}}"></script>
   <!--jquery js -->
   <script src="js/jquery-min.js"></script>
   <script src="js/popper.min.js"></script>
   <!--jquery js -->
   <script src="js/bootstrap.min.js"></script>
   <!--Easing js -->
   <script src="js/jquery.easing.min.js"></script>
   <!-- CounterUp JS -->
   <script src="js/jquery.counterup.min.js"></script>
   <!-- MagnificPopup JS -->
   <script src="js/jquery.magnific-popup.min.js"></script>
   <!--jquery js -->
   <script src="js/plugins.js"></script>
   <!--Fontawesome js -->
   <script src="js/fontawesome.js"></script>
   <!--Meanmenu js --> 
   <script src="js/jquery.meanmenu.min.js"></script> 
   <!--jquery js -->
   <script src="js/custom.js"></script>
   <script>
      $(document).ready(function() {
      var max_fields = 10;
      var wrapper = $(".container1");
      var add_button = $(".add_form_field");
      
      var x = 1;
      $(add_button).click(function(e) {
      e.preventDefault();
      if (x < max_fields) {
          x++;
          $(wrapper).append('<div><input type="text" class="form-control"  name="skills[]"/><a href="#" class="delete">Delete</a></div><br>'); //add input box
      } else {
          alert('You Reached the limits')
      }
      });
      
      $(wrapper).on("click", ".delete", function(e) {
      e.preventDefault();
      $(this).parent('div').remove();
      x--;
      })
      });

      $(document).ready(function() {
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
      removeItemButton: true,
      maxItemCount: 8,
      searchResultLimit: 5,
      renderChoiceLimit: 5
    });
  });
$(document).ready(function() {
   var multipleCancelButton = new Choices('.choices', {
   removeItemButton: true,
   maxItemCount: 8,
   searchResultLimit: 5,
   renderChoiceLimit: 5
   });
});


   </script>
</html> 