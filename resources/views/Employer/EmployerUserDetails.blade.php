<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>DesignAlley Dashboard</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets1/imgs/theme/fav-da.png" />
        <!-- Template CSS -->
        <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
        <!-- <link href="assets1/css/main.css?v=1.1" rel="stylesheet" type="text/css" /> -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link href="{{asset('assets1/css/mainnodatatable.css?v=1.1')}}" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div class="screen-overlay"></div>
        @include('Employer.sidebar') 
        <main class="main-wrap">
            <header class="main-header navbar">
                <div class="col-search">
                    <form class="searchform">
                        <div class="input-group">
                            <!--<input list="search_terms" type="text" class="form-control" placeholder="Search term" />-->
                            <!--<button class="btn btn-light bg" type="button"><i class="material-icons md-search"></i></button>-->
                        </div>
                        <datalist id="search_terms">
                            <option value="Products"></option>
                            <option value="New orders"></option>
                            <option value="Apple iphone"></option>
                            <option value="Ahmed Hassan"></option>
                        </datalist>
                    </form>
                </div>
                <div class="col-nav">
                    <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"><i class="material-icons md-apps"></i></button>
                    <ul class="nav">
                       
                    </ul>
                </div>
            </header>
            <section class="content-main">
                @if($CheckPlanDetails->userlimit <= count($users))
                <h1 style="text-align:center; color:red">To Add More Users You Have To Upgrade Your Plan</h1>
                <a href="{{route('EmployerUserCreate')}}">
            <button style="float:right" class="btn btn-primary" disabled>Add User</button>
                </a>
                @else
                <a href="{{route('EmployerUserCreate')}}">
            <button style="float:right" class="btn btn-primary">Add User</button>
                </a>
                @endif
                
                <br><br>
                <table class="table table-striped" id="Details">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1;?>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->role == 4 ? 'Sales' : 'HR'}}</td>
      <td>{{$user->isactive == 1 ? 'Active' : 'InActive'}}</td>
      @if($user->isactive == 1)
      <td>
          <button onclick="inactive('<?php echo $user->id ?>')" class="btn btn-danger">In Active</button>
         <button onclick="changepassword({{$user->id}})"  class="btn btn-success">Change Password</button>
      </td>
      @else
      <td><button onclick="active('<?php echo $user->id ?>')" class="btn btn-danger">Active</button>
      <button  onclick="changepassword({{$user->id}})" class="btn btn-success">Change Password</button>
      </td>
      @endif
    </tr>
    <?php $i++ ?>
    @endforeach
  </tbody>
</table>
                <!-- card end// -->
            </section>
            <!-- content-main end// -->
            
            <!-- modal start-->
                  <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                      <h4 class="modal-title">Change Password</h4>
                    </div>
                    <div class="modal-body">
                      <input class="form-control" type="text" id="changepassword">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" onClick="dismiss()">Close</button>
                      <button type="button" class="btn btn-default" onClick="update()">Update</button>
                    </div>
                  </div>
                  
                </div>
              </div>
  
  
            <!--end of modal-->
            <footer class="main-footer font-xs">
                <div class="row pb-30 pt-15">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        &copy; DesignAlley . All Right Reserved
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end">All rights reserved</div>
                    </div>
                </div>
            </footer>
        </main>
        <script src="assets1/js/vendors/jquery-3.6.0.min.js"></script>
        <script src="assets1/js/vendors/bootstrap.bundle.min.js"></script>
        <script src="assets1/js/vendors/select2.min.js"></script>
        <script src="assets1/js/vendors/perfect-scrollbar.js"></script>
        <script src="assets1/js/vendors/jquery.fullscreen.min.js"></script>
        <!-- Main Script -->
        <script src="assets1/js/main.js?v=1.1" type="text/javascript"></script>
    </body>
</html>
<script>
    function active(id)
    { 
        $.ajax({
            method : 'POST',
            url : 'activeuser',
            data: {
                '_token' : '{{ csrf_token() }}',
                'id' : id
            },
            success: function(data)
            {
                swal("Success!", "User Activated!", "success");
                $("#Details").load(location.href + " #Details");
               
            },
            error: function(data)
            {
                swal("Good job!", "You clicked the button!", "error");
            }
            })

    }
    function inactive(id)
    {
        $.ajax({
            method : 'POST',
            url : 'inactiveuser',
            data: {
                '_token' : '{{ csrf_token() }}',
                'id' : id
            },
            success: function(data)
            {
                swal("Success!", "User In Activated!", "success");
                $("#Details").load(location.href + " #Details");
               
            },
            error: function(data)
            {
                swal("opps!", "Something Went Wrong!", "error");
                $("#Details").load(location.href + " #Details");
            }
        })
    }
    function changepassword(id){
        window.selectedid = id
        $("#myModal").modal('toggle');
    }
    function dismiss(){
        $("#myModal").modal('hide');
        $('#changepassword').val('')
         window.selectedid = 0
    }
    function update(){
        var newpassword = $('#changepassword').val(); 
        debugger
        if(newpassword.length > 0){
            selectedid
            $.ajax({
                method : 'POST',
                url : 'changepasswordadmin',
                data: {
                    '_token' : '{{ csrf_token() }}',
                    'newpassword' : newpassword,
                    'selectedid' : selectedid
                },
                success: function(data)
                {
                    if(data.success == true){
                        $('#changepassword').val('')
                        window.selectedid = 0
                         swal("Success!", "Password Updated Successfully!", "success");
                    }else{
                        //window.selectedid = 0
                         swal("opps!", "Something Went Wrong!", "error");
                    }
                   
                    //$("#Details").load(location.href + " #Details");
                   
                },
                error: function(data)
                {
                    swal("opps!", "Something Went Wrong!", "error");
                    // $("#Details").load(location.href + " #Details");
                }
            })
        }else{
            alert('enter password')
        }
        
    }
    </script>
