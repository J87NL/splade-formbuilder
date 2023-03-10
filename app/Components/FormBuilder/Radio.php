<?php

namespace App\Components\FormBuilder;

use ProtoneMedia\Splade\Components\Form\Radio as SpladeRadio;

class Radio extends Component
{
    private string $value;

    public function value(string $value = '')
    {
        $this->value = $value;

        return $this;
    }

    public function render()
    {
        $object = new SpladeRadio(
            name:  $this->name,
            value: $this->value ?? $this->label,
            label: $this->label,
            help: $this->help
        );

        $object->withAttributes($this->attributes);

        return $object->render()->with($object->data())->with(['slot' => '']);
    }
}
