@extends('layouts.app', [
    'title' => 'Confirm Password'
])

@section('title', 'Confirm your password')

@section('content')
    <div class="govuk-grid-row">
        <div class="govuk-grid-column-two-thirds">

            <p>{{ __('For your security, please confirm your password to continue.') }}</p>

            <form method="POST" action="{{ route('password.confirm') }}" aria-label="{{ __('Confirm your password') }}">

                @include('partials.error-summary')

                @csrf

                <div class="govuk-form-group @error('password') govuk-form-group--error @enderror">
                    <label for="password" class="govuk-label">{{ __('Password') }}</label>
                    @error('password')
                    <span class="govuk-error-message">
                            <span class="govuk-visually-hidden">Error:</span> {{ $message }}
                        </span>
                    @enderror
                    <input id="password" type="password" class="govuk-input" name="password" required>
                </div>

                <button type="submit" class="govuk-button">
                    {{ __('Log in') }}
                </button>

            </form>

            @if (Route::has('password.request'))
                <p class="govuk-body">
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                </p>
            @endif

        </div>
    </div>
@endsection
