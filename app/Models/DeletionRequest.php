<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;

class DeletionRequest extends Model
{
    use Prunable;

    protected $fillable = ['email', 'handled_at'];

    protected $casts = ['handled_at' => 'datetime'];

    // Une demande traitée est effacée 1 an plus tard [durée à valider]
    public function prunable(): Builder
    {
        return static::whereNotNull('handled_at')->where('handled_at', '<=', now()->subYear());
    }
}
