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
abstract class AbstractBuilder
{

    /**
     * The concrete implementation of a container builder.
     *
     * @var \OJullien\ContainerBuilderBridge\ImplementionInterface
     */
    protected ImplementionInterface $pContainerBuilder;

    /**
     * Initializes with one of the implementation objects.
     *
     * @param ImplementionInterface $builder
     */
    public function __construct(ImplementionInterface $builder)
    {
        $this->pContainerBuilder = $builder;
    }

    /**
     * The Bridge pattern allows replacing the attached implementation object
     * dynamically.
     *
     * @param ImplementionInterface $builder
     * @return void
     */
    final public function setContainerBuilder(ImplementionInterface $builder): void
    {
        $this->pContainerBuilder = $builder;
    }

    /**
     * Builds and returns the PSR-11 container.
     *
     * @param \OJullien\ContainerBuilderBridge\Definition\SequenceInterface ...$definitions
     * @return \Psr\Container\ContainerInterface
     */
    abstract public function getContainer(SequenceInterface ...$definitions): ContainerInterface;
}
