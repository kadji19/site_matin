<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;

class ContactMessage extends Model
{
    use Prunable;

    public const SUBJECTS = [
        'support'     => 'Support',
        'partenariat' => 'Partenariat',
        'presse'      => 'Presse',
        'autre'       => 'Autre',
    ];

    protected $fillable = ['name', 'email', 'subject', 'message', 'handled_at'];

    protected $casts = ['handled_at' => 'datetime'];

    // Supprimés automatiquement après 1 an (comme dans la politique de confidentialité)
    public function prunable(): Builder
    {
        return static::where('created_at', '<=', now()->subYear());
    }
}