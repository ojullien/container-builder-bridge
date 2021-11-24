<?php

declare(strict_types=1);

namespace OJullienTest\ContainerBuilderBridge;

use OJullien\ContainerBuilderBridge\Builder;
use OJullien\ContainerBuilderBridge\Definition\Sequence;
use OJullienTest\Utils\ImplementationStub;
use Psr\Container\ContainerInterface;

class BuilderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers \OJullien\ContainerBuilderBridge\AbstractBuilder
     * @uses \OJullien\ContainerBuilderBridge\Definition\Sequence
     * @group specification
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws \PHPUnit\Framework\Exception
     * @return void
     */
    public function testGetContainer(): void
    {
        // Set sequence of definitions
        $pSequence1 = Sequence::getSequence();
        $pSequence1 = $pSequence1->withDefinition('solo')
            ->withDefinition('service', \stdClass::class)
            ->withDefinition('api.url', 'http://api.example.com')
            ->withDefinition('webservice', function () {
                return new \stdClass();
            });

        $array = ['bob@example.com', 'alice@example.com',];
        $pSequence2 = Sequence::getSequence();
        $pSequence2 = $pSequence2->withDefinition('database.host', 'localhost')
            ->withDefinition('database.port', 5000)
            ->withDefinition('report.recipients', $array);

        // Set a builder implementation
        $pImplementation = new ImplementationStub();

        // Set a bridge
        $pBuilder = new Builder($pImplementation);
        $pBuilder->setContainerBuilder($pImplementation);

        // Get container
        $pContainer = $pBuilder->getContainer($pSequence1, $pSequence2);
        self::assertInstanceOf(ContainerInterface::class, $pContainer);
    }
}
