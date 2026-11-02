<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Step;
use Illuminate\Http\Request;

class StepController extends Controller
{
    public function index()
    {
        $steps = Step::orderBy('sort_order')->orderBy('id')->get();
        return view('backend.steps.index', compact('steps'));
    }

    public function create()
    {
        return view('backend.steps.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['sort_order'] = $data['sort_order'] ?? (Step::max('sort_order') + 1);

        Step::create($data);

        return redirect()->route('admin.steps.index')->with('success', 'Etape ajoutée.');
    }

    public function edit(Step $step)
    {
        return view('backend.steps.edit', compact('step'));
    }

    public function update(Request $request, Step $step)
    {
        $step->update($this->validated($request));

        return redirect()->route('admin.steps.index')->with('success', 'Etape modifiée.');
    }

    public function active(Step $step)
    {
        $step->update(['is_active' => ! $step->is_active]);
        return back()->with('success', 'Statut mis à jour.');
    }


    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'step'   => 'required|string|max:255',
            'description'     => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
