<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SecurityPoint;
use Illuminate\Http\Request;

class SecurityPointController extends Controller
{
        public function index()
    {
        $securityPoints = SecurityPoint::orderBy('sort_order')->orderBy('id')->get();
        return view('backend.security-points.index', compact('securityPoints'));
    }

    public function create()
    {
        return view('backend.security-points.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['sort_order'] = $data['sort_order'] ?? (SecurityPoint::max('sort_order') + 1);

        SecurityPoint::create($data);

        return redirect()->route('admin.security-points.index')->with('success', 'Question ajoutée.');
    }

    public function edit(SecurityPoint $security_point)
    {
        return view('backend.security-points.edit', compact('security_point'));
    }

    public function update(Request $request, SecurityPoint $security_point)
    {
        $security_point->update($this->validated($request));

        return redirect()->route('admin.security-points.index')->with('success', 'Question modifiée.');
    }

    public function active(SecurityPoint $securityPoint)
    {
        $securityPoint->update(['is_active' => ! $securityPoint->is_active]);
        return back()->with('success', 'Statut mis à jour.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'description'     => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
