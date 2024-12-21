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
        <link rel="shortcut icon" type="image/x-icon" href="assets1/imgs/theme/fav-da.png" />
        <!-- Template CSS -->
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
            <div class="content-header">
        
                    <h2 class="content-title">Recived Applications : {{$data->role}}</h2>
                </div>
                


                <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>Applicant Name</th>
                <th>Skills</th>
                <th>Email</th>
                <!-- <th>Mobile</th> -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>








                
            </section>
            <!-- content-main end// -->
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
        <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
        <script src="assets1/js/main.js?v=1.1" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function () {
    debugger
    var id = @json($id);
    debugger
    var url = "/recivedcandidateapplications/" + id;
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: url,
        columns: [
            {data: '{{__('candidatedetails.firstname')}}', name: '{{__('candidatedetails.firstname')}}'},
            {
                data: 'candidateskills',
                name: 'candidateskills',
                render: function(data) {
                    debugger
                    var skillNames = data.map(function(candidateskills) {
                        debugger
                        return candidateskills.skilldetails.techonology ?? '';
                    }).join(', ');
                    return skillNames;
                }
            },
            {data: '{{__('candidatedetails.contactemail')}}', name: '{{__('candidatedetails.contactemail')}}'},
            // {data: '{{__('details.number')}}', name: '{{__('details.number')}}'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
        
    });
    
    
  });
</script>
    </body>
</html>
