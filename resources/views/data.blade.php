 @foreach($Posts as $post)
 <div class="card">
  <!-- <img src="img_avatar.png" alt="Avatar" style="width:100%"> -->
  <div class="container">
  <div class="row">
  <div class="column">
    <h4 style="color:#f23022;"><b>Role: {{$post->role}}</b></h4> 
</div>
<div class="column">
    <i onclick="edit()" class="fas fa-edit"></i>
    <i class="fa fa-trash" aria-hidden="true"></i>
 
</div>
</div>
    <div class="row col-md-7">
    <div class="column">
    <p  style="color:#f23022;">Description: {{$post->description}}</p> 
    <p style="color:#f23022;">Location: {{$post->location}}</p> 
</div>
<div class="column">
    <p style="color:#f23022;">Package: {{$post->Salary}}</p> 
    <p style="color:#f23022;">email: {{$post->contactemail}}</p>
</div> 
</div>
  </div>
</div>
<hr>
@endforeach

<script>
    function edit()
    {
        alert('sgrdfsdgsdg')
    }
    </script>