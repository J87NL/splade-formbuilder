<?php

namespace App\Forms;

use App\Components\Form\Checkboxes;
use App\Components\Form\Radios;
use App\Components\Form\Submit;

class MultiForm extends AbstractForm
{
    public function configure(SpladeForm $form)
    {
        $form
            ->action(route('formbuilder.store-multi'))
            ->method('POST')
            ->class('space-y-4')
            ->data([
                'testMultiCheckbox1' => '2',
                'testMultiCheckbox2' => ['opt-2', 'opt-3'],
                'testMultiRadio1' => 'light',
            ]);
    }

    public function fields(): array
    {
        return [
            Checkboxes::make('testMultiCheckbox1')
                ->label('MultiCheckbox 1')
                ->options([
                    'Option 1',
                    'Option 2',
                    'Option 3',
                ]),

            Checkboxes::make('testMultiCheckbox2')
                ->label('MultiCheckbox 2 (inline)')
                ->options([
                    'opt-1' => 'Option 1',
                    'opt-2' => 'Option 2',
                    'opt-3' => 'Option 3',
                ])
                ->inline(),

            Radios::make('testMultiRadio1')
                ->label('Choose a theme')
                ->options([
                    'dark' => 'Dark theme',
                    'light' => 'Light theme',
                    'system' => 'System theme',
                ]),

            Radios::make('testMultiRadio2')
                ->label('MultiRadio inline')
                ->options([
                    'option-1' => 'Option 1',
                    'option-2' => 'Option 2',
                    'option-3' => 'Option 3',
                ])
                ->inline(),

            Submit::make('submit')->label('Send'),
        ];
    }
}
