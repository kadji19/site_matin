<div class="field"><label for="title">Titre</label>
<input type="text" id="title" name="title" value="{{ old('title', $screenshot->title ?? '') }}">
@error('title')<p class="err">{{ $message }}</p>@enderror</div>
<div class="field"><label for="text">Texte</label>
<input type="text" id="text" name="text" value="{{ old('text', $screenshot->text ?? '') }}">
@error('text')<p class="err">{{ $message }}</p>@enderror</div>
<div class="field"><label for="sort_order">Position (vide = à la fin)</label>
<input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $screenshot->sort_order ?? '') }}">
@error('sort_order')<p class="err">{{ $message }}</p>@enderror</div>
<div class="field"><label for="image">Image</label>
@if(!empty($screenshot->image))<img class="thumb" src="{{ asset('storage/'.$screenshot->image) }}" alt="">@endif
<input type="file" id="image" name="image" accept="image/*">
@error('image')<p class="err">{{ $message }}</p>@enderror</div>
<div class="check"><input type="checkbox" id="is_active" name="is_active" value="1" @checked(old('is_active', $screenshot->is_active ?? true))><label for="is_active">Afficher sur le site</label></div>
<div class="bar"><button class="btn" type="submit">Enregistrer</button><a class="btn ghost" href="{{ route('admin.screenshots.index') }}">Annuler</a></div>
