<?php

declare(strict_types=1);

namespace Hexlet\Validator\String\Rules;

use Hexlet\Validator\Rules\AbstractRuleInterface;

class StringMinLength extends AbstractRuleInterface
{
    public function isValid(mixed $value): bool
    {
        return strlen($value) >= $this->rule;
    }
}
