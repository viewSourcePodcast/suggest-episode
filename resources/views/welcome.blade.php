<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
            @if (Route::has('login'))
                <div class="">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <h1 class="text-xl font-bold">
                {{ __('viewSource Episode Suggestions') }}
            </h1>

            @if ($suggestions)
                <ul class="space-y-6">
                    @foreach ($suggestions as $suggestion)
                        <li class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex gap-4">
                            <strong>{{ $suggestion->likes }}</strong>
                            <span>
                                {{ $suggestion->suggestion }}
                                <em class="text-xs block">{{ __('Submitted by ') }} {{ $suggestion->user->name }}
                                    {{ __('on') }} {{ $suggestion->created_at }} </em>
                            </span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>
                    {{ __('No suggestions yet.') }}
                </p>
            @endif

            @auth
                <p>Form will go here</p>
            @else
                <p>
                    {{ __('Please log in to submit or rank a suggestion.') }}
                </p>
            @endauth
        </div>
    </div>
</x-app-layout>
