
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
                       @if( ! $post->appliedinfo != null)
                              <div  class="btns-sec apply_<?php echo $post->id ?>">
                                 <button onclick="Applyjob('{{$post->id }}')" class="btn btn-orange">Apply Now</button>
                              </div>
                       <div  class="btns-sec applied_<?php echo $post->id ?>" style="display:none">
                                 <button onclick="removeApplyjob('{{$post->id }}')" class="btn btn-success">Applied</button>
                              </div>
                       @else
                       <div  class="btns-sec apply_<?php echo $post->id ?>" style="display:none">
                                 <button onclick="Applyjob('{{$post->id }}')" class="btn btn-orange">Apply Now</button>
                              </div>
                       <div  class="btns-sec applied_<?php echo $post->id ?>" >
                                 <button onclick="removeApplyjob('{{$post->id }}')" class="btn btn-success">Applied</button>
                              </div>
                       @endif
                           </div>
                    </div>
                    @endforeach



