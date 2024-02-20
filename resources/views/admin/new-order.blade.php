@extends('layouts.dashboard')
@section('style')
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
                                <h5 class="card-header">New Order</h5>
                                <div class="card-body">
                                    <form action="#" id="basicform" data-parsley-validate="">
                                        <div class="form-group">
                                            <label  for="roomNumber">Check Number</label>
                                            <input data-parsley-type="number" type="text" required="" placeholder="Enter only numbers" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label  for="roomNumber">Room Number</label>
                                            <input data-parsley-type="number" type="text" required="" placeholder="Enter only numbers" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label  for="roomNumber">Cover</label>
                                            <input data-parsley-type="number" type="text" required="" placeholder="Enter only numbers" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="input-select">Order Taker</label>
                                            <select class="form-control" id="input-select">
                                                <option>Person 1</option>
                                                <option>Person 2</option>
                                                <option>Person 3</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="details">Details</label>
                                                <textarea required="" class="form-control"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-success">Submit</button>
                                                    <a href="{{route('home')}}" class="btn btn-space btn-secondary">Cancel</a>
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
    @endsection
</body>
@endsection