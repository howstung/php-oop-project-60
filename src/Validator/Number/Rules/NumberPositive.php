<?php

declare(strict_types=1);

namespace Hexlet\Validator\Number\Rules;

use Hexlet\Validator\Rules\AbstractRuleInterface;

class NumberPositive extends AbstractRuleInterface
{
    public function isValid(mixed $value): bool
    {
        return $value >= 0;
    }
}
