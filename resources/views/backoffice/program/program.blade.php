<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <livewire:grade-selection :programs="$programs" />
        </div>
    </div>
    
</x-app-layout>