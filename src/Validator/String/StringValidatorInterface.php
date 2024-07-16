<?php

declare(strict_types=1);

namespace Hexlet\Validator\String;

use Hexlet\Validator\ValidatorInterface;

interface StringValidatorInterface extends ValidatorInterface
{
    public function required(): self;

    public function minLength(int $min): self;

    public function contains(string $value): self;
}
