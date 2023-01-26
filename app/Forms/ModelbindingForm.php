<?php

namespace App\Forms;

use App\Components\FormBuilder\Datetime;
use App\Components\FormBuilder\Select;
use App\Components\FormBuilder\Submit;
use App\Components\FormBuilder\Text;
use App\Components\FormBuilder\Textarea;

class ModelbindingForm extends AbstractForm
{
    public function configure(SpladeForm $form)
    {
        $form
            ->action(route('formbuilder.store-model'))
            ->method('POST')
            ->class('space-y-4');
    }

    public function fields(): array
    {
        return [
            Datetime::make('publish_from')
                ->label(__('Publish from')),

            Text::make('title')
                ->label(__('Title')),

            Text::make('slug')
                ->label(__('Slug')),

            Textarea::make('body')
                ->label(__('Body'))
                ->autosize(),

            Select::make('tags')
                ->label(__('Tags'))
                ->multiple()
                ->choices()
                ->options([
                    'laravel' => 'laravel',
                    'splade' => 'splade',
                    'test' => 'test',
                    'formbuilder' => 'formbuilder',
                    'options' => 'options',
                ]),

            Submit::make('submit')->label(__('Save')),
        ];
    }
}
