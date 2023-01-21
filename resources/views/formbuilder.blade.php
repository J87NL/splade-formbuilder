<x-layout>
    <x-slot name="header">
        {{ __('Formbuilder') }}
    </x-slot>

    <x-panel>

        <x-splade-formbuilder :for="$example" />

    </x-panel>
</x-layout>
