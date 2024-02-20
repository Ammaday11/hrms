@extends('layouts.dashboard')
@section('style')

<link rel="stylesheet" href="../resources/assets/assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
@endsection
@section('content')
<body> 

    
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
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
                                <h5 class="card-header">Detail for Order # {{$order->id}}</h5>
                                <div class="card-body">
                                    <form action="#" id="basicform" data-parsley-validate="">
                                        <div class="form-group">
                                            <label  for="roomNumber">Check Number</label>
                                            <input disabled data-parsley-type="number" type="text" required="" placeholder="{{$order->CheckNo}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label  for="roomNumber">Room Number</label>
                                            <input disabled data-parsley-type="number" type="text" required="" placeholder="{{$order->RoomNo}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label  for="roomNumber">Cover</label>
                                            <input disabled data-parsley-type="number" type="text" required="" placeholder="{{$order->Cover}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="input-select">Order Taken By</label>
                                            <input disabled data-parsley-type="number" type="text" required="" placeholder="Order Taker" class="form-control">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="details">Details</label>
                                                <textarea disabled required="" class="form-control">{{$order->Details}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-select">Delivered By</label>
                                            <input disabled data-parsley-type="number" type="text" required="" placeholder="Delivered By" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="deliveredAt">Delivered At</label>
                                            <input disabled data-parsley-type="number" type="text" required="" placeholder="Delivered At" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="input-select">Cleared By</label>
                                            <input readonly data-parsley-type="number" type="text" required="" placeholder="Cleared By" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="clearedAt">Cleared At</label>
                                            <input readonly data-parsley-type="number" type="text" required="" placeholder="Cleared At" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <input readonly data-parsley-type="number" type="text" required="" placeholder="Status" class="form-control">
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <a href="{{route('edit-order', ['id' => $order->id])}}" class="btn btn-space btn-warning" >Edit</a>
                                                    <a href="{{route('home')}}" class="btn btn-space btn-secondary">Close</a>
                                                    {{-- <button class="btn btn-space btn-secondary">Cancel</button> --}}
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
    <script src="../resources/assets/assets/vendor/datepicker/moment.js"></script>
    <script src="../resources/assets/assets/vendor/datepicker/tempusdominus-bootstrap-4.js"></script>
    <script src="../resources/assets/assets/vendor/datepicker/datepicker.js"></script>
    @endsection
</body>
@endsection