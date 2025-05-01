<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Technology extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'tech',
    ];

    protected $casts = [
        'tech' => 'array',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getDescriptionAttribute($value)
    {
        return $value ?: 'No description available.';
    }
    public function getTechAttribute($value)
    {
        return $value ?: [];
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
}
