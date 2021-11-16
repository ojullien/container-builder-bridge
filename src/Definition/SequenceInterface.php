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
 * @extends \IteratorAggregate<string,string|callable>
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
     * ->add(Acme\Foo::class)
     * ->add(Acme\BarInterface::class,Acme\BarA::class)
     * ->add('service',function...)
     *
     * @param string $alias Alias or classname
     * @param string|callable|null $definition
     * @return static
     */
    public function withDefinition(string $alias, string|callable|null $definition = null): static;
}
