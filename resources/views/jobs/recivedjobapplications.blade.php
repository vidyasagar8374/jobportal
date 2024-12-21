<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>DesignAlley Dashboard</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="../assets1/imgs/theme/fav-da.png" />
        <!-- Template CSS -->
        <!-- <link href="assets1/css/main.css?v=1.1" rel="stylesheet" type="text/css" /> -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link href="{{asset('assets1/css/mainnodatatable.css?v=1.1')}}" rel="stylesheet" type="text/css" />
    <style>
        table {
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding:6px 20px;
}
tr th {
 border: 1px solid #dddddd;
  text-align: center;
  padding:6px 20px;
  background-color: #FF6158;
  color:#fff;
}

tr:hover {
  background-color: #dddddd;
  cursor: pointer;
}

.content td, .content th {
    border-top: 1px solid transparent;
    padding: 2px 10px 2px 15px;
}
.labelcolor{
    color:#FF6158
}
.inputcolor{
    background-color: white
}
        </style>
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


            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                    <label class="labelcolor">Candidate Id</label>
                    <input class="inputcolor form-control" type="number" name="cid">
                    </div>
                    <div class="col-md-1">
                        <label class="labelcolor">Level</label>
                        <select class="inputcolor form-control" id="level">
                        <option value=""></option>
                            <option value="Mid">Mid</option>
                            <option value="Junior">Junior</option>
                            <option value="Senior">Senior</option>
                        </select>
                        </div>
                        <div class="col-md-2">
                <label class="labelcolor">Mode</label>
                <select  class="inputcolor form-control" id="mode">
                <option value=""></option>
                    <option value="1">Remote</option>
                    <option value="2">Hybrid</option>
                    <option value="3">Inperson</option>
                </select>
                </div>
                <div class="col-md-2">
      <label class="labelcolor">Salary</label>
      <input class="inputcolor form-control" type="salary" name="salary"  id="salary">
    </div>
    <div class="col-md-1">
    <label class="labelcolor">Type</label>
      <select  class="inputcolor form-control" id="type">
        <option value=""></option>
        <option value="Hour">Hour</option>
        <option value="Anum">Anum</option>
      </select>
    </div>
    <div class="col-md-1">
      <label>Search</label>
      <input style="background-color:#FF6158" type="submit" onClick="filterData()" name="submit" class="form-control">
    </div>
                </div>
                
            </div>




            <div class="content-header">
                </div>
                @include('jobs.applications') 
            </section>
            
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
        <script src="../assets1/js/vendors/jquery-3.6.0.min.js"></script>
        <script src="../assets1/js/vendors/bootstrap.bundle.min.js"></script>
        <script src="../assets1/js/vendors/select2.min.js"></script>
        <script src="../assets1/js/vendors/perfect-scrollbar.js"></script>
        <script src="../assets1/js/vendors/jquery.fullscreen.min.js"></script>
        <!-- Main Script -->
        <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
        <script src="../assets1/js/main.js?v=1.1" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    </body>
</html>
