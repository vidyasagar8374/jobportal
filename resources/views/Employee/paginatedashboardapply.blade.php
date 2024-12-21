
@foreach($Posts as $post)
                    
                    <div class="current-job_product col-lg-6 col-md-6 col-sm-12">
                           <div class="box d-flex">
                              <div class="text-sec">
                                 <h4>Job Title : {{$post->role ?? ''}}</h4>
                                 <!-- <a href="#" target="_blank">#</a> -->
                                 <p>Job Description : {{$post->description ?? ''}}</p>
                                 <p>Experience : {{$post->experience ?? ''}}</p>
                                 <p>Location : {{$post->location ?? ''}}</p>
                                 <p>Salary : {{$post->Salary ?? ''}}</p>
                                 
                                 <p>Skills :
                                  @foreach($post->jobskills as $skill)
                                  {{$skill['info']['techonology']}},
                                   @endforeach
                                  </p>
                              </div>
                              <input type="hidden" id="jobidforapply" >
                              <div  class="btns-sec apply_<?php echo $post->id ?>">
                                 <button  data-toggle="modal" onclick="jobPostIdUpdate({{$post->id}})" data-target="#candidatelist" class="btn btn-orange">Apply Now</button>
                              </div>
                       
                           </div>
                    </div>
                    @endforeach


                    <!-- modal -->



<script>
    function jobPostIdUpdate(id){
        $('#jobidforapply').val(id)
    }
    function applycandidatejobpost()
    {
       var selectedCandidates = [];
       var jobid = $('#jobidforapply').val(); 
        $('select[name="candidates[]"] option:selected').each(function() {
          selectedCandidates.push($(this).val());
        });
        $.ajax({
            method : 'POST',
            url : 'applyCandidateJob',
            data: {
                '_token' : '{{ csrf_token() }}',
                'jobid' : jobid,
                'candidates' : selectedCandidates
            },
            success: function(result)
            {
                if(result == 1){
                  alert('success')
                }else{
                  alert('fail')
                }
            },
            error: function(result)
            {

            }
          })
    }
</script>





