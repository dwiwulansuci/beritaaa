<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Register</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-4xl mt-6 bg-white shadow-md overflow-hidden sm:rounded-lg grid md:grid-cols-2">
            <!-- Kolom Form -->
            <div class="p-6 md:p-8 flex flex-col justify-center">
                 <div class="text-center md:hidden mb-8">
                     <a href="/" class="text-3xl font-bold text-gray-800">
                        Nguawor<span class="text-indigo-600">News</span>
                    </a>
                </div>
                <h2 class="text-2xl font-bold text-center text-gray-700">Buat Akun Baru</h2>

                <form method="POST" action="{{ route('register') }}" class="mt-6 space-y-4">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Nama')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="pt-2">
                        <x-primary-button class="w-full justify-center">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>

                    <div class="text-center text-sm text-gray-600">
                        Sudah memiliki akun?
                        <a class="underline hover:text-gray-900" href="{{ route('login') }}">
                            Login di sini
                        </a>
                    </div>
                </form>
            </div>

            <!-- Kolom Branding -->
            <div class="hidden md:flex flex-col items-center justify-center bg-indigo-600 p-12 text-white">
                <a href="/">
                    <x-application-logo class="w-24 h-24 text-indigo-200 fill-current" />
                </a>
                <h2 class="text-4xl font-bold mt-4">
                   Nguawor<span class="font-light">News</span>
               </h2>
                <p class="mt-2 text-center text-indigo-200">
                    Bergabunglah bersama kami dan jadilah yang pertama tahu berita-berita paling *nguawor* dan tak terduga.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
