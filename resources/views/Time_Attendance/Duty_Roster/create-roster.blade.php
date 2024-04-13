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
                                    <h3 class="mb-2">Create Roster for {{ \Carbon\Carbon::createFromDate(date('Y'), $currentMonth, 1)->format('F') }} {{$currentYear}}</h3>
                                    <p class="pageheader-text"></p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{route('all-employees')}}" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="{{route('index_roster')}}" class="breadcrumb-link">Duty Roster</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Create Roaster</li>
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
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin: auto">
                            <div class="card">
                                <h5 class="card-header">Create Duty Roster for {{ \Carbon\Carbon::createFromDate(date('Y'), $currentMonth, 1)->format('F') }} {{$currentYear}}</h5>
                                <div class="card-body">
                                    <form action="{{ route('store_roster') }}"  data-parsley-validate="" method='POST' enctype="multipart/form-data">
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

                                        <input type="hidden" name="year" value="{{ $currentYear }}">
                                        <input type="hidden" name="month" value="{{ $currentMonth }}">
                                        <button type="submit" class="btn btn-space btn-success">Submit</button>
                                        <a href="{{route('index_roster')}}" class="btn btn-space btn-secondary">Cancel</a>
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        @for($day = 1; $day <= cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear); $day++)
                                                            <td>{{ date('D', mktime(0, 0, 0, $currentMonth, $day, $currentYear)) }}</td>
                                                        @endfor
                                                        
                                                    </tr>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Department</th>
                                                        @for($day = 1; $day <= cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear); $day++)
                                                            <th>{{ str_pad($day, 2, '0', STR_PAD_LEFT) }}</th>
                                                        @endfor
                                                        
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody>
                                                    @foreach($employees as $employee)
                                                        <tr >
                                                            <td>{{$employee->employeeID}}</td>
                                                            <td>{{$employee->department->name}}</td>
                                                            @for($day = 1; $day <= cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear); $day++)
                                                                <td>
                                                                    <select class="custom-select ml-auto w-auto" name="shifts[{{ $employee->id }}][{{ $day }}]">
                                                                        @foreach($shifts as $shift)
                                                                            <option value="{{ $shift->id }}">{{ $shift->short_code }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            @endfor
                                                        </tr>
                                                    @endforeach                                            
                                                </tbody>
                                            </table>
                                         </div>

                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                
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
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="{{asset('assets/vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/vendor/datatables/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/vendor/datatables/js/data-table.js')}}"></script>
    @endsection

</body>
@endsection


