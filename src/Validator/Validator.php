<?php

declare(strict_types=1);

namespace Hexlet\Validator;

use Hexlet\Validator\Array\ArrayValidator;
use Hexlet\Validator\Number\NumberValidator;
use Hexlet\Validator\String\StringValidator;

class Validator
{
    private array $customValidators = [];

    private function getValidatorsByType(string $type)
    {
        return array_key_exists($type, $this->customValidators) ? $this->customValidators[$type] : [];
    }

    public function string(): ValidatorInterface
    {
        $validator = new StringValidator();
        $validator->setCustomValidators($this->getValidatorsByType('string'));

        return $validator;
    }

    public function number(): ValidatorInterface
    {
        $validator = new NumberValidator();
        $validator->setCustomValidators($this->getValidatorsByType('number'));

        return $validator;
    }

    public function array(): ValidatorInterface
    {
        return new ArrayValidator();
    }

    public function addValidator(string $type, string $name, callable $callback): void
    {
        $this->customValidators[$type][$name] = $callback;
    }
}
