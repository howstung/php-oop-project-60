<?php

declare(strict_types=1);

namespace Hexlet\Tests;

use Hexlet\Validator\ValidatorInterface;
use PHPUnit\Framework\TestCase;
use Hexlet\Validator\Validator;

class ValidatorStringsTest extends TestCase
{
    private Validator $validator;
    private ValidatorInterface $schema;

    protected function setUp(): void
    {
        $this->validator = new Validator();
        $this->schema = $this->validator->string();
    }

    public function testValidatorsSchemaNotEquals()
    {
        $schema1 = $this->validator->string();
        $schema2 = $this->validator->string();

        $this->assertNotTrue($schema1 === $schema2);
    }

    public function testSimpleWithoutRules()
    {
        $schema = $this->schema;

        $this->assertTrue($schema->isValid(''));
        $this->assertTrue($schema->isValid());
        $this->assertTrue($schema->isValid(null));
        $this->assertTrue($schema->isValid('what does the fox say'));
    }

    public function testRequired()
    {
        $schema = $this->schema;

        $schema->required();
        $this->assertFalse($schema->isValid(''));
        $this->assertFalse($schema->isValid());
        $this->assertFalse($schema->isValid(5));
        $this->assertFalse($schema->isValid());
        $this->assertFalse($schema->isValid(null));
    }

    public function testMinLength()
    {
        $schema = $this->schema;

        $check1 = $schema->minLength(6)->isValid('Hexlet'); // true
        $check2 = $schema->minLength(10)->isValid('Hexlet'); // false

        $this->assertTrue($check1);
        $this->assertFalse($check2);
    }

    public function testContains()
    {
        $schema = $this->schema;

        $check1 = $schema->contains('what')->isValid('what does the fox say'); // true
        $check2 = $schema->contains('whatthe')->isValid('what does the fox say'); // false

        $this->assertTrue($check1);
        $this->assertFalse($check2);
    }

    public function testWithRepeatRules()
    {
        $schema = $this->schema;

        // Если один валидатор вызывался несколько раз
        // то последний имеет приоритет (перетирает предыдущий)
        $check3 = $schema->minLength(10)->minLength(5)->isValid('Hexlet'); // true
        $this->assertTrue($check3);
    }
}
