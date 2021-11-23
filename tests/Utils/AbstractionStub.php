<?php

declare(strict_types=1);

namespace OJullienTest\Utils;

use OJullien\ContainerBuilderBridge\AbstractBuilder;
use Psr\Container\ContainerInterface;
use OJullien\ContainerBuilderBridge\Definition\SequenceInterface;

class AbstractionStub extends AbstractBuilder
{

    /**
     * Builds and returns the PSR-11 container.
     *
     * @param \OJullien\ContainerBuilderBridge\Definition\SequenceInterface ...$definitions
     * @return \Psr\Container\ContainerInterface
     */
    public function getContainer(SequenceInterface ...$definitions): ContainerInterface
    {
        return $this->pContainerBuilder->build();
    }
}
