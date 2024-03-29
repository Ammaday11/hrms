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
                                    <h3 class="mb-2">Delete Shift</h3>
                                    <p class="pageheader-text"></p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{route('all-employees')}}" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="{{route('index_shifts')}}" class="breadcrumb-link">Shifts</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Delete Shift</li>
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
                                <h5 class="card-header">Are you sure you want to delete this shift?</h5>
                                <div class="card-body">
                                    <form action="{{ route('destroy_shift', ['id' => $shift->id]) }}"  data-parsley-validate="" method='POST' enctype="multipart/form-data">
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
                                            <label  for="name">Name</label>
                                            <input data-parsley-type="number" name="name" type="text" required="" value="{{ old('name', $shift->name) }}" placeholder="Name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label  for="short_code">Short Code</label>
                                            <input data-parsley-type="number" name="short_code" type="text" readonly  value="{{ old('short_code', $shift->short_code) }}" placeholder="Short Code" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="startTime">Start Time</label>
                                            <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                                <input type="text" name="start_time"   value="{{ old('start_time', $shift->start_time) }}"  class="form-control datetimepicker-input" data-target="#datetimepicker3">
                                                <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="startTime">End Time</label>
                                            <div class="input-group date" id="datetimepicker14" data-target-input="nearest">
                                                <input type="text" name="end_time" value="{{ old('end_time', $shift->end_time) }}" class="form-control datetimepicker-input" data-target="#datetimepicker14">
                                                <div class="input-group-append" data-target="#datetimepicker14" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="">Has OT</label>
                                            <!-- <div class="col-12 col-sm-8 col-lg-6 pt-1"> -->
                                                <div class="switch-button switch-button-sm switch-button-primary pt-1 ml-4">
                                                    <input type="checkbox" id="switch16" name="hasOT" value="1" {{ old('hasOT', $shift->hasOT) ? 'checked' : '' }}><span>
                                                    <label for="switch16"></label></span>
                                                </div>
                                            <!-- </div> -->
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-success">Delete</button>
                                                    <a href="{{route('index_shifts')}}" class="btn btn-space btn-secondary">Cancel</a>
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
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
         -->

        <script src="{{asset('assets/vendor/datepicker/moment.js')}}"></script>
        <script src="{{asset('assets/vendor/datepicker/tempusdominus-bootstrap-4.js')}}"></script>
        <script src="{{asset('assets/vendor/datepicker/datepicker.js')}}"></script>
        
    @endsection

</body>
@endsection


