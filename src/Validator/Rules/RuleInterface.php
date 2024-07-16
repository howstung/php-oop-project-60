<?php

declare(strict_types=1);

namespace Hexlet\Validator\Rules;

interface RuleInterface
{
    public function isValid(mixed $value): bool;
}
