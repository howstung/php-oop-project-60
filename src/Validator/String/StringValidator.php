<?php

declare(strict_types=1);

namespace Hexlet\Validator\String;

use Hexlet\Validator\Rules\RuleInterface;
use Hexlet\Validator\String\Rules\StringContains;
use Hexlet\Validator\String\Rules\StringMinLength;
use Hexlet\Validator\String\Rules\StringRequired;

class StringValidator implements StringValidatorInterface
{
    private array $rules = [];

    public function required(): self
    {
        $this->addRule(new StringRequired());
        return $this;
    }

    public function minLength(int $min): self
    {
        $this->addRule(new StringMinLength($min));
        return $this;
    }

    public function contains(string $value): self
    {
        $this->addRule(new StringContains($value));
        return $this;
    }

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

    public function isValid(mixed $value = null): bool
    {
        foreach ($this->rules as $rule) {
            /** @var  RuleInterface $rule */
            $result = $rule->isValid($value);
            if (!$result) {
                return false;
            }
        }

        $this->rules = [];

        return is_string($value) || is_null($value);
    }
}
