<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('sort_order')->orderBy('id')->get();
        return view('backend.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('backend.faqs.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['sort_order'] = $data['sort_order'] ?? (Faq::max('sort_order') + 1);

        Faq::create($data);

        return redirect()->route('admin.faqs.index')->with('success', 'Question ajoutée.');
    }

    public function edit(Faq $faq)
    {
        return view('backend.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $faq->update($this->validated($request));

        return redirect()->route('admin.faqs.index')->with('success', 'Question modifiée.');
    }

    public function active(Faq $faq)
    {
        $faq->update(['is_active' => ! $faq->is_active]);
        return back()->with('success', 'Statut mis à jour.');
    }

/*     public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('backend.faqs.index')->with('success', 'Question supprimée.');
    } */

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'question'   => 'required|string|max:255',
            'answer'     => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        // Une case non cochée n'est pas envoyée par le navigateur
        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
