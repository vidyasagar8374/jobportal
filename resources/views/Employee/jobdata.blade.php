<!DOCTYPE html>
<html>
<head>
  
    <title>Job Portal</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    
    <link href="{{asset('assets1/css/mainnodatatable.css?v=1.1')}}" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="{{asset('assets1/css/main.css?v=1.1')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.1.0/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-OaSt6YlNk8f06OeGRPsV4UfP2F3Si8sd9Rqxt7iOdIsBKk+zbBLgwCyBwoBqLjDE" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.1.0/dist/js/coreui.bundle.min.js" integrity="sha384-fb63TspjFf2/L20tRe69tGsAXArSQe9u0yJ/9+5w1jbov1NYHiDv/+4Rdh2FSnEd" crossorigin="anonymous"></script>
 
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">

    <style>
        /* Optional: Style for better presentation */
        .select2-container--default .select2-selection--multiple {
            height: auto !important;
        }
    

    </style>


  </head>
<body>
<style>
  .button-color{
    color:#FFFF;
    background-color: #FF6158;
    border-color:#FF6158
  }
  .range_container {
  display: flex;
  flex-direction: column;
  width: 80%;
  margin: 100px auto;
}

.sliders_control {
  position: relative;
  min-height: 50px;
}

.form_control {
  position: relative;
  display: flex;
  justify-content: space-between;
  font-size: 24px;
  color: #635a5a;
}

input[type=range]::-webkit-slider-thumb {
  -webkit-appearance: none;
  pointer-events: all;
  width: 24px;
  height: 24px;
  background-color: #fff;
  border-radius: 50%;
  box-shadow: 0 0 0 1px #C6C6C6;
  cursor: pointer;
}

input[type=range]::-moz-range-thumb {
  -webkit-appearance: none;
  pointer-events: all;
  width: 24px;
  height: 24px;
  background-color: #fff;
  border-radius: 50%;
  box-shadow: 0 0 0 1px #C6C6C6;
  cursor: pointer;  
}

input[type=range]::-webkit-slider-thumb:hover {
  background: #f7f7f7;
}

input[type=range]::-webkit-slider-thumb:active {
  box-shadow: inset 0 0 3px #387bbe, 0 0 9px #387bbe;
  -webkit-box-shadow: inset 0 0 3px #387bbe, 0 0 9px #387bbe;
}

input[type="number"] {
  color: #8a8383;
  width: 50px;
  height: 30px;
  font-size: 20px;
  border: none;
}

input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button {  
   opacity: 1;
}

input[type="range"] {
  -webkit-appearance: none; 
  appearance: none;
  height: 2px;
  width: 100%;
  position: absolute;
  background-color: #C6C6C6;
  pointer-events: none;
}

#fromSlider {
  height: 0;
  z-index: 1;
}


    /* Loader Animation */
    #loader img {
            animation: spin 2s linear infinite; /* Make it spin for a wow effect */
        }

        .select2-container {
            z-index: 1050 !important; /* Same z-index as Bootstrap modal */
        }

        .select2-dropdown {
            z-index: 1060 !important; /* Slightly higher than the modal */
        }
  </style>
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
     <!-- sdfsf -->
     <br>

