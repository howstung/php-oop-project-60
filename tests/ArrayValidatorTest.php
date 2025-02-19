<?php

declare(strict_types=1);

namespace Hexlet\Tests;

use Hexlet\Validator\ValidatorInterface;
use PHPUnit\Framework\TestCase;
use Hexlet\Validator\Validator;

class ArrayValidatorTest extends TestCase
{
    private Validator $validator;
    private ValidatorInterface $schema;

    protected function setUp(): void
    {
        $this->validator = new Validator();
        $this->schema = $this->validator->array();
    }

    public function testValidatorsSchemaNotEquals()
    {
        $schema1 = $this->validator->array();
        $schema2 = $this->validator->array();

        $this->assertNotTrue($schema1 === $schema2);
    }

    public function testSimpleWithoutRules()
    {
        $schema = $this->schema;

        $this->assertTrue($schema->isValid(null));
        $this->assertTrue($schema->isValid([]));
        $this->assertTrue($schema->isValid(['hexlet']));
    }

    public function testRequired()
    {
        $schema = $this->schema;
        $schema = $schema->required();


        $check1 = $schema->isValid(null);
        $check2 = $schema->isValid([]);

        $this->assertFalse($check1);
        $this->assertTrue($check2);
    }

    public function testSizeOf()
    {
        $schema = $this->schema;
        $schema = $schema->sizeof(2);

        $check1 = $schema->isValid(['hexlet']);
        $this->assertFalse($check1);

        $check2 = $schema->isValid([1, 2, 3]);
        $this->assertFalse($check2);

        $check3 = $schema->isValid([1, 2]);
        $this->assertTrue($check3);
    }

    public function testShape()
    {
        $schema = $this->schema;

        // Позволяет описывать валидацию для ключей массива
        $schema->shape([
            'name' => $this->validator->string()->required(),
            'age' => $this->validator->number()->positive(),
        ]);

        $check1 = $schema->isValid(['name' => 'kolya', 'age' => 100]); // true
        $check2 = $schema->isValid(['name' => 'maya', 'age' => null]); // true
        $check3 = $schema->isValid(['name' => '', 'age' => null]); // false
        $check4 = $schema->isValid(['name' => 'ada', 'age' => -5]); // false

        $this->assertTrue($check1);
        $this->assertTrue($check2);
        $this->assertFalse($check3);
        $this->assertFalse($check4);
    }
}
