<div class="grid-x grid-margin-x">
    <div class="large-6 medium-6 small-12 cell">
            First Name
            <input type="text" name="key[a]" value="1">
            {{-- {{ old("student.$index.first_name") ?: 1}}">--}}
    </div>
</div>
{{--
    <div class="large-6 medium-6 small-12 cell">
        <label>
            Last Name
            <input type="text" name="students[{{ $index }}][last_name]" value="{{ old("student.$index.last_name") }}">
        </label>
    </div>
</div>
<div class="grid-x grid-margin-x">
    <div class="large-6 medium-6 small-12 cell">
        <label>
            Username
            <input type="text" name="students[{{ $index }}][username]" value="{{ old("student.$index.username") }}">
        </label>
    </div>
    <div class="large-6 medium-6 small-12 cell">
        <label>
            E-Mail (optional)
            <input type="email" name="students[{{ $index }}][email]" value="{{ old("student.$index.email") }}">
        </label>
    </div>
    <div class="large-6 medium-6 small-12 cell">
        <label>
            Password
            <input type="password" name="students[{{ $index }}][password]" value="{{ old("student.$index.password") }}">
        </label>
    </div>
    <div class="large-6 medium-6 small-12 cell">
        <label>
            Password Confirmation 
            <input type="password" name="students[{{ $index }}][password_confirmation]">
        </label>
    </div>
</div>
--}}
