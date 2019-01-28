<?php

declare(strict_types=1);
namespace AssoConnect\MapboxToken\Object;

class TemporaryToken extends AbstractHydratable
{
    /**
     * @var string
     */
    public $token;

    /**
     * @var \DateTime
     */
    public $expires;
}
