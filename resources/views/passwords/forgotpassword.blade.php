
<style>
    .form-gap {
    padding-top: 70px;
}
</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    <!--<form id="register-form" role="form" autocomplete="off" class="form" method="post">-->
        
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                        </div>
                        
                      </div>
                      
                       <div class="form-group" id="otpdata" style="display:none">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                          <input id="otp" name="otp" placeholder="OTP" class="form-control"  type="password">
                        </div>
                        
                      </div>
                      
                        <div class="form-group" id="passworddata" style="display:none">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                          <input id="password" name="password" placeholder="password" class="form-control"  type="password">
                        </div>
                        
                      </div>
                        <div class="form-group" id="confirmpassworddata" style="display:none">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                          <input id="confirmpassword" name="confirmpassword" placeholder="confirm password" class="form-control"  type="password">
                        </div>
                        
                      </div>
                      
                      
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" onClick="forgotpassword()" value="Reset Password" id="forgotpassword" type="submit">
                         <input name="otp-submit" class="btn btn-lg btn-primary btn-block" onClick="verifyotp()" style="display:none" value="Verify otp" id="verifyotp" type="submit">
                        <input name="password-submit" class="btn btn-lg btn-primary btn-block" onClick="changepassword()" style="display:none" value="change password" id="changepassword" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    <!--</form>-->
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
<script>
    function forgotpassword()
    {
        var email = $('#email').val();
        $.ajax({
            method : 'POST',
            url : 'resetpasswordmailcheck',
            data: {
                '_token' : '{{ csrf_token() }}',
                'email' : email,
               
            },
            success: function(result)
            {
                debugger;
                if(result.success == true){
                    $("#email").prop("readonly", true);
                    $('#otpdata').show()
                    $('#forgotpassword').hide();
                    $('#verifyotp').show()
                    
                }else if(result.success == false && result.message == "Email not found"){
                    swal("Opps!", "Wrong email entered!", "error");
                }
                else{
                    swal("Opps!", "Something Went Wrong!", "error");
                }
            },
            error: function(result)
            {
                swal("Opps!", "Something Went Wrong!", "error");
            }
        })
    }
    function verifyotp(){
        var otpentered = $('#otp').val();
         var email = $('#email').val();
        $.ajax({
            method : 'POST',
            url : 'resetpasswordotpverify',
            data: {
                '_token' : '{{ csrf_token() }}',
                'email' : email,
                'otpentered' : otpentered
               
            },
            success: function(result)
            {
                if(result.success == true){
                   $('#otp').prop('readonly', true)
                   $('#passworddata').show();
                   $('#confirmpassworddata').show();
                   $('#verifyotp').hide();
                   $('#changepassword').show();
                   
                }else if(result.success == false && result.message == "invalid otp"){
                    swal("Opps!", "incorrect otp entered!", "error");
                }
                else{
                    swal("Opps!", "Something Went Wrong!", "error");
                }
            },
            error: function(result)
            {
                swal("Opps!", "Something Went Wrong!", "error");
            }
        })
    }
    function changepassword(){
         var email = $('#email').val();
        var password = $('#password').val()
        var confirmpassword = $('#confirmpassword').val()
    
        if(password == confirmpassword){
            $.ajax({
                method : 'POST',
                url : 'resetpasswordchange',
                data: {
                    '_token' : '{{ csrf_token() }}',
                    'email' : email,
                    'password' : password
                   
                },
                success: function(result)
                {
                    if(result.success == true){
                        swal("success!", "password changes successfully!", "success");
                        setTimeout(function(){
                            window.location.href = '/Userlogin'
                        },3000)
                    }
                    else{
                        swal("Opps!", "Something Went Wrong!", "error");
                    }
                },
                error: function(result)
                {
                    swal("Opps!", "Something Went Wrong!", "error");
                }
            })
        }else{
            alert('password and confirm password dosenot matches')
        }
    }
</script>