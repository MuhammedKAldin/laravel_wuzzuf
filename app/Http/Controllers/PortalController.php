<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JobOffer;
use App\Models\JobOfferUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortalController extends Controller
{
    public function index()
    {
        if(Auth::user() != null) {
            $userType = Auth::user()->role;
            return view('portal.index', compact('userType'));
        }
        else{
            $userType = "guest";
            return view('portal.index', compact('userType'));
        }
    }

    public function showProfile($id)
    {
        // Id isn't passed as Paramter
        if(Auth::user() != null) 
        {
            $userType = Auth::user()->role;
        }
        else
        {
            $userType = "guest";
        }

        if($id) 
        {
            // Id has some value
            $user = User::find($id);
            
            if($user) 
            { 
                // Check if user found
                return view('portal.profile', compact('userType', 'user'));
            }
            else {
                // User isn't Found
                return view('/', compact('userType'));
            }
        }
        else 
        {
            // Id isn't Passed
            return view('/', compact('userType'));
        }

        return view('portal.profile', compact('userType','user'));
    }

    public function updateProfile(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('warning', 'Please login to update your profile');
        }

        $user = Auth::user();

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'headline' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        // Handle CV upload if provided
        if ($request->hasFile('cv')) {
            $cvFile = $request->file('cv');
            $cvPath = $cvFile->store('cvs', 'public');
            $user->cv_path = $cvPath;
        }

        // Update user information
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->headline = $request->input('headline');
        $user->summary = $request->input('summary');
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function showJobs()
    {
        $jobs = JobOffer::paginate(3); 

        if(Auth::user() != null) 
        {
            $userType = Auth::user()->role;
        } 
        else 
        {
            $userType = "guest";
        } 

        return view('portal.jobs', compact('userType', 'jobs'));
    }

    public function showJobDetails($id)
    {
        $job = JobOffer::find($id);

        if (!$job) {
            return redirect()->route('showJobs')->with('error', 'Job not found');
        }

        $userType = Auth::check() ? Auth::user()->role : "guest";

        return view('portal.job_details', compact('userType', 'job'));
    }

    public function applyToJob(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('warning', 'Please login to apply for jobs');
        }

        $jobId = $request->input('jid');
        $userId = Auth::user()->id;

        if (!$jobId) {
            return redirect()->back()->with('error', 'Job ID is required');
        }

        // Find the job offer by ID
        $jobOffer = JobOffer::find($jobId);

        if (!$jobOffer) {
            return redirect()->back()->with('error', 'Job offer not found');
        }

        // Check if user has already applied
        $hasApplied = JobOfferUser::where('job_offer_id', $jobId)
            ->where('user_id', $userId)
            ->exists();

        if ($hasApplied) {
            return redirect()->back()->with('warning', 'You have already applied for this job');
        }

        // Handle CV upload if provided
        $cvPath = Auth::user()->cv_path; // Default to user's current CV
        if ($request->hasFile('cv')) {
            $request->validate([
                'cv' => 'required|mimes:pdf,doc,docx|max:2048'
            ]);

            $cvFile = $request->file('cv');
            $cvPath = $cvFile->store('cvs', 'public');
            
            // Update user's default CV if they want to
            if ($request->input('update_default_cv')) {
                Auth::user()->update(['cv_path' => $cvPath]);
            }
        }

        // Create the application
        JobOfferUser::create([
            'job_offer_id' => $jobId,
            'user_id' => $userId,
            'stage' => 'screening',
            'cv_path' => $cvPath,
            'cover_letter' => $request->input('cover_letter')
        ]);

        return redirect()->route('showApplications')->with('success', 'Successfully applied for the job');
    }

    public function showApplications()
    {
        $id = Auth::user()->id;

        if($id) 
        {
            // echo 'Display Jobs';

            // Id has some value
            $userType = "employee";
            $jobs = JobOfferUser::where('user_id', $id)->get();
            // $jobs = JobOffer::where('id', $id)->get();
            
            // Check if id found
            return view('portal.applications', compact('userType', 'jobs'));
        }
        else 
        {
            echo 'no User id is passed';
        }
    }

}
