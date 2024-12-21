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
</style>
<div id="initilize" class="container">
<table>
    <tbody>
    <tr>
    <th rowspan="2"><strong>Job Id</strong></th>
    <th rowspan="2"><strong>Level</strong></th>
    <th rowspan="2"><strong>Location</strong></th>
    <th rowspan="2"><strong>No Of Posts</strong></th>
    <th colspan="2"><strong>Details</strong></th>
    <th colspan="2"><strong>Dates</strong></th>
    <th colspan="2"><strong>Skills</strong></th>
    </tr>
    <tr>
    <th>Number</th>
    <th>Email</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th colspan="2"></th>
    


    </tr>
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
    
    <td>
    @foreach($info->jobskills as $index => $skill)
    {{$skill->info->techonology}} {{ $index + 1 < count($info->jobskills) ? ',' : '' }}
    @endforeach
    </td>
    </tr>
    @endforeach
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




<script>
 
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
  // });
  function getpostsData(page){
    $.ajax({
          url: "{{ route('viewposts') }}",
          method: "POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
              // keyword: keyword,
              // category: window.categoryid,
              page: page
          },
          success: function(response) {
              $('#tag_container').html(response.html);
              // initializeStatusDropdowns();
          }
      });
  }
</script>