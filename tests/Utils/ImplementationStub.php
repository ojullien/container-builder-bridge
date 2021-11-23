<?php

declare(strict_types=1);

namespace OJullienTest\Utils;

use OJullien\ContainerBuilderBridge\Definition\SequenceInterface;
use OJullien\ContainerBuilderBridge\ImplementionInterface;
use Psr\Container\ContainerInterface;

/**
 * An implementation of a PSR-11 container builder.
 */
class ImplementationStub implements ImplementionInterface
{

    /**
     * Builds and returns the PSR-11 container.
     *
     * @return \Psr\Container\ContainerInterface
     */
    public function build(): ContainerInterface
    {
        return new ContainerStub();
    }

    /**
     * Add definitions to the container.
     *
     * @param \OJullien\ContainerBuilderBridge\Definition\SequenceInterface ...$definitions
     * @return \OJullien\ContainerBuilderBridge\ImplementionInterface
     */
    public function setDefinitions(SequenceInterface ...$definitions): ImplementionInterface
    {
        return $this;
    }
}
