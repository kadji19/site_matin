<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::orderBy('sort_order')->orderBy('id')->get();
        return view('backend.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('backend.plans.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['sort_order'] = $data['sort_order'] ?? (plan::max('sort_order') + 1);

        Plan::create($data);

        return redirect()->route('admin.plans.index')->with('success', 'Offre ajoutée.');
    }

    public function edit(Plan $plan)
    {
        return view('backend.plans.edit', compact('plan'));
    }

    public function update(Request $request, Plan $plan)
    {
        $data = $this->validated($request);
        $data['sort_order'] = $data['sort_order'] ?? $plan->sort_order;

        $plan->update($data);

        return redirect()->route('admin.plans.index')->with('success', 'Offre modifiée.');
    }

    public function active(Plan $plan)
    {
        $plan->update(['is_active' => ! $plan->is_active]);

        return back()->with('success', 'Statut mis à jour.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name'          => 'required|string|max:100',
            'description'   => 'nullable|string|max:255',
            'badge'         => 'nullable|string|max:50',
            'price_monthly' => 'required|integer|min:0',
            'price_yearly'  => 'nullable|integer|min:0',
            'period'        => 'required|string|max:50',
            'features'      => 'required|string',
            'cta_label'     => 'required|string|max:100',
            'cta_url' => ['required', 'string', 'max:255', 'regex:/^(https?:\/\/|\/|#)/i'],
            'sort_order'    => 'nullable|integer|min:0',
        ]);

        // Le formulaire envoie un texte : une ligne = un avantage
        $data['features'] = collect(preg_split('/\R/', $data['features']))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->values()
            ->all();

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active']   = $request->boolean('is_active');

        return $data;
    }
}
