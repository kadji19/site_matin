<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\VoiceCommand;
use Illuminate\Http\Request;

class VoiceCommandController extends Controller
{
        public function index()
    {
        $voiceCommands = VoiceCommand::orderBy('sort_order')->orderBy('id')->get();
        return view('backend.voice-commands.index', compact('voiceCommands'));
    }

    public function create()
    {
        return view('backend.voice-commands.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['sort_order'] = $data['sort_order'] ?? (VoiceCommand::max('sort_order') + 1);

        VoiceCommand::create($data);

        return redirect()->route('admin.voice-commands.index')->with('success', 'Question ajoutée.');
    }

    public function edit(VoiceCommand $voice_command)
    {
        return view('backend.voice-commands.edit', compact('voice_command'));
    }

    public function update(Request $request, VoiceCommand $voice_command)
    {
        $voice_command->update($this->validated($request));

        return redirect()->route('admin.voice-commands.index')->with('success', 'Question modifiée.');
    }

    public function active(VoiceCommand $voiceCommand)
    {
        $voiceCommand->update(['is_active' => ! $voiceCommand->is_active]);
        return back()->with('success', 'Statut mis à jour.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'command'     => 'required|string|max:255',
            'reply'       => 'required|string',
            'action_meta' => 'nullable|required_with:action_yes|string|max:255',
            'action_body' => 'nullable|required_with:action_yes|string',
            'action_yes'  => 'nullable|required_with:action_meta,action_body,action_done|string|max:100',
            'action_done' => 'nullable|required_with:action_yes|string|max:255',
            'sort_order'  => 'nullable|integer|min:0',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
