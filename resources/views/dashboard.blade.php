<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex mb-4 px-4">
        @include('include.leftmenu')
        <div class="w-3/4 bg-gray-100 h-12 ml-4">
            <h1>
                Displaying forms
            </h1>
        </div>
    </div>
</x-app-layout>
