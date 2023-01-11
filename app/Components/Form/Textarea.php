<?php

namespace App\Components\Form;

use \ProtoneMedia\Splade\Components\Form\Textarea as SpladeTextarea;

class Textarea extends Component
{
    public function render()
    {
        $object = new SpladeTextarea(name: $this->name, label: $this->label);

        return $object->render()->with($object->data());
    }
}
