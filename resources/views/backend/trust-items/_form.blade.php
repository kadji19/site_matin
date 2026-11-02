<div class="field"><label for="text">Texte</label>
<input type="text" id="text" name="text" value="{{ old('text', $trustItem->text ?? '') }}">
@error('text')<p class="err">{{ $message }}</p>@enderror</div>
<div class="field">
    <label for="icon">Icône</label>
    <select id="icon" name="icon">
        <option value="">Aucune</option>
        @foreach(array_keys(config('icons')) as $key)
            <option value="{{ $key }}" @selected(old('icon', $trustItem->icon ?? '') === $key)>{{ $key }}</option>
        @endforeach
    </select>
    @error('icon')<p class="err">{{ $message }}</p>@enderror
</div>
<div class="field"><label for="sort_order">Position (vide = à la fin)</label>
<input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $trustItem->sort_order ?? '') }}">
@error('sort_order')<p class="err">{{ $message }}</p>@enderror</div>
<div class="check"><input type="checkbox" id="is_active" name="is_active" value="1" @checked(old('is_active', $trustItem->is_active ?? true))><label for="is_active">Afficher sur le site</label></div>
<div class="bar"><button class="btn" type="submit">Enregistrer</button><a class="btn ghost" href="{{ route('admin.trust-items.index') }}">Annuler</a></div>
