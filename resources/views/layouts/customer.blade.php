<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-partials.head/>
    </head>
    <body>

        
        <x-partials.nav/>
        
        <x-ui.alert/>

        <div class="leading-normal tracking-normal text-white gradient font-sans text-gray-900 antialiased mt-16">
            <div class="h-full">
                {{ $slot }}
            </div>
        </div>

        <footer>
            <x-partials.footer/>
        </footer>

        @livewireScripts
    </body>
</html>