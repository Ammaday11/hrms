@extends('layouts.dashboard')

@section('style')
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
                                    <h3 class="mb-2">Delete Employee</h3>
                                    <p class="pageheader-text"></p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{route('all-employees')}}" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="{{route('all-employees')}}" class="breadcrumb-link">Employees</a></li>
                                                <li class="breadcrumb-item"><a href="{{route('employees-profile', ['id' => $employee->id])}}" class="breadcrumb-link">{{$employee->fname}} {{$employee->lname}}</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Delete Employee</li>
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
                                <h5 class="card-header">Are you sure you want to delete {{ $employee->fname }} {{ $employee->lname }} - {{$employee->employeeID}}?</h5>
                                <div class="card-body">
                                    <form action="{{route('destroy_employee', ['id' => $employee->id])}}"  data-parsley-validate="" method='POST' enctype="multipart/form-data">
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
                                            <input  type="text" name="employeeID" value="{{ old('employeeID', $employee->employeeID) }}" placeholder="Employee ID" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label  for="fname">First Name</label>
                                            <input  type="text" name="fname" value="{{ old('fname', $employee->fname) }}" placeholder="First Name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label  for="lname">Last Name</label>
                                            <input  type="text" name="lname"  value="{{ old('lname', $employee->lname) }}" placeholder="Last Name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label  for="email">Email</label>
                                            <input  type="text" name="email" value="{{ old('email', $employee->email) }}" placeholder="Email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label  for="phone">Phone</label>
                                            <input data-parsley-type="number" type="text" name="phone" value="{{ old('phone', $employee->phone) }}" placeholder="Phone" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label  for="joined_date">Joined Date</label>
                                            <input data-parsley-type="number" type="text" name="joined_date" value="{{ old('joined_date', $employee->joined_date) }}" placeholder="Joined Date" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label  for="department_id">Department</label>
                                            <input data-parsley-type="number" type="text" name="department_id" value="{{ old('department_id', $employee->department->name) }}" placeholder="Department" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label  for="designation_id">Designation</label>
                                            <input data-parsley-type="number" type="text" name="designation_id" value="{{ old('designation_id', $employee->designation->designation) }}" placeholder="Designation" class="form-control">
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-success">Delete</button>
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
    @endsection

</body>
@endsection


