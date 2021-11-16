<?php

declare(strict_types=1);

namespace OJullienTest\Utils;

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
     * @param array ...$definitions
     * @return \OJullien\ContainerBuilderBridge\ImplementorInterface
     */
    public function addDefinitions(...$definitions): ImplementorInterface
    {
        return $this;
    }
}
