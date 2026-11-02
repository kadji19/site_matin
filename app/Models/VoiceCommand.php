<?php

namespace App\Models;

use App\Models\Traits\TracksAuthor;
use Illuminate\Database\Eloquent\Model;

class VoiceCommand extends Model
{
    use TracksAuthor;

    protected $fillable = [
        'command', 'reply',
        'action_meta', 'action_body', 'action_yes', 'action_done',
        'sort_order', 'is_active',
    ];

    protected $casts = ['is_active' => 'boolean'];

}
