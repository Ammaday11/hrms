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
                                    <h3 class="mb-2">Edit Employee Personal Information</h3>
                                    <p class="pageheader-text"></p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{route('all-employees')}}" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="{{route('all-employees')}}" class="breadcrumb-link">Employees</a></li>
                                                <li class="breadcrumb-item"><a href="{{route('employees-profile', ['id' => $employee->id])}}" class="breadcrumb-link">{{$employee->fname}} {{$employee->lname}}</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Edit Personal Info</li>
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
                                        <h5 class="card-header">Edit {{$employee->fname}}'s Personal Information</h5>
                                        <div class="card-body">
                                            <form action="{{ route('update_employee_personal', ['id' => $employee->id])}}"  data-parsley-validate="" method='POST' enctype="multipart/form-data">
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
                                                    <label  for="NID">NID or Passport</label>
                                                    @if($employee->NID)
                                                    <input  type="text" name="NID" readonly required="" value="{{ old('NID', $employee->NID) }}" placeholder="NID or Passport" class="form-control">
                                                    @else
                                                    <input  type="text" name="NID" required="" value="{{ old('NID', $employee->NID) }}" placeholder="NID or Passport" class="form-control">
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label  for="email">Email</label>
                                                    @if($employee->email)
                                                    <input  type="text" name="email" readonly required="" value="{{ old('email', $employee->email) }}" placeholder="Email" class="form-control">
                                                    @else
                                                    <input  type="text" name="email" required="" value="{{ old('email', $employee->email) }}" placeholder="Email" class="form-control">
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label  for="phone">Phone</label>
                                                    <input data-parsley-type="number" type="text" name="phone" required="" value="{{ old('phone', $employee->phone) }}" placeholder="Phone" class="form-control">
                                                </div>
                                                @if($employee->dob)
                                                    <div class="form-group">
                                                        <label  for="dob">Date of Birth</label>
                                                        <input  type="text" name="dob" disabled required="" value="{{ old('dob', $employee->dob) }}" placeholder="Date of Birth" class="form-control">
                                                    </div>
                                                @else
                                                    <div class="form-group">
                                                        <label for="dob">Date of Birth</label>
                                                        <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                                            <input type="text" name="dob" class="form-control datetimepicker-input" data-target="#datetimepicker4" />
                                                            <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="form-group">
                                                    <label  for="parmanant_address">Permanant Address</label>
                                                    <input  type="text" name="parmanant_address" required="" value="{{ old('parmanant_address', $employee->parmanant_address) }}" placeholder="Permanant Address" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nationality-select">Nationality</label>
                                                    <select name="nationality" class="form-control custom-select" id="nationality-select">
                                                        <option value="{{ old('nationality', $employee->nationality) }}"  selected >{{$employee->nationality}}</option>
                                                        <option value="American">American</option>
                                                        <option value="British">British</option>
                                                        <option value="Canadian">Canadian</option>
                                                        <option value="Australian">Australian</option>
                                                        <option value="French">French</option>
                                                        <option value="German">German</option>
                                                        <option value="Italian">Italian</option>
                                                        <option value="Spanish">Spanish</option>
                                                        <option value="Japanese">Japanese</option>
                                                        <option value="Chinese">Chinese</option>
                                                        <option value="Indian">Indian</option>
                                                        <option value="Brazilian">Brazilian</option>
                                                        <option value="Russian">Russian</option>
                                                        <option value="Mexican">Mexican</option>
                                                        <option value="South African">South African</option>
                                                        <option value="Nigerian">Nigerian</option>
                                                        <option value="Argentinian">Argentinian</option>
                                                        <option value="Colombian">Colombian</option>
                                                        <option value="Egyptian">Egyptian</option>
                                                        <option value="Turkish">Turkish</option>
                                                        <option value="Maldivian">Maldivian</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="religion-select">Religion</label>
                                                    <select name="religion" class="form-control custom-select" id="religion-select">
                                                        <option value="{{ old('religion', $employee->religion) }}"  selected >{{$employee->religion}}</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Christian">Christian</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Sikh">Sikh</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="marital_status-select">Marital_status</label>
                                                    <select name="marital_status" class="form-control custom-select" id="marital_status-select">
                                                        <option value="{{ old('marital_status', $employee->marital_status) }}"  selected >{{$employee->marital_status}}</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Divorced">Divorced</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label  for="no_kids">No. of kids</label>
                                                    <input data-parsley-type="number" type="text" name="no_kids" required="" value="{{ old('no_kids', $employee->no_kids) }}"  placeholder="No. of kids" class="form-control">
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                        
                                                    </div>
                                                    <div class="col-sm-6 pl-0">
                                                        <p class="text-right">
                                                            <button type="submit" class="btn btn-space btn-success">Submit</button>
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
            
            
            <script src="{{asset('assets/vendor/datepicker/moment.js')}}"></script>
            <script src="{{asset('assets/vendor/datepicker/tempusdominus-bootstrap-4.js')}}"></script>
            <script src="{{asset('assets/vendor/datepicker/datepicker.js')}}"></script>

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


