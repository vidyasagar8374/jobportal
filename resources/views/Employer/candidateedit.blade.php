<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Company Dashboard</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets1/imgs/theme/fav-da.png" />
    <!-- Template CSS -->
    <link href="{{asset('assets1/css/main.css?v=1.1')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        * {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
      .text-gray-900 {
        color: #f23022 !important;
        font-size: 43px;
        font-weight: 700;
      }

      label {
        display: inline-block;
        margin-bottom: 0.5rem;
        color: #000;
        font-size: 15px;
        font-weight: 700;
      }

      form.user .btn-user {
        font-size: .8rem;
        border-radius: 1rem;
        padding: 0.75rem 1rem;
      }
    </style>
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
      <section class="content-main">
        <body class="" style="background-color:aliceblue;">
          <div class="container">
            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg-12">
                    <div class="p-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">View Candidate</h1>
                      </div>
                      <div class="form-group">
                        <label for="fname">First Name <span style="color:red">*</span></label>
                        <input type="text" name="fname" value="{{$data->firstname}}" class="form-control" id="fname" placeholder="Enter First Name">
                      </div>
                      <div class="form-group">
                        <label for="mname">Middle Name </label>
                        <input type="text" class="form-control" value="{{$data->middlename}}" name="mname" id="mname" placeholder="Enter Middle Name">
                      </div>
                      <div class="form-group">
                      <label for="lname">Last Name <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="lname" value="{{$data->lastname}}" id="lname" placeholder="Enter Last Name">
                      </div>
                      <div class="form-group">
                        <label for="contactnumber">Contact No <span style="color:red">*</span></label>
                        <div class="row">
                        <div class="col-md-2">
                        <select class="form-control" id="countrycode">
                          @foreach($countries as $country)
                          <option value="{{$country->id}}">{{$country->phonecode}}</option>
                          @endforeach
                        </select>
                        </div>
                        <div class="col-md-10">
                        <input type="text" class="form-control" value="{{$data->contactnumber}}" name="contactnumber" id="contactnumber" placeholder="Enter Contact Number">
                        </div>  
                      </div>
                      </div>
                      <div class="form-group">
                        <label for="email">Email <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="email" value="{{$data->email}}" id="email" placeholder="Enter Email">
                      </div>

                      <div class="form-group">
                        <label for="email">Contact Email <span style="color:red">*</span></label>
                        <input type="email" class="form-control" value="{{$data->contactemail}}" name="contactemail" id="contactemail" placeholder="Enter Contact Email">
                      </div>
                      <input type="hidden" name="id" id="id" value="{{$data->id}}">

                      <div class="form-group">
                        <label for="location"> Location <span style="color:red">*</span></label>
                        <input type="text" class="form-control" value="{{$data->location}}" name="location" id="location" placeholder="Location ...">
                      </div>
                      <div class="form-group">
                        <label for="authorization">Work Authorization <span style="color:red">*</span></label>
                          <select name="authorization" class="form-control" id="authorization"  placeholder="authorization" >
                          <option value="">Select One</option>
                          @foreach($workAuthorizations as $workAuthorization)
                            <option @if($data->authorization == $workAuthorization->id) selected @endif value="{{$workAuthorization->id}}">{{$workAuthorization->type}}</option>
                          @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="title">Job Title <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="title"  value="{{$data->title}}"  name="title" placeholder="Job Title">
                      </div>
                      <div class="form-group">
                      <div class="row">
                          <div class="col-md-6">
                            <label for="expectedrate">Expected Rate/Salary <span style="color:red">*</span></label>
                            <div class="d-flex">
                              <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar mt-2 mr-2" viewBox="0 0 16 16">
                                    <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                                  </svg> 
                              <input type="text" value="{{$data->expectedate}}"  class="form-control" id="expectedrate" name="expectedrate" placeholder="Expected Rate">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <label for="Salary">Rate/Salary <span style="color:red">*</span></label>
                            <select class="form-control" id="salarytype">
                              <option value="">Select one</option>
                              <option value="Hour" @if($data->salarytype == "Hour") selected @endif>Hour</option>
                              <option value="Anum" @if($data->salarytype == "Anum") selected @endif>Anum</option>

                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="employee">Employee Type <span style="color:red">*</span></label>
                          <select name="employee" class="form-control" id="employee"  placeholder="Employee Type" >
                          <option value="">Select One</option>
                          @foreach($employetypes as $employetype)
                            <option @if($data->employee == $employetype->id) selected @endif value="{{$employetype->id}}">{{$employetype->type}}</option>
                          @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="relocate">Willing To Relocate <span style="color:red">*</span></label>
                          <select name="relocate" class="form-control" id="relocate"  placeholder="Willing To Relocate" >
                          <option value="">Select One</option>
                            <option value="1" @if($data->relocate == "1") selected @endif>Yes</option>
                            <option value="2"@if($data->relocate == "2") selected @endif>No</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="travel">Open To Travel <span style="color:red">*</span></label>
                          <select name="travel" class="form-control" id="travel"  placeholder="Open To Travel" >
                          <option value="">Select One</option>
                            <option value="1" @if($data->travel == "1") selected @endif>Yes</option>
                            <option value="2" @if($data->travel == "2") selected @endif>No</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="experience">Years Of Experience <span style="color:red">*</span></label>
                        <input type="text" class="form-control" value="{{$data->experience}}" id="experience" name="experience" placeholder="Years Of Experience">
                      </div>
                      <div class="container1">
                      <div id="field_div">
                  <button type="button" class="btn btn-primary" style="margin-top:3px" onclick="add_field();"> + Skills </button>
                  
                </div>
               
                        <!-- <button class="add_form_field">Skills &nbsp; 
                          <span style="font-size:16px; font-weight:bold;">+ </span>
                        </button> -->
                        <!-- <div><input type="text" name="mytext[]"></div> -->
                    </div>

