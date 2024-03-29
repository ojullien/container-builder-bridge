<?php

/**
 * @package OJullien\ContainerBuilderBridge
 * @link    https://github.com/ojullien/container-builder-bridge for the canonical source repository
 * @license https://github.com/ojullien/container-builder-bridge/blob/master/LICENSE MIT
 */

declare(strict_types=1);

namespace OJullien\ContainerBuilderBridge;

use OJullien\ContainerBuilderBridge\Definition\SequenceInterface;
use Psr\Container\ContainerInterface;

/**
 * Abstraction class for all builder implementations.
 * It relies on the implementation object to build and get a PSR-11 container.
 */
class Builder
{

    /**
     * The concrete implementation of a container builder.
     *
     * @var \OJullien\ContainerBuilderBridge\ImplementationInterface
     */
    protected ImplementationInterface $pContainerBuilder;

    /**
     * Initializes with one of the implementation objects.
     *
     * @param ImplementationInterface $builder
     */
    public function __construct(ImplementationInterface $builder)
    {
        $this->pContainerBuilder = $builder;
    }

    /**
     * The Bridge pattern allows replacing the attached implementation object
     * dynamically.
     *
     * @param ImplementationInterface $builder
     * @return void
     */
    final public function setContainerBuilder(ImplementationInterface $builder): void
    {
        $this->pContainerBuilder = $builder;
    }

    /**
     * Builds and returns the PSR-11 container.
     *
     * @param \OJullien\ContainerBuilderBridge\Definition\SequenceInterface ...$definitions
     * @return \Psr\Container\ContainerInterface
     */
    public function getContainer(SequenceInterface ...$definitions): ContainerInterface
    {
        return $this->pContainerBuilder->setDefinitions(...$definitions)->build();
    }
}
