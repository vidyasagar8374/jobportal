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

  table tbody tr{
    border:1px solid #2e2e2e;
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
      
      <button  onclick="Addcandidate()"  class="mb-3 mt-3 mx-3 btn btn-primary">+ Add Candidate</button>
        
  @include('Employer.candidate')



    </main>
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Candidate Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span onclick="removedata()" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row my-1">
          <div class="col" style="display:flex">
            <b style="color:red">Id : </b> &nbsp;&nbsp; <p id="id"></p>
        </div>
      </div>
      <div class="row my-1">
          <div class="col-md-6" style="display:flex">
            <b style="color:red">First Name: </b> &nbsp;&nbsp; <b id="fname" style="color:#2e2e2e"></b>
        </div>
      </div>
      <div class="row my-1">
      <div class="col-md-6" style="display:flex">
            <b style="color:red">Middle Name: </b> &nbsp;&nbsp; <b id="mname" style="color:#2e2e2e"></b>
        </div>
    </div>
      <div class="row my-1">
          <div class="col-md-6" style="display:flex">
            <b style="color:red">Last Name:  </b> &nbsp;&nbsp; <b id="lname" style="color:#2e2e2e"></b>
        </div>
      </div>
      <div class="row my-1">
      <div class="col-md-6" style="display:flex">
            <b style="color:red">Number: </b> &nbsp;&nbsp; <b id="contactnumber" style="color:#2e2e2e"></b>
        </div>
    </div>
      <div class="row my-1">
          <div class="col-md-6" style="display:flex">
            <b style="color:red">Email:  </b> &nbsp;&nbsp; <b id="email" style="color:#2e2e2e"></b>
        </div>

        <div class="row my-1">
          <div class="col-md-12" style="display:flex">
            <b style="color:red">Contact Email:  </b> &nbsp;&nbsp; <b id="contactemail" style="color:#2e2e2e"></b>
        </div>
       
      </div>
      <div class="row my-1">

      <div class="col-md-6" style="display:flex">
            <b style="color:red">Location: </b> &nbsp;&nbsp; <b id="location" style="color:#2e2e2e"></b>
        </div>
    </div>
      <div class="row my-1">
          <div class="col-md-6" style="display:flex">
            <b style="color:red">Work Authorization:  </b> &nbsp;&nbsp; <b id="authorization" style="color:#2e2e2e"></b>
        </div>
       
      </div>
      <div class="row my-1">

      <div class="col-md-6" style="display:flex">
            <b style="color:red">Title: </b> &nbsp;&nbsp; <b id="title" style="color:#2e2e2e"></b>
        </div>
    </div>
      <div class="row my-1">
          <div class="col-md-6" style="display:flex">
            <b style="color:red">Expected Rate:  </b> &nbsp;&nbsp; <b id="expectedate" style="color:#2e2e2e"></b>
        </div>
        
      </div>
      <div class="row my-1">

      <!-- <div class="col-md-6" style="display:flex">
            <b style="color:red">Expected Rate: </b> &nbsp;&nbsp; <b id="expectedrate" style="color:#2e2e2e"></b>
        </div> -->
    </div>
      <div class="row my-1">
          <div class="col-md-6" style="display:flex">
            <b style="color:red">Relocate:  </b> &nbsp;&nbsp; <b id="relocate" style="color:#2e2e2e"></b>
        </div>
       
      </div>
      <div class="row my-1">

      <div class="col-md-6" style="display:flex">
            <b style="color:red">Travel: </b> &nbsp;&nbsp; <b id="travel" style="color:#2e2e2e"></b>
        </div>
    </div>
      <div class="row my-1">
          <div class="col-md-6" style="display:flex">
            <b style="color:red">Experience:  </b> &nbsp;&nbsp; <b id="experience" style="color:#2e2e2e"></b>
        </div>
       
      </div>
      <div class="row my-1">

      <div class="col-md-6" style="display:flex">
            <b style="color:red">Highest Education: </b> &nbsp;&nbsp; <b id="education" style="color:#2e2e2e"></b>
        </div>
    </div>
      <div class="row my-1">
          <div class="col-md-8" style="display:flex">
            <b style="color:red">Linked in:  </b> &nbsp;&nbsp; <b id="linkedin" style="color:#2e2e2e"></b>
        </div>
        
      </div>
      <div class="row my-1">

      <div class="col-md-12" style="display:flex">
            <b style="color:red">Avaliable Date: </b> &nbsp;&nbsp; <b id="availabledate" style="color:#2e2e2e"></b>
        </div>
    </div>


    <div class="row my-2">

      <div class="col-md-12" style="display:flex">
            <b style="color:red">Skills: </b> &nbsp;&nbsp; <b id="skills" style="color:#2e2e2e"></b>
        </div>
    </div>


    <div class="col-md-12" style="display:flex">
            <b style="color:red"> Post Created Date: </b> &nbsp;&nbsp; <b id="cdate" style="color:#2e2e2e"></b>
        </div>
    </div>


        <!-- : <p id="skills"></p> -->
        <!-- <p id="cdate"></p> -->

      </div>
      <div class="modal-footer">
        <button type="button" onclick="removedata()" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>  
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>  
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>  

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

  function Addcandidate()
  {
    window.location.href  = '{{route('addcandidate')}}'
  }
  function candidatedetails(id)
  {
    $('#id').empty();
    $('#fname').empty(); 
    $('#mname').empty(); 
    $('#lname').empty(); 
    
    $('#salary').empty(); 
    $('#travel').empty(); 
    $('#experience').empty(); 
    $('#education').empty(); 
     $('#linkedin').empty(); 
    
    $('#contactnumber').empty();
    $('#email').empty();
    $('#location').empty();
    $('#authorization').empty();
    $('#title').empty();
    $('#expectedate').empty();
    $('#relocate').empty();
    $('#availabledate').empty();
    $('#skills').empty();
    $('#contactemail').empty();

    $('#cdate').empty();
    $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'post',
      url : 'getcandidatedetails',
      data : {
        'id' : id
      },
      success:function (result)
      {
        debugger;
        $('#id').append(result.id);
        $('#fname').append(result.firstname);
        $('#mname').append(result.middlename); 
        $('#lname').append(result.lastname);
        $('#contactnumber').append(result.contactnumber);
        $('#email').append(result.email);
        $('#contactemail').append(result.contactemail);
        $('#location').append(result.location);
        if(result.authorization == 1){
          $('#authorization').append('HIB');
        }else if(result.authorization == 2){
          $('#authorization').append('EAD');
        }else if(result.authorization == 3){
          $('#authorization').append('GC');
        }else if(result.authorization == 4){
          $('#authorization').append('Citizen');
        }
        $('#title').append(result.title);
        $('#expectedate').append(result.expectedate);
        $('#expectedate').append(result.salary);
        if(result.relocate == 1)
        {
          $('#relocate').append('Yes');
        }else{
          $('#relocate').append('No');
        }
        $('#travel').append(result.travel == 1 ? 'Yes' : 'NO');
        $('#experience').append(result.experience);
        $('#education').append(result.education);
        $('#linkedin').append(result.linked);
        $('#availabledate').append(result.avaliabledate);
        for(var x = 0; x < result.addedskills.length; x++){
          $('#skills').append(result.addedskills[x].skillname.techonology + ',');
        }
        $('#cdate').append(result.created_at);
      }
    })
  }
  new DataTable('#example');
</script>
