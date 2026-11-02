<?php

namespace App\Models;

use App\Models\Traits\TracksAuthor;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use TracksAuthor;

    protected $fillable = ['title', 'description', 'step', 'sort_order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

}
