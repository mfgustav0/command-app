<?php

namespace App\Common\System\Validator;

interface I_Validator
{
    public function validate(array $fields): void;
}