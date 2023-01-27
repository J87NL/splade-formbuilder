This is a (work in progress) proof of concept for a FilamentPHP-like formbuilder-approach for Splade.dev forms.

Todo:
- [x] Selects: https://splade.dev/docs/form-select
- [x] Multiple checkboxes-support (from an array): https://splade.dev/docs/form-checkbox
- [x] Multiple radios-support (from an array): https://splade.dev/docs/form-radio
- [x] Files: https://splade.dev/docs/form-radio
  - [x] File-validation
- [x] Groups? https://splade.dev/docs/form-group
- [x] Validation (`->rules('required', 'string', 'max:255')`) & show-errors https://splade.dev/docs/form-overview
- [x] Placeholders, prepends, appends
- [x] Help-texts
- [x] Disabled / readonly / required
- [x] ->email() / ->password()
- [x] ->numeric() / ->integer() / ->step(2) / ->unsigned()
- [x] Refactor into SpladeForm-class (like SpladeTable)
- [x] color picker
- [x] Model-binding: https://splade.dev/docs/form-model-binding-attributes
- [ ] `ExampleForm::build()` => `ExampleForm::class`?
- [x] `php artisan make:form` command
  - [x] make:form-request and make:form -r
- [ ] Validation for non SpladeForm-class requests
- [ ] Tests
- [ ] Documentation
- [ ] Create pull request

Maybe later:
- [ ] ->decimals(2) ?
- [ ] ->url() ?
- [ ] Datepicker timezone?

___

## To see this poc in action: https://splade-formbuilder.j87.nl
Source/config: https://github.com/J87NL/splade-formbuilder/blob/main/app/Http/Controllers/FormbuilderController.php
