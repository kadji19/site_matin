<div class="field">
    <label for="name">Nom de l'offre</label>
    <input type="text" id="name" name="name" value="{{ old('name', $plan->name ?? '') }}" placeholder="Essentiel">
    @error('name')<p class="err">{{ $message }}</p>@enderror
</div>

<div class="field">
    <label for="description">Description courte</label>
    <input type="text" id="description" name="description" value="{{ old('description', $plan->description ?? '') }}" placeholder="Pour gérer ta journée à la voix.">
    @error('description')<p class="err">{{ $message }}</p>@enderror
</div>

<div class="check">
    <input type="checkbox" id="is_featured" name="is_featured" value="1" @checked(old('is_featured', $plan->is_featured ?? false))>
    <label for="is_featured">Mettre cette offre en avant (carte et bouton orange)</label>
</div>

<div class="field">
    <label for="badge">Étiquette (offre mise en avant uniquement)</label>
    <input type="text" id="badge" name="badge" value="{{ old('badge', $plan->badge ?? '') }}" placeholder="Le plus choisi">
    @error('badge')<p class="err">{{ $message }}</p>@enderror
</div>

<div class="field">
    <label for="price_monthly">Prix mensuel (en FCFA, sans espaces)</label>
    <input type="number" id="price_monthly" name="price_monthly" min="0" value="{{ old('price_monthly', $plan->price_monthly ?? '') }}" placeholder="2000">
    @error('price_monthly')<p class="err">{{ $message }}</p>@enderror
</div>

<div class="field">
    <label for="price_yearly">Prix annuel (en FCFA)</label>
    <input type="number" id="price_yearly" name="price_yearly" min="0" value="{{ old('price_yearly', $plan->price_yearly ?? '') }}" placeholder="20000">
    <p class="hint">Laisser vide s'il n'y a pas d'abonnement annuel (offre gratuite, par exemple).</p>
    @error('price_yearly')<p class="err">{{ $message }}</p>@enderror
</div>

<div class="field">
    <label for="period">Texte après le prix</label>
    <input type="text" id="period" name="period" value="{{ old('period', $plan->period ?? 'FCFA / mois') }}">
    <p class="hint">« FCFA / mois » pour une offre payante, « FCFA » pour l'offre gratuite.</p>
    @error('period')<p class="err">{{ $message }}</p>@enderror
</div>

<div class="field">
    <label for="features">Avantages (un par ligne)</label>
    <textarea id="features" name="features" rows="6" placeholder="Tout le gratuit&#10;Commandes vocales illimitées">{{ old('features', implode("\n", $plan->features ?? [])) }}</textarea>
    @error('features')<p class="err">{{ $message }}</p>@enderror
</div>

<div class="field">
    <label for="cta_label">Texte du bouton</label>
    <input type="text" id="cta_label" name="cta_label" value="{{ old('cta_label', $plan->cta_label ?? '') }}" placeholder="Essayer Essentiel">
    @error('cta_label')<p class="err">{{ $message }}</p>@enderror
</div>

<div class="field">
    <label for="cta_url">Lien du bouton</label>
    <input type="text" id="cta_url" name="cta_url" value="{{ old('cta_url', $plan->cta_url ?? '#telecharger') }}">
    @error('cta_url')<p class="err">{{ $message }}</p>@enderror
</div>

<div class="field">
    <label for="sort_order">Position (vide = à la fin)</label>
    <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $plan->sort_order ?? '') }}">
    @error('sort_order')<p class="err">{{ $message }}</p>@enderror
</div>

<div class="check">
    <input type="checkbox" id="is_active" name="is_active" value="1" @checked(old('is_active', $plan->is_active ?? true))>
    <label for="is_active">Afficher sur le site</label>
</div>

<div class="bar">
    <button class="btn" type="submit">Enregistrer</button>
    <a class="btn ghost" href="{{ route('admin.plans.index') }}">Annuler</a>
</div>