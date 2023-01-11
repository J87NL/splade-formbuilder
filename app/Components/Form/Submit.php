<?php

namespace App\Components\Form;

use ProtoneMedia\Splade\Components\Form\Submit as SpladeSubmit;

class Submit extends Component
{
    public function render()
    {
        $object = new SpladeSubmit(name: $this->name, label: $this->label);

        return $object->render()->with($object->data())->with(['slot' => '']);
    }
}
