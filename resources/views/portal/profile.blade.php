@extends('portal.layout')

@section('content')
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container pt-5">
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

    <section class="contact-section section_padding">
        <div class="container">
            <div class="row">
                <!-- Left Column - Profile Overview -->
                <div class="col-lg-4">
                    <div class="profile-card white-bg mb-4">
                        <div class="text-center p-4">
                            <div class="avatar-wrapper mb-3">
                                <img src="{{ $user->userAvatar }}" alt="Profile Picture" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                            </div>
                            <h3 class="mb-1">{{ $user->name }}</h3>
                            <p class="text-muted mb-2">{{ $user->headline }}</p>
                            @if($user->isEmployer())
                            <div class="mb-3">
                                <a href="{{ route('jobs.index', ['company' => $user->name]) }}" class="button button-contactForm btn_4 boxed-btn">
                                    <i class="fa fa-briefcase"></i> View Careers at {{ $user->name }}
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>

                    @if($user->isEmployer())
                    <div class="profile-card white-bg mb-4">
                        <div class="p-4">
                            <h4 class="mb-3">About {{ $user->name }}</h4>
                            <p class="text-muted">{{ $user->summary }}</p>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Right Column - Main Content -->
                <div class="col-lg-8">
                    @if($isOwner)
                    <form class="form-contact contact_form" action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    @endif

                    <!-- Profile Information Card -->
                    <div class="profile-card white-bg mb-4">
                        <div class="p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="mb-0">Basic Information</h4>
                                @if($isOwner)
                                <button type="button" class="btn btn-link" onclick="toggleEditMode()">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Name</label>
                                    <input class="form-control" name="name" id="name" type="text" value='{{$user->name}}' {{ !$isOwner ? 'readonly' : '' }}>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Email</label>
                                    <input class="form-control" name="email" id="email" type="email" value='{{$user->email}}' {{ !$isOwner ? 'readonly' : '' }}>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-muted">Headline / Industry</label>
                                <input class="form-control" name="headline" id="headline" type="text" value='{{$user->headline}}' {{ !$isOwner ? 'readonly' : '' }}>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-muted">Profile Summary</label>
                                <textarea class="form-control w-100" name="summary" id="summary" cols="30" rows="5" {{ !$isOwner ? 'readonly' : '' }}>{{$user->summary}}</textarea>
                            </div>

                            @if($isOwner)
                            <div class="mb-3">
                                <label class="form-label text-muted">Profile Picture</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" id="inputGroupFileAddon02" onclick="document.getElementById('avatar').click()" class="btn btn-outline-secondary">
                                            <i class="fa fa-cloud-upload"></i> Upload
                                        </button>
                                    </div>
                                    <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*" style="display: none;">
                                    <label class="form-control" for="avatar" id="avatarLabel">Choose file</label>
                                </div>
                                <small class="form-text text-muted">Upload a new profile picture (JPG, PNG, max 2MB)</small>
                            </div>
                            @endif

                            @if(!$user->isEmployer())
                            <div class="mb-3">
                                <label class="form-label text-muted">Current CV</label>
                                @if($user->cv_path && ($isOwner || Auth::check() && Auth::user()->isEmployer()))
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/' . $user->cv_path) }}" target="_blank" class="btn btn-sm btn-info">
                                            <i class="fa fa-file-pdf-o"></i> View Current CV
                                        </a>
                                    </div>
                                @elseif($user->cv_path)
                                    <p class="text-muted">CV is only visible to employers and the account owner</p>
                                @else
                                    <p class="text-muted">No CV uploaded yet</p>
                                @endif
                                @if($isOwner)
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" id="inputGroupFileAddon03" class="btn btn-outline-secondary">
                                            <i class="fa fa-cloud-upload"></i> Upload
                                        </button>
                                    </div>
                                    <input type="file" class="form-control" id="cv" name="cv" accept=".pdf,.doc,.docx">
                                    <label class="form-control" for="cv">Choose file</label>
                                </div>
                                <small class="form-text text-muted">Upload your CV (PDF, DOC, DOCX, max 2MB)</small>
                                @endif
                            </div>
                            @endif

                            @if($isOwner)
                            <div class="text-end">
                                <button type="submit" class="button button-contactForm btn_4 boxed-btn">Save Changes</button>
                            </div>
                            @endif
                        </div>
                    </div>
                    @if($isOwner)
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @if($isOwner)
    @push('scripts')
    <script>
        document.getElementById('avatar').addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            document.getElementById('avatarLabel').textContent = fileName;
            
            if (e.target.files && e.target.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('.avatar-wrapper img').src = e.target.result;
                }
                reader.readAsDataURL(e.target.files[0]);
            }
        });

        document.getElementById('cv').addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            this.nextElementSibling.textContent = fileName;
        });
    </script>
    @endpush
    @endif

    @push('styles')
    <style>
        .profile-card {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .profile-card:hover {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .form-control:read-only {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
        }
        .form-control:read-only:focus {
            box-shadow: none;
            border-color: #e9ecef;
        }
        .btn-outline-secondary {
            border-color: #e9ecef;
        }
        .btn-outline-secondary:hover {
            background-color: #f8f9fa;
            border-color: #dee2e6;
        }
    </style>
    @endpush
@endsection