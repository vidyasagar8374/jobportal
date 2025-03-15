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
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets1/imgs/theme/fav-da.png" />
    <!-- Template CSS -->
    <link href="{{asset('assets1/css/main.css?v=1.1')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <style>
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

      .mt-100 {
        margin-top: 100px
      }

      body {
        background: #00B4DB;
        background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);
        background: linear-gradient(to right, #0083B0, #00B4DB);
        color: #514B64;
        min-height: 100vh
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
                        <h1 class="h4 text-gray-900 mb-4">Create Post</h1>
                      </div>
                      <div class="form-group">
                        <label for="role">Role <span style="color:red">*</span></label>
                        <input type="text" name="role" class="form-control" id="role" placeholder="Role Details">
                      </div>
                      <div class="form-group">
                        <label for="description">Job Description <span style="color:red">*</span></label>
                        <textarea type="text" class="form-control" name="description" id="description" placeholder="Description"></textarea>
                      </div>


                      <div class="form-group" >


                      
                      <div class="row">
                        <div class="col md-6 form-group" id="addtechonology">
                          <label for="skils">Skils:</label>
                            <select name="skils" class="choices" id="skill1" placeholder="Select Your Skils" >
                            <option value=""></option>
                              @foreach($techonologies as $techonology)
                              <option value="{{$techonology->id}}">{{$techonology->techonology}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                          <label for="skils">Experience:</label>
                            <input style="height:45px" class="form-control" id="exp1" type="number" name="expindividual" >
                        </div>
                      </div>


                      <div class="row" id="experienceenter2" style="display:none">
                        <div class="col md-6 form-group" id="addtechonology">
                          <label for="skils">Skils:</label>
                            <select name="skils" class="choices" id="skill2" placeholder="Select Your Skils">
                            <option value=""></option>
                              @foreach($techonologies as $techonology)
                              <option value="{{$techonology->id}}">{{$techonology->techonology}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                          <label for="skils">Experience:</label>
                            <input style="height:45px" class="form-control" id="exp2" type="number" name="expindividual" >
                        </div>
                      </div>
                      <div class="row" id="experienceenter3" style="display:none">
                        <div class="col md-6 form-group" id="addtechonology">
                          <label for="skils">Skils:</label>
                            <select name="skils" id="skill3" class="choices" placeholder="Select Your Skils">
                            <option value=""></option>
                              @foreach($techonologies as $techonology)
                              <option value="{{$techonology->id}}">{{$techonology->techonology}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                          <label for="skils">Experience:</label>
                            <input style="height:45px" class="form-control" id="exp3" type="number" name="expindividual" >
                        </div>
                      </div>
                      <div class="row" id="experienceenter3" style="display:none">
                        <div class="col md-6 form-group" id="addtechonology">
                          <label for="skils">Skils:</label>
                            <select name="skils" class="choices" id="skill4" placeholder="Select Your Skils">
                            <option value=""></option>
                              @foreach($techonologies as $techonology)
                              <option value="{{$techonology->id}}">{{$techonology->techonology}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                          <label for="skils">Experience:</label>
                            <input style="height:45px" class="form-control" id="exp4" type="number" name="expindividual" >
                        </div>
                      </div>
                      <div class="row" id="experienceenter4" style="display:none">
                        <div class="col md-6 form-group" id="addtechonology">
                          <label for="skils">Skils:</label>
                            <select name="skils" class="choices" id="skill5" placeholder="Select Your Skils">
                            <option value=""></option>
                              @foreach($techonologies as $techonology)
                              <option value="{{$techonology->id}}">{{$techonology->techonology}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                          <label for="skils">Experience:</label>
                            <input style="height:45px" class="form-control" id="exp5" type="number" name="expindividual" >
                        </div>
                      </div>
                      <div class="row" id="experienceenter5" style="display:none">
                        <div class="col md-6 form-group" id="addtechonology">
                          <label for="skils">Skils:</label>
                            <select name="skils" class="choices" id="skill6" placeholder="Select Your Skils">
                            <option value=""></option>
                              @foreach($techonologies as $techonology)
                              <option value="{{$techonology->id}}">{{$techonology->techonology}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                          <label for="skils">Experience:</label>
                            <input style="height:45px" class="form-control" id="exp6" type="number" name="expindividual" >
                        </div>
                      </div>
                      <div class="row" id="experienceenter6" style="display:none">
                        <div class="col md-6 form-group" id="addtechonology">
                          <label for="skils">Skils:</label>
                            <select name="skils" class="choices" id="skill7" placeholder="Select Your Skils">
                            <option value=""></option>
                              @foreach($techonologies as $techonology)
                              <option value="{{$techonology->id}}">{{$techonology->techonology}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                          <label for="skils">Experience:</label>
                            <input style="height:45px" class="form-control" id="exp7" type="number" name="expindividual" >
                        </div>
                      </div>
                      <div class="row" id="experienceenter7" style="display:none">
                        <div class="col md-6 form-group" id="addtechonology">
                          <label for="skils">Skils:</label>
                            <select name="skils" class="choices" id="skill8" placeholder="Select Your Skils">
                            <option value=""></option>
                              @foreach($techonologies as $techonology)
                              <option value="{{$techonology->id}}">{{$techonology->techonology}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                          <label for="skils">Experience:</label>
                            <input style="height:45px" class="form-control" id="exp8" type="number" name="expindividual" >
                        </div>
                      </div>
                      <div class="row" id="experienceenter8" style="display:none">
                        <div class="col md-6 form-group" id="addtechonology">
                          <label for="skils">Skils:</label>
                            <select name="skils" class="choices" id="skill9" placeholder="Select Your Skils">
                            <option value=""></option>
                              @foreach($techonologies as $techonology)
                              <option value="{{$techonology->id}}">{{$techonology->techonology}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                          <label for="skils">Experience:</label>
                            <input style="height:45px" class="form-control" id="exp9" type="number" name="expindividual" >
                        </div>
                      </div>
                      <div class="row" id="experienceenter9" style="display:none">
                        <div class="col md-6 form-group" id="addtechonology">
                          <label for="skils">Skils:</label>
                            <select name="skils" class="choices" id="skill10" placeholder="Select Your Skils">
                            <option value=""></option>
                              @foreach($techonologies as $techonology)
                              <option value="{{$techonology->id}}">{{$techonology->techonology}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                          <label for="skils">Experience:</label>
                            <input style="height:45px" class="form-control" id="exp10" type="number" name="expindividual" >
                        </div>
                      </div>
                      <div class="row" id="experienceenter10" style="display:none">
                        <div class="col md-6 form-group" id="addtechonology">
                          <label for="skils">Skils:</label>
                            <select name="skils" class="choices" id="skill11" placeholder="Select Your Skils">
                            <option value=""></option>
                              @foreach($techonologies as $techonology)
                              <option value="{{$techonology->id}}">{{$techonology->techonology}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                          <label for="skils">Experience:</label>
                            <input style="height:45px" class="form-control" id="exp11" type="number" name="expindividual" >
                        </div>
                      </div>

                      <!-- end ofskills -->
                       <!-- Note : Add Skill which are not listed above -->
                      <!-- <div class="form-group" >

                        <div id="field_div">
                          <button type="button" class="btn btn-primary" style="height:35px" onclick="add_field();">Add Skills</button>
                        </div>
                      </div> -->


                      <div class="form-group" >
                        <div>
                          <button type="button" class="btn btn-primary" style="height:35px" onclick="add_experience();">+</button>
                        </div>
                      </div>
                      




                      <div class="form-group">
                        <label for="experience">Years Of Experience <span style="color:red">*</span></label>
                        <input type="number" class="form-control" name="experience" id="experience" placeholder="Experience in years">
                      </div>
                      <div class="form-group">
                        <label for="level">Level <span style="color:red">*</span></label>
                          <select name="level" id="choices-multiple-remove-button"  class="levelgroup levellist" id="level" placeholder="Select level">
                          <option value="">Select one</option>
                            <option value="Mid">Mid</option>
                            <option value="Junior">Junior</option>
                            <option value="Senior">Senior</option>
                          </select>
                      </div>
                      <!-- <div class="form-group">
                        <label for="level"> Level:</label>
                        <input type="text" class="form-control" name="level" id="level" placeholder="......">
                      </div> -->
                      <div class="form-group">
                        <label for="location"> Location <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="location" id="location" placeholder="Location ...">
                      </div>
                      <!-- <div class="form-group">
                        <label for="mode">Mode:</label>
                        <input type="text" class="form-control" name="mode" id="mode" placeholder="">
                      </div> -->
                      <div class="form-group">
                        <label for="mode">Mode <span style="color:red">*</span></label>
                          <select name="mode" id="choices-multiple-remove-button" class="mode" placeholder="Select mode" >
                          <option value="">Select one</option>
                            <option value="1">Remote</option>
                            <option value="2">Hybrid</option>
                            <option value="3">Inperson</option>
                          </select>
                      </div>

                      <div class="form-group">
                        <label for="noofposts">No Of Posts <span style="color:red">*</span></label>
                        <input type="number" class="form-control" id="noofposts" name="noofposts" placeholder="Enter No Of Posts">
                      </div>



                      <div class="form-group">
                        <label for="clientname">Client Name:</label>
                        <input type="text" class="form-control" id="clientname" name="clientname" placeholder="Client Name">
                      </div>
                      <div class="form-group">
                        <label for="duration">Job Duration:</label>
                        <input type="text" class="form-control" id="duration" name="duration" placeholder="duration">
                      </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="startdate">Job Start Date:</label>
                              <input type="date" class="form-control" id="startdate" name="startdate" placeholder="startdate">
                            </div>
                          </div>


                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="startdate">Job End Date:</label>
                              <input type="date" class="form-control" id="enddate" name="enddate" placeholder="enddate">
                            </div>
                          </div>


                        </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-6">
                            
                            <label for="Salary">Rate/Salary <span style="color:red">*</span></label>
                           <div class="d-flex" >
                            <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar mt-3 mr-2" viewBox="0 0 16 16">
                              <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                            </svg> 
                            <input type="text" class="form-control" id="Salary" name="Salary" placeholder="Rate/Salary">
    </div>
                          </div>

                          <div class="col-md-6">
                          <label for="Salary">Rate/Salary <span style="color:red">*</span></label>

                          <select class="form-control" id="salarytype">

                            <option value="">Select one</option>
                            <option value="Hour">Hour</option>
                            <option value="Anum">Anum</option>


                          </select>
                        </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="type">Job Type</label>
                        <input type="text" class="form-control" id="type" name="type" placeholder="type">
                      </div>
                      <div class="form-group">
                        <label for="number">Contact Number <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="number" name="number" placeholder="Contact Number">
                      </div>
                      <div class="form-group">
                        <label for="contactemail">Contact Email <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="contactemail" name="contactemail" placeholder="Contact Email">
                      </div>
                      <div class="form-group">
                        <label for="recruiter">Assign Recruiter <span style="color:red">*</span></label>
                        <select name="recruiter" id="recruiter" class="form-control" placeholder="Select mode" >
                        <option value="">Select One</option>
                            @foreach($recuriterinfo as $row)
                            <option value="{{$row->id}}">{{$row->email}} ({{$row->name ?? 'admin'}})</option>
                            @endforeach
                          </select>
                        <!-- <input type="text" class="form-control" id="recruiter" name="recruiter" placeholder="Recruiter Name"> -->
                      </div>
                      <br>
                      <br>
                      <input onclick="CreatePost()" style="background-color: #f23022;" type="submit" name="submit" value="Create Post" class="btn btn-primary btn-user btn-block col-md-3">
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
<script src="{{asset('assets1/js/main.js?v=1.1')}}" type="text/javascript"></script>
<script src="{{asset('assets1/js/custom-chart.js')}}" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
  function CreatePost() {
    // id
    var role = $('#role').val()
    var description = $('#description').val()
    var skils = $('#choices-multiple-remove-button').val()
    var experience = $('#experience').val()
    var level = $('.levellist').val()
    var location = $('#location').val()
    var mode = $('.mode').val()
    var expriencelist = $('.expriencelist').val()
    var clientname = $('#clientname').val()
    var duration = $('#duration').val()
    var noofposts = $('#noofposts').val()
    var startdate = $('#startdate').val()
    var enddate = $('#enddate').val()
    var Salary = $('#Salary').val()
    var salarytype = $('#salarytype').val()
    var type = $('#type').val()
    var number = $('#number').val()
    var contactemail = $('#contactemail').val()
    var recruiter = $('#recruiter').val()
    var exp = [];
    var skill = [];
    var enteredskill = [];
    var enteredskillexp = [];
    for(var e = 1; e <= 10; e++){
      if($('#skill'+ e).val() != "" && $('#exp'+ e).val() != ""){
          enteredskill[e] = $('#skill'+ e).val();
          enteredskillexp[e] = $('#exp'+ e).val();
        }
      }

    var x = 0;
    // for(var i = 1; i <= id; i++){
    //   if(i % 2 != 0){
    //     skill[x] = $('#input_text'+ i).val();
    //     exp[x] = $('#input_text_exp'+ i).val();
    //     x++
    //   }
    // }
    

    // check validations
    var validation = true;
    if(role == ""){
      $("#role").css("border-color", "red")
      var validation = false
    }if(description == ""){
      $("#description").css("border-color", "red")
      var validation = false
    }
    if(experience == ""){
      $("#experience").css("border-color", "red")
      var validation = false
    }
      if (level === "") {
        alert('please select a level');
    $(".expriencelist").css("border-color", "red");
    var validation = false;
    }
    if(location == ""){
      $("#location").css("border-color", "red")
      var validation = false
    }
    if(salarytype == ""){
      alert('please select Rate/Salary');
      $("#salarytype").css("border-color", "red")
      var validation = false
    }
    if(mode == ""){
      alert('please select mode');
      $(".mode").css("border-color", "red")
      var validation = false
    }if(noofposts == ""){
      $("#noofposts").css("border-color", "red")
      var validation = false
    }if(Salary == ""){
      $("#Salary").css("border-color", "red")
      var validation = false
    }if(number == ""){
      $("#number").css("border-color", "red")
      var validation = false
    }if(contactemail == ""){
      $("#contactemail").css("border-color", "red")
      var validation = false
    }if(recruiter == ""){
      $("#recruiter").css("border-color", "red")
      var validation = false
    }
    if(validation == false){
      return false
    }



    // end of check validation



    debugger;
    $.ajax({
      type: 'POST',
      url: '{{ url('Createpost') }}',
      data: {
        '_token': '{{ csrf_token() }}',
        'role': role,
        'description': description,
        'skils': skils,
        'experience': experience,
        'level': level,
        'location': location,
        'mode': mode,
        'clientname': clientname,
        'duration': duration,
        'startdate': startdate,
        'enddate' : enddate,
        'Salary': Salary,
        'salarytype' : salarytype,
        'type': type,
        'noofposts' : noofposts,
        'number': number,
        'contactemail': contactemail,
        'recruiter': recruiter,
        'exp' : exp,
        'skill' : skill,
        'enteredskill' : enteredskill,
        'enteredskillexp' : enteredskillexp
      },
      success: function(data) {
        if (data == 1) {
          role = $('#role').val('')
          noofposts = $('#noofposts').val('')
          description = $('#description').val('')
          skils = $('#skils').val('')
          experience = $('#experience').val('')
          level = $('.level').val('')
          location = $('#location').val('')
          mode = $('.mode').val('')
          clientname = $('#clientname').val('')
          duration = $('#duration').val('')
          startdate = $('#startdate').val('')
          Salary = $('#Salary').val('')
          type = $('#type').val('')
          number = $('#number').val('')
          contactemail = $('#contactemail').val('')
          recruiter = $('#recruiter').val('')
          $(document).ready(function() {
            swal({
              title: "Post Created Sucessfully",
              text: "Success",
              icon: "success",
              button: "Ok",
              timer: 4000
            });
          });
        } else {
          $(document).ready(function() {
            swal({
              title: "Some Thing Went Wrong!",
              text: "error",
              icon: "error",
              button: "Ok",
              timer: 4000
            });
          });
        }
      }
    });
  }
  
  // $("#addtechonology").keyup(function(){
  //   alert('sdfdfdf')
  // });

  $(document).ready(function() {
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
      removeItemButton: true,
      maxItemCount: 1,
      searchResultLimit: 5,
      renderChoiceLimit: 5
    });
  });


  $(document).ready(function() {
    var multipleCancelButton = new Choices('.choices', {
      removeItemButton: true,
      maxItemCount: 1,
      searchResultLimit: 5,
      renderChoiceLimit: 5
    });
  });



  function add_skill_field() {
   
  }
  function add_field() {
  // alert(total_text)
    var total_text = document.getElementsByClassName("input_text");
    total_text = total_text.length + 1;
    window.id = total_text
    // alert(id)

    document.getElementById("field_div").innerHTML = document.getElementById("field_div").innerHTML + " <p id = 'input_text"+total_text+"_wrapper'><div class='row'><div class='col-md-5'><input type = 'text' class = 'input_text form-control' style='margin-top:5px' name='exp[]' id = 'input_text"+total_text+"' placeholder = 'Skill'></div>&nbsp;&nbsp<div class='col-md-3'><input type = 'text' class = 'input_text  form-control' style='margin-top:5px' name='exp[]' id = 'input_text_exp"+total_text+"' placeholder = 'Experience'></div><div class='col-md-3'>  <input type = 'button' value = 'Remove' onclick = remove_field('input_text"+total_text+"');> </div></div></p>";
    
  }

  function remove_field(id) {
    document.getElementById(id + "_wrapper").innerHTML = "";
  }
  window.expe = 2;
  function add_experience()
  {
    $("#experienceenter"+expe).show()
    window.expe =  window.expe + 1
  }


$(document).ready(function(){
  $("#role").keyup(function(){
    $("#role").removeAttr( 'style' );
  });
  $("#description").keyup(function(){
    $("#description").removeAttr( 'style' );
  });
  $("#experience").keyup(function(){
    $("#experience").removeAttr( 'style' );
  });
  $(".level").keyup(function(){
    $(".level").removeAttr( 'style' );
  });
  $("#location").keyup(function(){
    $("#location").removeAttr( 'style' );
  });
  $(".mode").keyup(function(){
    $(".mode").removeAttr( 'style' );
  });
  $("#noofposts").keyup(function(){
    $("#noofposts").removeAttr( 'style' );
  });
  $("#Salary").keyup(function(){
    $("#Salary").removeAttr( 'style' );
  });
  $("#number").keyup(function(){
    $("#number").removeAttr( 'style' );
  });
  $("#contactemail").keyup(function(){
    $("#contactemail").removeAttr( 'style' );
  });
  $("#recruiter").keyup(function(){
    $("#recruiter").removeAttr( 'style' );
  });
  
})
</script>