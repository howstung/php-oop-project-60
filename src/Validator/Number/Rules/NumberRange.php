<?php

declare(strict_types=1);

namespace Hexlet\Validator\Number\Rules;

use Hexlet\Validator\Rules\AbstractRuleInterface;

class NumberRange extends AbstractRuleInterface
{
    public function __construct(
        protected readonly int $min,
        protected readonly int $max,
    ) {
        parent::__construct(null);
    }

    public function isValid(mixed $value): bool
    {
        return $value >= $this->min && $value <= $this->max;
    }
}
