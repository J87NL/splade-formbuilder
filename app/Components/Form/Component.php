<?php

namespace App\Components\Form;

abstract class Component
{
    public string $name = '';
    public string $label = '';
    public array $attributes = [];
    public string $help = '';

    public function __construct($name)
    {
        $this->name = $name;
    }

    static function make(string $name)
    {
        return new static($name);
    }

    public function label(string $label)
    {
        $this->label = $label;

        return $this;
    }

    public function help(string $text)
    {
        $this->help = $text;

        return $this;
    }

    abstract public function render();
}
