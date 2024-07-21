<?php

declare(strict_types=1);

namespace Hexlet\Validator\Array;

use Hexlet\Validator\Array\Rules\ArrayRequired;
use Hexlet\Validator\Array\Rules\ArrayShape;
use Hexlet\Validator\Array\Rules\ArraySizeOf;
use Hexlet\Validator\RuleTrait;

class ArrayValidator implements ArrayValidatorInterface
{
    use RuleTrait;

    public function required(): self
    {
        $this->addRule(new ArrayRequired());
        return $this;
    }

    public function sizeof(int $size): self
    {
        $this->addRule(new ArraySizeOf($size));
        return $this;
    }

    public function shape(array $rules): self
    {
        $this->addRule(new ArrayShape($rules));
        return $this;
    }

    public function isValid(mixed $value): bool
    {
        $innerValid = $this->isValidCommon($value);
        return $innerValid && (is_array($value) || is_null($value));
    }
}
