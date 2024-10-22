@component('mail::message')
{{ __('You have been invited to join the :team family!', ['team' => $invitation->team->name]) }}

@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::registration()))
{{ __('If you do not have an account, use the login access provided below:') }}

{{-- @component('mail::button', ['url' => route('register')])
{{ __('Create Account') }}
@endcomponent --}}

Username: {{$invitation->username}}
Password: {{$invitation->password}}

{{ __('If you already have an account, you may accept this invitation by clicking the button below:') }}

@else
{{ __('You may accept this invitation by clicking the button below:') }}
@endif


@component('mail::button', ['url' => $acceptUrl])
{{ __('Accept Invitation') }}
@endcomponent

{{ __('If you did not expect to receive an invitation to this team, you may discard this email.') }}
@endcomponent
