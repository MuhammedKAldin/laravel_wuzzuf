<?php

namespace App\Models;

use App\Enums\CategoryType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type'
    ];

    protected $casts = [
        'type' => CategoryType::class
    ];

    public function jobOffers()
    {
        return $this->hasMany(JobOffer::class);
    }
} 