<?php

declare(strict_types=1);

namespace OJullienTest\ContainerBuilderBridge\Definition;

use OJullien\ContainerBuilderBridge\Definition\Sequence;
use OJullien\ContainerBuilderBridge\Definition\SequenceInterface;
use stdClass;
use Traversable;

class SequenceTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @covers \OJullien\ContainerBuilderBridge\Definition\Sequence
     * @group specification
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws \PHPUnit\Framework\Exception
     * @return void
     */
    public function testGetSequence(): void
    {
        $pSequence = Sequence::getSequence();
        self::assertInstanceOf(SequenceInterface::class, $pSequence);
    }

    /**
     * @covers \OJullien\ContainerBuilderBridge\Definition\Sequence
     * @group specification
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws \PHPUnit\Framework\Exception
     * @return void
     */
    public function testSequence()
    {
        $pSequence = Sequence::getSequence();
        $pSequence = $pSequence->withDefinition('solo')
            ->withDefinition('service', stdClass::class)
            ->withDefinition('api.url', 'http://api.example.com')
            ->withDefinition('webservice', function () {
                return new stdClass();
            });
        self::assertTrue(4 === $pSequence->count());
    }

    /**
     * @covers \OJullien\ContainerBuilderBridge\Definition\Sequence
     * @group specification
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws \PHPUnit\Framework\Exception
     * @return void
     */
    public function testError()
    {
        $pSequence = Sequence::getSequence();
        $pSequence = $pSequence->withDefinition('solo')
            ->withDefinition('solo', function () {
                return new stdClass();
            });
        self::assertTrue(1 === $pSequence->count());
    }

    /**
     * @covers \OJullien\ContainerBuilderBridge\Definition\Sequence
     * @group specification
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws \PHPUnit\Framework\Exception
     * @return void
     */
    public function testiterator()
    {
        $pSequence = Sequence::getSequence();
        $pSequence = $pSequence->withDefinition('solo')
            ->withDefinition('service', stdClass::class)
            ->withDefinition('api.url', 'http://api.example.com')
            ->withDefinition('webservice', function () {
                return new stdClass();
            });
        self::assertInstanceOf(Traversable::class, $pSequence->getIterator());
    }
}
