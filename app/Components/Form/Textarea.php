<?php

namespace App\Components\Form;

use ProtoneMedia\Splade\Components\Form\Textarea as SpladeTextarea;

class Textarea extends Component
{

    public function autosize(bool $autosize = true)
    {
        $this->attributes['autosize'] = $autosize;

        return $this;
    }

    public function render()
    {
        $object = new SpladeTextarea(
            name: $this->name,
            label: $this->label,
            help: $this->help
        );

        $object->withAttributes($this->attributes);

        return $object->render()->with($object->data());
    }
}
