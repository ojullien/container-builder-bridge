<?php

declare(strict_types=1);

namespace OJullienTest\Utils;

use OJullien\ContainerBuilderBridge\Definition\SequenceInterface;
use OJullien\ContainerBuilderBridge\ImplementorInterface;
use Psr\Container\ContainerInterface;

/**
 * An implementation of a PSR-11 container builder.
 */
class StubBuilder implements ImplementorInterface
{
    /**
     * Builds and returns the PSR-11 container.
     *
     * @return \Psr\Container\ContainerInterface
     */
    public function build(): ContainerInterface
    {
        return new StubContainer();
    }

    /**
     * Add definitions to the container.
     *
     * @param SequenceInterface $definitions
     * @return \OJullien\ContainerBuilderBridge\ImplementorInterface
     */
    public function addDefinitions(SequenceInterface ...$definitions): ImplementorInterface
    {
        return $this;
    }
}
