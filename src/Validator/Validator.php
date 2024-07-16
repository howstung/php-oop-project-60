<?php

declare(strict_types=1);

namespace Hexlet\Validator;

use Hexlet\Validator\String\StringValidator;

class Validator
{
    public function string(): ValidatorInterface
    {
        return new StringValidator();
    }
}
