<?php

namespace App\Http\Controllers;

use App\Components\Form\Input;
use App\Components\Form\Password;
use App\Components\Form\Submit;
use App\Components\Form\Textarea;
use App\Forms\ExampleForm;
use Illuminate\Http\Request;

class FormbuilderController extends Controller
{
    public function basic()
    {
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
    }
    public function formClass()
    {
        return view('formbuilder', [
            'example' => ExampleForm::build(), // Todo: refactor into `ExampleForm::class`
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
