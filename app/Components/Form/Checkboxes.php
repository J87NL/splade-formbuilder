<?php

namespace App\Components\Form;

use ProtoneMedia\Splade\Components\Form\Checkboxes as SpladeCheckboxes;

class Checkboxes extends Component
{
    private array $options = [];
    private bool $inline = false;

    public function options(array $options = [])
    {
        $this->options = $options;

        return $this;
    }

    public function inline(bool $inline = true)
    {
        $this->inline = $inline;

        return $this;
    }

    public function render()
    {
        $object = new SpladeCheckboxes(
            name:    $this->name,
            options: $this->options,
            label:   $this->label,
            inline:  $this->inline,
            help:    $this->help
        );

        $object->withAttributes($this->attributes);

        return $object->render()->with($object->data())->with(['slot' => '']);
    }
}
