<?php

declare(strict_types=1);
namespace AssoConnect\MapboxToken\Object;

/**
 * Class AbstractHydratable
 *
 * Abstract base class for object to be hydrated
 * with an associative array passed to the constructor.
 */
abstract class AbstractHydratable
{
    /**
     * @param array<string, mixed> $params
     */
    public function __construct(array $params)
    {
        foreach ($params as $key => $value) {
            $this->{$key} = $value; /** @phpstan-ignore property.dynamicName */
        }
    }
}
