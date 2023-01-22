<?php

namespace App\Forms;

use Illuminate\Support\Arr;

abstract class AbstractForm
{
    private ?SpladeForm $form = null;

    public function fields()
    {
        return [];
    }

    public static function build(...$arguments): SpladeForm
    {
        $form = new static(...$arguments);

        return $form->make();
    }

    public function make(): SpladeForm
    {
        if ($this->form) {
            return $this->form;
        }

        return $this->form = tap(
            SpladeForm::build($this->fields()),
            function (SpladeForm $form) {
                $form->setConfigurator($this);
                $this->configure($form);
            }
        );
    }

    public function configure(SpladeForm $form)
    {
        //
    }

    public static function rules()
    {
        $form = self::build();

        return Arr::pluck($form->fields, 'rules', 'basename');
    }
}
