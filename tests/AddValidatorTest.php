<?php

declare(strict_types=1);

namespace Hexlet\Tests;

use PHPUnit\Framework\TestCase;
use Hexlet\Validator\Validator;

class AddValidatorTest extends TestCase
{
    private Validator $validator;

    protected function setUp(): void
    {
        $this->validator = new Validator();
    }

    public function testAddValidatorString()
    {
        $validator = $this->validator;

        $fn = fn($value, $start) => str_starts_with($value, $start);
        // Метод добавления новых валидаторов
        // addValidator($type, $name, $fn)
        $validator->addValidator('string', 'startWith', $fn);

        // Новые валидаторы вызываются через метод test
        $schema = $validator->string()->test('startWith', 'H');
        $check1 = $schema->isValid('exlet'); // false
        $check2 = $schema->isValid('Hexlet'); // true

        $this->assertFalse($check1);
        $this->assertTrue($check2);
    }

    public function testAddValidatorNumber()
    {
        $validator = $this->validator;

        $fn = fn($value, $min) => $value >= $min;

        // Метод добавления новых валидаторов
        // addValidator($type, $name, $fn)
        $validator->addValidator('number', 'min', $fn);

        // Новые валидаторы вызываются через метод test
        $schema = $validator->number()->test('min', 5);
        $check3 = $schema->isValid(4); // false
        $check4 = $schema->isValid(6); // true

        $this->assertFalse($check3);
        $this->assertTrue($check4);
    }

    public function testAddSeveralValidators()
    {
        $validator = $this->validator;

        $fn1 = fn($value, $min) => $value >= $min;
        $fn2 = fn($value, $max) => $value <= $max;

        // Метод добавления новых валидаторов
        $validator->addValidator('number', 'min', $fn1);
        $validator->addValidator('number', 'max', $fn2);

        $schema1 = $validator->number()->test('min', 5);
        $schema2 = $validator->number()->test('max', 20);

        $check1 = $schema1->isValid(4); // false
        $check2 = $schema1->isValid(6); // true

        $check3 = $schema2->isValid(10); // true
        $check4 = $schema2->isValid(21); // false

        $this->assertFalse($check1);
        $this->assertTrue($check2);
        $this->assertTrue($check3);
        $this->assertFalse($check4);
    }
}
