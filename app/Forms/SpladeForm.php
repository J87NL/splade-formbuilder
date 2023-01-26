<?php

namespace App\Forms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SpladeForm
{
    protected ?AbstractForm $configurator = null;
    protected Request $request;
    public array $data = [];
    public array $fields;
    public array|string $class = [];
    public string $action = '';
    public string $method = 'POST';

    public function __construct(array $fields, Request $request = null)
    {
        $this->request = $request ?: request();

        $this->fields = $fields;
    }

    public static function build(array $fields = []): static
    {
        return new static($fields);
    }

    public function setConfigurator(AbstractForm $configurator): self
    {
        $this->configurator = $configurator;

        return $this;
    }

    public function action(string $action)
    {
        $this->action = $action;

        return $this;
    }

    public function class(array|string $class)
    {
        $this->class = $class;

        return $this;
    }

    public function data(Model|array $data)
    {
        if ($data instanceof Model) {
            $data = $data->toArray();
        }

        $this->data = $data;

        return $this;
    }

    public function fields(array $fields)
    {
        $this->fields = $fields;

        return $this;
    }

    public function method(string $method)
    {
        $this->method = $method;

        return $this;
    }
}
