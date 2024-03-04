@extends('layouts.dashboard')

<!-- @section('style')
<link rel="stylesheet" href="../resources/assets/assets/vendor/datatables/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="../resources/assets/assets/vendor/datatables/css/buttons.bootstrap4.css">
<link rel="stylesheet" href="../resources/assets/assets/vendor/datatables/css/select.bootstrap4.css">
<link rel="stylesheet" href="../resources/assets/assets/vendor/datatables/css/fixedHeader.bootstrap4.css"> -->
<link rel="stylesheet" href="{{asset('assets/vendor/datatables/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/datatables/css/buttons.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/datatables/css/select.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/datatables/css/fixedHeader.bootstrap4.css')}}">
@endsection

@section('content')
<body> 
       
        
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
                                    <h3 class="mb-2">All Employees</h3>
                                    <p class="pageheader-text"></p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{route('all-employees')}}" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Employees</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- data table  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="{{route('add_department')}}" class="btn btn-info">+ Add Employee</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example" class="table  second" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="{{route('employees-profile')}}" class="">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="d-inline-block">
                                                                            <h4 class="text-muted">Employee 1</h4>
                                                                            <h5 class="mb-0">Job Title</h5>
                                                                            <h6 class="mb-0">Department</h6>
                                                                            <h6 class="mb-0">ST00002</h6>
                                                                        </div>
                                                                        <div class="float-right icon-circle-extra-large  icon-box-xl">
                                                                            <img src="https://colorlib.com//polygon/concept/assets/images/avatar-1.jpg" alt="" class="user-avatar-xl rounded-circle">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="{{route('employees-profile')}}" class="">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="d-inline-block">
                                                                            <h4 class="text-muted">Employee 21</h4>
                                                                            <h5 class="mb-0">Job Title</h5>
                                                                            <h6 class="mb-0">Department</h6>
                                                                            <h6 class="mb-0">ST00002</h6>
                                                                        </div>
                                                                        <div class="float-right icon-circle-extra-large  icon-box-xl">
                                                                            <img src="https://colorlib.com//polygon/concept/assets/images/avatar-1.jpg" alt="" class="user-avatar-xl rounded-circle">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="{{route('employees-profile')}}" class="">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="d-inline-block">
                                                                            <h4 class="text-muted">Employee 3</h4>
                                                                            <h5 class="mb-0">Job Title</h5>
                                                                            <h6 class="mb-0">Department</h6>
                                                                            <h6 class="mb-0">ST00002</h6>
                                                                        </div>
                                                                        <div class="float-right icon-circle-extra-large  icon-box-xl">
                                                                            <img src="https://colorlib.com//polygon/concept/assets/images/avatar-1.jpg" alt="" class="user-avatar-xl rounded-circle">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="{{route('employees-profile')}}" class="">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="d-inline-block">
                                                                            <h4 class="text-muted">Employee 4</h4>
                                                                            <h5 class="mb-0">Job Title</h5>
                                                                            <h6 class="mb-0">Department</h6>
                                                                            <h6 class="mb-0">ST00002</h6>
                                                                        </div>
                                                                        <div class="float-right icon-circle-extra-large  icon-box-xl">
                                                                            <img src="https://colorlib.com//polygon/concept/assets/images/avatar-1.jpg" alt="" class="user-avatar-xl rounded-circle">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="{{route('employees-profile')}}" class="">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="d-inline-block">
                                                                            <h4 class="text-muted">Employee 5</h4>
                                                                            <h5 class="mb-0">Job Title</h5>
                                                                            <h6 class="mb-0">Department</h6>
                                                                            <h6 class="mb-0">ST00002</h6>
                                                                        </div>
                                                                        <div class="float-right icon-circle-extra-large  icon-box-xl">
                                                                            <img src="https://colorlib.com//polygon/concept/assets/images/avatar-1.jpg" alt="" class="user-avatar-xl rounded-circle">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="{{route('employees-profile')}}" class="">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="d-inline-block">
                                                                            <h4 class="text-muted">Employee 6</h4>
                                                                            <h5 class="mb-0">Job Title</h5>
                                                                            <h6 class="mb-0">Department</h6>
                                                                            <h6 class="mb-0">ST00002</h6>
                                                                        </div>
                                                                        <div class="float-right icon-circle-extra-large  icon-box-xl">
                                                                            <img src="https://colorlib.com//polygon/concept/assets/images/avatar-1.jpg" alt="" class="user-avatar-xl rounded-circle">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end data table  -->
                        <!-- ============================================================== -->
                
                        
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
        
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <!-- <script src="../resources/assets/assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script> -->
        <script src="{{asset('assets/vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <!-- <script src="../resources/assets/assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
        <script src="../resources/assets/assets/vendor/datatables/js/data-table.js"></script> -->
        <script src="{{asset('assets/vendor/datatables/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/vendor/datatables/js/data-table.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    @endsection

</body>
@endsection

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
