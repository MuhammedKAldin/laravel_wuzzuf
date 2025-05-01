<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JobOffer;
use App\Models\JobOfferUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    public function __construct()
    {
        $this->middleware('employer');
    }
   
    public function addJob()
    {
        $userType = Auth::user()->role;
        $categories = \App\Models\Category::all();
        return view('portal.newjob', compact('userType', 'categories'));
    }

    public function showProfileJobs($id)
    {
        $userType = Auth::user()->role;
        
        if($id) 
        {
            // Id has some value
            $user = User::find($id);
            
            // Check if id found
            if($user) 
            {
                // Use the relationship with candidates count
                $jobs = $user->jobOffers()->withCount('candidates')->get();
                
                return view('portal.profile-jobs', compact('userType', 'user', 'jobs'));
            }
            else 
            {
                // Error 404
                return redirect()->route('index')->with('error', 'Profile not found');
            }
        }
        else 
        {
            return redirect()->route('index')->with('error', 'No user ID provided');
        }
    }

    // Define a constant for hiring stages
    const STAGE_ARR = ["screening", "declined", "shortlisted", "interview", "accepted"];

    public function showCandidates($id, $stage = "screening")
    {
        // Check if the ID is valid
        $job_offer_id = $id;

        if ($job_offer_id) 
        {
            // Set default stage if not provided
            if (empty($stage)) {
                $stage = "screening";
            }

            $userType = "employer";
            $jobs = JobOfferUser::where('job_offer_id', $job_offer_id)
                ->where('stage', $stage)
                ->get();

            $stageArr = self::STAGE_ARR;

            return view('portal.candidates', compact('userType', 'job_offer_id', 'jobs', 'stageArr', 'stage'));
        } 
        else 
        {
            return redirect()->route('index')->with('error', 'No job ID provided');
        }
    }

    public function updateCandidates(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'id' => 'required|integer',
            'stage' => 'required|string',
        ]);
    
        // Get the validated data
        $jobId = $request->input('id');
        $stage = $request->input('stage');

        // Update the Job Offer's Candidate stage
        $job = JobOfferUser::find($jobId); 
        if ($job) 
        {
            $job->stage = $stage; 
            $job->save();
            
            return response()->json(['message' => 'Stage updated successfully.']);
        }
    
        return response()->json(['message' => 'Candidate not found.'], 404);
    }
}
