<?php

/**
 * @package OJullien\ContainerBuilderBridge
 * @link    https://github.com/ojullien/container-builder-bridge for the canonical source repository
 * @license https://github.com/ojullien/container-builder-bridge/blob/master/LICENSE MIT
 */

declare(strict_types=1);

namespace OJullien\ContainerBuilderBridge\Definition;

/**
 *The interface for all sequences.
 */
interface SequenceInterface
{
    /**
     * Returns the sequence
     *
     * @return static
     */
    public static function getSequence(): static;

    /**
     * Returns true if the definition is already in the sequence
     *
     * @param string $name
     * @return boolean
     */
    public function has(string $name): bool;
}
