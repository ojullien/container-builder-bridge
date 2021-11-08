<?php

declare(strict_types=1);

namespace OJullienTest\ContainerBuilderBridge;

use OJullienTest\Utils\StubBridge;
use OJullienTest\Utils\StubBuilder;

use function PHPUnit\Framework\assertInstanceOf;

class AbstractionTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @covers \OJullien\ContainerBuilderBridge\Abstraction
     * @group specification
     */
    public function testCreateContainer()
    {
        $pBuilder = new StubBuilder();
        $pBridge = new StubBridge($pBuilder);
        $pBridge->setContainerBuilder($pBuilder);
        $pContainer = $pBridge->build();
        $this->assertInstanceOf('\Psr\Container\ContainerInterface', $pContainer);
    }
}
