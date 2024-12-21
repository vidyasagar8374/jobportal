<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Company | Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('css/all.min.css')}}" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">


</head>

<body class="" style="background-color:aliceblue;">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    
                    <div class="col-lg-3">
                 
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 style="color: #f23022;" class="h4 mb-4">Employer Login</h1>
                            </div>
                            @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                  </div>
                               
                                  <div class="form-group">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" autocomplete="current-password">
                                     @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                  </div>
                                  <div class="row">
                                   <div class="col-md-5">
                                  <button style="background-color: #f23022;" type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button></div>
                                <div class="col-md-2">
                                    &nbsp;
                                  </div>


                                <div class="col-md-5">
                                <a style="background-color: #f23022;" href="{{route('EmployeeeRegister')}}" class="btn btn-primary btn-user btn-block">
                                Sign up 
                                </a></div></div>
                               </form>
                            <hr>
                            <div class="text-center">
                                <a style="color: #f23022;" class="small" href="{{route('forgotpassword')}}">Forgot Password?</a>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-lg-3">
                 
                    </div>



                </div>
            </div>
        </div>

    </div>

     <!-- Bootstrap core JavaScript-->
    <script src="{{asset('jquery/jquery.min.js')}}"></script>
    <script src="{{asset('jquery/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('jquery/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('jquery/sb-admin-2.min.js')}}"></script>

</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    check = '<?php echo isset($sucessinfo) ?? '0' ;?>';
    $( document ).ready(function() {
       // if(check == 1)
       if(false)
        {
             $(document).ready(function() {
            swal({
                title: "User created!",
                text: "Suceess message sent!!",
                icon: "success",
                button: "Ok",
                timer: 4000
            });
    });
        }
});
</script>