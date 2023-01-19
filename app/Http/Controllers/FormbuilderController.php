<?php

namespace App\Http\Controllers;

use App\Components\Form\Checkbox;
use App\Components\Form\Date;
use App\Components\Form\Email;
use App\Components\Form\Hidden;
use App\Components\Form\Input;
use App\Components\Form\Number;
use App\Components\Form\Password;
use App\Components\Form\Radio;
use App\Components\Form\Select;
use App\Components\Form\Submit;
use App\Components\Form\Text;
use App\Components\Form\Textarea;
use App\Components\Form\Time;
use Illuminate\Http\Request;

class FormbuilderController extends Controller
{
    public function index()
    {
        $fields = [
            Input::make('hiddenInput1')
                ->label('This label is never shown')
                ->type('hidden'),

            Hidden::make('hiddenInput2')
                ->label('Hidden field using Hidden::make()'),

            Input::make('hiddenInput3')
                ->label('Hidden Input using ->hidden()')
                ->hidden(),

            Input::make('inputText1')
                ->label('Standard input text field')
                ->help('Test help 1'),

            Input::make('inputText2')
                ->label('Input text field (minlength: 2, maxlength: 255)')
                ->minLength(2)
                ->maxLength(255),

            Input::make('inputText3')
                ->label('Input text field with fixed length(6)')
                ->length(6),

            Input::make('inputNumber')
                ->label('Input number field (min 1, max 100)')
                ->type('number')
//                ->numeric()
                ->minValue(1)
                ->maxValue(100),

            Number::make('testNumberInput')
                ->label('Or as Number-alias field'),

            Input::make('inputEmail1')
                ->label('Input email field')
                ->type('email'),

            Email::make('inputEmail2')
                ->label('Email field'),

            Input::make('inputPassword1')
                ->label('Input password field')
                ->type('password'),

            Password::make('inputPassword2')
                ->label('Password field'),

            Input::make('inputDate1')
                ->label('Input date field')
                ->type('date'),

            Input::make('inputDate2')
                ->label('Input date time field')
                ->type('date')
                ->time(),

            Input::make('inputDate3')
                ->label('Input date range field')
                ->type('date')
                ->range(),

            Date::make('inputDate4')
                ->label('Input type: date - with extra FlatPicker date-options: { showMonths: 2 }')
                ->date(['showMonths' => 2]),

            Date::make('inputDate5')
                ->label('Input type: date with time')
                ->time(),

            Date::make('inputDate6')
                ->label('Input type: date with range')
                ->range()
                ->help('Test help 2'),

            Input::make('inputTime1')
                ->label('Input time field - with extra FlatPicker time-options: { time_24hr: false }')
                ->type('time')
                ->time(['time_24hr' => false]),

            Time::make('inputTime2')
                ->label('Input type: time'),

            Text::make('textField')
                ->label('Text-input (Input-alias)'),

            Textarea::make('testTextarea1')
                ->label('Textarea'),

            Textarea::make('testTextarea2')
                ->label('Textarea (with autosize)')
                ->autosize()
                ->help('Test help 3'),

            Checkbox::make('testCheckbox[]')->label('Checkbox 1')->value('checkbox-1'),
            Checkbox::make('testCheckbox[]')->label('Checkbox 2')->value('checkbox-2')->help('Test help 4'),

            Radio::make('testRadio')->label('Radio 1')->value('radio-1'),
            Radio::make('testRadio')->label('Radio 2')->value('radio-2'),
            Radio::make('testRadio')->label('Radio 3')->value('radio-3')->help('Test help 5'),

            Select::make('testSelect')
                ->label('Choose a country')
                ->placeholder('Placeholder...')
                ->options([
                    'be' => 'Belgium',
                    'de' => 'Germany',
                    'fr' => 'France',
                    'lu' => 'Luxembourg',
                    'nl' => 'The Netherlands',
                ]),

            Select::make('testSelectWithoutChoices')
                ->label('Choose a country - choices(false)')
                ->placeholder('Placeholder...')
                ->options([
                    'be' => 'Belgium',
                    'de' => 'Germany',
                    'fr' => 'France',
                    'lu' => 'Luxembourg',
                    'nl' => 'The Netherlands',
                ])
                ->choices(false),

            Select::make('testSelectMultiple[]')
                ->label('Choose multiple countries')
                ->placeholder('Placeholder...')
                ->options([
                    'be' => 'Belgium',
                    'de' => 'Germany',
                    'fr' => 'France',
                    'lu' => 'Luxembourg',
                    'nl' => 'The Netherlands',
                ])
                ->multiple(),

            Select::make('testSelectMultipleWithExtraChoicesOptions[]')
                ->label('Choose multiple countries - with extra Choices.js-options: { searchEnabled: false }')
                ->placeholder('Placeholder...')
                ->options([
                              'be' => 'Belgium',
                              'de' => 'Germany',
                              'fr' => 'France',
                              'lu' => 'Luxembourg',
                              'nl' => 'The Netherlands',
                          ])
                ->multiple()
                ->choices(['searchEnabled' => false ]),

            Select::make('testSelectMultipleWithoutChoices[]')
                ->label('Choose multiple countries - choices(false)')
                ->placeholder('Placeholder...')
                ->options([
                    'be' => 'Belgium',
                    'de' => 'Germany',
                    'fr' => 'France',
                    'lu' => 'Luxembourg',
                    'nl' => 'The Netherlands',
                ])
                ->multiple()
                ->choices(false),

            Select::make('fromRemoteUrl')
                ->label('Select with data from a remote URL')
                ->remoteUrl('/api/users1')
                ->choices(false),

            Select::make('fromRemoteUrlWithRemoteRoot')
                ->label('Select with data from a remote URL with a remote root')
                ->remoteUrl('/api/users2')
                ->remoteRoute('data.users')
                ->optionLabel('name')
                ->optionValue('id')
                ->choices(false),

            Select::make('withOptionLabelAndValue')
                ->label('Select with Option Label and Value')
                ->options([
                    ['id' => 10, 'name' => 'Pascal'],
                    ['id' => 20, 'name' => 'Johan'],
                    ['id' => 30, 'name' => 'Olaf'],
                    ['id' => 40, 'name' => 'Kristof'],
                ])
                ->optionLabel('name')
                ->optionValue('id')
                ->choices(false)
                ->help('Test help 6'),

            Submit::make('submit')->label('Verstuur'),
        ];

        $data = [
            'hiddenInput1' => 'Test value hidden input 1',
            'hiddenInput2' => 'Test value hidden input 2',
            'inputText1' => 'Test value input text field 1',
        ];

        return view('formbuilder', [
            'action' => route('formbuilder.store'),
            'fields' => $fields,
            'data' => $data,
            'class' => 'space-y-4',
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
