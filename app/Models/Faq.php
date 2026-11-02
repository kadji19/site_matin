<?php

namespace App\Models;

use App\Models\Traits\TracksAuthor;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use TracksAuthor;

    protected $fillable = ['question', 'answer', 'sort_order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

}
