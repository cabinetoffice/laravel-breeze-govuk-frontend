@extends('layouts.app', [
    'title' => 'Verify email address'
])

@section('title', 'Verify email address')

@section('content')

    <div class="govuk-grid-row">
        <div class="govuk-grid-column-two-thirds">

            <p> {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>

            <form method="POST" action="{{ route('verification.send') }}" aria-label="{{ __('Verify email address') }}">
                @include('partials.error-summary')>
                @csrf
                <div class="govuk-form-group @error('email') govuk-form-group--error @enderror">
                    <label for="email" class="govuk-label">{{ __('E-Mail Address') }}</label>
                    @error('email')
                    <span class="govuk-error-message">
                        <span class="govuk-visually-hidden">Error:</span> {{ $message }}
                    </span>
                    @enderror
                    <input id="email" type="email" class="govuk-input" name="email" value="{{ old('email', $request->email) }}" required>
                </div>

                <button type="submit" class="govuk-button">
                    {{ __('Resend Verification Email') }}
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}" aria-label="{{ __('Log out') }}">
                @csrf

                <button type="submit" class="govuk-button">
                    {{ __('Logout') }}
                </button>
            </form>

        </div>
    </div>

@endsection
