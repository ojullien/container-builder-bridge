<?php

declare(strict_types=1);

/**
 * @package Oseille\ContainerBuilderBridge
 * @link    https://github.com/oseille/container-builder-bridge for the canonical source repository
 * @license https://github.com/oseille/container-builder-bridge/blob/master/LICENSE MIT
 */

namespace Oseille\ContainerBuilderBridge;

use Psr\Container\ContainerInterface;

/**
 * Container Builder Bridge abstraction class.
 */
abstract class Abstraction
{

    /**
     * A implementation of a container builder.
     *
     * @var \Oseille\ContainerBuilderBridge\ImplementorInterface
     */
    protected ImplementorInterface $pContainerBuilder;

    /**
     * Initializes with one of the implementation objects.
     *
     * @param ImplementorInterface $builder
     */
    public function __construct(ImplementorInterface $builder)
    {
        $this->pContainerBuilder = $builder;
    }

    /**
     * The Bridge pattern allows replacing the attached implementation object
     * dynamically.
     *
     * @param ImplementorInterface $builder
     * @return void
     */
    final public function setContainerBuilder(ImplementorInterface $builder): void
    {
        $this->pContainerBuilder = $builder;
    }

    /**
     * Builds and returns the PSR-11 container.
     *
     * @return \Psr\Container\ContainerInterface
     */
    abstract public function build(): ContainerInterface;

    /**
     * Add definitions to the container.
     *
     * @param array<int,array> $definitions,... Array of definitions
     * @return \Oseille\ContainerBuilderBridge\Abstraction
     */
    abstract public function addDefinitions(...$definitions): Abstraction;
}
