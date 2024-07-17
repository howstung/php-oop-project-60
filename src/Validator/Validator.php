<?php

declare(strict_types=1);

namespace Hexlet\Validator;

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

    /*    public function __call(string $name, array $arguments)
        {
            return match ($name) {
                'string' => new StringValidator(),
                'number' => new NumberValidator(),
                default => new Exception("Validator $name not exist")
            };
        }*/
}
