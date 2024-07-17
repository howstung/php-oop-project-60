<?php

declare(strict_types=1);

namespace Hexlet\Validator\Rules;

trait AddValidatorTrait
{
    private array $customValidators;

    public function setCustomValidators(array $customValidators = []): void
    {
        $this->customValidators = $customValidators;
    }

    public function test(string $name, mixed $binded): self
    {
        $customValidatorCallback = $this->customValidators[$name];

        $classValidator = new class extends AbstractRuleInterface {
            public function isValid(mixed $value = null): bool
            {
                return ($this->rule)($value);
            }
        };

        $callback = $customValidatorCallback;
        $callbackBinded = fn($value) => ($callback($value, $binded));
        $this->addRule(new $classValidator($callbackBinded));

        return $this;
    }
}
