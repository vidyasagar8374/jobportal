   <!-- Bootstrap CSS -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
  <style>
     .select2-container--default .select2-selection--multiple {
            height: auto !important;
        }
  table {
    border-collapse: collapse;
    width: 100%;
  }
  td, th {
    border: 1px solid #dddddd;
    text-align: center;
    padding:6px 20px;
  }
  tr th {
  border: 1px solid #dddddd;
    text-align: center;
    padding:6px 20px;
    background-color: #FF6158;
    color:#fff;
  }
  tr:hover {
    background-color: #dddddd;
    cursor: pointer;
  }
  .content td, .content th {
      border-top: 1px solid transparent;
      padding: 2px 10px 2px 15px;
  }
  /* Full-Screen Loader */
#loader {
    position: fixed;
    z-index: 9999; /* Ensure it's above everything */
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
    display: flex;
    justify-content: center;
    align-items: center;
    backdrop-filter: blur(5px); /* Optional: Adds a blur effect to background */
}

  .select2-container {
    z-index: 9999 !important; /* Higher than modal */
}

.select2-dropdown {
    z-index: 10000 !important; /* Higher than the modal */
}

/* Spin Animation */
@keyframes spin {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}


</style>
</head>
<body>

<div id="initilize" class="container">
<table>
<div id="loader" style="display: none;">
    <img src="https://cdn.pixabay.com/animation/2023/05/02/04/29/04-29-06-428_512.gif" height="50" width="50" alt="Loading...">

    </div>
    <tbody>

  
    <tr>
    <th rowspan="2"><strong>Job Id</strong></th>
    <th rowspan="2"><strong>Level</strong></th>
    <th rowspan="2"><strong>Location</strong></th>
    <th rowspan="2"><strong>No Of Posts</strong></th>
    <th colspan="2"><strong>Details</strong></th>
    <th colspan="2"><strong>Dates</strong></th>
    <th colspan="2"><strong>Skills</strong></th>
    <th colspan="1"><strong>Actions</strong></th>
    </tr>
    
    </tr>
    <tr>
    <th>Number</th>
    <th>Email</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th colspan="2"></th>
    <th></th>
   
    


    </tr>
    @if(count($data) == 0)
    <td colspan="12">No Data</td>
    @else
    @foreach($data as $info)
      <tr>
    <td>{{$info->id}}</td>
    <td>{{$info->level}}</td>
    <td>{{$info->location}}</td>
    <td>{{$info->noofposts}}</td>
    <td>{{$info->number}}</td>
    <td>{{$info->contactemail}}</td>
    <td>{{$info->startdate}}</td>
    <td>{{$info->enddate}}</td>
    
    <td colspan="2">
    @foreach($info->jobskills as $index => $skill)
    {{$skill->info->techonology}} {{ $index + 1 < count($info->jobskills) ? ',' : '' }}
    @endforeach
    </td>
    <td><!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" onclick="openModal({{ $info->id }})">
  Apply
</button>



</td> 
    </tr>
    @endforeach
    @endif
    </tbody>
    </table>
    <div id="pagination-container" style="margin-top:15px">
        {{ $data->links() }}
    </div>

</div>


<br>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade jobmodel" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="employeeModalLabel">Employee List</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form inside the modal -->
        <form id="employeeForm">
          <!-- Hidden input for the info->id -->
          <input type="hidden" id="infoId" name="info_id" value="">

          <div class="mb-3">
            <label for="employeeEmail" class="form-label">Select Employee Email</label>
            <select class="form-select select2-multi" multiple="multiple" id="multiple-select" name="technologies[]">
            
              
            
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveBtnjob">Save</button>
      </div>
    </div>
  </div>
</div>
  

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
                            
	</div>

<?php

if($page == 'all'){
  $route = route('viewposts');
}elseif($page == 'closed'){
  $route = route('viewpostsclosed');
}elseif($page == 'inactive'){
  $route = route('viewpostsinactive');
}elseif($page == 'apply'){
  $route = route('sales.jobapply');
}

?>



  



<script>  

    $(document).ready(function() {
        // Initialize Select2 on the select element
        $('.select2-multi').select2({
            placeholder: "Select technologies",
            allowClear: true
        });
    });

