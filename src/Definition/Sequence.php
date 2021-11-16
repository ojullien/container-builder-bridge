<?php

/**
 * @package OJullien\ContainerBuilderBridge\Definition
 * @link    https://github.com/ojullien/container-builder-bridge for the canonical source repository
 * @license https://github.com/ojullien/container-builder-bridge/blob/master/LICENSE MIT
 */

declare(strict_types=1);

namespace OJullien\ContainerBuilderBridge\Definition;

/**
 * Immutable string|callable typed definition sequence
 */
final class Sequence implements SequenceInterface
{

    /**
     * Definitions
     *
     * @var array<string,string|callable>
     */
    private array $aDefinitions = [];

    /**
     * Private constructor. Use AliasSequence::getSequence instead
     */
    private function __construct()
    {
    }

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
     * Count dependencies
     *
     * @return 0|positive-int
     */
    public function count(): int
    {
        return \count($this->aDefinitions);
    }

    /**
     * Returns true if the definition is already in the sequence
     *
     * @param string $definition Alias of the definition
     * @return boolean
     */
    private function has(string $definition): bool
    {
        return \array_key_exists($definition, $this->aDefinitions);
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
     * Adds a definition to the sequence.
     *
     * @param string $sAlias
     * @param string|callable $aDefinition
     * @return static
     */
    private function clone(string $sAlias, string|callable $aDefinition): static
    {
        /* @var Sequence $aNewSequence*/
        $aNewSequence = clone $this;
        $aNewSequence->aDefinitions = $this->aDefinitions;
        $aNewSequence->aDefinitions[$sAlias] = $aDefinition;
        return $aNewSequence;
    }

    /**
     * Adds a definition to the sequence.
     *
     * examples:
     * ->add(Acme\Foo::class)
     * ->add(Acme\BarInterface::class,Acme\BarA::class)
     * ->add('service',function...)
     *
     * @param string $alias Alias or classname
     * @param string|callable|null $definition
     * @return static
     */
    public function withDefinition(string $alias, string|callable|null $definition = null): static
    {
        $definition = $definition ?? $alias;
        return $this->has($alias) ? $this : $this->clone($alias, $definition);
    }
}
