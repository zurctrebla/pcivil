<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    {{-- <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body> --}}

    <body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">
 
        {{-- NAVBAR mobile only --}}
        <x-mary-nav sticky class="lg:hidden">
            <x-slot:brand>
                <div class="ml-5 pt-5">{{ config('app.name', 'Laravel') }}</div>
            </x-slot:brand>
            <x-slot:actions>
                <label for="main-drawer" class="lg:hidden mr-3">
                    <x-mary-icon name="o-bars-3" class="cursor-pointer" />
                </label>
            </x-slot:actions>
        </x-mary-nav>
     
        {{-- MAIN --}}
        <x-mary-main full-width>
            {{-- SIDEBAR --}}
            <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
     
                {{-- BRAND --}}
                <div class="ml-5 pt-5">{{ config('app.name', 'Laravel') }}</div>
     
                {{-- MENU --}}
                <x-mary-menu activate-by-route>
     
                    {{-- User --}}
                    {{-- @if($user = auth()->user())
                        <x-mary-menu-separator />
     
                        <x-mary-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded">
                            <x-slot:actions>
                                <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate link="/logout" />
                            </x-slot:actions>
                        </x-mary-list-item>
     
                        <x-mary-menu-separator />
                    @endif --}}
     
                    <x-mary-menu-item title="Dashboard" icon="o-sparkles" link="{{ route('dashboard')}}" />

                    @if (auth()->guard('web')->check())
                        <x-mary-menu-item title="Unidades" icon="o-sparkles" link="{{ route('unit.units-list')}}" />
                        <x-mary-menu-item title="Agentes" icon="o-sparkles" link="{{ route('agent.agents-list')}}" />
                    @endif

                    <x-mary-menu-item title="Registros" icon="o-sparkles" link="{{ route('point.points-list')}}" />
                    {{-- <x-mary-menu-sub title="Settings" icon="o-cog-6-tooth">
                        <x-mary-menu-item title="Wifi" icon="o-wifi" link="####" />
                        <x-mary-menu-item title="Archives" icon="o-archive-box" link="####" />
                    </x-mary-menu-sub> --}}

                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                    <x-mary-menu-item title="Sair" icon="s-arrow-right-end-on-rectangle" href="{{ route('logout') }}"
                                @click.prevent="$root.submit();" />
                    </form>

                </x-mary-menu>
            </x-slot:sidebar>
     
            {{-- The `$slot` goes here --}}
            <x-slot:content>
                {{ $slot }}
            </x-slot:content>
        </x-mary-main>
     
        {{-- Toast --}}
        <x-mary-toast />
    </body>

</html>
