<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experiense extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'start_date',
        'end_date',
        'description',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getDescriptionAttribute($value)
    {
        return $value ?: 'No description available.';
    }
    public function getTitleAttribute($value)
    {
        return $value ?: 'No title available.';
    }
    public function getSlugAttribute($value)
    {
        return $value ?: 'no-slug-available';
    }
    public function getIdAttribute($value)
    {
        return $value ?: 0;
    }
    public function getStartDateAttribute($value)
    {
        return $value ?: now()->format('Y-m-d');
    }
    public function getEndDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }
    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = \Carbon\Carbon::parse($value)->format('Y-m-d');
    }
}
