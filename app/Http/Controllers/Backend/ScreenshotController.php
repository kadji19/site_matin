<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Screenshot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScreenshotController extends Controller
{

    public function index()
    {
        $screenshots = Screenshot::orderBy('sort_order')->orderBy('id')->get();
        return view('backend.screenshots.index', compact('screenshots'));
    }

    public function create()
    {
        return view('backend.screenshots.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['sort_order'] = $data['sort_order'] ?? (Screenshot::max('sort_order') + 1);

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('screenshots', 'public');
        }

        Screenshot::create($data);

        return redirect()->route('admin.screenshots.index')->with('success', "Capture d'écrans enregistrer avec succès");

    }

    public function edit(Screenshot $screenshot)
    {
        return view('backend.screenshots.edit', compact('screenshot'));
    }

    public function update(Request $request, Screenshot $screenshot)
    {
        $data = $this->validated($request);

        if($request->hasFile('image')){
            if($screenshot->image){
                Storage::disk('public')->delete($screenshot->image);
            }

            $data['image'] = $request->file('image')->store('screenshots', 'public');
        }

        $screenshot->update($data);

        return redirect()->route('admin.screenshots.index')->with('success', 'Capture d\'écrans modifiée.');
    }


    public function active(Screenshot $screenshot)
    {
        $screenshot->update(['is_active' => ! $screenshot->is_active]);
        return back()->with('success', 'Statut mis à jour.');
    }


    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'image'       => 'required|image|max:3072',
            'text'     => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
