<?php

namespace App\Models;

use App\Models\Traits\TracksAuthor;
use Illuminate\Database\Eloquent\Model;

class TrustItem extends Model
{
    use TracksAuthor;

    protected $fillable = ['icon', 'text', 'sort_order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

}
