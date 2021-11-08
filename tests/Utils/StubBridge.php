<?php

declare(strict_types=1);

namespace OJullienTest\Utils;

use Psr\Container\ContainerInterface;
use OJullien\ContainerBuilderBridge\Abstraction;

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
     * @param array $definitions Array of definitions
     * @return \OJullien\ContainerBuilderBridge\Abstraction
     */
    public function addDefinitions(...$definitions): Abstraction
    {
        return $this;
    }
}
