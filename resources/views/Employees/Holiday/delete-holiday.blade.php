@extends('layouts.dashboard')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/datepicker/tempusdominus-bootstrap-4.css')}}">
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
                                    <h3 class="mb-2">Delete Holiday</h3>
                                    <p class="pageheader-text"></p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{route('all-employees')}}" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="{{route('holidays')}}" class="breadcrumb-link">Holidays</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Delete Holiday</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <!-- ============================================================== -->
                        <!-- Start Content  -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- basic form -->
                        <!-- ============================================================== -->
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" style="margin: auto">
                            <div class="card">
                                <h5 class="card-header">Are you sure you want to delete this holiday?</h5>
                                <div class="card-body">
                                <form action="{{ route('destroy_holiday', ['id' => $holiday->id])}}"  data-parsley-validate="" method='POST' enctype="multipart/form-data">
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
                                        @csrf
                                        <div class="form-group">
                                            <label  for="title">Title</label>
                                            <input data-parsley-type="number" name="title" type="text"  value="{{ old('title', $holiday->title) }}" placeholder="Title" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label  for="holiday_Date">Holiday Date</label>
                                            <input data-parsley-type="number" name="holiday_Date" type="text"  value="{{ old('holiday_Date', $holiday->holiday_Date) }}" placeholder="Holiday_Date" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label  for="holiday_type">Holiday Type</label>
                                            <input data-parsley-type="number" name="holiday_type" type="text"  value="{{ old('holiday_type', $holiday->holiday_type) }}" placeholder="Holiday_Date" class="form-control">
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-success">Delete</button>
                                                    <a href="{{route('holidays')}}" class="btn btn-space btn-secondary">Cancel</a>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end basic form -->
                        <!-- ============================================================== -->


                        <!-- ============================================================== -->
                        <!-- End Content  -->
                        <!-- ============================================================== -->
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
        <script src="{{asset('assets/vendor/datepicker/moment.js')}}"></script>
        <script src="{{asset('assets/vendor/datepicker/tempusdominus-bootstrap-4.js')}}"></script>
        <script src="{{asset('assets/vendor/datepicker/datepicker.js')}}"></script>
    @endsection

</body>
@endsection


