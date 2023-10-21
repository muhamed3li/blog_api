<?php

namespace Core;

class ValidationException extends \Exception
{
    public readonly array $errors;
    public readonly array $old;

    public static function throw($errors, $old)
    {
        $instance = new static(json_encode($errors), 422);

        $instance->errors = $errors;
        $instance->old = $old;

        throw $instance;
    }
}