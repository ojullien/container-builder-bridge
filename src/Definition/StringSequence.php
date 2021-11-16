<?php

/**
 * @package OJullien\ContainerBuilderBridge
 * @link    https://github.com/ojullien/container-builder-bridge for the canonical source repository
 * @license https://github.com/ojullien/container-builder-bridge/blob/master/LICENSE MIT
 */

declare(strict_types=1);

namespace OJullien\ContainerBuilderBridge\Definition;

/**
 * Immutable string typed definition sequence
 * @phpstan-implements \IteratorAggregate<int, string>
 */
final class StringSequence implements SequenceInterface, \Countable
{
    /**
     * Definitions
     *
     * @var array<int,string>
     */
    private array $aDefinitions = [];

    /**
     * Returns the sequence
     *
     * @return static
     */
    public static function getSequence(): static
    {
        return new static();
    }

    /**
     * Private constructor. Use StringSequence::getSequence instead
     */
    private function __construct()
    {
    }

    /**
     * Returns an array iterator
     *
     * @return \Traversable<int,string>
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->aDefinitions);
    }

    /**
     * Count dependencies
     *
     * @return 0|positive-int
     */
    public function count(): int
    {
        return count($this->aDefinitions);
    }

    /**
     * Adds a dependency to the sequence.
     *
     * @param string $sDefinition
     * @return static
     */
    private function clone(string $sDefinition): static
    {
        $aNewSequence = clone ($this);
        $aNewSequence->aDefinitions = [...$this->aDefinitions, $sDefinition];
        return $aNewSequence;
    }

    /**
     * Returns true if the definition is already in the sequence
     *
     * @param string $sDefinition
     * @return boolean
     */
    public function has(string $sDefinition): bool
    {
        return \array_search($sDefinition, $this->aDefinitions, true) !== \false;
    }

    /**
     * Adds a definition to the sequence.
     *
     * @param string $definition
     * @return static
     */
    public function add(string $definition): static
    {
        return $this->has($definition) ? $this : $this->clone($definition);
    }
}
