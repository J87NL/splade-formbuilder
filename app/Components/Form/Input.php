<?php

namespace App\Components\Form;

use \ProtoneMedia\Splade\Components\Form\Input as SpladeInput;

class Input extends Component
{
    public string $type = 'text';

    public function setType(string $type = 'text')
    {
        $this->type = $type;

        return $this;
    }

    public function render()
    {
        $object = new SpladeInput(
            name: $this->name,
            type: $this->type,
            label: $this->label
        );

        if (in_array($this->type, ['date', 'time'])) {
            $object->defaultFlatpickr(true);
        }

        return $object->render()->with($object->data());
    }
}
