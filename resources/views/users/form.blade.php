<div class="grid-x grid-margin-x">
    <div class="large-6 medium-6 small-12 cell">
        <label>
            First Name
            <input type="text" name="{{ $key }}[first_name]" @error("$key.first_name") class="has-error" @enderror value="{{ old("$key.first_name") }}">
        </label>
    </div>
    <div class="large-6 medium-6 small-12 cell">
        <label>
            Last Name
            <input type="text" name="{{ $key }}[last_name]" @error("$key.last_name") class="has-error" @enderror value="{{ old("$key.last_name") }}">
        </label>
    </div>
</div>
<div class="grid-x grid-margin-x">
    <div class="large-6 medium-6 small-12 cell">
        <label>
            Username
            <input type="text" name="{{ $key }}[username]" @error("$key.username") class="has-error" @enderror value="{{ old("$key.username") }}">
        </label>
    </div>
    <div class="large-6 medium-6 small-12 cell">
        <label>
            E-Mail
            <input type="email" name="{{ $key }}[email]" @error("$key.email") class="has-error" @enderror value="{{ old("$key.email") }}">
        </label>
    </div>
    <div class="large-6 medium-6 small-12 cell">
        <label>
            Password 
            <input type="password" @error("$key.password") class="has-error" @enderror name="{{ $key }}[password]">
        </label>
    </div>
    <div class="large-6 medium-6 small-12 cell">
        <label>
            Password Confirmation 
            <input type="password" @error("$key.password_confirmation") class="has-error" @enderror name="{{ $key }}[password_confirmation]">
        </label>
    </div>
</div>
