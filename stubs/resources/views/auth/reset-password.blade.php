@extends('layouts.app', [
    'title' => 'Reset Password'
])

@section('title', 'Reset Password')

@section('content')

    <div class="govuk-grid-row">
        <div class="govuk-grid-column-two-thirds">

            <form method="POST" action="{{ route('password.update') }}" aria-label="{{ __('Reset Password') }}">

                @include('partials.error-summary')

                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <fieldset class="govuk-fieldset">
                    <legend class="govuk-fieldset__legend govuk-fieldset__legend--l">
                        <h2 class="govuk-fieldset__heading">
                            {{ __('Your details') }}
                        </h2>
                    </legend>

                    <div class="govuk-form-group @error('email') govuk-form-group--error @enderror">
                        <label for="email" class="govuk-label">{{ __('E-Mail Address') }}</label>
                        @error('email')
                        <span class="govuk-error-message">
                            <span class="govuk-visually-hidden">Error:</span> {{ $message }}
                        </span>
                        @enderror
                        <input id="email" type="email" class="govuk-input" name="email" value="{{ old('email', $request->email) }}" required>
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
                    {{ __('Reset Password') }}
                </button>
            </form>
        </div>
    </div>

@endsection
