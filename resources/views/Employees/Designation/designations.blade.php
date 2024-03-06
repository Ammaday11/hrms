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
                                    <h3 class="mb-2">Designations</h3>
                                    <p class="pageheader-text"></p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{route('all-employees')}}" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Designations</li>
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
                                        <a href="{{route('add_designation')}}" class="btn btn-info">+ Add Designation</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Designation</th>
                                                        <th>Department</th>
                                                        <th>Salary</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($designations as $designation)
                                                        <tr>
                                                            <td>{{ $designation->id }}</td>
                                                            <td>{{ $designation->designation }}</td>
                                                            <td>{{ $designation->department->name }}</td>
                                                            <td>{{ $designation->salary }}</td>
                                                            <td>
                                                                <a href="{{route('show_designation', ['id' => $designation->id])}}" class="btn btn-info btn-sm m-r-10 fa fa-eye"></a>
                                                                <a href="{{route('edit_designation', ['id' => $designation->id])}}" class="btn btn-brand btn-sm m-r-10 fas fa-edit" ></a>
                                                                <a href="{{route('delete_designation', ['id' => $designation->id])}}" class="btn btn-danger btn-sm m-r-10 fas fa-trash"></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                                    @if ($errors->any())
                                                        @foreach ($errors->all() as $error)
                                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{$error}}
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </a> 
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    @if (session()->has('error'))
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{session('error')}}
                                                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </a> 
                                                        </div>
                                                    @endif
                                                    @if (session()->has('success'))
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">{{session('success')}}
                                                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </a> 
                                                        </div>
                                                    @endif
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
