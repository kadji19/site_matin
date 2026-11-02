<div class="field"><label for="question">Question</label>
<input type="text" id="question" name="question" value="{{ old('question', $faq->question ?? '') }}">
@error('question')<p class="err">{{ $message }}</p>@enderror</div>
<div class="field"><label for="answer">Réponse</label>
<textarea id="answer" name="answer" rows="4">{{ old('answer', $faq->answer ?? '') }}</textarea>
@error('answer')<p class="err">{{ $message }}</p>@enderror</div>
<div class="field"><label for="sort_order">Position (vide = à la fin)</label>
<input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $faq->sort_order ?? '') }}">
@error('sort_order')<p class="err">{{ $message }}</p>@enderror</div>
<div class="check"><input type="checkbox" id="is_active" name="is_active" value="1" @checked(old('is_active', $faq->is_active ?? true))><label for="is_active">Afficher sur le site</label></div>
<div class="bar"><button class="btn" type="submit">Enregistrer</button><a class="btn ghost" href="{{ route('admin.faqs.index') }}">Annuler</a></div>
