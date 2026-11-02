<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BetaSignup;
use Illuminate\Http\Request;

class BetaSignupController extends Controller
{
    public function index()
    {
        $signups = BetaSignup::latest()->limit(500)->get();

        return view('backend.beta-signups.index', compact('signups'));
    }
}
