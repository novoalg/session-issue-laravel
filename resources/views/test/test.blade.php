@extends('layouts.app')

@section('content')
    @include('layouts.form_errors')
    <form id="registrationForm" action="/register" method="POST">
        @csrf
        <div class="grid-x grid-margin-x">
            <div class="large-12 cell">
                <div id="subscriptionForm">
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
                </div>
            </div>
            <div class="large-12 cell">
                <div id="userForm">
                    <label>
                        Primary Parent
                        <span data-tooltip title="Primary Parents have control over Student information and subscription management">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </span>
                    </label>
                    @include('users.form', [
                        'key' => 'primary_parental',
                    ])
                    <label>
                        Secondary Parent
                        <span data-tooltip title="Primary Parents have control over Student information and subscription management">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </span>
                    </label>
                    @include('users.form', [
                        'key' => 'secondary_parental',
                    ])

                </div>
            </div>
            <input type="submit" class="button" value="Submit"/>
        </div>
    </form>
@endsection
