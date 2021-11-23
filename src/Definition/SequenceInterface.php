<?php

/**
 * @package OJullien\ContainerBuilderBridge
 * @link    https://github.com/ojullien/container-builder-bridge for the canonical source repository
 * @license https://github.com/ojullien/container-builder-bridge/blob/master/LICENSE MIT
 */

declare(strict_types=1);

namespace OJullien\ContainerBuilderBridge\Definition;

/**
 * The interface for all sequences.
 * @extends \IteratorAggregate<string,array|bool|callable|int|float|string>
 */
interface SequenceInterface extends \Countable, \IteratorAggregate
{
    /**
     * Returns the sequence
     *
     * @return static
     */
    public static function getSequence(): static;

    /**
     * Adds a definition to the sequence.
     *
     * examples:
     * ->withDefinition(Acme\Foo::class)
     * ->withDefinition(Acme\BarInterface::class,Acme\BarA::class)
     * ->withDefinition('service',function...)
     * ->withDefinition('database.host', 'localhost')
     * ->withDefinition('database.port', 5000)
     * ->withDefinition('report.recipients', ['bob@example.com','alice@example.com',])
     *
     * @param string $alias Alias or classname
     * @param array<array-key,scalar>|bool|callable|int|float|string|null $definition
     * @return static
     */
    public function withDefinition(string $alias, array|bool|callable|int|float|string|null $definition = null): static;
}
