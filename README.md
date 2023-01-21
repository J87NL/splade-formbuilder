This is a (work in progress) proof of concept for a FilamentPHP-like formbuilder-approach for Splade.dev forms.

Todo:
- [x] Selects: https://splade.dev/docs/form-select
- [ ] Multiple checkboxes-support (from an array): https://splade.dev/docs/form-checkbox
- [ ] Multiple radios-support (from an array): https://splade.dev/docs/form-radio
- [ ] Files: https://splade.dev/docs/form-radio
- [ ] Groups? https://splade.dev/docs/form-group
- [ ] Model-binding (instead of or besides `->data(...)`): https://splade.dev/docs/form-model-binding-attributes
- [ ] Validation (`->rules('required', 'string', 'max:255')`) / show-errors? https://splade.dev/docs/form-overview
- [ ] Placeholders, prepends, appends
- [x] Help-texts
- [ ] Disabled / readonly / required
- [ ] ->email() / ->numeric() / ->integer() / ->decimals(2) / ->password() / ->url() ?
- [ ] color picker?
- [ ] Datepicker timezone?
- [ ] Relations
- [x] Refactor into SpladeForm-class (like SpladeTable)
- [ ] Create pull request

___

## To see this poc in action: https://splade-formbuilder.j87.nl/formbuilder
Source/config: https://github.com/J87NL/splade-formbuilder/blob/main/app/Http/Controllers/FormbuilderController.php
