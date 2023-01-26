<?php

namespace App\Http\Controllers;

use App\Components\FormBuilder\Date;
use App\Components\FormBuilder\Datetime;
use App\Components\FormBuilder\Input;
use App\Components\FormBuilder\Password;
use App\Components\FormBuilder\Select;
use App\Components\FormBuilder\Submit;
use App\Components\FormBuilder\Text;
use App\Components\FormBuilder\Textarea;
use App\Forms\ExampleForm;
use App\Forms\FilesForm;
use App\Forms\ModelbindingForm;
use App\Forms\MultiForm;
use App\Forms\SpladeForm;
use App\Http\Requests\FilesFormRequest;
use App\Http\Requests\MultiFieldsFormRequest;
use App\Http\Requests\ExampleFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class FormbuilderController extends Controller
{
    public function basic()
    {
        return view('formbuilder', [
            'example' => SpladeForm::build()
                ->action(route('formbuilder.store'))
                ->method('POST')
                ->class('space-y-4')
                ->fields([
                    Input::make('inputText1')
                        ->label('Standard input text field')
                        ->help('Test help 1')
                        ->rules('required'), // Todo: these ->rules(...) are not working here (yet)

                    Password::make('inputPassword2')
                        ->label('Password field')
                        ->help('Test help 2')
                        ->rules('required', 'string', 'max:255'),

                    Textarea::make('testTextarea2')
                        ->label('Textarea (with autosize)')
                        ->autosize()
                        ->help('Test help 3')
                        ->rules(['required', 'string', 'max:10']),

                     Submit::make('submit')->label('Send'),
                ])
                ->data([
                    'inputText1' => 'Test value input text field 1',
                ]),
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());

//        $validated = $request->validate(...); // Todo: how do we get the rules here?
//
//        dd($validated);
    }

    public function formClass()
    {
//        dd(ExampleForm::rules());

        return view('formbuilder', [
            'example' => ExampleForm::build(), // Todo: refactor into `ExampleForm::class`
        ]);
    }

    public function storeWithFormRequest(ExampleFormRequest $request)
    {
        $validated = $request->validated();

        dd($validated);
    }

    public function multi()
    {
        return view('formbuilder', [
            'example' => MultiForm::build(),
        ]);
    }

    public function storeMulti(MultiFieldsFormRequest $request)
    {
        $validated = $request->validated();

        dd($validated);
    }

    public function files()
    {
//        dd(FilesForm::rules());

        return view('formbuilder', [
            'example' => FilesForm::build(),
        ]);
    }

    public function storeFiles(FilesFormRequest $request)
    {
        $validated = $request->validated();

        dd($validated);
    }

    public function model()
    {
        $post = new Post([
            'title' => 'Test post 1',
            'slug' => 'test-post-1',
            'body' => '<p>This is the posts body</b>',
            'publish_from' => now()->hour(12)->minute(30),
            'tags' => ['laravel', 'splade'],
        ]);

        return view('formbuilder', [
            'example' => SpladeForm::build()
                ->action(route('formbuilder.store-model'))
                ->method('POST')
                ->class('space-y-4')
                ->fields([
                    Datetime::make('publish_from')->label(__('Publish from')),
                    Text::make('title')->label(__('Title')),
                    Text::make('slug')->label(__('Slug')),
                    Textarea::make('body')->label(__('Body'))->autosize(),
                    Select::make('tags')->label(__('Tags'))->multiple()->choices()->options([
                        'laravel' => 'laravel',
                        'splade' => 'splade',
                        'test' => 'test',
                        'formbuilder' => 'formbuilder',
                        'options' => 'options',
                    ]),
                    Submit::make('submit')->label(__('Save')),
                ])
                ->data($post),

            'example2' => ModelbindingForm::build()->data($post),
        ]);
    }

    public function storeModel(Request $request)
    {
        dd($request->all());
    }
}
