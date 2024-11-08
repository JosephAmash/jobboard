<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'location',
        'type',
        'salary_min',
        'salary_max',
        'description',
        'requirements',
        'benefits',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function savedBy()
    {
        return $this->belongsToMany(SavedJob::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getFormattedSalaryAttribute()
    {
        return "€{$this->salary_min} - €{$this->salary_max}";
    }
}
