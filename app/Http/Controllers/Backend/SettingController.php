<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    private const IMAGE_KEYS = ['hero_image', 'morning_email_image'];

    public function edit()
    {
        $settings = Setting::pluck('value', 'key');

        return view('backend.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $title = 'required|string|max:120';
        $text  = 'nullable|string|max:1000';
        $short = 'nullable|string|max:255';
        $link  = ['nullable', 'string', 'max:255', 'regex:/^(https?:\/\/|\/|#)/i'];

        $data = $request->validate([
            'hero_title'         => $title,
            'hero_title_accent'  => 'nullable|string|max:120',
            'hero_subtitle'      => $text,
            'hero_appstore_url'  => $link,
            'hero_playstore_url' => $link,
            'hero_image'         => 'nullable|image|max:2048',

            'step_question'      => $title,
            'step_title'         => $title,

            'feature_question'   => $title,
            'feature_title'      => $title,
            'feature_subtitle'   => $text,

            'screenshot_question' => $title,
            'screenshot_title'    => $title,
            'screenshot_subtitle' => $text,

            'morning_email_question' => $title,
            'morning_email_title'    => $title,
            'morning_email_text'     => $text,
            'morning_email_image'    => 'nullable|image|max:2048',

            'voice_question'     => $title,
            'voice_title'        => $title,
            'voice_subtitle'     => $text,

            'security_question'  => $title,
            'security_title'     => $title,
            'security_intro'     => $text,

            'tarif_question'     => $title,
            'tarif_title'        => $title,
            'pay_methods'        => $short,

            'faq_question'       => $title,
            'faq_title'          => $title,

            'action_question'    => $title,
            'action_title'       => $title,

            'company_name'       => $short,
            'company_form'       => 'nullable|string|max:50',
            'company_capital'    => 'nullable|string|max:50',
            'company_rccm'       => 'nullable|string|max:100',
            'company_nif'        => 'nullable|string|max:100',
            'company_address'    => $short,
            'company_email'      => $short,
            'company_phone'      => 'nullable|string|max:50',
            'company_director'   => $short,
            'company_hosting'    => 'nullable|string|max:500',
            'site_domain'        => $short,
            'legal_updated_at'   => 'nullable|date',
        ], [
            'regex' => 'Le lien doit commencer par https://, http://, / ou #.',
        ]);

        $current   = Setting::pluck('value', 'key');
        $oldImages = [];

        foreach (self::IMAGE_KEYS as $key) {
            if ($request->hasFile($key)) {
                $oldImages[] = $current->get($key);
                $data[$key]  = $request->file($key)->store('landing', 'public');
            } else {
                unset($data[$key]);
            }
        }

        DB::transaction(function () use ($data) {
            foreach ($data as $key => $value) {
                Setting::updateOrCreate(['key' => $key], ['value' => $value]);
            }
        });

        // Les anciennes images ne sont supprimées qu'une fois la base à jour
        foreach (array_filter($oldImages) as $path) {
            Storage::disk('public')->delete($path);
        }

        return back()->with('success', 'Modifications enregistrées avec succès.');
    }
}