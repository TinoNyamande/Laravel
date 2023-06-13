
@extends('layouts.head')
@section('content')<br><br>

    <div class="container" style="width: 50%;background-color:aliceblue;padding:3%">
        <h2>Fill in the form to register</h2>
    <form method="POST" action="{{ route('register') }}" class="form form-control">
        @csrf
         
        <!-- Name -->
        <div>
            
            <label for="name">Name/Company Name</label><br>
            <input id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="phone">Phone</label><br>
            <input class="block mt-1 w-full form-control" type="tel" id="phone" name="phone">
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" >Email</label><br>
            <input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" >Password</label><br>
            <input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" >Confirm Password</label><br>
            <input id="password_confirmation" class="block mt-1 w-full form-control" type="password" name="password_confirmation" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="btn btn-primary form-control">
                {{ __('Register') }}
            </x-primary-button>
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
    <div>

@endsection