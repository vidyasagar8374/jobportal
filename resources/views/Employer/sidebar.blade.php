<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <div class="screen-overlay"></div>
  <aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
      <a href="index.html" class="brand-wrap">
        <img src="{{asset('images/logo-no-background.png')}}" class="logo" alt="company logo" />
      </a>
      <div>
        <button class="btn btn-icon btn-aside-minimize">
          <i class="text-muted material-icons md-menu_open"></i>
        </button>
      </div>
    </div>
    <nav>
      <ul class="menu-aside">
     
        <li class="menu-item active">
          <a class="menu-link" href="{{url('EmployeeHome')}}">
            <i class="icon material-icons md-home"></i>
            <span class="text">Dashboard</span>
          </a>
        </li>
  
        @if(\Auth::user()->role === 2 || \Auth::user()->role == 5)
        <li class="menu-item has-submenu">
          <a class="menu-link" href="page-products-list.html">
          <!-- <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M176 56V96H336V56c0-4.4-3.6-8-8-8H184c-4.4 0-8 3.6-8 8zM128 96V56c0-30.9 25.1-56 56-56H328c30.9 0 56 25.1 56 56V96v32V480H128V128 96zM64 96H96V480H64c-35.3 0-64-28.7-64-64V160c0-35.3 28.7-64 64-64zM448 480H416V96h32c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64z"/></svg> -->
            <i class="icon material-icons md-shopping_bag"></i>
            <span class="text">Jobs</span>
          </a>
          <div class="submenu">
            <a href="{{route('EmployeerCreatePost')}}">Create Job Post </a>
            <!--<a href="#">Deleted Product</a>-->
            <a href="{{route('viewposts')}}">Job Posts</a>
            <a href="{{route('viewpostsclosed')}}">Closed Job Posts</a>
            <a href="{{route('viewpostsinactive')}}">InActive Posts</a>

            <a href="{{route('sales.jobapply')}}"> Apply Job</a>
            <!-- <a href="page-products-grid-2.html">Product grid 2</a> -->
            <!--<a href="#">Categories</a>-->
          </div>
        </li>
        @endif
        @if(\Auth::user()->role === 2 || \Auth::user()->role === 4)
        <!-- addcandidate -->


        <li class="menu-item has-submenu">
          <a class="menu-link" href="page-products-list.html">
          <!-- <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M176 56V96H336V56c0-4.4-3.6-8-8-8H184c-4.4 0-8 3.6-8 8zM128 96V56c0-30.9 25.1-56 56-56H328c30.9 0 56 25.1 56 56V96v32V480H128V128 96zM64 96H96V480H64c-35.3 0-64-28.7-64-64V160c0-35.3 28.7-64 64-64zM448 480H416V96h32c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64z"/></svg> -->
            <i class="icon material-icons md-shopping_bag"></i>
            <span class="text">Candidate</span>
          </a>
          <div class="submenu">
          <a href="{{route('addcandidate')}}">Add Candidate</a>
            <a href="{{route('addedcandidatelist')}}">Candidates </a>
            <a href="{{route('inactivecandidatelist')}}">InActive Candidates </a>
            <a href="{{route('closecandidatelist')}}">Closed Candidates </a>
            <!--<a href="#">Deleted Product</a>-->
           

            <a href="{{route('sales.jobapply')}}"> Apply Job</a>
            <!-- <a href="page-products-grid-2.html">Product grid 2</a> -->
            <!--<a href="#">Categories</a>-->
          </div>
        </li>


       
        @endif
        <!--   <li class="menu-item has-submenu"><a class="menu-link" href="page-sellers-cards.html"><i class="icon material-icons md-store"></i><span class="text">Sellers</span></a><div class="submenu"><a href="page-sellers-cards.html">Sellers cards</a><a href="page-sellers-list.html">Sellers list</a><a href="page-seller-detail.html">Seller profile</a></div></li> -->
        <!-- <li class="menu-item">
          <a class="menu-link" href="{{route('Employerjobs')}}">
            <i class="icon material-icons md-add_box"></i>
            <span class="text">Add posting</span>
          </a>
        </li> -->
        @if(\Auth::user()->role === 2)
        <!-- <li class="menu-item">
          <a class="menu-link" href="{{route('subscriptionsview')}}">
            <i class="icon material-icons md-monetization_on"></i>
            <span class="text">subscription</span>
          </a>
        </li> -->
        @endif
        <!-- <li class="menu-item has-submenu">
          <a class="menu-link" href="#">
            <i class="icon material-icons md-person"></i>
            <span class="text">Account</span>
          </a>
          <div class="submenu">
            <a href="#">User Profile</a>
            <a href="#}">Business Details</a>
          </div>
        </li> -->
        <li class="menu-item">
          <a class="menu-link" href="{{route('Employerprofile')}}">
            <i class="icon material-icons md-person"></i>
            <span class="text">Profile</span>
          </a>
        </li>
        @if(\Auth::user()->role === 2)
        <li class="menu-item">
          <a class="menu-link" href="{{route('EmployerUsers')}}">
            <i class="icon material-icons md-person"></i>
            <span class="text">Manage Users</span>
          </a>
        </li>
        @endif
        <li class="menu-item">
          <a class="menu-link" href="{{route('Ticketview')}}">
            <i class="icon material-icons md-comment"></i>
            <span class="text">Ticket</span>
          </a>
        </li>
        <li class="menu-item">
          <a class="menu-link" href="{{route('userlogout')}}">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span class="text">Logout</span>
          </a>
        </li>
      </ul>
    </nav>
  </aside>
</html>