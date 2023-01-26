<x-layout>
    <x-slot name="header">
        {{ __('Formbuilder') }}
    </x-slot>

    <x-panel>

        <x-splade-formbuilder :for="$example" />

        @if($example2)
            <hr class="my-8" />

            <x-splade-formbuilder :for="$example2" />
        @endif

    </x-panel>
</x-layout>
