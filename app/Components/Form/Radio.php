<?php

namespace App\Components\Form;

use ProtoneMedia\Splade\Components\Form\Radio as SpladeRadio;

class Radio extends Component
{
    public string $value;

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
            label: $this->label
        );

        return $object->render()->with($object->data())->with(['slot' => '']);
    }
}
