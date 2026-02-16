<?php

namespace Framework;

use Valitron\Validator;

class Model
{
    protected array $fillable = [];
    public array $attributes = [];
    protected array $rules = [];
    public array $errors = [];

    public function __construct()
    {
        Validator::langDir(LANG.'/validator');
        Validator::lang(config['lang']);
    }

    public function loadData(array $data = []): void
    {
        if (!$data) {
            $data = request()->getData();
        }
        foreach ($this->fillable as $field) {
            if (isset($data[$field])) {
                $this->attributes[$field] = $data[$field];
            } else {
                $this->attributes[$field] = '';
            }
        }
    }

    public function validate($data = [], $rules = []): bool {
        if (!$data) {
            $data = $this->attributes;
        }
        if (!$rules) {
            $rules = $this->rules;
        }
        $validator = new Validator($data);
        $validator->rules($rules);
        if ($validator->validate()) {
            return true;
        }
        else {
            $this->errors = $validator->errors();
            return false;
        }
    }

    public function errors(): array {
        return $this->errors;
    }
}