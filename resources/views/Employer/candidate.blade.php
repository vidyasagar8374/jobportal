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
<div id="tag_container" class="container">

<table>
    <tbody>
    <tr>
    <th rowspan="2"><strong>Id</strong></th>
    <th rowspan="2"><strong>Name</strong></th>
    <th rowspan="2"><strong>Location</strong></th>
    <th rowspan="2"><strong>Experience</strong></th>
    <th colspan="2"><strong>Work</strong></th>
    <th colspan="2"><strong>Dates</strong></th>
    <th colspan="1"><strong>Salary</strong></th>
    <th colspan="2"><strong>Skills</strong></th>
    <th colspan="1"><strong>Actions</strong></th>
    </tr>
    
    </tr>
    <tr>
    <th>Number</th>
    <th>Email</th>
    <th>Authorization</th>
    <th>Type</th>
    <th colspan="2"></th>
    <th></th>
    <th></th>

    


    </tr>
    @if(count($data) != 0)
    @foreach($data as $info)
    
      <tr>
    <td>{{$info->id}}</td>
    <td>{{$info->firstname}}</td>
    <td>{{$info->location}}</td>
    <td>{{$info->experience}}</td>
    <td>{{$info->contactnumber}}</td>
    <td>{{$info->email}}</td>
    <td>{{$info->authorization}}</td>
    <td>{{$info->employee}}</td>
    <td>{{$info->expectedate}} / {{$info->salarytype}}</td>
    <td colspan="2">
        @if(count($info->addedskills) != 0)
    @foreach($info->addedskills as $index => $skill)
    {{$skill->skilldetails->techonology ?? 'NA'}} {{ $index + 1 < count($info->addedskills) ? ',' : '' }}
    @endforeach
    @else
    NA
    @endif
    </td>
    <td><a href="{{route('employercandidate', [$info->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
</a>&nbsp;

<a href="{{route('viewcandidateApplications', [$info->id])}}"><svg width="15px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z"/></svg></a>


</td> 

    @endforeach
    @else
    <tr>
    <td colspan="12">No records</td>
</tr>
    @endif
    </tbody>
    </table>
     @if(count($data) != 0)
    <div id="pagination-container" style="margin-top:15px">
    {{ $data->links() }}
    
</div>
@endif
</div>
<?php
// if($page == 'all'){
    $route = route('addedcandidatelist');
// }

?>

<script>
      document.getElementById('pagination-container').addEventListener('click', function(event) {
      event.preventDefault();
      const url = new URL(event.target.href);
      const pageNumber = url.searchParams.get('page');
      getpostsData(pageNumber)
    });
  // });
  function getpostsData(page){
    $.ajax({
          url: @json($route),
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