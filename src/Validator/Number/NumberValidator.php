<?php

declare(strict_types=1);

namespace Hexlet\Validator\Number;

use Hexlet\Validator\Number\Rules\NumberPositive;
use Hexlet\Validator\Number\Rules\NumberRange;
use Hexlet\Validator\Number\Rules\NumberRequired;
use Hexlet\Validator\Rules\AddValidatorTrait;
use Hexlet\Validator\RuleTrait;

class NumberValidator implements NumberValidatorInterface
{
    use RuleTrait;
    use AddValidatorTrait;

    public function required(): self
    {
        $this->addRule(new NumberRequired());
        return $this;
    }

    public function positive(): self
    {
        $this->addRule(new NumberPositive());
        return $this;
    }

    public function range(int $min, int $max): self
    {
        $this->addRule(new NumberRange($min, $max));
        return $this;
    }

    public function isValid(mixed $value): bool
    {
        $innerValid = $this->isValidCommon($value);

        return $innerValid && ((new NumberRequired())->isValid($value) || is_null($value));
    }
}
