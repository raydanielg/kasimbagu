<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name','slug','category','icon','icon_color','short_description',
        'full_description','image_url','features','cta_text',
        'is_featured','is_active','sort_order',
    ];

    protected $casts = [
        'features'    => 'array',
        'is_featured' => 'boolean',
        'is_active'   => 'boolean',
    ];

    public function scopeActive($q)    { return $q->where('is_active', true)->orderBy('sort_order'); }
    public function scopeFeatured($q)  { return $q->where('is_featured', true); }
    public function scopeByCategory($q, $cat) { return $q->where('category', $cat); }
}
