<?php

/**
 * @package OJullien\ContainerBuilderBridge
 * @link    https://github.com/ojullien/container-builder-bridge for the canonical source repository
 * @license https://github.com/ojullien/container-builder-bridge/blob/master/LICENSE MIT
 */

declare(strict_types=1);

namespace OJullien\ContainerBuilderBridge\Definition;

/**
 * Immutable string|callable typed definition sequence
 * @phpstan-implements IteratorAggregate<string, string|callable>
 */
final class PaireSequence implements SequenceInterface, \Countable
{
    /**
     * Definitions
     *
     * @var array<string,string|callable>
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
     * Private constructor. Use PaireSequence::getSequence instead
     */
    private function __construct()
    {
    }

    /**
     * Returns an array iterator
     *
     * @return \Traversable<string,string|callable>
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
     * Adds a definition to the sequence.
     *
     * @param string $sName
     * @param string|callable $aDefinition
     * @return static
     */
    private function clone(string $sName, string|callable $aDefinition): static
    {
        $aNewSequence = clone ($this);
        $aNewSequence->aDefinitions = $this->aDefinitions;
        $aNewSequence->aDefinitions[$sName] = $aDefinition;
        return $aNewSequence;
    }

    /**
     * Returns true if the definition is already in the sequence
     *
     * @param string $sName
     * @return boolean
     */
    public function has(string $sName): bool
    {
        return \array_key_exists($sName, $this->aDefinitions);
    }

    /**
     * Adds a definition to the sequence.
     *
     * @param string $name
     * @param string|callable $definition
     * @return static
     */
    public function add(string $name, string|callable $definition): static
    {
        return $this->has($name) ? $this : $this->clone($name, $definition);
    }
}