<div class="container">
  <div class="row">
  <div class="col-md-2">
  <label style="background-color:#FF615">Skills
  </label>
  <select class="form-select select2-multi" multiple="multiple" name="technologies[]">
        <option value="1">HTML</option>
        @foreach($techonologies as $tech)
                <option value="{{ $tech->id }}">{{ $tech->techonology }}</option>
         @endforeach
    </select>
    </div>

    <div class="col-md-1">
      <label>Level</label>
      <select class="form-control" id="level">
      <option value=""></option>
        <option value="Mid">Mid</option>
        <option value="Junior">Junior</option>
        <option value="Senior">Senior</option>
      </select>
    </div>
    <div class="col-md-3">
      <label>Experience In Years:</label>
      <span id="expvalue">0- {{ $appliedTechnologies->experience ?? 1 }}</span>
      <div class="sliders_control" style="margin-top:20px">
        <input id="fromSlider" type="range" value="0" min="0" max="{{ $appliedTechnologies->experience ?? 1  }}"/>
        <input id="toSlider" type="range" value="{{ $appliedTechnologies->experience ?? 1 }}" min="0" max="{{ $appliedTechnologies->experience ?? 1 }}"/>
      </div>

      <!-- <div class="form_control_container"> -->
          <!-- <div class="form_control_container__time">Max</div> -->
          <!-- <input class="form_control_container__time__input" type="number" id="toInput" value="30" min="0" max="100"/> -->
        <!-- </div> -->
    <!-- </div> -->


    </div>
    <div class="col-md-2">
      <label>Mode</label>
      <select class="form-control" id="mode">
      <option value=""></option>
        <option value="1">Remote</option>
        <option value="2">Hybrid</option>
        <option value="3">Inperson</option>
      </select>
    </div>
    <div class="col-md-2">
      <label>Salary</label>
      <input type="salary" name="salary" class="form-control" id="salary">
    </div>
    <div class="col-md-1">
    <label>Type</label>
      <select class="form-control" id="type">
        <option value=""></option>
        <option value="Hour">Hour</option>
        <option value="Anum">Anum</option>
      </select>
    </div>
    <div class="col-md-1">
      <label></label>
      <input style="margin-top:10px" class="button-color" type="submit" onClick="filterData()" name="submit" class="form-control">
    </div>
  </div>
  <br>
</div>
  
</div>


     <!-- table start -->
     <div id="tag_container">
      
@include('jobpostlist')
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

<style>
  .select2-container {
    z-index: 9999 !important; /* Higher than modal */
}

.select2-dropdown {
    z-index: 10000 !important; /* Higher than the modal */
}
</style>

  <!-- jQuery (required for Select2) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jque
$('#multiple-select').mobiscroll().select({
  
    inputElement: document.getElementById('my-input'),
    touchUi: false
});ry.min.js"></script> -->

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




<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>  

</script>


    
<script>
//   $('#employeeModal').on('show.bs.modal', function (event) {

//   var button = $(event.relatedTarget); // Button that triggered the modal
//   var infoId = button.data('info-id'); // Extract info-id from data-* attribute

//   // Update the hidden input in the modal with the extracted info->id
//   var modal = $(this);
//   modal.find('#infoId').val(infoId);
// });
// $(document).ready(function() {
//     // Initialize Select2 when the modal is shown
//     $('#employeeModal').on('shown.bs.modal', function () {
//         $('#multiple-select').select2({
//             dropdownParent: $('#employeeModal') // Attach dropdown to the modal
//         });
//     });
// });



</script>



