<?php

namespace app\core;

use app\lib\Validator;

abstract class Controller extends Validator
{
    public Model $model;

    public function __construct()
    {
        $this->setModal();
    }

    public function setModal()
    {
        $model = str_replace("controllers", "models", static::class);
        $this->model = new $model();
    }
}