<h1>Connexion</h1>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        @error('email') <p class="error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>
    </div>

    <div>
        <label>
            <input type="checkbox" name="remember" value="1"> Rester connecté
        </label>
    </div>

    <button type="submit">Se connecter</button>
</form>