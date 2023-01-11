<?php

namespace App\Components\Form;

abstract class Component
{
    public string $name = '';
    public string $label = '';

    public function __construct($name)
    {
        $this->name = $name;
    }

    static function make(string $name)
    {
        return new static($name);
    }

    public function setLabel(string $label)
    {
        $this->label = $label;

        return $this;
    }

    abstract public function render();
}
