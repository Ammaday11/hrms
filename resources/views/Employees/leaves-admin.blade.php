@extends('layouts.dashboard')

@section('style')
<!-- <link rel="stylesheet" href="../resources/assets/assets/vendor/datatables/css/dataTables.bootstrap4.css">
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
                                    <h3 class="mb-2">Leaves (Admin)</h3>
                                    <p class="pageheader-text"></p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{route('all-employees')}}" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Leaves (Admin)</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-inline-block">
                                            <h4 class="text-muted">Today Presents</h4>
                                            <h5 class="mb-0">08<span class="traffic-sales-name"> / </span><span class="traffic-sales-name">205</span></h5>
                                        </div>
                                        <div class="float-right icon-circle-medium  icon-box-lg  bg-success-light mt-1">
                                            <i class="fas fa-check fa-fw fa-sm text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-inline-block">
                                            <h4 class="text-muted">Planed Leaves</h4>
                                            <h5 class="mb-0">05<span class="traffic-sales-name"> Today</span></h5>
                                        </div>
                                        <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                            <i class="fa fa-eye fa-fw fa-sm text-info"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-inline-block">
                                            <h4 class="text-muted">Unplaned Leaves</h4>
                                            <h5 class="mb-0">02<span class="traffic-sales-name"> Today</span></h5>
                                        </div>
                                        <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                                            <i class="fa fa-exclamation-triangle fa-fw fa-sm text-secondary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <a href="#" class="">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-inline-block">
                                                <h4 class="text-muted">Pending Requests</h4>
                                                <h5 class="mb-0">10</h5>
                                            </div>
                                            <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                                <i class=" fas fa-clock fa-fw fa-sm text-brand"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#" class="btn btn-info">+ Add Leave</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Employee</th>
                                                        <th>Leave Type</th>
                                                        <th>From</th>
                                                        <th>To</th>
                                                        <th>No of Days</th>
                                                        <th>Reason</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>John Doe</td>
                                                        <td>Medical Leave</td>
                                                        <td>1 Jan 2024</td>
                                                        <td>1 Jan 2024</td>
                                                        <td>1 day</td>
                                                        <td>Going to Hospital</td>
                                                        <td>Approved</td>
                                                        <td>:</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Buster Wigton</td>
                                                        <td>Casual Leave</td>
                                                        <td>10 Jun 2024</td>
                                                        <td>13 Jun 2024</td>
                                                        <td>4 days</td>
                                                        <td>Going to Hospital</td>
                                                        <td>Approved</td>
                                                        <td>:</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mike Litorus</td>
                                                        <td>Paternity Leave</td>
                                                        <td>15 Feb 2024</td>
                                                        <td>19 Feb 2024</td>
                                                        <td>5 days</td>
                                                        <td>Going to Hospital</td>
                                                        <td>Pending</td>
                                                        <td>:</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
