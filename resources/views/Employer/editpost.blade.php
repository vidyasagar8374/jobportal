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
      #editdata {
        pointer-events: none;
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
      <p style="float:right"><svg xmlns="http://www.w3.org/2000/svg" onClick="editenable()" height="20px" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg></p>
      <section class="content-main" id="editdata">
        <body class="" style="background-color:aliceblue;">

       


          <div class="container">
            
            <div class="card o-hidden border-0 shadow-lg my-5">
              
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg-12">
                    <div class="p-5">
                    
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4" id="viewpost">View Post</h1>
                        
                        <br>
                      </div>
                      <div class="form-group">
                        <label for="role">Role:</label>
                        <input type="text" name="role" class="form-control" id="role" value="{{$postDetails->role}}" placeholder="Role Details">
                      </div>
                      <div class="form-group">
                        <label for="description">Job Description:</label>
                        <textarea type="text" class="form-control" name="description"  id="description" placeholder="Description">{{$postDetails->description}}</textarea>
                      </div>
                      <br>
                      <div id="techonologies">
                      <?php
                        foreach($postDetails->Techonology as $tech)
                        {
                          ?>
                            
                      <button class="btn btn-warning" style="margin-top:5px; border:none; background-color:blue; !important">
                    {{$tech->info->techonology ?? ''}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" onclick="deletetechonology({{$tech->id}})" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
</svg>
    </button>
                          <?php 
                        }
                        ?>
    </div>
                      <div class="form-group">
                        <label for="skils">Skils:</label>
                          <select name="skils" id="choices-multiple-remove-button" placeholder="Select Your Skils" multiple>
                          @foreach($Techonologies as $techonology)  
                          <option value="{{$techonology->id}}">{{$techonology->techonology}}</option>
                          @endforeach
                          </select>
                      </div>
                      <!-- <div class="form-group">
                        <div id="field_div">
                        <label for="skilldata">Add Skils Not Listed Above:</label>
                        <br>
                          <input type="button" id="skilldata" value="Add Skill" onclick="add_field();">
                        </div>
                      </div> -->

                      <div class="form-group">
                        <label for="experience">Years Of Experience:</label>
                        <input type="text" class="form-control" name="experience" id="experience" value="{{$postDetails->experience}}"  placeholder="Email">
                      </div>
                      <div class="form-group">
                        <?php
                      $data = ['Mid', 'Junior', 'Senior'];
                      ?>
                        <label for="level">Level:</label>
                          <select name="level" id="choices-multiple-remove-button" class="level" value="{{$postDetails->level}}" placeholder="Select level">
                          <option value="{{$postDetails->level}}">{{$postDetails->level}}</option>
                            @foreach($data as $info)
                            @if($postDetails->level != $info)
                            <option value="{{$info}}">{{$info}}</option>
                            @endif
                            @endforeach
                          </select>
                      </div>
                      <!-- <div class="form-group">
                        <label for="level"> Level:</label>
                        <input type="text" class="form-control" name="level" id="level" placeholder="......">
                      </div> -->
                      <div class="form-group">
                        <label for="location">Location:</label>
                        <input type="text" class="form-control" name="location"  value="{{$postDetails->location}}" id="location" placeholder="Location ...">
                      </div>
                      <!-- <div class="form-group">
                        <label for="mode">Mode:</label>
                        <input type="text" class="form-control" name="mode" id="mode" placeholder="">
                      </div> -->
                      <div class="form-group">
                        <label for="mode">Mode:</label>
                          <select name="mode" id="choices-multiple-remove-button" class="mode" placeholder="Select mode" >
                             <option value="{{$postDetails->mode}}">{{ $postDetails->mode == "1" ? 'Remote' : ($postDetails->mode == "2" ? 'Hybrid' : ($postDetails->mode == "3" ? 'Inperson' : ''))}}</option>
                            <option value="1">Remote</option>
                            <option value="2">Hybrid</option>
                            <option value="3">Inperson</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="noofposts">No Of Posts <span style="color:red">*</span></label>
                        <input type="number" class="form-control" id="noofposts" value="{{$postDetails->noofposts ?? ''}}" name="noofposts" placeholder="Enter No Of Posts">
                      </div>

                      <div class="form-group">
                        <label for="clientname">Client Name:</label>
                        <input type="text" class="form-control" id="clientname" name="clientname" value="{{$postDetails->clientname ?? 'Not Avaliable'}}" placeholder="Client Name">
                      </div>
                      <div class="form-group">
                        <label for="duration">Job Duration:</label>
                        <input type="text" class="form-control" id="duration" name="duration" value="{{$postDetails->duration ?? 'Not Avaliable'}}" placeholder="duration">
                      </div>

                      <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="startdate">Job Start Date:</label>
                              <input type="date" class="form-control" id="startdate" name="startdate" value="{{$postDetails->startdate ?? ''}}" placeholder="startdate">
                            </div>
                            </div>
                          


                      <div class="col-md-6">
                            <div class="form-group">
                              <label for="startdate">Job End Date:</label>
                              <input type="date" value="{{$postDetails->enddate ?? ''}}"  class="form-control" id="enddate" name="enddate" placeholder="enddate">
                            </div>
                      </div>

                      </div>
                      <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="Salary">Rate/Salary:</label>
                              <div class="d-flex" >
                            <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar mt-3 mr-2" viewBox="0 0 16 16">
                              <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                            </svg> 
                              <input type="text" class="form-control" id="Salary" value="{{$postDetails->Salary ?? 'Not Avaliable'}}" name="Salary" placeholder="Salary">
                            </div>
                            </div>
                      </div>


                      <div class="col-md-6">
                          <label for="Salary">Rate/Salary <span style="color:red">*</span></label>

                          <select class="form-control" id="salarytype">

                            <option value="">Select one</option>
                            <option value="Hour" @if($postDetails->salarytype == 'Hour') selected @endif>Hour</option>
                            <option value="Anum" @if($postDetails->salarytype == 'Anum') selected @endif>Anum</option>


                          </select>
                        </div>
                        </div>


                      <div class="form-group">
                        <label for="type">Job Type:</label>
                        <input type="text" class="form-control" id="type" value="{{$postDetails->type ?? 'Not Avaliable'}}" name="type" placeholder="type">
                      </div>
                      <div class="form-group">
                        <label for="number">Contact Number</label>
                        <input type="text" class="form-control" id="number" value="{{$postDetails->number ?? 'Not Avaliable'}}" name="number" placeholder="Contact Number">
                      </div>
                      <div class="form-group">
                        <label for="contactemail">Contact Email:</label>
                        <input type="text" class="form-control" id="contactemail" value="{{$postDetails->contactemail ?? 'Not Avaliable'}}" name="contactemail" placeholder="Contact Email">
                      </div>
                      <div class="form-group">
                        <label for="recruiter">Recruiter Name:</label>
                        <select name="recruiter" id="recruiter" class="form-control" placeholder="Select mode" >
                        <option value="{{$postDetails->userdetails->id}}">{{$postDetails->userdetails->email ?? 'No data'}}</option>
                            @foreach($recuriterinfo as $row)
                            @if($postDetails->userdetails->id != $row->id)
                            <option value="{{$row->id}}">{{$row->email}} ({{$row->name}})</option>
                            @endif
                            @endforeach
                          </select>  
                      </div>


                      <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="Salary">Post Close:</label>
                              <input type="text" class="form-control" id="close" value="{{$postDetails->jobs_filled ?? ''}}" name="close" placeholder="close post">
                            </div>
                            </div>


                      <div class="col-md-6">
                          <label for="Salary">Inactive <span style="color:red">*</span></label>

                          <select class="form-control" id="status">

                            <option value="">Select one</option>
                            <option value="1" @if($postDetails->isactive == 1) selected @endif>Active</option>
                            <option value="0" @if($postDetails->isactive == 0) selected @endif>In Active</option>


                          </select>
                        </div>
                        </div>




                      <br>
                      <br>
                      <input onclick="CreatePost('{{$postDetails->id}}')" style="background-color: #f23022;" type="submit" name="submit" value="Update Post" class="btn btn-primary btn-user btn-block col-md-3">
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
  function CreatePost(id) {
    // var skillslist = [];
    // for(var s = 1; )
    // alert(window.id);
    var role = $('#role').val()
    var description = $('#description').val()
    var skils = $('#choices-multiple-remove-button').val()
    var experience = $('#experience').val()
    var level = $('.level').val()
    var location = $('#location').val()
    var mode = $('.mode').val()
    var noofposts = $('#noofposts').val()
    var clientname = $('#clientname').val()
    var duration = $('#duration').val()
    var startdate = $('#startdate').val()
    var enddate = $('#enddate').val()
    var Salary = $('#Salary').val()
    var salarytype = $('#salarytype').val()
    var close = $('#close').val()
    var status = $('#status').val()
    var type = $('#type').val()
    var number = $('#number').val()
    var contactemail = $('#contactemail').val()
    var recruiter = $('#recruiter').val()
    var exp = [];
    var skill = [];
    var x = 0;
    for(var i = 1; i <= window.idt; i++){
      if(i % 2 != 0){
        debugger;
        skill[x] = $('#input_text'+ i).val();
        exp[x] = $('#input_text_exp'+ i).val();
        x++
      }
    }
    debugger;
    $.ajax({
      type: 'POST',
      url: '/Updatepost',
      data: {
        '_token': '{{ csrf_token() }}',
        'id' : id,
        'role': role,
        'description': description,
        'skils': skils,
        'experience': experience,
        'level': level,
        'location': location,
        'mode': mode,
        'noofposts' : noofposts,
        'clientname': clientname,
        'duration': duration,
        'startdate': startdate,
        'enddate' : enddate,
        'Salary': Salary,
        'salarytype' : salarytype,
        'type': type,
        'close' : close,
        'status' : status,
        'number': number,
        'contactemail': contactemail,
        'recruiter': recruiter,
        'exp' : exp,
        'skill' : skill
      },
      success: function(data) {
        if (data == 1) {
          
          $('#techonologies').load(location.href + ' #techonologies');
          // role = $('#role').val('')
          // description = $('#description').val('')
          // skils = $('#skils').val('')
          // experience = $('#experience').val('')
          // level = $('.level').val('')
          // location = $('#location').val('')
          // mode = $('.mode').val('')
          // clientname = $('#clientname').val('')
          // duration = $('#duration').val('')
          // startdate = $('#startdate').val('')
          // Salary = $('#Salary').val('')
          // type = $('#type').val('')
          // number = $('#number').val('')
          // contactemail = $('#contactemail').val('')
          // recruiter = $('#recruiter').val('')
          $(document).ready(function() {
            swal({
              title: "Post Updated Sucessfully",
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
  $(document).ready(function() {
    // alert('hjhfjgf')
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
      removeItemButton: true,
      maxItemCount: 5,
      searchResultLimit: 5,
      renderChoiceLimit: 5
    });
  });
</script>
<script>
  function deletetechonology(id)
  {
    $.ajax({
      type: 'POST',
      url: '/Updatepostskill',
      data: {
        '_token': '{{ csrf_token() }}',
        'id' : id
      },
      success: function(data) {
        if(data.success = true)
        {
          $("#techonologies").load(location.href + " #techonologies");
        }else{
          alert('something Wrong')
        }
      }
    });
  }
  function add_field() {
    var total_text = document.getElementsByClassName("input_text");
    total_text = total_text.length + 1;
    window.idt = total_text

    document.getElementById("field_div").innerHTML = document.getElementById("field_div").innerHTML + " <p id = 'input_text"+total_text+"_wrapper'><input type = 'text' class = 'input_text' name='exp[]' id = 'input_text"+total_text+"' placeholder = 'Enter Skills'>&nbsp;&nbsp;<input type = 'text' class = 'input_text' name='exp[]' id = 'input_text_exp"+total_text+"' placeholder = 'Experience'>  <input type = 'button' value = 'Remove' onclick = remove_field('input_text"+total_text+"');> </p>";
  }

  function remove_field(idt) {
    window.idt = window.idt - 1;
    document.getElementById(idt + "_wrapper").innerHTML = "";
  }

  function editenable()
  {
    $('#viewpost').empty()
    $('#viewpost').append("Edit Post")
    $('#editdata').css('pointer-events','auto');
  }
  </script>