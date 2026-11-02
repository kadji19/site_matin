<div class="field">
    <label for="command">Commande (ce que dit l'utilisateur)</label>
    <input type="text" id="command" name="command" value="{{ old('command', $voice_command->command ?? '') }}" placeholder="Réponds à Awa que je confirme pour jeudi">
    <p class="hint">Sans les guillemets « » : ils sont ajoutés automatiquement sur le site.</p>
    @error('command')<p class="err">{{ $message }}</p>@enderror
</div>

<div class="field">
    <label for="reply">Réponse de Matin</label>
    <textarea id="reply" name="reply" rows="4">{{ old('reply', $voice_command->reply ?? '') }}</textarea>
    @error('reply')<p class="err">{{ $message }}</p>@enderror
</div>

<p class="hint">Action à confirmer (facultatif). Laissez les 4 champs vides si la commande n'a pas besoin de confirmation.</p>

<div class="field">
    <label for="action_meta">Résumé de l'action</label>
    <input type="text" id="action_meta" name="action_meta" value="{{ old('action_meta', $voice_command->action_meta ?? '') }}" placeholder="À : Awa Mensah · Objet : Re: Livraison jeudi">
    @error('action_meta')<p class="err">{{ $message }}</p>@enderror
</div>

<div class="field">
    <label for="action_body">Contenu de l'action</label>
    <textarea id="action_body" name="action_body" rows="3">{{ old('action_body', $voice_command->action_body ?? '') }}</textarea>
    @error('action_body')<p class="err">{{ $message }}</p>@enderror
</div>

<div class="field">
    <label for="action_yes">Texte du bouton de confirmation</label>
    <input type="text" id="action_yes" name="action_yes" value="{{ old('action_yes', $voice_command->action_yes ?? '') }}" placeholder="Envoyer">
    @error('action_yes')<p class="err">{{ $message }}</p>@enderror
</div>

<div class="field">
    <label for="action_done">Message après confirmation</label>
    <input type="text" id="action_done" name="action_done" value="{{ old('action_done', $voice_command->action_done ?? '') }}" placeholder="E-mail envoyé à Awa Mensah.">
    @error('action_done')<p class="err">{{ $message }}</p>@enderror
</div>

<div class="field">
    <label for="sort_order">Position (vide = à la fin)</label>
    <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $voice_command->sort_order ?? '') }}">
    @error('sort_order')<p class="err">{{ $message }}</p>@enderror
</div>

<div class="check">
    <input type="checkbox" id="is_active" name="is_active" value="1" @checked(old('is_active', $voice_command->is_active ?? true))>
    <label for="is_active">Afficher sur le site</label>
</div>

<div class="bar">
    <button class="btn" type="submit">Enregistrer</button>
    <a class="btn ghost" href="{{ route('admin.voice-commands.index') }}">Annuler</a>
</div>