<!-- <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> -->
<script type="text/javascript">
  // $(function () {
    
  //   var table = $('.yajra-datatable').DataTable({
  //       processing: true,
  //       serverSide: true,
  //       ajax: "{{ route('viewposts') }}",
  //       columns: [
  //           {data: 'id', name: 'id'},
  //           {data: 'role', name: 'role'},
  //           {data: 'experience', name: 'experience'},
  //           {data: 'location', name: 'location'},
  //           {data: 'Salary', name: 'salary'},
  //           {data: 'contactemail', name: 'contactemail'},
  //           {
  //               data: 'action', 
  //               name: 'action', 
  //               orderable: true, 
  //               searchable: true,
  //           },
  //           // {
  //           //     data: 'actions', 
  //           //     name: 'actions', 
  //           //     orderable: true, 
  //           //     searchable: true
  //           // },
            
  //       ]
  //   });
    
  // });
  function editpost()
  {
    alert('cvdfgfg')
  }
  function viewJobdetails(id)
  {
    $('#role').empty();
    $('#description').empty(); 
    $('#experience').empty();
    $('#level').empty();
    $('#location').empty();
    $('#mode').empty();
    $('#clientname').empty();
    $('#duration').empty();
    $('#date').empty();
    $('#salary').empty();
    $('#email').empty();
    $('#languages').empty();
    
    $('#recuriter').empty();
    $('#cdate').empty();
    $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'post',
      url : 'getjobdetails',
      data : {
        'id' : id
      },
      success:function (result)
      {
        debugger
        for (let i = 0; i < result.jobskills.length; i++) {
          $('#languages').append(result.jobskills[i].info.techonology + ',');
        }
        var modes = result.mode == 1 ? 'Remote' : (result.mode == 2 ? 'Hybrid' : (result.mode == 3 ? 'Inperson' : ''))
        $('#role').append(result.role);
        $('#description').append(result.description); 
        $('#experience').append(result.experience);
        $('#level').append(result.level);
        $('#location').append(result.location);
        $('#mode').append(modes);
        $('#clientname').append(result.clientname);
        $('#duration').append(result.duration);
        $('#date').append(result.startdate);
        $('#salary').append(result.Salary);
        $('#email').append(result.contactemail);
        $('#recuriter').append(result.recruiter);
        $('#cdate').append(result.created_at);
      }
    })
  }
  function removedata()
  {
    $('#role').empty();
    $('#description').empty(); 
    $('#experience').empty();
    $('#level').empty();
    $('#location').empty();
    $('#mode').empty();
    $('#clientname').empty();
    $('#duration').empty();
    $('#date').empty();
    $('#salary').empty();
    $('#email').empty();
    $('#recuriter').empty();
    $('#cdate').empty();
    $('#languages').empty();
  }
  function Deletepost(id)
  {
    debugger;
    $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'post',
      url : 'DeleteJob',
      data : {
        'id' : id
      },
      success:function (result)
      {
        if(result == 1)
        {
          swal({
              title: "Post Deleted Sucessfully",
              text: "Success",
              icon: "success",
              button: "Ok",
              timer: 3000
            });
            getdata.call()

            
        }else{
          swal({
              title: "Some Thing Went Wrong!",
              text: "error",
              icon: "error",
              button: "Ok",
              timer: 3000
            });
        }
      }
    })
  }
  function Restorepost(id)
  {
    $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'post',
      url : 'RestoreJob',
      data : {
        'id' : id
      },
      success:function (result)
      {
        if(result == 1)
        {
          swal({
              title: "Post Restored Sucessfully",
              text: "Success",
              icon: "success",
              button: "Ok",
              timer: 3000
            });
            getdata.call()
            // $("#userinfo").load(location.href + " #userinfo");

            
        }else{
          swal({
              title: "Some Thing Went Wrong!",
              text: "error",
              icon: "error",
              button: "Ok",
              timer: 3000
            });
        }
      }
    })
  }
 $("#poststatus").on('change', function(){
    getdata.call()
 });
