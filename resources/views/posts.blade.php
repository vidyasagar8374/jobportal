<style>
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

/* Loader Animation */
#loader img {
    animation: spin 2s linear infinite; /* Make it spin for a wow effect */
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
    <th colspan="1"><strong>Applicants</strong></th>
    </tr>
    
    </tr>
    <tr>
    <th>Number</th>
    <th>Email</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th colspan="2"></th>
    <th></th>
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
    <td><a href="{{route('employereditpost', [$info->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
</a></td> 

<td><a href="{{route('viewApplications', [$info->id])}}"><svg width="15px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z"/></svg></a></td>
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

<!-- <div class="modal fade" id="jobclosemodal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" onclick="closejobmodal()" >×</button> 
				</div> 
				<div class="modal-body">
          Are You Sure You Want To close 
					<p id="jobtitle"></p>
          <label for="postfilled">Filled Posts</label>
          <input type="number" id="postfilled" class="form-control">
          <input type="hidden" id="jobid" >
				</div>   
				<div class="modal-footer">
					<button type="button" class="btn btn-default" onclick="closejobPost()">Close</button>                               
				</div>
			</div>                                                                       
		</div>                                           -->
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
  const page = @json($page);
  
  debugger
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
          debugger
          var postId = result.data.id
          var title = result.data.role
          $('#jobtitle').append(title)
          $('#jobid').val(postId)
          $('#jobclosemodal').modal('show')
        }else{
          alert('OOPS! Something Went Wrong')
        }
        debugger;
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
              $('#tag_conatiner').html(response.html);
              // initializeStatusDropdowns();
          }
      });
  }
</script>