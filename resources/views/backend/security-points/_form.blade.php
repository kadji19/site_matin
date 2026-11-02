<div class="field"><label for="title">Titre</label>
<input type="text" id="title" name="title" value="{{ old('title', $security_point->title ?? '') }}">
@error('title')<p class="err">{{ $message }}</p>@enderror</div>
<div class="field"><label for="description">Description</label>
<textarea id="description" name="description" rows="4">{{ old('description', $security_point->description ?? '') }}</textarea>
@error('description')<p class="err">{{ $message }}</p>@enderror</div>
<div class="field"><label for="sort_order">Position (vide = à la fin)</label>
<input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $security_point->sort_order ?? '') }}">
@error('sort_order')<p class="err">{{ $message }}</p>@enderror</div>
<div class="check"><input type="checkbox" id="is_active" name="is_active" value="1" @checked(old('is_active', $security_point->is_active ?? true))><label for="is_active">Afficher sur le site</label></div>
<div class="bar"><button class="btn" type="submit">Enregistrer</button><a class="btn ghost" href="{{ route('admin.security-points.index') }}">Annuler</a></div>
