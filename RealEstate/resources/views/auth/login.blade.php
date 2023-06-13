@extends('layouts.head')
@section('content')<br><br>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
   <div class="container" style="background-color: aliceblue;width:50%;padding:3%">
    <h1>Enter your details to log in</h1>
    <form class="form form-control" style="padding:5%" method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email">Email</label><br>
            <input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" >Password</label><br>
            <input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span style="color:lightblue" class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <button class="btn btn-primary form-control">
                {{ __('Log in') }}
            </button>
        </div>
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
    </form>
</div>
@endsection