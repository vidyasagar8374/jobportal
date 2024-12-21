

<!doctype html>
<html>
   

<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>About - Job Portal </title>
      <!-- Plugins CSS -->
      <link href="css/plugins.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="css/style.css" rel="stylesheet">
      <!-- Favicon -->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">



     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>



  	<style type="text/css">
  		.ajax-load{
  			background: #e1e1e1;
		    padding: 10px 0px;
		    width: 100%;
  		}
  	</style>
      <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
   </head>
   <body id="home" data-spy="scroll" data-target=".navbar" data-offset="120">
      <!-- Pre Loader -->
      <div id="dvLoading"></div>
      <header class="custom-navbar" id="navigation">
         <div class="container">
            <div class="row px-3">
               <div class="wow fadeInLeft" data-wow-delay="0.3s">
                  <!-- Header Logo -->
                  <div class="header-logo">
                     <a href="index.html"><img src="images/logo.png" class="img-fluid" alt=""></a>
                  </div>
                  <!-- Header Logo end -->
               </div>
               <div class="d-flex position-static menu-sec">
                  <!-- main menu area -->
                  <!-- <nav class="main-menu-area ml-auto mobile-menu-active">
                     <ul class="main-menu">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li class="sub-menu-wrap">
                           <a href="javascript:void(0)">Jobs</a>
                           <ul class="sub-menu">
                              <li><a href="job-list.html" class="nav-link">Job List</a></li>
                              <li><a href="job-details.html" class="nav-link">Job Details</a></li>
                           </ul>
                        </li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact Us</a></li>
                     </ul>
                  </nav> -->
                  <div class="login-sec">
                  @if(! \Auth::user())
						<div class="dropdown">
						  <button class="btn open-popup-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Login / Sign Up
						  </button>
						  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="#">Employer</a>
							<a class="dropdown-item" href="#">Candidate</a>
						  </div>
						</div>
                  @endif				  
				  
                     <!-- <a class="btn open-popup-link" href="#sign-in-popup">Login / Sign Up</a> -->
                  </div>
                  <!-- main menu area end -->
                  <!-- Mobile Menu Container -->
                  <div class="mobile-menu-container"><span class="sr-only">Mobile Menu Will Come Here.</span></div>
               </div>
            </div>
         </div>
      </header>
      <!-- End Navbar -->
      <!-- Sign In/Up Section -->
      <div class="sign-in-up-part mfp-hide" id="sign-in-popup">
         <div class="container">
            <div class="section-title"> <span class="section-span">Sign In Here</span>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <form class="quote-form contact__form-panel">
                     <div class="row">
                        <div class="col-md-12">
                           <input type="text" name="name" id="username" class="form-control"
                              placeholder="Username / Email" required>
                        </div>
                        <div class="col-md 12">
                           <input type="text" name="email" id="email" class="form-control" placeholder="Password"
                              required>
                        </div>
                     </div>
                     <div class="d-flex align-items-center">
                        <a class="btn- open-popup-link" href="#register-popup">Sign Up</a>
                        <button type="submit" id="login-btn" class="btn ml-auto">Log In</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div class="sign-in-up-part mfp-hide" id="register-popup">
         <div class="container">
            <div class="section-title"> <span class="section-span">Register Here</span>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <form class="quote-form contact__form-panel">
                     <div class="row">
                        <div class="col-md-12">
                           <input type="text" name="name" id="name1" class="form-control" placeholder="Name">
                        </div>
                        <div class="col-md 12">
                           <input type="text" name="email" id="email1" class="form-control" placeholder="Email"
                              required>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <input type="text" name="phone" id="phone1" class="form-control"
                              placeholder="Phone Number*" onkeypress="return isNumberKey(event)">
                           <script>
                              function isNumberKey(evt) {
                              	var charCode = (evt.which) ? evt.which : event.keyCode
                              	if (charCode > 31 && (charCode < 48 || charCode > 57))
                              		return false;
                              	return true;
                              }
                           </script>
                        </div>
                     </div>
                     <div class="d-flex align-items-center">
                        <a class="btn- open-popup-link" href="#sign-in-popup">Sign In</a>
                        <button type="submit" id="register-btn" class="btn ml-auto">Register</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- Start breadcrumbs Section -->
      <section class="breadcrumbs-sec">
         <img src="images/about/about-banner.jpg" style="height:50%" class="w-100 banner-img" alt="">
         <div class="breadcrumbs-text">
            <h2>Jobs</h2>
            <ul>
               <li><a href="index.html">Home</a> </li>
               <li>Job List </li>
            </ul>
         </div>
      </section>
      <!-- End Breadcrumbs Section -->
      <!-- Start Inner Content Wrapper -->
      <section class="inner-content-wrapper section current-job-sec">
         <div class="container">
                 
            <div class="row m-0">
               <form method="post" action="{{url('jobapply')}}">
                  @csrf
                  <div>
                     <div style="margin-bottom:30px;margin-left:40px">
                        <select class="selectpicker" multiple data-live-search="true" name="tech[]">
                           @foreach($techonologies as $techonology)
                           <option value="{{$techonology->id}}">{{$techonology->techonology}}</option>
                           
                           @endforeach
                        </select>
                        <button class="btn btn-primary">Search</button>
                     </div>
                  </div>
               </form>



				<div class="row w-100 m-0">
                  
					 <!-- Start Job view End  -->
                <div class="col-md-12" id="post-data">
                @include('Employee/paginatedashboard')
                           </div>
                   



				</div>

			</div>
         </div>
      </section>	  
	  
	  
	  



      <!-- Start Count Section -->
      <!-- <section class="count-sec" id="count">
         <div class="container-fluid">
            <div class="row content-block">
               <div class="col-lg-3 col-md-6 col-sm-12 mb-sm-5 mb-md-5 mb-lg-0 border-right-before">
                  <img src="images/count/count-icon1.png" alt="">
                  <h4><i class="countdwon-number">150</i><span>Faculties</span></h4>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-12 mb-sm-5 mb-md-5 mb-lg-0 border-right-before">
                  <img src="images/count/count-icon2.png" alt="">
                  <h4><i class="countdwon-number">2300</i><span>Students</span></h4>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-12 mb-sm-5 mb-md-0 mb-lg-0 border-right-before">
                  <img src="images/count/count-icon3.png" alt="">
                  <h4><i class="countdwon-number">40</i><span>Courses</span></h4>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-12 mb-sm-0 mb-md-0 mb-lg-0">
                  <img src="images/count/count-icon4.png" alt="">
                  <h4><i class="countdwon-number">80</i><span>Countries</span></h4>
               </div>
            </div>
         </div>
      </section> -->
      <!-- End Count Section -->
      <!-- Start Testimonial Section -->
      <!-- <section id="testimonials" class="testimonial-sec">
         <div class="container">
            <h3 class="section-title text-center">Happy Candidates <br> <img src="images/title-border.png" alt=""></h3>
            <div class="row mt-md-4">
               <div id="testimonialcarousel" class="carousel slide testimonial-carousel text-center w-100"
                  data-ride="carousel" data-interval="2500">
                  <i class="quote-icon left-quote"><img src="images/quote.png" alt=""></i>
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="testimonial">
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et dapibus tortor.
                              Suspendisse orci ante, vestibulum at libero ac, vulputate vulputate sem. Cras quis
                              lorem condimentum, ornare mi molestie, ipsum.
                           </p>
                           <div class="avatar mx-auto mb-4">
                              <img src="images/testimonials/testimonial-img1.png" class="rounded-circle img-fluid"
                                 alt="">
                           </div>
                           <h4>Josi Welleam</h4>
                           <h6>Founder, GitGat</h6>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="testimonial">
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et dapibus tortor.
                              Suspendisse orci ante, vestibulum at libero ac, vulputate vulputate sem. Cras quis
                              lorem condimentum, ornare mi molestie, ipsum..
                           </p>
                           <div class="avatar mx-auto mb-4">
                              <img src="images/testimonials/testimonial-img2.png" class="rounded-circle img-fluid"
                                 alt="">
                           </div>
                           <h4>Jenny Jo</h4>
                           <h6>Co Founder, GitGat</h6>
                        </div>
                     </div>
                  </div>
                  <i class="quote-icon right-quote"><img src="images/quote.png" alt=""></i>
                  <a class="carousel-control-prev" href="#testimonialcarousel" role="button" data-slide="prev">
                  <i class="fas fa-chevron-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#testimonialcarousel" role="button" data-slide="next">
                  <i class="fas fa-chevron-right"></i>
                  </a>
               </div>
            </div>
         </div>
      </section> -->
      <!-- End Testimonial Section -->
      <!-- Start Footer Section -->
      <!-- <footer class="footer-sec ">
         <div class="container">
            <div class="row d-flex content-block ">
               <div class="footer-logo">
                  <a class="nav-link " href="#home"><img src="images/footer-logo.png" alt=""></a>
               </div>
               <div class="ml-auto col-6 right-sec ">
                  <div class="input-group subscribe-group">
                     <input type="email" class="form-control" placeholder="Your Enter email" aria-label=""
                        aria-describedby="basic-addon2">
                     <div class="input-group-append"> <span class="input-group-text subscribe-btn" id="basic-addon2">
                        Subscribe</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="footer-info  d-flex  ">
               <div class="col-md-4 col-sm-12">
                  <h3>Need Help?</h3>
                  <p class="phone"><i class="fas fa-phone-alt mr-2"></i> Call Us : <span>1800-0000-1234</span></p>
               </div>
               <div class="col-md-4 col-sm-12">
                  <h3>Email:</h3>
                  <p><i class="fas fa-paper-plane mr-2"></i>  info@jobportal.com</p>
               </div>
               <div class="col-md-4 col-sm-12">
                  <div class="ml-auto social-media">
                     <h3>Follow Us</h3>
                     <ul class="menu-social">
                        <li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a>
                        </li>
                        <li><a href="javascript:void(0);"><i class="fa fa-youtube"></i></a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </footer> -->
      <!-- End Footer Section -->
      <!-- Start Copyright Section -->
      <!-- <div class="copyright-sec">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 text-center content-block d-flex">
                  <div class="text">
                     <p>© Copyright <span id="year"></span> Job Portal. All Rights Reserved</p>
                  </div>
                  <div class="footer-menu">
                     <ul>
                        <li> <a href="index.html">Home</a>
                        </li>
                        <li> <a href="About-us-2.html">About Us</a>
                        </li>
                        <li> <a href="#">Services</a>
                        </li>
                        <li> <a href="#">Current Jobs</a>
                        </li>
                        <li> <a href="#">Our Plans</a>
                        </li>
                        <li> <a href="#">Blog</a>
                        </li>
                        <li> <a href="#">Contact</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div> -->
      <div class="ajax-load text-center" style="display:none">
	<p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
