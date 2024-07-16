<?php

declare(strict_types=1);

namespace Hexlet\Validator\Rules;

abstract class AbstractRuleInterface implements RuleInterface
{
    public function __construct(protected readonly mixed $rule = null)
    {
    }

    abstract public function isValid(mixed $value): bool;
}
