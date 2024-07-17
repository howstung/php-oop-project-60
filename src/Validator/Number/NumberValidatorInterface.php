<?php

declare(strict_types=1);

namespace Hexlet\Validator\Number;

use Hexlet\Validator\ValidatorInterface;

interface NumberValidatorInterface extends ValidatorInterface
{
    public function required(): self;

    public function positive(): self;

    public function range(int $min, int $max): self;
}
