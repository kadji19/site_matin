<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TrustItem;
use Illuminate\Http\Request;

class TrustItemController extends Controller
{
    public function index()
    {
        $trustItems = TrustItem::orderBy('sort_order')->orderBy('id')->get();
        return view('backend.trust-items.index', compact('trustItems'));
    }

    public function create()
    {
        return view('backend.trust-items.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['sort_order'] = $data['sort_order'] ?? (TrustItem::max('sort_order') + 1);

        TrustItem::create($data);

        return redirect()->route('admin.trust-items.index')->with('success', 'Élément ajouté.');
    }

    public function edit(TrustItem $trustItem)
    {
        return view('backend.trust-items.edit', compact('trustItem'));
    }

    public function update(Request $request, TrustItem $trustItem)
    {
        $data = $this->validated($request);
        $data['sort_order'] = $data['sort_order'] ?? $trustItem->sort_order;

        $trustItem->update($data);

        return redirect()->route('admin.trust-items.index')->with('success', 'Élément modifié.');
    }

    public function active(TrustItem $trustItem)
    {
        $trustItem->update(['is_active' => ! $trustItem->is_active]);

        return back()->with('success', 'Statut mis à jour.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'text'       => 'required|string|max:255',
            'icon'       => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}