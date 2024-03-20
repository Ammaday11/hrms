@extends('layouts.dashboard')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
@endsection

@section('content')
<body> 
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"> 
                    <!-- ============================================================== -->
                    <!-- Start Content  -->
                    <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header">
                                    <h3 class="mb-2">Employee</h3>
                                    <p class="pageheader-text"></p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{route('all-employees')}}" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Employee</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <a href="{{route('add-employees')}}" class="text-right mb-3 btn btn-info">+ Add Employee</a>
                            </div>
                        </div>

                        <div class="row">
                            @foreach ($employees as $employee)
                                <!-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12"> -->
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <a href="{{route('employees-profile', ['id' => $employee->id])}}" class="">
                                        <div class="card">
                                            <div class="card-header d-flex">
                                                <h4 class="mb-0">{{$employee->fname}} {{$employee->lname}}</h4>
                                                <div class="dropdown ml-auto">
                                                    <a class="toolbar" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-dots-vertical"></i> </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; transform: translate3d(18px, 23px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                        <a class="dropdown-item" href="{{route('employees-profile', ['id' => $employee->id])}}">Profile</a>
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-inline-block">
                                                    <h5 class="mb-0">{{$employee->designation->designation}}</h5>
                                                    <h6 class="mb-0">{{$employee->department->name}}</h6><br>
                                                    <h6 class="mb-0">{{$employee->employeeID}}</h6>
                                                </div>
                                                <div class="float-right icon-circle-extra-large  icon-box-xl">
                                                    @if($employee->image)
                                                        <img src="{{$employee->image}}" alt="" class="user-avatar-xl rounded-circle">
                                                    @else
                                                        <img src="https://t3.ftcdn.net/jpg/02/43/51/48/360_F_243514868_XDIMJHNNJYKLRST05XnnTj0MBpC4hdT5.jpg" alt="" class="user-avatar-xl rounded-circle">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>  
                    <!-- ============================================================== -->
                    <!-- End Content  -->
                    <!-- ============================================================== -->    
                    </div>    
                </div>
            </div>




            
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @include('include.footer')
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    @section('script')
        <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="../resources/assets/assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script src="../resources/assets/assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
        <script src="../resources/assets/assets/vendor/datatables/js/data-table.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script> -->
    @endsection

</body>
@endsection

