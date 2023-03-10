<?php

namespace App\Components\FormBuilder;

use ProtoneMedia\Splade\Components\Form\Input as SpladeInput;

class Input extends Component
{
    private array|bool $date = false;
    private array|bool $time = false;
    private bool $range = false;
    private string $append = '';
    private string $prepend = '';
    protected string $type = 'text';

    public function type(string $type = 'text')
    {
        $this->type = $type;

        if (in_array($type, ['date', 'time'])) {
            $this->{$type} = true;
        }

        return $this;
    }

    public function minLength(int $value)
    {
        $this->attributes['minlength'] = $value;

        return $this;
    }

    public function maxLength(int $value)
    {
        $this->attributes['maxlength'] = $value;

        return $this;
    }

    public function length(int $value)
    {
        $this->minLength($value)->maxLength($value);

        return $this;
    }

    public function minValue(int $value)
    {
        $this->attributes['min'] = $value;

        return $this;
    }

    public function maxValue(int $value)
    {
        $this->attributes['max'] = $value;

        return $this;
    }

    public function unsigned()
    {
        $this->minValue(0);

        return $this;
    }

    public function step($step = 1)
    {
        $this->attributes['step'] = $step;

        return $this;
    }

    public function date(array|bool $options = true)
    {
        $this->date = $options;

        return $this;
    }

    public function time(array|bool $options = true)
    {
        $this->time = $options;

        return $this;
    }

    public function range()
    {
        $this->range = true;

        return $this;
    }

    public function hidden()
    {
        $this->type = 'hidden';

        return $this;
    }

    public function email()
    {
        $this->type = 'email';

        return $this;
    }

    public function password()
    {
        $this->type = 'password';

        return $this;
    }

    public function integer()
    {
        $this->type = 'number';

        return $this;
    }

    public function number()
    {
        $this->type = 'number';

        return $this;
    }

    public function numeric()
    {
        $this->type = 'number';

        return $this;
    }

    public function color()
    {
        $this->type = 'color';

        return $this;
    }

    public function append(string $text)
    {
        $this->append = $text;

        return $this;
    }

    public function prepend(string $text)
    {
        $this->prepend = $text;

        return $this;
    }

    public function render()
    {
        $object = new SpladeInput(
            name:    $this->name,
            type:    $this->type,
            label:   $this->label,
            date:    $this->date || $this->type === 'date',
            time:    $this->time || $this->type === 'time',
            range:   $this->range,
            prepend: $this->prepend,
            append:  $this->append,
            help:    $this->help
        );

        if ($this->date || $this->time) {
            $object->defaultFlatpickr($this->{$this->type});
        }

        $object->withAttributes($this->attributes);

        return $object->render()->with($object->data());
    }
}
