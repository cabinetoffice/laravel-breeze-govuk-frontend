@extends('layouts.app', [
    'title' => 'Log in'
])

@section('title', 'Log in')

@section('content')

    <div class="govuk-grid-row">
        <div class="govuk-grid-column-two-thirds">
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Log in') }}">

                @include('partials.error-summary')

                @csrf
                <fieldset class="govuk-fieldset">
                    <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                        <h2 class="govuk-fieldset__heading">
                            {{ __('Login details') }}
                        </h2>
                    </legend>

                    <div class="govuk-form-group @error('email') govuk-form-group--error @enderror">
                        <label for="email" class="govuk-label">{{ __('E-Mail Address') }}</label>
                        @error('email')
                        <span class="govuk-error-message">
                            <span class="govuk-visually-hidden">Error:</span> {{ $message }}
                        </span>
                        @enderror
                        <input id="email" type="email" class="govuk-input" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="govuk-form-group @error('password') govuk-form-group--error @enderror">
                        <label for="password" class="govuk-label">{{ __('Password') }}</label>
                        @error('password')
                        <span class="govuk-error-message">
                            <span class="govuk-visually-hidden">Error:</span> {{ $message }}
                        </span>
                        @enderror
                        <input id="password" type="password" class="govuk-input" name="password" required>
                    </div>

                    <div class="govuk-form-group">
                        <div class="govuk-checkboxes__item">
                            <input class="govuk-checkboxes__input" id="remember-me" name="remember_me" type="checkbox" {{ old('remember_me') ? 'checked' : '' }}>
                            <label class="govuk-label govuk-checkboxes__label" for="remember-me">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                </fieldset>

                <button type="submit" class="govuk-button">
                    {{ __('Log in') }}
                </button>

            </form>

            @if (Route::has('password.request'))
                <p class="govuk-body">
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a> <span class="govuk-!-margin-left-3 govuk-!-margin-right-3"></span>
                    <a href="{{ route('register') }}">
                        {{ __('Sign up') }}
                    </a>
                </p>
            @endif

        </div>
    </div>

@endsection
