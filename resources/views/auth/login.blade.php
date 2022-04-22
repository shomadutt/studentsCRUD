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

    <nav id="loginNav" class="navbar navbar-expand-lg navbar-light">
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

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif



        <form id="loginForm" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <x-jet-label class="form-label" for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mb-3">
                <x-jet-label class="form-label" for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div id="forgotten" class="mb-3">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    Forgotten password?
                </a>
                @endif

            </div>

            <div class="mb-3">
                <x-jet-button id="loginButton" class="ml-4 btn btn-primary ms-auto">
                    Log in
                </x-jet-button>

            </div>

            <div class="mb-3 form-check">

                <x-jet-checkbox class="form-check-input" id="remember_me" name="remember" />
                <label class="form-check-label" for="remember_me">Remember me</label>

            </div>

            <div id="newAccount" class="mb-3">
                <span id="noAccount">No account?</span>
                <a href="{{ route('register') }}">Sign up</a>
            </div>
        </form>

    </x-jet-authentication-card>

</x-guest-layout>