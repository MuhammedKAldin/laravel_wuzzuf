<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Events\PusherBroadcast;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class PusherController extends Controller
{
    public function chat($job_offer_id, $stage = "screening", $user_id)
    {
        if (Auth::check()) {
            $current_user_id = Auth::user()->id;
            $userType = Auth::user()->role;
            
            // Check if current user is either sender or receiver of any messages with the target user
            $hasMessageAccess = Message::where(function($query) use ($current_user_id, $user_id) {
                $query->where('sender', $current_user_id)
                      ->where('receiver', $user_id);
            })->orWhere(function($query) use ($current_user_id, $user_id) {
                $query->where('sender', $user_id)
                      ->where('receiver', $current_user_id);
            })->exists();

            // Check if there's an application with appropriate status
            $hasApplicationAccess = false;
            if ($userType == "employee") {
                // Check if employee has an application with status shortlisted, interview, or accepted
                // AND verify this is for the specific job offer
                $hasApplicationAccess = \App\Models\JobOfferUser::where('job_offer_id', $job_offer_id)
                    ->where('user_id', $current_user_id)
                    ->whereIn('stage', ['shortlisted', 'interview', 'accepted'])
                    ->exists();
            } else if ($userType == "employer") {
                // Check if employer owns this job offer
                $jobOffer = \App\Models\JobOffer::find($job_offer_id);
                if (!$jobOffer || $jobOffer->employer_id != $current_user_id) {
                    return redirect()->route('showCandidates', ['id' => 1, 'stage' => 'screening']);
                }
                
                // Check if the user has applied for this job offer
                $hasApplied = \App\Models\JobOfferUser::where('job_offer_id', $job_offer_id)
                    ->where('user_id', $user_id)
                    ->exists();
                
                if (!$hasApplied) {
                    return redirect()->route('showCandidates', ['id' => 1, 'stage' => 'screening']);
                }
                
                // Check if employer has an employee with status shortlisted, interview, or accepted
                $hasApplicationAccess = \App\Models\JobOfferUser::where('job_offer_id', $job_offer_id)
                    ->where('user_id', $user_id)
                    ->whereIn('stage', ['shortlisted', 'interview', 'accepted'])
                    ->exists();
            }

            // If no access through either messages or application status
            if (!$hasMessageAccess && !$hasApplicationAccess) {
                // Redirect based on user role
                if ($userType == "employee") {
                    return redirect()->route('showApplications');
                } else if ($userType == "employer") {
                    return redirect()->route('showCandidates', ['id' => 1, 'stage' => 'screening']);
                }
            }

            if($current_user_id == $user_id) {
                // Redirect based on user role
                if ($userType == "employee") {
                    return redirect()->route('showApplications');
                } else if ($userType == "employer") {
                    return redirect()->route('showCandidates', ['id' => 1, 'stage' => 'screening']);
                }
            } else {
                // Fetch messages exchanged between the logged-in user and another user
                $messages = Message::where(function($query) use ($current_user_id, $user_id) {
                    $query->where('sender', $current_user_id)->where('receiver', $user_id);
                })->orWhere(function($query) use ($current_user_id, $user_id) {
                    $query->where('sender', $user_id)->where('receiver', $current_user_id);
                })->orderBy('created_at', 'asc')
                ->get();

                $receiver = User::where('id', $user_id)->first();
                return view('portal.chat', compact('userType', 'job_offer_id', 'stage', 'receiver', 'messages', 'current_user_id'));
            }
        } else {
            return redirect()->route('index');
        }
    }

    public function broadcast($user_id, Request $request)
    {
        /// Send Message
        //------------------------
        $data['sender'] = Auth::user()->id;
        $data['receiver'] = $user_id;
        $data['message'] = $request->message;

        Message::create($data);

        // Broadcast
        $message = $request->message;
        $receiver = $this->getUser($user_id);
        $sender_id = Auth::user()->id;
        $sender_avatar = Auth::user()->userAvatar;
        broadcast(new PusherBroadcast($receiver, $message, $sender_id, $sender_avatar));

        // return response()->json(['success' => true]);
    }

    // Service/Helper Method
    public function getUser($user_id) 
    {
        return User::where('id', $user_id)->first();
    }
}