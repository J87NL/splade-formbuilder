<x-layout>
    <x-slot name="header">
        {{ __('Formbuilder') }}
    </x-slot>

    <x-panel>

        <x-splade-formbuilder :action="$action" :fields="$fields" @class($class ?? []) />

    </x-panel>
</x-layout>
