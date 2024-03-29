@extends('layouts.dashboard')
@section('style')
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
                                <h3 class="mb-2 ">Shifts</h3>
                                <p class="pageheader-text"></p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{route('all-employees')}}" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Shifts</li>
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
                                <div class="card-header d-flex">
                                    <a href="{{route('create_shift')}}" class="btn btn-info">+ Create Shift</a>
                                    <select class="custom-select ml-auto w-auto">
                                        <option selected="">Select</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
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

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Short Code</th>
                                                    <th>Start Time</th>
                                                    <th>End Time</th>
                                                    <th>Has OT?</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($shifts as $shift)
                                                    <tr>
                                                        <td>{{$shift->name}}</td>
                                                        <td>{{$shift->short_code}}</td>
                                                        <td>{{$shift->start_time}}</td>
                                                        <td>{{$shift->end_time}}</td>
                                                        <td>{{ $shift->hasOT === 1 ? "Yes" : "No"}}</td>
                                                        <td>
                                                            <a href="#" class="btn btn-info btn-sm m-r-10 fa fa-eye"></a>
                                                            <a href="{{ route('edit_shift', ['id' => $shift->id]) }}" class="btn btn-brand btn-sm m-r-10 fas fa-edit" ></a>
                                                            <!-- <a href="#" class="btn btn-danger btn-sm m-r-10 fas fa-trash" data-toggle="modal" data-target="#exampleModal"></a> -->
                                                            <a href="{{ route('delete_shift', ['id' => $shift->id]) }}" class="btn btn-danger btn-sm m-r-10 fas fa-trash"></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
        <script src="{{asset('assets/vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/vendor/datatables/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/vendor/datatables/js/data-table.js')}}"></script>
    @endsection
</body>
@endsection
