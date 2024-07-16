<?php

declare(strict_types=1);

namespace Hexlet\Validator\String\Rules;

use Hexlet\Validator\Rules\AbstractRuleInterface;

class StringContains extends AbstractRuleInterface
{
    public function isValid(mixed $value): bool
    {
        return str_contains($value, $this->rule);
    }
}
