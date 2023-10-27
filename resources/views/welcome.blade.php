<x-app-layout>
    @guest
        <x-slot name="header">
            <div class="flex justify-between">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                @if (Route::has('login'))
                    <div class="">
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif

                    </div>
                @endif
            </div>
        </x-slot>
    @endguest
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="bg-green-100 p-3 rounded">
                    {{ session('success') }}
                </div>
            @endif


            <h1 class="text-xl font-bold">
                {{ __('viewSource Episode Suggestions') }}
            </h1>

            @if ($suggestions)
                <ul class="space-y-6">
                    @foreach ($suggestions as $suggestion)
                        <li
                            class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-wrap md:flex-nowrap gap-4">
                            <strong>{{ $suggestion->likes }}</strong>
                            <span>
                                {{ $suggestion->suggestion }}
                                <em class="text-xs block">{{ __('Submitted by ') }} {{ $suggestion->user->name }}
                                    {{ __('on') }} {{ $suggestion->created_at }} </em>
                            </span>
                            @if ($suggestion->user_id === Auth::id())
                                <form method="POST" class="grow flex justify-end"
                                    action="{{ route('suggestions.destroy', $suggestion) }}">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button>
                                        {{ __('Delete') }}
                                    </x-danger-button>
                                </form>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @else
                <p>
                    {{ __('No suggestions yet.') }}
                </p>
            @endif

            @auth
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg space-y-6">
                    <div class="p-6 text-gray-900">

                        <h2 class="text-lg font-semibold">{{ __('New Suggestion') }}</h2>

                        <form method="POST" action="{{ route('suggestions.store') }}" class="space-y-6">
                            @csrf
                            <x-input-label for="suggestion" :value="__('Suggestion')" />
                            <x-text-input id="suggestion" name="suggestion" class="w-full" required
                                value="{{ old('suggestion') }}" />
                            <x-input-error :messages="$errors->get('suggestion')" />

                            <div class="flex justify-end">
                                <x-primary-button class="ml-4">
                                    {{ __('Submit') }}
                                </x-primary-button>
                            </div>

                        </form>

                    </div>
                @else
                    <p>
                        {{ __('Please log in to submit or rank a suggestion.') }}
                    </p>
                @endauth
            </div>
        </div>
</x-app-layout>
