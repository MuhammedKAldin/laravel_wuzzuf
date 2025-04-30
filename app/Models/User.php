<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\JobOffer;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phonenumber',
        'role',
        'password',
        'summary',
        'headline',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Database Relationships
    
    /**
     * Get the job offers created by this user (as employer)
     */
    public function jobOffers()
    {
        return $this->hasMany(JobOffer::class, 'employer_id');
    }
    
    /**
     * Get the job offers this user has applied to (as employee)
     */
    public function appliedJobs()
    {
        return $this->belongsToMany(JobOffer::class, 'job_offer_user', 'user_id', 'job_offer_id')
            ->withPivot('stage')
            ->withTimestamps();
    }
    
    /**
     * Check if the user is an employer
     *
     * @return bool
     */
    public function isEmployer()
    {
        return $this->role === 'employer';
    }
    
    /**
     * Check if the user is an employee
     *
     * @return bool
     */
    public function isEmployee()
    {
        return $this->role === 'employee';
    }
}
