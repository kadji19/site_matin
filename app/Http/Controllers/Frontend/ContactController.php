<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\HandlesPublicForms;
use App\Mail\AdminAlert;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    use HandlesPublicForms;

    public function store(Request $request)
    {
        $done = 'Message envoyé. Nous répondons sous 48 heures ouvrées.';

        // Champ piège : un robot le remplit, pas un humain
        if ($request->filled('site_web')) {
            return $this->success($request, $done);
        }

        $data = $request->validate([
            'nom'     => 'required|string|max:80',
            'email'   => 'required|email|max:120',
            'sujet'   => ['required', Rule::in(array_keys(ContactMessage::SUBJECTS))],
            'message' => 'required|string|max:3000',
        ], [
            'required' => 'Ce champ est obligatoire.',
            'email'    => 'Adresse e-mail invalide.',
            'max'      => 'Texte trop long.',
            'in'       => 'Choix invalide.',
        ]);

        $contact = ContactMessage::create([
            'name'    => $data['nom'],
            'email'   => $data['email'],
            'subject' => $data['sujet'],
            'message' => $data['message'],
        ]);

        $this->notifyOwner(new AdminAlert(
            title: 'Nouveau message de contact',
            details: [
                'Nom'    => $contact->name,
                'E-mail' => $contact->email,
                'Sujet'  => ContactMessage::SUBJECTS[$contact->subject],
            ],
            body: $contact->message,
            visitorEmail: $contact->email,
            url: route('admin.contact-messages.show', $contact),
        ));

        return $this->success($request, $done);
    }
}
