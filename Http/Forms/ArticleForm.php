<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class ArticleForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if(!isset( $attributes['title'] )) {
            $this->errors['title'] = 'A title is required.';
        }elseif (!Validator::string($attributes['title'], max: 250)) {
            $this->errors['title'] = 'A title of no more than 250 characters.';
        }

        if(!isset( $attributes['content'] )) {
            $this->errors['content'] = 'A content is required.';
        }elseif (!Validator::string($attributes['content'], max: 250)) {
            $this->errors['content'] = 'A content of no more than 250 characters.';
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }
}