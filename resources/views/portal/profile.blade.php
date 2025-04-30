@extends('portal.layout')

@section('content')
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Profile</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->
  <!-- ================ contact section start ================= -->
  <section class="contact-section section_padding">
    
    @include('portal.profile-nav')

    <div class="container">
      <div class="row">
        <div class="col-12">
            <h2 class="contact-title">Basic Information :</h2>
            </div>
            <div class="col-lg-8">
            <form class="form-contact contact_form" action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="form-group text-center">
                            <div class="avatar-wrapper mb-3">
                                <img src="{{ $user->userAvatar }}" alt="Profile Picture" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" id="inputGroupFileAddon02"><i class="fa fa-cloud-upload" aria-hidden="true"></i></button>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="avatar" name="avatar" accept="image/*">
                                    <label class="custom-file-label" for="avatar">Change Profile Picture</label>
                                </div>
                            </div>
                            <small class="form-text text-muted">Upload a new profile picture (JPG, PNG, max 2MB)</small>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <input class="form-control" name="name" id="name" type="text" placeholder = 'Profile Name' value='{{$user->name}}' >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <input class="form-control" name="email" id="email" type="email" placeholder = 'Official email address' value='{{$user->email}}'>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                        <input class="form-control" name="headline" id="headline" type="text" placeholder = 'Headline / Industry' value='{{$user->headline}}'>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control w-100" name="summary" id="summary" cols="30" rows="9" placeholder = 'Profile Summary'>{{$user->summary}}</textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">Current CV</label>
                            @if($user->cv_path)
                                <div class="mb-2">
                                    <a href="{{ asset('storage/' . $user->cv_path) }}" target="_blank" class="btn btn-sm btn-info">
                                        <i class="fa fa-file-pdf-o"></i> View Current CV
                                    </a>
                                </div>
                            @else
                                <p class="text-muted">No CV uploaded yet</p>
                            @endif
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" id="inputGroupFileAddon03"><i class="fa fa-cloud-upload" aria-hidden="true"></i></button>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="cv" name="cv" accept=".pdf,.doc,.docx">
                                    <label class="custom-file-label" for="cv">Upload New CV</label>
                                </div>
                            </div>
                            <small class="form-text text-muted">Upload your CV (PDF, DOC, DOCX, max 2MB)</small>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                <button type="submit" class="button button-contactForm btn_4 boxed-btn">Save Changes</button>
                </div>
            </form>
           </div>
          </div>
        </div>
    </div>
    </section>
@endsection