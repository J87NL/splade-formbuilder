<?php

namespace App\Http\Controllers;

use App\Components\Form\Checkbox;
use App\Components\Form\Input;
use App\Components\Form\Submit;
use App\Components\Form\Textarea;
use Illuminate\Http\Request;

class FormbuilderController extends Controller
{
    public function index()
    {
        $fields = [
            Input::make('testInputText')->setLabel('Input text field'),
            Input::make('testInputNumber')->setLabel('Input number field')->setType('number'),
            Input::make('testInputEmail')->setLabel('Input email field')->setType('email'),
//            Input::make('testInputDate')->setLabel('Input date field')->setType('date'), // Not working yet
            Input::make('testInputTime')->setLabel('Input time field')->setType('time'),

            Textarea::make('testTextarea')->setLabel('Textarea'),

            Checkbox::make('testCheckbox[]')->setLabel('Checkbox 1'),
            Checkbox::make('testCheckbox[]')->setLabel('Checkbox 2'),

            Submit::make('submit')->setLabel('Verstuur'),
        ];

        return view('formbuilder', [
            'action' => route('formbuilder.store'),
            'fields' => $fields,
            'class' => 'space-y-4',
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
