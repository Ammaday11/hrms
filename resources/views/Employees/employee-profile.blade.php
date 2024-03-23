@extends('layouts.dashboard')
@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
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
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header">
                                    <h3 class="mb-2">Employee Profile</h3>
                                    <p class="pageheader-text"></p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{route('all-employees')}}" class="breadcrumb-link">Employees</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Employee Profile</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- <a href="{{route('add-employees')}}" class="text-right mb-3 btn btn-info">Edit Employee</a> -->
                            </div>
                        </div>

                        
                        <!-- ============================================================== -->
                    <!-- content -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- profile -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- card profile -->
                            <!-- ============================================================== -->
                            <div class="card">
                                <div class="card-header d-flex">
                                    <div class="dropdown ml-auto">
                                        <a class="toolbar" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-dots-vertical"></i> </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; transform: translate3d(18px, 23px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="{{route('edit_profile_image', ['id' => $employee->id])}}">Upload new photo</a>
                                            <a class="dropdown-item" href="{{route('edit_employee', ['id' => $employee->id])}}">Edit</a>
                                            <a class="dropdown-item" href="{{route('delete_employee', ['id' => $employee->id])}}">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="user-avatar text-center d-block">
                                        @if($employee->image)
                                            <img src="{{$employee->image}}" alt="" class="rounded-circle user-avatar-xxl">
                                            <!-- <img src="/{{ $employee->image }}" alt="" class="rounded-circle user-avatar-xxl"> -->
                                        @else
                                            <img src="https://t3.ftcdn.net/jpg/02/43/51/48/360_F_243514868_XDIMJHNNJYKLRST05XnnTj0MBpC4hdT5.jpg" alt="" class="rounded-circle user-avatar-xxl">
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        <h2 class="font-24 mb-0 text-default">{{$employee->fname}} {{$employee->lname}}</h2>
                                        <p>{{$employee->designation->designation}}</p>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3 class="font-16">Employee Information</h3>
                                    <div class="">
                                        <ul class="list-unstyled mb-0">
                                        <li class="mb-2">{{$employee->employeeID}}</li>
                                        <li class="mb-0">{{$employee->department->name}}</li>
                                        <li class="mb-0">Since {{\Carbon\Carbon::parse($employee->joined_date)->format('d-M-Y')}}</li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3 class="font-16">Contact Information</h3>
                                    <div class="">
                                        <ul class="list-unstyled mb-0">
                                        <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i>{{$employee->email}}</li>
                                        <li class="mb-0"><i class="fas fa-fw fa-phone mr-2"></i>{{$employee->phone}}</li>
                                    </ul>
                                    </div>
                                </div>
                                <!-- <div class="card-body border-top">
                                    <h3 class="font-16">Rating</h3>
                                    <h1 class="mb-0">4.8</h1>
                                    <div class="rating-star">
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <p class="d-inline-block text-dark">14 Reviews </p>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3 class="font-16">Social Channels</h3>
                                    <div class="">
                                        <ul class="mb-0 list-unstyled">
                                        <li class="mb-1"><a href="#"><i class="fab fa-fw fa-facebook-square mr-1 facebook-color"></i>fb.me/michaelchristy</a></li>
                                        <li class="mb-1"><a href="#"><i class="fab fa-fw fa-twitter-square mr-1 twitter-color"></i>twitter.com/michaelchristy</a></li>
                                        <li class="mb-1"><a href="#"><i class="fab fa-fw fa-instagram mr-1 instagram-color"></i>instagram.com/michaelchristy</a></li>
                                        <li class="mb-1"><a href="#"><i class="fas fa-fw fa-rss-square mr-1 rss-color"></i>michaelchristy.com/blog</a></li>
                                        <li class="mb-1"><a href="#"><i class="fab fa-fw fa-pinterest-square mr-1 pinterest-color"></i>pinterest.com/michaelchristy</a></li>
                                        <li class="mb-1"><a href="#"><i class="fab fa-fw fa-youtube mr-1 youtube-color"></i>youtube/michaelchristy</a></li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3 class="font-16">Category</h3>
                                    <div>
                                        <a href="#" class="badge badge-light mr-1">Fitness</a><a href="#" class="badge badge-light mr-1">Life Style</a><a href="#" class="badge badge-light mr-1">Gym</a>
                                    </div>
                                </div> -->
                            </div>
                            <!-- ============================================================== -->
                            <!-- end card profile -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- end profile -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- campaign data -->
                        <!-- ============================================================== -->
                        <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- campaign tab one -->
                            <!-- ============================================================== -->
                            <div class="influence-profile-content pills-regular">
                                <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-campaign-tab" data-toggle="pill" href="#pills-campaign" role="tab" aria-controls="pills-campaign" aria-selected="true">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-packages-tab" data-toggle="pill" href="#pills-packages" role="tab" aria-controls="pills-packages" aria-selected="false">Bank & Statutory</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-selected="false">Reviews</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-msg-tab" data-toggle="pill" href="#pills-msg" role="tab" aria-controls="pills-msg" aria-selected="false">Send Messages</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="section-block">
                                                    <h2 class="section-title">Profile Information</h2>
                                                </div>
                                                @if ($errors->any())
                                                    @foreach ($errors->all() as $error)
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{$error}}
                                                            <a href="#" class="alert close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </a> 
                                                        </div>
                                                    @endforeach
                                                @endif
                                                @if (session()->has('error'))
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">{{session('error')}}
                                                        <a href="#" class="alert close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </a> 
                                                    </div>
                                                @endif
                                                @if (session()->has('success'))
                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">{{session('success')}}
                                                        <a href="#" class="alert close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </a> 
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-header d-flex bg-light">
                                                        <h4 class="mb-0 text-primary">Personal Information</h4>
                                                        <div class="dropdown ml-auto">
                                                            <a class="toolbar" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-dots-vertical"></i> </a>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; transform: translate3d(18px, 23px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item" href="{{route('edit_employee_personal', ['id' => $employee->id])}}">Edit</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body p-0">
                                                        <ul class="traffic-sales list-group list-group-flush">
                                                            <li class="traffic-sales-content list-group-item "><span class="traffic-sales-name">National ID / Passport</span><span class="traffic-sales-amount">{{$employee->NID}}</span>
                                                            </li>
                                                            <li class="traffic-sales-content list-group-item"><span class="traffic-sales-name">Contact No<span class="traffic-sales-amount">{{$employee->phone}}</span>
                                                                </span>
                                                            </li>
                                                            <li class="traffic-sales-content list-group-item"><span class="traffic-sales-name">Email<span class="traffic-sales-amount">{{$employee->email}}</span>
                                                                </span>
                                                            </li>
                                                            
                                                            <li class="traffic-sales-content list-group-item"><span class="traffic-sales-name">Date of Birth
                                                                @if($employee->dob)
                                                                <span class="traffic-sales-amount">{{\Carbon\Carbon::parse($employee->dob)->format('d-M-Y')}}</span>
                                                                @endif
                                                            </span>
                                                            </li>
                                                            
                                                            <li class="traffic-sales-content list-group-item"><span class="traffic-sales-name">Permanant Address<span class="traffic-sales-amount ">{{$employee->parmanant_address}}</span>
                                                                </span>
                                                            </li>
                                                            <li class="traffic-sales-content list-group-item"><span class="traffic-sales-name">Nationality<span class="traffic-sales-amount ">{{$employee->nationality}}</span>
                                                                </span>
                                                            </li>
                                                            <li class="traffic-sales-content list-group-item"><span class="traffic-sales-name">Religion<span class="traffic-sales-amount ">{{$employee->religion}}</span>
                                                                </span>
                                                            </li>
                                                            <li class="traffic-sales-content list-group-item "><span class="traffic-sales-name">Marital Status<span class="traffic-sales-amount">{{$employee->marital_status}}</span>
                                                            </li>
                                                            <li class="traffic-sales-content list-group-item "><span class="traffic-sales-name">No. of children<span class="traffic-sales-amount">{{$employee->no_kids}}</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <a href="#" class="btn-primary-link">View Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-header d-flex bg-light">
                                                        <h4 class="mb-0 text-primary">Emergency Contact 01</h4>
                                                        <div class="dropdown ml-auto">
                                                            <a class="toolbar" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-dots-vertical"></i> </a>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; transform: translate3d(18px, 23px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item" href="{{route('edit_employee_emergency', ['id' => $employee->id])}}">Edit</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body p-0">
                                                        <ul class="traffic-sales list-group list-group-flush">
                                                            <li class="traffic-sales-content list-group-item "><span class="traffic-sales-name">Name</span><span class="traffic-sales-amount">{{$employee->emg_name1}}</span>
                                                            </li>
                                                            <li class="traffic-sales-content list-group-item"><span class="traffic-sales-name">Relationship<span class="traffic-sales-amount">{{$employee->emg_relation1}}</span>
                                                            </li>
                                                            <li class="traffic-sales-content list-group-item"><span class="traffic-sales-name">Phone<span class="traffic-sales-amount ">{{$employee->emg_phone1}}</span>
                                                            </li>
                                                            @if($employee->emg_name2)
                                                                <h5 class="card-header text-primary border-top bg-light">Emergency Contact 02</h5>
                                                                <li class="traffic-sales-content list-group-item "><span class="traffic-sales-name">Name</span><span class="traffic-sales-amount">{{$employee->emg_name2}}</span>
                                                                </li>
                                                                <li class="traffic-sales-content list-group-item"><span class="traffic-sales-name">Relationship<span class="traffic-sales-amount">{{$employee->emg_relation2}}</span>
                                                                </li>
                                                                <li class="traffic-sales-content list-group-item"><span class="traffic-sales-name">Phone<span class="traffic-sales-amount ">{{$employee->emg_phone2}}</span>
                                                                </li>
                                                            @endif
                                                            
                                                        </ul>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <a href="#" class="btn-primary-link">View Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-header d-flex bg-light">
                                                        <h4 class="mb-0 text-primary">Bank Details</h4>
                                                        <div class="dropdown ml-auto">
                                                            <a class="toolbar" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-dots-vertical"></i> </a>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; transform: translate3d(18px, 23px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item" href="{{route('edit_employee_bank', ['id' => $employee->id])}}">Edit</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body p-0">
                                                        <ul class="traffic-sales list-group list-group-flush">
                                                            <li class="traffic-sales-content list-group-item "><span class="traffic-sales-name">Bank Name</span><span class="traffic-sales-amount">{{$employee->bank_name}}</span>
                                                            </li>
                                                            <li class="traffic-sales-content list-group-item"><span class="traffic-sales-name">Account Name<span class="traffic-sales-amount">{{$employee->bank_acc_name}}</span>
                                                            </li>
                                                            <li class="traffic-sales-content list-group-item"><span class="traffic-sales-name">Account Number<span class="traffic-sales-amount ">{{$employee->bank_acc}}</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <a href="#" class="btn-primary-link">View Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>      
                                    </div>  
                                    <div class="tab-pane fade" id="pills-packages" role="tabpanel" aria-labelledby="pills-packages-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="section-block">
                                                    <h2 class="section-title">My Packages</h2>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-header bg-primary text-center p-3 ">
                                                        <h4 class="mb-0 text-white"> Basic</h4>
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <h1 class="mb-1">$150</h1>
                                                        <p>Per Month Plateform</p>
                                                    </div>
                                                    <div class="card-body border-top">
                                                        <ul class="list-unstyled bullet-check font-14">
                                                            <li>Facebook, Instagram, Pinterest,Snapchat.</li>
                                                            <li>Guaranteed follower growth for increas brand awareness.</li>
                                                            <li>Daily updates on choose platforms</li>
                                                            <li>Stronger customer service through daily interaction</li>
                                                            <li>Monthly progress report</li>
                                                            <li>1 Million Followers</li>
                                                        </ul>
                                                        <a href="#" class="btn btn-outline-secondary btn-block btn-lg">Get Started</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-header bg-info text-center p-3">
                                                        <h4 class="mb-0 text-white"> Standard</h4>
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <h1 class="mb-1">$350</h1>
                                                        <p>Per Month Plateform</p>
                                                    </div>
                                                    <div class="card-body border-top">
                                                        <ul class="list-unstyled bullet-check font-14">
                                                            <li>Facebook, Instagram, Pinterest,Snapchat.</li>
                                                            <li>Guaranteed follower growth for increas brand awareness.</li>
                                                            <li>Daily updates on choose platforms</li>
                                                            <li>Stronger customer service through daily interaction</li>
                                                            <li>Monthly progress report</li>
                                                            <li>2 Blog Post & 3 Social Post</li>
                                                            <li>5 Millions Followers</li>
                                                            <li>Growth Result</li>
                                                        </ul>
                                                        <a href="#" class="btn btn-secondary btn-block btn-lg">Get Started</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-header bg-primary text-center p-3">
                                                        <h4 class="mb-0 text-white">Premium</h4>
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <h1 class="mb-1">$550</h1>
                                                        <p>Per Month Plateform</p>
                                                    </div>
                                                    <div class="card-body border-top">
                                                        <ul class="list-unstyled bullet-check font-14">
                                                            <li>Facebook, Instagram, Pinterest,Snapchat.</li>
                                                            <li>Guaranteed follower growth for increas brand awareness.</li>
                                                            <li>Daily updates on choose platforms</li>
                                                            <li>Stronger customer service through daily interaction</li>
                                                            <li>Monthly progress report & Growth Result</li>
                                                            <li>4 Blog Post & 6 Social Post</li>
                                                        </ul>
                                                        <a href="#" class="btn btn-secondary btn-block btn-lg">Contact us</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                        <div class="card">
                                            <h5 class="card-header">Campaign Reviews</h5>
                                            <div class="card-body">
                                                <div class="review-block">
                                                    <p class="review-text font-italic m-0">“Quisque lobortis vestibulum elit, vel fermentum elit pretium et. Nullam id ultrices odio. Cras id nulla mollis, molestie diam eu, facilisis tortor. Mauris ultrices lectus laoreet commodo hendrerit. Nullam varius arcu sed aliquam imperdiet. Etiam ut luctus augue.”</p>
                                                    <div class="rating-star mb-4">
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                    </div>
                                                    <span class="text-dark font-weight-bold">Tabitha C. Campbell</span><small class="text-mute"> (Company name)</small>
                                                </div>
                                            </div>
                                            <div class="card-body border-top">
                                                <div class="review-block">
                                                    <p class="review-text font-italic m-0">“Maecenas rutrum viverra augue. Nulla in eros vitae ante ullamcorper congue. Praesent tristique massa ac arcu dapibus tincidunt. Mauris arcu mi, lacinia et ipsum vel, sollicitudin laoreet risus.”</p>
                                                    <div class="rating-star mb-4">
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                    </div>
                                                    <span class="text-dark font-weight-bold">Luise M. Michet</span><small class="text-mute"> (Company name)</small>
                                                </div>
                                            </div>
                                            <div class="card-body border-top">
                                                <div class="review-block">
                                                    <p class="review-text font-italic m-0">“ Cras non rutrum neque. Sed lacinia ex elit, vel viverra nisl faucibus eu. Aenean faucibus neque vestibulum condimentum maximus. In id porttitor nisi. Quisque sit amet commodo arcu, cursus pharetra elit. Nam tincidunt lobortis augueat euismod ante sodales non. ”</p>
                                                    <div class="rating-star mb-4">
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                    </div>
                                                    <span class="text-dark font-weight-bold">Gloria S. Castillo</span><small class="text-mute"> (Company name)</small>
                                                </div>
                                            </div>
                                            <div class="card-body border-top">
                                                <div class="review-block">
                                                    <p class="review-text font-italic m-0">“Vestibulum cursus felis vel arcu convallis, viverra commodo felis bibendum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin non auctor est, sed lacinia velit. Orci varius natoque penatibus et magnis dis parturient montes nascetur ridiculus mus.”</p>
                                                    <div class="rating-star mb-4">
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                    </div>
                                                    <span class="text-dark font-weight-bold">Virgina G. Lightfoot</span><small class="text-mute"> (Company name)</small>
                                                </div>
                                            </div>
                                            <div class="card-body border-top">
                                                <div class="review-block">
                                                    <p class="review-text font-italic m-0">“Integer pretium laoreet mi ultrices tincidunt. Suspendisse eget risus nec sapien malesuada ullamcorper eu ac sapien. Maecenas nulla orci, varius ac tincidunt non, ornare a sem. Aliquam sed massa volutpat, aliquet nibh sit amet, tincidunt ex. Donec interdum pharetra dignissim.”</p>
                                                    <div class="rating-star mb-4">
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                    </div>
                                                    <span class="text-dark font-weight-bold">Ruby B. Matheny</span><small class="text-mute"> (Company name)</small>
                                                </div>
                                            </div>
                                        </div>
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item active"><a class="page-link " href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="tab-pane fade" id="pills-msg" role="tabpanel" aria-labelledby="pills-msg-tab">
                                        <div class="card">
                                            <h5 class="card-header">Send Messages</h5>
                                            <div class="card-body">
                                                <form>
                                                    <div class="row">
                                                        <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-3 col-md-12 col-sm-12 col-12 p-4">
                                                            <div class="form-group">
                                                                <label for="name">Your Name</label>
                                                                <input type="text" class="form-control form-control-lg" id="name" placeholder="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Your Email</label>
                                                                <input type="email" class="form-control form-control-lg" id="email" placeholder="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="subject">Subject</label>
                                                                <input type="text" class="form-control form-control-lg" id="subject" placeholder="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="messages">Messgaes</label>
                                                                <textarea class="form-control" id="messages" rows="3"></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary float-right">Send Message</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end campaign tab one -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- end campaign data -->
                        <!-- ============================================================== -->
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end content -->
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
        <script>
        // Automatically close alerts after 3 seconds
        $(document).ready(function(){
            $(".alert").delay(3000).fadeOut("slow");
        });
        </script>
    @endsection
</body>
@endsection