</div>
      <!-- End Copyright Section -->
      <!--jquery js -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

      <script src="js/jquery-min.js"></script>
      <script src="js/popper.min.js"></script>
      <!--jquery js -->
      <script src="js/bootstrap.min.js"></script>
      <!--Easing js -->
      <script src="js/jquery.easing.min.js"></script>
      <!-- CounterUp JS -->
      <script src="js/jquery.counterup.min.js"></script>
      <!-- MagnificPopup JS -->
      <script src="js/jquery.magnific-popup.min.js"></script>
      <!--jquery js -->
      <script src="js/plugins.js"></script>
      <!--Fontawesome js -->
      <script src="js/fontawesome.js"></script>
      <!--jquery js -->
      <script src="js/custom.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script>
        function Applyjob(id)
        {
            $.ajax({
                method : 'POST',
                url : 'ApplyJob',
                data: {
                    '_token' : '{{ csrf_token() }}',
                    'jobid' : id,
                },
                success: function(result)
                {
                    if(result.success == true)
                    {
                        var appliedid = 'apply_' + id;
                        var apply = 'applied_' + id;
                        $('.' + appliedid).hide();
                        $('.' + apply).show();
                    }
                    else{
                        swal("Opps!", "Something Went Wrong!", "error");
                    }
                },
                error: function(result)
                {

                }
            })
        }
        function removeApplyjob(id)
        {
            $.ajax({
                method : 'POST',
                url : 'removeApplyJob',
                data: {
                    '_token' : '{{ csrf_token() }}',
                    'jobid' : id,
                },
                success: function(result)
                {
                    if(result.success == true)
                    {
                        var appliedid = 'apply_' + id;
                        var apply = 'applied_' + id;
                        $('.' + appliedid).show();
                        $('.' + apply).hide();
                    }
                    else{
                        swal("Opps!", "Something Went Wrong!", "error");
                    }
                },
                error: function(result)
                {

                }
            })
        }
        </script>
        <script type="text/javascript">
	var page = 1;
	$(window).scroll(function() {
	    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
	        page++;
	        loadMoreData(page);
	    }
	});


	function loadMoreData(page){
	  $.ajax(
	        {
	            url: '?page=' + page,
	            type: "get",
	            beforeSend: function()
	            {
	                $('.ajax-load').show();
	            }
	        })
	        .done(function(data)
	        {
	            if(data.html == " "){
	                $('.ajax-load').html("No more records found");
	                return;
	            }
	            $('.ajax-load').hide();
	            $("#post-data").append(data.html);
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              alert('server not responding...');
	        });
	}
   $('select').selectpicker();
</script>
   </body>


</html>

