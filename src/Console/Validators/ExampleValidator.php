<?php

namespace App\Console\Validators;

use App\Common\System\I_Validator;

class ExampleValidator implements I_Validator
{
    public function validate(array $fields): void
    {
        $value = $fields['value'] ?? null;

        if($value === null) {
            throw new \InvalidArgumentException('Invalid value data');
        }
    }
}