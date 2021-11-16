<?php

declare(strict_types=1);

namespace OJullienTest\ContainerBuilderBridge;

use OJullienTest\Utils\StubBridge;
use OJullienTest\Utils\StubBuilder;
use Psr\Container\ContainerInterface;

class AbstractionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers \OJullien\ContainerBuilderBridge\Abstraction
     * @group specification
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws \PHPUnit\Framework\Exception
     * @return void
     */
    public function testCreateContainer(): void
    {
        $pBuilder = new StubBuilder();
        $pBridge = new StubBridge($pBuilder);
        $pBridge->setContainerBuilder($pBuilder);
        $pContainer = $pBridge->build();
        self::assertInstanceOf(ContainerInterface::class, $pContainer);
    }
}
