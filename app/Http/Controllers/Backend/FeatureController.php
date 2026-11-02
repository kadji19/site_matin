<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::orderBy('sort_order')->orderBy('id')->get();
        return view('backend.features.index', compact('features'));
    }

    public function create()
    {
        return view('backend.features.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['sort_order'] = $data['sort_order'] ?? (Feature::max('sort_order') + 1);

        Feature::create($data);

        return redirect()->route('admin.features.index')->with('success', 'Fonctionalité ajoutée.');
    }

    public function edit(Feature $feature)
    {
        return view('backend.features.edit', compact('feature'));
    }

    public function update(Request $request, Feature $feature)
    {
        $feature->update($this->validated($request));

        return redirect()->route('admin.features.index')->with('success', 'Fonctionalité modifiée.');
    }

    public function active(Feature $feature)
    {
        $feature->update(['is_active' => ! $feature->is_active]);
        return back()->with('success', 'Statut mis à jour.');
    }


    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'icon'       => 'nullable|string|max:255',
            'description'     => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
