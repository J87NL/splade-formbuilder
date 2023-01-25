<?php

namespace App\Forms;

use App\Components\FormBuilder\File;
use App\Components\FormBuilder\Submit;
use Illuminate\Validation\Rules\File as FileRule;

class FilesForm extends AbstractForm
{
    public function configure(SpladeForm $form)
    {
        $form
            ->action(route('formbuilder.store-files'))
            ->method('POST')
            ->class('space-y-4')
            ->data([
                //
            ]);
    }

    public function fields(): array
    {
        return [
            File::make('testFile1')
                ->label('File field 1')
                ->help('Help text'),

            File::make('testFile2')
                ->label('File field with placeholder')
                ->placeholder('Placeholder...'),

            File::make('testFile3')
                ->label('File field with ->multiple()')
                ->multiple(),

            File::make('testFile4')
                ->label('File field with ->filepond()')
                ->filepond(),

            File::make('testFile5')
                ->label('File field with ->filepond() and ->server()')
                ->filepond()
                ->server(),

            File::make('testFile6')
                ->label('File field with ->filepond() and ->preview()')
                ->filepond()
                ->preview(),

            File::make('testFile7')
                ->label('File field with ->filepond(), ->preview() and ->multiple()')
                ->filepond()
                ->preview()
                ->multiple(),

            File::make('testFile8')
                ->label('File field with ->accept(image/png)')
                ->accept('image/png'),

            File::make('testFile9')
                ->label('File field with ->accept([image/png, image/jpeg])')
                ->accept(['image/png', 'image/jpeg']),

            File::make('testFile10')
                ->label('File field with ->minSize(1Mb)')
                ->filepond()
                ->minSize('1Mb'),

            File::make('testFile11')
                ->label('File field with ->maxSize(1Mb)')
                ->filepond()
                ->maxSize('1Mb'),

            File::make('testFile12')
                ->label('File field with ->width(120)')
                ->filepond()
                ->width(120),

            File::make('testFile13')
                ->label('File field with ->height(120)')
                ->filepond()
                ->height(120),

            File::make('testFile14')
                ->label('File field with ->minWidth(150) and ->maxWidth(500)')
                ->filepond()
                ->minWidth(150)
                ->maxWidth(500),

            File::make('testFile14')
                ->label('File field with ->minHeight(150) and ->maxHeight(500)')
                ->filepond()
                ->minHeight(150)
                ->maxHeight(500),

            File::make('testFile14')
                ->label('File field with ->minHeight(150), ->maxHeight(500), ->minHeight(150) and ->maxHeight(500)')
                ->filepond()
                ->minWidth(150)
                ->maxWidth(500)
                ->minHeight(150)
                ->maxHeight(500),

            File::make('testFile15')
                ->label('File field with ->minResolution(5000) and ->maxResolution(9999999)')
                ->filepond()
                ->minResolution(150)
                ->maxResolution(9999999),

            File::make('testFile16')
                ->label('File field with ->rules()')
                ->rules(['required']),

            File::make('testFile17')
                ->label('File field with Laravel Rule validation')
                ->rules([
                    'required',
                    FileRule::image()
                        ->min(1024)
                        ->max(12 * 1024)
                ]),

            Submit::make('submit')->label('Send'),
        ];
    }
}
