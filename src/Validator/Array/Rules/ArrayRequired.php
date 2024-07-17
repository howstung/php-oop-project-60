<?php

declare(strict_types=1);

namespace Hexlet\Validator\Array\Rules;

use Hexlet\Validator\Rules\AbstractRuleInterface;

class ArrayRequired extends AbstractRuleInterface
{
    public function isValid(mixed $value): bool
    {
        return is_array($value);
    }
}
