<?php

namespace Framework;

use Valitron\Validator;

class Model
{
    protected array $fillable = [];
    public array $attributes = [];
    protected array $rules = [];
    public array $errors = [];
    protected array $labels = [];

    public function __construct()
    {
        Validator::langDir(LANG . '/validator');
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

    public function validate($data = [], $rules = [], $labels = []): bool
    {
        $data = $data ?: $this->attributes;
        $rules = $rules ?: $this->rules;
        $labels = $labels ?: $this->labels;
        $validator = new Validator($data);
        $validator->rules($rules);
        $validator->labels($labels);
        if ($validator->validate()) {
            return true;
        } else {
            $this->errors = $validator->errors();
            return false;
        }
    }

    public function errors(): array
    {
        return $this->errors;
    }
}