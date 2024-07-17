<?php

declare(strict_types=1);

namespace Hexlet\Tests;

use Hexlet\Validator\ValidatorInterface;
use PHPUnit\Framework\TestCase;
use Hexlet\Validator\Validator;

class NumberValidatorTest extends TestCase
{
    private Validator $validator;
    private ValidatorInterface $schema;

    protected function setUp(): void
    {
        $this->validator = new Validator();
        $this->schema = $this->validator->number();
    }

    public function testValidatorsSchemaNotEquals()
    {
        $schema1 = $this->validator->number();
        $schema2 = $this->validator->number();

        $this->assertNotTrue($schema1 === $schema2);
    }

    public function testSimpleWithoutRules()
    {
        $schema = $this->schema;

        $this->assertTrue($schema->isValid(null));
        $this->assertTrue($schema->isValid(0));
        $this->assertTrue($schema->isValid(-5));
        $this->assertTrue($schema->isValid(10));
        $this->assertTrue($schema->isValid(10.23));

        //TODO: Need: false, but Hexlet checks: true
        $this->assertTrue($schema->isValid('s'));// TODO: true or false ?

        $this->assertTrue($schema->isValid('15'));
        $this->assertTrue($schema->isValid('15.12'));

        $this->assertFalse($schema->isValid('40ddd'));
        $this->assertFalse($schema->isValid(''));
    }

    public function testRequired()
    {
        $schema = $this->schema;

        $schema->required();
        $this->assertFalse($schema->isValid(null));
        $this->assertTrue($schema->isValid(10));
        $this->assertTrue($schema->isValid(0));
        $this->assertTrue($schema->isValid(-10));
    }

    public function testPositive()
    {
        $schema = $this->schema;

        $check1 = $schema->positive()->isValid(10); // true
        $check2 = $schema->positive()->isValid(12.3); // true
        $check3 = $schema->positive()->isValid(-40); // false
        $check4 = $schema->positive()->isValid(0); // false

        $this->assertTrue($check1);
        $this->assertTrue($check2);
        $this->assertFalse($check3);
        $this->assertFalse($check4);
    }

    public function testRange()
    {
        $schema = $this->schema;

        $schema->range(-5, 5);

        $check1 = $schema->isValid(-10); // false

        $check2 = $schema->isValid(-5); // true
        $check3 = $schema->isValid(0); // true
        $check4 = $schema->isValid(5); // true

        $check5 = $schema->isValid(10); // false

        $this->assertFalse($check1);
        $this->assertTrue($check2);
        $this->assertTrue($check3);
        $this->assertTrue($check4);
        $this->assertFalse($check5);

        $check6 = $schema->positive()->isValid(4); // true
        $check7 = $schema->isValid(-3); // false
        $check8 = $schema->isValid(5); // true


        $this->assertTrue($check6);
        $this->assertFalse($check7);
        $this->assertTrue($check8);
    }
}