@foreach($data->addedskills as $details)
                    <button class="btn btn-warning" style="margin-top:5px; border:none; background-color:blue; !important">
                    {{$details->skilldetails->techonology}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                        </button>
@endforeach


                    <br>
                      <div class="form-group">
                        <label for="education">Highest Education <span style="color:red">*</span></label>
                        <input type="text" value="{{$data->education}}"  class="form-control" id="education" name="education" placeholder="Highest Education:">
                      </div>
                      <div class="form-group">
                        <label for="linked">Linked</label>
                        <input type="text" class="form-control" value="{{$data->linked}}" id="linked" name="linked" placeholder="Linked">
                      </div>
                      <div class="form-group">
                        <label for="availabledate">Available Date</label>
                        <input type="date" class="form-control" value="{{$data->avaliabledate}}"  id="avaliabledate" name="avaliabledate" placeholder="Available Date">
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="availabledate">Close</label>
                            <select class="form-control" id="closestatus">
                              
                              @if($data->is_closed == 0)
                              <option value=""></option>
                              <option value="1">close</option>
                              @else if($data->is_closed == 1)
                              <option value="1">closed</option>
                              <option value="0">open</option>
                              @endif
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="availabledate">status</label>
                            <select class="form-control" id="status">
                              <option></option>
                              <option value="1" @if($data->isactive == 1) selected @endif>Active</option>
                              <option value="0" @if($data->isactive == 0) selected @endif>In Active</option>

                            </select>
                          </div>
                        </div>
                      </div>



                      <br>
                      <br>
                      <input onclick="AddCandidate()" style="background-color: #f23022;" type="submit" name="submit" value="Update" class="btn btn-primary btn-user btn-block col-md-3">
                      <hr>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </body>
      </section>
    </main>
  </body>
</html>
<script src="{{asset('assets1/js/vendors/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets1/js/vendors/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets1/js/vendors/select2.min.js')}}"></script>
<script src="{{asset('assets1/js/vendors/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets1/js/vendors/jquery.fullscreen.min.js')}}"></script>
<script src="{{asset('assets1/js/vendors/chart.js')}}"></script>
<!-- Main Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="{{asset('assets1/js/main.js?v=1.1')}}" type="text/javascript"></script>
<script src="{{asset('assets1/js/custom-chart.js')}}" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
  window.total_text
  $(document).ready(function() {
    var max_fields = 10;
    var wrapper = $(".container1");
    var add_button = $(".add_form_field");

    var x = 1;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append('<div class="row"><div class="col-sm-4" ><div><input type="text" name="mytext[]"/><a href="#" class="delete">Delete</a></div></div><br><div class="col-sm-4"><div><input type="text" name="exp[]"/><a href="#" class="delete">Delete</a></div></div></div><br>'); //add input box
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
function AddCandidate()
{
  // var test = $("input[name=exp[]").val();
  // alert(id)
  var candidateskills = []; 
  var f = 0;
  if(id)
  {
    for(var i = 1; i <= id; i++)
    {
      if(i % 2 != 0)
      {
        candidateskills[f] = $('#input_text' + i).val() + '&&' + $('#exp' + i).val(); 
        f = f + 1
      }
    }
  }
  var skills = candidateskills;
  var fname = $('#fname').val()
  var idinfo = $('#id').val()
  var mname = $('#mname').val()
  var lname = $('#lname').val()
  var contactnumber = $('#contactnumber').val()
  var countrycode = $('#countrycode').val()
  var email = $('#email').val()
  var location = $('#location').val()
  var authorization = $('#authorization').val()
  var title = $('#title').val()
  var expectedrate = $('#expectedrate').val()
  var salarytype = $('#salarytype').val()
  var employee = $('#employee').val()
  var relocate = $('#relocate').val()
  var travel = $('#travel').val()
  var experience = $('#experience').val()
  var education = $('#education').val()
  var linked = $('#linked').val()
  var contactemail = $('#contactemail').val();
  var avaliabledate = $('#avaliabledate').val()
  var closestatus = $('#closestatus').val()
  var status = $('#status').val()
  debugger;
  $.ajax({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type: 'post',
    url : '{{ url('/updatecandidate') }}',
    data : {
        'id' : idinfo,
        'fname' : fname,
        'mname' : mname,
        'lname' : lname,
        'contactnumber' : contactnumber,
        'email' : email,
        'location' : location,
        'authorization' : authorization,
        'title' : title,
        'expectedrate' : expectedrate,
        'salarytype' : salarytype,
        'education' : education,
        'employee' : employee,
        'relocate' : relocate,
        'countrycode' : countrycode,
        'travel' : travel,
        'experience' : experience,
        'linked' : linked,
        'avaliabledate' : avaliabledate,
        'contactemail' : contactemail,
        'skills' : skills,
        'closestatus' : closestatus,
        'status' : status
      },
    success: function(result)
    {
      if(result.status == 1 && result.success == true)
      {
        swal({
              title: "Candidate updated Sucessully",
              text: "Success",
              icon: "success",
              button: "Ok",
              timer: 4000
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
    }
  })
}
function add_field() {
  // alert(total_text)
    var total_text = document.getElementsByClassName("input_text");
    total_text = total_text.length + 1;
    window.id = total_text

    document.getElementById("field_div").innerHTML = document.getElementById("field_div").innerHTML + " <p id = 'input_text"+total_text+"_wrapper'><input type = 'text' class = 'input_text' name='exp[]' id = 'input_text"+total_text+"' placeholder = 'Enter Skills'> <input type = 'text' class = 'input_text' id = 'exp"+total_text+"' name='years[]' placeholder = 'Experience in years'> <input type = 'button' style='border:none; background-color:red; color:white' value = 'Remove' onclick = remove_field('input_text"+total_text+"');> </p>";
  }

  function remove_field(id) {
    document.getElementById(id + "_wrapper").innerHTML = "";
  }
</script>
