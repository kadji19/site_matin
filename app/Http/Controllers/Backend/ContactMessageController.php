<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        // Les nouveaux messages d'abord, puis du plus récent au plus ancien
        $messages = ContactMessage::orderByRaw('handled_at is not null')
            ->latest()
            ->limit(200)
            ->get();

        return view('backend.contact-messages.index', compact('messages'));
    }

    public function show(ContactMessage $contactMessage)
    {
        return view('backend.contact-messages.show', compact('contactMessage'));
    }

    public function handled(ContactMessage $contactMessage)
    {
        $contactMessage->update(['handled_at' => $contactMessage->handled_at ? null : now()]);

        return back()->with('success', 'Statut mis à jour.');
    }
}
