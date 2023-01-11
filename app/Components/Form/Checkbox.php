<?php

namespace App\Components\Form;

use \ProtoneMedia\Splade\Components\Form\Checkbox as SpladeCheckbox;

class Checkbox extends Component
{
    public function render()
    {
        $object = new SpladeCheckbox(name: $this->name, label: $this->label);

        return $object->render()->with($object->data())->with(['slot' => '']);
    }
}
