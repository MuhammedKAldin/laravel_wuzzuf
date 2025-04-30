@extends('portal.layout')

@section('content')

    <!-- job_searcing_wrap  -->
    @if ($userType == "employer")
            <!-- slider_area_end -->
            <div class="job_searcing_wrap overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 offset-lg-1 col-md-6">
                            <div class="searching_text">
                                <h3>Looking for a Expert?</h3>
                                <p>We provide online instant cash loans with quick approval </p>
                                <a href="{{route("addJob")}}" class="boxed-btn3">Post a Job</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @elseif ($userType == "employee")
            <!-- slider_area_end -->
            <div class="job_searcing_wrap overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 offset-lg-1 col-md-6">
                            <div class="searching_text">
                                <h3>Looking for a Job?</h3>
                                <p>We provide online instant cash loans with quick approval </p>
                                <a href="{{route("jobs.index")}}" class="boxed-btn3">Browse Job</a>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
    @else
        <!-- slider_area_start -->
        <div class="slider_area">
            <div class="single_slider  d-flex align-items-center bradcam_bg_3">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-6">
                            <div class="slider_text">
                                <h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">{{ \App\Models\JobOffer::count() }}+ Jobs listed</h5>
                                <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">Find your Dream Job!</h3>
                                <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">We provide online instant cash loans with quick approval that suit your term length</p>
                                <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                                    @guest
                                        <a href="{{ route('register') }}" class="boxed-btn3">Create Your Account Now.</a>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
                <img src="img/banner/illustration.png" alt="">
            </div>
        </div>
    @endif
        
    <!-- popular_catagory_area_start  -->
    <div class="popular_catagory_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title mb-40">
                        <h3>Popular Categories</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach(\App\Models\Category::withCount('jobOffers')->get() as $category)
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="{{ route('jobs.index', ['category' => $category->id]) }}"><h4>{{ $category->name }}</h4></a>
                        <p> <span>{{ $category->job_offers_count }}</span> Available position</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- popular_catagory_area_end  -->

    <!-- job_listing_area_start  -->
    <div class="job_listing_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section_title">
                        <h3>Job Listing</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="brouse_job text-right">
                        <a href="{{route("jobs.index")}}" class="boxed-btn4">Browse More Job</a>
                    </div>
                </div>
            </div>
            <div class="job_lists">
                <div class="row">
                    @foreach(\App\Models\JobOffer::with('employer')->inRandomOrder()->take(6)->get() as $job)
                    <div class="col-lg-12 col-md-12">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb" style="width: 100px; height: 100px; overflow: hidden; display: flex; align-items: center; justify-content: center; background-color: #f5f5f5;">
                                    <img src="{{ $job->employer->userAvatar }}" alt="{{ $job->employer->name }}" style="width: 100%; height: 100%; object-fit: contain;">
                                </div>
                                <div class="jobs_conetent">
                                    <a href="{{ route('showJobDetails', $job->id) }}"><h4>{{ $job->name }}</h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i> {{ $job->location }}</p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i> {{ $job->job_type }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                    <a href="{{ route('showJobDetails', $job->id) }}" class="boxed-btn3">Apply Now</a>
                                </div>
                                <div class="date">
                                    <p>Posted: {{ $job->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- job_listing_area_end  -->

    <div class="top_companies_area">
        <div class="container">
            <div class="row align-items-center mb-40">
                <div class="col-lg-6 col-md-6">
                    <div class="section_title">
                        <h3>Top Companies</h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="brouse_job text-right">
                        <a href="{{route("jobs.index")}}" class="boxed-btn4">Browse More Job</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach(\App\Models\User::where('role', 'employer')->withCount('jobOffers')->inRandomOrder()->take(4)->get() as $company)
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                        <div class="thumb" style="width: 100%; height: 200px; overflow: hidden; display: flex; align-items: center; justify-content: center; background-color: #f5f5f5;">
                            @if($company->avatar)
                                <img src="{{ asset('storage/' . $company->avatar) }}" alt="{{ $company->name }}" style="width: 100%; height: 100%; object-fit: contain;">
                            @else
                                <img src="{{ asset('img/svg_icon/5.svg') }}" alt="{{ $company->name }}" style="width: 100%; height: 100%; object-fit: contain;">
                            @endif
                        </div>
                        <a href="{{ route('jobs.index', ['company' => $company->name]) }}"><h3>{{ $company->name }}</h3></a>
                        <p> <span>{{ $company->job_offers_count }}</span> Available position</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- job_searcing_wrap end  -->
@endsection