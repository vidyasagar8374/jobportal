<div id="tag_container" class="container">
<table>
<tbody>
<tr>
<th rowspan="2"><strong>Candidate id</strong></th>
<th rowspan="2"><strong>Name</strong></th>
<th rowspan="2"><strong>Email</strong></th>
<th rowspan="2"><strong>Location</strong></th>
<th colspan="3"><strong>Work Authorization</strong></th>
<th colspan="2"><strong>Expected Rate/Salary </strong></th>
<th colspan="2"><strong>Experience</strong></th>
</tr>
<tr>
<th>Relocate</th>
<th>Travel</th>
<th>Relocate</th>
<th>Salary</th>
<th>Hourly</th>
<th>Skills</th>
<th>Years</th>
</tr>
@if(count($data) == 0)
<td colspan="11">No Data Found</td>
@else
@foreach($data as $info)

  <tr>
<td>{{$info->candidatedetails->id}}</td>
<td>{{$info->candidatedetails->firstname}} {{$info->candidatedetails->lastname}}</td>
<td>{{$info->candidatedetails->contactemail}}</td>
<td>{{$info->candidatedetails->location}}</td>
<td>{{$info->candidatedetails->relocate == 1 ? 'Yes' : ($info->candidatedetails->relocate == 2 ? 'No' : 'NA')  }}</td>
<td>{{$info->candidatedetails->travel == 1 ? 'Yes' : ($info->candidatedetails->travel == 2 ? 'No' : 'NA')  }}</td>
<td>{{$info->candidatedetails->employee}}</td>
<td>{{$info->candidatedetails->expectedate}}</td>
<td>{{$info->candidatedetails->salarytype}}</td>
<td>
@foreach($info->candidateskills as $index => $skills)
    {{$skills->skillname->techonology ?? ''}} {{ $index + 1 < count($info->candidateskills) ? ',' : '' }}
    @endforeach
</td>
<td>{{$info->candidatedetails->experience}}</td>
</tr>
@endforeach
@endif
</tbody>
</table>
<div id="pagination-container" style="margin-top:15px">
    {{ $data->links() }}
</div>
</div>

<?php
$url = '/applications-recived/80'
?>
<script>
  document.getElementById('pagination-container').addEventListener('click', function(event) {
      event.preventDefault();
      const url = new URL(event.target.href);
      const pageNumber = url.searchParams.get('page');
      debugger
      getapplicantsdata(pageNumber)
    });
    function getapplicantsdata(page){
    // var skill = $('#multiple-select').val();
    // var level = $('#level').val();
    // var exp1 = $('#fromSlider').val();
    // var exp2 = $('#toSlider').val();
    // var mode = $('#mode').val();
    // var salary = $('#salary').val();
    // var type = $('#type').val();
    debugger
    $.ajax({
          url: @json($url),
          method: "POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            // level: level,
            //   exp1: exp1,
            //   exp2: exp2,
            //   mode: mode,
            //   salary: salary,
            //   skill: skill,
              page: page
          },
          success: function(response) {
              $('#tag_container').html(response.html);
              // initializeStatusDropdowns();
          }
      });
    }
  </script>