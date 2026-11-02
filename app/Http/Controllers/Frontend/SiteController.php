<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\plan;
use App\Models\Screenshot;
use App\Models\SecurityPoint;
use App\Models\Setting;
use App\Models\Step;
use App\Models\TrustItem;
use App\Models\VoiceCommand;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(){

            $settings = Setting::pluck('value', 'key');
            $steps = Step::where('is_active', true)->orderBy('sort_order')->orderBy('id')->get();
            $securityPoints = SecurityPoint::where('is_active', true)->orderBy('sort_order')->orderBy('id')->get();
            $faqs = Faq::where('is_active', true)->orderBy('sort_order')->orderBy('id')->get();
            $trustItems = TrustItem::where('is_active', true)->orderBy('sort_order')->orderBy('id')->get();
            $features = Feature::where('is_active', true)->orderBy('sort_order')->orderBy('id')->get();
            $screenshots = Screenshot::where('is_active', true)->orderBy('sort_order')->orderBy('id')->get();
            $voiceCommands = VoiceCommand::where('is_active', true)->orderBy('sort_order')->orderBy('id')->get();
            $plans = plan::where('is_active', true)->orderBy('sort_order')->orderBy('id')->get();

            $demo = $voiceCommands->map(fn ($c) => array_filter([
                'say'    => $c->command,
                'reply'  => $c->reply,
                'action' => $c->action_yes ? [
                    'meta' => $c->action_meta,
                    'body' => $c->action_body,
                    'yes'  => $c->action_yes,
                    'done' => $c->action_done,
                ] : null,
            ]))->values();

        return view('frontend.pages.home', compact('settings', 'steps', 'securityPoints', 'faqs', 'trustItems', 'features', 'screenshots', 'voiceCommands', 'demo', 'plans'));
    }

    public function contact(){
        return view('frontend.pages.contact');
    }

    public function conditions(){
        $plans = Plan::where('is_active', true)->orderBy('sort_order')->orderBy('id')->get();
        return view('frontend.pages.conditions', compact('plans'));
    }

    public function confidentialite(){
        return view('frontend.pages.confidentialite');
    }

    public function mentions(){
        return view('frontend.pages.mentions-legales');
    }

    public function supprimerCompte(){
        return view('frontend.pages.supprimer-mon-compte');
    }

}
