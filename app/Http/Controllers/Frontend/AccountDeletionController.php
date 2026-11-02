<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\HandlesPublicForms;
use App\Mail\AdminAlert;
use App\Models\DeletionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AccountDeletionController extends Controller
{
    use HandlesPublicForms;

    public function store(Request $request)
    {
        $done = "Demande reçue. Nous t'écrivons pour confirmer qu'elle vient bien de toi.";

        if ($request->filled('site_web')) {
            return $this->success($request, $done);
        }

        $data = $request->validate([
            'email'   => 'required|email|max:120',
            'confirm' => 'accepted',
        ], [
            'required' => 'Ce champ est obligatoire.',
            'email'    => 'Adresse e-mail invalide.',
            'max'      => 'Texte trop long.',
            'accepted' => 'Tu dois cocher cette case.',
        ]);

        // Une seule demande en attente par adresse
        $deletion = DeletionRequest::firstOrCreate([
            'email'      => Str::lower($data['email']),
            'handled_at' => null,
        ]);

        if ($deletion->wasRecentlyCreated) {
            $this->notifyOwner(new AdminAlert(
                title: 'Nouvelle demande de suppression de compte',
                details: ['E-mail' => $deletion->email],
                body: "Écris à cette adresse pour confirmer la demande avant toute suppression.",
                url: route('admin.deletion-requests.index'),
            ));
        }

        return $this->success($request, $done);
    }
}