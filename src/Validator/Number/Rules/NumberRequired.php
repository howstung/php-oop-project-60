<?php

declare(strict_types=1);

namespace Hexlet\Validator\Number\Rules;

use Hexlet\Validator\Rules\AbstractRuleInterface;

class NumberRequired extends AbstractRuleInterface
{
    public function isValid(mixed $value = null): bool
    {
        return is_numeric($value);
    }
}
