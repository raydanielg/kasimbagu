<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
        'name','slug','country','region','description','image_url',
        'visa_required','visa_type','flight_duration','best_season',
        'highlights','is_popular','is_active','sort_order',
    ];

    protected $casts = [
        'highlights'   => 'array',
        'visa_required'=> 'boolean',
        'is_popular'   => 'boolean',
        'is_active'    => 'boolean',
    ];

    public function scopeActive($q)   { return $q->where('is_active', true)->orderBy('sort_order'); }
    public function scopePopular($q)  { return $q->where('is_popular', true); }
    public function scopeByRegion($q, $r) { return $q->where('region', $r); }
}
