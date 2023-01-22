<?php

namespace App\Components\FormBuilder;

use ProtoneMedia\Splade\Components\Form\Checkbox as SpladeCheckbox;

class Checkbox extends Component
{
    private string $value;

    public function value(string $value = '')
    {
        $this->value = $value;

        return $this;
    }

    public function render()
    {
        $object = new SpladeCheckbox(
            name:  $this->name,
            value: $this->value ?? $this->label,
            label: $this->label,
            help: $this->help,
        );

        $object->withAttributes($this->attributes);

        return $object->render()->with($object->data())->with(['slot' => '']);
    }
}
