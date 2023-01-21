<x-layout>
    <x-slot name="header">
        {{ __('Home') }}
    </x-slot>

    <x-panel class="flex flex-col items-center pt-16 pb-16">
        <x-application-logo class="block h-12 w-auto" />

        <div class="mt-8 text-2xl">
            Welcome to the Splade-FormBuilder demo.
        </div>

        <div class="mt-8">
            Easily create Splade-forms using PHP like this (click the menu to see in action):<br />
            <br />
            <pre>
            &lt;?php

            return view('formbuilder', [
                'example' => ExampleForm::build()
                    ->action(route('formbuilder.store'))
                    ->method('POST')
                    ->class('space-y-4')
                    ->fields([
                        Input::make('inputText1')
                            ->label('Standard input text field')
                            ->help('Test help 1'),

                        Password::make('inputPassword2')
                            ->label('Password field')
                            ->help('Test help 2'),

                        Textarea::make('testTextarea2')
                            ->label('Textarea (with autosize)')
                            ->autosize()
                            ->help('Test help 3'),

                         Submit::make('submit')->label('Send'),
                    ])
                    ->data([
                        'inputText1' => 'Test value input text field 1',
                    ]),
            ]);
            </pre>
        </div>
    </x-panel>
</x-layout>
