<?php

namespace App\Models;

use App\Models\Traits\TracksAuthor;
use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    use TracksAuthor;

    protected $fillable = [
        'name', 'description', 'badge', 'is_featured',
        'price_monthly', 'price_yearly', 'period', 'features',
        'cta_label', 'cta_url', 'sort_order', 'is_active',
    ];

    protected $casts = [
        'features'    => 'array',
        'is_featured' => 'boolean',
        'is_active'   => 'boolean',
    ];
}
