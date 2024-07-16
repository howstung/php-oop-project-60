<?php

declare(strict_types=1);

namespace Hexlet\Tests;

use PHPUnit\Framework\TestCase;
use Hexlet\Validator\Validator;

class Test extends TestCase
{
    public function testExample()
    {
        $this->assertTrue(Validator::test());
    }
}
