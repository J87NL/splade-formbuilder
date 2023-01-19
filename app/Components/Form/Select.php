<?php

namespace App\Components\Form;

use ProtoneMedia\Splade\Components\Form\Select as SpladeSelect;

class Select extends Component
{
    private string $value;
    private array $options = [];
    private string $placeholder = '';
    private bool $multiple = false;
    private array|bool $choices = true;
    private string $remoteUrl = '';
    private string $remoteRoute = '';
    private $optionLabel = '';
    private $optionValue = '';

    public function options(array $options = [])
    {
        $this->options = $options;

        return $this;
    }
    public function placeholder(string $placeholder = '')
    {
        $this->placeholder = $placeholder;

        return $this;
    }
    public function multiple(bool $multiple = true)
    {
        $this->multiple = $multiple;

        return $this;
    }
    public function choices(array|bool $choices = true)
    {
        $this->choices = $choices;

        return $this;
    }
    public function remoteUrl(string $remoteUrl = '')
    {
        $this->remoteUrl = $remoteUrl;

        return $this;
    }
    public function remoteRoute(string $remoteRoute = '')
    {
        $this->remoteRoute = $remoteRoute;

        return $this;
    }

    public function optionLabel(string $optionLabel = '')
    {
        $this->optionLabel = $optionLabel;

        return $this;
    }

    public function optionValue(string $optionValue = '')
    {
        $this->optionValue = $optionValue;

        return $this;
    }

    public function render()
    {
        $object = new SpladeSelect(
            name:        $this->name,
            options:     $this->options,
            label:       $this->label,
            placeholder: $this->placeholder ?? '',
            multiple:    $this->multiple,
            choices:     $this->choices,
            help:        $this->help,
            remoteUrl:   $this->remoteUrl,
            remoteRoot:  $this->remoteRoute,
            optionValue: $this->optionValue,
            optionLabel: $this->optionLabel
        );

        $object->withAttributes($this->attributes);

        return $object->render()->with($object->data())->with(['slot' => '']);
    }
}
