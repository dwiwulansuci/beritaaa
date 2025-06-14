<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Login</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-4xl mt-6 bg-white shadow-md overflow-hidden sm:rounded-lg grid md:grid-cols-2">
            <!-- Kolom Branding -->
            <div class="hidden md:flex flex-col items-center justify-center bg-indigo-600 p-12 text-white">
                <a href="/">
                    <x-application-logo class="w-24 h-24 text-indigo-200 fill-current" />
                </a>
                <h2 href="/" class="text-4xl font-bold mt-4">
                    Nguawor<span class="font-light">News</span>
                </h2>
                <p class="mt-2 text-center text-indigo-200">
                    Selamat datang kembali! Silakan masuk untuk membaca berita paling acak se-antero jagat raya.
                </p>
            </div>

            <!-- Kolom Form -->
            <div class="p-6 md:p-8 flex flex-col justify-center">
                <div class="text-center md:hidden mb-8">
                     <a href="/" class="text-3xl font-bold text-gray-800">
                        Nguawor<span class="text-indigo-600">News</span>
                    </a>
                </div>
                <h2 class="text-2xl font-bold text-center text-gray-700">Login</h2>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                         <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Lupa password?') }}
                            </a>
                        @endif
                    </div>

                    <div>
                        <x-primary-button class="w-full justify-center">
                            {{ __('Login') }}
                        </x-primary-button>
                    </div>

                    <div class="text-center text-sm text-gray-600">
                        Belum punya akun?
                        <a class="underline hover:text-gray-900" href="{{ route('register') }}">
                            Buat akun baru
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
