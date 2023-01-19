<?php

namespace App\Components\Form;

use ProtoneMedia\Splade\Components\Form\Checkbox as SpladeCheckbox;

class Checkbox extends Component
{
    public string $value;

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

        return $object->render()->with($object->data())->with(['slot' => '']);
    }
}
