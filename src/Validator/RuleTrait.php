<?php

declare(strict_types=1);

namespace Hexlet\Validator;

use Hexlet\Validator\Rules\RuleInterface;

trait RuleTrait
{
    private array $rules = [];

    private function addRule(RuleInterface $rule): void
    {
        foreach ($this->rules as $key => $ruleInner) {
            if (get_class($ruleInner) === get_class($rule)) {
                unset($this->rules[$key]);
                break;
            }
        }
        $this->rules[] = $rule;
    }

    private function isValidCommon(mixed $value): bool
    {
        foreach ($this->rules as $rule) {
            /** @var  RuleInterface $rule */
            $result = $rule->isValid($value);
            if (!$result) {
                return false;
            }
        }

        return true;
    }
}
