<aside class="z-20 hidden w-64 overflow-y-auto bg-black md:block flex-shrink-0">
    <div class="py-4 text-blue-500">
        <a class="ml-6 text-lg font-bold text-blue" href="{{ route('dashboard') }}">
            Licence City
        </a>

        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    <x-slot name="icon">
                        <img src="https://img.icons8.com/nolan/50/control-panel.png" width="35" height="35"/>
                    </x-slot>
                    {{ __('Dashboard') }}
                </x-nav-link>
            </li>

            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('city-halls.index') }}" :active="request()->routeIs('city-halls.index')">
                    <x-slot name="icon">
                        <img src="https://img.icons8.com/nolan/64/city-hall.png" alt="" width="35" height="35">
                    </x-slot>
                    {{ __('Prefeituras') }}
                </x-nav-link>
            </li>

            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('city-halls.create') }}" :active="request()->routeIs('city-halls.create')">
                    <x-slot name="icon">
                        <img src="https://img.icons8.com/nolan/50/add.png" width="35" height="35"/>
                    </x-slot>
                    {{ __('Adicionar Prefeitura') }}
                </x-nav-link>
            </li>

                {{-- <x-nav-link href="{{ route('city-halls.show', $cityHall->id) }}" :active="request()->routeIs('city-halls.show')"> --}}

            {{-- <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('city-halls.show') }}" :active="request()->routeIs('city-halls.show')">
                    <x-slot name="icon">
                        <img src="https://img.icons8.com/nolan/50/add.png" width="35" height="35"/>
                    </x-slot>
                    {{ __('Adicionar Prefeitura') }}
                </x-nav-link>
            </li> --}}

            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                        </svg>
                    </x-slot>
                    {{ __('About us') }}
                </x-nav-link>
            </li>

        </ul>
    </div>
</aside>
