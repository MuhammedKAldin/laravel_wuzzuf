<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use App\Models\Category;
use App\Enums\JobEnums;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $query = JobOffer::query();

        // Search by keyword (searches across multiple fields)
        if (request('search')) {
            $searchTerm = request('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $searchTerm . '%')
                  ->orWhere('responsibility', 'like', '%' . $searchTerm . '%')
                  ->orWhere('qualifications', 'like', '%' . $searchTerm . '%')
                  ->orWhere('location', 'like', '%' . $searchTerm . '%')
                  ->orWhereHas('employer', function($q) use ($searchTerm) {
                      $q->where('name', 'like', '%' . $searchTerm . '%');
                  })
                  ->orWhereHas('category', function($q) use ($searchTerm) {
                      $q->where('name', 'like', '%' . $searchTerm . '%');
                  });
            });
        }

        // Filter by location (exact match)
        if (request('location')) {
            $query->where('location', request('location'));
        }

        // Filter by company name (employer name)
        if (request('company')) {
            $query->whereHas('employer', function($q) {
                $q->where('name', request('company'));
            });
        }

        // Filter by category (exact match)
        if (request('category')) {
            $query->where('category_id', request('category'));
        }

        // Filter by experience level (exact match)
        if (request('level')) {
            $query->where('level', request('level'));
        }

        // Filter by job type (exact match)
        if (request('job_type')) {
            $query->where('job_type', request('job_type'));
        }

        // Filter by qualification (exact match)
        if (request('qualification')) {
            $query->where('qualification', request('qualification'));
        }

        // Filter by gender (exact match)
        if (request('gender')) {
            $query->where('gender', request('gender'));
        }

        // Filter by time posted
        if (request('time_filter')) {
            $timeFilter = request('time_filter');
            $now = now();
            
            switch ($timeFilter) {
                case 'today':
                    $query->whereDate('created_at', $now->toDateString());
                    break;
                case 'last_3_days':
                    $query->where('created_at', '>=', $now->subDays(3));
                    break;
                case 'last_week':
                    $query->where('created_at', '>=', $now->subWeek());
                    break;
                case 'last_month':
                    $query->where('created_at', '>=', $now->subMonth());
                    break;
            }
        }

        // Eager load relationships and paginate results
        $jobs = $query->with(['employer', 'category'])
                     ->orderBy('created_at', 'desc')
                     ->paginate(10);

        $categories = Category::all();
        $userType = auth()->check() ? auth()->user()->role : null;

        // Get enum values
        $experienceLevels = JobEnums::getExperienceLevels();
        $jobTypes = JobEnums::getJobTypes();
        $qualifications = JobEnums::getQualifications();
        $genders = JobEnums::getGenders();

        return view('portal.jobs', compact(
            'jobs', 
            'categories', 
            'userType',
            'experienceLevels',
            'jobTypes',
            'qualifications',
            'genders'
        ));
    }

    public function getLocations()
    {
        $searchTerm = request('term', '');
        
        $locations = JobOffer::select('location')
            ->whereNotNull('location')
            ->where('location', '!=', '')
            ->when($searchTerm, function($query) use ($searchTerm) {
                return $query->where('location', 'like', '%' . $searchTerm . '%');
            })
            ->distinct()
            ->orderBy('location')
            ->pluck('location');

        return response()->json($locations);
    }

    public function getCompanies()
    {
        $searchTerm = request('term', '');
        
        $companies = \App\Models\User::select('name')
            ->where('role', 'employer')
            ->when($searchTerm, function($query) use ($searchTerm) {
                return $query->where('name', 'like', '%' . $searchTerm . '%');
            })
            ->distinct()
            ->orderBy('name')
            ->pluck('name');

        return response()->json($companies);
    }
} 