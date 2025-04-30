<?php

namespace App\Models;

use App\Models\User;
use App\Enums\CategoryType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'name',
        'description',
        'responsibility',
        'qualifications',
        'benifits',
        'location',
        'availability',
        'level',
        'job_type',
        'qualification',
        'gender',
        'category_id'
    ];

    protected $casts = [
        'level' => 'string',
        'job_type' => 'string',
        'qualification' => 'string',
        'gender' => 'string'
    ];

    // Database Relationship
    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
