@extends('portal.layout')

@section('content')
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container mt-5">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Post a New Job</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <section class="contact-section section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{route('createOffer')}}" method="post" id="jobPostForm" class="job-post-form">
                        @csrf
                        
                        <!-- SmartWizard -->
                        <div id="smartwizard">
                            <ul class="nav">
                                <li>
                                    <a class="nav-link" href="#step-1">
                                        <div class="num">1</div>
                                        Job Title
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#step-2">
                                        <div class="num">2</div>
                                        Description
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#step-3">
                                        <div class="num">3</div>
                                        Responsibilities
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#step-4">
                                        <div class="num">4</div>
                                        Qualifications
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#step-5">
                                        <div class="num">5</div>
                                        Benefits
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#step-6">
                                        <div class="num">6</div>
                                        Details
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <!-- Job Title Card -->
                                <div id="step-1" class="tab-pane" role="tabpanel">
                                    <div class="form-card">
                                        <div class="card-header">
                                            <h3>🎯 What's the job title?</h3>
                                            <p>Be specific and clear about the role</p>
                                            <div class="floating-words">
                                                <span class="floating-word">Software Engineer</span>
                                                <span class="floating-word">UI/UX Designer</span>
                                                <span class="floating-word">HR Manager</span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <input class="form-control" name="name" id="jobTitle" type="text" placeholder="e.g., Senior Software Engineer, UI/UX Designer, HR Manager">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Description Card -->
                                <div id="step-2" class="tab-pane" role="tabpanel">
                                    <div class="form-card">
                                        <div class="card-header">
                                            <h3>📝 Describe the job</h3>
                                            <p>What will the candidate be doing?</p>
                                            <div class="floating-words">
                                                <span class="floating-word">Exciting Projects</span>
                                                <span class="floating-word">Team Collaboration</span>
                                                <span class="floating-word">Growth Opportunities</span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <textarea class="form-control" name="description" id="description" rows="5" placeholder="Describe the main responsibilities and day-to-day activities..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Responsibilities Card -->
                                <div id="step-3" class="tab-pane" role="tabpanel">
                                    <div class="form-card">
                                        <div class="card-header">
                                            <h3>📋 Key Responsibilities</h3>
                                            <p>What are the main duties?</p>
                                            <div class="floating-words">
                                                <span class="floating-word">Lead Projects</span>
                                                <span class="floating-word">Team Management</span>
                                                <span class="floating-word">Innovation</span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <textarea class="form-control" name="responsibility" id="responsibility" rows="5" placeholder="List the key responsibilities and tasks..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Qualifications Card -->
                                <div id="step-4" class="tab-pane" role="tabpanel">
                                    <div class="form-card">
                                        <div class="card-header">
                                            <h3>🎓 Required Qualifications</h3>
                                            <p>What skills and experience are needed?</p>
                                            <div class="floating-words">
                                                <span class="floating-word">5+ Years Experience</span>
                                                <span class="floating-word">Technical Skills</span>
                                                <span class="floating-word">Leadership</span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <textarea class="form-control" name="qualifications" id="qualifications" rows="5" placeholder="List the required skills, experience, and qualifications..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Benefits Card -->
                                <div id="step-5" class="tab-pane" role="tabpanel">
                                    <div class="form-card">
                                        <div class="card-header">
                                            <h3>🎁 Job Benefits</h3>
                                            <p>What makes this job attractive?</p>
                                            <div class="floating-words">
                                                <span class="floating-word">Flexible Hours</span>
                                                <span class="floating-word">Health Insurance</span>
                                                <span class="floating-word">Remote Work</span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <textarea class="form-control" name="benifits" id="benefits" rows="5" placeholder="List the benefits and perks of the job..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Job Details Card -->
                                <div id="step-6" class="tab-pane" role="tabpanel">
                                    <div class="form-card">
                                        <div class="card-header">
                                            <h3>📊 Job Details</h3>
                                            <p>Additional information about the position</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="location">Location</label>
                                                    <div class="form-group">
                                                        <input class="form-control" name="location" id="location" type="text" placeholder="e.g., Cairo, Egypt">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="level">Experience Level</label>
                                                    <div class="form-group">
                                                        <select class="form-control" name="level" id="level">
                                                            <option value="">Select Level</option>
                                                            <option value="Intern">Intern</option>
                                                            <option value="Junior">Junior</option>
                                                            <option value="Mid">Mid</option>
                                                            <option value="Senior">Senior</option>
                                                            <option value="Principal">Principal</option>
                                                            <option value="Manager">Manager</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <label for="qualification">Required Qualification</label>
                                                    <div class="form-group">
                                                        <select class="form-control" name="qualification" id="qualification">
                                                            <option value="">Select Qualification</option>
                                                            <option value="High School">High School</option>
                                                            <option value="Bachelor">Bachelor</option>
                                                            <option value="Master">Master</option>
                                                            <option value="PhD">PhD</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="gender">Gender</label>
                                                    <div class="form-group">
                                                        <select class="form-control" name="gender" id="gender">
                                                            <option value="">Select Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Any">Any</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <label for="category_id">Job Category</label>
                                                    <div class="form-group">
                                                        <select class="form-control" name="category_id" id="category_id">
                                                            <option value="">Select Category</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="availability">Availability</label>
                                                    <div class="form-group">
                                                        <select class="form-control" name="availability" id="availability">
                                                            <option value="">Select Availability</option>
                                                            <option value="Full-time">Full-time</option>
                                                            <option value="Part-time">Part-time</option>
                                                            <option value="Contract">Contract</option>
                                                            <option value="Freelance">Freelance</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .job-post-form {
            position: relative;
        }

        #smartwizard {
            margin-bottom: 2rem;
        }

        .nav {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
            padding: 0;
            list-style: none;
        }

        .nav-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1rem;
            color: #6c757d;
            text-decoration: none;
            position: relative;
            min-width: 120px;
        }

        .nav-link .num {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e9ecef;
            color: #6c757d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }

        .nav-link.active .num {
            background: #007bff;
            color: white;
            box-shadow: 0 0 20px rgba(0, 123, 255, 0.5);
        }

        .nav-link.done .num {
            background: #28a745;
            color: white;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            top: 50%;
            right: -50%;
            width: 100%;
            height: 2px;
            background: #e9ecef;
            z-index: -1;
        }

        .nav-link:last-child::after {
            display: none;
        }

        .nav-link.done::after {
            background: #28a745;
        }

        .sw-toolbar-bottom {
            margin-top: 2rem;
        }

        .sw-btn-group {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .sw-btn {
            min-width: 150px;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            color: white;
        }

        .sw-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .sw-btn-next {
            background: linear-gradient(45deg, #007bff, #0056b3);
        }

        .sw-btn-prev {
            background: linear-gradient(45deg, #6c757d, #495057);
        }

        .sw-btn-submit {
            background: linear-gradient(45deg, #007bff, #0056b3);
        }

        .sw-btn-submit:hover {
            background: linear-gradient(45deg, #0056b3, #004494);
        }

        .form-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
            padding: 2.5rem;
            margin-bottom: 2rem;
        }

        .card-header {
            margin-bottom: 2rem;
            text-align: center;
        }

        .card-header h3 {
            color: #2c3e50;
            margin-bottom: 0.5rem;
            font-size: 1.8rem;
            font-weight: 600;
        }

        .card-header p {
            color: #6c757d;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #2c3e50;
            font-weight: 500;
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        .form-control {
            padding: 1rem 1.5rem;
            padding-right: 45px;
            border-radius: 12px;
            border: 2px solid #e9ecef;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 1.1rem;
            background: rgba(255,255,255,0.9);
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.25);
            background: white;
        }

        .form-control:focus + .input-icon {
            color: #007bff;
        }

        .floating-words {
            position: relative;
            height: 100px;
            margin-bottom: 1.5rem;
        }

        .floating-word {
            position: absolute;
            background: rgba(0,123,255,0.1);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            color: #007bff;
            font-size: 0.9rem;
            animation: float 3s ease-in-out infinite;
            opacity: 0;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(0,123,255,0.2);
        }

        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 0;
            }
            50% {
                transform: translateY(-20px) rotate(5deg);
                opacity: 1;
            }
            100% {
                transform: translateY(0) rotate(0deg);
                opacity: 0;
            }
        }
    </style>
    @endpush

    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Create submit button
            const submitButton = $('<button>', {
                text: 'Submit',
                class: 'btn sw-btn sw-btn-submit',
                type: 'button'
            }).on('click', function() {
                // Validate all required fields
                const requiredFields = [
                    'name', 
                    'description', 
                    'responsibility', 
                    'qualifications', 
                    'benifits',
                    'location',
                    'level',
                    'qualification',
                    'gender',
                    'category_id',
                    'availability'
                ];
                let isValid = true;
                let emptyFields = [];

                requiredFields.forEach(field => {
                    let value;
                    if (field === 'description' || field === 'responsibility' || field === 'qualifications' || field === 'benifits') {
                        // For textareas, use .val() and trim
                        value = $(`textarea[name="${field}"]`).val().trim();
                    } else if (field === 'level' || field === 'qualification' || field === 'gender' || field === 'category_id' || field === 'availability') {
                        // For select fields
                        value = $(`select[name="${field}"]`).val();
                    } else {
                        // For input fields
                        value = $(`input[name="${field}"]`).val().trim();
                    }
                    
                    if (!value) {
                        isValid = false;
                        emptyFields.push(field);
                    }
                });

                if (!isValid) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        html: `Please fill in all required fields:<br>${emptyFields.map(field => `- ${field.charAt(0).toUpperCase() + field.slice(1)}`).join('<br>')}`,
                        confirmButtonColor: '#007bff',
                    });
                    return;
                }

                // Show confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to post this job offer",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#007bff',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, post it!',
                    cancelButtonText: 'No, cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#jobPostForm').submit();
                    }
                });
            }).hide();

            // Initialize SmartWizard
            $('#smartwizard').smartWizard({
                theme: 'dots',
                transitionEffect: 'fade',
                showStepURLhash: false,
                toolbarSettings: {
                    toolbarPosition: 'bottom',
                    toolbarButtonPosition: 'center',
                    showNextButton: true,
                    showPreviousButton: true,
                    toolbarExtraButtons: []
                }
            });

            // Insert submit button after next button
            $('.sw-btn-next').after(submitButton);

            const wizard = $('#smartwizard');
            const totalSteps = 6;

            // Handle step change
            wizard.on('showStep', function(e, anchorObject, stepIndex, stepDirection) {
                const isLastStep = stepIndex === totalSteps - 1;
                const submitBtn = $('.sw-btn-submit');
                const nextBtn = $('.sw-btn-next');

                if (isLastStep) {
                    nextBtn.hide();
                    submitBtn.show();
                } else {
                    nextBtn.show();
                    submitBtn.hide();
                }
            });

            // Add floating words animation
            const floatingWords = document.querySelectorAll('.floating-word');
            floatingWords.forEach((word, index) => {
                gsap.to(word, {
                    opacity: 1,
                    y: -20,
                    duration: 2,
                    delay: index * 0.5,
                    repeat: -1,
                    yoyo: true,
                    ease: 'sine.inOut'
                });
            });

            // Handle form submission response
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#007bff',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('addJob') }}";
                    }
                });
            @endif

            @if($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: `{!! implode('<br>', $errors->all()) !!}`,
                    confirmButtonColor: '#007bff',
                });
            @endif
        });
    </script>
    @endpush
@endsection