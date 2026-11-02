<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;

class BetaSignup extends Model
{
    use Prunable;

    protected $fillable = [
        'first_name',
        'email',
        'os',
        'unsubscribe_token',
        'consented_at',
        'unsubscribed_at',
    ];

    protected $casts = [
        'consented_at'    => 'datetime',
        'unsubscribed_at' => 'datetime',
    ];

    public function prunable(): Builder
    {
        return static::where('created_at', '<=', now()->subYears(3));
    }
}