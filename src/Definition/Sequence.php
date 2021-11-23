<?php

/**
 * @package OJullien\ContainerBuilderBridge\Definition
 * @link    https://github.com/ojullien/container-builder-bridge for the canonical source repository
 * @license https://github.com/ojullien/container-builder-bridge/blob/master/LICENSE MIT
 */

declare(strict_types=1);

namespace OJullien\ContainerBuilderBridge\Definition;

/**
 * Immutable sequence of typed definitions
 * Allowed types are values (array|bool|int|float|string) or factory (callable)
 */
final class Sequence implements SequenceInterface
{

    /**
     * Definitions
     *
     * @var array<string,array<array-key,scalar>|bool|callable|int|float|string>
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
     * @return \Traversable<string,array<array-key,scalar>|bool|callable|int|float|string>
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->aDefinitions);
    }

    /**
     * Adds a definition to the sequence.
     *
     * @param string $sAlias
     * @param array<array-key,scalar>|bool|callable|int|float|string $aDefinition
     * @return static
     */
    private function clone(string $sAlias, array|bool|callable|int|float|string $aDefinition): static
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
     * ->withDefinition(Acme\Foo::class)
     * ->withDefinition(Acme\BarInterface::class,Acme\BarA::class)
     * ->withDefinition('service',function...)
     * ->withDefinition('database.host', 'localhost')
     * ->withDefinition('database.port', 5000)
     * ->withDefinition('report.recipients' => ['bob@example.com','alice@example.com',])
     *
     * @param string $alias Alias or classname
     * @param array<array-key,scalar>|bool|callable|int|float|string|null $definition
     * @return static
     */
    public function withDefinition(string $alias, array|bool|callable|int|float|string|null $definition = null): static
    {
        $definition = $definition ?? $alias;
        return $this->has($alias) ? $this : $this->clone($alias, $definition);
    }
}
