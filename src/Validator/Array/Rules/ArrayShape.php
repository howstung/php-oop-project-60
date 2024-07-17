<?php

declare(strict_types=1);

namespace Hexlet\Validator\Array\Rules;

use Hexlet\Validator\Rules\AbstractRuleInterface;
use Hexlet\Validator\ValidatorInterface;

class ArrayShape extends AbstractRuleInterface
{
    public function isValid(mixed $value): bool
    {
        $array = $value;
        $shapeArray = $this->rule;

        foreach ($array as $key => $val) {
            if (array_key_exists($key, $shapeArray)) {
                /** @var ValidatorInterface $validator * */
                $validator = $shapeArray[$key];
                $check = $validator->isValid($val);
                if (!$check) {
                    return false;
                }
            }
        }

        return true;
    }
}
