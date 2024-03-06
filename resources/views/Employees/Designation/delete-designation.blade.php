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
                                    <h3 class="mb-2">Delete Designation</h3>
                                    <p class="pageheader-text"></p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{route('all-employees')}}" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="{{route('show_designations')}}" class="breadcrumb-link">Designation</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Delete Designation</li>
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
                                <h5 class="card-header">Are you sure you want to delete {{ $designation->designation }} designation?</h5>
                                <div class="card-body">
                                    <form action="{{route('destroy_designation', ['id' => $designation->id])}}"  data-parsley-validate="" method='POST' enctype="multipart/form-data">
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
                                            <label  for="name">Designation</label>
                                            <input type="text" disabled name="name" required="" placeholder="Designation" value="{{ old('name', $designation->designation) }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label  for="department_id">Department</label>
                                            <input type="text" disabled name="department" required="" placeholder="Department Name" value="{{ old('department_id', $designation->department->name) }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label  for="salary">Salary</label>
                                            <input type="text" disabled name="salary" required="" placeholder="Salary" value="{{ old('name', $designation->salary) }}" class="form-control">
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-success">Delete</button>
                                                    <a href="{{route('show_designations')}}" class="btn btn-space btn-secondary">Cancel</a>
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
    




            
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include('include.footer')
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
            
        @section('script')
        @endsection

    </body>
@endsection


