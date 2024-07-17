<?php

declare(strict_types=1);

namespace Hexlet\Validator;

use Hexlet\Validator\Array\ArrayValidator;
use Hexlet\Validator\Number\NumberValidator;
use Hexlet\Validator\String\StringValidator;

class Validator
{
    public function string(): ValidatorInterface
    {
        return new StringValidator();
    }

    public function number(): ValidatorInterface
    {
        return new NumberValidator();
    }

    public function array(): ValidatorInterface
    {
        return new ArrayValidator();
    }
}
