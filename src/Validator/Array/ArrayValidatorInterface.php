<?php

declare(strict_types=1);

namespace Hexlet\Validator\Array;

use Hexlet\Validator\ValidatorInterface;

interface ArrayValidatorInterface extends ValidatorInterface
{
    public function required(): self;

    public function sizeof(int $size): self;
}
