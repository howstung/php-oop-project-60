<?php

declare(strict_types=1);

namespace Hexlet\Validator\String\Rules;

use Hexlet\Validator\Rules\AbstractRuleInterface;

class StringRequired extends AbstractRuleInterface
{
    public function isValid(mixed $value = null): bool
    {
        return is_string($value) && $value != '';
    }
}
