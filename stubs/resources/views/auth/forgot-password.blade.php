@extends('layouts.app', [
    'title' => 'Password reset'
])

@section('title', 'Password reset')

@section('content')

    <div class="govuk-grid-row">
        <div class="govuk-grid-column-two-thirds">
            <p>
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>

            <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Password reset request') }}">

                @include('partials.error-summary')

                @csrf
                <div class="govuk-form-group @error('email') govuk-form-group--error @enderror">
                    <label for="email" class="govuk-label">{{ __('E-Mail Address') }}</label>
                    @error('email')
                    <span class="govuk-error-message">
                        <span class="govuk-visually-hidden">Error:</span> {{ $message }}
                    </span>
                    @enderror
                    <input id="email" type="email" class="govuk-input" name="email" value="{{ old('email') }}" required>
                </div>

                <button type="submit" class="govuk-button">
                    {{ __('Email Password Reset Link') }}
                </button>

            </form>

        </div>
    </div>

@endsection
