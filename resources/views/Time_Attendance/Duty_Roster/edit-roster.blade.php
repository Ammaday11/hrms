@extends('layouts.dashboard')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/datatables/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/datatables/css/buttons.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/datatables/css/select.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/datatables/css/fixedHeader.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/datepicker/tempusdominus-bootstrap-4.css')}}">
<style>
.input-group.date {
        width: 200px; /* Adjust the width as needed */
        height: 40px; /* Adjust the height as needed */
    }
</style>
@endsection

@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h3 class="mb-2 ">Modify Duty Roster</h3>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{route('all-employees')}}" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="{{route('index_roster')}}" class="breadcrumb-link">Duty Roster</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Modify Duty Roster</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h5 class="mb-0">{{ \Carbon\Carbon::createFromDate(date('Y'), $currentMonth, 1)->format('F') }} {{$currentYear}} - Duty Roster</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('update_roster') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="month" value="{{ $currentMonth }}">
                                    <input type="hidden" name="year" value="{{ $currentYear }}">
                                    <button type="submit" class="text-right mb-3 btn btn-success">Save Changes</button>
                                    <a href="{{ route('index_roster') }}" class="text-right mb-3 btn btn-secondary">Cancel</a>
                                
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
                                                    <tr>
                                                        <td>{{$employee->employeeID}}</td>
                                                        <td>{{ $employee->department->name }}</td>
                                                        @for($day = 1; $day <= cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear); $day++)
                                                            <td>
                                                                <select name="roster[{{ $employee->id }}][{{ $day }}]" class="custom-select ml-auto w-auto">
                                                                @foreach($shifts as $shift)
                                                                    @php
                                                                      $rosterEntry = $rosterData->where('employee_id', $employee->id)
                                                                                                ->where('date', Carbon\Carbon::createFromDate($currentYear, $currentMonth, $day)->toDateString())
                                                                                                ->first();
                                                                    @endphp
                                                                    <option value="{{ $shift->id }}" @if($rosterEntry && $rosterEntry->shift_id == $shift->id) selected @endif>{{ $shift->short_code }}</option>
                                                                @endforeach
                                                                </select>
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets/vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="{{asset('assets/vendor/datatables/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables/js/data-table.js')}}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script> -->
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<!-- <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script> -->
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script src="{{asset('assets/vendor/datepicker/moment.js')}}"></script>
<script src="{{asset('assets/vendor/datepicker/tempusdominus-bootstrap-4.js')}}"></script>
<script src="{{asset('assets/vendor/datepicker/datepicker.js')}}"></script>
@endsection
