@section('title', 'ログイン')

<x-app-layout>
    <x-slot name="header">
        <h2 class="sm:text-2xl text-lg mb-2 text-fourth">{{ __('Login') }}</h2>
    </x-slot>

    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="items-center mx-auto h-screen">
        <div class="flex flex-col w-full max-w-md mx-auto mt-12 px-6">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" placeholder="Email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mt-8">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="mt-2 text-end">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-third hover:text-fourth" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
                <div class="mt-8">
                    <button type="submit" class="w-full items-center px-10 py-4 bg-fourth hover:scale-105 text-md font-medium text-center text-white transition duration-300 ease-in-out transform shadow-md rounded-full">
                        <div class="flex items-center justify-center">
                            {{ __('Log in') }}
                        </div>
                    </button>
                </div>
            </form>
            <div class="relative mt-20 mb-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 text-third bg-first">{{ __('For beginner') }}</span>
                </div>
            </div>
            <div>
                <a href="{{ route('register' )}}" class="block py-4 w-full text-center bg-fourth text-white  transition duration-200 hover:scale-105 rounded-full cursor-pointer">
                    <span>{{ __('Register') }}</span>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
