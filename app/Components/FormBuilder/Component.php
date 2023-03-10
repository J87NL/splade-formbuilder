<?php

namespace App\Components\FormBuilder;

use Illuminate\Support\Arr;
use ProtoneMedia\Splade\Components\Form\InteractsWithFormElement;

abstract class Component
{
    use InteractsWithFormElement;

    public string $basename = '';
    protected string $name = '';
    protected string $label = '';
    protected array $attributes = [];
    protected string $help = '';
    public array|string $rules = ['nullable'];

    public function __construct($name)
    {
        $this->name = $name;
        $this->basename = static::dottedName($name);
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

    public function placeholder(string $placeholder = '')
    {
        $this->attributes['placeholder'] = $placeholder;

        return $this;
    }

    public function disabled(bool $disabled = true)
    {
        if ($disabled) {
            $this->attributes['disabled'] = 'disabled';
        }

        return $this;
    }

    public function readonly(bool $readonly = true)
    {
        if ($readonly) {
            $this->attributes['readonly'] = 'readonly';
        }

        return $this;
    }

    public function required(bool $required = true)
    {
        if ($required) {
            $this->rules[] = 'required';
        }

        return $this;
    }

    /**
     * Adds one or more validation rules to an input field
     *
     * @param mixed ...$rules One or more rules, may be an array of strings or multiple strings
     *
     * @return $this
     */
    function rules(...$rules)
    {
        $rules = Arr::flatten($rules);

        $this->rules = collect($rules)->map(function($item) {
            if (!is_string($item)) {
                return $item;
            }
            return explode('|', $item);
        })->flatten()->toArray();

        return $this;
    }

    abstract public function render();
}