</script>
<script>
  const page = @json($page);
  

	function jobClose(id)
  {
    $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type : "post",
      url : "/jobPostClose",
      data : {
        'id' : id
      },
      success: function(result){
        if(result.success == true){
          var postId = result.data.id
          var title = result.data.role
          $('#jobtitle').append(title)
          $('#jobid').val(postId)
          $('#jobclosemodal').modal('show')
        }else{
          alert('OOPS! Something Went Wrong')
        }

      }
    })
   
  }
  function closejobmodal()
  {
    $('#jobclosemodal').modal('hide')
    $('#jobtitle').empty()
    $('#jobid').val('')
  }
  function closejobPost()
  {
    var closeId = $('#jobid').val()
    var filled = $('#postfilled').val()

    closejobmodal()
    $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type : "post",
      url : "/jobClose",
      data : {
        'id' : closeId,
        'filled' : filled
      },
      success : function(result){
      location.reload()
      }

    })
    $('#jobclosemodal').modal('hide')
  }
  // document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('pagination-container').addEventListener('click', function(event) {
      event.preventDefault();
      const url = new URL(event.target.href);
      const pageNumber = url.searchParams.get('page');
      getpostsData(pageNumber)
    });
  function getpostsData(page){
    var skill = $('#multiple-select').val();
    var level = $('#level').val();
    var exp1 = $('#fromSlider').val();
    var exp2 = $('#toSlider').val();
    var mode = $('#mode').val();
    var salary = $('#salary').val();
    var type = $('#type').val();
    $('#loader').show();

    $.ajax({
          url: @json($route),
          method: "POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            level: level,
              exp1: exp1,
              exp2: exp2,
              mode: mode,
              salary: salary,
              skill: skill,
              page: page
          },
          success: function(response) {
            $('#loader').hide();
              $('#tag_container').html(response.html);
              // initializeStatusDropdowns();
          }
      });
  }


$('#employeeModal').on('shown.bs.modal', function () {
    $('#multiple-select').select2({
        dropdownParent: $('#employeeModal') // Attach dropdown to the modal
    });
});


function openModal(infoId) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "get",
        url: "{{ route('jobappliedlist') }}",
        data: {
            'id': infoId,
        },
        success: function(result) {
            if (result && result.data) {
                // Clear any previous options in the select element
                $('#multiple-select').empty();

                console.log(result.data);

                // Loop through the data and append options to the select element
                $.each(result.data, function(index, item) {
                    // Build option text with firstname and email
                    let optionText = item.firstname + ' (' + item.email + ')';

                    if (item.get_appliedlist) {
                        // Append disabled option if get_appliedlist is not null
                        $('#multiple-select').append(
                            $('<option>', {
                                text: optionText + ' (Already Applied)',
                                value: item.id,
                                disabled: true
                            })
                        );
                    } else {
                        // Append enabled option if get_appliedlist is null
                        $('#multiple-select').append(new Option(optionText, item.id));
                    }
                });
            } else {
                console.log('No data returned.');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching data:', error);
        }
    });

    // Set the value of the hidden input field
    document.getElementById('infoId').value = infoId;

    // Initialize the modal and show it
    $('#employeeModal').modal('show');
    // var myModal = new bootstrap.Modal(document.querySelector('.modal'));
    // myModal.show();
}

// model 
$('#saveBtnjob').click(function(e) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
        },
        type: 'POST', 
        url: '{{ route('sales.applyCandidateJob') }}', // Ensure the route is in quotes
        data: {
            'jobid': $('#infoId').val(), 
            'candidates': $('#multiple-select').val()
        },
        success: function(result) {
          $('#multiple-select').val(null).trigger('change');
          $('#employeeModal').removeClass('fade');
                $('.modal-backdrop').css('opacity', '0');

                $('#employeeModal').modal('hide');
                alert('Successfully updated!');           
        },
        error: function(xhr, status, error) {
            console.error("An error occurred: " + error); // Handle errors here
            console.log(xhr.responseText); // For debugging
            alert('Failed to update: ' + result.message);
        }
    });
});

</script>

</body>
</html>