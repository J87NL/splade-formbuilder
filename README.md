This is a (work in progress) proof of concept for a FilamentPHP-like formbuilder-approach for Splade.dev forms.

Todo:
- [x] Selects: https://splade.dev/docs/form-select
- [x] Multiple checkboxes-support (from an array): https://splade.dev/docs/form-checkbox
- [x] Multiple radios-support (from an array): https://splade.dev/docs/form-radio
- [ ] Files: https://splade.dev/docs/form-radio
- [x] Groups? https://splade.dev/docs/form-group
- [ ] Model-binding (instead of or besides `->data(...)`): https://splade.dev/docs/form-model-binding-attributes
- [x] Validation (`->rules('required', 'string', 'max:255')`) & show-errors https://splade.dev/docs/form-overview
- [ ] Validation for non SpladeForm-class requests
- [x] Placeholders, prepends, appends
- [x] Help-texts
- [x] Disabled / readonly / required
- [x] ->email() / ->password()
- [x] ->numeric() / ->integer() / ->step(2) / ->unsigned()
- [ ] ->decimals(2) ?
- [ ] ->url() ?
- [x] color picker
- [ ] Datepicker timezone?
- [ ] Relations
- [x] Refactor into SpladeForm-class (like SpladeTable)
- [ ] `ExampleForm::build()` =>  `ExampleForm::class`?
- [ ] `php artisan make:form` command
- [ ] Create pull request

___

## To see this poc in action: https://splade-formbuilder.j87.nl
Source/config: https://github.com/J87NL/splade-formbuilder/blob/main/app/Http/Controllers/FormbuilderController.php
