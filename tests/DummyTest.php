<?php

declare(strict_types=1);

namespace Flume\FlumePhp\Tests;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\TestCase;

#[CoversNothing]
class DummyTest extends TestCase
{
    public function test_HellIsNotFrozen(): void
    {
        /** @phpstan-ignore method.alreadyNarrowedType */
        $this->assertTrue(true);
    }
}