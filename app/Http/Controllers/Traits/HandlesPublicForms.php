<?php

namespace App\Http\Controllers\Traits;

use App\Mail\AdminAlert;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

trait HandlesPublicForms
{
    protected function success(Request $request, string $message)
    {
        return $request->expectsJson()
            ? response()->json(['message' => $message])
            : back()->with('success', $message);
    }

    protected function notifyOwner(AdminAlert $alert): void
    {
        $to = Setting::where('key', 'company_email')->value('value');

        if (! filter_var($to, FILTER_VALIDATE_EMAIL)) {
            return; // adresse pas encore renseignée dans les réglages
        }

        try {
            Mail::to($to)->send($alert);
        } catch (\Throwable $e) {
            report($e); // la demande reste enregistrée en base
        }
    }
}