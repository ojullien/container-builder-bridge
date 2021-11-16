<?php

declare(strict_types=1);

namespace OJullienTest\Utils;

use Psr\Container\ContainerInterface;
use OJullien\ContainerBuilderBridge\Abstraction;
use OJullien\ContainerBuilderBridge\Definition\SequenceInterface;

class StubBridge extends Abstraction
{
    /**
     * Builds and returns the PSR-11 container.
     *
     * @return \Psr\Container\ContainerInterface
     */
    public function build(): ContainerInterface
    {
        return $this->pContainerBuilder->build();
    }

    /**
     * Add definitions to the container.
     *
     * @param SequenceInterface $definitions Definitions
     * @return \OJullien\ContainerBuilderBridge\Abstraction
     */
    public function addDefinitions(SequenceInterface ...$definitions): Abstraction
    {
        return $this;
    }
}
