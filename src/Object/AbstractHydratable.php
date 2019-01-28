<?php
/**
 * Class AbstractHydratable
 *
 * Abstract base class for object to be hydrated with an associative array passed to the constructor.
 */
namespace AssoConnect\MapboxToken\Object;

abstract class AbstractHydratable
{

    public function __construct(iterable $params)
    {
        foreach ($params as $key => $value) {
            $this->$key = $value;
        }
    }
}
