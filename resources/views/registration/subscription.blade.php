<fieldset class="large-12 medium-12 small-12 cell">
    <legend>Choose Your Subscription</legend>
    @foreach($subscriptions as $subscription)
        @php
            $value = $subscription->id;
            $text = $subscription->title;
        @endphp
        <input 
              type="radio" 
              name="subscription" 
              @if(old('subscription') === $value) 
                  checked="checked" 
              @endif 
              value="{{ $value }}" 
              id="subscription-{{ $value }}">
        <label for="subscription-{{ $value }}">{{ $text }}</label>
    @endforeach
</fieldset>
