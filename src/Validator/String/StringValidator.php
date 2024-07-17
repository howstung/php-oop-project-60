<?php

declare(strict_types=1);

namespace Hexlet\Validator\String;

use Hexlet\Validator\Rules\AddValidatorTrait;
use Hexlet\Validator\RuleTrait;
use Hexlet\Validator\String\Rules\StringContains;
use Hexlet\Validator\String\Rules\StringMinLength;
use Hexlet\Validator\String\Rules\StringRequired;

class StringValidator implements StringValidatorInterface
{
    use RuleTrait;
    use AddValidatorTrait;

    public function required(): self
    {
        $this->addRule(new StringRequired());
        return $this;
    }

    public function minLength(int $min): self
    {
        $this->addRule(new StringMinLength($min));
        return $this;
    }

    public function contains(string $value): self
    {
        $this->addRule(new StringContains($value));
        return $this;
    }

    public function isValid(mixed $value = null): bool
    {
        $innerValid = $this->isValidCommon($value);

        return $innerValid && (is_string($value) || is_null($value));
    }
}
