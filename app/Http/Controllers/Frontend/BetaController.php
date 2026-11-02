<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\HandlesPublicForms ;
use App\Models\BetaSignup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BetaController extends Controller
{
    use HandlesPublicForms;

    public function store(Request $request)
    {
        $done = 'Merci ! Tu seras prévenu à la sortie et des nouvelles fonctions.';

        // Protection anti-spam
        if ($request->filled('site_web')) {
            return $this->success($request, $done);
        }

        // Validation
        $data = $request->validate([
            'prenom' => 'required|string|max:60',
            'email'  => 'required|email|max:120',
            'os'     => 'required|in:android,ios',
            'consent' => 'accepted',
        ], [
            'required' => 'Ce champ est obligatoire.',
            'email'    => 'Entre une adresse e-mail valide.',
            'max'      => 'Texte trop long.',
            'in'       => 'Choix invalide.',
            'accepted' => 'Tu dois accepter de recevoir des nouvelles.',
        ]);

        $email = Str::lower(trim($data['email']));

        // Création ou mise à jour d'une inscription existante
        $signup = BetaSignup::firstOrNew([
            'email' => $email,
        ]);

        $signup->fill([
            'first_name'      => $data['prenom'],
            'os'              => $data['os'],
            'consented_at'    => now(),
            'unsubscribed_at' => null,
        ]);

        $signup->unsubscribe_token ??= Str::random(40);

        $signup->save();

        return $this->success($request, $done);
    }

    public function unsubscribe(string $token)
    {
        $signup = BetaSignup::where('unsubscribe_token', $token)->firstOrFail();

        $signup->update([
            'unsubscribed_at' => $signup->unsubscribed_at ?? now(),
        ]);

        return view('frontend.pages.unsubscribed');
    }
}