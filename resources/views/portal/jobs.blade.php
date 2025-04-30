@extends('portal.layout')

@section('content')

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_4">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        {{-- <h3>4536+ Jobs Available</h3> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- job_listing_area_start  -->
    <div class="job_listing_area plus_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="job_filter white-bg">
                        <div class="form_inner white-bg">
                            <h3>Filter</h3>
                            <form action="{{ route('jobs.index') }}" method="GET">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <input type="text" name="search" placeholder="Search keyword" value="{{ request('search') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <input type="text" id="location" name="location" placeholder="Location" value="{{ request('location') }}" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <input type="text" id="company" name="company" placeholder="Company" value="{{ request('company') }}" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide" name="category">
                                                <option value="">--</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide" name="level">
                                                @foreach($experienceLevels as $value => $label)
                                                    <option value="{{ $value }}" {{ request('level') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide" name="job_type">
                                                @foreach($jobTypes as $value => $label)
                                                    <option value="{{ $value }}" {{ request('job_type') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide" name="qualification">
                                                @foreach($qualifications as $value => $label)
                                                    <option value="{{ $value }}" {{ request('qualification') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide" name="gender">
                                                @foreach($genders as $value => $label)
                                                    <option value="{{ $value }}" {{ request('gender') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="reset_btn">
                                    <button class="boxed-btn3 w-100" type="submit">Search</button>
                                    <a href="{{ route('jobs.index') }}" class="boxed-btn3 w-100 mt-3" style="background: #6c757d; border-color: #6c757d;">Clear Filters</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="recent_joblist_wrap">
                        <div class="recent_joblist white-bg ">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4>Job Listing</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="serch_cat d-flex justify-content-end">
                                        <select name="time_filter" id="time_filter">
                                            <option value="">Most Recent</option>
                                            <option value="7" {{ request('time_filter') == '7' ? 'selected' : '' }}>Last 7 Days</option>
                                            <option value="30" {{ request('time_filter') == '30' ? 'selected' : '' }}>Last 30 Days</option>
                                            <option value="60" {{ request('time_filter') == '60' ? 'selected' : '' }}>Last 60 Days</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('warning'))
                            <div class="alert alert-warning">
                                {{ session('warning') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-error">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>

                    <div class="job_lists m-0">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                @foreach ($jobs as $job)
                                <div class="single_jobs white-bg d-flex justify-content-between">
                                    
                                    <div class="jobs_left d-flex align-items-center">
                                        <div class="thumb" style="width: 100px; height: 100px; overflow: hidden; display: flex; align-items: center; justify-content: center; background-color: #f5f5f5;">
                                            <img src="{{ $job->employer->userAvatar }}" alt="{{ $job->employer->name }}" style="width: 100%; height: 100%; object-fit: contain;">
                                        </div>
                                        <div class="jobs_conetent">
                                            <a href="/jobs/{{ $job->id }}">
                                                <h4> {{$job->name}} </h4>
                                                <h6>{{'@'.$job->employer->name}}</h6>
                                                <p> <i class="fa fa-user"></i> {{$job->level}} </p>
                                            </a>
                                            <div class="links_locat d-flex align-items-center">
                                                <div class="location">
                                                    <p> <i class="fa fa-map-marker"></i> {{$job->location}}</p>
                                                </div>
                                                <div class="location">
                                                    <p> <i class="fa fa-clock-o"></i> {{$job->availability}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="jobs_right">
                                        <div class="apply_now">
                                            {{-- <a class="heart_mark" href="#"> <i class="fa fa-heart"></i> </a> --}}
                                            @if (Auth::user())
                                                @php
                                                    $hasApplied = \App\Models\JobOfferUser::where('job_offer_id', $job->id)
                                                        ->where('user_id', Auth::user()->id)
                                                        ->exists();
                                                @endphp
                                                @if ($hasApplied)
                                                    <a href="/jobs/{{ $job->id }}" class="boxed-btn3" style="background-color: #6c757d; border-color: #6c757d;">Applied</a>
                                                @else
                                                    <a href="/jobs/{{ $job->id }}" class="boxed-btn3">Apply Now</a>
                                                @endif
                                            @else
                                                <a href="/jobs/{{ $job->id }}" class="boxed-btn3">View Details</a>
                                            @endif
                                        </div>
                                        <div class="date">
                                            <p>Post Since : {{ \Carbon\Carbon::parse($job->created_at)->format('d M Y') }}</p>
                                        </div>
                                    </div>

                                </div>
                                <hr/>
                                @endforeach
                            </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pagination_wrap">
                                    <ul>
                                        @if ($jobs->onFirstPage())
                                            <li class="disabled" style="margin: 0 4px;"><a href="#"><i class="ti-angle-left"></i></a></li>
                                        @else
                                            <li style="margin: 0 4px;"><a href="{{ $jobs->previousPageUrl() }}"><i class="ti-angle-left"></i></a></li>
                                        @endif

                                        @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                                            @if ($page == $jobs->currentPage())
                                                <li class="active" style="margin: 0 4px;"><span>{{ $page }}</span></li>
                                            @else
                                                <li style="margin: 0 4px;"><a href="{{ $url }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach

                                        @if ($jobs->hasMorePages())
                                            <li style="margin: 0 4px;"><a href="{{ $jobs->nextPageUrl() }}"><i class="ti-angle-right"></i></a></li>
                                        @else
                                            <li class="disabled" style="margin: 0 4px;"><a href="#"><i class="ti-angle-right"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job_listing_area_end  -->
@endsection

@push('scripts')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script>
    $(document).ready(function() {
        let typingTimer;
        const doneTypingInterval = 300; // milliseconds

        $('#location').autocomplete({
            source: function(request, response) {
                clearTimeout(typingTimer);
                
                typingTimer = setTimeout(function() {
                    $.ajax({
                        url: "{{ route('jobs.locations') }}",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item,
                                    value: item
                                };
                            }));
                        }
                    });
                }, doneTypingInterval);
            },
            minLength: 1,
            delay: 300,
            select: function(event, ui) {
                $('#location').val(ui.item.value);
                return false;
            },
            focus: function(event, ui) {
                $('#location').val(ui.item.label);
                return false;
            }
        }).data("ui-autocomplete")._renderItem = function(ul, item) {
            return $("<li>")
                .append("<div>" + item.label + "</div>")
                .appendTo(ul);
        };

        $('#company').autocomplete({
            source: function(request, response) {
                clearTimeout(typingTimer);
                
                typingTimer = setTimeout(function() {
                    $.ajax({
                        url: "{{ route('jobs.companies') }}",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item,
                                    value: item
                                };
                            }));
                        }
                    });
                }, doneTypingInterval);
            },
            minLength: 1,
            delay: 300,
            select: function(event, ui) {
                $('#company').val(ui.item.value);
                return false;
            },
            focus: function(event, ui) {
                $('#company').val(ui.item.label);
                return false;
            }
        }).data("ui-autocomplete")._renderItem = function(ul, item) {
            return $("<li>")
                .append("<div>" + item.label + "</div>")
                .appendTo(ul);
        };

        $('#time_filter').on('change', function() {
            // Get the current URL and parameters
            let url = new URL(window.location.href);
            let params = new URLSearchParams(url.search);
            
            // Update or remove the time_filter parameter
            if (this.value) {
                params.set('time_filter', this.value);
            } else {
                params.delete('time_filter');
            }
            
            // Update the URL and reload the page
            window.location.href = url.pathname + '?' + params.toString();
        });
    });
</script>
@endpush