<x-guest-layout>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{'../../bootstrap-5.0.2-dist/css/bootstrap.min.css'}}" rel="stylesheet">
        <link href="{{'../../css/students.css'}}" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <title>Student Database</title>
    </head>

    <nav id="forgotNav" class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/home')}}">
                <img id="logo" src="{{ asset('images/logo.png') }}" alt="" class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <!-- <x-jet-authentication-card-logo /> -->
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-3">
                <x-jet-label class="form-label" for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mb-3">
                <x-jet-button id="forgetButton" class="ml-4 btn btn-primary ms-auto">
                    Email Password Reset Link
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>