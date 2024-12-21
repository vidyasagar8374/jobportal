<!doctype html>
<html>
   


<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Job Portal - Job Portal HTML5 Template</title>
      <!-- Plugins CSS -->
      <link href="css/plugins.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="css/style.css" rel="stylesheet">
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="images/favicon.html">
   </head>
   <body>
      <!-- Pre Loader -->
      <div id="dvLoading"></div>
      <!-- Headder -->
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
                  <nav class="main-menu-area ml-auto mobile-menu-active">
                     <ul class="main-menu">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li class="sub-menu-wrap">
                           <a href="javascript:void(0)">Jobs</a>
                           <!-- Sub Menu -->
                           <ul class="sub-menu">
                              <li><a href="job-list.html" class="nav-link">Job List</a></li>
                              <li><a href="job-details.html" class="nav-link">Job Details</a></li>
                           </ul>
                        </li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact Us</a></li>
                     </ul>
                  </nav>
                  <div class="login-sec">
				  
						<div class="dropdown">
						  <button class="btn open-popup-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Login / Sign Up
						  </button>
						  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="{{url('Userlogin')}}">Employer</a>
							<a class="dropdown-item" href="{{route('EmployeeLogin')}}">Candidate</a>
						  </div>
						</div>				  
				  
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
      <!-- Start Sign In/Up Section -->
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
      <!-- End Sign In/Up Section -->
      <div class="sign-in-up-part mfp-hide" id="register-popup">
         <div class="container">
            <div class="section-title"> <span class="section-span">Register Here</span>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <form class="quote-form contact__form-panel">
                     <div class="row">
                        <div class="col-md-12">
                           <input type="text" name="name" id="name1" class="form-control" placeholder="Name"
                              required>
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
      <!-- Start Banner Section -->
      <section class="banner-sec">
         <img src="images/banner.jpg" class="w-100 banner-img" alt="">
         <div class="banner-text">
            <h2>Find The Job That Fits Your Life</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
               dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
            </p>
            <a href="#" class="btn">Know More</a>
            <div class="filter-sec">
               <div class="input-group pl-2 pr-4">
                  <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon1"><img src="images/suitcase-icon.png" alt=""></span>
                  </div>
                  <select class="form-control custom-select" aria-describedby="basic-addon2">
                     <option>JOB TITLE, SKILL, INDUSTRY</option>
                     <option>JOB TITLE2</option>
                     <option>JOB TITLE3</option>
                  </select>
               </div>
               <div class="input-group px-2">
                  <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon2"><img src="images/map-icon.png" alt=""></span>
                  </div>
                  <select class="form-control custom-select" aria-describedby="basic-addon2">
                     <option>Any Category</option>
                     <option value="2">Web Designer</option>
                     <option value="3">Web Developer</option>
                     <option value="4">Graphic Designer</option>
                     <option value="5">App Developer</option>
                     <option value="6">UI &amp; UX Expert</option>
                  </select>
               </div>
               <button class="btn"><img src="images/search-icon.png" alt=""> Search Jobs</button>
            </div>
         </div>
      </section>
      <!-- End Banner Section -->
      <!-- Start Strip Section -->
      <section class="strip-sec">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-12 col-sm-12 left-sec">
                  <img src="images/people-group.png" class="people-group" alt="">
                  <div class="text">
                     <h2 class="mb-3">Your Looking for Tranding Jobs</h2>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt .
                     </p>
                  </div>
               </div>
               <div class="col-lg-6 col-md-12 col-sm-12 right-sec row m-0">
                  <div class="col-lg-4 col-md-4 col-sm-12 ">
                     <img src="images/laptop.png" alt="">
                     <h5>Developer<span>7 Jobs</span></h5>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 ">
                     <img src="images/technology.png" alt="">
                     <h5>Technology<span>5 Jobs</span></h5>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                     <img src="images/government.png" alt="">
                     <h5>Government<span>2 Jobs</span></h5>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Strip Section -->
      <!-- Start Works Process -->
      <section class="section how-work-area pb-0">
         <div class="container">
            <h3 class="section-title mb-0">
			Our Works Process<br> <img src="images/title-border.png" alt=""></h3>
			<div class="row">
				<div class="col-md-6 col-lg-4">
				   <div class="single-feature">
					  <div class="single-feature-icon"><i class="fas fa-user-plus"></i></div>
					  <h4>Create Account</h4>
					  <p>Lorem ipsum dolor sit amet, a arcu justo eget, placerat suspendisse ornare accumsan et fringilla consectetuer </p>
					  <a class="angle-icon" href="#"><i class="fas fa-angle-right"></i></a> 
				   </div>
				</div>
				<div class="col-md-6 col-lg-4">
				   <div class="single-feature">
					  <div class="single-feature-icon"><i class="fas fa-search"></i></div>
					  <h4>Serach Job</h4>
					  <p>Lorem ipsum dolor sit amet, a arcu justo eget, placerat suspendisse ornare accumsan et fringilla consectetuer </p>
					  <a class="angle-icon" href="#"><i class="fas fa-angle-right"></i></a> 
				   </div>
				</div>
				<div class="col-md-6 col-lg-4">
				   <div class="single-feature">
					  <div class="single-feature-icon"><i class="far fa-file"></i></div>
					  <h4>Submit Resume</h4>
					  <p>Lorem ipsum dolor sit amet, a arcu justo eget, placerat suspendisse ornare accumsan et fringilla consectetuer </p>
					  <a class="angle-icon" href="#"><i class="fas fa-angle-right"></i></a> 
				   </div>
				</div>
			 </div>
         </div>
      </section>
      <!-- End Works Process -->
	  
