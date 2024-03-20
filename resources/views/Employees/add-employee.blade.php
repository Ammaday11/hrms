@extends('layouts.dashboard')

@section('style')
<!-- <link rel="stylesheet" href="../resources/assets/assets/vendor/datatables/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="../resources/assets/assets/vendor/datatables/css/buttons.bootstrap4.css">
<link rel="stylesheet" href="../resources/assets/assets/vendor/datatables/css/select.bootstrap4.css">
<link rel="stylesheet" href="../resources/assets/assets/vendor/datatables/css/fixedHeader.bootstrap4.css"> -->
<!-- <link rel="stylesheet" href="../resources/assets/assets/vendor/datepicker/tempusdominus-bootstrap-4.css"> -->


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
                                    <h3 class="mb-2">Add Employee</h3>
                                    <p class="pageheader-text"></p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{route('all-employees')}}" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="{{route('all-employees')}}" class="breadcrumb-link">Employees</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Add Employee</li>
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
                                        <h5 class="card-header">Add Employee</h5>
                                        <div class="card-body">
                                            <form action="{{ route('store_employee') }}"  data-parsley-validate="" method='POST' enctype="multipart/form-data">
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
                                                    <label  for="employeeID">Employee ID</label>
                                                    <input  type="text" name="employeeID" required="" placeholder="Employee ID" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label  for="fname">First Name</label>
                                                    <input  type="text" name="fname" required="" placeholder="First Name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label  for="lname">Last Name</label>
                                                    <input  type="text" name="lname"  required="" placeholder="Last Name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label  for="email">Email</label>
                                                    <input  type="text" name="email" required="" placeholder="Email" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label  for="phone">Phone</label>
                                                    <input data-parsley-type="number" type="text" name="phone" required="" placeholder="Phone" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="joined_date">Joining Date</label>
                                                    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                                        <input type="text" name="joined_date" class="form-control datetimepicker-input" data-target="#datetimepicker4" />
                                                        <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="department-select">Department</label>
                                                    <select name="department_id" class="form-control custom-select" id="department-select">
                                                        <option value="" selected="" >Select</option>
                                                        @foreach ($departments as $department)
                                                            <option value="{{ $department->id }}">{{ ucwords($department->name) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="designation-select">Designation</label>
                                                    <select name="designation_id" class="form-control custom-select" id="designation-select">
                                                        <option value=""  selected >Select</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                        
                                                    </div>
                                                    <div class="col-sm-6 pl-0">
                                                        <p class="text-right">
                                                            <button type="submit" class="btn btn-space btn-success">Submit</button>
                                                            <a href="{{route('all-employees')}}" class="btn btn-space btn-secondary">Cancel</a>
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

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
        <script>
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
        </script>
    @endsection

    </body>
@endsection


