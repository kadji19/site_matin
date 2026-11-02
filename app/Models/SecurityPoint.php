<?php

namespace App\Models;

use App\Models\Traits\TracksAuthor;
use Illuminate\Database\Eloquent\Model;

class SecurityPoint extends Model
{
    use TracksAuthor;

    protected $fillable = ['title', 'description', 'sort_order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

}
