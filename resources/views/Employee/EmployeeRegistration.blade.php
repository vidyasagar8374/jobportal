<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Employer | Registration</title>

        <!-- Custom fonts for this template-->
        <link href="{{asset('css/all.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

        <!-- Custom styles for this template-->
        <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet" />
        <style>
            .text-gray-900 {
                color: #f23022 !important;
                font-size: 43px;
                font-weight: 700;
            }
            label {
                display: inline-block;
                margin-bottom: 0.5rem;
                color: #000;
                font-size: 20px;
                font-weight: 700;
            }
            form.user .btn-user {
                font-size: 0.8rem;
                border-radius: 1rem;
                padding: 0.75rem 1rem;
            }
        </style>
    </head>

    <body class="" style="background-image: url('images/banner.jpg');">
        <div class="container">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Employer Register Form</h1>
                                </div>
                                <form action="{{route('EmployeeSumitRegistration')}}" onSubmit="Validation()" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstname">First Name<span style="color: red;">*</span></label>
                                                <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="middlename">Middle Name</label>
                                                <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Middle Name" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lastname">Last Name<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email"> Email<span style="color: red;">*</span></label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" />
                                            </div>
                                            <small id="emailMessage"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password"> Password<span style="color: red;">*</span></label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="password" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="confirmpassword"> Confirm Password<span style="color: red;">*</span></label>
                                                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="contact">Code<span style="color: red;">*</span></label>
                                                <select class="form-control" name="countryIso" id="countrycode">
                                                    <option value="">select</option>
                                                    @foreach($countries as $country)
                                                    <option value="{{$country->country_id}}">{{$country->dial_code}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="contact">Contact Number<span style="color: red;">*</span></label>
                                                <input type="number" class="form-control" name="number" id="number" placeholder="Contact Number" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="companyname">Company Name<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="companyname" name="companyname" placeholder="Company Name" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--  -->
                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <select class="form-control CountryName" id="country" name="countryid">
                                                    @foreach($countries as $country)
                                                    <option value="{{$country->country_id}}">{{$country->country_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!--  -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="statesGetByCountry">state</label>
                                                <input class="form-control" name="stateid" placeholder="Company City" />                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="companyaddress">Company Address<span style="color: red;">*</span></label>
                                        <textarea class="form-control" id="companyaddress" name="companyaddress" placeholder="Company Address"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="companyaddress">Adress 2<span style="color: red;">*</span></label>
                                        <textarea class="form-control" id="companyaddresstwo" name="companyaddresstwo" placeholder="Company Address"></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="companycity">City</label>
                                                <input class="form-control" id="companycity" name="companycity" placeholder="Company City" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="zip">Zip</label>
                                                <input class="form-control" id="zip" name="zip" placeholder="Company ZIP" />
                                            </div>
                                        </div>

                                        <!--  <div class="form-group">
                                    <label>Type</label>
                                    <select class="form-control">
                                      <option>Labaour</option>
                                      <option>Employer</option>
                                      
                                    </select>
                                  </div -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ein">EIN<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="ein" name="ein" placeholder="EIN" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="companyemail">Company Email:<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="companyemail" name="companyemail" placeholder="Company Email" />
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="contact">Code<span style="color: red;">*</span></label>
                                                <select class="form-control" name="companyiso" id="companycode">
                                                    <option value="">select</option>
                                                    @foreach($countries as $country)
                                                    <option value="{{$country->country_id}}">{{$country->dial_code}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="companynumber">Company Contact Number<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="companynumber" name="companynumber" placeholder="Company Contact Number" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="companywebsite">Company Website<span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" id="companywebsite" name="companywebsite" placeholder="Company Website" />
                                    </div>
                                    <!-- <div class="form-group">
                                    <label>If Labaour</label>
                                    <select class="form-control">
                                      <option>Individual</option>
                                      <option>Group</option>
                                      
                                    </select>
                                  </div> -->
                                    <input style="background-color: #f23022;" type="submit" name="submit" value="Register" class="btn btn-primary btn-user btn-block col-md-3" />
                                </form>
                                <hr />
                                <!--  <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> -->
                                <div class="text-center">
                                    <a style="color: #f23022;" class="small" href="login.html">Already have an account? Login!</a>
                                </div>
                            </div>
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
<script>
    // firstname
    $(document).ready(function () {
        $("#firstname").keyup(function () {
            $("#firstname").removeAttr("style");
        });
        $("#lastname").keyup(function () {
            $("#lastname").removeAttr("style");
        });
        // $("#middlename").keyup(function(){
        // $("#middlename").removeAttr( 'style' );
        // });
        $("#email").keyup(function () {
            $("#email").removeAttr("style");
        });
        $("#number").keyup(function () {
            $("#number").removeAttr("style");
        });
        $("#password").keyup(function () {
            $("#password").removeAttr("style");
        });
        $("#country").keyup(function () {
            $("#country").removeAttr("style");
        });

        $("#companyname").keyup(function () {
            $("#companyname").removeAttr("style");
        });
        $("#confirmpassword").keyup(function () {
            $("#confirmpassword").removeAttr("style");
        });
        $("#companyaddress").keyup(function () {
            $("#companyaddress").removeAttr("style");
        });
        $("#companyemail").keyup(function () {
            $("#companyemail").removeAttr("style");
        });
        $("#companynumber").keyup(function () {
            $("#companynumber").removeAttr("style");
        });
        $("#companywebsite").keyup(function () {
            $("#companywebsite").removeAttr("style");
        });
        $("#statesGetByCountry").keyup(function () {
            $("#statesGetByCountry").removeAttr("style");
        });

        $("#companycode").keyup(function () {
            $("#companycode").removeAttr("style");
        });
        $("#countrycode").keyup(function () {
            $("#countrycode").removeAttr("style");
        });
        $("#ein").keyup(function () {
            $("#ein").removeAttr("style");
        });

        $("form").submit(function () {
            if ($("#firstname").val() == "") {
                $("#firstname").css("border-color", "red");
            }
            if ($("#lastname").val() == "") {
                $("#lastname").css("border-color", "red");
            }
            // if($('#middlename').val() == '')
            // {
            //     $("#middlename").css("border-color", "red")
            // }
            if ($("#email").val() == "") {
                $("#email").css("border-color", "red");
            }
            if ($("#password").val() == "") {
                $("#password").css("border-color", "red");
            }
            if ($("#confirmpassword").val() == "") {
                $("#confirmpassword").css("border-color", "red");
            }
            if ($("#number").val() == "") {
                $("#number").css("border-color", "red");
            }
            if ($("#companyname").val() == "") {
                $("#companyname").css("border-color", "red");
            }
            if ($("#companyaddress").val() == "") {
                $("#companyaddress").css("border-color", "red");
            }
            if ($("#companyemail").val() == "") {
                $("#companyemail").css("border-color", "red");
            }
            if ($("#companynumber").val() == "") {
                $("#companynumber").css("border-color", "red");
            }
            if ($("#companywebsite").val() == "") {
                $("#companywebsite").css("border-color", "red");
            }
            if ($("#ein").val() == "") {
                $("#ein").css("border-color", "red");
            }
            if ($("#companycode").val() == "") {
                $("#companycode").css("border-color", "red");
                $("#companycode").focus();
                return false;
            }
            if ($("#country").val() == "") {
                $("#country").css("border-color", "red");
                $("#country").focus();
                return false;
            }
            if ($("#countrycode").val() == "") {
                $("#countrycode").css("border-color", "red");
                return false;
            }
            if ($("#statesGetByCountry").val() == "") {
                $("#statesGetByCountry").css("border-color", "red");
                return false;
            }

            if ($("#password").val() != $("#confirmpassword").val()) {
                alert("password and confirm password are not the same");
                $("#password, #confirmpassword").css("border-color", "red");
                return false;
            }
      
            if (
                $("#firstname").val() == "" ||
                $("#lastname").val() == "" ||
                $("#email").val() == "" ||
                $("#password").val() == "" ||
                $("#confirmpassword").val() == "" ||
                $("#number").val() == "" ||
                $("#companyname").val() == "" ||
                $("#companyaddress").val() == "" ||
                $("#companyemail").val() == "" ||
                $("#companynumber").val() == "" ||
                $("#companynumber").val() == "" ||
                $("#companywebsite").val() == "" ||
                $("#ein").val() == ""
            ) {
                return false;
            }
            return true;
        });
    });
</script>

<script>
    $(".CountryName").change(function () {
        var CountryId = $(".CountryName").val();
       

        $.ajax({
            type: "GET",
            url: "{{ route('getStatesByCountry') }}",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                CountryId: CountryId,
            },
            success: function (data) {
                var states = data.states;
                $("#statesGetByCountry").empty();
                $("#statesGetByCountry").append('<option value="">Select</option>');
                $.each(states, function (index, state) {
                    $("#statesGetByCountry").append('<option value="' + state.id_state + '">' + state.state + "</option>");
                });
            },
        });
    });

    // validate the email
    $("#email").change(function () {
    var email = $("#email").val();

    if (isValidEmail(email)) {
        // Valid email address
        $.ajax({
            type: "GET",
            url: "{{ route('validateMail') }}",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                Email: email,
            },
            success: function (data) {
                console.log(data);
                if (data.statusCode == 200) {
                    $("#emailMessage").text("Email available").css("color", "green");
                } else {
                    $("#emailMessage").text("Email taken").css("color", "red");
                }
            },
        });
    } else {
        // Invalid email address
        $("#email").css("border-color", "red");
    }

    function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});

</script>
