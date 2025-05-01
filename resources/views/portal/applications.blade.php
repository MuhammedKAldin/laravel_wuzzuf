@extends('portal.layout')

@section('content')

    <div class="bradcam_area bradcam_bg_1">
        <div class="container pt-5">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>My Applications</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="job_listing_area">
        <div class="container">
            <div class="job_lists">
                <div class="row">
                    @foreach ($jobs as $job)
                    <div class="col-lg-12 col-md-12">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb" style="width: 100px; height: 100px; overflow: hidden; display: flex; align-items: center; justify-content: center; background-color: #f5f5f5;">
                                    <img src="{{ $job->jobOffer->employer->userAvatar }}" alt="{{ $job->jobOffer->employer->name }}" style="width: 100%; height: 100%; object-fit: contain;">
                                </div>
                                <div class="jobs_conetent">
                                    <a href="/jobs/{{ $job->jobOffer->id }}"><h4>{{ $job->jobOffer->name }}</h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i> {{ $job->jobOffer->location }}</p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i> {{ $job->jobOffer->availability }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    @if ($job->stage != "screening" && $job->stage != "declined")
                                    <a href="{{ route('chat', ['id' => $job->id, 'stage' => $job->stage, 'user_id' => $job->id]) }}" class="boxed-btn3">Direct Message</a>
                                    @endif
                                    <a class="boxed-btn4">Status: {{ ucfirst($job->stage) }}</a>
                                </div>
                                <div class="date">
                                    <p>Applied: {{ \Carbon\Carbon::parse($job->created_at)->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection