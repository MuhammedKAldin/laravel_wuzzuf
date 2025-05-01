@extends('portal.layout')

@section('content')

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container pt-5">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>{{ $job->name }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--/ bradcam_area  --> 

    <div class="job_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb" style="width: 20%; height: 90px; overflow: hidden; display: flex; align-items: center; justify-content: center; background-color: #f5f5f5;">
                                    <img src="{{ $job->employer->userAvatar }}" alt="{{ $job->employer->name }}" style="width: 100%; height: 100%; object-fit: contain;">
                                </div>
                                <div class="jobs_conetent">
                                    <a href="#"><h4>{{ $job->name }}</h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i> {{ $job->location }}</p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i> {{ $job->availability }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Job description</h4>
                            <p>{{ $job->description }}</p>
                        </div>
                        <!-- <div class="single_wrap">
                            <h4>Responsibility</h4>
                            <ul>
                                @foreach(explode("\n", $job->responsibilities) as $responsibility)
                                    <li>{{ $responsibility }}</li>
                                @endforeach
                            </ul>
                        </div> -->
                        <div class="single_wrap">
                            <h4>Qualifications</h4>
                            <ul>
                                @foreach(explode("\n", $job->qualifications) as $qualification)
                                    <li>{{ $qualification }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- <div class="single_wrap">
                            <h4>Benefits</h4>
                            <p>{{ $job->benefits }}</p>
                        </div> -->
                    </div>
                    <div class="apply_job_form white-bg">
                        <h4>Apply for the job</h4>
                        @if (Auth::user())
                            @php
                                $hasApplied = \App\Models\JobOfferUser::where('job_offer_id', $job->id)
                                    ->where('user_id', Auth::user()->id)
                                    ->exists();
                            @endphp
                            
                            @if ($hasApplied)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success">
                                            <p>You have already applied for this job.</p>
                                            <a href="{{ route('showApplications') }}" class="boxed-btn3">View Your Applications</a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <form action="{{ route('jobs.apply') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="jid" value="{{ $job->id }}">
                                    <input type="hidden" name="uid" value="{{ Auth::user()->id }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input_field">
                                                <input type="text" placeholder="Your name" value="{{ Auth::user()->name }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input_field">
                                                <input type="text" placeholder="Email" value="{{ Auth::user()->email }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input_field">
                                                <input type="text" placeholder="Website/Portfolio link">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Current CV</label>
                                                @if(Auth::user()->cv_path)
                                                    <div class="mb-2">
                                                        <a href="{{ asset('storage/' . Auth::user()->cv_path) }}" target="_blank" class="btn btn-sm btn-info">
                                                            <i class="fa fa-file-pdf-o"></i> View Current CV
                                                        </a>
                                                    </div>
                                                @else
                                                    <p class="text-muted">No CV uploaded yet</p>
                                                @endif
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button type="button" id="inputGroupFileAddon03"><i class="fa fa-cloud-upload" aria-hidden="true"></i></button>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile03" name="cv" accept=".pdf,.doc,.docx">
                                                    <label class="custom-file-label" for="inputGroupFile03">Upload New CV (Optional)</label>
                                                </div>
                                            </div>
                                            <small class="form-text text-muted">Leave empty to use your current CV</small>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input_field">
                                                <textarea name="cover_letter" id="" cols="30" rows="10" placeholder="Cover letter"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="submit_btn">
                                                <button class="boxed-btn3 w-100" type="submit">Apply Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-info">
                                        <p>Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a> to apply for this job.</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('login') }}" class="boxed-btn3">Login</a>
                                        <a href="{{ route('register') }}" class="boxed-btn3">Register</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="job_sumary">
                        <div class="summery_header">
                            <h3>Job Summary</h3>
                        </div>
                        <div class="job_content">
                            <ul>
                                <li>Published on: <span>{{ \Carbon\Carbon::parse($job->created_at)->format('d M, Y') }}</span></li>
                                <li>Vacancy: <span>{{ $job->vacancy }} Position</span></li>
                                <!-- <li>Salary: <span>{{ $job->salary }}</span></li> -->
                                <li>Location: <span>{{ $job->location }}</span></li>
                                <li>Job Nature: <span>{{ $job->availability }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="share_wrap d-flex">
                        <span>Share at:</span>
                        <ul>
                            <li><a href="#"> <i class="fa fa-facebook"></i></a> </li>
                            <li><a href="#"> <i class="fa fa-google-plus"></i></a> </li>
                            <li><a href="#"> <i class="fa fa-twitter"></i></a> </li>
                            <li><a href="#"> <i class="fa fa-envelope"></i></a> </li>
                        </ul>
                    </div>
                    <div class="job_location_wrap">
                        <div class="job_lok_inner">
                            <div id="map" style="height: 200px;"></div>
                            <script>
                              function initMap() {
                                var uluru = {lat: -25.363, lng: 131.044};
                                var grayStyles = [
                                  {
                                    featureType: "all",
                                    stylers: [
                                      { saturation: -90 },
                                      { lightness: 50 }
                                    ]
                                  },
                                  {elementType: 'labels.text.fill', stylers: [{color: '#ccdee9'}]}
                                ];
                                var map = new google.maps.Map(document.getElementById('map'), {
                                  center: {lat: -31.197, lng: 150.744},
                                  zoom: 9,
                                  styles: grayStyles,
                                  scrollwheel:  false
                                });
                              }
                              
                            </script>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>
                            
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- job_listing_area_end  -->

@endsection