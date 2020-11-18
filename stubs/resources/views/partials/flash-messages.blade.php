@if (session('success'))
    <x-alert-success>
        <x-slot name="title">
            Success!
        </x-slot>
        {{ session('success') }}
    </x-alert-success>
@endif

@if (session('error'))
    <x-alert-error>
        <x-slot name="title">
            There is a problem!
        </x-slot>
        {{ session('error') }}
    </x-alert-error>
@endif

@if (session('info'))
    <x-alert-info>
        {{ session('info') }}
    </x-alert-info>
@endif

@if (session('warning'))
    <x-alert-warning>
        {{ session('warning') }}
    </x-alert-warning>
@endif

@if (session('status') == 'verification-link-sent')
    <x-alert-success>
        <x-slot name="title">
            Verification sent
        </x-slot>
        A new verification link has been sent to the email address you provided during registration.
    </x-alert-success>
@endif
