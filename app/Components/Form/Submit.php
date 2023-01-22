<?php

namespace App\Components\Form;

use ProtoneMedia\Splade\Components\Form\Submit as SpladeSubmit;

class Submit extends Component
{
    public function render()
    {
        $object = new SpladeSubmit(label: $this->label, name: $this->name);

        $object->withAttributes($this->attributes);

        return $object->render()->with($object->data())->with(['slot' => '']);
    }
}