<!-- <section class="section plans-sec">
         <div class="container">
            <h3 class="section-title mb-0">Our Packages<br> <img src="images/title-border.png" alt=""></h3>
            <div class="row">
               <div class="col-sm-12 col-md-6 col-lg-3">
                  <div class="price-box">
                     <div class="plan">Ronze</div>
                     <div class="head">
                        <h4>$50</h4>
                        <p>365 Days</p>
                     </div>
                     <ul class="services-list mt-2">
                        <li>1 User Included</li>
						<br><br>
                     </ul>
                     <button class="btn mt-3">Subscribe</button>
                  </div>
               </div>
               <div class="col-sm-12 col-md-6 col-lg-3">
                  <div class="price-box">
                     <div class="plan">Silver</div>
                     <div class="head">
                        <h4>$100</h4>
                        <p>365 Days</p>
                     </div>
                     <ul class="services-list mt-2">
                        <li>2 User Included</li>
                        <li>10$ Save</li>
                     </ul>
                     <button class="btn mt-3">Subscribe</button>
                  </div>
               </div>
               <div class="col-sm-12 col-md-6 col-lg-3">
                  <div class="price-box">
                     <div class="plan">Gold</div>
                     <div class="head">
                        <h4>$300</h4>
                        <p>365 Days</p>
                     </div>
                     <ul class="services-list mt-2">
                        <li>5 Users Included</li>
                        <li>50$ Save</li>
                     </ul>
                     <button class="btn mt-3">Sign Up</button>
                  </div>
               </div>
               <div class="col-sm-12 col-md-6 col-lg-3">
                  <div class="price-box">
                     <div class="plan">Diamond</div>
                     <div class="head">
                        <h4>$500</h4>
                        <p>365 Days</p>
                     </div>
                     <ul class="services-list mt-2">
                        <li>10 Users Included</li>
                        <li>150$ Save</li>
                     </ul>
                     <button class="btn mt-3">Sign Up</button>
                  </div>
               </div>			   
            </div>
         </div>
      </section>	   -->
	  
	  
      <!-- Start Services Section -->
 <!--      <section class="section services-sec">
         <div class="container">
            <h3 class="section-title mb-0">Our Services<br> <img src="images/title-border.png" alt="">
            </h3>
            <div class="row ">
               <div class="col-sm-12 col-md-6 col-lg-3 ">
                  <div class="box">
                     <img src="images/service-icon1.png" alt="">
                     <h5>Web & Software</h5>
                     <p>Lorem ipsum dolor sit amet, our consectetur adipiscing elit.</p>
                  </div>
               </div>
               <div class="col-sm-12 col-md-6 col-lg-3 ">
                  <div class="box">
                     <img src="images/service-icon2.png" alt="">
                     <h5>Data Science & Analitycs</h5>
                     <p>Lorem ipsum dolor sit amet, our consectetur adipiscing elit.</p>
                  </div>
               </div>
               <div class="col-sm-12 col-md-6 col-lg-3 ">
                  <div class="box">
                     <img src="images/service-icon3.png" alt="">
                     <h5>Accounting & Consulting</h5>
                     <p>Lorem ipsum dolor sit amet, our consectetur adipiscing elit.</p>
                  </div>
               </div>
               <div class="col-sm-12 col-md-6 col-lg-3 ">
                  <div class="box">
                     <img src="images/service-icon4.png" alt="">
                     <h5>Writing & Translations</h5>
                     <p>Lorem ipsum dolor sit amet, our consectetur adipiscing elit.</p>
                  </div>
               </div>
            </div>
            <div class="col-12 text-center">
               <button class="btn mt-5">All Packages</button>
            </div>
         </div>
      </section> -->
      <!-- End Services Section -->

      <!-- Start Blog Section -->
      <section class="section blog-sec">
         <div class="container">
            <h3 class="section-title mb-0">Our Blog<br> <img src="images/title-border.png" alt=""></h3>
            <div class="row">
               <div class="col-md-6 col-lg-4">
                  <div class="blog">
                     <img src="images/blog/blog1.jpg" alt="" class="w-100">
                     <div class="text-box">
                        <div class="name-sec">
                           <p><i class="fas fa-user"></i> Henry H.Garrick</p>
                           <p><i class="fas fa-clock"></i> November 16, 2016</p>
                           <div class="date">05 <span>Jun</span>
                           </div>
                        </div>
                        <h6>How to Get Better Learning</h6>
                        <p>Lorem ipsum dolor sit amet, our consectetur adipiscing elit Lorem ipsum dolor sit amet,
                           our consectetur adipiscing elit.
                        </p>
                        <div class="text-right">
                           <a href="#" class="btn">Read More</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-4">
                  <div class="blog">
                     <img src="images/blog/blog2.jpg" alt="" class="w-100">
                     <div class="text-box">
                        <div class="name-sec">
                           <p><i class="fas fa-user"></i> Henry H.Garrick</p>
                           <p><i class="fas fa-clock"></i> November 16, 2016</p>
                           <div class="date">08 <span>Aug</span>
                           </div>
                        </div>
                        <h6>How to Get Better Learning</h6>
                        <p>Lorem ipsum dolor sit amet, our consectetur adipiscing elit Lorem ipsum dolor sit amet,
                           our consectetur adipiscing elit.
                        </p>
                        <div class="text-right">
                           <a href="#" class="btn">Read More</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-4">
                  <div class="blog">
                     <img src="images/blog/blog3.jpg" alt="" class="w-100">
                     <div class="text-box">
                        <div class="name-sec">
                           <p><i class="fas fa-user"></i> Henry H.Garrick</p>
                           <p><i class="fas fa-clock"></i> November 16, 2016</p>
                           <div class="date">010 <span>Sep</span>
                           </div>
                        </div>
                        <h6>How to Get Better Learning</h6>
                        <p>Lorem ipsum dolor sit amet, our consectetur adipiscing elit Lorem ipsum dolor sit amet,
                           our consectetur adipiscing elit.
                        </p>
                        <div class="text-right">
                           <a href="#" class="btn">Read More</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Blog Section -->


      <!-- Start Count Section -->
      <section class="count-sec">
         <div class="container">
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
      </section>
      <!-- End Count Section -->
      <!-- Start Testimonial Section -->
      <section class="testimonial-sec">
         <div class="container">
            <h3 class="section-title">Happy Candidates <br> <img src="images/title-border.png" alt=""></h3>
            <div class="row mt-md-4">
               <div id="testimonialcarousel" class="carousel slide testimonial-carousel text-center w-100"
                  data-ride="carousel" data-interval="2500">
                  <i class="quote-icon left-quote"><img src="images/quote.png" alt=""></i>
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="testimonial">
                           <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                              suffered alteration in
                              some form, by injected humour, or randomised words which don't look even slightly
                              believable.
                           </p>
                           <!--Avatar-->
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
                              lorem condimentum, ornare mi molestie.
                           </p>
                           <!--Avatar-->
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
      </section>
      <!-- End Testimonial Section -->
      <!-- Start Footer Section -->
      <footer class="footer-sec ">
         <div class="container">
            <div class="row d-flex content-block ">
               <div class="footer-logo">
                  <a class="nav-link " href="javascript:void(0);"><img src="images/footer-logo.png" alt=""></a>
               </div>
               <div class="ml-auto col-6 right-sec ">
                  <div class="input-group subscribe-group">
                     <input type="email" class="form-control" placeholder="Enter email address" aria-label=""
                        aria-describedby="basic-addon4">
                     <div class="input-group-append"> <span class="input-group-text subscribe-btn" id="basic-addon4">
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
                  <!--social-->
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
      </footer>
      <!-- End Footer Section -->
      <!-- Start Copyright Section -->
      <div class="copyright-sec">
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
                        <li> <a href="#">About Us</a>
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
      </div>
      <!-- End Copyright Section -->
      <!--jquery js -->
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
      <!--Meanmenu js --> 
      <script src="js/jquery.meanmenu.min.js"></script> 
      <!--jquery js -->
      <script src="js/custom.js"></script>
   </body>




</html>

