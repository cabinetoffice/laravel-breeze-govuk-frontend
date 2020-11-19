@extends('layouts.app', [
    'title' => 'Register'
])

@section('title', 'Register')

@section('content')

    <div class="govuk-grid-row">
        <div class="govuk-grid-column-two-thirds">

            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">

                @include('partials.error-summary')

                @csrf
                <fieldset class="govuk-fieldset">
                    <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                        <h2 class="govuk-fieldset__heading">
                            {{ __('Your details') }}
                        </h2>
                    </legend>

                    <div class="govuk-form-group @error('name') govuk-form-group--error @enderror">
                        <label for="name" class="govuk-label">{{ __('Name') }}</label>
                        @error('name')
                        <span class="govuk-error-message">
                            <span class="govuk-visually-hidden">Error:</span> {{ $message }}
                        </span>
                        @enderror
                        <input id="name" type="text" class="govuk-input" name="name" value="{{ old('name') }}" required autofocus>
                    </div>

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

                    <div class="govuk-form-group @error('password_confirmation') govuk-form-group--error @enderror">
                        <label for="password-confirm" class="govuk-label">{{ __('Confirm Password') }}</label>
                        @error('password_confirmation')
                            <span class="govuk-error-message">
                                <span class="govuk-visually-hidden">Error:</span> {{ $message }}
                            </span>
                        @enderror
                        <input id="password-confirm" type="password" class="govuk-input" name="password_confirmation" required>
                    </div>

                </fieldset>

                <button type="submit" class="govuk-button">
                    {{ __('Register') }}
                </button>

            </form>

            <a href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

        </div>
    </div>

@endsection