$("#userdetails").on('change', function(){
   getdata.call()
});
function search(){
 getdata.call()
}
function getdata()
{
  var selected = $('#poststatus').val();
  var user = $('#userdetails').val();
  debugger;
  if(selected == "All"){
    selected = 1;
  }else if(selected == "Active"){
    selected = 2;
  }else if(selected == "Inactive"){
    selected = 3;
  }
    $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'post',
      url : 'viewpostsinfo',
      data : {
        'id' : selected,
        'user' : user,
        'search' : $('#searchinput').val()
      },
      success:function (result)
      {
        $('#usersdata').empty()
        if(result.data){
            for(var i = 0; i < result.data.length; i++){
              var recuiter = 'nodata'
              if(result.data[i].userdetails != null){
                var recuiter = result.data[i].userdetails.email
              }
              if(result.data[i].is_closed == 1){
                var jobstatus = 'closed'
              }else{
                var jobstatus = "close"
              }
            if(result.data[i].isactive == 1){
              $('#usersdata').append('<tr><td><span class="badge badge-warning rounded-pill d-inline">'+ result.data[i].id +'</span></td><td>'+ result.data[i].role +'</td><td><span class="badge badge-warning rounded-pill d-inline">'+ result.data[i].experience +'</span></td><td>'+ result.data[i].location +'</td><td>'+ result.data[i].Salary +'</td><td>'+ result.data[i].contactemail +'</td><td>'+ recuiter +'</td><td><a href="employereditpost/'+result.data[i].id+'"><i class="fa fa-pen" style="color:black" aria-hidden="true"></i></a>&nbsp;&nbsp; <i onclick="Deletepost('+result.data[i].id+')" style="color:red; cursor:pointer"   class="fa fa-trash"></i>&nbsp;&nbsp;<i onclick="viewJobdetails('+result.data[i].id+')" data-toggle="modal" data-target="#exampleModalLong" class="fa fa-eye" style="color:blue; cursor:pointer" aria-hidden="true"></i></td><td><span style="cursor: pointer;" class="badge badge-warning rounded-pill d-inline" onclick="jobClose('+ result.data[i].id +')">'+jobstatus+'</span></td><td><i onclick="Applicantdetails('+result.data[i].id+')" class="fa fa-eye" style="color:blue; cursor:pointer"></i></td></tr>')
            }else{
              $('#usersdata').append('<tr><td><span class="badge badge-warning rounded-pill d-inline">'+ result.data[i].id +'</span></td><td>'+ result.data[i].role +'</td><td><span class="badge badge-warning rounded-pill d-inline">'+ result.data[i].experience +'</span></td><td>'+ result.data[i].location +'</td><td>'+ result.data[i].Salary +'</td><td>'+ result.data[i].contactemail +'</td><td>'+ recuiter +'</td><td><a href="employereditpost/'+result.data[i].id+'"><i class="fa fa-pen" style="color:black" aria-hidden="true"></i></a>&nbsp;&nbsp; <i onclick="Restorepost('+result.data[i].id+')" style="color:red; cursor:pointer"  class="fa fa-recycle"></i> &nbsp;&nbsp; <i onclick="viewJobdetails('+result.data[i].id+')" data-toggle="modal" data-target="#exampleModalLong" class="fa fa-eye" style="color:blue; cursor:pointer" aria-hidden="true"></i></td><td><span style="cursor: pointer;" class="badge badge-warning rounded-pill d-inline" onclick="jobClose('+ result.data[i].id +')">'+jobstatus+'</span></td><td><i onclick="Applicantdetails('+result.data[i].id+')" class="fa fa-eye" style="color:blue; cursor:pointer"></i></td></tr>')
            }
          }
        }else{
          for(var i = 0; i < result.length; i++){
            var recuiter = 'nodata'
              if(result[i].userdetails != null){
                var recuiter = result[i].userdetails.email
              }
              if(result[i].is_closed == 1){
                var jobstatus = 'closed'
              }else{
                var jobstatus = "close"
              }
            if(result[i].isactive == 1){
              $('#usersdata').append('<tr><td><span class="badge badge-warning rounded-pill d-inline">'+ result[i].id +'</span></td><td>'+ result[i].role +'</td><td><span class="badge badge-warning rounded-pill d-inline">'+ result[i].experience +'</span></td><td>'+ result[i].location +'</td><td>'+ result[i].Salary +'</td><td>'+ result[i].contactemail +'</td><td>'+ recuiter +'</td><td><a href="employereditpost/'+result[i].id+'"><i class="fa fa-pen" style="color:black" aria-hidden="true"></i></a>&nbsp;&nbsp; <i onclick="Deletepost('+result[i].id+')" style="color:red; cursor:pointer"   class="fa fa-trash"></i>&nbsp;&nbsp;<i onclick="viewJobdetails('+result[i].id+')" data-toggle="modal" data-target="#exampleModalLong" class="fa fa-eye" style="color:blue; cursor:pointer" aria-hidden="true"></i></td><td><span style="cursor: pointer;" class="badge badge-warning rounded-pill d-inline" onclick="jobClose('+ result[i].id +')">'+jobstatus+'</span></td><td><i onclick="Applicantdetails('+result.data[i].id+')" class="fa fa-eye" style="color:blue; cursor:pointer"></i></td></tr>')
            }else{
              $('#usersdata').append('<tr><td><span class="badge badge-warning rounded-pill d-inline">'+ result[i].id +'</span></td><td>'+ result[i].role +'</td><td><span class="badge badge-warning rounded-pill d-inline">'+ result[i].experience +'</span></td><td>'+ result[i].location +'</td><td>'+ result[i].Salary +'</td><td>'+ result[i].contactemail +'</td><td>'+ recuiter +'</td><td><a href="employereditpost/'+result[i].id+'"><i class="fa fa-pen" style="color:black" aria-hidden="true"></i></a>&nbsp;&nbsp; <i onclick="Restorepost('+result[i].id+')" style="color:red; cursor:pointer"  class="fa fa-recycle"></i> &nbsp;&nbsp; <i onclick="viewJobdetails('+result[i].id+')" data-toggle="modal" data-target="#exampleModalLong" class="fa fa-eye" style="color:blue; cursor:pointer" aria-hidden="true"></i></td><td><span style="cursor: pointer;" class="badge badge-warning rounded-pill d-inline" onclick="jobClose('+ result[i].id +')">'+jobstatus+'</span></td><td><i onclick="Applicantdetails('+result.data[i].id+')" class="fa fa-eye" style="color:blue; cursor:pointer"></i></td></tr>')
            }
          }
        }
      }
    });
}
function Applicantdetails(id){
  window.location.href = 'applications-recived/' + id
}
function constlantApplicantdetails(id){
  window.location.href = 'candidates/recived/' + id
}
function controlFromInput(fromSlider, fromInput, toInput, controlSlider) {
    const [from, to] = getParsed(fromInput, toInput);
    fillSlider(fromInput, toInput, '#C6C6C6', '#25daa5', controlSlider);
    if (from > to) {
        fromSlider.value = to;
        fromInput.value = to;
    } else {
        fromSlider.value = from;
    }
}
    
