@extends('layouts.dashboard')

@section('style')
<!-- <link rel="stylesheet" href="{{asset('assets/vendor/datepicker/tempusdominus-bootstrap-4.css')}}"> -->
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
                                    <h3 class="mb-2">Employee Profile Image</h3>
                                    <p class="pageheader-text"></p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{route('all-employees')}}" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="{{route('all-employees')}}" class="breadcrumb-link">Employees</a></li>
                                                <li class="breadcrumb-item"><a href="{{route('employees-profile', ['id' => $employee->id])}}" class="breadcrumb-link">{{$employee->fname}} {{$employee->lname}}</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Edit Emergency Contact Info</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            
                                <!-- ============================================================== -->
                                <!-- basic form -->
                                <!-- ============================================================== -->
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" style="margin: auto">
                                    <div class="card">
                                        <h5 class="card-header">Edit {{$employee->fname}}'s Profile Image</h5>
                                        <div class="card-body">
                                            <form action="{{ route('update_profile_image', ['id' => $employee->id])}}"  data-parsley-validate="" method='POST' enctype="multipart/form-data">
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
                                                <div class="user-avatar text-center d-block">
                                                    @if($employee->image)
                                                        <img src="{{$employee->image}}" alt="" class="rounded-circle user-avatar-xxl">
                                                    @else
                                                        <img src="https://t3.ftcdn.net/jpg/02/43/51/48/360_F_243514868_XDIMJHNNJYKLRST05XnnTj0MBpC4hdT5.jpg" alt="" class="rounded-circle user-avatar-xxl">
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label  for="image">Profile Image</label>
                                                    <input  type="file" name="image"  value="{{ old('image', $employee->image) }}" placeholder="Upload new image" class="form-control ">
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                        
                                                    </div>
                                                    <div class="col-sm-6 pl-0">
                                                        <p class="text-right">
                                                            <button type="submit" class="btn btn-space btn-success">Upload</button>
                                                            <a href="{{route('employees-profile', ['id' => $employee->id])}}" class="btn btn-space btn-secondary">Cancel</a>
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
            
            
            <!-- <script src="{{asset('assets/vendor/datepicker/moment.js')}}"></script>
            <script src="{{asset('assets/vendor/datepicker/tempusdominus-bootstrap-4.js')}}"></script>
            <script src="{{asset('assets/vendor/datepicker/datepicker.js')}}"></script> -->

            <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
            <!-- <script>
                $(document).ready(function () {
                    $('#department-select').on('change', function () {
                        var departmentId = $(this).val();
                        if (departmentId) {
                            $.ajax({
                                type: 'GET',
                                url: '/getDesignations/' + departmentId,
                                success: function (data) {
                                    $('#designation-select').empty();
                                    $('#designation-select').append('<option value="" selected>Select</option>');
                                    $.each(data, function (key, value) {
                                        $('#designation-select').append('<option value="' + value.id + '">' + value.designation + '</option>');
                                    });
                                }
                            });
                        } else {
                            $('#designation-select').empty();
                            $('#designation-select').append('<option value="" selected>Select</option>');
                        }
                    });
                });
            </script> -->
        @endsection
    </body>
@endsection


