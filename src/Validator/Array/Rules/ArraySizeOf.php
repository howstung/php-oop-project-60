<?php

declare(strict_types=1);

namespace Hexlet\Validator\Array\Rules;

use Hexlet\Validator\Rules\AbstractRuleInterface;

class ArraySizeOf extends AbstractRuleInterface
{
    public function isValid(mixed $value): bool
    {
        return count($value) === $this->rule;
    }
}