function controlToInput(toSlider, fromInput, toInput, controlSlider) {
    const [from, to] = getParsed(fromInput, toInput);
    fillSlider(fromInput, toInput, '#C6C6C6', '#25daa5', controlSlider);
    setToggleAccessible(toInput);
    if (from <= to) {
        toSlider.value = to;
        toInput.value = to;
    } else {
        toInput.value = from;
    }
}

function controlFromSlider(fromSlider, toSlider, fromInput) {
  const [from, to] = getParsed(fromSlider, toSlider);
  $('#expvalue').empty()
  $('#expvalue').text(from +'-' + to)
  fillSlider(fromSlider, toSlider, '#C6C6C6', '#25daa5', toSlider);
  if (from > to) {
    fromSlider.value = to;
    fromInput.value = to;
  } else {
    fromInput.value = from;
  }
}

function controlToSlider(fromSlider, toSlider, toInput) {
  const [from, to] = getParsed(fromSlider, toSlider);
  $('#expvalue').empty()
  $('#expvalue').text(from +'-' + to)
  fillSlider(fromSlider, toSlider, '#C6C6C6', '#25daa5', toSlider);
  setToggleAccessible(toSlider);
  if (from <= to) {
    toSlider.value = to;
    toInput.value = to;
  } else {
    toInput.value = from;
    toSlider.value = from;
  }
}

function getParsed(currentFrom, currentTo) {
  const from = parseInt(currentFrom.value, 10);
  const to = parseInt(currentTo.value, 10);
  return [from, to];
}

function fillSlider(from, to, sliderColor, rangeColor, controlSlider) {
    const rangeDistance = to.max-to.min;
    const fromPosition = from.value - to.min;
    const toPosition = to.value - to.min;
    controlSlider.style.background = `linear-gradient(
      to right,
      ${sliderColor} 0%,
      ${sliderColor} ${(fromPosition)/(rangeDistance)*100}%,
      ${rangeColor} ${((fromPosition)/(rangeDistance))*100}%,
      ${rangeColor} ${(toPosition)/(rangeDistance)*100}%, 
      ${sliderColor} ${(toPosition)/(rangeDistance)*100}%, 
      ${sliderColor} 100%)`;
}

function setToggleAccessible(currentTarget) {
  const toSlider = document.querySelector('#toSlider');
  if (Number(currentTarget.value) <= 0 ) {
    toSlider.style.zIndex = 2;
  } else {
    toSlider.style.zIndex = 0;
  }
}

const fromSlider = document.querySelector('#fromSlider');
const toSlider = document.querySelector('#toSlider');
const fromInput = document.querySelector('#fromInput');
const toInput = document.querySelector('#toInput');
fillSlider(fromSlider, toSlider, '#C6C6C6', '#25daa5', toSlider);
setToggleAccessible(toSlider);

fromSlider.oninput = () => controlFromSlider(fromSlider, toSlider, fromInput);
toSlider.oninput = () => controlToSlider(fromSlider, toSlider, toInput);
fromInput.oninput = () => controlFromInput(fromSlider, fromInput, toInput, toSlider);
toInput.oninput = () => controlToInput(toSlider, fromInput, toInput, toSlider);




$(document).ready(function() {
//   $('#multiple-select').mobiscroll().select({
  
//   inputElement: document.getElementById('my-input'),
//   touchUi: false
// });
    // $('.select2-multi').select2({
    //     dropdownParent: $('#employeeModal') // Ensure dropdown appears inside modal
    // });
});
function filterData(){
  getpostsData()
}





</script>

</body>
</html>