<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DeletionRequest;
use Illuminate\Http\Request;

class DeletionRequestController extends Controller
{
    public function index()
    {
        $deletions = DeletionRequest::orderByRaw('handled_at is not null')
            ->latest()
            ->limit(200)
            ->get();

        return view('backend.deletion-requests.index', compact('deletions'));
    }

    public function handled(DeletionRequest $deletionRequest)
    {
        if ($deletionRequest->handled_at) {
            return back()->with('success', 'Cette demande est déjà traitée.');
        }

        $deletionRequest->update(['handled_at' => now()]);

        return back()->with('success', 'Demande marquée comme traitée.');
    }
}
