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
 * The interface for all concrete builder implementations.
 */
interface ImplementationInterface
{
    /**
     * Builds and returns the PSR-11 container.
     *
     * @return \Psr\Container\ContainerInterface
     */
    public function build(): ContainerInterface;

    /**
     * Add definitions to the container.
     *
     * @param \OJullien\ContainerBuilderBridge\Definition\SequenceInterface ...$definitions
     * @return ImplementationInterface
     */
    public function setDefinitions(SequenceInterface ...$definitions): ImplementationInterface;
}
